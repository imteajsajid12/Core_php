<?php

namespace Http\Controller;

class LoginController
{


    public function index()
    {
        view('Frontend/login.php', [
            'Errors' => \Core\Session::get('Errors'),
        ]);
    }

    public function create()
    {
        $validation = new \Http\Forms\LohinForm();
        $attempt = new \Core\Authenticator();
        $validation->validate($_POST["email"], $_POST["password"]);
        if ($attempt->attempt($_POST["email"], $_POST["password"])) {
            \Core\Session::flash('Errors',$validation->getErrors()) ;
            header('/home');
            exit();
        }
        \Core\Session::flash('Errors',$validation->getErrors()) ;
        header('location: /login');

//  return header('location: /Admin/home');
//    \Core\Session::unflash();
//        view('/login.php', ['Errors' => $validation->getErrors()]);

    }

}