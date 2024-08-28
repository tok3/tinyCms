<!doctype html>
<html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="icon" href="{{ URL::asset('assets/img/favicon.ico') }}" type="image/ico" />

        <!--Vendors css-->
        <link rel="stylesheet" href="{{ URL::asset('assets/fonts/boxicons/css/boxicons.min.css') }}" />
        <link rel="stylesheet" href="{{ URL::asset('assets/fonts/iconsmind/iconsmind.css') }}" />
        <link rel="stylesheet" href="{{ URL::asset('assets/vendor/node_modules/css/choices.min.css') }}" />
        <link rel="stylesheet" href="{{ URL::asset('assets/vendor/node_modules/css/swiper-bundle.min.css') }}" />
        <link href="{{ URL::asset('assets/vendor/node_modules/css/aos.css') }}" rel="stylesheet" />
        <!--:Google Fonts:-->
    <link rel="preconnect" href="{{ URL::asset('https://fonts.googleapis.com') }}">
    <link rel="preconnect" href="{{ URL::asset('https://fonts.gstatic.com') }}" crossorigin>
    <link href="{{ URL::asset('https://fonts.googleapis.com/css2?family=Hanken+Grotesk:wght@100..900&family=Lora:ital,wght@0,400..700;1,400..700&display=swap') }}" rel="stylesheet">
        <!-- Main CSS -->
        <link href="{{ URL::asset('assets/css/theme-teal.min.css') }}" rel="stylesheet" />

        <title>Assan 4</title>
    </head>

    <body>
        <x-partials.preloader />

        <!--Header Start-->
        <header class="z-fixed pt-2 header-absolute-top">
            <div class="container position-relative">
                <div class="row">
                    <div class="col-lg-6 d-none d-lg-block">
                        <div class="d-flex">
                            <a href="{{ URL::asset('tel:+011234567890') }}" class="me-3 me-lg-4">
                                <i class="bx bxs-phone"></i>
                                <small>+01 1234 567 890</small>
                            </a>
                            <a href="{{ URL::asset('mailto:consult@company.com') }}" class="me-3 me-lg-4">
                               <i class="bx bxs-envelope"></i>
                                <small>estate@assan.com</small>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-6 ms-auto">
                        <div class="d-flex justify-content-end">
                            <a href="{{ URL::asset('#!') }}">
                               <i class="bx bxs-user"></i>
                                <small>Sign In</small>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <nav class="navbar navbar-expand-lg navbar-light rounded-3"><div class="container">
                <a class="navbar-brand width-3x" href="{{ URL::asset('assan/index.html') }}">
                    <img src="{{ URL::asset('assets/img/logo/logo-a.svg') }}" alt="" class="img-fluid navbar-brand-light">
                    <img src="{{ URL::asset('assets/img/logo/logo-a-white.svg') }}" alt="" class="img-fluid navbar-brand-dark">
                </a>
                <div class="d-flex align-items-center navbar-no-collapse-items order-lg-last">
                    <button class="navbar-toggler order-last" type="button" data-bs-toggle="collapse"
                        data-bs-target="#mainNavbarTheme" aria-controls="mainNavbarTheme" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon">
                            <i></i>
                        </span>
                    </button>
                    <div class="nav-item me-2 ms-lg-5 me-lg-0">
                        <a href="{{ URL::asset('demo-real-estate-add-listing.html') }}" class="btn btn-warning btn-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" class="me-1" width="16" height="16"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                    d="M12 4v16m8-8H4" />
                            </svg> Submit Property
                        </a>
                    </div>
                </div>
                <div class="collapse navbar-collapse" id="mainNavbarTheme">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item dropdown">
                            <a href="{{ URL::asset('#') }}" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Home</a>
                            <!--Dropdown-->
                            <div class="dropdown-menu">
                                <a href="{{ URL::asset('demo-real-estate.html') }}" class="dropdown-item">Home default</a>
                                <a href="{{ URL::asset('demo-real-estate-2.html') }}" class="dropdown-item">Home option</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a href="{{ URL::asset('#') }}" class="nav-link dropdown-toggle active"
                                data-bs-toggle="dropdown">Listing</a>
                            <!--Dropdown-->
                            <div class="dropdown-menu">
                                <a href="{{ URL::asset('demo-real-estate-listing-grid.html') }}" class="dropdown-item">Listing
                                    Grid</a>
                                <a href="{{ URL::asset('demo-real-estate-listing-row.html') }}" class="dropdown-item">Listing
                                    Row</a>
                                    <a href="{{ URL::asset('demo-real-estate-add-listing.html') }}" class="dropdown-item">Listing
                                        Add</a>
                                        <a href="{{ URL::asset('demo-real-estate-listing.html') }}" class="dropdown-item">Listing Detail</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a href="{{ URL::asset('#!') }}" class="nav-link">About</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ URL::asset('#!') }}" class="nav-link">Contact</a>
                        </li>
                    </ul>
                </div> </div>
            </nav>
        </header>

        <main>
{{$slot}}
        </main>

        <!--Footer Start-->
        <x-partials.footers.footer-9 />

        <!-- begin Back to Top button -->
        <a href="{{ URL::asset('#') }}" class="toTop"><svg class="progress-circle" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
  <circle cx="50" cy="50" r="40" fill="none" stroke="currentColor" stroke-width="4" stroke-dasharray="0, 251.2"></circle>
</svg>
            <i class="bx bxs-up-arrow"></i>
        </a>
        <!-- scripts -->
        <script src="{{ URL::asset('assets/js/theme.bundle.min.js') }}"></script>
         <!--Select scripts-->
         <script src="{{ URL::asset('assets/vendor/node_modules/js/choices.min.js') }}"></script>
         <script>
             var cSelect = document.querySelectorAll("[data-choices]");
             cSelect.forEach(el => {
                 const t = {
                     ...el.dataset.choices ? JSON.parse(el.dataset.choices) : {}, ...{
                         classNames: {
                             containerInner: el.className,
                             input: "form-control",
                             inputCloned: "form-control-sm",
                             listDropdown: "dropdown-menu",
                             itemChoice: "dropdown-item",
                             activeState: "show",
                             selectedState: "active"
                         }
                     }
                 }
                 new Choices(el, t)
             }
             );
         </script>
    </body>

</html>
