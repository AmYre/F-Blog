$(document).ready( function() {

    $('.modal_btn').on('click', function()
        {
            $('.modal_com').html('');
            $('.modal_com').prepend($(this).prevAll().eq(1).html());
            $('.modal_id').prepend($(this).prevAll().eq(3).html());
        });


    $('.book_btn').on('click', function()
    {
        var get = $(this).prevAll().eq(2).html();
            $.ajax('/forteroche/app/Write/manage_chapters/' + get).done( function (response) {

                $("#list_chapters").html('');
                $("#list_chapters").html(response);
            });
        
    });

    $('.title_btn').on('click', function()
    {
        var id = $(this).prevAll().eq(1).html();
            $.ajax('/forteroche/app/Write/show_book_title/' + id).done( function (response) {

                $('.write_title_id').html('');
                $('.write_title_id').html(id);
                $("#modal_title").html('');
                $("#modal_title").html(response);
            });
        
    });


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

    
    $(window).on("load",function(){
        $(".loader-wrapper").fadeOut("slow");
   });


});