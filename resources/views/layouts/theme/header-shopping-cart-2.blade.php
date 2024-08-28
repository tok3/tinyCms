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
                            <a href="{{ URL::asset('#offcanvasCart') }}" class="nav-link px-2 position-relative" data-bs-toggle="offcanvas">
                                <i class="bx bx-cart fs-4"></i>
                                <span class="cart-number width-2x height-2x small bg-white rounded-circle text-primary shadow-sm flex-center position-absolute end-0 top-0 me-n3 mt-n1">3</span>  
                            </a>
                        </div>
                    </div>
                    <div class="collapse navbar-collapse" id="mainNavbarTheme">
                        <x-partials.headers.default-navbar-items page='features' />
                    </div>
                </div>
            </nav>
        </header>
        <!--Cart Offcanvas-->
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasCart" aria-labelledby="offcanvasCart">
            <div class="border-bottom offcanvas-header align-items-center justify-content-between">
                <h6 class="mb-0 text-body-secondary">Your Cart (3)</h6>
                <button type="button" class="btn-close btn-secondary p-0 m-0 width-3x height-3x flex-center ms-auto"
                    data-bs-dismiss="offcanvas" aria-label="Close">
                    <i class="bx bx-x fs-5"></i>
                </button>
            </div>
            <div class="offcanvas-body p-4">
                <ul class="list-unstyled no-animation mb-0">
                    <li class="d-flex py-3 border-bottom">
                        <div class="me-1">
                            <a href="{{ URL::asset('#!') }}"><img src="assets/img/shop/backpack2.jpg"
                                    class="height-10x hover-lift hover-shadow w-auto rounded-1" alt=""></a>
                        </div>
                        <div class="flex-grow-1 px-4 mb-3">
                            <a href="{{ URL::asset('#!') }}" class="d-block lh-sm fw-semibold mb-2">Laptop backpack water
                                proof</a>
                                <p class="mb-0 small"><strong>$29.00</strong> x
                                    <strong>1</strong></p>
                        </div>
                        <div class="d-block text-end">
                            <a href="{{ URL::asset('#!') }}" class="text-body-secondary small text-decoration-underline">
                                Remove
                            </a>
                        </div>
                    </li>
                    <li class="d-flex py-3">
                        <div class="me-1">
                            <a href="{{ URL::asset('#!') }}"><img src="assets/img/shop/jacket1.jpg"
                                    class="height-10x hover-lift hover-shadow w-auto rounded-1" alt=""></a>
                        </div>
                        <div class="flex-grow-1 px-4 mb-3">
                            <a href="{{ URL::asset('#!') }}" class="d-block lh-sm fw-semibold mb-2">Brown denim jacket for
                                mens</a>
                            <p class="mb-0 small"><strong>$64.00</strong> x
                                <strong>2</strong></p>
                        </div>
                        <div class="d-block text-end">
                            <a href="{{ URL::asset('#!') }}" class="text-body-secondary small text-decoration-underline">
                                Remove
                            </a>
                        </div>
                    </li>
                    <li class="d-flex py-3 mb-3 border-top justify-content-between align-items-center">
                        <span class="font-weight-normal">Subtotal</span>
                        <span class="fw-bold">$61.00</span>
                    </li>
                </ul>
            </div>
            <div class="offcanvas-footer p-4 border-top">
                <ul class="list-unstyled mb-0">
                    
                    <li class="pb-2 d-grid">
                        <a href="{{ URL::asset('#') }}" class="btn btn-secondary btn-hover-arrow"><span>View
                                shopping cart</span></a>
                    </li>
                    <li class="d-grid">
                        <a href="{{ URL::asset('#') }}"
                            class="btn btn-primary btn-hover-arrow"><span>Checkout</span></a>
                    </li>
                </ul>
            </div>
        </div>
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
