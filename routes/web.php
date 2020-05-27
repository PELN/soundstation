<?php
if(version_compare(PHP_VERSION, '7.2.0', '>=')) {
    error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
}

use Illuminate\Support\Facades\Route;

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

Auth::routes();


Route::get('/admin/home', 'HomeController@adminHome')->name('admin.home')->middleware('is_admin');
Route::get('/home', 'HomeController@userHome')->name('home');

Route::get('/', 'PagesController@index')->name('pages.index');

Route::get('/about', 'PagesController@about')->name('pages.about');
Route::get('/faq', 'PagesController@faq')->name('pages.faq');
Route::get('/grading-guide', 'PagesController@grading')->name('pages.grading');

Route::get('/cart', 'CartController@cart')->name('cart.index');
Route::post('/add', 'CartController@add')->name('cart.store');
Route::post('/update', 'CartController@update')->name('cart.update');
Route::post('/remove', 'CartController@remove')->name('cart.remove');
Route::post('/clear', 'CartController@clear')->name('cart.clear');

Route::get('/ajaxSearch', 'SearchController@ajaxSearch')->name('search.ajaxSearch');
Route::get('/search-result-page', 'SearchController@index')->name('search.index');

Route::get('/ajaxFilter', 'CategoryController@ajaxFilter')->name('category.ajaxFilter');
Route::get('/{slug}', 'CategoryController@show')->name('category.show')->where('slug', '[\w\d\-\_]+');

Route::get('{category}/ajaxSearch', 'SearchController@ajaxSearch')->name('search.ajaxSearch');
Route::get('/{category}/{slug}', 'ProductController@show')->name('product.show');


