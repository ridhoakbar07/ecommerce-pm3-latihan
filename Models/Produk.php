<?php
require_once('Model.php');

class Produk extends Model
{

    public function __construct()
    {
        parent::__construct();
        $this->table = 'produk';
    }

    public function uploadfoto($id, $foto)
    {
        try {
            $query = "UPDATE {$this->table} SET foto =:foto WHERE id = :id";
            $stmt = $this->conn->prepare($query);
            $stmt->bindValue(':id', $id);
            $stmt->bindValue(':foto', file_get_contents($foto['tmp_name']), PDO::PARAM_LOB);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function getAllProduks()
    {
        $produks = parent::findAll();

        foreach ($produks as $produk) {
            $fotoData = $produk['foto'];
            $foto = 'data:image/jpeg;base64,' . base64_encode($fotoData);
            $produks['foto'] = $foto;
        }
        
        return $produks;
    }
}
?>