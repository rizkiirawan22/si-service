<?php
include('app/connection.php');

function showDataServices()
{
    $tampil = query("SELECT * FROM tbl_permintaan_service_dwirizki");
    return $tampil;
}
