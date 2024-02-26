<?php


use \Http\Controller;
use Http\Controller\DController;

session_start();// Start the session

const  BASE_PATH     = __DIR__ . '/../'; // path to the base directory
require BASE_PATH . 'vendor/autoload.php';//autoload

include(BASE_PATH . 'Http/Forms/LohinForm.php');// /Http/Forms/LoginForm.php
include(BASE_PATH . 'Core/Authenticator.php');//add authenticator
require(BASE_PATH . '/Core/Session.php');// include the session
//include(BASE_PATH . 'Core/Validator.php');// include the error
require(BASE_PATH . '/Core/Validation.php');// include the validation
require(BASE_PATH . '/Core/Database.php');// include the database
include(BASE_PATH . "Core/Functions.php");// include the functions
require(BASE_PATH . '/Core/Config.php');// include the config
require(BASE_PATH . '/Core/Routes.php');// include the routes


unset($_SESSION['__route']["Auths"]);







// $data= [\Http\Controller\DController::class, 'index'] ;
// call_user_func_array(($data ));

//call_user_func_array([ new DController() , 'index'],[""]);

//$data= new \Core\Routes();
//$data->test("[ new DController() , 'index']","daaa");

//unset($_SESSION['__flash']);
//if (isset($_SESSION['__flash'])){
//    Session::unflash();
//}
//Session::unflash();
//$_SESSION['__flash']=[];
//print_r(\Core\Session::get('Errors'));


