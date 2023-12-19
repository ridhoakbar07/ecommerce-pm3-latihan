<?php
session_start();
include_once 'helpers/routes.php';
include_once 'helpers/functions.php';
$routes = Routes::getRoutes();


run($_SERVER['REQUEST_URI'], $routes);
?>