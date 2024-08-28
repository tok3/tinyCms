<!doctype html>
<html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="{{ URL::asset('assets/img/favicon.ico') }}" type="image/ico">
        
        <x-partials.head-includes />
        <!-- Main CSS -->
        @vite(['resources/scss/theme.scss'])

        <title>Assan 4</title>
    </head>

    <body>
        <x-partials.preloader />
        <!--Header Start-->
        <header class="z-fixed pt-lg-3 header-transparent header-absolute-top">
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="container position-relative">
                    <a class="navbar-brand" href="{{ URL::asset('assan/index.html') }}">
                        <img src="{{ URL::asset('assets/img/logo/logo.svg') }}" alt="" class="img-fluid navbar-brand-light">
                        <img src="{{ URL::asset('assets/img/logo/logo-white.svg') }}" alt="" class="img-fluid navbar-brand-dark">
                    </a>
                    <div class="d-flex align-items-center me-auto ms-lg-3">
                        <span class="small fw-semibold text-opacity-75 d-none d-lg-block">Knowladge base</span>
                    </div>
                    <div class="d-flex align-items-center navbar-no-collapse-items order-lg-last">
                      
                        <div class="nav-item me-3">
                            <a href="{{ URL::asset('#') }}" class="btn btn-success btn-sm">Contact sales</a>
                        </div>
                        <div class="nav-item">
                            <a href="{{ URL::asset('#') }}" class="nav-link h-auto">Sign in</a>
                        </div>
                    </div>
                </div>
            </nav>
        </header>
        <!--Main content-->

        <main class="main-content" id="main-content">
{{$slot}}
        </main>

        <x-partials.footers.footer-1 />

        <!-- begin Back to Top button -->
        <a href="{{ URL::asset('#') }}" class="toTop"><svg class="progress-circle" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
  <circle cx="50" cy="50" r="40" fill="none" stroke="currentColor" stroke-width="4" stroke-dasharray="0, 251.2"></circle>
</svg>
            <i class="bx bxs-up-arrow"></i>
        </a>
        <!-- scripts -->
        <script src="{{ URL::asset('assets/js/theme.bundle.min.js') }}"></script>
    </body>

</html>
