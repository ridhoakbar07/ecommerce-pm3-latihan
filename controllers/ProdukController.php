<?php
require_once 'Models/Produk.php';
require_once 'Models/Kategori.php';

class ProdukController
{

    private $produkModel;
    
    public function __construct()
    {
        $this->produkModel = new Produk();
    }

    public function index()
    {
        $produks = $this->produkModel->findAll();

        view('dashboard/index', ['produks' => $produks, 'page' => 'produk']);
    }

    public function save()
    {
        $result = $this->produkModel->store($_POST);
        if ($result === true) {
            $message = [
                'tipe' => 'success',
                'pesan' => 'Data berhasil disimpan!',
            ];
        } else {
            // Handle exceptions thrown from produkModel's save method
            $message = [
                'tipe' => 'error',
                'pesan' => $result,
            ];
        }

        $_SESSION['flash_message'] = $message;
        header('Location: /dashboard/produks');
    }

    public function update()
    {
        $result = $this->produkModel->edit($_POST);
        if ($result === true) {
            $message = [
                'tipe' => 'success',
                'pesan' => 'Data berhasil diperbarui!',
            ];
        } else {
            // Handle exceptions thrown from produkModel's save method
            $message = [
                'tipe' => 'error',
                'pesan' => $result,
            ];
        }

        $_SESSION['flash_message'] = $message;
        header('Location: /dashboard/produks');
    }

    public function delete($id)
    {
        $result = $this->produkModel->destroy($id);
        if ($result === true) {
            $message = [
                'tipe' => 'success',
                'pesan' => 'Data berhasil dihapus!',
            ];
        } else {
            // Handle exceptions thrown from produkModel's save method
            $message = [
                'tipe' => 'error',
                'pesan' => $result,
            ];
        }

        $_SESSION['flash_message'] = $message;
        header('Location: /dashboard/produks');
    }
}

?>