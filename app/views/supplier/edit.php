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
            <form role="form" action="<?= base_url; ?>/supplier/updateSupplier" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id_supplier" value="<?= $data['supplier']['id_supplier']; ?>">
                <div class="card-body">
                    <div class="form-group">
                        <label>Id Supplier</label>
                        <input type="text" class="form-control" placeholder="Masukkan id supplier..." name="id_supplier" value="<?= $data['supplier']['id_supplier']; ?>">
                    </div>
                    <div class="form-group">
                        <label>Nama Supplier</label>
                        <input type="text" class="form-control" placeholder="Masukkan nama supplier..." name="nama_supplier" value="<?= $data['supplier']['nama_supplier']; ?>">
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <input type="text" class="form-control" placeholder="Masukkan alamat supplier..." name="alamat" value="<?= $data['supplier']['alamat']; ?>">
                    </div>
                    <div class="form-group">
                        <label>No. Telepon</label>
                        <input type="text" class="form-control" placeholder="Masukkan nomor telepon supplier..." name="no_telp" value="<?= $data['supplier']['no_telp']; ?>">
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
