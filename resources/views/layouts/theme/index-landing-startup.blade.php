<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="icon" href="{{ URL::asset('assets/img/favicon.ico') }}" type="image/ico" />
    <x-partials.head-includes />
    <!--Vendors css-->
    <link rel="stylesheet" href="{{ URL::asset('assets/vendor/node_modules/css/glightbox.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/vendor/node_modules/css/swiper-bundle.min.css') }}">

    <x-partials.head-includes />

    <!-- Main CSS -->
    @vite(['resources/scss/theme.scss'])
    <title>Assan 4</title>
</head>


<body>
    <x-partials.preloader />

    <!--Header Start-->
    <header class="z-fixed header-transparent header-absolute-top sticky-reverse">
        <nav class="navbar navbar-expand-lg navbar-light z-fixed">
            <div class="container position-relative">
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
                    <div class="nav-item position-relative ps-lg-4 me-3 me-lg-0">
                        <a href="{{ URL::asset('#') }}" class="btn btn-outline-success border-2 btn-sm position-relative">Get
                            started</a>
                    </div>
                </div>
                <div class="collapse navbar-collapse" id="mainNavbarTheme">
                    <x-partials.headers.default-navbar-items page="home" />
                </div>
            </div>
        </nav>
    </header>


    <!--Main content-->
    <main>
{{$slot}}
    </main>

    <x-partials.footers.footer-6 />
    <!-- begin Back to Top button -->
    <a href="{{ URL::asset('#') }}" class="toTop"><svg class="progress-circle" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
            <circle cx="50" cy="50" r="40" fill="none" stroke="currentColor" stroke-width="4"
                stroke-dasharray="0, 251.2"></circle>
        </svg>
        <i class="bx bxs-up-arrow"></i>
    </a>
    <!-- scripts -->
    <script src="{{ URL::asset('assets/js/theme.bundle.min.js') }}"></script>

    <!--Swiper slider-->
    <script src="{{ URL::asset('assets/vendor/node_modules/js/swiper-bundle.min.js') }}"></script>
    <script>
        //swiper -partners
        var swiperPartners = new Swiper(".swiper-partners", {
            slidesPerView: 3,
            loop: true,
            spaceBetween: 16,
            autoplay: true,
            breakpoints: {
                768: {
                    slidesPerView: 4
                },
                1024: {
                    slidesPerView: 6
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

    </script>
</body>

</html>
