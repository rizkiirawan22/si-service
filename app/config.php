<?php
$page = (isset($_GET['page'])) ? $_GET['page'] : '';
switch ($page) {
    case 'dashboard':
        include "pages/dashboard.php";
        break;
    case 'service':
        include "pages/dataService.php";
        break;
    case 'laporan':
        include "pages/laporan.php";
        break;

    default:
        include "pages/dashboard.php";
}
