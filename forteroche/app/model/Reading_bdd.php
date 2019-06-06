<?php

class Reading_bdd {

    private $database;

    public function __construct()
    {
        try {
            $this->database = new PDO('mysql:host=localhost;dbname=benhqabf_roche;charset=utf8', 'benhqabf_roche', 'Zelda28*');
            $this->database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) { echo 'Échec lors de la connexion : ' . $e->getMessage();}

    }

    public function select_chapter($id)
    {
        $database = $this->database;
        $selected_chapter = $database->prepare("SELECT * FROM chapters WHERE id = ? ");
        $selected_chapter->execute(array($id));

        return $selected_chapter;
    }

    public function insert_comment ($pseudonyme, $mess, $id, $membre_id)
    {
        $database = $this->database;
        $insert_comment = $database->prepare('INSERT INTO comments (chapter_id, author, author_id, comment, flag, timy) VALUES(?, ?, ?, ?, 0, NOW())');
        $insert_comment->execute(array( $id, htmlspecialchars($pseudonyme), $membre_id, htmlspecialchars($mess)));

        return $insert_comment;
    }

    public function show_comments($id)
    {
        $database = $this->database;
        $show_comments = $database->prepare("SELECT * FROM comments WHERE chapter_id = ?");
        $show_comments->execute(array($id));

        return $show_comments;
    }

    public function flag_comments($id)
    {
        $database = $this->database;
        $flag_comment = $database->prepare("UPDATE comments SET flag = flag + 1 WHERE id = ?");
        $flag_comment->execute(array($id));

        return $flag_comment;
    }

    public function unflag_comments($com_id)
    {
        $database = $this->database;
        $flag_comment = $database->prepare("UPDATE comments SET flag = 0 WHERE id = ?");
        $flag_comment->execute(array($com_id));

        return $flag_comment;
    }

    public function update_comments($comment_update, $com_id)
    {
        $database = $this->database;
        $update_com = $database->prepare(" UPDATE comments SET comment = ? WHERE id = ? ");
        $update_com->execute(array( htmlspecialchars($comment_update), $com_id ));

        return $update_com;
    }

    public function delete_comments($com_id)
    {
        $database = $this->database;
        $delete_com = $database->prepare(' DELETE FROM comments WHERE id= ? ');
        $delete_com->execute(array( $com_id ));

        return $delete_com;
    }

    public function ban_user($author_id)
    {
        $database = $this->database;
        $delete_user = $database->prepare("DELETE FROM membres WHERE id = ?");
        $delete_user->execute(array($author_id));

        return $delete_user;
    }

    public function delete_user_comments($author_id)
    {
        $database = $this->database;
        $delete_com = $database->prepare(' DELETE FROM comments WHERE author_id= ? ');
        $delete_com->execute(array( $author_id ));

        return $delete_com;
    }

}
