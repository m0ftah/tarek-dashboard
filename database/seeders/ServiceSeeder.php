<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        $services = [
            [
                'title' => 'Motion graphics',
                'title_ar' => 'الرسوم المتحركة',
                'description' => 'Whether you\'re halfway through the editing process, or you haven\'t even started, our post production services can put the finishing touches.',
                'description_ar' => 'سواء كنت في منتصف عملية التحرير، أو لم تبدأ بعد، فإن خدمات ما بعد الإنتاج لدينا يمكن أن تضع اللمسات النهائية.',
                'is_active' => true,
                'order' => 1,
            ],
            [
                'title' => 'Color Grading',
                'title_ar' => 'تصحيح الألوان',
                'description' => 'Color grading is a post-production process in film, video, and photography that involves adjusting an image\'s colors and tones to achieve a specific mood, enhance storytelling, or create a unique visual style.',
                'description_ar' => 'تصحيح الألوان هو عملية ما بعد الإنتاج في الأفلام والفيديو والتصوير الفوتوغرافي التي تتضمن ضبط ألوان الصورة ودرجاتها لتحقيق مزاج معين.',
                'is_active' => true,
                'order' => 2,
            ],
            [
                'title' => 'Songs and voice-over',
                'title_ar' => 'الأغاني والتعليق الصوتي',
                'description' => 'A song with a narrative voice (a voice-over) that explains, introduces, or comments on the music or video content.',
                'description_ar' => 'أغنية مع صوت سردي (تعليق صوتي) يشرح أو يقدم أو يعلق على محتوى الموسيقى أو الفيديو.',
                'is_active' => true,
                'order' => 3,
            ],
            [
                'title' => 'Video Editing',
                'title_ar' => 'تحرير الفيديو',
                'description' => 'Whether you\'re halfway through the editing process, or you haven\'t even started, our post production services can put the finishing touches.',
                'description_ar' => 'سواء كنت في منتصف عملية التحرير، أو لم تبدأ بعد، فإن خدمات ما بعد الإنتاج لدينا يمكن أن تضع اللمسات النهائية.',
                'is_active' => true,
                'order' => 4,
            ],
        ];

        foreach ($services as $service) {
            Service::create($service);
        }
    }
}