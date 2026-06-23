<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name'              => 'Admin User',
            'email'             => 'admin@example.com',
            'image'             => 'default.png',
            'email_verified_at' => now(),
            'password'          => Hash::make('password123'),
            'remember_token'    => \Str::random(10),
            'created_at'        => now(),
            'updated_at'        => now(),
        ]);

        User::create([
            'name'              => 'Test User',
            'email'             => 'user@example.com',
            'image'             => 'user.png',
            'email_verified_at' => now(),
            'password'          => Hash::make('password123'),
            'remember_token'    => \Str::random(10),
            'created_at'        => now(),
            'updated_at'        => now(),
        ]);
    }
}
