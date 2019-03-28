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

function insert_tchat ()
{
    $database = dbConnect();
    $save_tchat = $database->prepare('INSERT INTO tchat (pseudonyme, mess, timy) VALUES(?, ?, NOW())');
    $insert_tchat = $save_tchat->execute(array(htmlspecialchars($_POST['pseudonyme']), htmlspecialchars($_POST['mess'])));

}

function show_tchat ()
{
    $database = dbConnect();
    $membres = $database->query('SELECT DATE_FORMAT(timy, "%d/%m/%Y à %Hh%imin") AS timywoo, pseudonyme, mess FROM tchat ORDER BY id DESC LIMIT 5');

    return $membres;
}


?>







