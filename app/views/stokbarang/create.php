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
            <form role="form" action="<?= base_url; ?>/stokbarang/simpanStokBarang" method="POST">
                <div class="card-body">
                    <div class="form-group">
                        <label>Id Stok</label>
                        <input type="text" class="form-control" placeholder="Masukkan id stok..." name="id_stok">
                    </div>
                    <div class="form-group">
                        <label>Nama Barang</label>
                        <select class="form-control" name="id_barang">
                            <option value="">Pilih</option>
                            <?php foreach ($data['barang'] as $row) : ?>
                                <option value="<?= $row['id_barang']; ?>"><?= $row['nama_barang']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Kategori</label>
                        <select class="form-control" name="id_kategori">
                            <option value="">Pilih</option>
                            <?php foreach ($data['kategori'] as $row) : ?>
                                <option value="<?= $row['id_kategori']; ?>"><?= $row['nama_kategori']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Petugas</label>
                        <select class="form-control" name="id_petugas">
                            <option value="">Pilih</option>
                            <?php foreach ($data['petugas'] as $row) : ?>
                                <option value="<?= $row['id_petugas']; ?>"><?= $row['nama_petugas']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Supplier</label>
                        <select class="form-control" name="id_supplier">
                            <option value="">Pilih</option>
                            <?php foreach ($data['supplier'] as $row) : ?>
                                <option value="<?= $row['id_supplier']; ?>"><?= $row['nama_supplier']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Tanggal Masuk</label>
                        <input type="date" class="form-control" name="tgl_masuk">
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
