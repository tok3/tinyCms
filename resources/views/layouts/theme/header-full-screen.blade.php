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
        <!--Preloader Spinner-->
        <div class="spinner-loader bg-gradient bg-secondary text-white">
            <div class="spinner-border text-primary" role="status">
            </div>
            <span class="small d-block ms-2">Loading...</span>
        </div>
        <!--Begin::Header-->
        <header class="z-fixed header-absolute-top pt-lg-1 header-transparent">
            <nav class="navbar navbar-expand-lg navbar-dark">
                <div class="container">
                    <!--Logo-->
                    <a class="navbar-brand" href="{{ URL::asset('assan/index.html') }}">
                        <img src="{{ URL::asset('assets/img/logo/logo-white.svg') }}" alt="" class="img-fluid">
                    </a>
                    <div class="d-flex align-items-center navbar-no-collapse-items py-3 order-last">
                        <div class="nav-item fullscreen-toggler order-last ms-4">
                            <!--Fullscreen trigger-->
                            <a href="{{ URL::asset('#offcanvas-fullscreen') }}" class="nav-link width-3x d-block" data-bs-toggle="offcanvas"
                                data-bs-target="#offcanvas-fullscreen">
                                <div class="width-2x mb-1 border-bottom border-white border-2"></div>
                                <div class="width-2x ms-auto border-bottom border-white border-2"></div>
                            </a>
                        </div>
                        <div class="nav-item ms-3 ms-lg-4">
                            <a href="{{ URL::asset('#') }}"
                                class="btn btn-outline-light border-0 rounded-pill btn-sm p-0 width-3x height-3x flex-center">
                            <i class="bx bxl-facebook fs-5"></i>    
                            </a>
                        </div>
                        <div class="nav-item ms-1">
                            <a href="{{ URL::asset('#') }}"
                                class="btn btn-outline-light border-0 rounded-pill btn-sm p-0 width-3x height-3x flex-center">
                                <i class="bx bxl-twitter fs-5"></i>
                            </a>
                        </div>
                        <div class="nav-item ms-1">
                            <a href="{{ URL::asset('#') }}"
                                class="btn btn-outline-light border-0 rounded-pill btn-sm p-0 width-3x height-3x flex-center">
                                <i class="bx bxl-instagram fs-5"></i>
                            </a>
                        </div>
                        <div class="nav-item ms-1">
                            <a href="{{ URL::asset('#') }}"
                                class="btn btn-outline-light border-0 rounded-pill btn-sm p-0 width-3x height-3x flex-center">
                                <i class="bx bxl-linkedin fs-5"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </nav>
        </header>
        <!--/end::Header-->

        <!--Begin::Fullscreen Offcanvas-->
        <div class="offcanvas offcanvas-fullscreen offcanvas-top h-100" id="offcanvas-fullscreen">
            <div class="offcanvas-body">
                <!--Offcanvas fullscreen close-->
                <div class="position-absolute end-0 top-0 mt-3 me-5">
                    <button class="btn btn-outline-secondary p-0 flex-center width-4x height-4x rounded-circle"
                        data-bs-dismiss="offcanvas">
                        <i class="bx bx-x fs-4"></i>
                    </button>
                </div>
                <!--Offcanvas fullscreen content-->
                <div class="container h-100">
                    <div class="row h-100 align-items-center">
                        <div class="col-md-7 mb-5 mb-md-0">
                            <div class="d-inline-flex">
                                <ul class="js-hover-img">
                                    <li class="js-hover-img-item mb-4">
                                        <div class="js-hover-img-link display-4">
                                            <a href="{{ URL::asset('#') }}">Index</a>
                                        </div>
                                        <img src="{{ URL::asset('assets/img/projects/1.jpg') }}" alt="Image" class="img">
                                    </li>
                                    <li class="js-hover-img-item mb-4">
                                        <div class="js-hover-img-link display-4">
                                            <a href="{{ URL::asset('#') }}">Who we are</a>
                                        </div>
                                        <img src="{{ URL::asset('assets/img/projects/2.jpg') }}" alt="Image" class="img">
                                    </li>
                                    <li class="js-hover-img-item mb-4">
                                        <div class="js-hover-img-link display-4">
                                            <a href="{{ URL::asset('#') }}">Projects</a>
                                        </div>
                                        <img src="{{ URL::asset('assets/img/projects/3.jpg') }}" alt="Image" class="img">
                                    </li>
                                    <li class="js-hover-img-item mb-4">
                                        <div class="js-hover-img-link display-4">
                                            <a href="{{ URL::asset('#') }}">Services</a>
                                        </div>
                                        <img src="{{ URL::asset('assets/img/projects/4.jpg') }}" alt="Image" class="img">
                                    </li>
                                    <li class="js-hover-img-item">
                                        <div class="js-hover-img-link display-4">
                                            <a href="{{ URL::asset('#') }}">Contact</a>
                                        </div>
                                        <img src="{{ URL::asset('assets/img/projects/5.jpg') }}" alt="Image" class="img">
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <!--Address-->
                            <h3 class="mb-4 fullscreen-item">1355 Market St, <br> Suite 900,
                                San Francisco<br>
                                CA, 94103</h3>
                            <div class="fullscreen-item">
                                <!--Phone-->
                                <a href="{{ URL::asset('#!') }}" class="fs-4 link-hover-underline">+011(1234) 56789</a>
                                <!--Divider-->
                                <hr class="bg-transparent border-top my-4 opacity-75">
                                <!--Email-->
                                <a href="{{ URL::asset('mailto:mail@domain.agency') }}"
                                    class="fs-4 link-hover-underline">mail@domain.agency</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--::/end offcanvas fullscreen-->

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

        <!--Gsap animations-->
        <script src="{{ URL::asset('assets/vendor/node_modules/js/gsap.min.js') }}"></script>
        <script>
            let vw = window.innerWidth || document.documentElement.clientWidth,
                maxVw = 320;
            vw > maxVw && document.querySelectorAll(".js-hover-img-item").forEach(function (e) {
                let t = e,
                    r = (t.getBoundingClientRect(),
                        e.querySelector("img")),
                    a = r.offsetHeight,
                    l = r.offsetWidth;
                e.addEventListener("mouseenter",
                        s => {
                            e.classList.contains("is-hover") || e.classList.add("is-hover");
                            let o = s.clientX - t.offsetLeft - l / 2,
                                u = s.offsetY - a / 2;
                            gsap.set(r, {
                                x: o,
                                y: u,
                            })
                        }),
                    e.addEventListener("mousemove",
                        e => {
                            let s = e.clientX - t.offsetLeft - l / 2,
                                o = e.offsetY - r.offsetTop - a * .5;
                            gsap.to(r, {
                                x: s,
                                y: o,
                                rotate: -4,
                            })
                        }),
                    e.addEventListener("mouseleave", () => {
                        e.classList.contains("is-hover") && e.classList.remove("is-hover")
                    })
            });

        </script>
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
