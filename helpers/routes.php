<?php
class Routes
{
    public static function getRoutes(): array
    {
        return [
            '/' => 'HomeController@index',
            '/profile' => 'HomeController@profile',
            '/404' => 'HomeController@notFound',
            '/403' => 'HomeController@forbidden',
            '/login' => 'HomeController@login',
            '/register' => 'HomeController@register',
            '/logout' => 'AuthController@logout',
            '/verifylogin' => 'AuthController@verifyLogin',
            '/registerUser' => 'AuthController@registerUser',
            '/dashboard' => 'DashboardController@index',

            //Wishlist User
            '/wishlist' => 'WishlistController@index',
            '/addwish' => 'WishlistController@save',
            '/removewish/(\d+)' => 'WishlistController@delete',

            //Dashboard User
            '/dashboard/users' => 'UserController@index',
            '/dashboard/user/save' => 'UserController@save',
            '/dashboard/user/update' => 'UserController@update',
            '/dashboard/user/delete/(\d+)' => 'UserController@delete',

            //Dashboard Kategori
            '/dashboard/kategoris' => 'KategoriController@index',
            '/dashboard/kategori/save' => 'KategoriController@save',
            '/dashboard/kategori/update' => 'KategoriController@update',
            '/dashboard/kategori/delete/(\d+)' => 'KategoriController@delete',

            //Dashboard Produk
            '/dashboard/produks' => 'ProdukController@index',
            '/dashboard/produk/save' => 'ProdukController@save',
            '/dashboard/produk/update' => 'ProdukController@update',
            '/dashboard/produk/delete/(\d+)' => 'ProdukController@delete',

            //route untuk API disini
            '/api/users' => 'ApiController@getUsers',
            '/api/user/(\d+)' => 'ApiController@getUserById',
            '/api/kategoris' => 'ApiController@getKategoris',
            '/api/kategori/(\d+)' => 'ApiController@getKategoriById',
            '/api/produks' => 'ApiController@getProduks',
            '/api/produk/(\d+)' => 'ApiController@getProdukById',
        ];
    }
}
?>