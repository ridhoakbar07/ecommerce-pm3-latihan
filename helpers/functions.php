<?php

function view($viewName, $data = []) {
    extract($data);
    include "Views/$viewName.php";
}

function run(string $url, array $routes): void {
    $uri = parse_url($url);
    $path = $uri['path'];
    
    if (!array_key_exists($path, $routes)) {
        return;
    }
    
    $callback = explode('@', $routes[$path]);
    
    $controllerName = $callback[0];
    $methodName = $callback[1];
    
    include_once "Controllers/$controllerName.php";
    
    if (class_exists($controllerName)) {
        
        $controller = new $controllerName();
        
        if (method_exists($controller, $methodName)) {
            $controller->$methodName();
        } else {
            // Handle method not found
        }
    } else {
        // Handle controller not found
    }
}

?>