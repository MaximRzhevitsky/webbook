jQuery(function($){

    var button = $( '#loadmore a' ),
        paged = button.data( 'paged' ),
        maxPages = button.data( 'max_pages' );
    button.click( function( event ) {
        event.preventDefault(); е
        var data = {
            'action' : 'loadmore',
            'paged' : paged,
        };
        $.post(max.ajaxurl,data,function (response){
            if($.trim(response) !== ''){
                $('#row_append').append(response);
                paged++;
                if( paged === maxPages ) {
                    button.remove(); }
            }else{
                button.remove();
            }
        });
       });
      });