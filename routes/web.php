<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn() => view('home'))->name('home');

Route::middleware('guest')->group(fn() => [
    Route::get('/login', fn() => view('auth.login'))->name('auth.login'),
    Route::post('/register', [AuthController::class, 'register']),

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout'),

    Route::get('/register', fn() => view('auth.register'))->name('auth.register'),
    Route::post('/login', [AuthController::class, 'login']),
]);