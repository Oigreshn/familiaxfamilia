<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VacanteController;
use App\Http\Controllers\CandidatoController;
use App\Http\Controllers\MessengerController;
use App\Http\Controllers\ConversacionController;
use App\Http\Controllers\NotificacionController;
use App\Http\Controllers\MensajeNotificacionController;

Route::get('/', HomeController::class)->name('home');

Route::get('/dashboard', [VacanteController::class, 'index'])->middleware(['auth', 'verified'])->name('vacantes.index');
Route::get('/oportunidad/create', [VacanteController::class, 'create'])->middleware(['auth', 'verified'])->name('vacantes.create');
Route::get('/oportunidad/{vacante}/edit', [VacanteController::class, 'edit'])->middleware(['auth', 'verified'])->name('vacantes.edit');
Route::get('/oportunidad/{vacante}', [VacanteController::class, 'show'])->name('vacantes.show');
Route::get('/candidatos/{vacante}', [CandidatoController::class, 'index'])->name('candidatos.index');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//Mensajes
Route::middleware(['auth'])->group(function () {
    Route::get('/mensajes/{vacante}/{user_id}', [MessengerController::class, 'index'])->name('mensajes.index');
    Route::get('/notificaciones-mensajes', MensajeNotificacionController::class)->name('notificaciones.mensajes');
    Route::get('/mensaje/{mensaje_id}', [MessengerController::class, 'show'])->name('mensajes.show');
    Route::get('/conversaciones', [ConversacionController::class, 'index'])->name('conversaciones.index');
});

//Notificaciones
Route::get('/notificaciones', NotificacionController::class)->middleware(['auth', 'verified'])->name('notificaciones');

require __DIR__.'/auth.php';
