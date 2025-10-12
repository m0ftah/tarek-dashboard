<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            HeroSeeder::class,
            ServiceSeeder::class,
            WorkSeeder::class,
            PartnerSeeder::class,
            SongSeeder::class,
            ColorGradingSeeder::class,
            SettingSeeder::class,
        ]);
    }
}
