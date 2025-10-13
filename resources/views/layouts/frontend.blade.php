<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Videograph Template">
    <meta name="keywords" content="Videograph, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Videograph | Template')</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Play:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{ asset('css/filament/bootstrap.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/filament/font-awesome.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/filament/elegant-icons.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/filament/owl.carousel.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/filament/magnific-popup.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/filament/slicknav.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/filament/style.css') }}" type="text/css">

    @stack('styles')
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    @include('layouts.partials.header')

    @yield('content')

    @include('layouts.partials.footer')

    <!-- Js Plugins -->
    <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('js/mixitup.min.js') }}"></script>
    <script src="{{ asset('js/masonry.pkgd.min.js') }}"></script>
    <script src="{{ asset('js/jquery.slicknav.js') }}"></script>
    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="{{ asset('js/griding.js') }}"></script>
    <script src="{{ asset('js/scroll-animations.js') }}"></script>
    <script src="{{ asset('js/translations.js') }}"></script>

    @stack('scripts')
</body>
</html>