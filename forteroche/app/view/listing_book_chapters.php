<?php 

    error_reporting(E_ALL ^ E_NOTICE); 
    ini_set("display_errors", 1); 

$title = 'Liste des chapitres de votre livre';
$h1 = ''.preg_replace('/(?=(?<!^)[[:upper:]])/', ' ', $book).'';
$h2 = 'Ne ratez rien des dernières parutions en suivant nos réseaux sociaux <i class="fab fa-facebook"></i> <i class="fab fa-twitter"></i> <i class="fab fa-instagram"></i>';
$style = '/forteroche/public/style.css';

ob_start(); ?>

    <div class="shadow-lg p-3 mb-5 bg-white rounded mt-5"> 
            
        <?php 
            while($publication = $book_chapters->fetch())
            {
                echo'<div class="shadow-lg p-3 mb-5 bg-white rounded mt-2"> 
                        <p class="tchat-pseudo gradient">'.$publication["book"].' : Chapitre n°'.$publication['num_chapter'].' - '.$publication['title'].' :</p>
                        <p class="text-justify">'.substr($publication['chapter'],0,1000).'...</p>
                        <p class="font-italic font-weight-ligh text-center blockquote-footer">Posté le :   '.$publication['timy'].'</p>
                        <a href="/forteroche/app/Reading/show/'.$publication["id"].'/'.$publication["title"].'"><button class="btn btn-info" name="read-btn">Lire la suite</button></a>
                    </div> ';
            }
        ?> 

     </div>   

<?php $content = ob_get_clean();

require(_ROOT_.'template.php'); ?>