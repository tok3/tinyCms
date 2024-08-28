<!doctype html>
<html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="{{ URL::asset('assets/img/favicon.ico') }}" type="image/ico">
        <!--Box Icons-->
        <link rel="stylesheet" href="{{ URL::asset('assets/fonts/boxicons/css/boxicons.min.css') }}">
        <!-- Aos Animations CSS -->
        <link href="{{ URL::asset('assets/vendor/node_modules/css/aos.css') }}" rel="stylesheet">

        <!--:Google fonts:-->
        <link rel="preconnect" href="{{ URL::asset('https://fonts.googleapis.com') }}">
        <link rel="preconnect" href="{{ URL::asset('https://fonts.gstatic.com') }}" crossorigin>
        <link href="{{ URL::asset('https://fonts.googleapis.com/css2?family=Jost:wght@100..900&family=Source+Serif+Pro:ital@0;1&display=swap') }}" rel="stylesheet">
        <!--Swiper slider-->
        <link rel="stylesheet" href="{{ URL::asset('assets/vendor/node_modules/css/swiper-bundle.min.css') }}">
        <!-- Main CSS -->
        <link href="{{ URL::asset('assets/css/theme-orange.min.css') }}" rel="stylesheet">
        <title>Assan 4</title>
    </head>

    <body>
        <x-partials.preloader />
        <!--Header Start-->
        <header class="z-fixed header-fixed-top">
            <nav class="navbar navbar-expand-lg navbar-light bg-body">
                <div class="container py-lg-2 position-relative">
                    <a class="navbar-brand" href="{{ URL::asset('assan/index.html') }}">
                        <img src="{{ URL::asset('assets/img/logo/logo.svg') }}" alt="" class="navbar-brand-light img-fluid">
                        <img src="{{ URL::asset('assets/img/logo/logo-white.svg') }}" alt="" class="navbar-brand-dark img-fluid">
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
                            <a href="{{ URL::asset('#download') }}" class="btn btn-info">
                                Download App
                            </a>
                        </div>
                    </div>
                    <div class="collapse navbar-collapse" id="mainNavbarTheme">
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item me-lg-4">
                                <a class="nav-link" href="{{ URL::asset('#app-hero') }}" role="button">Home</a>
                            </li>
                            <li class="nav-item me-lg-4">
                                <a class="nav-link" href="{{ URL::asset('#features') }}" role="button">Features</a>
                            </li>
                            <li class="nav-item me-lg-5">
                                <a class="nav-link" href="{{ URL::asset('#faqs') }}" role="button">Faqs</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>

        <!--Main content start-->
        <main data-bs-spy="scroll" data-bs-target="#mainNavbarTheme" data-bs-root-margin="0px">
{{$slot}}
        </main>

        <!--Footer Start-->
        <footer class="footer bg-dark text-white rounded-top-start-block" data-bs-theme="dark">
            <div class="container pt-9 pt-lg-11 pb-5">
                <div class="row">
                    <div class="col-lg-3 col-md-5 mb-5">
                        <a class="d-table mb-4" href="{{ URL::asset('#') }}">
                            <img src="{{ URL::asset('assets/img/logo/logo-white.svg') }}" alt="" class="width-8x h-auto">
                        </a>
                        <p class="mb-0"><span class="text-body-tertiary">Phone:</span>
                            <a href="{{ URL::asset('tel:0123456789') }}">+01 1234 56789</a> <br><span class="text-body-tertiary">Email:</span> <a
                                href="{{ URL::asset('mailto:mailus@domain.com') }}">mailus@domain.com</a>
                        </p>
                        <x-partials.color-mode />
                    </div>
                    <div class="col-lg-2 col-md-3 col-sm-4 ms-md-auto  mb-5">
                        <nav class="nav flex-column">
                            <a class="nav-link" href="{{ URL::asset('#') }}">About company</a>
                            <a class="nav-link" href="{{ URL::asset('#') }}">Meet the Team</a>
                            <a class="nav-link" href="{{ URL::asset('#') }}">Contact Us</a>
                        </nav>
                    </div>
                    <div class="col-lg-2 col-md-3 col-sm-4 mb-5">
                        <nav class="nav flex-column">
                            <a class="nav-link" href="{{ URL::asset('#') }}">Resource</a>
                            <a class="nav-link" href="{{ URL::asset('#') }}">FAQs</a>
                            <a class="nav-link" href="{{ URL::asset('#') }}">News & media</a>
                            <a class="nav-link" href="{{ URL::asset('#') }}">Raise Capital</a>
                        </nav>
                    </div>
                    <div class="col-lg-2 col-sm-4 mb-5">
                        <nav class="nav flex-column">
                            <a class="nav-link" href="{{ URL::asset('#') }}">Statements</a>
                            <a class="nav-link" href="{{ URL::asset('#') }}">Debit</a>
                            <a class="nav-link" href="{{ URL::asset('#') }}">Fair Policy</a>
                            <a class="nav-link" href="{{ URL::asset('#') }}">Services Guide</a>
                        </nav>
                    </div>
                    <div class="col-lg-3 col-md-8 mb-5">
                        <h5 class="mb-3">Newsletter</h5>
                        <div class="newsletter-signup ">
                            <form>
                                <div class="d-flex flex-column mb-3">
                                    <input type="email" placeholder="Enter email address"
                                        class="form-control form-control-lg mb-2 border-0 shadow-none bg-secondary text-white"
                                        required="">
                                    <button class="btn btn-primary btn-lg" type="submit">Subscribe</button>
                                </div>
                            </form>
                            <span class="small text-body-tertiary d-block">We do not share your email to anyone</span>
                        </div>
                    </div>
                </div>
                <hr class="mb-5">
                <div class="row">
                    <div class="col-sm-5">
                        <span class="d-block lh-sm small text-body-secondary">&copy; Copyright
                            <script>
                                document.write(new Date().getFullYear())

                            </script>. Assan
                        </span>
                    </div>
                    <div class="col-sm-7">
                        <nav class="nav justify-content-sm-end">
                            <a class="nav-link small text-body-secondary px-0 me-3" href="{{ URL::asset('#!') }}"><small>Privacy Policy</small></a>
                            <a class="nav-link small text-body-secondary px-0" href="{{ URL::asset('#!') }}"><small>Terms of Service</small></a>
                        </nav>
                    </div>
                </div>
            </div>

        </footer>


        <!--Particles effect for full page-->

        <div class="position-fixed z-fixed pe-none w-100 h-100 start-0 top-0" id="particles-js"></div>

        <!-- begin Back to Top button -->
    <a href="{{ URL::asset('#') }}" class="toTop"><svg class="progress-circle" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
        <circle cx="50" cy="50" r="40" fill="none" stroke="currentColor" stroke-width="4" stroke-dasharray="0, 251.2"></circle>
      </svg>
            <i class="bx bxs-up-arrow"></i>
          </a>
        <!-- scripts -->
        <script src="{{ URL::asset('assets/js/theme.bundle.min.js') }}"></script>

        <!--Swiper slider-->
        <script src="{{ URL::asset('assets/vendor/node_modules/js/swiper-bundle.min.js') }}"></script>
        <script>
            var swiper = new Swiper(".swiperFaqs", {
                effect: "cards",
                grabCursor: true,
                cardsEffect: {
                    slideShadows: false
                },
                pagination: {
                    el: ".swiper-pagination",
                    clickable: true,
                },
            });

        </script>

        <!--Particles script-->
        <script src="{{ URL::asset('assets/vendor/node_modules/js/particles.js') }}"></script>
        <script>
            particlesJS("particles-js", {
                "particles": {
                    "number": {
                        "value": 25,
                        "density": {
                            "enable": true,
                            "value_area": 800
                        }
                    },
                    "color": {
                        "value": "#eeeeee"
                    },
                    "shape": {
                        "type": "circle",
                        "stroke": {
                            "width": 0,
                            "color": "var(--bs-dark)"
                        },
                        "polygon": {
                            "nb_sides": 5
                        },
                    },
                    "opacity": {
                        "value": 0.75,
                        "random": true,
                        "anim": {
                            "enable": false,
                            "speed": 1,
                            "opacity_min": 0.25,
                            "sync": true
                        }
                    },
                    "size": {
                        "value": 7,
                        "random": true,
                        "anim": {
                            "enable": false,
                            "speed": 60,
                            "size_min": 1,
                            "sync": false
                        }
                    },
                    "line_linked": {
                        "enable": false,
                    },
                    "move": {
                        "enable": true,
                        "speed": 2,
                        "direction": "bottom",
                        "random": false,
                        "straight": false,
                        "out_mode": "out",
                        "bounce": true,
                        "attract": {
                            "enable": false
                        }
                    }
                },
                "interactivity": {
                    "detect_on": "canvas",
                    "events": {
                        "onhover": {
                            "enable": false,
                            "mode": "grab"
                        },
                        "onclick": {
                            "enable": false,
                            "mode": "push"
                        },
                        "resize": true
                    },
                    "modes": {
                        "grab": {
                            "distance": 140,
                            "line_linked": {
                                "opacity": 0
                            }
                        },
                        "bubble": {
                            "distance": 200,
                            "size": 60,
                            "duration": 2,
                            "opacity": 8,
                            "speed": 8
                        },
                        "repulse": {
                            "distance": 300,
                            "duration": 0.9
                        },
                        "push": {
                            "particles_nb": 4
                        },
                        "remove": {
                            "particles_nb": 2
                        }
                    }
                },
                "retina_detect": true
            });

        </script>
    </body>

</html>
