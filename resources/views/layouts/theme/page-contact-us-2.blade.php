<!doctype html>
<html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="{{ URL::asset('assets/img/favicon.ico') }}" type="image/ico">
        <x-partials.head-includes />
        <!--Mapbox-->
        <link href='https://api.mapbox.com/mapbox-gl-js/v2.1.1/mapbox-gl.css' rel='stylesheet' />
        <!-- Main CSS -->
        @vite(['resources/scss/theme.scss'])

        <title>Assan 4</title>
    </head>

    <body>
        <x-partials.preloader />
        <!--Header Start-->
        <header class="z-fixed header-transparent header-absolute-top sticky-reverse">
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
                        <div class="nav-item me-3 ms-lg-4 me-lg-0">
                            <a href="{{ URL::asset('#') }}" class="btn btn-primary btn-sm">Sign Up</a>
                        </div>
                    </div>
                    <div class="collapse navbar-collapse" id="mainNavbarTheme">
                        <x-partials.headers.default-navbar-items page='pages' />
                    </div>
                </div>
            </nav>
        </header>
        <!--Main content-->

        <main class="main-content" id="main-content">
{{$slot}}
        </main>

    <!--::Success message Modal::-->
    <div id="successModal" class="modal fade">
        <div class="modal-dialog modal-dialog-xs modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body py-5 px-4 text-center">
                    <div class="width-7x height-7x mb-4 mx-auto d-flex align-items-center justify-content-center text-bg-success rounded-pill">
                         <i class="bx bx-check fs-2"></i>
                    </div>
                    <h3>Message Sent</h3>
                    <p class="mb-3 text-body-tertiary">We'll get back to you in 1-2 business days! </p>
                    <button type="button" class="btn btn-white btn-sm me-2 m-auto" data-bs-dismiss="modal"
                        aria-label="Close">Dismiss</button>
                </div>
            </div>
        </div>
    </div>
        <x-partials.footers.footer-2 />

        <!-- begin Back to Top button -->
        <a href="{{ URL::asset('#') }}" class="toTop"><svg class="progress-circle" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
  <circle cx="50" cy="50" r="40" fill="none" stroke="currentColor" stroke-width="4" stroke-dasharray="0, 251.2"></circle>
</svg>
            <i class="bx bxs-up-arrow"></i>
        </a>
        <!-- scripts -->
        <script src="{{ URL::asset('assets/js/theme.bundle.min.js') }}"></script>
        <script src='https://api.mapbox.com/mapbox-gl-js/v2.1.1/mapbox-gl.js'></script>
        <script>
            mapboxgl.accessToken =
                'pk.eyJ1IjoiZGVzaWdubXlsaWZlIiwiYSI6ImNqeHlkMzljejAwaHAzbXFtaXphYWI3NmYifQ.IRPz2gseBSE-DQMzurY4ZA';
            var officeLocation = [75.788350, 26.958520];
            var map = new mapboxgl.Map({
                container: 'map',
                style: 'mapbox://styles/mapbox/light-v10',
                center: officeLocation,
                zoom: 9
            });
            // create the popup
            var popup = new mapboxgl.Popup({
                offset: 18
            }).setHTML(
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

        <!--Autosize textarea-->
        <script src="{{ URL::asset('assets/vendor/node_modules/js/autosize.min.js') }}"></script>
        <script>
            var ta = document.querySelector('textarea');
            ta.style.display = 'none';
            autosize(ta);
            // Change layout
            ta.style.display = 'block';
            autosize.update(ta);
        </script>

<!--:Contact form:-->
<script>
    // Wait for the DOM to load
    document.addEventListener('DOMContentLoaded', function () {
        // Get the form element
        const form = document.getElementById('contactForm');
        const successModal = document.getElementById('successModal')


        form.addEventListener('submit', function (event) {
            event.preventDefault();
            form.classList.remove('was-validated');
            const formControls = form.querySelectorAll('.form-control');
            formControls.forEach(function (control) {
                control.classList.remove('is-invalid');
                control.classList.remove('is-valid');
            });
            if (form.checkValidity()) {
                const formData = new FormData(form);
                fetch(form.action, {
                    method: form.method,
                    body: formData
                })
                    .then(response => {
                        const toastBootstrap = bootstrap.Modal.getOrCreateInstance(
                            successModal)
                        toastBootstrap.show()
                        // Clear validation feedback
                        formControls.forEach(function (control) {
                            control.value = '';
                        });

                        // Remove 'was-validated' class
                        form.classList.remove('was-validated');
                    })
                    .catch(error => {
                        console.error(error);
                    });
            }
            form.classList.add('was-validated');
        });
    });

</script>
    </body>

</html>
