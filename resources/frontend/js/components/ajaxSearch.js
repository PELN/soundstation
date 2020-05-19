
$(document).ready(function() {
    $('.txt-search').on('keyup', function(){
        const query = $('.txt-search').val();
        // console.log(query);

        $.ajax({
            type:"GET",
            url: 'ajaxSearch',
            data: { query: $('.txt-search').val() },
            success: function(response) {
                // console.log(response.searchResults);
                if( query == "" ) {
                    $('.search-results').html("");
                } else {
                    $('.search-results').fadeIn();  
                    // render the search-result-box.blade file to header search results 
                    $('.search-results').html(response.searchResults);

                    $('.search-btn').on('click', function(){
                        $('.search-results').fadeOut();
                        window.location="/search-result-page?search="+query;
                    });
    
                    $('.txt-search').on('keypress',function(e) {
                        if(e.which == 13) {
                            $('.search-results').fadeOut();
                            window.location="/search-result-page?search="+query;
                        }
                    });
                }
            }
        });
    });
});

