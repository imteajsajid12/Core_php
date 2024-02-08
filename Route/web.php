<?php
$router = new \Core\Routes();
//$routes = require ('web.php');
$router->get('/', '/Controller/BackEnd/loginController.php');
$router->get('/home', '/Controller/index.php');



$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$method = $_POST['method'] ?? $_SERVER['REQUEST_METHOD'];
//echo $method;
$router->router($uri, $method);

