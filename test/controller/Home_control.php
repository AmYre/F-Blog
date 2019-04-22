<?php

class Home_control {

    public function show_home()
    {
        $myView = new View('home');
        $myView->show();
    }

}