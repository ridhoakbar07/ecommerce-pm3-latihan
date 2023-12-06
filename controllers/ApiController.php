<?php
require_once 'Models/User.php';
header('Content-Type: application/json');

if(!isset($_SESSION['role_user']) || $_SESSION['role_user'] !== 1) {
    http_response_code(403); 
    echo json_encode(['error' => '403 - Access Forbidden']);
    exit;
}

class ApiController {

    private $userModel;

    public function __construct() {
        $this->userModel = new User();
    }

    public function getUsers() {
        echo $this->userModel->findAll();
    }
}

?>