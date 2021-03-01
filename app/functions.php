<?php
include 'connection.php';

function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function showDataServices()
{
    $tampil = query("SELECT * FROM tbl_permintaan_service_dwirizki");
    return $tampil;
}

function save()
{
    global $conn;
    if (isset($_POST['save'])) {

        $date = $_POST['date'];
        $nama = $_POST['nama'];
        $noHp = $_POST['noHp'];
        $tipeHp = $_POST['tipeHp'];
        $imei = $_POST['imei'];
        $status = "Diproses";
        $ket = $_POST['ket'];

        $sql = "INSERT INTO tbl_permintaan_service_dwirizki VALUE ('', '$date', '$nama', '$noHp', '$tipeHp', '$imei', '$status', '$ket', '')";
        $query = mysqli_query($conn, $sql);

        if ($query) {
            echo "<script>alert('Data Berhasil Ditambahkan');window.location='index.php';</script>";
        } else {
            echo "Gagal";
        }
    }
}
