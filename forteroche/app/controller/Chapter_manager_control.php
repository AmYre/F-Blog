<?php

class Chapter_manager_control{

    public function show( $id, $num_chapter)
    {
        $feedback = '';

        $myBdd = new Chapters_bdd;
        $select_chapter = $myBdd->select_chapter($id, $num_chapter);
        $show_comments = $myBdd->show_comments($id);

        $myView = new View('chapter_manager');
        $myView->show(array ('feedback' => $feedback, 'id' => $id, 'select_chapter' => $select_chapter, 'show_comments' => $show_comments) );
    }

    public function updateANDdelete_chapter($id, $num_chapter)
    {
        $feedback = '';

        $myBdd = new Chapters_bdd;
        $select_chapter = $myBdd->select_chapter($id, $num_chapter);
        $show_comments = $myBdd->show_comments($id);

        if ( isset($_POST['chap_btn_update']) ) 
        {
            $chapter_update = $_POST['chapter_update'];

            if ( isset($_POST['chapter_update']) && !empty($chapter_update) )
            {
                $feedback = 'Chapitre mis à jour';

                $update_chapter = $myBdd->update_chapter($chapter_update, $id);
                $select_chapter = $myBdd->select_chapter($id, $num_chapter);

                $bdd = new Books_bdd();
                $books = $bdd->show_books();
                $show_chapter = $myBdd->show_chapter();

                $myView = new View('write');
                $myView->show(array ('feedback' => $feedback, 'id' => $id, 'select_chapter' => $select_chapter, 'show_comments' => $show_comments, 'books' => $books) );

            }else { $feedback = 'Pas de modifications apportées';}
            
        }  
        
        if ( isset($_POST['chap_btn_suppr']) ) 
        {
            $feedback = 'Chapitre supprimé avec tous ses commentaires';
            #ajouter confirmation de suppression
            $delete_chapterANDcomment = $myBdd->delete_chapter($id);
            $bdd = new Books_bdd();
            $books = $bdd->show_books();

            $show_chapter = $myBdd->show_chapter();

            $myView = new View('write');
            $myView->show(array ('feedback' => $feedback, 'id' => $id, 'show_chapter' => $show_chapter, 'books' => $books) );
            
        }
        
    }


}

