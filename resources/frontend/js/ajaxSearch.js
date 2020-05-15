
$(document).ready(function() {

    $('#txtSearch').on('keyup', function(){

        const query = $('#txtSearch').val();
        console.log(query);

        $.ajax({
            type:"GET",
            url: 'ajaxSearch',
            data: {query: $('#txtSearch').val()},
            success: function(response) {
                console.log(response);

                
                //  response = JSON.parse(response);
                //  for (var patient of response) {
                //      console.log(patient);
                //  }

                // $("#searchResults").html(response);

             }
        });
    });

});

