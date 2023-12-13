<?php
require_once 'Models/Kategori.php';
require_once 'Models/Produk.php';

class HomeController
{
    private $kategoriModel;
    private $produkModel;

    public function __construct()
    {
        $this->kategoriModel = new Kategori();
        $this->produkModel = new Produk();
    }

    public function index()
    {
        if (isset($_SESSION['role_user']) && $_SESSION['role_user'] === 1) {
            view("dashboard/index");
        } else {
            $kategoris = $this->kategoriModel->findAll();
            $produks = $this->produkModel->findAll();
            view("public/index", ['kategoris' => $kategoris, 'produks' => $produks]);
        }
    }

    public function profile()
    {
        view("public/profile");
    }
}
?>