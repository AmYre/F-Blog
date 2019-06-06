<?php

$title = 'Liste des livres';
$h1 = 'Tous les Livres de Forteroche';
$h2 = 'Soyez notifé des dernières parutions en suivant Jean sur ses réseaux <i class="fab fa-facebook"></i> <i class="fab fa-twitter"></i> <i class="fab fa-instagram"></i>';
$style = '/forteroche/public/style.css';

ob_start(); ?>

        
            
        <?php 
            while($publication = $books->fetch())
            {
                echo '<div class="books '.$publication['title'].' shadow rounded mt-5 mb-5 lead text-light text-center"> 
                        <div>
                            <p class="tchat-pseudo panel"><span class="gradient">'.$publication["title"].'</span></p>
                            <form action="/forteroche/app/Listing/show_book_chapters/'.$publication["id"].'" method="post"><button class="btn btn-light" name="read-btn">Lire ce livre</button></form>
                        </div>
                    </div>';
            }
        ?> 
        

<?php $content = ob_get_clean();

require(_ROOT_.'template.php'); ?>