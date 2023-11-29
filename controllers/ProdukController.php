<?php

require_once('../Models/ProdukModel.php');
    class ProdukController{
        private $ProdukModel;

        public function __construct() {
            $this->ProdukModel = new ProdukModel();
        }

        public function createProduk($data){
        return $this->ProdukModel->create($data);
        }

        public function getUsers(){
            return $this->ProdukModel->findAll();
        }

        public function getById($id){
            return $this->ProdukModel->findById($id);
        }

        public function updateProduk($id, $data){
            return $this->ProdukModel->update($id, $data);
        }

        public function deleteProduk($id){
            return $this->ProdukModel->delete($id);
        }
    }
?>