<?php

class Write_control{

    public function show_write()
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
        $myBdd = new Chapters_bdd();
        $myView = new View('write');

        $chapter =  htmlspecialchars($_POST['chapter']);
        $chapter_title =  htmlspecialchars($_POST['title']);
        $chapter_book =  htmlspecialchars($_POST['book']);
        $chapter_volume =  htmlspecialchars($_POST['volume']);
        $chapter_num =  htmlspecialchars($_POST['num']);
        
        if ( isset($_POST['publish_btn']) ) 
        {
            if ( !empty($chapter) && !empty($chapter_title) && !empty($chapter_book) && !empty($chapter_volume) && !empty($chapter_num) )
            {
                $feedback = 'Chapitre publié'; 
                
                $insert_chapter = $myBdd->insert_chapter($chapter, $chapter_title, $chapter_book, $chapter_volume, $chapter_num);
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
