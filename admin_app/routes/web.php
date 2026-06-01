<?php

use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/reports', function(){
    return view('reports.index');})->name('reports.index');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::prefix('users')->group( function() {
    Route::get('index', [UserController::class, 'index'])->name('users.index');
});

// Settings / General page
Route::get('/settings/general', function () {
    return view('settings.general');
})->middleware('auth')->name('settings.general');

// Settings / Profile page
Route::get('/settings/profile', function () {
    return view('settings.profile');
})->middleware('auth')->name('settings.profile');

Route::get('foods' , function(){
    return view('foods.index');
})->middleware('auth')->name('foods.index');

require __DIR__.'/auth.php';
