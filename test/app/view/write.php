<?php 

$title = 'Les derniers chapitres';
$h1 = 'Derniers Chapitres Publiés';
$h2 = 'Séléctionnez un chapitre pour y accéder complètement';
$style = '../public/style.css';

?>

<?php ob_start(); ?>

        <p class="chapters_feedback"> <?php echo $feedback; ?> </p>

        <form action="http://localhost/test/app/write_sent" method="post">
            
            <div class="form-group">

                <label for="title">Titre du Livre
                <input type="text" name="book" class="form-control" placeholder="Livre"></label>

                <label for="title">Titre du Chapitre
                <input type="text" name="title" class="form-control" placeholder="Chapitre"></label>
            
            <label for="title">Chapitre
                <input type="text" name="num" class="form-control" placeholder="Numéro de chapitre"></label>

             <label for="title">Volume
                <input type="text" name="volume" class="form-control" placeholder="Numéro de volume"></label>

            </div>

            <div class="form-group">
            <label for="chapter">Contenu du Chapitre : <textarea name="chapter" class="form-control tinymce"></textarea> </label>
            </div>

            <button type="submit" class="btn btn-primary" name="publish_btn">Publier le Chapitre</button>
        
        </form>

        <div class="shadow-lg p-3 mb-5 bg-white rounded mt-5"> 
            
        <?php 
            
            while($publication = $show_chapter->fetch())
            {
                echo '<p class="tchat-box">'.'<strong>'.$publication['title'].'</strong>'.' :'.
                '<br/>'.$publication['chapter'].'<br/>'.'<i>'.'
                Posté le :   '.$publication['timywoo'].'</i>'.'</p>'
                .'<a href="http://localhost/test/app/chapter_manager&amp;id='.$publication["id"].'&amp;title='.$publication["title"].'"><button name="read">Gérer ce chapitre</button></a>'.'<br>'.'<br>'.'<br>';
            }
        ?> 
        </div> 

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>