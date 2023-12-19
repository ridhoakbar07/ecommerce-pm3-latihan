<?php
require_once 'Models/User.php';

class UserController
{

    private $userModel;

    public function __construct()
    {
        $this->userModel = new User();
    }

    public function index()
    {
        $users = $this->userModel->findAll();
        view('dashboard/index', ['page' => 'user', 'users' => $users]);
    }
    public function save()
    {
        $password = $_POST['password'];
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $_POST['password'] = $hashedPassword;

        $result = $this->userModel->store($_POST);
        if ($result === true) {
            $message = [
                'tipe' => 'success',
                'pesan' => 'Data berhasil disimpan!',
            ];
        } else {
            $message = [
                'tipe' => 'error',
                'pesan' => $result->errorInfo['2'],
            ];
        }

        $_SESSION['flash_message'] = $message;
        header('Location: /dashboard/users');
    }
    public function update()
    {
        $password = $_POST['password'];
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $_POST['password'] = $hashedPassword;

        $result = $this->userModel->edit($_POST);
        if ($result === true) {
            $message = [
                'tipe' => 'success',
                'pesan' => 'Data berhasil diperbarui!',
            ];
        } else {
            $message = [
                'tipe' => 'error',
                'pesan' => $result->errorInfo['2'],
            ];
        }

        $_SESSION['flash_message'] = $message;
        header('Location: /dashboard/users');
    }

    public function delete($id)
    {
        $result = $this->userModel->destroy($id);
        if ($result === true) {
            $message = [
                'tipe' => 'success',
                'pesan' => 'Data berhasil dihapus!',
            ];
        } else {
            $message = [
                'tipe' => 'error',
                'pesan' => $result->errorInfo['2'],
            ];
        }

        $_SESSION['flash_message'] = $message;
        header('Location: /dashboard/users');
    }
}

?>