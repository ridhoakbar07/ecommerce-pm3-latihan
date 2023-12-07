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
            '/dashboard/users' => 'DashboardController@user',
            '/dashboard/user/save' => 'UserController@save',
            '/dashboard/user/update' => 'UserController@update',
            '/dashboard/user/delete/(\d+)' => 'UserController@delete',

            '/dashboard/kategori' => 'DashboardController@kategori',

            //route untuk API disini
            '/api/users' => 'ApiController@getUsers',
        ];
    }
}
?>