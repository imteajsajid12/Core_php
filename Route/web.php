<?php


use \Http\Controller;

/** @var mixed $router */


//Admin//
$router->get('/Admin/login', [new  Controller\BackEnd\LoginController(),'index']);
$router->post('/Admin/login', [new  Controller\BackEnd\LoginController(),'create']);
$router->get('/Admin/logout', [new  Controller\BackEnd\LoginController(),'logout']);
//home
$router->get('/Admin/home', [new  Controller\BackEnd\HomeController(),'index'])->auth("Admin");
$router->post('/Admin/home', [new  Controller\BackEnd\HomeController(),'create'])->auth("Admin");
$router->get('/Admin/home', [new  Controller\BackEnd\HomeController(),'edit'])->auth("Admin");
$router->post('/Admin/home', [new  Controller\BackEnd\HomeController(),'delete'])->auth("Admin");

//shop//
$router->get('/Admin/shop', [new  Controller\BackEnd\ShopController(),'index'])->auth("Admin");
$router->post('/Admin/shop/create', [new  Controller\BackEnd\ShopController(),'create'])->auth("Admin");
$router->get('/Admin/shop/edit', [new  Controller\BackEnd\ShopController(),'edit'])->auth("Admin");
$router->get('/Admin/shop', [new  Controller\BackEnd\ShopController(),'update'])->auth("Admin");
$router->post('/Admin/shop/delete', [new  Controller\BackEnd\ShopController(),'delete'])->auth("Admin");
$router->get('/Admin/test', [new  Controller\BackEnd\ShopController(),'test'])->auth("Admin");

//color//
//$router->get('/Admin/color', [new  Controller\BackEnd\ShopController(),'index'])->auth("Admin");
////size//
//$router->get('/Admin/size', [new  Controller\BackEnd\ShopController(),'index'])->auth("Admin");


//Category//
$router->get('/Admin/category', [new  Controller\BackEnd\CategoriesController(),'index'])->auth("Admin");
$router->post('/Admin/category/create', [new  Controller\BackEnd\CategoriesController(),'create'])->auth("Admin");
$router->post('/Admin/category/delete', [new  Controller\BackEnd\CategoriesController(),'delete'])->auth("Admin");

//brand
$router->get('/Admin/brand', [new  Controller\BackEnd\BrandCrontroller(),'index'])->auth("Admin");
$router->post('/Admin/brand/create', [new  Controller\BackEnd\BrandCrontroller(),'create'])->auth("Admin");
$router->post('/Admin/brand/delete', [new  Controller\BackEnd\BrandCrontroller(),'delete'])->auth("Admin");



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
$router->get('/login',[ new Controller\LoginController(),'index']);
$router->post('/login',[ new Controller\LoginController(),'create']);
$router->get('/shop',[ new Controller\ShopController,'index']);
//protected details
$router->get('/product_details',[ new Controller\Product_detailsController(),'index']);
//cart//
$router->post('/shop/cart',[ new Controller\CartController,'create'])->auth('Auth');
$router->get('/cart',[ new Controller\CartController,'index'])->auth('Auth');
$router->post('/cart/delete',[ new Controller\CartController,'delete'])->auth('Auth');

$router->get('/product_details',[ new Controller\ShopController,'index']);
//$router->get('/contact', '/ContactController.php','index');
//$router->get('/blog', '/BlogController.php','index');
//$router->get('/', '/Controller.php','index');
//$router->get('/', '/Controller.php','index');