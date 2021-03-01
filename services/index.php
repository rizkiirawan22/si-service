<?php

include "../app/connection.php";
include "../app/functions.php";

session_start();

if (empty($_SESSION['username']) and empty($_SESSION['passwd'])) {
    header('location:login/index.php');
} else {
    ?>
    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>SIService | Data Services
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
                <img src="../assets/img/logo.jpg" alt="Si-Service" class="brand-image img-circle elevation-3"
                     style="opacity: .8">
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
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
                with font-awesome or any other icon font library -->
                        <li class="nav-item">
                            <a href="../index.php?page=dashboard"
                               class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="index.php?page=service"
                               class="nav-link active">
                                <i class="nav-icon fas fa-cogs"></i>
                                <p>
                                    Data Service
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../index.php?page=laporan"
                               class="nav-link">
                                <i class="nav-icon fas fa-file-alt"></i>
                                <p>
                                    Laporan
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../app/logout.php" class="nav-link">
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
                            <h1 class="m-0 text-dark">Data Services</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="../index.php?page=dashboard">Home</a></li>
                                <li class="breadcrumb-item active">Data Services</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <a href="../index.php?page=create" class="btn btn-primary btn-sm">Add Data</a>
                                    <div class="card-tools">
                                        <div class="input-group input-group-sm" style="width: 150px;">
                                            <input type="text" name="table_search" class="form-control float-right"
                                                   placeholder="Search">

                                            <div class="input-group-append">
                                                <button type="submit" class="btn btn-default"><i
                                                            class="fas fa-search"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body table-responsive p-0">
                                    <table class="table table-head-fixed text-nowrap">
                                        <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Tipe HP</th>
                                            <th>Imei</th>
                                            <th>Tanggal Masuk</th>
                                            <th>Keterangan</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $limit = 7;
                                        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
                                        $first_page = ($page > 1) ? ($page * $limit) - $limit : 0;

                                        $previous = $page - 1;
                                        $next = $page + 1;

                                        $page_count = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM tbl_permintaan_service_dwirizki"));
                                        $total_pages = ceil($page_count / $limit);

                                        $no = $first_page + 1;
                                        $datas = query("SELECT * FROM tbl_permintaan_service_dwirizki ORDER BY nama ASC LIMIT $first_page, $limit");
                                        foreach ($datas as $data) : ?>
                                            <tr>
                                                <td><?= $no++ ?></td>
                                                <td><?= $data['nama']; ?></td>
                                                <td><?= $data['tipe_hp']; ?></td>
                                                <td><?= $data['imei']; ?></td>
                                                <td><?= $data['tgl_masuk']; ?></td>
                                                <td><?= $data['keterangan']; ?></td>
                                                <td><?= $data['status']; ?></td>
                                                <td>
                                                    <div class="dropdown">
                                                        <button class="btn btn-secondary dropdown-toggle" type="button"
                                                                id="dropdownMenuButton" data-toggle="dropdown"
                                                                aria-haspopup="true"
                                                                aria-expanded="false">
                                                            Details
                                                        </button>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                            <a class="dropdown-item" href="#">Edit</a>
                                                            <a class="dropdown-item" href="#">Hapus</a>
                                                            <a class="dropdown-item" href="#">Selesai</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                    <nav>
                                        <ul class="pagination justify-content-center">
                                            <li class="page-item <?= ($page == 1) ? 'disabled' : ''; ?>">
                                                <a class="page-link"
                                                   href="?page=<?= ($page > 1) ? $previous : ''; ?>">Previous</a>
                                            </li>
                                            <?php for ($x = 1; $x <= $total_pages; $x++): ?>
                                                <li class="page-item <?= ($x == $_GET['page']) ? 'active' : ''; ?>">
                                                    <a class="page-link" href="?page=<?= $x ?>"><?php echo $x; ?></a>
                                                </li>
                                            <?php endfor; ?>
                                            <li class="page-item <?= ($page == $total_pages) ? 'disabled' : ''; ?>">
                                                <a class="page-link" <?php if ($page < $total_pages) {
                                                    echo "href='?page=$next'";
                                                } ?>>Next</a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                    </div>
                    <!-- /.row -->
                </div>
            </section>
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