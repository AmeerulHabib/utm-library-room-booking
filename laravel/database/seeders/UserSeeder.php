<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $users = [
            [
                'name' => 'Super Admin',
                'email' => 'superadmin@seed.local',
                'password' => bcrypt('super123'),
                'role' => 'super admin',
            ],
            [
                'name' => 'Admin User',
                'email' => 'admin@seed.local',
                'password' => bcrypt('admin123'),
                'role' => 'admin',
            ],
            [
                'name' => 'Staff User',
                'email' => 'staff@seed.local',
                'password' => bcrypt('staff123'),
                'role' => 'staff',
            ],
            [
                'name' => 'Student User',
                'email' => 'student@seed.local',
                'password' => bcrypt('user123'),
                'role' => 'user',
            ],
        ];

        foreach ($users as $userData) {
            $user = User::factory()
                ->withPersonalTeam()
                ->create([
                    'name' => $userData['name'],
                    'email' => $userData['email'],
                    'password' => $userData['password'],
                    'email_verified_at' => now(),
                    'role' => $userData['role'],
                ]);
        }
    }
}
