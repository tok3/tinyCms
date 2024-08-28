<x-assan-layout layout-type="{{$layoutType}}">

            <!--begin:main Hero section-->
            <section class="position-relative bg-dark jarallax text-white" data-speed=".2">
                <img src="{{ URL::asset('assets/img/backgrounds/bg6.jpg') }}" alt="" class="jarallax-img opacity-50">
                <!--Hero: divider-->
                <svg class="w-100 position-absolute start-0 bottom-0 z-1 mb-n1" height="48"
                    fill="currentColor" preserveAspectRatio="none" viewBox="0 0 1200 120"
                    xmlns="http://www.w3.org/2000/svg" style="transform: rotate(180deg) scaleX(-1);color: var(--bs-body-bg);">
                    <path d="M0 0v46.29c47.79 22.2 103.59 32.17 158 28 70.36-5.37 136.33-33.31 206.8-37.5 73.84-4.36 147.54 16.88 218.2 35.26
       69.27 18 138.3 24.88 209.4
       13.08 36.15-6 69.85-17.84 104.45-29.34C989.49 25 1113-14.29 1200 52.47V0z" opacity=".25" />
                    <path d="M0 0v15.81c13 21.11 27.64 41.05 47.69 56.24C99.41 111.27 165 111 224.58 91.58c31.15-10.15 60.09-26.07 89.67-39.8
       40.92-19 84.73-46
       130.83-49.67 36.26-2.85 70.9 9.42 98.6 31.56 31.77 25.39 62.32 62 103.63 73 40.44 10.79 81.35-6.69
       119.13-24.28s75.16-39 116.92-43.05c59.73-5.85
       113.28 22.88 168.9 38.84 30.2 8.66 59 6.17 87.09-7.5 22.43-10.89 48-26.93 60.65-49.24V0z" opacity=".5" />
                    <path d="M0 0v5.63C149.93 59 314.09 71.32 475.83 42.57c43-7.64 84.23-20.12 127.61-26.46 59-8.63 112.48 12.24 165.56
       35.4C827.93 77.22
       886 95.24 951.2 90c86.53-7 172.46-45.71 248.8-84.81V0z" />
                </svg>

                <!--Hero container-->
                <div class="container position-relative pt-12 pt-lg-15 pb-9">
                    <div class="row pb-7 pb-lg-11">
                        <div class="col-lg-10 mx-auto text-center">
                            <!--hero heading-->
                            <h1 class="mb-4 display-2 position-relative">You deserve a <br><span class="text-underline"
                                    data-typed='{"strings": ["Powerful","Modern","Clean","Stunning"]}'></span>
                            Website
                            </h1>
                            <!--hero subheading-->
                            <p class="lead mb-5 text-white opacity-75">Build a stunning website ease</p>

                            <!--Button-->
                            <a href="{{ URL::asset('#next') }}" class="btn btn-white btn-hover-arrow btn-lg">
                                <span>Learn More</span>
                            </a>

                        </div>
                    </div>
                    <!--/.row-->
                </div>
                <!--/.content-->
            </section>
            <!--end:main Hero Section-->

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
                            <h2 class="display-5 mb-0" data-aos="fade-up">
                                Reimagine your product with forward-thinking solutions
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
                                    <i class="icon-Repeat-2 text-gradient position-relative"></i>
                                </div>
                                <h5 class="mb-3">Modern & Elegant</h5>
                                <p class="mb-3 text-body-secondary px-lg-2">
                                    Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing
                                    industries for layouts and visual mockups.
                                </p>
                                <a href="{{ URL::asset('#!') }}" class="link-hover-underline small text-body-secondary fw-semibold">
                                    Learn More <i class="bx bx-left-arrow-alt align-middle ms-1 lh-1 fs-5"></i>
                                </a>
                            </div>
                        </div>
                        <!--end:Feature column-->

                        <!--begin:Feature column-->
                        <div class="col-12 col-lg-4 mb-7 mb-lg-0" data-aos="fade-up" data-aos-delay="150">
                            <div class="text-center">
                                <!--Icon-->
                                <div class="mb-4 position-relative display-3 fw-normal text-primary">
                                    <i class="icon-Light-Bulb text-gradient position-relative"></i>
                                </div>
                                <h5 class="mb-3">Trusted Author</h5>
                                <p class="mb-3 text-body-secondary px-lg-2">
                                    Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing
                                    industries for layouts and visual mockups.
                                </p>
                                <a href="{{ URL::asset('#!') }}" class="link-hover-underline small text-body-secondary fw-semibold">
                                    Learn More <i class="bx bx-left-arrow-alt align-middle ms-1 lh-1 fs-5"></i>
                                </a>
                            </div>
                        </div>
                        <!--end:Feature column-->

                        <!--begin:Feature column-->
                        <div class="col-12 col-lg-4" data-aos="fade-up" data-aos-delay="200">
                            <div class="text-center">
                                <!--Icon-->
                                <div class="mb-4 position-relative display-3 fw-normal text-primary">
                                    <i class="icon-Thumbs-UpSmiley text-gradient position-relative"></i>
                                </div>
                                <h5 class="mb-3">Regular Updates</h5>
                                <p class="mb-3 text-body-secondary px-lg-2">
                                    Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing
                                    industries for layouts and visual mockups.
                                </p>
                                <a href="{{ URL::asset('#!') }}" class="link-hover-underline small text-body-secondary fw-semibold">
                                    Learn More <i class="bx bx-left-arrow-alt align-middle ms-1 lh-1 fs-5"></i>
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
                                <h6 class="mb-0 text-uppercase">why choose Assan</h6>
                            </div>
                            <!--Section Heading-->
                            <h2 class="mb-7 display-5 position-relative z-1" data-aos="fade-right">
                                Built for developers by developer
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
                                            500+ Flexible components
                                        </h5>
                                        <p class="mb-0 text-body-secondary">
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                            tempor incididunt ut labore et dolore magna aliqua. Ac turpis egestas
                                            maecenas pharetra convallis.
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
                                            300+ Valid layouts
                                        </h5>
                                        <p class="mb-0 text-body-secondary">
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                            tempor incididunt ut labore et dolore magna aliqua. Ac turpis egestas
                                            maecenas pharetra convallis.
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
                                            Unlimited headers & footers
                                        </h5>
                                        <p class="mb-0 text-body-secondary">
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                            tempor incididunt ut labore et dolore magna aliqua. Ac turpis egestas
                                            maecenas pharetra convallis.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-5 text-end" data-aos="fade-up" data-aos-delay="250">
                                <div class="p-1 bg-gradient-primary d-inline-block rounded-3 hover-shadow">
                                    <a href="{{ URL::asset('#!') }}" class="btn btn-outline-white border-0 btn-hover-arrow btn-lg">
                                        <span>Explore demos</span>
                                    </a>
                                </div>
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
                    <div class="rounded-4 top-0 w-100 h-100 bg-warning"></div>
                </div>
                <div class="container-fluid position-relative py-9 py-lg-11">
                    <div class="row mb-5 mb-lg-7 justify-content-center align-items-end">
                        <div class="col-lg-6 text-center">
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
                                            <img src="{{ URL::asset('assets/img/projects/1.jpg') }}" alt=""
                                                class="img-fluid img-zoom rounded-3">
                                            <div class="card-overlay p-4 d-flex align-items-start text-white rounded-3">
                                                <ul class="list-unstyled overlay-items">
                                                    <li>
                                                        <h4 class="mb-1">عنوان رائع</h4>
                                                    </li>
                                                    <li><span class="opacity-75">ترجمة رهيبة</span></li>
                                                </ul>
                                            </div>
                                        </a>
                                    </div>

                                    <!--begin:project-slide-->
                                    <div class="swiper-slide">
                                        <a href="{{ URL::asset('#!') }}" class="card-over d-block card-hover overflow-hidden rounded-3">
                                            <img src="{{ URL::asset('assets/img/projects/2.jpg') }}" alt=""
                                                class="img-fluid img-zoom rounded-3">
                                            <div class="card-overlay p-4 d-flex align-items-start text-white rounded-3">
                                                <ul class="list-unstyled overlay-items">
                                                    <li>
                                                        <h4 class="mb-1">عنوان رائع</h4>
                                                    </li>
                                                    <li><span class="opacity-75">ترجمة رهيبة</span></li>
                                                </ul>
                                            </div>
                                        </a>
                                    </div>

                                    <!--begin:project-slide-->
                                    <div class="swiper-slide">
                                        <a href="{{ URL::asset('#!') }}" class="card-over d-block card-hover overflow-hidden rounded-3">
                                            <img src="{{ URL::asset('assets/img/projects/3.jpg') }}" alt=""
                                                class="img-fluid img-zoom rounded-3">
                                            <div class="card-overlay p-4 d-flex align-items-start text-white rounded-3">
                                                <ul class="list-unstyled overlay-items">
                                                    <li>
                                                        <h4 class="mb-1">عنوان رائع</h4>
                                                    </li>
                                                    <li><span class="opacity-75">ترجمة رهيبة</span></li>
                                                </ul>
                                            </div>
                                        </a>
                                    </div>

                                    <!--begin:project-slide-->
                                    <div class="swiper-slide">
                                        <a href="{{ URL::asset('#!') }}" class="card-over d-block card-hover overflow-hidden rounded-3">
                                            <img src="{{ URL::asset('assets/img/projects/4.jpg') }}" alt=""
                                                class="img-fluid img-zoom rounded-3">
                                            <div class="card-overlay p-4 d-flex align-items-start text-white rounded-3">
                                                <ul class="list-unstyled overlay-items">
                                                    <li>
                                                        <h4 class="mb-1">عنوان رائع</h4>
                                                    </li>
                                                    <li><span class="opacity-75">ترجمة رهيبة</span></li>
                                                </ul>
                                            </div>
                                        </a>
                                    </div>

                                    <!--begin:project-slide-->
                                    <div class="swiper-slide">
                                        <a href="{{ URL::asset('#!') }}" class="card-over d-block card-hover overflow-hidden rounded-3">
                                            <img src="{{ URL::asset('assets/img/projects/5.jpg') }}" alt=""
                                                class="img-fluid img-zoom rounded-3">
                                            <div class="card-overlay p-4 d-flex align-items-start text-white rounded-3">
                                                <ul class="list-unstyled overlay-items">
                                                    <li>
                                                        <h4 class="mb-1">عنوان رائع</h4>
                                                    </li>
                                                    <li><span class="opacity-75">ترجمة رهيبة</span></li>
                                                </ul>
                                            </div>
                                        </a>
                                    </div>

                                    <!--begin:project-slide-->
                                    <div class="swiper-slide">
                                        <a href="{{ URL::asset('#!') }}" class="card-over d-block card-hover overflow-hidden rounded-3">
                                            <img src="{{ URL::asset('assets/img/projects/7.jpg') }}" alt=""
                                                class="img-fluid img-zoom rounded-3">
                                            <div class="card-overlay p-4 d-flex align-items-start text-white rounded-3">
                                                <ul class="list-unstyled overlay-items">
                                                    <li>
                                                        <h4 class="mb-1">عنوان رائع</h4>
                                                    </li>
                                                    <li><span class="opacity-75">ترجمة رهيبة</span></li>
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
                <svg class="position-absolute start-0 bottom-0 w-100" style="color:var(--bs-body-bg)" preserveAspectRatio="none" width="100%"
                    height="288" viewBox="0 0 1200 288" fill="none" xmlns="http://www.w3.org/2000/svg">
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
                            <div class="p-1 bg-gradient-primary d-inline-block rounded-2 hover-shadow">
                                <a href="{{ URL::asset('#!') }}" class="btn btn-outline-white border-0 btn-hover-arrow">
                                    <span>Customer stories</span>
                                </a>
                            </div>
                            <!--end: button-->
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-12 position-relative">
                            <!--Begin:swiper slider-->
                            <div class="swiper-container bg-body overflow-hidden swiper-testimonials shadow-lg rounded-3">
                                <!--Begin:wrapper-->
                                <div class="swiper-wrapper">

                                    <!--Begin:slide-->
                                    <div class="swiper-slide">
                                        <div
                                            class="d-flex align-items-center flex-column overflow-hidden flex-lg-row">
                                            <div class="col-lg-6 px-0 mb-4 mb-md-0">
                                                <div class="position-relative">
                                                    <!--testimonial Image-->
                                                    <img src="{{ URL::asset('assets/img/960x900/2.jpg') }}" class="img-fluid" alt="">

                                                    <!--Testimonial image divider-->
                                                    <svg class="position-absolute d-none flip-x d-lg-block end-0 top-0 h-100 me-n1"
                                                        preserveAspectRatio="none" style="color:var(--bs-body-bg)" width="58" height="583"
                                                        viewBox="0 0 58 583" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M0 583L9.66667 534.417C19.3333 485.833 38.6667 388.667 39.7407 291.5C40.8148 194.333 23.6296 97.1667 15.037 48.5833L6.44444 -1.62125e-05H58V48.5833C58 97.1667 58 194.333 58 291.5C58 388.667 58 485.833 58 534.417V583H0Z"
                                                            fill="currentColor" />
                                                    </svg>

                                                    <!--Testimonial image small device divider-->
                                                    <svg class="position-absolute bottom-0 start-0 mb-n1 d-lg-none"
                                                        width="100%" height="48" style="color:var(--bs-body-bg)" preserveAspectRatio="none"
                                                        viewBox="0 0 1200 64" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M0 0L100 10.6667C200 21.3333 400 42.6667 600 43.8519C800 45.037 1000 26.0741 1100 16.5926L1200 7.11111V64H1100C1000 64 800 64 600 64C400 64 200 64 100 64H0L0 0Z"
                                                            fill="currentColor" />
                                                    </svg>

                                                </div>
                                            </div>
                                            <div class="col-lg-6 mx-auto px-0">
                                                <blockquote class="blockquote text-center mb-0 px-4 py-5 py-lg-7">
                                                    <!--Testimonial Comapny Logo -->
                                                    <div class="width-10x mb-3 mb-lg-4 h-auto mx-auto">
                                                        <img class="img-invert" src="{{ URL::asset('assets/img/partners/booking.com.svg') }}" alt="">
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
                                        <div
                                            class="d-flex align-items-center flex-column overflow-hidden flex-lg-row">
                                            <div class="col-lg-6 px-0 mb-4 mb-md-0">
                                                <div class="position-relative">
                                                    <!--testimonial Image-->
                                                    <img src="{{ URL::asset('assets/img/960x900/3.jpg') }}" class="img-fluid" alt="">

                                                    <!--Testimonial image divider-->
                                                    <svg class="position-absolute d-none d-lg-block flip-x end-0 top-0 h-100 me-n1"
                                                        preserveAspectRatio="none" style="color:var(--bs-body-bg)" width="58" height="583"
                                                        viewBox="0 0 58 583" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M0 583L9.66667 534.417C19.3333 485.833 38.6667 388.667 39.7407 291.5C40.8148 194.333 23.6296 97.1667 15.037 48.5833L6.44444 -1.62125e-05H58V48.5833C58 97.1667 58 194.333 58 291.5C58 388.667 58 485.833 58 534.417V583H0Z"
                                                            fill="currentColor" />
                                                    </svg>

                                                    <!--Testimonial image small device divider-->
                                                    <svg class="position-absolute bottom-0 start-0 mb-n1 d-lg-none"
                                                        width="100%" height="48" style="color:var(--bs-body-bg)" preserveAspectRatio="none"
                                                        viewBox="0 0 1200 64" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M0 0L100 10.6667C200 21.3333 400 42.6667 600 43.8519C800 45.037 1000 26.0741 1100 16.5926L1200 7.11111V64H1100C1000 64 800 64 600 64C400 64 200 64 100 64H0L0 0Z"
                                                            fill="currentColor" />
                                                    </svg>

                                                </div>
                                            </div>
                                            <div class="col-lg-6 mx-auto px-0">
                                                <blockquote class="blockquote text-center mb-0 px-4 py-5 py-lg-7">
                                                    <!--Testimonial Comapny Logo -->
                                                    <div class="width-10x mb-3 mb-lg-4 h-auto mx-auto">
                                                        <img class="img-invert" src="{{ URL::asset('assets/img/partners/expedia.svg') }}" alt="">
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
                                        <div
                                            class="d-flex align-items-center flex-column overflow-hidden flex-lg-row">
                                            <div class="col-lg-6 px-0 mb-4 mb-md-0">
                                                <div class="position-relative">
                                                    <!--testimonial Image-->
                                                    <img src="{{ URL::asset('assets/img/960x900/4.jpg') }}" class="img-fluid" alt="">

                                                    <!--Testimonial image divider-->
                                                    <svg class="position-absolute d-none d-lg-block flip-x end-0 top-0 h-100 me-n1"
                                                        preserveAspectRatio="none" style="color:var(--bs-body-bg)" width="58" height="583"
                                                        viewBox="0 0 58 583" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M0 583L9.66667 534.417C19.3333 485.833 38.6667 388.667 39.7407 291.5C40.8148 194.333 23.6296 97.1667 15.037 48.5833L6.44444 -1.62125e-05H58V48.5833C58 97.1667 58 194.333 58 291.5C58 388.667 58 485.833 58 534.417V583H0Z"
                                                            fill="currentColor" />
                                                    </svg>

                                                    <!--Testimonial image small device divider-->
                                                    <svg class="position-absolute bottom-0 start-0 mb-n1 d-lg-none"
                                                        width="100%" height="48" style="color:var(--bs-body-bg)" preserveAspectRatio="none"
                                                        viewBox="0 0 1200 64" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M0 0L100 10.6667C200 21.3333 400 42.6667 600 43.8519C800 45.037 1000 26.0741 1100 16.5926L1200 7.11111V64H1100C1000 64 800 64 600 64C400 64 200 64 100 64H0L0 0Z"
                                                            fill="currentColor" />
                                                    </svg>

                                                </div>
                                            </div>
                                            <div class="col-lg-6 mx-auto px-0">
                                                <blockquote class="blockquote text-center mb-0 px-4 py-5 py-lg-7">
                                                    <!--Testimonial Comapny Logo -->
                                                    <div class="width-10x img-invert mb-3 mb-lg-4 h-auto mx-auto"
                                                        style="color: #FF5A5F;">
                                                        <img src="{{ URL::asset('assets/img/partners/deliveroo.svg') }}" alt="">
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
                                    class="swiperAuto-button-next swiper-button-next position-relative ms-1 ms-0 end-0 me-3 width-4x height-4x hover-shadow hover-lift bg-body-secondary text-body">
                                </div>
                                <div
                                    class="swiperAuto-button-prev swiper-button-prev position-relative ms-0 start-0 width-4x height-4x hover-shadow hover-lift bg-body-secondary text-body p-0">
                                </div>

                            </div>
                            <!--end:Swiper navigation-->

                        </div>
                        <!--end:swiper slider-->
                    </div>
                </div>
            </section>
            <!--Begin:testimonials section-->


            <!--::Begin pricing section-->
            <section class="position-relative">
                <div class="container py-9 py-lg-11 position-relative">
                    <div class="row align-items-center">
                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="position-relative">
                                <!-- Plans--Switch -->
                                <div class="d-flex align-items-center mb-5" data-aos="fade-up" data-aos-delay="250">
                                    <div class="price-monthly fs-5 position-relative">
                                        <span>Annually <em
                                                class="small align-bottom font-serif fst-italic text-primary">save
                                                30%</em></span>
                                    </div>
                                    <!-- Switch -->
                                    <div class="form-check form-switch ms-3 me-1">
                                        <input class="form-check-input me-0" type="checkbox" id="planSwitch"
                                            data-as-toggle="price" data-as-target=".price" role="switch">
                                        <label class="form-check-label" for="planSwitch"></label>
                                    </div>
                                    <div class="price-monthly fs-5">
                                        <span> Monthly </span>
                                    </div>
                                </div>
                                <h2 class="display-4 mb-4" data-aos="fade-up" data-aos-delay="100">
                                    Simple pricing for you
                                </h2>
                                <p class="lead" data-aos="fade-up" data-aos-delay="150">
                                    We offer great prices, premium and quality products for your business
                                </p>
                                <p data-aos="fade-up" data-aos-delay="200">Enjoy a free 30-day trial and experience the
                                    full service, No credit card required</p>

                            </div>
                        </div>
                        <div class="col-md-7 ms-md-auto">

                            <div class="row align-items-center">
                                <div class="col-md-6 mb-5 mb-md-0" data-aos="fade-up" data-aos-delay="150">
                                    <div
                                        class="card rounded-4 card-body py-5 py-lg-6 px-4 overflow-hidden position-relative hover-lift hover-shadow-lg">
                                        <div class="position-relative mb-5 overflow-hidden">
                                            <h4>Basic</h4>
                                            <div class="d-flex align-items-center mb-2">
                                                <span class="d-block fs-4 me-1 fw-bold">USD$</span>
                                                <h2 class="price display-4" data-as-annual="6"
                                                    data-as-monthly="9">6
                                                </h2>
                                            </div>
                                            <span class="text-body-secondary">Monthly (Billed annually)</span>
                                        </div>
                                        <!--/.price-card-header-->

                                        <!--Action button-->
                                        <div class="flex mb-5">
                                            <div class="p-1 w-100 bg-gradient bg-secondary d-inline-block rounded-3 hover-shadow">
                                                <a href="{{ URL::asset('#!') }}" class="btn d-block w-100 btn-outline-white border-0 btn-hover-arrow btn-lg">
                                                    <span>Purchase</span>
                                                </a>
                                            </div>
                                        </div>
                                        <!--Features-->
                                        <ul class="list-unstyled mb-0">
                                            <li class="mb-4 d-flex flex-wrap align-items-center text-body-secondary">
                                                <i class="me-2 opacity-50 fs-5 bx bx-check-circle"></i>
                                                All components & pages
                                            </li>
                                            <li class="mb-4 d-flex flex-wrap align-items-center text-body-secondary">
                                                <i class="me-2 opacity-50 fs-5 bx bx-check-circle"></i>
                                                All premium plugins
                                            </li>
                                            <li class="mb-4 d-flex flex-wrap align-items-center text-body-secondary">
                                                <i class="me-2 opacity-50 fs-5 bx bx-check-circle"></i>
                                                All Components & Pages
                                            </li>
                                            <li class="mb-4 d-flex flex-wrap align-items-center text-body-secondary">
                                                <i class="me-2 opacity-50 fs-5 bx bx-check-circle"></i>
                                                5 Downloads per day
                                            </li>
                                            <li class="mb-4 d-flex flex-wrap align-items-center text-body-secondary">
                                                <i class="me-2 opacity-50 fs-5 bx bx-check-circle"></i>
                                                Custom layouts
                                            </li>
                                            <li class="mb-0 d-flex flex-wrap align-items-center text-body-tertiary">
                                                <i class="me-2 opacity-50 fs-5 bx bx-check-circle"></i>
                                               <span class="text-strikethrough"> Lifetime free updates</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <!--/.col-->
                                <div class="col-md-6" data-aos="fade-up" data-aos-delay="200">
                                    <div
                                        class="card rounded-4 z-1 shadow-lg card-body py-5 py-lg-6 px-4 overflow-hidden position-relative hover-lift hover-shadow-lg">

                                        <div class="position-relative overflow-hidden mb-5">
                                            <div class="mb-4 align-items-center">

                                                <span class="badge py-2 px-3 rounded-pill bg-warning small mb-3">
                                                    Most popular</span>
                                                <h4 class="mb-0">Freelancer</h4>
                                                <div>
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-center mb-2">
                                                <span class="fs-4 me-1 fw-bold">USD$</span>
                                                <h5 class="price text-center display-4" data-as-annual="19"
                                                    data-as-monthly="29">19
                                                </h5>
                                            </div>
                                            <span class="text-body-secondary">Monthly (Billed annually)</span>
                                        </div>
                                        <!--/.price-card-header-->

                                        <!--Action button-->
                                        <div class="grid mb-5">
                                            <div class="p-1 w-100 bg-gradient-primary d-inline-block rounded-3 hover-shadow">
                                                <a href="{{ URL::asset('#!') }}" class="btn d-block w-100 btn-outline-white border-0 btn-hover-arrow btn-lg">
                                                    <span>Purchase</span>
                                                </a>
                                            </div>
                                        </div>
                                        <!--Features-->
                                        <ul class="list-unstyled mb-0">
                                            <li class="mb-4 d-flex flex-wrap align-items-center text-body-secondary">
                                                <i class="me-2 opacity-50 fs-5 bx bx-check-circle"></i>
                                                All components & pages
                                            </li>
                                            <li class="mb-4 d-flex flex-wrap align-items-center text-body-secondary">
                                                <i class="me-2 opacity-50 fs-5 bx bx-check-circle"></i>
                                                All premium plugins
                                            </li>
                                            <li class="mb-4 d-flex flex-wrap align-items-center text-body-secondary">
                                                <i class="me-2 opacity-50 fs-5 bx bx-check-circle"></i>
                                                All Components & Pages
                                            </li>
                                            <li class="mb-4 d-flex flex-wrap align-items-center text-body-secondary">
                                                <i class="me-2 opacity-50 fs-5 bx bx-check-circle"></i>
                                                5 Downloads per day
                                            </li>
                                            <li class="mb-4 d-flex flex-wrap align-items-center text-body-secondary">
                                                <i class="me-2 opacity-50 fs-5 bx bx-check-circle"></i>
                                                Custom layouts
                                            </li>
                                            <li class="mb-0 d-flex flex-wrap align-items-center text-body-secondary">
                                                <i class="me-2 opacity-50 fs-5 bx bx-check-circle"></i>
                                                Lifetime free updates
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <!--/.col-->
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--::/End pricing section-->

            <!--begin:Blog section-->
            <section class="position-relative overflow-hidden bg-gradient-blur">
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
                            <a href="{{ URL::asset('#!') }}" class="btn btn-white btn-hover-arrow hover-lift">
                                <span>Our Blog</span>
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 mb-4 mb-lg-0" data-aos="fade-up">
                            <article class="card card-hover border-0 rounded-3 shadow hover-shadow-lg overflow-hidden">
                                <div class="overflow-hidden position-relative">

                                    <!--Article image-->
                                    <img src="{{ URL::asset('assets/img/960x640/1.jpg') }}" alt="" class="img-fluid img-zoom">

                                    <!--Article image divider-->
                                    <svg style="color: var(--bs-body-bg);" class="position-absolute start-0 bottom-0 mb-n1"
                                        preserveAspectRatio="none" width="100%" height="48" viewBox="0 0 1460 120"
                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M122 22.8261L0 0V120H1460V0L1338 22.8261C1217 44.1304 973 88.2609 730 88.2609C487 88.2609 243 44.1304 122 22.8261Z"
                                            fill="currentColor"></path>
                                    </svg>
                                </div>
                                <!--Content-body-->
                                <div class="card-body pb-5 position-relative">
                                    <small class="text-body-secondary"><i class="bx bx-calendar-alt me-1"></i> 12 Dec
                                        2023</small>
                                    <h5 class="py-3 mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit</h5>
                                    <p class="mb-0 text-truncate text-body-secondary">
                                        Lorem ipsum dolor sit amet sed do eiusmod tempor labore et dolore magna aliqua.
                                        Viverra nam libero justo laoreet.
                                    </p>
                                </div>

                                <!--Article link-->
                                <a href="{{ URL::asset('#!') }}" class="stretched-link"></a>
                            </article>
                        </div>
                        <div class="col-lg-4 mb-4 mb-lg-0" data-aos="fade-up">
                            <article class="card card-hover border-0 rounded-3 shadow hover-shadow-lg overflow-hidden">
                                <div class="overflow-hidden position-relative">

                                    <!--Article image-->
                                    <img src="{{ URL::asset('assets/img/960x640/2.jpg') }}" alt="" class="img-fluid img-zoom">

                                    <!--Article image divider-->
                                    <svg class="position-absolute start-0 bottom-0 mb-n1" style="color: var(--bs-body-bg);"
                                        preserveAspectRatio="none" width="100%" height="48" viewBox="0 0 1460 120"
                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M122 22.8261L0 0V120H1460V0L1338 22.8261C1217 44.1304 973 88.2609 730 88.2609C487 88.2609 243 44.1304 122 22.8261Z"
                                            fill="currentColor"></path>
                                    </svg>
                                </div>
                                <!--Article text-->
                                <div class="card-body pb-5 position-relative">
                                    <small class="text-body-secondary"><i class="bx bx-calendar-alt me-1"></i> 06 Nov
                                        2023</small>
                                    <h5 class="py-3 mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit</h5>
                                    <p class="mb-0 text-truncate text-body-secondary">
                                        Lorem ipsum dolor sit amet sed do eiusmod tempor labore et dolore magna aliqua.
                                        Viverra nam libero justo laoreet.
                                    </p>
                                </div>

                                <!--Article link-->
                                <a href="{{ URL::asset('#!') }}" class="stretched-link"></a>
                            </article>
                        </div>
                        <div class="col-lg-4" data-aos="fade-up">
                            <article class="card card-hover border-0 rounded-3 shadow hover-shadow-lg overflow-hidden">
                                <div class="overflow-hidden position-relative">

                                    <!--Article image-->
                                    <img src="{{ URL::asset('assets/img/960x640/3.jpg') }}" alt="" class="img-fluid img-zoom">

                                    <!--Article image divider-->
                                    <svg class="position-absolute mb-n1 start-0 bottom-0" style="color: var(--bs-body-bg);"
                                        preserveAspectRatio="none" width="100%" height="48" viewBox="0 0 1460 120"
                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M122 22.8261L0 0V120H1460V0L1338 22.8261C1217 44.1304 973 88.2609 730 88.2609C487 88.2609 243 44.1304 122 22.8261Z"
                                            fill="currentColor"></path>
                                    </svg>
                                </div>

                                <!--Article text-->
                                <div class="card-body pb-5 position-relative">
                                    <small class="text-body-secondary"><i class="bx bx-calendar-alt me-1"></i> 29 Oct
                                        2023</small>
                                    <h5 class="py-3 mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit</h5>
                                    <p class="mb-0 text-truncate text-body-secondary">
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

            <!--begin:Call to action section-->
            <section class="position-relative bg-body-tertiary overflow-hidden">

                <div class="container py-9 py-lg-11 position-relative">
                    <div class="row pb-7 position-relative align-items-center">
                        
                        <div class="col-12 mb-7 mb-md-0 col-md-7 me-auto">
                            <h2 class="mb-4 fw-light display-5" data-aos="fade-down">
                                Bring <span class="fw-bolder">Assan Template</span> to life and start building today
                            </h2>
                            <p class="mb-5" data-aos="zoom-in" data-aos-delay="100">
                                There are combined alignment methods – when several types of alignment together are
                                used in one composition
                            </p>
                            <div data-aos="fade-up" data-aos-delay="150">
                                <div class="p-1 bg-gradient-primary d-inline-block rounded-3 hover-shadow">
                                    <a href="{{ URL::asset('#!') }}" class="btn btn-outline-white border-0 btn-hover-arrow btn-lg">
                                        <span>Purchase Now</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5 col-lg-4 mb-4 mb-md-0" data-aos="fade-right" data-aos-delay="100">
                            <img src="{{ URL::asset('assets/img/graphics/illustration/05.svg') }}" class="img-fluid flip-x" alt="">
                        </div>
                    </div>
                </div>

                        <!--begin:divider-->
        <svg class="position-absolute start-0 bottom-0 flip-y" style="color: var(--bs-black);" width="100%" height="36"
        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 152" fill="none" preserveAspectRatio="none">
        <path
            d="M126.597 138.74C99.8867 127.36 76.6479 109.164 59.2161 85.9798L0 3.05176e-05L1440 0C1440 0 1419.98 25.8404 1380.15 32.9584L211.382 150.811C182.549 154.283 153.308 150.12 126.597 138.74Z"
            fill="currentColor" />
    </svg>
    <!--end:divider-->
            </section>
            <!--end:Call to action section-->

</x-assan-layout>
