<?php

namespace Core;

class Authenticator
{


    public function __construct()
    {
    }

    public function attempt($email, $password)
    {
        $data = new Database();
        $value = $data->query('Select * from users WHERE email =:email ', [
            'email' => $email,
        ])->get();
        if ($value) {
            if (password_verify($password, $value['password'])) {
                $Success ['message'] = "Role created successfully";
                $this->login($value);
               header('location: /');
                die();
            }
            return false;
        }

    }
    public function Admin_attempt($email, $password)
    {
        $data = new Database();
        $value = $data->query('Select * from users WHERE email =:email ', [
            'email' => $email,
        ])->get();
        if ($value) {
            if (password_verify($password, $value['password'])) {
                $Success ['message'] = "Role created successfully";
                $this->Admin_login($value);
               header('location: /Admin/home');
                die();
            }
            return false;
        }

    }

   public function login($user)
    {
        $_SESSION[ 'auth'] = $user;
        $_SESSION[ 'Auth'] =  "Auth"; ;
        session_create_id(true);
    }
    public function Admin_login($user)
    {
        $_SESSION[ 'auth'] = $user;
        $_SESSION[ 'Auth'] = "Admin";
        session_create_id(true);
    }

    public function logout(){

        session_destroy();
        header('location: /');
//        session_destroy_id(true);
    }
}
