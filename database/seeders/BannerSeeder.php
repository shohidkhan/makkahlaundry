<?php

namespace Database\Seeders;

use App\Enum\PageEnum;
use App\Enum\SectionEnum;
use App\Models\CMS;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CMS::insert(
           [
             [
            'page_name' => PageEnum::HOME,
            'section_name' => SectionEnum::HOME_BANNER,
            'title' => 'Quality Laundry Every Thread',
            'sub_title' => 'TWe Clean, You Shine',
            'description' => 'The best slogan for your laundry service depends on your brand, target audience, and the unique qualities.',
            'background_image' => 'frontend/assets/img/hero/hero_bg_1_1.jpg',
        ],
            [
            'page_name' => PageEnum::HOME,
            'section_name' => SectionEnum::HOME_BANNER,
            'title' => 'Quality Laundry Every Thread',
            'sub_title' => 'TWe Clean, You Shine',
            'description' => 'The best slogan for your laundry service depends on your brand, target audience, and the unique qualities.',
            'background_image' => 'frontend/assets/img/hero/hero_bg_1_2.jpg',
        ],
            [
            'page_name' => PageEnum::HOME,
            'section_name' => SectionEnum::HOME_BANNER,
            'title' => 'Quality Laundry Every Thread',
            'sub_title' => 'TWe Clean, You Shine',
            'description' => 'The best slogan for your laundry service depends on your brand, target audience, and the unique qualities.',
            'background_image' => 'frontend/assets/img/hero/hero_bg_1_3.jpg',
        ],
           ]

        );
    }
}
