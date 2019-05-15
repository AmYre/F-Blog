<?php if (session_status() == PHP_SESSION_NONE)  {session_start();  }

error_reporting(E_ALL); 
ini_set("display_errors", 1); 

include_once('config.php');

My_autoload::start();

$routing = new Routeur();

?>