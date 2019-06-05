<?php error_reporting(E_ALL);
ini_set("display_errors", 1); 

$title = 'Gestion de chapitres';
$h1 = '';
$h2 = 'Modifiez directement le chapitre dans l\'éditeur';
$style = '/forteroche/public/style.css';

ob_start(); ?>

    <div class="shadow-lg p-3 mb-5 bg-dark lead rounded mt-5 text-center text-light">
        <p class="lead">EDITEZ LE CHAPITRE</p>
        <p class="tchat_feedback bg-info text-light text-center p-3 rounded lead"><?php echo $feedback; ?> </p>

            <?php 
                while($chapter = $select_chapter->fetch())
                {
                    echo '
                    <form action="/forteroche/app/Chapter_manager/updateANDdelete_chapter/'.$chapter['id'].'/'.$chapter['num_chapter'].'" method="post">
                        <textarea name="chapter_update"  class="form-control tinymce">    
                        '.$chapter['chapter'].'
                        </textarea>

                        <button type="submit" name="chap_btn_suppr" class="btn btn-info mr-2 mt-3">Supprimer</button>
                        <button type="submit" name="chap_btn_update" class="btn btn-info mt-3">Modifier</button>
                    </form>';

                    $h1 = $chapter['title'];
                    $chap_id = $chapter['id'];
                    $num_chapter = $chapter['num_chapter'];
                } 
            ?>   
         
    </div>

    <div class="shadow-lg p-3 mb-5 bg-dark lead rounded mt-5 text-light">
                        
    <?php                    
            if ($check_comments == 0) 
            {
                echo '<p class="lead text-center">CE CHAPITRE N\'A PAS ENCORE DE COMMENTAIRES</p>';
            } else { echo '<p class="lead text-center">COMMENTAIRES DU CHAPITRE</p>';}
        
            while($comment = $show_comments->fetch())
            {
                echo '<div class="shadow-lg p-3 mb-2 bg-white lead rounded mt-2">

                <textarea style="display:none" name="author_id">'.$comment['author_id'].'</textarea>
                <textarea style="display:none" name="com_id">'.$comment['com_id'].'</textarea>
                <p class="tchat-pseudo gradient">'.$comment['author'].' :</p>
                <p class="tchat-mess text-dark text-justify">'.$comment['comment'].'</p>
                <p class="font-italic font-weight-ligh text-center blockquote-footer">Posté le :   '.$comment['com_timy'].'</p>
                <button type="button" name="update_com" class="modo_btn btn btn-info" data-toggle="modal" data-target="#moderate_modal">
                Modérer le commentaire
                </button>';

                if ($comment['flag'] > 0)
                {
                    echo '<p class="lead text-danger">Ce commentaire à été signalé et nécessite votre intervention <i class="fas fa-exclamation-circle text-warning"></i></p></div>';
                } else { echo '</div>';}
        

            }
        ?> 
    </div>


            <!-- Modal de MODIFICATION-->
    <div class="modal fade" id="moderate_modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">Modérer le commentaire</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="/forteroche/app/Chapter_manager/moderate_comment/<?php echo $chap_id.'/'.$num_chapter;?>" method="post">

                    <div class="modal-body text-center text-light bg-info">
                        <textarea style="display:none" class="author_id" name="author_id"></textarea>
                        <textarea style="display:none" class="modo_id" name="com_id"></textarea>
                        <textarea style="border: none" class="rounded shadow m-3 p-3 modo_com" rows="3" cols="30" name="comment"></textarea>
                    </div>
                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                        <button type="submit" name="unflag_btn" class="btn btn-warning">Désignaler</button>
                        <button type="submit" name="com_btn_update" class="btn btn-success">Modifier</button>
                        <button type="submit" name="delete_btn" class="btn btn-danger">Supprimer</button>
                        <button type="submit" name="ban_btn" class="btn btn-dark">Bannir</button>
                    </div>

                </form>

            </div>
        </div>
    </div>

    
<?php
$content = ob_get_clean();require(_ROOT_.'template.php'); 
?>   