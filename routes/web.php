<?php

if ($id != 1) {
    $page = $_GET['page'] ?? 'assistform';
} else {
    $page = $_GET['page'] ?? 'dashboard';
}

switch ($page) {
    case 'dashboard':
        include './modules/dashboard/index.php';
        break;
    case 'assistform':
        include './modules/assist/form.php';
        break;

    case 'assistform-result':
        include './modules/assist/result.php'; 
        break;

    case 'data-assist':
        include './modules/assist/index.php';
        break;

    case 'delete-assist':
        include './modules/assist/proses-delete.php';
        break;
    case 'generate-pdf':
        include './modules/assist/pdf.php';
        break;

    case 'klien':
        include './modules/klien/index.php';
        break;

    case 'update-klien':
        include './modules/assist/proses.php';
        break;

    case 'petugas':
        include './modules/petugas/index.php';
        break;

    case 'update-petugas':
        include_once './modules/petugas/proses.php';
        break;

    case 'delete-petugas':
        include_once './modules/petugas/proses-delete.php';
        break;

    case 'register':
        include_once './register.php';
        break;

    case 'auth':
        include_once './auth.php';
        break;

    case 'settings':
        include_once './modules/settings.php';
        break;

    case 'arti-skor':
        include_once './modules/arti-skor/index.php';
        break;

    default:
        include './modules/404.php';
        break;
}
