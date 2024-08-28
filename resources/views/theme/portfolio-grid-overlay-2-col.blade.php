<x-assan-layout layout-type="{{$layoutType}}">
            <section id="page-header" class="position-relative bg-gradient-primary text-white overflow-hidden">
                <div class="container pt-11 pb-9 pb-lg-11 pt-lg-14">
                    <div class="row pt-lg-7">
                        <div class="col-lg-7">
                            <ol class="breadcrumb mb-3">
                                <li class="breadcrumb-item"><a href="{{ URL::asset('#') }}">Home</a></li>
                                <li class="breadcrumb-item active">Portfolio</li>
                                <li class="breadcrumb-item active" aria-current="page">grid overlay 2 columns</li>
                            </ol>
                            <h1 class="mb-0 display-4">Selected works</h1>
                        </div>
                    </div>
                </div>
            </section>
            <!--/.Page-header-->

            <section class="position-relative">
                <div class="container py-9 py-lg-11 position-relative z-1">
                   
                             <!-- Nav Filter-->
                    <ul class="mb-5 nav nav-pills d-inline-flex align-items-center mb-0">
                        <li class="nav-item small text-body-tertiary d-flex me-2 me-md-4 d-none d-md-block">Filter by:</li>
                        <li class="nav-item">
                            <a class="nav-link active" href="{{ URL::asset('#') }}" data-bs-toggle="pill" data-filter="*"
                                data-bs-target="#projects">
                                All
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ URL::asset('#') }}" data-bs-toggle="pill" data-filter=".design"
                                data-bs-target="#design">
                                Design
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ URL::asset('#') }}" data-bs-toggle="pill"
                                data-filter=".development" data-bs-target="#development">
                                Development
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ URL::asset('#') }}" data-bs-toggle="pill" data-filter=".motion"
                                data-bs-target="#motion">
                                Motion
                            </a>
                        </li>
                    </ul>

                      <div id="projects" data-isotope='{"layoutMode": "masonry"}' class="row">

                        <div class="col-md-6 mb-4 development grid-item">
                            <a href="{{ URL::asset('#!') }}" class="text-white bg-dark position-relative d-block overflow-hidden card-hover-2">
                                <img src="{{ URL::asset('assets/img/projects/1.jpg') }}" alt="" class="w-100 img-zoom">
                                <div class="card-hover-2-overlay position-absolute start-0 top-0 w-100 h-100 d-flex px-4 py-5 flex-column justify-content-between">
                                    <div class="card-hover-2-header w-100">
                                        <div class="card-hover-2-title">
                                            <h5 class="fs-4 mb-2">Similique sunt</h5>
                                        </div>
                                        <p class="mb-0">
                                           Lorem lipsum dolor sit amet...
                                        </p>
                                    </div>
                                    <div class="card-hover-2-footer w-100 mt-auto">
                                        <span class="tags d-block flex-grow-1">3D, Illustrations, Motion</span>
                                        <span class="card-hover-2-footer-link">
                                            <span>View case study</span>
                                        </span>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-6 mb-4 motion grid-item">
                            <a href="{{ URL::asset('#!') }}" class="text-white bg-dark position-relative d-block overflow-hidden card-hover-2">
                                <img src="{{ URL::asset('assets/img/projects/5.jpg') }}" alt="" class="w-100 img-zoom">
                                <div class="card-hover-2-overlay position-absolute start-0 top-0 w-100 h-100 d-flex px-4 py-5 flex-column justify-content-between">
                                    <div class="card-hover-2-header w-100">
                                        <div class="card-hover-2-title">
                                            <h5 class="fs-4 mb-2">Excepteur sint occaecat Branding</h5>
                                        </div>
                                        <p class="mb-0">
                                           Lorem lipsum dolor sit amet...
                                        </p>
                                    </div>
                                    <div class="card-hover-2-footer w-100 mt-auto">
                                        <span class="tags d-block flex-grow-1">Product Design, UI UX</span>
                                        <span class="card-hover-2-footer-link">
                                            <span>View case study</span>
                                        </span>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-6 mb-4 motion grid-item">
                            <a href="{{ URL::asset('#!') }}" class="text-white bg-dark position-relative d-block overflow-hidden card-hover-2">
                                <img src="{{ URL::asset('assets/img/projects/3.jpg') }}" alt="" class="w-100 img-zoom">
                                <div class="card-hover-2-overlay position-absolute start-0 top-0 w-100 h-100 d-flex px-4 py-5 flex-column justify-content-between">
                                    <div class="card-hover-2-header w-100">
                                        <div class="card-hover-2-title">
                                            <h5 class="fs-4 mb-2">Nostrum exercitationem</h5>
                                        </div>
                                        <p class="mb-0">
                                           Lorem lipsum dolor sit amet...
                                        </p>
                                    </div>
                                    <div class="card-hover-2-footer w-100 mt-auto">
                                        <span class="tags d-block flex-grow-1">Product Design, UI UX</span>
                                        <span class="card-hover-2-footer-link">
                                            <span>View case study</span>
                                        </span>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-6 mb-4 design development grid-item">
                            <a href="{{ URL::asset('#!') }}" class="text-white bg-dark position-relative d-block overflow-hidden card-hover-2">
                                <img src="{{ URL::asset('assets/img/projects/2.jpg') }}" alt="" class="w-100 img-zoom">
                                <div class="card-hover-2-overlay position-absolute start-0 top-0 w-100 h-100 d-flex px-4 py-5 flex-column justify-content-between">
                                    <div class="card-hover-2-header w-100">
                                        <div class="card-hover-2-title">
                                            <h5 class="fs-4 mb-2">Sparq app desgin</h5>
                                        </div>
                                        <p class="mb-0">
                                           Lorem lipsum dolor sit amet...
                                        </p>
                                    </div>
                                    <div class="card-hover-2-footer w-100 mt-auto">
                                        <span class="tags d-block flex-grow-1">Product Design, UI UX</span>
                                        <span class="card-hover-2-footer-link">
                                            <span>View case study</span>
                                        </span>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-6 mb-4 motion grid-item">
                            <a href="{{ URL::asset('#!') }}" class="text-white bg-dark position-relative d-block overflow-hidden card-hover-2">
                                <img src="{{ URL::asset('assets/img/projects/6.jpg') }}" alt="" class="w-100 img-zoom">
                                <div class="card-hover-2-overlay position-absolute start-0 top-0 w-100 h-100 d-flex px-4 py-5 flex-column justify-content-between">
                                    <div class="card-hover-2-header w-100">
                                        <div class="card-hover-2-title">
                                            <h5 class="fs-4 mb-2">Illustration Design</h5>
                                        </div>
                                        <p class="mb-0">
                                           Lorem lipsum dolor sit amet...
                                        </p>
                                    </div>
                                    <div class="card-hover-2-footer w-100 mt-auto">
                                        <span class="tags d-block flex-grow-1">Product Design, UI UX</span>
                                        <span class="card-hover-2-footer-link">
                                            <span>View case study</span>
                                        </span>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-6 mb-4 design grid-item">
                            <a href="{{ URL::asset('#!') }}" class="text-white bg-dark position-relative d-block overflow-hidden card-hover-2">
                                <img src="{{ URL::asset('assets/img/projects/4.jpg') }}" alt="" class="w-100 img-zoom">
                                <div class="card-hover-2-overlay position-absolute start-0 top-0 w-100 h-100 d-flex px-4 py-5 flex-column justify-content-between">
                                    <div class="card-hover-2-header w-100">
                                        <div class="card-hover-2-title">
                                            <h5 class="fs-4 mb-2">Duis aute irure</h5>
                                        </div>
                                        <p class="mb-0">
                                           Lorem lipsum dolor sit amet...
                                        </p>
                                    </div>
                                    <div class="card-hover-2-footer w-100 mt-auto">
                                        <span class="tags d-block flex-grow-1">Product Design, UI UX</span>
                                        <span class="card-hover-2-footer-link">
                                            <span>View case study</span>
                                        </span>
                                    </div>
                                </div>
                            </a>
                        </div>
                      </div>
            </div>
            </section>
            <!--/section-->

            <section class="bg-primary text-white position-relative px-3 py-6 py-lg-11 overflow-hidden">
                <div class="d-md-flex justify-content-center align-items-center">
                    <div class="mb-4 mb-md-0 me-md-5 me-lg-6 me-xl-7">
                        <h5 class="fs-2">Build stunning website faster than ever</h5>
                        <p class="opacity-75 mb-0">Your business deserve a stunning website. </p>
                    </div><a class="btn btn-outline-white rounded-pill btn-hover-arrow" href="{{ URL::asset('#') }}"><span>Purchase Now</span></a>
                </div>
                <!-- / .End container -->
            </section>
            <!--/.End section-->


</x-assan-layout>
