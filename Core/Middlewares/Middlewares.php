<?php

namespace Core\Middlewares;

class Middlewares
{
  public  const  Maping=
        [
            'Auth'=>Auth::class,
            'Admin'=>Admin::class,
//            'Guest'=>Guest::class,
        ];
    public static function  resolve ($key)
    {
        if (isset($key)) {
            $middleware = static::Maping[$key];
            (new $middleware())->handle();
        }
        return;
    }
}

