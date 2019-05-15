<?php 

    error_reporting(E_ALL ^ E_NOTICE); 
    ini_set("display_errors", 1); 

$title = 'Liste des chapitres de votre livre';
$h1 = 'Lecture de : "'.preg_replace('/(?=(?<!^)[[:upper:]])/', ' ', $book).'" ';
$h2 = '';
$style = '/forteroche/public/style.css';

ob_start(); ?>

        
            
        <?php 
            while($publication = $book_chapters->fetch())
            {
                echo'<div class="shadow-lg p-3 mb-5 bg-white rounded mt-5"> 
                        <p class="tchat-box">'.$publication["book"].' : Chapitre n°'.$publication['num_chapter'].'</strong>'.' - '.'<strong>'.$publication['title'].'</strong>'.' :'.
                        '<br/>'.substr($publication['chapter'],0,1000).'...<br/>'.'<i>'.'
                        <br/>Posté le :   '.$publication['timy'].'</i>'.'</p>'.
                        '<a href="/forteroche/app/Reading/show/'.$publication["id"].'/'.$publication["title"].'"><button name="read-btn">Lire la suite</button></a>'.'<br>'.'<br>'.'<br>
                    </div> ';
            }
        ?> 
        

<?php $content = ob_get_clean();

require(_ROOT_.'template.php'); ?>