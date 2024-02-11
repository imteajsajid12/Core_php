<?php
use Core\Database;


session_start();// Start the session
const  BASE_PATH     = __DIR__ . '/../'; // path to the base directory
include (BASE_PATH . "Core/Functions.php");// include the functions
require (BASE_PATH.'/Core/Database.php') ;// include the database
require(BASE_PATH .'/Core/Routes.php') ;// include the routes
require( BASE_PATH.'/Core/Config.php') ;// include the config





