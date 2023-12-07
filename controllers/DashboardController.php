<?php
require_once 'Models/User.php';

class DashboardController {
    public function index() {
        view('dashboard/index', ['page' => 'dashboard']);
    }

    public function user() {
        $user = new User();

        $users = json_decode($user->findAll(), true);

        view('dashboard/index', ['users' => $users, 'page' => 'user']);
    }

    public function kategori() {
        $kategori = new Kategori();

        $kategoris = json_decode($kategori->findAll(), true);

        view('dashboard/index', ['kategoris' => $kategoris, 'page' => 'kategori']);
    }

    public function produk() {
        view('dashboard/index', ['page' => 'produk']);
    }
}
?>