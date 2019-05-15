<?php

class Tchat_control{

    public function show()
    {
       $feedback = '';

        $myBdd = new Tchat_bdd();
        $show_tchat = $myBdd->show_tchat();

        $myView = new View('tchat');
        $myView->show(array ('feedback' => $feedback, 'show_tchat' => $show_tchat) );
    }

    public function insert()
    {
        $myBdd = new Tchat_bdd();
        $show_tchat = $myBdd->show_tchat();

        if ( isset($_POST['tchat_btn']) ) 
        {
            if (session_status() == PHP_SESSION_NONE)  {session_start();  }  
            $pseudonyme = $_SESSION['identifiant'];
            $mess = htmlspecialchars($_POST['mess']);
            $feedback = '';

            if ( !empty($pseudonyme) AND !empty($mess) ) 
            {
                if ( preg_match('`^([a-zA-Z0-9-_]{2,36})$`', $pseudonyme) ) 
                { 
                    if ( isset($pseudonyme) && isset($mess) )
                    { 
                        $insert_tchat = $myBdd->insert_tchat($pseudonyme, $mess); 
                        $show_tchat = $myBdd->show_tchat();
                        $feedback = 'Merci de votre commentaire';
                    }

                }else { $feedback = 'Veuillez entrer un pseudo valide';}
            
            }else { $feedback = 'Veuillez remplir tous les champs';}

        }

        $myView = new View('tchat');
        $myView->show(array ('feedback' => $feedback, 'show_tchat' => $show_tchat) );

    }

    public function connect ()
    {
        $feedback = '';
        $bdd = new Tchat_bdd();
        $show_tchat = $bdd->show_tchat();

        if ( isset($_POST['connect_btn']) ) 
        {
            $pseudo =  htmlspecialchars($_POST['pseudo']);
            $mdp = $_POST['mdp'];

            if ( !empty($pseudo) AND !empty($mdp) )
            {
                if ( preg_match('`^([a-zA-Z0-9-_]{2,36})$`', $pseudo) ) 
                {  
                    $myBdd = new Connexion_bdd;
                    $check_pseudo = $myBdd->check_pseudo($pseudo);
                    $get_mdp = $myBdd->get_mdp($pseudo);
                    
                    $mdp_verify = password_verify($mdp, $get_mdp[0]);

                    if ($check_pseudo == 1 && $mdp_verify)
                    {   if (session_status() == PHP_SESSION_NONE)  {session_start();  }
                        $_SESSION['identifiant'] = $pseudo;
                        $_SESSION['mdp'] = $mdp;
                        $_SESSION['mail'] = $myBdd->get_mail($pseudo);
                        $_SESSION['id'] = $myBdd->get_id($pseudo);
                        $myView = new View('tchat');
                        $myView->show(array ('feedback' => $feedback, 'show_tchat' => $show_tchat) );
                    }
                    else { $feedback = 'Mauvais identifiant ou mot de passe !';
                            $myView = new View('tchat');
                            $myView->show(array ('feedback' => $feedback, 'show_tchat' => $show_tchat) );
                    }
                                
                }
                else {$feedback = 'Veuillez entrer un pseudo valide';
                        $myView = new View('tchat');
                        $myView->show(array ('feedback' => $feedback, 'show_tchat' => $show_tchat) );
                }
            }
            else { $feedback = 'Veuillez remplir tous les champs du formulaire';
                    $myView = new View('tchat');
                    $myView->show(array ('feedback' => $feedback, 'show_tchat' => $show_tchat) );
                }
        }
 
    }

    public function register()
    {
        $feedback = '';
        $bdd = new Tchat_bdd();
        $show_tchat = $bdd->show_tchat();

        $myBdd = new Create_bdd;
        $pseudo =  htmlspecialchars($_POST['pseudo']);
        $email =  htmlspecialchars($_POST['email']);
        $mdp = $_POST['mdp'];

        $check_pseudo = $myBdd->check_pseudo($pseudo);
        $check_mail = $myBdd->check_mail($email);

        if ( isset($_POST['create']) ) 
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

            $myView = new View('tchat');
            $myView->show(array ('feedback' => $feedback, 'show_tchat' => $show_tchat));
    }


   
}