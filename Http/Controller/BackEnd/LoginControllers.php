<?php
include base_path(  '/Http/Forms/LohinForm.php');// /Http/Forms/LoginForm.php
include base_path(  '/Core/Authenticator.php');//add authenticator
//namespace Controller\LoginController;

function index()
{
    view('BackEnd/login.php');
}


function create()
{
// validate
    $validation= new \Http\Forms\LohinForm();
    $attempt= new \Core\Authenticator();
    $validation->validate($_POST["email"], $_POST["password"]);
    if ($attempt->attempt($_POST["email"], $_POST["password"])) {
        header('/Admin/home');
        exit();
    }
    view('BackEnd/login.php',['Errors' => $validation->getErrors()]);

}


