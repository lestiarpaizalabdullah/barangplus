<?php

class StokBarangModel
{
    private $table = 'stok_barang';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllStokBarang()
    {
        $this->db->query('SELECT stok_barang.*, barang.nama_barang, kategori.nama_kategori, petugas.nama_petugas, supplier.nama_supplier FROM ' . $this->table . '
        JOIN barang ON barang.id_barang = stok_barang.id_barang
        JOIN kategori ON kategori.id_kategori = stok_barang.id_kategori
        JOIN petugas ON petugas.id_petugas = stok_barang.id_petugas
        JOIN supplier ON supplier.id_supplier = stok_barang.id_supplier');
        return $this->db->resultSet();
    }

    public function getStokBarangById($id)
    {
        $this->db->query('SELECT stok_barang.*, barang.nama_barang, kategori.nama_kategori, petugas.nama_petugas, supplier.nama_supplier FROM ' . $this->table . '
        JOIN barang ON barang.id_barang = stok_barang.id_barang
        JOIN kategori ON kategori.id_kategori = stok_barang.id_kategori
        JOIN petugas ON petugas.id_petugas = stok_barang.id_petugas
        JOIN supplier ON supplier.id_supplier = stok_barang.id_supplier
        WHERE stok_barang.id_stok=:id_stok');
        $this->db->bind('id_stok', $id);
        return $this->db->single();
    }

    public function tambahStokBarang($data)
    {
        $query = "INSERT INTO " . $this->table . " (id_stok, id_barang, id_kategori, id_petugas, id_supplier, tgl_masuk, jumlah_barang) 
                    VALUES (:id_stok, :id_barang, :id_kategori, :id_petugas, :id_supplier, :tgl_masuk, :jumlah_barang)";
        $this->db->query($query);
        $this->db->bind('id_stok', $data['id_stok']);
        $this->db->bind('id_barang', $data['id_barang']);
        $this->db->bind('id_kategori', $data['id_kategori']);
        $this->db->bind('id_petugas', $data['id_petugas']);
        $this->db->bind('id_supplier', $data['id_supplier']);
        $this->db->bind('tgl_masuk', $data['tgl_masuk']);
        $this->db->bind('jumlah_barang', $data['jumlah_barang']);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function updateDataStokBarang($data)
    {
        $query = "UPDATE " . $this->table . " 
                    SET id_stok=:id_stok, id_barang=:id_barang, id_kategori=:id_kategori, id_petugas=:id_petugas, 
                        id_supplier=:id_supplier, tgl_masuk=:tgl_masuk, jumlah_barang=:jumlah_barang 
                    WHERE id_stok=:id_stok";
        $this->db->query($query);
        $this->db->bind('id_stok', $data['id_stok']);
        $this->db->bind('id_barang', $data['id_barang']);
        $this->db->bind('id_kategori', $data['id_kategori']);
        $this->db->bind('id_petugas', $data['id_petugas']);
        $this->db->bind('id_supplier', $data['id_supplier']);
        $this->db->bind('tgl_masuk', $data['tgl_masuk']);
        $this->db->bind('jumlah_barang', $data['jumlah_barang']);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function deleteStokBarang($id)
    {
        $this->db->query('DELETE FROM ' . $this->table . ' WHERE id_stok=:id_stok');
        $this->db->bind('id_stok', $id);
        $this->db->execute();

        return $this->db->rowCount();
    }
}
