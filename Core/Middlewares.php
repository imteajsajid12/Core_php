<?php

namespace Core;

use Core\Middleware\Admin;
use Core\Middleware\Auth;

class Middlewares
{
const  Maping=
    [
        'Admin'=>Admin::class,
        'Auth'=>Auth::class,
//        'Guest'=>Guest::class,
    ];


}