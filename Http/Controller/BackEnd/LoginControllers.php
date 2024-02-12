<?php
include base_path(  '/Http/Forms/LohinForm.php');
//namespace Controller\LoginController;

function index()
{
//    $_SESSION['name'] = "imteaj";
    view('BackEnd/login.php');
}


function create()
{
// validate
    $validation= new \Http\Forms\LohinForm();
    $validation->validate($_POST["email"], $_POST["password"]);
//login
    $data = new \Core\Database();
    $value = $data->query('Select * from users WHERE email =:email ', [
        'email' => $_POST['email'],
    ])->find();
    if ($value) {
        if (password_verify($_POST['password'], $value['password'])) {
            $Success ['message'] = "Role created successfully";
           login($value['email']);
        }
    }else{
        $Errors['errors'] = 'Email not found';
     print_r($validation->getErrors());
    }

    view('BackEnd/login.php',['Errors' => $validation->getErrors()]);

}


