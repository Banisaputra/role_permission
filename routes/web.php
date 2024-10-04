<?php

use Illuminate\Support\Facades\Route;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;



// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/register', [AuthController::class,'registerForm'])->name('register');
Route::post('/register', [AuthController::class,'register']);
Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/forgotPassword', [AuthController::class, 'forgotPasswordForm'])->name('forgotPassword');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');



Route::group(['middleware' => 'userAdmin'], function() {
    Route::get('/', function () {
        return redirect('panel/dashboard');
    });
    Route::get('panel/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Role
    Route::get('panel/role', [RoleController::class, 'index'])->name('role.index');
    Route::post('panel/role/store', [RoleController::class,'store'])->name('role.store');
    Route::get('panel/role/{id}/edit', [RoleController::class, 'edit'])->name('role.edit');
    Route::put('panel/role/{id}/update', [RoleController::class, 'update'])->name('role.update');
    Route::delete('panel/role/{id}/destroy', [RoleController::class, 'destroy'])->name('role.destroy');

    Route::get('panel/{id}/asign-permission', [RoleController::class, 'roleHasPermission'])->name('rolePermission');

    // Permission
    Route::get('panel/permission', [PermissionController::class, 'index'])->name('permission.index');
    Route::post('panel/permission/store', [PermissionController::class,'store'])->name('permission.store');
    Route::get('panel/permission/{id}/edit', [PermissionController::class, 'edit'])->name('permission.edit');
    Route::put('panel/permission/{id}/update', [PermissionController::class, 'update'])->name('permission.update');
    Route::delete('panel/permission/{id}/destroy', [PermissionController::class, 'destroy'])->name('permission.destroy');

    // User




});