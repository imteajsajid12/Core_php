<?php
//use Routers;
$router = new \Core\Routes();
$routes = require ('web.php');
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$method = $_POST['method'] ?? $_SERVER['REQUEST_METHOD'];
$router->router($uri, $method);