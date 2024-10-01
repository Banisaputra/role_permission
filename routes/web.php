<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;



// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/register', [AuthController::class,'registerForm'])->name('register');
Route::post('/register', [AuthController::class,'register']);
Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/forgotPassword', [AuthController::class, 'forgotPasswordForm'])->name('forgotPassword');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');


Route::get('panel/dashboard', [DashboardController::class, 'index']);
