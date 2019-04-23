<?php

class User_control {

    public function show_user()
    {
        $myView = new View('user');
        $myView->show(/*array ('feedback' => $feedback)*/ );
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
