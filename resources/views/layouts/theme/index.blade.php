<!doctype html>
<html lang="en" data-bs-theme="light">

  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{ URL::asset('assets/img/favicon.ico') }}" type="image/ico">

    <x-partials.head-includes />

    <!--Master slider-->
    <link rel="stylesheet" href="{{ URL::asset('assets/vendor/masterslider/style/masterslider.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/vendor/masterslider/skins/black-1/style.css') }}">

    <!--Swiper slider-->
    <link rel="stylesheet" href="{{ URL::asset('assets/vendor/node_modules/css/swiper-bundle.min.css') }}">
    <!-- Main CSS -->
    @vite(['resources/scss/theme.scss'])

    <title>Assan 4</title>
  </head>

  <body>
    <x-partials.preloader />
    <!--begin:Header-->
    <header class="header-transparent sticky-fixed">

      <!--begin:navbar-->
      <nav class="navbar navbar-expand-lg fixed-top navbar-light navbar-link-white">
        <!--Navbar-fixed-background-->
        <div class="navbar-fixed-bg position-absolute"></div>
        <div class="container position-relative z-1">
          <!--begin:logo-->
          <a class="navbar-brand" href="{{ URL::asset('assan/index.html') }}">
            <img src="{{ URL::asset('assets/img/logo/logo.svg') }}" alt="" class="img-fluid navbar-brand-sticky">
            <img src="{{ URL::asset('assets/img/logo/logo-white.svg') }}" alt="" class="img-fluid navbar-brand-transparent">
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
            <!--Button-->
            <div class="nav-item me-3 ms-lg-3 ms-xl-5 me-lg-0">
              <a href="{{ URL::asset('#') }}" class="btn btn-success btn-sm">Purchase</a>
            </div>
          </div>
          <!--end:navbar-no-collapse-items-->

          <!--begin:navbar-collapse-->
          <div class="collapse navbar-collapse" id="mainNavbarTheme">
            <x-partials.headers.default-navbar-items page='home' />
          </div>
          <!--end:navbar-collapse-->
        </div>

      </nav>
      <!--end:navbar-->
    </header>
    <!--end:header-->


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

    <!--Mastert Slider start (Include jquery before master slider js)-->
    <script src="{{ URL::asset('assets/vendor/node_modules/js/jquery.min.js') }}"></script>
    <script src="{{ URL::asset('assets/vendor/masterslider/jquery.easing.min.js') }}"></script>
    <script src="{{ URL::asset('assets/vendor/masterslider/masterslider.min.js') }}"></script>
    <script>
      var slider = new MasterSlider();
      slider.setup('masterslider', {
        width: 1140,
        height: 660,
        minHeight: 400,
        space: 0,
        start: 1,
        grabCursor: false,
        layout: "fullwidth",
        wheel: false,
        autoplay: true,
        instantStartLayers: true,
        loop: true,
        view: "basic",
        instantStartLayers: true,
      });
      slider.control('arrows');

    </script>


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
