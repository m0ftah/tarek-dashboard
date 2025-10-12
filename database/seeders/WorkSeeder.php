<?php

namespace Database\Seeders;

use App\Models\Work;
use Illuminate\Database\Seeder;

class WorkSeeder extends Seeder
{
    public function run(): void
    {
        $works = [
            [
                'title' => 'VIP Auto Tires & Service',
                'title_ar' => 'خدمة إطارات السيارات VIP',
                'tags' => ['eCommerce', 'Magento'],
                'image' => 'works/work-1.jpg', // Copy image to storage/app/public/works/
                'video_url' => 'https://www.youtube.com/watch?v=LXb3EKWsInQ',
                'size' => 'wide',
                'is_active' => true,
                'order' => 1,
            ],
            [
                'title' => 'Fashion Commercial',
                'title_ar' => 'إعلان أزياء',
                'tags' => ['Fashion', 'Video'],
                'image' => 'works/work-2.jpg',
                'video_url' => 'https://www.youtube.com/shorts/PMmsi2fuPd8',
                'size' => 'small',
                'is_active' => true,
                'order' => 2,
            ],
            [
                'title' => 'Product Showcase',
                'title_ar' => 'عرض المنتج',
                'tags' => ['Product', 'Commercial'],
                'image' => 'works/work-3.jpg',
                'video_url' => 'https://www.youtube.com/watch?v=LXb3EKWsInQ',
                'size' => 'small',
                'is_active' => true,
                'order' => 3,
            ],
            [
                'title' => 'Corporate Video',
                'title_ar' => 'فيديو شركة',
                'tags' => ['Corporate', 'Business'],
                'image' => 'works/work-4.jpg',
                'video_url' => 'https://www.youtube.com/watch?v=LXb3EKWsInQ',
                'size' => 'large',
                'is_active' => true,
                'order' => 4,
            ],
        ];

        foreach ($works as $work) {
            Work::create($work);
        }
    }
}