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

    <body class="bg-gradient-primary text-white" data-bs-theme="dark">

         <!--Particles-js-->
         <div class="position-fixed start-0 top-0 bottom-0 end-0 z-fixed pe-none w-100 h-100 start-0 top-0" id="particles-js"></div>
         <x-partials.preloader />

        <main class="main-content d-grid" id="main-content">
{{$slot}}
        </main>
        <!--Footer Start-->
        <footer id="footer-default" class="position-relative">
            <div class="container py-4 position-relative z-1">
                <div class="d-sm-flex flex-sm-row justify-content-center justify-content-sm-between">
                    <ul class="list-inline mb-0">
                        <li class="list-inline-item">
                            <a href="{{ URL::asset('#') }}" class="small">
                                Privacy policy
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="{{ URL::asset('#') }}" class="small">
                                Terms & conditions
                            </a>
                        </li>
                    </ul>

                    <span class="d-block lh-sm small text-white-50">&copy; Copyright
                        <script>
                          document.write(new Date().getFullYear())
                        </script>. Assan
                      </span>
                </div>
            </div>
            <!--container-->
        </footer>
        <!-- scripts -->
        <script src="{{ URL::asset('assets/js/theme.bundle.min.js') }}"></script>

        <!--Countdown script-->
        <script src="{{ URL::asset('assets/vendor/node_modules/js/jquery.min.js') }}"></script>
        <script src="{{ URL::asset('assets/vendor/node_modules/js/jquery.countdown.min.js') }}"></script>
        <script>
            function get7dayFromNow() {
                return new Date(new Date().valueOf() + 7 * 24 * 60 * 60 * 1000);
            }

            var $clock = $('.countdown-timer');

            $clock.countdown(get7dayFromNow(), function (event) {
                $(this).html(event.strftime(
                    '<div class="d-flex flex-column px-2 width-7x"><h2 class="mb-0 h4">%d</h2><span class="small text-body-secondary">Days</span></div><div class="d-flex flex-column px-2 width-7x"><h2 class="mb-0 h4">%H</h2><span class="small text-body-secondary">Hours</span></div><div class="d-flex flex-column px-2 width-7x"><h2 class="mb-0 h4">%M</h2><span class="small text-body-secondary">Minutes</span></div><div class="d-flex flex-column px-2 width-7x"><h2 class="mb-0 h4">%S</h2><span class="small text-body-secondary">Seconds</span></div>'));
            });
        </script>

          <!--Particles script-->
          <script src="{{ URL::asset('assets/vendor/node_modules/js/particles.js') }}"></script>
          <script>
              particlesJS("particles-js", {
                  "particles": {
                      "number": {
                          "value": 80,
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
                              "color": "#fff"
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
                              "opacity_min": 0.1,
                              "sync": true
                          }
                      },
                      "size": {
                          "value": 9,
                          "random": true,
                          "anim": {
                              "enable": true,
                              "speed": 1,
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
                          "direction": "top",
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
    </body>

</html>
