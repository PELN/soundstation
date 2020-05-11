require('./bootstrap');

$(document).ready(function() {

    $('.genre').click(function(){
        // if checked, add to genres
        var genres = [];

        $('.genre').each(function() {
            if($(this).is(':checked')){
                genres.push($(this).val());
            }
        });
        genreToken = genres.toString();
        console.log(genreToken);
        addUrlParam(document.location.search, 'genre', genreToken);

        // if unchecked, remove
        if(!$(this).is(':checked')){
            console.log('UN-checked');
            if(genres.length > 0)
                // if there are more than one genre, remove a value from param
                removeUrlValue(document.location.search, genreToken, ',');
            else {
                // remove whole param
                replaceUrlParam(window.location.protocol + "//" + window.location.host + window.location.pathname, 'genre', genreToken);
            };
        };
    });


    $('.condition').click(function(){
        
        if($(this).is(':checked')){
            conditionToken = ($(this).val());
        };

        // if url already has condition param, dont add it again
        //https://stackoverflow.com/questions/1314383/how-to-check-if-a-query-string-value-is-present-via-javascript
        var urlParams = new URLSearchParams(window.location.search);
        var conditionParam = urlParams.get('condition');
        if (conditionParam != conditionToken) {
            addUrlParam(document.location.search, 'condition', conditionToken);
        }
    });


    // AJAX   
    // $.ajax({
    //     type: 'GET',
    //     url: '',
    //     data: 'genre='+filterGenre,
    //     success: function(response) {
    //         console.log('response', response);
            
    //     }
    // });



    // * add a URL parameter (or changing it if it already exists)
    // * @param {url} string  this is typically document.location.search
    // * @param {key}    string  the key to set
    // * @param {val}    string  value
    // https://stackoverflow.com/questions/486896/adding-a-parameter-to-the-url-with-javascript?page=1&tab=votes#tab-top
    var addUrlParam = function(url, key, val){
        var newParam = key + '=' + val,
            params = '?' + newParam;
    
        // If the "search" string exists, then build params from it
        if (url) {
            // Try to replace an existance instance
            params = url.replace(new RegExp('([\?&])' + key + '[^&]*'), '$1' + newParam);
        
            // If nothing was replaced, then add the new param to the end
            if (params === url) {
                params += '&' + newParam;
            }
        }
        console.log('add param', params);

        var newurl = window.location.protocol + "//" + window.location.host + window.location.pathname + params;
        window.history.pushState({path:newurl},'',newurl);
        // return params;
    };

    // remove a value from an array in URL by comma
    // https://stackoverflow.com/questions/1306164/remove-value-from-comma-separated-values-string
    var removeUrlValue = function(url, value, separator) {
        separator = separator || ",";
        var values = url.split(separator);
        for(var i = 0 ; i < values.length ; i++) {
          if(values[i] == value) {
            values.splice(i, 1);
            return values.join(separator);
          }
        }
        console.log('remove value',url);
        return url;
      }
    
    // remove a param from URL - if unchecked
    // https://stackoverflow.com/questions/7171099/how-to-replace-url-parameter-with-javascript-jquery/7171293#7171293
    function replaceUrlParam(url, key, value)
    {
        if (value == null) {
            value = '';
        }
        var pattern = new RegExp('\\b('+key+'=).*?(&|#|$)');
        if (url.search(pattern)>=0) {
            return url.replace(pattern,'$1' + value + '$2');
        }
        url = url.replace(/[?#]$/,'');
        console.log('replace url', url);
        
        // if url has condition param, don't remove it
        var params = new URLSearchParams(window.location.search);
        var param = params.get('condition');
        if (param) {
            var removeUrlButCondition = window.location.protocol + "//" + window.location.host + window.location.pathname + '?condition' + '=' + param;
            history.replaceState({path:removeUrlButCondition},'',removeUrlButCondition);
        } else { // else remove whole genre param
            var removeUrl = window.location.protocol + "//" + window.location.host + window.location.pathname;
            history.replaceState({path:removeUrl},'',url);
        }
    }
});

