<?php

function dbConnect()
{
    try
    {
        $database = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
        return $database;
    }
    catch(Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }
}

function check_pseudo ()

{
    $database = dbConnect();
    $check_pseudo = $database->prepare("SELECT pseudo FROM membres WHERE pseudo = ?");
    $check_pseudo->execute(array($_POST['pseudo']));
    $pseudo_exist = $check_pseudo->rowcount();

    return $pseudo_exist;
}


function check_mail ()

{
    $database = dbConnect();
    $check_mail = $database->prepare("SELECT email FROM membres WHERE email = ?");
    $check_mail->execute(array($_POST['email']));
    $mail_exist = $check_mail->rowcount();

    return $mail_exist;
}

function registration()
{
    $database = dbConnect();
    $register = $database->prepare('INSERT INTO membres (pseudo, email, mdp, date_inscription) VALUES(?, ?, ?, NOW())');
    $registration = $register->execute( array( $_POST['pseudo'], $_POST['email'], password_hash($_POST['mdp'], PASSWORD_DEFAULT) ) );

    return $registration;
}

?>
