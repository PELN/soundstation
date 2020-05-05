<?php

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

Route::get('/', 'PagesController@index')->name('pagescontroller');
Route::get('/about', 'PagesController@about')->name('pagescontroller');

// Route::get('/category', 'CategoryController@index')->name('category.index');
Route::get('/category/{slug}', 'CategoryController@show')->name('category.show');

Route::get('/product/{slug}', 'CategoryController@detail')->name('category.detail');

// Route::get('detailPage/{slug}', function($slug){
//     $result =   DB::table('campains')->where('slug', $slug)->get(); 
//     // .... call controller etc...
// });



Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
