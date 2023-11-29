<?php
include_once 'controllers/UserController.php';
$uc = new UserController();

return [
   '/' => function (array $params = []){
      if (isset($_SESSION['role_user']) && $_SESSION['role_user'] === 1) {
         header("location: /dashboard");
      } else {
         include_once('Views/public/index.php');
      }
   },

   '/login' => function (array $params = []) use ($uc) {
      if (!isset($_SESSION['role_user'])) {
         include_once('Views/public/login.php');
      } else {
         header('location: /');
      }
   },

   '/logout' => function (array $params = []) use ($uc) {
      $uc->logout();
   },

   '/register' => function (array $params = []) {
      if (isset($params['message'])) {
         echo $params['message'];
      }
      include_once('Views/public/register.php');
   },

   '/dashboard' => function (array $params = []) {
      if (!isset($_SESSION['role_user'])) {
         header('location: /login');
      }

      if (isset($_SESSION['role_user']) && $_SESSION['role_user'] === 1) {
         include_once('Views/dashboard/index.php');
      } else {
         echo "403 - Access Forbidden | Anda bukan Admin";
      }
   },

   '/verifylogin' => function (array $params = []) use ($uc) {
      $email = $params['email'];
      $password = $params['password'];
      $uc->verifyLogin($email, $password);
   },

   '/registerUser' => function (array $params = []) use ($uc) {
      $username = $params['username'];
      $email = $params['email'];
      $password = $params['password'];
      $uc->create($username, $email, $password);
   },
];
?>