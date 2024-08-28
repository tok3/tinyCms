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

        <!--Google fonts-->
        <link rel="preconnect" href="{{ URL::asset('https://fonts.googleapis.com') }}">
        <link rel="preconnect" href="{{ URL::asset('https://fonts.gstatic.com') }}" crossorigin>
        <link href="{{ URL::asset('https://fonts.googleapis.com/css2?family=Lora:ital@0;1&family=Sora:wght@100..800&display=swap') }}"
            rel="stylesheet">
        <!--Video player css-->
        <link rel="stylesheet" href="{{ URL::asset('assets/vendor/node_modules/css/plyr.css') }}">
        <!-- Main CSS -->
        <link href="{{ URL::asset('assets/css/theme-banana.min.css') }}" rel="stylesheet">

        <title>Assan 4</title>
    </head>
    <body class="bg-info-subtle">
        <x-partials.preloader />
        <!--Header Start-->
        <header class="z-fixed pt-4 header-absolute-top header-boxed header-sticky">
            <div class="navbar-boxed">
                <div class="container">
                    <nav class="navbar px-3 navbar-expand-lg navbar-dark rounded-3">
                        <a class="navbar-brand" href="{{ URL::asset('assan/index.html') }}">
                            <img src="{{ URL::asset('assets/img/logo/logo-white.svg') }}" alt="" class="img-fluid navbar-brand-transparent">
                        </a>
                        <div class="d-flex align-items-center navbar-no-collapse-items order-lg-last ms-auto">
                            <div class="nav-item me-2 me-lg-0">
                                <a href="{{ URL::asset('#') }}" class="btn btn-primary py-2 rounded-pill px-4">Get started
                                </a>
                            </div>
                        </div>
                    </nav>

                </div>
            </div>
        </header>
        <!--Main content-->
        <main class="main-content" id="main-content">
{{$slot}}
        </main>

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
