<footer class="footer">
    <div class="container">
        <div class="footer__top">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="footer__top__logo">
                        <a href="{{ route('home') }}"><img src="{{ asset('img/logo.png') }}" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="footer__top__social">
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
        <div class="footer__option">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="footer__option__item">
                        <h5>About us</h5>
                        <p>{{ $settings['about_description'] ?? 'Formed in 2006 by Matt Hobbs and Cael Jones, Videoprah is an award-winning, full-service production company specializing.' }}</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="footer__option__item">
                        <h5>Contact</h5>
                        @if($settings['contact_email'] ?? '')
                        <p>Email: {{ $settings['contact_email'] }}</p>
                        @endif
                        @if($settings['contact_phone'] ?? '')
                        <p>Phone: {{ $settings['contact_phone'] }}</p>
                        @endif
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="footer__option__item">
                        <h5>Newsletter</h5>
                        <p>Subscribe to our newsletter for updates.</p>
                        <form action="#">
                            <input type="text" placeholder="Email">
                            <button type="submit"><i class="fa fa-send"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer__copyright">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <p class="footer__copyright__text">Copyright &copy; {{ date('Y') }} All rights reserved</p>
                </div>
            </div>
        </div>
    </div>
</footer>