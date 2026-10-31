<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/post/profile-saya', function () {
    return view('post.profile-saya');
})->middleware(['auth'])->name('post.profile-saya');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/admin', function () {
    return 'Halo Admin! Kamu berhasil mengakses halaman ini.';
})->middleware(['auth', 'admin']);

require __DIR__.'/auth.php';

Route::get('/post/projects', [PostController::class, 'index'])
    ->middleware('auth')
    ->name('post.index');
