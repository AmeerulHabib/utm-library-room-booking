<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        // Create initial admin user
        User::create([
            'name'     => 'Super Admin',
            'email'    => 'admin@example.com',
            'password' => bcrypt('secret'),
            'role'     => 'admin',
        ]);
    }
}
