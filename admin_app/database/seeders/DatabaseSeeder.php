<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => Hash::make('12345678'),
        ]);

        DB::table('languages')->insert([
            [
                'name' => 'English',
                'code' => 'en',
                'is_default' => true,
            ],
            [
                'name' => 'Bangla',
                'code' => 'bn',
                'is_default' => false,
            ],
        ]);
    }
}
