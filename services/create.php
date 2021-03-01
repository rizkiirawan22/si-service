<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Add Service Data</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="services/?page=1">Data Services</a></li>
                    <li class="breadcrumb-item active">Create</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<div class="row justify-content-center">
    <div class="col-8">
        <!-- form start -->
        <form role="form" action="services/proses.php" method="POST">
            <div class="card-body">
                <div class="form-group">
                    <label for="date">Tanggal Masuk</label>
                    <input type="date" class="form-control" name="date" id="date" required>
                </div>
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control" name="nama" id="nama" required>
                </div>
                <div class="form-group">
                    <label for="noHp">No HP</label>
                    <input type="number" class="form-control" name="noHp" id="noHp" required>
                </div>
                <div class="form-group">
                    <label for="tipeHp">Tipe HP</label>
                    <input type="text" class="form-control" name="tipeHp" id="tipeHp" required>
                </div>
                <div class="form-group">
                    <label for="imei">Imei</label>
                    <input type="number" class="form-control" name="imei" id="imei" required>
                </div>
                <!-- <div class="form-group">
                    <label for="status">Status</label>
                    <select name="status" id="status" class="form-control">
                        <option value="">-- Pilih --</option>
                        <option value="Dibatalkan">Dibatalkan</option>
                        <option value="Diproses">Diproses</option>
                        <option value="Selesai">Selesai</option>
                    </select>
                </div> -->
                <div class="form-group">
                    <label for="ket">Keterangan</label>
                    <textarea name="ket" id="ket" cols="30" rows="3" class="form-control" req></textarea>
                </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" name="save" class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
</div>