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

function edit()
{
    global $conn;
    $id = $_POST['id'];
    $date = $_POST['date'];
    $nama = $_POST['nama'];
    $noHp = $_POST['noHp'];
    $tipeHp = $_POST['tipeHp'];
    $imei = $_POST['imei'];
    $status = "Selesai";
    $ket = $_POST['ket'];
    $biaya = $_POST['biaya'];
    $sql = "UPDATE tbl_permintaan_service_dwirizki
                SET
                id = '$id',
                tgl_masuk = '$date',
                nama = '$nama',
                no_hp = '$noHp',
                tipe_hp = '$tipeHp',
                imei = '$imei',
                status = '$status',
                keterangan = '$ket',
                biaya = '$biaya'
                WHERE id = '$id'";
    $query = mysqli_query($conn, $sql);
    if ($query) {
        echo "<script>alert('Permintaan telah diselesaikan');window.location='index.php';</script>";
    } else {
        echo "Gagal";
    }
}

function hapus()
{
    global $conn;
    $id = $_GET["deleteId"];
    $query = mysqli_query($conn, "DELETE FROM tbl_permintaan_service_dwirizki WHERE id = '$id'");
    if ($query) {
        echo "<script>alert('Data Berhasil Dihapus');window.location='index.php';</script>";
    } else {
        echo "Gagal";
    }
}

function batal()
{
    global $conn;
    $id = $_GET['batalId'];
    $data = query("SELECT * FROM tbl_permintaan_service_dwirizki WHERE id = '$id'");
    $date = $data[0]['tgl_masuk'];
    $nama = $data[0]['nama'];
    $noHp = $data[0]['no_hp'];
    $tipeHp = $data[0]['tipe_hp'];
    $imei = $data[0]['imei'];
    $status = "Dibatalkan";
    $ket = $data[0]['keterangan'];
    $biaya = $data[0]['biaya'];
    $sql = "UPDATE tbl_permintaan_service_dwirizki
                SET
                id = '$id',
                tgl_masuk = '$date',
                nama = '$nama',
                no_hp = '$noHp',
                tipe_hp = '$tipeHp',
                imei = '$imei',
                status = '$status',
                keterangan = '$ket',
                biaya = '$biaya'
                WHERE id = '$id'";
    $query = mysqli_query($conn, $sql);
    if ($query) {
        echo "<script>alert('Permintaan telah dibatalkan');window.location='index.php';</script>";
    } else {
        echo "Gagal";
    }
}
