<?php
require_once 'Models/User.php';

class UserController
{

    private $userModel;

    public function __construct(){
        $this->userModel = new User();
    }

    public function create($username, $email, $password)
    {

        if ($this->userModel->save($username, $email, $password)) {
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
        echo $this->userModel->findAll();
    }
}

?>