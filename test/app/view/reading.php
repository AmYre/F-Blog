<?php 

if (!isset($_SESSION))  { session_start();  }

$title = 'Lecture en ligne';
$h1 = $_GET['title'];
$h2 = '';
$style = '../public/style.css';
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

        <form action="http://localhost/test/app/reading_sent&amp;id=<?php echo $id ?>&amp;title=<?php echo $h1 ?>" method="post">
        
            <?php 
                if ( isset($_SESSION['identifiant']) ) 
                {
                   echo '<p> Vous ête connecté en tant que : '.$_SESSION['identifiant'].' </p>
                    
                    <div class="form-group">
                        <label for="mess">Message : <textarea name="mess" class="form-control"></textarea> </label>
                    </div>

                    <button type="submit" class="btn btn-primary" name="comment_btn">Publier commentaire</button>';

                } else { echo "Connectez-vous pour laisser un commentaire";}
            ?>


            
        
        </form>

        <div class="shadow-lg p-3 mb-5 bg-white rounded mt-5"> 
            
        <?php
        while($comment = $show_comments->fetch())
        {
            echo ' <div class="shadow-lg p-3 mb-5 bg-white rounded mt-5"> 
                        <form name="modal_com" id="modal_com" action="http://localhost/test/app/reading&amp;id='.$id.'&amp;title='.$h1.'" method="post">
                            <input hidden name="com_id" value="'.$comment['com_id'].'">
                            <textarea style="border: none" name="author">'.$comment['author'].'</textarea><br>
                            <textarea style="border: none" name="comment">'.$comment['comment'].'</textarea><br>
                            <textarea style="border: none" name="timy">'.$comment['com_timy'].'</textarea>';

            if (isset($_SESSION['identifiant']) && $comment['author'] == $_SESSION['identifiant'])
                        {
                            echo '<!-- Button trigger modal -->
                            <button type="button" name="update_com" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                            Modifier votre commentaire
                            </button></form>
                            
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <textarea style="border: none" name="comment">'.$com.'</textarea>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Save changes</button>
                                </div>
                                </div>
                            </div>
                            </div></div>';
                        }
                        
            
        }
        ?> 
        </div>

        <!-- COMMENTAIRES -->

<?php $content = ob_get_clean(); 

 require('template.php'); ?>