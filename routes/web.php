<?php

use App\Http\Controllers\HiloController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\TuitController;
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

//crearObjetos, conforme se añadan botones ir borrando estas rutas
Route::view('/crearevento', 'crearObjetos.evento');
Route::view('/crearusuario', 'usuarios.crear');
Route::view('/crearcategoria', 'categorias.crear');
Route::view('/crearhilo', 'hilos.crear');
Route::view('/modificarrevento', 'modificarObjetos.evento');
Route::view('/modificarusuario', 'modificarObjetos.usuario');


//Rutas tuits
Route::get('/tuits', 'TuitController@index')->name('tuits.index');
Route::get('/tuits/{id}/show', [TuitController::class, 'show'])->name('tuits.show');
Route::delete('/tuits/{id}', 'TuitController@destroy')->name('tuits.destroy');
Route::get('/hilos/{idHilo}/tuits/create', [TuitController::class, 'create'])->name('tuits.create');
Route::post('/tuits', [TuitController::class, 'store'])->name('tuits.store');
Route::get('/tuits/crear/{hilo}', [TuitController::class, 'crear'])->name('tuits.crear');

//Rutas hilos
Route::get('/hilos', [HiloController::class, 'index'])->name('hilos.index');
Route::get('/hilos/{id}/show', [HiloController::class, 'show'])->name('hilos.show');
Route::post('/hilos', [HiloController::class, 'store'])->name('hilo.store');
Route::post('/hilos/{id}/tuits', [HiloController::class, 'store'])->name('tuit.store');
Route::put('/hilos/{id}', 'HiloController@update')->name('hilo.update');
Route::delete('/hilos/{id}', 'HiloController@destroy')->name('hilos.destroy');
Route::get('/hilo/crear', [HiloController::class, 'crear'])->name('hilo.crear');

//Rutas categorias
Route::get('/categorias', [CategoriaController::class, 'index'])->name('categorias.index');
Route::get('/categorias/{id}/show', [CategoriaController::class, 'show'])->name('categorias.show');
Route::post('/categorias', [CategoriaController::class, 'store'])->name('categorias.store');
Route::put('/categorias/{id}', 'CategoriaController@update')->name('categorias.update');
Route::get('/categorias/crear', [CategoriaController::class, 'crear'])->name('categorias.crear');


//Rutas eventos
Route::get('/eventos', [EventoController::class, 'index'])->name('eventos.index');
Route::get('/eventos/ordenar/{sort}', [EventoController::class, 'ordenar'])->name('eventos.ordenar');
Route::get('/eventos/{id}/show', [EventoController::class, 'show'])->name('eventos.show');
Route::get('/eventos/{id}/editar', [EventoController::class, 'edit'])->name('eventos.edit');
Route::post('/evento', [EventoController::class, 'store'])->name('evento.store');
Route::put('/eventos/{id}', [EventoController::class, 'update'])->name('evento.update');
Route::delete('/eventos/{id}',[EventoController::class, 'destroy'])->name('evento.destroy');
Route::get('/eventos/crear', [EventoController::class, 'crear'])->name('eventos.crear');
Route::get('/eventos/usuario/{usuarioID}', [EventoController::class, 'eventosUsuario'])->name('eventos.eventosUsuario');

//Rutas usuarios
Route::get('/usuarios/{id}/editar',[UsuarioController::class, 'edit'])->name('usuarios.edit');
Route::get('/usuarios', [UsuarioController::class, 'index'])->name('usuarios.index');
Route::get('/usuarios/ordenar/{sort}', [UsuarioController::class, 'ordenar'])->name('usuarios.ordenar');
Route::get('/usuarios/filtrar', [UsuarioController::class, 'filtrar'])->name('usuarios.filtrar');
Route::get('/usuarios/{id}/show',[UsuarioController::class, 'show'])->name('usuarios.show'); //->middleware('auth.basic');
Route::post('/usuarios',[UsuarioController::class, 'store'])->name('usuario.store');
Route::put('/usuarios', [UsuarioController::class, 'update'])->name('usuario.update');
Route::delete('/usuarios/{id}',[UsuarioController::class, 'destroy'])->name('usuario.destroy');

