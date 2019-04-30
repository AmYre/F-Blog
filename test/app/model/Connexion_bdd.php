<?php 

class Connexion_bdd {

    private $database;

    public function __construct()
    {
        $this->database = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
    }

    public function check_pseudo ($pseudo)

    {
        $database = $this->database;
        $check_pseudo = $database->prepare("SELECT pseudo FROM membres WHERE pseudo = ?");
        $check_pseudo->execute(array($pseudo));
        $pseudo_exist = $check_pseudo->rowcount();

        return $pseudo_exist;
    }
    
    public function get_mdp($pseudo)

    {
        $database = $this->database;
        $check_mdp = $database->prepare("SELECT mdp FROM membres WHERE pseudo = ?");
        $check_mdp->execute([$pseudo]);
        $mdp_exist = $check_mdp->fetch();

        return $mdp_exist;
    }
    

}
