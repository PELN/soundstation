
$(document).ready(function() {
    $('#txtSearch').on('keyup', function(){
        const query = $('#txtSearch').val();
        // console.log(query);

        $.ajax({
            type:"GET",
            url: 'ajaxSearch',
            data: { query: $('#txtSearch').val() },
            success: function(response) {
                // console.log(response);
                if( query == "" ) {
                    $('#searchResults').html("");
                } else {
                    $('#searchResults').fadeIn();  
                    // render the search-result-box.blade file to header search results 
                    $("#searchResults").html(response.searchResults);

                    $('#searchBtn').on('click', function(){
                        $('#searchResults').fadeOut();
                        window.location="/search-result-page?search="+query;
                    });
    
                    $('#txtSearch').on('keypress',function(e) {
                        if(e.which == 13) {
                            $('#searchResults').fadeOut();
                            window.location="/search-result-page?search="+query;
                        }
                    });
                }
            }
        });
    });
});
