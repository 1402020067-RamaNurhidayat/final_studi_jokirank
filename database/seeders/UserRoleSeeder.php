<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create roles
        $adminRole = \App\Models\Role::create([
            'name' => 'admin',
            'display_name' => 'Admin',
            'description' => 'Admin Role',
        ]);
        $userRole = \App\Models\Role::create([
            'name' => 'user',
            'display_name' => 'User',
            'description' => 'User Role',
        ]);

    }
}
