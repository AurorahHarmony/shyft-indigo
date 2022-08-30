<?php

use App\Http\Controllers\JobController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function() {
    Route::get('/login', [LoginController::class, 'create'])->name('login');
    Route::post('/login', [LoginController::class, 'authenticate']);
});

Route::middleware('auth')->group(function() {
    Route::inertia('/', 'dashboard');

    Route::get('/jobs', [JobController::class, 'index']);

});

Route::get('/logout', [LoginController::class, 'destroy']);