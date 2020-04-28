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

//Route::get('/', 'IndexController@index');
Route::get('/gallery', 'GalleryController@index');
Route::get('/openmusic', 'OpenmusicController@index');
Route::get('/', 'OpenmusicController@index');
Route::post('uploadFile', 'IndexController@uploadFile');
Route::get('/{kode}', 'IndexController@playMusic');
Route::get('/test/test', 'IndexController@test');
