<?php 

$title = 'Connexion';
$h1 = 'Connectez-vous';
$h2 = 'Une fois inscrit vous aurez accès au tchat et aux commentaires';

?>

<?php ob_start(); ?>

        <a href="../controller/create_control.php">S'insrire</a>
        <a href="../controller/tchat_control.php">Accueil</a>

        <p class="connect_feedback"><?php echo $connect_feedback;?></p>

        <form action="../controller/connexion_control.php" method="post">
                </br>
                <label for="pseudo">Identifiant</label> : <input type="text" name="pseudo" value="<?php if ( isset($_POST['pseudo']) )
            { 
                echo $_POST['pseudo'];
            }?>"/>
                </br>
                </br>
                <label for="mdp">Mot de passe</label> :  <input type="password" name="mdp"/></br>
                </br>
                <button type="submit" name="connect_btn">Connexion</button>

        </form>

<?php $content = ob_get_clean(); ?>

<?php require('../template.php'); ?>

