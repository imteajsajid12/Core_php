<?php
//function base_path($path = null){
//    echo $path;
//    return BASE_PATH . $path;
//}

use Core\Routes;

function view($path = null, $attributes = []){
    $router = new Routes();
    $router->redirect($path);
    extract($attributes);
//    require base_path('view/'.$path);
}
function base_path($path = null){
    return BASE_PATH . $path;
}

