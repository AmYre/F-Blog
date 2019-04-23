<?php

class Chapters_bdd{

    private $database;

    public function __construct()
    {
        $this->database = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
    }

    public function insert_chapter ($chapter, $chapter_title, $chapter_book, $chapter_volume, $chapter_num)
    {
        $database = $this->database;
        $save_chapter = $database->prepare('INSERT INTO chapters (chapter, title, book, volume, num, timy) VALUES(?, ?, ?, ?, ?, NOW())');
        $insert_chapter = $save_chapter->execute(array(htmlspecialchars($chapter), htmlspecialchars($chapter_title), htmlspecialchars($chapter_book), htmlspecialchars($chapter_volume), htmlspecialchars($chapter_num) ));

        return $insert_chapter;
    }

    public function show_chapter ()
    {
        $database = $this->database;
        $chapters = $database->query('SELECT DATE_FORMAT(timy, "%d/%m/%Y à %Hh%imin") AS timywoo, id, title, chapter FROM chapters ORDER BY id DESC LIMIT 5');

        return $chapters;
    }

    public function select_chapter($id)
    {
        $database = $this->database;
        $selected_chapter = $database->query("SELECT * FROM chapters WHERE id = $id");

        return $selected_chapter;
    }

    public function show_comments($chapter_id)
    {
        $database = $this->database;
        $show_comments = $database->query(
            "SELECT chapter_id, title, chapter, author, comment, chapters.timy AS chap_timy, comments.timy AS com_timy
            FROM comments
            JOIN chapters ON (comments.chapter_id = chapters.id)
            WHERE (comments.chapter_id = $chapter_id AND chapters.id = $chapter_id )");

        return $show_comments;
    }

    public function update_chapter($chapter_update, $id)
    {
        $database = $this->database;
        $update_chapter = $database->prepare(" UPDATE chapters SET chapter = ? WHERE id = ? ");
        $updated_chapter = $update_chapter->execute(array( htmlspecialchars($chapter_update), $id ));

        return $updated_chapter;
    }

    public function delete_chapter($id)
    {
        $database = $this->database;
        $delete_chapter = $database->prepare(' DELETE FROM chapters WHERE id = ? ');
        $deleted_chapter = $delete_chapter->execute(array( $id ));
    }

}


