
$(document).ready(function() {

    $('#txtSearch').on('keyup', function(){

        const query = $('#txtSearch').val();
        console.log(query);

        $.ajax({
            type:"GET",
            url: 'ajaxSearch',
            data: { query: $('#txtSearch').val() },
            success: function(response) {
                console.log(response);

                if( query == "" ) {
                    $('#searchResults').html("");
                } else {
                    $('#searchResults').fadeIn();  
                    $("#searchResults").html(response);
                }

             }
        });
    });

    $("#searchResults").on('click', 'li', function(){  
        $('#searchItem').val($(this).text());
        $('#searchResults').fadeOut();
    });

});

