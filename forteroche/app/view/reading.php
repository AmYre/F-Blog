<?php

    error_reporting(E_ALL ^ E_NOTICE); 
    ini_set("display_errors", 1); 

$title = 'Lecture en ligne';
$h1 = preg_replace('/(?=(?<!^)[[:upper:]])/', ' ', $chap_title);
$h2 = '';
$style = '/forteroche/public/style.css';

ob_start(); ?>

        <div class="shadow-lg p-3 mb-5 bg-white rounded mt-5"> 
            
        <?php 
             while($chapter = $show_chapter->fetch())
             {
                 echo $chapter['chapter'];
             }
        ?> 
        </div> 

        <form action="/forteroche/app/Reading/insert_comment/<?php echo $id ?>/<?php echo $h1 ?>" method="post">
        
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
            
        <small> <?php echo $feedback; ?> </small>

        <div class="shadow-lg p-3 mb-5 bg-white rounded mt-5"> 
            
            <?php
            while($comment = $show_comments->fetch())
            {
                echo '
                    <div class="shadow-lg rounded">
                        <textarea style="display:none" class="com_id" name="com_id">'.$comment['com_id'].'</textarea>
                        <p class="pl-3 pt-3">'.$comment['author'].'</p>
                        <p class="pl-3">'.$comment['comment'].'</p>
                        <p class="pl-3 pb-3">'.$comment['com_timy'].'</p>';

                if (isset($_SESSION['identifiant']) && $comment['author'] == $_SESSION['identifiant'])
                {
                    echo '<!-- Button trigger modal -->
                        <button type="button" name="update_com" class="modal_btn btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                        Modifier votre commentaire
                        </button> 
                    </div>';
                }   
            } ?>    

        </div>           
            
            <!-- Modal -->
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Modifiez votre commentaire</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="/forteroche/app/Reading/updateANDdelete_comment/<?php echo $id ?>/<?php echo $h1 ?>" method="post">
                            <textarea style="display:none" class="modal_id" name="com_id"></textarea>
                            <textarea style="border: none" class="modal_com" name="comment"></textarea>
                    </div>
                    <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                            <button type="submit" name="update_btn" class="btn btn-success">Modifier</button>
                            <button type="submit" name="delete_btn" class="btn btn-danger">Supprimer</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
 
<?php $content = ob_get_clean(); 

require('template.php'); ?>