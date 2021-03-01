<?php
$page = (isset($_GET['page'])) ? $_GET['page'] : '';
switch ($page) {
    case 'dashboard':
        include "pages/dashboard.php";
        break;
    case 'create':
        include "services/create.php";
        break;

    default:
        include "pages/dashboard.php";
}
