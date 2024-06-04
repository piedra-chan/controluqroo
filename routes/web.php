<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
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

// Rutas para usuario

Route::get('/ver-users', [UserController::class, 'index'])->name('user.index');
Route::get('/generar-qr/{id}', [UserController::class, 'generarQr'])->name('user.qr');
Route::get('/enviar-qr', [UserController::class, 'enviarMailsQr'])->name('mail.qr');


Route::get('/', function () {
    return view('welcome');
});


Route::get('/dashboard2', function () {
    return view('barebone',  ['title' => 'Dashboard | SCAcces  ']);
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
