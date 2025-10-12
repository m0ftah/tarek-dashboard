<?php

namespace Database\Seeders;

use App\Models\Partner;
use Illuminate\Database\Seeder;

class PartnerSeeder extends Seeder
{
    public function run(): void
    {
        $partners = [
            [
                'name' => 'Tech Company',
                'logo' => 'partners/logo-1.png', // Copy logo to storage/app/public/partners/
                'website' => 'https://example.com',
                'is_active' => true,
                'order' => 1,
            ],
            [
                'name' => 'Creative Studio',
                'logo' => 'partners/logo-2.png',
                'website' => 'https://example.com',
                'is_active' => true,
                'order' => 2,
            ],
            [
                'name' => 'Media Group',
                'logo' => 'partners/logo-3.png',
                'website' => 'https://example.com',
                'is_active' => true,
                'order' => 3,
            ],
            [
                'name' => 'Production House',
                'logo' => 'partners/logo-4.png',
                'website' => 'https://example.com',
                'is_active' => true,
                'order' => 4,
            ],
        ];

        foreach ($partners as $partner) {
            Partner::create($partner);
        }
    }
}