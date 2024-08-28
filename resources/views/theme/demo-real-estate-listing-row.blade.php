<x-assan-layout layout-type="{{$layoutType}}">
            <!--hero-->
            <section class="position-relative overflow-hidden border-bottom border-primary">
                <svg class="position-absolute start-50 bottom-0 w-auto text-primary" width="301" height="104%"
                    viewBox="0 0 301 301" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M0.999879 301C0.999881 261.603 8.7596 222.593 23.836 186.195C38.9124 149.797 61.0103 116.726 88.8678 88.8679C116.725 61.0104 149.797 38.9125 186.195 23.8361C222.593 8.75972 261.603 0.999997 301 1"
                        stroke="currentColor" />
                </svg>

                <div class="container pt-12 pb-12 position-relative z-1">
                    <div class="row pt-5 pt-lg-7 justify-content-between align-items-center">
                        <div class="col-lg-10 col-xl-8">
                            <h6 class="text-body-secondary mb-3">Over 2500+</h6>
                            <h1 class="display-4 mb-0">
                                Properties listed
                            </h1>
                        </div>
                    </div>
                </div>
            </section>

            <section class="sticky-lg-top top-0">
                <div class="container">
                    
                    <form class="position-relative z-1 mt-n9 mt-lg-n7 px-3 pb-3 pb-lg-0 pt-2 mb-5 bg-body border border-primary rounded-3">
                        <div class="row mx-0 g-2 align-items-center">
                            <div class="col-md-6 col-lg-3">
                                <label for="p_type" class="form-label small text-body-secondary block mb-0">Property type:</label>
                                <select class="form-control form-control-lg border-0 shadow-none ps-0 pe-5" data-choices='{"searchEnabled":false,"itemSelectText":""}' name="p_type" id="p_type">
                                    <option value="Any type" selected>Any type</option>
                                    <option value="Villa">Villa</option>
                                    <option value="Apartment">Apartment</option>
                                    <option value="Office">Office</option>
                                    <option value="Parking">Parking</option>
                                </select>
                            </div>
                            <div class="col-md-6 col-lg-3">
                                <label for="p_for" class="form-label small text-body-secondary block mb-0">Property for:</label>
                                <select data-choices='{"searchEnabled":false,"itemSelectText":""}' class="form-control form-control-lg border-0 shadow-none ps-0 pe-5" name="p_for" id="p_type">
                                    <option value="Rent">For Rent</option>
                                    <option value="Sale">For Sale</option>
                                </select>
                            </div>
                            <div class="col-md-9 col-lg-4">
                                <label for="p_location" class="form-label small text-body-secondary">Location:</label>
                                <div class="position-relative">
                                    <i
                                        class="bx bxs-map small ms-0 opacity-50 position-absolute start-0 top-50 translate-middle-y"></i>
                                    <input type="text" id="p_location" class="form-control  border-0 shadow-none form-control-lg ps-4"
                                        placeholder="Location...">
                                </div>
                            </div>
                            <div class="col-md-3 col-lg-2 text-md-end">
                                <button type="submit" class="btn btn-primary btn-lg w-100">
                                    Apply Filter
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </section>

            <section class="position-relative">
                <div class="container py-9 py-lg-11">
                    <div class="row mb-4">
                        <div class="col-6">
                            <small>Showing 9 of 2400+ listings</small>
                        </div>
                        <div class="col-6 text-end">
                           <div class="btn-group ms-auto btn-group-sm">
                               <a class="btn btn-outline-secondary rounded-end-0 rounded-pill active" href="{{ URL::asset('demo-real-estate-listing-row.html') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="currentColor"><path d="M10 18h4v-2h-4v2zM3 6v2h18V6H3zm3 7h12v-2H6v2z"/></svg>
                               </a>
                               <a class="btn btn-outline-secondary rounded-start-0 rounded-pill" href="{{ URL::asset('demo-real-estate-listing-grid.html') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="currentColor"><path d="M3,3v8h8V3H3z M9,9H5V5h4V9z M3,13v8h8v-8H3z M9,19H5v-4h4V19z M13,3v8h8V3H13z M19,9h-4V5h4V9z M13,13v8h8v-8H13z M19,19h-4v-4h4V19z"/></svg>
                            </a>
                           </div>
                        </div>
                    </div>
                    <!--Property-item-row-->
                    <div class="card rounded-3 mb-5 p-2 align-items-lg-center flex-lg-row d-flex" data-aos="fade-up">
                        <div class="col-lg-5">
                            <a href="{{ URL::asset('#!') }}"
                                class="d-block overflow-hidden rounded-3">
                                <img src="{{ URL::asset('assets/img/estate/listing/1.jpg') }}" class="img-fluid" alt="">
                            </a>
                        </div>
                        <div class="card-body overflow-hidden p-4 px-lg-5 flex-grow-1">
                            <span class="badge text-bg-primary mb-3">For Sale</span>
                            <a href="{{ URL::asset('#!') }}" class="text-dark d-block mb-4">
                                <h4>Villa in Coral Gables</h4>
                            </a>
                            <div class="row mb-3 mb-lg-4">
                                <div class="col-3" data-bs-toggle="tooltip" data-bs-placement="top" title=""
                                    data-bs-original-title="Bedrooms">
                                    <div class="d-flex align-items-center">
                                     <i class="bx bx-bed fs-5 me-2"></i>
                                        <strong class="small">4</strong>
                                    </div>
                                </div>
                                <div class="col-3 border-start border-end" data-bs-toggle="tooltip" data-bs-placement="top" title=""
                                    data-bs-original-title="Bathrooms">
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
                            <p class="mb-4 mb-lg-5 text-truncate">
                                Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
                                mollit anim id est laborum.
                            </p>
                            <div class="row justify-content-between justify-content-lg-start">

                                <div class="col-6">
                                    <!--Price-->
                                    <h4>$983,000</h4>
                                </div>
                                <div class="col-6">
                                    <!--Agent-->
                                    <div
                                        class="d-flex align-items-center justify-content-end justify-content-lg-start flex-shrink-0">
                                        <img src="{{ URL::asset('assets/img/avatar/2.jpg') }}" alt=""
                                            class="flex-shrink-0 flex-shrink-0 avatar sm rounded-circle me-2 img-fluid">
                                        <span class="small">
                                            Monika
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                     <!--Property-item-row-->
                     <div class="card rounded-3 p-2 mb-5 align-items-lg-center flex-lg-row d-flex" data-aos="fade-up">
                        <div class="col-lg-5">
                            <a href="{{ URL::asset('#!') }}"
                                class="d-block overflow-hidden rounded-3">
                                <img src="{{ URL::asset('assets/img/estate/listing/2.jpg') }}" class="img-fluid" alt="">
                            </a>
                        </div>
                        <div class="card-body overflow-hidden p-4 px-lg-5 flex-grow-1">
                            <span class="badge text-bg-primary mb-3">For Sale</span>
                            <a href="{{ URL::asset('#!') }}" class="text-dark d-block mb-4">
                                <h4>Villa in Coral Gables</h4>
                            </a>
                            <div class="row mb-3 mb-lg-4">
                                <div class="col-3" data-bs-toggle="tooltip" data-bs-placement="top" title=""
                                    data-bs-original-title="Bedrooms">
                                    <div class="d-flex align-items-center">
                                     <i class="bx bx-bed fs-5 me-2"></i>
                                        <strong class="small">4</strong>
                                    </div>
                                </div>
                                <div class="col-3 border-start border-end" data-bs-toggle="tooltip" data-bs-placement="top" title=""
                                    data-bs-original-title="Bathrooms">
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
                            <p class="mb-4 mb-lg-5 text-truncate">
                                Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
                                mollit anim id est laborum.
                            </p>
                            <div class="row justify-content-between justify-content-lg-start">

                                <div class="col-6">
                                    <!--Price-->
                                    <h4>$983,000</h4>
                                </div>
                                <div class="col-6">
                                    <!--Agent-->
                                    <div
                                        class="d-flex align-items-center justify-content-end justify-content-lg-start flex-shrink-0">
                                        <img src="{{ URL::asset('assets/img/avatar/2.jpg') }}" alt=""
                                            class="flex-shrink-0 flex-shrink-0 avatar sm rounded-circle me-2 img-fluid">
                                        <span class="small">
                                            Monika
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                     <!--Property-item-row-->
                     <div class="card rounded-3 p-2 mb-5 align-items-lg-center flex-lg-row d-flex" data-aos="fade-up">
                        <div class="col-lg-5">
                            <a href="{{ URL::asset('#!') }}"
                                class="d-block overflow-hidden rounded-4">
                                <img src="{{ URL::asset('assets/img/estate/listing/3.jpg') }}" class="img-fluid" alt="">
                            </a>
                        </div>
                        <div class="card-body overflow-hidden p-4 px-lg-5 flex-grow-1">
                            <span class="badge text-bg-primary mb-3">For Sale</span>
                            <a href="{{ URL::asset('#!') }}" class="text-dark d-block mb-4">
                                <h4>Villa in Coral Gables</h4>
                            </a>
                            <div class="row mb-3 mb-lg-4">
                                <div class="col-3" data-bs-toggle="tooltip" data-bs-placement="top" title=""
                                    data-bs-original-title="Bedrooms">
                                    <div class="d-flex align-items-center">
                                     <i class="bx bx-bed fs-5 me-2"></i>
                                        <strong class="small">4</strong>
                                    </div>
                                </div>
                                <div class="col-3 border-start border-end" data-bs-toggle="tooltip" data-bs-placement="top" title=""
                                    data-bs-original-title="Bathrooms">
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
                            <p class="mb-4 mb-lg-5 text-truncate">
                                Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
                                mollit anim id est laborum.
                            </p>
                            <div class="row justify-content-between justify-content-lg-start">

                                <div class="col-6">
                                    <!--Price-->
                                    <h4>$983,000</h4>
                                </div>
                                <div class="col-6">
                                    <!--Agent-->
                                    <div
                                        class="d-flex align-items-center justify-content-end justify-content-lg-start flex-shrink-0">
                                        <img src="{{ URL::asset('assets/img/avatar/2.jpg') }}" alt=""
                                            class="flex-shrink-0 flex-shrink-0 avatar sm rounded-circle me-2 img-fluid">
                                        <span class="small">
                                            Monika
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                     <!--Property-item-row-->
                     <div class="card rounded-3 p-2 mb-5 align-items-lg-center flex-lg-row d-flex" data-aos="fade-up">
                        <div class="col-lg-5">
                            <a href="{{ URL::asset('#!') }}"
                                class="d-block overflow-hidden rounded-3">
                                <img src="{{ URL::asset('assets/img/estate/listing/4.jpg') }}" class="img-fluid" alt="">
                            </a>
                        </div>
                        <div class="card-body overflow-hidden p-4 px-lg-5 flex-grow-1">
                            <span class="badge text-bg-primary mb-3">For Sale</span>
                            <a href="{{ URL::asset('#!') }}" class="text-dark d-block mb-4">
                                <h4>Villa in Coral Gables</h4>
                            </a>
                            <div class="row mb-3 mb-lg-4">
                                <div class="col-3" data-bs-toggle="tooltip" data-bs-placement="top" title=""
                                    data-bs-original-title="Bedrooms">
                                    <div class="d-flex align-items-center">
                                     <i class="bx bx-bed fs-5 me-2"></i>
                                        <strong class="small">4</strong>
                                    </div>
                                </div>
                                <div class="col-3 border-start border-end" data-bs-toggle="tooltip" data-bs-placement="top" title=""
                                    data-bs-original-title="Bathrooms">
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
                            <p class="mb-4 mb-lg-5 text-truncate">
                                Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
                                mollit anim id est laborum.
                            </p>
                            <div class="row justify-content-between justify-content-lg-start">

                                <div class="col-6">
                                    <!--Price-->
                                    <h4>$983,000</h4>
                                </div>
                                <div class="col-6">
                                    <!--Agent-->
                                    <div
                                        class="d-flex align-items-center justify-content-end justify-content-lg-start flex-shrink-0">
                                        <img src="{{ URL::asset('assets/img/avatar/2.jpg') }}" alt=""
                                            class="flex-shrink-0 flex-shrink-0 avatar sm rounded-circle me-2 img-fluid">
                                        <span class="small">
                                            Monika
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                     <!--Property-item-row-->
                     <div class="card rounded-3 p-2 mb-5 align-items-lg-center flex-lg-row d-flex" data-aos="fade-up">
                        <div class="col-lg-5">
                            <a href="{{ URL::asset('#!') }}"
                                class="d-block overflow-hidden rounded-3">
                                <img src="{{ URL::asset('assets/img/estate/listing/5.jpg') }}" class="img-fluid" alt="">
                            </a>
                        </div>
                        <div class="card-body overflow-hidden p-4 px-lg-5 flex-grow-1">
                            <span class="badge text-bg-primary mb-3">For Sale</span>
                            <a href="{{ URL::asset('#!') }}" class="text-dark d-block mb-4">
                                <h4>Villa in Coral Gables</h4>
                            </a>
                            <div class="row mb-3 mb-lg-4">
                                <div class="col-3" data-bs-toggle="tooltip" data-bs-placement="top" title=""
                                    data-bs-original-title="Bedrooms">
                                    <div class="d-flex align-items-center">
                                     <i class="bx bx-bed fs-5 me-2"></i>
                                        <strong class="small">4</strong>
                                    </div>
                                </div>
                                <div class="col-3 border-start border-end" data-bs-toggle="tooltip" data-bs-placement="top" title=""
                                    data-bs-original-title="Bathrooms">
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
                            <p class="mb-4 mb-lg-5 text-truncate">
                                Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
                                mollit anim id est laborum.
                            </p>
                            <div class="row justify-content-between justify-content-lg-start">

                                <div class="col-6">
                                    <!--Price-->
                                    <h4>$983,000</h4>
                                </div>
                                <div class="col-6">
                                    <!--Agent-->
                                    <div
                                        class="d-flex align-items-center justify-content-end justify-content-lg-start flex-shrink-0">
                                        <img src="{{ URL::asset('assets/img/avatar/2.jpg') }}" alt=""
                                            class="flex-shrink-0 flex-shrink-0 avatar sm rounded-circle me-2 img-fluid">
                                        <span class="small">
                                            Monika
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                     <!--Property-item-row-->
                     <div class="card rounded-3 p-2 mb-5 align-items-lg-center flex-lg-row d-flex" data-aos="fade-up">
                        <div class="col-lg-5">
                            <a href="{{ URL::asset('#!') }}"
                                class="d-block overflow-hidden rounded-3">
                                <img src="{{ URL::asset('assets/img/estate/listing/6.jpg') }}" class="img-fluid" alt="">
                            </a>
                        </div>
                        <div class="card-body overflow-hidden p-4 px-lg-5 flex-grow-1">
                            <span class="badge text-bg-primary mb-3">For Sale</span>
                            <a href="{{ URL::asset('#!') }}" class="text-dark d-block mb-4">
                                <h4>Villa in Coral Gables</h4>
                            </a>
                            <div class="row mb-3 mb-lg-4">
                                <div class="col-3" data-bs-toggle="tooltip" data-bs-placement="top" title=""
                                    data-bs-original-title="Bedrooms">
                                    <div class="d-flex align-items-center">
                                     <i class="bx bx-bed fs-5 me-2"></i>
                                        <strong class="small">4</strong>
                                    </div>
                                </div>
                                <div class="col-3 border-start border-end" data-bs-toggle="tooltip" data-bs-placement="top" title=""
                                    data-bs-original-title="Bathrooms">
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
                            <p class="mb-4 mb-lg-5 text-truncate">
                                Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
                                mollit anim id est laborum.
                            </p>
                            <div class="row justify-content-between justify-content-lg-start">

                                <div class="col-6">
                                    <!--Price-->
                                    <h4>$983,000</h4>
                                </div>
                                <div class="col-6">
                                    <!--Agent-->
                                    <div
                                        class="d-flex align-items-center justify-content-end justify-content-lg-start flex-shrink-0">
                                        <img src="{{ URL::asset('assets/img/avatar/2.jpg') }}" alt=""
                                            class="flex-shrink-0 flex-shrink-0 avatar sm rounded-circle me-2 img-fluid">
                                        <span class="small">
                                            Monika
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                     <!--Property-item-row-->
                     <div class="card rounded-3 p-2 mb-5 align-items-lg-center flex-lg-row d-flex" data-aos="fade-up">
                        <div class="col-lg-5">
                            <a href="{{ URL::asset('#!') }}"
                                class="d-block overflow-hidden rounded-3">
                                <img src="{{ URL::asset('assets/img/estate/listing/7.jpg') }}" class="img-fluid" alt="">
                            </a>
                        </div>
                        <div class="card-body overflow-hidden p-4 px-lg-5 flex-grow-1">
                            <span class="badge text-bg-primary mb-3">For Sale</span>
                            <a href="{{ URL::asset('#!') }}" class="text-dark d-block mb-4">
                                <h4>Villa in Coral Gables</h4>
                            </a>
                            <div class="row mb-3 mb-lg-4">
                                <div class="col-3" data-bs-toggle="tooltip" data-bs-placement="top" title=""
                                    data-bs-original-title="Bedrooms">
                                    <div class="d-flex align-items-center">
                                     <i class="bx bx-bed fs-5 me-2"></i>
                                        <strong class="small">4</strong>
                                    </div>
                                </div>
                                <div class="col-3 border-start border-end" data-bs-toggle="tooltip" data-bs-placement="top" title=""
                                    data-bs-original-title="Bathrooms">
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
                            <p class="mb-4 mb-lg-5 text-truncate">
                                Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
                                mollit anim id est laborum.
                            </p>
                            <div class="row justify-content-between justify-content-lg-start">

                                <div class="col-6">
                                    <!--Price-->
                                    <h4>$983,000</h4>
                                </div>
                                <div class="col-6">
                                    <!--Agent-->
                                    <div
                                        class="d-flex align-items-center justify-content-end justify-content-lg-start flex-shrink-0">
                                        <img src="{{ URL::asset('assets/img/avatar/2.jpg') }}" alt=""
                                            class="flex-shrink-0 flex-shrink-0 avatar sm rounded-circle me-2 img-fluid">
                                        <span class="small">
                                            Monika
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                     <!--Property-item-row-->
                     <div class="card rounded-3 p-2 mb-5 align-items-lg-center flex-lg-row d-flex" data-aos="fade-up">
                        <div class="col-lg-5">
                            <a href="{{ URL::asset('#!') }}"
                                class="d-block overflow-hidden rounded-3">
                                <img src="{{ URL::asset('assets/img/estate/listing/8.jpg') }}" class="img-fluid" alt="">
                            </a>
                        </div>
                        <div class="card-body overflow-hidden p-4 px-lg-5 flex-grow-1">
                            <span class="badge text-bg-primary mb-3">For Sale</span>
                            <a href="{{ URL::asset('#!') }}" class="text-dark d-block mb-4">
                                <h4>Villa in Coral Gables</h4>
                            </a>
                            <div class="row mb-3 mb-lg-4">
                                <div class="col-3" data-bs-toggle="tooltip" data-bs-placement="top" title=""
                                    data-bs-original-title="Bedrooms">
                                    <div class="d-flex align-items-center">
                                     <i class="bx bx-bed fs-5 me-2"></i>
                                        <strong class="small">4</strong>
                                    </div>
                                </div>
                                <div class="col-3 border-start border-end" data-bs-toggle="tooltip" data-bs-placement="top" title=""
                                    data-bs-original-title="Bathrooms">
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
                            <p class="mb-4 mb-lg-5 text-truncate">
                                Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
                                mollit anim id est laborum.
                            </p>
                            <div class="row justify-content-between justify-content-lg-start">

                                <div class="col-6">
                                    <!--Price-->
                                    <h4>$983,000</h4>
                                </div>
                                <div class="col-6">
                                    <!--Agent-->
                                    <div
                                        class="d-flex align-items-center justify-content-end justify-content-lg-start flex-shrink-0">
                                        <img src="{{ URL::asset('assets/img/avatar/2.jpg') }}" alt=""
                                            class="flex-shrink-0 flex-shrink-0 avatar sm rounded-circle me-2 img-fluid">
                                        <span class="small">
                                            Monika
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Pagination-->
                    <div class="d-flex justify-content-center">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                <li class="page-item disabled">
                                    <a class="page-link" href="{{ URL::asset('#') }}" aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                    </a>
                                </li>
                                <li class="page-item active"><a class="page-link" href="{{ URL::asset('#') }}">1</a></li>
                                <li class="page-item"><a class="page-link" href="{{ URL::asset('#') }}">2</a></li>
                                <li class="page-item"><a class="page-link" href="{{ URL::asset('#') }}">...</a></li>
                                <li class="page-item"><a class="page-link" href="{{ URL::asset('#') }}">99</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="{{ URL::asset('#') }}" aria-label="Next">
                                        <span aria-hidden="true">&raquo;</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </section>
</x-assan-layout>
