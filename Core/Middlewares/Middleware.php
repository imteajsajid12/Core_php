<?php
/** @var mixed $route */
if ($route['Middleware'] === "Auth") {
    $_SESSION['Auth'] = $route['Middleware'];
    header('location: /Admin');
    die();
}
if ($route['Middleware'] === "Guest") {
    $_SESSION['Auth'] = $route['Middleware'];
    header('location: /');
    die();
}
