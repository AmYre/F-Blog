<?php

class Reading_bdd {

    private $database;

    public function __construct()
    {
        $this->database = new PDO('mysql:host=localhost;dbname=benhqabf_roche;charset=utf8', 'benhqabf_roche', 'Zelda28*');
    }

    public function select_chapter($id)
    {
        $database =  $this->database;
        $selected_chapter = $database->query("SELECT * FROM chapters WHERE id = $id");

        return $selected_chapter;
    }

    public function select_book()
    {
        $database =  $this->database;
        $selected_chapter = $database->query('SELECT DATE_FORMAT(timy, "%d/%m/%Y à %Hh%imin") AS timywoo, book, num_chapter, id, title, chapter FROM chapters WHERE book = Le spectre du Soleil');

        return $selected_chapter;
    }

    public function insert_comment ($pseudonyme, $mess, $id, $membre_id)
    {
        $database =  $this->database;
        $save_comment = $database->prepare('INSERT INTO comments (chapter_id, author, author_id, comment, timy) VALUES(?, ?, ?, ?, NOW())');
        $insert_comment = $save_comment->execute(array( $id, htmlspecialchars($pseudonyme), $membre_id, htmlspecialchars($mess)));

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

    public function delete_comments($com_id)
    {
        $database = $this->database;
        $delete_chapter = $database->prepare(' DELETE FROM comments WHERE id = ? ');
        $deleted_chapter = $delete_chapter->execute(array( $com_id ));
    }


}
