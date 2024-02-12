<?php

namespace Core;
use \Core\Middlewares\Auth;

class Config

{

public function kk()
{
    echo "heq";
}
    public function data($value, $min=1, $max=255){

        echo $value;
//        $value=trim($value);
//        return strlen($value)>= $min && strlen($value) <= $max ;

    }
}