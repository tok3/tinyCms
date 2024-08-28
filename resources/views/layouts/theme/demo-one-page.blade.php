<!doctype html>
<html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="{{ URL::asset('assets/img/favicon.ico') }}" type="image/ico">

        <x-partials.head-includes />

        <!--Master slider-->
        <link rel="stylesheet" href="{{ URL::asset('assets/vendor/masterslider/style/masterslider.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('assets/vendor/masterslider/skins/black-1/style.css') }}">

        <!--Swiper slider-->
        <link rel="stylesheet" href="{{ URL::asset('assets/vendor/node_modules/css/swiper-bundle.min.css') }}">


        <!-- Main CSS -->
        @vite(['resources/scss/theme.scss'])

        <title>Assan 4</title>
    </head>

    <body>
        <x-partials.preloader />
        <!--Header Start-->
        <header class="z-fixed header-transparent header-fixed-top sticky-fixed">
            <nav class="navbar navbar-expand-lg navbar-light navbar-link-white">
                <!--Navbar-fixed-background-->
                <div class="navbar-fixed-bg position-absolute"></div>
                <div class="container">
                    <a class="navbar-brand" href="{{ URL::asset('assan/index.html') }}">
                        <img src="{{ URL::asset('assets/img/logo/logo.svg') }}" alt="" class="img-fluid navbar-brand-sticky">
                        <img src="{{ URL::asset('assets/img/logo/logo-white.svg') }}" alt="" class="img-fluid navbar-brand-transparent">
                    </a>
                    <div class="d-flex align-items-center navbar-no-collapse-items order-lg-last">
                        <button class="navbar-toggler order-last" type="button" data-bs-toggle="offcanvas"
                            data-bs-target="#mainNavbarTheme" aria-controls="mainNavbarTheme" aria-expanded="false"
                            aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon">
                                <i></i>
                            </span>
                        </button>
                        <div class="nav-item me-3 me-lg-0">
                            <a href="{{ URL::asset('#contact') }}" class="btn btn-primary btn-sm btn-hover-text">
                                <span class="btn-hover-label label-default">Get started</span>
                                <span class="btn-hover-label label-hover">Get started</span>
                            </a>
                        </div>
                    </div>
                    <div class="offcanvas-lg offcanvas-navbar offcanvas-end" id="mainNavbarTheme">
                        <div class="offcanvas-header p-2 justify-content-end">
                            <button type="button" data-bs-dismiss="offcanvas" data-bs-target="#mainNavbarTheme" class="btn btn-close">
                                <i class="bx bx-x fs-4 align-middle"></i>
                            </button>
                        </div>
                        <div class="offcanvas-body">
                            <x-partials.headers.one-page-navbar />
                        </div>
                    </div>
                </div>
            </nav>
        </header>


        <!--Main content-->
        <main data-bs-root-margin="0px" data-bs-spy="scroll" data-bs-target="#mainNavbarTheme">
{{$slot}}
        </main>

        <x-partials.footers.footer-1 />
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
        <!-- begin Back to Top button -->
        <a href="{{ URL::asset('#') }}" class="toTop"><svg class="progress-circle" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
  <circle cx="50" cy="50" r="40" fill="none" stroke="currentColor" stroke-width="4" stroke-dasharray="0, 251.2"></circle>
</svg>
            <i class="bx bxs-up-arrow"></i>
        </a>
        <!-- scripts -->
        <script src="{{ URL::asset('assets/js/theme.bundle.min.js') }}"></script>


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
        <!--Swiper slider-->
        <script src="{{ URL::asset('assets/vendor/node_modules/js/swiper-bundle.min.js') }}"></script>
        <script>
            //swiper-Projects
            var swiperProjects = new Swiper(".swiper-projects", {
                autoHeight: true,
                spaceBetween: 16,
                slidesPerView: 1,
                pagination: {
                    el: ".swiperProjects-pagination",
                    clickable: true
                }
            });

            //swiper-Testimonials
            var swiperQ = new Swiper(".swiper-quotes", {
                loop: true,
                grabCursor: true,
                speed: 600,
                autoHeight: true,
                navigation: {
                    nextEl: ".swiperTestimonials-button-next",
                    prevEl: ".swiperTestimonials-button-prev",
                },
            });
            var swiperP = new Swiper(".swiper-people", {
                spaceBetween: 10,
                loop: true,
                grabCursor: true,
                speed: 600,
            });
            // Link together the navigation of both swipers
            var swiperQuotes = document.querySelector('.swiper-quotes').swiper
            var swiperPeople = document.querySelector('.swiper-people').swiper

            swiperQuotes.controller.control = swiperPeople
            swiperPeople.controller.control = swiperQuotes

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

        <!--Close offcanvas menu on link click-->
        <script>
            var navLink = document.querySelectorAll(".offcanvas-body .nav-link");
            const bsOffcanvas = new bootstrap.Offcanvas('#mainNavbarTheme');
            navLink.forEach(function (el) {
                el.addEventListener("click", event => {
                    bsOffcanvas.hide(event)
                })
            })

        </script>
    </body>

</html>
