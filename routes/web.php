<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

// Protege todas as rotas de usuários com o middleware 'auth'
Route::middleware(['auth'])->group(function () {

    // Dashboard
    Route::get('/dashboard', [UsuarioController::class, 'index'])
        ->middleware(['verified']) // adicional de verificação
        ->name('dashboard');

    // Resource controller para usuários
    Route::resource('users', UsuarioController::class);
    Route::resource('users', UsuarioController::class)->except(['index']);

    // Perfil do usuário
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/users/upload-image', [ProfileController::class, 'uploadImage'])->name('users.uploadImage');
});

require __DIR__ . '/auth.php';

