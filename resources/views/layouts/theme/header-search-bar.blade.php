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
        <!--::Begin Header-->
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
                        <div class="nav-item me-3 me-lg-0 fullscreen-toggler">
                            <a href="{{ URL::asset('#seachOffcanvas') }}" class="nav-link lh-1" data-bs-toggle="offcanvas">
                                <i class="bx bx-search-alt-2 fs-5 lh-1"></i>
                            </a>
                        </div>


                    </div>
                    <div class="collapse navbar-collapse" id="mainNavbarTheme">
                        <x-partials.headers.default-navbar-items page='features' />
                    </div>
                </div>
            </nav>
        </header>
        <!--::/end Header-->

        <!--Begin::Fullscreen-Offcanvas - Search-->
        <div class="offcanvas offcanvas-top offcanvas-fullscreen h-100" id="seachOffcanvas">
            <div class="offcanvas-body">
                <!--fullscreen close-->
                <button
                    class="btn position-absolute end-0 top-0 me-5 mt-3 z-2 btn-secondary width-4x height-4x flex-center p-0 rounded-circle"
                    data-bs-dismiss="offcanvas">
                    <i class="bx bx-x fs-5"></i>
                </button>
                <div class="container py-5">
                    <ul class="fullscreen-list list-unstyled mb-0 w-100">
                        <!--Item(animated)-->
                        <li class="fullscreen-item">
                            <div class="container mb-5 mb-lg-7">
                                <form>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="d-flex align-items-center">
                                                <span><i class="bx bx-search-alt-2 fs-4 text-body-secondary"></i></span>
                                                <input class="form-control form-control-lg border-0 shadow-none fs-2"
                                                    type="text" placeholder="Type and hit enter..." autofocus>
                                            </div>
                                        </div>
                                        <div class="col-1 d-none">
                                            <div class="d-grid">
                                                <button class="btn btn-lg btn-white rounded-0"
                                                    type="button">Search</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>
                        <!--Item(animated)-->
                        <li class="fullscreen-item">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-6 col-lg-5 me-lg-auto">
                                        <h6 class="mb-4">Popular Categories</h6>
                                         <!--Category badges-->
                                         <div class="d-flex flex-wrap align-items-center g-2">
                                            <span><a href="{{ URL::asset('#!') }}"
                                                    class="badge badge-pill bg-primary text-white hover-shadow hover-lift me-2 mb-2 px-3 py-2">Jeans</a></span>
                                            <span><a href="{{ URL::asset('#!') }}"
                                                    class="badge badge-pill bg-primary text-white hover-shadow hover-lift me-2 mb-2 px-3 py-2">Shoes</a></span>
                                            <span><a href="{{ URL::asset('#!') }}"
                                                    class="badge badge-pill bg-primary text-white hover-shadow hover-lift me-2 mb-2 px-3 py-2">Watches</a></span>
                                            <span><a href="{{ URL::asset('#!') }}"
                                                    class="badge badge-pill bg-primary text-white hover-shadow hover-lift me-2 mb-2 px-3 py-2">Men's</a></span>
                                            <span><a href="{{ URL::asset('#!') }}"
                                                    class="badge badge-pill bg-primary text-white hover-shadow hover-lift me-2 mb-2 px-3 py-2">Sneakers</a></span>
                                            <span><a href="{{ URL::asset('#!') }}"
                                                    class="badge badge-pill bg-primary text-white hover-shadow hover-lift me-2 mb-2 px-3 py-2">Casual</a></span>
                                            <span><a href="{{ URL::asset('#!') }}"
                                                    class="badge badge-pill bg-primary text-white hover-shadow hover-lift me-2 mb-2 px-3 py-2">Shirts</a></span>
                                            <span><a href="{{ URL::asset('#!') }}"
                                                    class="badge badge-pill bg-primary text-white hover-shadow hover-lift me-2 mb-2 px-3 py-2">T-shirts</a></span>
                                            <span><a href="{{ URL::asset('#!') }}"
                                                    class="badge badge-pill bg-primary text-white hover-shadow hover-lift me-2 mb-2 px-3 py-2">Lowers</a></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <h6 class="mb-5">Featured products</h6>
                                        <div class="row">
                                            <div class="col-md-10">
                                                <!--Item-->
                                                <a href="{{ URL::asset('#!') }}"
                                                    class="card-hover d-flex d-block overflow-hidden position-relative">
                                                    <div class="me-4 overflow-hidden width-6x height-6x">
                                                        <img src="{{ URL::asset('assets/img/shop/products/01.jpg') }}" alt=""
                                                            class="img-zoom img-fluid">
                                                    </div>
                                                    <div class="">
                                                        <div class="fs-6 fw-medium">Denim Jacket</div>
                                                        <span class="opacity-75">$69.00</span>
                                                    </div>
                                                </a>
                                                <!--Divider-->
                                                <hr class="my-3">
                                                <!--Item-->
                                                <a href="{{ URL::asset('#!') }}"
                                                    class="card-hover d-flex d-block overflow-hidden position-relative">

                                                    <div class="me-4 overflow-hidden width-6x height-6x">
                                                        <img src="{{ URL::asset('assets/img/shop/products/02.jpg') }}" alt=""
                                                            class="img-zoom img-fluid">
                                                    </div>
                                                    <div class="">
                                                        <div class="fs-6 fw-medium">White shirt for mens</div>
                                                        <span class="opacity-75">$24.00</span>
                                                    </div>
                                                </a>
                                                <!--Divider-->
                                                <hr class="my-3">
                                                <!--Item-->
                                                <a href="{{ URL::asset('#!') }}"
                                                    class="card-hover d-flex d-block overflow-hidden position-relative">
                                                    <div class="me-4 overflow-hidden width-6x height-6x">
                                                        <img src="{{ URL::asset('assets/img/shop/products/03.jpg') }}" alt=""
                                                            class="img-zoom img-fluid">
                                                    </div>
                                                    <div class="">
                                                        <div class="fs-6 fw-medium">High Shoes for womens</div>
                                                        <span class="opacity-75">$39.00</span>
                                                    </div>
                                                </a>
                                                <!--Divider-->
                                                <hr class="my-3">
                                                <!--Item-->
                                                <div class="text-end">
                                                    <a href="{{ URL::asset('#!') }}" class="link-hover-underline">Browse products
                                                        <svg xmlns='http://www.w3.org/2000/svg' fill='currentColor'
                                                            width="24" height="24" viewBox='0 0 24 24'>
                                                            <path d='M22 12l-4-4v3H3v2h15v3z'></path>
                                                        </svg>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!--/end::Fullscreen-Offcanvas - Search-->

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

        <!--Autofocus input on Offcanvas open-->
        <script>
            //Modal shown input autoFocus
            const myModalEl = document.querySelectorAll('.offcanvas')
            myModalEl.forEach(function (el) {
                el.addEventListener('shown.bs.offcanvas', event => {
                    event.preventDefault();
                    var input = document.querySelector("[autofocus]");
                    input.focus();
                })
            })

        </script>
    </body>

</html>
