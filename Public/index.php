<?php
use Core\Database;
const  BASE_PATH     = __DIR__ . '/../'; // path to the base directory

include (BASE_PATH . "Core/Functions.php");// include the functions

// database connect/
require (BASE_PATH.'/Core/Database.php') ;// include the database
require(BASE_PATH .'/Core/Routes.php') ;// include the routes
require( BASE_PATH.'/Core/Config.php') ;// include the config
require (BASE_PATH.'Route/web.php');// include the routes

//$data =new Database();
//$dd=$data->query('SELECT * FROM users')->get(); //
//echo json_encode($dd);
