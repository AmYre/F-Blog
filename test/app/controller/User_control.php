<?php

class User_control {

    public function show_user()
    {

        $myView = new View('user');
        $myView->show(/*array ('feedback' => $feedback)*/ );
    }

}
