<?php

$title = 'Tchat de la communauté';
$h1 = 'Bienvenue sur le Tchat';
$h2 = 'L\'espace de partage de la communauté des Rocheux';
$style = '/forteroche/public/style.css';

ob_start(); ?>

        <form action="/forteroche/app/Tchat/insert" method="post">
            
            <?php 
                if ( isset($_SESSION['identifiant']) ) 
                {
                   echo '<div class="shadow-lg p-3 mb-5 bg-dark rounded mt-5 text-center">
                                <p class="lead text-light"> Vous ête connecté en tant que : <span class="tchat-pseudo gradient">| '.$_SESSION['identifiant'].' |</span></p>
                                
                                <div class="form-group">
                                    <label class="lead text-light" for="mess">Votre message : <textarea name="mess" class="form-control rows="10" cols="50""></textarea> </label>
                                </div>

                                <button type="submit" class="btn btn-info" name="tchat_btn">Envoyer</button>
                        </div>';

                } else { echo '<div class="shadow-lg p-3 mb-5 bg-dark rounded mt-5 text-center">
                                
                                    <p class="lead text-light">Connectez-vous pour accéder au Tchat</p>
                
                                    <button type="button" id="tchat_modal_btn" name="tchat_modal_btn" class="btn btn-info pt-0 pb-0 pl-2 pr-2" data-toggle="modal" data-target="#tchat_modal">
                                        Se Connecter
                                    </button>

                            </div>' ;}#Bouton de la modal

            ?>
        
        </form>

        <div class="shadow-lg p-3 mb-5 bg-white rounded mt-5"> 
            <p class="tchat_feedback bg-info text-light text-center p-3 rounded lead"><?php echo $feedback; ?> </p>
            
        <?php 
            while($membre = $show_tchat->fetch())
            {
                echo '<div class="shadow-lg p-3 mb-3 bg-white rounded mt-2">
                        <textarea style="display:none" class="com_id" name="com_id">'.$membre['id'].'</textarea>
                        <p class="tchat-pseudo gradient">'.$membre['pseudonyme'].' :</p>
                        <p class="tchat-mess text-justify">'.$membre['mess'].'</p>
                        <p class="font-italic font-weight-ligh text-center blockquote-footer">Posté le :   '.$membre['timywoo'].'</p>';
                
                if (isset($_SESSION['identifiant']) && $membre['pseudonyme'] == $_SESSION['identifiant'])
                {
                    echo '<!-- Button trigger modal -->
                        <button type="button" name="update_modal_btn" class="modal_btn btn btn-info" data-toggle="modal" data-target="#modal_update">
                        Modifier votre commentaire
                        </button> 
                    </div>';
                } else { echo "</div>"; }

            }
        ?> 
        </div>


                            <!-- Modal de CONNEXION -->
    <div class="modal fade" id="tchat_modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">Connectez-vous</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                
                <form action="/forteroche/app/Tchat/connect" method="post">

                    <div class="modal-body text-center text-light bg-info">
                        <div class="form-group">
                            <label>Identifiant : 
                                <input style="border: none" class="form-control rounded shadow m-3 p-3" type="text" name="pseudo" placeholder="Entrez votre pseudo" value="<?php if ( isset($pseudo) )
                                    { echo $pseudo;
                                }?>"/>
                            </label>
                        </div>

                        <div class="form-group">
                            <label>Mot de passe : 
                                <input style="border: none" class="form-control rounded shadow m-3 p-3" type="password" name="mdp" placeholder="Mot de passe"/> 
                            </label>  
                        </div>
                        <small  id="create_btn" data-toggle="modal" data-target="#create_modal"><a href="#" class="text-warning create-btn">Se créer un compte</a></small>        
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

                <form action="/forteroche/app/Tchat/register" method="post">

                    <div class="modal-body text-center text-light bg-info"> 

                        <div class="form-group">
                            <label>Votre pseudo :
                                <input style="border: none" class="form-control rounded shadow m-3 p-3" type="text" name="pseudo" placeholder="Pseudo" value="<?php if ( isset($pseudo) )
                                { 
                                    echo $pseudo;
                                }?>" >
                            </label> 
                        </div>
                        
                        <div class="form-group">
                            <label>Votre email: 
                                <input style="border: none" class="form-control rounded shadow m-3 p-3" type="text" name="email" placeholder="@" value="<?php if ( isset($email) )
                                { 
                                        echo $email;
                                }?>">
                            </label> 
                        </div>

                        <div class="form-group">
                                <label>Votre mot de passe:
                                    <input style="border: none" class="form-control rounded shadow m-3 p-3" type="password" name="mdp" placeholder="Il sera sécurisé">
                                </label> 
                        </div>
                        
                        <div class="form-group">
                                <label>Confirmez mot de passe: 
                                    <input style="border: none" class="form-control rounded shadow m-3 p-3" type="password" name="conf_mdp"  placeholder="Pour être sûr">
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

    <!-- Modal de MODIFICATION -->

    <div class="modal fade" id="modal_update" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modifiez votre commentaire</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/forteroche/app/Tchat/updateANDdelete_comment" method="post">
                    <div class="modal-body text-center text-light bg-info">
                        <textarea style="display:none" class="modal_id" name="com_id"></textarea>
                        <textarea style="border: none" class="modal_com rounded shadow m-3 p-3" rows="3" cols="30" name="comment"></textarea>
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
 

<?php $content = ob_get_clean(); ?><?php require(_ROOT_.'template.php'); ?>