$(document).ready( function() {

    $('.modal_btn').on('click', function()
        {
            $('.modal_com').html('');
            $('.modal_com').prepend($(this).prevAll().eq(1).html());
            $('.modal_id').prepend($(this).prevAll().eq(3).html());
        });

    $('#search').keyup( function() {

        var search = $(this).val();
        var data = 'search=' + search;
        if (search.length > 2) 
        {
            $.ajax('/forteroche/app/Search/find/' + search).done( function (response) {
                var words = response.split('<br>');
                /*$('#search_results').html(response).show();*/
                $("#search").autocomplete({ source: words });
            });
        
        }
    });

    
    $(window).on("load",function(){
        $(".loader-wrapper").fadeOut("slow");
   });


});