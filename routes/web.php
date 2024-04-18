<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ForgetPasswordManager;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\ServiceController;

// auth routes
// auth routes
// auth routes

Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::view('/login', 'auth.form');
Route::view('/', 'auth.form');
Route::view('/dashboard', 'dashboard');


Route::get('/forget-password', [ForgetPasswordManager::class, 'forgetPassword'])->name('forgetPassword');
Route::post('/forget-password', [ForgetPasswordManager::class, 'forgetPasswordPost'])->name('forgetPasswordPost');
Route::get('/reset-password{token}', [ForgetPasswordManager::class, 'resetPassword'])->name("resetPassword");
Route::post('/reset-password', [ForgetPasswordManager::class, 'resetPasswordPost'])->name("resetPasswordPost");

//rooms routes
//rooms routes
//rooms routes




//category routes
//category routes
//category routes

Route::resource('category', CategoryController::class)->only([
    'index', 'store', 'update', 'destroy'
]);

//service routes
//service routes
//service routes

Route::resource('service', ServiceController::class)->only([
    'index', 'store', 'update', 'destroy'
]);

Route::resource('room', RoomController::class)->only(['index', 'store', 'update', 'destroy']);



Route::get('/hotelier', [RoomController::class, 'frontIndex'])->name('frontIndex');
