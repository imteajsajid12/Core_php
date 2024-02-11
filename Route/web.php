<?php



/** @var mixed $router */
$router->get('/Admin/login', '/Controller/BackEnd/loginController.php', 'index1');
//home
//$router->get('/Admin/home', '/Controller/BackEnd/Home /Controller.php','index');
//
$router->get('/Admin/role', '/Controller/BackEnd/RoleController.php', 'index');

$router->post('/Admin/role/create', '/Controller/BackEnd/RoleController.php', 'create');
////
//
//
//
////register
//$router->get('/Admin/register', '/Controller/BackEnd/RegisterController.php','index');
//$router->Post('/register', '/Controller/BackEnd/RegisterController.php');


$router->get('/test', '/Controller/Controller.php','index');