<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        \App\Models\Booking::class => \App\Policies\BookingPolicy::class,
        \App\Models\Room::class => \App\Policies\RoomPolicy::class,

    ];

    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
        Gate::define('manage-users', function ($user) {
            return $user->role === 'admin';
        });
    }
}
