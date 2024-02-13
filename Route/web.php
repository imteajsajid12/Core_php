<?php



/** @var mixed $router */

//Admin//
$router->get('/Admin/login', '/BackEnd/LoginControllers.php', 'index');
$router->post('/Admin/login', '/BackEnd/LoginControllers.php', 'create');
//home
$router->get('/Admin/home', '/BackEnd/HomeController.php','index')->auth("Admin");
$router->get('/Admin/role', '/BackEnd/RoleController.php', 'index')->auth('Admin');
$router->post('/Admin/role/create', '/BackEnd/RoleController.php', 'create```')->auth('Admin');



////register
//$router->get('/Admin/register', '/Controller/BackEnd/RegisterController.php','index');
//$router->Post('/register', '/Controller/BackEnd/RegisterController.php');


$router->get('/test', '/Controller/Controller.php','index');