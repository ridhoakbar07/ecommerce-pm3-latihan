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
        echo json_encode($this->userModel->findAll());
    }

    public function getKategoris()
    {
        echo json_encode($this->kategoriModel->findAll());
    }

    public function getKategoriById($id)
    {
        echo json_encode($this->kategoriModel->findById($id));
    }
    public function getProduks()
    {
        echo json_encode($this->produkModel->findAll());
    }

}

?>