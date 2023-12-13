<?php
require_once 'Models/Kategori.php';

class KategoriController
{

    private $kategoriModel;

    public function __construct()
    {
        $this->kategoriModel = new Kategori();
    }

    public function index()
    {
        view('dashboard/index', ['page' => 'kategori']);
    }

    public function save()
    {
        $result = $this->kategoriModel->store($_POST);

        if ($result === true) {
            $message = [
                'tipe' => 'success',
                'pesan' => 'Data berhasil disimpan!',
            ];
        } else {
            $message = [
                'tipe' => 'error',
                'pesan' => $result->errorInfo['2'],
            ];
        }

        $_SESSION['flash_message'] = $message;
        header('Location: /dashboard/kategoris');
    }

    public function update()
    {
        $result = $this->kategoriModel->edit($_POST);
        if ($result === true) {
            $message = [
                'tipe' => 'success',
                'pesan' => 'Data berhasil diperbarui!',
            ];
        } else {
            $message = [
                'tipe' => 'error',
                'pesan' => $result->errorInfo['2'],
            ];
        }

        $_SESSION['flash_message'] = $message;
        header('Location: /dashboard/kategoris');
    }

    public function delete($id)
    {
        $result = $this->kategoriModel->destroy($id);
        if ($result === true) {
            $message = [
                'tipe' => 'success',
                'pesan' => 'Data berhasil dihapus!',
            ];
        } else {
            $message = [
                'tipe' => 'error',
                'pesan' => $result->errorInfo['2'],
            ];
        }

        $_SESSION['flash_message'] = $message;
        header('Location: /dashboard/kategoris');
    }
}

?>