<x-assan-layout layout-type="{{$layoutType}}">

            <!--begin: Hero background slide section-->
            <section class="position-relative">
                <div class="container-fluid position-relative z-1">
                    <div class="position-relative rounded-4 overflow-hidden bg-dark">
                        <!-- Slider main container -->
                        <div
                            class="swiper-main rounded-4 overflow-hidden opacity-50 position-absolute start-0 top-0 w-100 h-100 mb-0">
                            <!-- Additional required wrapper -->
                            <div class="swiper-wrapper rounded-5">
                                <!-- Slides -->
                                <div class="swiper-slide bg-cover bg-center bg-no-repeat"
                                    style="background-image: url(assets/img/backgrounds/bg1.jpg);"></div>
                                <div class="swiper-slide bg-cover bg-center bg-no-repeat"
                                    style="background-image: url(assets/img/backgrounds/bg2.jpg);"></div>
                                <div class="swiper-slide bg-cover bg-center bg-no-repeat"
                                    style="background-image: url(assets/img/backgrounds/bg3.jpg);"></div>
                            </div>
                        </div>
                        <div
                            class="position-relative text-white w-md-75 px-4 w-lg-60 mx-auto text-center z-1 py-12 py-lg-15">
                            <!--Hero title-->
                            <h1 class="display-4 mb-3 mb-md-4 position-relative">Built for every business
                            </h1>

                            <!--Hero text-->
                            <p class="lead w-lg-60 mx-auto mb-5">Build a stunning website that attract visitors online
                                and grow
                                your business</p>

                            <!--Hero buttons-->
                            <div class="d-flex flex-column">
                                <div>
                                    <a href="{{ URL::asset('#features') }}" class="btn btn-primary btn-lg">
                                        Get Started
                                    </a>
                                </div>
                                <div class="pt-3 small">✌️ Get started for free, no CC required.</div>
                            </div>
                        </div>
                    </div>
                    <!--/.row-->
                </div>


            </section>
            <!--end: Hero background slide section-->

            <!--begin: features icon section-->
            <section id="features" class="overflow-hidden position-relative">
                <div class="py-9 py-lg-11 container">
                    <div class="row mb-7 align-items-center">
                        <div class="col-md-7 mb-5 mb-md-0">
                            <!--Subtitle-->
                            <div class="d-flex align-items-center mb-3" data-aos="fade-up">
                                <div class="border-top border-warning width-3x border-2"></div>
                                <h6 class="mb-0 ms-3 text-body-secondary">Why choose us</h6>
                            </div>

                            <!--Title-->
                            <h2 class="display-5 mb-0" data-aos="fade-up" data-aos-delay="100">
                                Unlock the posibilities
                            </h2>
                        </div>
                        <div class="col-md-4 offset-lg-1">
                            <p class="mb-0" data-aos="fade-up" data-aos-delay="150">
                                Cras justo odio, dapibus ac facilisis in, egestas eget quam. Praesent commodo cursus
                                magna, vel scelerisque nisl consectetur et.
                            </p>
                        </div>
                    </div>
                    <!--Feature row-->
                    <div class="row">

                        <!--Feature Column-->
                        <div class="col-md-6 col-xl-3 mb-4" data-aos="fade-up" data-aos-delay="100">

                            <!--Card-->
                            <div
                                class="card p-4 rounded-4 rounded-top-end-0 rounded-bottom-start-0 hover-lift hover-shadow-xl">
                                <!--Feature icon-->
                                <div class="width-6x height-6x position-relative flex-center mb-4">
                                    <svg class="position-absolute w-100 text-primary h-100 start-0 top-0"
                                        preserveAspectRatio="none" width="101" height="101" viewBox="0 0 101 101"
                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M34.896 10.6995C50.8574 -4.17176 75.6287 -3.04345 90.2241 13.2197C104.82 29.4828 103.712 54.7223 87.7507 69.5936L66.0751 89.7887C50.1136 104.66 25.3424 103.532 10.747 87.2686C-3.84845 71.0054 -2.74106 45.766 13.2204 30.8947L34.896 10.6995Z"
                                            fill="currentColor" />
                                    </svg>
                                    <!--Icon-->
                                    <i class="bx bxs-magic-wand position-relative text-white fs-2 lh-1"></i>
                                </div>
                                <!--Feature title-->
                                <div class="mb-2">
                                    <h5 class="mb-0">Modern & elegant</h5>
                                </div>

                                <!--Feature description-->
                                <p class="mb-0">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit nam libero justo
                                    laoreet.
                                </p>
                            </div>
                        </div>

                        <!--Feature Column-->
                        <div class="col-md-6 col-xl-3 mb-4" data-aos="fade-up" data-aos-delay="150">
                            <!--Card-->
                            <div
                                class="card p-4 rounded-4 rounded-top-end-0 rounded-bottom-start-0 hover-lift hover-shadow-xl">
                                <!--Feature icon-->
                                <div class="width-6x height-6x position-relative flex-center mb-4">
                                    <svg class="position-absolute w-100 text-success h-100 start-0 top-0"
                                        preserveAspectRatio="none" width="101" height="101" viewBox="0 0 101 101"
                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M34.896 10.6995C50.8574 -4.17176 75.6287 -3.04345 90.2241 13.2197C104.82 29.4828 103.712 54.7223 87.7507 69.5936L66.0751 89.7887C50.1136 104.66 25.3424 103.532 10.747 87.2686C-3.84845 71.0054 -2.74106 45.766 13.2204 30.8947L34.896 10.6995Z"
                                            fill="currentColor" />
                                    </svg>
                                    <!--Icon-->
                                    <i class="bx bx-devices position-relative text-white fs-2 lh-1"></i>
                                </div>
                                <!--Feature title-->
                                <div class="mb-2">
                                    <h5 class="mb-0">Mobile friendly</h5>
                                </div>

                                <!--Feature description-->
                                <p class="mb-0">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit nam libero justo
                                    laoreet.
                                </p>
                            </div>
                        </div>

                        <!--Feature Column-->
                        <div class="col-md-6 col-xl-3 mb-4 mb-md-0" data-aos="fade-up" data-aos-delay="200">
                            <!--Card-->
                            <div
                                class="card p-4 rounded-4 rounded-top-end-0 rounded-bottom-start-0 hover-lift hover-shadow-xl">
                                <!--Feature icon-->
                                <div class="width-6x height-6x position-relative flex-center mb-4">
                                    <svg class="position-absolute w-100 text-danger h-100 start-0 top-0"
                                        preserveAspectRatio="none" width="101" height="101" viewBox="0 0 101 101"
                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M34.896 10.6995C50.8574 -4.17176 75.6287 -3.04345 90.2241 13.2197C104.82 29.4828 103.712 54.7223 87.7507 69.5936L66.0751 89.7887C50.1136 104.66 25.3424 103.532 10.747 87.2686C-3.84845 71.0054 -2.74106 45.766 13.2204 30.8947L34.896 10.6995Z"
                                            fill="currentColor" />
                                    </svg>
                                    <!--Icon-->
                                    <i class="bx bx-layer position-relative text-white fs-2 lh-1"></i>
                                </div>
                                <!--Feature title-->
                                <div class="mb-2">
                                    <h5 class="mb-0">Unlimited features</h5>
                                </div>

                                <!--Feature description-->
                                <p class="mb-0">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit nam libero justo
                                    laoreet.
                                </p>
                            </div>
                        </div>

                        <!--Feature Column-->
                        <div class="col-md-6 col-xl-3" data-aos="fade-up" data-aos-delay="250">
                            <!--Card-->
                            <div
                                class="card p-4 rounded-4 rounded-top-end-0 rounded-bottom-start-0 hover-lift hover-shadow-xl">
                                <!--Feature icon-->
                                <div class="width-6x height-6x position-relative flex-center mb-4">
                                    <svg class="position-absolute w-100 text-warning h-100 start-0 top-0"
                                        preserveAspectRatio="none" width="101" height="101" viewBox="0 0 101 101"
                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M34.896 10.6995C50.8574 -4.17176 75.6287 -3.04345 90.2241 13.2197C104.82 29.4828 103.712 54.7223 87.7507 69.5936L66.0751 89.7887C50.1136 104.66 25.3424 103.532 10.747 87.2686C-3.84845 71.0054 -2.74106 45.766 13.2204 30.8947L34.896 10.6995Z"
                                            fill="currentColor" />
                                    </svg>
                                    <!--Icon-->
                                    <i class="bx bx-bulb position-relative text-white fs-2 lh-1"></i>
                                </div>
                                <!--Feature title-->
                                <div class="mb-2">
                                    <h5 class="mb-0">Modern build tools</h5>
                                </div>

                                <!--Feature description-->
                                <p class="mb-0">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit nam libero justo
                                    laoreet.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--end: features icon section-->

            <!--begin: features image section-->
            <section class="position-relative overflow-hidden bg-body-tertiary">
                <div class="container pb-9 py-lg-11">
                    <div class="row align-items-center">
                        <div class="mb-6 mb-lg-0 col-md-5 pe-md-7 pe-5 pb-5 order-lg-last ms-lg-auto position-relative">

                            <!--Video lightbox button-->
                            <a href="{{ URL::asset('https://vimeo.com/374265101') }}" data-glightbox data-gallery="g1"
                                class="btn btn-white p-0 rounded-circle width-10x height-10x flex-center btn-circle-ripple mx-auto mb-5 position-absolute"
                                style="top:50%; left: 50%; transform: translate(-50%,-50%); z-index:3;">
                                <i class="bx bx-play fs-2"></i>
                            </a>
                            <!--Feature image and pattern-->
                            <div class="bg-pattern text-warning mb-n2 mb-lg-n3 position-absolute w-50 h-50 end-0 bottom-0 rellax"
                                data-rellax-speed="2" data-rellax-percentage=".5">
                            </div>
                            <img src="{{ URL::asset('assets/img/960x1440/1.jpg') }}"
                                class="img-fluid shadow-lg rounded-block rounded-top-start-0 rounded-bottom-end-0 position-relative"
                                alt="">
                        </div>
                        <!--/column -->
                        <div class="col-md-6 order-md-1 me-md-auto">
                            <!--Subtitle-->
                            <div class="d-flex align-items-center mb-3" data-aos="fade-up">
                                <div class="border-top border-warning width-3x border-2"></div>
                                <h6 class="mb-0 ms-3 text-body-secondary">Who we are</h6>
                            </div>
                            <h3 class="display-5 mb-5" data-aos="fade-up">We believes in the power
                                of
                                creativity and posibilities.
                            </h3>
                            <p class="mb-6" data-aos="fade-up">Cras justo odio, dapibus ac facilisis in, egestas
                                eget quam. Praesent
                                commodo cursus magna, vel scelerisque nisl consectetur et.</p>
                            <div class="row">
                                <div class="col-12 col-sm-6 mb-4 mb-sm-0">
                                    <ul class="list-unstyled mb-0">
                                        <li class="d-flex mb-5" data-aos="fade-up">
                                            <div
                                                class="me-3 flex-shrink-0 width-2x height-2x bg-primary text-white rounded-circle flex-center">
                                                <i class="bx bx-check lh-1 fs-5"></i>
                                            </div>
                                            <p class="mb-0">
                                                <strong>Well coded</strong> Aenean eu leo quam ornare curabitur blandit
                                                tempus.
                                            </p>
                                        </li>
                                        <li class="d-flex mb-0" data-aos="fade-up">
                                            <div
                                                class="me-3 flex-shrink-0 width-2x height-2x bg-primary text-white rounded-circle flex-center">
                                                <i class="bx bx-check lh-1 fs-5"></i>
                                            </div>
                                            <p class="mb-0">
                                                <strong>Responsive</strong> Aenean eu leo quam ornare curabitur blandit
                                                tempus.
                                            </p>
                                        </li>
                                    </ul>
                                </div>
                                <!--/column -->
                                <div class="col-12 col-sm-6">
                                    <ul class="list-unstyled mb-0">
                                        <li class="d-flex mb-5" data-aos="fade-up">
                                            <div
                                                class="me-3 flex-shrink-0 width-2x height-2x bg-primary text-white rounded-circle flex-center">
                                                <i class="bx bx-check lh-1 fs-5"></i>
                                            </div>
                                            <p class="mb-0">
                                                <strong>Fast growing</strong> Aenean eu leo quam ornare curabitur
                                                blandit tempus.
                                            </p>
                                        </li>
                                        <li class="d-flex mb-0" data-aos="fade-up">
                                            <div
                                                class="me-3 flex-shrink-0 width-2x height-2x bg-primary text-white rounded-circle flex-center">
                                                <i class="bx bx-check lh-1 fs-5"></i>
                                            </div>
                                            <p class="mb-0">
                                                <strong>Multipurpose</strong> Aenean eu leo quam ornare curabitur
                                                blandit tempus.
                                            </p>
                                        </li>
                                    </ul>
                                </div>
                                <!--/column -->
                            </div>
                            <!--/.row -->
                        </div>
                        <!--/column -->
                    </div>
                </div>
            </section>
            <!--end: features image section-->


            <!--begin:feature image section-->
            <section class="position-relative overflow-hidden">

                <!--Content container-->
                <div class="container py-9 py-lg-11 position-relative">
                    <div class="row align-items-center">

                        <!--Get started column-->
                        <div class="col-lg-6 col-xl-5 ps-lg-7 ps-5 pb-4 order-lg-last me-lg-auto mb-5 mb-lg-0 position-relative"
                            data-aos="fade-down">
                            <div class="bg-pattern text-warning position-absolute w-50 h-50 mb-lg-n4 mb-n2 start-0 bottom-0 rellax"
                                data-rellax-speed="2" data-rellax-percentage=".5">
                            </div>
                            <div
                                class="position-relative bg-body rounded-block rounded-bottom-start-0 rounded-top-end-0 shadow-lg overflow-hidden">
                                <div class="position-relative bg-body overflow-hidden">
                                    <!--Get started image divider shape-->
                                    <svg class="position-absolute start-0 bottom-0 flip-y"
                                        style="color: var(--bs-body-bg);" width="100%" height="24"
                                        preserveAspectRatio="none" viewBox="0 0 1284 100" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M0 0L31.03 14.5833C60.99 29.1667 121.98 58.3333 182.97 62.5C245.03 66.6667 306.02 45.8333 367.01 35.4167C428 25 488.99 25 549.98 37.5C610.97 50 673.03 75 734.02 70.8333C795.01 66.6667 856 33.3333 916.99 31.25C977.98 29.1667 1038.97 58.3333 1101.03 75C1162.02 91.6667 1223.01 95.8333 1252.97 97.9167L1284 100V0H1252.97C1223.01 0 1162.02 0 1101.03 0C1038.97 0 977.98 0 916.99 0C856 0 795.01 0 734.02 0C673.03 0 610.97 0 549.98 0C488.99 0 428 0 367.01 0C306.02 0 245.03 0 182.97 0C121.98 0 60.99 0 31.03 0H0Z"
                                            fill="currentColor" />
                                    </svg>
                                    <!--Get started image-->
                                    <img src="{{ URL::asset('assets/img/960x640/2.jpg') }}" class="img-fluid" alt="">
                                </div>
                                <div class="px-4 bg-body position-relative pb-5 pt-4">
                                    <small class="d-block mb-2 text-body-secondary">No CC required</small>
                                    <h5 class="mb-4">Get started today</h5>

                                    <!--Signup form-->
                                    <form>
                                        <div class="mb-3">
                                            <input type="email" placeholder="Email address"
                                                class="form-control rounded-pill px-4">
                                        </div>
                                        <div class="d-grid">
                                            <button type="button"
                                                class="btn btn-primary rounded-pill hover-shadow btn-hover-arrow hover-lift"><span>Get
                                                    started</span></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5 order-lg-last position-relative">
                            <!--Subtitle-->
                            <div class="d-flex align-items-center mb-3" data-aos="fade-up">
                                <div class="border-top border-warning width-3x border-2"></div>
                                <h6 class="mb-0 ms-3 text-body-secondary">The process</h6>
                            </div>
                            <h2 class="display-5 me-lg-n9 mb-4" data-aos="fade-down">How does it
                                works?</h2>
                            <p class="w-lg-75 mb-5" data-aos="fade-down" data-aos-delay="100">Lorem ipsum is placeholder
                                text commonly used in the graphic, print, and publishing industries for previewing
                                layouts.</p>
                            <ul class="step mx-3 mx-sm-0 list-unstyled mb-0">
                                <li class="step-item" data-aos="fade-up">
                                    <div class="step-row">
                                        <span class="step-icon bg-primary-subtle text-primary">
                                            <!--ICON-DOT-->
                                            <b>01</b>
                                        </span>

                                        <div class="step-content">
                                            <h6 class="mb-1">Collect ideas</h6>
                                            <p class="mb-0">Nulla vitae elit libero pharetra augue dapibus. Praesent
                                                commodo
                                                cursus.</p>
                                        </div>
                                    </div>

                                </li>
                                <!--/.step-item-->
                                <li class="step-item" data-aos="fade-up">
                                    <div class="step-row">
                                        <span class="step-icon bg-primary-subtle text-primary">
                                            <!--ICON-DOT-->
                                            <b>02</b>
                                        </span>

                                        <div class="step-content">
                                            <h6 class="mb-1">Data analysis</h6>
                                            <p class="mb-0">Nulla vitae elit libero pharetra augue dapibus. Praesent
                                                commodo
                                                cursus.</p>
                                        </div>
                                    </div>

                                </li>
                                <!--/.step-item-->
                                <li class="step-item mb-0" data-aos="fade-up">
                                    <div class="step-row">
                                        <span class="step-icon bg-primary-subtle text-primary">
                                            <!--ICON-DOT-->
                                            <b>03</b>
                                        </span>

                                        <div class="step-content">
                                            <h6 class="mb-1">
                                                Finalize product</h6>
                                            <p class="mb-0">Nulla vitae elit libero pharetra augue dapibus. Praesent
                                                commodo
                                                cursus.</p>
                                        </div>
                                    </div>

                                </li>
                                <!--/.step-item-->
                            </ul>
                        </div>
                    </div>
                </div>
            </section>
            <!--end: features image section-->


            <!--begin: Testimonial section-->
            <section class="position-relative bg-primary text-white overflow-hidden">
                <!--begin: Divider shape-->
                <svg class="position-absolute start-0 top-0" style="color: var(--bs-body-bg);" width="100%" height="48"
                    preserveAspectRatio="none" viewBox="0 0 1284 100" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M0 0L31.03 14.5833C60.99 29.1667 121.98 58.3333 182.97 62.5C245.03 66.6667 306.02 45.8333 367.01 35.4167C428 25 488.99 25 549.98 37.5C610.97 50 673.03 75 734.02 70.8333C795.01 66.6667 856 33.3333 916.99 31.25C977.98 29.1667 1038.97 58.3333 1101.03 75C1162.02 91.6667 1223.01 95.8333 1252.97 97.9167L1284 100V0H1252.97C1223.01 0 1162.02 0 1101.03 0C1038.97 0 977.98 0 916.99 0C856 0 795.01 0 734.02 0C673.03 0 610.97 0 549.98 0C488.99 0 428 0 367.01 0C306.02 0 245.03 0 182.97 0C121.98 0 60.99 0 31.03 0H0Z"
                        fill="currentColor"></path>
                </svg>
                <!--end: Divider shape-->

                <div class="container py-9 py-lg-11 position-relative">
                    <div class="row pt-7">
                        <!--Testimonial column-->
                        <div class="col-11 mx-auto col-lg-9" data-aos="fade-right">

                            <!--Testimonial card-->
                            <div class="position-relative">
                                <div class="mb-5 mb-lg-7">
                                    <img src="{{ URL::asset('assets/img/partners/white/amazon.svg') }}" class="width-8x h-auto" alt="">
                                </div>
                                <!--Testimonial text-->
                                <h2 class="display-5 font-serif mb-6">
                                    " It is really refreshing to work with this bootstrap theme which is truly helpful
                                    in
                                    the development of one of my client’s website. "
                                </h2>
                                <!--Testimonial user info-->
                                <h6 class="mb-0">Adam Milne</h6>
                                <small class="text-white-50">Marketing head at Amazon.</small>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--end: Testimonial section-->

            <!--begin: News section-->
            <section class="position-relative overflow-hidden">
                <div class="container py-9 py-lg-11 position-relative z-1">
                    <div class="row position-relative mb-7 align-items-end">
                        <div class="col-12 col-lg-7 me-auto mb-4 mb-lg-0" data-aos="fade-up">
                            <!--Title-->
                            <div class="position-relative">
                                <!--Subtitle-->
                                <div class="d-flex align-items-center mb-3" data-aos="fade-up">
                                    <div class="border-top border-warning width-3x border-2"></div>
                                    <h6 class="mb-0 ms-3 text-body-secondary">Newsroom</h6>
                                </div>
                                <h2 class="display-5 mb-0">
                                    Insights, thoughts announcements from Us
                                </h2>
                            </div>
                        </div>


                        <div class="col-lg-4 text-lg-end" data-aos="fade-down" data-aos-delay="100">
                            <!--Action button-->
                            <a href="{{ URL::asset('#!') }}"
                                class="btn flex-center hover-lift btn-outline-primary p-0 width-10x height-10x btn-rise rounded-pill">
                                <div class="btn-rise-bg bg-primary"></div>
                                <div class="btn-rise-text">
                                    <span class="small">Our blog</span>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="position-relative">
                        <div class="row position-relative z-1">
                            <div class="col-lg-4 mb-7 mb-lg-0" data-aos="fade-up">
                                <!--Article-->
                                <article class="card-hover hover-lift">
                                    <!--Article Image-->
                                    <div class="position-relative rounded-5 overflow-hidden">
                                        <img src="{{ URL::asset('assets/img/960x640/8.jpg') }}" class="img-fluid img-zoom" alt="">
                                    </div>

                                    <!--Article title-->
                                    <div class="pt-4 px-4">
                                        <h5 class="link-multiline">
                                            The recipe for excellent design management
                                        </h5>
                                        <p class="mb-0 pt-3 text-body-secondary small">
                                            29 May
                                        </p>
                                    </div>

                                    <!--Article link-->
                                    <a href="{{ URL::asset('#') }}" class="stretched-link"></a>
                                </article>
                            </div>
                            <div class="col-lg-4 mb-7 mb-lg-0" data-aos="fade-up" data-aos-delay="100">
                                <!--Article-->
                                <article class="card-hover hover-lift">
                                    <!--Article Image-->
                                    <div class="position-relative rounded-5 overflow-hidden">
                                        <img src="{{ URL::asset('assets/img/960x640/6.jpg') }}" class="img-fluid img-zoom" alt="">
                                    </div>
                                    <!--Article title-->
                                    <div class="pt-4 px-4">
                                        <h5 class="link-multiline">
                                            How to use social media to invent or reinvent yourself
                                        </h5>
                                        <p class="mb-0 pt-3 text-body-secondary small">
                                            01 June
                                        </p>
                                    </div>
                                    <!--Article link-->
                                    <a href="{{ URL::asset('#') }}" class="stretched-link"></a>
                                </article>
                            </div>
                            <div class="col-lg-4" data-aos="fade-up" data-aos-delay="150">
                                <!--Article-->
                                <article class="card-hover hover-lift">
                                    <!--Article Image-->
                                    <div class="position-relative rounded-5 overflow-hidden">
                                        <img src="{{ URL::asset('assets/img/960x640/2.jpg') }}" class="img-fluid img-zoom" alt="">
                                    </div>
                                    <!--Article title-->
                                    <div class="pt-4 px-4">
                                        <h5 class="link-multiline">
                                            Digital design trends in 2021
                                        </h5>
                                        <p class="mb-0 pt-3 text-body-secondary small">
                                            21 June
                                        </p>
                                    </div>

                                    <!--article link-->
                                    <a href="{{ URL::asset('#') }}" class="stretched-link"></a>
                                </article>

                            </div>
                        </div>
                    </div>

                </div>
            </section>
            <!--ends: News section-->

            <!--begin: Call to action(CTA) section-->
            <section class="position-relative bg-body-tertiary overflow-hidden">

                <!--Divider shape-->
                <svg class="position-absolute start-0 top-0" style="color:var(--bs-body-bg)" width="100%" height="48"
                    preserveAspectRatio="none" viewBox="0 0 1284 100" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M0 0L31.03 14.5833C60.99 29.1667 121.98 58.3333 182.97 62.5C245.03 66.6667 306.02 45.8333 367.01 35.4167C428 25 488.99 25 549.98 37.5C610.97 50 673.03 75 734.02 70.8333C795.01 66.6667 856 33.3333 916.99 31.25C977.98 29.1667 1038.97 58.3333 1101.03 75C1162.02 91.6667 1223.01 95.8333 1252.97 97.9167L1284 100V0H1252.97C1223.01 0 1162.02 0 1101.03 0C1038.97 0 977.98 0 916.99 0C856 0 795.01 0 734.02 0C673.03 0 610.97 0 549.98 0C488.99 0 428 0 367.01 0C306.02 0 245.03 0 182.97 0C121.98 0 60.99 0 31.03 0H0Z"
                        fill="currentColor"></path>
                </svg>
                <div class="container py-9 py-lg-11 position-relative">
                    <div class="row pt-5 pt-lg-7 justify-content-center align-items-center">
                        <div class="col-xl-10 text-center">
                            <!--Subtitle-->
                            <div class="d-flex justify-content-center align-items-center mb-3" data-aos="fade-up">
                                <div class="border-top border-warning width-3x border-2"></div>
                                <h6 class="mb-0 ms-3 text-body-secondary">That's right</h6>
                            </div>
                            <!--Title-->
                            <h2 class="display-4 mb-3" data-aos="fade-up">Make impact with design
                            </h2>
                            <!--CTA Description text-->
                            <p class="mb-6 mx-auto lead" data-aos="fade-up" data-aos-delay="100">Build stunning website
                                with beautifuly designed layouts and components.</p>

                            <div data-aos="fade-up" data-aos-delay="150">
                                <!--CTA action button-->
                                <a href="{{ URL::asset('#!') }}" class="btn btn-lg btn-primary hover-lift rounded-pill">
                                    <span>Start building</span>
                                </a>
                            </div>

                        </div>
                    </div>
                </div>
            </section>
            <!--end: Call to action(CTA) section-->

</x-assan-layout>
