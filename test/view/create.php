<?php 

$title = 'Inscription';
$h1 = 'Formulaire d\'inscription';
$h2 = 'Une fois inscrit vous aurez accès au tchat et aux commentaires';
$style = '../public/style.css';

?>

<?php ob_start(); ?>

         

	<form action="../controller/create_control.php" method="post">

		<div class="form-group">
			<label for="pseudo">Votre pseudo :
				<input type="text" name="pseudo" class="form-control" placeholder="Pseudo" value="<?php if ( isset($_POST['pseudo']) )
				{ 
					echo $_POST['pseudo'];
				}?>" >
			</label> 
		</div>
		
		<div class="form-group">
				<label for="pseudo">Votre email: 
					<input type="text" name="email" class="form-control" placeholder="@" value="<?php if ( isset($_POST['email']) )
					{ 
							echo $_POST['email'];
					}?>">
				</label> 
		</div>

		<div class="form-group">
				<label for="pseudo">Votre mot de passe:
					<input type="password" name="mdp" class="form-control" placeholder="Il sera sécurisé"></label> 
		</div>
		
		<div class="form-group">
				<label for="pseudo">Confirmez mot de passe: 
					<input type="password" name="conf_mdp" class="form-control" placeholder="Pour être sûr"></label>
		</div>

		<small class="form-text text-danger"><?php echo $register_feedback; ?></small>
		<button type="submit" class="btn btn-primary mt-3" name="register_btn">S'inscrire</button>
	
	</form>

<?php $content = ob_get_clean(); ?>

<?php require('../template.php'); ?>