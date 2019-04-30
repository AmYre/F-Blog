<?php

class User_control {

    public function show_user()
    {
        $feedback = '';
        session_start();
        $pseudo = $_SESSION['identifiant'];

        $myBdd = new User_bdd();
        $show_comments = $myBdd->get_comments($pseudo);

        $myView = new View('user');
        $myView->show(array ('feedback' => $feedback, 'show_comments' => $show_comments) );
    }
        
    public function disconnect_user()
    {
        if( isset($_POST['disconnect_btn']) )
        {
            $feedback = 'Vous ête déconnecté';
            session_start();
            $_SESSION = array();
            session_destroy();
            $myView = new View('home');
            $myView->show(array ('feedback' => $feedback) );

        }
    }


}
