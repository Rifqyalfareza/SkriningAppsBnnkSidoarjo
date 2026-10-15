<?php
include './data/product.php';

// Debug: Log form data
error_log(print_r($_POST, true));

// Check if the form was submitted correctly
if ($_SERVER['REQUEST_METHOD'] !== 'POST' || !isset($_POST['submit_form'])) {
    die("Error: Invalid form submission. Please submit the form correctly.");
}

$_SESSION['form_data'] = $_POST;
$formData = $_SESSION['form_data'];

// Map products to database columns
$productToColumn = [
    'Tembakau' => 'tembakau',
    'Alkohol' => 'alkohol',
    'Kanabis' => 'kanabis',
    'Kokain' => 'kokain',
    'Amfetamin' => 'amfetamin',
    'Inhalansia' => 'inhalansia',
    'Sedativa' => 'sedativa',
    'Halusinogen' => 'halusinogens',
    'Opioid' => 'opioid'
];

// Validate input for products marked "Pernah"
foreach ($products as $index => $product) {
    if (isset($formData["produk_$index"]) && $formData["produk_$index"] === 'pernah') {
        foreach ($questions as $qIndex => $question) {
            $inputName = "waktu_{$index}_{$qIndex}";
            if (!isset($formData[$inputName]) || empty($formData[$inputName])) {
                error_log("Error: Missing answer for product $product, question $qIndex");
                die("Error: Please answer all follow-up questions for $product.");
            }
        }
    }
}

// Calculate scores and risks
$results = [];
$totalScore = 0;
if (!isset($products) || !isset($questions)) {
    die("Error: Products or questions data is missing. Check ./data/product.php.");
}

// Ensure all products have results
foreach ($products as $index => $product) {
    $score = 0;
    if (isset($formData["produk_$index"]) && $formData["produk_$index"] === 'pernah') {
        foreach ($questions as $qIndex => $question) {
            $inputName = "waktu_{$index}_{$qIndex}";
            if (isset($formData[$inputName])) {
                foreach ($question['options'] as $option) {
                    if (strcasecmp(trim($option['value']), trim($formData[$inputName])) === 0) {
                        $score += $option['points'];
                        break;
                    }
                }
            }
        }
    }
    $totalScore += $score;
    $resiko = $score === 0 ? 'Resiko Rendah' : ($score > 27 ? 'Resiko Tinggi' : ($score > 4 ? 'Resiko Sedang' : 'Resiko Rendah'));
    $results[$product] = ['score' => $score, 'resiko' => $resiko];
}

// Debug: Log results
foreach ($results as $product => $data) {
    error_log("Product: $product, Score: {$data['score']}, Risk: {$data['resiko']}");
}

//untuk menyimpan hasil data kedalam database
if (isset($_POST['save_to_db'])) {
    $petugas = $formData['id_petugas'] ?? '';
    $nama_petugas = $formData['namaPetugas'] ?? '';
    $nama_klien = $formData['namaKlien'] ?? '';
    $tanggal = $formData['tanggal'] ?? '';
    $tempat = $formData['lokasi'] ?? '';
    $created_at = date('Y-m-d H:i:s');

    //validasi data
    $requiredProducts = array_keys($productToColumn);
    foreach ($requiredProducts as $product) {
        if (!isset($results[$product])) {
            error_log("Error: Missing result for product: $product");
            die("Error: Missing result for product: $product. Please check form data.");
        }
    }

    //Mengambil data hasil skrining
    $tembakau = $results['Tembakau']['resiko'];
    $alkohol = $results['Alkohol']['resiko'];
    $kanabis = $results['Kanabis']['resiko'];
    $kokain = $results['Kokain']['resiko'];
    $amfetamin = $results['Amfetamin']['resiko'];
    $inhalansia = $results['Inhalansia']['resiko'];
    $sedativa = $results['Sedativa']['resiko'];
    $halusinogens = $results['Halusinogen']['resiko'];
    $opioid = $results['Opioid']['resiko'];

    $query = "INSERT INTO skrining (id_user,nama_petugas, nama_klien, tanggal, tempat, created_at, tembakau, alkohol, kanabis, kokain, amfetamin, inhalansia, sedativa, halusinogens, opioid) VALUES (?,?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    if (!$stmt) {
        echo "<script>alert('Error preparing database query: " . addslashes($conn->error) . "'); window.location='?page=assistform';</script>";
    } else {
        $stmt->bind_param(
            'sssssssssssssss',
            $id,
            $nama_petugas,
            $nama_klien,
            $tanggal,
            $tempat,
            $created_at,
            $tembakau,
            $alkohol,
            $kanabis,
            $kokain,
            $amfetamin,
            $inhalansia,
            $sedativa,
            $halusinogens,
            $opioid
        );

        if ($stmt->execute()) {
            $_SESSION['id_skrining'] = $conn->insert_id;
            echo "<script>
                    document.addEventListener('DOMContentLoaded', function() {
                        Swal.fire({
                            icon: 'success',
                            title: 'Sukses!',
                            text: 'Data Berhasil Disimpan',
                            confirmButtonText: 'OK',
                            confirmButtonColor: '#10b981'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location = '?page=assistform';
                            }
                        });
                    });
                </script>";
        } else {
            echo "<script>alert('Gagal menyimpan data ke database: " . addslashes($stmt->error) . "'); window.location='?page=assistform';</script>";
        }
        $stmt->close();
    }
}
?>
<style>
    /* body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(to bottom right, #f0f4f8, #d9e2ec);
        } */

    .submit-btn {
        background: linear-gradient(90deg, #3b82f6, #60a5fa);
        color: white;
        padding: 0.85rem 2.5rem;
        border-radius: 0.5rem;
        font-weight: 600;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }

    .submit-btn:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 20px rgba(59, 130, 246, 0.4);
        text-decoration: none;
    }

    .submit-btn:active {
        transform: translateY(-1px);
        box-shadow: 0 5px 10px rgba(59, 130, 246, 0.4);
    }

    .submit-btn::after {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: rgba(255, 255, 255, 0.3);
        transition: left 0.6s ease;
    }

    .submit-btn:hover::after {
        left: 100%;
    }

    .save-btn {
        background: linear-gradient(90deg, #10b981, #34d399);
    }

    .score-meaning-box {
        border: 2px solid #e5e7eb;
        padding: 1.5rem;
        border-radius: 0.5rem;
        margin-top: 2rem;
    }

    .score-meaning-box h2 {
        font-size: 1.5rem;
        font-weight: 600;
        color: #1e40af;
        margin-bottom: 1rem;
    }

    .score-meaning-box ul {
        list-style: none;
        padding: 0;
    }

    .score-meaning-box li {
        margin-bottom: 1rem;
        display: flex;
        align-items: flex-start;
    }

    .score-meaning-box li:last-child {
        margin-bottom: 0;
    }

    .score-meaning-box .icon {
        margin-right: 0.75rem;
        flex-shrink: 0;
    }
    th{
        color: white !important;
    }
</style>
<div class="">
    <div class="bg-white animate-fade-in dark:bg-gray-800">
        <h1 class="text-2xl font-bold text-blue-700 mb-6 dark:text-white">🧾 Hasil Penilaian</h1>
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-700 border rounded-lg overflow-hidden border-collapse">
                <thead class="text-xs text-white uppercase bg-blue-600">
                    <tr>
                        <th class="px-4 py-3 sm:px-6 sm:py-4">Zat</th>
                        <!-- <th class="px-4 py-3 sm:px-6 sm:py-4">Skor</th> -->
                        <th class="px-4 py-3 sm:px-6 sm:py-4">Resiko</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <?php foreach ($results as $index => $data): ?>
                        <tr class="hover:bg-blue-50 transition-colors dark:hover:bg-gray-700 bg-gray-600 dark:text-white">
                            <td class="px-4 py-3 sm:px-6 sm:py-4"><?php echo htmlspecialchars($productLabels[array_search($index, $products)]); ?></td>
                            <!-- <td class="px-4 py-3 sm:px-6 sm:py-4 font-semibold"><?php echo $data['score']; ?></td> -->
                            <td class="px-4 py-3 sm:px-6 sm:py-4">
                                <span class="inline-flex items-center gap-2 px-2 py-1 text-xs font-semibold text-white rounded-full <?php
                                                                                                                                    echo $data['resiko'] === 'Resiko Tinggi' ? 'bg-red-500' : ($data['resiko'] === 'Resiko Sedang' ? 'bg-yellow-400' : 'bg-green-500');
                                                                                                                                    ?>">
                                    <i class="fas <?php
                                                    echo $data['resiko'] === 'Resiko Tinggi' ? 'fa-exclamation-triangle' : ($data['resiko'] === 'Resiko Sedang' ? 'fa-exclamation-circle' : 'fa-check-circle');
                                                    ?>"></i>
                                    <?php echo $data['resiko']; ?>
                                </span>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <!-- Menampilkan informasi terkait skor -->
        <div class="score-meaning-box">
            <h2 class="text-center dark:text-blue-600">APA ARTI SKOR YANG ANDA MILIKI?</h2>
            <ul class="dark:text-white">
                <li>
                    <span class="icon inline-flex items-center justify-center w-6 h-6 text-white bg-green-500 rounded-full">
                        <i class="fas fa-check-circle"></i>
                    </span>
                    <div>
                        <strong>RENDAH:</strong> anda masih berada pada tingkat risiko berdasarkan pola penggunaan zat yang anda gunakan saat ini.
                    </div>
                </li>
                <li>
                    <span class="icon inline-flex items-center justify-center w-6 h-6 text-white bg-yellow-400 rounded-full">
                        <i class="fas fa-exclamation-circle"></i>
                    </span>
                    <div>
                        <strong>SEDANG:</strong> anda sudah berisiko mengalami masalah kesehatan dan masalah lain berdasarkan pola penggunaan zat yang anda gunakan saat ini.
                    </div>
                </li>
                <li>
                    <span class="icon inline-flex items-center justify-center w-6 h-6 text-white bg-red-500 rounded-full">
                        <i class="fas fa-exclamation-triangle"></i>
                    </span>
                    <div>
                        <strong>TINGGI:</strong> anda berada pada tingkat risiko tinggi untuk mengalami masalah yang serius (kesehatan, sosial, keuangan, hukum, hubungan sesama) sebagai akibat pola penggunaan zat yang anda gunakan saat ini dan mungkin juga anda mengalami ketergantungan.
                    </div>
                </li>
            </ul>
        </div>

        <div class="mt-8 text-center space-x-4">
            <form method="POST" class="inline">
                <input type="hidden" name="save_to_db" value="1">
                <?php foreach ($formData as $key => $value): ?>
                    <input type="hidden" name="<?php echo htmlspecialchars($key); ?>" value="<?php echo htmlspecialchars($value); ?>">
                <?php endforeach; ?>
                <button type="submit" class="inline-flex submit-btn save-btn items-center px-6 py-3 text-white font-semibold rounded-xl shadow-md">
                    <i class="fas fa-save mr-2"></i> Simpan Data
                </button>
            </form>
        </div>
    </div>
</div>

<script>
    document.querySelector('.animate-fade-in')?.classList.add('opacity-0');
    window.addEventListener('load', () => {
        const container = document.querySelector('.animate-fade-in');
        container?.classList.remove('opacity-0');
        container?.classList.add('transition-opacity', 'duration-700', 'opacity-100');
    });
</script>