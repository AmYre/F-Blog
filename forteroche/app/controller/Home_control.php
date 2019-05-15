<?php
error_reporting(E_ALL); 
ini_set("display_errors", 1); 

class Home_control {

    public function show()
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

?>