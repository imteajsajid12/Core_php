<?php


use \Http\Controller;

/** @var mixed $router */


//Admin//
//$router->get('/Admin/login', '/BackEnd/LoginControllers.php', 'index');
//$router->post('/Admin/login', '/BackEnd/LoginControllers.php', 'create');
$router->get('/Admin/logout', '/BackEnd/LoginControllers.php', 'logout')->auth("Admin");
//home
$router->get('/Admin/home', '/BackEnd/HomeController.php','index')->auth("Admin");



//home controller
$router->get('/Admin/homepage', '/BackEnd/HomePage  Controller.php', 'index')->auth('Admin');
$router->post('/Admin/homepage/create', '/BackEnd/HomePage  Controller.php', 'create')->auth('Admin');
$router->get('/Admin/homepage/edit', '/BackEnd/HomePage Controller.php', 'edit')->auth('Admin');
$router->post('/Admin/homepage/update', '/BackEnd/HomePage  Controller.php', 'update')->auth('Admin');
$router->post('/Admin/homepage/delete', '/BackEnd/HomePage  Controller.php', 'delete')->auth('Admin');


//role
$router->get('/Admin/role', [new Controller\BackEnd\RoleController(),'index'])->auth('Admin');
$router->post('/Admin/role/create',[new Controller\BackEnd\RoleController(),'create'])->auth('Admin');
$router->get('/Admin/role/edit', [new Controller\BackEnd\RoleController(),'edit'])->auth('Admin');
//$router->post('/Admin/role/update', '/BackEnd/RoleController.php', 'update')->auth('Admin');
//$router->post('/Admin/role/delete', '/BackEnd/RoleController.php', 'delete')->auth('Admin');



////register
//$router->get('/Admin/register', '/Controller/BackEnd/RegisterController.php','index');
//$router->Post('/register', '/Controller/BackEnd/RegisterController.php');

//frontend

$router->get('/',[ new Controller\HomeController(),'index']);
//$router->get('/shop', '/ShopController.php','index');
//$router->get('/contact', '/ContactController.php','index');
//$router->get('/blog', '/BlogController.php','index');
//$router->get('/', '/Controller.php','index');
//$router->get('/', '/Controller.php','index');