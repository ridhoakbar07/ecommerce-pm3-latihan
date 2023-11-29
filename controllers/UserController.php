<?php
require_once 'Models/User.php';

class UserController
{

    public function create($username, $email, $password)
    {
        $user = new User($username, $email, $password);

        if ($user->save()) {
            $_SESSION['flash_message'] = [
                'type' => 'success', // or 'error'
                'message' => 'Register user berhasil, silahkan login.',
            ];
            header('Location: /login');
            exit;
        } else {
            header('Location: /register');
            exit;
            // Handle the case where user creation failed
            // This block will handle the case where any required field is missing or empty
        }

    }

    public function updateUser($id, $nama, $email, $password)
    {
        return $this->userModel->update($id, ['nama' => $nama, 'password' => $password]);
    }

    public function deleteUser($id)
    {
        return $this->userModel->delete($id);
    }

    public function getUserById($id)
    {
        return $this->userModel->findById($id);
    }

    public function getUsers()
    {
        return $this->userModel->findAll();
    }

    public function verifyLogin($email, $password)
    {
        $user = new User($email, $password);
        $result = $user->verifyLogin();
        if ($result) {
            $_SESSION['nama_user'] = $result['username'];
            $_SESSION['role_user'] = $result['role'];
            $_SESSION['flash_message'] = [
                'type' => 'success', // or 'error'
                'message' => 'Login Berhasil!',
            ];
            header('location: /');
        }

    }

    public function logout()
    {
        unset($_SESSION['role_user']);
        unset($_SESSION['nama_user']);
        $_SESSION['flash_message'] = [
            'type' => 'success', // or 'error'
            'message' => 'Logout Berhasil!',
        ];
        header('location: /');
    }
}

?>