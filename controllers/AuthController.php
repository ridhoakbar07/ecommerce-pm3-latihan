<?php
require_once 'Models/User.php';
require_once 'HomeController.php';

class AuthController
{
    private $userModel;

    public function __construct()
    {
        $this->userModel = new User();
    }

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

        session_start();
        $_SESSION['flash_message'] = $message;

        header('location:/');
    }

    public function registrationForm()
    {
        view("public/register");
    }

    public function verifyLogin()
    {
        $result = $this->userModel->verifyLogin($_POST['email'], $_POST['password']);
        if ($result) {
            $_SESSION['role_user'] = $result['role'];
            $_SESSION['username'] = $result['username'];
            $_SESSION['id_user'] = $result['id'];
            $message = [
                'tipe' => 'success',
                'pesan' => "Login Berhasil! selamat datang <strong>" . $result['username'] . "</strong>",
            ];
            $_SESSION['flash_message'] = $message;

            header('location:/');
        } else {
            $message = [
                'tipe' => 'error',
                'pesan' => 'Email dan Password tidak ditemukan',
            ];
            $_SESSION['flash_message'] = $message;
            header('location:/login');
        }
    }

    public function registerUser()
    {
        $password = $_POST['password'];
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $_POST['password'] = $hashedPassword;

        $result = $this->userModel->store($_POST);
        if ($result === true) {
            $message = [
                'tipe' => 'success',
                'pesan' => 'Registrasi Berhasil! Silahkan login',
            ];
            $_SESSION['flash_message'] = $message;
            header('location:/login');
        } else {
            // Handle exceptions thrown from UserModel's save method
            $message = [
                'tipe' => 'error',
                'pesan' => $result,
            ];
            $_SESSION['flash_message'] = $message;
            header('location:/register');
        }
    }
}
?>