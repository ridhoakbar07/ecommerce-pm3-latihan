<?php
require_once 'Models/User.php';

class UserController
{

    private $userModel;

    public function __construct()
    {
        $this->userModel = new User();
    }

    public function save()
    {
        if ($this->userModel->store($_POST)) {
            $message = [
                'tipe' => 'success',
                'pesan' => 'Tambah data berhasil',
            ];

            $_SESSION['flash_message'] = $message;
            header('Location: /dashboard/users');
        }
    }

    public function update()
    {
        if ($this->userModel->edit($_POST)) {
            $message = [
                'tipe' => 'success',
                'pesan' => 'Update data berhasil',
            ];

            $_SESSION['flash_message'] = $message;
            header('Location: /dashboard/users');
        }
    }

    public function delete($id)
    {
        if ($this->userModel->destroy($id)) {
            $message = [
                'tipe' => 'success',
                'pesan' => 'Hapus data berhasil',
            ];

            $_SESSION['flash_message'] = $message;
            header('Location: /dashboard/users');
        }
    }

    public function getUserById($id)
    {
        return $this->userModel->findById($id);
    }

    public function getUsers()
    {
        header('Content-Type: application/json');
        echo $this->userModel->findAll();
    }
}

?>