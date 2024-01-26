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
        <div class="row">
            <div class="col-sm-12">
                <?php Flasher::Message(); ?>
            </div>
        </div>
        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"><?= $data['title'] ?></h3>
                <div class="btn-group float-right">
                    <a href="<?= base_url; ?>/stokbarang/tambah" class="btn float-right btn-xs btn btn-primary">Tambah Stok Barang</a>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th style="width: 10px">No</th>
                            <th>Id Stok Barang</th>
                            <th>Nama Barang</th>
                            <th>Kategori</th>
                            <th>Petugas</th>
                            <th>Supplier</th>
                            <th>Tanggal Masuk</th>
                            <th>Jumlah Barang</th>
                            <th style="width: 150px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        <?php foreach ($data['stok_barang'] as $row) : ?>
                            <tr>
                                <td><?= $no; ?></td>
                                <td><?= $row['id_stok']; ?></td>
                                <td><?= $row['nama_barang']; ?></td>
                                <td><?= $row['nama_kategori']; ?></td>
                                <td><?= $row['nama_petugas']; ?></td>
                                <td><?= $row['nama_supplier']; ?></td>
                                <td><?= $row['tgl_masuk']; ?></td>
                                <td><?= $row['jumlah_barang']; ?></td>
                                <td>
                                    <a href="<?= base_url; ?>/stokbarang/edit/<?= $row['id_stok'] ?>" class="badge badge-info">Edit</a>
                                    <a href="<?= base_url; ?>/stokbarang/hapus/<?= $row['id_stok'] ?>" class="badge badge-danger" onclick="return confirm('Hapus data?');">Hapus</a>
                                </td>
                            </tr>
                        <?php $no++;
                        endforeach; ?>
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
