<?php

namespace Database\Seeders;

use App\Models\SystemSetting;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class SystemSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SystemSetting::insert([
            [
                'id'             => 1,
                'title'          => 'REI DEAL DESK LLC',
                'email'          => 'support@gmail.com',
                'system_name'    => 'REI DEAL DESK LLC',
                'copyright_text' => '© 2025 REI DEAL DESK LLC. All rights reserved.',
                'logo'           => "frontend/assets/img/pre-logo.webp",
                'favicon'        => "frontend/assets/img/favicon.png",
                'description'    => 'The Description',
                'created_at'     => Carbon::now(),
            ],
        ]);
    }
}