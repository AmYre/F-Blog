<?php 

class Reading_control {


    public function show($id, $chap_title)
    {
        $feedback = '';

        $myBdd = new Reading_bdd();
        $show_chapter = $myBdd->select_chapter($id);
        $show_comments = $myBdd->show_comments($id);

        $myView = new View('reading');
        $myView->show(array ('feedback' => $feedback, 'chap_title' => $chap_title, 'id' => $id, 'show_chapter' => $show_chapter, 'show_comments' => $show_comments) );
    }

    public function show_book()
    {
        $feedback = '';

        $myBdd = new Reading_bdd();
        $show_book = $myBdd->select_book();

        $myView = new View('listing_book');
        $myView->show(array ('feedback' => $feedback, 'show_book' => $show_book) );
    }

    public function insert_comment ($id, $chap_title) 
    {
        $feedback = '';
        if (session_status() == PHP_SESSION_NONE)  {session_start();  }
        $membre_id = $_SESSION['id'];
        $myBdd = new Reading_bdd();
        $show_chapter = $myBdd->select_chapter($id);
        $show_comments = $myBdd->show_comments($id);

       if ( isset($_POST['comment_btn']) ) 
        {
            $pseudonyme =  $_SESSION['identifiant'];
            $mess =  htmlspecialchars($_POST['mess']);

            if ( !empty($pseudonyme) AND !empty($mess) ) 
            {
                if ( preg_match('`^([a-zA-Z0-9-_]{2,36})$`', $pseudonyme) ) 
                {
                    $myBdd = new Reading_bdd();
                    $insert_comment = $myBdd->insert_comment($pseudonyme, $mess, $id, $membre_id);
                    $show_chapter = $myBdd->select_chapter($id);
                    $show_comments = $myBdd->show_comments($id);
                    $feedback = 'Merci de votre commentaire';      

                }else { $feedback = 'Veuillez entrer un pseudo valide';}
            
            }else { $feedback = 'Veuillez remplir tous les champs';}
        }
            
            $myView = new View('reading');
            $myView->show(array ('feedback' => $feedback,'chap_title' => $chap_title, 'id' => $id, 'show_chapter' => $show_chapter, 'show_comments' => $show_comments) );
    }

    public function updateANDdelete_comment ($id, $chap_title) 
    {
        if ( isset($_POST['update_btn']) ) 
        {
            $feedback = 'Commentaire modifié avec succès';
            $comment_update =  htmlspecialchars($_POST['comment']);
            $com_id = $_POST['com_id'];

            $myBdd = new Reading_bdd;
            $update_comment = $myBdd->update_comments($comment_update, $com_id);
            $show_chapter = $myBdd->select_chapter($id);
            $show_comments = $myBdd->show_comments($id);
                    
            $myView = new View('reading');
            $myView->show(array ('feedback' => $feedback, 'chap_title' => $chap_title, 'id' => $id, 'show_chapter' => $show_chapter, 'show_comments' => $show_comments) );

        }
        
        if ( isset($_POST['delete_btn']) ) 
        {
            $feedback = 'Commentaire supprimé';
            $com_id = $_POST['com_id'];
            $myBdd = new Reading_bdd;

            $delete_comment = $myBdd->delete_comments($com_id);
            $show_chapter = $myBdd->select_chapter($id);
            $show_comments = $myBdd->show_comments($id);
                    
            $myView = new View('reading');
            $myView->show(array ('feedback' => $feedback, 'chap_title' => $chap_title, 'id' => $id, 'show_chapter' => $show_chapter, 'show_comments' => $show_comments) );
        }
       
    }


}

