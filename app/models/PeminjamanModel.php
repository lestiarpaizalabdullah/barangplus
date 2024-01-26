<?php

class PeminjamanModel
{
    private $table = 'peminjaman';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllPeminjaman()
    {
        $this->db->query('SELECT peminjaman.*, ruangan.nama_ruangan, petugas.nama_petugas, peminjam.nama_peminjam 
                          FROM ' . $this->table . ' 
                          JOIN ruangan ON ruangan.id_ruangan = peminjaman.id_ruangan 
                          JOIN petugas ON petugas.id_petugas = peminjaman.id_petugas 
                          JOIN peminjam ON peminjam.id_peminjam = peminjaman.id_peminjam');
        return $this->db->resultSet();
    }

    public function getPeminjamanById($id)
    {
        $this->db->query('SELECT peminjaman.*, ruangan.nama_ruangan, petugas.nama_petugas, peminjam.nama_peminjam 
                          FROM ' . $this->table . ' 
                          JOIN ruangan ON ruangan.id_ruangan = peminjaman.id_ruangan 
                          JOIN petugas ON petugas.id_petugas = peminjaman.id_petugas 
                          JOIN peminjam ON peminjam.id_peminjam = peminjaman.id_peminjam 
                          WHERE peminjaman.id_peminjaman=:id_peminjaman');
        $this->db->bind('id_peminjaman', $id);
        return $this->db->single();
    }

    public function tambahPeminjaman($data)
    {
        $query = "INSERT INTO peminjaman(id_ruangan, id_petugas, id_peminjam, tanggal_peminjaman, jam_mulai, jam_selesai, status) 
                VALUES (:id_ruangan, :id_petugas, :id_peminjam, :tanggal_peminjaman, :jam_mulai, :jam_selesai, :status)";
        $this->db->query($query);
        $this->db->bind('id_ruangan', $data['id_ruangan']);
        $this->db->bind('id_petugas', $data['id_petugas']);
        $this->db->bind('id_peminjam', $data['id_peminjam']);
        $this->db->bind('tanggal_peminjaman', $data['tanggal_peminjaman']);
        $this->db->bind('jam_mulai', $data['jam_mulai']);
        $this->db->bind('jam_selesai', $data['jam_selesai']);
        $this->db->bind('status', $data['status']);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function updateDataPeminjaman($data)
    {
        $query = "UPDATE peminjaman 
                    SET id_ruangan=:id_ruangan, id_petugas=:id_petugas, id_peminjam=:id_peminjam, 
                        tanggal_peminjaman=:tanggal_peminjaman, jam_mulai=:jam_mulai, jam_selesai=:jam_selesai, status=:status 
                    WHERE id_peminjaman=:id_peminjaman";
        $this->db->query($query);
        $this->db->bind('id_peminjaman', $data['id_peminjaman']);
        $this->db->bind('id_ruangan', $data['id_ruangan']);
        $this->db->bind('id_petugas', $data['id_petugas']);
        $this->db->bind('id_peminjam', $data['id_peminjam']);
        $this->db->bind('tanggal_peminjaman', $data['tanggal_peminjaman']);
        $this->db->bind('jam_mulai', $data['jam_mulai']);
        $this->db->bind('jam_selesai', $data['jam_selesai']);
        $this->db->bind('status', $data['status']);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function deletePeminjaman($id)
    {
        $this->db->query('DELETE FROM ' . $this->table . ' WHERE id_peminjaman=:id_peminjaman');
        $this->db->bind('id_peminjaman', $id);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function cariPeminjaman($key)
    {
        $this->db->query('SELECT peminjaman.*, ruangan.nama_ruangan, petugas.nama_petugas, peminjam.nama_peminjam 
                    FROM ' . $this->table . ' 
                    JOIN ruangan ON ruangan.id_ruangan = peminjaman.id_ruangan 
                    JOIN petugas ON petugas.id_petugas = peminjaman.id_petugas 
                    JOIN peminjam ON peminjam.id_peminjam = peminjaman.id_peminjam 
                    WHERE petugas.nama_petugas LIKE :key OR peminjam.nama_peminjam LIKE :key');
        $this->db->bind('key', '%' . $key . '%'); // Perbaikan pada bagian ini

        return $this->db->resultSet();
    }
}
