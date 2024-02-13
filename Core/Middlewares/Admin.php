<?php

namespace Core\Middlewares;

class Admin
{
    public function handle()
    {
        if(empty($_SESSION['Auth']) )
        {
            header('Location: /Admin/login');
            die();
        }
    }
}