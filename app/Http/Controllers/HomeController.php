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
            'site_name_ar' => Setting::get('site_name_ar', 'فيديوجراف'),
            'about_title' => Setting::get('about_title', 'Who we are?'),
            'about_title_ar' => Setting::get('about_title_ar', 'من نحن؟'),
            'about_description' => Setting::get('about_description'),
            'about_description_ar' => Setting::get('about_description_ar'),
            'services_title' => Setting::get('services_title', 'What We do?'),
            'services_title_ar' => Setting::get('services_title_ar', 'ماذا نفعل؟'),
            'services_description' => Setting::get('services_description'),
            'services_description_ar' => Setting::get('services_description_ar'),
            'facebook_url' => Setting::get('facebook_url'),
            'twitter_url' => Setting::get('twitter_url'),
            'instagram_url' => Setting::get('instagram_url'),
            'youtube_url' => Setting::get('youtube_url'),
            'snapchat_url' => Setting::get('snapchat_url'),
            'contact_email' => Setting::get('contact_email'),
            'contact_phone' => Setting::get('contact_phone'),
        ];
    }
}