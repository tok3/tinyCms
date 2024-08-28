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
                                                <li class="breadcrumb-item active" aria-current="page">Card image</li>
                                            </ol>
                                        </div>
                                    </nav>
                                    <h1 class="mb-0 display-4">
                                        Card image
                                    </h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>


            <section class="position-relative">
                <div class="container py-9 py-lg-11">
                    <h4 class="mb-4">Component #1</h4>
                    <div class="row mb-9 mb-lg-11">
                        <div class="col-md-6 col-sm-8 col-xl-4">
                            <!--Code snippet modal-->
<x-partials/snippets/components/card-image/card-image-1 />

                            <!--Card-->
                            <div class="card-over rounded-3 overflow-hidden">
                                <!--Image-->
                                <img src="{{ URL::asset('assets/img/960x640/6.jpg') }}" alt="" class="img-fluid img-zoom">
                                <!--overlay-->
                                <div class="card-overlay p-4 text-white d-flex align-items-end">
                                    <!--Content list-->
                                    <ul class="list-unstyled overlay-items">
                                        <li>
                                            <h5 class="mb-2">Snippets code</h5>
                                        </li>
                                        <li><span>Branding</span></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr class="mb-9 mb-lg-11 mt-0">
                    <h4 class="mb-4">Component #2</h4>
                    <div class="row mb-9 mb-lg-11">
                        <div class="col-md-6 col-sm-8 col-xl-4">
                            <!--Code snippet modal-->
<x-partials/snippets/components/card-image/card-image-2 />
                            <!--Card-->
                            <div class="card-over rounded-3 card-hover overflow-hidden">
                                <!--Image-->
                                <img src="{{ URL::asset('assets/img/960x640/7.jpg') }}" alt="" class="img-fluid img-zoom">
                                <!--Hover overlay-->
                                <div class="card-overlay py-4 px-3 text-white d-flex align-items-end">
                                    <!--Overlay-items-->
                                    <ul class="list-unstyled overlay-items">
                                        <li>
                                            <h5 class="fs-4 mb-1">Awesome title</h5>
                                        </li>
                                        <li><span>Awesome Subtitle</span></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr class="mb-9 mb-lg-11 mt-0">
                    <h4 class="mb-4">Component #3</h4>
                    <div class="row mb-9 mb-lg-11">
                        <div class="col-md-6 col-sm-8 col-xl-4">
                            <!--Code snippet modal-->
<x-partials/snippets/components/card-image/card-image-3 />

                            <!--Card-hover-->
                            <a href="{{ URL::asset('#!') }}"
                                class="text-white position-relative d-block rounded-4 overflow-hidden card-hover-2">
                                <!--Image-->
                                <img src="{{ URL::asset('assets/img/960x640/6.jpg') }}" alt="" class="w-100 img-zoom">
                                <!--Overlay-->
                                <div
                                    class="card-hover-2-overlay position-absolute start-0 top-0 w-100 h-100 d-flex px-4 py-5 flex-column justify-content-between">
                                    <!--overlay header-->
                                    <div class="card-hover-2-header w-100">
                                        <div class="card-hover-2-title">
                                            <h5 class="fs-4 mb-2">UI Advanced Course</h5>
                                        </div>
                                        <p class="mb-0">
                                            <i class="bx bx-person d-inline-block align-middle me-1"></i> 149 Members
                                        </p>
                                    </div>
                                    <!--Overlay footer-->
                                    <div class="card-hover-2-footer w-100 mt-auto">
                                        <span class="tags d-block flex-grow-1">Design, Code, Mobile</span>
                                        <span class="card-hover-2-footer-link">
                                            <span>View Course</span>
                                        </span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <hr class="mb-9 mb-lg-11 mt-0">
                    <h4 class="mb-4">Component #4 - Shop product</h4>
                    <div class="row mb-9 mb-lg-11">
                        <div class="col-md-6 col-sm-8 col-xl-4">
<!--Code snippet modal-->
<x-partials/snippets/components/card-image/card-image-4 />

                            <!--Card-product-->
                            <div class="card hover-shadow-lg overflow-hidden hover-lift-lg border-0">
                                <div class="px-5 py-4 d-block overflow-hidden">
                                    <!--Product image-->
                                    <a href="{{ URL::asset('#!') }}">
                                        <img src="{{ URL::asset('assets/img/shop/products/01.jpg') }}" class="img-fluid" alt="Product">
                                    </a>
                                </div>
                                <div class="px-4 pb-4 text-center">
                                    <a href="{{ URL::asset('#!') }}" class="h5 text-dark d-block position-relative mb-2">Product Title</a>
                                    <!--Price-->
                                    <span class="card-product-price">
                                        <span>$256</span> <del>$299</del>
                                    </span>
                                </div>
                            </div>
                            <!--/Card product end-->
                        </div>
                    </div>

                    <hr class="mb-9 mb-lg-11 mt-0">
                    <h4 class="mb-4">Component #5 - Hover splitting</h4>

                    <div class="row mb-9 mb-lg-11">
                        <div class="col-md-6 col-sm-8 col-xl-4">
                            <!--Code snippet modal-->
<x-partials/snippets/components/card-image/card-image-5 />

                            <!--Card-->
                            <a href="{{ URL::asset('#!') }}" class="card-split-hover rounded-3 position-relative d-block overflow-hidden">
                                <!--Card Image-->
                                <img src="{{ URL::asset('assets/img/960x640/8.jpg') }}" alt="" class="img-fluid">
                                <div class="card-overlay text-white py-4 px-3 d-flex align-items-end">
                                    <!--Splitting text-->
                                    <ul class="list-unstyled overlay-items">
                                        <li>
                                            <h5 class="fs-4 mb-1 splitting-up" data-splitting>Awesome title</h5>
                                        </li>
                                        <li>
                                            <span class="text-body-secondary splitting-up d-block" data-splitting>Awesome
                                                Subtitle</span>
                                        </li>
                                    </ul>
                                </div>
                            </a>
                        </div>
                    </div>
                    <hr class="mb-9 mb-lg-11 mt-0">
                    <h4 class="mb-4">Component #6 - Hover splitting</h4>

                    <div class="row mb-9 mb-lg-11">
                        <div class="col-md-6 col-sm-8 col-xl-4">
                            <!--Code snippet modal-->
<x-partials/snippets/components/card-image/card-image-6 />

                            <!--Card-->
                            <a href="{{ URL::asset('#!') }}" class="d-block card-split-img position-relative overflow-hidden">
                                <div class="splitting-img img-vertical mb-4" data-columns="4" data-split-image>
                                    <img src="{{ URL::asset('assets/img/960x640/4.jpg') }}" alt="" class="img-fluid">
                                </div>
                                <div class="card-body pb-0">
                                    <ul class="list-unstyled mb-0">
                                        <li>
                                            <h5 class="fs-4 mb-1 text-body">Awesome title</h5>
                                        </li>
                                        <li><span class="text-body-secondary d-block">Awesome Subtitle</span></li>
                                    </ul>
                                </div>
                            </a>
                        </div>
                    </div>
                    <hr class="mb-9 mb-lg-11 mt-0">
                    <h4 class="mb-4">Component #7 - Horizontal</h4>

                    <div class="row mb-9 mb-lg-11">
                        <div class="col-lg-12">
                            <!--Code snippet modal-->
<x-partials/snippets/components/card-image/card-image-7 />
                            <!--Card-->
                            <div class="card align-items-md-center shadow-lg flex-md-row flex-column overflow-hidden border-0">
                                <div class="col-md-6">
                                    <!--Image-->
                                    <img src="{{ URL::asset('assets/img/960x1140/2.jpg') }}" alt="" class="img-fluid">
                                </div>
                                <div class="card-body h-100 p-4 px-lg-6 py-lg-6 flex-grow-1">
                                    <p class="fs-4 mb-4">
                                        “ Loved working with the beautiful theme. Everything clean and
                                        professional,
                                        also very helpful throughout the customisation. Looking forward to buy
                                        more
                                        license of Assan again in the future.”
                                    </p>
                                    <div class="mb-5">
                                        <h5 class="mb-2">Anastasia</h5>
                                        <small class="d-block lh-1 text-body-secondary"> at Deliveroo</small>
                                    </div>
                                    <a href="{{ URL::asset('#') }}" class="btn btn-outline-primary btn-hover-arrow">
                                        <span>Ready full story</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr class="mb-9 mb-lg-11 mt-0">
                    <h4 class="mb-4">Component #8 - Blog card</h4>

                    <div class="row mb-9 mb-lg-11">
                        <div class="col-md-6 col-sm-8 col-xl-5">
                            <!--Code snippet modal-->
<x-partials/snippets/components/card-image/card-image-8 />

                            <!--article-->
                            <article
                                class="card card-hover hover-lift hover-shadow-lg text-white rounded-4 border-0 overflow-hidden">
                                <img src="{{ URL::asset('assets/img/960x640/3.jpg') }}" class="img-fluid img-zoom" alt="...">
                                <!--Overlay-->
                                <div class="bg-gradient-dark position-absolute start-0 top-0 w-100 h-100"></div>
                                <div
                                    class="card-body z-1 d-flex flex-column position-absolute start-0 top-0 w-100 h-100 justify-content-end p-4">
                                   <div class="position-relative">
                                    <p class="small mb-1"><span>Design</span></p>
                                    <h5 class="h3 mb-3"><span>How good designs helps to grow business</span>
                                    </h5>
                                    <div class="d-flex align-items-center">
                                        <span>
                                            <img src="{{ URL::asset('assets/img/avatar/4.jpg') }}" alt=""
                                                class="avatar sm rounded-circle me-2">
                                        </span>
                                        <div class="small">
                                            Asako Takakura
                                        </div>
                                    </div>
                                   </div>
                                </div>
                                <a href="{{ URL::asset('#!') }}" class="stretched-link"></a>
                            </article>
                        </div>
                    </div>
                    <hr class="mb-9 mb-lg-11 mt-0">
                    <h4 class="mb-4">Component #9 - Blog card</h4>

                    <div class="row mb-9 mb-lg-11">
                        <div class="col-md-6 col-sm-8 col-xl-4">
                              <!--Code snippet modal-->
<x-partials/snippets/components/card-image/card-image-9 />
    
                            <!--article-->
                            <article class="card-hover card shadow-sm hover-lift hover-shadow-lg overflow-hidden rounded-3">
                                <!--image-->
                                <a href="{{ URL::asset('#!') }}" class="d-block overflow-hidden">
                                    <img src="{{ URL::asset('assets/img/960x640/7.jpg') }}" alt=""
                                        class="img-fluid img-zoom position-relative">
                                </a>
                                <div class="position-relative d-block p-4">
                                    <!--Date-->
                                    <div class="d-flex justify-content-start w-100 pb-3">
                                        <small class="text-body-secondary">Mar 12, 2021</small>
                                    </div>
                                    <div>
                                        <a href="{{ URL::asset('#!') }}" class="text-reset">
                                            <h5 class="link-multiline">10 Best Slack Apps for Remote Work In 2021</h5>

                                        </a>
                                    </div>
                                </div>
                            </article>
                            <!--/.article-->
                        </div>
                    </div>
                    <hr class="mb-9 mb-lg-11 mt-0">
                    <h4 class="mb-4">Component #10 - Blog card</h4>

                    <div class="row mb-9 mb-lg-11">
                        <div class="col-md-6 col-sm-8 col-xl-4">
                            <!--Code snippet modal-->
<x-partials/snippets/components/card-image/card-image-10 />
    
                            <article class="card-hover border-0">
                                <a href="{{ URL::asset('#') }}" class="stretched-link"></a>
                                <div class="card-body position-relative p-0">
                                    <div class="d-block rounded-3 position-relative overflow-hidden mb-4">
                                        <img src="{{ URL::asset('assets/img/960x640/1.jpg') }}" class="img-fluid img-zoom" alt="">
                                    </div>
                                    <div class="d-flex mb-3 flex-grow-1 align-items-center">
                                        <img src="{{ URL::asset('assets/img/avatar/1.jpg') }}" alt="" class="avatar sm rounded-circle me-2">
                                        <small class="fw-semibold">Emily</small>
                                    </div>
                                    <h5 class="mb-3">4 Business Trends Fueling the Future of Business</h5>
                                    <div class="blog-content">
                                        <p class="mb-4">Lorem ipsum is placeholder text commonly used in the graphic,
                                            print, and publishing...</p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div>
                                                <span class="small text-body-secondary">Mar 9, 2021</span>
                                            </div>
                                            <div
                                                class="d-flex justify-content-end flex-grow-1 align-items-center text-primary">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                    class="bx bx-dot" width="24px" height="24px" viewBox="0 0 16 16"
                                                    id="dot">
                                                    <path d="M8 9.5a1.5 1.5 0 100-3 1.5 1.5 0 000 3z"></path>
                                                </svg>
                                                <small class="">Business</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        </div>
                    </div>
                    <hr class="mb-9 mb-lg-11 mt-0">
                    <h4 class="mb-4">Component #11 - Blog card</h4>

                    <div class="row mb-9 mb-lg-11">
                        <div class="col-md-6 col-sm-8 col-xl-4">
                            <!--Code snippet modal-->
<x-partials/snippets/components/card-image/card-image-11 />

                            <!--Card demo-->
                            <article
                                class="card card-hover text-center hover-shadow-lg overflow-hidden border-0 rounded-3 shadow-sm">
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
                                        2021</small>
                                    <h5 class="py-3 mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing
                                        elit</h5>
                                    <p class="mb-0 text-truncate px-lg-4">
                                        Lorem ipsum dolor sit amet sed do eiusmod tempor labore et dolore magna
                                        aliqua.
                                        Viverra nam libero justo laoreet.
                                    </p>
                                </div>

                                <!--Article link-->
                                <a href="{{ URL::asset('#!') }}" class="stretched-link"></a>
                            </article>
                        </div>
                    </div>
                    <hr class="mb-9 mb-lg-11 mt-0">
                    <h4 class="mb-4">Component #12 - Team card</h4>

                    <div class="row mb-9 mb-lg-11">
                        <div class="col-md-6 col-sm-8 col-xl-4">
                            <!--Code snippet modal-->
<x-partials/snippets/components/card-image/card-image-12 />

<!--Card-->
<div class="card-over card-hover text-center card border-0 shadow-sm overflow-hidden hover-shadow-lg">
    <div class="card-image mx-auto d-block overflow-hidden position-relative">
        <img src="{{ URL::asset('assets/img/team/2.jpg') }}" alt="" class="img-fluid">
        <div class="card-overlay text-white overlay-linear d-flex flex-column justify-content-end align-items-center">
            <!--Social List-->
            <ul class="d-flex align-items-center list-inline pb-5 overlay-items">
                <li class="list-inline-item me-3">
                    <a href="{{ URL::asset('#!') }}" class="d-block fs-5">
                        <i class="bx bxl-facebook"></i>
                    </a>
                </li>
                <li class="list-inline-item me-3">
                    <a href="{{ URL::asset('#!') }}" class="d-block fs-5">
                        <i class="bx bxl-twitter"></i>
                    </a>
                </li>
                <li class="list-inline-item">
                    <a href="{{ URL::asset('#!') }}" class="d-block fs-5">
                        <i class="bx bxl-instagram"></i>
                    </a>
                </li>
            </ul>
            <!--card hover-transition-list+items-->
        </div>
        <!--/.overlay-->
        <!--Image divider-->
        <svg class="position-absolute start-0 bottom-0 mb-n2" style="color: var(--bs-body-bg);" preserveAspectRatio="none" width="100%"
            height="30" viewBox="0 0 1200 160" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" clip-rule="evenodd"
                d="M0 16L67 29.3333C133 42.6667 267 69.3333 400 82.6667C533 96 667 96 800 80C933 64 1067 32 1133 16L1200 0V160H1133C1067 160 933 160 800 160C667 160 533 160 400 160C267 160 133 160 67 160H0V16Z"
                fill="currentColor"></path>
        </svg>
    </div>
    <!--/.image and overlay-->
    <div class="card-body">
        <h5 class="mb-1">Adam Howkins</h5>
        <p class="mb-0">Founder</p>
    </div>
</div>

                        </div>
                    </div>
                    <hr class="mb-9 mb-lg-11 mt-0">
                    <h4 class="mb-4">Component #13 - Case Study</h4>

                    <div class="row mb-9 mb-lg-11">
                        <div class="col-md-7 col-sm-9 col-xl-5">
                            <!--Code snippet modal-->
<x-partials/snippets/components/card-image/card-image-13 />
<!--Card-->
<a href="{{ URL::asset('#!') }}" class="d-block rounded-3 bg-primary position-relative text-white overflow-hidden card-hover hover-lift-lg hover-shadow-lg">
    <div class="overflow-hidden bg-gradient-light position-relative">
        <img src="{{ URL::asset('assets/img/960x640/3.jpg') }}" alt="" class="img-fluid img-zoom">
        <div class="card-overlay py-4 px-3 text-white d-flex align-items-end justify-content-center">
            <ul class="list-unstyled overlay-items">
                <li>
                    <span class="btn btn-lg btn-white">View case study</span>
                </li>
            </ul>
        </div>
    </div>
    <!--Card-body-->
    <div class="card-body px-4 py-5">
        <p class="text-body-secondary mb-2">Print design . Branding</p>
        <h5 class="mb-0">Duis commonly aute irure dolor in reprehenderit in
            voluptate velit
        </h5>
    </div>
</a>
                        </div>
                    </div>
                    <hr class="mb-9 mb-lg-11 mt-0">
                    <h4 class="mb-4">Component #14 - Hover effect</h4>

                    <div class="row mb-9 mb-lg-11">
                        <div class="col-md-7 col-sm-9 col-xl-5">
                            <!--Code snippet modal-->
<x-partials/snippets/components/card-image/card-image-14 />
<!--Card-->
<div data-aos data-aos-once="false">
    <!--Card-->
    <a href="{{ URL::asset('#!') }}" class="d-block overflow-hidden position-relative card-hover text-body">
        <!--Image-->
        <div class="overflow-hidden card-reveal-effect">
            <img src="{{ URL::asset('assets/img/projects/lg1.jpg') }}" alt="" class="img-fluid img-zoom">
        </div>
        <div class="card-body pt-4 pb-0">
            <!--Card-content-->
            <ul class="list-unstyled mb-0">
                <li>
                    <h5 class="mb-1">Awesome title</h5>
                </li>
                <li><span class="width-3x border-top border-primary border-2 d-inline-block align-middle me-2"></span><span class="text-body-secondary">Awesome Subtitle</span></li>
            </ul>
        </div>
    </a>
</div>
                        </div>
                    </div>
                    <hr class="mb-9 mb-lg-11 mt-0">
                    <h4 class="mb-4">Component #15 - Card Real estate property</h4>

                    <div class="row mb-9 mb-lg-11">
                        <div class="col-md-6 col-sm-8 col-xl-4">
                            <!--Code snippet modal-->
<x-partials/snippets/components/card-image/card-image-15 />

                           <!--Card-property-->
                           <!--Card-property-->
<div class="card rounded-4 mb-5 aos-init aos-animate" data-aos="fade-up">
    <div class="mb-0">
        <a href="{{ URL::asset('#!') }}" class="d-block overflow-hidden rounded-top-4">
            <img src="{{ URL::asset('assets/img/estate/listing/1.jpg') }}" class="img-fluid" alt="">
        </a>
    </div>
    <div class="card-body overflow-hidden p-4 px-lg-5 flex-grow-1">
        <span class="badge bg-body-tertiary text-primary mb-3">For Sale</span>
        <a href="{{ URL::asset('#!') }}" class="text-dark d-block mb-4">
            <!--Heading-->
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
            <div class="col-6" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Area">
                <div class="d-flex align-items-center">
                    <i class="bx bx-area fs-5 me-2"></i>
                    <strong class="small">6400 Sq Ft</strong>
                </div>
            </div>
        </div>
        <!--Description-->
        <p class="mb-4 mb-lg-5 text-truncate">
            Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
            mollit anim id est laborum.
        </p>
        <div class="row justify-content-between justify-content-lg-start">

            <div class="col-6">
                <!--Price-->
                <h4 class="mb-0">$983,000</h4>
            </div>
            <div class="col-6">
                <!--Agent-->
                <div class="d-flex align-items-center justify-content-end flex-shrink-0">
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

                        </div>
                    </div>
                    <hr class="mb-9 mb-lg-11 mt-0">
                    <h4 class="mb-4">Component #16 - Card Real estate property - 2</h4>

                    <div class="row">
                        <div class="col-md-7 col-sm-9 col-xl-4">
                            <!--Code snippet modal-->
<x-partials/snippets/components/card-image/card-image-16 />

                           <!--Card-property-2-->
                           <div class="position-relative">
                            <a href="{{ URL::asset('#!') }}" class="d-block card-hover overflow-hidden rounded-4">
                                <!--Image-->
                                <img src="{{ URL::asset('assets/img/estate/listing/1.jpg') }}" class="img-fluid img-zoom" alt="">
                                <!--Background-->
                                <div class="position-absolute start-0 top-0 w-100 h-100 bg-gradient-dark opacity-50">
                                </div>
                                <div class="position-absolute start-0 top-0 w-100 pt-3 px-3">
                                    <span class="badge bg-white text-primary">For Sale</span>
                                </div>
                                <div class="text-white d-flex justify-content-between w-100 px-3 pb-4 position-absolute start-0 bottom-0 w-100 h-100 align-items-end">
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
                                        <img src="{{ URL::asset('assets/img/avatar/1.jpg') }}" alt="" class="flex-shrink-0 flex-shrink-0 avatar sm rounded-circle me-2 img-fluid">
                                        <span class="small">
                                            Sonia
                                        </span>
                                    </div>
                                </div>
                            </a>
                            <!--Card body-->
                            <div class="card-body pt-4">
                                <a href="{{ URL::asset('#!') }}" class="text-dark d-block mb-4">
                                    <!--Title-->
                                    <h5>Villa in Coral Gables</h5>
                                </a>
                                <div class="row">
                                    <!--Bedrooms-->
                                    <div class="col-3" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Bedrooms">
                                        <div class="d-flex align-items-center">
                                         <i class="bx bx-bed fs-5 me-2"></i>
                                            <strong class="small">4</strong>
                                        </div>
                                    </div>
                                    <!--Bathrooms-->
                                    <div class="col-3 border-start border-end" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Bathrooms">
                                        <div class="d-flex align-items-center">
                                            <i class="bx bx-bath fs-5 me-2"></i>
                                            <strong class="small">2</strong>
                                        </div>
                                    </div>
                                    <!--Area-->
                                    <div class="col-6" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Area">
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
