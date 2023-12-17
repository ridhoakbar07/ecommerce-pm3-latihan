<?php
session_start();
include_once 'helpers/routes.php';
include_once 'helpers/functions.php';
$routes = Routes::getRoutes();

if (strpos($_SERVER['REQUEST_URI'], '/api') !== false) {
    run($_SERVER['REQUEST_URI'], $routes);
    return; // Stop further execution to prevent HTML rendering for API requests
}

run($_SERVER['REQUEST_URI'], $routes);
?>