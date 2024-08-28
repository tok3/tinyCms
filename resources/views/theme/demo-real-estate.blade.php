<x-assan-layout layout-type="{{$layoutType}}">
            <!--hero-->
            <section class="position-relative">
                <div class="container pt-9 position-relative z-1">
                    <div class="row pt-9 pt-lg-6 align-items-center">
                        <div class="col-lg-6 mb-6 mb-lg-0 position-relative z-2">
                            <!--Hero title-->
                            <h1 class="display-2 mb-4 me-lg-n15">
                                Inspired by Art<br>
                                Designed for living.
                            </h1>
                            <p class="fw-bolder mb-4 text-gradient"><strong>BUY. SELL . RENT Property</strong></p>
                            <!--Search form-->
                            <form class="position-relative me-lg-n15 p-3 bg-body-tertiary rounded shadow-sm">
                                <div class="row g-2 mx-0 align-items-end">
                                    <div class="col-md-6 col-lg-3">
                                        <label for="p_type" class="form-label small text-body-secondary block">Property
                                            type:</label>
                                        <select class="form-control pe-5"
                                            data-choices='{"searchEnabled":false,"itemSelectText":""}' name="p_type"
                                            id="p_type">
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
                                        <select class="form-control pe-5"
                                            data-choices='{"searchEnabled":false,"itemSelectText":""}' name="p_for"
                                            id="p_type">
                                            <option value="Rent">For Rent</option>
                                            <option value="Sale">For Sale</option>
                                        </select>
                                    </div>
                                    <div class="col-md-9 col-lg-4">
                                        <label for="p_location" class="form-label small text-body-secondary">Location:</label>
                                        <div class="position-relative">
                                            <i
                                                class="bx bxs-map small ms-3 opacity-50 position-absolute start-0 top-50 translate-middle-y"></i>
                                            <input type="text" id="p_location" class="form-control ps-6"
                                                placeholder="Location...">
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-lg-2 text-md-end">
                                        <button type="submit" class="btn btn-primary btn-blur position-relative overflow-hidden w-100">
                                            <span class="btn-blur-circle bg-white bg-opacity-50"></span>
                                           <span class="position-relative">
                                            <i class="bx bx-search"></i>
                                           </span>
                                        </button>
                                    </div>
                                </div>
                            </form>
                            <small class="text-body-secondary pt-3 pt-lg-4 d-block mb-5">
                                Over 247,000 listings
                            </small>
                            <div class="row">
                                <div class="col-sm-6 col-lg-5 mb-3 mb-sm-0">
                                    <!--Facts-->
                                <div
                                class="px-4 py-3 bg-info text-white rounded-3">
                                <!--Countup-->
                                <h2 data-countup='{"startVal": 0,"suffix":"k"}' data-to="148" data-aos
                                    data-aos-id="countup:in" class="mb-1 display-5">0</h2>
                                <!--text-->
                                <div class="small">Properties listed</div>
                            </div>
                                </div>
                                <div class="col-sm-6 col-lg-5 mb-3 mb-sm-0">
                                    <!--Facts-->
                                <div
                                class="px-4 py-3 bg-warning text-dark rounded-3">
                                <!--Countup-->
                                <h2 data-countup='{"startVal": 0,"suffix":"%"}' data-to="99" data-aos
                                    data-aos-id="countup:in" class="mb-1 display-5">0</h2>
                                <!--text-->
                                <div class="small">Satisfied buyers</div>
                            </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 position-relative">
                            <div class="position-relative">
                                <img src="{{ URL::asset('assets/img/estate/960x1140/1.jpg') }}" class="img-fluid rounded-bottom" alt="">
                                <!--Home shapes-->
                                <svg class="position-absolute start-0 top-0 w-100 h-auto" style="color: var(--bs-body-bg);" width="960"
                                    height="600" viewBox="0 0 960 600" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M0 0H480L0 600V0Z" fill="currentColor" />
                                    <path d="M960 0H480L960 600V0Z" fill="currentColor" />
                                </svg>
                               
                            </div>
                        </div>
                    </div>
            </section>

            <section class="pt-9">
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
                                <a href="{{ URL::asset('#!') }}" class="d-block card-hover rounded overflow-hidden">
                                    <!--Image-->
                                    <img src="{{ URL::asset('assets/img/estate/listing/1.jpg') }}" class="img-fluid img-zoom rounded"
                                        alt="">
                                    <!--overlay-->
                                    <div
                                        class="position-absolute start-0 top-0 w-100 h-100 bg-gradient-dark opacity-50">
                                    </div>
                                    <!--badge-->
                                    <div class="position-absolute start-0 top-0 w-100 pt-3 px-3">
                                        <span class="badge rounded-pill text-bg-primary">For Sale</span>
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
                                    <a href="{{ URL::asset('#!') }}" class="d-block mb-4">
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
                                <a href="{{ URL::asset('#!') }}" class="d-block rounded card-hover overflow-hidden position-relative">
                                    <!--Image-->
                                    <img src="{{ URL::asset('assets/img/estate/listing/2.jpg') }}" class="img-fluid img-zoom rounded"
                                        alt="">
                                    <!--overlay-->
                                    <div
                                        class="position-absolute start-0 top-0 w-100 h-100 bg-gradient-dark opacity-75">
                                    </div>
                                    <!--Badge-->
                                    <div class="position-absolute start-0 top-0 w-100 pt-3 px-3">
                                        <span class="badge rounded-pill text-bg-warning">For Rent</span>
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
                                    <a href="{{ URL::asset('#!') }}" class="d-block mb-4">
                                        <h5>Located in the Heart of City</h5>
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
                                <a href="{{ URL::asset('#!') }}" class="d-block card-hover overflow-hidden position-relative">
                                    <!--Image-->
                                    <img src="{{ URL::asset('assets/img/estate/listing/4.jpg') }}" class="img-fluid img-zoom rounded"
                                        alt="">
                                    <!--overlay-->
                                    <div
                                        class="position-absolute start-0 top-0 w-100 h-100 bg-gradient-dark opacity-50">
                                    </div>
                                    <!--Badge-->
                                    <div class="position-absolute start-0 top-0 w-100 pt-3 px-3">
                                        <span class="badge rounded-pill text-bg-primary">For Sale</span>
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
                                    <a href="{{ URL::asset('#!') }}" class="d-block mb-4">
                                        <h5>Standing in the Heart of the City</h5>
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
                <svg class="position-absolute start-0 flip-x bottom-0 mb-n4 h-100 w-auto text-warning" width="324"
                    height="324" viewBox="0 0 324 324" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M324 0.999969C281.583 0.999971 239.581 9.35461 200.393 25.5869C161.205 41.8192 125.598 65.6112 95.6045 95.6045C65.6112 125.598 41.8192 161.205 25.5869 200.393C9.35463 239.581 0.999996 281.583 1 324"
                        stroke-width=".5" stroke="currentColor" />
                </svg>
                <div class="container py-9 py-lg-11 position-relative">
                    <div class="row">
                        <div class="col-md-3 mb-5 mb-md-0">
                            <h5 class="display-6" data-aos="fade-up" data-aos-delay="100">Vision
                            </h5>
                        </div>
                        <div class="col-lg-6 col-md-7 mx-lg-auto" data-aos="fade-down" data-aos-delay="200">
                            <h3 class="fs-2 fw-medium">
                                As a team, we develop solutions to meet the highest requirements.
                                We not only keep up with the times, but are always one step ahead of the requirements
                                and innovation standards. We are the source of ideas.
                            </h3>
                        </div>
                    </div>
                </div>
            </section>

            <section class="position-relative overflow-hidden">
                <!--Circle line-->
                <svg class="position-absolute end-0 bottom-0 h-75 w-auto" style="color: var(--bs-secondary-bg);" width="324" height="324"
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
                                class="position-relative card-hover overflow-hidden card border hover-lift hover-shadow-xl border-0">
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
                                class="position-relative card-hover overflow-hidden card border hover-lift hover-shadow-xl border-0">
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
                                class="position-relative card-hover overflow-hidden card border hover-lift hover-shadow-xl border-0">
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
                                class="position-relative card-hover overflow-hidden card border hover-lift hover-shadow-xl border-0">
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
                                class="position-relative card-hover overflow-hidden card border hover-lift hover-shadow-xl border-0">
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

            <section class="position-relative overflow-hidden bg-body-tertiary">
                <div class="container py-9 py-lg-11">
                    <div class="row mb-5 mb-md-6 align-items-center">
                        <div class="col-md-8">
                            <h2 class="display-6 mb-2">What people say</h2>
                            <p class="lead mb-4">We are committed to making our clients happy with our services</p>
                        </div>
                        <div class="col-md-4">

                            <!-- Swiper navigation buttons -->
                            <div class="d-flex align-items-center justify-content-md-end">
                                <div
                                    class="swiper-button-prev position-relative m-0 me-2 start-0 bg-transparent text-body">
                                </div>
                                <div
                                    class="swiper-button-next position-relative m-0 end-0 bg-transparent text-body">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-testimonials overflow-visible swiper-container">
                        <div class="swiper-wrapper">
                            <!--Slide-->
                            <div class="swiper-slide">
                                <div class="card border-0">
                                    <!--Text-->
                                    <div class="py-6 text-center rounded shadow-lg px-4 px-lg-6">
                                        <!--Quote icon and text-->
                                        <p class="lead fw-medium mb-4">
                                            <i class='bx bxs-quote-alt-left fs-1 text-warning mb-3 d-block'></i>
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
                                    <div class="position-relative mt-n6 text-center z-1 pb-4">
                                        <img src="{{ URL::asset('assets/img/avatar/1.jpg') }}"
                                            class="avatar lg rounded-circle mb-3 p-1" alt="">
                                        <h5 class="mb-1">Jennifer Ken</h5>
                                        <small class="text-body-secondary">Customer from Liverpool</small>
                                    </div>
                                </div>
                            </div>
                            <!--Slide-->
                            <div class="swiper-slide">
                                <div class="card border-0">
                                    <!--Text-->
                                    <div class="py-6 text-center rounded shadow-lg px-4 px-lg-6">
                                        <!--Quote icon and text-->
                                        <p class="lead fw-medium mb-4">
                                            <i class='bx bxs-quote-alt-left fs-1 text-warning mb-3 d-block'></i>
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
                                    <div class="position-relative mt-n6 text-center z-1 pb-4">
                                        <img src="{{ URL::asset('assets/img/avatar/2.jpg') }}"
                                            class="avatar lg rounded-circle mb-3 p-1" alt="">
                                        <h5 class="mb-1">Emily Doe</h5>
                                        <small class="text-body-secondary">Customer from Manchester</small>
                                    </div>
                                </div>
                            </div>
                            <!--Slide-->
                            <div class="swiper-slide">
                                <div class="card border-0">
                                    <!--Text-->
                                    <div class="py-6 text-center rounded shadow-lg px-4 px-lg-6">
                                        <!--Quote icon and text-->
                                        <p class="lead fw-medium mb-4">
                                            <i class='bx bxs-quote-alt-left fs-1 text-warning mb-3 d-block'></i>
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
                                    <div class="position-relative mt-n6 text-center z-1 pb-4">
                                        <img src="{{ URL::asset('assets/img/avatar/6.jpg') }}"
                                            class="avatar lg rounded-circle mb-3 p-1" alt="">
                                        <h5 class="mb-1">John Doe</h5>
                                        <small class="text-body-secondary">Customer from Bristol</small>
                                    </div>
                                </div>
                            </div>
                            <!--Slide-->
                            <div class="swiper-slide">
                                <div class="card border-0">
                                    <!--Text-->
                                    <div class="py-6 text-center rounded shadow-lg px-4 px-lg-6">
                                        <!--Quote icon and text-->
                                        <p class="lead fw-medium mb-4">
                                            <i class='bx bxs-quote-alt-left fs-1 text-warning mb-3 d-block'></i>
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
                                    <div class="position-relative mt-n6 text-center z-1 pb-4">
                                        <img src="{{ URL::asset('assets/img/avatar/4.jpg') }}"
                                            class="avatar lg rounded-circle mb-3 p-1" alt="">
                                        <h5 class="mb-1">Kathrine Jenn</h5>
                                        <small class="text-body-secondary">Customer from London</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="overflow-hidden">
                <div class="container py-9 py-lg-11">
                    <h2 class="mb-5 display-6" data-aos="fade-up">Market blog</h2>
                    <div class="row">
                        <div class="col-md-4 mb-3" data-aos="fade-up">
                            <!--blog card-->
                            <div class="card hover-lift hover-shadow-xl shadow-sm border-0">
                                <img src="{{ URL::asset('assets/img/estate/listing/7.jpg') }}" class="img-fluid rounded-top" alt="">
                                <div class="card-body p-4">
                                    <small class="text-body-secondary">03 Jan. 2022</small>
                                    <h5 class="mb-0">
                                        Excepteur sint occaecat cupidatat
                                    </h5>
                                </div>
                                <!--Link-->
                                <a href="{{ URL::asset('#!') }}" class="stretched-link"></a>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3" data-aos="fade-up" data-aos-delay="100">
                            <!--blog card-->
                            <div class="card hover-lift hover-shadow-xl shadow-sm order-0">
                                <img src="{{ URL::asset('assets/img/estate/listing/8.jpg') }}" class="img-fluid rounded-top" alt="">
                                <div class="card-body p-4">
                                    <small class="text-body-secondary">28 Dec. 2021</small>
                                    <h5 class="mb-0">
                                        Excepteur sint occaecat cupidatat
                                    </h5>
                                </div>
                                <!--Link-->
                                <a href="{{ URL::asset('#!') }}" class="stretched-link"></a>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3" data-aos="fade-up" data-aos-delay="150">
                            <!--blog card-->
                            <div class="card hover-lift hover-shadow-xl shadow-sm border-0">
                                <img src="{{ URL::asset('assets/img/estate/listing/1.jpg') }}" class="img-fluid rounded-top" alt="">
                                <div class="card-body p-4">
                                    <small class="text-body-secondary">23 Dec. 2021</small>
                                    <h5 class="mb-0">
                                        Excepteur sint occaecat cupidatat
                                    </h5>
                                </div>
                                <!--Link-->
                                <a href="{{ URL::asset('#!') }}" class="stretched-link"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!--CTA-->
            <section class="overflow-hidden position-relative">
                <!--half bg-->
                <div class="position-absolute start-0 bottom-0 h-50 bg-dark w-100"></div>
                <div class="container pt-5 position-relative">
                    <div class="bg-body-tertiary position-relative px-4 py-7 rounded-4 shadow-xl">
                        <div class="row align-items-center position-relative justify-content-center">
                            <div class="col-md-8 col-lg-7 mb-5 mb-md-0">
                                <h2 class="mb-3 display-6" data-aos="fade-up" data-aos-delay="50">
                                    Let's find your dream home</h2>
                                <p class="mb-0 fs-4" data-aos="fade-up" data-aos-delay="100">Give us a call to 
                                    <a class="link-hover-underline" href="{{ URL::asset('tel:123.456.7890') }}">123.456.7890</a>
                                </p>
                            </div>
                            <div class="col-md-4 col-lg-3 text-md-end" data-aos="fade-up" data-aos-delay="150">
                                <a href="{{ URL::asset('#!') }}" class="btn btn-lg btn-primary btn-blur position-relative overflow-hidden">
                                    <span class="btn-blur-circle bg-white bg-opacity-75"></span>
                                   <span class="position-relative">
                                    Get in touch
                                   </span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

</x-assan-layout>
