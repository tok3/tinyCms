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
        <header class="z-fixed pt-lg-4 header-absolute-top header-transparent">
            <nav class="navbar navbar-expand-lg navbar-light navbar-link-white">
                <div class="container position-relative">
                    <!--Logo Brand-->
                    <a class="navbar-brand" href="{{ URL::asset('assan/index.html') }}">
                        <img src="{{ URL::asset('assets/img/logo/logo-white.svg') }}" alt="" class="img-fluid">
                    </a>

                    <div class="d-flex align-items-center navbar-no-collapse-items order-lg-last">
                        <button class="navbar-toggler order-last" type="button" data-bs-toggle="collapse"
                            data-bs-target="#mainNavbarTheme" aria-controls="mainNavbarTheme" aria-expanded="false"
                            aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon">
                                <i></i>
                            </span>
                        </button>
                        <!--Navbar Button-->
                        <div class="nav-item me-3 me-lg-0 ms-lg-4 ms-xl-5">
                            <a href="{{ URL::asset('#') }}" class="btn btn-success btn-sm rounded-pill">Purchase</a>
                        </div>
                    </div>

                    <!--Navbar Collapse-->
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

        <x-partials.footers.footer-5 />
        <!-- begin:Back to Top button -->
        <a href="{{ URL::asset('#') }}" class="toTop"><svg class="progress-circle" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
  <circle cx="50" cy="50" r="40" fill="none" stroke="currentColor" stroke-width="4" stroke-dasharray="0, 251.2"></circle>
</svg>
            <i class="bx bxs-up-arrow"></i>
        </a>
        <!-- /end:Back to Top button -->


        <!--begin: Main script -->
        <script src="{{ URL::asset('assets/js/theme.bundle.min.js') }}"></script>
        <!--/end: Main script -->

        <!--begin:Swiper slider-->
        <script src="{{ URL::asset('assets/vendor/node_modules/js/swiper-bundle.min.js') }}"></script>
        <script>
            //Main Hero Slider
            var sliderThumbs = new Swiper('.progress-swiper-thumbs', {
                watchSlidesVisibility: true,
                watchSlidesProgress: true,
                history: false,
                breakpoints: {
                    480: {
                        slidesPerView: 2,
                        spaceBetween: 16,
                    },
                    768: {
                        slidesPerView: 3,
                        spaceBetween: 16,
                    },
                    1024: {
                        slidesPerView: 3,
                        spaceBetween: 16,
                    },
                },
                on: {
                    'afterInit': function (swiper) {
                        swiper.el.querySelectorAll('.swiper-pagination-progress-inner')
                            .forEach($progress => $progress.style.transitionDuration =
                                `${swiper.params.autoplay.delay}ms`)
                    }
                }
            });
            var swiperClassic = new Swiper(".swiper-classic", {
                slidesPerView: 1,
                spaceBetween: 0,
                loop: true,
                grabCursor: true,
                autoplay: {
                    delay: 3000,
                    disableOnInteraction: false,
                },
                effect: "creative",
                creativeEffect: {
                    prev: {
                        shadow: true,
                        translate: ["-20%", 0, -1],
                    },
                    next: {
                        translate: ["100%", 0, 0],
                    },
                },
                thumbs: {
                    swiper: sliderThumbs
                },
            });

            //swiper partners
            var swiperPartners5 = new Swiper(".swiper-partners", {
                slidesPerView: 2,
                loop: true,
                spaceBetween: 16,
                autoplay: true,
                breakpoints: {
                    768: {
                        slidesPerView: 4
                    },
                    1024: {
                        slidesPerView: 5
                    }
                },
                pagination: {
                    el: ".swiper-partners-pagination",
                    clickable: true
                },
                navigation: {
                    nextEl: ".swiper-partners-button-next",
                    prevEl: ".swiper-partners-button-prev"
                }
            });

            //swiper Testimonials
            var swiperTestimonails = new Swiper(".swiper-testimonials", {
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
                    el: ".swiper-testimonials-pagination",
                    clickable: true
                },
                navigation: {
                    nextEl: ".swiper-testimonials-button-next",
                    prevEl: ".swiper-testimonials-button-prev"
                }
            });

        </script>
        <!--/end:Swiper slider-->
    </body>

</html>
