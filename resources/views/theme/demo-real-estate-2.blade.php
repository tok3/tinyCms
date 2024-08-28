<x-assan-layout layout-type="{{$layoutType}}">
            <!--hero-->
            <section class="position-relative jarallax bg-dark" data-bs-theme="dark" data-speed=".2" data-video-src="{{ URL::asset('https://vimeo.com/515175418') }}">
                <!--Overlay-->
                <div class="position-absolute start-0 top-0 w-100 h-100 bg-dark opacity-75"></div>
                <div class="container pt-15 pb-9 pb-lg-12 position-relative z-1">
                    <div class="row justify-content-center">
                        <div class="col-lg-10 col-xl-8 position-relative z-2">
                            <h1 class="display-2 text-center text-white mb-4">
                                Inspired by Art<br>
                                Designed for living.
                            </h1>
                            <p class="fw-bolder text-center mb-4 text-white"><strong>BUY. SELL . RENT
                                    Property</strong></p>
                            <form class="position-relative p-3 bg-dark bg-opacity-10 rounded-3 shadow-sm">
                                <div class="row g-2 mx-0 align-items-end">
                                    <div class="col-md-6 col-lg-3">
                                        <label for="p_type" class="form-label text-body-secondary small block">Property
                                            type:</label>
                                        <select class="form-control border-0 bg-white text-dark pe-5" data-choices='{"searchEnabled":false,"itemSelectText":""}'
                                            name="p_type" id="p_type">
                                            <option value="Any type" selected>Any type</option>
                                            <option value="Villa">Villa</option>
                                            <option value="Apartment">Apartment</option>
                                            <option value="Office">Office</option>
                                            <option value="Parking">Parking</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 col-lg-3">
                                        <label for="p_for" class="form-label small text-body-secondary block">Property
                                            for:</label>
                                        <select class="form-control border-0 bg-white text-dark pe-5" data-choices='{"searchEnabled":false,"itemSelectText":""}'
                                            name="p_for" id="p_type">
                                            <option value="Rent">For Rent</option>
                                            <option value="Sale">For Sale</option>
                                        </select>
                                    </div>
                                    <div class="col-md-9 col-lg-4">
                                        <label for="p_location" class="form-label small text-body-secondary">Location:</label>
                                        <div class="position-relative">
                                            <i
                                                class="bx bxs-map small ms-3 position-absolute start-0 top-50 translate-middle-y"></i>
                                            <input type="text" id="p_location" class="form-control border-0 bg-white text-dark ps-6">
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-lg-2 text-md-end">
                                        <button type="submit" class="btn btn-primary w-100">
                                           <i class="bx bx-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                            <small class="text-white-50 pt-3 pt-lg-4 text-center d-block">
                                Over 247,000 listings
                            </small>
                        </div>
                    </div>
                </div>
            </section>
            <section class="position-relative">
                <div class="container py-9 py-lg-11">
                    <div class="d-flex mb-6 align-items-center">
                        <h3 class="mb-0 display-6">Newly Added</h3>
                        <div class="flex-grow-1 border-top mx-3"></div>
                        <a href="{{ URL::asset('#!') }}" class="flex-shrink-0 link-hover-underline">View All</a>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-lg-4 col-md-6 col-sm-10 mb-5 mb-lg-0">
                            <!--Card-property-2-->
                            <div class="position-relative">
                                <a href="{{ URL::asset('#!') }}" class="d-block card-hover overflow-hidden rounded-4">
                                    <!--Image-->
                                    <img src="{{ URL::asset('assets/img/estate/listing/1.jpg') }}" class="img-fluid img-zoom" alt="">
                                    <!--Background-->
                                    <div
                                        class="position-absolute start-0 top-0 w-100 h-100 bg-gradient-dark opacity-50">
                                    </div>
                                    <div class="position-absolute start-0 top-0 w-100 pt-3 px-3">
                                        <span class="badge bg-primary">For Sale</span>
                                    </div>
                                    <div
                                        class="text-white d-flex justify-content-between w-100 px-3 pb-4 position-absolute start-0 bottom-0 w-100 h-100 align-items-end">
                                        <div class="flex-grow-1 overflow-hidden pe-4">
                                            <h5 class="mb-3">$453,675</h5>
                                            <!--Location-->
                                            <p class="mb-0 d-flex">
                                                <i class="bx bxs-map me-1"></i>
                                                <span class="small text-truncate">Manchester</span>
                                            </p>
                                        </div>
                                        <!--Agent-->
                                        <div class="d-flex align-items-center flex-shrink-0">
                                            <img src="{{ URL::asset('assets/img/avatar/1.jpg') }}" alt=""
                                                class="flex-shrink-0 flex-shrink-0 avatar sm rounded-circle me-2 img-fluid">
                                            <span class="small">
                                                Sonia
                                            </span>
                                        </div>
                                    </div>
                                </a>
                                <div class="card-body pt-4">
                                    <a href="{{ URL::asset('#!') }}" class="text-dark d-block mb-4">
                                        <h5>Villa in Coral Gables</h5>
                                    </a>
                                    <div class="row">
                                        <div class="col-3" data-bs-toggle="tooltip" data-bs-placement="top" title=""
                                            data-bs-original-title="Bedrooms">
                                            <div class="d-flex align-items-center">
                                                <i class="bx bx-bed fs-5 me-2"></i>
                                                <strong class="small">4</strong>
                                            </div>
                                        </div>
                                        <div class="col-3 border-start border-end" data-bs-toggle="tooltip"
                                            data-bs-placement="top" title="" data-bs-original-title="Bathrooms">
                                            <div class="d-flex align-items-center">
                                                <i class="bx bx-bath fs-5 me-2"></i>
                                                <strong class="small">2</strong>
                                            </div>
                                        </div>
                                        <div class="col-6" data-bs-toggle="tooltip" data-bs-placement="top" title=""
                                            data-bs-original-title="Area">
                                            <div class="d-flex align-items-center">
                                                <i class="bx bx-area fs-5 me-2"></i>
                                                <strong class="small">6400 Sq Ft</strong>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-10 mb-5 mb-lg-0">
                            <!--Card-property-2-->
                            <div class="position-relative">
                                <a href="{{ URL::asset('#!') }}" class="d-block card-hover overflow-hidden rounded-4 position-relative">
                                    <!--Image-->
                                    <img src="{{ URL::asset('assets/img/estate/listing/2.jpg') }}" class="img-fluid rounded-4 img-zoom"
                                        alt="">
                                    <!--Background-->
                                    <div
                                        class="position-absolute start-0 top-0 w-100 h-100 bg-gradient-dark opacity-75">
                                    </div>
                                    <div class="position-absolute start-0 top-0 w-100 pt-3 px-3">
                                        <span class="badge text-bg-warning">For Rent</span>
                                    </div>
                                    <div
                                        class="text-white d-flex justify-content-between w-100 px-3 pb-4 position-absolute start-0 bottom-0 w-100 h-100 align-items-end">
                                        <div class="flex-grow-1 overflow-hidden pe-4">
                                            <h5 class="mb-3">$953,000</h5>
                                            <!--Location-->
                                            <p class="mb-0 d-flex">
                                                <i class="bx bxs-map me-1"></i>
                                                <span class="small text-truncate">Liverpool</span>
                                            </p>
                                        </div>
                                        <!--Agent-->
                                        <div class="d-flex align-items-center flex-shrink-0">
                                            <img src="{{ URL::asset('assets/img/avatar/2.jpg') }}" alt=""
                                                class="flex-shrink-0 flex-shrink-0 avatar sm rounded-circle me-2 img-fluid">
                                            <span class="small">
                                                Monika
                                            </span>
                                        </div>
                                    </div>
                                </a>
                                <div class="card-body pt-4">
                                    <a href="{{ URL::asset('#!') }}" class="text-dark d-block mb-4">
                                        <h5>Located in the heart of city</h5>
                                    </a>
                                    <div class="row">
                                        <div class="col-3" data-bs-toggle="tooltip" data-bs-placement="top" title=""
                                            data-bs-original-title="Bedrooms">
                                            <div class="d-flex align-items-center">
                                                <i class="bx bx-bed fs-5 me-2"></i>
                                                <strong class="small">4</strong>
                                            </div>
                                        </div>
                                        <div class="col-3 border-start border-end" data-bs-toggle="tooltip"
                                            data-bs-placement="top" title="" data-bs-original-title="Bathrooms">
                                            <div class="d-flex align-items-center">
                                                <i class="bx bx-bath fs-5 me-2"></i>
                                                <strong class="small">2</strong>
                                            </div>
                                        </div>
                                        <div class="col-6" data-bs-toggle="tooltip" data-bs-placement="top" title=""
                                            data-bs-original-title="Area">
                                            <div class="d-flex align-items-center">
                                                <i class="bx bx-area fs-5 me-2"></i>
                                                <strong class="small">6400 Sq Ft</strong>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-10 mb-5 mb-lg-0">
                            <!--Card-property-2-->
                            <div class="position-relative">
                                <a href="{{ URL::asset('#!') }}" class="d-block card-hover overflow-hidden rounded-4 position-relative">
                                    <!--Image-->
                                    <img src="{{ URL::asset('assets/img/estate/listing/4.jpg') }}" class="img-fluid img-zoom" alt="">
                                    <!--Background-->
                                    <div
                                        class="position-absolute rounded-4 start-0 top-0 w-100 h-100 bg-gradient-dark opacity-50">
                                    </div>
                                    <div class="position-absolute start-0 top-0 w-100 pt-3 px-3">
                                        <span class="badge bg-primary">For Sale</span>
                                    </div>
                                    <div
                                        class="text-white d-flex justify-content-between w-100 px-3 pb-4 position-absolute start-0 bottom-0 w-100 h-100 align-items-end">
                                        <div class="flex-grow-1 overflow-hidden pe-4">
                                            <h5 class="mb-3">$399,000</h5>
                                            <!--Location-->
                                            <p class="mb-0 d-flex">
                                                <i class="bx bxs-map me-1"></i>
                                                <span class="small text-truncate">Bristol</span>
                                            </p>
                                        </div>
                                        <!--Agent-->
                                        <div class="d-flex align-items-center flex-shrink-0">
                                            <img src="{{ URL::asset('assets/img/avatar/6.jpg') }}" alt=""
                                                class="flex-shrink-0 flex-shrink-0 avatar sm rounded-circle me-2 img-fluid">
                                            <span class="small">
                                                Adam
                                            </span>
                                        </div>
                                    </div>
                                </a>
                                <div class="card-body pt-4">
                                    <a href="{{ URL::asset('#!') }}" class="text-dark d-block mb-4">
                                        <h5>Standing in the heart of the city</h5>
                                    </a>
                                    <div class="row">
                                        <div class="col-3" data-bs-toggle="tooltip" data-bs-placement="top" title=""
                                            data-bs-original-title="Bedrooms">
                                            <div class="d-flex align-items-center">
                                                <i class="bx bx-bed fs-5 me-2"></i>
                                                <strong class="small">4</strong>
                                            </div>
                                        </div>
                                        <div class="col-3 border-start border-end" data-bs-toggle="tooltip"
                                            data-bs-placement="top" title="" data-bs-original-title="Bathrooms">
                                            <div class="d-flex align-items-center">
                                                <i class="bx bx-bath fs-5 me-2"></i>
                                                <strong class="small">2</strong>
                                            </div>
                                        </div>
                                        <div class="col-6" data-bs-toggle="tooltip" data-bs-placement="top" title=""
                                            data-bs-original-title="Area">
                                            <div class="d-flex align-items-center">
                                                <i class="bx bx-area fs-5 me-2"></i>
                                                <strong class="small">6400 Sq Ft</strong>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="position-relative overflow-hidden">
                <!--Circle line-->
                <div class="position-absolute start-0 bottom-0 mb-n4 h-100 w-50 text-warning rellax" data-rellax-percentage=".75" data-rellax-speed="1">
                    <svg class="flip-x w-100 h-auto" width="324"
                    height="324" viewBox="0 0 324 324" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M324 0.999969C281.583 0.999971 239.581 9.35461 200.393 25.5869C161.205 41.8192 125.598 65.6112 95.6045 95.6045C65.6112 125.598 41.8192 161.205 25.5869 200.393C9.35463 239.581 0.999996 281.583 1 324"
                        stroke-width=".5" stroke="currentColor" />
                </svg>
                </div>
                <div class="container py-9 py-lg-11 position-relative">
                    <div class="row align-items-center">
                        <div class="col-lg-6 mb-5 mb-md-0" data-aos="fade-up" data-aos-delay="100">
                            <div class="position-relative ps-12 pb-12">
                                <img src="{{ URL::asset('assets/img/estate/listing/4.jpg') }}" class="img-fluid rounded-4" alt="">
                                <img src="{{ URL::asset('assets/img/estate/listing/2.jpg') }}"
                                    class="img-fluid w-50 rounded-4 position-absolute bottom-0 start-0 ml-3 rellax" data-rellax-speed="1" data-rellax-percentage=".5" alt="">
                            </div>
                        </div>
                        <div class="col-lg-6 ms-lg-auto">
                            <h5 class="display-6 mb-4" data-aos="fade-up" data-aos-delay="100">Our Vision</h5>
                            <p class="lead" data-aos="fade-up" data-aos-delay="150">
                                As a team, we develop solutions to meet the highest requirements.
                                We not only keep up with the times, but are always one step ahead of the requirements
                                and innovation standards. We are the source of ideas.
                            </p>
                        </div>
                    </div>
                </div>
            </section>

            <section class="position-relative overflow-hidden">
                <!--Circle line-->
                <svg class="position-absolute end-0 bottom-0 h-75 w-auto text-primary" width="324" height="324"
                    viewBox="0 0 324 324" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M324 0.999969C281.583 0.999971 239.581 9.35461 200.393 25.5869C161.205 41.8192 125.598 65.6112 95.6045 95.6045C65.6112 125.598 41.8192 161.205 25.5869 200.393C9.35463 239.581 0.999996 281.583 1 324"
                        stroke-width=".5" stroke="currentColor" />
                </svg>

                <div class="container py-9 py-lg-11 position-relative z-1">

                    <!--Masonry layout-->
                    <div class="row" data-isotope='{"layoutMode":"masonry"}'>
                        <!--Masonry-Grid-item-->
                        <div class="col-md-4 col-6 mb-4 grid-item">
                            <h3 class="display-6 mb-3" data-aos="fade-up">
                                Popular Places
                            </h3>
                            <p data-aos="fade-up" data-aos-delay="100">
                                Most popular places, Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                            </p>
                        </div>
                        <!--Masonry-Grid-item-->
                        <div data-aos="fade-up" class="col-md-4 col-6 mb-4 grid-item">
                            <a href="{{ URL::asset('#!') }}"
                                class="position-relative card-hover overflow-hidden card border hover-lift hover-shadow-xl rounded-4 border-0">
                                <div class="position-relative overflow-hidden">
                                    <img src="{{ URL::asset('assets/img/estate/cities/liverpool.jpg') }}" class="img-zoom img-fluid" alt="">
                                    <!--Overlay background-->
                                    <div
                                        class="bg-gradient-dark opacity-50 position-absolute start-0 top-0 w-100 h-100">
                                    </div>
                                    <!--Overlay content-->
                                    <div
                                        class="position-absolute start-0 text-white d-flex flex-column align-items-center justify-content-end top-0 w-100 h-100 p-2 p-md-4">
                                        <h5>Liverpool</h5>
                                        <p class="mb-0 opacity-75">766 Listings</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <!--Masonry-Grid-item-->
                        <div data-aos="fade-up" class="col-md-4 col-6 mb-4 grid-item">
                            <a href="{{ URL::asset('#!') }}"
                                class="position-relative card-hover overflow-hidden card border hover-lift hover-shadow-xl rounded-4 border-0">
                                <div class="position-relative overflow-hidden">
                                    <img src="{{ URL::asset('assets/img/estate/cities/bristol.jpg') }}" class="img-zoom img-fluid" alt="">
                                    <!--Overlay background-->
                                    <div
                                        class="bg-gradient-dark opacity-50 position-absolute start-0 top-0 w-100 h-100">
                                    </div>
                                    <!--Overlay content-->
                                    <div
                                        class="position-absolute start-0 text-white d-flex flex-column align-items-center justify-content-end top-0 w-100 h-100 p-2 p-md-4">
                                        <h5>Bristol</h5>
                                        <p class="mb-0 opacity-75">6412 Listings</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <!--Masonry-Grid-item-->
                        <div data-aos="fade-up" class="col-md-4 col-6 mb-4 grid-item">
                            <a href="{{ URL::asset('#!') }}"
                                class="position-relative card-hover overflow-hidden card border hover-lift hover-shadow-xl rounded-4 border-0">
                                <div class="position-relative overflow-hidden">
                                    <img src="{{ URL::asset('assets/img/estate/cities/birmingham.jpg') }}" class="img-zoom img-fluid"
                                        alt="">
                                    <!--Overlay background-->
                                    <div
                                        class="bg-gradient-dark opacity-50 position-absolute start-0 top-0 w-100 h-100">
                                    </div>
                                    <!--Overlay content-->
                                    <div
                                        class="position-absolute start-0 text-white d-flex flex-column align-items-center justify-content-end top-0 w-100 h-100 p-2 p-md-4">
                                        <h5>Birmingham</h5>
                                        <p class="mb-0 opacity-75">6412 Listings</p>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <!--Masonry-Grid-item-->
                        <div data-aos="fade-up" class="col-md-4 col-6 mb-4 grid-item">
                            <a href="{{ URL::asset('#!') }}"
                                class="position-relative card-hover overflow-hidden card border hover-lift hover-shadow-xl rounded-4 border-0">
                                <div class="position-relative overflow-hidden">
                                    <img src="{{ URL::asset('assets/img/estate/cities/manchester.jpg') }}" class="img-zoom img-fluid"
                                        alt="">
                                    <!--Overlay background-->
                                    <div
                                        class="bg-gradient-dark opacity-50 position-absolute start-0 top-0 w-100 h-100">
                                    </div>
                                    <!--Overlay content-->
                                    <div
                                        class="position-absolute start-0 text-white d-flex flex-column align-items-center justify-content-end top-0 w-100 h-100 p-2 p-md-4">
                                        <h5>Manchester</h5>
                                        <p class="mb-0 opacity-75">3547 Listings</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <!--Masonry-Grid-item-->
                        <div data-aos="fade-up" class="col-md-4 col-6 mb-4 grid-item">
                            <a href="{{ URL::asset('#!') }}"
                                class="position-relative card-hover overflow-hidden card border hover-lift hover-shadow-xl rounded-4 border-0">
                                <div class="position-relative overflow-hidden">
                                    <img src="{{ URL::asset('assets/img/estate/cities/london.jpg') }}" class="img-zoom img-fluid" alt="">
                                    <!--Overlay background-->
                                    <div
                                        class="bg-gradient-dark opacity-50 position-absolute start-0 top-0 w-100 h-100">
                                    </div>
                                    <!--Overlay content-->
                                    <div
                                        class="position-absolute start-0 text-white d-flex flex-column align-items-center justify-content-end top-0 w-100 h-100 p-2 p-md-4">
                                        <h5>London</h5>
                                        <p class="mb-0 opacity-75">266 Listings</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </section>

            <section class="position-relative overflow-hidden bg-info bg-opacity-10">
                <div class="container w-lg-75 w-xl-60 py-9 py-lg-11">
                    <div class="row mb-5 mb-md-6 align-items-center">
                        <div class="col-md-8">
                            <h2 class="display-6 mb-4 mb-md-0">Testimonials</h2>
                        </div>
                        <div class="col-md-4">

                            <!-- Swiper navigation buttons -->
                            <div class="d-flex align-items-center justify-content-md-end">
                                <div
                                    class="swiper-button-prev position-relative m-0 me-2 start-0 bg-transparent text-primary border border-primary">
                                </div>
                                <div
                                    class="swiper-button-next position-relative m-0 end-0 bg-transparent text-primary border border-primary">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-testimonials mx-auto overflow-visible swiper-container">
                        <div class="swiper-wrapper">
                            <!--Slide-->
                            <div class="swiper-slide">
                                <div class="card bg-transparent border-0">
                                    <!--Text-->
                                    <div class="bg-body py-6 rounded-4 shadow-lg px-4 px-lg-9">
                                        <!--Quote icon and text-->
                                        <p class="fs-4 fw-semibold mb-4 mx-auto d-flex align-items-stretch">
                                            <i class='bx bxs-quote-alt-left fs-1 text-warning me-3'></i>
                                            <span>
                                                Thanks again for helping Ken and I find our NEW liverpool home. I cannot
                                            begin to describe how
                                            much this means as it was certainly one of the biggest hurdles we had to
                                            cross. You made our
                                            transition so much easier!!
                                            </span>
                                        </p>
                                    </div>
                                    <!--Meta-->
                                    <div class="position-relative mt-n6 text-center z-1">
                                        <img src="{{ URL::asset('assets/img/avatar/1.jpg') }}"
                                            class="avatar width-10x height-10x rounded-circle mb-3 p-1 bg-body"
                                            alt="">
                                        <h4 class="mb-1 h5">Jennifer Ken</h4>
                                        <small class="text-body-secondary">Customer from Liverpool</small>
                                    </div>
                                </div>
                            </div>
                            <!--Slide-->
                            <div class="swiper-slide">
                                <div class="card bg-transparent border-0">
                                     <!--Text-->
                                     <div class="bg-body py-6 rounded-4 shadow-lg px-4 px-lg-9">
                                        <!--Quote icon-->
                                        <p class="fs-4 fw-semibold mb-4 mx-auto d-flex align-items-stretch">
                                            <i class='bx bxs-quote-alt-left fs-1 text-warning me-3'></i>
                                            <span>
                                                You made our
                                            transition so much easier!!
                                            </span>
                                        </p>
                                    </div>
                                    <!--Meta-->
                                    <div class="position-relative mt-n6 text-center z-1">
                                        <img src="{{ URL::asset('assets/img/avatar/2.jpg') }}"
                                            class="avatar width-10x height-10x rounded-circle mb-3 p-1 bg-body"
                                            alt="">
                                            <h4 class="mb-1 h5">Emily Doe</h4>
                                        <small class="text-body-secondary">Customer from Manchester</small>
                                    </div>
                                </div>
                            </div>
                            <!--Slide-->
                            <div class="swiper-slide">
                                <div class="card bg-transparent border-0">
                                    <!--Text-->
                                    <div class="bg-body py-6 rounded-4 shadow-lg px-4 px-lg-9">
                                        <!--Quote icon-->
                                        <p class="fs-4 fw-semibold mb-4 mx-auto d-flex align-items-stretch">
                                            <i class='bx bxs-quote-alt-left fs-1 text-warning me-3'></i>
                                            <span>
                                                Thanks again for helping Ken and I find our NEW liverpool home. I cannot
                                            begin to describe how
                                            much this means as it was certainly one of the biggest hurdles we had to
                                            cross!!
                                            </span>
                                        </p>
                                    </div>
                                    <!--Meta-->
                                    <div class="position-relative mt-n6 text-center z-1">
                                        <img src="{{ URL::asset('assets/img/avatar/6.jpg') }}"
                                            class="avatar width-10x height-10x rounded-circle mb-3 p-1 bg-body"
                                            alt="">
                                            <h4 class="mb-1 h5">John Doe</h4>
                                        <small class="text-body-secondary">Customer from Bristol</small>
                                    </div>
                                </div>
                            </div>
                            <!--Slide-->
                            <div class="swiper-slide">
                                <div class="card bg-transparent border-0">
                                     <!--Text-->
                                     <div class="bg-body py-6 rounded-4 shadow-lg px-4 px-lg-9">
                                        <!--Quote icon-->
                                        <p class="fs-4 fw-semibold mb-4 mx-auto d-flex align-items-stretch">
                                            <i class='bx bxs-quote-alt-left fs-1 text-warning me-3'></i>
                                            <span>
                                              I cannot
                                            begin to describe how
                                            much this means as it was certainly one of the biggest hurdles we had to
                                            cross. You made our
                                            transition so much easier!!
                                            </span>
                                        </p>
                                    </div>
                                    <!--Meta-->
                                    <div class="position-relative mt-n6 text-center z-1">
                                        <img src="{{ URL::asset('assets/img/avatar/4.jpg') }}"
                                            class="avatar width-10x height-10x rounded-circle mb-3 p-1 bg-body"
                                            alt="">
                                            <h4 class="mb-1 h5">Kathrine Jenn</h4>
                                        <small class="text-body-secondary">Customer from London</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="border-bottom overflow-hidden">
                <div class="container py-9 py-lg-11">
                    <div class="d-flex flex-column flex-lg-row justify-content-lg-center align-items-lg-center">
                        <div class="flex-grow-1 mb-4 mb-lg-0">
                            <h2 class="mb-3 display-5" data-aos="fade-up" data-aos-delay="50">Let's find your dream home
                            </h2>
                            <p class="mb-0 fs-4" data-aos="fade-up" data-aos-delay="100">Give us a call to <a
                                    href="{{ URL::asset('tel:123.456.7890') }}">123.456.7890</a>
                            </p>
                        </div>
                        <div class="flex-shrink-0" data-aos="fade-up" data-aos-delay="150">
                            <a href="{{ URL::asset('#!') }}" class="btn btn-lg btn-primary">Get in touch</a>
                        </div>
                    </div>
                </div>
            </section>
            <section class="overflow-hidden">
                <div class="container py-9 py-lg-11">
                    <h2 class="mb-4 display-6" data-aos="fade-up">Market blog</h2>
                    <div class="row">
                        <div class="col-md-4 mb-3" data-aos="fade-up">
                            <!--blog card-->
                            <div class="card hover-lift hover-shadow-xl rounded-4 p-2">
                                <img src="{{ URL::asset('assets/img/estate/listing/7.jpg') }}" class="img-fluid rounded-4" alt="">
                                <div class="card-body">
                                    <small class="text-body-secondary">03 Jan. 2022</small>
                                    <h4 class="mb-0">
                                        Excepteur sint occaecat cupidatat
                                    </h4>
                                </div>
                                <!--Link-->
                                <a href="{{ URL::asset('#!') }}" class="stretched-link"></a>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3" data-aos="fade-up" data-aos-delay="100">
                            <!--blog card-->
                            <div class="card hover-lift hover-shadow-xl rounded-4 p-2">
                                <img src="{{ URL::asset('assets/img/estate/listing/8.jpg') }}" class="img-fluid rounded-4" alt="">
                                <div class="card-body">
                                    <small class="text-body-secondary">26 Feb. 2023</small>
                                    <h4 class="mb-0">
                                        Excepteur sint occaecat cupidatat
                                    </h4>
                                </div>
                                <!--Link-->
                                <a href="{{ URL::asset('#!') }}" class="stretched-link"></a>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3" data-aos="fade-up" data-aos-delay="150">
                            <!--blog card-->
                            <div class="card hover-lift hover-shadow-xl rounded-4 p-2">
                                <img src="{{ URL::asset('assets/img/estate/listing/1.jpg') }}" class="img-fluid rounded-4" alt="">
                                <div class="card-body">
                                    <small class="text-body-secondary">23 Dec. 2022</small>
                                    <h4 class="mb-0">
                                        Excepteur sint occaecat cupidatat
                                    </h4>
                                </div>
                                <!--Link-->
                                <a href="{{ URL::asset('#!') }}" class="stretched-link"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
</x-assan-layout>
