<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\BookingController;
use Illuminate\Support\Facades\Route;

// Guest landing page (home, for users who are not logged in)
Route::get('/', function () {
    return view('guest');
})->name('guest');

// Role-based dashboard (requires DashboardController)
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// Resource routes for Room and Booking management (authenticated users only)
Route::middleware(['auth'])->group(function () {
    Route::resource('rooms', RoomController::class);
    Route::resource('bookings', BookingController::class);

    Route::patch('bookings/{booking}/approve', [BookingController::class, 'approve'])->name('bookings.approve');
    Route::patch('bookings/{booking}/reject', [BookingController::class, 'reject'])->name('bookings.reject');


    // Profile routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Auth routes (Laravel Breeze)
require __DIR__.'/auth.php';
