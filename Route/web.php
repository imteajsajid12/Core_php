<?php



/** @var mixed $router */
$router->get('/Admin/login', '/BackEnd/LoginControllers.php', 'index');
$router->post('/Admin/login', '/BackEnd/LoginControllers.php', 'create');
//home
//$router->get('/Admin/home', '/Controller/BackEnd/Home /Controller.php','index');
//
$router->get('/Admin/role', '/BackEnd/RoleController.php', 'index')->auth('Auth');

$router->post('/Admin/role/create', '/BackEnd/RoleController.php', 'create');
////
//
//
//
////register
//$router->get('/Admin/register', '/Controller/BackEnd/RegisterController.php','index');
//$router->Post('/register', '/Controller/BackEnd/RegisterController.php');


$router->get('/test', '/Controller/Controller.php','index');