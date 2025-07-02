<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Room;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
         $json = file_get_contents(database_path('seeders/data/rooms.json'));
        $rooms = json_decode($json, true);

        foreach ($rooms as $room) {
            Room::create($room);
        }
    }
}
