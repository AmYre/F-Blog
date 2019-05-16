<?php

class Search_bdd{

    private $database;

    public function __construct()
    {
        $this->database = new PDO('mysql:host=localhost;dbname=benhqabf_roche;charset=utf8', 'benhqabf_roche', 'Zelda28*');
    }

    public function find_chapters($search)
    {

        $database = $this->database;
        $chapters_results = $database->query(" SELECT DISTINCT title FROM chapters WHERE CONCAT(title, book, genre) like '%$search%' ");

        return $chapters_results;
    }

    public function find_books($search)
    {

        $database = $this->database;
        $books_results = $database->query(" SELECT DISTINCT book FROM chapters WHERE CONCAT(title, book, genre) like '%$search%' ");

        return $books_results;
    }

    public function find_genre($search)
    {

        $database = $this->database;
        $genre_results = $database->query(" SELECT DISTINCT genre FROM chapters WHERE CONCAT(title, book, genre) like '%$search%' ");

        return $genre_results;
    }


}