<?php

namespace Database\Seeders;

use App\Models\ColorGrading;
use Illuminate\Database\Seeder;

class ColorGradingSeeder extends Seeder
{
    public function run(): void
    {
        $colorGradings = [
            [
                'title' => 'Cinematic Look',
                'title_ar' => 'مظهر سينمائي',
                'description' => 'Professional cinematic color grading with enhanced contrast and mood.',
                'description_ar' => 'تصحيح ألوان سينمائي احترافي مع تحسين التباين والمزاج.',
                'before_image' => 'color-grading/before/example-1.jpg', // You'll need to upload these images
                'after_image' => 'color-grading/after/example-1.jpg',
                'is_active' => true,
                'order' => 1,
            ],
            [
                'title' => 'Warm Tones',
                'title_ar' => 'درجات دافئة',
                'description' => 'Warm color grading perfect for portraits and lifestyle content.',
                'description_ar' => 'تصحيح ألوان دافئ مثالي للصور الشخصية ومحتوى نمط الحياة.',
                'before_image' => 'color-grading/before/example-2.jpg',
                'after_image' => 'color-grading/after/example-2.jpg',
                'is_active' => true,
                'order' => 2,
            ],
            [
                'title' => 'Cool & Dramatic',
                'title_ar' => 'بارد ودرامي',
                'description' => 'Cool tone grading with dramatic shadows and highlights.',
                'description_ar' => 'تصحيح درجات باردة مع ظلال وإضاءات درامية.',
                'before_image' => 'color-grading/before/example-3.jpg',
                'after_image' => 'color-grading/after/example-3.jpg',
                'is_active' => true,
                'order' => 3,
            ],
        ];

        foreach ($colorGradings as $grading) {
            ColorGrading::create($grading);
        }
    }
}