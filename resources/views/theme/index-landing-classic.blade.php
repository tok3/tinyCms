<x-assan-layout  layout-type="{{$layoutType}}">




    <section class="bg-dark text-white position-relative overflow-hidden">
        <!--begin:Video-bg-->
        <div class="w-100 h-100 opacity-25 position-absolute end-0 top-0 bg-cover bg-no-repeat bg-center"
             style="background-image: {{ URL::asset('assets/videos/officeloop-cover.jpg') }};">
            <div class="jarallax h-100 w-100" data-video-src="{{ URL::asset('mp4:./assets/videos/officeloop.mp4') }}">
            </div>
        </div>
        <!--end:Video-bg-->

        <!--begin:container-->
        <div class="container pt-12 pb-12 position-relative z-1">
            <div class="row pt-lg-9 pb-lg-5 align-items-center">
                <div class="col-lg-8 mx-auto text-center mb-5 mb-lg-0">
                    <!--begin:swiper text-slider-->
                    <div
                        class="swiper-container swiper-text w-100 height-3x fs-5 fw-bold text-uppercase mb-3 text-white overflow-hidden">
                        <!--begin:Slider wrapper-->
                        <div class="swiper-wrapper text-warning">
                            <!--Slide item-->
                            <div class="swiper-slide justify-content-center">
                                Design anything
                            </div>
                            <!--Slide item-->
                            <div class="swiper-slide justify-content-center">
                                Built for developers
                            </div>
                            <!--Slide item-->
                            <div class="swiper-slide justify-content-center">
                                Built for everyone
                            </div>
                            <!--Slide item-->
                            <div class="swiper-slide justify-content-center">
                                Mobile friendly
                            </div>
                            <!--Slide item-->
                            <div class="swiper-slide justify-content-center">
                                Best selling theme
                            </div>
                        </div>
                        <!--end:Slider wrapper-->

                    </div>
                    <!--end:swiper text-slider-->

                    <!--Hero title-->
                    <h1 class="display-3 mb-4 mb-lg-5">
                        We build <span class="text-gradient-light">cutting edge</span> websites
                    </h1>

                    <!--Hero description-->
                    <p class="mb-5 mb-lg-7 lead w-lg-60 mx-auto">
                        Lorem ipsum is placeholder text commonly used in the graphic, print industries.
                    </p>

                    <!--Hero action button-->
                    <div class="d-flex align-items-center justify-content-center">
                        <a href="{{ URL::asset('#section') }}" class="btn btn-primary btn-lg me-2 me-lg-3">Get started</a>
                    </div>
                </div>
            </div>
        </div>
        <!--end:container-->

        <!--begin:Divider shape-->
        <svg class="position-absolute start-0 bottom-0 mb-n1" style="color:var(--bs-body-bg)" preserveAspectRatio="none" width="100%"
             height="80" viewBox="0 0 1460 120" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path
                d="M122 22.8261L0 0V120H1460V0L1338 22.8261C1217 44.1304 973 88.2609 730 88.2609C487 88.2609 243 44.1304 122 22.8261Z"
                fill="currentColor"></path>
        </svg>
        <!--end:Divider shape-->
    </section>
    <!--/section-->
    <section class="position-relative" id="section">
        <div class="container py-9 py-lg-11 position-relative">
            <div class="row justify-content-between align-items-center">
                <div class="col-lg-6 col-xl-5 order-lg-last mb-7 mb-lg-0">
                    <!--Heading-->
                    <h2 class="position-relative mb-5 display-6" data-aos="fade-up">
                        We believe in <span class="text-gradient">timeless</span> authentic design
                    </h2>
                    <!--text-->
                    <p class="mb-0 lead" data-aos="fade-up" data-aos-delay="100">
                        Lorem ipsum dolor sit amet, eiusmod tempor quis nostrud
                        exercitation ullamco commodo consequat.
                    </p>
                </div>
                <div class="col-lg-6 col-xl-5 order-lg-1">
                    <div class="row justify-content-center">
                        <div class="col-md-6 text-center mb-5" data-aos="fade-up">
                            <!--Numbers card-->
                            <div class="position-relative pb-2 rounded-4 overflow-hidden bg-body">
                                <!--Numbers card bg-->
                                <div
                                    class="position-absolute start-50 translate-middle-x bottom-0 bg-primary rounded-4 w-75 h-75">
                                </div>
                                <div class="position-relative bg-body-tertiary p-4 rounded-4">
                                    <h2 class="display-6" data-aos
                                        data-countup='{"startVal":0,"suffix":"+","duration":"5"}' data-to="6750"
                                        data-aos-id="countup:in">0</h2>
                                    <h6 class="mb-0">Copies sold</h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 text-center mb-5" data-aos="fade-up" data-aos-delay="100">
                            <!--Numbers card-->
                            <div class="position-relative pb-2 rounded-4 overflow-hidden bg-body">
                                <!--Numbers card bg-->
                                <div
                                    class="position-absolute start-50 translate-middle-x bottom-0 bg-danger rounded-4 w-75 h-75">
                                </div>
                                <div class="position-relative bg-body-tertiary p-4 rounded-4">
                                    <h2 class="display-6" data-aos
                                        data-countup='{"startVal":0,"suffix":"+","duration":"5"}' data-to="500"
                                        data-aos-id="countup:in">0</h2>
                                    <h6 class="mb-0">Ui elements</h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-5 mb-md-0 text-center" data-aos="fade-up" data-aos-delay="150">
                            <!--Numbers card-->
                            <div class="position-relative pb-2 rounded-4 overflow-hidden bg-body">
                                <!--Numbers card bg-->
                                <div
                                    class="position-absolute start-50 translate-middle-x bottom-0 bg-warning rounded-4 w-75 h-75">
                                </div>
                                <div class="position-relative bg-body-tertiary p-4 rounded-4">
                                    <h2 class="display-6" data-aos
                                        data-countup='{"startVal":0,"suffix":"+","duration":"5"}' data-to="250"
                                        data-aos-id="countup:in">0</h2>
                                    <h6 class="mb-0">Valid layouts</h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 text-center" data-aos="fade-up">
                            <!--Numbers card-->
                            <div class="position-relative pb-2 rounded-4 overflow-hidden bg-body"
                                 data-aos-delay="200">
                                <!--Numbers card bg-->
                                <div
                                    class="position-absolute start-50 translate-middle-x bottom-0 bg-success rounded-4 w-75 h-75">
                                </div>
                                <div class="position-relative bg-body-tertiary p-4 rounded-4">
                                    <h2 class="display-6" data-aos
                                        data-countup='{"startVal":0,"suffix":"+","duration":"5"}' data-to="15"
                                        data-aos-id="countup:in">0</h2>
                                    <h6 class="mb-0">Pre-built demos</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!--begin:feature image section-->
    <section class="position-relative">
        <div class="container position-relative py-9 py-lg-11">
            <div class="row justify-content-between align-items-center">
                <div class="col-lg-6 mb-5 mb-lg-0 order-lg-last" data-aos="fade-up" data-aos-delay="50">
                    <div class="position-relative p-2">
                        <!--background-parallax-shape-->
                        <div class="rellax bg-warning width-9x height-9x rounded-circle position-absolute end-0 top-0"
                             data-rellax-percentage="0.95" data-rellax-speed="2"></div>
                        <!--background-parallax-shape-->
                        <div class="rellax bg-danger width-5x height-5x rounded-circle position-absolute bottom-0 mb-5 start-0"
                             data-rellax-percentage="0.1" data-rellax-speed="-1"></div>

                        <!--Shape Image with mask-->
                        <div class="bg-mask">
                            <img src="{{ URL::asset('assets/img/960x900/4.jpg') }}" class="mask-squircle mask-image" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 order-lg-1 position-relative" data-aos="fade-up" data-aos-delay="100">
                    <!--Heading-->
                    <h2 class="mb-4 display-6">Build your <span class="text-gradient">unique</span>
                        online presence</h2>

                    <!--Text-->
                    <p class="mb-5">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                        incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                        exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                    </p>
                    <!--Feature-card-->
                    <div class="d-flex mb-4">
                        <div class="me-3 mt-1">
                            <i class="bx bx-check-circle fs-4"></i>
                        </div>
                        <div>
                            <p class="mb-0">
                                Viverra nam libero justo laoreet uscipit adipiscing bibendum est ultricies
                                integer.
                            </p>
                        </div>
                    </div>
                    <!--Feature-card-->
                    <div class="d-flex">
                        <div class="me-3 mt-1">
                            <i class="bx bx-check-circle fs-4"></i>
                        </div>
                        <div>
                            <p class="mb-0">
                                Viverra nam libero justo laoreet uscipit adipiscing bibendum est ultricies
                                integer.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--end:feature image section-->

    <!--begin:projects section-->
    <section class="position-relative bg-body-tertiary">
        <div class="container py-9 py-lg-11 position-relative z-1">
            <div class="d-lg-flex text-center text-lg-start mb-lg-5">
                <!--section-title-->
                <h2 class="mb-4 display-6">Latest <span class="text-gradient">Projects</span>
                </h2>
                <!-- Nav -->
                <ul
                    class="mb-5 mx-auto ms-lg-auto mb-lg-0 nav nav-filter align-items-center justify-content-center justify-content-lg-end me-lg-0">
                    <li class="nav-item small text-body-secondary d-flex me-2 me-md-4">Filter by:</li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ URL::asset('#') }}" data-bs-toggle="pill" data-filter="*"
                           data-bs-target="#projects">
                            Projects
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link small" href="{{ URL::asset('#') }}" data-bs-toggle="pill" data-filter=".bootstrap"
                           data-bs-target="#bootstrap">
                            Bootstrap
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ URL::asset('#') }}" data-bs-toggle="pill" data-filter=".javascript"
                           data-bs-target="#javascript">
                            JS
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ URL::asset('#') }}" data-bs-toggle="pill" data-filter=".figma"
                           data-bs-target="#figma">
                            Figma
                        </a>
                    </li>
                </ul>
            </div>

            <div id="projects" data-isotope='{"layoutMode": "masonry"}' class="row">

                <div class="col-md-6 col-lg-4 mb-4 bootstrap grid-item">
                    <!--begin:Project card-->
                    <div class="card-hover">
                        <div class="overflow-hidden js-mouseover position-relative mb-4 rounded-4">
                            <img src="{{ URL::asset('assets/img/projects/1.jpg') }}" alt="" class="img-zoom img-fluid rounded-4">
                            <a href="{{ URL::asset('#!') }}" class="link-mouseover position-absolute start-0 top-0 flex-center text-dark bg-white rounded-pill">
                                <i class="bx bx-link-external fs-4"></i>
                            </a>
                        </div>
                        <h5 class="mb-1">Sed quia non numquam</h5>
                        <span class="text-body-secondary">UI / UX</span>
                    </div>
                    <!--end:Project card-->
                </div>
                <div class="col-md-6 col-lg-4 mb-4 figma grid-item">
                    <!--begin:Project card-->
                    <div class="card-hover">
                        <div class="overflow-hidden js-mouseover position-relative mb-4 rounded-4">
                            <img src="{{ URL::asset('assets/img/projects/2.jpg') }}" alt="" class="img-zoom img-fluid rounded-4">
                            <a href="{{ URL::asset('#!') }}" class="link-mouseover position-absolute start-0 top-0 flex-center text-dark bg-white rounded-pill">
                                <i class="bx bx-link-external fs-4"></i>
                            </a>
                        </div>
                        <h5 class="mb-1">Ogólnie znana teza</h5>
                        <span class="text-body-secondary">Javascript</span>
                    </div>
                    <!--end:Project card-->
                </div>
                <div class="col-md-6 col-lg-4 mb-4 bootstrap grid-item">
                    <!--begin:Project card-->
                    <div class="card-hover">
                        <div class="overflow-hidden js-mouseover position-relative mb-4 rounded-4">
                            <img src="{{ URL::asset('assets/img/projects/3.jpg') }}" alt="" class="img-zoom img-fluid rounded-4">
                            <a href="{{ URL::asset('#!') }}" class="link-mouseover position-absolute start-0 top-0 flex-center text-dark bg-white rounded-pill">
                                <i class="bx bx-link-external fs-4"></i>
                            </a>
                        </div>
                        <h5 class="mb-1">El punto de</h5>
                        <span class="text-body-secondary">Business, Marketing</span>
                    </div>
                    <!--end:Project card-->
                </div>
                <div class="col-md-6 col-lg-4 mb-4 mb-md-0 figma grid-item">
                    <!--begin:Project card-->
                    <div class="card-hover">
                        <div class="overflow-hidden js-mouseover position-relative mb-4 rounded-4">
                            <img src="{{ URL::asset('assets/img/projects/4.jpg') }}" alt="" class="img-zoom img-fluid rounded-4">
                            <a href="{{ URL::asset('#!') }}" class="link-mouseover position-absolute start-0 top-0 flex-center text-dark bg-white rounded-pill">
                                <i class="bx bx-link-external fs-4"></i>
                            </a>
                        </div>
                        <h5 class="mb-1">Sed quia non numquam</h5>
                        <span class="text-body-secondary">UI / UX</span>
                    </div>
                    <!--end:Project card-->
                </div>
                <div class="col-md-6 col-lg-4 mb-4 mb-md-0 bootstrap grid-item">
                    <!--begin:Project card-->
                    <div class="card-hover">
                        <div class="overflow-hidden js-mouseover position-relative mb-4 rounded-4">
                            <img src="{{ URL::asset('assets/img/projects/5.jpg') }}" alt="" class="img-zoom img-fluid rounded-4">
                            <a href="{{ URL::asset('#!') }}" class="link-mouseover position-absolute start-0 top-0 flex-center text-dark bg-white rounded-pill">
                                <i class="bx bx-link-external fs-4"></i>
                            </a>
                        </div>
                        <h5 class="mb-1">Excepteur sint occaecat</h5>
                        <span class="text-body-secondary">Product Design</span>
                    </div>
                    <!--end:Project card-->
                </div>
                <div class="col-md-6 col-lg-4 javascript grid-item">
                    <!--begin:Project card-->
                    <div class="card-hover">
                        <div class="overflow-hidden js-mouseover position-relative mb-4 rounded-4">
                            <img src="{{ URL::asset('assets/img/projects/6.jpg') }}" alt="" class="img-zoom img-fluid rounded-4">
                            <a href="{{ URL::asset('#!') }}" class="link-mouseover position-absolute start-0 top-0 flex-center text-dark bg-white rounded-pill">
                                <i class="bx bx-link-external fs-4"></i>
                            </a>
                        </div>
                        <h5 class="mb-1">Sed quia non numquam</h5>
                        <span class="text-body-secondary">UI / UX</span>
                    </div>
                    <!--end:Project card-->
                </div>
            </div>
        </div>
    </section>
    <!--end:projects section-->

    <!--begin:feature icons section-->
    <section class="overflow-hidden bg-body position-relative">
        <div class="container position-relative py-9 py-lg-11">
            <h2 class="display-6 text-center mb-5">Our <span class="text-gradient">Benefits</span></h2>
            <!--feature icons row-->
            <div class="row justify-content-center">
                <div class="col-md-6 text-center mb-4" data-aos="fade-up" data-aos-delay="50">
                    <!--Icon card-->
                    <div class="card card-body py-5 px-4 border-0 shadow-lg hover-lift hover-shadow-xl">
                        <!--Feature icon-->
                        <div class="mb-4 mx-auto width-10x height-10x flex-center position-relative">
                            <!--Icon bg-->
                            <svg class="position-absolute text-primary start-0 top-0 w-100 h-100"
                                 preserveAspectRatio="none" width="120" height="120" viewBox="0 0 120 120"
                                 fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M55.4078 1.90215C58.3481 0.684225 61.6519 0.684225 64.5922 1.90215L97.8342 15.6714C100.775 16.8894 103.111 19.2255 104.329 22.1658L118.098 55.4078C119.316 58.3481 119.316 61.6519 118.098 64.5922L104.329 97.8342C103.111 100.775 100.775 103.111 97.8342 104.329L64.5922 118.098C61.6519 119.316 58.3481 119.316 55.4078 118.098L22.1658 104.329C19.2255 103.111 16.8894 100.775 15.6714 97.8342L1.90215 64.5922C0.684225 61.6519 0.684225 58.3481 1.90215 55.4078L15.6714 22.1658C16.8894 19.2255 19.2255 16.8894 22.1658 15.6714L55.4078 1.90215Z"
                                    fill="currentColor" />
                            </svg>
                            <!--Icon-->
                            <i class="icon-Idea-3 fs-1 text-white position-relative"></i>
                        </div>
                        <div class="d-flex align-items-center mb-3 justify-content-center">
                            <h5 class="mb-0">Creative & elegant</h5>
                        </div>
                        <p class="mb-0 w-lg-75 mx-auto">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                            incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 text-center mb-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="card card-body py-5 px-4 border-0 shadow-lg hover-lift hover-shadow-xl">
                        <!--Feature icon-->
                        <div class="mb-4 mx-auto width-10x height-10x flex-center position-relative">
                            <!--Icon bg-->
                            <svg class="position-absolute text-primary start-0 top-0 w-100 h-100"
                                 preserveAspectRatio="none" width="120" height="120" viewBox="0 0 120 120"
                                 fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M55.4078 1.90215C58.3481 0.684225 61.6519 0.684225 64.5922 1.90215L97.8342 15.6714C100.775 16.8894 103.111 19.2255 104.329 22.1658L118.098 55.4078C119.316 58.3481 119.316 61.6519 118.098 64.5922L104.329 97.8342C103.111 100.775 100.775 103.111 97.8342 104.329L64.5922 118.098C61.6519 119.316 58.3481 119.316 55.4078 118.098L22.1658 104.329C19.2255 103.111 16.8894 100.775 15.6714 97.8342L1.90215 64.5922C0.684225 61.6519 0.684225 58.3481 1.90215 55.4078L15.6714 22.1658C16.8894 19.2255 19.2255 16.8894 22.1658 15.6714L55.4078 1.90215Z"
                                    fill="currentColor" />
                            </svg>
                            <!--Icon-->
                            <i class="icon-Code-Window text-white fs-2 position-relative"></i>
                        </div>

                        <!--Feature Text-->
                        <div class="d-flex align-items-center mb-3 justify-content-center">
                            <h5 class="mb-0">Reusable components</h5>
                        </div>
                        <p class="mb-0 w-lg-75 mx-auto">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                            incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 text-center mb-4" data-aos="fade-up" data-aos-delay="150">

                    <div class="card card-body py-5 px-4 border-0 shadow-lg hover-lift hover-shadow-xl">
                        <!--Feature icon-->
                        <div class="mb-4 mx-auto width-10x height-10x flex-center position-relative">
                            <!--Icon bg-->
                            <svg class="position-absolute text-primary start-0 top-0 w-100 h-100"
                                 preserveAspectRatio="none" width="120" height="120" viewBox="0 0 120 120"
                                 fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M55.4078 1.90215C58.3481 0.684225 61.6519 0.684225 64.5922 1.90215L97.8342 15.6714C100.775 16.8894 103.111 19.2255 104.329 22.1658L118.098 55.4078C119.316 58.3481 119.316 61.6519 118.098 64.5922L104.329 97.8342C103.111 100.775 100.775 103.111 97.8342 104.329L64.5922 118.098C61.6519 119.316 58.3481 119.316 55.4078 118.098L22.1658 104.329C19.2255 103.111 16.8894 100.775 15.6714 97.8342L1.90215 64.5922C0.684225 61.6519 0.684225 58.3481 1.90215 55.4078L15.6714 22.1658C16.8894 19.2255 19.2255 16.8894 22.1658 15.6714L55.4078 1.90215Z"
                                    fill="currentColor" />
                            </svg>
                            <!--Icon-->
                            <i class="icon-Layer-Forward text-white fs-1 position-relative"></i>
                        </div>

                        <!--Feature Text-->
                        <div class="d-flex align-items-center mb-3 justify-content-center">
                            <h5 class="mb-0">Unlimited features</h5>
                        </div>
                        <p class="mb-0 w-lg-75 mx-auto">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                            incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 text-center mb-4" data-aos="fade-up" data-aos-delay="200">

                    <div class="card card-body py-5 px-4 border-0 shadow-lg hover-lift hover-shadow-xl">
                        <!--Feature icon-->
                        <div class="mb-4 mx-auto width-10x height-10x flex-center position-relative">
                            <!--Icon bg-->
                            <svg class="position-absolute text-primary start-0 top-0 w-100 h-100"
                                 preserveAspectRatio="none" width="120" height="120" viewBox="0 0 120 120"
                                 fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M55.4078 1.90215C58.3481 0.684225 61.6519 0.684225 64.5922 1.90215L97.8342 15.6714C100.775 16.8894 103.111 19.2255 104.329 22.1658L118.098 55.4078C119.316 58.3481 119.316 61.6519 118.098 64.5922L104.329 97.8342C103.111 100.775 100.775 103.111 97.8342 104.329L64.5922 118.098C61.6519 119.316 58.3481 119.316 55.4078 118.098L22.1658 104.329C19.2255 103.111 16.8894 100.775 15.6714 97.8342L1.90215 64.5922C0.684225 61.6519 0.684225 58.3481 1.90215 55.4078L15.6714 22.1658C16.8894 19.2255 19.2255 16.8894 22.1658 15.6714L55.4078 1.90215Z"
                                    fill="currentColor" />
                            </svg>
                            <!--Icon-->
                            <i class="icon-Coffee-toGo text-white fs-1 position-relative"></i>
                        </div>

                        <!--Feature Text-->
                        <div class="d-flex align-items-center mb-3 justify-content-center">
                            <h5 class="mb-0">Modern build tools</h5>
                        </div>
                        <p class="mb-0 w-lg-75 mx-auto">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                            incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 text-center mb-4 mb-md-0" data-aos="fade-up" data-aos-delay="250">

                    <div class="card card-body py-5 px-4 border-0 shadow-lg hover-lift hover-shadow-xl">
                        <!--Feature icon-->
                        <div class="mb-4 mx-auto width-10x height-10x flex-center position-relative">
                            <!--Icon bg-->
                            <svg class="position-absolute text-primary start-0 top-0 w-100 h-100"
                                 preserveAspectRatio="none" width="120" height="120" viewBox="0 0 120 120"
                                 fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M55.4078 1.90215C58.3481 0.684225 61.6519 0.684225 64.5922 1.90215L97.8342 15.6714C100.775 16.8894 103.111 19.2255 104.329 22.1658L118.098 55.4078C119.316 58.3481 119.316 61.6519 118.098 64.5922L104.329 97.8342C103.111 100.775 100.775 103.111 97.8342 104.329L64.5922 118.098C61.6519 119.316 58.3481 119.316 55.4078 118.098L22.1658 104.329C19.2255 103.111 16.8894 100.775 15.6714 97.8342L1.90215 64.5922C0.684225 61.6519 0.684225 58.3481 1.90215 55.4078L15.6714 22.1658C16.8894 19.2255 19.2255 16.8894 22.1658 15.6714L55.4078 1.90215Z"
                                    fill="currentColor" />
                            </svg>
                            <!--Icon-->
                            <i class="icon-Consulting fs-1 text-white position-relative"></i>
                        </div>

                        <!--Feature Text-->
                        <div class="d-flex align-items-center mb-3 justify-content-center">
                            <h5 class="mb-0">Instant support</h5>
                        </div>
                        <p class="mb-0 w-lg-75 mx-auto">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                            incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.
                        </p>
                    </div>
                </div>
                <div class="col-md-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="card card-body py-5 px-4 border-0 shadow-lg hover-lift hover-shadow-xl">

                        <!--Feature icon-->
                        <div class="mb-4 mx-auto width-10x height-10x flex-center position-relative">
                            <!--Icon bg-->
                            <svg class="position-absolute text-primary start-0 top-0 w-100 h-100"
                                 preserveAspectRatio="none" width="120" height="120" viewBox="0 0 120 120"
                                 fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M55.4078 1.90215C58.3481 0.684225 61.6519 0.684225 64.5922 1.90215L97.8342 15.6714C100.775 16.8894 103.111 19.2255 104.329 22.1658L118.098 55.4078C119.316 58.3481 119.316 61.6519 118.098 64.5922L104.329 97.8342C103.111 100.775 100.775 103.111 97.8342 104.329L64.5922 118.098C61.6519 119.316 58.3481 119.316 55.4078 118.098L22.1658 104.329C19.2255 103.111 16.8894 100.775 15.6714 97.8342L1.90215 64.5922C0.684225 61.6519 0.684225 58.3481 1.90215 55.4078L15.6714 22.1658C16.8894 19.2255 19.2255 16.8894 22.1658 15.6714L55.4078 1.90215Z"
                                    fill="currentColor" />
                            </svg>
                            <!--Icon-->
                            <i class="icon-Coding fs-1 text-white position-relative"></i>
                        </div>

                        <!--Feature Text-->
                        <div class="d-flex align-items-center mb-3 justify-content-center">
                            <h5 class="mb-0">Valid code</h5>
                        </div>
                        <p class="mb-0 w-lg-75 mx-auto">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                            incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.
                        </p>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!--begin:feature icons section-->

    <!--begin:customer stories section-->
    <section class="position-relative overflow-hidden">
        <!--Background half-->
        <div class="position-absolute start-0 top-0 w-100 h-50 bg-body-tertiary"></div>
        <div class="container position-relative py-9 py-lg-11">
            <div class="row mb-3 mb-md-5 align-items-end">
                <div class="col-md-7 mb-5 mb-md-0">
                    <!--Title-->
                    <h2 class="mb-0 display-6"><span class="text-gradient">Customer</span> Stories</h2>
                </div>
                <div class="col-md-5">
                    <div class="d-flex align-items-center justify-content-md-end">
                        <!--Swiper Navigation-->
                        <div
                            class="swiper-button-prev swiperAuto-button-prev me-2 bg-body text-body position-relative start-0">
                        </div>
                        <div
                            class="swiper-button-next swiperAuto-button-next bg-body text-body position-relative end-0">
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-container swiper-testimonials overflow-visible">
                <div class="swiper-wrapper">

                    <!--Slider item-->
                    <div class="swiper-slide">
                        <div class="row">
                            <div class="col-lg-12">
                                <div
                                    class="card rounded-top-start-0 rounded-bottom-end-0 rounded-block shadow-lg flex-md-row flex-column overflow-hidden border-0 bg-body">
                                    <div class="col-md-4">
                                        <div
                                            class="d-flex flex-column border-end-md p-5 align-items-center justify-content-center h-100 bg-success">
                                            <img src="{{ URL::asset('assets/img/partners/dark/deliveroo.svg') }}" alt=""
                                                 class="height-5x w-auto img-invert">
                                        </div>
                                    </div>
                                    <div class="card-body h-100 p-4 py-5 py-md-7 px-md-5 flex-grow-1">
                                        <div class="d-md-flex align-items-md-center">
                                            <div class="ms-md-n9">
                                                <img src="{{ URL::asset('assets/img/avatar/1.jpg') }}" alt=""
                                                     class="avatar lg p-1 bg-body shadow-lg rounded-circle mb-4">
                                            </div>
                                            <div class="ps-md-6 px-lg-10 px-xl-12">
                                                <p class="fs-4 font-serif mb-4">
                                                    “ Loved working with the beautiful theme. Everything clean
                                                    and professional,
                                                    also very helpful throughout the customisation. Looking
                                                    forward to buy more
                                                    license of Assan again in the future.”
                                                </p>
                                                <div class="mb-5">
                                                    <h5 class="mb-2">Anastasia</h5>
                                                    <small class="d-block lh-1 text-body-secondary"> at Deliveroo</small>
                                                </div>
                                                <a href="{{ URL::asset('#') }}"
                                                   class="btn btn-secondary rounded-pill btn-hover-arrow">
                                                    <span>Read full story</span>

                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--Slider item-->
                    <div class="swiper-slide">
                        <div class="row">
                            <div class="col-lg-12">
                                <div
                                    class="card rounded-top-start-0 rounded-bottom-end-0 rounded-block shadow-lg flex-md-row flex-column overflow-hidden border-0 bg-body">
                                    <div class="col-md-4">
                                        <div
                                            class="d-flex flex-column border-end-md p-5 align-items-center justify-content-center h-100 bg-secondary-subtle">
                                            <img src="{{ URL::asset('assets/img/partners/postmates.svg') }}" alt=""
                                                 class="height-5x w-auto img-invert">
                                        </div>
                                    </div>
                                    <div class="card-body h-100 p-4 py-5 py-md-7 px-md-5 flex-grow-1">
                                        <div class="d-md-flex align-items-md-center">
                                            <div class="ms-md-n9">
                                                <img src="{{ URL::asset('assets/img/avatar/2.jpg') }}" alt=""
                                                     class="avatar lg p-1 bg-body shadow-lg rounded-circle mb-4">
                                            </div>
                                            <div class="ps-md-6 px-lg-10 px-xl-12">
                                                <p class="fs-4 font-serif mb-4">
                                                    “ Loved working with the beautiful theme. Everything clean
                                                    and professional,
                                                    also very helpful throughout the customisation. Looking
                                                    forward to buy more
                                                    license of Assan again in the future.”
                                                </p>
                                                <div class="mb-5">
                                                    <h5 class="mb-2">Emily doe</h5>
                                                    <small class="d-block lh-1 text-body-secondary"> at Postmates</small>
                                                </div>
                                                <a href="{{ URL::asset('#') }}"
                                                   class="btn btn-secondary rounded-pill btn-hover-arrow">
                                                    <span>Read full story</span>

                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--Slider item-->
                    <div class="swiper-slide">
                        <div class="row">
                            <div class="col-lg-12">
                                <div
                                    class="card rounded-top-start-0 rounded-bottom-end-0 rounded-block shadow-lg flex-md-row flex-column overflow-hidden border-0 bg-body">
                                    <div class="col-md-4">
                                        <div
                                            class="d-flex flex-column border-end-md p-5 align-items-center justify-content-center h-100 bg-info">
                                            <img src="{{ URL::asset('assets/img/partners/dark/microsoft.svg') }}" alt=""
                                                 class="height-5x w-auto img-invert">
                                        </div>
                                    </div>
                                    <div class="card-body h-100 p-4 py-5 py-md-7 px-md-5 flex-grow-1">
                                        <div class="d-md-flex align-items-md-center">
                                            <div class="ms-md-n9">
                                                <img src="{{ URL::asset('assets/img/avatar/3.jpg') }}" alt=""
                                                     class="avatar lg p-1 bg-body shadow-lg rounded-circle mb-4">
                                            </div>
                                            <div class="ps-md-6 px-lg-10 px-xl-12">
                                                <p class="fs-4 font-serif mb-4">
                                                    “ Loved working with the beautiful theme. Everything clean
                                                    and professional,
                                                    also very helpful throughout the customisation. Looking
                                                    forward to buy more
                                                    license of Assan again in the future.”
                                                </p>
                                                <div class="mb-5">
                                                    <h5 class="mb-2">Sabrina</h5>
                                                    <small class="d-block lh-1 text-body-secondary"> at Microsoft</small>
                                                </div>
                                                <a href="{{ URL::asset('#') }}"
                                                   class="btn btn-secondary rounded-pill btn-hover-arrow">
                                                    <span>Read full story</span>

                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div
                class="swiperAuto-pagination swiper-pagination w-100 text-center position-relative mb-0 mt-5 bottom-0 pb-0">
            </div>
        </div>
    </section>
    <!--end:customer stories section-->

    <!--begin:news section-->
    <section class="position-relative">
        <!--begin:Background Half-->
        <div class="position-absolute start-0 top-0 w-100 h-50 bg-gradient bg-secondary"></div>
        <!--end:Background Half-->
        <div class="container position-relative py-9 py-lg-11 z-1">
            <div class="row mb-5 align-items-center">
                <div class="col-md-7 mb-4 mb-md-0" data-aos="fade-up">
                    <!--Title-->
                    <h2 class="text-white display-6" data-aos="fade-up">Latest <span
                            class="text-gradient-light">News</span></h2>
                </div>
                <div class="col-md-5 text-md-end" data-aos="fade-up">
                    <!--action button-->
                    <a href="{{ URL::asset('#!') }}"
                       class="btn btn-outline-white btn-rise p-0 width-10x height-10x flex-center rounded-circle">
                        <div class="btn-rise-bg bg-white"></div>
                        <div class="btn-rise-text"><span class="small">View blog</span></div>
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 mb-4 mb-lg-0" data-aos="fade-up">
                    <article
                        class="card card-hover text-center hover-shadow-lg overflow-hidden border-0 rounded-4 shadow-sm">
                        <div class="overflow-hidden position-relative">

                            <!--Article image-->
                            <img src="{{ URL::asset('assets/img/960x640/1.jpg') }}" alt="" class="img-fluid img-zoom">

                            <!--Article image divider-->
                            <svg class="position-absolute start-0 bottom-0 mb-n1" style="color: var(--bs-body-bg);"
                                 preserveAspectRatio="none" width="100%" height="48" viewBox="0 0 1460 120"
                                 fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M122 22.8261L0 0V120H1460V0L1338 22.8261C1217 44.1304 973 88.2609 730 88.2609C487 88.2609 243 44.1304 122 22.8261Z"
                                    fill="currentColor"></path>
                            </svg>
                        </div>
                        <!--Content-body-->
                        <div class="card-body pb-5 position-relative">
                            <small class="text-body-secondary"><i class="bx bx-calendar-alt me-1"></i> 12 June
                                2023</small>
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
                    <article
                        class="card card-hover text-center hover-shadow-lg overflow-hidden border-0 rounded-4 shadow-sm">
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
                            <small class="text-body-secondary"><i class="bx bx-calendar-alt me-1"></i> 06 June
                                2023</small>
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
                    <article
                        class="card card-hover text-center hover-shadow-lg overflow-hidden border-0 rounded-4 shadow-sm">
                        <div class="overflow-hidden position-relative">

                            <!--Article image-->
                            <img src="{{ URL::asset('assets/img/960x640/3.jpg') }}" alt="" class="img-fluid img-zoom">

                            <!--Article image divider-->
                            <svg class="position-absolute mb-n1 start-0 bottom-0"  style="color: var(--bs-body-bg);"
                                 preserveAspectRatio="none" width="100%" height="48" viewBox="0 0 1460 120"
                                 fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M122 22.8261L0 0V120H1460V0L1338 22.8261C1217 44.1304 973 88.2609 730 88.2609C487 88.2609 243 44.1304 122 22.8261Z"
                                    fill="currentColor"></path>
                            </svg>
                        </div>

                        <!--Article text-->
                        <div class="card-body pb-5 position-relative">
                            <small class="text-body-secondary"><i class="bx bx-calendar-alt me-1"></i> 29 May
                                2023</small>
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
    <!--end: news section-->

    <!--Begin: call to action-->
    <section class="position-relative border-bottom">
        <!--begin:parallax Triangle shape-->
        <div class="rellax d-table position-absolute start-0 top-0 ms-1 mt-n5 mt-lg-4 ms-lg-12 text-warning"
             data-rellax-speed="2" data-rellax-percentage="0.9">
            <svg class="" width="44" height="44" viewBox="0 0 104 104" fill="none"
                 xmlns="http://www.w3.org/2000/svg">
                <path d="M8.64453 8.64453L92.2962 31.0589L31.0589 92.2962L8.64453 8.64453Z"
                      stroke="currentColor" stroke-width="8" />
            </svg>
            <!--end:parallax Triangle shape-->
        </div>

        <!--begin: parallax Circle shape-->
        <div class="rellax d-table position-absolute end-0 bottom-0 mb-3 me-3 me-lg-9 mb-lg-9 text-success"
             data-rellax-speed="-1" data-rellax-percentage="0.5">
            <svg class="" width="36" height="36" viewBox="0 0 108 108" fill="none"
                 xmlns="http://www.w3.org/2000/svg">
                <circle cx="54" cy="54" r="50" stroke="currentColor" stroke-width="8" />
            </svg>
        </div>
        <!--end: parallax Circle shape-->

        <div class="container pb-9 pb-lg-11 position-relative">
            <div class="row justify-content-center text-center">
                <div class="col-lg-10 col-xl-8">
                    <!--CTA Title-->
                    <h3 class="display-6 mb-7" data-aos="fade-up">Schedule a meeting with one of
                        our experts and make the <span class="text-gradient">best decision</span> for your
                        business.</h3>

                    <!--CTA action button-->
                    <div data-aos="fade-up">
                        <a href="{{ URL::asset('#!') }}"
                           class="btn bg-gradient-primary text-white hover-lift hover-shadow-lg btn-lg border-0">
                            Schedule a meeting
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--end: call to action-->
</x-assan-layout>
