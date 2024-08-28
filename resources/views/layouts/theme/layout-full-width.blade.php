<!doctype html>
<html lang="en" data-bs-theme="light">

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
        <header class="z-fixed header-absolute-top header-transparent">
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="container-fluid position-relative">
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
                        <div class="nav-item me-3 ms-lg-4 me-lg-0">
                            <a href="{{ URL::asset('#') }}" class="btn btn-success btn-sm">Get started</a>
                        </div>
                    </div>
                    <div class="collapse navbar-collapse" id="mainNavbarTheme">
                        <x-partials.headers.default-navbar-items page='features' />
                    </div>
                </div>
            </nav>
        </header>
        <!--Main content-->
        <main class="main-content" id="main-content">
{{$slot}}
         </main>

         <footer id="footer" class="position-relative bg-dark" data-bs-theme="dark">
            <div class="container-fluid pt-9 pt-lg-11 pb-5 position-relative z-1">
                <div class="row">
                    <!--Footer col-->
                    <div class="col-md-5 col-xl-4 mb-5 mb-md-0">
                        <div class="d-flex flex-column h-100">
                            <h6 class="mb-4">
                               Stay in the know
                            </h6>
                            <p class="mb-4 text-body-secondary">Subscribe to our newsletter and updates direct to your inbox.</p>
                            <form novalidate="" class="needs-validation"> 
                                <div class="mb-3">
                                    <input type="email" required="" placeholder="Enter your email" class="form-control bg-transparent">
                                        <span class="invalid-feedback">Please enter your email address</span>
                                    </div>
                                      <div class="d-grid">
                                        <button class="btn btn-secondary" type="submit">
                                            Subscribe
                                        </button>
                                    </div>
                            </form>
                            <x-partials.color-mode />
                        </div>
                    </div>
                    <!--Footer col-->
                    <div class="col-md-3 col-xl-2 ms-md-auto mb-5 mb-sm-0 col-sm-5">
                        <h6 class="mb-4">Services</h6>
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a href="{{ URL::asset('#') }}" class="nav-link">
                                    Design
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ URL::asset('#') }}" class="nav-link">
                                    Development
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ URL::asset('#') }}" class="nav-link">
                                    E-commerce
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ URL::asset('#') }}" class="nav-link">
                                    Android Apps
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ URL::asset('#') }}" class="nav-link">
                                    Ios Apps
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!--Footer col-->
                    <div class="col-md-4 col-sm-7">
                        <h6 class="mb-5">Latest news</h6>
                        <ul class="list-unstyled">
                            <li class="d-flex card-hover mb-5 align-items-center">
                                <div class="me-3">
                                    <a href="{{ URL::asset('#!') }}" class="d-block width-8x height-8x rounded-3 overflow-hidden">
                                        <img src="{{ URL::asset('assets/img/960x1140/1.jpg') }}" alt="" class="img-fluid img-zoom">
                                    </a>
                                </div>
                                <div>
                                    <a href="{{ URL::asset('#!') }}" class="lh-sm d-block mb-1">Tips for creating a long-lasting
                                        partnership with your startup</a>
                                    <span class="d-block small text-body-secondary">02 Sep 2021</span>
                                </div>
                            </li>
                            <li class="d-flex card-hover align-items-center">
                                <div class="me-3">
                                    <a href="{{ URL::asset('#!') }}" class="d-block width-8x height-8x rounded-3 overflow-hidden">
                                        <img src="{{ URL::asset('assets/img/960x1140/2.jpg') }}" alt="" class="img-fluid img-zoom">
                                    </a>
                                </div>
                                <div>
                                    <a href="{{ URL::asset('#!') }}" class="lh-sm d-block mb-1">Functional programming in python for
                                        beginners</a>
                                    <span class="d-block small text-body-secondary">24 Aug 2021</span>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-7">
                        <div class="dropup d-table">
                            <a href="{{ URL::asset('#') }}" data-bs-toggle="dropdown" role="button" aria-expanded="false" class="dropdown-toggle text-body">
                                United States (English)
                            </a>

                            <!--Dropdown lang menu-->
                            <div class="dropdown-menu mb-3 dropdown-menu-lg-start">
                                <a href="{{ URL::asset('#!') }}" class="d-flex align-items-center dropdown-item active">
                                    <img src="{{ URL::asset('assets/img/country/us.svg') }}" class="width-2x me-2" alt="">
                                    United States (English)
                                </a>
                                <a href="{{ URL::asset('#!') }}" class="d-flex align-items-center dropdown-item">
                                    <img src="{{ URL::asset('assets/img/country/es.svg') }}" class="width-2x me-2" alt="">
                                    América Latina (Español)
                                </a>
                                <a href="{{ URL::asset('#!') }}" class="d-flex align-items-center dropdown-item">
                                    <img src="{{ URL::asset('assets/img/country/gb.svg') }}" class="width-2x me-2" alt="">
                                    United Kingdom (English)
                                </a>
                                <a href="{{ URL::asset('#!') }}" class="d-flex align-items-center dropdown-item">
                                    <img src="{{ URL::asset('assets/img/country/fr.svg') }}" class="width-2x me-2" alt="">
                                    France (Français)
                                </a>
                                <a href="{{ URL::asset('#!') }}" class="d-flex align-items-center dropdown-item">
                                    <img src="{{ URL::asset('assets/img/country/pt.svg') }}" class="width-2x me-2" alt="">
                                    Italia (Italiano)
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-5 small text-md-end">
                        <span class="d-block lh-sm text-body-secondary">© Copyright
                            <script>
                              document.write(new Date().getFullYear())
                            </script>. Assan
                          </span>
                    </div>
                </div>
            </div>
            <!--container-->
        </footer>
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
