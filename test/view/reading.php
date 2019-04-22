<?php 

$title = 'Lecture en ligne';
$h1 = $_GET['title'];
$h2 = '';
$style = 'public/style.css';
$id = $_GET['id'];

ob_start(); ?>

        <div class="shadow-lg p-3 mb-5 bg-white rounded mt-5"> 
            
        <?php 
             while($chapter = $show_chapter->fetch())
             {
                 echo $chapter['chapter'];
             }
        ?> 
        </div> 

        <p class="tchat_feedback"> <?php echo $feedback; ?> </p>

        <form action="http://localhost/test/index.php?redir=reading_sent&amp;id=<?php echo $id ?>&amp;title=<?php echo $h1 ?>" method="post">
            
            <div class="form-group">
                <label for="pseudonyme">Pseudonyme
                <input type="text" name="pseudonyme" class="form-control" placeholder="Pseudo" value="<?php if ( isset($pseudonyme) )
                        { echo $pseudonyme;
                }?>"></label>
            </div>
            
            <div class="form-group">
            <label for="mess">Message : <textarea name="mess" class="form-control"></textarea> </label>
            </div>

            <button type="submit" class="btn btn-primary" name="comment_btn">Publier commentaire</button>
        
        </form>

        <div class="shadow-lg p-3 mb-5 bg-white rounded mt-5"> 
            
        <?php
        while($comment = $show_comments->fetch())
        {
            echo '<p>'.'<br>'.$comment['author'].'<br>'.$comment['comment'].'<br>'.$comment['com_timy'].'</p>';
        }
        ?> 
        </div>

        <!-- COMMENTAIRES -->

<?php $content = ob_get_clean(); 

 require('template.php'); ?>