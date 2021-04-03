<?php

use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\PerritosController;

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

//Mostrar rutas individualmente
// Route::get('/perritos',  [PerritosController::class, 'index']);
// Route::get('/perritos/create', [PerritosController::class, 'create']);
// Route::get('/perritos/edit', [PerritosController::class, 'edit']);

//Mostrar todas las rutas
Route::resource('perritos', PerritosController::class)->middleware('auth'); //Con middleware auth impide el acceso a las rutas si no se está logeado
Auth::routes(['reset' => false]);

//Redireccion al index de perritos una vez está logeado
Route::get('/home', [App\Http\Controllers\PerritosController::class, 'index'])->name('home')->middleware('auth');

