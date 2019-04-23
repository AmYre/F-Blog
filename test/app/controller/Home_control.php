<?php

class Home_control {

    public function show_home()
    {
        $feedback = '';

        if( isset($_SESSION['identifiant']) ) {

            $feedback = 'Bienvenue '.$_SESSION['identifiant'].', vous êtes connecté.';

            $myView = new View('home');
            $myView->show(array ('feedback' => $feedback));
            
        }else {
            $myView = new View('home');
            $myView->show(array ('feedback' => $feedback));
        }
    }

}