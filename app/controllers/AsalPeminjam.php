<?php

class AsalPeminjam extends Controller
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
        $data['title'] = 'Data Asal Peminjam';
        $data['asalpeminjam'] = $this->model('AsalPeminjamModel')->getAllAsalPeminjam();
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('asalpeminjam/index', $data);
        $this->view('templates/footer');
    }

    public function cari()
    {
        $data['title'] = 'Data Asal Peminjam';
        $data['asalpeminjam'] = $this->model('AsalPeminjamModel')->cariAsalPeminjam();
        $data['key'] = $_POST['key'];
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('asalpeminjam/index', $data);
        $this->view('templates/footer');
    }

    public function edit($id)
    {
        $data['title'] = 'Detail Asal Peminjam';
        $data['asalpeminjam'] = $this->model('AsalPeminjamModel')->getAsalPeminjamById($id);
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('asalpeminjam/edit', $data);
        $this->view('templates/footer');
    }

    public function tambah()
    {
        $data['title'] = 'Tambah Asal Peminjam';
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('asalpeminjam/create', $data);
        $this->view('templates/footer');
    }

    public function simpanAsalPeminjam()
    {
        if ($this->model('AsalPeminjamModel')->tambahAsalPeminjam($_POST) > 0) {
            Flasher::setMessage('Berhasil', 'ditambahkan', 'success');
            header('location: ' . base_url . '/asalpeminjam');
            exit;
        } else {
            Flasher::setMessage('Gagal', 'ditambahkan', 'danger');
            header('location: ' . base_url . '/asalpeminjam');
            exit;
        }
    }

    public function updateAsalPeminjam()
    {
        if ($this->model('AsalPeminjamModel')->updateDataAsalPeminjam($_POST) > 0) {
            Flasher::setMessage('Berhasil', 'diupdate', 'success');
            header('location:' . base_url . '/asalpeminjam');
            exit;
        } else {
            Flasher::setMessage('Gagal', 'diupdate', 'danger');
            header('location:' . base_url . '/asalpeminjam');
            exit;
        }
    }

    public function hapus($id)
    {
        if ($this->model('AsalPeminjamModel')->deleteAsalPeminjam($id) > 0) {
            Flasher::setMessage('Berhasil', 'dihapus', 'success');
            header('location:' . base_url . '/asalpeminjam');
            exit;
        } else {
            Flasher::setMessage('Gagal', 'dihapus', 'danger');
            header('location: ' . base_url . '/asalpeminjam');
            exit;
        }
    }
}
