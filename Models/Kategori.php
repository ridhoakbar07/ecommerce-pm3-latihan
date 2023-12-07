<?php
require_once('Model.php');

class Kategori extends Model
{
    public function __construct()
    {
        parent::__construct();
        $this->table = 'kategori';
    }

    //method - method lainnya
    public function save($nama_kategori)
    {
        try {
            $query = "INSERT INTO {$this->table} (nama_kategori) VALUES (:nama_kategori)";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':nama_kategori', $nama_kategori, PDO::PARAM_STR);
            return $stmt->execute();
        } catch (PDOException $e) {
            return "Database Error :". $e->getMessage();
        }
    }

}
