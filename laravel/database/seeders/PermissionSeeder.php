<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Define the permissions
        $permissions = [
            // Room management
            'room-add',
            'room-view',
            'room-edit',
            'room-delete',

            // Booking management
            'booking-create',
            'booking-view-own',
            'booking-cancel-own',
            'booking-delete-own',
            'booking-view-all',
            'booking-cancel-all',
            'booking-delete-all',
            'booking-status-view',
            'booking-approve',
            'booking-reject',

            // User management
            'user-view-all',
            'user-add',
            'user-delete',
            'user-edit',

            // Role management
            'role-view',
            'role-add',
            'role-edit',
            'role-delete',
            'role-assign-to-user',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }
    }
}
