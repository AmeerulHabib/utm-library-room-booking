<?php

namespace App\Policies;

use App\Models\Booking;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class BookingPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    // public function viewAny(User $user): bool
    // {
    //     return false;
    // }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Booking $booking): bool
    {
        return $user->role === 'admin' || $user->role === 'staff' || $user->id === $booking->user_id;
    }

    /**
     * Determine whether the user can create models.
     */
    // public function create(User $user): bool
    // {
    //     return false;
    // }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Booking $booking): bool
    {
        return in_array($user->role, ['admin', 'staff']) || $booking->user_id === $user->id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Booking $booking): bool
    {
        return $user->role === 'admin' || $user->role === 'staff' || $user->id === $booking->user_id;
    }

    /**
     * Determine whether the user can restore the model.
     */
    // public function restore(User $user, Booking $booking): bool
    // {
    //     return false;
    // }

    /**
     * Determine whether the user can permanently delete the model.
     */
    // public function forceDelete(User $user, Booking $booking): bool
    // {
    //     return false;
    // }

    public function approve(User $user, Booking $booking): bool
    {
        return in_array($user->role, ['admin', 'staff']);
    }

    public function reject(User $user, Booking $booking): bool
    {
        return in_array($user->role, ['admin', 'staff']);
    }
}
