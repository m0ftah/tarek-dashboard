<section id="contact">
    <footer class="footer">
        <div class="container">
            <div class="footer__top">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="footer__top__logo">
                            @php
                                $logo = \App\Models\Setting::get('logo');
                            @endphp
                            <a href="{{ route('home') }}">
                                <img src="{{ $logo ? asset('storage/' . $logo) : asset('img/logo.png') }}" alt="{{ $settings['site_name'] ?? 'Logo' }}">
                            </a>
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
                            @if($settings['snapchat_url'] ?? '')
                                <a href="{{ $settings['snapchat_url'] }}"><i class="fa fa-snapchat-ghost"></i></a>
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
                            <h5 data-translate="footer_about_title">About us</h5>
                            <p class="footer-about-description" data-desc-en="{{ $settings['about_description'] ?? 'Formed in 2006 by Matt Hobbs and Cael Jones, Videoprah is an award-winning, full-service production company specializing.' }}" data-desc-ar="{{ $settings['about_description_ar'] ?? $settings['about_description'] ?? 'Formed in 2006 by Matt Hobbs and Cael Jones, Videoprah is an award-winning, full-service production company specializing.' }}">{{ $settings['about_description'] ?? 'Formed in 2006 by Matt Hobbs and Cael Jones, Videoprah is an award-winning, full-service production company specializing.' }}</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="footer__option__item">
                            <h5 data-translate="footer_contact">Contact</h5>
                            @if($settings['contact_email'] ?? '')
                                <p><span data-translate="footer_email">Email</span>: {{ $settings['contact_email'] }}</p>
                            @endif
                            @if($settings['contact_phone'] ?? '')
                                <p><span data-translate="footer_phone">Phone</span>: {{ $settings['contact_phone'] }}</p>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <div class="footer__option__item">
                            <h5 data-translate="footer_newsletter">Location</h5>
                            <p data-translate="footer_newsletter_text">Libya, Benghazi</p>
{{--                            <form action="#">--}}
{{--                                <input type="text" placeholder="" data-translate-placeholder="footer_email_placeholder">--}}
{{--                                <button type="submit"><i class="fa fa-send"></i></button>--}}
{{--                            </form>--}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer__copyright">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <p class="footer__copyright__text" data-translate="footer_copyright">Copyright &copy; {{ date('Y') }} All rights reserved</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>

</section>
