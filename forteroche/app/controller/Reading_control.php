<?php

class Reading_control {


    public function show($id, $num_chapter)
    {
        $feedback = '';

        $myBdd = new Reading_bdd();
        $show_chapter = $myBdd->select_chapter($id, $num_chapter);
        $show_comments = $myBdd->show_comments($id);

        $myView = new View('reading');
        $myView->show(array ('feedback' => $feedback, 'id' => $id, 'show_chapter' => $show_chapter, 'show_comments' => $show_comments) );
    }

    public function show_book()
    {
        $feedback = '';

        $myBdd = new Reading_bdd();
        $show_book = $myBdd->select_book();

        $myView = new View('listing_book');
        $myView->show(array ('feedback' => $feedback, 'show_book' => $show_book) );
    }

    public function insert_comment ($id) 
    {
        $feedback = '';
        if (session_status() == PHP_SESSION_NONE)  {session_start();  }
        $membre_id = $_SESSION['id'];
        $myBdd = new Reading_bdd();
        $show_chapter = $myBdd->select_chapter($id);
        $show_comments = $myBdd->show_comments($id);

       if ( isset($_POST['comment_btn']) ) 
        {
            $pseudonyme =  $_SESSION['identifiant'];
            $mess =  htmlspecialchars($_POST['mess']);

            if ( !empty($pseudonyme) AND !empty($mess) ) 
            {
                if ( preg_match('`^([a-zA-Z0-9-_]{2,36})$`', $pseudonyme) ) 
                {
                    $myBdd = new Reading_bdd();
                    $insert_comment = $myBdd->insert_comment($pseudonyme, $mess, $id, $membre_id);
                    $show_chapter = $myBdd->select_chapter($id);
                    $show_comments = $myBdd->show_comments($id);
                    $feedback = 'Merci de votre commentaire';      

                }else { $feedback = 'Veuillez entrer un pseudo valide';}
            
            }else { $feedback = 'Veuillez remplir tous les champs';}
        }
            
            $myView = new View('reading');
            $myView->show(array ('feedback' => $feedback,'id' => $id, 'show_chapter' => $show_chapter, 'show_comments' => $show_comments) );
    }

    public function flag_comment($com_id, $author, $flag, $chapter_id, $num_chapter) 
    {
        $headers = 'FROM: '.$_SESSION['identifiant'].'';
        $mess = 'Le commentaire numéro '.$com_id.' de '.$author.' a été signalé';
        $feedback = 'le commentaire à bien été signalé';

        mail('benhammouda.amir@gmail.com', 'Signalement de commentaire', $mess, $headers);

        $myBdd = new Reading_bdd();
        $flag_com = $myBdd->flag_comments($com_id);
        $show_chapter = $myBdd->select_chapter($chapter_id, $num_chapter);
        $show_comments = $myBdd->show_comments($chapter_id);

        $myView = new View('reading');
        $myView->show(array ('feedback' => $feedback,'chapter_id' => $chapter_id, 'show_chapter' => $show_chapter, 'show_comments' => $show_comments) );

    }

    public function updateANDdelete_comment ($id) 
    {
        if ( isset($_POST['update_btn']) ) 
        {
            $feedback = 'Commentaire modifié avec succès';
            $comment_update =  htmlspecialchars($_POST['comment']);
            $com_id = $_POST['com_id'];

            $myBdd = new Reading_bdd;
            $update_comment = $myBdd->update_comments($comment_update, $com_id);
            $show_chapter = $myBdd->select_chapter($id);
            $show_comments = $myBdd->show_comments($id);
                    
            $myView = new View('reading');
            $myView->show(array ('feedback' => $feedback, 'id' => $id, 'show_chapter' => $show_chapter, 'show_comments' => $show_comments) );

        }
        
        if ( isset($_POST['delete_btn']) ) 
        {
            $feedback = 'Commentaire supprimé';
            $com_id = $_POST['com_id'];
            $myBdd = new Reading_bdd;

            $delete_comment = $myBdd->delete_comments($com_id);
            $show_chapter = $myBdd->select_chapter($id);
            $show_comments = $myBdd->show_comments($id);
                    
            $myView = new View('reading');
            $myView->show(array ('feedback' => $feedback, 'id' => $id, 'show_chapter' => $show_chapter, 'show_comments' => $show_comments) );
        }
       
    }

    public function connect ($id)
    {
        $feedback = '';

        $myBdd = new Reading_bdd();
        $show_chapter = $myBdd->select_chapter($id);
        $show_comments = $myBdd->show_comments($id);

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
                        $myView = new View('reading');
                        $myView->show(array ('feedback' => $feedback, 'id' => $id, 'show_chapter' => $show_chapter, 'show_comments' => $show_comments) );
                    }
                    else { $feedback = 'Mauvais identifiant ou mot de passe !';
                            $myView = new View('reading');
                            $myView->show(array ('feedback' => $feedback, 'id' => $id, 'show_chapter' => $show_chapter, 'show_comments' => $show_comments) );
                    }
                                
                }
                else {$feedback = 'Veuillez entrer un pseudo valide';
                        $myView = new View('reading');
                        $myView->show(array ('feedback' => $feedback, 'id' => $id, 'show_chapter' => $show_chapter, 'show_comments' => $show_comments) );
                }
            }
            else { $feedback = 'Veuillez remplir tous les champs du formulaire';
                    $myView = new View('reading');
                    $myView->show(array ('feedback' => $feedback, 'id' => $id, 'show_chapter' => $show_chapter, 'show_comments' => $show_comments) );
                }
        }
 
    }

    public function register($id)
    {
        $feedback = '';
        $myBdd = new Reading_bdd();
        $show_chapter = $myBdd->select_chapter($id);
        $show_comments = $myBdd->show_comments($id);

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

        $myView = new View('reading');
        $myView->show(array ('feedback' => $feedback, 'id' => $id, 'show_chapter' => $show_chapter, 'show_comments' => $show_comments) );
    }



}

