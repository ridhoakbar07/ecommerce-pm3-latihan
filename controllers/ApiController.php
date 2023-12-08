<?php
require_once 'Models/User.php';
require_once 'Models/Kategori.php';
require_once 'Models/Produk.php';
header('Content-Type: application/json');

if (!isset($_SESSION['role_user']) || $_SESSION['role_user'] !== 1) {
    http_response_code(403);
    echo json_encode(['error' => '403 - Access Forbidden']);
    exit;
}

class ApiController
{

    private $userModel;
    private $kategoriModel;
    private $produkModel;

    public function __construct()
    {
        $this->userModel = new User();
        $this->kategoriModel = new Kategori();
        $this->produkModel = new Produk();
    }

    public function getUsers()
    {
        echo $this->userModel->findAll();
    }

    public function getKategoris()
    {
        echo $this->kategoriModel->findAll();
    }

    public function getProduks()
    {
        echo $this->produkModel->findAll();
    }
}

?>