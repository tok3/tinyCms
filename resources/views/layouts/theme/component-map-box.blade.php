<!doctype html>
<html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="{{ URL::asset('assets/img/favicon.ico') }}" type="image/ico">
        <x-partials.head-includes />
        <!--Prism css snippets-->
        <link rel="stylesheet" href="{{ URL::asset('assets/vendor/node_modules/css/prism-tomorrow.css') }}">
        <!--Mapbox-->
        <link href='https://api.mapbox.com/mapbox-gl-js/v2.1.1/mapbox-gl.css' rel='stylesheet'/>
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

        <!--maps js-->
        <script src='https://api.mapbox.com/mapbox-gl-js/v2.1.1/mapbox-gl.js'></script>
        <script>
            mapboxgl.accessToken = 'pk.eyJ1IjoiZGVzaWdubXlsaWZlIiwiYSI6ImNqeHlkMzljejAwaHAzbXFtaXphYWI3NmYifQ.IRPz2gseBSE-DQMzurY4ZA';
            var officeLocation = [75.788350, 26.958520];
            var map = new mapboxgl.Map({
                container: 'map',
                style: 'mapbox://styles/mapbox/light-v10',
                center: officeLocation,
                zoom: 9
            });
            // create the popup
            var popup = new mapboxgl.Popup({ offset: 18 }).setHTML(
                '<h6 class="text-primary mb-0 fw-normal">Our office</h6><small class="text-body-secondary">CreativeDM, SE-03, Vidhyadhar Nagar, Jaipur, 302012</small>'
            );
            // create DOM element for the marker
            var el = document.createElement('div');
            el.id = 'marker';
            // disable map zoom when using scroll
            map.scrollZoom.disable();
            // create the marker
            new mapboxgl.Marker(el)
                .setLngLat(officeLocation)
                .setPopup(popup) // sets a popup on this marker
                .addTo(map);
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
