<?php

class Create_control {

    public function show()
    {
        $feedback = '';

        $myView = new View('create');
        $myView->show(array ('feedback' => $feedback) );
    }

    public function register() 
    {
        $myBdd = new Create_bdd;
        $pseudo =  htmlspecialchars($_POST['pseudo']);
        $email =  htmlspecialchars($_POST['email']);
        $mdp = $_POST['mdp'];

        $check_pseudo = $myBdd->check_pseudo($pseudo);
        $check_mail = $myBdd->check_mail($email);

        if ( isset($_POST['register_btn']) ) 
        {
            $conf_mdp = $_POST['conf_mdp'];

            if ( !empty($pseudo) AND !empty($email) AND !empty($mdp) AND !empty($conf_mdp) ) 
            {
                if ( preg_match('`^([a-zA-Z0-9-_]{2,36})$`', $pseudo) ) 
                {
                    $check_pseudo;
                    if ($check_pseudo == 0) 
                    {  
                        if ( filter_var($email, FILTER_VALIDATE_EMAIL) ) 
                        {
                            $check_mail;
                            if ($check_mail == 0) 
                            {
                                if ($mdp == $conf_mdp) 
                                {
                                    $bdd = new Connexion_bdd;
                                    $registration = $myBdd->registration($pseudo, $email, $mdp);
                                    $feedback = "Votre compte a été créé avec succés ! ";
                                    if (session_status() == PHP_SESSION_NONE)  {session_start();  }
                                    $_SESSION['identifiant'] = $pseudo;
                                    $_SESSION['mdp'] = $mdp;
                                    $_SESSION['mail'] = $bdd->get_mail($pseudo);
                                    $_SESSION['id'] = $bdd->get_id($pseudo);

                                }else{ $feedback = 'Votre mot de passe ne correspond pas';}
                        
                            }else{ $feedback = 'Cette adresse email est déjà utilisée';}

                        }else{ $feedback = 'Votre adresse email n\'est pas valide';}
                        
                    }else{ $feedback = 'Désolé, ce pseudo est déjà utilisé';}

                }else { $feedback = 'Désolé, ce pseudo n\'est pas valide';}

            }else{ $feedback = 'Veuillez remplir tous les champs du formulaire';}
            
        }

            $myView = new View('home');
            $myView->show(array ('feedback' => $feedback));
    }

   

}

