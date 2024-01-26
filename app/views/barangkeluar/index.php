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
                    <a href="<?= base_url; ?>/barangkeluar/tambah" class="btn float-right btn-xs btn btn-primary">Tambah Barang Keluar</a>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th style="width: 10px">No</th>
                            <th>Id Keluar</th>
                            <th>Id Barang</th>
                            <th>Id Petugas</th>
                            <th>Tanggal Keluar</th>
                            <th>Jumlah Barang</th>
                            <th style="width: 150px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        <?php foreach ($data['barang_keluar'] as $row) : ?>
                            <tr>
                                <td><?= $no; ?></td>
                                <td><?= $row['id_keluar']; ?></td>
                                <td><?= $row['id_barang']; ?></td>
                                <td><?= $row['id_petugas']; ?></td>
                                <td><?= $row['tgl_keluar']; ?></td>
                                <td><?= $row['jumlah_barang']; ?></td>
                                <td>
                                    <a href="<?= base_url; ?>/barangkeluar/edit/<?= $row['id_keluar'] ?>" class="badge badge-info">Edit</a>
                                    <a href="<?= base_url; ?>/barangkeluar/hapus/<?= $row['id_keluar'] ?>" class="badge badge-danger" onclick="return confirm('Hapus data?');">Hapus</a>
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
