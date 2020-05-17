const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

// mix.copyDirectory('resources/backend', 'public/backend');
mix.copyDirectory('resources/frontend', 'public/frontend');

mix.sass('resources/frontend/scss/app.scss', 'public/frontend/css')
    .sass('resources/frontend/scss/base/base.scss', 'public/frontend/css');

// mix.js('resources/frontend/js/app.js', 'public/js')
//     .js('resources/frontend/js/components/ajaxFilter.js', 'public/js')
//     .js('resources/frontend/js/components/ajaxSearch.js', 'public/js')
//     .sass('resources/frontend/scss/app.scss', 'public/css');

