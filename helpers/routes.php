<?php
class Routes {
   public static function getRoutes(): array {
       return [
           '/' => 'HomeController@index',
           '/login' => 'AuthController@loginForm',
           '/logout' => 'AuthController@logout',
           '/register' => 'AuthController@registrationForm',
           '/dashboard' => 'DashboardController@index',
           '/verifylogin' => 'AuthController@verifyLogin',
           '/registerUser' => 'AuthController@registerUser',
       ];
   }
}
?>