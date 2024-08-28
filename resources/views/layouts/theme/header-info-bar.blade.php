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
        <header class="z-fixed">
            <div class="container pt-2">
                <div class="row align-items-center">
                    <div class="col-5">
                       <ul class="list-inline mb-0">
                           <li class="list-inline-item me-0">
                            <a href="{{ URL::asset('#!') }}" class="d-inline-block text-reset si rounded-pill width-2x height-2x si-hover-facebook">
                                <i class="bx bxl-facebook fs-6"></i>
                                <i class="bx bxl-facebook fs-6"></i>
                            </a>
                           </li>
                           <li class="list-inline-item me-0">
                            <a href="{{ URL::asset('#!') }}" class="d-inline-block text-reset si rounded-pill width-2x height-2x si-hover-twitter">
                                <i class="bx bxl-twitter fs-6"></i>
                                <i class="bx bxl-twitter fs-6"></i>
                            </a>
                           </li>
                           <li class="list-inline-item">
                            <a href="{{ URL::asset('#!') }}" class="d-inline-block text-reset si rounded-pill width-2x height-2x si-hover-linkedin">
                                <i class="bx bxl-linkedin fs-6"></i>
                                <i class="bx bxl-linkedin fs-6"></i>
                            </a>
                           </li>
                       </ul>
                    </div>
                    <div class="col-7 text-end">
                        <div class="d-flex align-items-center justify-content-end">
                            <span class="me-3 text-body-secondary small">
                                <i class="bx bx-phone d-none d-sm-inline-block me-2 align-middle"></i><a href="{{ URL::asset('tel:0123456789') }}">+01 555 1234 789</a>
                            </span>
                            <a href="{{ URL::asset('#') }}" class="small"><i class="bx bx-user-circle d-none d-sm-inline-block me-2 align-middle"></i>Login</a>
                        </div>
                    </div>
                </div>
            </div>
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
 if(typeof !!cl && (cl) != 'undefined' && cl != null) {
         var cle = document.querySelectorAll('.copy-link');
         cle.forEach(el => {
             el.addEventListener("click", function () {
                       var theButton = this;
                       var copyId = this.getAttribute('id');
                       var clipboard = new ClipboardJS( '#' + copyId );
                       
                       clipboard.on('success', function(e) {
                         e.clearSelection();
                       theButton.innerHTML = 'Copied!';
                       setTimeout(function() {
                           theButton.innerHTML = 'Copy code';
                         }, 5000);
                       });
             });         
         });
 } 
         </script>
    </body>

</html>
