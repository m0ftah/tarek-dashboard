<?php

namespace Database\Seeders;

use App\Models\Song;
use Illuminate\Database\Seeder;

class SongSeeder extends Seeder
{
    public function run(): void
    {
        $songs = [
            [
                'title' => 'Epic Cinematic Track',
                'title_ar' => 'موسيقى سينمائية ملحمية',
                'description' => 'A powerful cinematic soundtrack for dramatic video content.',
                'description_ar' => 'موسيقى تصويرية سينمائية قوية لمحتوى فيديو درامي.',
                'thumbnail' => 'songs/song-1.jpg', // Copy to storage/app/public/songs/
                'video_url' => 'https://www.youtube.com/watch?v=_rYD2coMXzs',
                'is_active' => true,
                'order' => 1,
            ],
            [
                'title' => 'Uplifting Background Music',
                'title_ar' => 'موسيقى خلفية ملهمة',
                'description' => 'Upbeat and inspiring music for commercial projects.',
                'description_ar' => 'موسيقى متفائلة وملهمة للمشاريع التجارية.',
                'thumbnail' => 'songs/song-2.jpg',
                'video_url' => 'https://www.youtube.com/watch?v=_rYD2coMXzs',
                'is_active' => true,
                'order' => 2,
            ],
        ];

        foreach ($songs as $song) {
            Song::create($song);
        }
    }
}