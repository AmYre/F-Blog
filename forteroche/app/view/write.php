<?php

    error_reporting(E_ALL); 
    ini_set("display_errors", 1); 

$title = 'Espace de Rédaction';
$h1 = 'Espace de Rédaction - Forteroche';
$h2 = 'TinyMCE est installé pour un plus grand confort d\'écriture';
$style = '/forteroche/public/style.css';

?>

<?php ob_start(); ?>

    <div class="shadow-lg p-3 mb-5 bg-dark lead rounded mt-5 text-center text-light"> 

    <p class="tchat_feedback bg-info text-light text-center p-3 rounded lead"><?php echo $feedback; ?> </p>    

            <form action="/forteroche/app/Write/insert_chapter" method="post">
                
                <div class="form-group">

                    <label>Titre du Livre
                    <input type="text" name="book" class="form-control" placeholder="Livre"></label>

                    <label>Numéro du Livre
                    <input type="text" name="id" class="form-control" placeholder="Livre n°"></label>
                    
                    <label>Titre du Chapitre
                    <input type="text" name="title" class="form-control" placeholder="Chapitre"></label>
                
                    <label>Chapitre
                    <input type="text" name="num" class="form-control" placeholder="Numéro de chapitre"></label>

                    <label>Genre
                    <input type="text" name="genre" class="form-control" placeholder="Genre du Livre"></label>

                </div>

                <div class="form-group">
                    <label>Contenu du Chapitre : <textarea name="chapter" class="form-control tinymce"></textarea> </label>
                </div>

                <button type="submit" class="btn btn-info" name="publish_btn">Publier le Chapitre</button>
            
            </form>
    </div>

    <div class="shadow-lg p-3 mb-5 bg-white rounded mt-5"> 
        <p class="text-center write-books">Les Livres</p>
            
        <?php 
            while($publication = $books->fetch())
            {

                echo '<div class="books '.$publication['title'].' shadow rounded mt-5 mb-5 lead text-light text-center"> 
                        <div>
                            <textarea style="display:none" class="write_id" name="write_id">'.$publication['id'].'</textarea>
                            <p class="tchat-pseudo panel"><span class="gradient">'.$publication['title'].'</span></p>
                            <button class="btn btn-warning title_btn m-2" name="read-btn" data-toggle="modal" data-target="#title_modal">Modifier le titre</button>
                            <button class="btn btn-success book_btn m-2" name="read-btn" data-toggle="modal" data-target="#write_modal">Éditer les chapitres</button>
                            <form action="/forteroche/app/Write/delete_book/'.$publication['id'].'" method="post"><button class="btn btn-danger book_btn m-2">Supprimer</button></form>
                        </div>
                    </div>';

            }
        ?> 
        
    </div> 


    <!-----MODAL CHAPITRES-------->
    <div class="modal fade" id="write_modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">Les chapitres</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <textarea style="display:none" class="write_modal_id" name="write_id"></textarea>

                    <div id="list_chapters"></div>
                </div>


                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                </div>

            </div>
        </div>
    </div>

        <!-----MODAL MODIFICATION TITRE-------->
        <div class="modal fade" id="title_modal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">

                    <div class="modal-header">
                        <h5 class="modal-title text-center">Modification du Titre</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <form action="/forteroche/app/Write/update_book_title/" method="post">
                        <div class="modal-body text-center text-light bg-info">
                            <textarea style="display:none" class="write_title_id" name="title_id"></textarea>

                            <textarea class="rounded shadow lead p-3" style="border : none" id="modal_title" name="update_title"></textarea>
                        </div>


                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                            <button type="submit" class="btn btn-warning" >Modifier</button>
                        </div>
                    </form>

            </div>
        </div>
    </div>
            

<?php $content = ob_get_clean(); ?>

<?php require(_ROOT_.'template.php'); ?>