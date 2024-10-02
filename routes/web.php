<?php

use Illuminate\Support\Facades\Route;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RoleController;



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
    Route::get('panel/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Role
    Route::get('panel/role', [RoleController::class, 'index'])->name('role.index');
    Route::post('panel/role/store', [RoleController::class,'store'])->name('role.store');
    Route::get('panel/role/{id}/edit', [RoleController::class, 'edit'])->name('role.edit');
    Route::put('panel/role/{id}/update', [RoleController::class, 'update'])->name('role.update');
    Route::delete('panel/role/{id}/destroy', [RoleController::class, 'destroy'])->name('role.destroy');

    // Permission
});