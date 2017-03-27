<?php

use App\Kategorija;

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



Route::resource('kategorija', 'News\KategorijaController');

Route::resource('clanak','News\ClanakController');

Route::get('/komentar/create/{clanak}', ['as' => 'komentar.create', 'uses' => 'News\KomentarController@create']);

Route::post('/komentar', ['as'=>'komentar.store', 'uses'=>'News\KomentarController@store'] );
Route::get('/komentar/{komentar}/edit',['as'=>'komentar.edit', 'uses'=>'News\KomentarController@edit']);
Route::delete('/komentar/{komentar}',['as'=>'komentar.destroy', 'uses'=>'News\KomentarController@destroy']);
Route::put('/komentar/{komentar}',['as'=>'komentar.update','uses'=>'News\KomentarController@update']);

Route::get('/home', 'News\ClanakController@index');


