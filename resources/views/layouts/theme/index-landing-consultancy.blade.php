<!doctype html>
<html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="{{ URL::asset('assets/img/favicon.ico') }}" type="image/ico">

        <!--Vendor css-->
        <link rel="stylesheet" href="{{ URL::asset('assets/fonts/boxicons/css/boxicons.min.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('assets/fonts/iconsmind/iconsmind.css') }}">
        <link href="{{ URL::asset('assets/vendor/node_modules/css/aos.css') }}" rel="stylesheet">

        <!--Google Fonts-->
        <link rel="preconnect" href="{{ URL::asset('https://fonts.googleapis.com') }}">
        <link rel="preconnect" href="{{ URL::asset('https://fonts.gstatic.com') }}" crossorigin>
        <link href="{{ URL::asset('https://fonts.googleapis.com/css2?family=DM+Sans:wght@100..900&family=DM+Serif+Display:ital@0;1&display=swap') }}" rel="stylesheet"> 
        <!--Swiper slider-->
        <link rel="stylesheet" href="{{ URL::asset('assets/vendor/node_modules/css/swiper-bundle.min.css') }}">
         <!--splitting text animation css-->
         <link rel="stylesheet" href="{{ URL::asset('assets/css/splitting-text.min.css') }}">
        <!-- Main CSS -->
        <link href="{{ URL::asset('assets/css/theme-purple.min.css') }}" rel="stylesheet">

        <title>Assan 4</title>
    </head>

    <body>
        <x-partials.preloader />

        <!--Header Start-->
        <header class="z-fixed pt-lg-3 header-absolute-top header-boxed header-sticky">
            <div class="container text-white position-relative d-none d-lg-block">
                <div class="row">
                    <div class="col-md-8 ms-auto">
                        <div class="d-flex justify-content-end">
                            <a href="{{ URL::asset('tel:+011234567890') }}" class="text-white small me-4">
                                <i class="bx bx-phone me-1"></i>
                                +01 1234 567 890
                            </a>
                            <a href="{{ URL::asset('mailto:consult@company.com') }}" class="text-white small">
                                <i class="bx bx-envelope me-1"></i>
                                consult@company.com
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="navbar-boxed">
                <div class="container">

                    <nav class="navbar navbar-expand-lg navbar-light navbar-link-white rounded-3">

                        <!--Logo-->
                        <a class="navbar-brand" href="{{ URL::asset('assan/index.html') }}">
                            <img src="{{ URL::asset('assets/img/logo/logo.svg') }}" alt="" class="img-fluid navbar-brand-sticky">
                            <img src="{{ URL::asset('assets/img/logo/logo-white.svg') }}" alt="" class="img-fluid navbar-brand-transparent">
                        </a>
                        <div class="d-flex align-items-center navbar-no-collapse-items order-lg-last">
                            <button class="navbar-toggler order-last" type="button" data-bs-toggle="collapse"
                                data-bs-target="#mainNavbarTheme" aria-controls="mainNavbarTheme" aria-expanded="false"
                                aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon">
                                    <i></i>
                                </span>
                            </button>
                            <div class="nav-item me-2 me-lg-0">
                                <a href="{{ URL::asset('#') }}" class="btn btn-primary py-1 px-3">Get started
                                </a>
                            </div>
                        </div>
                        <div class="collapse navbar-collapse" id="mainNavbarTheme">
                            <x-partials.headers.default-navbar-items page='home' />
                        </div>
                    </nav>

                </div>
            </div>
        </header>


        <main>
{{$slot}}
        </main>


        <!--Footer Start-->
        <x-partials.footers.footer-7 />

        <!-- begin Back to Top button -->
        <a href="{{ URL::asset('#') }}" class="toTop"><svg class="progress-circle" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
  <circle cx="50" cy="50" r="40" fill="none" stroke="currentColor" stroke-width="4" stroke-dasharray="0, 251.2"></circle>
</svg>
            <i class="bx bxs-up-arrow"></i>
        </a>
        <!-- scripts -->
        <script src="{{ URL::asset('assets/js/theme.bundle.min.js') }}"></script>
        <!--Splitting-->
        <script src="{{ URL::asset('assets/vendor/node_modules/js/splitting.min.js') }}"></script>

        <!--SwiperSlider-->
        <script src="{{ URL::asset('assets/vendor/node_modules/js/swiper-bundle.min.js') }}"></script>
        <script>
            Splitting();
            //Splitting text

            //Swiper Slider
            var swiper3 = new Swiper(".swiper-3", {
                autoHeight: true,
                spaceBetween: 16,
                breakpoints: {
                    640: {
                        slidesPerView: 1,
                        spaceBetween: 16
                    },
                    768: {
                        slidesPerView: 2,
                        spaceBetween: 16
                    },
                    1024: {
                        slidesPerView: 3,
                        spaceBetween: 30
                    }
                },
                pagination: {
                    el: ".swiper3-pagination",
                    clickable: true
                },
                navigation: {
                    nextEl: ".swiper3-button-next",
                    prevEl: ".swiper3-button-prev"
                }
            });

        </script>
    </body>

</html>
