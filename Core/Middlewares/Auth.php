<?php

namespace Core\Middlewares ;

class Auth
{
    public function handle()
    {
        echo "Auth";
//        if (isset($_SESSION['user'])) {
//            header('location: /');
//            die();
//        }
    }

}