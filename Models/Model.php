<?php
require_once('interface/CrudInterface.php');
require_once('helpers/Koneksi.php');

class Model implements CrudInterface
{
    protected $table;

    protected $conn;

    public function __construct()
    {
        $koneksi = new Koneksi();
        $this->conn = $koneksi->getPDO();
    }

    public function store($data)
    {
        $keys = implode(', ', array_keys($data));
        $values = ':' . implode(', :', array_keys($data));

        try {
            $query = "INSERT INTO {$this->table} ({$keys}) VALUES ({$values})";
            $stmt = $this->conn->prepare($query);
            foreach ($data as $key => $value) {
                $stmt->bindValue(':' . $key, $value);
            }
            $stmt->execute($data);
            return true;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function edit($data)
    {
        try {
            $updateKolom = '';
            foreach ($data as $key => $value) {
                $updateKolom .= $key . '=:' . $key . ', ';
            }
            $updateKolom = rtrim($updateKolom, ', ');

            $query = "UPDATE {$this->table} SET {$updateKolom} WHERE id = :id";
            $stmt = $this->conn->prepare($query);

            foreach ($data as $key => $value) {
                $stmt->bindValue(':' . $key, $value);
            }
            $stmt->execute($data);
            return true;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function destroy($id)
    {
        try {
            $query = "DELETE FROM {$this->table} WHERE id = :id";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function findById($id)
    {
        $query = "SELECT * FROM tabel WHERE id=:id";
        $stmt = $this->conn->query($query);
        $stmt->bindParam(':id', $id);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function findAll()
    {
        $query = "SELECT * FROM {$this->table}";
        $stmt = $this->conn->query($query);
        return json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
    }
}
?>