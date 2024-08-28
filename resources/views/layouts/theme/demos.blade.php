<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{ URL::asset('assets/img/favicon.ico') }}" type="image/ico">
    <!--Box Icons-->
    <link rel="stylesheet" href="{{ URL::asset('assets/fonts/boxicons/css/boxicons.min.css') }}">

    <!--AOS Animations-->
    <link rel="stylesheet" href="{{ URL::asset('assets/vendor/node_modules/css/aos.css') }}">

    <!--Google fonts-->
    <link rel="preconnect" href="{{ URL::asset('https://fonts.googleapis.com') }}">
    <link rel="preconnect" href="{{ URL::asset('https://fonts.gstatic.com') }}" crossorigin>
    <link
        href="{{ URL::asset('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;1,400&family=Source+Serif+Pro:ital@0;1&display=swap') }}"
        rel="stylesheet">
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
    <!--Main content-->
    <main>
{{$slot}}
    </main>

    <!--Footer Start-->
    <footer class="position-relative">
        <div class="py-5 position-relative">
            <div class="container">
                <div class="row text-center">
                    <div class="col-12">
                        <span class="d-block lh-sm text-body-secondary small">&copy; Copyright
                            <script>
                                document.write(new Date().getFullYear())

                            </script>. Assan
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!--Particles effect for full page-->

    <div class="position-fixed z-fixed pe-none w-100 h-100 start-0 top-0" id="particles-js"></div>

    <!-- begin:Back to Top button -->
    <a href="{{ URL::asset('#') }}" class="toTop"><svg class="progress-circle" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
            <circle cx="50" cy="50" r="40" fill="none" stroke="currentColor" stroke-width="4"
                stroke-dasharray="0, 251.2"></circle>
        </svg>
        <i class="bx bxs-up-arrow"></i>
    </a>
    <!--/end:Back to Top button -->
    <!-- scripts -->
    <script src="{{ URL::asset('assets/js/theme.bundle.min.js') }}"></script>

    <!--Particles script-->
    <script src="{{ URL::asset('assets/vendor/node_modules/js/particles.js') }}"></script>
    <script>
        particlesJS("particles-js", {
            "particles": {
                "number": {
                    "value": 40,
                    "density": {
                        "enable": true,
                        "value_area": 800
                    }
                },
                "color": {
                    "value": "#ffffff"
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
                    "value": 0.5,
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
