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

}
