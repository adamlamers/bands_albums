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

Route::get('/', 'BandController@doList');
Route::post('/band/save', 'BandController@save');
Route::get('/band/create', 'BandController@create');
Route::get('/band/{id}/delete', 'BandController@delete');
Route::get('/band/{id}/edit', 'BandController@edit');

Route::get('/albums', 'AlbumController@doList');
Route::post('/album/save', 'AlbumController@save');
Route::get('/album/create', 'AlbumController@create');
Route::get('/album/{id}/delete', 'AlbumController@delete');
Route::get('/album/{id}/edit', 'AlbumController@edit');

Auth::routes();

Route::get('/home', 'HomeController@index');
