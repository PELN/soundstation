require('./bootstrap');

$(document).ready(function() {

    $('.genre').click(function(){
        // if checked, add to genres
        const genres = [];
        $('.genre').each(function() {
            if($(this).is(':checked')){
                genres.push($(this).val());
            };
        });
        const genreValue = genres.toString();
        // console.log(genreValue);

        addUrlParam(document.location.search, 'genre', genreValue);

        // if unchecked, remove
        if(!$(this).is(':checked')){
            // console.log('UN-checked');
            // if there are more than one genre, remove a value from param
            if(genres.length > 0)
                removeUrlValue(document.location.search, genreValue, ',');
                // $('.results').hide();
            else { // remove whole param
                replaceUrlParam();
            };
        };
    });

    $('.condition').click(function(){
        if($(this).is(':checked')){
            const conditionValue = ($(this).val());
            // if url already has condition param, dont add it again
            //https://stackoverflow.com/questions/1314383/how-to-check-if-a-query-string-value-is-present-via-javascript
            const urlParams = new URLSearchParams(window.location.search);
            const conditionParam = urlParams.get('condition');
            if (conditionParam != conditionValue) {
                addUrlParam(document.location.search, 'condition', conditionValue);
            };
        };
    });

    $('.remove-filter').click(function() {
        console.log('clicked remove');
    });

    // $('input[type="checkbox"]').click(function() {
    //     var inputValue = $(this).attr("value");
    //     $("." + inputValue).toggle();
    //     console.log('input value toggle', inputValue);
    // }); 

      
    // * add a URL parameter (or changing it if it already exists)
    // * @param {url} string  this is typically document.location.search
    // * @param {key}    string  the key to set
    // * @param {value}    string  value
    // https://stackoverflow.com/questions/486896/adding-a-parameter-to-the-url-with-javascript?page=1&tab=votes#tab-top
    var addUrlParam = function(url, key, value){
        var newParam = key + '=' + value,
            params = '?' + newParam;
    
        // If the "search" string exists, then build params from it
        if (url) {
            // Try to replace an existance instance
            params = url.replace(new RegExp('([\?&])' + key + '[^&]*'), '$1' + newParam);
        
            // If nothing was replaced, then add the new param to the end
            if (params === url) {
                params += '&' + newParam;
            };
        };
        // console.log('add param', params);

        const urlWithParams = window.location.protocol + "//" + window.location.host + window.location.pathname + params;
        window.history.pushState({path:urlWithParams},'',urlWithParams);

        // Get data to send with ajax
        // https://stackoverflow.com/questions/8648892/how-to-convert-url-parameters-to-a-javascript-object
        const paramsObj = Object.fromEntries(new URLSearchParams(location.search));
        paramsObj.pathName = window.location.pathname.replace(/\//g, "");
        console.log(paramsObj);

        ajaxFunc(paramsObj);
    };

    // remove data
    // show loader
    // show new data
    function removeProducts() {
        $('#filterResult .row').empty();
    }

    function ajaxFunc(paramsObj) {
        $.ajax({
            type: 'GET',
            url: 'ajaxFilter',
            data: paramsObj,
            dataType: 'JSON',
            beforeSend: function() {
                $("#loaderDiv").show();
            },
            // contentType: 'application/json; charset=utf-8',
        }).done(function (response) {
            console.log('response from controller', response);
            
            removeProducts();
            $("#loaderDiv").hide();

            for (let product of response) {
                $('#filterResult .row').append(
                    // '<div class="row">' +
                        '<div class="col-md-4">' +
                            '<a href=" '+ product.category_slug + '/' + product.slug +' ">' +
                                '<figure class="card card-product-grid">' +
                                    '<div class="img-wrap">' +
                                    ( product.path ? 
                                            '<img src="/storage/'+ product.path +'")>'
                                        : 
                                            '<img src="/storage/image-coming-soon.jpg">' 
                                        ) +
                                    '</div>' +
                                    '<figcaption class="info-wrap">' +
                                        '<div class="fix-height">' +
                                            '<a href="#" class="title"> ' + product.name + ' </a>' +
                                            '<div class="price-wrap mt-2">' +
                                                '<span class="price"> ' + product.price + ' </span>' +
                                            '</div>' +
                                        '</div>' +
                                        '<a href="#" class="btn btn-block btn-primary">Add to cart </a>' +
                                    '</figcaption>' +
                                '</figure>' +
                            '</a>' +
                        '</div>'
                );
            }
            
        }).fail(function (err) {
            console.log('error', err);
        });
    }


    // remove a value from an array in URL by comma
    // https://stackoverflow.com/questions/1306164/remove-value-from-comma-separated-values-string
    var removeUrlValue = function(url, value, separator) {
        separator = separator || ",";
        var values = url.split(separator);
        for(var i = 0 ; i < values.length ; i++) {
          if(values[i] == value) {
            values.splice(i, 1);
            return values.join(separator);
          };
        };
        console.log('remove value', url);
        // return url;
      };
    
    
    // remove a param from URL - if unchecked
    // https://stackoverflow.com/questions/7171099/how-to-replace-url-parameter-with-javascript-jquery/7171293#7171293
    function replaceUrlParam()
    {
        // if url has condition param, don't remove it
        const urlParams = new URLSearchParams(window.location.search);
        const conditionParam = urlParams.get('condition');
        if (conditionParam) {
            const removeGenreParam = window.location.protocol + "//" + window.location.host + window.location.pathname + '?condition' + '=' + conditionParam;
            history.replaceState({path:removeGenreParam}, '', removeGenreParam);
        } else { // else remove whole genre param
            const removeParam = window.location.protocol + "//" + window.location.host + window.location.pathname;
            history.replaceState({path:removeParam}, '', removeParam);
        };
    };
});

