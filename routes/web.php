<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\DashController;
use App\Http\Controllers\EventosController;
use App\Http\Controllers\SolicitudController;
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
    Route::get('/mi-actividad', [DashController::class, 'miActividad'])->name('dash_u');
});

Route::middleware('checkRole:Admin')->group(function () {
    Route::get('/principal', [DashController::class, 'index'])->name('dash');

});


Route::get('/poll-access-count', [DashController::class, 'pollAccessCount'])->name('poll');

// Rutas para usuario
Route::middleware('auth')->group(function () {
    Route::get('/generar-qr/{id}', [UserController::class, 'generarQr'])->name('user.qr');
    Route::get('/generar-qr-user', [UserController::class, 'generarQrUser'])->name('user.qrU');
    Route::get('/enviar-qr', [UserController::class, 'enviarMailsQr'])->name('mail.qr');
    Route::get('/user-info', [UserController::class, 'userInfo']);
    Route::get('/download-qr', [UserController::class, 'downloadQr']);
});

Route::get('/form', function () {
    return view('pages-control.solicitudes.ver-solicitud');
});


Route::get('/ejemplo', function () {
    return view('dashboard-u');
});

//Rutas para solicitud
Route::middleware('auth')->group(function () {
    Route::get('/solicitud-crear', [SolicitudController::class, 'crearSolicitud']);
    Route::get('/buzon', [SolicitudController::class, 'index']);
    Route::post('/solicitud-store', [SolicitudController::class, 'store'])->name('solicitud.store');
    Route::get('/ver-solicitud/{id}', [SolicitudController::class, 'verSolicitud']);
    Route::post('/conceder-permiso', [SolicitudController::class, 'concederPermisos'])->name('solicitud.acceso');
    Route::get('/mi-historial', [EventosController::class, 'miHistorial'])->name('eventos_u');
});

// Rutas para la administracion de usuarios 
Route::middleware('checkRole:Admin')->group(function () {
    Route::get('/ver-users', [UserController::class, 'index'])->name('user.index');
    Route::get('/historial', [EventosController::class, 'index'])->name('eventos');

});

//Rutas para las areas
Route::middleware(['checkRole:Admin'])->group(function () {
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

Route::get('/', function () {
    return redirect()->route('login');
});

require __DIR__.'/auth.php';
