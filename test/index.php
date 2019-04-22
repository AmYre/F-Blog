<?php 

include_once('config.php');

My_autoload::start();

$redirection = $_GET['redir'];

$routing = new Routeur($redirection);

$routing->renderController();


?>