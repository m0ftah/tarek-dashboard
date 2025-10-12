<?php

namespace Database\Seeders;

use App\Models\Hero;
use Illuminate\Database\Seeder;

class HeroSeeder extends Seeder
{
    public function run(): void
    {
        Hero::create([
            'subtitle' => 'For website and video editing',
            'subtitle_ar' => 'لتصميم المواقع وتحرير الفيديو',
            'name' => 'Tarek ElShouhdy',
            'name_ar' => 'طارق الشوهدي',
            'button_text' => 'See more about us',
            'button_text_ar' => 'شاهد المزيد عنا',
            'button_link' => '#about',
            'image' => 'heroes/hero-1.jpg', // You'll need to copy this image to storage/app/public/heroes/
            'is_active' => true,
            'order' => 1,
        ]);
    }
}