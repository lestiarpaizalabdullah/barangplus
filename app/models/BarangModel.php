<?php

class BarangModel
{
    private $table = 'barang';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllBarang()
    {
        $this->db->query('SELECT * FROM ' . $this->table);

        return $this->db->resultSet();
    }

    public function getBarangById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id_barang=:id');
        $this->db->bind('id', $id);

        return $this->db->single();
    }

    public function tambahBarang($data)
    {
        $query = "INSERT INTO barang(id_barang, nama_barang, harga) VALUES (:id_barang, :nama_barang, :harga)";
        $this->db->query($query);
        $this->db->bind('id_barang', $data['id_barang']);
        $this->db->bind('nama_barang', $data['nama_barang']);
        $this->db->bind('harga', $data['harga']);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function updateDataBarang($data)
    {
        $query = 'UPDATE barang SET id_barang=:id_barang,nama_barang=:nama_barang, harga=:harga WHERE id_barang=:id';
        $this->db->query($query);
        $this->db->bind('id', $data['id_barang']);
        $this->db->bind('id_barang', $data['id_barang']);
        $this->db->bind('nama_barang', $data['nama_barang']);
        $this->db->bind('harga', $data['harga']);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function deleteBarang($id)
    {
        $this->db->query('DELETE FROM ' . $this->table . ' WHERE id_barang=:id');
        $this->db->bind('id', $id);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function cariBarang()
    {
        $key = $_POST['key'];
        $this->db->query("SELECT * FROM " . $this->table . " WHERE nama_barang LIKE :key");
        $this->db->bind('key', "%$key%");
        return $this->db->resultSet();
    }
}

