<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Room;

class RoomSeeder extends Seeder
{
    public function run(): void
    {
        Room::create([
            'name' => 'Conference Room A',
            'location' => 'Level 2, Main Library',
            'capacity' => 20,
            'type' => 'Conference',
            'description' => 'A conference room with projector and whiteboard.',
        ]);

        Room::create([
            'name' => 'Group Study Room 1',
            'location' => 'Level 1, East Wing',
            'capacity' => 6,
            'type' => 'Study',
            'description' => 'A cozy study room for small groups.',
        ]);

        Room::create([
            'name' => 'Individual Study Pod',
            'location' => 'Level 3, Quiet Zone',
            'capacity' => 1,
            'type' => 'Individual',
            'description' => 'Private pod for solo studying.',
        ]);
    }
}
