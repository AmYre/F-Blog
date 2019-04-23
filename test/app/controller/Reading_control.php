<?php

class Reading_control {


    public function show_reading()
    {
        $feedback = '';
        $id = $_GET['id'];

        $myBdd = new Reading_bdd();
        $show_chapter = $myBdd->select_chapter($id);
        $show_comments = $myBdd->show_comments($id);

        $myView = new View('reading');
        $myView->show(array ('feedback' => $feedback, 'show_chapter' => $show_chapter, 'show_comments' => $show_comments) );
    }

    public function insert_comment () 
    {
        $feedback = '';
        $id = $_GET['id'];

        $myBdd = new Reading_bdd();
        $show_chapter = $myBdd->select_chapter($id);
        $show_comments = $myBdd->show_comments($id);

       if ( isset($_POST['comment_btn']) ) 
        {
            $pseudonyme =  htmlspecialchars($_POST['pseudonyme']);
            $mess =  htmlspecialchars($_POST['mess']);

            if ( !empty($pseudonyme) AND !empty($mess) ) 
            {
                if ( preg_match('`^([a-zA-Z0-9-_]{2,36})$`', $pseudonyme) ) 
                {
                    $myBdd = new Reading_bdd();
                    $insert_comment = $myBdd->insert_comment($pseudonyme, $mess, $id);
                    $show_chapter = $myBdd->select_chapter($id);
                    $show_comments = $myBdd->show_comments($id);
                    $feedback = 'Merci de votre commentaire';      

                }else { $feedback = 'Veuillez entrer un pseudo valide';}
            
            }else { $feedback = 'Veuillez remplir tous les champs';}
        }
            
            $myView = new View('reading');
            $myView->show(array ('feedback' => $feedback, 'show_chapter' => $show_chapter, 'show_comments' => $show_comments) );
    }


}

