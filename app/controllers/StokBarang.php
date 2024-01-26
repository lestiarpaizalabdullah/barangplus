<?php

class StokBarang extends Controller
{
    public function __construct()
    {
        if ($_SESSION['session_login'] != 'sudah_login') {
            Flasher::setMessage('Login', 'Tidak ditemukan.', 'danger');
            header('location: ' . base_url . '/login');
            exit;
        }
    }

    public function index()
    {
        $data['title'] = 'Data Stok Barang';
        $data['stok_barang'] = $this->model('StokBarangModel')->getAllStokBarang();
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('stokbarang/index', $data);
        $this->view('templates/footer');
    }

    public function cari()
    {
        $data['title'] = 'Data Stok Barang';
        $data['stok_barang'] = $this->model('StokBarangModel')->cariStokBarang($_POST['key']);
        $data['key'] = $_POST['key'];
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('stokbarang/index', $data);
        $this->view('templates/footer');
    }

    public function edit($id)
    {
        $data['title'] = 'Detail Stok Barang';
        $data['barang'] = $this->model('BarangModel')->getAllBarang();
        $data['kategori'] = $this->model('KategoriModel')->getAllKategori();
        $data['petugas'] = $this->model('PetugasModel')->getAllPetugas();
        $data['supplier'] = $this->model('SupplierModel')->getAllSupplier();
        $data['stok_barang'] = $this->model('StokBarangModel')->getStokBarangById($id);
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('stokbarang/edit', $data);
        $this->view('templates/footer');
    }

    public function tambah()
    {
        $data['title'] = 'Tambah Stok Barang';
        $data['barang'] = $this->model('BarangModel')->getAllBarang();
        $data['kategori'] = $this->model('KategoriModel')->getAllKategori();
        $data['petugas'] = $this->model('PetugasModel')->getAllPetugas();
        $data['supplier'] = $this->model('SupplierModel')->getAllSupplier();
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('stokbarang/create', $data);
        $this->view('templates/footer');
    }

    public function simpanStokBarang()
    {
        if ($this->model('StokBarangModel')->tambahStokBarang($_POST) > 0) {
            Flasher::setMessage('Berhasil', 'ditambahkan', 'success');
            header('location: ' . base_url . '/stokbarang');
            exit;
        } else {
            Flasher::setMessage('Gagal', 'ditambahkan', 'danger');
            header('location: ' . base_url . '/stokbarang');
            exit;
        }
    }

    public function updateStokBarang()
    {
        if ($this->model('StokBarangModel')->updateDataStokBarang($_POST) > 0) {
            Flasher::setMessage('Berhasil', 'diupdate', 'success');
            header('location:' . base_url . '/stokbarang');
            exit;
        } else {
            Flasher::setMessage('Gagal', 'diupdate', 'danger');
            header('location:' . base_url . '/stokbarang');
            exit;
        }
    }

    public function hapus($id)
    {
        if ($this->model('StokBarangModel')->deleteStokBarang($id) > 0) {
            Flasher::setMessage('Berhasil', 'dihapus', 'success');
            header('location:' . base_url . '/stokbarang');
            exit;
        } else {
            Flasher::setMessage('Gagal', 'dihapus', 'danger');
            header('location: ' . base_url . '/stokbarang');
            exit;
        }
    }

    public function lihatlaporan()
    {
        $data['title'] = 'Data Laporan Stok Barang';
        $data['stok_barang'] = $this->model('StokBarangModel')->getAllStokBarang();
        $this->view('stokbarang/lihatlaporan', $data);
    }
}
