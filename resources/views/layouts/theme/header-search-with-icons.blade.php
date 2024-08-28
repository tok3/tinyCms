<!doctype html>
<html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="{{ URL::asset('assets/img/favicon.ico') }}" type="image/ico">
        <x-partials.head-includes />
        <!--Prism css for code snippets-->
        <link rel="stylesheet" href="{{ URL::asset('assets/vendor/node_modules/css/prism-tomorrow.css') }}">
        <!-- Main CSS -->
        @vite(['resources/scss/theme.scss'])

        <title>Assan 4</title>
        <style type="text/css">
            .backdrop {
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background-color: rgba(0, 0, 0, 0.5);
                z-index: 1;
                display: none;
            }

        </style>
    </head>

    <body>
        <x-partials.preloader />
        <!--::Begin Header-->
        <header class="z-fixed header-transparent header-absolute-top header-sticky pt-lg-3">
            <nav class="navbar navbar-expand-lg navbar-light navbar-search-w-icons">
                <div class="container position-relative">
                    <!--begin:logo-->
                    <a class="navbar-brand" href="{{ URL::asset('assan/index.html') }}">
                        <img src="{{ URL::asset('assets/img/logo/logo.svg') }}" alt="" class="img-fluid navbar-brand-light">
                        <img src="{{ URL::asset('assets/img/logo/logo-white.svg') }}" alt="" class="img-fluid navbar-brand-dark">
                    </a>
                    <!--end:logo-->

                    <div class="d-flex align-items-center navbar-no-collapse-items order-lg-last">
                        <button class="navbar-toggler order-last" type="button" data-bs-toggle="collapse"
                            data-bs-target="#mainNavbarTheme" aria-controls="mainNavbarTheme" aria-expanded="false"
                            aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon">
                                <i></i>
                            </span>
                        </button>
                        <div class="nav-item d-lg-none me-3 me-lg-0">
                            <a href="{{ URL::asset('#searchCollapse') }}" data-bs-target="#searchCollapse" data-bs-toggle="collapse"
                                class="nav-link search-link lh-1">
                                <i class="bx bx-search-alt-2 fs-4 lh-1"></i>
                            </a>
                            <!--Search-bar-2-collapse-->
                        </div>
                    </div>
                    <!--Search collapse (visible on desktop laptop)-->
                    <div class="collapse collapse-search ms-lg-auto me-lg-5 d-lg-block" id="searchCollapse">
                        <form>
                            <div class="position-relative z-2 mt-3 mt-lg-0">
                                <span
                                    class="position-absolute start-0 top-50 translate-middle-y ms-3 opacity-50 pe-none">
                                    <i class="bx bx-search-alt-2"></i>
                                </span>
                                <input id="searchNavbarInput" type="text" placeholder="Type & hit enter..."
                                    class="form-control bg-body-subtle shadow-sm ps-6 rounded-4"
                                    data-bs-display="static" data-bs-toggle="dropdown">
                                <!--With Submit button-->
                                <!-- <button class="btn position-absolute end-0 top-0 flex-center p-0 width-4x h-100 rounded-pill btn-white">
                                    <i class="bx bx-search-alt-2"></i>
                                </button> 
                                <input type="text" placeholder="Search here..." class="form-control border-0 shadow-none ps-4 pe-6 rounded-pill">
                           -->
                                <!--:Search Dropdown:-->
                                <div class="dropdown-menu dropdown-menu-input border-top-0 border rounded-top-0 p-3">
                                    <h6 class="dropdown-header ps-0 mb-2">Popular searches</h6>
                                    <div class="d-flex flex-wrap gap-2 pb-2 align-items-center">
                                        <span><a href="{{ URL::asset('#!') }}"
                                                class="d-block bg-body-secondary px-3 py-1 rounded small">Jeans</a></span>
                                        <span><a href="{{ URL::asset('#!') }}"
                                                class="d-block bg-body-secondary px-3 py-1 rounded small">Shoes</a></span>
                                        <span><a href="{{ URL::asset('#!') }}"
                                                class="d-block bg-body-secondary px-3 py-1 rounded small">Watches</a></span>
                                        <span><a href="{{ URL::asset('#!') }}"
                                                class="d-block bg-body-secondary px-3 py-1 rounded small">Men's</a></span>
                                        <span><a href="{{ URL::asset('#!') }}"
                                                class="d-block bg-body-secondary px-3 py-1 rounded small">Sneakers</a></span>
                                        <span><a href="{{ URL::asset('#!') }}"
                                                class="d-block bg-body-secondary px-3 py-1 rounded small">Casual</a></span>
                                        <span><a href="{{ URL::asset('#!') }}"
                                                class="d-block bg-body-secondary px-3 py-1 rounded small">Shirts</a></span>
                                        <span><a href="{{ URL::asset('#!') }}"
                                                class="d-block bg-body-secondary px-3 py-1 rounded small">T-shirts</a></span>
                                        <span><a href="{{ URL::asset('#!') }}"
                                                class="d-block bg-body-secondary px-3 py-1 rounded small">Lowers</a></span>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="collapse navbar-collapse" id="mainNavbarTheme">
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item">
                                <a href="{{ URL::asset('#') }}" class="nav-link">
                                    <i class="bx bx-home fs-5"></i>
                                </a>
                            </li>
                            <li class="nav-item dropdown">
                                <a href="{{ URL::asset('#') }}" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                                    <i class="bx bx-globe fs-5"></i>
                                </a>
                                <!--Lang dropdown-->
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a href="{{ URL::asset('#!') }}" class="active dropdown-item">
                                        <img src="{{ URL::asset('assets/img/country/us.svg') }}" class="me-2" width="20" alt="">
                                        <small>English</small>
                                    </a>
                                    <a href="{{ URL::asset('#!') }}" class="dropdown-item">
                                        <img src="{{ URL::asset('assets/img/country/pt.svg') }}" class="me-2" width="20" alt="">
                                        <small>Portuguese</small>
                                    </a>
                                    <a href="{{ URL::asset('#!') }}" class="dropdown-item">
                                        <img src="{{ URL::asset('assets/img/country/de.svg') }}" class="me-2" width="20" alt="">
                                        <small>German</small>
                                    </a>
                                    <a href="{{ URL::asset('#!') }}" class="dropdown-item">
                                        <img src="{{ URL::asset('assets/img/country/fr.svg') }}" class="me-2" width="20" alt="">
                                        <small>French</small>
                                    </a>
                                    <a href="{{ URL::asset('#!') }}" class="dropdown-item">
                                        <img src="{{ URL::asset('assets/img/country/dk.svg') }}" class="me-2" width="20" alt="">
                                        <small>Danish</small>
                                    </a>
                                    <a href="{{ URL::asset('#!') }}" class="dropdown-item">
                                        <img src="{{ URL::asset('assets/img/country/es.svg') }}" class="me-2" width="20" alt="">
                                        <small>Española</small>
                                    </a>
                                    <a href="{{ URL::asset('#!') }}" class="dropdown-item">
                                        <img src="{{ URL::asset('assets/img/country/nl.svg') }}" class="me-2" width="20" alt="">
                                        <small>Dutch</small>
                                    </a>
                                    <a href="{{ URL::asset('#!') }}" class="dropdown-item">
                                        <img src="{{ URL::asset('assets/img/country/jp.svg') }}" class="me-2" width="20" alt="">
                                        <small>japanese</small>
                                    </a>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a href="{{ URL::asset('#') }}" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                                    <i class="bx bx-user fs-5"></i>
                                </a>
                                <!--Account dropdown-->
                                <div class="dropdown-menu dropdown-menu-end">
                                    <div class="dropdown-header">Account</div>
                                    <a href="{{ URL::asset('#!') }}" class="dropdown-item">Login</a>
                                    <a href="{{ URL::asset('#!') }}" class="dropdown-item">Create Account</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>
        <!--::/end Header-->
        <!--Main content-->
        <main class="main-content" id="main-content">
{{$slot}}
        </main>

        <x-partials.footers.footer-2 />

        <!-- begin Back to Top button -->
        <a href="{{ URL::asset('#') }}" class="toTop"><svg class="progress-circle" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
                <circle cx="50" cy="50" r="40" fill="none" stroke="currentColor" stroke-width="4" stroke-dasharray="0, 251.2">
                </circle>
            </svg>
            <i class="bx bxs-up-arrow"></i>
        </a>
        <!-- scripts -->
        <script src="{{ URL::asset('assets/js/theme.bundle.min.js') }}"></script>
        <!--Copy to clipboard + prismJs-->
        <script src="{{ URL::asset('assets/vendor/node_modules/js/prism.js') }}"></script>
        <script src="{{ URL::asset('assets/vendor/node_modules/js/clipboard.min.js') }}"></script>
        <script>
            /* Clipboard JS - Copy code button */
            var cl = document.querySelector('.copy-link');
            if (typeof !!cl && (cl) != 'undefined' && cl != null) {
                var cle = document.querySelectorAll('.copy-link');
                cle.forEach(el => {
                    el.addEventListener("click", function () {
                        var theButton = this;
                        var copyId = this.getAttribute('id');
                        var clipboard = new ClipboardJS('#' + copyId);

                        clipboard.on('success', function (e) {
                            e.clearSelection();
                            theButton.innerHTML = 'Copied!';
                            setTimeout(function () {
                                theButton.innerHTML = 'Copy code';
                            }, 5000);
                        });
                    });
                });
            }

        </script>
    </body>

</html>
