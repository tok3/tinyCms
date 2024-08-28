<!doctype html>
<html lang="en" data-bs-theme="light">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="{{ URL::asset('assets/img/favicon.ico') }}" type="image/ico">
        <x-partials.head-includes />
        <!--Prism css for code snippets-->
        <link rel="stylesheet"
            href="{{ URL::asset('assets/vendor/node_modules/css/prism-tomorrow.css') }}">
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
        <!--Header Start-->
        <header class="z-fixed header-absolute-top pt-lg-3 header-transparent">
           
            <nav class="navbar navbar-expand-lg navbar-dark">
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
                        <div class="nav-item me-3 ms-lg-4 me-lg-0">
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

         <!--Particles-js-->
         <script src="{{ URL::asset('assets/vendor/node_modules/js/particles.js') }}"></script>
         <script>
             particlesJS("particles-js", {
                 "particles": {
                     "number": {
                         "value": 12,
                         "density": {
                             "enable": true,
                             "value_area": 800
                         }
                     },
                     "color": {
                         "value": "#fff"
                     },
                     "shape": {
                         "type": "circle",
                         "stroke": {
                             "width": 0,
                             "color": "#fff"
                         },
                         "polygon": {
                             "nb_sides": 25
                         },
                     },
                     "opacity": {
                         "value": 0.6,
                         "random": true,
                         "anim": {
                             "enable": false,
                             "speed": 1,
                             "opacity_min": 0.1,
                             "sync": true
                         }
                     },
                     "size": {
                         "value": 7,
                         "random": true,
                         "anim": {
                             "enable": true,
                             "speed": 60,
                             "size_min": 0.25,
                             "sync": false
                         }
                     },
                     "line_linked": {
                         "enable": false,
                     },
                     "move": {
                         "enable": true,
                         "speed": 4,
                         "direction": "none",
                         "random": true,
                         "straight": false,
                         "out_mode": "out",
                         "bounce": true,
                         "attract": {
                             "enable": false,
                             "rotateX": 600,
                             "rotateY": 1200
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
