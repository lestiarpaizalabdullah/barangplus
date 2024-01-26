<?php

class BarangKeluarModel
{
    private $table = 'Barang_Keluar';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllBarangKeluar()
    {
        $this->db->query('SELECT barang_keluar.*, barang.nama_barang, petugas.nama_petugas FROM ' . $this->table . '
        JOIN barang ON barang.id_barang = barang_keluar.id_barang
        JOIN petugas ON petugas.id_petugas = barang_keluar.id_petugas');
        return $this->db->resultSet();
    }

    public function getBarangKeluarById($id)
    {
        $this->db->query('SELECT barang_keluar.*, barang.nama_barang, petugas.nama_petugas FROM ' . $this->table . '
        JOIN barang ON barang.id_barang = barang_keluar.id_barang
        JOIN petugas ON petugas.id_petugas = barang_keluar.id_petugas
        WHERE barang_keluar.id_keluar=:id_keluar');
        $this->db->bind('id_keluar', $id);
        return $this->db->single();
    }

    public function tambahBarangKeluar($data)
    {
        $query = "INSERT INTO " . $this->table . " (id_keluar, id_barang, id_petugas, tgl_keluar, jumlah_barang) 
                    VALUES (:id_keluar, :id_barang, :id_petugas, :tgl_keluar, :jumlah_barang)";
        $this->db->query($query);
        $this->db->bind('id_keluar', $data['id_keluar']);
        $this->db->bind('id_barang', $data['id_barang']);
        $this->db->bind('id_petugas', $data['id_petugas']);
        $this->db->bind('tgl_keluar', $data['tgl_keluar']);
        $this->db->bind('jumlah_barang', $data['jumlah_barang']);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function updateDataBarangKeluar($data)
    {
        $query = "UPDATE " . $this->table . " 
                    SET id_keluar=:id_keluar, id_barang=:id_barang, id_petugas=:id_petugas, tgl_keluar=:tgl_keluar, jumlah_barang=:jumlah_barang 
                    WHERE id_keluar=:id_keluar";
        $this->db->query($query);
        $this->db->bind('id_keluar', $data['id_keluar']);
        $this->db->bind('id_barang', $data['id_barang']);
        $this->db->bind('id_petugas', $data['id_petugas']);
        $this->db->bind('tgl_keluar', $data['tgl_keluar']);
        $this->db->bind('jumlah_barang', $data['jumlah_barang']);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function deleteBarangKeluar($id)
    {
        $this->db->query('DELETE FROM ' . $this->table . ' WHERE id_keluar=:id_keluar');
        $this->db->bind('id_keluar', $id);
        $this->db->execute();

        return $this->db->rowCount();
    }
}
