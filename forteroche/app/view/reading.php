<?php

$title = 'Lecture en ligne';
$h2 = 'N\'hésitez pas à laisser un commentaire en fin de chapitre pour partager vos ressentis';
$style = '/forteroche/public/style.css';

ob_start(); ?>

        <div class="shadow-lg p-3 mb-5 bg-white rounded mt-5"> 
            
        <?php 
             while($chapter = $show_chapter->fetch())
             {
                 echo $chapter['chapter'];
                 $h1 = $chapter['title'];
                 $chapter_id = $chapter['id'];
                 $num_chapter = $chapter['num_chapter'];
             }
        ?> 
        </div> 

        <form action="/forteroche/app/Reading/insert_comment/<?php echo $chapter_id ?>/<?php echo urlencode($h1) ?>" method="post">
        
            <?php 
                if ( isset($_SESSION['identifiant']) ) 
                {
                    echo '<div class="shadow-lg p-3 mb-5 bg-dark rounded mt-5 text-center">
                                <p class="lead text-light"> Vous ête connecté en tant que : <span class="tchat-pseudo gradient">| '.$_SESSION['identifiant'].' |</span></p>
                                
                                <div class="form-group">
                                    <label class="lead text-light" for="mess">Votre message : <textarea name="mess" class="form-control" rows="6" cols="50"></textarea> </label>
                                </div>

                                <button type="submit" class="btn btn-info" name="comment_btn">Envoyer</button>
                        </div>';

                } else { echo '<div class="shadow-lg p-3 mb-5 bg-dark rounded mt-5 text-center">
                                
                                        <p class="lead text-light">Connectez-vous pour laisser un commentaire</p>

                                        <button type="button" id="reading_modal_btn" name="reading_modal_btn" class="btn btn-info pt-0 pb-0 pl-2 pr-2" data-toggle="modal" data-target="#reading_modal">
                                            Se Connecter
                                        </button>

                                    </div>' ;}#Bouton de la modal;}
            ?>            
        
        </form>
        

        <div class="shadow-lg p-3 mb-5 bg-white rounded mt-5"> 
            <p class="tchat_feedback bg-info text-light text-center p-3 rounded lead"><?php echo $feedback; ?> </p>
            
            <?php
            while($comment = $show_comments->fetch())
            {
                if ($comment['flag'] > 0)
                {
                            echo '
                            <div class="shadow-lg p-3 mb-3 bg-white rounded mt-2">
                                <p class="lead text-danger">Ce commentaire est actuellement traité par nos équipes <i class="fas fa-exclamation-circle text-warning"></i></p>
                                <textarea style="display:none" class="com_id" name="com_id">'.$comment['id'].'</textarea>
                                <p class="tchat-pseudo gradient">'.$comment['author'].'</p>
                                <p class="tchat-mess text-justify"><del class="blur">'.$comment['comment'].'</del></p>
                                <p class="font-italic font-weight-ligh text-center blockquote-footer">Posté le '.$comment['timy'].'</p></div>';

                }   else {
                         echo '
                                <div class="shadow-lg p-3 mb-3 bg-white rounded mt-2">
                                    <textarea style="display:none" class="com_id" name="com_id">'.$comment['id'].'</textarea>
                                    <p class="tchat-pseudo gradient">'.$comment['author'].'</p>
                                    <p class="tchat-mess text-justify">'.$comment['comment'].'</p>
                                    <p class="font-italic font-weight-ligh text-center blockquote-footer">Posté le '.$comment['timy'].'</p>';

                            if (isset($_SESSION['identifiant']) && $comment['author'] == $_SESSION['identifiant'])
                            {
                                echo '<!-- Button trigger modal -->
                                    <button type="button" name="update_com" class="modal_btn btn btn-info" data-toggle="modal" data-target="#exampleModalCenter">
                                    Modifier votre commentaire
                                    </button> 
                                </div>';

                            } 
                            else if (isset($_SESSION['identifiant']))
                            { 
                                    echo '
                                    <form action="/forteroche/app/Reading/flag_comment/'.$comment['id'].'/'.$comment['author'].'/'.$comment['flag'].'/'.$chapter_id.'/'.$num_chapter.'" method="post"><button type="submit" name="flag_btn" class="btn btn-dark" data-toggle="tooltip" data-placement="top" title="Tout abus peut mener à la suppression de votre compte">
                                        Signaler
                                    </button> 
                                </div>'; 
                            } else { echo '</div>'; }
                    }

                    
            } ?>    

        </div>      

                            <!-- Modal de CONNEXION -->
    <div class="modal fade" id="reading_modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">Connectez-vous</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="/forteroche/app/Reading/connect/<?php echo $chapter_id; ?>/<?php echo urlencode($chap_title); ?>" method="post">

                    <div class="modal-body text-center text-light bg-info">

                        <div class="form-group">
                            <label>Identifiant : 
                                <input type="text" name="pseudo"style="border: none" class="rounded shadow m-3 p-3 form-control" placeholder="Entrez votre pseudo" value="<?php if ( isset($pseudo) )
                                    { echo $pseudo;
                                }?>"/>
                            </label>
                        </div>

                        <div class="form-group">
                            <label>Mot de passe : 
                                <input type="password" style="border: none" class="rounded shadow m-3 p-3 form-control" name="mdp" placeholder="Mot de passe"/> 
                            </label>
                        </div>
                        <small id="create_btn" data-toggle="modal" data-target="#create_modal"><a href="#" class="create-btn text-warning">Se créer un compte</a></small> 

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                        <button id ="connect_btn" type="submit" class="btn btn-info" name="connect_btn">Connexion</button>
                    </div>

                </form>

            </div>
        </div>
    </div>

                    <!-- Modal de CREATION -->
    <div class="modal fade" id="create_modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">Devenir Rocheux</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="/forteroche/app/Reading/register/<?php echo $chapter_id; ?>/<?php echo urlencode($chap_title); ?>" method="post">

                    <div class="modal-body text-center text-light bg-info">

                        <div class="form-group">
                            <label>Votre pseudo :
                                <input type="text" name="pseudo" style="border: none" class="rounded shadow m-3 p-3 form-control" placeholder="Pseudo" value="<?php if ( isset($pseudo) )
                                { 
                                    echo $pseudo;
                                }?>" >
                            </label> 
                        </div>
                        
                        <div class="form-group">
                            <label>Votre email: 
                                <input type="text" name="email" style="border: none" class="rounded shadow m-3 p-3 form-control" placeholder="@" value="<?php if ( isset($email) )
                                { 
                                        echo $email;
                                }?>">
                            </label> 
                        </div>

                        <div class="form-group">
                            <label>Votre mot de passe:
                                <input type="password" name="mdp" style="border: none" class="rounded shadow m-3 p-3 form-control" placeholder="Il sera sécurisé">
                            </label> 
                        </div>
                        
                        <div class="form-group">
                            <label>Confirmez mot de passe: 
                                <input type="password" name="conf_mdp" style="border: none" class="rounded shadow m-3 p-3 form-control" placeholder="Pour être sûr">
                            </label>
                        </div>
   
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                        <button type="submit" class="btn btn-info" name="create">S'inscrire</button> 
                    </div> 

                </form>

            </div>
        </div>
    </div>
            
            <!-- Modal de MODIFICATION-->
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">

                    <div class="modal-header">
                        <h5 class="modal-title">Modifiez votre commentaire</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <form action="/forteroche/app/Reading/updateANDdelete_comment/<?php echo $chapter_id ?>/<?php echo urlencode($h1) ?>" method="post">

                        <div class="modal-body text-center text-light bg-info">
                            <textarea style="display:none" class="modal_id" name="com_id"></textarea>
                            <textarea style="border: none" class="rounded shadow m-3 p-3 modal_com" rows="3" cols="30" name="comment"></textarea>
                        </div>
                        
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                            <button type="submit" name="update_btn" class="btn btn-success">Modifier</button>
                            <button type="submit" name="delete_btn" class="btn btn-danger">Supprimer</button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
 
<?php $content = ob_get_clean(); 

require('template.php'); ?>