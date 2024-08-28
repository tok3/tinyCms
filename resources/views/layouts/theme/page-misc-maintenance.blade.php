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
        <!--Preloader Spinner-->
        <div class="spinner-loader bg-gradient bg-secondary text-white">
            <div class="spinner-border text-primary" role="status">
            </div>
            <span class="small d-block ms-2">Loading...</span>
        </div>
       <!--Header Start-->
       <header class="z-fixed header-transparent header-absolute-top pt-lg-3">
        <nav class="navbar navbar-expand-lg navbar-light">
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
                    <div class="nav-item me-3 me-lg-0">
                        <a href="{{ URL::asset('#') }}" class="btn btn-success btn-sm rounded-pill">Purchase</a>
                    </div>
                </div>
            </div>
        </nav>
    </header>
        <!--Main content-->

        <main class="main-content d-grid" id="main-content">
{{$slot}}
        </main>  
        
        <x-partials.footers.footer-8 />

        <!-- begin Back to Top button -->
        <a href="{{ URL::asset('#') }}" class="toTop"><svg class="progress-circle" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
  <circle cx="50" cy="50" r="40" fill="none" stroke="currentColor" stroke-width="4" stroke-dasharray="0, 251.2"></circle>
</svg>
            <svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 13 9' class="align-middle flip-y" width="13"
                height="9">
                <path fill='currentColor'
                    d="M12.25 2.30062L10.8988 0.949371L6.5 5.33854L2.10125 0.949371L0.75 2.30062L6.5 8.05062L12.25 2.30062Z">
                </path>
            </svg>
        </a>
        <!-- scripts -->
        <script src="{{ URL::asset('assets/js/theme.bundle.min.js') }}"></script>
    </body>

</html>
