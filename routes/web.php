<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;
use App\Models\User;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;


Route::get('', function () {
    return view('login');
})->name('login');



Route::post('/user-login', [LoginController::class, 'userLogin'])->name('userLogin');

Route::middleware(['auth', 'preventBackAfterLogout'])->group(function () {
    // Protected routes
    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('users.dashboard');


// For assigning roles to users
Route::post('/assign-role', [RoleController::class, 'assignRole'])->name('assign.role');
Route::post('/store-user', [UserController::class, 'store'])->name('store.user');

Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/user-create', [UserController::class, 'create'])->name('users.create');
Route::get('/user-edit/{id}', [UserController::class, 'edit'])->name('users.edit');
Route::get('/user-destroy/{id}', [UserController::class, 'destroy'])->name('users.destroy');
Route::put('/user-update/{id}', [UserController::class, 'update'])->name('users.update');

Route::get('/user-logout', [LoginController::class, 'userLogout'])->name('userLogout');
Route::resource('permissions', PermissionController::class);

Route::get('/roles', [RoleController::class, 'index'])->name('roles.index');
Route::get('/roles-create', [RoleController::class, 'create'])->name('roles.create');
Route::post('/roles-store', [UserController::class, 'store'])->name('roles.store');
Route::get('/roles-edit/{id}', [RoleController::class, 'edit'])->name('roles.edit');
Route::get('/roles-destroy/{id}', [RoleController::class, 'destroy'])->name('roles.destroy');
Route::put('/roles-update/{id}', [RoleController::class, 'update'])->name('roles.update');

Route::get('/permissions', [PermissionController::class, 'index'])->name('permissions.index');
Route::get('/permissions-create', [PermissionController::class, 'create'])->name('permissions.create');
Route::post('/permissions-store', [PermissionController::class, 'store'])->name('permissions.store');
Route::get('/permissions-edit/{id}', [PermissionController::class, 'edit'])->name('permissions.edit');
Route::get('/permissions-destroy/{id}', [PermissionController::class, 'destroy'])->name('permissions.destroy');
Route::put('/permissions-update/{id}', [PermissionController::class, 'update'])->name('permissions.update');

});