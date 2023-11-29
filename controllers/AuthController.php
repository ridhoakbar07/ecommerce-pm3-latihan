<?php
require_once 'Models/User.php';
require_once 'HomeController.php';

class AuthController
{
    public function loginForm()
    {
        view("public/login");
    }

    public function logout()
    {
        $_SESSION = array();

        // Destroy the session
        session_destroy();

        $message = [
            'tipe' => 'success',
            'pesan' => 'Logout Berhasil!',
        ];
        // Redirect the user to the login page or any other desired page after logout
        view("public/index", ["message" => $message]);
    }

    public function registrationForm()
    {
        view("public/register");
    }

    public function verifyLogin()
    {
        $user = new User($_POST['email'], $_POST['password']);
        $result = $user->verifyLogin();
        if ($result) {
            $_SESSION['role_user'] = $result['role'];
            $_SESSION['username'] = $result['username'];
            $message = [
                'tipe' => 'success',
                'pesan' => "Login Berhasil! selamat datang <strong>". $result['username']."</strong>",
            ];
            $_SESSION['flash_message'] = $message;
            
            header('location:/');
        }
    }

    public function registerUser()
    {
        $user = new User($_POST['email'], $_POST['password'], $_POST['username']);

        if ($user->save()) {
            $message = [
                'tipe' => 'success',
                'pesan' => 'Registrasi Berhasil! Silahkan login',
            ];
            view("public/login", ["message" => $message]);
        } else {
            $message = [
                'type' => 'error',
                'message' => 'Operasi Gagal! Periksa kembali inputan anda',
            ];
            view("public/register", ["message" => $message]);
        }
    }
}
?>