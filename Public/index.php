<?php
use Core\Database;
use Core\Config;



session_start();// Start the session
const  BASE_PATH     = __DIR__ . '/../'; // path to the base directory
include(BASE_PATH . 'Core/Validator.php');// include the error
require( BASE_PATH.'/Core/Validation.php') ;// include the validation
require (BASE_PATH.'/Core/Database.php') ;// include the database
include (BASE_PATH . "Core/Functions.php");// include the functions
require(BASE_PATH .'/Core/Routes.php') ;// include the routes
require( BASE_PATH.'/Core/Config.php') ;// include the config

//require( BASE_PATH.'/Core/Config.php') ;// include the config




