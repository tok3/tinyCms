<!doctype html>
<html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="{{ URL::asset('assets/img/favicon.ico') }}" type="image/ico">
        <x-partials.head-includes />

        <!--Swiper slider-->
        <link rel="stylesheet" href="{{ URL::asset('assets/vendor/node_modules/css/swiper-bundle.min.css') }}">
        <!--G-lightbox-->
        <link rel="stylesheet" href="{{ URL::asset('assets/vendor/node_modules/css/glightbox.min.css') }}" />
        <!-- Main CSS -->
        @vite(['resources/scss/theme.scss'])

        <title>Assan 4</title>
    </head>

    <body>
        <x-partials.preloader />
        <!--Header Start-->
        <header class="z-fixed">
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="container-fluid position-relative">
                    <a class="navbar-brand" href="{{ URL::asset('assan/index.html') }}">
                        <img src="{{ URL::asset('assets/img/logo/logo.svg') }}" alt="" class="img-fluid navbar-brand-light">
                        <img src="{{ URL::asset('assets/img/logo/logo-white.svg') }}" alt="" class="img-fluid navbar-brand-dark">
                    </a>
                    <div class="d-flex align-items-center navbar-no-collapse-items order-lg-last">
                        <button class="navbar-toggler order-last" type="button" data-bs-toggle="collapse"
                            data-bs-target="#mainNavbarTheme" aria-controls="mainNavbarTheme" aria-expanded="false"
                            aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon">
                                <i></i>
                            </span>
                        </button>
                        <div class="nav-item me-3 me-lg-0 ms-lg-4 ms-xl-5">
                            <a href="{{ URL::asset('#') }}" class="btn btn-warning rounded-3">Get started</a>
                        </div>
                    </div>
                    <div class="collapse navbar-collapse" id="mainNavbarTheme">
                        <x-partials.headers.default-navbar-items page='home' />
                    </div>
                </div>
            </nav>
        </header>
        <!--Main content-->

        <main class="main-content" id="main-content">
{{$slot}}
        </main>

        <x-partials.footers.footer-3 />

        <!-- begin: Back to Top button -->
        <a href="{{ URL::asset('#') }}" class="toTop">
            <svg class="progress-circle" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
                <circle cx="50" cy="50" r="40" fill="none" stroke="currentColor" stroke-width="4" stroke-dasharray="0, 251.2">
                </circle>
            </svg>
            <i class="bx bxs-up-arrow"></i>
        </a>
        <!-- end: Back to Top button -->


        <!-- begin:scripts -->
        <script src="{{ URL::asset('assets/js/theme.bundle.min.js') }}"></script>
        <script src="{{ URL::asset('assets/vendor/node_modules/js/swiper-bundle.min.js') }}"></script>
        <script>
            const swiper = new Swiper('.swiper-main', {
                spaceBetween: 0,
                effect: "fade",
                autoplay: true,
                loop: true,
            });

        </script>
        <!-- end:scripts -->
    </body>

</html>
