<?php

namespace Core\Middlewares;

class Middlewares
{
  public  const  Maping=
        [
            'Auth'=>Auth::class,
//            'Auth'=>Auth::class,
//            'Guest'=>Guest::class,
        ];
    public static function  resolve ($key)
    {
      $middleware = static::Maping[$key];
        (new Auth())->handle();

    }
}

