<!DOCTYPE html>
<html lang="en" data-bs-theme="light">

  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{ URL::asset('assets/img/favicon.ico') }}" type="image/ico">
    <!--Vendors css-->
    <link rel="stylesheet" href="{{ URL::asset('assets/fonts/boxicons/css/boxicons.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/fonts/iconsmind/iconsmind.css') }}">
    <link href="{{ URL::asset('assets/vendor/node_modules/css/aos.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ URL::asset('assets/vendor/node_modules/css/glightbox.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/vendor/node_modules/css/swiper-bundle.min.css') }}">
    <!--Google fonts-->
    <link rel="preconnect" href="{{ URL::asset('https://fonts.googleapis.com') }}">
    <link rel="preconnect" href="{{ URL::asset('https://fonts.gstatic.com') }}" crossorigin>
    <link href="{{ URL::asset('https://fonts.googleapis.com/css2?family=Montserrat:wght@100..900&family=Young+Serif&display=swap') }}" rel="stylesheet">

    <!-- Main CSS -->
    <link href="{{ URL::asset('assets/css/theme-serif.min.css') }}" rel="stylesheet">
    <title>Assan 4</title>
  </head>

  <body>
    <x-partials.preloader />
    <!--Header Start-->
    <header class="z-fixed pt-lg-2 header-transparent header-absolute-top header-sticky">
      <nav class="navbar shadow-none navbar-expand-lg navbar-light">
        <div class="container-fluid px-xl-9 position-relative">
          <a class="navbar-brand" href="{{ URL::asset('assan/index.html') }}">
            <img src="{{ URL::asset('assets/img/logo/logo.svg') }}" alt="" class="img-fluid navbar-brand-light">
            <img src="{{ URL::asset('assets/img/logo/logo-white.svg') }}" alt="" class="img-fluid navbar-brand-dark">
        </a>
          <div class=" d-flex align-items-center navbar-no-collapse-items order-lg-last ">
            <button class="navbar-toggler order-last" type="button" data-bs-toggle="collapse"
              data-bs-target="#mainNavbarTheme" aria-controls="mainNavbarTheme" aria-expanded="false"
              aria-label="Toggle navigation">
              <span class="navbar-toggler-icon">
                <i></i>
              </span>
            </button>
            <div class="nav-item me-3 me-lg-0 ms-lg-3">
              <a href="{{ URL::asset('#') }}" class="btn btn-primary hover-lift">
                Get started</a>
            </div>
          </div>
          <div class="collapse navbar-collapse" id="mainNavbarTheme">
           <x-partials.headers.default-navbar-items page="home" />
          </div>
        </div>
      </nav>
    </header>
    <!--Main content-->

    <main class="main-content" id="main-content">
{{$slot}}
    </main>

    <footer id="footer" class="position-relative bg-dark text-white" data-bs-theme="dark">
      <div class="container-fluid px-xl-9 pt-9 pt-lg-11 pb-5">
        <div class="row mb-5">
          <div class="col-lg-7 col-md-12 mb-5 mb-lg-0">
            <div class="mb-7 mb-lg-9 d-flex justify-content-between align-items-center">
              <img src="{{ URL::asset('assets/img/logo/logo-white.svg') }}" alt="Assan Logo" class="width-8x">
             <div class="mt-n6">
              <x-partials.color-mode />
             </div>
            </div>
            <div class="row">
              <div class="col-md-4 mb-5 mb-md-0">
                <h5 class="mb-4">Products</h5>
                <a href="{{ URL::asset('#') }}" class="d-block mb-2 mb-lg-3">Assan</a>
                <a href="{{ URL::asset('#') }}" class="d-block mb-2 mb-lg-3">Airbnb</a>
                <a href="{{ URL::asset('#') }}" class="d-block mb-2 mb-lg-3">Codepen</a>
                <a href="{{ URL::asset('#') }}" class="d-block mb-2 mb-lg-3">Chrome</a>
                <a href="{{ URL::asset('#') }}" class="d-block mb-2 mb-lg-3">Dropbox</a>
                <a href="{{ URL::asset('#') }}" class="d-block mb-2 mb-lg-3">Jira</a>
                <a href="{{ URL::asset('#') }}" class="d-block mb-2 mb-lg-3">Slack</a>
                <a href="{{ URL::asset('#') }}" class="d-block">Zendesk</a>
              </div>
              <div class="col-md-4 mb-5 mb-md-0">
                <h5 class="mb-4">Resources</h5>
                <a href="{{ URL::asset('#') }}" class="d-block mb-2 mb-lg-3">Bootstrap</a>
                <a href="{{ URL::asset('#') }}" class="d-block mb-2 mb-lg-3">Wrapbootstrap</a>
                <a href="{{ URL::asset('#') }}" class="d-block mb-2 mb-lg-3">Babel</a>
                <a href="{{ URL::asset('#') }}" class="d-block mb-2 mb-lg-3">Browserify</a>
                <a href="{{ URL::asset('#') }}" class="d-block mb-2 mb-lg-3">Greensock</a>
                <a href="{{ URL::asset('#') }}" class="d-block mb-2 mb-lg-3">Javascript</a>
                <a href="{{ URL::asset('#') }}" class="d-block mb-2 mb-lg-3">Gulp</a>
                <a href="{{ URL::asset('#') }}" class="d-block">Sass</a>
              </div>
              <div class="col-md-4">
                <h5 class="mb-4">Company</h5>
                <a href="{{ URL::asset('#') }}" class="d-block mb-2 mb-lg-3">About us</a>
                <a href="{{ URL::asset('#') }}" class="d-block mb-2 mb-lg-3">Career</a>
                <a href="{{ URL::asset('#') }}" class="d-block mb-2 mb-lg-3">Team</a>
                <a href="{{ URL::asset('#') }}" class="d-block">Blog</a>
              </div>
            </div>

          </div>
          <div class="col-lg-5 ms-auto">
            <div class="py-5 bg-body-tertiary px-4 rounded-4">
              <h5 class="mb-4">Contact</h5>
              <div class="mb-2"><a href="{{ URL::asset('tel:+1123456789') }}" class="fs-5 link-hover-underline">+1 1234 56789</a>
              </div>
              <div><a href="{{ URL::asset('mailto:hello@domain.com?subject=Hello!') }}"
                  class="fs-5 link-hover-underline">support@domain.com</a>
              </div>
              <hr class="my-4 my-sm-5">
              <h5 class="mb-4">Have a project?</h5>
              <a href="{{ URL::asset('#') }}" class="btn btn-primary rounded-pill hover-lift btn-hover-arrow"><span>Let's talk with
                  us</span></a>

              <hr class="my-4 my-sm-5">
              <h5 class="mb-4">Follow us</h5>
              <div class="d-flex">
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
        </div>
        <div class="row justify-content-between">
          <div class="col-md-7 mb-4 mb-md-0">
            <div class="d-flex small">
              <a href="{{ URL::asset('#') }}" class="text-body-secondary d-block me-3">Privacy Policy</a>
              <a href="{{ URL::asset('#') }}" class="text-body-secondary d-block me-3">Terms and Conditions</a>
              <a href="{{ URL::asset('#') }}" class="text-body-secondary d-block">Press kit</a>
            </div>
          </div>

          <div class="col-md-5 text-md-end">
            <span class="d-block lh-sm small text-body-secondary">© Copyright
              <script>
                document.write(new Date().getFullYear())

              </script>. Assan
            </span>
          </div>
        </div>
      </div>
    </footer>

    <!-- begin Back to Top button -->
    <a href="{{ URL::asset('#') }}" class="toTop rounded-3">
      <i class="bx bxs-up-arrow"></i>
    </a>

    <!-- scripts -->
    <script src="{{ URL::asset('assets/js/theme.bundle.min.js') }}"></script>

    <!--Swiper slider-->
    <script src="{{ URL::asset('assets/vendor/node_modules/js/swiper-bundle.min.js') }}"></script>
    <script>
      //swiper -partners
      var swiperPartners5 = new Swiper(".swiper-partners-5", {
        slidesPerView: 3,
        loop: true,
        spaceBetween: 16,
        autoplay: true,
        breakpoints: {
          768: {
            slidesPerView: 4,
          },
          1024: {
            slidesPerView: 5,
          },
        },
        pagination: {
          el: ".swiper-partners-5-pagination",
          clickable: true,
        },
        navigation: {
          nextEl: ".swiper-partners-5-button-next",
          prevEl: ".swiper-partners-5-button-prev",
        },
      });
      //swiper-Testimonials
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
      //Swiper for text/headings
      var swiperText = new Swiper(".swiper-text", {
        autoplay: true,
        direction: "vertical",
        loop: true,
        grabCursor: false,
        speed: 600,
        autoHeight: true,
      });
      //Swiper for text/headings
      var swiperFade = new Swiper(".swiper-feature-img", {
        autoplay: true,
        loop: true,
        grabCursor: false,
        speed: 600
      });
      // Link together the navigation of both swipers
      var swiperText = document.querySelector('.swiper-text').swiper
      var swiperFeatureImage = document.querySelector('.swiper-feature-img').swiper

      swiperText.controller.control = swiperFeatureImage
      swiperFeatureImage.controller.control = swiperText

    </script>
  </body>

</html>
