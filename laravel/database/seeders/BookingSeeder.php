<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Booking;
use App\Models\User;
use App\Models\Room;
use Carbon\Carbon;

class BookingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::where('role', 'user')->first();
        $admin = User::where('role', 'admin')->first();
        $room1 = Room::where('name', 'Conference Room A')->first();
        $room2 = Room::where('name', 'Group Study Room 1')->first();

        // If the users/rooms don't exist yet, skip seeding to prevent error
        if ($user && $admin && $room1 && $room2) {
            Booking::create([
                'user_id' => $user->id,
                'room_id' => $room1->id,
                'start_time' => Carbon::now()->addDay()->setTime(10, 0),
                'end_time' => Carbon::now()->addDay()->setTime(12, 0),
                'status' => 'pending',
                'notes' => 'Project discussion.',
            ]);

            Booking::create([
                'user_id' => $admin->id,
                'room_id' => $room2->id,
                'start_time' => Carbon::now()->addDays(2)->setTime(14, 0),
                'end_time' => Carbon::now()->addDays(2)->setTime(16, 0),
                'status' => 'approved',
                'notes' => 'Admin event.',
            ]);
        }
    }
}
