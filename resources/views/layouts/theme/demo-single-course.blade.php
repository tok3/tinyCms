<!doctype html>
<html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="{{ URL::asset('assets/img/favicon.ico') }}" type="image/ico">
        <!--Box Icons-->
        <link rel="stylesheet" href="{{ URL::asset('assets/fonts/boxicons/css/boxicons.min.css') }}">
        <!--AOS Animations-->
        <link rel="stylesheet" href="{{ URL::asset('assets/vendor/node_modules/css/aos.css') }}">
        <!--Iconsmind Icons-->
        <link rel="stylesheet" href="{{ URL::asset('assets/fonts/iconsmind/iconsmind.css') }}">
        <!--G-lightbox-->
        <link rel="stylesheet" href="{{ URL::asset('assets/vendor/node_modules/css/glightbox.min.css') }}" />
        <!--Google fonts-->
        <link rel="preconnect" href="{{ URL::asset('https://fonts.googleapis.com') }}">
        <link rel="preconnect" href="{{ URL::asset('https://fonts.gstatic.com') }}" crossorigin>
        <link
            href="{{ URL::asset('https://fonts.googleapis.com/css2?family=Lora:ital@0;1&family=Sora:wght@100..800&display=swap') }}"
            rel="stylesheet" rel="stylesheet">
              <!--Video player css-->
        <link rel="stylesheet" href="{{ URL::asset('assets/vendor/node_modules/css/plyr.css') }}">
        <!-- Main CSS -->
        <link href="{{ URL::asset('assets/css/theme-banana.min.css') }}" rel="stylesheet">

        <title>Assan 4</title>
    </head>

    <body class="bg-gradient-blur">
        <!--Header Start-->
        <header class="z-fixed pt-3 header-absolute-top header-boxed header-sticky">
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="container-fluid px-lg-6 position-relative">
                    <a class="navbar-brand" href="{{ URL::asset('assan/index.html') }}">
                        <img src="{{ URL::asset('assets/img/logo/logo.svg') }}" alt="" class="img-fluid navbar-brand-light">
                        <img src="{{ URL::asset('assets/img/logo/logo-white.svg') }}" alt="" class="img-fluid navbar-brand-dark">
                    </a>

                    <div class="d-flex align-items-center navbar-no-collapse-items order-lg-last">
                        <div class="nav-item me-3 me-lg-0">
                            <a href="{{ URL::asset('mailto:example@domain.com') }}"
                                class="fw-semibold btn-blur position-relative overflow-hidden">
                                <span class="btn-blur-circle bg-dark"></span>
                                <span class="position-relative">example@domain.com</span>
                            </a>
                        </div>
                    </div>
                </div>
          
            </nav>

        </header>
        <x-partials.preloader />


        <!--Main content start-->
        <main>
{{$slot}}
        </main>

        <x-partials.footers.footer-1 />
        <!-- begin Back to Top button -->
        <a href="{{ URL::asset('#') }}" class="toTop">
            <svg class="progress-circle" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
                <circle cx="50" cy="50" r="40" fill="none" stroke="currentColor" stroke-width="4" stroke-dasharray="0, 251.2">
                </circle>
            </svg>
            <i class="bx bxs-up-arrow"></i>
        </a>
        <!-- scripts -->
        <script src="{{ URL::asset('assets/js/theme.bundle.min.js') }}"></script>
 <!--Plyr script-->
 <script src="{{ URL::asset('assets/vendor/node_modules/js/plyr.min.js') }}"></script>
 <script>
     var player = document.querySelectorAll('.player')
     player.forEach(function (el) {
         new Plyr(el);
     })

 </script>
    </body>

</html>
