<!DOCTYPE html>
<html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="icon" href="{{ URL::asset('assets/img/favicon.ico') }}" type="image/ico" />

        <x-partials.head-includes />
        <!--Swiper slider-->
        <link rel="stylesheet" href="{{ URL::asset('assets/vendor/node_modules/css/swiper-bundle.min.css') }}" />
        <!--G-lightbox-->
        <link rel="stylesheet" href="{{ URL::asset('assets/vendor/node_modules/css/glightbox.min.css') }}" />
        <!-- Main CSS -->
        <link href="{{ URL::asset('assets/css/theme.min.css') }}" rel="stylesheet" />

        <title>Assan 4</title>
    </head>

    <body class="min-h-100">

        <!--Particles-js-->
        <div class="position-fixed start-0 top-0 bottom-0 end-0 z-fixed pe-none w-100 h-100 start-0 top-0"
            id="particles-js"></div>
        <x-partials.preloader />
        
         <!--Begin::Header-->
         <header class="z-fixed header-absolute-top pt-lg-1 header-transparent">
            <nav class="navbar navbar-expand-lg navbar-dark">
                <div class="container">
                    <!--Logo-->
                    <a class="navbar-brand" href="{{ URL::asset('assan/index.html') }}">
                        <img src="{{ URL::asset('assets/img/logo/logo-white.svg') }}" alt="" class="img-fluid">
                    </a>
                    <div class="d-flex align-items-center navbar-no-collapse-items py-3 order-last">
                        <div class="nav-item fullscreen-toggler order-last ms-4">
                            <!--Fullscreen trigger-->
                            <a href="{{ URL::asset('#offcanvas-fullscreen') }}" class="nav-link width-3x d-block" data-bs-toggle="offcanvas"
                                data-bs-target="#offcanvas-fullscreen">
                                <div class="width-2x mb-1 border-bottom border-white border-2"></div>
                                <div class="width-2x ms-auto border-bottom border-white border-2"></div>
                            </a>
                        </div>
                        <div class="nav-item ms-3 ms-lg-4">
                            <a href="{{ URL::asset('#') }}"
                                class="btn btn-outline-light border-0 rounded-pill btn-sm p-0 width-3x height-3x flex-center">
                            <i class="bx bxl-facebook fs-5"></i>    
                            </a>
                        </div>
                        <div class="nav-item ms-1">
                            <a href="{{ URL::asset('#') }}"
                                class="btn btn-outline-light border-0 rounded-pill btn-sm p-0 width-3x height-3x flex-center">
                                <i class="bx bxl-twitter fs-5"></i>
                            </a>
                        </div>
                        <div class="nav-item ms-1">
                            <a href="{{ URL::asset('#') }}"
                                class="btn btn-outline-light border-0 rounded-pill btn-sm p-0 width-3x height-3x flex-center">
                                <i class="bx bxl-instagram fs-5"></i>
                            </a>
                        </div>
                        <div class="nav-item ms-1">
                            <a href="{{ URL::asset('#') }}"
                                class="btn btn-outline-light border-0 rounded-pill btn-sm p-0 width-3x height-3x flex-center">
                                <i class="bx bxl-linkedin fs-5"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </nav>
        </header>
        <!--/end::Header-->
       <!--Begin::Fullscreen Offcanvas-->
       <div class="offcanvas offcanvas-fullscreen offcanvas-top h-100" id="offcanvas-fullscreen">
        <div class="offcanvas-body">
            <!--Offcanvas fullscreen close-->
            <div class="position-absolute end-0 top-0 mt-3 me-5">
                <button class="btn btn-secondary p-0 flex-center width-4x height-4x rounded-circle"
                    data-bs-dismiss="offcanvas">
                    <i class="bx bx-x fs-4"></i>
                </button>
            </div>
            <!--Offcanvas fullscreen content-->
            <div class="container h-100">
                <div class="row h-100 align-items-center">
                    <div class="col-md-7 mb-5 mb-md-0">
                        <div class="d-inline-flex">
                            <ul class="js-hover-img">
                                <li class="js-hover-img-item mb-4">
                                    <div class="js-hover-img-link display-5">
                                        <a href="{{ URL::asset('#') }}">Index</a>
                                    </div>
                                    <img src="{{ URL::asset('assets/img/projects/1.jpg') }}" alt="Image" class="img">
                                </li>
                                <li class="js-hover-img-item mb-4">
                                    <div class="js-hover-img-link display-5">
                                        <a href="{{ URL::asset('#') }}">Who we are</a>
                                    </div>
                                    <img src="{{ URL::asset('assets/img/projects/2.jpg') }}" alt="Image" class="img">
                                </li>
                                <li class="js-hover-img-item mb-4">
                                    <div class="js-hover-img-link display-5">
                                        <a href="{{ URL::asset('#') }}">Projects</a>
                                    </div>
                                    <img src="{{ URL::asset('assets/img/projects/3.jpg') }}" alt="Image" class="img">
                                </li>
                                <li class="js-hover-img-item mb-4">
                                    <div class="js-hover-img-link display-5">
                                        <a href="{{ URL::asset('#') }}">Services</a>
                                    </div>
                                    <img src="{{ URL::asset('assets/img/projects/4.jpg') }}" alt="Image" class="img">
                                </li>
                                <li class="js-hover-img-item">
                                    <div class="js-hover-img-link display-5">
                                        <a href="{{ URL::asset('#') }}">Contact</a>
                                    </div>
                                    <img src="{{ URL::asset('assets/img/projects/5.jpg') }}" alt="Image" class="img">
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <!--Address-->
                        <h3 class="mb-4 fullscreen-item">1355 Market St, <br> Suite 900,
                            San Francisco<br>
                            CA, 94103</h3>
                        <div class="fullscreen-item">
                            <!--Phone-->
                            <a href="{{ URL::asset('#!') }}" class="fs-4 link-hover-underline">+011(1234) 56789</a>
                            <!--Divider-->
                            <hr class="bg-transparent border-top my-4 opacity-75">
                            <!--Email-->
                            <a href="{{ URL::asset('mailto:mail@domain.agency') }}"
                                class="fs-4 link-hover-underline">mail@domain.agency</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--::/end offcanvas fullscreen-->
        <!--Main content-->
        <main class="bg-body z-2 shadow-lg position-relative overflow-hidden">
{{$slot}}
        </main>



        <!--begin:Cookies card-->
        <div
            class="position-fixed alert mb-0 z-fixed start-0 bottom-0 w-100 h-auto d-flex align-items-end fade show px-4 px-lg-9 py-4">
            <div class="bg-gradient bg-body w-100 w-lg-50 border-0 rounded-2 shadow-xl ms-auto p-lg-5 p-4 mb-0">
                <div class="d-flex flex-column align-items-md-center flex-md-row">
                    <div class="flex-grow-1">
                        <p class="mb-2 mb-md-0 small w-lg-75">
                            We use cookies to offer a better browsing experience.
                        </p>
                    </div>
                    <div class="flex-shrink-0">
                        <a href="{{ URL::asset('#') }}" class="small me-3 link-underline" data-bs-dismiss="alert">Decline</a>
                        <a href="{{ URL::asset('#') }}" class="small link-underline" data-bs-dismiss="alert">Accept</a>
                    </div>
                </div>
            </div>
        </div>
        <!--/end:Cookies card-->


        <div class="footer-fixed position-fixed bottom-0 start-0 w-100">
            <x-partials.footers.footer-4 />
        </div>

        <!-- begin:Back to Top button -->
        <a href="{{ URL::asset('#') }}" class="toTop"><svg class="progress-circle" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
  <circle cx="50" cy="50" r="40" fill="none" stroke="currentColor" stroke-width="4" stroke-dasharray="0, 251.2"></circle>
</svg>
            <i class="bx bxs-up-arrow"></i>
        </a>
        <!-- /end:Back to Top button -->

        <!--begin:Animated custom cursor-->
        <div class="cursor">
            <div class="cursor__inner"></div>
        </div>
        <!--/end:Animated custom cursor-->

        <!-- scripts -->
        <script src="{{ URL::asset('assets/js/theme.bundle.min.js') }}"></script>

        <!--Swiper slider-->
        <script src="{{ URL::asset('assets/vendor/node_modules/js/swiper-bundle.min.js') }}"></script>
        <script>
            //swiper -partners
            var swiperPartners5 = new Swiper(".swiper-partners", {
                slidesPerView: 2,
                loop: true,
                spaceBetween: 16,
                autoplay: true,
                breakpoints: {
                    768: {
                        slidesPerView: 4
                    },
                    1024: {
                        slidesPerView: 5
                    }
                },
                pagination: {
                    el: ".swiper-partners-pagination",
                    clickable: true
                },
                navigation: {
                    nextEl: ".swiper-partners-button-next",
                    prevEl: ".swiper-partners-button-prev"
                }
            });

            //Swiper thumbnail demo
            var swiperThumbnails = new Swiper(".swiper-thumbnails", {
                spaceBetween: 30,
                slidesPerView: "auto",
                freeMode: true,
                watchSlidesVisibility: true,
                watchSlidesProgress: true
            });
            var swiperThumbnailsMain = new Swiper(".swiper-thumbnails-main", {
                spaceBetween: 16,
                autoHeight: true,
                grabCursor: true,
                navigation: {
                    nextEl: ".swiperThumb-next",
                    prevEl: ".swiperThumb-prev"
                },
                thumbs: {
                    swiper: swiperThumbnails
                }
            });

        </script>



        <!--Gsap animations-->
        <script src="{{ URL::asset('assets/vendor/node_modules/js/gsap.min.js') }}"></script>
        <script>
            let vw = window.innerWidth || document.documentElement.clientWidth,
                maxVw = 320;
            vw > maxVw && document.querySelectorAll(".js-hover-img-item").forEach(function (e) {
                let t = e,
                    r = (t.getBoundingClientRect(),
                        e.querySelector("img")),
                    a = r.offsetHeight,
                    l = r.offsetWidth;
                e.addEventListener("mouseenter",
                        s => {
                            e.classList.contains("is-hover") || e.classList.add("is-hover");
                            let o = s.clientX - t.offsetLeft - l / 2,
                                u = s.offsetY - a / 2;
                            gsap.set(r, {
                                x: o,
                                y: u,
                            })
                        }),
                    e.addEventListener("mousemove",
                        e => {
                            let s = e.clientX - t.offsetLeft - l / 2,
                                o = e.offsetY - r.offsetTop - a * .5;
                            gsap.to(r, {
                                x: s,
                                y: o,
                                rotate: -4
                            })
                        }),
                    e.addEventListener("mouseleave", () => {
                        e.classList.contains("is-hover") && e.classList.remove("is-hover")
                    })
            });

            //cursor
            var element = document.querySelector('.cursor');

            // Track the mouse position
            let mouse = {
                x: 0,
                y: 0
            };
            window.addEventListener('mousemove', ev => mouse = getMousePos(ev));

            // Linear interpolation
            const lerp = (a, b, n) => (1 - n) * a + n * b;

            // Gets the mouse position
            const getMousePos = e => {
                return {
                    x: e.clientX,
                    y: e.clientY
                };
            };

            class Cursor {
                constructor(el) {
                    this.DOM = {
                        el: el
                    };
                    this.DOM.el.style.opacity = 0;

                    this.bounds = this.DOM.el.getBoundingClientRect();

                    this.renderedStyles = {
                        tx: {
                            previous: 0,
                            current: 0,
                            amt: 0.2
                        },
                        ty: {
                            previous: 0,
                            current: 0,
                            amt: 0.2
                        },
                        scale: {
                            previous: 1,
                            current: 1,
                            amt: 0.2
                        },
                        opacity: {
                            previous: 1,
                            current: 1,
                            amt: 0.2
                        }
                    };

                    this.onMouseMoveEv = () => {
                        this.renderedStyles.tx.previous = this.renderedStyles.tx.current = mouse.x - this.bounds
                            .width / 2;
                        this.renderedStyles.ty.previous = this.renderedStyles.ty.previous = mouse.y - this
                            .bounds.height / 2;
                        gsap.to(this.DOM.el, {
                            duration: 0.9,
                            ease: 'Power3.easeOut',
                            opacity: 1
                        });
                        requestAnimationFrame(() => this.render());
                        window.removeEventListener('mousemove', this.onMouseMoveEv);
                    };
                    window.addEventListener('mousemove', this.onMouseMoveEv);
                }
                enter() {
                    //this.renderedStyles['scale'].current = 4;
                    element.classList.add('cHover');
                    //this.renderedStyles['opacity'].current = 0.5;
                }
                leave() {
                    this.renderedStyles['scale'].current = 1;
                    this.renderedStyles['opacity'].current = 1;
                    element.classList.remove('cHover');
                }
                render() {
                    this.renderedStyles['tx'].current = mouse.x - this.bounds.width / 2;
                    this.renderedStyles['ty'].current = mouse.y - this.bounds.height / 2;

                    for (const key in this.renderedStyles) {
                        this.renderedStyles[key].previous = lerp(this.renderedStyles[key].previous, this
                            .renderedStyles[key].current, this.renderedStyles[key].amt);
                    }

                    this.DOM.el.style.transform =
                        `translateX(${(this.renderedStyles['tx'].previous)}px) translateY(${this.renderedStyles['ty'].previous}px) scale(${this.renderedStyles['scale'].previous})`;
                    this.DOM.el.style.opacity = this.renderedStyles['opacity'].previous;

                    requestAnimationFrame(() => this.render());
                }
            }


            const cursor = new Cursor(document.querySelector('.cursor'));

            [...document.querySelectorAll('a,.btn,.swiper-pagination-bullet')].forEach(link => {
                link.addEventListener('mouseenter', () => cursor.enter());
                link.addEventListener('mouseleave', () => cursor.leave());
            });

        </script>
        <!--Particles script-->
        <script src="{{ URL::asset('assets/vendor/node_modules/js/particles.js') }}"></script>
        <script>
            particlesJS("particles-js", {
                "particles": {
                    "number": {
                        "value": 16,
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
                            "nb_sides": 5
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
                        "value": 3,
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
        <!--Footer-fixed-->
        <script>
            footerFixed();
            window.addEventListener('resize', footerFixed);

            function footerFixed() {
                var fHeight = document.querySelector('.footer-fixed').clientHeight;
                document.querySelector('body').style.paddingBottom = fHeight + "px";
            }

        </script>
    </body>

</html>
