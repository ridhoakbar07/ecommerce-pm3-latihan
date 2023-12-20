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
        if (isset($_GET['cari']) && $_GET['cari']) {
            $produks = $this->produkModel->findByNamaProduk($_GET['cari']);
        } else if (isset($_GET['cari']) && $_GET['cari']) {
            $produks = $this->produkModel->findProduksKategori();
        }
        view('dashboard/index', ['page' => 'produk', 'produks' => $produks]);
    }

    public function save()
    {
        $foto = $_FILES['foto'] ?? null;

        if ($foto && $foto['size'] > 300 * 1024) {
            $message = [
                'tipe' => 'error',
                'pesan' => 'Kesalahan : Ukuran Foto Maksimal 300kb',
            ];
        } else {
            $result = $this->produkModel->storeWithFoto($foto);

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
        }

        $_SESSION['flash_message'] = $message ?? null;
        header('Location: /dashboard/produks');
    }

    public function update()
    {
        $foto = $_FILES['foto'] ?? null;

        if ($foto && $foto['size'] > 300 * 1024) {
            $message = [
                'tipe' => 'error',
                'pesan' => 'Kesalahan : Ukuran Foto Maksimal 300kb',
            ];
        } else {
            $result = $this->produkModel->editWithFoto($foto);

            if ($result === true) {
                $message = [
                    'tipe' => 'success',
                    'pesan' => 'Data berhasil diubah!',
                ];
            } else {
                $message = [
                    'tipe' => 'error',
                    'pesan' => $result->errorInfo['2'],
                ];
            }
        }

        $_SESSION['flash_message'] = $message ?? null;
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
            // Pesan error diambil dari PDO Exception pada Model yang menangani
            $message = [
                'tipe' => 'error',
                'pesan' => $result->errorInfo['2'],
            ];
        }

        $_SESSION['flash_message'] = $message;
        header('Location: /dashboard/produks');
    }

}

?>