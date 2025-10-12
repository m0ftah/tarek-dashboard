<header class="header">
    <div class="container">
        <div class="row">
            <div class="col-lg-2">
                <div class="header__logo">
                    <a href="{{ route('home') }}"><img src="{{ asset('img/logo.png') }}" alt=""></a>
                </div>
            </div>
            <div class="col-lg-10">
                <div class="header__nav__option">
                    <nav class="header__nav__menu mobile-menu">
                        <ul>
                            <li class="active"><a href="{{ route('home') }}" data-translate="nav_home">Home</a></li>
                            <li><a href="{{ route('home') }}#about" data-translate="nav_about">About</a></li>
                            <li><a href="{{ route('home') }}#portfolio" data-translate="nav_portfolio">Portfolio</a></li>
                            <li><a href="{{ route('home') }}#services" data-translate="nav_services">Services</a></li>
                            <li><a href="{{ route('home') }}#contact" data-translate="nav_contact">Contact</a></li>
                        </ul>
                    </nav>
                    <div class="header__nav__social">
                        <div class="language-toggle">
                            <button id="lang-toggle" class="lang-btn">العربية</button>
                        </div>
                        @if($settings['facebook_url'] ?? '')
                        <a href="{{ $settings['facebook_url'] }}"><i class="fa fa-facebook"></i></a>
                        @endif
                        @if($settings['twitter_url'] ?? '')
                        <a href="{{ $settings['twitter_url'] }}"><i class="fa fa-twitter"></i></a>
                        @endif
                        @if($settings['dribbble_url'] ?? '')
                        <a href="{{ $settings['dribbble_url'] }}"><i class="fa fa-dribbble"></i></a>
                        @endif
                        @if($settings['instagram_url'] ?? '')
                        <a href="{{ $settings['instagram_url'] }}"><i class="fa fa-instagram"></i></a>
                        @endif
                        @if($settings['youtube_url'] ?? '')
                        <a href="{{ $settings['youtube_url'] }}"><i class="fa fa-youtube-play"></i></a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div id="mobile-menu-wrap"></div>
    </div>
</header>