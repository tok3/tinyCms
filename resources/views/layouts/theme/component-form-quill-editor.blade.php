<!doctype html>
<html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="{{ URL::asset('assets/img/favicon.ico') }}" type="image/ico">
        <x-partials.head-includes />

        <!--Quill editor-->
        <link rel="stylesheet" href="{{ URL::asset('assets/vendor/node_modules/css/quill.snow.css') }}">

        <!-- Main CSS -->
        @vite(['resources/scss/theme.scss'])

        <title>Assan 4</title>
    </head>

    <body>
        <x-partials.preloader />
        <!--Header Start-->
        <header class="z-fixed header-transparent header-absolute-top sticky-reverse">
            <nav class="navbar navbar-expand-lg navbar-light navbar-link-white">
                <div class="container position-relative">
                    <a class="navbar-brand" href="{{ URL::asset('assan/index.html') }}">
                        <img src="{{ URL::asset('assets/img/logo/logo.svg') }}" alt="" class="img-fluid navbar-brand-sticky">
                        <img src="{{ URL::asset('assets/img/logo/logo-white.svg') }}" alt="" class="img-fluid navbar-brand-transparent">
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
                        <x-partials.headers.default-navbar-items page='components' />
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

        <!--Page script-->
        <script src="{{ URL::asset('assets/vendor/node_modules/js/quill.min.js') }}"></script>
        <script>
            var initQuill = document.querySelectorAll("[data-quill]");
            initQuill.forEach((qe) => {
                const qt = {
                    ...(qe.dataset.quill ? JSON.parse(qe.dataset.quill) : {}),
                    modules: {
                        toolbar: [
                            [{ header: [1, 2, false] }],
                            ["bold", "underline"],
                            ["link", "blockquote", "code", "image"],
                            [{ list: "ordered" }, { list: "bullet" }]
                        ]
                    },
                    theme: "snow"
                };
                new Quill(qe, qt);
            });
        </script>
    </body>

</html>
