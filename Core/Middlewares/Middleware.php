<?php
//include base_path('/Core/Middleware/Auth.php');
require base_path('Core/Middlewares/Auth.php');
require base_path('Core/Middlewares/Admin.php');
require base_path('Core/Middlewares/Middlewares.php');
/** @var mixed $route */


\Core\Middlewares\Middlewares::resolve($route['Middleware']);


//if($route['Middleware'])
//{
//    $middleware = \Core\Middlewares\Middlewares::Maping[$route['Middleware']];
//    (new $middleware())->handle();
//}




//if ($route['Middleware'] === "Auth") // check if user is authenticated
//{
//    if(empty($_SESSION['Auth']) )
//    {
//        (new \Core\Middlewares\Auth())->handle();
//    }
//}if ($route['Middleware'] === "Admin") // check if user is authenticated
//{
//    (new \Core\Middlewares\Auth())->handle();
//}


