<?php

    error_reporting(E_ALL ^ E_NOTICE); 

$title = 'Espace utilisateur';
$h1 = 'Bienvenue sur votre espace, '.$_SESSION['identifiant'].'.';
$h2 = 'Gérez vos informations';
$style = '/forteroche/public/style.css';

?>

<?php ob_start(); ?>

    <form action="/forteroche/app/User/disconnect" method="post">
        <button type="submit" class="btn btn-dark" name="disconnect_btn">Se déconnecter</button>
    </form>
    
    <div class="shadow-lg p-3 mb-5 bg-white rounded mt-5"><strong>Mon compte Rocheux : </strong><br><br>
    Mon identifiant : <strong>  <?php echo $_SESSION['identifiant']; ?></strong> <!-- Button trigger modal -->
                        <button type="button" id="modal_btn" name="update_com" class="btn btn-primary pt-0 pb-0 pl-2 pr-2" data-toggle="modal" data-target="#user_modal">
                            Modifier
                        </button>  <br><br>
    
    Mon mail de connexion : <strong>  <?php echo $_SESSION['mail'] ?> </strong> <!-- Button trigger modal -->
                        <button type="button" id="modal_btn" name="update_com" class="btn btn-primary pt-0 pb-0 pl-2 pr-2" data-toggle="modal" data-target="#mail_modal">
                            Modifier
                        </button> <br><br>

    Modifiez votre Mot de Passe : <button type="button" id="modal_btn" name="update_com" class="btn btn-primary pt-0 pb-0 pl-2 pr-2" data-toggle="modal" data-target="#mdp_modal">
                            Modifier
                        </button> </div>

    <?php if (isset($feedback)){ echo ' <small class="bg-danger text-light shadow-lg rounded pt-1 pl-4 pr-4 pb-1">'.$feedback.'</small>';} ?>
    
    <div class="shadow-lg p-3 mb-5 bg-white rounded mt-5"> 
        <p><strong>Mes commentaires :</strong></p>  
        <?php 
            while($comments = $show_comments->fetch())
            {
                echo '<div class="shadow-lg rounded pt-4 pl-4 pb-4">
                        <textarea style="display:none" id="com_id" name="com_id">'.$comments['id'].'</textarea>
                        <p><strong>'.$comments['author'].'</strong>'.' :'.'</p>
                        <p>'.$comments['comment'].'</p>
                        <p><i>Posté le :   '.$comments['timy'].'</i></p>

                        <button type="button" name="update_com" class="modal_btn btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                        Modifier votre commentaire
                        </button> 
                    </div>';  
            }
        ?> 
    </div>

                    <!-- Modal MODIFICATION PSEUDO -->
    <div class="modal fade" id="user_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Modifiez votre Pseudo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/forteroche/app/User/update_user" method="post">    
                        <label>Modifiez votre pseudo actuel : <input id="modal_pseudo" name="pseudo" value="<?php echo $_SESSION['identifiant']; ?>"></label><br><br>
                        <label>Mot de passe : <input type="password" name="mdp" placeholder="Votre mot de passe"></label><br>
                </div>
                <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                        <button type="submit" name="update_btn" class="btn btn-success">Modifier</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
                    <!-- Modal MODIFICATION MAIL -->
    <div class="modal fade" id="mail_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Modifiez votre Adresse email</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/forteroche/app/User/update_mail" method="post">    
                        <label>Mail actuel : <input style="border: none" readonly id="modal_current_mail" name="mail" value="<?php echo $_SESSION['mail']; ?>"></label><br><br>
                        <label>Nouvel email : <input name="mail_update" placeholder="Votre nouvelle email"></label><br>
                        <label>Confirmez email : <input name="mail_update_conf" placeholder="Confirmez email"></label><br><br>
                        <label>Mot de passe : <input type="password" name="mdp" placeholder="Votre mot de passe"></label><br>
                </div>
                <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                        <button type="submit" name="update_btn" class="btn btn-success">Modifier</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
                    <!-- Modal MODIFICATION MDP -->
    <div class="modal fade" id="mdp_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Modifiez votre Mot de passe</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/forteroche/app/User/update_mdp" method="post">
                        <label>Nouveau Mot de passe : <input  name="update_mdp" placeholder="Nouveau mot de passe"></label><br>
                        <label>Confirmez Mot de passe : <input  name="conf_mdp" placeholder="Confirmez nouveau mot de passe"></label><br><br>
                        <label>Mot de passe actuel : <input type="password"  name="mdp" placeholder="Votre mot de passe actuel"></label><br>
                </div>
                <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                        <button type="submit" name="update_btn" class="btn btn-success">Modifier</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

                <!-- Modal MODIFICATION COMMENTAIRES-->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Modifiez votre commentaire</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/forteroche/app/User/updateANDdelete_comment" method="post">
                        <textarea style="display:none" class="modal_id" name="com_id"></textarea>
                        <textarea style="border: none" class="modal_com" name="comment"></textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                    <button type="submit" name="update_btn" class="btn btn-success">Modifier</button>
                    <button type="submit" name="delete_btn" class="btn btn-danger">Supprimer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

<?php $content = ob_get_clean(); ?>

<?php require(_ROOT_.'template.php'); ?>
 

