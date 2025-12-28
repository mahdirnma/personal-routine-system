<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CompletedIntervalController;
use App\Http\Controllers\RoutineController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
Route::middleware('guest')->group(function () {
    Route::get('/login',[AuthController::class,'loginForm'])->name('login.form');
    Route::post('/login',[AuthController::class,'login'])->name('login');
    Route::get('/register',[AuthController::class,'registerForm'])->name('register.form');
    Route::post('/register',[AuthController::class,'register'])->name('register');
});
Route::middleware('auth')->group(function(){
    Route::get('/',[UserController::class,'dashboard'])->name('dashboard');
    Route::resource('routines', RoutineController::class);
    Route::resource('completed-intervals', CompletedIntervalController::class);
    Route::post('/logout',[AuthController::class,'logout'])->name('logout');
});
