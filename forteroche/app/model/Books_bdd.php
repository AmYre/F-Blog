<?php

class Books_bdd{

    private $database;

    public function __construct()
    {
        try {
            $this->database = new PDO('mysql:host=localhost;dbname=benhqabf_roche;charset=utf8', 'benhqabf_roche', 'Zelda28*');
            $this->database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) { echo 'Échec lors de la connexion : ' . $e->getMessage();}
    }

    public function insert_book ($book_id, $book)
    {
        $database = $this->database;
        $insert_book = $database->prepare('INSERT INTO books (id, title) VALUES (?, ?)');
        $insert_book->execute(array($book_id, $book));

        return $insert_book;
    }

    public function show_books()
    {
        $database = $this->database;
        $books = $database->query('SELECT * FROM books ORDER BY id DESC');

        return $books;
    }

    public function show_book($id)
    {
        $database = $this->database;
        $books = $database->prepare("SELECT * FROM books WHERE id = ?");
        $books->execute(array($id));

        return $books;
    }

    public function check_books($id)
    {
        $database = $this->database;
        $check_book = $database->prepare("SELECT id FROM books WHERE id = ?");
        $check_book->execute(array($id));
        $book_exist = $check_book->rowcount();

        return $book_exist;
    }

    public function show_book_chapters($book_id)
    {
        $database = $this->database;
        $selected_book = $database->prepare("SELECT * FROM chapters WHERE book_id = ?");
        $selected_book->execute(array($book_id));

        return $selected_book;
    }

    public function update_book_title($id, $title)
    {
        $database = $this->database;
        $select_book = $database->prepare("UPDATE books SET title = ? WHERE id = ?");
        $select_book->execute(array($title, $id));

        return $select_book;
    }

    public function update_chapter_title($id, $title)
    {
        $database = $this->database;
        $select_chapter = $database->prepare("UPDATE chapters SET book = ? WHERE book_id = ?");
        $select_chapter->execute(array($title, $id));

        return $select_chapter;
    }

    public function delete_book($id)
    {
        $database = $this->database;
        $deleted_book = $database->prepare("DELETE FROM books WHERE id = ?");
        $deleted_book->execute(array($id));

        return $deleted_book;
    }



}