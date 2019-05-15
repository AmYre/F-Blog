<?php

    error_reporting(E_ALL ^ E_NOTICE); 
    ini_set("display_errors", 1); 

$title = 'Liste des livres';
$h1 = 'Tous les Livres de Forteroche';
$h2 = 'Utilisez la barre de recherche pour trouver le livre désiré';
$style = '/forteroche/public/style.css';

ob_start(); ?>

        
            
        <?php 
            while($publication = $books->fetch())
            {
                echo '<div class="shadow-lg p-3 mb-5 bg-white rounded mt-5"> 
                        <p class="tchat-box">'.'<strong>'.$publication['book'].'</strong><br/>'.
                
                        '<a href="/forteroche/app/Listing/show_book_chapters/'.urlencode($publication["book"]).'"><button name="read-btn">Lire ce livre</button></a>'.'<br>'.'<br>'.'<br>
            
                    </div>';
            }
        ?> 
        

<?php $content = ob_get_clean();

require(_ROOT_.'template.php'); ?>