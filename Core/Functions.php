<?php
//function base_path($path = null){
//    echo $path;
//    return BASE_PATH . $path;
//}

use Core\Routes;

function view($path = null, $attributes = []){

    $router = new Routes();
    extract($attributes);
    $router->redirect($path , $attributes);

//    require base_path('view/'.$path);
}
function base_path($path = null){
    return BASE_PATH . $path;
}

