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

        return $insert_tchat;
    }

    public function show_tchat ()
    {
        $database = $this->database;
        $membres = $database->query('SELECT DATE_FORMAT(timy, "%d/%m/%Y à %Hh%imin") AS timywoo, pseudonyme, mess, id FROM tchat ORDER BY id DESC LIMIT 5');

        return $membres;
    }

    public function update_comments($comment_update, $com_id)
    {
        $database = $this->database;
        $update_chapter = $database->prepare(" UPDATE tchat SET mess = ? WHERE id = ? ");
        $updated_chapter = $update_chapter->execute(array( htmlspecialchars($comment_update), $com_id ));

        return $updated_chapter;
    }

    public function delete_comments($com_id)
    {
        $database = $this->database;
        $delete_chapter = $database->prepare(' DELETE FROM tchat WHERE id = ? ');
        $deleted_chapter = $delete_chapter->execute(array( $com_id ));

        return $deleted_chapter;
    }


}











