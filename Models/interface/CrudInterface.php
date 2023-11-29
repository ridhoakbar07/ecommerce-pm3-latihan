<?php
interface CrudInterface{
    public function create ($data);
    public function findById($id);
    public function findAll();
    public function update ($id, $data);
    public function delete ($id);
}

?>