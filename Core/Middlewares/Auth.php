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
        }
    }

}