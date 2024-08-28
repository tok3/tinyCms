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
    </head>

    <body>
        <x-partials.preloader />
        <!--Header Start-->
        <header class="z-fixed header-transparent header-absolute-top pt-lg-3">
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="container position-relative">
                    <!--:Brand Logo:-->
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
                        <!--:Sign In Dropdown:-->
                        <div class="nav-item me-3 me-lg-0 ms-lg-4 ms-xl-5 dropdown">
                            <a href="{{ URL::asset('#') }}" class="btn btn-outline-primary px-4 btm-sm rounded-pill py-1"
                                data-bs-auto-close="outside" data-bs-toggle="dropdown">
                                Sign In
                            </a>
                            <div class="dropdown-menu dropdown-menu-end dropdown-menu-xs p-4">
                                <!--:Sign In Form:-->
                                <form class="needs-validation" novalidate>
                                    <div>
                                        <h3 class="mb-1">
                                            Welcome back!
                                        </h3>
                                        <p class="mb-4 text-body-secondary">
                                            Please Sign In with details...
                                        </p>
                                    </div>
                                    <div class="input-icon-group mb-3">
                                        <span class="input-icon">
                                            <i class="bx bx-envelope"></i>
                                        </span>
                                        <input type="email" required class="form-control" autofocus=""
                                            placeholder="Username">
                                    </div>
                                    <div class="input-icon-group mb-3">
                                        <span class="input-icon">
                                            <i class="bx bx-key"></i>
                                        </span>
                                        <input type="password" required class="form-control" placeholder="Password">
                                    </div>
                                    <div class="mb-3 d-flex justify-content-between">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value=""
                                                id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Remember me
                                            </label>
                                        </div>
                                        <div>
                                            <label class="text-end d-block small mb-0"><a
                                                    href="{{ URL::asset('page-account-forget-password.html') }}"
                                                    class="link-decoration">Forget Password?</a></label>
                                        </div>
                                    </div>

                                    <div class="d-grid">
                                        <button class="btn btn-primary btn-hover-arrow" type="submit">
                                            <span>Sign in</span>
                                        </button>
                                    </div>
                                    <p class="pt-4 mb-0 text-body-secondary">
                                        Don’t have an account yet? <a href="{{ URL::asset('page-account-signup.html') }}"
                                            class="ms-2 pb-0 fw-semibold link-underline">Sign Up</a>
                                    </p>
                                </form>
                            </div>
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

        <x-partials.footers.footer-2 />

        <!-- begin Back to Top button -->
        <a href="{{ URL::asset('#') }}" class="toTop"><svg class="progress-circle" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
  <circle cx="50" cy="50" r="40" fill="none" stroke="currentColor" stroke-width="4" stroke-dasharray="0, 251.2"></circle>
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
