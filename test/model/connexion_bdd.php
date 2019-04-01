<?php 

function check_info ($param)
{
    $database = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
    $get_info = $database->prepare('SELECT pseudo, mdp FROM membres WHERE pseudo = ?');
    $get_info->execute(array($_POST['pseudo']));
    $check_info = $get_info->fetch();

    return $check_info[$param];
}

?>