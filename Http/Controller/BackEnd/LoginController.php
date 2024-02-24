<?php

namespace Http\Controller\BackEnd;

class LoginController
{
   public function index()
    {
        view('BackEnd/login.php',[
            'Errors' => \Core\Session::get('Errors'),
        ]);
    }


  public  function create()
    {
// validate
        $validation= new \Http\Forms\LohinForm();
        $attempt= new \Core\Authenticator();
        $validation->validate($_POST["email"], $_POST["password"]);
        if ($attempt->Admin_attempt($_POST["email"], $_POST["password"])) {
            header('/Admin/home');
            exit();
        }
//   \Core\Session::flash('Errors',$validation->getErrors()) ;
//  return header('location: /Admin/home');
//    \Core\Session::unflash();
        view('BackEnd/login.php',['Errors' => $validation->getErrors()]);

    }
  public  function logout()
    {
        (new \Core\Authenticator())->logout();
    }
}