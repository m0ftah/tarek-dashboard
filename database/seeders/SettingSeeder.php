<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    public function run(): void
    {
        $settings = [
            ['key' => 'site_name', 'value' => 'Videograph', 'group' => 'general'],
            ['key' => 'site_name_ar', 'value' => 'فيديوجراف', 'group' => 'general'],
            ['key' => 'about_title', 'value' => 'Who we are?', 'group' => 'about'],
            ['key' => 'about_title_ar', 'value' => 'من نحن؟', 'group' => 'about'],
            ['key' => 'about_description', 'value' => 'Tarek ElShouhdy is a cinematographer and visual storyteller known for shaping mood and atmosphere through considered lighting, lens choice, and camera movement.', 'group' => 'about'],
            ['key' => 'services_title', 'value' => 'What We do?', 'group' => 'services'],
            ['key' => 'services_title_ar', 'value' => 'ماذا نفعل؟', 'group' => 'services'],
            ['key' => 'services_description', 'value' => 'If you hire a videographer of our team you will get a video professional to make a custom video for your business.', 'group' => 'services'],
        ];

        foreach ($settings as $setting) {
            Setting::create($setting);
        }
    }
}