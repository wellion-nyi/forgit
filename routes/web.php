<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//for post

Route::get('/post', 'PostController@index')->name('post');

//real for post
Route::get('/create', 'PostController@create')->name('create');
Route::post('/posts', 'PostController@store')->name('forpost');


//for edit
Route::get('/edit/{id}', 'PostController@edit')->name('edit');
Route::post('/edit/{id}', 'PostController@update')->name('update');


//for show
Route::get('/show/{id}', 'PostController@show')->name('show');



//for delete
Route::get('/delete/{id}', 'PostController@destroy')->name('delete');




//category controller

Route::get('/category', 'CategoryController@create')->name('catcreate');
Route::post('/category', 'CategoryController@store')->name('catstore');


//for category edit
Route::get('/catedit/{id}', 'CategoryController@edit')->name('catedit');
Route::post('/catedit/{id}', 'CategoryController@update')->name('catupdate');

//for category delete
Route::get('/catdelete/{id}', 'CategoryController@destroy')->name('catdelete');


//for Admin Only
Route::get('/admin/{id}', 'UserController@showuser')->name('foruser');




//for image

Route::get('/image', 'ImageController@create')->name('imgcreate');
Route::post('/image', 'ImageController@store')->name('imgstore');






