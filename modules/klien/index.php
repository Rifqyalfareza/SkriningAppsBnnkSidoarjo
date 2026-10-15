<div class="bg-white card-shadow transform transition duration-500 hover:scale-[1.01] md:hover:scale-100 animate-slide-in dark:bg-gray-800">
    <h2 class="text-xl sm:text-2xl font-bold pb-4 sm:pb-6 text-blue-700 border-b-2 border-gray-200 dark:text-white">Data Klien</h2>
    <div class="mt-6 sm:mt-10 overflow-x-auto">
        <table id="search-table" class="w-full text-sm sm:text-base text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs sm:text-sm text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th class="px-2 py-2 sm:px-4 sm:py-3">
                        <span class="flex items-center">
                            No
                            <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4" />
                            </svg>
                        </span>
                    </th>
                    <th class="px-2 py-2 sm:px-4 sm:py-3">
                        <span class="flex items-center">
                            Nama Petugas
                            <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4" />
                            </svg>
                        </span>
                    </th>
                    <th class="px-2 py-2 sm:px-4 sm:py-3">
                        <span class="flex items-center">
                            instansi
                            <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4" />
                            </svg>
                        </span>
                    </th>
                    <th class="px-2 py-2 sm:px-4 sm:py-3">
                        <span class="flex items-center">
                            Nama klien
                            <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4" />
                            </svg>
                        </span>
                    </th>
                    <th class="px-2 py-2 sm:px-4 sm:py-3">
                        <span class="flex items-center">
                            tanggal periksa
                            <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4" />
                            </svg>
                        </span>
                    </th>
                    <th class="px-2 py-2 sm:px-4 sm:py-3">
                        <span class="flex items-center">
                            alamat
                            <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4" />
                            </svg>
                        </span>
                    </th>
                    <th class="px-2 py-2 sm:px-4 sm:py-3">
                        <span class="flex items-center">
                            indikasi
                            <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4" />
                            </svg>
                        </span>
                    </th>
                    <th class="px-2 py-2 sm:px-4 sm:py-3">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $bulanIndonesia = [
                    1 => 'Januari',
                    2 => 'Februari',
                    3 => 'Maret',
                    4 => 'April',
                    5 => 'Mei',
                    6 => 'Juni',
                    7 => 'Juli',
                    8 => 'Agustus',
                    9 => 'September',
                    10 => 'Oktober',
                    11 => 'November',
                    12 => 'Desember'
                ];

                if (empty($skrining)) { ?>
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td colspan="7" class="text-center px-4 py-6 text-gray-500 dark:text-gray-400">
                            Tidak ada data
                        </td>
                    </tr>
                    <?php } else {
                    foreach ($skrining as $index => $data) {
                        $date = new DateTime($data['tanggal']);
                        $tanggalFormatted = $date->format('j ') . $bulanIndonesia[(int)$date->format('n')] . $date->format(' Y'); ?>
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <td class="px-2 py-2 sm:px-4 sm:py-3 dark:text-white"><?= $index + 1 ?></td>
                            <td class="px-2 py-2 sm:px-4 sm:py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white"><?= $data['nama_petugas'] ?></td>
                            <td class="px-2 py-2 sm:px-4 sm:py-3 dark:text-white"><?= $data['instansi'] ?></td>
                            <td class="px-2 py-2 sm:px-4 sm:py-3 text-gray-900 whitespace-nowrap dark:text-white"><?= $data['nama_klien'] ?></td>
                            <td class="px-2 py-2 sm:px-4 sm:py-3 dark:text-white"><?= $tanggalFormatted ?></td>
                            <td class="px-2 py-2 sm:px-4 sm:py-3 dark:text-white"><?= $data['tempat'] ?></td>
                            <?php
                            $indikasi = 'Resiko Rendah';
                            $risiko = [
                                $data['tembakau'],
                                $data['alkohol'],
                                $data['kanabis'],
                                $data['kokain'],
                                $data['amfetamin'],
                                $data['inhalansia'],
                                $data['sedativa'],
                                $data['halusinogens'],
                                $data['opioid'],
                            ];

                            if (in_array('Resiko Tinggi', $risiko)) {
                                $indikasi = 'Resiko Tinggi';
                            } elseif (in_array('Resiko Sedang', $risiko)) {
                                $indikasi = 'Resiko Sedang';
                            }
                            ?>
                            <td class="dark:text-white <?= $indikasi === 'Resiko Tinggi' ? 'text-red-500' : ($indikasi === 'Resiko Sedang' ? 'text-yellow-500' : 'text-green-500') ?>"><?= $indikasi ?></td>
                            <td class="px-2 py-2 sm:px-4 sm:py-3 flex flex-col sm:flex-row gap-1 sm:gap-2">
                                <button
                                    data-modal-target="modalHasil"
                                    data-modal-toggle="modalHasil"
                                    data-nama="<?= htmlspecialchars($data['nama_klien']); ?>"
                                    data-tembakau="<?= htmlspecialchars($data['tembakau']); ?>"
                                    data-alkohol="<?= htmlspecialchars($data['alkohol']); ?>"
                                    data-kanabis="<?= htmlspecialchars($data['kanabis']); ?>"
                                    data-kokain="<?= htmlspecialchars($data['kokain']); ?>"
                                    data-amfetamin="<?= htmlspecialchars($data['amfetamin']); ?>"
                                    data-inhalansia="<?= htmlspecialchars($data['inhalansia']); ?>"
                                    data-sedativa="<?= htmlspecialchars($data['sedativa']); ?>"
                                    data-halusinogens="<?= htmlspecialchars($data['halusinogens']); ?>"
                                    data-opioid="<?= htmlspecialchars($data['opioid']); ?>"
                                    data-id="<?= $data['id_skrining']; ?>"
                                    data-tooltip-target="tooltip-hasil-<?= $data['id_skrining'] ?>"
                                    class="bg-blue-700 hover:bg-blue-900 p-1 sm:p-2 transition-colors">
                                    <svg class="w-5 sm:w-5 h-5 sm:h-5 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 4h3a1 1 0 0 1 1 1v15a1 1 0 0 1-1 1H6a1 1 0 0 1-1-1V5a1 1 0 0 1 1-1h3m0 3h6m-6 7 2 2 4-4m-5-9v4h4V3h-4Z" />
                                    </svg>
                                </button>
                                <div id="tooltip-hasil-<?= $data['id_skrining'] ?>" role="tooltip" class="absolute z-10 invisible inline-block px-2 py-1 sm:px-3 sm:py-2 text-xs sm:text-sm font-medium text-white bg-gray-900 rounded-lg shadow-xs opacity-0 transition-opacity duration-300 tooltip dark:bg-gray-700">
                                    Lihat Hasil
                                    <div class="tooltip-arrow" data-popper-arrow></div>
                                </div>
                                <?php if ($id != 1) { ?>
                                    <button data-tooltip-target="tooltip-edit-<?= $data['id_skrining'] ?>" class="bg-yellow-500 hover:bg-yellow-700 p-1 sm:p-2 transition-colors">
                                        <svg class="w-5 sm:w-5 h-5 sm:h-5 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 5V4a1 1 0 0 0-1-1H8.914a1 1 0 0 0-.707.293L4.293 7.207A1 1 0 0 0 4 7.914V20a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-5M9 3v4a1 1 0 0 1-1 1H4m11.383.772 2.745 2.746m1.215-3.906a2.089 2.089 0 0 1 0 2.953l-6.65 6.646L9 17.95l.739-3.692 6.646-6.646a2.087 2.087 0 0 1 2.958 0Z" />
                                        </svg>
                                    </button>
                                    <div id="tooltip-edit-<?= $data['id_skrining'] ?>" role="tooltip" class="absolute z-10 invisible inline-block px-2 py-1 sm:px-3 sm:py-2 text-xs sm:text-sm font-medium text-white bg-gray-900 rounded-lg shadow-xs opacity-0 transition-opacity duration-300 tooltip dark:bg-gray-700">
                                        Edit Data
                                        <div class="tooltip-arrow" data-popper-arrow></div>
                                    </div>
                                    <button data-tooltip-target="tooltip-hapus-<?= $data['id_skrining'] ?>" class="bg-red-700 hover:bg-red-900 p-1 sm:p-2 transition-colors">
                                        <svg class="w-5 sm:w-5 h-5 sm:h-5 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z" />
                                        </svg>
                                    </button>
                                    <div id="tooltip-hapus-<?= $data['id_skrining'] ?>" role="tooltip" class="absolute z-10 invisible inline-block px-2 py-1 sm:px-3 sm:py-2 text-xs sm:text-sm font-medium text-white bg-gray-900 rounded-lg shadow-xs opacity-0 transition-opacity duration-300 tooltip dark:bg-gray-700">
                                        Hapus Data
                                        <div class="tooltip-arrow" data-popper-arrow></div>
                                    </div>
                                <?php } ?>
                                <button
                                    class="generate-pdf bg-green-600 hover:bg-green-800 p-1"
                                    data-nama_klien="<?= addslashes(htmlspecialchars($data['nama_klien'])) ?>"
                                    data-petugas="<?= addslashes(htmlspecialchars($data['nama_petugas'])) ?>"
                                    data-tanggal="<?= $tanggalFormatted ?>"
                                    data-tempat="<?= addslashes(htmlspecialchars($data['tempat'])) ?>"
                                    data-tembakau="<?= addslashes(htmlspecialchars($data['tembakau'])) ?>"
                                    data-alkohol="<?= addslashes(htmlspecialchars($data['alkohol'])) ?>"
                                    data-kanabis="<?= addslashes(htmlspecialchars($data['kanabis'])) ?>"
                                    data-kokain="<?= addslashes(htmlspecialchars($data['kokain'])) ?>"
                                    data-amfetamin="<?= addslashes(htmlspecialchars($data['amfetamin'])) ?>"
                                    data-inhalansia="<?= addslashes(htmlspecialchars($data['inhalansia'])) ?>"
                                    data-sedativa="<?= addslashes(htmlspecialchars($data['sedativa'])) ?>"
                                    data-halusinogens="<?= addslashes(htmlspecialchars($data['halusinogens'])) ?>"
                                    data-opioid="<?= addslashes(htmlspecialchars($data['opioid'])) ?>"
                                    data-tooltip-target="tooltip-download-<?= $data['id_skrining'] ?>">
                                    <svg class="w-5 h-5 text-white dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linejoin="round" stroke-width="2" d="M16.444 18H19a1 1 0 0 0 1-1v-5a1 1 0 0 0-1-1H5a1 1 0 0 0-1 1v5a1 1 0 0 0 1 1h2.556M17 11V5a1 1 0 0 0-1-1H8a1 1 0 0 0-1 1v6h10ZM7 15h10v4a1 1 0 0 1-1 1H8a1 1 0 0 1-1-1v-4Z" />
                                    </svg>
                                </button>
                                <div id="tooltip-download-<?= $data['id_skrining'] ?>" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-xs opacity-0 tooltip dark:bg-gray-700">
                                    Cetak PDF
                                    <div class="tooltip-arrow" data-popper-arrow></div>
                                </div>
                            </td>
                        </tr>
                    <?php } ?>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
<?php include_once './modules/assist/modalHasil.php'; ?>
<style>
    .modal {
        transition: opacity 0.3s ease-in-out;
        z-index: 99999 !important;
    }

    .modal.hidden {
        display: none;
    }

    .modal-content {
        transform: translateY(-10px);
        transition: transform 0.3s ease-in-out;
    }

    .modal:not(.hidden) .modal-content {
        transform: translateY(0);
    }

    .risk-low {
        color: #10b981;
    }

    .risk-medium {
        color: #f59e0b;
    }

    .risk-high {
        color: #ef4444;
    }
</style>
<script src="https://unpkg.com/feather-icons"></script>
<script>
    feather.replace();

    function renderRiskIcon(risk) {
        switch (risk) {
            case 'Resiko Rendah':
                return '<i data-feather="check-circle" class="risk-low w-4 h-4"></i> <span class="text-xs">Resiko Rendah</span>';
            case 'Resiko Sedang':
                return '<i data-feather="alert-circle" class="risk-medium w-4 h-4"></i> <span class="text-xs">Resiko Sedang</span>';
            case 'Resiko Tinggi':
                return '<i data-feather="x-circle" class="risk-high w-4 h-4"></i> <span class="text-xs">Resiko Tinggi</span>';
            default:
                return '-';
        }
    }

    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('[data-modal-target="modalHasil"]').forEach(button => {
            button.addEventListener('click', function() {
                const modal = document.getElementById('modalHasil');
                const tembakau = this.getAttribute('data-tembakau');
                const alkohol = this.getAttribute('data-alkohol');
                const kanabis = this.getAttribute('data-kanabis');
                const kokain = this.getAttribute('data-kokain');
                const amfetamin = this.getAttribute('data-amfetamin');
                const inhalansia = this.getAttribute('data-inhalansia');
                const sedativa = this.getAttribute('data-sedativa');
                const halusinogens = this.getAttribute('data-halusinogens');
                const opioid = this.getAttribute('data-opioid');
                const title = document.getElementById('tittle');
                title.innerHTML = 'Hasil Assist ' + this.getAttribute('data-nama');

                document.getElementById('hasilTembakau').innerHTML = renderRiskIcon(tembakau);
                document.getElementById('hasilAlkohol').innerHTML = renderRiskIcon(alkohol);
                document.getElementById('hasilKanabis').innerHTML = renderRiskIcon(kanabis);
                document.getElementById('hasilKokain').innerHTML = renderRiskIcon(kokain);
                document.getElementById('hasilAmfetamin').innerHTML = renderRiskIcon(amfetamin);
                document.getElementById('hasilInhalansia').innerHTML = renderRiskIcon(inhalansia);
                document.getElementById('hasilSedativa').innerHTML = renderRiskIcon(sedativa);
                document.getElementById('hasilHalusinogens').innerHTML = renderRiskIcon(halusinogens);
                document.getElementById('hasilOpioid').innerHTML = renderRiskIcon(opioid);

                feather.replace();

                modal.classList.remove('hidden');
            });
        });
        document.querySelectorAll('.generate-pdf').forEach(button => {
            button.addEventListener('click', function() {
                try {
                    const data = {
                        nama_klien: this.getAttribute('data-nama_klien') || 'Unknown',
                        petugas: this.getAttribute('data-petugas') || 'Unknown',
                        tanggal: this.getAttribute('data-tanggal') || 'Unknown',
                        tempat: this.getAttribute('data-tempat') || 'Unknown',
                        tembakau: this.getAttribute('data-tembakau') || 'Unknown',
                        alkohol: this.getAttribute('data-alkohol') || 'Unknown',
                        kanabis: this.getAttribute('data-kanabis') || 'Unknown',
                        kokain: this.getAttribute('data-kokain') || 'Unknown',
                        amfetamin: this.getAttribute('data-amfetamin') || 'Unknown',
                        inhalansia: this.getAttribute('data-inhalansia') || 'Unknown',
                        sedativa: this.getAttribute('data-sedativa') || 'Unknown',
                        halusinogens: this.getAttribute('data-halusinogens') || 'Unknown',
                        opioid: this.getAttribute('data-opioid') || 'Unknown'
                    };
                    generatePDF(data);
                } catch (error) {
                    console.error('Error generating PDF:', error);
                    alert('Failed to generate PDF. Please try again or check the console for details.');
                }
            });
        });

    });

    function generatePDF(data) {
        const {
            jsPDF
        } = window.jspdf;
        if (!jsPDF) {
            throw new Error('jsPDF is not loaded');
        }

        const doc = new jsPDF({
            orientation: 'portrait',
            unit: 'mm',
            format: 'a4'
        });

        doc.setFont('times');
        doc.setFontSize(12);

        const pageWidth = 210;
        const pageHeight = 297;
        const margin = 20;
        const maxWidth = pageWidth - 2 * margin;
        let y = 25;

        doc.setFontSize(16);
        doc.setFont('times', 'bold');
        doc.text('KARTU UMPAN BALIK UNTUK PASIEN', pageWidth / 2, y, {
            align: 'center'
        });
        y += 15;

        doc.setFontSize(14);
        doc.setFont('times', 'bold');
        doc.text('Identitas', margin, y);
        y += 5;

        doc.setFontSize(11);
        doc.setFont('times', 'normal');

        const identitas = [{
                label: 'Nama Klien',
                value: data.nama_klien
            },
            {
                label: 'Petugas',
                value: data.petugas
            },
            {
                label: 'Tanggal Skrining',
                value: data.tanggal
            },
            {
                label: 'Alamat',
                value: data.tempat
            }
        ];

        const cellPadding = 3;
        const rowHeight = 7;

        identitas.forEach((item) => {
            doc.setFont('times', 'bold');
            doc.text(item.label, margin, y + rowHeight / 2);
            doc.setFont('times', 'normal');
            doc.text(': ' + item.value, margin + 40, y + rowHeight / 2);
            y += rowHeight + cellPadding;
        });

        y += 10;

        // Hasil Skrining Section
        doc.setFontSize(14);
        doc.setFont('times', 'bold');
        doc.text('Hasil Skrining', margin, y);
        y += 10;

        doc.setFontSize(11);
        doc.setFont('times', 'normal');

        const hasilSkrining = [{
                label: 'Tembakau',
                value: data.tembakau
            },
            {
                label: 'Alkohol',
                value: data.alkohol
            },
            {
                label: 'Kanabis',
                value: data.kanabis
            },
            {
                label: 'Kokain',
                value: data.kokain
            },
            {
                label: 'Amfetamin',
                value: data.amfetamin
            },
            {
                label: 'Inhalansia',
                value: data.inhalansia
            },
            {
                label: 'Sedativa',
                value: data.sedativa
            },
            {
                label: 'Halusinogen',
                value: data.halusinogens
            },
            {
                label: 'Opioid',
                value: data.opioid
            }
        ];

        const colW = maxWidth / 2;
        const midPoint = Math.ceil(hasilSkrining.length / 2);
        const leftColumn = hasilSkrining.slice(0, midPoint);
        const rightColumn = hasilSkrining.slice(midPoint);

        doc.setLineWidth(0.2);
        doc.line(margin, y - 3, margin + maxWidth, y - 3);

        const maxRows = Math.max(leftColumn.length, rightColumn.length);
        for (let i = 0; i < maxRows; i++) {
            if (i < leftColumn.length) {
                const item = leftColumn[i];
                doc.setFont('times', 'bold');
                doc.text(item.label, margin, y + rowHeight / 2);
                doc.setFont('times', 'normal');
                doc.text(': ' + item.value, margin + 35, y + rowHeight / 2);
            }
            if (i < rightColumn.length) {
                const item = rightColumn[i];
                doc.setFont('times', 'bold');
                doc.text(item.label, margin + colW + 10, y + rowHeight / 2);
                doc.setFont('times', 'normal');
                doc.text(': ' + item.value, margin + colW + 45, y + rowHeight / 2);
            }
            y += rowHeight + cellPadding;
            if (i < maxRows - 1) {
                doc.line(margin, y - 3, margin + maxWidth, y - 3);
            }
        }

        doc.line(margin, y - 3, margin + maxWidth, y - 3);
        y += 15;

        const riskLevels = [
            data.tembakau,
            data.alkohol,
            data.kanabis,
            data.kokain,
            data.amfetamin,
            data.inhalansia,
            data.sedativa,
            data.halusinogens,
            data.opioid
        ];

        let riskLevel = 'Rendah';
        if (riskLevels.includes('Resiko Tinggi')) {
            riskLevel = 'Tinggi';
        } else if (riskLevels.includes('Resiko Sedang')) {
            riskLevel = 'Sedang';
        }

        doc.setFontSize(14);
        doc.setFont('times', 'bold');
        doc.text('Kesimpulan', margin, y);
        y += 10;

        doc.setFontSize(12);
        doc.setFont('times', 'bold');
        doc.text('Resiko ' + riskLevel, margin, y);
        y += 7;

        doc.setFont('times', 'normal');
        doc.setFontSize(11);

        let kesimpulanText = '';
        if (riskLevel === 'Rendah') {
            kesimpulanText = 'Anda masih berada pada tingkat risiko berdasarkan pola penggunaan zat yang anda gunakan saat ini. (Anda cukup di intervensi singkat oleh petugas assist disini)';
        } else if (riskLevel === 'Sedang') {
            kesimpulanText = 'Anda sudah berisiko mengalami masalah kesehatan dan masalah lain berdasarkan pola penggunaan zat yang anda gunakan saat ini. (Anda perlu intervensi lanjutan oleh petugas asesmen BNN Kabupaten Sidoarjo).';
        } else {
            kesimpulanText = 'Anda berada pada tingkat risiko tinggi untuk mengalami masalah yang serius (kesehatan, sosial, keuangan, hukum, hubungan sesama) sebagai akibat pola penggunaan zat yang anda gunakan saat ini dan mungkin juga anda mengalami ketergantungan. (Anda perlu intervensi lanjutan oleh petugas asesmen BNN Kabupaten Sidoarjo).';
        }

        const splitText = doc.splitTextToSize(kesimpulanText, maxWidth);
        doc.text(splitText, margin, y);
        y += splitText.length * 6 + 10;

        // Tanda tangan
        doc.setFontSize(11);
        doc.setFont('times', 'normal');

        const months = [
            'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
            'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
        ];
        const today = new Date();
        const signatureDate = `Sidoarjo, ${today.getDate()} ${months[today.getMonth()]} ${today.getFullYear()}`;

        const signatureX = pageWidth - margin - 60;
        doc.text(signatureDate, signatureX, y);
        y += 7;

        doc.text('Petugas Assist,', signatureX, y);
        y += 20;

        doc.setLineWidth(0.3);
        doc.line(signatureX, y, signatureX + 50, y);
        y += 7;

        doc.setFont('times', 'bold');
        doc.text(data.petugas, signatureX, y);

        // Footer
        doc.setTextColor(150, 150, 150);
        doc.setFontSize(8);
        doc.setFont('times', 'normal');

        const footerY = pageHeight - 10;
        const timestamp = new Date();
        const hours = String(timestamp.getHours()).padStart(2, '0');
        const minutes = String(timestamp.getMinutes()).padStart(2, '0');
        const seconds = String(timestamp.getSeconds()).padStart(2, '0');
        const day = String(timestamp.getDate()).padStart(2, '0');
        const month = String(timestamp.getMonth() + 1).padStart(2, '0');
        const year = timestamp.getFullYear();

        const timestampText = `Dicetak pada: ${day}/${month}/${year} ${hours}:${minutes}:${seconds}`;
        doc.text(timestampText, margin, footerY);
        doc.text('© BNN Kabupaten Sidoarjo', pageWidth / 2, footerY, {
            align: 'center'
        });
        doc.text('Halaman 1 dari 1', pageWidth - margin, footerY, {
            align: 'right'
        });

        doc.setTextColor(0, 0, 0);

        try {
            const cleanName = data.nama_klien.replace(/[^\w\s]/gi, '');
            doc.save(`Kartu_Umpan_Balik_${cleanName}.pdf`);
        } catch (error) {
            console.error('Error saving PDF:', error);
            alert('Failed to download PDF. Please check the console for details.');
        }
    }

    function closeModalHasil() {
        const modal = document.getElementById('modalHasil');
        modal.classList.add('hidden');
    }
    document.addEventListener('keydown', function(event) {
        if (event.key === 'Escape') {
            closeModalHasil();
        }
    });
</script>