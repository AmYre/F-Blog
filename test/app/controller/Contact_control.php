<?php

class Contact_control {

    public function show_contact()
    {
        $feedback = '';

        $myView = new View('contact');
        $myView->show(array('feedback' => $feedback));
    }

    public function contact()
    {
        $feedback = '';

        $contact_name = $_POST['name'];
        $contact_firstname = $_POST['firstname'];
        $contact_mail = $_POST['mail'];
        $contact_mess = $_POST['mess'];
        $headers = 'FROM: "forteroche@blog.com"';

        if ( !empty($contact_name) || !empty($contact_firstname) || !empty($contact_mail) || !empty($contact_mess) ) 
        {
                if ( preg_match('`^[a-zA-Z0-9]+(?:[\ \-\.\'][a-zA-Z0-9]+)*$`', $contact_name) && preg_match('`^[a-zA-Z0-9]+(?:[\ \-\.\'][a-zA-Z0-9]+)*$`', $contact_firstname ) )
                {
                        if ( filter_var($contact_mail, FILTER_VALIDATE_EMAIL) ) 
                        {
                            $feedback = 'Votre message à bien été envoyé';
                            mail('benhammouda.amir@gmail.com', 'Formulaire de Contact', $contact_mess, $headers);
                        }else { $feedback = 'Veuillez entrez une adresse email valide';}

                }else { $feedback = 'Veuillez entrez des noms et prénoms valide';}

        }else { $feedback = 'Veuillez remplir tous les champs';}


        $myView = new View('contact');
        $myView->show(array('feedback' => $feedback));
    }

}