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

    public function create($data)
    {
        $keys = implode(', ', array_keys($data));
        $values = ':' . implode(', :', array_keys($data));

        $query = "INSERT INTO {$this->table} ({$keys}) VALUES ({$values})";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute($data);
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
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function update($id, $data)
    {
        $updateFields = '';
        foreach ($data as $key => $value) {
            $updateFields .= $key . '=:' . $key . ', ';
        }
        $updateFields = rtrim($updateFields, ', ');

        $query = "UPDATE {$this->table} SET {$updateFields} WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $data['id'] = $id;
        return $stmt->execute($data);
    }

    public function delete($id)
    {
        $query = "DELETE FROM {$this->table} WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

}
?>