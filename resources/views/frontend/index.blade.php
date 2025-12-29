@extends('layouts.frontend')

@section('title', $settings['site_name'] ?? 'Videograph')

@section('content')

    <!-- Hero Section Begin -->
    @php
        $hero = $heroes->first();
        if ($hero && $hero->image) {
            $heroImage = asset('storage/' . $hero->image);
        } else {
            $heroImage = asset('img/hero/hero-1.jpg');
        }
    @endphp
    <section class="hero set-bg" data-setbg="{{ $heroImage }}"
             style="background-image: url('{{ $heroImage }}') !important; background-size: cover !important; background-position: center center !important; background-repeat: no-repeat !important; height: 684px !important; background-color: transparent !important;">
        <div class="hero__item">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="hero__text">
                            <span
                                data-translate="hero_subtitle">{{ $hero->subtitle ?? 'Welcome to our website' }}</span>
                            <h2 data-translate="hero_name">{{ $hero->name ?? 'Videograph' }}</h2>
                            <a href="{{ $hero->button_link ?? '#' }}" class="primary-btn"
                               data-translate="hero_button">{{ $hero->button_text ?? 'Discover' }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- About Section Begin -->
    <section class="about spad fade-up set-bg" data-setbg="{{ asset('img/sections/back1.avif') }}"
             style="background-image: url('{{ asset('img/sections/back2.avif') }}'); background-repeat: no-repeat; background-size: cover; background-position: center;"
             id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="about__pic fade-in-left">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="about__pic__item about__pic__item--large set-bg"
                                     data-setbg="{{ asset('img/about/about-1.jpg') }}"></div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="about__pic__item set-bg"
                                             data-setbg="{{ asset('img/about/about-2.jpg') }}"></div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="about__pic__item set-bg"
                                             data-setbg="{{ asset('img/about/about-3.jpg') }}"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about__text fade-in-right">
                        <div class="section-title">
                            <span data-translate="about_subtitle">About videograph</span>
                            <h2 data-translate="about_title">{{ $settings['about_title'] }}</h2>
                        </div>
                        {{--                    {{dd($settings['about_description_ar'])}}--}}
                        <div class="about__text__desc">
                            <p class="about-description" data-desc-en="{{ $settings['about_description'] }}"
                               data-desc-ar="{{ $settings['about_description_ar'] ?? $settings['about_description'] }}">{{ $settings['about_description'] }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- About Section End -->

    <!-- Services Section Begin -->
    <section class="services spad fade-up set-bg" data-setbg="{{ asset('img/sections/back2.avif') }}"
             style="background-image: url('{{ asset('img/sections/back1.avif') }}'); background-repeat: no-repeat; background-size: cover; background-position: center;"
             id="services">
        <div class="container service-item">
            <div class="row">
                <div class="col-lg-4">
                    <div class="services__title fade-in-left">
                        <div class="section-title">
                            <span data-translate="services_subtitle">Our services</span>
                            <h2 data-translate="services_title">{{ $settings['services_title'] }}</h2>
                        </div>
                        <p data-translate="services_description">{{ $settings['services_description'] }}</p>
                    </div>
                </div>
                <div class="col-lg-8 ">
                    <div class="row">
                        @foreach($services as $index => $service)
                            <div class="col-lg-6 col-md-6 col-sm-6 service-item">
                                <div class="services__item fade-in-scale animate-delay-{{ $index + 1 }}">
                                    @if($service->icon)
                                        <div class="services__item__icon">
                                            <img src="{{ Storage::disk('public')->url($service->icon) }}"
                                                 alt="{{ $service->title }}">
                                        </div>
                                    @endif
                                    <h4 class="service-title" data-title-en="{{ $service->title }}"
                                        data-title-ar="{{ $service->title_ar ?? $service->title }}">{{ $service->title }}</h4>
                                    <p class="service-description" data-desc-en="{{ $service->description }}"
                                       data-desc-ar="{{ $service->description_ar ?? $service->description }}">{{ $service->description }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Services Section End -->

    <!-- Work Section Begin -->
    <section class="work fade-up" id="portfolio">
        <div class="row">
            <div class="col-lg-12">
                <div class=" center-title">
                    <span data-translate="work_subtitle">Our Portfolio</span>
                    <h2 data-translate="work_title">Recent Work</h2>
                </div>
            </div>
        </div>
        <div class="work__gallery">
            <div class="grid-sizer"></div>
            @foreach($works as $work)
                <a href="{{ $work->video_url }}" target="_blank">
                    <div class="work__item {{ $work->size }}__item set-bg"
                         data-setbg="{{ Storage::disk('public')->url($work->image) }}">
                        @if($work->video_icon)<div class="play-btn video-popup"><i class="fa fa-play"></i></div>@endif
                        @if($work->title)
                            <div class="work__item__hover">
                                <h4 class="work-title" data-title-en="{{ $work->title }}" data-title-ar="{{ $work->title_ar ?? $work->title }}">{{ $work->title }}</h4>
                                @if($work->tags)
                                    <ul class="work-tags" data-tags-en="{{ json_encode($work->tags) }}" data-tags-ar="{{ json_encode($work->tags_ar ?? $work->tags) }}">
                                        @foreach($work->tags as $tag)
                                            <li>{{ $tag }}</li>
                                        @endforeach
                                    </ul>
                                @endif
                            </div>
                        @endif
                    </div>
                </a>
                @endforeach
    </section>
    <!-- Work Section End -->

    <!-- Griding Section Begin -->
    <section class="griding-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title team__title">
                        <span data-translate="color_grading_subtitle">Color Grading</span>
                        <h2 data-translate="color_grading_title">Before & After</h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="video-wrapper">
            <video width="100%" controls>
                <source src="{{ asset('img/vids/griding-vid.mp4') }}" type="video/mp4">
                Your browser does not support the video tag.
            </video>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2 data-translate="color_grading_interactive">Interactive Comparisons</h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="griding-container">
            @foreach($colorGradings as $index => $grading)
                <div class="griding-card">
                    <div class="griding-viewer" id="viewer{{ $index + 1 }}"
                         data-before="{{ Storage::disk('public')->url($grading->before_image) }}"
                         data-after="{{ Storage::disk('public')->url($grading->after_image) }}">
                        <canvas class="griding-layer" id="canvasOriginal{{ $index + 1 }}"></canvas>
                        <canvas class="griding-layer griding-graded" id="canvasGraded{{ $index + 1 }}"></canvas>
                        <div class="griding-divider" id="divider{{ $index + 1 }}"></div>
                        <div class="griding-handle" id="handle{{ $index + 1 }}">⇆</div>
                    </div>
                    @if($grading->title)
                        <div class="griding-card-info">
                            <h4 class="grading-title" data-title-en="{{ $grading->title }}"
                                data-title-ar="{{ $grading->title_ar ?? $grading->title }}">{{ $grading->title }}</h4>
                            @if($grading->description)
                                <p class="grading-description" data-desc-en="{{ $grading->description }}"
                                   data-desc-ar="{{ $grading->description_ar ?? $grading->description }}">{{ $grading->description }}</p>
                            @endif
                        </div>
                    @endif
                </div>
            @endforeach
        </div>
    </section>
    <!-- Griding Section End -->

    <!-- Partners Section Begin -->
    <section class="partners fade-up">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="partners__content fade-in-left">
                        <h2 data-translate="partners_title">We Work With the<br>Best Partners</h2>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="partners__logos fade-in-right">
                        <div class="row">
                            @foreach($partners as $index => $partner)
                                <div class="col-6">
                                    <div class="partners__logo fade-in-scale animate-delay-{{ $index + 1 }}">
                                        <a href="{{$partner->website}}"><img src="{{ Storage::disk('public')->url($partner->logo) }}"
                                                        alt="{{ $partner->name }}"></a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Partners Section End -->

    <!-- Songs Section Begin -->
    <section class="portfolio spad fade-up set-bg" data-setbg="{{ asset('img/sections/back3.avif') }}"
             style="background-image: url('{{ asset('img/sections/back3.avif') }}'); background-repeat: no-repeat; background-size: cover; background-position: center;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title team__title fade-in-left" style="background: transparent !important;">
                        <span data-translate="songs_subtitle">Pieces of My Work</span>
                        <h2 data-translate="songs_title">Songs Taken</h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                @foreach($songs as $index => $song)
                    <div class="col-lg-5 col-md-6 col-sm-6">
                        <div class="portfolio__item fade-in-scale animate-delay-{{ $index + 1 }}">
                            <div class="portfolio__item__video set-bg"
                                 data-setbg="{{ Storage::disk('public')->url($song->thumbnail) }}">
                                <a href="{{ $song->video_url }}" class="play-btn video-popup"><i class="fa fa-play"></i></a>
                            </div>
                            <div class="portfolio__item__text">
                                <h4 class="song-title" data-title-en="{{ $song->title }}"
                                    data-title-ar="{{ $song->title_ar ?? $song->title }}">{{ $song->title }}</h4>
                                @if($song->description)
                                    <p class="song-description" data-desc-en="{{ $song->description }}"
                                       data-desc-ar="{{ $song->description_ar ?? $song->description }}">{{ $song->description }}</p>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Songs Section End -->

@endsection

@push('scripts')
@endpush
