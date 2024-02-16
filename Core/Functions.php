<?php
//function base_path($path = null){
//    echo $path;
//    return BASE_PATH . $path;
//}

use Core\Routes;

function view($path = null, $attributes = []){
    $router = new Routes();
    $router->redirect($path );
    extract($attributes);
//    require base_path('view/'.$path);
}
function base_path($path = null){
    return BASE_PATH . $path;
}

function redirect( $view ="index")
{
    $page =file_get_contents( BASE_PATH.'View/index.php');

    $viewpage = file_get_contents(BASE_PATH.'View/Frontend/Shop.view.php');

// Include the page based on the variable value
//include($page);
    require str_replace(' {{containt}}', $viewpage, $page);
}