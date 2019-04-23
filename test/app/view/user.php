<?php if (!isset($_SESSION))  { session_start(); } 

$title = 'Votre Compte';
$h1 = 'Bienvenue '.$_SESSION['identifiant'];
$h2 = 'Merci pour votre connexion, vous pouvez désormais commenté vos chapitres préférés et participer au tchat de la communauté';
$style = '../public/style.css';

?>

<?php ob_start(); ?>

    <form action="http://localhost/test/app/user_sent" method="post">
    <button type="submit" name="disconnect_btn">Se déconnecter</button>
    </form>

    <div>vos infos : identifiant, mail, mdp, les changer</div>
    
    <div>Vos derniers commentaires</div>

    <div>Le tchat</div>
  

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
