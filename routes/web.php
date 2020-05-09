<?php
if(version_compare(PHP_VERSION, '7.2.0', '>=')) {
    error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
}

use Illuminate\Support\Facades\Route;

require 'admin.php';

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'PagesController@index')->name('pages.index');
Route::get('/about', 'PagesController@about')->name('pages.about');


Route::get('/{slug}', 'CategoryController@show')->name('category.show')->where('slug', '[\w\d\-\_]+');
// Route::get('/{}', 'CategoryController@filter')->name('category.filter');

Route::get('/{category}/{slug}', 'ProductController@show')->name('product.show');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
