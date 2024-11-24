<!DOCTYPE html>
<html class="no-js" lang="zxx">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="x-ua-compatible" content="ie=edge" />
        <title>@yield('title')</title>
        <meta name="description" content="" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <!-- <link rel="manifest" href="site.webmanifest"> -->
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('favicon.ico') }}" />
        <!-- Place favicon.ico in the root directory -->

        <!-- CSS here -->
        <link rel="stylesheet" href="{{ asset('template/assets/css/bootstrap.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('template/assets/css/owl.carousel.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('template/assets/css/slicknav.css') }}" />
        <link rel="stylesheet" href="{{ asset('template/assets/css/animate.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('template/assets/css/magnific-popup.css') }}" />
        <link rel="stylesheet" href="{{ asset('template/assets/css/fontawesome-all.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('template/assets/css/themify-icons.css') }}" />
        <link rel="stylesheet" href="{{ asset('template/assets/css/slick.css') }}" />
        <link rel="stylesheet" href="{{ asset('template/assets/css/nice-select.css') }}" />
        <link rel="stylesheet" href="{{ asset('template/assets/css/style.css') }}" />
        <link rel="stylesheet" href="{{ asset('template/assets/css/responsive.css') }}" />
    </head>

    <body>
        @yield('content')
    </body>
    <!-- All JS Custom Plugins Link Here here -->
    <script src="{{ asset('template') }}/assets/js/vendor/modernizr-3.5.0.min.js"></script>

    <!-- Jquery, Popper, Bootstrap -->
    <script src="{{ asset('template') }}/assets/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="{{ asset('template') }}/assets/js/popper.min.js"></script>
    <script src="{{ asset('template') }}/assets/js/bootstrap.min.js"></script>
    <!-- Jquery Mobile Menu -->
    <script src="{{ asset('template') }}/assets/js/jquery.slicknav.min.js"></script>
</html>
