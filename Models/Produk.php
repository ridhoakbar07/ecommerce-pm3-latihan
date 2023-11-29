<?php
require_once('Model.php');

class ProdukModel extends Model
{

    public function __construct()
    {
        $this->table = 'produk';
    }
}
?>