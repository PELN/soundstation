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

        localStorage.setItem("genres", JSON.stringify(genres));
        addUrlParam(document.location.search, 'genre', genreValue);

        // if unchecked, remove
        if(!$(this).is(':checked')){
            // if there is more than one genre, remove a value from param
            if(genres.length > 0) {
                removeUrlValue(document.location.search, genreValue, ',');
            } else { // remove whole param
                removeLastParamKey();
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
                localStorage.setItem("condition", conditionValue);
                addUrlParam(document.location.search, 'condition', conditionValue);
            };
        };
    });

   $('.sort-by').on('change', function(e) {
        const value = e.target.value;
        localStorage.setItem("sort", value);
        addUrlParam(document.location.search, 'sort', value);
   });
    

    // ***** LOCAL STORAGE *****
    // check the values that are stored in local storage 
    const storedGenres = JSON.parse(localStorage.getItem("genres"));
    if(storedGenres !== null ){
        // tick checkboxes for each value
        storedGenres.forEach(function(value) {
            $('input[value="'+ value +'"]').prop('checked', true);
        });
    }
    // check the value that is stored in local storage 
    const storedCondition = localStorage.getItem("condition");
    if(storedCondition !== null) {
        $('input[value="'+ storedCondition +'"]').prop('checked', true);
    }
    // select the value that is stored in local storage 
    const storedSort = localStorage.getItem("sort");
    if(storedSort !== null) {
        $('option[value="'+ storedSort +'"]').prop('selected', true);
    }
    // if url doesn't have parameters - uncheck all/set default values
    const urlParams = new URLSearchParams(window.location.search);
    if (urlParams == ""){
        localStorage.removeItem('genres');
        localStorage.removeItem('condition');
        $('.genre').prop('checked', false);
        $('input[value="any"]').prop('checked', true);
    }
   

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

        const urlWithParams = window.location.protocol + "//" + window.location.host + window.location.pathname + params;
        window.history.pushState({path:urlWithParams},'',urlWithParams);

        // Get data to send with ajax
        // https://stackoverflow.com/questions/8648892/how-to-convert-url-parameters-to-a-javascript-object
        const paramsObj = Object.fromEntries(new URLSearchParams(location.search));
        paramsObj.pathName = window.location.pathname.replace(/\//g, ""); // add pathName/category to obj
        
        const searchParams = new URLSearchParams(window.location.search);
        const param = searchParams.get('sort'); // add sort to obj
        paramsObj.sort = param;

        ajaxFunc(paramsObj);
    };

    // remove data -> show loader -> show new data
    function removeProducts() {
        $('#filter-result .row').empty();
    }
    $('#loader-container').hide(); // hide loader if no filter has been set
    $('.filtered-count').hide(); // hide filtered count if no filter has been set

    function ajaxFunc(paramsObj) {
        $.ajax({
            type: 'GET',
            url: 'ajaxFilter',
            data: paramsObj,
            dataType: 'JSON',
            beforeSend: function() {
                $("#loader-container").fadeIn();
            },
        }).done(function (response) {            
            const paginator = response.paginator.replace(/ajaxFilter/g, response.slug);
            $('#pagination').children().remove();
            $('#pagination').append(paginator);

            // remove data
            removeProducts();
            $("#loader-container").fadeOut();

            if(response.data.length === 0){
                $('#all-products').show(); // show deafult products
                setGetParameter('page', '1'); // redirect to page 1 if no results match
            } else {
                $('#all-products').hide();
            };

            // count filtered products
            $('.filtered-count').text(response.collection.total + ' Products found');
            $('.filtered-count').show();
            $('.category-count').hide();

            $('#filter-result .row').html(response.data); // render data in product-listing blade
            
        }).fail(function (err) {
            console.log('error', err);
        });
    }

    // redirect to page 1 if product filters are empty
    function setGetParameter(paramName, paramValue) {
        var url = window.location.href;
        var hash = location.hash;
        url = url.replace(hash, '');
        if (url.indexOf(paramName + "=") >= 0)
        {
            var prefix = url.substring(0, url.indexOf(paramName + "=")); 
            var suffix = url.substring(url.indexOf(paramName + "="));
            suffix = suffix.substring(suffix.indexOf("=") + 1);
            suffix = (suffix.indexOf("&") >= 0) ? suffix.substring(suffix.indexOf("&")) : "";
            url = prefix + paramName + "=" + paramValue + suffix;
        }
        else
        {
        if (url.indexOf("?") < 0)
            url += "?" + paramName + "=" + paramValue;
        else
            url += "&" + paramName + "=" + paramValue;
        }
        $('#loader').show();
        window.location.href = url + hash;
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
    function removeLastParamKey()
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

