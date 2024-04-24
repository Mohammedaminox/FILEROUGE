<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ForgetPasswordManager;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\StatistiqueController;
use App\Http\Controllers\UserController;

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



//category routes
//category routes
Route::resource('category', CategoryController::class)->only([
    'index', 'store', 'update', 'destroy'
]);


Route::resource('user', UserController::class)->only([
    'index','destroy'
]);



//service routes
//service routes
Route::resource('service', ServiceController::class)->only([
    'index', 'store', 'update', 'destroy'
]);



//rooms routes
//rooms routes
Route::resource('room', RoomController::class)->only(['index', 'store', 'update', 'destroy']);
Route::get('/room_details/{id}', [RoomController::class, 'room_details'])->name('room_details');



//booking routes
//booking routes
Route::post('/book_room/{room}', [BookingController::class, 'book'])->name('book');
Route::get('/booking', [BookingController::class, 'index'])->name('bookings');

Route::get('/profil', [BookingController::class, 'myBookings'])->name('myBookings');

Route::put('/cancel-booking', [BookingController::class, 'cancelBooking'])->name('cancelBooking');
Route::delete('/booking/{id}', [BookingController::class, 'destroy'])->name('destroy');



Route::get('/hotelier', [RoomController::class, 'frontIndex'])->name('frontIndex');
Route::get('/rooms', [RoomController::class, 'frontRooms'])->name('frontRooms');
Route::get('/about', [RoomController::class, 'frontAbout'])->name('frontAbout');
Route::get('/sevices', [RoomController::class, 'frontServices'])->name('frontServices');
Route::get('/contact', [RoomController::class, 'frontContact'])->name('frontContact');



Route::get('/Statistique', [StatistiqueController::class, 'Statistique'])->name('Statistique');

