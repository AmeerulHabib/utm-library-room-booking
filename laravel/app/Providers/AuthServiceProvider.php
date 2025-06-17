<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Booking;
use App\Policies\BookingPolicy;
use App\Models\Room;
use App\Policies\RoomPolicy;




class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
    Booking::class => BookingPolicy::class,
    Room::class    => RoomPolicy::class,
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
