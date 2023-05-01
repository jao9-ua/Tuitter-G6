<?php

use App\Http\Controllers\HiloController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\CategoriaController;
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
    return view('layouts.master');
});


Route::get('/boton1', [HiloController::class, 'index'])->name('boton1');
Route::get('/boton2', [BotonesController::class, 'mostrarBoton1'])->name('boton2');
Route::get('/boton3', [BotonesController::class, 'mostrarBoton1'])->name('boton3');
Route::get('/boton4', [BotonesController::class, 'mostrarBoton1'])->name('boton4');

//GET -> recuperacion de datos
Route::view('/crearevento', 'crearObjetos.evento');
Route::view('/crearusuario', 'crearObjetos.usuario');
Route::view('/modificarrevento', 'modificarObjetos.evento');
Route::view('/modificarusuario', 'modificarObjetos.usuario');




//Rutas tuits
Route::get('/tuits', 'TuitController@index')->name('tuits.index');
Route::get('/tuits/{id}', 'TuitController@show')->name('tuits.show');
Route::delete('/tuits/{id}', 'TuitController@destroy')->name('tuits.destroy');


//Rutas hilos
Route::get('/hilos', [HiloController::class, 'index'])->name('hilos.index');
Route::get('/hilos/{id}', 'HiloController@show')->name('hilos.show');
Route::post('/hilos', 'HiloController@store')->name('hilo.store');
Route::post('/hilos/{id}/tuits', 'TuitController@store')->name('tuit.store');
Route::put('/hilos/{id}', 'HiloController@update')->name('hilo.update');
Route::delete('/hilos/{id}', 'HiloController@destroy')->name('hilos.destroy');


//Rutas categorias
Route::get('/categorias', [CategoriaController::class, 'index'])->name('categorias.index');
Route::post('/categorias', 'CategoriaController@store')->name('categorias.store');
Route::put('/categorias/{id}', 'CategoriaController@update')->name('categorias.update');


//Rutas eventos
Route::get('/eventos', [EventoController::class, 'index'])->name('eventos.index');
Route::get('/eventos/{evento}', [EventoController::class, 'show'])->name('eventos.show');
Route::get('/eventos/{id}/editar', 'EventoController@edit')->name('eventos.edit');
Route::post('/evento', [EventoController::class, 'store'])->name('evento.store');
Route::put('/eventos/{id}', 'EventoController@update')->name('eventos.update');
Route::delete('/eventos/{id}',[EventoController::class, 'destroy'])->name('evento.destroy');


//Rutas usuarios
Route::get('/usuarios/{id}/editar',[UsuarioController::class, 'edit'])->name('usuarios.edit');
Route::get('/usuarios', [UsuarioController::class, 'index'])->name('usuarios.index');
Route::get('/usuarios/filtrar', [UsuarioController::class, 'filtrar'])->name('usuarios.filtrar');
Route::get('/usuarios/{id}',[UsuarioController::class, 'show'])->name('usuarios.show');
Route::post('/usuarios',[UsuarioController::class, 'store'])->name('usuario.store');
Route::put('/usuarios', [UsuarioController::class, 'update'])->name('usuario.update');
Route::delete('/usuarios/{id}',[UsuarioController::class, 'destroy'])->name('usuario.destroy');

