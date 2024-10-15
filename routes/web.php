<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return view('welcome');
});

//Register
Route::get('/register',[AuthController::class,'loadRegisterForm']);
Route::post('/register/user',[AuthController::class,'registerUser'])->name('registerUser');

//Login
Route::get('/login',[AuthController::class,'loadLoginPage']);
Route::post('/login/user',[AuthController::class,'LoginUser'])->name('LoginUser');
Route::get('/logout',[AuthController::class,'LogoutUser']);

//Reset password
Route::get('/forgot/password',[AuthController::class,'forgotPassword']);
Route::post('/forgot',[AuthController::class,'forgot'])->name('forgot');
Route::get('/reset/password',[AuthController::class,'loadResetPassword']);
Route::post('/reset/user/password',[AuthController::class,'ResetPassword'])->name('ResetPassword');

Route::get('user/home', [UserController::class, 'index'])->middleware('user');
Route::get('my/posts', [UserController::class, 'posts'])->middleware('user');
Route::get('create/post', [UserController::class, 'create_post'])->middleware('user');
Route::get('edit/post/{post_id}', [UserController::class, 'edit_post'])->middleware('user');
Route::get('/view/post/{id}',[UserController::class,'post_detail'])->middleware('user');
Route::get('/profile',[UserController::class,'profile'])->middleware('user');

Route::get('admin/home', [AdminController::class, 'index'])->middleware('admin');

Route::get('/404', [AuthController::class, 'load404']);
