<x-assan-layout layout-type="{{$layoutType}}">

            <!--Hero-->
            <section class="position-relative bg-dark text-white">
                <!--Gradient background vector-->
                 <svg class="position-absolute opacity-75 satrt-0 top-0 w-100 h-100" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" viewBox="0 0 700 700" width="700" height="700" opacity="1"><defs><linearGradient gradientTransform="rotate(136, 0.5, 0.5)" x1="50%" y1="0%" x2="50%" y2="100%" id="ffflux-gradient"><stop stop-color="hsl(347, 100%, 72%)" stop-opacity="1" offset="0%"></stop><stop stop-color="hsl(227, 100%, 50%)" stop-opacity="1" offset="100%"></stop></linearGradient><filter id="ffflux-filter" x="-20%" y="-20%" width="140%" height="140%" filterUnits="objectBoundingBox" primitiveUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                    <feTurbulence type="fractalNoise" baseFrequency="0.006 0.004" numOctaves="2" seed="2" stitchTiles="stitch" x="0%" y="0%" width="100%" height="100%" result="turbulence"></feTurbulence>
                    <feGaussianBlur stdDeviation="0 0" x="0%" y="0%" width="100%" height="100%" in="turbulence" edgeMode="duplicate" result="blur"></feGaussianBlur>
                    <feBlend mode="hard-light" x="0%" y="0%" width="100%" height="100%" in="SourceGraphic" in2="blur" result="blend"></feBlend>
                    <feColorMatrix type="saturate" values="3" x="0%" y="0%" width="100%" height="100%" in="blend" result="colormatrix"></feColorMatrix>
                  </filter></defs><rect width="700" height="700" fill="url(#ffflux-gradient)" filter="url(#ffflux-filter)"></rect>
                </svg>
                  <!-- particles.js container -->
                <div id="particles-js" class="position-absolute start-0 top-0 w-100 h-100"></div>
                <div class="container pt-12 pb-9 position-relative z-1">
                    <div class="row pt-lg-8 pb-lg-7 justify-content-center text-center align-items-center">
                        <div class="col-lg-8 col-xl-7 mx-auto text-center">
                            <!--Hero heading-->
                            <h1 class="mb-4 display-1">Built for every business </h1>
                             <!--Hero subheading-->
                            <p class="col-lg-11 mx-auto mb-5 lead">
                                Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
                                mollit anim id est laborum.
                            </p>
                             <!--Hero action-->
                             <a href="{{ URL::asset('#!') }}" class="btn btn-outline-white border-2 btn-lg">Learn more</a>
                        </div>
                    </div>
                </div>
                <!--/.container-end-->
            </section>
            <!--/.Hero end-->
            <section class="border-bottom">
                <div class="container pt-9 pt-lg-11">

                    <!--//////////////////SNIPPETS:BEGIN////////////////-->
                    <nav class="nav-tabs nav">
                        <a href="{{ URL::asset('#tabMain') }}" data-bs-toggle="tab" class="nav-link active">HTML</a>
                        <a href="{{ URL::asset('#tabCss') }}" data-bs-toggle="tab" class="nav-link">Css</a>
                        <a href="{{ URL::asset('#tabJs') }}" data-bs-toggle="tab" class="nav-link">Js</a>
                    </nav>
                    <div class="tab-content">
                        <!--Element Main code-->
                        <div class="tab-pane fade show active" id="tabMain">
                            <div class="position-relative" style="max-height:75vh;overflow-y:auto">
                                <button
                                    class="btn btn-sm position-absolute end-0 top-0 me-3 mt-3 z-1 btn-primary copy-link"
                                    data-clipboard-target="#copyHTML1" data-clipboard-action="copy"
                                    id="copyHTML1-1">Copy code</button>
<pre id="copyHTML1" class="language-markup bg-secondary text-white-50 mt-0" data-lang="html">
<code>
&lt;!--Hero-->
 &lt;section class="position-relative bg-dark text-white">
  &lt;!--Gradient background vector-->
   &lt;svg class="position-absolute opacity-75 satrt-0 top-0 w-100 h-100" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" viewBox="0 0 700 700" width="700" height="700" opacity="1">
    &lt;defs>
      &lt;linearGradient gradientTransform="rotate(136, 0.5, 0.5)" x1="50%" y1="0%" x2="50%" y2="100%" id="ffflux-gradient">
      &lt;stop stop-color="hsl(347, 100%, 72%)" stop-opacity="1" offset="0%">&lt;/stop>
      &lt;stop stop-color="hsl(227, 100%, 50%)" stop-opacity="1" offset="100%">&lt;/stop>
      &lt;/linearGradient>
      &lt;filter id="ffflux-filter" x="-20%" y="-20%" width="140%" height="140%" filterUnits="objectBoundingBox" primitiveUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
      &lt;feTurbulence type="fractalNoise" baseFrequency="0.006 0.004" numOctaves="2" seed="2" stitchTiles="stitch" x="0%" y="0%" width="100%" height="100%" result="turbulence">&lt;/feTurbulence>
      &lt;feGaussianBlur stdDeviation="0 0" x="0%" y="0%" width="100%" height="100%" in="turbulence" edgeMode="duplicate" result="blur">&lt;/feGaussianBlur>
      &lt;feBlend mode="hard-light" x="0%" y="0%" width="100%" height="100%" in="SourceGraphic" in2="blur" result="blend">&lt;/feBlend>
      &lt;feColorMatrix type="saturate" values="3" x="0%" y="0%" width="100%" height="100%" in="blend" result="colormatrix">&lt;/feColorMatrix>
      &lt;/filter>
      &lt;/defs>
      &lt;rect width="700" height="700" fill="url(#ffflux-gradient)" filter="url(#ffflux-filter)">&lt;/rect>
     &lt;/svg>
     &lt;!-- particles.js container -->
    &lt;div id="particles-js" class="position-absolute start-0 top-0 w-100 h-100">&lt;/div>
    &lt;div class="container pt-12 pb-9 position-relative z-1">
       &lt;div class="row pt-lg-8 pb-lg-7 justify-content-center text-center align-items-center">
        &lt;div class="col-lg-8 col-xl-7 mx-auto text-center">
          &lt;!--Hero heading-->
           &lt;h1 class="mb-4 display-1">Built for every business&lt;/h1>
            &lt;!--Hero subheading-->
            &lt;p class="col-lg-11 mx-auto mb-5 lead">
             Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
             mollit anim id est laborum.
            &lt;/p>
            &lt;!--Hero action-->
           &lt;a href="{{ URL::asset('#!') }}" class="btn btn-outline-white border-2 btn-lg">Learn more&lt;/a>
         &lt;/div>
      &lt;/div>
  &lt;/div>
  &lt;!--/.container-end-->
&lt;/section>
&lt;!--/.Hero end-->
</code>
</pre>
                            </div>
                        </div>
                        <!--Element Css-->
                        <div class="tab-pane fade" id="tabCss">
                            <div class="position-relative" style="max-height:75vh;overflow-y:auto">
                                <button
                                    class="btn btn-sm position-absolute end-0 top-0 me-3 mt-3 z-1 btn-primary copy-link"
                                    data-clipboard-target="#copyCss1" data-clipboard-action="copy" id="copyCss1-2">Copy
                                    code</button>
<pre id="copyCss1" class="language-markup bg-secondary text-white-50 mt-0" data-lang="html">
<code>
  &lt;!-- Bootstrap + Vendor + Theme -->
  &lt;link href="{{ URL::asset('assets/css/theme.min.css') }}" rel="stylesheet">
</code>
</pre>
                            </div>
                        </div>

                        <!--Element JS-->
                        <div class="tab-pane fade" id="tabJs">
                            <div class="position-relative" style="max-height:75vh;overflow-y:auto">
                                <button
                                    class="btn btn-sm position-absolute end-0 top-0 me-3 mt-3 z-1 btn-primary copy-link"
                                    data-clipboard-target="#copyJs1" data-clipboard-action="copy" id="copyJs1-3">Copy
                                    code</button>
<pre id="copyJs1" class="language-markup bg-secondary text-white-50 mt-0" data-lang="html">
<code>
&lt;!-- particles-js -->
&lt;script src="{{ URL::asset('assets/vendor/node_modules/js/particles.js') }}">&lt;/script>
 &lt;script>
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
&lt;/script>
</code>
</pre>
                            </div>
                        </div>
                    </div>
                    <!--//////////////////SNIPPETS:END////////////////-->
                </div>
                <div class="container py-9 py-lg-11">
                    <div class="px-4 rounded-3 shadow-lg py-6 px-lg-5 py-lg-7 bg-gradient bg-secondary text-white position-relative overflow-hidden"
                        data-aos="fade-up" data-aos-duration="400">
                        <svg class="position-absolute end-0 bottom-0 mb-4 text-success" width="200" height="400"
                            preserveAspectRatio="none" viewBox="0 0 150 300" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M150 300C130.302 300 110.796 296.12 92.5975 288.582C74.3986 281.044 57.8628 269.995 43.934 256.066C30.0052 242.137 18.9563 225.601 11.4181 207.403C3.87986 189.204 -6.2614e-07 169.698 0 150C6.2614e-07 130.302 3.87987 110.796 11.4181 92.5975C18.9563 74.3987 30.0052 57.8628 43.934 43.934C57.8628 30.0052 74.3987 18.9563 92.5975 11.4181C110.796 3.87986 130.302 3.51961e-06 150 5.00679e-06L150 37.5C135.226 37.5 120.597 40.4099 106.948 46.0636C93.299 51.7172 80.8971 60.0039 70.4505 70.4505C60.0039 80.8971 51.7172 93.299 46.0636 106.948C40.4099 120.597 37.5 135.226 37.5 150C37.5 164.774 40.4099 179.403 46.0636 193.052C51.7172 206.701 60.0039 219.103 70.4505 229.55C80.8971 239.996 93.299 248.283 106.948 253.936C120.597 259.59 135.226 262.5 150 262.5V300Z"
                                fill="currentColor"></path>
                        </svg>

                        <div class="row align-items-end position-relative">
                            <div class="col-lg-6 col-xl-7">
                                <h5 class="text-white-50 mb-4">Let's start building</h5>
                                <h2 class="mb-5 mb-md-0 display-5">Stunning websites ease</h2>
                            </div>
                            <div class="col-lg-6 col-xl-5 text-lg-end">
                                <a href="{{ URL::asset('#!') }}" class="btn btn-primary btn-lg me-2 mb-2 mb-lg-0">Contact sales</a>
                                <a href="{{ URL::asset('#!') }}" class="btn btn-gray-200 btn-lg">Purchase Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
</x-assan-layout>
