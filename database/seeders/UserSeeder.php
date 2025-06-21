<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Create admin user
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@greengrow.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);        // Create customer users
        User::factory(10)->create([
            'role' => 'customer',
        ]);
    }
}
