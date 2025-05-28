<?php

namespace App\Policies;

use App\Models\Booking;
use App\Models\User;

class BookingPolicy
{
    /**
     * Determine if the given booking can be updated by the user.
     */
    public function update(User $user, Booking $booking): bool
    {
        return $user->isAdmin() || $user->isStaff() || $booking->user_id === $user->id;
    }

    /**
     * Determine if the given booking can be deleted by the user.
     */
    public function delete(User $user, Booking $booking): bool
    {
        return $user->isAdmin() || $user->isStaff() || $booking->user_id === $user->id;
    }

    /**
     * Determine if the user can create a booking.
     */
    public function create(User $user): bool
    {
        return $user->isStudent() || $user->isStaff() || $user->isAdmin();
    }
}
