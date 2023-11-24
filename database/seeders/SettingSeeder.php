<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Setting;


class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $setting = [
            'site_name' => 'OSMS',
            'logo' => 'logo.png',
            'dark_logo' => 'logo.png',
            'favicon' => 'logo.png',
            'default_image' => 'logo.png',
            'currency_text' => 'GBP',
            'currency_symbol' => '£',
            'timezone' => 'Europe/London',
        ];

        Setting::query()->updateOrCreate($setting);
    }
}
