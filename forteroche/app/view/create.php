<?php

    error_reporting(E_ALL ^ E_NOTICE); 
    ini_set("display_errors", 1); 

$title = 'Inscription';
$h1 = 'Formulaire d\'inscription';
$h2 = 'Une fois inscrit vous aurez accès au tchat et aux commentaires';
$style = '/forteroche/public/style.css';

?>

<?php ob_start(); ?>

	<div class="shadow-lg p-3 bg-white rounded create-box"> 
        <p class="tchat_feedback bg-info text-light text-center p-3 rounded lead"><?php echo $feedback; ?> </p>

		<div class="create text-center lead">
			<form action="/forteroche/app/Create/register" method="post">

				<div class="form-group">
					<label for="pseudo">Votre pseudo :
						<input type="text" name="pseudo" class="form-control" placeholder="Pseudo" value="<?php if ( isset($pseudo) )
						{ 
							echo $pseudo;
						}?>" >
					</label> 
				</div>
				
				<div class="form-group">
						<label for="pseudo">Votre email: 
							<input type="text" name="email" class="form-control" placeholder="@" value="<?php if ( isset($email) )
							{ 
									echo $email;
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

				<button type="submit" class="btn btn-info mt-3" name="register_btn">S'inscrire</button>
			
			</form>

		</div>
	</div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
