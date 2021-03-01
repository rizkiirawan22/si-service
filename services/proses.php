<?php
include('../app/functions.php');

if (isset($_POST['save'])) {
    save();
}

if (isset($_POST['edit'])) {
    edit();
}

if (isset($_GET['deleteId'])) {
    hapus();
}

if (isset($_GET['batalId'])) {
    batal();
}
