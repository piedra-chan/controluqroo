<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\DashController;
use App\Http\Controllers\EventosController;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth')->group(function () {
    Route::get('/principal', [DashController::class, 'index'])->name('dash');
});

Route::middleware('auth')->group(function () {
    Route::get('/historial', [EventosController::class, 'index'])->name('eventos');
});

// Rutas para usuario
Route::middleware('auth')->group(function () {
    Route::get('/ver-users', [UserController::class, 'index'])->name('user.index');
    Route::get('/generar-qr/{id}', [UserController::class, 'generarQr'])->name('user.qr');
    Route::get('/generar-qr-user', [UserController::class, 'generarQrUser'])->name('user.qrU');
    Route::get('/enviar-qr', [UserController::class, 'enviarMailsQr'])->name('mail.qr');
    Route::get('/user-info', [UserController::class, 'userInfo']);
    Route::get('/download-qr', [UserController::class, 'downloadQr']);
});

Route::get('/form', function () {
    return view('pages-control.solicitudes.solicitud_form');
});
Route::get('/buzon', function () {
    return view('pages-control.solicitudes.buzon');
});

Route::get('/ejemplo', function () {
    return view('dashboard-u');
});

Route::get('/', function () {
    return view('welcome');
});


//Rutas para las areas
Route::middleware('auth')->group(function () {
    Route::get('/ver-areas', [AreaController::class, 'index'])->name('areas.index');
    Route::post('/guardar-area', [AreaController::class, 'store'])->name('areas.store');
    Route::get('/administrar-area/{id}', [AreaController::class, 'administrar'])->name('adm.area');
    Route::put('/editar-area/{id}', [AreaController::class, 'update'])->name('adm.area');
    Route::post('/permitir-acceso', [AreaController::class, 'permitirAccesos'])->name('areas.acceso');
    Route::post('/generar-reporte/{id}', [AreaController::class, 'generarReporte'])->name('areas.reporte');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



require __DIR__.'/auth.php';
