<?php

    error_reporting(E_ALL ^ E_NOTICE); 
    ini_set("display_errors", 1); 

$title = 'Liste des livres';
$h1 = 'Tous les Livres de Forteroche';
$h2 = 'Soyez notifé des dernières parutions en suivant Jean sur ses réseaux <i class="fab fa-facebook"></i> <i class="fab fa-twitter"></i> <i class="fab fa-instagram"></i>';
$style = '/forteroche/public/style.css';

ob_start(); ?>

        
            
        <?php 
            while($publication = $books->fetch())
            {
                echo '<div class="books '.$publication['book'].' shadow rounded mt-5 mb-5 lead text-light text-center"> 
                        <div>
                            <p class="tchat-pseudo panel"><span class="gradient">'.$publication['book'].'</span></p>
                            <a href="/forteroche/app/Listing/show_book_chapters/'.urlencode($publication["book"]).'"><button class="btn btn-light" name="read-btn">Lire ce livre</button></a>
                        </div>
                    </div>';
            }
        ?> 
        

<?php $content = ob_get_clean();

require(_ROOT_.'template.php'); ?>