<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        view()->composer('layouts.partials.header', function ($view) {
            $settings = [
                'facebook_url' => \App\Models\Setting::get('facebook_url'),
                'twitter_url' => \App\Models\Setting::get('twitter_url'),
                'instagram_url' => \App\Models\Setting::get('instagram_url'),
                'youtube_url' => \App\Models\Setting::get('youtube_url'),
                'snapchat_url' => \App\Models\Setting::get('snapchat_url'),
            ];
            $view->with('settings', $settings);
        });
    }
}
