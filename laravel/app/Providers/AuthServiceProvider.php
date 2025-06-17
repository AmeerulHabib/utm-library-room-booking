<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;



class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
    \App\Models\Booking::class => \App\Policies\BookingPolicy::class,
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
    }
}
