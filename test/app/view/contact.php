<?php 

if (!isset($_SESSION))  { session_start();  }

$title = 'Me contacter';
$h1 = 'Me contacter';
$h2 = 'Je répondrais personnellement à vos messages';
$style = '../public/style.css';

?>

<?php ob_start(); ?>

<br><br>
<form action="http://localhost/test/app/contact_sent" method="post">
  <div class="form-row">
    <div class="col">
       
      <input type="text" name="name" class="form-control" placeholder="Nom">
    </div>
    <div class="col">
        
      <input type="text" name="firstname" class="form-control" placeholder="Prénom">
    </div>
  </div>
  <div class="form-group"><br>
    <input type="email" name="mail" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Adresse email">
  </div><br>
  <div class="form-group">
    <textarea class="form-control" name="mess" id="exampleFormControlTextarea1" placeholder="Votre message" rows="3"></textarea>
  </div>

  <button type="submit" class="btn btn-primary">Envoyer</button>
</form>
    
<small class="text-danger"> <?php echo $feedback; ?> </small>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
 
