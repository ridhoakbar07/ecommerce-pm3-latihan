<?php

function view($viewName, $data = []) {
    extract($data);
    include "Views/$viewName.php";
}

function run(string $url, array $routes): void {
    $uri = parse_url($url);
    $path = $uri['path'];

    $matchedRoute = false;

    foreach ($routes as $route => $handler) {
        if (preg_match("#^$route$#", $path, $matches)) {
            $callback = explode('@', $handler);
            $controllerName = $callback[0];
            $methodName = $callback[1];

            include_once "Controllers/$controllerName.php";

            if (class_exists($controllerName)) {
                $controller = new $controllerName();

                if (method_exists($controller, $methodName)) {
                    // Extract the numeric ID from the matches array
                    $id = isset($matches[1]) ? $matches[1] : null;

                    // Pass $id to the controller method
                    $controller->$methodName($id);
                    $matchedRoute = true;
                    break;
                } else {
                    // Handle method not found
                }
            } else {
                // Handle controller not found
            }
        }
    }

    if (!$matchedRoute) {
        view("404");
    }
}

?>