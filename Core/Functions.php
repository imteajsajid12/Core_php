<?php
//function base_path($path = null){
//    echo $path;
//    return BASE_PATH . $path;
//}

function view($path = null, $attributes = []){

    extract($attributes);
    require base_path('view/'.$path);
}
function base_path($path = null){
    return BASE_PATH . $path;
}
