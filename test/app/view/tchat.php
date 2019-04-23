<?php 

$title = 'Tchat de la communauté';
$h1 = 'Bienvenue sur le Tchat';
$h2 = 'L\'espace de partage de la communauté des Rocheux';
$style = '../public/style.css';

?>

<?php ob_start(); ?>

        <p class="tchat_feedback"><?php echo $feedback; ?> </p>

        <form action="http://localhost/test/app/tchat_sent" method="post">
            
            <div class="form-group">
                <label for="pseudonyme">Pseudonyme
                <input type="text" name="pseudonyme" class="form-control" placeholder="Pseudo" value="<?php if ( isset($pseudonyme) )
                        { echo $pseudonyme;
                }?>"></label>
            </div>
            
            <div class="form-group">
            <label for="mess">Message : <textarea name="mess" class="form-control"></textarea> </label>
            </div>

            <button type="submit" class="btn btn-primary" name="tchat_btn">Send Message</button>
        
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