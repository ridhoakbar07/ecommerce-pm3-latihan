<?php
class Routes {
    public static function getRoutes(): array {
        return [
            '/' => 'HomeController@index',
            '/login' => 'AuthController@loginForm',
            '/logout' => 'AuthController@logout',
            '/verifylogin' => 'AuthController@verifyLogin',
            '/registerUser' => 'AuthController@registerUser',
            '/register' => 'AuthController@registrationForm',
            '/dashboard' => 'DashboardController@index',
            
            //Dashboard User
            '/dashboard/users' => 'UserController@index',
            '/dashboard/user/save' => 'UserController@save',
            '/dashboard/user/update' => 'UserController@update',
            '/dashboard/user/delete/(\d+)' => 'UserController@delete',

            //Dashboard Kategori
            '/dashboard/kategori' => 'KategoriController@index',
            '/dashboard/kategori/save' => 'KategoriController@save',
            '/dashboard/kategori/update' => 'KategoriController@update',
            '/dashboard/kategori/delete/(\d+)' => 'KategoriController@delete',

            //route untuk API disini
            '/api/users' => 'ApiController@getUsers',
            '/api/kategoris' => 'ApiController@getKategoris',
        ];
    }
}
?>