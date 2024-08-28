<x-assan-layout>

@foreach($blocks as $section)

    {{$section['type']}}

@endforeach

<!--begin:main slider-->
    <div class="position-relative overflow-hidden">
        <div class="ms-skin-black-1 master-slider" id="masterslider">
            <!--begin:slide-1-->
            <div class="ms-slide bg-dark" data-delay="3" data-fill-mode="fill">
                <img class="opacity-25" src="{{ URL::asset('assets/vendor/masterslider/style/blank.gif') }}" alt="" title=""
                     data-src="{{ URL::asset('assets/img/backgrounds/bg6.jpg') }}" />

                <!--title-->
                <div class="ms-layer ms-title text-white" data-effect="front(800)" data-duration="1200" data-delay="600"
                     data-ease="easeInOutCubic" data-hide-effect="top(long,false)" data-offset-x="0" data-offset-y="-40"
                     data-origin="mc" data-position="center" data-masked="false">
                    <div class="text-center">
                        Create a website <br>you proud of</div>
                </div>
                <!--button-->
                <a href="{{ URL::asset('#') }}" class="ms-layer ms-btn" data-effect="front(800)" data-duration="1200" data-delay="800"
                   data-ease="easeInOutCubic" data-hide-effect="top(long,false)" data-offset-x="0" data-offset-y="140"
                   data-origin="mc" data-position="center" data-masked="false"><span
                        class="btn btn-lg btn-primary btn-sm">Get Started</span>
                </a>
            </div>
            <!--end:slide-1-->

            <!--begin:slide-2-->
            <div class="ms-slide bg-dark" data-delay="3" data-fill-mode="fill">
                <!--bg-->
                <img class="opacity-25" src="{{ URL::asset('assets/vendor/masterslider/style/blank.gif') }}" alt="" title=""
                     data-src="{{ URL::asset('assets/img/backgrounds/bg7.jpg') }}" />

                <!--title-->
                <div class="ms-layer ms-title text-center text-white" data-effect="skewbottom(-10,150)" data-duration="1000"
                     data-delay="600" data-ease="easeInOutCubic" data-hide-effect="top(long,false)" data-offset-x="0"
                     data-offset-y="-40" data-origin="mc" data-position="center" data-masked="false">
                    <div>Ultimate solutions<br> for your website</div>
                </div>
                <!--button-->
                <a href="{{ URL::asset('#') }}" class="ms-layer ms-btn" data-effect="skewbottom(-10,150)" data-duration="1000" data-delay="900"
                   data-ease="easeInOutCubic" data-hide-effect="top(long,false)" data-offset-x="0" data-offset-y="140"
                   data-origin="mc" data-position="center" data-masked="false">
              <span class="btn btn-lg btn-primary btn-sm">Get
                Started</span>
                </a>
            </div>
            <!--end:slide-2-->

            <!--begin:slide-3-->
            <div class="ms-slide bg-dark" data-delay="3" data-fill-mode="fill">
                <!--bg-->
                <img class="opacity-25" src="{{ URL::asset('assets/vendor/masterslider/style/blank.gif') }}" alt="" title=""
                     data-src="{{ URL::asset('assets/img/backgrounds/bg5.jpg') }}" />
                <!--Title-->
                <div class="ms-layer text-center ms-title text-white" data-effect="skewleft(23,500)" data-duration="1000"
                     data-delay="900" data-ease="easeInOutSine" data-hide-effect="top(long,false)" data-offset-x="0"
                     data-offset-y="-40" data-origin="mc" data-position="center" data-masked="false">
                    <div>A responsive theme<br> built for success</div>
                </div>

                <!--Button-->
                <a href="{{ URL::asset('#') }}" class="ms-layer ms-btn" data-effect="skewleft(23,500)" data-duration="1000" data-delay="1200"
                   data-ease="easeInOutSine" data-hide-effect="top(long,false)" data-offset-x="0" data-offset-y="140"
                   data-origin="mc" data-position="center" data-masked="false"><span
                        class="btn btn-lg btn-primary btn-sm">Get Started</span>
                </a>
            </div>
            <!--end:slide-3-->
        </div>
    </div>
    <!--end:main slider-->

    <!--begin: features icons-->
    <section class="position-relative border-bottom" id="next">
        <div class="container py-9 py-lg-11">
            <div class="row mb-9 mb-lg-11 justify-content-between align-items-end">
                <div class="col-lg-10 col-xl-8 mx-auto text-center">

                    <!--begin:Subheading-->
                    <div class="mb-3" data-aos="fade-up">
                        <span class="h6 text-body-secondary">Welcome to the Assan</span>
                    </div>
                    <!--end:subheading-->

                    <!--begin:Section Heading-->
                    <h2 class="display-5 mb-0" data-aos="fade-up">Reimagine your product with forward-thinking solutions
                    </h2>
                    <!--end:heading-->
                </div>
            </div>
            <div class="row justify-content-around">
                <!--begin:Feature column-->
                <div class="col-12 col-lg-4 mb-7 mb-lg-0" data-aos="fade-up" data-aos-delay="100">
                    <div class="text-center">
                        <!--Icon-->
                        <div class="mb-4 position-relative display-3 fw-normal text-primary">
                            <i class="icon-Repeat-2 position-relative"></i>
                        </div>
                        <h5 class="mb-3">Reusable elements</h5>
                        <p class="mb-3 px-lg-3">
                            Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing
                            industries for layouts and visual mockups.
                        </p>
                        <a href="{{ URL::asset('#!') }}" class="link-underline link-underline-opacity-50 small fw-semibold">
                            Learn More<i class="bx bx-right-arrow-alt align-middle ms-1 lh-1 fs-5"></i>
                        </a>
                    </div>
                </div>
                <!--end:Feature column-->

                <!--begin:Feature column-->
                <div class="col-12 col-lg-4 mb-7 mb-lg-0" data-aos="fade-up" data-aos-delay="150">
                    <div class="text-center">
                        <!--Icon-->
                        <div class="mb-4 position-relative display-3 fw-normal text-primary">
                            <i class="icon-Light-Bulb position-relative"></i>
                        </div>
                        <h5 class="mb-3">Design & innovation</h5>
                        <p class="mb-3 px-lg-3">
                            Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing
                            industries for layouts and visual mockups.
                        </p>
                        <a href="{{ URL::asset('#!') }}" class="link-hover-underline small fw-semibold">
                            Learn More<i class="bx bx-right-arrow-alt align-middle ms-1 lh-1 fs-5"></i>
                        </a>
                    </div>
                </div>
                <!--end:Feature column-->

                <!--begin:Feature column-->
                <div class="col-12 col-lg-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="text-center">
                        <!--Icon-->
                        <div class="mb-4 position-relative display-3 fw-normal text-primary">
                            <i class="icon-Thumbs-UpSmiley position-relative"></i>
                        </div>
                        <h5 class="mb-3">Best selling</h5>
                        <p class="mb-3 px-lg-3">
                            Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing
                            industries for layouts and visual mockups.
                        </p>
                        <a href="{{ URL::asset('#!') }}" class="link-hover-underline small fw-semibold">
                            Learn More<i class="bx bx-right-arrow-alt align-middle ms-1 lh-1 fs-5"></i>
                        </a>
                    </div>
                </div>
                <!--end:Feature column-->
            </div>
        </div>
    </section>
    <!--end: features icons-->

    <!--begin: features image-->
    <section class="position-relative overflow-hidden">
        <div class="container py-9 py-lg-11 position-relative z-1">
            <div class="row align-items-center justify-content-between">
                <div class="order-last col-lg-6">

                    <!--Subheading-->
                    <div class="mb-4" data-aos="fade-up">
                        <!--Subheading-->
                        <h6 class="mb-0 text-uppercase">Why choose us?</h6>
                    </div>
                    <!--Section Heading-->
                    <h2 class="mb-7 display-5 position-relative z-1" data-aos="fade-right">Designed for developers
                    </h2>
                    <div class="position-relative z-1">
                        <!--Feature icon card-->
                        <div class="d-flex mb-5" data-aos="fade-up" data-aos-delay="150">
                            <!--Feature icon-->
                            <div class="me-3">
                                <!--Icon-->
                                <i
                                    class="bx bx-check lh-1 width-3x height-3x flex-center rounded-circle bg-body-tertiary text-primary position-relative fs-4"></i>
                            </div>
                            <!--Feature text-->
                            <div>
                                <h5>
                                    500+ Reusable components
                                </h5>
                                <p class="mb-0 text-body-secondary">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                                    labore et dolore magna aliqua. Ac turpis egestas maecenas pharetra convallis.
                                </p>
                            </div>
                        </div>
                        <!--Feature icon card-->
                        <div class="d-flex mb-5" data-aos="fade-up" data-aos-delay="200">
                            <!--Feature icon-->
                            <div class="me-3">
                                <!--Icon-->
                                <i
                                    class="bx bx-check lh-1 width-3x height-3x flex-center rounded-circle bg-body-tertiary text-primary position-relative fs-4"></i>

                            </div>

                            <!--Feature text-->
                            <div>
                                <h5>
                                    Beautifully designed layouts
                                </h5>
                                <p class="mb-0 text-body-secondary">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                                    labore et dolore magna aliqua. Ac turpis egestas maecenas pharetra convallis.
                                </p>
                            </div>
                        </div>
                        <!--Feature icon card-->
                        <div class="d-flex mb-3" data-aos="fade-up" data-aos-delay="250">
                            <!--Feature icon-->
                            <div class="me-3">
                                <!--Icon-->
                                <i
                                    class="bx bx-check lh-1 width-3x height-3x flex-center rounded-circle bg-body-tertiary text-primary position-relative fs-4"></i>

                            </div>

                            <!--Feature text-->
                            <div>
                                <h5>
                                    Clean & well coded
                                </h5>
                                <p class="mb-0 text-body-secondary">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                                    labore et dolore magna aliqua. Ac turpis egestas maecenas pharetra convallis.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="mt-5 text-end" data-aos="fade-up" data-aos-delay="250">
                        <a href="{{ URL::asset('#!') }}" class="link-hover-underline fw-bold">
                            <span>Learn more</span> <i class="bx bx-right-arrow-alt"></i>
                        </a>
                    </div>

                </div>
                <div class="col-lg-6 col-xl-5 col-md-10 me-lg-auto order-1 mb-7 mb-lg-0">
                    <div class="position-relative" data-aos="fade-left" data-aos-delay="150">
                        <div class="bg-warning position-absolute start-0 bottom-0 w-100 h-75 rounded-5"></div>

                        <img src="{{ URL::asset('assets/img/backgrounds/trans2.png') }}" alt="" class="img-fluid position-relative">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--end: features image-->

    <!--begin: Section case studies (portfolio)-->
    <section class="position-relative overflow-hidden">
        <div class="position-absolute start-0 top-0 w-100 h-60 px-1 px-lg-3">
            <div class="rounded-4 top-0 w-100 h-100 bg-primary"></div>
        </div>
        <div class="container-fluid position-relative py-9 py-lg-11">
            <div class="row mb-5 text-white mb-lg-7 justify-content-center align-items-end">
                <div class="col-lg-6 text-white text-center">
                    <!--Subheading-->
                    <h6 class="mb-4 text-uppercase">Case studies</h6>
                    <!--Section Heading-->
                    <h2 class="mb-0 display-5">Our work speaks for itself</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-12 position-relative">

                    <!--Projects swiper slider-->
                    <div class="swiper-container swiper-projects overflow-visible">
                        <div class="swiper-wrapper">

                            <!--begin:project-slide-->
                            <div class="swiper-slide">
                                <a href="{{ URL::asset('#!') }}" class="card-over d-block card-hover overflow-hidden rounded-3">
                                    <img src="{{ URL::asset('assets/img/projects/1.jpg') }}" alt="" class="img-fluid img-zoom rounded-3">
                                    <div class="card-overlay p-4 d-flex align-items-end text-white rounded-3">
                                        <ul class="list-unstyled overlay-items">
                                            <li>
                                                <h4 class="mb-1">Awesome title</h4>
                                            </li>
                                            <li><span class="opacity-75">Awesome Subtitle</span></li>
                                        </ul>
                                    </div>
                                </a>
                            </div>

                            <!--begin:project-slide-->
                            <div class="swiper-slide">
                                <a href="{{ URL::asset('#!') }}" class="card-over d-block card-hover overflow-hidden rounded-3">
                                    <img src="{{ URL::asset('assets/img/projects/2.jpg') }}" alt="" class="img-fluid img-zoom rounded-3">
                                    <div class="card-overlay p-4 d-flex align-items-end text-white rounded-3">
                                        <ul class="list-unstyled overlay-items">
                                            <li>
                                                <h4 class="mb-1">Awesome title</h4>
                                            </li>
                                            <li><span class="opacity-75">Awesome Subtitle</span></li>
                                        </ul>
                                    </div>
                                </a>
                            </div>

                            <!--begin:project-slide-->
                            <div class="swiper-slide">
                                <a href="{{ URL::asset('#!') }}" class="card-over d-block card-hover overflow-hidden rounded-3">
                                    <img src="{{ URL::asset('assets/img/projects/3.jpg') }}" alt="" class="img-fluid img-zoom rounded-3">
                                    <div class="card-overlay p-4 d-flex align-items-end text-white rounded-3">
                                        <ul class="list-unstyled overlay-items">
                                            <li>
                                                <h4 class="mb-1">Awesome title</h4>
                                            </li>
                                            <li><span class="opacity-75">Awesome Subtitle</span></li>
                                        </ul>
                                    </div>
                                </a>
                            </div>

                            <!--begin:project-slide-->
                            <div class="swiper-slide">
                                <a href="{{ URL::asset('#!') }}" class="card-over d-block card-hover overflow-hidden rounded-3">
                                    <img src="{{ URL::asset('assets/img/projects/4.jpg') }}" alt="" class="img-fluid img-zoom rounded-3">
                                    <div class="card-overlay p-4 d-flex align-items-end text-white rounded-3">
                                        <ul class="list-unstyled overlay-items">
                                            <li>
                                                <h4 class="mb-1">Awesome title</h4>
                                            </li>
                                            <li><span class="opacity-75">Awesome Subtitle</span></li>
                                        </ul>
                                    </div>
                                </a>
                            </div>

                            <!--begin:project-slide-->
                            <div class="swiper-slide">
                                <a href="{{ URL::asset('#!') }}" class="card-over d-block card-hover overflow-hidden rounded-3">
                                    <img src="{{ URL::asset('assets/img/projects/5.jpg') }}" alt="" class="img-fluid img-zoom rounded-3">
                                    <div class="card-overlay p-4 d-flex align-items-end text-white rounded-3">
                                        <ul class="list-unstyled overlay-items">
                                            <li>
                                                <h4 class="mb-1">Awesome title</h4>
                                            </li>
                                            <li><span class="opacity-75">Awesome Subtitle</span></li>
                                        </ul>
                                    </div>
                                </a>
                            </div>

                            <!--begin:project-slide-->
                            <div class="swiper-slide">
                                <a href="{{ URL::asset('#!') }}" class="card-over d-block card-hover overflow-hidden rounded-3">
                                    <img src="{{ URL::asset('assets/img/projects/7.jpg') }}" alt="" class="img-fluid img-zoom rounded-3">
                                    <div class="card-overlay p-4 d-flex align-items-end text-white rounded-3">
                                        <ul class="list-unstyled overlay-items">
                                            <li>
                                                <h4 class="mb-1">Awesome title</h4>
                                            </li>
                                            <li><span class="opacity-75">Awesome Subtitle</span></li>
                                        </ul>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="text-center pt-7">
                            <div
                                class="swiperProjects-pagination text-primary swiper-pagination position-relative d-flex justify-content-center mb-4">
                            </div>
                            <a href="{{ URL::asset('#!') }}" class="btn btn-light hover-lift">
                                View all case studies
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!--end: Section case studies (portfolio)-->


    <!--Begin:testimonials section-->
    <section class="position-relative overflow-hidden bg-body-tertiary">

        <!--begin:Divider wave shape-->
        <svg class="position-absolute start-0 bottom-0 w-100" style="color: var(--bs-primary);"
             preserveAspectRatio="none" width="100%" height="288" viewBox="0 0 1200 288" fill="none"
             xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" clip-rule="evenodd"
                  d="M0 0L67 30C133 60 267 120 400 138C533 156 667 132 800 126C933 120 1067 132 1133 138L1200 144V288H1133C1067 288 933 288 800 288C667 288 533 288 400 288C267 288 133 288 67 288H0V0Z"
                  fill="currentColor" />
        </svg>
        <!--end:Divider wave shape-->

        <div class="container position-relative z-1 py-9 py-lg-11">
            <div class="row mb-7 align-items-end justify-content-between">
                <!--begin: Section headings-->
                <div class="col-lg-7 mb-4 mb-lg-0">

                    <div class="mb-4" data-aos="fade-up">
                        <!--Subheading-->
                        <h6 class="mb-0 text-uppercase">Testimonials</h6>
                    </div>
                    <!--Heading-->
                    <h2 class="mb-2 display-5" data-aos="fade-right">What our clients say</h2>
                </div>
                <!--end: Section headings-->
                <div class="col-12 col-lg-3 text-lg-end" data-aos="fade-left" data-aos-delay="150">
                    <!--begin: button-->
                    <a href="{{ URL::asset('#!') }}" class="btn btn-secondary btn-hover-arrow hover-lift">
                        <span>Customer stories</span>
                    </a>
                    <!--end: button-->
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-12 position-relative">
                    <!--Begin:swiper slider-->
                    <div class="swiper-container overflow-hidden swiper-testimonials shadow-lg rounded-3">
                        <!--Begin:wrapper-->
                        <div class="swiper-wrapper">

                            <!--Begin:slide-->
                            <div class="swiper-slide">
                                <div class="d-flex align-items-center flex-column bg-body overflow-hidden flex-lg-row">
                                    <div class="col-lg-6 px-0 mb-4 mb-md-0">
                                        <div class="position-relative">
                                            <!--testimonial Image-->
                                            <img src="{{ URL::asset('assets/img/960x900/2.jpg') }}" class="img-fluid" alt="">

                                            <!--Testimonial image divider-->
                                            <svg class="position-absolute d-none d-lg-block end-0 top-0 h-100 me-n1"
                                                 style="color:var(--bs-body-bg)" preserveAspectRatio="none" width="58" height="583"
                                                 viewBox="0 0 58 583" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                      d="M0 583L9.66667 534.417C19.3333 485.833 38.6667 388.667 39.7407 291.5C40.8148 194.333 23.6296 97.1667 15.037 48.5833L6.44444 -1.62125e-05H58V48.5833C58 97.1667 58 194.333 58 291.5C58 388.667 58 485.833 58 534.417V583H0Z"
                                                      fill="currentColor" />
                                            </svg>

                                            <!--Testimonial image small device divider-->
                                            <svg class="position-absolute bottom-0 start-0 mb-n1 d-lg-none"
                                                 style="color:var(--bs-body-bg)" width="100%" height="48" preserveAspectRatio="none"
                                                 viewBox="0 0 1200 64" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                      d="M0 0L100 10.6667C200 21.3333 400 42.6667 600 43.8519C800 45.037 1000 26.0741 1100 16.5926L1200 7.11111V64H1100C1000 64 800 64 600 64C400 64 200 64 100 64H0L0 0Z"
                                                      fill="currentColor" />
                                            </svg>

                                        </div>
                                    </div>
                                    <div class="col-lg-6 mx-auto px-0">
                                        <blockquote class="blockquote text-center mb-0 px-4 py-5 py-lg-7">
                                            <!--Testimonial Comapny Logo -->
                                            <div class="width-10x mb-3 mb-lg-4 h-auto mx-auto" style="color: #FF5A5F;">
                                                <img class="img-fluid img-invert" src="{{ URL::asset('assets/img/partners/booking.com.svg') }}" alt="">
                                            </div>
                                            <!-- Text -->
                                            <p class="mb-5 fs-4 w-lg-75 mx-auto">
                                                “ It is really refreshing to work with this bootstrap theme
                                                which is truly helpful in the development of one of my client’s
                                                website.”
                                            </p>

                                            <!-- Footer -->
                                            <footer class="blockquote-footer pb-4 pb-lg-0">
                                                <span class="h6">Nikita Millton</span>
                                            </footer>

                                        </blockquote>
                                    </div>
                                </div>
                            </div>
                            <!--end:slide-->

                            <!--Begin:slide-->
                            <div class="swiper-slide">
                                <div class="d-flex align-items-center flex-column bg-body overflow-hidden flex-lg-row">
                                    <div class="col-lg-6 px-0 mb-4 mb-md-0">
                                        <div class="position-relative">
                                            <!--testimonial Image-->
                                            <img src="{{ URL::asset('assets/img/960x900/3.jpg') }}" class="img-fluid" alt="">

                                            <!--Testimonial image divider-->
                                            <svg class="position-absolute d-none d-lg-block end-0 top-0 h-100 me-n1"
                                                 style="color:var(--bs-body-bg)" preserveAspectRatio="none" width="58" height="583"
                                                 viewBox="0 0 58 583" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                      d="M0 583L9.66667 534.417C19.3333 485.833 38.6667 388.667 39.7407 291.5C40.8148 194.333 23.6296 97.1667 15.037 48.5833L6.44444 -1.62125e-05H58V48.5833C58 97.1667 58 194.333 58 291.5C58 388.667 58 485.833 58 534.417V583H0Z"
                                                      fill="currentColor" />
                                            </svg>

                                            <!--Testimonial image small device divider-->
                                            <svg class="position-absolute bottom-0 start-0 mb-n1 d-lg-none"
                                                 style="color:var(--bs-body-bg)" width="100%" height="48" preserveAspectRatio="none"
                                                 viewBox="0 0 1200 64" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                      d="M0 0L100 10.6667C200 21.3333 400 42.6667 600 43.8519C800 45.037 1000 26.0741 1100 16.5926L1200 7.11111V64H1100C1000 64 800 64 600 64C400 64 200 64 100 64H0L0 0Z"
                                                      fill="currentColor" />
                                            </svg>

                                        </div>
                                    </div>
                                    <div class="col-lg-6 mx-auto px-0">
                                        <blockquote class="blockquote text-center mb-0 px-4 py-5 py-lg-7">
                                            <!--Testimonial Comapny Logo -->
                                            <div class="width-10x mb-3 mb-lg-4 h-auto mx-auto" style="color: #FF5A5F;">
                                                <img class="img-fluid img-invert" src="{{ URL::asset('assets/img/partners/expedia.svg') }}" alt="">
                                            </div>
                                            <!-- Text -->
                                            <p class="mb-5 fs-4 w-lg-75 mx-auto">
                                                “ It is really refreshing to work with this bootstrap theme
                                                which is truly helpful in the development of one of my client’s
                                                website.”
                                            </p>

                                            <!-- Footer -->
                                            <footer class="blockquote-footer pb-4 pb-lg-0">
                                                <span class="h6">Maria Shaparenko</span>
                                            </footer>

                                        </blockquote>
                                    </div>
                                </div>
                            </div>
                            <!--end:slide-->

                            <!--Begin:slide-->
                            <div class="swiper-slide">
                                <div class="d-flex align-items-center flex-column bg-body overflow-hidden flex-lg-row">
                                    <div class="col-lg-6 px-0 mb-4 mb-md-0">
                                        <div class="position-relative">
                                            <!--testimonial Image-->
                                            <img src="{{ URL::asset('assets/img/960x900/4.jpg') }}" class="img-fluid" alt="">

                                            <!--Testimonial image divider-->
                                            <svg class="position-absolute d-none d-lg-block end-0 top-0 h-100 me-n1"
                                                 style="color:var(--bs-body-bg)" preserveAspectRatio="none" width="58" height="583"
                                                 viewBox="0 0 58 583" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                      d="M0 583L9.66667 534.417C19.3333 485.833 38.6667 388.667 39.7407 291.5C40.8148 194.333 23.6296 97.1667 15.037 48.5833L6.44444 -1.62125e-05H58V48.5833C58 97.1667 58 194.333 58 291.5C58 388.667 58 485.833 58 534.417V583H0Z"
                                                      fill="currentColor" />
                                            </svg>

                                            <!--Testimonial image small device divider-->
                                            <svg class="position-absolute bottom-0 start-0 mb-n1 d-lg-none"
                                                 style="color:var(--bs-body-bg)" width="100%" height="48" preserveAspectRatio="none"
                                                 viewBox="0 0 1200 64" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                      d="M0 0L100 10.6667C200 21.3333 400 42.6667 600 43.8519C800 45.037 1000 26.0741 1100 16.5926L1200 7.11111V64H1100C1000 64 800 64 600 64C400 64 200 64 100 64H0L0 0Z"
                                                      fill="currentColor" />
                                            </svg>

                                        </div>
                                    </div>
                                    <div class="col-lg-6 mx-auto px-0">
                                        <blockquote class="blockquote text-center mb-0 px-4 py-5 py-lg-7">
                                            <!--Testimonial Comapny Logo -->
                                            <div class="width-10x mb-3 mb-lg-4 h-auto mx-auto" style="color: #FF5A5F;">
                                                <img class="img-fluid img-invert" src="{{ URL::asset('assets/img/partners/deliveroo.svg') }}" alt="">
                                            </div>
                                            <!-- Text -->
                                            <p class="mb-5 fs-4 w-lg-75 mx-auto">
                                                “ It is really refreshing to work with this bootstrap theme
                                                which is truly helpful in the development of one of my client’s
                                                website.”
                                            </p>

                                            <!-- Footer -->
                                            <footer class="blockquote-footer pb-4 pb-lg-0">
                                                <span class="h6">Duván Zapata</span>
                                            </footer>

                                        </blockquote>
                                    </div>
                                </div>
                            </div>
                            <!--end:slide-->

                        </div>
                        <!--end:wrapper-->
                    </div>


                    <!--Begin:Swiper navigation-->
                    <div class="position-absolute end-0 bottom-0 mb-4 me-5 z-1 d-flex align-items-center">
                        <div
                            class="swiperAuto-button-prev swiper-button-prev position-relative me-1 ms-0 start-0 width-4x height-4x hover-shadow hover-lift bg-body-tertiary text-body p-0">
                        </div>
                        <div
                            class="swiperAuto-button-next swiper-button-next position-relative ms-1 ms-0 end-0 width-4x height-4x hover-shadow hover-lift bg-body-tertiary text-body">
                        </div>
                    </div>
                    <!--end:Swiper navigation-->

                </div>
                <!--end:swiper slider-->
            </div>
        </div>
    </section>
    <!--/end:testimonials section-->


    <!--begin:Blog section-->
    <section class="position-relative bg-body overflow-hidden">
        <div class="container py-9 py-lg-11 position-relative">
            <div class="row mb-7 align-items-end justify-content-between">
                <div class="col-lg-7 mb-4 mb-lg-0">
                    <div class="mb-4" data-aos="fade-up">
                        <!--Subheading-->
                        <h6 class="mb-0 text-uppercase">Blog</h6>
                    </div>
                    <h2 class="mb-0 display-5" data-aos="fade-right">Insights, thoughts & announcements</h2>
                </div>
                <div class="col-12 col-lg-3 text-lg-end" data-aos="fade-left" data-aos-delay="150">
                    <a href="{{ URL::asset('#!') }}" class="btn btn-secondary btn-hover-arrow hover-lift">
                        <span>Our Blog</span>
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 mb-4 mb-lg-0" data-aos="fade-up">
                    <article class="card card-hover text-center hover-shadow-lg overflow-hidden border-0 rounded-3">
                        <div class="overflow-hidden position-relative">
                            <!--Article image-->
                            <img src="{{ URL::asset('assets/img/960x640/1.jpg') }}" alt="" class="img-fluid img-zoom">

                            <!--Article image divider-->
                            <svg class="position-absolute start-0 bottom-0 mb-n1" style="color:var(--bs-body-bg)"
                                 preserveAspectRatio="none" width="100%" height="48" viewBox="0 0 1460 120" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M122 22.8261L0 0V120H1460V0L1338 22.8261C1217 44.1304 973 88.2609 730 88.2609C487 88.2609 243 44.1304 122 22.8261Z"
                                    fill="currentColor"></path>
                            </svg>
                        </div>
                        <!--Content-body-->
                        <div class="card-body pb-5 position-relative">
                            <small class="text-body-secondary"><i class="bx bx-calendar-alt me-1"></i> 12 Dec 2021</small>
                            <h5 class="py-3 mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit</h5>
                            <p class="mb-0 text-truncate px-lg-4">
                                Lorem ipsum dolor sit amet sed do eiusmod tempor labore et dolore magna aliqua.
                                Viverra nam libero justo laoreet.
                            </p>
                        </div>

                        <!--Article link-->
                        <a href="{{ URL::asset('#!') }}" class="stretched-link"></a>
                    </article>
                </div>
                <div class="col-lg-4 mb-4 mb-lg-0" data-aos="fade-up">
                    <article class="card card-hover text-center hover-shadow-lg overflow-hidden border-0 rounded-3">
                        <div class="overflow-hidden position-relative">

                            <!--Article image-->
                            <img src="{{ URL::asset('assets/img/960x640/2.jpg') }}" alt="" class="img-fluid img-zoom">

                            <!--Article image divider-->
                            <svg class="position-absolute start-0 bottom-0 mb-n1" style="color:var(--bs-body-bg)"
                                 preserveAspectRatio="none" width="100%" height="48" viewBox="0 0 1460 120" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M122 22.8261L0 0V120H1460V0L1338 22.8261C1217 44.1304 973 88.2609 730 88.2609C487 88.2609 243 44.1304 122 22.8261Z"
                                    fill="currentColor"></path>
                            </svg>
                        </div>
                        <!--Article text-->
                        <div class="card-body pb-5 position-relative">
                            <small class="text-body-secondary"><i class="bx bx-calendar-alt me-1"></i> 06 Nov 2021</small>
                            <h5 class="py-3 mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit</h5>
                            <p class="mb-0 text-truncate px-lg-4">
                                Lorem ipsum dolor sit amet sed do eiusmod tempor labore et dolore magna aliqua.
                                Viverra nam libero justo laoreet.
                            </p>
                        </div>

                        <!--Article link-->
                        <a href="{{ URL::asset('#!') }}" class="stretched-link"></a>
                    </article>
                </div>
                <div class="col-lg-4" data-aos="fade-up">
                    <article class="card card-hover text-center hover-shadow-lg overflow-hidden border-0 rounded-3">
                        <div class="overflow-hidden position-relative">

                            <!--Article image-->
                            <img src="{{ URL::asset('assets/img/960x640/3.jpg') }}" alt="" class="img-fluid img-zoom">

                            <!--Article image divider-->
                            <svg class="position-absolute mb-n1 start-0 bottom-0" style="color:var(--bs-body-bg)"
                                 preserveAspectRatio="none" width="100%" height="48" viewBox="0 0 1460 120" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M122 22.8261L0 0V120H1460V0L1338 22.8261C1217 44.1304 973 88.2609 730 88.2609C487 88.2609 243 44.1304 122 22.8261Z"
                                    fill="currentColor"></path>
                            </svg>
                        </div>

                        <!--Article text-->
                        <div class="card-body pb-5 position-relative">
                            <small class="text-body-secondary"><i class="bx bx-calendar-alt me-1"></i> 29 Oct 2021</small>
                            <h5 class="py-3 mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit</h5>
                            <p class="mb-0 text-truncate px-lg-4">
                                Lorem ipsum dolor sit amet sed do eiusmod tempor labore et dolore magna aliqua.
                                Viverra nam libero justo laoreet.
                            </p>
                        </div>
                        <!--Article link-->
                        <a href="{{ URL::asset('#!') }}" class="stretched-link"></a>
                    </article>
                </div>
            </div>
        </div>
    </section>
    <!--end:Blog section-->

    <!--begin:Clients section-->
    <section class="position-relative border-top bg-body overflow-hidden" data-aos="fade" data-aos-once="false"
             data-aos-offset="200">
        <div class="container px-lg-12 py-9 py-lg-11 position-relative z-1">
            <div class="mb-0 mb-lg-5 px-lg-11 text-center" data-aos="fade-up" data-aos-delay="100">
                <!--Heading-->
                <h5 class="mb-0 text-primary"><span class="text-body-secondary">Clients who love our</span>
                    <span class="d-inline-block"
                          data-typed='{"strings": ["Ideas...", "Creativity...", "passion...", "innovation..."]}'></span>
                </h5>
            </div>
            <div class="d-flex flex-wrap justify-content-center">
                <div class="d-flex align-items-center justify-content-center mt-5 width-14x px-4" data-aos="fade-up"
                     data-aos-delay="150">
                    <img src="{{ URL::asset('assets/img/partners/dark/amazon.svg') }}" alt="partner" class="img-fluid img-invert">
                </div>
                <div class="d-flex align-items-center justify-content-center mt-5 width-14x px-4" data-aos="fade-up"
                     data-aos-delay="150">
                    <img src="{{ URL::asset('assets/img/partners/dark/microsoft.svg') }}" alt="partner" class="img-fluid img-invert">
                </div>
                <div class="d-flex align-items-center justify-content-center mt-5 width-14x px-4" data-aos="fade-up"
                     data-aos-delay="200">
                    <img src="{{ URL::asset('assets/img/partners/dark/google.svg') }}" alt="partner" class="img-fluid img-invert">
                </div>
                <div class="d-flex align-items-center justify-content-center mt-5 width-14x px-4" data-aos="fade-up"
                     data-aos-delay="250">
                    <img src="{{ URL::asset('assets/img/partners/dark/booking.com.svg') }}" alt="partner" class="img-fluid img-invert">
                </div>
                <div class="d-flex align-items-center justify-content-center mt-5 width-14x px-4" data-aos="fade-up"
                     data-aos-delay="300">
                    <img src="{{ URL::asset('assets/img/partners/dark/grab.svg') }}" alt="partner" class="img-fluid img-invert">
                </div>
                <div class="d-flex align-items-center justify-content-center mt-5 width-14x px-4" data-aos="fade-up"
                     data-aos-delay="350">
                    <img src="{{ URL::asset('assets/img/partners/dark/slack.svg') }}" alt="partner" class="img-fluid img-invert">
                </div>
                <div class="d-flex align-items-center justify-content-center mt-5 width-14x px-4" data-aos="fade-up"
                     data-aos-delay="400">
                    <img src="{{ URL::asset('assets/img/partners/dark/uber.svg') }}" alt="partner" class="img-fluid img-invert">
                </div>
                <div class="d-flex align-items-center justify-content-center mt-5 width-14x px-4" data-aos="fade-up"
                     data-aos-delay="450">
                    <img src="{{ URL::asset('assets/img/partners/dark/didi.svg') }}" alt="partner" class="img-fluid img-invert">
                </div>
                <div class="d-flex align-items-center justify-content-center mt-5 width-14x px-4" data-aos="fade-up"
                     data-aos-delay="500">
                    <img src="{{ URL::asset('assets/img/partners/dark/lyft.svg') }}" alt="partner" class="img-fluid img-invert">
                </div>
                <div class="d-flex align-items-center justify-content-center mt-5 width-14x px-4" data-aos="fade-up"
                     data-aos-delay="550">
                    <img src="{{ URL::asset('assets/img/partners/dark/salesforce.svg') }}" alt="partner" class="img-fluid img-invert">
                </div>
            </div>
            <!--Col-->
        </div>
    </section>
    <!--end:Clients section-->

    <!--begin:Call to action section-->
    <section class="position-relative bg-body-tertiary border-top overflow-hidden">

        <div class="container py-9 py-lg-11 position-relative">
            <div class="row pb-7 position-relative">
                <div class="col-12 col-md-10 col-lg-8 mx-auto text-center">
                    <h2 class="mb-4 display-5 fw-lighter" data-aos="fade-down">
                        Bring <span class="fw-bolder d-inline-block pb-1 position-relative text-primary">Assan template
                </span> to life and start building — today
                    </h2>
                    <p class="mb-5 px-lg-7 lead" data-aos="zoom-in" data-aos-delay="100">
                        There are combined alignment methods – when several types of alignment together are
                        used
                        in one composition.
                    </p>
                    <div data-aos="fade-up" data-aos-delay="150">
                        <a href="{{ URL::asset('#!') }}" class="btn btn-outline-primary btn-hover-arrow btn-lg">
                            <span>Purchase Now</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!--begin:divider-->
        <svg class="position-absolute start-0 bottom-0 flip-y" style="color: var(--bs-dark);" width="100%" height="36"
             xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 152" fill="none" preserveAspectRatio="none">
            <path
                d="M126.597 138.74C99.8867 127.36 76.6479 109.164 59.2161 85.9798L0 3.05176e-05L1440 0C1440 0 1419.98 25.8404 1380.15 32.9584L211.382 150.811C182.549 154.283 153.308 150.12 126.597 138.74Z"
                fill="currentColor" />
        </svg>
        <!--end:divider-->
    </section>
    <!--end:Call to action section-->

</x-assan-layout>
