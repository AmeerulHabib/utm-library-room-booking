<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\BookingController;

// Public / Guest: redirect to register
Route::get('/', function () {
    return redirect()->route('register');
})->middleware('guest');

// Auth routes (login, register, password reset, etc.)
require __DIR__.'/auth.php';

// After login: dashboard and profile
Route::middleware('auth')->group(function () {
    // Dashboard
    Route::get('/dashboard', [RoomController::class, 'index'])
         ->name('dashboard');

    // Profile management
    Route::get('/profile',    [ProfileController::class, 'edit'])   ->name('profile.edit');
    Route::patch('/profile',  [ProfileController::class, 'update']) ->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Room routes
    Route::get('/rooms', [RoomController::class, 'index'])->name('rooms.index');
    Route::get('/rooms/{room}', [RoomController::class, 'show'])->name('rooms.show');
    Route::post('/rooms/{room}/book', [BookingController::class, 'store'])->name('bookings.store');
});
