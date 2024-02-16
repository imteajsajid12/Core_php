<?php

namespace Core\Middlewares ;

class Auth
{
    public function handle()
    {
        if(empty($_SESSION['Auth']) )
        {
            header('Location: /login');
            die();
        } elseif(!empty($_SESSION['Auth'] ) && $_SESSION['Auth'] !== "Auth") {
//            if ($_SESSION['Auth'] !== "Auth")
                header('Location: /login');
            die();
        }

    }
}