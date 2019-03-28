<?php 

$title = 'Mon site';
$h1 = 'Bienvenue sur mon site';
$h2 = 'N\'hésitez pas à vous connecter pour profiter pleinement de l\'experience';

?>

<?php ob_start(); ?>

        <a href="../controller/create_control.php">S'insrire</a>
        <a href="../controller/connexion_control.php">Mon compte</a>


        <h3> Tchat du site </h3>
        <p class="tchat_feedback"> <?php echo $tchat_feedback; ?> </p>

        <form action="../controller/tchat_control.php" method="post">
            </br>
            <label for="pseudonyme">Pseudonyme</label> : <input type="text" name="pseudonyme" value="<?php if ( isset($_POST['pseudonyme']) )
            { echo $_POST['pseudonyme'];
            }
             ?>"><br />
            </br>
            <label for="mess">Message</label> :  <textarea name="mess"></textarea> </br>
            </br>
            <button type="submit" name="tchat_btn">Send Message</button>
        
        </form>

        <div class='tchat_box'> 
        <?php 
            $membres = show_tchat();
            while($membre = $membres->fetch())
            {
                echo '<p>'.'<strong>'.$membre['pseudonyme'].'</strong>'.' :'.'<br/>'.$membre['mess'].'<br/>'.'<i>'.'Posté le :   '.$membre['timywoo'].'</i>'.'</p>';
            }
        ?> 
        </div>

<?php $content = ob_get_clean(); ?>

<?php require('../template.php'); ?>