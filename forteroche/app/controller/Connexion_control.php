<?php 

class Connexion_control {

    public function show()
    {
        $feedback = '';

        $myView = new View('connexion');
        $myView->show(array ('feedback' => $feedback));
    }

    public function connect()
    {
        $feedback = '';

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
                    {   
                        if (session_status() == PHP_SESSION_NONE)  {session_start();  }
                        $_SESSION['identifiant'] = $pseudo;
                        $_SESSION['mdp'] = $mdp;
                        $_SESSION['mail'] = $myBdd->get_mail($pseudo);
                        $_SESSION['id'] = $myBdd->get_id($pseudo);
                        $feedback = 'Vous êtes connecté !';
                        $myView = new View('home');
                        $myView->show(array ('feedback' => $feedback));
                    }
                    else { $feedback = 'Mauvais identifiant ou mot de passe !';
                           $myView = new View('connexion');
                           $myView->show(array ('feedback' => $feedback));
                    }
                                
                }
                else {$feedback = 'Veuillez entrer un pseudo valide';
                      $myView = new View('connexion');
                      $myView->show(array ('feedback' => $feedback));
                }
            }
            else { $feedback = 'Veuillez remplir tous les champs du formulaire';
                    $myView = new View('connexion');
                    $myView->show(array ('feedback' => $feedback));
                }
            
 
        }

        
    }


}

