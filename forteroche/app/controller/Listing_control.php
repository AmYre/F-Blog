<?php

class Listing_control{

    public function show_chapters()
    {      
        $myBdd = new Chapters_bdd();
        $chapters = $myBdd->show_chapter();

        $myView = new View('listing_chapters');
        $myView->show(array ('chapters' => $chapters));
    }

    public function show_books()
    {      
        $myBdd = new Books_bdd();
        $books = $myBdd->show_books();

        $myView = new View('listing_books');
        $myView->show(array ('books' => $books));
    }

    public function show_book_chapters($book_id)
    {      
        $myBdd = new Books_bdd();
        $book_chapters = $myBdd->show_book_chapters($book_id);

        $myView = new View('listing_book_chapters');
        $myView->show(array ('book_chapters' => $book_chapters));
    }

}
