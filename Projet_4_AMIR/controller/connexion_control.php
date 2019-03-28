<?php 

require('../model/connexion_bdd.php');

$connect_feedback = '';

    if ( isset($_POST['connect_btn']) ) 
    {
        $pseudo =  htmlspecialchars($_POST['pseudo']);
        $mdp = $_POST['mdp'];

        if ( !empty($pseudo) AND !empty($mdp) )
        {
            $mdp_verify = password_verify($mdp, check_info('mdp'));

            if (!check_info('pseudo') || !check_info('mdp'))
            {
                $connect_feedback = 'Mauvais identifiant ou mot de passe !';
            } 
            else
            {
                if ($mdp_verify) 
                {
                    session_start();
                    $_SESSION['identifiant'] = $pseudo;
                    $connect_feedback = 'Vous êtes connecté !';

                } else {$connect_feedback = 'Mauvais identifiant ou mot de passe !';}
            
            }

        }else {$connect_feedback = 'Veuillez remplir tous les champs du formulaire';}
    }

require('../view/connexion.php');

?>