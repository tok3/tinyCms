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
                        <div class="nav-item me-3 me-lg-0 dropdown">
                            <!--:User:-->
                            <a href="{{ URL::asset('#') }}" class="btn btn-outline-primary dropdown-toggle rounded-pill py-0 ps-0 pe-2"
                                data-bs-auto-close="outside" data-bs-toggle="dropdown">
                                <img src="{{ URL::asset('assets/img/avatar/12.jpg') }}" alt="" class="avatar sm rounded-circle me-1">
                                <small>jh</small>
                            </a>
                            <!--:User dropdown:-->
                            <div class="dropdown-menu shadow-lg dropdown-menu-end dropdown-menu-xs p-0">
                                <a href="{{ URL::asset('#!') }}" class="dropdown-header border-bottom p-4">
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <img src="{{ URL::asset('assets/img/avatar/12.jpg') }}" alt=""
                                                class="avatar xl rounded-pill me-3">
                                        </div>
                                        <div>
                                            <h5 class="mb-0 text-body">Jaquine Harnandez</h5>
                                            <span
                                                class="d-block mb-2 text-lowercase">jaquinehar@domain.com</span>
                                            <div class="small d-inline-block link-underline fw-semibold">View
                                                account</div>
                                        </div>
                                    </div>
                                </a>
                                <a href="{{ URL::asset('header-login.html') }}" class="dropdown-item rounded-top-0 p-3">
                                    <span class="d-block text-end">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                            fill="currentColor" class="bx bx-box-arrow-right me-2" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd"
                                                d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z" />
                                            <path fill-rule="evenodd"
                                                d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z" />
                                        </svg>
                                        Sign Out
                                    </span>
                                </a>
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
