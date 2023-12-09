<?php
class HomeController
{ 
    public function index()
    {
        if (isset($_SESSION['role_user']) && $_SESSION['role_user'] === 1) {
            view("dashboard/index");
        } else {
            view("public/index");
        }
    }

    public function profile()
    {
        view("public/profile");
    }
}
?>