<?php

use App\Http\Controllers\PagesController;
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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/index','PagesController@index');
Route::get('/about','PagesController@about');
Route::get('/services','PagesController@services');
Route::get('/show/{id}','PagesController@show');

//CRUD
Route::get('/create','PagesController@create');
Route::post('/saveproduct','PagesController@saveproduct');
Route::get('show/edit/{id}','PagesController@editproduct');
Route::post('/updateproduct','PagesController@updateproduct');
Route::get('show/delete/{id}','PagesController@deleteproduct');

Route::resource('products','ProductController');


/*
Route::get('/index', function () {
    return view('pages.index');
});
Route::get('/about/{name}/{id}', function ($name,$id) {
    //return view('pages.about');

    return '<h1>My name is'.$name.'. I live in Kota Bharu and my id is '.$id;
});
Route::get('/services', function () {
    return view('pages.services');
});*/
