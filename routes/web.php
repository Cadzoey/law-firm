<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/blog', [PostController::class, 'index'])->name('posts.index');
Route::get('/blog/{slug}', [PostController::class, 'show'])->name('posts.show');

Route::post('/consultasi', [HomeController::class, 'storeConsultation'])->name('consultation.store');
