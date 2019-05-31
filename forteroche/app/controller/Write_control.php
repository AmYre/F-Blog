<?php
error_reporting(E_ALL);
ini_set("display_errors", 1); 

class Write_control{

    public function show()
    {
        $feedback = '';

        $myBdd = new Books_bdd();
        $books = $myBdd->show_books();

        $myView = new View('write');
        $myView->show(array ('feedback' => $feedback, 'books' => $books) );
    }

    public function show_book_title($id)
    {
        $myBdd = new Books_bdd();
        
        $select_book = $myBdd->show_book($id);
        while($book = $select_book->fetch())
        {
            echo $book['title'];
        }
    }

    public function manage_chapters($book_id)
    {

        $myBdd = new Books_bdd();
        $book_chapters = $myBdd->show_book_chapters($book_id);
        while($chapters = $book_chapters->fetch())
            {
                echo '
                <div class="shadow-lg p-3 m-3 rounded"> 
                    <p class="tchat-pseudo gradient"> Chapitre n°'.$chapters['num_chapter'].' - '.$chapters['title'].'</p>
                    <form action="/forteroche/app/Chapter_manager/show/'.$chapters['id'].'/'.$chapters['num_chapter'].'" method="post"><button class="btn btn-info">Gérer ce chapitre</button></form>
                </div>';
            }
        
    }

    public function update_book_title()
    {
        $title = $_POST['update_title'];
        $id = $_POST['title_id'];

        if(!empty($title))
        {
            $feedback = 'Titre du Livre mis à jour';
            $myBdd = new Books_bdd();
            $book_chapters = $myBdd->update_book_title($id, $title); 
            $book_title = $myBdd->update_chapter_title($id, $title);
            $books = $myBdd->show_books();
            
            $myView = new View('write');
            $myView->show(array ('feedback' => $feedback, 'books' => $books) );

        } else { echo 'Veuillez remplir le titre du livre'; }

        $myBdd = new Books_bdd();
        $books = $myBdd->show_books();

        $myView = new View('write');
        $myView->show(array ('feedback' => $feedback, 'books' => $books) );
        
    }

    public function delete_book($id)
    {
        $feedback = 'Livre supprimé avec tous ses chapitres';

        $myBdd = new Books_bdd();
        $book_chapters = $myBdd->delete_book($id); 
        $books = $myBdd->show_books();
        
        $myView = new View('write');
        $myView->show(array ('feedback' => $feedback, 'books' => $books) );
    
    }


    public function insert_chapter () 
    {
        $feedback = '';

        $book =  $_POST['book'];
        $book_id =  $_POST['id'];
        $chapter_title =  $_POST['title'];
        $chapter_num =  $_POST['num'];
        $chapter_genre =  $_POST['genre'];
        $chapter =  $_POST['chapter'];
        
        if ( isset($_POST['publish_btn']) ) 
        {
            if ( !empty($book) && !empty($book_id) && !empty($chapter_title) && !empty($chapter_num) && !empty($chapter_genre) && !empty($chapter))
            {
                $feedback = 'Chapitre publié'; 

                $myBdd = new Chapters_bdd();
                $bdd = new Books_bdd();
                $myView = new View('write');

                $check_book = $bdd->check_books($book_id);
                if ($check_book == 0) 
                {  
                    $insert_book = $bdd->insert_book($book_id, $book);
                }

                $books = $bdd->show_books();
                $insert_chapter = $myBdd->insert_chapter($book, $book_id, $chapter_title, $chapter_num, $chapter_genre, $chapter);
                $show_chapter = $myBdd->show_chapter();

                $myView = new View('write');
                $myView->show(array ('feedback' => $feedback, 'show_chapter' => $show_chapter, 'books' => $books) );
            }else 
            { 
                $feedback = 'Syndrome de la page blanche ?';

                $myBdd = new Chapters_bdd();
                $bdd = new Books_bdd();
                $myView = new View('write');
                
                $show_chapter = $myBdd->show_chapter();
                $books = $bdd->show_books();
                $myView->show(array ('feedback' => $feedback, 'show_chapter' => $show_chapter, 'books' => $books) );
                
            }
            
        }

    }

}
