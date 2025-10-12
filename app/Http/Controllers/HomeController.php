<?php

namespace App\Http\Controllers;

use App\Models\Hero;
use App\Models\Service;
use App\Models\Work;
use App\Models\Partner;
use App\Models\Song;
use App\Models\ColorGrading;
use App\Models\Setting;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $data = [
            'heroes' => Hero::active()->get(),
            'services' => Service::active()->get(),
            'works' => Work::active()->get(),
            'partners' => Partner::active()->get(),
            'songs' => Song::active()->limit(2)->get(),
            'colorGradings' => ColorGrading::active()->limit(3)->get(),
            'settings' => $this->getSettings(),
        ];

        return view('frontend.index', $data);
    }

    private function getSettings()
    {
        return [
            'site_name' => Setting::get('site_name', 'Videograph'),
            'about_title' => Setting::get('about_title', 'Who we are?'),
            'about_description' => Setting::get('about_description'),
            'services_title' => Setting::get('services_title', 'What We do?'),
            'services_description' => Setting::get('services_description'),
            'facebook_url' => Setting::get('facebook_url'),
            'twitter_url' => Setting::get('twitter_url'),
            'instagram_url' => Setting::get('instagram_url'),
            'youtube_url' => Setting::get('youtube_url'),
            'dribbble_url' => Setting::get('dribbble_url'),
        ];
    }
}