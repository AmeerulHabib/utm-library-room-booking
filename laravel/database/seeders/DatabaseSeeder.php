<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create a single demo user with a known email/password, with a personal team
        User::factory()
            ->withPersonalTeam()
            ->create([
                'name' => 'Demo User',
                'email' => 'demo@example.com',
                'password' => bcrypt('demo123'), // Known password!
            ]);

        // Optionally: create 5 random users with teams
        User::factory()
            ->count(5)
            ->withPersonalTeam()
            ->create();
    }
}
