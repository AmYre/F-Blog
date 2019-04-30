<?php 

if (!isset($_SESSION))  { session_start();  }

$title = 'Espace utilisateur';
$h1 = 'Mon Espace';
$h2 = 'Gérer vos informations';
$style = '../public/style.css';

?>

<?php ob_start(); ?>

        <form action="http://localhost/test/app/user_sent" method="post">
            <button type="submit" name="disconnect_btn">Se déconnecter</button>
        </form>
    
    <div>Infos, modifier pseudo , mdp</div>

    <p>Mes commentaires :</p>
        <div class="shadow-lg p-3 mb-5 bg-white rounded mt-5"> 
            
        <?php 
            while($comments = $show_comments->fetch())
            {
                echo '<p class="tchat-box">'.'<strong>'.$comments['author'].'</strong>'.' :'.'<br/>'.$comments['comment'].'<br/>'.'<i>'.'Posté le :   '.$comments['timy'].'</i>'.'</p>';
            }
        ?> 
        </div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
 

