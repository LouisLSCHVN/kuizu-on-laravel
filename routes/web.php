<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\QuizzController;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;


// Route for the home page
Route::inertia('/', 'home')->name('home');

// Routes for guests (not authenticated users)
Route::middleware('guest')->group(function () {
    Route::inertia('/login', 'user/login')->name('auth.login');
    Route::post('/login', [AuthController::class, 'login'])->name('auth.login.post');

    Route::inertia('/register', 'user/register')->name('auth.register');
    Route::post('/register', [AuthController::class, 'register'])->name('auth.register.post');
});

// Routes for authenticated users
Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');

    Route::inertia('/quizz/create', 'quizz/create', [QuizzController::class, 'index'])->name('quizz.create');
    Route::post('/quizz/create', [QuizzController::class, 'store'])->name('quizz.store');
});

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
