<?php
require_once 'Models/User.php';
require_once 'HomeController.php';

class AuthController {
    public function loginForm() {
        view("public/login");
    }

    public function logout() {
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

    public function registrationForm() {
        view("public/register");
    }

    public function verifyLogin() {
        $user = new User();
        $result = $user->verifyLogin($_POST['email'], $_POST['password']);
        if($result) {
            $_SESSION['role_user'] = $result['role'];
            $_SESSION['username'] = $result['username'];
            $message = [
                'tipe' => 'success',
                'pesan' => "Login Berhasil! selamat datang <strong>".$result['username']."</strong>",
            ];
            $_SESSION['flash_message'] = $message;

            header('location:/');
        } else {
            $message = [
                'tipe' => 'error',
                'pesan' => 'Email dan Password tidak ditemukan',
            ];
            view("public/login", ["message" => $message]);
        }
    }

    public function registerUser() {
        $user = new User();
        try {
            if($user->save($_POST['username'], $_POST['email'], $_POST['password'])) {
                $message = [
                    'tipe' => 'success',
                    'pesan' => 'Registrasi Berhasil! Silahkan login',
                ];
                view("public/login", ["message" => $message]);
            }
        } catch (PDOException $e) {
            // Handle exceptions thrown from UserModel's save method
            $errorMessage = $e->getMessage();
            $message = [
                'tipe' => 'error',
                'pesan' => $errorMessage,
            ];
            view("public/register", ["message" => $message]);
        }
    }
}
?>