<?php 

$title = 'Commentaires';
$h1 = $chap_title;
$h2 = 'Connectez vous pour laisser un commentaire';
$style = 'http://localhost/test/public/style.css';

?>

<?php ob_start(); ?>

    <p class="chapter_manager_feedback"> <?php echo $feedback; ?> </p>

        <form action="http://localhost/test/app/chapter_manager/updateANDdelete_chapter/<?php echo $id; ?>/<?php echo $chap_title ?>" method="post">
        
        <textarea type="text" name="chapter_update" rows="5" cols="33"><?php 
            while($chapter = $select_chapter->fetch())
                {
                    echo $chapter['chapter'];
                } 
            ?></textarea>

        <p>
            <button type="submit" name="chap_btn_suppr">Supprimer</button>
            <button type="submit" name="chap_btn_update">Modifier</button>
        </p>
    
        </form> 

<?php
        while($comment = $show_comments->fetch())
        {
            echo '<p>'.'<br>'.$comment['author'].'<br>'.$comment['comment'].'<br>'.$comment['com_timy'].'</p>';
        }

$content = ob_get_clean();

require('template.php'); 
?>