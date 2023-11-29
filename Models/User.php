<?php
require_once('Model.php');

class User extends Model
{

    private $username;
    private $email;
    private $password;

    public function __construct($email = "", $password = "", $username = "")
    {
        parent::__construct();
        $this->table = 'users';
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
    }

    //Getter and Setter
    /**
     * Get the value of password
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get the value of email
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of username
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set the value of username
     *
     * @return  self
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    //method - method lainnya
    public function save()
    {
        try {
            $hashedPassword = password_hash($this->password, PASSWORD_DEFAULT);
            $query = "INSERT INTO {$this->table} (username, email, password) VALUES (:username, :email, :password)";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':username', $this->username, PDO::PARAM_STR);
            $stmt->bindParam(':email', $this->email, PDO::PARAM_STR);
            $stmt->bindParam(':password', $hashedPassword, PDO::PARAM_STR);
            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Error:" . $e->getMessage();
            return false;
        }
    }

    public function getUserByEmail()
    {
        $query = "SELECT * FROM {$this->table} WHERE email = :email";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':email', $this->email, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function verifyLogin()
    {
        $user = $this->getUserByEmail();
        if ($user && password_verify($this->password, $user['password'])) {
            // Password matches
            return $user;
        } else {
            // Invalid credentials
            return false;
        }
    }

}
