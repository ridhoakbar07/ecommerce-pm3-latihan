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
    public function save($username, $email, $password)
    {
        try {
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $query = "INSERT INTO {$this->table} (username, email, password) VALUES (:username, :email, :password)";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':username', $username, PDO::PARAM_STR);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->bindParam(':password', $hashedPassword, PDO::PARAM_STR);
            return $stmt->execute();
        } catch (PDOException $e) {
            return "Database Error :". $e->getMessage();
        }
    }

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
