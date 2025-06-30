<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create roles
        Role::create(['name' => 'super admin']);
        $admin = Role::create(['name' => 'admin']);
        $staff = Role::create(['name' => 'staff']);
        $user = Role::create(['name' => 'user']);

        // Assign permissions to roles
        $admin->givePermissionTo([
            'user-view-all',
            'user-add',
            'user-delete',
            'user-edit',
            'role-view',
            'role-add',
            'role-edit',
            'role-delete',
            'role-assign-to-user',
        ]);

        // Assign permissions to staff
        $staff->givePermissionTo([
            'room-add',
            'room-view',
            'room-edit',
            'room-delete',
            'booking-create',
            'booking-view-all',
            'booking-cancel-all',
            'booking-delete-all',
            'booking-status-view',
            'booking-approve',
            'booking-reject',
        ]);

        // Assign permissions to user
        $user->givePermissionTo([
            'booking-create',
            'booking-view-own',
            'booking-cancel-own',
            'booking-delete-own',
            'room-view',
        ]);
    }
}
