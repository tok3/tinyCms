<x-assan-layout layout-type="{{$layoutType}}">
            <section class="position-relative bg-dark text-white overflow-hidden" id="hero">
                <!--Parallax background-->
                <img src="{{ URL::asset('assets/img/backgrounds/bg3.jpg') }}" class="bg-image opacity-50" alt="">
                <!--Connected line-->
                <div class="position-absolute star-0 bottom-0 opacity-50 w-100 text-center justify-content-center text-reset">
                    <div class="connect-line d-inline-block position-relative"> </div>
                </div>
                <div class="container position-relative z-1">
                    <div class="row vh-100 d-flex align-items-center justify-content-center text-center">
                        <div class="col-xl-11">
                            <h2 class="mb-5 display-3">Award winning agency <br class="d-none d-md-block">
                                with stunning
                                <span class="d-inline-block text-warning"
                                    data-typed='{"strings": ["Ideas", "designs", "solutions"]}'></span>
                            </h2>
                            <p class="mb-6 lead">We shape the future of Brands through craft and curiosity</p>
                            <div class="">
                                <a href="{{ URL::asset('#about') }}" class="btn btn-white btn-lg btn-hover-text">
                                    <span class="btn-hover-label label-default">Learn More</span>
                                    <span class="btn-hover-label label-hover">Learn More</span>
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
            </section>
            <section id="about" class="position-relative overflow-hidden">
                <div class="container-fluid py-9 py-lg-12 z-1">
                    <div class="row align-items-center justify-content-between">
                        <div class="order-last col-lg-5 me-lg-auto col-xl-4">

                            <!--Subheading-->
                            <div class="mb-3" data-aos="fade-up">
                                <span class="h6 text-body-secondary">Who we are</span>
                            </div>

                            <!--Section Heading-->
                            <h2 class="mb-7 display-5 position-relative z-1" data-aos="fade-right">We're digital
                                design
                                agency
                            </h2>
                            <div class="position-relative z-1">
                                <!--Feature icon card-->
                                <div class="mb-4 mb-lg-5" data-aos="fade-up" data-aos-delay="150">

                                    <!--Feature text-->
                                    <div>
                                        <h5>
                                            About us
                                        </h5>
                                        <p class="mb-0">
                                            Lorem ipsum dolor sit amet, consectetur elit, sed do eiusmod tempor
                                            incididunt ut labore et dolore magna aliqua.
                                        </p>
                                    </div>
                                </div>
                                <!--Feature icon card-->
                                <div class="mb-4 mb-lg-5" data-aos="fade-up" data-aos-delay="200">

                                    <!--Feature text-->
                                    <div>
                                        <h5>
                                            Our Mission
                                        </h5>
                                        <p class="mb-0">
                                            Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                                            aliquip ex ea commodo consequat.
                                        </p>
                                    </div>
                                </div>
                                <!--Feature icon card-->
                                <div data-aos="fade-up" data-aos-delay="250">
                                    <!--Feature text-->
                                    <div>
                                        <h5>
                                            Our vision
                                        </h5>
                                        <p class="mb-0">
                                            Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore
                                            eu fugiat nulla pariatur.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="pt-7" data-aos="fade-up" data-aos-delay="250">
                                <a href="{{ URL::asset('#services') }}" class="btn btn-primary btn-lg btn-hover-text">
                                    <span class="btn-hover-label label-default">Learn More</span>
                                    <span class="btn-hover-label label-hover">Learn More</span>
                                </a>
                            </div>

                        </div>
                        <div class="col-lg-6 col-md-10 me-lg-auto order-1 mb-7 mb-lg-0">
                            <div class="position-relative" data-aos="fade-left" data-aos-delay="150">
                                <!--Transparent image background-->
                                <div class="bg-warning mt-n5 position-absolute start-50 translate-middle-x bottom-0 w-50 w-lg-75 h-75">
                                </div>
                                <div
                                    class="bg-success position-absolute end-0 bottom-0 w-75 w-lg-50 h-50">
                                </div>
                                <img src="{{ URL::asset('assets/img/backgrounds/trans1.png') }}" alt="" class="img-fluid d-block ms-auto position-relative">
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section id="work" class="position-relative overflow-hidden">
                <div class="container position-relative z-1 pt-9 pt-lg-12">
                    <div class="row mb-5 mb-lg-7 align-items-end">
                        <div class="col-lg-8 mx-auto text-center">
                            <!--Subheading-->
                            <div class="mb-3">
                                <span class="h6 mb-0">Case studies</span>
                            </div>
                            <!--Section Heading-->
                            <h2 class="mb-0 display-5">Our Recent Work</h2>
                        </div>
                    </div>
                </div>
                <div class="container pb-9 pb-lg-12">
                    <div class="row">
                        <div class="col-lg-8 col-md-10 col-11 mx-auto position-relative">

                            <!--Projects swiper slider-->
                            <div class="swiper-container swiper-projects overflow-visible">
                                <div class="swiper-wrapper">

                                    <!--Swiper-slide-->
                                    <div class="swiper-slide">
                                        <a href="{{ URL::asset('#!') }}" class="card-over d-block card-hover overflow-hidden">
                                            <img src="{{ URL::asset('assets/img/projects/lg1.jpg') }}" alt="" class="img-fluid img-zoom">
                                            <div class="card-overlay p-4 d-flex align-items-end text-white">
                                                <ul class="list-unstyled overlay-items">
                                                    <li>
                                                        <h4 class="mb-1">Awesome title</h4>
                                                    </li>
                                                    <li><span class="opacity-75">Awesome Subtitle</span></li>
                                                </ul>
                                            </div>
                                        </a>
                                    </div>

                                    <!--Swiper-slide-->
                                    <div class="swiper-slide">
                                        <a href="{{ URL::asset('#!') }}" class="card-over d-block card-hover overflow-hidden">
                                            <img src="{{ URL::asset('assets/img/projects/lg2.jpg') }}" alt="" class="img-fluid img-zoom">
                                            <div class="card-overlay p-4 d-flex align-items-end text-white">
                                                <ul class="list-unstyled overlay-items">
                                                    <li>
                                                        <h4 class="mb-1">Awesome title</h4>
                                                    </li>
                                                    <li><span class="opacity-75">Awesome Subtitle</span></li>
                                                </ul>
                                            </div>
                                        </a>
                                    </div>

                                    <!--Swiper-slide-->
                                    <div class="swiper-slide">
                                        <a href="{{ URL::asset('#!') }}" class="card-over d-block card-hover overflow-hidden">
                                            <img src="{{ URL::asset('assets/img/projects/lg3.jpg') }}" alt="" class="img-fluid img-zoom">
                                            <div class="card-overlay p-4 d-flex align-items-end text-white">
                                                <ul class="list-unstyled overlay-items">
                                                    <li>
                                                        <h4 class="mb-1">Awesome title</h4>
                                                    </li>
                                                    <li><span class="opacity-75">Awesome Subtitle</span></li>
                                                </ul>
                                            </div>
                                        </a>
                                    </div>

                                    <!--Swiper-slide-->
                                    <div class="swiper-slide">
                                        <a href="{{ URL::asset('#!') }}" class="card-over d-block card-hover overflow-hidden">
                                            <img src="{{ URL::asset('assets/img/projects/lg4.jpg') }}" alt="" class="img-fluid img-zoom">
                                            <div class="card-overlay p-4 d-flex align-items-end text-white">
                                                <ul class="list-unstyled overlay-items">
                                                    <li>
                                                        <h4 class="mb-1">Awesome title</h4>
                                                    </li>
                                                    <li><span class="opacity-75">Awesome Subtitle</span></li>
                                                </ul>
                                            </div>
                                        </a>
                                    </div>

                                    <!--Swiper-slide-->
                                    <div class="swiper-slide">
                                        <a href="{{ URL::asset('#!') }}" class="card-over d-block card-hover overflow-hidden">
                                            <img src="{{ URL::asset('assets/img/projects/lg5.jpg') }}" alt="" class="img-fluid img-zoom">
                                            <div class="card-overlay p-4 d-flex align-items-end text-white">
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
                                <!--Paginations-->
                                <div class="swiper-pagination swiperProjects-pagination position-relative pt-7"></div>
                            </div>

                            <div class="text-center pt-7">
                                <a href="{{ URL::asset('#services') }}" class="btn btn-primary btn-hover-text">
                                    <span class="btn-hover-label label-default">Explore our work</span>
                                    <span class="btn-hover-label label-hover">Explore our work</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="position-relative text-bg-primary overflow-hidden">
                <div class="container py-9 py-lg-12">
                    <div class="row mb-5 mb-lg-7 align-items-end">
                        <div class="col-md-8 col-lg-6">

                            <!--Subheading-->
                            <div class="mb-3" data-aos="fade-up">
                                <span class="h6">Testimonials</span>
                            </div>
                            <h2 class="mb-0 display-5">Clients who love <br>our
                                <span class="d-inline-block text-gradient-light"
                                    data-typed='{"strings": ["Ideas...", "Creativity...", "passion...", "innovation..."]}'></span>
                            </h2>
                        </div>
                    </div>
                    <div class="row align-items-center justify-content-center">
                        <!--Swiper testimonials image-->
                        <div class="col-lg-6 col-xl-5 mb-5 mb-lg-0">
                            <div class="swiper swiper-people overflow-hidden">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <img src="{{ URL::asset('assets/img/team/2.jpg') }}" class="img-fluid" alt="">
                                    </div>
                                    <div class="swiper-slide">
                                        <img src="{{ URL::asset('assets/img/team/1.jpg') }}" class="img-fluid" alt="">
                                    </div>
                                    <div class="swiper-slide">
                                        <img src="{{ URL::asset('assets/img/team/4.jpg') }}" class="img-fluid" alt="">
                                    </div>
                                    <div class="swiper-slide">
                                        <img src="{{ URL::asset('assets/img/team/5.jpg') }}" class="img-fluid" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Swiper testimonials text-->
                        <div class="col-lg-6 col-xl-5 mx-auto">
                            <div class="swiper swiper-quotes overflow-hidden">
                                <!--swiper-wrapper-->
                                <div class="swiper-wrapper">
                                    <!--swiper-slide-->
                                    <div class="swiper-slide">
                                        <div class="position-relative overflow-hidden">
                                            <div
                                                class="position-relative mb-4 justify-content-between align-items-center d-flex">
                                                <div class="text-warning">
                                                    <i class="bx bx-star"></i>
                                                    <i class="bx bx-star"></i>
                                                    <i class="bx bx-star"></i>
                                                    <i class="bx bx-star"></i>
                                                    <i class="bx bx-star"></i>
                                                </div>
                                            </div>
                                            <div class="position-relative">
                                                <h4 class="mb-4 display-6 fw-semibold">
                                                    " Overall i am so glad i spent the (small amount of) money
                                                    to purchase this theme, it has paid off far more than it
                                                    cost.
                                                </h4>
                                                <h6 class="mb-0">Jimmy R</h6>
                                                <small class="text-white-50">Sr Project Manager</small>
                                            </div>
                                        </div>
                                    </div>

                                    <!--swiper-slide-->
                                    <div class="swiper-slide">
                                        <div class="position-relative">
                                            <div
                                                class="position-relative mb-4 justify-content-between align-items-center d-flex">
                                                <div class="text-warning">
                                                    <i class="bx bx-star"></i>
                                                    <i class="bx bx-star"></i>
                                                    <i class="bx bx-star"></i>
                                                    <i class="bx bx-star"></i>
                                                    <i class="bx bx-star"></i>
                                                </div>
                                            </div>
                                            <div class="position-relative z-1">
                                                <h4 class="mb-4 display-6 fw-semibold">
                                                    " I just had an issue and I contacted support by email. I got the
                                                    solution
                                                    in less than 24 hours. Excellent job. Thank you very much. "
                                                </h4>
                                                <h6 class="mb-0">Serenity H</h6>
                                                <small class="text-white-50">Creative designer</small>
                                            </div>
                                        </div>
                                    </div>

                                    <!--swiper-slide-->
                                    <div class="swiper-slide">
                                        <div class="position-relative">
                                            <div
                                                class="position-relative mb-4 justify-content-between align-items-center d-flex">
                                                <div class="text-warning">
                                                    <i class="bx bx-star"></i>
                                                    <i class="bx bx-star"></i>
                                                    <i class="bx bx-star"></i>
                                                    <i class="bx bx-star"></i>
                                                    <i class="bx bx-star"></i>
                                                </div>
                                            </div>
                                            <div class="position-relative z-1">
                                                <h4 class="mb-4 display-6 fw-semibold">
                                                    " It is perfect! Light, elegant, well structured. Thank
                                                    you, developers!!!
                                                </h4>
                                                <h6 class="mb-0">Mariah Soner</h6>
                                                <small class="text-white-50">Head of marketing at Some Inc.</small>
                                            </div>
                                        </div>
                                    </div>

                                    <!--swiper-slide-->
                                    <div class="swiper-slide">
                                        <div class="position-relative">
                                            <div
                                                class="position-relative mb-4 justify-content-between align-items-center d-flex">
                                                <div class="text-warning">
                                                    <i class="bx bx-star"></i>
                                                    <i class="bx bx-star"></i>
                                                    <i class="bx bx-star"></i>
                                                    <i class="bx bx-star"></i>
                                                    <i class="bx bx-star"></i>
                                                </div>
                                            </div>
                                            <div class="position-relative z-1">
                                                <h4 class="mb-4 display-6 fw-semibold">
                                                    " It is really refreshing to work with this bootstrap
                                                    theme which is truly helpful in the one of my client’s
                                                    website.
                                                </h4>
                                                <h6 class="mb-0">Emily doe</h6>
                                                <small class="text-white-50">Head of marketing at Some Inc.</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!--swiper slider navigation-->
                                <div class="d-flex pt-5 align-items-center justify-content-end">
                                    <div
                                        class="swiperTestimonials-button-prev swiper-button-prev start-0 mt-0 position-relative bg-transparent border border-light text-white rounded-circle width-5x height-5x">
                                    </div>
                                    <div
                                        class="swiperTestimonials-button-next swiper-button-next mt-0 position-relative end-0 ms-2 bg-transparent border border-light text-white rounded-circle width-5x height-5x">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="position-relative overflow-hidden" id="expertise">
                <!--content-->
                <div class="container py-9 py-lg-12 position-relative">
                    <div class="row mb-7 mb-lg-9 align-items-center">
                        <div class="col-lg-7">
                            <!--Subheading-->
                            <div class="mb-3" data-aos="fade-up">
                                <span class="h6 text-body-secondary">What we do</span>
                            </div>
                            <!--Section Heading-->
                            <h2 class="mb-0 display-5" data-aos="fade-up" data-aos-delay="100">Our Expertise</h2>
                        </div>
                    </div>

                    <div class="row justify-content-around">
                        <div class="col-md-4 mb-7 mb-md-0" data-aos="fade-up">
                            <div class="card border-top border-5 border-primary h-100 card-body border-0 shadow py-5 hover-lift hover-shadow-lg overflow-hidden">
                                <div class="position-relative z-1">
                                    <!--title-->
                            <h4 class="mb-4">Brand Identity</h4>
                            <!--text-->
                            <p class="mb-4 text-body-tertiary">
                                Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
                                mollit anim id est laborum.
                            </p>
                            <div class="width-4x pt-1 bg-primary mb-4"></div>
                            <!--List-->
                            <ul class="list-unstyled lh-lg mb-0">
                                <li class="my-2 d-flex align-items-center">
                                    <i class="bx bx-check-circle me-3 text-primary"></i> Logo development
                                </li>
                                <li class="my-2 d-flex align-items-center"><i
                                        class="bx bx-check-circle me-3 text-primary"></i> Brand strategy
                                </li>
                                <li class="my-2 d-flex align-items-center"><i
                                        class="bx bx-check-circle me-3 text-primary"></i> Corporate
                                    Identities</li>
                                <li class="my-2 d-flex align-items-center"><i
                                        class="bx bx-check-circle me-3 text-primary"></i> Brand guidelines
                                </li>
                                <li class="my-2 d-flex align-items-center"><i
                                        class="bx bx-check-circle me-3 text-primary"></i> Art direction
                                </li>
                                <li class="my-2 d-flex align-items-center"><i
                                        class="bx bx-check-circle me-3 text-primary"></i> Illustration
                                </li>
                                <li class="my-2 d-flex align-items-center"><i
                                        class="bx bx-check-circle me-3 text-primary"></i> Typography<br>
                                </li>
                            </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-7 mb-md-0" data-aos="fade-right" data-aos-delay="100">
                           <div class="card h-100 card-body border-top border-5 border-success border-0 shadow py-5 hover-lift hover-shadow-lg overflow-hidden">
                             <div class="position-relative z-1">
                                <!--Title-->
                             <h4 class="mb-4">Digital Design</h4>
                             <!--Text-->
                             <p class="mb-4">
                                 Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
                                 mollit anim id est laborum.
                             </p>
                             <div class="width-4x pt-1 bg-success mb-4"></div>
                             <!--List-->
                             <ul class="list-unstyled lh-lg mb-0">
                                 <li class="my-2 d-flex align-items-center"><i
                                         class="bx bx-check-circle me-3 text-success"></i> UX </li>
                                 <li class="my-2 d-flex align-items-center"><i
                                         class="bx bx-check-circle me-3 text-success"></i> Strategy</li>
                                 <li class="my-2 d-flex align-items-center"><i
                                         class="bx bx-check-circle me-3 text-success"></i> UI design</li>
                                 <li class="my-2 d-flex align-items-center"><i
                                         class="bx bx-check-circle me-3 text-success"></i> Interactive
                                     prototyping
                                 </li>
                                 <li class="my-2 d-flex align-items-center"><i
                                         class="bx bx-check-circle me-3 text-success"></i> Web development
                                 </li>
                                 <li class="my-2 d-flex align-items-center"><i
                                         class="bx bx-check-circle me-3 text-success"></i> App development
                                 </li>
                                 <li class="my-2 d-flex align-items-center"><i
                                         class="bx bx-check-circle me-3 text-success"></i> eCommerce
                                     solutions</li>
                             </ul>
                             </div>
                           </div>
                        </div>
                        <div class="col-md-4" data-aos="fade-right" data-aos-delay="150">
                           <div class="card h-100 card-body border-top border-5 border-danger border-0 shadow py-5 hover-lift hover-shadow-lg overflow-hidden">
                            <div class="position-relative z-1">
                                 <!--Title-->
                             <h4 class="mb-4">Motion Design</h4>
                             <!--Text-->
                             <p class="mb-4">
                                 Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
                                 mollit anim id est laborum.
                             </p>
                             <div class="width-4x pt-1 bg-danger mb-4"></div>
                             <!--List-->
                             <ul class="list-unstyled lh-lg mb-0">
                                 <li class="my-2 d-flex align-items-center"><i
                                         class="bx bx-check-circle me-3 text-danger"></i> Storyboarding
                                 </li>
                                 <li class="my-2 d-flex align-items-center"><i
                                         class="bx bx-check-circle me-3 text-danger"></i> 2D / 3D
                                     animation</li>
                                 <li class="my-2 d-flex align-items-center"><i
                                         class="bx bx-check-circle me-3 text-danger"></i> Videography</li>
                                 <li class="my-2 d-flex align-items-center"><i
                                         class="bx bx-check-circle me-3 text-danger"></i> Sound design
                                 </li>
                                 <li class="my-2 d-flex align-items-center"><i
                                         class="bx bx-check-circle me-3 text-danger"></i> Illustration
                                 </li>
                                 <li class="my-2 d-flex align-items-center"><i
                                         class="bx bx-check-circle me-3 text-danger"></i> Content creation
                                 </li>
                             </ul>
                            </div>
                           </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="position-relative overflow-hidden">
                <!--bg-->
                <div class="position-absolute start-0 top-0 bg-primary w-100 h-50"></div>
                <!--content-->
                <div class="container py-9 py-lg-12 position-relative">
                    <div class="row text-white mb-5 mb-lg-7 align-items-center">
                        <div class="col-lg-7">
                            <!--Subheading-->
                            <div class="mb-3" data-aos="fade-up">
                                <span class="h6">Team</span>
                            </div>
                            <!--Section Heading-->
                            <h2 class="display-5 mb-0" data-aos="fade-up" data-aos-delay="100">Meet the challengers</h2>
                        </div>
                    </div>
                    <div class="row justify-content-around">
                        <div class="col-sm-6 col-lg-3 mb-5 mb-lg-0" data-aos="fade-up">
                            <div class="card border-0 bg-transparent">
                                <!--image-->
                                <img src="{{ URL::asset('assets/img/team/1.jpg') }}" class="img-fluid rounded" alt="team">
                                <div
                                    class="card-body text-center py-4 position-relative z-1 shadow rounded-3 mt-n5 bg-body mx-3">
                                    <!--title-->
                                    <h5 class="mb-1">Jordy Eubanks</h5>
                                    <!--text-->
                                    <p class="mb-0">
                                        Creative director
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3 mb-5 mb-lg-0" data-aos="fade-up">
                            <div class="card border-0 bg-transparent">
                                <!--image-->
                                <img src="{{ URL::asset('assets/img/team/2.jpg') }}" class="img-fluid rounded" alt="team">
                                <div
                                    class="card-body text-center py-4 position-relative z-1 shadow rounded-3 mt-n5 bg-body mx-3">
                                    <!--title-->
                                    <h5 class="mb-1">Olive Mathews</h5>
                                    <!--text-->
                                    <p class="mb-0">
                                        Visual designer
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3 mb-5 mb-lg-0" data-aos="fade-up">
                            <div class="card border-0 bg-transparent">
                                <!--image-->
                                <img src="{{ URL::asset('assets/img/team/3.jpg') }}" class="img-fluid rounded" alt="team">
                                <div
                                    class="card-body text-center py-4 position-relative z-1 shadow rounded-3 mt-n5 bg-body mx-3">
                                    <!--title-->
                                    <h5 class="mb-1">Aarav Lynn</h5>
                                    <!--text-->
                                    <p class="mb-0">
                                        Developer
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3 mb-5 mb-lg-0" data-aos="fade-up">
                            <div class="card border-0 bg-transparent">
                                <!--image-->
                                <img src="{{ URL::asset('assets/img/team/4.jpg') }}" class="img-fluid rounded" alt="team">
                                <div
                                    class="card-body text-center py-4 position-relative z-1 shadow rounded-3 mt-n5 bg-body mx-3">
                                    <!--title-->
                                    <h5 class="mb-1">Eva Calvert</h5>
                                    <!--text-->
                                    <p class="mb-0">
                                        Motion designer
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="position-relative bg-body-tertiary overflow-hidden">
                <div class="container px-lg-12 py-9 py-lg-12 position-relative z-1" data-aos="fade"
                    data-aos-once="false" data-aos-offset="120">
                    <div class="mb-5 px-lg-11 text-center" data-aos="fade-up" data-aos-delay="100">
                        <!--Heading-->
                        <h4 class="mb-3">More than Clients</h4>
                    </div>
                    <div class="d-flex flex-wrap justify-content-center">
                        <div class="d-flex align-items-center justify-content-center mt-5 width-14x px-4"
                            data-aos="fade-up" data-aos-delay="150">
                            <img src="{{ URL::asset('assets/img/partners/dark/amazon.svg') }}" alt="partner" class="img-fluid img-invert">
                        </div>
                        <div class="d-flex align-items-center justify-content-center mt-5 width-14x px-4"
                            data-aos="fade-up" data-aos-delay="150">
                            <img src="{{ URL::asset('assets/img/partners/dark/microsoft.svg') }}" alt="partner" class="img-fluid img-invert">
                        </div>
                        <div class="d-flex align-items-center justify-content-center mt-5 width-14x px-4"
                            data-aos="fade-up" data-aos-delay="200">
                            <img src="{{ URL::asset('assets/img/partners/dark/google.svg') }}" alt="partner" class="img-fluid img-invert">
                        </div>
                        <div class="d-flex align-items-center justify-content-center mt-5 width-14x px-4"
                            data-aos="fade-up" data-aos-delay="250">
                            <img src="{{ URL::asset('assets/img/partners/dark/booking.com.svg') }}" alt="partner" class="img-fluid img-invert">
                        </div>
                        <div class="d-flex align-items-center justify-content-center mt-5 width-14x px-4"
                            data-aos="fade-up" data-aos-delay="300">
                            <img src="{{ URL::asset('assets/img/partners/dark/grab.svg') }}" alt="partner" class="img-fluid img-invert">
                        </div>
                        <div class="d-flex align-items-center justify-content-center mt-5 width-14x px-4"
                            data-aos="fade-up" data-aos-delay="350">
                            <img src="{{ URL::asset('assets/img/partners/dark/slack.svg') }}" alt="partner" class="img-fluid img-invert">
                        </div>
                        <div class="d-flex align-items-center justify-content-center mt-5 width-14x px-4"
                            data-aos="fade-up" data-aos-delay="400">
                            <img src="{{ URL::asset('assets/img/partners/dark/uber.svg') }}" alt="partner" class="img-fluid img-invert">
                        </div>
                        <div class="d-flex align-items-center justify-content-center mt-5 width-14x px-4"
                            data-aos="fade-up" data-aos-delay="450">
                            <img src="{{ URL::asset('assets/img/partners/dark/didi.svg') }}" alt="partner" class="img-fluid img-invert">
                        </div>
                        <div class="d-flex align-items-center justify-content-center mt-5 width-14x px-4"
                            data-aos="fade-up" data-aos-delay="500">
                            <img src="{{ URL::asset('assets/img/partners/dark/lyft.svg') }}" alt="partner" class="img-fluid img-invert">
                        </div>
                        <div class="d-flex align-items-center justify-content-center mt-5 width-14x px-4"
                            data-aos="fade-up" data-aos-delay="550">
                            <img src="{{ URL::asset('assets/img/partners/dark/salesforce.svg') }}" alt="partner" class="img-fluid img-invert">
                        </div>
                    </div>
                    <!--Col-->
                </div>
            </section>
            <section class="position-relative" id="contact">
                <div class="container py-9 py-lg-12">
                    <div class="row">
                        <div class="col-md-8 col-lg-7 mb-7 mb-md-0 me-auto">
                            <div class="position-relative">
                                <h2 class="display-5 mb-4">
                                    Contact us
                                </h2>
                                <p class="mb-5 lead pe-lg-8">
                                    Use the contact form if you have questions about our products. Our sales team will
                                    be happy to help you:
                                </p>
                               <!-- Contacts Form -->

                            <form id="contactForm" action="assets/contact/send_mail.php" method="post" role="form"
                            class="needs-validation mb-5 mb-lg-7" novalidate>
                            <div class="row">
                                <!-- Input -->
                                <div class="col-sm-6 mb-3">
                                    <label class="form-label" for="name">Your name</label>
                                    <input type="text" name="name" class="form-control" id="name"
                                        placeholder="John Doe" required>
                                </div>
                                <!-- End Input -->

                                <!-- Input -->
                                <div class="col-sm-6 mb-3">
                                    <label class="form-label" for="email">Your email address</label>
                                    <input type="email" class="form-control" name="email" id="email"
                                        placeholder="john@gmail.com" aria-label="jackwayley@gmail.com" required>
                                    <div class="invalid-feedback">
                                        Please enter a valid email address
                                    </div>
                                </div>

                                <div class="w-100"></div>

                                <!-- Input -->

                                <!-- Services -->
                                <div class="col-sm-12 mb-3">
                                    <label class="form-label" for="subject">Subject</label>
                                    <input type="text" class="form-control" name="subject" id="subject"
                                        placeholder="Web Design" required>
                                </div>
                                <!-- End Input -->
                            </div>

                            <!-- Message -->
                            <div class="mb-3">
                                <label for="message" class="form-label">Message</label>
                                <textarea class="form-control" name="message" placeholder="Hi there...."
                                    required=""></textarea>
                                <div class="invalid-feedback">
                                    Please enter a message in the textarea.
                                </div>
                            </div>

                            <div class="d-md-flex justify-content-between align-items-center">
                                <p class="small mb-4 text-body-secondary mb-md-0">We'll get back to you in 1-2
                                    business days.</p>
                                <input type="submit" name="submit" value="Submit message" id="sendBtn"
                                    class="btn btn-lg btn-primary">
                            </div>
                        </form>
                        <!-- End Contacts Form -->
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div data-aos="fade-up">
                                <h4 class="mb-0">Global Offices</h4>
                                <div class="border-top border-secondary mb-4 mt-2" data-aos="fade-up"></div>
                            </div>
                            <div data-aos="fade-up">
                                <h5>USA</h5>
                                <div class="position-relative">
                                    <p><strong>Brooklyn </strong><br>Street name 21, Ipsum,<br> 12345,&nbsp;New York
                                        City</p>
                                    <p>Phone:&nbsp;+01 1234 456 678<br>Fax: +01 1234 567 890<br>Website: <a
                                            rel="noopener" href="{{ URL::asset('#!') }}">www.site.se</a><br>Email: <a rel="noopener"
                                            href="{{ URL::asset('#!') }}">info@yourmail.com</a>
                                    </p>
                                </div>
                            </div>
                            <div class="border-top border-secondary my-4 my-lg-5" data-aos="fade-up"></div>
                            <div data-aos="fade-up" data-aos-delay="100">
                                <h5>Sweden</h5>
                                <div class="position-relative">
                                    <p><strong>Stockholm </strong><br>Street name 21, Danderyd,<br>
                                        SE-12345,&nbsp;Sweden</p>
                                    <p>Phone:&nbsp;+46 1234 56789<br>Fax: +46 123 123456<br>Website: <a rel="noopener"
                                            href="{{ URL::asset('#') }}">www.site.se</a><br>Email: <a rel="noopener"
                                            href="{{ URL::asset('#!') }}">info@yourmail.com</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="position-relative bg-gradient-primary text-white overflow-hidden">

                <!--Divider-->
                <svg class="position-absolute start-0 bottom-0 text-dark" preserveAspectRatio="none" width="100%"
                    height="96" viewBox="0 0 1600 96" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M1600 96H0L1600 0V96Z" fill="currentColor" />
                </svg>
                <div class="container py-9 py-lg-12 position-relative">
                    <div class="row pb-9 position-relative">
                        <div class="col-12 col-lg-9 mx-auto text-center">
                            <h3 class="mb-4 display-5 fw-lighter" data-aos="fade-down">
                                Bring <span
                                    class="fw-bolder d-inline-block pb-1 position-relative text-gradient-light">Assan
                                    template

                                </span> to life and start building — today
                            </h3>
                            <p class="mb-5 px-lg-11 lead" data-aos="zoom-in" data-aos-delay="100">
                                There are combined alignment methods – when several types of alignment together are
                                used
                                in one composition.
                            </p>
                            <div data-aos="fade-up" data-aos-delay="150">
                                <a href="{{ URL::asset('#about') }}" class="btn btn-outline-white btn-lg btn-hover-text">
                                    <span class="btn-hover-label label-default">Work with us</span>
                                    <span class="btn-hover-label label-hover">Work with us</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
</x-assan-layout>
