<?php

use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Auth\DashboardController;
use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/reports', function () {
    return view('reports.index');
})->name('reports.index');

Route::get('/admin/profile', [ProfileController::class, 'index'])->name('admin.profile');
Route::post('/admin/profile/update', [ProfileController::class, 'update'])->name('admin.profile.update');

Route::prefix('users')->middleware('auth')->group(function () {
    Route::get('index', [UserController::class, 'index'])->name('users.index');
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

Route::get('/settings/general', function () {
    return view('settings.general');
})->middleware('auth')->name('settings.general');

Route::get('/settings/profile', function () {
    return view('settings.profile');
})->middleware('auth')->name('settings.profile');

Route::get('foods', function () {
    return view('foods.index');
})->middleware('auth')->name('foods.index');


Route::prefix('admin')->group(function () {
    Route::resource('roles', RoleController::class);
});


require __DIR__ . '/auth.php';
