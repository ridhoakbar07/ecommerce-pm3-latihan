<?php
require_once 'Models/Kategori.php';

class KategoriController {

    private $kategoriModel;

    public function __construct() {
        $this->kategoriModel = new Kategori();
    }

    public function create() {
        try {
            if($this->kategoriModel->save($_POST['nama_kategori'])) {
                $message = [
                    'tipe' => 'success',
                    'pesan' => 'Tambah data berhasil',
                ];

                $_SESSION['flash_message'] = $message;
                header('Location: /dashboard/kategori');
            }
        } catch (PDOException $e) {
            $errorMessage = $e->getMessage();
            $message = [
                'tipe' => 'error',
                'pesan' => $errorMessage,
            ];
            $_SESSION['flash_message'] = $message;
            header('Location: /dashboard/kategori');
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