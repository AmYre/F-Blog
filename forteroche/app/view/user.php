<?php

    error_reporting(E_ALL ^ E_NOTICE); 

$title = 'Espace utilisateur';
$h1 = 'Bienvenue sur votre espace, '.$_SESSION['identifiant'];
$h2 = 'Gérez librement toute vos informations';
$style = '/forteroche/public/style.css';

ob_start(); ?>
    
    <div class="shadow-lg p-3 mb-5 bg-dark lead rounded mt-5">
        <p class="tchat-pseudo text-light">Mon compte Rocheux :</p>
        <div class="shadow-lg p-3 mb-2 bg-white lead rounded mt-2">
            <p>Mon identifiant : <span class="gradient"><?php echo $_SESSION['identifiant']; ?></span> <!-- Button trigger modal -->
                <button type="button" name="update_com" class="btn btn-info pt-0 pb-0 pl-2 pr-2" data-toggle="modal" data-target="#user_modal">
                    Modifier
                </button></p>
        
            <p>Mon mail de connexion : <span class="gradient"><?php echo $_SESSION['mail']; ?></span> <!-- Button trigger modal -->
                <button type="button" name="update_com" class="btn btn-info pt-0 pb-0 pl-2 pr-2" data-toggle="modal" data-target="#mail_modal">
                    Modifier
                </button></p>

            <p>Modifiez votre Mot de Passe : 
                <button type="button" name="update_com" class="btn btn-info pt-0 pb-0 pl-2 pr-2" data-toggle="modal" data-target="#mdp_modal">
                    Modifier
                </button></p>
        </div>
    </div>

    <?php if (isset($feedback)){ echo ' <small class="bg-danger text-light shadow-lg rounded pt-1 pl-4 pr-4 pb-1">'.$feedback.'</small>';} ?>
    
    <div class="shadow-lg p-3 mb-5 bg-dark lead rounded mt-5"> 
        <p class="tchat-pseudo text-light">Mes commentaires :</p>  
        <?php 
            while($comments = $show_comments->fetch())
            {
                echo '<div class="shadow-lg p-3 mb-2 bg-white lead rounded mt-2">
                        <textarea style="display:none" class="com_id" name="com_id">'.$comments['id'].'</textarea>
                        <p class="tchat-pseudo gradient">'.$comments['author'].' :</p>
                        <p class="tchat-mess text-justify">'.$comments['comment'].'</p>
                        <p class="font-italic font-weight-ligh text-center blockquote-footer">Posté le :   '.$comments['timy'].'</p>

                        <button type="button" name="update_com" class="modal_btn btn btn-info" data-toggle="modal" data-target="#exampleModalCenter">
                        Modifier votre commentaire
                        </button> 
                    </div>';  
            }
        ?> 
    </div>

                    <!-- Modal MODIFICATION PSEUDO -->
    <div class="modal fade" id="user_modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">Modifiez votre Pseudo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/forteroche/app/User/update_user" method="post">    
                    <div class="modal-body">
                        <label>Modifiez votre pseudo actuel : <input id="modal_pseudo" name="pseudo" value="<?php echo $_SESSION['identifiant']; ?>"></label>
                        <label>Mot de passe : <input type="password" name="mdp" placeholder="Votre mot de passe"></label>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                        <button type="submit" name="update_btn" class="btn btn-success">Modifier</button>
                    </div>
                </form>
                
            </div>
        </div>
    </div>
                    <!-- Modal MODIFICATION MAIL -->
    <div class="modal fade" id="mail_modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">Modifiez votre Adresse email</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/forteroche/app/User/update_mail" method="post">
                    <div class="modal-body">
                        <label>Mail actuel : <input style="border: none" readonly id="modal_current_mail" name="mail" value="<?php echo $_SESSION['mail']; ?>"></label>
                        <label>Nouvel email : <input name="mail_update" placeholder="Votre nouvelle email"></label>
                        <label>Confirmez email : <input name="mail_update_conf" placeholder="Confirmez email"></label>
                        <label>Mot de passe : <input type="password" name="mdp" placeholder="Votre mot de passe"></label>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                        <button type="submit" name="update_btn" class="btn btn-success">Modifier</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
                    <!-- Modal MODIFICATION MDP -->
    <div class="modal fade" id="mdp_modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">Modifiez votre Mot de passe</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/forteroche/app/User/update_mdp" method="post">
                    <div class="modal-body">
                        <label>Nouveau Mot de passe : <input  name="update_mdp" placeholder="Nouveau mot de passe"></label>
                        <label>Confirmez Mot de passe : <input  name="conf_mdp" placeholder="Confirmez nouveau mot de passe"></label>
                        <label>Mot de passe actuel : <input type="password"  name="mdp" placeholder="Votre mot de passe actuel"></label>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                        <button type="submit" name="update_btn" class="btn btn-success">Modifier</button>
                    </div>
                </form>
                
            </div>
        </div>
    </div>

                <!-- Modal MODIFICATION COMMENTAIRES-->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">Modifiez votre commentaire</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/forteroche/app/User/updateANDdelete_comment" method="post">
                    <div class="modal-body">
                        <textarea style="display:none" class="modal_id" name="com_id"></textarea>
                        <textarea style="border: none" class="modal_com" name="comment"></textarea>
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

require(_ROOT_.'template.php'); ?>
 

