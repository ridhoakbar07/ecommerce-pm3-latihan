<?php
require_once('Model.php');

class Wishlist extends Model
{
    public function __construct()
    {
        parent::__construct();
        $this->table = 'wishlist';
    }

    //method - method lainnya
    public function findWishlist()
    {
        $query = "SELECT p.*, k.nama_kategori, w.id AS wishlist_id , u.id AS user_id 
        FROM Produk p 
        JOIN Kategori k ON p.kategori_id = k.id 
        LEFT JOIN Wishlist w ON w.produk_id = p.id 
        LEFT JOIN Users u ON w.user_id = u.id 
        WHERE u.id=:id";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $_SESSION['id_user']);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
