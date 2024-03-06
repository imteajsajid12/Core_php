<?php

use Core\Validation;





$database = new \Core\Database();
require base_path('/Core/Validation.php'); // path to the validation

function  index()
{
    view('/BackEnd/Register/Register.view.php');
}



$Errors = [];

// submit request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //validation
    if (!Validation::string($_POST['name'], 1, 255)) {
        $Errors['errors'] = 'Name is required';

    }
    if (!Validation::string($_POST['email'], 5, 255)) {
        $Errors['errors'] = 'Email is required';

    }
    if (!Validation::string($_POST['password'], 6, 255)) {

//        $Errors['errors'] = 'Password is required';
    }

    if (empty($Errors)) {

        $database->query('insert into users(name,email,password) values(:name,:email,:password)',
            [
                'name' => $_POST['name'],
                'email' => $_POST['email'],
//                $_POST['password'] => $_POST['c_password'],
                'password' => password_hash($_POST['password'],
                    PASSWORD_BCRYPT)
            ]);
    }
    header('Location: /login');
}
view('/BackEnd/Register/Register.view.php',[
    'Errors' => $Errors
]);
