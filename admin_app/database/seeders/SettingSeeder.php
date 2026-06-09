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
                'value' => 'Admin Panel'
            ],
            [
                'key' => 'site_email',
                'value' => 'admin@test.com'
            ],
            [
                'key' => 'contact_phone',
                'value' => ''
            ],
            [
                'key' => 'app_name',
                'value' => ''
            ],
            [
                'key' => 'address',
                'value' => ''
            ],
            [
                'key' => 'timezone',
                'value' => 'Asia/Dhaka'
            ],
            [
                'key' => 'pagination_limit',
                'value' => '10'
            ],
            [
                'key' => 'site_logo',
                'value' => ''
            ],
        ]);
    }
}
