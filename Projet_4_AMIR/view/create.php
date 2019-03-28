<?php 

$title = 'Inscription';
$h1 = 'Formulaire d\'inscription';
$h2 = 'Une fois inscrit vous aurez accès au tchat et aux commentaires';

?>

<?php ob_start(); ?>

        <a href="../controller/tchat_control.php">Accueil</a>
        <a href="../controller/connexion_control.php">Mon compte</a>

        <p class="register_feedback"><?php echo $register_feedback; ?></p> 

        <form action="../controller/create_control.php" method="post">

                </br>
                <label for="pseudo">Votre pseudo: <input type="text" name="pseudo" value="<?php if ( isset($_POST['pseudo']) )
            { 
                    echo $_POST['pseudo'];
            }?>" >
            </label> 
                </br>
                <label for="pseudo">Votre email: <input type="text" name="email" value="<?php if ( isset($_POST['email']) )
            { 
                    echo $_POST['email'];
            }?>">
            </label> 
                </br>
                <label for="pseudo">Votre mot de passe: <input type="password" name="mdp"></label> 
                </br>
                <label for="pseudo">Confirmez votre mot de passe: <input type="password" name="conf_mdp" ></label>
                </br>
                <button type="submit" name="register_btn">S'inscrire</button>
        
        </form>

<?php $content = ob_get_clean(); ?>

<?php require('../template.php'); ?>
