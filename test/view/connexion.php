<?php 

$title = 'Connexion';
$h1 = 'Connectez-vous';
$h2 = 'Une fois connecté vous aurez accès au tchat et aux commentaires';
$style = '../public/style.css';

?>

<?php ob_start(); ?>

    
        <form action="../controller/connexion_control.php" method="post">

            <div class="form-group">
                <label for="pseudo">Identifiant : 
                    <input type="text" name="pseudo" class="form-control" placeholder="Entrez votre pseudo" value="<?php if ( isset($_POST['pseudo']) )
                        { echo $_POST['pseudo'];
                    }?>"/>
                </label>
            </div>

            <div class="form-group">
                <label for="mdp">Mot de passe : 
                    <input type="password" class="form-control" name="mdp" placeholder="Mot de passe"/> 
                </label>  
                <small class="text-danger"><?php echo $connect_feedback;?></small>
            </div>

            <button type="submit" class="btn btn-primary" name="connect_btn">Connexion</button>

        </form>
  

<?php $content = ob_get_clean(); ?>

<?php require('../template.php'); ?>

