<?php

require('../model/create_bdd.php');

$register_feedback = '';

    if ( isset($_POST['register_btn']) ) 
    {
        $pseudo =  htmlspecialchars($_POST['pseudo']);
        $email =  htmlspecialchars($_POST['email']);
        $mdp = $_POST['mdp'];
        $conf_mdp = $_POST['conf_mdp'];

        if ( !empty($pseudo) AND !empty($email) AND !empty($mdp) AND !empty($conf_mdp) ) 
        {
            if ( preg_match('`^([a-zA-Z0-9-_]{2,36})$`', $pseudo) ) 
            {
                check_pseudo ();
                if (check_pseudo () == 0) 
                {  
                    if ( filter_var($email, FILTER_VALIDATE_EMAIL) ) 
                    {
                        check_mail ();
                        if (check_mail () == 0) 
                        {
                            if ($mdp == $conf_mdp) 
                            {
                                registration ();
                                $register_feedback = "Votre compte a été créé avec succés ! ";

                            }else{ $register_feedback = 'Votre mot de passe ne correspond pas';}
                    
                        }else{ $register_feedback = 'Cette adresse email est déjà utilisée';}

                    }else{ $register_feedback = 'Votre adresse email n\'est pas valide';}
                    
                }else{ $register_feedback = 'Désolé, ce pseudo est déjà utilisé';}

            }else { $register_feedback = 'Désolé, ce pseudo n\'est pas valide';}

        }else{ $register_feedback = 'Veuillez remplir tous les champs du formulaire';}
        
    }

require('../view/create.php');

?>