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
        <header class="z-fixed">
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
                        <div class="nav-item me-3 me-lg-0 dropdown">
                            <a href="{{ URL::asset('#') }}" class="btn btn-secondary rounded-pill py-0 ps-0 pe-3"
                                data-bs-auto-close="outside" data-bs-toggle="dropdown">
                                <img src="{{ URL::asset('assets/img/avatar/4.jpg') }}" alt="" class="avatar sm rounded-circle me-1">
                                <small>Emily</small>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end dropdown-menu-xs p-0">
                                <a href="{{ URL::asset('#') }}" class="dropdown-header border-bottom p-4">
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <img src="{{ URL::asset('assets/img/avatar/4.jpg') }}" alt=""
                                                class="avatar xl rounded-pill me-3">
                                        </div>
                                        <div>
                                            <h5 class="mb-0">Emily doe</h5>
                                            <span class="text-body-secondary d-block mb-2">emily@domain.com</span>
                                            <div class="small d-inline-block link-underline fw-semibold text-body-secondary">View
                                                account</div>
                                        </div>
                                    </div>
                                </a>
                                <a href="{{ URL::asset('#') }}" class="dropdown-item p-3">
                                    <span class="d-block text-end">
                                        <i class="bx bx-box-arrow-right"></i>
                                        Sign Out
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="collapse navbar-collapse" id="mainNavbarTheme">
                        <x-partials.headers.default-navbar-items page='pages' />
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
