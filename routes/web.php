<?php

use App\Http\Controllers\HiloController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\TuitController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

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

//Solo para cuando inicie sesión
Route::get('/cosas', [UsuarioController::class, 'inicio'])->name('inicio');

//Route::get('/', 'HiloController@getHilos')->name('hilos.index');
Route::get('/', function () { return view('layouts.master');
});

//Route::get('/', [NotificationController::class, 'index'])->name('inicio');
//MAIL
Route::get('/contacto', function () {
    return view('email');
})->name('contacto'); //Esta ruta la ponemos en la raiz para que nada mas ejecutar nuestra aplicación aparezca nuestro formulario

Route::get('markAsRead', function(){
    auth()->user()->unreadNotifications->markAsRead();
    return redirect()->back();
})->name('markAsRead');

// Login
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate'])->name('auth.authenticate');

// Register
Route::get('/register', [AuthController::class, 'register'])->name('auth.register');
Route::post('/register', [AuthController::class, 'store'])->name('auth.store');

// Logout
//Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');

Route::get('/logout',[UsuarioController::class,'logout'])->name('logout')->middleware('auth');

//SOBRENOSOTROS
Route::get('/Acerca', function () {
    return view('Acerca');
})->name('/Acerca');
Route::get('/', [HiloController::class, 'listarHilos'])->name('home')->defaults('orden', 'fecha');


Route::get('/Contacto', function () {
    return view('Contacto');
})->name('/Contacto');


Route::get('/boton2', [BotonesController::class, 'mostrarBoton1'])->name('boton2');
Route::get('/boton3', [BotonesController::class, 'mostrarBoton1'])->name('boton3');
Route::get('/boton4', [BotonesController::class, 'mostrarBoton1'])->name('boton4');

//crearObjetos, conforme se añadan botones ir borrando estas rutas
Route::view('/crearusuario', 'usuarios.crear');
Route::view('/modificarrevento', 'modificarObjetos.evento');
Route::view('/modificarusuario', 'modificarObjetos.usuario');


//Rutas tuits
    Route::get('/tuits/{id}/show', [TuitController::class, 'show'])->name('tuits.show');
    Route::middleware('auth')->group(function() {
    Route::get('/tuits', 'TuitController@index')->name('tuits.index');
    Route::get('/hilos/{idHilo}/tuits/create', [TuitController::class, 'create'])->name('tuits.create');
    Route::post('/tuits', [TuitController::class, 'store'])->name('tuits.store');
    Route::get('/tuits/crear/{hilo}', [TuitController::class, 'crear'])->name('tuits.crear');
    Route::get('/tuits/usuario/{usuarioID}', [TuitController::class, 'index'])->name('tuits.tuitsUsuario'); //modificar 'index' a 'tuitsUsuario'
    Route::delete('/tuits/{id}', 'TuitController@destroy')->name('tuits.destroy');
});


//Rutas hilos
    Route::get('/hilos/{id}/show', [HiloController::class, 'show'])->name('hilos.show');
    Route::middleware('auth')->group(function() {
    Route::get('/hilos', [HiloController::class, 'index'])->name('hilos.index');
    Route::get('/hilos/{orden}', [HiloController::class, 'listarHilos'])->name('hilos.listar');
    Route::post('/hilos/like/{hilo}', [HiloController::class, 'like'])->name('hilo.like');Route::post('/hilos', [HiloController::class, 'store'])->name('hilo.store');
    Route::post('/hilos/{id}/tuits', [HiloController::class, 'store'])->name('tuit.store');
    Route::put('/hilos/{id}', 'HiloController@update')->name('hilo.update');
    Route::delete('/hilos/{id}', [HiloController::class, 'destroy'])->name('hilos.destroy');
    Route::get('/hilo/crear', [HiloController::class, 'crear'])->name('hilo.crear');
    Route::get('/hilos/usuario/{usuarioID}', [HiloController::class, 'index'])->name('hilos.hilosUsuario'); //modificar 'index' a 'hilosUsuario'
    
});

//Rutas categorias
    Route::get('/categorias/{id}/show', [CategoriaController::class, 'show'])->name('categorias.show');
    Route::middleware('auth')->group(function() {
    Route::get('/categoria/search', [CategoriaController::class, 'search'])->name('categoria.search');
    Route::get('/categorias', [CategoriaController::class, 'index'])->name('categorias.index');
    Route::get('/categorias/buscar', [CategoriaController::class, 'buscar'])->name('categorias.buscar');
    Route::get('/categoria/{id}', [CategoriaController::class, 'mostrar'])->name('categoria.mostrar');
    Route::post('/categorias', [CategoriaController::class, 'store'])->name('categorias.store');
    Route::put('/categorias/{id}', 'CategoriaController@update')->name('categorias.update');
    Route::get('/categorias/crear', [CategoriaController::class, 'crear'])->name('categorias.crear');
    Route::delete('/categorias/{id}', [CategoriaController::class, 'destroy'])->name('categorias.destroy');
    Route::get('/categorias/usuario/{usuarioID}', [CategoriaController::class, 'categoriasUsuario'])->name('categorias.categoriasUsuario');
});

//Rutas eventos
    Route::get('/eventos/{id}/show', [EventoController::class, 'show'])->name('eventos.show');
    Route::middleware('auth')->group(function() {
    Route::get('/eventos', [EventoController::class, 'index'])->name('eventos.index');
    Route::get('/eventos/usuario', [EventoController::class, 'listar'])->name('eventos.listar');
    Route::get('/eventos/ordenar/{sort}', [EventoController::class, 'ordenar'])->name('eventos.ordenar');
    Route::get('/eventos/{id}/editar', [EventoController::class, 'edit'])->name('eventos.edit');
    Route::post('/evento', [EventoController::class, 'store'])->name('evento.store');
    Route::put('/eventos/{id}', [EventoController::class, 'update'])->name('evento.update');
    Route::delete('/eventos/{id}',[EventoController::class, 'destroy'])->name('evento.destroy');
    Route::get('/eventos/crear', [EventoController::class, 'crear'])->name('eventos.crear');
    Route::get('/eventos/usuario/{usuarioID}', [EventoController::class, 'eventosUsuario'])->name('eventos.eventosUsuario');
    
});
//Rutas usuarios
    Route::middleware('auth')->group(function() {
    Route::get('/usuarios/{id}/editar',[UsuarioController::class, 'edit'])->name('usuarios.edit');
    Route::get('/usuarios', [UsuarioController::class, 'index'])->name('usuarios.index');
    Route::get('/usuarios/ordenar/{sort}', [UsuarioController::class, 'ordenar'])->name('usuarios.ordenar');
    Route::get('/usuarios/filtrar', [UsuarioController::class, 'filtrar'])->name('usuarios.filtrar');
    Route::get('/usuarios/{id}/show',[UsuarioController::class, 'show'])->name('usuarios.show');
    Route::get('/usuario/{id}/perfil',[UsuarioController::class, 'perfil'])->name('usuario.perfil');
    Route::post('/usuarios',[UsuarioController::class, 'store'])->name('usuario.store');
    Route::put('/usuarios', [UsuarioController::class, 'update'])->name('usuario.update');
    Route::delete('/usuarios/{id}',[UsuarioController::class, 'destroy'])->name('usuario.destroy');
});

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
