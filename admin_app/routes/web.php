<?php

use App\Http\Controllers\Admin\PermissionController;
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

Route::middleware(['auth'])->group(function () {

    Route::middleware('permission:user.view')->group(function () {
        Route::get('users', [UserController::class, 'index'])->name('users.index');
    });

    Route::middleware(['auth', 'permission:dashboard.view'])->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    });
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


Route::prefix('admin')->middleware(['auth'])->group(function () {

    Route::middleware('permission:user.create')->get('users/create', [UserController::class, 'create'])->name('users.create');
    Route::middleware('permission:user.create')->post('users/store',[UserController::class, 'store'])->name('users.store');

    Route::middleware('permission:role.view')->get('roles', [RoleController::class, 'index'])->name('roles.index');
    Route::middleware('permission:role.edit')->get('roles/{role}/permissions', [RoleController::class, 'editPermissions'])->name('roles.permissions.edit');
    Route::middleware('permission:role.edit')->post('roles/{role}/permissions', [RoleController::class, 'updatePermissions'])->name('roles.permissions.update');
    Route::middleware('permission:role.create')->post('roles', [RoleController::class, 'store'])->name('roles.store');
    Route::middleware('permission:role.edit')->put('roles/{role}', [RoleController::class, 'update'])->name('roles.update');
    Route::middleware('permission:role.delete')->delete('roles/{role}', [RoleController::class, 'destroy'])->name('roles.destroy');

    Route::middleware('permission:permission.view')->get('permissions', [PermissionController::class, 'index'])->name('permissions.index');
    Route::middleware('permission:permission.create')->post('permissions', [PermissionController::class, 'store'])->name('permissions.store');
    Route::middleware('permission:permission.edit')->put('permissions/{permission}', [PermissionController::class, 'update'])->name('permissions.update');
    Route::middleware('permission:permission.delete')->delete('permissions/{permission}', [PermissionController::class, 'destroy'])->name('permissions.destroy');

    Route::middleware('permission:user.edit')->post('users/{user}/assign-role', [UserController::class, 'assignRole'])->name('users.assignRole');

    Route::middleware('permission:user.edit')->put('users/{user}', [UserController::class, 'update'])->name('users.update');
});

require __DIR__ . '/auth.php';
