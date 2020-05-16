/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 1);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/frontend/js/ajaxFilter.js":
/*!*********************************************!*\
  !*** ./resources/frontend/js/ajaxFilter.js ***!
  \*********************************************/
/*! no static exports found */
/***/ (function(module, exports) {

// require('../../js/bootstrap');
// $(document).ready(function() {
$('.genre').click(function () {
  // if checked, add to genres
  var genres = [];
  $('.genre').each(function () {
    if ($(this).is(':checked')) {
      genres.push($(this).val());
    }

    ;
  });
  var genreValue = genres.toString();
  localStorage.setItem("genres", JSON.stringify(genres));
  addUrlParam(document.location.search, 'genre', genreValue); // if unchecked, remove

  if (!$(this).is(':checked')) {
    // if there is more than one genre, remove a value from param
    if (genres.length > 0) {
      removeUrlValue(document.location.search, genreValue, ',');
    } else {
      // remove whole param
      removeLastParamKey();
    }

    ;
  }

  ;
});
$('.condition').click(function () {
  if ($(this).is(':checked')) {
    var conditionValue = $(this).val(); // if url already has condition param, dont add it again
    //https://stackoverflow.com/questions/1314383/how-to-check-if-a-query-string-value-is-present-via-javascript

    var _urlParams = new URLSearchParams(window.location.search);

    var conditionParam = _urlParams.get('condition');

    if (conditionParam != conditionValue) {
      localStorage.setItem("condition", conditionValue);
      addUrlParam(document.location.search, 'condition', conditionValue);
    }

    ;
  }

  ;
});
$('#sort-by').on('change', function (e) {
  var selectedValue = $("#sort-by option:selected").val();
  localStorage.setItem("sort", selectedValue);
  addUrlParam(document.location.search, 'sort', selectedValue);
}); // ***** LOCAL STORAGE *****
// check the values that are stored in local storage 

var storedGenres = JSON.parse(localStorage.getItem("genres"));

if (storedGenres !== null) {
  // tick checkboxes for each value
  storedGenres.forEach(function (value) {
    $('input[value="' + value + '"]').prop('checked', true);
  });
} // check the value that is stored in local storage 


var storedCondition = localStorage.getItem("condition");

if (storedCondition !== null) {
  $('input[value="' + storedCondition + '"]').prop('checked', true);
} // select the value that is stored in local storage 


var storedSort = localStorage.getItem("sort");

if (storedSort !== null) {
  $('option[value="' + storedSort + '"]').prop('selected', true);
} // if url doesn't have parameters - uncheck all/set default values


var urlParams = new URLSearchParams(window.location.search);

if (urlParams == "") {
  localStorage.removeItem('genres');
  localStorage.removeItem('condition');
  $('.genre').prop('checked', false);
  $('input[value="any"]').prop('checked', true);
} // * add a URL parameter (or changing it if it already exists)
// * @param {url} string  this is typically document.location.search
// * @param {key}    string  the key to set
// * @param {value}    string  value
// https://stackoverflow.com/questions/486896/adding-a-parameter-to-the-url-with-javascript?page=1&tab=votes#tab-top


var addUrlParam = function addUrlParam(url, key, value) {
  var newParam = key + '=' + value,
      params = '?' + newParam; // If the "search" string exists, then build params from it

  if (url) {
    // Try to replace an existance instance
    params = url.replace(new RegExp('([\?&])' + key + '[^&]*'), '$1' + newParam); // If nothing was replaced, then add the new param to the end

    if (params === url) {
      params += '&' + newParam;
    }

    ;
  }

  ;
  var urlWithParams = window.location.protocol + "//" + window.location.host + window.location.pathname + params;
  window.history.pushState({
    path: urlWithParams
  }, '', urlWithParams); // Get data to send with ajax
  // https://stackoverflow.com/questions/8648892/how-to-convert-url-parameters-to-a-javascript-object

  var paramsObj = Object.fromEntries(new URLSearchParams(location.search));
  paramsObj.pathName = window.location.pathname.replace(/\//g, ""); // add pathName/category to obj

  var searchParams = new URLSearchParams(window.location.search);
  var param = searchParams.get('sort'); // add sort to obj

  paramsObj.sort = param;
  ajaxFunc(paramsObj);
}; // remove data -> show loader -> show new data


function removeProducts() {
  $('#filter-result .row').empty();
}

$('#loader').hide(); // hide loader if no filter has been set

$('#filteredCount').hide(); // hide filtered count if no filter has been set

function ajaxFunc(paramsObj) {
  $.ajax({
    type: 'GET',
    url: 'ajaxFilter',
    data: paramsObj,
    dataType: 'JSON',
    beforeSend: function beforeSend() {
      $("#loader").show();
    } // contentType: 'application/json; charset=utf-8',

  }).done(function (response) {
    // console.log('response from controller', response);
    var paginator = response.paginator.replace(/ajaxFilter/g, response.slug);
    $('#pagination').children().remove();
    $('#pagination').append(paginator); // remove data

    removeProducts();
    $("#loader").hide();

    if (response.data.length === 0) {
      $('#all-products').show();
    } else {
      $('#all-products').hide();
    } // redirect to page 1 if no results match


    if (response.data.length === 0) {
      setGetParameter('page', '1'); // $('#pagination').children().remove();
      // $('#filter-result .row').append(
      //     '<div>' +
      //         '<h1>No results match</h1>' +
      //     '</div>'
      // )
    } // count filtered products


    if (!response.data.total == "undefined") {
      $('#filteredCount').text(response.data.total + ' Products found');
    }

    $('#filteredCount').show();
    $('#categoryCount').hide(); // TODO: FIX - why does it refresh page on clicks?

    $('#filter-result .row').html(response.data); // render data in product-listing blade
  }).fail(function (err) {
    console.log('error', err);
  });
} // redirect to page 1 if product filters are empty


function setGetParameter(paramName, paramValue) {
  var url = window.location.href;
  var hash = location.hash;
  url = url.replace(hash, '');

  if (url.indexOf(paramName + "=") >= 0) {
    var prefix = url.substring(0, url.indexOf(paramName + "="));
    var suffix = url.substring(url.indexOf(paramName + "="));
    suffix = suffix.substring(suffix.indexOf("=") + 1);
    suffix = suffix.indexOf("&") >= 0 ? suffix.substring(suffix.indexOf("&")) : "";
    url = prefix + paramName + "=" + paramValue + suffix;
  } else {
    if (url.indexOf("?") < 0) url += "?" + paramName + "=" + paramValue;else url += "&" + paramName + "=" + paramValue;
  }

  $('#loader').show();
  window.location.href = url + hash;
} // remove a value from an array in URL by comma
// https://stackoverflow.com/questions/1306164/remove-value-from-comma-separated-values-string


var removeUrlValue = function removeUrlValue(url, value, separator) {
  separator = separator || ",";
  var values = url.split(separator);

  for (var i = 0; i < values.length; i++) {
    if (values[i] == value) {
      values.splice(i, 1);
      return values.join(separator);
    }

    ;
  }

  ;
  console.log('remove value', url); // return url;
}; // remove a param from URL - if unchecked
// https://stackoverflow.com/questions/7171099/how-to-replace-url-parameter-with-javascript-jquery/7171293#7171293


function removeLastParamKey() {
  // if url has condition param, don't remove it
  var urlParams = new URLSearchParams(window.location.search);
  var conditionParam = urlParams.get('condition');

  if (conditionParam) {
    var removeGenreParam = window.location.protocol + "//" + window.location.host + window.location.pathname + '?condition' + '=' + conditionParam;
    history.replaceState({
      path: removeGenreParam
    }, '', removeGenreParam);
  } else {
    // else remove whole genre param
    var removeParam = window.location.protocol + "//" + window.location.host + window.location.pathname;
    history.replaceState({
      path: removeParam
    }, '', removeParam);
  }

  ;
}

; // });

/***/ }),

/***/ 1:
/*!***************************************************!*\
  !*** multi ./resources/frontend/js/ajaxFilter.js ***!
  \***************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /Users/pernillenorskov/laravel/bachelorproject/resources/frontend/js/ajaxFilter.js */"./resources/frontend/js/ajaxFilter.js");


/***/ })

/******/ });