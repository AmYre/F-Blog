<?php

    error_reporting(E_ALL ^ E_NOTICE); 
    ini_set("display_errors", 1); 

$title = 'Liste des chapitres';
$h1 = 'Les derniers chapitres';
$h2 = 'Utilisez la barre de recherche pour trouver le chapitre désiré';
$style = '/forteroche/public/style.css';

ob_start(); ?>

        <div class="shadow-lg p-3 mb-5 bg-white rounded mt-5"> 
            
        <?php 
            while($publication = $chapters->fetch())
            {
                echo '<p class="tchat-box">'.'<strong>'.$publication['book'].'</strong>'.' - '.'<strong>Chapitre n°'.$publication['num_chapter'].'</strong>'.' - '.'<strong>'.$publication['title'].'</strong>'.' :'.
                '<br/>'.substr($publication['chapter'],0,1000).'...<br/>'.'<i>'.'
                <br/>Posté le :   '.$publication['timywoo'].'</i>'.'</p>'
                .'<a href="/forteroche/app/Reading/show/'.$publication["id"].'/'.$publication["title"].'"><button name="read-btn">Lire la suite</button></a>'.'<br>'.'<br>'.'<br>';
            }
        ?> 
        </div> 

<?php $content = ob_get_clean();

require(_ROOT_.'template.php'); ?>