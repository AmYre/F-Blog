<?php if (session_status() == PHP_SESSION_NONE)  {session_start();  }

error_reporting(E_ALL); 
ini_set("display_errors", 1); 

$currentCookieParams = session_get_cookie_params();  
$sidvalue = session_id();  
setcookie(  
    'PHPSESSID',//name  
    $sidvalue,//value  
    0,//expires at end of session  
    $currentCookieParams['path'],//path  
    $currentCookieParams['domain'],//domain  
    true, //secure  
    true //http  
); 


include_once('config.php');

My_autoload::start();

$routing = new Routeur();

?>