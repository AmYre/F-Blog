<?php

class Contact_control {

    public function show()
    {
        $feedback = '';

        $myView = new View('contact');
        $myView->show(array('feedback' => $feedback));
    }

    public function contact_mail()
    {
        $feedback = '';

        $headers = 'FROM: "forteroche@blog.com"';
        $contact_name = $_POST['name'];
        $contact_firstname = $_POST['firstname'];
        $contact_mail = $_POST['mail'];
        $message = $_POST['mess'];
        $response = $_POST['g-recaptcha-response'];
        $contact_mess = 
        'De la part de :  '.$contact_name .'  '.$contact_firstname.'

        Mail de contact :  '.$contact_mail.'
                    
        Message :          
        '.($message);
        

        
        if ( !empty($contact_name) || !empty($contact_firstname) || !empty($contact_mail) || !empty($message) ) 
        {
            if($response)
            {
                if ( preg_match('`^[a-zA-Z0-9]+(?:[\ \-\.\'][a-zA-Z0-9]+)*$`', $contact_name) && preg_match('`^[a-zA-Z0-9]+(?:[\ \-\.\'][a-zA-Z0-9]+)*$`', $contact_firstname ) )
                {
                        if ( filter_var($contact_mail, FILTER_VALIDATE_EMAIL) ) 
                        {
                            
                            $feedback = 'Votre message à bien été envoyé';
                            mail('benhammouda.amir@gmail.com', 'Formulaire de Contact', $contact_mess, $headers);
                        }else { $feedback = 'Veuillez entrez une adresse email valide';}

                }else { $feedback = 'Veuillez entrez des noms et prénoms valide';}

            }else { $feedback = 'Etes-vous vraiment un robot ?';}

        }else { $feedback = 'Veuillez remplir tous les champs';}
        


        $myView = new View('contact');
        $myView->show(array('feedback' => $feedback));
    }

}