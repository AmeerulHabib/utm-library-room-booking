<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\RoomController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', DashboardController::class)
        ->name('dashboard');
    Route::resource('bookings', BookingController::class);
    Route::resource('rooms', RoomController::class);
    Route::patch('/bookings/{booking}/approve', [BookingController::class, 'approve'])->name('bookings.approve');
    Route::patch('/bookings/{booking}/reject', [BookingController::class, 'reject'])->name('bookings.reject');
    Route::view('/change-password', 'profile.change-password')->name('password.change');

    // Route::get('/dashboard', function () {
    //     return view('dashboard');
    // })->name('dashboard');
});
