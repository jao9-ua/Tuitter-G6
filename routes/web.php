<?php

use App\Http\Controllers\HiloController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MicontroladorHilo;

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

Route::view('/main', 'main');

//GET -> recuperacion de datos
Route::get('/tuits', 'TuitController@index')->name('tuits.index');
Route::get('/tuits/{id}', 'TuitController@show')->name('tuits.show');
Route::get('/hilos', 'HiloController@index')->name('hilos.index');
Route::get('/hilos/{id}', 'HiloController@show')->name('hilos.show');
//Route::get('usuarios/{id}/tuits', 'SearchController@index-xxxx')->name('usertuits.index');
Route::get('/categorias', 'CategoriaController@index')->name('categorias.index');
Route::get('/eventos', 'EventoController@index')->name('eventos.index');
Route::get('/eventos/{texto}/{fecha?}', 'EventoController@search')->name('eventos.busqueda');
Route::get('/usuarios', 'UsuarioController@index')->name('usuarios.index');
Route::get('/usuarios/{id}', 'UsuarioController@show')->name('usuarios.show');
Route::get('/eventos/{id}/editar', 'EventoController@edit')->name('eventos.edit');
Route::get('/usuarios/{id}/editar', 'UsuarioController@edit')->name('usuarios.edit');

//POST -> envia datos y crea nuevo recurso
Route::post('/eventos', 'EventoController@store')->name('eventos.store');
Route::post('/categorias', 'CategoriaController@store')->name('categorias.store');
Route::post('/usuarios', 'UsuarioController@store')->name('usuario.store');
Route::post('/hilos', 'HiloController@store')->name('hilo.store');
Route::post('/hilos/{id}/tuits', 'TuitController@store')->name('tuit.store');

//PUT -> envia datos y actualiza un recurso
Route::put('/categorias/{id}', 'CategoriaController@update')->name('categorias.update');
Route::put('/eventos/{id}', 'EventoController@update')->name('eventos.update');
Route::put('/usuarios/{id}', 'UsuarioController@update')->name('usuario.update');
Route::put('/hilos/{id}', 'HiloController@update')->name('hilo.update');
//Route::put('/hilos/{id}/tuits/{id}', 'TuitController@update')->name('tuit.update');
Route::put('/eventos/{id}', 'EventoController@update')->name('eventos.update');
Route::put('/usuarios/{id}', 'UsuarioController@update')->name('usuarios.update');

//DELETE -> elimina un recurso
Route::delete('/eventos/{id}', 'EventoController@destroy')->name('eventos.destroy');
Route::delete('/tuits/{id}', 'TuitController@destroy')->name('tuits.destroy');
Route::delete('/hilos/{id}', 'HiloController@destroy')->name('hilos.destroy');






