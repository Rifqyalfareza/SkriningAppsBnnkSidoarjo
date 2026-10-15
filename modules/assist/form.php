<?php include './data/product.php'; ?>
<style>
    .animate-pulse-slow {
        animation: pulse 3s ease-in-out infinite;
    }

    .animate-slide-in {
        animation: slideIn 0.5s ease-out forwards;
    }

    .animate-fade-in {
        animation: fadeIn 0.4s ease-out;
    }

    .btn-hover {
        transition: all 0.3s ease;
    }

    .btn-hover:hover {
        transform: translateY(-3px);
        box-shadow: 0 4px 12px rgba(59, 130, 246, 0.4);
    }

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

    .radio-button {
        display: none !important;
    }

    .radio-label {
        display: flex;
        align-items: center;
        padding: 0.5rem 1rem;
        border: 2px solid #e5e7eb;
        border-radius: 0.375rem;
        cursor: pointer;
        transition: all 0.2s;
        position: relative;
    }

    .radio-label .check-dot {
        display: none;
        /* Hide the check-dot completely */
    }

    .radio-button:checked+.radio-label {
        border-color: #3b82f6;
        background-color: #eff6ff;
    }

    .radio-label:hover {
        border-color: #60a5fa;
    }

    .input-icon {
        position: absolute;
        left: 0.75rem;
        top: 50%;
        transform: translateY(-50%);
        pointer-events: none;
    }

    .error-message {
        display: none;
        color: #ef4444;
        font-size: 0.875rem;
        margin-top: 0.5rem;
    }

    .error-border {
        border-color: #ef4444 !important;
    }
</style>
<div class="dark:bg-gray-800">
    <div class="bg-white transform transition duration-500 hover:scale-[1.01] animate-slide-in dark:bg-gray-800">
        <h2 class="text-2xl font-semibold pb-6 text-blue-700 border-b-2 border-gray-200 dark:text-white">Form Assist V3.1</h2>
        <form id="assistForm" method="POST" class="space-y-8 mt-10" action="?page=assistform-result">
            <input type="hidden" name="submit_form" value="1">
            <div class="grid gap-6 mb-6 md:grid-cols-2">
                <div>
                    <label for="namaPetugas" class="block mb-2 text-sm font-semibold text-gray-700 dark:text-white">Nama Petugas</label>
                    <div class="relative">
                        <span class="input-icon">
                            <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                        </span>
                        <input type="text" id="namaPetugas" name="namaPetugas" class="ps-10 bg-gray-50 border border-gray-300 text-gray-700 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukkan Nama Petugas" required />
                    </div>
                    <p class="error-message hidden" id="namaPetugas-error">Harap masukkan nama petugas</p>
                </div>
                <!-- Nama Klien -->
                <div>
                    <label for="namaKlien" class="block mb-2 text-sm font-semibold text-gray-700 dark:text-white">Nama Klien</label>
                    <div class="relative">
                        <span class="input-icon">
                            <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                        </span>
                        <input type="text" id="namaKlien" name="namaKlien" class="ps-10 bg-gray-50 border border-gray-300 text-gray-700 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukkan Nama Klien" required />
                    </div>
                    <p class="error-message hidden" id="namaKlien-error">Harap masukkan nama klien.</p>
                </div>
                <!-- Tanggal Periksa -->
                <div>
                    <label for="tanggal" class="block mb-2 text-sm font-semibold text-gray-700 dark:text-white">Tanggal Periksa</label>
                    <div class="relative">
                        <span class="input-icon">
                            <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                        </span>
                        <input name="tanggal" id="tanggal" type="date" class="ps-10 bg-gray-50 border border-gray-300 text-gray-700 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                    </div>
                    <p class="error-message hidden" id="tanggal-error">Harap pilih tanggal periksa.</p>
                </div>
                <!-- Lokasi -->
                <div>
                    <label for="lokasi" class="block mb-2 text-sm font-semibold text-gray-700 dark:text-white">Alamat</label>
                    <div class="relative">
                        <span class="input-icon">
                            <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                            </svg>
                        </span>
                        <input type="text" id="lokasi" name="lokasi" class="ps-10 bg-gray-50 border border-gray-300 text-gray-700 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukkan Alamat" required />
                    </div>
                    <p class="error-message hidden" id="lokasi-error">Harap masukkan alamat.</p>
                </div>
                <!-- ID Petugas -->
                <!-- <div>
                    <label for="id_petugas" class="block mb-2 text-sm font-semibold text-gray-700">ID Petugas</label>
                    <div class="relative">
                        <span class="input-icon">
                            <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                            </svg>
                        </span>
                        <input type="text" id="id_petugas" name="id_petugas" class="ps-10 bg-gray-50 border border-gray-300 text-gray-700 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Masukkan ID Petugas" required />
                    </div>
                    <p class="error-message hidden" id="id_petugas-error">Harap masukkan ID petugas.</p>
                </div> -->
            </div>
            <!-- Substance Usage Questions -->
            <div class="py-6">
                <div class="bg-blue-50 p-4 rounded-lg shadow-sm dark:bg-gray-700">
                    <div class="flex items-start">
                        <svg class="w-6 h-6 text-blue-500 mr-2 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5.464V3.099m0 2.365a5.338 5.338 0 0 1 5.133 5.368v1.8c0 2.386 1.867 2.982 1.867 4.175C19 17.4 19 18 18.462 18H5.538C5 18 5 17.4 5 16.807c0-1.193 1.867-1.789 1.867-4.175v-1.8A5.338 5.338 0 0 1 12 5.464ZM6 5 5 4M4 9H3m15-4 1-1m1 5h1M8.54 18a3.48 3.48 0 0 0 6.92 0H8.54Z" />
                        </svg>
                        <p class="text-gray- Hawkins=" round" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 2a10 10 0 100 20 10 10 0 000-20zm0 2a8 8 0 110 16 8 8 0 010-16zm0 2a6 6 0 100 12 6 6 0 000-12zm0 2a4 4 0 110 8 4 4 0 010-8zm0 2a2 2 0 100 4 2 2 0 000-4z"></path>
                            </svg>
                        <p class="text-gray-700 text-sm dark:text-white">
                            <span class="font-semibold">WAJIB Menjawab Semua Pertanyaan</span>
                        </p>
                    </div>
                </div>
                <div class="bg-blue-50 p-4 rounded-lg shadow-sm dark:bg-gray-700 mt-2">
                    <div class="flex items-start">
                        <svg class="w-6 h-6 text-blue-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <p class="text-gray- Hawkins=" round" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 2a10 10 0 100 20 10 10 0 000-20zm0 2a8 8 0 110 16 8 8 0 010-16zm0 2a6 6 0 100 12 6 6 0 000-12zm0 2a4 4 0 110 8 4 4 0 010-8zm0 2a2 2 0 100 4 2 2 0 000-4z"></path>
                            </svg>
                        <p class="text-gray-700 text-sm dark:text-white">
                            Dalam kehidupan anda, zat apa dibawah ini yang pernah digunakan? (di luar penggunaan dengan alasan medis)
                        </p>
                    </div>
                </div>
            </div>

            <div class="space-y-8" id="produkList">
                <?php foreach ($products as $index => $product): ?>
                    <div class="bg-white dark:bg-gray-800 rounded-xl shadow overflow-hidden transition-all duration-300 hover:-translate-y-1 hover:shadow-lg" id="product_<?php echo $index; ?>">
                        <div class="border-b border-gray-100 dark:border-gray-700 transition-colors">
                            <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 py-3 px-4">
                                <div class="flex items-center gap-4">
                                    <span class="flex items-center justify-center w-10 h-10 rounded-full bg-blue-100 text-blue-600 dark:bg-blue-900 dark:text-blue-300 font-medium text-sm">
                                        <?php echo $index + 1; ?>
                                    </span>
                                    <h4 class="text-gray-900 dark:text-white font-normal sm:text-sm">
                                        <?php echo htmlspecialchars($productLabels[$index]); ?>
                                    </h4>
                                </div>
                                <div class="flex flex-col sm:flex-row items-center gap-4 sm:gap-8">
                                    <!-- Pernah -->
                                    <label class="inline-flex items-center px-6 py-2 sm:px-8 sm:py-3 rounded-lg cursor-pointer transition-all duration-200 border-2 border-gray-200 dark:border-gray-600 hover:border-blue-400 w-full sm:w-auto justify-center">
                                        <input type="radio"
                                            class="pernah radio-button"
                                            name="produk_<?php echo $index; ?>"
                                            id="pernah_<?php echo $index; ?>"
                                            value="pernah"
                                            onclick="toggleWaktu(<?php echo $index; ?>)">
                                        <span class="radio-label flex items-center justify-center w-5 h-5 rounded-full border-2 border-gray-300 dark:border-gray-500 mr-3 relative">
                                            <span class="check-dot absolute inset-0 rounded-full bg-blue-500"></span>
                                        </span>
                                        <span class="text-gray-700 dark:text-white font-medium text-sm sm:text-base">Pernah</span>
                                    </label>

                                    <!-- Tidak Pernah -->
                                    <label class="inline-flex items-center px-6 py-2 sm:px-8 sm:py-3 rounded-lg cursor-pointer transition-all duration-200 border-2 border-gray-200 dark:border-gray-600 hover:border-blue-400 w-full sm:w-auto justify-center">
                                        <input type="radio"
                                            class="tidak-pernah radio-button"
                                            name="produk_<?php echo $index; ?>"
                                            id="tidakPernah_<?php echo $index; ?>"
                                            value="tidakPernah"
                                            onclick="toggleWaktu(<?php echo $index; ?>)">
                                        <span class="radio-label flex items-center justify-center w-5 h-5 rounded-full border-2 border-gray-300 dark:border-gray-500 mr-3 relative">
                                            <span class="check-dot absolute inset-0 rounded-full bg-blue-500"></span>
                                        </span>
                                        <span class="text-gray-700 dark:text-white font-medium text-sm sm:text-base">Tidak Pernah</span>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <p class="error-message text-red-500 px-4 text-sm dark:text-red-400" id="product_<?php echo $index; ?>-error">
                            Harap pilih salah satu opsi (Pernah atau Tidak Pernah).
                        </p>

                        <!-- Follow-up Questions -->
                        <div id="followUpQuestions_<?php echo $index; ?>" class="hidden p-4 sm:p-6 space-y-6 sm:space-y-8 bg-blue-50 dark:bg-gray-700 bg-opacity-30">
                            <?php foreach ($questions as $qIndex => $question): ?>
                                <div class="bg-white dark:bg-gray-800 rounded-xl p-4 sm:p-5 shadow-sm animate-slide-in" style="animation-delay: <?php echo $qIndex * 0.1; ?>s">
                                    <div class="flex items-start gap-3 mb-4 sm:mb-5">
                                        <span class="flex items-center justify-center w-7 h-7 rounded-full bg-blue-100 text-blue-600 dark:bg-blue-900 dark:text-blue-300 text-sm font-semibold mt-0.5 shadow-sm">
                                            <?php echo $qIndex + 1; ?>
                                        </span>
                                        <p class="text-gray-800 dark:text-white font-semibold text-sm sm:text-base">
                                            <?php echo htmlspecialchars($question['label']); ?>
                                        </p>
                                    </div>
                                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-3 sm:gap-4">
                                        <?php foreach ($question['options'] as $optIndex => $option): ?>
                                            <label class="flex items-center p-3 bg-white dark:bg-gray-900 rounded-lg border-2 border-gray-200 dark:border-gray-600 hover:border-blue-400 cursor-pointer transition-all duration-200">
                                                <input type="radio"
                                                    name="waktu_<?php echo $index; ?>_<?php echo $qIndex; ?>"
                                                    id="<?php echo $option['id']; ?>_<?php echo $index; ?>"
                                                    value="<?php echo htmlspecialchars($option['value']); ?>"
                                                    data-points="<?php echo $option['points']; ?>"
                                                    class="radio-button">
                                                <span class="radio-label flex items-center justify-center w-5 h-5 rounded-full border-2 border-gray-300 dark:border-gray-500 mr-3 relative">
                                                    <span class="check-dot absolute inset-0 rounded-full bg-blue-500"></span>
                                                </span>
                                                <span class="text-sm text-gray-700 dark:text-white"><?php echo htmlspecialchars($option['label']); ?></span>
                                            </label>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>


            <!-- Submit Button -->
            <div class="mt-10 text-center space-y-4">
                <p class="text-gray-600 text-sm italic">Formulir ini digunakan untuk mengidentifikasi pola penggunaan zat dan masalah terkait</p>
                <button type="submit" name="submit_form" id="submitBtn" class="bg-blue-600 submit-btn hover:bg-blue-700 text-white font-bold py-3 px-8 rounded-xl shadow-lg transition duration-300 ease-in-out transform btn-hover flex items-center justify-center mx-auto">
                    <span>Cek Hasil</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </button>
            </div>
        </form>
    </div>
</div>
<script>
    // Initialize error messages to be hidden
    document.addEventListener('DOMContentLoaded', function() {
        // Hide all product error messages
        document.querySelectorAll('.error-message').forEach(error => {
            error.style.display = 'none';
        });

        // Custom radio button functionality
        const radioButtons = document.querySelectorAll('.radio-button');
        radioButtons.forEach(radio => {
            radio.addEventListener('change', function() {
                const name = this.name;
                const siblings = document.querySelectorAll(`input[name="${name}"]`);
                siblings.forEach(sibling => {
                    sibling.parentElement.classList.remove('border-blue-500', 'bg-blue-50');
                });
                if (this.checked) {
                    this.parentElement.classList.add('border-blue-500', 'bg-blue-50');
                }
            });
        });

        // Update progress bar
        updateProgress();
    });

    // Form validation
    document.getElementById('assistForm').addEventListener('submit', function(e) {
        let valid = true;

        // Validate text inputs
        const fields = ['lokasi', 'tanggal', 'namaKlien', 'namaPetugas'];
        fields.forEach(field => {
            const input = document.getElementById(field);
            const error = document.getElementById(`${field}-error`);
            if (!input.value.trim()) {
                error.style.display = 'block';
                input.parentElement.classList.add('error-border');
                valid = false;
            } else {
                error.style.display = 'none';
                input.parentElement.classList.remove('error-border');
            }
        });

        // Validate radio buttons for each product
        const products = document.querySelectorAll('#produkList > div');
        products.forEach((product, index) => {
            const pernah = document.getElementById(`pernah_${index}`);
            const tidakPernah = document.getElementById(`tidakPernah_${index}`);
            const error = document.getElementById(`product_${index}-error`);
            const productContainer = document.getElementById(`product_${index}`);
            if (!pernah.checked && !tidakPernah.checked) {
                error.style.display = 'block';
                productContainer.classList.add('error-border');
                valid = false;
            } else {
                error.style.display = 'none';
                productContainer.classList.remove('error-border');
            }
        });

        if (!valid) {
            e.preventDefault();
            const firstError = document.querySelector('.error-message[style="display: block"]');
            if (firstError) {
                firstError.scrollIntoView({
                    behavior: 'smooth',
                    block: 'center'
                });
            }
        }
    });

    // Toggle follow-up questions
    function toggleWaktu(productIndex, isProductRadio) {
        console.log(`toggleWaktu called for productIndex: ${productIndex}, isProductRadio: ${isProductRadio}`); // Debug
        const pernah = document.getElementById(`pernah_${productIndex}`).checked;
        const followUpQuestions = document.getElementById(`followUpQuestions_${productIndex}`);
        const error = document.getElementById(`product_${productIndex}-error`);
        const productContainer = document.getElementById(`product_${productIndex}`);
        if (!followUpQuestions) {
            console.error(`Follow-up questions div not found for index: ${productIndex}`);
            return;
        }
        if (pernah) {
            followUpQuestions.classList.remove('hidden');
            followUpQuestions.classList.add('animate-fade-in');
            if (isProductRadio) { // Only scroll for "Pernah"/"Tidak Pernah" clicks
                setTimeout(() => {
                    followUpQuestions.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }, 100);
            }
        } else {
            followUpQuestions.classList.add('hidden');
            followUpQuestions.classList.remove('animate-fade-in');
        }
        error.style.display = 'none';
        productContainer.classList.remove('error-border');
        updateProgress();
    }

    // Update progress bar
    function updateProgress() {
        const products = document.querySelectorAll('#produkList > div');
        let answered = 0;
        let total = products.length;
        products.forEach((product, index) => {
            const pernah = document.getElementById(`pernah_${index}`);
            const tidakPernah = document.getElementById(`tidakPernah_${index}`);
            if (pernah && tidakPernah && (pernah.checked || tidakPernah.checked)) {
                answered++;
            }
        });
        const progressBar = document.getElementById('progressBar');
        if (progressBar) {
            const progressPercentage = (answered / total) * 100;
            progressBar.style.width = `${progressPercentage}%`;
        }
    }
</script>