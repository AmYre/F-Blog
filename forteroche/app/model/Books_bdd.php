<?php
error_reporting(E_ALL);
class Books_bdd{

    private $database;

    public function __construct()
    {
        $this->database = new PDO('mysql:host=localhost;dbname=benhqabf_roche;charset=utf8', 'benhqabf_roche', 'Zelda28*');
    }

    public function show_books()
    {
        $database = $this->database;
        $books = $database->query('SELECT DISTINCT book FROM chapters');

        return $books;
    }

    public function show_book_chapters($book)
    {
        $database = $this->database;
        $selected_book = $database->query('SELECT * FROM chapters WHERE book = "'.preg_replace('/(?=(?<!^)[[:upper:]])/', ' ', $book).'"  ');

        return $selected_book;
    }

   /* public function insert_book($book, $chapter_genre)
    {
        $database = $this->database;
        $save_book = $database->prepare('INSERT INTO books (book, genre, timy) VALUES(?, ?, NOW())');
        $insert_book = $save_book->execute(array($book, $chapter_genre ));

        return $insert_book;
    }



    public function show_book_chapters($book_id)
    {
        $database = $this->database;
        $show_chapters = $database->query(
            "SELECT book_id, title, chapter, author, comment, chapters.timy AS chap_timy, comments.timy AS com_timy
            FROM comments
            JOIN chapters ON (comments.chapter_id = chapters.id)
            WHERE (comments.chapter_id = $book_id AND chapters.id = $book_id )");

        return $show_chapters;
    }*/

}