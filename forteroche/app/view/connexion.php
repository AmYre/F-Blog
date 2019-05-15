<?php error_reporting(E_ALL); 

$title = 'Connexion';
$h1 = 'Connectez-vous';
$h2 = 'Une fois connecté vous aurez accès au tchat et aux commentaires';
$style = '/forteroche/public/style.css';

ob_start(); ?>

    
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
                <small class="text-danger"><?php echo $feedback; ?></small>
            </div>

            <button id ="connect_btn" type="submit" class="btn btn-primary" name="connect_btn">Connexion</button>

        </form>
  

<?php $content = ob_get_clean(); ?><?php require(_ROOT_.'template.php'); ?>

