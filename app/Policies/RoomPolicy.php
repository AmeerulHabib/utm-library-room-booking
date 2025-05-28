<?php

namespace App\Policies;

use App\Models\Room;
use App\Models\User;

class RoomPolicy
{
    /**
     * Determine if the user can view the room listings.
     */
    public function viewAny(User $user): bool
    {
        return true; // everyone can view rooms
    }

    /**
     * Determine if the user can create or manage rooms (admin only).
     */
    public function manage(User $user): bool
    {
        return $user->isAdmin();
    }
}
