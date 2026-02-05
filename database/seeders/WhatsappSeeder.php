<?php

namespace Database\Seeders;

use App\Models\Whatsapp;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WhatsappSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Whatsapp::create( [
            'number' => '+8801879738480',
        ]);
    }
}
