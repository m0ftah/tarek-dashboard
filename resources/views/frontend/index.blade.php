@extends('layouts.frontend')

@section('title', $settings['site_name'] ?? 'Videograph')

@section('content')

<!-- Hero Section Begin -->
<section class="hero">
    <div class="hero__slider owl-carousel">
        @foreach($heroes as $hero)
        <div class="hero__item set-bg" data-setbg="{{ Storage::url($hero->image) }}" style="background-image: url('{{ Storage::url($hero->image) }}'); background-size: cover; background-position: center; background-repeat: no-repeat;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="hero__text">
                            <span data-translate="hero_subtitle">{{ $hero->subtitle }}</span>
                            <h2 data-translate="hero_name">{{ $hero->name }}</h2>
                            <a href="{{ $hero->button_link }}" class="primary-btn" data-translate="hero_button">{{ $hero->button_text }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>
<!-- Hero Section End -->

<!-- About Section Begin -->
<section class="about spad fade-up" id="about">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="about__pic fade-in-left">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="about__pic__item about__pic__item--large set-bg" data-setbg="{{ asset('img/about/about-1.jpg') }}"></div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="about__pic__item set-bg" data-setbg="{{ asset('img/about/about-2.jpg') }}"></div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="about__pic__item set-bg" data-setbg="{{ asset('img/about/about-3.jpg') }}"></div>
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
                    <div class="about__text__desc">
                        <p>{{ $settings['about_description'] }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- About Section End -->

<!-- Services Section Begin -->
<section class="services spad fade-up" id="services">
    <div class="container">
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
            <div class="col-lg-8">
                <div class="row">
                    @foreach($services as $index => $service)
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="services__item fade-in-scale animate-delay-{{ $index + 1 }}">
                            @if($service->icon)
                            <div class="services__item__icon">
                                <img src="{{ Storage::url($service->icon) }}" alt="{{ $service->title }}">
                            </div>
                            @endif
                            <h4>{{ $service->title }}</h4>
                            <p>{{ $service->description }}</p>
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
            <div class="section-title center-title">
                <span>Our Portfolio</span>
                <h2>Recent Work</h2>
            </div>
        </div>
    </div>
    <div class="work__gallery">
        <div class="grid-sizer"></div>
        @foreach($works as $work)
        <div class="work__item {{ $work->size }}__item set-bg" data-setbg="{{ Storage::url($work->image) }}">
            <a href="{{ $work->video_url }}" class="play-btn video-popup"><i class="fa fa-play"></i></a>
            @if($work->title)
            <div class="work__item__hover">
                <h4>{{ $work->title }}</h4>
                @if($work->tags)
                <ul>
                    @foreach($work->tags as $tag)
                    <li>{{ $tag }}</li>
                    @endforeach
                </ul>
                @endif
            </div>
            @endif
        </div>
        @endforeach
    </div>
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
                    <h3 data-translate="color_grading_interactive">Interactive Comparisons</h3>
                </div>
            </div>
        </div>
    </div>

    <div class="griding-container">
        @foreach($colorGradings as $index => $grading)
        <div class="griding-card">
            <div class="griding-viewer" id="viewer{{ $index + 1 }}" data-before="{{ Storage::url($grading->before_image) }}" data-after="{{ Storage::url($grading->after_image) }}">
                <canvas class="griding-layer" id="canvasOriginal{{ $index + 1 }}"></canvas>
                <canvas class="griding-layer griding-graded" id="canvasGraded{{ $index + 1 }}"></canvas>
                <div class="griding-divider" id="divider{{ $index + 1 }}"></div>
                <div class="griding-handle" id="handle{{ $index + 1 }}">⇆</div>
            </div>
            @if($grading->title)
            <div class="griding-card-info">
                <h4>{{ $grading->title }}</h4>
                @if($grading->description)
                <p>{{ $grading->description }}</p>
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
                                <img src="{{ Storage::url($partner->logo) }}" alt="{{ $partner->name }}">
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
<section class="portfolio spad fade-up">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title team__title fade-in-left">
                    <span data-translate="songs_subtitle">Pieces of My Work</span>
                    <h2 data-translate="songs_title">Songs Taken</h2>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            @foreach($songs as $index => $song)
            <div class="col-lg-5 col-md-6 col-sm-6">
                <div class="portfolio__item fade-in-scale animate-delay-{{ $index + 1 }}">
                    <div class="portfolio__item__video set-bg" data-setbg="{{ Storage::url($song->thumbnail) }}">
                        <a href="{{ $song->video_url }}" class="play-btn video-popup"><i class="fa fa-play"></i></a>
                    </div>
                    <div class="portfolio__item__text">
                        <h4>{{ $song->title }}</h4>
                        @if($song->description)
                        <p>{{ $song->description }}</p>
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
<script>
    $(document).ready(function() {
        // Force background image loading
        $('.set-bg').each(function () {
            var bg = $(this).data('setbg');
            if (bg) {
                $(this).css('background-image', 'url(' + bg + ')');
                $(this).css('background-size', 'cover');
                $(this).css('background-position', 'center');
                $(this).css('background-repeat', 'no-repeat');
            }
        });
    });
</script>
@endpush