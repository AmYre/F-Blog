<?php

class Create_bdd {

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


    public function check_mail ($email)

    {
        $database = $this->database;
        $check_mail = $database->prepare("SELECT email FROM membres WHERE email = ?");
        $check_mail->execute(array($email));
        $mail_exist = $check_mail->rowcount();

        return $mail_exist;
    }

    public function registration($pseudo, $email, $mdp)
    {
        $database = $this->database;
        $register = $database->prepare('INSERT INTO membres (pseudo, email, mdp, date_inscription) VALUES(?, ?, ?, NOW())');
        $registration = $register->execute( array( $pseudo, $email, password_hash($mdp, PASSWORD_DEFAULT) ) );

        return $registration;
    }

}
