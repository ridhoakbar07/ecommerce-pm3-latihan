<?php

class DashboardController {
    public function index() {
        view('dashboard/index', ['page' => 'dashboard']);
    }

    public function produk() {
        view('dashboard/index', ['page' => 'produk']);
    }
}
?>