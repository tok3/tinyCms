

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

        <!-- Main CSS -->
        @vite(['resources/scss/theme.scss'])

        <title>Assan 4</title>
    </head>

    <body>
    <x-partials.preloader />
    <!--Header Start-->
    <header class="z-fixed header-transparent header-absolute-top pt-lg-3 header-sticky">
        <nav class="navbar navbar-expand-lg navbar-light navbar-link-white">
            <div class="container position-relative">
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

                    <div class="nav-item me-1 position-relative ms-2 ms-lg-3 ms-xl-4">
                        <a href="{{ URL::asset('#') }}"
                           class="btn btn-white p-0 rounded-circle si width-3x height-3x si-colored-linkedin d-flex align-items-center justify-content-center">
                            <i class="bx bxl-linkedin"></i>
                            <i class="bx bxl-linkedin"></i>
                        </a>
                    </div>
                    <div class="nav-item position-relative ms-1 me-3 me-xl-4">
                        <a href="{{ URL::asset('#') }}"
                           class="p-0 rounded-circle si width-3x height-3x si-colored-twitter d-flex align-items-center justify-content-center">
                            <i class="bx bxl-twitter"></i>
                            <i class="bx bxl-twitter"></i>
                        </a>
                    </div>
                    <div class="nav-item me-2 d-none d-xl-flex">
                        <a href="{{ URL::asset('#') }}" class="btn btn-success btn-sm">Purchase</a>
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

    <x-partials.footers.footer-2 />

    <!-- begin:back to Top button -->
    <a href="{{ URL::asset('#') }}" class="toTop"><svg class="progress-circle" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
            <circle cx="50" cy="50" r="40" fill="none" stroke="currentColor" stroke-width="4" stroke-dasharray="0, 251.2"></circle>
        </svg>
        <i class="bx bxs-up-arrow"></i>
    </a>
    <!-- end:back to Top button -->


    <!-- begin:main script -->
    <script src="{{ URL::asset('assets/js/theme.bundle.min.js') }}"></script>
    <!-- end:main script -->

    <!--begin:Swiper slider-->
    <script src="{{ URL::asset('assets/vendor/node_modules/js/swiper-bundle.min.js') }}"></script>
    <script>
        //swiper-testimonials
        var swiperAuto = new Swiper(".swiper-testimonials", {
            slidesPerView: "auto",
            loop: true,
            centeredSlides: true,
            spaceBetween: 16,
            pagination: {
                el: ".swiperAuto-pagination",
                clickable: true,
            },
            navigation: {
                nextEl: ".swiperAuto-button-next",
                prevEl: ".swiperAuto-button-prev",
            }
        });

        //Swiper for text/headings
        var swiperText = new Swiper(".swiper-text", {
            autoplay: true,
            direction: "vertical",
            loop: true,
            grabCursor: false,
            speed: 600
        });

    </script>
    <!--end:Swiper slider-->
    </body>

    </html>

