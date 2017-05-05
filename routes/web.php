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
    return view('auth.login');
});
Route::get('/profile/{id}','HomeController@profile');

Route::post('/profile','HomeController@update_avatar');

Auth::routes();
Route::get('/home','HomeController@index');

Route::get('/post/novi','HomeController@create');

Route::post('/post/novi','HomeController@store');

Route::get('/post/{id}','HomeController@show');

Route::get('/dest/{id}','HomeController@destroy');

Route::get('/kom/{id}','HomeController@show_kom');

Route::post('/kom/{id}','HomeController@store_kom');

Route::get('post/edit/{id}','HomeController@edit');

Route::post('post/edit/{id}','HomeController@update');
