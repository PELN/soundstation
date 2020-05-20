// hide/show filter options based on screen size (product_listing)
$(document).ready(function(){
    $('#mobile-filter-container').hide();

    if ($(window).width() < 768 && $(window).load()) {
            $('filter-card').hide();
        }
        $('.filter-btn').on('click', function() {
                console.log('clicked on filter');
                $('#filter-card').toggle();
            });

        if($(window).load()){
            if ($(window).width() < 768) {
                $('#filter-card').hide();
                $('#mobile-filter-container').show();
                $('#filter-container').hide();
            }
        }

    $(window).resize(function() {
        if ($(window).width() < 768 && $(window).load()) {
            $('#filter-card').hide();
            $('#mobile-filter-container').show();
            $('#filter-container').hide();
        }
        else {
            $('#filter-card').show();
            $('#mobile-filter-container').hide();
            $('#filter-container').show();
        }
        if($(window).load()){
            if ($(window).width() < 768) {
                $('#filter-card').hide();
            }
        }
        else{
            $('#filter-card').show();
        }
    });
});