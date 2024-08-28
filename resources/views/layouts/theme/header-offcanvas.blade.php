<!doctype html>
<html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="{{ URL::asset('assets/img/favicon.ico') }}" type="image/ico">
        <x-partials.head-includes />
        <!--Prism css for code snippets-->
        <link rel="stylesheet"
            href="{{ URL::asset('assets/vendor/node_modules/css/prism-tomorrow.css') }}">
        <!-- Main CSS -->
        @vite(['resources/scss/theme.scss'])

        <title>Assan 4</title>
    </head>

    <body>
        <x-partials.preloader />
        <!--Header Start-->
        <header class="header-transparent header-absolute-top pt-lg-2">
            <nav class="navbar navbar-expand-lg navbar-light navbar-link-white">
                <div class="container position-relative">
                    <a class="navbar-brand" href="{{ URL::asset('assan/index.html') }}">
                        <img src="{{ URL::asset('assets/img/logo/logo-white.svg') }}" alt="" class="img-fluid">
                    </a>

                    <div class="d-flex align-items-center navbar-no-collapse-items order-lg-last">
                        <div class="nav-item me-3 me-lg-0">
                            <a href="{{ URL::asset('#') }}" class="btn btn-light btn-sm rounded-pill">Purchase</a>
                        </div>
                        <div class="nav-item me-3 me-lg-0">
                            <a href="{{ URL::asset('#') }}" data-bs-toggle="offcanvas" data-bs-target="#offcanvasEnd"
                                class="btn p-0 flex-center width-4x height-4x btn-outline-white rounded-circle ms-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                    class="bx bx-list" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M2.5 11.5A.5.5 0 0 1 3 11h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4A.5.5 0 0 1 3 7h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4A.5.5 0 0 1 3 3h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </nav>
        </header>
        <!--Vertical header offcanvas-->
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasEnd"
            aria-labelledby="offcanvasEndLabel">
            <div class="offcanvas-header">
                <button type="button" class="btn btn-success p-0 m-0 width-4x height-4x flex-center ms-auto"
                    data-bs-dismiss="offcanvas" aria-label="Close">
                    <i class="bx bx-x fs-5"></i>
                </button>
            </div>
            <div class="offcanvas-body p-4 px-xl-5">
                <ul class="nav flex-column collapse d-flex collapse-group" id="offcanvas_navbar">
                    <li class="nav-item"><a href="{{ URL::asset('#c_home') }}" class="nav-link fs-3" data-bs-toggle="collapse"
                            aria-expanded="false">Home</a>
                        <div id="c_home" class="collapse" data-bs-parent="#offcanvas_navbar">
                            <ul class="nav flex-column ps-4">
                                <li class="nav-item">
                                    <a href="{{ URL::asset('#') }}" class="nav-link fs-5 py-1">Nav Item</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ URL::asset('#') }}" class="nav-link fs-5 py-1">Another Item</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item"><a href="{{ URL::asset('#c_about') }}" class="nav-link fs-3" data-bs-toggle="collapse"
                            aria-expanded="false">About</a>
                        <div id="c_about" class="collapse">
                            <ul class="nav flex-column ps-4">
                                <li class="nav-item">
                                    <a href="{{ URL::asset('#') }}" class="nav-link fs-5 py-1">Who we are</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ URL::asset('#') }}" class="nav-link fs-5 py-1">Team</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item"><a href="{{ URL::asset('#') }}" class="nav-link fs-3">Portfolio</a></li>
                    <li class="nav-item"><a href="{{ URL::asset('#') }}" class="nav-link fs-3">Capabilities</a></li>
                    <li class="nav-item"><a href="{{ URL::asset('#') }}" class="nav-link fs-3">Contact</a></li>
                </ul>
            </div>
            <div class="offcanvas-footer p-4 px-xl-5 border-top">
                <ul class="list-unstyled mb-0">
                    <li class="pb-4">
                        <small class="text-body-secondary d-block">Email us:</small>
                        <a href="{{ URL::asset('mailto:company@domain.com') }}" class="link-underline fs-5">company@domain.com</a>
                    </li>
                    <li>
                        <ul class="list-inline">
                            <li class="list-inline-item me-3">
                                <a href="{{ URL::asset('#') }}" class="fs-5"><i class="bx bxl-facebook"></i></a>
                            </li>
                            <li class="list-inline-item me-3">
                                <a href="{{ URL::asset('#') }}" class="fs-5"><i class="bx bxl-twitter"></i></a>
                            </li>
                            <li class="list-inline-item me-3">
                                <a href="{{ URL::asset('#') }}" class="fs-5"><i class="bx bxl-linkedin"></i></a>
                            </li>
                            <li class="list-inline-item">
                                <a href="{{ URL::asset('#') }}" class="fs-5"><i class="bx bxl-instagram"></i></a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>

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
