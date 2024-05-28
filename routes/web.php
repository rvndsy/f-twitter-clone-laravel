<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PostController;

Route::resource('posts', PostController::class)
    ->only(['index', 'store', 'destroy', 'edit', 'update'])
    ->middleware(['auth', 'verified']);

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::redirect('/home', '/posts')->name('home');
Route::redirect('/dashboard', '/posts')->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__.'/auth.php';
