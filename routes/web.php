<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/login', fn() => view('login'))->name('login');
Route::post('/login', [UserController::class, 'signIn']);