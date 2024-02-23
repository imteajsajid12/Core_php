<?php

namespace Core\Middlewares ;

class Auth
{
    public function handle()
    {
        if (empty($_SESSION['Auth'])) {
            header('Location: /login');
            die();
        } elseif ($_SESSION['Auth'] !== "Auth") {
            header('Location: /login');
            die();
        }



//        echo "Auth";

//        if(empty($_SESSION['Auth']) )
//        {
//            header('Location: /login');
//            die();
//        } elseif(!empty($_SESSION['Auth'] ) && $_SESSION['Auth'] !== "Auth") {
//
//            print_r($_SESSION['Auth']);
//            if ($_SESSION['Auth'] !== "Auth")
//                header('Location: /login');
//            die();
//        }

    }
}