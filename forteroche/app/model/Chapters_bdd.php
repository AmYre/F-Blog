<?php

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
        $insert_chapter = $database->prepare('INSERT INTO chapters (book, book_id, title, num_chapter, genre, chapter, timy) VALUES(?, ?, ?, ?, ?, ?, NOW())');
        $insert_chapter->execute(array($book, $book_id, $chapter_title, $chapter_num, $chapter_genre, $chapter));

        return $insert_chapter;
    }

    public function show_chapter()
    {
        $database = $this->database;
        $chapters = $database->query('SELECT DATE_FORMAT(timy, "%d/%m/%Y à %Hh%imin") AS timywoo, book, book_id, num_chapter, id, title, chapter FROM chapters ORDER BY book_id DESC LIMIT 5');

        return $chapters;
    }

    public function select_chapter($id, $num_chapter)
    {
        $database = $this->database;
        $selected_chapter = $database->prepare("SELECT * FROM chapters WHERE id = ? AND num_chapter = ?");
        $selected_chapter->execute(array($id, $num_chapter));

        return $selected_chapter;
    }

    public function show_comments($chapter_id)
    {
        $database = $this->database;
        $comments = $database->prepare("SELECT * FROM comments WHERE chapter_id = ?");
        $comments->execute(array($chapter_id));

        return $comments;
    }

    public function check_comments($chapter_id)
    {
        $database = $this->database;
        $show_comments = $database->prepare("SELECT * FROM comments WHERE chapter_id = ?");
        $show_comments->execute(array($chapter_id));
        $comments_exist = $show_comments->rowcount();

        return $comments_exist;
    }

    public function update_chapter($chapter_update, $id)
    {
        $database = $this->database;
        $update_chapter = $database->prepare("UPDATE chapters SET chapter = ? WHERE id = ?");
        $update_chapter->execute(array( $chapter_update, $id ));

        return $update_chapter;
    }

    public function delete_chapter($id)
    {
        $database = $this->database;
        $delete_chapter = $database->prepare('DELETE FROM chapters WHERE id = ?');
        $delete_chapter->execute(array( $id ));

        return $delete_chapter;
    }

}


