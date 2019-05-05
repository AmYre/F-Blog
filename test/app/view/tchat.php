<?php 

if (!isset($_SESSION))  { session_start();  }

$title = 'Tchat de la communauté';
$h1 = 'Bienvenue sur le Tchat';
$h2 = 'L\'espace de partage de la communauté des Rocheux';
$style = 'http://localhost/test/public/style.css';
?>

<?php ob_start(); ?>

        <p class="tchat_feedback"><?php echo $feedback; ?> </p>

        <form action="http://localhost/test/app/tchat/insert_tchat" method="post">
            
            <?php 
                if ( isset($_SESSION['identifiant']) ) 
                {
                   echo '<p> Vous ête connecté en tant que : '.$_SESSION['identifiant'].' </p>
                    
                    <div class="form-group">
                        <label for="mess">Message : <textarea name="mess" class="form-control"></textarea> </label>
                    </div>

                    <button type="submit" class="btn btn-primary" name="tchat_btn">Send Message</button>';

                } else { echo "Connectez-vous pour accéder au Tchat";}
            ?>
        
        </form>

        <div class="shadow-lg p-3 mb-5 bg-white rounded mt-5"> 
            
        <?php 
            while($membre = $show_tchat->fetch())
            {
                echo '<p class="tchat-box">'.'<strong>'.$membre['pseudonyme'].'</strong>'.' :'.'<br/>'.$membre['mess'].'<br/>'.'<i>'.'Posté le :   '.$membre['timywoo'].'</i>'.'</p>';
            }
        ?> 
        </div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>