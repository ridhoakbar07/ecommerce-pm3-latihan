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
            '/dashboard/user/add' => 'UserController@create',
            '/dashboard/user/delete/(\d+)' => 'UserController@delete',

            //route untuk API disini
            '/api/users' => 'ApiController@getUsers',
        ];
    }
}
?>