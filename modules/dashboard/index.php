<?php include_once './components/toast.php'; ?>

<?php
$fields = ['tembakau', 'alkohol', 'kanabis', 'kokain', 'amfetamin', 'inhalansia', 'sedativa', 'halusinogens', 'opioid'];

$chartData = [];

$id_user = $_SESSION['id_user'];

foreach ($fields as $field) {

    if ($id_user == 1) {
        $sql = "
        SELECT 
            SUM(CASE WHEN `$field` = 'Resiko Rendah' THEN 1 ELSE 0 END) AS rendah,
            SUM(CASE WHEN `$field` = 'Resiko Sedang' THEN 1 ELSE 0 END) AS sedang,
            SUM(CASE WHEN `$field` = 'Resiko Tinggi' THEN 1 ELSE 0 END) AS tinggi
        FROM skrining
    ";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $chartData[$field] = [
            'rendah' => (int)$row['rendah'],
            'sedang' => (int)$row['sedang'],
            'tinggi' => (int)$row['tinggi']
        ];
    } else {
        $sql = "
        SELECT 
            SUM(CASE WHEN `$field` = 'Resiko Rendah' THEN 1 ELSE 0 END) AS rendah,
            SUM(CASE WHEN `$field` = 'Resiko Sedang' THEN 1 ELSE 0 END) AS sedang,
            SUM(CASE WHEN `$field` = 'Resiko Tinggi' THEN 1 ELSE 0 END) AS tinggi
        FROM skrining
        WHERE id_user = $id_user
    ";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $chartData[$field] = [
            'rendah' => (int)$row['rendah'],
            'sedang' => (int)$row['sedang'],
            'tinggi' => (int)$row['tinggi']
        ];
    }
}



?>

<div class="min-h-screen bg-gray-50 dark:bg-gray-800">
    <div class="dark:bg-gray-800">
        <!-- Header -->
        <div class="bg-white rounded-lg shadow-md mb-2 p-6 dark:bg-gray-800">
            <h1 class="text-2xl sm:text-3xl font-bold text-gray-800 dark:text-white">Dashboard</h1>
            <!-- <p class="text-gray-600 mt-2">Distribusi Risiko per Jenis Zat</p> -->
        </div>

        <!-- Chart Section -->
        <div class="bg-white rounded-lg shadow-md p-4 sm:p-6 dark:bg-gray-800">
            <div class="w-full">
                <canvas id="multiResikoChart" class="w-full h-64 sm:h-80 md:h-96 "></canvas>
            </div>
        </div>
    </div>
</div>

<script>
    const chartData = <?= json_encode($chartData); ?>;

    const labelMap = {
        'tembakau': 'Tembakau',
        'alkohol': 'Alkohol',
        'kanabis': 'Kanabis',
        'kokain': 'Kokain',
        'amfetamin': 'Amfetamin',
        'inhalansia': 'Inhalansia',
        'sedativa': 'Sedativa',
        'halusinogens': 'Halusinogen',
        'opioid': 'Opioid'
    };

    const labels = Object.keys(chartData).map(key => labelMap[key] || key);
    const rendahData = Object.keys(chartData).map(k => chartData[k].rendah);
    const sedangData = Object.keys(chartData).map(k => chartData[k].sedang);
    const tinggiData = Object.keys(chartData).map(k => chartData[k].tinggi);

    const ctx = document.getElementById('multiResikoChart').getContext('2d');

    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                    label: 'Risiko Rendah',
                    data: rendahData,
                    backgroundColor: 'rgba(34, 197, 94, 0.7)',
                    borderColor: 'rgba(34, 197, 94, 1)',
                    borderWidth: 1,
                    borderRadius: 6,
                    borderSkipped: false
                },
                {
                    label: 'Risiko Sedang',
                    data: sedangData,
                    backgroundColor: 'rgba(245, 158, 11, 0.7)',
                    borderColor: 'rgba(245, 158, 11, 1)',
                    borderWidth: 1,
                    borderRadius: 6,
                    borderSkipped: false
                },
                {
                    label: 'Risiko Tinggi',
                    data: tinggiData,
                    backgroundColor: 'rgba(239, 68, 68, 0.7)',
                    borderColor: 'rgba(239, 68, 68, 1)',
                    borderWidth: 1,
                    borderRadius: 6,
                    borderSkipped: false
                }
            ]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            interaction: {
                intersect: false,
                mode: 'index'
            },
            plugins: {
                legend: {
                    display: true,
                    position: 'top',
                    labels: {
                        usePointStyle: true,
                        padding: 20,
                        font: {
                            size: window.innerWidth < 640 ? 12 : 14
                        }
                    }
                },
                tooltip: {
                    backgroundColor: 'rgba(0, 0, 0, 0.8)',
                    titleColor: 'white',
                    bodyColor: 'white',
                    borderColor: 'rgba(255, 255, 255, 0.2)',
                    borderWidth: 1,
                    cornerRadius: 6,
                    callbacks: {
                        label: function(context) {
                            return context.dataset.label + ': ' + context.parsed.y + ' kasus';
                        }
                    }
                }
            },
            scales: {
                x: {
                    title: {
                        display: true,
                        text: 'Jenis Zat',
                        font: {
                            size: window.innerWidth < 640 ? 12 : 14,
                            weight: 'bold'
                        },
                        color: '#374151'
                    },
                    ticks: {
                        color: '#6B7280',
                        font: {
                            size: window.innerWidth < 640 ? 10 : 12
                        },
                        maxRotation: window.innerWidth < 640 ? 45 : 0
                    },
                    grid: {
                        display: false
                    }
                },
                y: {
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: 'Jumlah',
                        font: {
                            size: window.innerWidth < 640 ? 12 : 14,
                            weight: 'bold'
                        },
                        color: '#374151'
                    },
                    ticks: {
                        color: '#6B7280',
                        font: {
                            size: window.innerWidth < 640 ? 10 : 12
                        }
                    },
                    grid: {
                        color: 'rgba(156, 163, 175, 0.3)'
                    }
                }
            }
        }
    });

    // Handle window resize for responsiveness
    window.addEventListener('resize', function() {
        Chart.getChart('multiResikoChart').options.plugins.legend.labels.font.size = window.innerWidth < 640 ? 12 : 14;
        Chart.getChart('multiResikoChart').options.scales.x.title.font.size = window.innerWidth < 640 ? 12 : 14;
        Chart.getChart('multiResikoChart').options.scales.y.title.font.size = window.innerWidth < 640 ? 12 : 14;
        Chart.getChart('multiResikoChart').options.scales.x.ticks.font.size = window.innerWidth < 640 ? 10 : 12;
        Chart.getChart('multiResikoChart').options.scales.y.ticks.font.size = window.innerWidth < 640 ? 10 : 12;
        Chart.getChart('multiResikoChart').options.scales.x.ticks.maxRotation = window.innerWidth < 640 ? 45 : 0;
        Chart.getChart('multiResikoChart').update();
    });
</script>