<!doctype html>
<html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="{{ URL::asset('assets/img/favicon.ico') }}" type="image/ico">
        <x-partials.head-includes />
        <!--G-lightbox-->
        <link rel="stylesheet" href="{{ URL::asset('assets/vendor/node_modules/css/glightbox.min.css') }}">
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
                            <a href="{{ URL::asset('#') }}" class="btn btn-success btn-sm">Get started</a>
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




        <x-partials.footers.footer-1 />

        <!-- begin Back to Top button -->
        <a href="{{ URL::asset('#') }}" class="toTop"><svg class="progress-circle" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
  <circle cx="50" cy="50" r="40" fill="none" stroke="currentColor" stroke-width="4" stroke-dasharray="0, 251.2"></circle>
</svg>
            <i class="bx bxs-up-arrow"></i>
        </a>

        <!--cursor-->
        <div class="cursor">
            <div class="cursor__inner"></div>
        </div>
        <!-- scripts -->
        <script src="{{ URL::asset('assets/js/theme.bundle.min.js') }}"></script>

        <!--Page script-->
        <script src="{{ URL::asset('assets/vendor/node_modules/js/gsap.min.js') }}"></script>

        <script>
            //cursor
            var element = document.querySelector('.cursor');
            let mouse = {
                x: 0,
                y: 0
            };
            window.addEventListener('mousemove', ev => mouse = getMousePos(ev));
            const lerp = (a, b, n) => (1 - n) * a + n * b;
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
                    element.classList.add('cHover');
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

            [...document.querySelectorAll('a,.btn')].forEach(link => {
                link.addEventListener('mouseenter', () => cursor.enter());
                link.addEventListener('mouseleave', () => cursor.leave());
            });

        </script>
    </body>

</html>
