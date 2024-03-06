<?php
//include base_path('/Core/Middleware/Auth.php');
require base_path('Core/Middlewares/Auth.php');
require base_path('Core/Middlewares/Admin.php');
require base_path('Core/Middlewares/Middlewares.php');
/** @var mixed $route */


\Core\Middlewares\Middlewares::resolve($route['Middleware']);



/** @var string $path */

if (($route['Middleware'] === "Admin") || ($path === "Admin")) {
    $_SESSION['__route']["Auths"] = "Admin";
}
if ($route['Middleware'] === "Auth") {
    $_SESSION['__route']["Auths"] = "Auth";
}
if (empty($route['Middleware'])) {
    $_SESSION['__route']["Auths"] = "Guest";
}
if($path === "Admin")
{
    $_SESSION['__route']["Auths"] = "Admin";
}






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


