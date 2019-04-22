<?php 

$title = 'Liste des chapitres';
$h1 = 'Tous les chapitres';
$h2 = 'Utilisez la barre de recherche pour trouver le chapitre désiré';
$style = 'public/style.css';
/*while($comments_fields = $comments->fetch())
    {
        $chapter_id = $comments_fields['chapter_id'];
        var_dump ($chapter_id);
    }*/
    

ob_start(); ?>

        <div class="shadow-lg p-3 mb-5 bg-white rounded mt-5"> 
            
        <?php 
            while($publication = $chapters->fetch())
            {
                echo '<p class="tchat-box">'.'<strong>'.$publication['title'].'</strong>'.' :'.
                '<br/>'.$publication['chapter'].'<br/>'.'<i>'.'
                Posté le :   '.$publication['timywoo'].'</i>'.'</p>'
                .'<a href="http://localhost/test/index.php?redir=reading&amp;id='.$publication["id"].'&amp;title='.$publication["title"].'"><button name="read-btn">Lire la suite</button></a>'.'<br>'.'<br>'.'<br>';
            }
        ?> 
        </div> 

<?php $content = ob_get_clean();

require('template.php'); ?>