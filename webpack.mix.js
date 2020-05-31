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

mix.copyDirectory('resources/frontend', 'public/frontend');

mix.js('resources/frontend/js/app.js', 'public/frontend/js')
 .sass('resources/frontend/scss/app.scss', 'public/frontend/css');

