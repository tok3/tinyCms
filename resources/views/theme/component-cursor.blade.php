<x-assan-layout layout-type="{{$layoutType}}">
           <!--page-hero-->
  <section class="bg-gradient-primary text-white position-relative">
    <div class="container pt-14 pb-9 pb-lg-12 position-relative z-1">
        <div class="row pt-lg-5 align-items-center justify-content-center text-center">
                        <div class="col-lg-10 col-xl-7 z-2">
                            <div class="position-relative">
                                <div>
                                    <nav class="d-flex justify-content-center" aria-label="breadcrumb">
                                        <div class="mb-4">
                                            <ol class="breadcrumb mb-0">
                                                <li class="breadcrumb-item"><a href="{{ URL::asset('#') }}">Home</a></li>
                                                <li class="breadcrumb-item active">Components</li>
                                                <li class="breadcrumb-item active" aria-current="page">Cursor</li>
                                            </ol>
                                        </div>
                                    </nav>
                                    <h1 class="mb-0 display-4">
                                       Animated cursor
                                    </h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>


            <section class="position-relative" id="next">
                <div class="container py-9 py-lg-11">
                    <div class="alert alert-success">
                        Checkout the cursor pointer. This is a <a href="{{ URL::asset('#') }}" class="alert-link">Cursor link</a>, Which change the cursor size
                    </div>
                    <!--//////////////////SNIPPETS:BEGIN////////////////-->
                    <nav class="nav-tabs nav">
                        <a href="{{ URL::asset('#tabMain') }}" data-bs-toggle="tab" class="nav-link active">HTML</a>
                        <a href="{{ URL::asset('#tabCss') }}" data-bs-toggle="tab" class="nav-link">Css</a>
                        <a href="{{ URL::asset('#tabJs') }}" data-bs-toggle="tab" class="nav-link">Js</a>
                    </nav>
                    <div class="tab-content">
                        <!--Element Main code-->
                        <div class="tab-pane fade show active" id="tabMain">
                            <div class="position-relative">
                                <button
                                    class="btn btn-sm position-absolute end-0 top-0 me-3 mt-3 z-1 btn-primary copy-link"
                                    data-clipboard-target="#copyHTML1" data-clipboard-action="copy" id="copyHTML1-1">Copy code</button>
                                <pre id="copyHTML1" class="language-markup bg-secondary text-white-50 mt-0" data-lang="html">
                <code>
&lt;!--cursor-->
&lt;div class="cursor">
  &lt;div class="cursor__inner">&lt;/div>
&lt;/div>
</code>
</pre>
                            </div>
                        </div>
                        <!--Element Css-->
                        <div class="tab-pane fade" id="tabCss">
                            <div class="position-relative">
                                <button
                                    class="btn btn-sm position-absolute end-0 top-0 me-3 mt-3 z-1 btn-primary copy-link"
                                    data-clipboard-target="#copyCss1" data-clipboard-action="copy" id="copyCss1-2">Copy code</button>
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
                            <div class="position-relative" style="max-height: 70vh; overflow-y: auto;">
                                <button
                                    class="btn btn-sm position-absolute end-0 top-0 me-3 mt-3 z-1 btn-primary copy-link"
                                    data-clipboard-target="#copyJs1" data-clipboard-action="copy" id="copyJs1-3">Copy code</button>
                                <pre id="copyJs1" class="language-markup bg-secondary text-white-50 mt-0" data-lang="html">
                <code>
  &lt;!-- Bootstrap + Vendor + Theme -->
  &lt;script src="{{ URL::asset('assets/css/theme.bundle.js') }}">&lt;/script>
  &lt;!-- Cursor Js -->
  &lt;script src="{{ URL::asset('assets/vendor/node_modules/js/gsap.min.js') }}">&lt;/script>
  &lt;script>
    //cursor
    var element = document.querySelector('.cursor');
    let mouse = { x: 0, y: 0 };
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
            this.DOM = { el: el };
            this.DOM.el.style.opacity = 0;
            this.bounds = this.DOM.el.getBoundingClientRect();
            this.renderedStyles = {
                tx: { previous: 0, current: 0, amt: 0.2 },
                ty: { previous: 0, current: 0, amt: 0.2 },
                scale: { previous: 1, current: 1, amt: 0.2 },
                opacity: { previous: 1, current: 1, amt: 0.2 }
            };
            this.onMouseMoveEv = () => {
                this.renderedStyles.tx.previous = this.renderedStyles.tx.current = mouse.x - this.bounds.width / 2;
                this.renderedStyles.ty.previous = this.renderedStyles.ty.previous = mouse.y - this.bounds.height / 2;
                gsap.to(this.DOM.el, { duration: 0.9, ease: 'Power3.easeOut', opacity: 1 });
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
                this.renderedStyles[key].previous = lerp(this.renderedStyles[key].previous, this.renderedStyles[key].current, this.renderedStyles[key].amt);
            }
            this.DOM.el.style.transform = `translateX(${(this.renderedStyles['tx'].previous)}px) translateY(${this.renderedStyles['ty'].previous}px) scale(${this.renderedStyles['scale'].previous})`;
            this.DOM.el.style.opacity = this.renderedStyles['opacity'].previous;
            requestAnimationFrame(() => this.render());
        }
    }
    const cursor = new Cursor(document.querySelector('.cursor'));
    [...document.querySelectorAll('a,.btn')].forEach(link => {
        link.addEventListener('mouseenter', () => cursor.enter());
        link.addEventListener('mouseleave', () => cursor.leave());
    });
&lt;/script>
</code>
</pre>
                            </div>
                        </div>
                    </div>
                    <!--//////////////////SNIPPETS:END////////////////-->
                </div>
                </div>
            </section>
            <section class="bg-gradient bg-secondary text-white position-relative">
                <svg class="position-absolute top-0 start-0 text-white w-50 h-auto w-lg-75" width="136" height="76"
                    viewBox="0 0 136 76" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-opacity=".1"
                        d="M136 -28C136 -14.3425 133.31 -0.818782 128.083 11.7991C122.857 24.4169 115.196 35.8818 105.539 45.5391C95.8818 55.1964 84.4169 62.857 71.7991 68.0835C59.1812 73.31 45.6575 76 32 76C18.3425 76 4.81878 73.31 -7.79908 68.0835C-20.4169 62.857 -31.8818 55.1964 -41.5391 45.5391C-51.1964 35.8818 -58.857 24.4169 -64.0835 11.7991C-69.31 -0.818789 -72 -14.3425 -72 -28L136 -28Z"
                        fill="currentColor" />
                </svg>
                <div class="container py-9 py-lg-11 position-relative z-1">
                    <div class="row align-items-center justify-content-center">
                        <div class="col-md-10 col-lg-8 col-xl-7 text-center mx-auto">
                            <h2 class="mb-4 display-4" data-aos="fade-up">
                                Let's start building stunning websites
                            </h2>
                            <p class="mb-5 px-lg-5" data-aos="fade-up" data-aos-delay="100">
                                Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing
                                industries for previewing layouts and visual mockups.
                            </p>
                            <div data-aos="fade-up">
                                <a href="{{ URL::asset('#!') }}" class="btn btn-primary btn-lg">Purchase a
                                    license</a>
                            </div>
                        </div>
                        <!--End Col-->
                    </div> <!-- / .row -->
                </div> <!-- / .container -->
            </section>
</x-assan-layout>
