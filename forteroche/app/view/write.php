<?php

    error_reporting(E_ALL); 
    ini_set("display_errors", 1); 

$title = 'Espace de Rédaction';
$h1 = 'Espace de Rédaction - Forteroche';
$h2 = 'TinyMCE est installé pour un plus grand confort d\'écriture';
$style = '/forteroche/public/style.css';

?>

<?php ob_start(); ?>

<div class="shadow-lg p-3 mb-5 bg-dark lead rounded mt-5 text-center text-light"> 

        <p class="chapters_feedback"> <?php echo $feedback; ?> </p>    

        <form action="/forteroche/app/Write/insert_chapter" method="post">
            
            <div class="form-group">

                <label for="title">Titre du Livre
                <input type="text" name="book" class="form-control" placeholder="Livre"></label>

                <label for="title">Titre du Chapitre
                <input type="text" name="title" class="form-control" placeholder="Chapitre"></label>
            
            <label for="title">Chapitre
                <input type="text" name="num" class="form-control" placeholder="Numéro de chapitre"></label>

             <label for="title">Genre
                <input type="text" name="genre" class="form-control" placeholder="Genre du Livre"></label>

            </div>

            <div class="form-group">
            <label for="chapter">Contenu du Chapitre : <textarea name="chapter" class="form-control tinymce"></textarea> </label>
            </div>

            <button type="submit" class="btn btn-info" name="publish_btn">Publier le Chapitre</button>
        
        </form>
    </div>

    <div class="shadow-lg p-3 mb-5 bg-white rounded mt-5"> 
            
        <?php 
            while($publication = $show_chapter->fetch())
            {
                echo '<div class="shadow-lg p-3 mb-5 bg-white rounded mt-2">

                <p class="tchat-pseudo gradient">'.$publication['book'].' - Chapitre n°'.$publication['num_chapter'].' - '.$publication['title'].' :</p>
                <p class="text-justify">'.substr($publication['chapter'],0,1000).'...</p>
                <p class="font-italic font-weight-ligh text-center blockquote-footer">Posté le :   '.$publication['timywoo'].'</p>
                <a href="/forteroche/app/Chapter_manager/show/'.$publication['id'].'/'.$publication['title'].'"><button class="btn btn-info" name="read">Gérer ce chapitre</button></a>
           
            </div>';
            }
        ?> 
        
    </div> 
            

<?php $content = ob_get_clean(); ?>

<?php require(_ROOT_.'template.php'); ?>