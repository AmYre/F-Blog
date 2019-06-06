<?php

class User_bdd {

    private $database;

    public function __construct()
    {
        $this->database = new PDO('mysql:host=localhost;dbname=benhqabf_roche;charset=utf8', 'benhqabf_roche', 'Zelda28*');
    }

    public function check_comments ($pseudo)

    {
        $database = $this->database;
        $check_pseudo = $database->prepare("SELECT author FROM comments WHERE author = ?");
        $check_pseudo->execute(array($pseudo));
        $pseudo_exist = $check_pseudo->rowcount();

        return $pseudo_exist;
    }

    public function get_comments ($id)
    {
        $database = $this->database;
        $comments = $database->prepare("SELECT * FROM comments WHERE author_id = ? ");
        $comments->execute(array($id));

        return $comments;
    }

    public function update_author ($update_pseudo, $id)
    {
        $database = $this->database;
        $update_author = $database->prepare("UPDATE comments SET author = ? WHERE author_id = ?");
        $update_author->execute(array($update_pseudo, $id));

        return $update_author;
    }
    
    public function update_user($update_pseudo, $pseudo)
    {
        $database = $this->database;
        $register_update = $database->prepare('UPDATE membres SET pseudo = ? WHERE pseudo = ?');
        $register_update->execute(array($update_pseudo, $pseudo));

        return $register_update;
    }

    public function update_mail($update_mail, $mail)
    {
        $database = $this->database;
        $register_update = $database->prepare('UPDATE membres SET email = ? WHERE email = ?');
        $register_update->execute(array($update_mail, $mail));

        return $register_update;
    }

    public function update_mdp($update_mdp, $pseudo)
    {
        $database = $this->database;
        $register_update = $database->prepare('UPDATE membres SET mdp = ? WHERE pseudo = ?');
        $register_update->execute(array(password_hash($update_mdp, PASSWORD_DEFAULT), $pseudo));

        return $register_update;
    }
    

}
