<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\CursosController;
use App\Http\Controllers\ImagenController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\CodigosController;
use App\Http\Controllers\MaestrosController;
use App\Http\Controllers\RegisterController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('inicio');
})->name('inicio');


// Rutas para el Login
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);

// Ruta para el Logout
Route::post('/logout', [LogoutController::class, 'store'])->name('logout');

// Rutas para el registro
Route::get('/registro', [RegisterController::class, 'index'])->name('registro');
route::post('/registro', [RegisterController::class, 'store']);

// Ruta para los cursos
Route::get('/cursos', [CursosController::class, 'index'])->name('cursos');
Route::post('/cursos', [CursosController::class, 'store']);

// Ruta para guardar imagenes
Route::post('/imagen', [ImagenController::class, 'store'])->name('imagen');

// Ruta para los maestros
Route::get('/maestros', [MaestrosController::class, 'index'])->name('maestros')->middleware('auth.admin');

// Ruta para los codigos
Route::get('/codigos', [CodigosController::class, 'index'])->name('codigos')->middleware('auth.admin');
Route::post('/codigos', [CodigosController::class, 'store']);

//Ruta para los roles
Route::get('/roles', [RolesController::class, 'index'])->name('roles')->middleware('auth.admin');










Route::get('listacursos', [CursosController::class, 'lista']);

Route::post('crearcurso', [CursosController::class, 'crear']);