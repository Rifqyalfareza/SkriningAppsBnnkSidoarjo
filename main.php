<?php
ob_start();
session_start();

$id = $_SESSION['id_user'];
$mail = $_SESSION['email'];
$instansi = $_SESSION['instansi'];

if (!isset($id) && !isset($ptgs)) {
    header("Location: index.php");
    exit();
}
include 'config/db.php';

if ($id == 1) {
    $query = "SELECT *, skrining.nama_petugas as petugas FROM skrining JOIN user ON skrining.id_user = user.id_user order by skrining.id_skrining DESC";
} else {
    $query = "SELECT *, skrining.nama_petugas as petugas FROM skrining JOIN user ON skrining.id_user = user.id_user WHERE skrining.id_user = ? ORDER BY skrining.id_skrining DESC";
}

if ($id == 1) {
    $result = $conn->query($query);
} else {
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
}

$queryPetugas = "SELECT * FROM user where id_user != 1";
$resultPetugas = $conn->query($queryPetugas);

$petugas = [];
while ($rows = $resultPetugas->fetch_assoc()) {
    $petugas[] = $rows;
}

$skrining = [];
while ($row = $result->fetch_assoc()) {
    $skrining[] = $row;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ASSIST v3.1 - BNN Sidoarjo</title>
    <link rel="stylesheet" href="src/output.css" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free/js/all.min.js"></script>
    <link rel="stylesheet" href="node_modules/flowbite/dist/flowbite.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="shortcut icon" href="assets/bnn.png" type="image/x-icon">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://unpkg.com/feather-icons"></script>
</head>

<style>
    body {
        font-family: 'Poppins', sans-serif !important;
    }

    th {
        color: black !important;
    }

    /* Loading Overlay Styles */
    #loading-overlay {
        transition: opacity 0.6s ease, transform 0.6s ease;
        backdrop-filter: blur(5px);
        background: #ffffff;
        z-index: 9999 !important;
    }

    .dark #loading-overlay {
        background: #111827;
    }

    #loading-overlay.fade-out {
        opacity: 0;
        transform: scale(0.95);
    }

    /* Main Loading Animation - Pulsing Logo */
    .loading-logo {
        animation: pulseGlow 2s ease-in-out infinite;
        filter: drop-shadow(0 0 30px rgba(59, 130, 246, 0.6));
        transition: all 0.3s ease;
    }

    @keyframes pulseGlow {
        0%, 100% {
            transform: scale(1);
            filter: drop-shadow(0 0 30px rgba(59, 130, 246, 0.6));
        }
        50% {
            transform: scale(1.08);
            filter: drop-shadow(0 0 40px rgba(59, 130, 246, 0.8));
        }
    }

    /* Floating Dots Animation */
    .loading-dots {
        display: flex;
        gap: 10px;
        justify-content: center;
        align-items: center;
        margin: 20px 0;
    }

    .dot {
        width: 12px;
        height: 12px;
        border-radius: 50%;
        background: linear-gradient(45deg, #3b82f6, #8b5cf6);
        animation: floatDots 1.8s ease-in-out infinite;
        box-shadow: 0 0 15px rgba(59, 130, 246, 0.5);
    }

    .dot:nth-child(1) { animation-delay: 0s; }
    .dot:nth-child(2) { animation-delay: 0.2s; }
    .dot:nth-child(3) { animation-delay: 0.4s; }
    .dot:nth-child(4) { animation-delay: 0.6s; }
    .dot:nth-child(5) { animation-delay: 0.8s; }

    @keyframes floatDots {
        0%, 100% {
            transform: translateY(0) scale(0.8);
            opacity: 0.4;
        }
        50% {
            transform: translateY(-25px) scale(1.2);
            opacity: 1;
        }
    }

    /* Spinning Ring Animation */
    .loading-ring {
        position: relative;
        width: 80px;
        height: 80px;
        margin: 20px auto;
    }

    .loading-ring div {
        position: absolute;
        width: 64px;
        height: 64px;
        border: 4px solid transparent;
        border-top: 4px solid #3b82f6;
        border-radius: 50%;
        animation: spinRing 1.4s linear infinite;
    }

    .loading-ring div:nth-child(1) { 
        animation-delay: 0s; 
        border-top-color: #3b82f6;
    }
    .loading-ring div:nth-child(2) { 
        animation-delay: -0.5s; 
        opacity: 0.7;
        border-top-color: #8b5cf6;
    }
    .loading-ring div:nth-child(3) { 
        animation-delay: -1s; 
        opacity: 0.4;
        border-top-color: #10b981;
    }

    @keyframes spinRing {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }

    /* Loading Text Animation */
    .loading-text {
        animation: textPulse 2s ease-in-out infinite;
        background: linear-gradient(45deg, #3b82f6, #8b5cf6, #10b981, #f59e0b);
        background-size: 400% 400%;
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        animation: textPulse 2s ease-in-out infinite, gradientShift 3s ease-in-out infinite;
    }

    @keyframes textPulse {
        0%, 100% { opacity: 0.8; }
        50% { opacity: 1; }
    }

    @keyframes gradientShift {
        0% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
        100% { background-position: 0% 50%; }
    }

    /* Progress Bar */
    .loading-progress {
        width: 250px;
        height: 6px;
        background: rgba(59, 130, 246, 0.2);
        border-radius: 3px;
        overflow: hidden;
        margin: 25px auto;
        position: relative;
    }

    .progress-fill {
        height: 100%;
        background: linear-gradient(90deg, #3b82f6, #8b5cf6, #10b981, #f59e0b);
        background-size: 200% 100%;
        border-radius: 3px;
        animation: progressMove 2.5s ease-in-out infinite, progressGradient 2s linear infinite;
        box-shadow: 0 0 10px rgba(59, 130, 246, 0.5);
    }

    @keyframes progressMove {
        0% {
            width: 0%;
            transform: translateX(-100%);
        }
        50% {
            width: 100%;
            transform: translateX(0%);
        }
        100% {
            width: 100%;
            transform: translateX(100%);
        }
    }

    @keyframes progressGradient {
        0% { background-position: 0% 50%; }
        100% { background-position: 200% 50%; }
    }

    /* Percentage Counter */
    .loading-percentage {
        font-size: 14px;
        font-weight: 600;
        color: #3b82f6;
        margin-top: 10px;
        animation: countUp 3s ease-out forwards;
    }

    @keyframes countUp {
        from { opacity: 0; }
        to { opacity: 1; }
    }

    /* Subtitle Animation */
    .loading-subtitle {
        font-size: 12px;
        color: #6b7280;
        margin-top: 15px;
        animation: subtitleFade 2s ease-in-out infinite;
    }

    @keyframes subtitleFade {
        0%, 100% { opacity: 0.5; }
        50% { opacity: 1; }
    }

    /* Dark mode adjustments */
    .dark .loading-text {
        background: linear-gradient(45deg, #60a5fa, #a78bfa, #34d399, #fbbf24);
        background-size: 400% 400%;
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .dark .loading-subtitle {
        color: #9ca3af;
    }

    .dark .loading-percentage {
        color: #60a5fa;
    }

    /* Responsive Design */
    @media (max-width: 640px) {
        .loading-logo img {
            width: 60px;
            height: 60px;
        }
        
        .loading-progress {
            width: 200px;
        }
        
        .loading-text {
            font-size: 16px;
        }
    }
</style>

<body class="bg-gray-100 dark:bg-gray-900" dir="ltr">
    <!-- Enhanced Loading Overlay -->
    <div id="loading-overlay" class="fixed inset-0 z-50 flex flex-col items-center justify-center bg-white dark:bg-gray-900">
        
        <!-- Main Loading Animation -->
        <div class="text-center">
            <!-- Logo with Pulsing Effect -->
            <div class="loading-logo mb-6">
                <img src="assets/bnn.png" alt="BNN Logo" class="w-24 h-24 mx-auto" />
            </div>
            
            <!-- Animated Dots -->
            <!-- <div class="loading-dots">
                <div class="dot"></div>
                <div class="dot"></div>
                <div class="dot"></div>
                <div class="dot"></div>
                <div class="dot"></div>
            </div> -->
            
            <!-- Loading Text -->
            <!-- <h2 class="loading-text text-2xl font-bold mb-2">ASSIST v3.1</h2> -->
            <p class="loading-subtitle">Sistem Skrining Penyalahgunaan Narkoba</p>
            
            <!-- Progress Bar -->
            <div class="loading-progress">
                <div class="progress-fill"></div>
            </div>
            
            <!-- Percentage Counter -->
            <div class="loading-percentage" id="loadingPercentage">0%</div>
            
            <!-- Spinning Ring (Alternative Animation) -->
            <div class="loading-ring" style="display: none;">
                <div></div>
                <div></div>
                <div></div>
            </div>
            
            <!-- Institution Info -->
            <div class="mt-8 text-center">
                <p class="text-sm text-gray-500 dark:text-gray-400">
                    <i class="fas fa-shield-alt mr-2"></i>
                    Badan Narkotika Nasional Kabupaten Sidoarjo
                </p>
                <p class="text-xs text-gray-400 dark:text-gray-500 mt-2">
                    Memuat data...
                </p>
            </div>
        </div>
    </div>

    <?php include 'components/navbar.php'; ?>
    <?php include 'components/sidebar.php'; ?>

    <!-- Main Content -->
    <main class="p-4 sm:ml-64 mt-7 dark:bg-gray-900">
        <div class="container mx-auto">
            <div class="bg-white rounded-lg shadow p-6 mt-6 overflow-x-auto dark:bg-gray-800">
                <?php include 'routes/web.php'; ?>
            </div>
            <div class="mt-8 pb-5 text-center">
                <p class="text-xs text-gray-500 dark:text-white">
                    © 2025 Badan Narkotika Nasional Kabupaten Sidoarjo - ASSIST v3.1
                </p>
            </div>
        </div>
    </main>

    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://unpkg.com/html2pdf.js@0.10.1/dist/html2pdf.bundle.min.js"></script>
    <script src="node_modules/flowbite/dist/flowbite.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@9.0.3"></script>
    <script src="assets/table.js"></script>

    <script>
        let loadingPercentage = 0;
        let loadingInterval;

        function startLoadingAnimation() {
            const percentageElement = document.getElementById('loadingPercentage');
            
            loadingInterval = setInterval(() => {
                loadingPercentage += Math.random() * 15 + 5; // Random increment between 5-20
                
                if (loadingPercentage > 100) {
                    loadingPercentage = 100;
                    clearInterval(loadingInterval);
                }
                
                percentageElement.textContent = Math.floor(loadingPercentage) + '%';
            }, 200);
        }

        startLoadingAnimation();

        window.addEventListener('load', function() {
            setTimeout(() => {
                const percentageElement = document.getElementById('loadingPercentage');
                percentageElement.textContent = '100%';
                const overlay = document.getElementById('loading-overlay');
                if (overlay) {
                    overlay.classList.add('fade-out');
                    setTimeout(() => {
                        overlay.style.display = 'none';
                    }, 600);
                }
            }, 500);
        });

        let idleTime = 0;
        let maxIdleTime = 30 * 60 * 1000; // 30 minutes
        let idleTimer;

        function resetIdleTimer() {
            clearTimeout(idleTimer);
            idleTimer = setTimeout(() => {
                Swal.fire({
                    title: 'Sesi Berakhir',
                    text: 'Anda terdeteksi tidak aktif selama 30 menit. Sistem akan logout otomatis.',
                    icon: 'warning',
                    confirmButtonText: 'OK',
                    allowOutsideClick: false,
                    allowEscapeKey: false
                }).then(() => {
                    window.location.href = 'destroy.php';
                });
            }, maxIdleTime);
        }

        ['mousemove', 'keydown', 'mousedown', 'touchstart', 'scroll', 'click'].forEach(evt => {
            window.addEventListener(evt, resetIdleTimer, false);
        });

        // Initialize idle timer
        resetIdleTimer();

        // Feather icons initialization
        document.addEventListener('DOMContentLoaded', function() {
            if (typeof feather !== 'undefined') {
                feather.replace();
            }
        });

        // Error handling for loading
        window.addEventListener('error', function(e) {
            console.error('Loading error:', e);
            const overlay = document.getElementById('loading-overlay');
            if (overlay && overlay.style.display !== 'none') {
                setTimeout(() => {
                    overlay.classList.add('fade-out');
                    setTimeout(() => {
                        overlay.style.display = 'none';
                    }, 600);
                }, 1000);
            }
        });

        // Preload critical resources
        function preloadResources() {
            const resources = [
                'assets/bnn.png',
                'src/output.css'
            ];
            
            resources.forEach(resource => {
                const link = document.createElement('link');
                link.rel = 'preload';
                link.href = resource;
                link.as = resource.endsWith('.css') ? 'style' : 'image';
                document.head.appendChild(link);
            });
        }

        preloadResources();
    </script>

</body>

</html>
<?php ob_end_flush(); ?>