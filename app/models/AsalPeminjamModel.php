<?php

class AsalPeminjamModel
{
    private $table = 'asalpeminjam';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllAsalPeminjam()
    {
        $this->db->query('SELECT * FROM ' . $this->table);

        return $this->db->resultSet();
    }

    public function getAsalPeminjamById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id_asal=:id');
        $this->db->bind('id', $id);

        return $this->db->single();
    }

    public function tambahAsalPeminjam($data)
    {
        $query = "INSERT INTO asalpeminjam(asal_peminjam) VALUES (:asal_peminjam)";
        $this->db->query($query);
        $this->db->bind('asal_peminjam', $data['asal_peminjam']);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function updateDataAsalPeminjam($data)
    {
        $query = 'UPDATE asalpeminjam SET asal_peminjam=:asal_peminjam WHERE id_asal=:id';
        $this->db->query($query);
        $this->db->bind('id', $data['id_asal']);
        $this->db->bind('asal_peminjam', $data['asal_peminjam']);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function deleteAsalPeminjam($id)
    {
        $this->db->query('DELETE FROM ' . $this->table . ' WHERE id_asal=:id');
        $this->db->bind('id', $id);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function cariAsalPeminjam()
    {
        $key = $_POST['key'];
        $this->db->query("SELECT * FROM " . $this->table . " WHERE asal_peminjam LIKE :key");
        $this->db->bind('key', "%$key%");
        return $this->db->resultSet();
    }
}
