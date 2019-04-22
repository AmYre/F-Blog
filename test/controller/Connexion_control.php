<?php 

class Connexion_control {

    public function check_info ()
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
                    $connexion = new Connexion_bdd;
                    $param = 'mdp';
                    $check_mdp = $connexion->check_info($param, $pseudo);
                    $param = 'pseudo';
                    $check_pseudo = $connexion->check_info($param, $pseudo);
                   
                    if ($check_pseudo !== null || $check_mdp !== null)
                    { 
                        $mdp_verify = password_verify($mdp, $check_mdp);
                            
                        if ($mdp_verify) 
                        {
                            session_start();
                            $_SESSION['identifiant'] = $pseudo;
                            $feedback = 'Vous êtes connecté !';
                        }
                    }
                    else { $feedback = 'Mauvais identifiant ou mot de passe !';}                   
                }
                else {$feedback = 'Veuillez entrer un pseudo valide';}
            }
            else { $feedback = 'Veuillez remplir tous les champs du formulaire';}
 
        }

        $myView = new View('connexion');
        $myView->show(array ('feedback' => $feedback));
    }


}

