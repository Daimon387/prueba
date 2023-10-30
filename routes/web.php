<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


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
    return view('home');
});

Auth::routes();
Route::get('home',[App\Http\Controllers\HomeController::class,'index'])->name('home');

Route::resource('clientes',App\Http\Controllers\ClienteController::class);
Route::resource('personas',App\Http\Controllers\PersonaController::class);
Route::resource('cargos',App\Http\Controllers\CargoController::class);
Route::resource('empleados',App\Http\Controllers\EmpleadoController::class);
Route::resource('colores',App\Http\Controllers\ColoreController::class);
Route::resource('tipotelas',App\Http\Controllers\TipotelaController::class);
Route::resource('productos',App\Http\Controllers\ProductoController::class);
Route::resource('sucursals',App\Http\Controllers\SucursalController::class);
Route::resource('inventarios',App\Http\Controllers\InventarioController::class);
Route::resource('inventarioproductos',App\Http\Controllers\InventarioproductoController::class);
Route::resource('ventas',App\Http\Controllers\VentaController::class);
Route::resource('detalleventas',App\Http\Controllers\DetalleventaController::class);
Route::resource('users',App\Http\Controllers\UserController::class);


