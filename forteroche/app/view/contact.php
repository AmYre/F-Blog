<?php

$title = 'Me contacter';
$h1 = 'Me contacter';
$h2 = 'Je répondrais personnellement à vos messages';
$style = '/forteroche/public/style.css';

require_once('recaptcha/autoload.php');
if (isset($_POST['g-recaptcha-response']))
{
    $recaptcha = new \ReCaptcha\ReCaptcha('6LeUEKEUAAAAAO7l-75MqUpV7q4oIrCReE4NO1Rt');
    $resp = $recaptcha->setExpectedHostname('recaptcha-demo.appspot.com')
                  ->verify($_POST['g-recaptcha-response']);
    if ($resp->isSuccess()) 
    {
    var_dump($resp->isSuccess());
    } else {
    $errors = $resp->getErrorCodes();}   
}


?>

<?php ob_start(); ?>

	<div class="shadow-lg p-3 mb-5 bg-white rounded mt-5 contact-box">
		<p class="tchat_feedback bg-info text-light text-center p-3 rounded lead"><?php echo $feedback; ?> </p>

		<div class="contact">
			<form action="/forteroche/app/Contact/contact_mail" method="post">
				<div class="form-row br-mail">

					<div class="col">
						<input type="text" name="name" class="form-control" placeholder="Nom">
					</div>

					<div class="col">
						<input type="text" name="firstname" class="form-control" placeholder="Prénom">
					</div>

				</div>

				<div class="form-group">
					<input type="email" name="mail" class="form-control" placeholder="Adresse email">
				</div>

				<div class="form-group">
					<textarea class="form-control" name="mess" placeholder="Votre message" rows="3"></textarea>
				</div>

				<div class="g-recaptcha" data-sitekey="6LeUEKEUAAAAABSqgNj61Bb4iszLsWpSL33ZtXWa"></div>

				<button type="submit" class="btn btn-info btn-contact">Envoyer</button>

			</form>
		</div>
	</div>

<?php $content = ob_get_clean(); ?>

<?php require(_ROOT_.'template.php'); ?>
 
