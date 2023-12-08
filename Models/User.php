<?php
require_once('Model.php');

class User extends Model
{
    public function __construct()
    {
        parent::__construct();
        $this->table = 'users';
    }
    
    //method - method lainnya
    public function getUserByEmail($email)
    {
        $query = "SELECT * FROM {$this->table} WHERE email = :email";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function verifyLogin($email, $password)
    {
        $user = $this->getUserByEmail($email);
        if ($user && password_verify($password, $user['password'])) {
            // Password matches
            return $user;
        } else {
            // Invalid credentials
            return false;
        }
    }

}
