<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Resource routes
    Route::resource('rooms', RoomController::class);
    Route::resource('bookings', BookingController::class);
    Route::resource('users', UserController::class);
    Route::resource('roles', RoleController::class);

    // Test route to check authentication and authorization
    Route::get('/test-auth', function () {
        $user = Auth::user();
        $roles = $user->getRoleNames(); // returns a collection of role names
        $permissions = $user->getPermissionNames(); // returns a collection of direct + role permissions

        $output = "You are authenticated as <b>{$user->email}</b> and authorized!<br><br>";
        $output .= "Your roles: <b>" . $roles->implode(', ') . "</b><br>";
        $output .= "Your permissions: <b>" . $permissions->implode(', ') . "</b><br><br>";

        // Check for a specific role
        $output .= "Has role 'admin'? " . ($user->hasRole('admin') ? 'Yes' : 'No') . "<br>";
        // Check for a specific permission
        $output .= "Can 'booking-create'? " . ($user->can('booking-create') ? 'Yes' : 'No') . "<br>";

        return $output;
    });
});
