<?php if (session_status() == PHP_SESSION_NONE)  {session_start();  }

error_reporting(E_ALL); 
ini_set("display_errors", 1); 

$currentCookieParams = session_get_cookie_params();  
$sidvalue = session_id();  
setcookie( 'PHPSESSID', $sidvalue, 0, $currentCookieParams['path'], $currentCookieParams['domain'], true,  true );
include_once('config.php');

My_autoload::start();

$routing = new Routeur();

?>