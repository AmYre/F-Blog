<?php error_reporting(E_ALL); 

$title = 'Connexion';
$h1 = 'Connectez-vous';
$h2 = 'Une fois connecté vous aurez accès au tchat et aux commentaires';
$style = '/forteroche/public/style.css';

ob_start(); ?>

    <div class="shadow-lg p-3 bg-white rounded connect-box">

        <p class="tchat_feedback bg-info text-light text-center p-3 rounded lead"><?php echo $feedback; ?> </p>
        
        <div class="connect text-center lead">
            <form action="/forteroche/app/Connexion/connect" method="post">

                <div class="form-group">
                    <label for="pseudo">Identifiant : 
                        <input type="text" name="pseudo" class="form-control" placeholder="Entrez votre pseudo" value="<?php if ( isset($pseudo) )
                            { echo $pseudo;
                        }?>"/>
                    </label>
                </div>

                <div class="form-group">
                    <label for="mdp">Mot de passe : 
                        <input type="password" class="form-control" name="mdp" placeholder="Mot de passe"/> 
                    </label>
                </div>

                <button id ="connect_btn" type="submit" class="btn btn-info" name="connect_btn">Connexion</button>

            </form>
        </div>
    </div>
  

<?php $content = ob_get_clean(); ?><?php require(_ROOT_.'template.php'); ?>

