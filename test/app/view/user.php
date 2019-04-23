<?php 

$title = 'Votre Compte';
$h1 = 'Bienvenue '.$_SESSION['identifiant'];
$h2 = 'Merci pour votre connexion, vous pouvez désormais commenté vos chapitres préférés et participer au tchat de la communauté';
$style = '../public/style.css';

?>

<?php ob_start(); ?>

    <div>vos infos : identifiant, mail, mdp, les changer</div>
    
    <div>Vos derniers commentaires</div>

    <div>Le tchat</div>
  

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
