<?php

class Reading_bdd {

    private $database;

    public function __construct()
    {
        $this->database = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
    }

    public function select_chapter($id)
    {
        $database =  $this->database;
        $selected_chapter = $database->query("SELECT * FROM chapters WHERE id = $id");

        return $selected_chapter;
    }

    public function insert_comment ($pseudonyme, $mess, $id)
    {
        $database =  $this->database;
        $save_comment = $database->prepare('INSERT INTO comments (chapter_id, author, comment, timy) VALUES(?, ?, ?, NOW())');
        $insert_comment = $save_comment->execute(array( $id, htmlspecialchars($pseudonyme), htmlspecialchars($mess)));

        return $insert_comment;
    }

    public function show_comments($id)
    {
        $database =  $this->database;
        $show_comments = $database->query(
            "SELECT chapter_id, title, chapter, author, comment, comments.id AS com_id, chapters.timy AS chap_timy, comments.timy AS com_timy
            FROM comments
            JOIN chapters ON (comments.chapter_id = chapters.id)
            WHERE (comments.chapter_id = $id AND chapters.id = $id ) ORDER BY com_timy DESC");

        return $show_comments;
    }

    public function update_comments($comment_update, $com_id)
    {
        $database = $this->database;
        $update_chapter = $database->prepare(" UPDATE comments SET comment = ? WHERE id = ? ");
        $updated_chapter = $update_chapter->execute(array( htmlspecialchars($comment_update), $com_id ));

        return $updated_chapter;
    }


}
