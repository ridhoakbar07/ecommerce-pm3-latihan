<?php
require_once 'Models/User.php';

class UserController {

    private $userModel;

    public function __construct() {
        $this->userModel = new User();
    }

    public function create() {
        $user = new User();
        try {
            if($user->save($_POST['username'], $_POST['email'], $_POST['password'], $_POST['role'])) {
                $message = [
                    'tipe' => 'success',
                    'pesan' => 'Tambah data berhasil',
                ];

                $_SESSION['flash_message'] = $message;
                header('Location: /dashboard/users');
            }
        } catch (PDOException $e) {
            // Handle exceptions thrown from UserModel's save method
            $errorMessage = $e->getMessage();
            $message = [
                'tipe' => 'error',
                'pesan' => $errorMessage,
            ];
            $_SESSION['flash_message'] = $message;
            header('Location: /dashboard/users');
        }
    }

    public function updateUser($id, $nama, $email, $password) {
        return $this->userModel->update($id, ['nama' => $nama, 'password' => $password]);
    }

    public function delete($id) {
        $user = new User();
        try {
            if($user->destroy($id)) {
                $message = [
                    'tipe' => 'success',
                    'pesan' => 'Hapus data berhasil',
                ];

                $_SESSION['flash_message'] = $message;
                header('Location: /dashboard/users');
            }
        } catch (PDOException $e) {
            // Handle exceptions thrown from UserModel's save method
            $errorMessage = $e->getMessage();
            $message = [
                'tipe' => 'error',
                'pesan' => $errorMessage,
            ];
            $_SESSION['flash_message'] = $message;
            header('Location: /dashboard/users');
        }
    }

    public function getUserById($id) {
        return $this->userModel->findById($id);
    }

    public function getUsers() {
        header('Content-Type: application/json');
        echo $this->userModel->findAll();
    }
}

?>