<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TopicController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ProfileController;

// Pagrindinis puslapis
Route::get('/', [TopicController::class, 'index'])->name('topics.index');

//visi route prisijungus
Route::resource('topics', TopicController::class);
Route::post('/topics/{topic}/add-post', [TopicController::class, 'addPost'])->name('topics.addPost');
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('/dashboard', function () {
    return redirect()->route('profile.edit');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
