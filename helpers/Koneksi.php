<?php

class Koneksi
{
    private $conn;

    public function __construct()
    {
        $host = "localhost";
        $username = "root";
        $password = "";
        $database = "ecommerce";

        try {
            $dsn = "mysql:host={$host};dbname={$database}";
            $this->conn = new PDO($dsn, $username, $password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Koneksi gagal: " . $e->getMessage());
        }
    }

    public function getPDO()
    {
        return $this->conn;
    }

    public function closePDO()
    {
        $this->conn = null;
        echo "Connection closed successfully!";
    }

}

?>