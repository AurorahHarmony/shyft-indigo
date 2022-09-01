<?php

use App\Http\Controllers\JobController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'create'])->name('login');
    Route::post('/login', [LoginController::class, 'authenticate']);
});

Route::middleware('auth')->group(function () {
    Route::inertia('/', 'dashboard');

    Route::get('/jobs', [JobController::class, 'index']);

    // Administration Routes.
    Route::redirect('/admin', '/admin/users');
    Route::get('/admin/users', [UserController::class, 'index']);
    Route::get('/admin/users/{id}', [UserController::class, 'create']);
});

Route::get('/logout', [LoginController::class, 'destroy']);