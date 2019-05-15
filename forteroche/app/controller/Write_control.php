<?php
error_reporting(E_ALL);
class Write_control{

    public function show()
    {
        $feedback = '';

        $myBdd = new Chapters_bdd();
        $show_chapter = $myBdd->show_chapter();

        $myView = new View('write');
        $myView->show(array ('feedback' => $feedback, 'show_chapter' => $show_chapter) );
    }

    public function insert_chapter () 
    {
        $feedback = '';

        $book =  $_POST['book'];
        $chapter_title =  $_POST['title'];
        $chapter =  $_POST['chapter'];
        $chapter_genre =  $_POST['genre'];
        $chapter_num =  $_POST['num'];
        
        if ( isset($_POST['publish_btn']) ) 
        {
            if ( !empty($chapter) && !empty($chapter_title) && !empty($chapter_genre) && !empty($chapter_num) && !empty($book))
            {
                $feedback = 'Chapitre publié'; 

                $myBdd = new Chapters_bdd();
                $myView = new View('write');
                $insert_chapter = $myBdd->insert_chapter($book, $chapter, $chapter_title, $chapter_genre, $chapter_num);
                $show_chapter = $myBdd->show_chapter();
                $myView = new View('write');
                $myView->show(array ('feedback' => $feedback, 'show_chapter' => $show_chapter) );
            }else 
            { 
                $feedback = 'Syndrome de la page blanche ?';
                
                $show_chapter = $myBdd->show_chapter();
                $myView->show(array ('feedback' => $feedback, 'show_chapter' => $show_chapter) );
                
            }
            
        }

    }

}
