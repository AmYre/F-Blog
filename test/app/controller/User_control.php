<?php

class User_control {

    public function show_user()
    {
        session_start();
        $id = $_SESSION['id'];

        $myBdd = new User_bdd();
        $show_comments = $myBdd->get_comments($id);
        $myView = new View('user');
        $myView->show(array ('show_comments' => $show_comments) );
    }
        
    public function disconnect_user()
    {
        if( isset($_POST['disconnect_btn']) )
        {
            $feedback = 'Vous ête déconnecté';
            session_start();
            $_SESSION = array();
            session_destroy();
            $myView = new View('home');
            $myView->show(array ('feedback' => $feedback) );

        }
    }

    public function update_user()
    {
        session_start();
        $id = $_SESSION['id'];
        $pseudo = $_SESSION['identifiant'];
        $update_pseudo = htmlspecialchars($_POST['pseudo']);
        $mdp = $_POST['mdp'];
        
        $myBdd = new User_bdd();
        $show_comments = $myBdd->get_comments($pseudo);
        
        $bdd = new Create_bdd;
        $check_pseudo = $bdd->check_pseudo($update_pseudo);

        $req = new Connexion_bdd;
        $get_mdp = $req->get_mdp($pseudo);
        $mdp_verify = password_verify($mdp, $get_mdp[0]);

        if ( !empty($update_pseudo) AND !empty($mdp) ) 
        {
            if ( preg_match('`^([a-zA-Z0-9-_]{2,36})$`', $update_pseudo) ) 
            {
                $check_pseudo;
                if ($check_pseudo == 0) 
                {  
                    if ($mdp_verify)
                    { 

                    $update = $myBdd->update_user($update_pseudo, $pseudo);
                    $update_author = $myBdd->update_author($update_pseudo, $id);
                    $feedback = "Votre pseudo à bien été modifié ";
                    $_SESSION['identifiant'] = $update_pseudo;

                    }else{ $feedback = 'Utilisateur non reconnu';}

                }else{ $feedback = 'Désolé, ce pseudo est déjà utilisé';}

            }else { $feedback = 'Désolé, ce pseudo n\'est pas valide';}

        }else{ $feedback = 'Veuillez remplir tous les champs du formulaire';}
        
        $show_comments = $myBdd->get_comments($id);
        $myView = new View('user');
        $myView->show(array ('feedback' => $feedback, 'show_comments' => $show_comments) );

    }

    public function update_mail()
    {
        session_start();
        $id = $_SESSION['id'];
        $pseudo = $_SESSION['identifiant'];
        $mdp = $_POST['mdp'];
        $mail = $_POST['mail'];
        $update_mail = htmlspecialchars($_POST['mail_update']);
        $update_mail_conf = htmlspecialchars($_POST['mail_update_conf']);
        
        $myBdd = new User_bdd();
        $bdd = new Create_bdd;
        $check_mail = $bdd->check_mail($update_mail);

        $req = new Connexion_bdd;
        $get_mdp = $req->get_mdp($pseudo);
        $mdp_verify = password_verify($mdp, $get_mdp[0]);

        if ( !empty($update_mail) AND !empty($update_mail_conf) AND !empty($mdp)) 
        {
            if ( filter_var($update_mail, FILTER_VALIDATE_EMAIL) ) 
            {
                $check_mail;
                if ($check_mail == 0) 
                {
                    if ($mdp_verify)
                    { 
                            $update = $myBdd->update_mail($update_mail, $mail);
                            $feedback = "Votre adresse email a bien été modifiée";
                            $_SESSION['mail'] = $update_mail;

                    }else{ $feedback = 'Utilisateur non reconnu';}
                    
                }else{ $feedback = 'Cette adresse email est déjà utilisée';}

            }else{ $feedback = 'Votre adresse email n\'est pas valide';}

        }else{ $feedback = 'Veuillez remplir tous les champs du formulaire';}
        
        $show_comments = $myBdd->get_comments($id);
        $myView = new View('user');
        $myView->show(array ('feedback' => $feedback, 'show_comments' => $show_comments) );

    }

    public function update_mdp()
    {
        session_start();
        $id = $_SESSION['id'];
        $pseudo = $_SESSION['identifiant'];
        $mdp = $_POST['mdp'];
        $conf_mdp = $_POST['conf_mdp'];
        $update_mdp = $_POST['update_mdp'];

        $myBdd = new User_bdd();
        $req = new Connexion_bdd;
        $get_mdp = $req->get_mdp($pseudo);
        $mdp_verify = password_verify($mdp, $get_mdp[0]);

        if ( !empty($update_mdp) AND !empty($conf_mdp) AND !empty($mdp)) 
        {
            if ( $update_mdp == $conf_mdp ) 
            {
                if ($mdp_verify)
                { 
                        $update = $myBdd->update_mdp($update_mdp, $pseudo);
                        $feedback = "Votre Mot de passe a bien été modifié";
                        $_SESSION['mdp'] = $update_mdp;

                }else{ $feedback = 'Utilisateur non reconnu';}

            }else{ $feedback = 'Vos mots de passes ne correspondent pas';}

        }else{ $feedback = 'Veuillez remplir tous les champs du formulaire';}
        
        $show_comments = $myBdd->get_comments($id);
        $myView = new View('user');
        $myView->show(array ('feedback' => $feedback, 'show_comments' => $show_comments) );
    }
    

    public function updateANDdelete_comment () 
    {
        session_start();
        $bdd = new User_bdd();
        $myBdd = new Reading_bdd;
        $com_id = $_POST['com_id'];
        $id = $_SESSION['id'];

        if ( isset($_POST['update_btn']) ) 
        {
            $comment_update =  htmlspecialchars($_POST['comment']);
            $update_comment = $myBdd->update_comments($comment_update, $com_id);
            $feedback = 'Commentaire modifié avec succès';
        }
        
        if ( isset($_POST['delete_btn']) ) 
        {
            $delete_comment = $myBdd->delete_comments($com_id);
            $feedback = 'Commentaire supprimé';
        }

        $show_comments = $bdd->get_comments($id); 
        $myView = new View('user');
        $myView->show(array ('feedback' => $feedback, 'show_comments' => $show_comments) );

    }


}
