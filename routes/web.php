<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;


Route::inertia('', 'home')->name('home');
// Route::get('/', fn() => view('home'))->name('home');

/**
 *
 * Route::middleware('guest')->group(fn() => [
 * Route::get('/login', fn() => view('auth.login'))->name('auth.login'),
 * Route::post('/register', [AuthController::class, 'register']),
 *
 * Route::post('/logout', [AuthController::class, 'logout'])->name('logout'),
 *
 * Route::get('/register', fn() => view('auth.register'))->name('auth.register'),
 * Route::post('/login', [AuthController::class, 'login']),
 * ]);
 *
 * Route::get('/users', [UserController::class, 'index'])->name('users.index');
 * Route::get('/users/{username}', [UserController::class, 'show'])->name('users.show');
 *
 * Route::middleware('auth')->group(fn() => [
 * Route::get('/account', [UserController::class, 'edit'])->name('users.edit'),
 * Route::put('/account', [UserController::class, 'update'])->name('users.update'),
 * ]);
 *
 *
 *
 *
 * */
