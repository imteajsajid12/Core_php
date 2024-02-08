<?php

namespace Core;

class Validation
{
    public  static function string($value, $min=1, $max=255){
        $value=trim($value);
        return strlen($value)>= $min && strlen($value) <= $max ;

    }

    public static function Email($value, $min=1, $max=255){

        //validation email
        return filter_var($value, FILTER_VALIDATE_EMAIL);
    }

}