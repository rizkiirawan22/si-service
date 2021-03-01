<?php
session_start();
include('../app/functions.php');

if (empty($_SESSION['username']) and empty($_SESSION['passwd'])) {
    header('location:login/index.php');
} else {
?>
    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>SIService | Detail
        </title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="../assets/css/all.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="../assets/css/adminlte.min.css">
        <!-- Google Font: Source Sans Pro -->
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    </head>

    <body class="hold-transition sidebar-mini layout-fixed">
        <div class="wrapper">

            <!-- Navbar -->
            <nav class="main-header navbar navbar-expand navbar-white navbar-light">
                <!-- Left navbar links -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                    </li>
                </ul>
            </nav>
            <!-- /.navbar -->
            <!-- Main Sidebar Container -->
            <aside class="main-sidebar sidebar-dark-primary elevation-4">
                <!-- Brand Logo -->
                <a href="index.php" class="brand-link">
                    <img src="../assets/img/logo.jpg" alt="Si-Service" class="brand-image img-circle elevation-3" style="opacity: .8">
                    <span class="brand-text"><b>SI</b>Service</span>
                </a>

                <!-- Sidebar -->
                <div class="sidebar">
                    <!-- Sidebar user panel (optional) -->
                    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                        <div class="image">
                            <img src="../assets/img/guest-user.jpg" class="img-circle elevation-2" alt="User Image">
                        </div>
                        <div class="info">
                            <span class="d-block text-light"><?= $_SESSION['nama']; ?></span>
                        </div>
                    </div>

                    <!-- Sidebar Menu -->
                    <nav class="mt-2">
                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                            <!-- Add icons to the links using the .nav-icon class
                    with font-awesome or any other icon font library -->
                            <li class="nav-item">
                                <a href="../index.php?page=dashboard" class="nav-link <?= ($_GET['page'] == 'dashboard') ? 'active' : ''; ?>">
                                    <i class="nav-icon fas fa-tachometer-alt"></i>
                                    <p>
                                        Dashboard
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="../services/?page=1" class="nav-link  <?= ($_GET['page'] == 'service') ? 'active' : ''; ?>">
                                    <i class="nav-icon fas fa-cogs"></i>
                                    <p>
                                        Data Service
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="app/logout.php" class="nav-link">
                                    <i class="nav-icon fas fa-sign-out-alt"></i>
                                    <p>
                                        Logout
                                    </p>
                                </a>
                            </li>
                        </ul>
                    </nav>
                    <!-- /.sidebar-menu -->
                </div>
                <!-- /.sidebar -->
            </aside>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <div class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1 class="m-0 text-dark">Detail Service Data</h1>
                            </div><!-- /.col -->
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="services/?page=1">Data Services</a></li>
                                    <li class="breadcrumb-item active">Detail</li>
                                </ol>
                            </div><!-- /.col -->
                        </div><!-- /.row -->
                    </div><!-- /.container-fluid -->
                </div>
                <!-- /.content-header -->
                <div class="row justify-content-center">
                    <div class="col-8">
                        <!-- form start -->
                        <form role="form" action="proses.php" method="POST">
                            <div class="card-body">
                                <?php
                                $id = $_POST['id'];
                                $data = query("SELECT * FROM tbl_permintaan_service_dwirizki WHERE id = '$id'");
                                foreach ($data as $d) :
                                ?>
                                    <input type="hidden" name="id" value="<?= $id ?>">
                                    <div class="form-group">
                                        <label for="date">Tanggal Masuk</label>
                                        <input type="date" class="form-control" name="date" id="date" required value="<?= $d['tgl_masuk'] ?>">
                                    </div>
                                    <div class=" form-group">
                                        <label for="nama">Nama</label>
                                        <input type="text" class="form-control" name="nama" id="nama" required value="<?= $d['nama'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="noHp">No HP</label>
                                        <input type="number" class="form-control" name="noHp" id="noHp" required value="<?= $d['no_hp'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="tipeHp">Tipe HP</label>
                                        <input type="text" class="form-control" name="tipeHp" id="tipeHp" required value="<?= $d['tipe_hp'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="imei">Imei</label>
                                        <input type="number" class="form-control" name="imei" id="imei" required value="<?= $d['imei'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="ket">Keterangan</label>
                                        <textarea name="ket" id="ket" cols="30" rows="3" class="form-control" required><?= $d['keterangan'] ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="biaya">Biaya</label>
                                        <input type="number" class="form-control" name="biaya" id="biaya" required>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" name="edit" class="btn btn-primary">Selesai</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /.content-wrapper -->
            <footer class="main-footer">
                <strong>Copyright &copy; 2021 <b>SI</b>Service</strong>
                All rights reserved.
            </footer>

            <!-- Control Sidebar -->
            <aside class="control-sidebar control-sidebar-dark">
                <!-- Control sidebar content goes here -->
            </aside>
            <!-- /.control-sidebar -->
        </div>
        <!-- ./wrapper -->

        <!-- jQuery -->
        <script src="../assets/js/jquery.min.js"></script>
        <!-- Bootstrap 4 -->
        <script src="../assets/js/bootstrap.bundle.min.js"></script>
        <!-- AdminLTE App -->
        <script src="../assets/js/adminlte.min.js"></script>

    </html>
<?php
}
?>