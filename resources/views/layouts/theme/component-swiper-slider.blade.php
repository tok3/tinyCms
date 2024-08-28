<!doctype html>
<html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="{{ URL::asset('assets/img/favicon.ico') }}" type="image/ico">

        <!--Swiper slider css-->
        <link href="{{ URL::asset('assets/vendor/node_modules/css/swiper-bundle.min.css') }}" rel="stylesheet">
        <x-partials.head-includes />
        <!-- Main CSS -->
        @vite(['resources/scss/theme.scss'])

        <title>Assan 4</title>
    </head>

    <body>
        <x-partials.preloader />
        <!--Header Start-->
        <header class="z-fixed header-transparent header-absolute-top sticky-reverse">
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
                        <div class="nav-item me-3 me-lg-0">
                            <a href="{{ URL::asset('#') }}" class="btn btn-success btn-sm rounded-pill">Purchase</a>
                        </div>
                    </div>
                    <div class="collapse navbar-collapse" id="mainNavbarTheme">
                        <x-partials.headers.default-navbar-items page='components' />
                    </div>
                </div>
            </nav>
        </header>
        <!--Main content-->
        <main>
{{$slot}}
        </main>


        <x-partials.footers.footer-2 />

        <!-- begin Back to Top button -->
        <a href="{{ URL::asset('#') }}" class="toTop"><svg class="progress-circle" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
  <circle cx="50" cy="50" r="40" fill="none" stroke="currentColor" stroke-width="4" stroke-dasharray="0, 251.2"></circle>
</svg>
            <i class="bx bxs-up-arrow"></i>
        </a>
        <!-- scripts -->
        <script src="{{ URL::asset('assets/js/theme.bundle.min.js') }}"></script>

        <!--swiper script-->
        <script src="{{ URL::asset('assets/vendor/node_modules/js/swiper-bundle.min.js') }}"></script>

        <script>
            var swiper = new Swiper(".swiper-1", {
                slidesPerView: 1,
                spaceBetween: 16,
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                },
            });

            var swiper2 = new Swiper(".swiper-2", {
                slidesPerView: 2,
                spaceBetween: 8,
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                },
            });
            var swiper2 = new Swiper(".swiper-3", {
                slidesPerView: 1,
                spaceBetween: 8,
                centerSlides: true,
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                },
                breakpoints: {
                    640: {
                        slidesPerView: 2,
                        spaceBetween: 20,
                    },
                    768: {
                        slidesPerView: 3,
                        spaceBetween: 40,
                    }
                },
            });
            var swiperFlow = new Swiper('.swiper-flow', {
                effect: 'coverflow',
                coverflowEffect: {
                    rotate: 60,
                    slideShadows: false,
                },
            });
            var swiperFade = new Swiper('.swiper-fade', {
                effect: 'fade',
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                },
                fadeEffect: {
                    crossFade: true
                },
            });
            var swiperFade = new Swiper('.swiper-cards', {
                effect: "cards",
                grabCursor: true,
                cardsEffect: {
                    slideShadows: false,
                },
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                }
            });

            //Thumbnails Demo
            var swiperThumb = new Swiper(".swiper-thumbs-thumbnails", {
                freeMode: true,
                watchSlidesVisibility: true,
                watchSlidesProgress: true,
                history: false,
                spaceBetween: 8,
                breakpoints: {
                    480: {
                        slidesPerView: 4,
                        spaceBetween: 8,
                    },
                    768: {
                        slidesPerView: 6,
                        spaceBetween: 8,
                    },
                    1024: {
                        slidesPerView: 8,
                        spaceBetween: 8,
                    },
            }
            });
            var swiperThumbsMain = new Swiper(".swiper-thumbs-main", {
                spaceBetween: 16,
                loop:true,
                autoHeight:true,
                thumbs: {
                    swiper: swiperThumb,
                },
            });

            //Timeline progressbar 
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

            var sliderMain = new Swiper('.swiper-progress-main', {
                loop: true,
                autoplay:{
                    delay:3000,
                    disableOnInteraction:false,
                },
                thumbs: {
                    swiper: sliderThumbs
                },
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                },
            })

        </script>
    </body>

</html>
