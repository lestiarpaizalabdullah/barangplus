<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><?= $data['title']; ?></h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title"><?= $data['title']; ?></h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" action="<?= base_url; ?>/barangkeluar/simpanBarangKeluar" method="POST">
                <div class="card-body">
                    <div class="form-group">
                        <label>Id Keluar</label>
                        <input type="text" class="form-control" placeholder="Masukkan id keluar..." name="id_keluar">
                    </div>
                    <div class="form-group">
                        <label>Id Barang</label>
                        <select class="form-control" name="id_barang">
                            <option value="">Pilih</option>
                            <?php foreach ($data['barang'] as $row) : ?>
                                <option value="<?= $row['id_barang']; ?>"><?= $row['nama_barang']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Id Petugas</label>
                        <select class="form-control" name="id_petugas">
                            <option value="">Pilih</option>
                            <?php foreach ($data['petugas'] as $row) : ?>
                                <option value="<?= $row['id_petugas']; ?>"><?= $row['nama_petugas']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Tanggal Keluar</label>
                        <input type="date" class="form-control" name="tgl_keluar">
                    </div>
                    <div class="form-group">
                        <label>Jumlah Barang</label>
                        <input type="text" class="form-control" name="jumlah_barang">
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
