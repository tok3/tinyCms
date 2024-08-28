<!doctype html>
<html lang="en" data-bs-theme="light">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="{{ URL::asset('assets/img/favicon.ico') }}" type="image/ico">
        <x-partials.head-includes />
        <!--Master slider-->
        <link rel="stylesheet" href="{{ URL::asset('assets/vendor/masterslider/style/masterslider.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('assets/vendor/masterslider/skins/black-1/style.css') }}">
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
        <header class="z-fixed header-transparent header-absolute-top sticky-reverse">
            <nav class="navbar navbar-expand-lg navbar-dark">
                <div class="container-fluid">
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
                        <div class="nav-item me-3 me-lg-0 ms-lg-4">
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

        <main>
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


        <!--Mastert Slider start (Include jquery before master slider js)-->
        <script src="{{ URL::asset('assets/vendor/node_modules/js/jquery.min.js') }}"></script>
        <script src="{{ URL::asset('assets/vendor/masterslider/jquery.easing.min.js') }}"></script>
        <script src="{{ URL::asset('assets/vendor/masterslider/masterslider.min.js') }}"></script>
        <script>
            var slider = new MasterSlider();
            slider.setup('masterslider', {
                width: 1550,
                height: 768,
                minHeight: 380,
                space: 0,
                start: 1,
                grabCursor: false,
                layout: "fullwidth",
                wheel: false,
                autoplay: true,
                instantStartLayers: true,
                loop: true,
                view: "basic",
                instantStartLayers: true,
            });
            slider.control('arrows');

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
