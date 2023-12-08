<?php
require_once('Model.php');

class Produk extends Model
{

    public function __construct()
    {
        parent::__construct();
        $this->table = 'produk';
    }
}
?>