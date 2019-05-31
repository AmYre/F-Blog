<?php error_reporting(E_ALL ^ E_NOTICE);

$title = 'Gestion de chapitres';
$h1 = '';
$h2 = 'Modifiez directement le chapitre dans l\'éditeur';
$style = '/forteroche/public/style.css';

ob_start(); ?>

    <div class="shadow-lg p-3 mb-5 bg-dark lead rounded mt-5 text-center text-light">
        <p class="lead">EDITEZ LE CHAPITRE</p>
        <p class="chapter_manager_feedback"> <?php echo $feedback; ?> </p>

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
                } 
            ?>   
         
    </div>

    <div class="shadow-lg p-3 mb-5 bg-dark lead rounded mt-5 text-light">
        <p class="lead text-center">COMMENTAIRES DU CHAPITRE</p>
        <?php
            while($comment = $show_comments->fetch())
            {
                echo '<div class="shadow-lg p-3 mb-2 bg-white lead rounded mt-2">
                <textarea style="display:none" name="com_id">'.$comment['id'].'</textarea>
                <p class="tchat-pseudo gradient">'.$comment['author'].' :</p>
                <p class="tchat-mess text-dark text-justify">'.$comment['comment'].'</p>
                <p class="font-italic font-weight-ligh text-center blockquote-footer">Posté le :   '.$comment['com_timy'].'</p>

                <button type="button" name="update_com" class="modal_btn btn btn-info" data-toggle="modal" data-target="#exampleModalCenter">
                Modérer le commentaire
                </button> 
            </div>'; 

            }
        ?> 
    </div>
    
<?php
$content = ob_get_clean();require(_ROOT_.'template.php'); 
?>   