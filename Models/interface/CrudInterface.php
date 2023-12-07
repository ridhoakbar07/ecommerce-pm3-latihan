<?php
interface CrudInterface
{
    public function store($data);
    public function findById($id);
    public function findAll();
    public function edit($data);
    public function destroy($id);
}

?>