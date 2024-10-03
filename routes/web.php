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

Route::get('/user-logout', [LoginController::class, 'userLogout'])->name('userLogout');
Route::resource('roles', RoleController::class);
Route::resource('permissions', PermissionController::class);

});