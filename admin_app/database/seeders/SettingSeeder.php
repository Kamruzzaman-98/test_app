<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Setting;

class SettingSeeder extends Seeder
{
    public function run(): void
    {
        Setting::insert([
            [
                'key' => 'site_name',
                'value' => 'My Admin Panel'
            ],
            [
                'key' => 'site_email',
                'value' => 'admin@test.com'
            ],
        ]);
    }
}
