<!doctype html>
<html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="{{ URL::asset('assets/img/favicon.ico') }}" type="image/ico">
        <x-partials.head-includes />
        <!-- Main CSS -->
        @vite(['resources/scss/theme.scss'])
        <title>Assan 4</title>
    </head>

    <body>
        <x-partials.preloader />
        <!--Header Start-->
        <header class="z-fixed header-transparent header-absolute-top pt-lg-3">
            <nav class="navbar navbar-expand-lg navbar-light navbar-link-white">
                <div class="container position-relative">
                    <a class="navbar-brand" href="{{ URL::asset('assan/index.html') }}">
                        <img src="{{ URL::asset('assets/img/logo/logo-white.svg') }}" alt="" class="img-fluid">
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
                        <x-partials.headers.default-navbar-items page='portfolio' />
                    </div>
                </div>
            </nav>
        </header>
        <!--Main content-->
        <main>
{{$slot}}
        </main>


        <x-partials.footers.footer-4 />
        <!-- begin Back to Top button -->
        <a href="{{ URL::asset('#') }}" class="toTop"><svg class="progress-circle" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
  <circle cx="50" cy="50" r="40" fill="none" stroke="currentColor" stroke-width="4" stroke-dasharray="0, 251.2"></circle>
</svg>
            <i class="bx bxs-up-arrow"></i>
        </a>
        <!-- scripts -->
        <script src="{{ URL::asset('assets/js/theme.bundle.min.js') }}"></script>

        <!--Page script-->
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
                                rotate: -4
                            })
                        }),
                    e.addEventListener("mouseleave", () => {
                        e.classList.contains("is-hover") && e.classList.remove("is-hover")
                    })
            });
    
         </script>
    </body>

</html>
