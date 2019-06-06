$(document).ready( function() {

    //Récupération du contenu du commentaire pour pouvoir le modifier dans la modale
    $('.modal_btn').on('click', function()
        {
            $('.modal_com').html('');
            $('.modal_com').html($(this).prevAll().eq(1).html());
            $('.modal_id').html($(this).prevAll().eq(3).html());
        });

    //Récupération des données en ajax pour afficher les chapitres directement dans la modale "livre"
    $('.book_btn').on('click', function()
    {
        var get = $(this).prevAll().eq(2).html();
            $.ajax('/forteroche/app/Write/manage_chapters/' + get).done( function (response) {

                $("#list_chapters").html('');
                $("#list_chapters").html(response);
            });
        
    });

    //Récupération du titre du livre pour pouvoir le modifier directement dans la modale
    $('.title_btn').on('click', function()
    {
        $('.write_title_id').html('');
        $('.write_title_id').html($(this).prevAll().eq(1).html());
        $("#modal_title").html('');
        $("#modal_title").html($(this).prevAll().eq(0).html());
    });
        
    
    //Récupération de l'id d'un commentaire signalé pour pouvoir le traiter en admin
    // et de l'id de l'auteur du commentaire pour pouvoir le bannir si besoin
    $('.modo_btn').on('click', function()
    {
        $('.modo_com').html('');
        $('.modo_com').html($(this).prevAll().eq(1).html());
        $('.modo_id').html('');
        $('.modo_id').html($(this).prevAll().eq(3).html());
        $('.author_id').html('');
        $('.author_id').html($(this).prevAll().eq(4).html());
        
    }); 
  
    //Récupération de l'id du livre pour pouvoir prévenir avant suppression dans la modale
    $('.del_btn').on('click', function()
    {
        $('.delete_id').html('');
        $('.delete_id').html($(this).prevAll().eq(3).html());
    });  
    

    //Animation de page de chargement pour une attente moins ressentie
    $(window).on("load",function(){
        $(".loader-wrapper").fadeOut("slow");
   });
    

    //Barre de recherche dynamique --à poursuivre
    /*$('#search').keyup( function() {

        var search = $(this).val();
        var data = 'search=' + search;
        if (search.length > 2) 
        {
            $.ajax('/forteroche/app/Search/find/' + search).done( function (response) {
                var words = response.split('<br>');
                $("#search").autocomplete({ source: words });
            });
        
        }
    });*/


    


});