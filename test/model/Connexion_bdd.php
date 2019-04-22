<?php 

class Connexion_bdd {

    private $database;

    public function __construct()
    {
        $this->database = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
    }

    public function check_info ($param, $pseudo)
    {
        $database =  $this->database ;
        $get_info = $database->prepare('SELECT pseudo, mdp FROM membres WHERE pseudo = ?');
        $get_info->execute(array($pseudo));
        $check_info = $get_info->fetch();

        return $check_info[$param];
    }

}
