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
        <header class="z-fixed pt-3 header-absolute-top header-boxed header-sticky">
            <div class="container text-white position-relative d-none d-lg-block">
                <div class="row">
                    <div class="col-md-8 ms-auto">
                        <div class="d-flex justify-content-end">
                            <a href="{{ URL::asset('tel:+011234567890') }}" class="small me-4">
                                <i class="bx bx-devices me-1"></i>
                                +01 1234 567 890
                            </a>
                            <a href="{{ URL::asset('mailto:consult@company.com') }}" class="small">
                                <i class="bx bx-envelope me-1"></i>
                                consult@company.com
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="navbar-boxed">
                <div class="container">

                    <nav class="navbar navbar-expand-lg navbar-light navbar-link-white rounded-3">
                        <a class="navbar-brand" href="{{ URL::asset('assan/index.html') }}">
                            <img src="{{ URL::asset('assets/img/logo/logo.svg') }}" alt="" class="img-fluid navbar-brand-sticky">
                            <img src="{{ URL::asset('assets/img/logo/logo-white.svg') }}" alt="" class="img-fluid navbar-brand-transparent">
                        </a>
                        <div class="d-flex align-items-center navbar-no-collapse-items order-lg-last">
                            <button class="navbar-toggler order-last" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbarTheme" aria-controls="mainNavbarTheme" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon">
                                    <i></i>
                                </span>
                            </button>
                            <div class="nav-item me-2 me-lg-0">
                                <a href="{{ URL::asset('#') }}" class="btn btn-primary py-1 px-3">Get started
                                </a>
                            </div>
                        </div>
                        <div class="collapse navbar-collapse" id="mainNavbarTheme">
                          <x-partials.headers.default-navbar-items page='features' />
                        </div>
                    </nav>

                </div>
            </div>
        </header>
        <!--Main content-->
        <main class="main-content" id="main-content">
{{$slot}}
        </main>

        <x-partials.footers.footer-2 />

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
