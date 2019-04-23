<?php 

$title = 'Commentaires';
$h1 = $_GET['title'];
$h2 = 'Connectez vous pour laisser un commentaire';
$style = '../public/style.css';
$id = $_GET['id'];
$title = $_GET['title'];

?>

<?php ob_start(); ?>

    <p class="chapter_manager_feedback"> <?php echo $feedback; ?> </p>

        <form action="http://localhost/test/app/chapter_manager_sent&amp;id=<?php echo $id; ?>&amp;title=<?php echo $title ?>" method="post">
        
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