<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermisoController;
use App\Http\Controllers\SalaController;
use App\Http\Controllers\ReservaController;
use App\Http\Controllers\DashboardController;


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
    return redirect('/dashboard');
});

Auth::routes();

//Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard');

//Salas
Route::middleware(['auth', 'can:is_admin'])->group(function () {
    Route::get('salas/create', [SalaController::class, 'create'])->name('salas.create');
    Route::post('salas', [SalaController::class, 'store'])->name('salas.store');
    Route::get('salas', [SalaController::class, 'index'])->name('salas.index');
});
Route::delete('salas/{id}', [SalaController::class, 'destroy'])->name('salas.destroy');


//Reservas Cliente
Route::middleware(['auth', 'can:is_client'])->group(function () {
    Route::get('/reservas/create', [ReservaController::class, 'create'])->name('reservas.create');
    Route::post('/reservas', [ReservaController::class, 'store'])->name('reservas.store');
    Route::get('/reservas/mis-reservas', [ReservaController::class, 'misReservas'])->name('reservas.mis-reservas');
});

//Reservas Admin
Route::middleware(['auth', 'can:is_admin'])->group(function () {
    Route::get('/reservas/admin', [ReservaController::class, 'indexAdmin'])->name('reservas.admin_index');
});
Route::middleware(['auth', 'can:is_admin'])->group(function () {
    Route::patch('reservas/{reserva}/estado', [ReservaController::class, 'cambiarEstado'])
        ->name('reservas.cambiar_estado');
});


Route::resource('roles', RoleController::class)->middleware('auth');
Route::resource('permisos', PermisoController::class)->middleware('auth');
Route::resource('salas', SalaController::class)->middleware('auth');
Route::resource('reservas', ReservaController::class)->middleware('auth');