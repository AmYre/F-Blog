<?php
error_reporting(E_ALL);
ini_set("display_errors", 1); 

class Chapters_bdd{

    private $database;

    public function __construct()
    {
        try {
            $this->database = new PDO('mysql:host=localhost;dbname=benhqabf_roche;charset=utf8', 'benhqabf_roche', 'Zelda28*');
            $this->database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
         echo 'Échec lors de la connexion : ' . $e->getMessage();}
    }

    public function insert_chapter ($book, $book_id, $chapter_title, $chapter_num, $chapter_genre, $chapter)
    {
        $database = $this->database;
        $save_chapter = $database->prepare('INSERT INTO chapters (book, book_id, title, num_chapter, genre, chapter, timy) VALUES(?, ?, ?, ?, ?, ?, NOW())');
        $insert_chapter = $save_chapter->execute(array($book, $book_id, $chapter_title, $chapter_num, $chapter_genre, $chapter));

        return $insert_chapter;
    }

    public function show_chapter ()
    {
        $database = $this->database;
        $chapters = $database->query('SELECT DATE_FORMAT(timy, "%d/%m/%Y à %Hh%imin") AS timywoo, book, book_id, num_chapter, id, title, chapter FROM chapters ORDER BY id DESC LIMIT 5');

        return $chapters;
    }

    public function select_chapter($id, $num_chapter)
    {
        $database = $this->database;
        $selected_chapter = $database->query("SELECT * FROM chapters WHERE id = $id AND num_chapter = $num_chapter");

        return $selected_chapter;
    }

    public function show_comments($chapter_id)
    {
        $database = $this->database;
        $show_comments = $database->query(
            "SELECT chapter_id, flag, title, chapter, author, comment, chapters.timy AS chap_timy, comments.timy AS com_timy
            FROM comments
            JOIN chapters ON (comments.chapter_id = chapters.id)
            WHERE (comments.chapter_id = $chapter_id AND chapters.id = $chapter_id )");

        return $show_comments;
    }

    public function check_comments($chapter_id)
    {
        $database = $this->database;
        $show_comments = $database->query(
            "SELECT chapter_id, flag, title, chapter, author, comment, chapters.timy AS chap_timy, comments.timy AS com_timy
            FROM comments
            JOIN chapters ON (comments.chapter_id = chapters.id)
            WHERE (comments.chapter_id = $chapter_id AND chapters.id = $chapter_id )");
        $comments_exist = $show_comments->rowcount();

        return $comments_exist;
    }
    

    public function update_chapter($chapter_update, $id)
    {
        $database = $this->database;
        $update_chapter = $database->prepare(" UPDATE chapters SET chapter = ? WHERE id = ? ");
        $updated_chapter = $update_chapter->execute(array( $chapter_update, $id ));

        return $updated_chapter;
    }

    public function delete_chapter($id)
    {
        $database = $this->database;
        $delete_chapter = $database->prepare(' DELETE FROM chapters WHERE id = ? ');
        $deleted_chapter = $delete_chapter->execute(array( $id ));
    }

}


