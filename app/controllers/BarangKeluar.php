<?php

class BarangKeluar extends Controller
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
        $data['title'] = 'Data Barang Keluar';
        $data['barang_keluar'] = $this->model('BarangKeluarModel')->getAllBarangKeluar();
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('barangkeluar/index', $data);
        $this->view('templates/footer');
    }

    public function cari()
    {
        $data['title'] = 'Data Barang Keluar';
        $data['barang_keluar'] = $this->model('BarangKeluarModel')->cariBarangKeluar($_POST['key']);
        $data['key'] = $_POST['key'];
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('barangkeluar/index', $data);
        $this->view('templates/footer');
    }

    public function tambah()
    {
        $data['title'] = 'Tambah Barang Keluar';
        $data['barang'] = $this->model('BarangModel')->getAllBarang();
        $data['petugas'] = $this->model('PetugasModel')->getAllPetugas();
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('barangkeluar/create', $data);
        $this->view('templates/footer');
    }

    public function simpanBarangKeluar()
    {
        if ($this->model('BarangKeluarModel')->tambahBarangKeluar($_POST) > 0) {
            Flasher::setMessage('Berhasil', 'ditambahkan', 'success');
            header('location: ' . base_url . '/barangkeluar');
            exit;
        } else {
            Flasher::setMessage('Gagal', 'ditambahkan', 'danger');
            header('location: ' . base_url . '/barangkeluar');
            exit;
        }
    }

    public function edit($id)
    {
        $data['title'] = 'Detail Barang Keluar';
        $data['barang'] = $this->model('BarangModel')->getAllBarang();
        $data['petugas'] = $this->model('PetugasModel')->getAllPetugas();
        $data['barang_keluar'] = $this->model('BarangKeluarModel')->getBarangKeluarById($id);
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('barangkeluar/edit', $data);
        $this->view('templates/footer');
    }

    public function updateBarangKeluar()
    {
        if ($this->model('BarangKeluarModel')->updateDataBarangKeluar($_POST) > 0) {
            Flasher::setMessage('Berhasil', 'diupdate', 'success');
            header('location:' . base_url . '/barangkeluar');
            exit;
        } else {
            Flasher::setMessage('Gagal', 'diupdate', 'danger');
            header('location:' . base_url . '/barangkeluar');
            exit;
        }
    }

    public function hapus($id)
    {
        if ($this->model('BarangKeluarModel')->deleteBarangKeluar($id) > 0) {
            Flasher::setMessage('Berhasil', 'dihapus', 'success');
            header('location:' . base_url . '/barangkeluar');
            exit;
        } else {
            Flasher::setMessage('Gagal', 'dihapus', 'danger');
            header('location: ' . base_url . '/barangkeluar');
            exit;
        }
    }

    public function lihatlaporan()
    {
        $data['title'] = 'Data Laporan Barang Keluar';
        $data['barang_keluar'] = $this->model('BarangKeluarModel')->getAllBarangKeluar();
        $this->view('barangkeluar/lihatlaporan', $data);
    }
}
