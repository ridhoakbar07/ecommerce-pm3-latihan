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
            header('Location: /dashboard');
        } else {
            $kategoris = $this->kategoriModel->findAll();
            $produks = $this->produkModel->findProduksKategori();

            if (isset($_GET['cari']) && $_GET['cari']) {
                $produks = $this->produkModel->findByNamaProduk($_GET['cari']);
            }

            if (isset($_GET['kategori']) && $_GET['kategori']) {
                $produks = $this->produkModel->findByNamaKategori($_GET['kategori']);
            }
            view("public/index", ['kategoris' => $kategoris, 'produks' => $produks, 'page' => 'content']);
        }
    }

    public function profile()
    {
        view("public/profile");
    }

    public function notFound()
    {
        if (isset($_SESSION['role_user']) && $_SESSION['role_user'] === 1) {
            view("dashboard/index");
        } else {
            view("public/index");
        }
    }
    public function forbidden()
    {
        view("public/index", ['page' => '403']);
    }
    public function login()
    {
        if (isset($_SESSION['role_user'])) {
            header('location: /');
        } else {
            view("public/index", ['page' => 'login']);
        }
    }
    public function register()
    {
        if (isset($_SESSION['role_user'])) {
            header('location: /');
        } else {
            view("public/index", ['page' => 'register']);
        }
    }
}
?>