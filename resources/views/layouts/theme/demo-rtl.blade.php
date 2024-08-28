<!doctype html>
<html lang="ar" dir="rtl">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="{{ URL::asset('assets/img/favicon.ico') }}" type="image/ico">
        <!--Vendors Css-->
        <link rel="stylesheet" href="{{ URL::asset('assets/fonts/boxicons/css/boxicons.min.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('assets/fonts/iconsmind/iconsmind.css') }}">
        <link href="{{ URL::asset('assets/vendor/node_modules/css/aos.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="{{ URL::asset('assets/vendor/node_modules/css/swiper-bundle.min.css') }}">

        <!--Google Fonts-->
        <link rel="preconnect" href="{{ URL::asset('https://fonts.googleapis.com') }}">
        <link rel="preconnect" href="{{ URL::asset('https://fonts.gstatic.com') }}" crossorigin>
        <link href="{{ URL::asset('https://fonts.googleapis.com/css2?family=Amiri:ital@0;1&family=Cairo:wght@200..1000&display=swap') }}" rel="stylesheet">

        <!-- Main CSS -->
        <link href="{{ URL::asset('assets/css/theme.rtl.min.css') }}" rel="stylesheet">

        <title>Assan 4</title>
    </head>

    <body>
        <x-partials.preloader />

        <!--begin:Header-->
        <header class="header-transparent sticky-fixed">

            <!--begin:navbar-->
            <nav class="navbar navbar-expand-lg fixed-top navbar-dark">
                <!--Navbar-fixed-background-->
                <div class="navbar-fixed-bg position-absolute"></div>
                <div class="container position-relative z-1">
                    <!--begin:logo-->
                    <a class="navbar-brand" href="{{ URL::asset('assan/index.html') }}">
                        <img src="{{ URL::asset('assets/img/logo/logo-white.svg') }}" alt="" class="img-fluid">
                    </a>
                    <!--end:logo-->

                    <!--begin:navbar-no-collapse-items-->
                    <div class="d-flex align-items-center navbar-no-collapse-items order-lg-last">
                        <!--Navbar toggler button-->
                        <button class="navbar-toggler order-last" type="button" data-bs-toggle="collapse"
                            data-bs-target="#mainNavbarTheme" aria-controls="mainNavbarTheme" aria-expanded="false"
                            aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon">
                                <i></i>
                            </span>
                        </button>
                        <!--Offcanvas trigger-->
                        <div class="nav-item me-3 ms-lg-5 me-lg-0">
                            <a class="btn btn-white shadow hover-shadow-lg hover-lift p-0 width-3x height-3x rounded-circle flex-center" data-bs-toggle="offcanvas" href="{{ URL::asset('#offcanvasExample') }}" role="button" aria-controls="offcanvasExample">
                               <i class="bx bx-info-circle"></i>
                              </a>
                        </div>
                        <!--Button-->
                        <div class="nav-item me-3 ms-lg-3 ms-xl-5 me-lg-0">
                            <a href="{{ URL::asset('#') }}" class="btn btn-warning btn-sm hover-lift">Purchase</a>
                        </div>
                    </div>
                    <!--end:navbar-no-collapse-items-->

                    <!--begin:navbar-collapse-->
                    <div class="collapse navbar-collapse" id="mainNavbarTheme">
                        <x-partials.headers.rtl.navbar-items page='home' />
                    </div>
                    <!--end:navbar-collapse-->
                </div>

            </nav>
            <!--end:navbar-->
        </header>
        <!--end:header-->

          <!--Begin:: Info Offcanvas Menu-->
  <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
    <div class="offcanvas-header">
      <h5 class="offcanvas-title" id="offcanvasExampleLabel">Offcanvas Start</h5>
      <button type="button" class="btn-secondary btn p-0 width-4x height-4x rounded-circle flex-center" data-bs-dismiss="offcanvas" aria-label="Close">
        <i class="bx bx-x fs-4"></i>
      </button>
    </div>
    <div class="offcanvas-body">
      <p class="mb-7">
        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.    
    </p>
    <!--Contact Info-->
    <div class="mb-7">
        <h6 class="mb-3 text-uppercase">Contact Info</h6>
        <address>1355 Market St, Suite 900<br>
            San Francisco<br>
            CA 94103 </address>
            <div class="mb-2"><a href="{{ URL::asset('mailto:mail@email.com') }}" class="fw-semibold link-hover-underline">mail@domain.com</a></div>
            <a href="{{ URL::asset('#!') }}" class="fw-semibold link-hover-underline">+01 1234-56789</a>
      </div>
      <!--Social links-->
      <h6 class="mb-3 text-uppercase">Follow Us</h6>
      <div class="d-flex align-items-center">
        <!-- Social button -->
        <a href="{{ URL::asset('#!') }}" class="d-inline-block mb-1 me-2 si rounded-pill si-hover-facebook">
            <i class="bx bxl-facebook fs-5"></i>
            <i class="bx bxl-facebook fs-5"></i>
        </a>
        <!-- Social button -->
        <a href="{{ URL::asset('#!') }}" class="d-inline-block mb-1 me-2 si rounded-pill si-hover-twitter">
            <i class="bx bxl-twitter fs-5"></i>
            <i class="bx bxl-twitter fs-5"></i>
        </a>
        <!-- Social button -->
        <a href="{{ URL::asset('#!') }}" class="d-inline-block mb-1 me-2 si rounded-pill si-hover-linkedin">
            <i class="bx bxl-linkedin fs-5"></i>
            <i class="bx bxl-linkedin fs-5"></i>
        </a>
        <!-- Social button -->
        <a href="{{ URL::asset('#!') }}" class="d-inline-block mb-1 si rounded-pill si-hover-instagram">
            <i class="bx bxl-instagram fs-5"></i>
            <i class="bx bxl-instagram fs-5"></i>
        </a>
    </div>
    </div>
  </div>
  <!--//End::Info offcavas menu-->

        <!--begin:main content-->
        <main>
{{$slot}}
        </main>
        <!--end:main content-->




        <x-partials.footers.footer-1 />

        <!-- begin:Back to Top button -->
        <a href="{{ URL::asset('#') }}" class="toTop"><svg class="progress-circle" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
  <circle cx="50" cy="50" r="40" fill="none" stroke="currentColor" stroke-width="4" stroke-dasharray="0, 251.2"></circle>
</svg>
            <i class="bx bxs-up-arrow"></i>
        </a>
        <!-- begin:Back to Top button -->


        <!-- scripts -->
        <script src="{{ URL::asset('assets/js/theme.bundle.min.js') }}"></script>


        <!--Swiper slider-->
        <script src="{{ URL::asset('assets/vendor/node_modules/js/swiper-bundle.min.js') }}"></script>
        <script>
            //swiper-projects
            var swiperProjects = new Swiper(".swiper-projects", {
                autoHeight: true,
                spaceBetween: 16,
                centeredSlides: true,
                loop: true,
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
                        slidesPerView: 2,
                        spaceBetween: 16
                    }
                },
                pagination: {
                    el: ".swiperProjects-pagination",
                    clickable: true
                }
            });

            //swiper-testimonials
            var swiperAuto = new Swiper(".swiper-testimonials", {
                slidesPerView: "auto",
                loop: true,
                centeredSlides: true,
                spaceBetween: 0,
                grabCursor: true,
                pagination: {
                    el: ".swiperAuto-pagination",
                    clickable: true,
                },
                navigation: {
                    nextEl: ".swiperAuto-button-next",
                    prevEl: ".swiperAuto-button-prev",
                }
            });

        </script>
    </body>

</html>
