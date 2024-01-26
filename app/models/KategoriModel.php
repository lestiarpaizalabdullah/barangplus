<?php

class KategoriModel
{
    private $table = 'kategori';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllKategori()
    {
        $this->db->query('SELECT * FROM ' . $this->table);

        return $this->db->resultSet();
    }

    public function getKategoriById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id_kategori=:id');
        $this->db->bind('id', $id);

        return $this->db->single();
    }

    public function tambahKategori($data)
    {
        $query = "INSERT INTO kategori(id_kategori, nama_kategori) VALUES (:id_kategori, :nama_kategori)";
        $this->db->query($query);
        $this->db->bind('id_kategori', $data['id_kategori']);
        $this->db->bind('nama_kategori', $data['nama_kategori']);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function updateDataKategori($data)
    {
        $query = 'UPDATE kategori SET id_kategori=:id_kategori, nama_kategori=:nama_kategori WHERE id_kategori=:id';
        $this->db->query($query);
        $this->db->bind('id', $data['id_kategori']);
        $this->db->bind('id_kategori', $data['id_kategori']);
        $this->db->bind('nama_kategori', $data['nama_kategori']);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function deleteKategori($id)
    {
        $this->db->query('DELETE FROM ' . $this->table . ' WHERE id_kategori=:id');
        $this->db->bind('id', $id);
        $this->db->execute();

        return $this->db->rowCount();
    }
}
