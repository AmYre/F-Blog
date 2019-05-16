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

                console.log ('response is :' + response);
                $('#search_results').html(response).show();

            });
            
            /*({
                type : "GET",
                url : '/forteroche/app/Search/find/' + search,
                data : data,

                success : function (server_response) {
                    console.log ('response is :' + server_response);
                    $('#search_results').html(server_response).show();

                }
            });*/
        }
    });


});