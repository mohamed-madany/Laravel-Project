<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\indexController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;

// ## Public Routes

Route::get('/', indexController::class);
Route::get('/about', AboutController::class);
Route::get('/contact', ContactController::class);

Route::get('/signup', [AuthController::class, 'showSignUp'])->name('signup');
Route::post('/signup', [AuthController::class, 'signUp']);

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Protected Routes

Route::middleware('auth')->group(function () {
    Route::resource('blog', PostController::class)
        ->parameters(['blog' => 'post']);
    Route::resource('blog.comments', CommentController::class)->shallow()
        ->parameters(['blog' => 'post']);
    Route::resource('tags', TagController::class);
});
