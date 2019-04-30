<?php

class User_bdd {

    private $database;

    public function __construct()
    {
        $this->database = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
    }

    public function check_comments ($pseudo)

    {
        $database = $this->database;
        $check_pseudo = $database->prepare("SELECT author FROM comments WHERE author = ?");
        $check_pseudo->execute(array($pseudo));
        $pseudo_exist = $check_pseudo->rowcount();

        return $pseudo_exist;
    }

    public function get_comments ($pseudo)
    {
        $database = $this->database;
        $comments = $database->prepare("SELECT * FROM comments WHERE author = ? ");
        $comments->execute(array($pseudo));

        return $comments;
    }
    

}
