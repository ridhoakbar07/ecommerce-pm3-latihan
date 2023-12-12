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
        $kategoris = $this->kategoriModel->findAll();

        view('dashboard/index', ['kategoris' => $kategoris, 'page' => 'kategori']);
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
            // Handle exceptions thrown from kategoriModel's save method
            $message = [
                'tipe' => 'error',
                'pesan' => $result,
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
            // Handle exceptions thrown from kategoriModel's save method
            $message = [
                'tipe' => 'error',
                'pesan' => $result,
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
            // Handle exceptions thrown from kategoriModel's save method
            $message = [
                'tipe' => 'error',
                'pesan' => $result,
            ];
        }

        $_SESSION['flash_message'] = $message;
        header('Location: /dashboard/kategoris');
    }
}

?>