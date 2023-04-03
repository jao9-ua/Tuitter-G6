<?php

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

Route::get('/tuits', 'TuitController@index')->name('tuits.index');
Route::get('/tuits/create', 'TuitController@create')->name('tuits.create');
//Route::post('/tuits', 'TuitController@store')->name('tuits.store');
Route::get('/tuits/{id}', 'TuitController@show')->name('tuits.show');
//Route::get('/tuits/{id}/edit', 'TuitController@edit')->name('tuits.edit');
Route::delete('/tuits/{id}', 'TuitController@destroy')->name('tuits.destroy');

Route::get('/usuarios', 'UserController@index')->name('usuarios.index');
Route::get('/usuarios/{id}', 'UserController@show')->name('usuarios.show');
//Route::get('/usuarios/{id}/edit', 'UserController@edit')->name('usuarios.edit');

Route::get('/buscar', 'SearchController@index')->name('buscar.index');






