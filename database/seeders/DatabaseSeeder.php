<?php

namespace Database\Seeders;


use App\Domains\User\Models\User;
use App\Domains\User\Models\Role;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
       // 1. Store the roles
        $this->call(RoleSeeder::class);

        // 2. Fetch roles
        $roles = Role::all()->pluck('id');

        // 3. Create users
        $users = User::factory(20)->create();

        // 4. Assign roles to each user
        foreach ($users as $user) {
            $userRoles = $roles->random(rand(1, 2))->toArray(); // 1 or 2 roles
            $user->roles()->attach($userRoles); // inserts into role_user pivot
        }
    }
}
