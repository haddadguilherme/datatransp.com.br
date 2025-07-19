<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;

Route::get('/', fn() => view('welcome'));

// Login com seleção de empresa (via slug)
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('/login', [AuthenticatedSessionController::class, 'store']);
});

// Área protegida com slug do tenant
Route::middleware(['web', 'auth', 'tenant', 'empresa.match'])->group(function () {
    

    Route::get('/{empresa}/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/{empresa}/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/{empresa}/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/{empresa}/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
});



/* 
Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    
}); */

require __DIR__.'/auth.php';
