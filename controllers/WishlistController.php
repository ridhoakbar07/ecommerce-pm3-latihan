<?php
require_once 'Models/Wishlist.php';

class WishlistController
{

    private $wishlistModel;

    public function __construct()
    {
        $this->wishlistModel = new Wishlist();
    }

    public function index()
    {
        if (isset($_SESSION['role_user'])) {
            $wishlists = $this->wishlistModel->findWishlist();
            view("public/index", ['page' => 'wishlist', 'wishlists' => $wishlists]);
        }else {
            view("public/index", ['page' => '403']);
        }
    }

    public function save()
    {
        $result = $this->wishlistModel->store($_POST);

        if ($result === true) {
            $message = [
                'tipe' => 'success',
                'pesan' => 'Berhasil menambahkan produk ke Wishlist!',
            ];
        } else {
            $message = [
                'tipe' => 'error',
                'pesan' => $result->errorInfo['2'],
            ];
        }

        $_SESSION['flash_message'] = $message;
        header('Location: /');
    }

    public function delete($id)
    {
        $result = $this->wishlistModel->destroy($id);
        if ($result === true) {
            $message = [
                'tipe' => 'success',
                'pesan' => 'Produk ini dihapus di wishlist anda!',
            ];
        } else {
            $message = [
                'tipe' => 'error',
                'pesan' => $result->errorInfo['2'],
            ];
        }

        $_SESSION['flash_message'] = $message;
        header('Location: /');
    }

}

?>