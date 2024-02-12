<?php

namespace Core;

class Validator
{
    public function __construct(){

    }

    public static function string($value, $min=1, $max=255){
        $value=trim($value);
        return strlen($value)>= $min && strlen($value) <= $max ;
//        echo json_encode($value);
    }
    public static function Email($value, $min=1, $max=255){
        //validation email
        $value=trim($value);
        return filter_var($value, FILTER_VALIDATE_EMAIL);
    }
}