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

Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/register', [AuthController::class, 'register']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::view('/login', 'auth.form');
Route::view('/', 'auth.form');
Route::view('/dashboard', 'dashboard');


Route::get('/forget-password', [ForgetPasswordManager::class, 'forgetPassword'])->name('forgetPassword');
Route::post('/forget-password', [ForgetPasswordManager::class, 'forgetPasswordPost'])->name('forgetPasswordPost');
Route::get('/reset-password{token}', [ForgetPasswordManager::class, 'resetPassword'])->name("resetPassword");
Route::post('/reset-password', [ForgetPasswordManager::class, 'resetPasswordPost'])->name("resetPasswordPost");


Route::get('/error-403', function () {
    return view('errors.notfound');
})->name('error.403');






// User routes...    // User routes...    // User routes...    // User routes...    // User routes...
// User routes...    // User routes...    // User routes...    // User routes...    // User routes...
// User routes...    // User routes...    // User routes...    // User routes...    // User routes...


Route::get('/', function () {
    return redirect()->route('frontIndex');
});

Route::get('/hotelier', [RoomController::class, 'frontIndex'])->name('frontIndex');

Route::get('/room_details/{id}', [RoomController::class, 'room_details'])->name('room_details');

Route::get('/filter-rooms', [RoomController::class, 'filterRooms'])->name('filter.rooms');

Route::get('/contact', [RoomController::class, 'frontContact'])->name('frontContact');

Route::get('/rooms', [RoomController::class, 'frontRooms'])->name('frontRooms');

Route::get('/about', [RoomController::class, 'frontAbout'])->name('frontAbout');

Route::get('/sevices', [RoomController::class, 'frontServices'])->name('frontServices');

Route::group(['middleware' => 'user'], function () {



    Route::get('/profil', [BookingController::class, 'myBookings'])->name('myBookings');

    Route::put('/cancel-booking', [BookingController::class, 'cancelBooking'])->name('cancelBooking');

    Route::post('/book_room/{room}', [BookingController::class, 'book'])->name('book');
});

// Admin routes...    // Admin routes...    // Admin routes...    // Admin routes...    // Admin routes...
// Admin routes...    // Admin routes...    // Admin routes...    // Admin routes...    // Admin routes...
// Admin routes...    // Admin routes...    // Admin routes...    // Admin routes...    // Admin routes...

Route::group(['middleware' => 'admin'], function () {

    Route::resource('category', CategoryController::class)->only(['index', 'store', 'update', 'destroy']);

    Route::resource('user', UserController::class)->only(['index', 'destroy']);

    Route::resource('service', ServiceController::class)->only(['index', 'store', 'update', 'destroy']);

    Route::resource('room', RoomController::class)->only(['index', 'store', 'update', 'destroy']);

    Route::get('/booking', [BookingController::class, 'index'])->name('bookings');

    Route::delete('/booking/{id}', [BookingController::class, 'destroy'])->name('destroy');

    Route::get('/Statistique', [StatistiqueController::class, 'Statistique'])->name('Statistique');
});
