<?php

class Listing_control{

    public function show_listing()
    {      
        $myBdd = new Chapters_bdd();
        $chapters = $myBdd->show_chapter();

        $myView = new View('listing_chapters');
        $myView->show(array ('chapters' => $chapters));
    }

}
