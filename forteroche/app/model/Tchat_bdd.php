<?php

class Tchat_bdd{

    private $database;

    public function __construct()
    {
        $this->database = new PDO('mysql:host=localhost;dbname=benhqabf_roche;charset=utf8', 'benhqabf_roche', 'Zelda28*');
    }

    public function insert_tchat ($pseudonyme, $mess)
    {
        $database = $this->database;
        $save_tchat = $database->prepare('INSERT INTO tchat (pseudonyme, mess, timy) VALUES(?, ?, NOW())');
        $insert_tchat = $save_tchat->execute(array(htmlspecialchars($pseudonyme), htmlspecialchars($mess)));

    }

    public function show_tchat ()
    {
        $database = $this->database;
        $membres = $database->query('SELECT DATE_FORMAT(timy, "%d/%m/%Y à %Hh%imin") AS timywoo, pseudonyme, mess FROM tchat ORDER BY id DESC LIMIT 5');

        return $membres;
    }


}











