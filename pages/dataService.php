<?php

include('app/functions.php');
include("app/connection.php")

?>
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Data Services</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="index.php?page=dashboard">Home</a></li>
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
                        <a href="" class="btn btn-primary btn-sm">Tambah Data</a>
                        <div class="card-tools">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <input type="text" name="table_search" class="form-control float-right"
                                       placeholder="Search">

                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
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
                                                    id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
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
                                <li class="page-item <?= ($page == $_GET['page']) ? 'disabled' : ''; ?>">
                                    <a class="page-link"
                                       href="?page=<?= ($page > 1) ? $previous : ''; ?>" <?= ?>>Previous</a>
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