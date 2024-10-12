<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register',[AuthController::class,'loadRegisterForm']);
Route::post('/register/user',[AuthController::class,'registerUser'])->name('registerUser');

Route::get('/login/form',[AuthController::class,'loadLoginPage']);
Route::post('/login/user',[AuthController::class,'LoginUser'])->name('LoginUser');
Route::get('/logout',[AuthController::class,'LogoutUser']);

Route::get('user/home', [UserController::class, 'index'])->middleware('user');
Route::get('admin/home', [AdminController::class, 'index'])->middleware('admin');

Route::get('/404', [AuthController::class, 'load404']);
