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
    Route::get('/admin/users/create', [UserController::class, 'create']);
    // Route::post('/admin/users', [UserController::class, 'store']);
    Route::get('/admin/users/{id}', [UserController::class, 'show']);
    // Route::get('/admin/users/{id}/edit', [UserController::class, 'edit']);
    // Route::patch('/admin/users/{id}', [UserController::class, 'update']);
    // Route::delete('/admin/users/{id}', [UserController::class, 'destroy']);
});

Route::get('/logout', [LoginController::class, 'destroy']);