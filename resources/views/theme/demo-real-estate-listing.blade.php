<x-assan-layout layout-type="{{$layoutType}}">
            <!--hero-->
            <section class="position-relative">
                <div class="container pt-12 pb-9 position-relative z-1">
                    <div class="row pt-3 pt-lg-9 justify-content-between align-items-center">
                        <div class="col-xl-7 mb-5 mb-xl-0">
                            <h5 class="text-body-tertiary mb-4">Bristol, UK</h5>
                            <h1 class="display-4 mb-0">
                                Villa in Coral Gables
                            </h1>
                        </div>
                        <div class="col-xl-5">
                            <div class="d-flex align-items-center justify-content-xl-end">
                                <a href="{{ URL::asset('#!') }}" class="btn btn-primary flex-shrink-0 me-3"><i class="bx bxs-bookmark me-2"></i> Save to favorites</a>
                                <!--Share options-->
                            <div class="dropdown text-end">
                                <a href="{{ URL::asset('#') }}" data-bs-toggle="dropdown" class="btn btn-light dropdown-toggle">
                                    <i class="bx bx-share-alt fs-4 me-2"></i> Share this Property
                                </a>
                                <div class="dropdown-menu dropdown-menu-end mt-2">
                                    <a href="{{ URL::asset('#!') }}" class="dropdown-item">
                                        <div class="d-flex align-items-center">
                                            <i class="bx bx-link fs-5 me-2"></i>
                                            <span>Copy link</span>
                                        </div>
                                      </a>
                                       <a href="{{ URL::asset('#!') }}" class="dropdown-item">
                                          <div class="d-flex align-items-center">
                                              <i class="bx bxl-facebook fs-5 me-2"></i>
                                              <span>Share via facebook</span>
                                          </div>
                                        </a>
                                        <a href="{{ URL::asset('#!') }}" class="dropdown-item">
                                            <div class="d-flex align-items-center">
                                                <i class="bx bxl-twitter fs-5 me-2"></i>
                                                <span>Share via Twitter</span>
                                            </div>
                                          </a>
                                          <a href="{{ URL::asset('#!') }}" class="dropdown-item">
                                            <div class="d-flex align-items-center">
                                                <i class="bx bxl-linkedin fs-5 me-2"></i>
                                                <span>Share via linkedin</span>
                                            </div>
                                          </a>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section>
                
                <div class="container-fluid position-relative">
                    
                    <div class="row">
                        <div class="col-sm-6 mb-4">
                          <a href="{{ URL::asset('assets/img/estate/listing/detail1.jpg') }}" data-glightbox data-gallery="gallery02" class="d-block">
                            <img src="{{ URL::asset('assets/img/estate/listing/detail1.jpg') }}" class="img-fluid rounded-4 shadow-lg" alt="">
                          </a>
                        </div>
                        <div class="col-6 mb-4">
                            <a href="{{ URL::asset('assets/img/estate/listing/detail2.jpg') }}" data-glightbox data-gallery="gallery02" class="d-block">
                              <img src="{{ URL::asset('assets/img/estate/listing/detail2.jpg') }}" class="img-fluid rounded-4 shadow-lg" alt="">
                            </a>
                          </div>
                          <div class="col-6 mb-4">
                            <a href="{{ URL::asset('assets/img/estate/listing/detail3.jpg') }}" data-glightbox data-gallery="gallery02" class="d-block">
                              <img src="{{ URL::asset('assets/img/estate/listing/detail3.jpg') }}" class="img-fluid rounded-4 shadow-lg" alt="">
                            </a>
                          </div>
                          <div class="col-sm-6 mb-4">
                            <a href="{{ URL::asset('assets/img/estate/listing/detail4.jpg') }}" data-glightbox data-gallery="gallery02" class="d-block">
                              <img src="{{ URL::asset('assets/img/estate/listing/detail4.jpg') }}" class="img-fluid rounded-4 shadow-lg" alt="">
                            </a>
                          </div>
                    </div>
                </div>
            </section>
            <section>
                <div class="container py-9 py-lg-11">
                    <div class="row mb-5 align-items-center">
                        
                        
                        <div class="col-sm-4 mb-4 col-6">
                            <small class="text-body-tertiary mb-1 d-block">ID:</small>
                            <h5 class="mb-0 pb-4 border-bottom">0011</h5>
                        </div>
                        <div class="col-sm-4 mb-4 col-6">
                            <small class="text-body-tertiary mb-1 d-block">Property type:</small>
                            <h5 class="mb-0 pb-4 border-bottom">Apartment</h5>
                        </div>
                        <div class="col-sm-4 mb-4 col-12">
                            <small class="text-body-tertiary mb-1 d-block">Location</small>
                            <h5 class="mb-0 pb-4 border-bottom">Bristol, UK</h5>
                        </div>
                        <div class="col-12 mb-4 col-sm-8">
                            <small class="text-body-tertiary mb-1 d-block">Price</small>
                            <h5 class="display-5 mb-0 pb-4 border-bottom">$125,000</h5>
                        </div>
                        <div class="col-12 col-sm-4 mb-4">
                            <a href="{{ URL::asset('#!') }}" class="btn w-100 d-block btn-warning">Arrange a visit</a>
                        </div>
                        <div class="col-sm-4 mb-4 col-6">
                            <small class="text-body-tertiary mb-1 d-block">Bedrooms:</small>
                            <h5 class="mb-0 pb-4 border-bottom">4</h5>
                        </div>
                        <div class="col-sm-4 mb-4 col-6">
                            <small class="text-body-tertiary mb-1 d-block">Bathrooms:</small>
                            <h5 class="mb-0 pb-4 border-bottom">4</h5>
                        </div>
                        <div class="col-sm-4 mb-4 col-6">
                            <small class="text-body-tertiary mb-1 d-block">WIFI</small>
                            <h5 class="mb-0 pb-4 border-bottom">YES</h5>
                        </div>
                        <div class="col-sm-4 mb-4 col-6 col-lg-3">
                            <small class="text-body-tertiary mb-1 d-block">Parking</small>
                            <h5 class="mb-0 pb-4 border-bottom">YES</h5>
                        </div>
                        <div class="col-sm-4 mb-4 col-6 col-lg-3">
                            <small class="text-body-tertiary mb-1 d-block">Swimming pool</small>
                            <h5 class="mb-0 pb-4 border-bottom">YES</h5>
                        </div>
                        <div class="col-sm-4 mb-4 col-6 col-lg-3">
                            <small class="text-body-tertiary mb-1 d-block">Area</small>
                            <h5 class="mb-0 pb-4 border-bottom">3200 sq. ft.</h5>
                        </div>
                        <div class="col-sm-4 mb-4 col-6 col-lg-3">
                            <small class="text-body-tertiary mb-1 d-block">Year in Built</small>
                            <h5 class="mb-0 pb-4 border-bottom">2016</h5>
                        </div>
                    </div>

                    <div class="row">
                        
                        <div class="col-md-6 mb-7 mb-md-0">
                            <small class="d-block text-body-secondary mb-2">Description:</small>
                            <p>
                                Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups  the 90s as desktop publishers bundled the text with their software. Today it's seen all around the web; on templates, websites, and stock designs. Use our generator to get your own, or read on for the authoritative history of lorem ipsum.
                            </p>
                            <p class="pb-3 mb-5 border-bottom">
                                The passage experienced a surge in popularity during the 1960s when Letraset used it on their dry-transfer sheets, and again during the 90s as desktop publishers bundled the text with their software. Today it's seen all around the web; on templates, websites, and stock designs. Use our generator to get your own, or read on for the authoritative history of lorem ipsum.
                            </p>

                            <small class="d-block text-body-secondary mb-4">Contact Agent:</small>
                            <div class="d-flex align-items-center">
                                <div class="me-4">
                                    <img src="{{ URL::asset('assets/img/avatar/4.jpg') }}" class="img-fluid avatar xl rounded-circle" alt="">
                                </div>
                                <div class="flex-grow-1">
                                    <h6 class="mb-1">Emily Doe</h6>
                                    <p class="small mb-1 text-body-secondary"> <i class="bx bxs-phone"></i> +01 123-4567-890</p>
                                    <p class="mb-0"><a href="{{ URL::asset('#!') }}" class="link-hover-underline">Contact Agent</a></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                           <div class="card">
                            <div class="card-header">
                                <h5 class="mb-0">Floor plan:</h5>
                            </div>
                            <div class="card-body">
                             <img src="{{ URL::asset('assets/img/estate/floor-plan.jpg') }}" class="img-fluid" alt="">
                            </div>
                           </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="bg-body-tertiary">
                <div class="container py-9 py-lg-11">
                    <div class="d-flex mb-6 align-items-center">
                        <h3 class="mb-0 display-6">Nearby Properties</h3>
                        <div class="flex-grow-1 border-top ms-3"></div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-lg-4 col-md-6 col-sm-10 mb-5 mb-lg-0">
                            <!--Card-property-2-->
                            <div class="position-relative">
                                <a href="{{ URL::asset('#!') }}" class="d-block card-hover overflow-hidden rounded-4">
                                    <!--Image-->
                                    <img src="{{ URL::asset('assets/img/estate/listing/1.jpg') }}" class="img-fluid img-zoom" alt="">
                                    <!--Background-->
                                    <div class="position-absolute start-0 top-0 w-100 h-100 bg-gradient-dark opacity-50">
                                    </div>
                                    <div class="position-absolute start-0 top-0 w-100 pt-3 px-3">
                                        <span class="badge text-bg-primary">For Sale</span>
                                    </div>
                                    <div class="text-white d-flex justify-content-between w-100 px-3 pb-4 position-absolute start-0 bottom-0 w-100 h-100 align-items-end">
                                        <div class="flex-grow-1 overflow-hidden pe-4">
                                            <h5 class="mb-3">$453,675</h5>
                                            <!--Location-->
                                            <p class="mb-0 d-flex">
                                                <i class="bx bx-map me-1"></i>
                                                <span class="small text-truncate">Manchester</span>
                                            </p>
                                        </div>
                                        <!--Agent-->
                                        <div class="d-flex align-items-center flex-shrink-0">
                                            <img src="{{ URL::asset('assets/img/avatar/1.jpg') }}" alt="" class="flex-shrink-0 flex-shrink-0 avatar sm rounded-circle me-2 img-fluid">
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
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-10 mb-5 mb-lg-0">
                            <!--Card-property-2-->
                            <div class="position-relative">
                                <a href="{{ URL::asset('#!') }}" class="d-block card-hover overflow-hidden rounded-4 position-relative">
                                    <!--Image-->
                                    <img src="{{ URL::asset('assets/img/estate/listing/2.jpg') }}" class="img-fluid rounded-4 img-zoom" alt="">
                                    <!--Background-->
                                    <div class="position-absolute start-0 top-0 w-100 h-100 bg-gradient-dark opacity-75">
                                    </div>
                                    <div class="position-absolute start-0 top-0 w-100 pt-3 px-3">
                                        <span class="badge text-bg-warning">For Rent</span>
                                    </div>
                                    <div class="text-white d-flex justify-content-between w-100 px-3 pb-4 position-absolute start-0 bottom-0 w-100 h-100 align-items-end">
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
                                            <img src="{{ URL::asset('assets/img/avatar/2.jpg') }}" alt="" class="flex-shrink-0 flex-shrink-0 avatar sm rounded-circle me-2 img-fluid">
                                            <span class="small">
                                                Monika
                                            </span>
                                        </div>
                                    </div>
                                </a>
                                <div class="card-body pt-4">
                                    <a href="{{ URL::asset('#!') }}" class="d-block mb-4">
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
                                        <div class="col-3 border-start border-end" data-bs-toggle="tooltip" data-bs-placement="top" title=""
                                            data-bs-original-title="Bathrooms">
                                            <div class="d-flex align-items-center">
                                                <i class="bx bxs-bath fs-5 me-2"></i>
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
                        <div class="col-lg-4 col-md-6 col-sm-10">
                            <!--Card-property-2-->
                            <div class="position-relative">
                                <a href="{{ URL::asset('#!') }}" class="d-block card-hover overflow-hidden rounded-4 position-relative">
                                    <!--Image-->
                                    <img src="{{ URL::asset('assets/img/estate/listing/4.jpg') }}" class="img-fluid img-zoom" alt="">
                                    <!--Background-->
                                    <div class="position-absolute rounded-4 start-0 top-0 w-100 h-100 bg-gradient-dark opacity-50">
                                    </div>
                                    <div class="position-absolute start-0 top-0 w-100 pt-3 px-3">
                                        <span class="badge text-bg-primary">For Sale</span>
                                    </div>
                                    <div class="text-white d-flex justify-content-between w-100 px-3 pb-4 position-absolute start-0 bottom-0 w-100 h-100 align-items-end">
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
                                            <img src="{{ URL::asset('assets/img/avatar/6.jpg') }}" alt="" class="flex-shrink-0 flex-shrink-0 avatar sm rounded-circle me-2 img-fluid">
                                            <span class="small">
                                                Adam
                                            </span>
                                        </div>
                                    </div>
                                </a>
                                <div class="card-body pt-4">
                                    <a href="{{ URL::asset('#!') }}" class="d-block mb-4">
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
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
</x-assan-layout>
