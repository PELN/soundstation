require('./bootstrap');

$(document).ready(function() {
    // $('.genre').click(function(){
    //     // alert('clicked');

    //     var genres = [];
    //     $('.genre').each(function() {
    //         if($(this).is(":checked")){
    //             genres.push($(this).val());
    //         }
    //     });
    //     filterGenre = genres.toString();
    //     console.log('filterGenre', filterGenre);

        // $.ajax({
        //     type: 'GET',
        //     url: '',
        //     data: 'genre='+filterGenre,
        //     success: function(response) {
        //         console.log('response', response);
                
        //     }
        // });


    // });
});



// $('input[type="checkbox"]').on('change', function(e){
//     var data = $('input[type="checkbox"]').serialize(),
//         loc = $('<a>', {href:window.location})[0];
//     $.post('/ajax-post-url/', data);
//     if(history.pushState){
//         history.pushState(null, null, loc.pathname+'?'+data);
//     }
// });