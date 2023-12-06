<?php
class Routes {
   public static function getRoutes(): array {
       return [
           '/' => 'HomeController@index',
           '/login' => 'AuthController@loginForm',
           '/logout' => 'AuthController@logout',
           '/register' => 'AuthController@registrationForm',
           '/dashboard' => 'DashboardController@index',
           '/dashboard/users' => 'DashboardController@user',
           '/dashboard/user/add' => 'UserController@create',
           '/dashboard/user/delete/(\d+)' => 'UserController@delete',
           '/verifylogin' => 'AuthController@verifyLogin',
           '/registerUser' => 'AuthController@registerUser',
           '/dashboard/produk' => 'DashboardController@produk',
           '/api/users' => 'UserController@getUsers',
       ];
   }
}
?>