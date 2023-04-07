<?php

use App\Http\Controllers\HiloController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\EventoController;
use App\Http\Controllers;

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


//Route::get('/', 'HiloController@getHilos')->name('hilos.index');
Route::get('/', function () {
    return view('crearObjetos.usuario');
});


Route::get('/boton1', [HiloController::class, 'index'])->name('boton1');
Route::get('/boton2', [BotonesController::class, 'mostrarBoton1'])->name('boton2');
Route::get('/boton3', [BotonesController::class, 'mostrarBoton1'])->name('boton3');
Route::get('/boton4', [BotonesController::class, 'mostrarBoton1'])->name('boton4');

//GET -> recuperacion de datos
Route::get('/tuits', 'TuitController@index')->name('tuits.index');
Route::get('/tuits/{id}', 'TuitController@show')->name('tuits.show');
Route::get('/hilos', [HiloController::class, 'index'])->name('hilos.index');
Route::get('/hilos/{id}', 'HiloController@show')->name('hilos.show');
Route::get('/categorias', 'CategoriaController@index')->name('categorias.index');
Route::get('/eventos', [EventoController::class, 'index'])->name('eventos.index');
Route::get('/eventos/{evento}', [EventoController::class, 'show'])->name('eventos.show');
Route::get('/usuarios', 'UsuarioController@index')->name('usuarios.index');
Route::get('/usuarios/{id}',[UsuarioController::class, 'show'])->name('usuario.show');
Route::get('/eventos/{id}/editar', 'EventoController@edit')->name('eventos.edit');
Route::get('/usuarios/{id}/editar',[UsuarioController::class, 'edit'])->name('usuarios.edit');
Route::get('/usuarios', [UsuarioController::class, 'index'])->name('usuarios.index');
Route::get('/usuarios/filtrar', [UsuarioController::class, 'filtrar'])->name('usuarios.filtrar');

//POST -> envia datos y crea nuevo recurso
Route::post('/evento', [EventoController::class, 'store'])->name('evento.store');
Route::post('/categorias', 'CategoriaController@store')->name('categorias.store');
Route::post('/usuarios',[UsuarioController::class, 'store'])->name('usuario.store');
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
Route::delete('/usuarios/{id}',[UsuarioController::class, 'destroy'])->name('usuario.destroy');






