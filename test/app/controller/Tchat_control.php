<?php

class Tchat_control{

    public function show_tchat()
    {
       $feedback = '';

        $myBdd = new Tchat_bdd();
        $show_tchat = $myBdd->show_tchat();

        $myView = new View('tchat');
        $myView->show(array ('feedback' => $feedback, 'show_tchat' => $show_tchat) );
    }

    public function insert_tchat()
    {
        $myBdd = new Tchat_bdd();
        $show_tchat = $myBdd->show_tchat();

        if ( isset($_POST['tchat_btn']) ) 
        {
            session_start();
            $pseudonyme = $_SESSION['identifiant'];
            $mess = htmlspecialchars($_POST['mess']);
            $feedback = '';

            if ( !empty($pseudonyme) AND !empty($mess) ) 
            {
                if ( preg_match('`^([a-zA-Z0-9-_]{2,36})$`', $pseudonyme) ) 
                { 
                    if ( isset($pseudonyme) && isset($mess) )
                    { 
                        $insert_tchat = $myBdd->insert_tchat($pseudonyme, $mess); 
                        $show_tchat = $myBdd->show_tchat();
                        $feedback = 'Merci de votre commentaire';
                    }

                }else { $feedback = 'Veuillez entrer un pseudo valide';}
            
            }else { $feedback = 'Veuillez remplir tous les champs';}

        }

        $myView = new View('tchat');
        $myView->show(array ('feedback' => $feedback, 'show_tchat' => $show_tchat) );

    }
   
}