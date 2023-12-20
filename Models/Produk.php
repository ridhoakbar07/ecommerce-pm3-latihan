<?php
require_once('Model.php');

class Produk extends Model
{

    public function __construct()
    {
        parent::__construct();
        $this->table = 'produk';
    }

    public function storeWithFoto($foto)
    {
        try {
            $this->getConn()->beginTransaction();
            $result = $this->store($_POST);
            if (!empty($foto['tmp_name'])) {
                $result = $this->uploadfoto($this->getConn()->lastInsertId(), $foto);
            }
            $this->getConn()->commit();

            return $result;
        } catch (PDOException $e) {
            $this->getConn()->rollBack();
            return false;
        }

    }

    public function editWithFoto($foto)
    {
        try {
            $this->getConn()->beginTransaction();
            $result = $this->edit($_POST);
            if (!empty($foto['tmp_name'])) {
                $result = $this->uploadfoto($_POST['id'], $foto);
            }
            $this->getConn()->commit();

            return $result;
        } catch (PDOException $e) {
            $this->getConn()->rollBack();
            return false;
        }

    }
    public function uploadfoto($id, $foto)
    {
        $fotoData = file_get_contents($foto['tmp_name']);
        //encode ke base64 agar bisa diakses json
        $base64foto = 'data:' . $foto['type'] . ';base64,' . base64_encode($fotoData);

        try {
            $query = "UPDATE {$this->table} SET foto =:foto WHERE id = :id";
            $stmt = $this->conn->prepare($query);
            $stmt->bindValue(':id', $id);
            $stmt->bindValue(':foto', $base64foto, PDO::PARAM_LOB);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            return $e;
        }
    }

    public function findProduksKategori()
    {
        $query = "SELECT p.*, k.nama_kategori FROM Produk p JOIN Kategori k ON p.kategori_id = k.id";
        $stmt = $this->conn->query($query);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function findByNamaProduk($keyword)
    {
        $query = "SELECT p.*, k.nama_kategori FROM Produk p JOIN Kategori k ON p.kategori_id = k.id WHERE p.nama_produk LIKE :keyword";

        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(':keyword', '%' . $keyword . '%');
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function findByNamaKategori($keyword)
    {
        $query = "SELECT p.*, k.nama_kategori FROM Produk p JOIN Kategori k ON p.kategori_id = k.id WHERE k.nama_kategori LIKE :keyword";

        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(':keyword', '%' . $keyword . '%');
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>