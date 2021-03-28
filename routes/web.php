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
Route::resource('perritos', PerritosController::class);
Auth::routes(['register' => false, 'reset' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

