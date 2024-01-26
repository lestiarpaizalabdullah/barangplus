<?php

class SupplierModel
{
    private $table = 'supplier';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllSupplier()
    {
        $this->db->query('SELECT * FROM ' . $this->table);

        return $this->db->resultSet();
    }

    public function getSupplierById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id_supplier=:id');
        $this->db->bind('id', $id);

        return $this->db->single();
    }

    public function tambahSupplier($data)
    {
        $query = "INSERT INTO supplier(id_supplier, nama_supplier, alamat, no_telp) VALUES (:id_supplier, :nama_supplier, :alamat, :no_telp)";
        $this->db->query($query);
        $this->db->bind('id_supplier', $data['id_supplier']);
        $this->db->bind('nama_supplier', $data['nama_supplier']);
        $this->db->bind('alamat', $data['alamat']);
        $this->db->bind('no_telp', $data['no_telp']);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function updateDataSupplier($data)
    {
        $query = 'UPDATE supplier SET id_supplier=:id_supplier, nama_supplier=:nama_supplier, alamat=:alamat, no_telp=:no_telp WHERE id_supplier=:id';
        $this->db->query($query);
        $this->db->bind('id', $data['id_supplier']);
        $this->db->bind('id_supplier', $data['id_supplier']);
        $this->db->bind('nama_supplier', $data['nama_supplier']);
        $this->db->bind('alamat', $data['alamat']);
        $this->db->bind('no_telp', $data['no_telp']);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function deleteSupplier($id)
    {
        $this->db->query('DELETE FROM ' . $this->table . ' WHERE id_supplier=:id');
        $this->db->bind('id', $id);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function cariSupplier()
    {
        $key = $_POST['key'];
        $this->db->query("SELECT * FROM " . $this->table . " WHERE nama_supplier LIKE :key");
        $this->db->bind('key', "%$key%");
        return $this->db->resultSet();
    }
}
