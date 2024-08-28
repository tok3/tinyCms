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
                        <div class="nav-item me-3 ms-lg-5 me-lg-0">
                            <a href="{{ URL::asset('page-account-signin.html') }}" class="nav-link">
                                <i class="bx bx-user fs-4"></i>
                            </a>
                        </div>
                        <div class="nav-item me-3 ms-lg-5 me-lg-0 dropdown position-static">
                            <a href="{{ URL::asset('#') }}" data-bs-toggle="dropdown" class="nav-link flex-center position-relative">
                               <i class="bx bx-cart fs-4"></i>
                                <span class="cart-number width-2x height-2x small bg-white rounded-circle text-primary shadow-sm flex-center position-absolute end-0 top-0 me-n3 mt-n1">3</span>  
                            </a>
                            <div class="dropdown-menu top-100 me-lg-n2 shadow-lg dropdown-menu-end width-320 mt-2 mt-lg-0">
                                <ul class="list-unstyled mb-0">
                                    <li class="d-flex align-items-center p-3 pb-0">
                                        <div class="me-0">
                                            <a href="{{ URL::asset('#!') }}"><img src="assets/img/shop/backpack2.jpg" class="height-10x hover-lift hover-shadow w-auto rounded-3" alt=""></a>
                                        </div>
                                        <div class="flex-grow-1 px-4 mb-3">
                                            <a href="{{ URL::asset('#!') }}" class="d-block lh-sm fw-semibold mb-2">Laptop backpack water proof</a>
                                            <p class="mb-0 small"><small class="text-body-secondary">$</small><strong>49.00</strong> x <strong>1</strong></p>
                                        </div>
                                        <div class="d-block text-end">
                                            <a href="{{ URL::asset('#!') }}" class="text-body-secondary">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bx bx-x" viewBox="0 0 16 16">
                                                    <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                                                  </svg>
                                            </a>
                                        </div>
                                    </li>
                                    <li class="d-flex p-3 align-items-center">
                                        <div class="me-0">
                                            <a href="{{ URL::asset('#!') }}"><img src="assets/img/shop/jacket1.jpg" class="height-10x hover-lift hover-shadow w-auto rounded-3" alt=""></a>
                                        </div>
                                        <div class="flex-grow-1 px-4 mb-3">
                                            <a href="{{ URL::asset('#!') }}" class="d-block lh-sm fw-semibold mb-2">Brown denim jacket for mens</a>
                                            <p class="mb-0 small"><small class="text-body-secondary">$</small><strong>64.00</strong> x <strong>1</strong></p>
                                        </div>
                                        <div class="d-block text-end">
                                            <a href="{{ URL::asset('#!') }}" class="text-body-secondary">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bx bx-x" viewBox="0 0 16 16">
                                                    <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                                                  </svg>
                                            </a>
                                        </div>
                                    </li>
                                    <li class="d-flex p-3 justify-content-between align-items-center">
                                        <span class="font-weight-normal">Subtotal</span>
                                        <h6 class="mb-0">$113.00</h6>
                                    </li>
                                    <li class="p-3">
                                        <div class="text-center mb-2 d-grid">
                                            <a href="{{ URL::asset('#!') }}" class="btn btn-gray-200 btn-hover-arrow">
                                                            <span>View Cart</span>
                                                        </a>
                                        </div>
                                        <div class="d-grid">
                                            <a href="{{ URL::asset('#!') }}" class="btn btn-primary btn-hover-arrow">
                                                <span class="btn-animated-visible">Checkout</span>
                                            </a>
                                        </div>
                                    </li>
                                </ul>
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

        <x-partials.footers.footer-3 />

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
