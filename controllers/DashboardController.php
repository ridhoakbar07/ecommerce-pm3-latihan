<?php
require_once 'Models/User.php';

class DashboardController
{
    public function index()
    {
        view('dashboard/index', ['page' => 'dashboard']);
    }

    public function user()
    {
        $user = new User();

        $users = $user->findAll();

        view('dashboard/index', ['users' => $users, 'page' => 'user']);
    }
}
?>