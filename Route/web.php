<?php


use \Http\Controller;

/** @var mixed $router */


//Admin//
$router->get('/Admin/login', [new  Controller\BackEnd\LoginController(),'index']);
$router->post('/Admin/login', [new  Controller\BackEnd\LoginController(),'create']);
$router->get('/Admin/logout', [new  Controller\BackEnd\LoginController(),'logout'])->auth("Admin");
//home
$router->get('/Admin/home', [new  Controller\BackEnd\HomeController(),'index'])->auth("Admin");
$router->post('/Admin/home', [new  Controller\BackEnd\HomeController(),'create'])->auth("Admin");
$router->get('/Admin/home', [new  Controller\BackEnd\HomeController(),'edit'])->auth("Admin");
$router->post('/Admin/home', [new  Controller\BackEnd\HomeController(),'delete'])->auth("Admin");

//shop//
$router->get('/Admin/shop', [new  Controller\BackEnd\ShopController(),'index'])->auth("Admin");
$router->post('/Admin/shop/create', [new  Controller\BackEnd\ShopController(),'create'])->auth("Admin");
$router->get('/Admin/shop', [new  Controller\BackEnd\ShopController(),'edit'])->auth("Admin");
$router->get('/Admin/shop', [new  Controller\BackEnd\ShopController(),'update'])->auth("Admin");
$router->post('/Admin/shop/delete', [new  Controller\BackEnd\ShopController(),'delete'])->auth("Admin");
$router->get('/Admin/test', [new  Controller\BackEnd\ShopController(),'test'])->auth("Admin");


//home controller
$router->get('/Admin/homepage',[new  Controller\BackEnd\HomepageController(),'index'])->auth('Admin');
$router->post('/Admin/homepage/create',[new  Controller\BackEnd\HomepageController(),'create'])->auth('Admin');
$router->get('/Admin/homepage/edit', [new  Controller\BackEnd\HomepageController(),'edit'])->auth('Admin');
$router->post('/Admin/homepage/update', [new  Controller\BackEnd\HomepageController(),'update'])->auth('Admin');
$router->post('/Admin/homepage/delete', [new  Controller\BackEnd\HomepageController(),'delete'])->auth('Admin');


//role
$router->get('/Admin/role', [new Controller\BackEnd\RoleController(),'index'])->auth('Admin');
$router->post('/Admin/role/create',[new Controller\BackEnd\RoleController(),'create'])->auth('Admin');
$router->get('/Admin/role/edit', [new Controller\BackEnd\RoleController(),'edit'])->auth('Admin');
$router->post('/Admin/role/update', [new Controller\BackEnd\RoleController(),'update'])->auth('Admin');
$router->post('/Admin/role/delete', [new Controller\BackEnd\RoleController(),'delete'])->auth('Admin');









////register
//$router->get('/Admin/register', '/Controller/BackEnd/RegisterController.php','index');
//$router->Post('/register', '/Controller/BackEnd/RegisterController.php');

//frontend

$router->get('/',[ new Controller\HomeController(),'index']);
$router->get('/shop',[ new Controller\ShopController,'index']);
//$router->get('/contact', '/ContactController.php','index');
//$router->get('/blog', '/BlogController.php','index');
//$router->get('/', '/Controller.php','index');
//$router->get('/', '/Controller.php','index');