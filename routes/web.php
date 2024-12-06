<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Public\PostController;
use App\Http\Controllers\User\AuthController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Public routes
Route::get('/', [PostController::class, 'index'])->name('public.index');

Route::prefix('admin')->group(function () {
    Auth::routes([
        'register' => false, // Registration Routes...
        'reset' => false, // Password Reset Routes...
        'verify' => false, // Email Verification Routes...
    ]);

    Route::middleware('auth:admin')->group(function () {
        Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

        Route::resource('category', CategoryController::class)->except('show');
        Route::resource('post', PostController::class)->except('show');
    });
});

Route::prefix('user')->group(function () {
    Route::middleware('guest:web')->group(function () {
        Route::get('/login', [AuthController::class, 'loginForm']);
        Route::post('/login', [AuthController::class, 'login'])->name('user.login');

        Route::get('/register', [AuthController::class, 'registerForm']);
        Route::post('/register', [AuthController::class, 'register'])->name('user.register');
    });

    Route::middleware('auth:web')->group(function () {
        Route::get('/logout', [AuthController::class, 'logout']);
    });
});
