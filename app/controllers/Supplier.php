<?php

class Supplier extends Controller
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
        $data['title'] = 'Data Supplier';
        $data['supplier'] = $this->model('SupplierModel')->getAllSupplier();
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('supplier/index', $data);
        $this->view('templates/footer');
    }

    public function cari()
    {
        $data['title'] = 'Data Supplier';
        $data['supplier'] = $this->model('supplierModel')->cariSupplier();
        $data['key'] = $_POST['key'];
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('supplier/index', $data);
        $this->view('templates/footer');
    }

    public function edit($id)
    {
        $data['title'] = 'Detail Supplier';
        $data['supplier'] = $this->model('supplierModel')->getSupplierById($id);
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('supplier/edit', $data);
        $this->view('templates/footer');
    }

    public function tambah()
    {
        $data['title'] = 'Tambah Supplier';
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('supplier/create', $data);
        $this->view('templates/footer');
    }

    public function simpanSupplier()
    {
        if ($this->model('SupplierModel')->tambahSupplier($_POST) > 0) {
            Flasher::setMessage('Berhasil', 'ditambahkan', 'success');
            header('location: ' . base_url . '/supplier');
            exit;
        } else {
            Flasher::setMessage('Gagal', 'ditambahkan', 'danger');
            header('location: ' . base_url . '/supplier');
            exit;
        }
    }

    public function updateSupplier()
    {
        if ($this->model('SupplierModel')->updateDataSupplier($_POST) > 0) {
            Flasher::setMessage('Berhasil', 'diupdate', 'success');
            header('location:' . base_url . '/supplier');
            exit;
        } else {
            Flasher::setMessage('Gagal', 'diupdate', 'danger');
            header('location:' . base_url . '/supplier');
            exit;
        }
    }

    public function hapus($id)
    {
        if ($this->model('SupplierModel')->deleteSupplier($id) > 0) {
            Flasher::setMessage('Berhasil', 'dihapus', 'success');
            header('location:' . base_url . '/supplier');
            exit;
        } else {
            Flasher::setMessage('Gagal', 'dihapus', 'danger');
            header('location: ' . base_url . '/supplier');
            exit;
        }
    }
}
