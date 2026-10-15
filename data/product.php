<?php
$products = [
    'Tembakau',
    'Alkohol',
    'Kanabis',
    'Kokain',
    'Amfetamin',
    'Inhalansia',
    'Sedativa',
    'Halusinogen',
    'Opioid'
];

$productLabels = [
    'Produk Tembakau (Rokok, Cerutu, Kretek, dll.)',
    'Minuman Beralkohol (Bir, Anggur, Sopi, Tomi, dll.)',
    'Kanabis (Marijuana, Ganja, Gelek, Cimengpot, dll.)',
    'Kokain (Coke, Crack, dll.)',
    'Stimulan Jenis Amfetamin (Ekstasi, Shabu, dll.)',
    'Inhalansia (Lem, Bensin, Tiner, dll.)',
    'Sedativa atau Obat Tidur (Benzodiazepin, Lexotan, Rohypnol, Mogadon, dll.)',
    'Halusinogen (LSD, Mushrooms, PCP, dll.)',
    'Opioid (Heroin, Morfin, Metadon, Kodein, dll.)'
];

$questions = [
    [
        'label' => 'Dalam 3 bulan terakhir, seberapa sering anda menggunakan zat tersebut?',
        'options' => [
            ['value' => 'tidakPernah', 'label' => 'Tidak Pernah', 'id' => 'tidakPernah', 'points' => 0],
            ['value' => '1/2kali', 'label' => 'Sekali atau Dua Kali', 'id' => '1/2kali', 'points' => 2],
            ['value' => 'tiapbulan', 'label' => 'Setiap Bulan', 'id' => 'tiapbulan', 'points' => 3],
            ['value' => 'tiapminggu', 'label' => 'Setiap Minggu', 'id' => 'tiapminggu', 'points' => 4],
            ['value' => 'selalu', 'label' => 'Selalu atau Hampir Selalu', 'id' => 'selalu', 'points' => 6]
        ]
    ],
    [
        'label' => 'Dalam 3 bulan terakhir, seberapa sering anda mempunyai keinginan atau dorongan yang kuat untuk menggunakan zat tersebut?',
        'options' => [
            ['value' => 'tidakPernah_2', 'label' => 'Tidak Pernah', 'id' => 'tidakPernah_2', 'points' => 0],
            ['value' => '1/2kali_2', 'label' => 'Sekali atau Dua Kali', 'id' => '1/2kali_2', 'points' => 2],
            ['value' => 'tiapbulan_2', 'label' => 'Setiap Bulan', 'id' => 'tiapbulan_2', 'points' => 3],
            ['value' => 'tiapminggu_2', 'label' => 'Setiap Minggu', 'id' => 'tiapminggu_2', 'points' => 4],
            ['value' => 'selalu_2', 'label' => 'Selalu atau Hampir Selalu', 'id' => 'selalu_2', 'points' => 6]
        ]
    ],
    [
        'label' => 'Dalam 3 bulan terakhir, seberapa sering penggunaan zat tersebut menyebabkan masalah kesehatan, sosial, hukum, atau keuangan?',
        'options' => [
            ['value' => 'tidakPernah_3', 'label' => 'Tidak Pernah', 'id' => 'tidakPernah_3', 'points' => 0],
            ['value' => '1/2kali_3', 'label' => 'Sekali atau Dua Kali', 'id' => '1/2kali_3', 'points' => 4],
            ['value' => 'tiapbulan_3', 'label' => 'Setiap Bulan', 'id' => 'tiapbulan_3', 'points' => 5],
            ['value' => 'tiapminggu_3', 'label' => 'Setiap Minggu', 'id' => 'tiapminggu_3', 'points' => 6],
            ['value' => 'tiaphari_3', 'label' => 'Harian atau Hampir Tiap Hari', 'id' => 'tiaphari_3', 'points' => 7]
        ]
    ],
    [
        'label' => 'Dalam 3 bulan terakhir, seberapa sering anda gagal melakukan hal-hal yang biasanya diharapkan dari anda akibat penggunaan zat tersebut?',
        'options' => [
            ['value' => 'tidakPernah_4', 'label' => 'Tidak Pernah', 'id' => 'tidakPernah_4', 'points' => 0],
            ['value' => '1/2kali_4', 'label' => 'Sekali atau Dua Kali', 'id' => '1/2kali_4', 'points' => 5],
            ['value' => 'tiapbulan_4', 'label' => 'Setiap Bulan', 'id' => 'tiapbulan_4', 'points' => 6],
            ['value' => 'tiapminggu_4', 'label' => 'Setiap Minggu', 'id' => 'tiapminggu_4', 'points' => 7],
            ['value' => 'tiaphari_4', 'label' => 'Harian atau Hampir Tiap Hari', 'id' => 'tiaphari_4', 'points' => 8]
        ]
    ],
    [
        'label' => 'Pernahkah teman atau keluarga atau orang lain mengekspresikan kekhawatiran tentang penggunaan zat tersebut?',
        'options' => [
            ['value' => 'tidakPernah_5', 'label' => 'Tidak Pernah', 'id' => 'tidakPernah_5', 'points' => 0],
            ['value' => '3bulan', 'label' => 'Pernah, 3 Bulan terakhir', 'id' => '3bulan', 'points' => 6],
            ['value' => 'tidak3bulan', 'label' => 'Pernah, Tidak 3 Bulan terakhir', 'id' => 'tidak3bulan', 'points' => 3]
        ]
    ],
    [
        'label' => 'Pernahkah anda mencoba untuk mengurangi atau menghentikan penggunaan zat tersebut tapi gagal?',
        'options' => [
            ['value' => 'tidakPernah_6', 'label' => 'Tidak Pernah', 'id' => 'tidakPernah_6', 'points' => 0],
            ['value' => '3bulan_2', 'label' => 'Pernah, 3 Bulan terakhir', 'id' => '3bulan_2', 'points' => 6],
            ['value' => 'tidak3bulan_2', 'label' => 'Pernah, Tidak 3 Bulan terakhir', 'id' => 'tidak3bulan_2', 'points' => 3]
        ]
    ]
];
?>