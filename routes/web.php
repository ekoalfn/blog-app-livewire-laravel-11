<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/registration/form',[AuthController::class,'loadRegisterForm']);
Route::post('/register/user',[AuthController::class,'registerUser'])->name('registerUser');


Route::get('/404', [AuthController::class, 'load404']);
