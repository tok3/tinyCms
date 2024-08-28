<x-assan-layout layout-type="{{$layoutType}}">
            <section id="page-header" class="position-relative bg-gradient-primary text-white overflow-hidden">
                <div class="container pt-11 pb-9 pb-lg-11 pt-lg-14">
                    <div class="row pt-lg-7">
                        <div class="col-lg-7">
                            <ol class="breadcrumb mb-3">
                                <li class="breadcrumb-item"><a href="{{ URL::asset('#') }}">Home</a></li>
                                <li class="breadcrumb-item active">Portfolio</li>
                                <li class="breadcrumb-item active" aria-current="page">grid full-width Masonry</li>
                            </ol>
                            <h1 class="mb-0 display-4">Selected works</h1>
                        </div>
                    </div>
                </div>
            </section>
            <!--/.Page-header-->

            <section class="position-relative">
                <div class="container pt-9 pt-lg-11">
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
                </div>
                <div class="container-fluid px-0 position-relative z-1">
                    <div id="projects" data-isotope='{"layoutMode": "masonry"}' class="row g-0">

                        <div class="col-md-6 col-lg-4 development grid-item">
                            <a href="{{ URL::asset('#!') }}" class="card-over card-split-hover d-block card-hover overflow-hidden">
                                <img src="{{ URL::asset('assets/img/projects/3.jpg') }}" alt="" class="img-fluid img-zoom">
                                <div class="card-overlay p-4 p-lg-5 d-flex align-items-end text-white">
                                    <ul class="list-unstyled overlay-items">
                                        <li>
                                            <h5 class="mb-2 fs-4 splitting-up" data-splitting>Awesome title</h5>
                                        </li>
                                        <li><span class="splitting-up" data-splitting>Awesome Subtitle</span></li>
                                    </ul>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-6 col-lg-4 motion grid-item">
                            <a href="{{ URL::asset('#!') }}" class="card-over card-split-hover d-block card-hover overflow-hidden">
                                <img src="{{ URL::asset('assets/img/projects/half2.jpg') }}" alt="" class="img-fluid img-zoom">
                                <div class="card-overlay p-4 p-lg-5 d-flex align-items-end text-white">
                                    <ul class="list-unstyled overlay-items">
                                        <li>
                                            <h5 class="mb-2 fs-4 splitting-up" data-splitting>Awesome title</h5>
                                        </li>
                                        <li><span class="splitting-up" data-splitting>Awesome Subtitle</span></li>
                                    </ul>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-6 col-lg-4 motion grid-item">
                            <a href="{{ URL::asset('#!') }}" class="card-over card-split-hover d-block card-hover overflow-hidden">
                                <img src="{{ URL::asset('assets/img/projects/1.jpg') }}" alt="" class="img-fluid img-zoom">
                                <div class="card-overlay p-4 p-lg-5 d-flex align-items-end text-white">
                                    <ul class="list-unstyled overlay-items">
                                        <li>
                                            <h5 class="mb-2 fs-4 splitting-up" data-splitting>Awesome title</h5>
                                        </li>
                                        <li><span class="splitting-up" data-splitting>Awesome Subtitle</span></li>
                                    </ul>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-6 col-lg-4 design development grid-item">
                            <a href="{{ URL::asset('#!') }}" class="card-over card-split-hover d-block card-hover overflow-hidden">
                                <img src="{{ URL::asset('assets/img/projects/4.jpg') }}" alt="" class="img-fluid img-zoom">
                                <div class="card-overlay p-4 p-lg-5 d-flex align-items-end text-white">
                                    <ul class="list-unstyled overlay-items">
                                        <li>
                                            <h5 class="mb-2 fs-4 splitting-up" data-splitting>Awesome title</h5>
                                        </li>
                                        <li><span class="splitting-up" data-splitting>Awesome Subtitle</span></li>
                                    </ul>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-6 col-lg-4 motion grid-item">
                            <a href="{{ URL::asset('#!') }}" class="card-over card-split-hover d-block card-hover overflow-hidden">
                                <img src="{{ URL::asset('assets/img/projects/half5.jpg') }}" alt="" class="img-fluid img-zoom">
                                <div class="card-overlay p-4 p-lg-5 d-flex align-items-end text-white">
                                    <ul class="list-unstyled overlay-items">
                                        <li>
                                            <h5 class="mb-2 fs-4 splitting-up" data-splitting>Awesome title</h5>
                                        </li>
                                        <li><span class="splitting-up" data-splitting>Awesome Subtitle</span></li>
                                    </ul>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-6 col-lg-4 design grid-item">
                            <a href="{{ URL::asset('#!') }}" class="card-over card-split-hover d-block card-hover overflow-hidden">
                                <img src="{{ URL::asset('assets/img/projects/5.jpg') }}" alt="" class="img-fluid img-zoom">
                                <div class="card-overlay p-4 p-lg-5 d-flex align-items-end text-white">
                                    <ul class="list-unstyled overlay-items">
                                        <li>
                                            <h5 class="mb-2 fs-4 splitting-up" data-splitting>Awesome title</h5>
                                        </li>
                                        <li><span class="splitting-up" data-splitting>Awesome Subtitle</span></li>
                                    </ul>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-6 col-lg-4 design grid-item">
                            <a href="{{ URL::asset('#!') }}" class="card-over card-split-hover d-block card-hover overflow-hidden">
                                <img src="{{ URL::asset('assets/img/projects/half1.jpg') }}" alt="" class="img-fluid img-zoom">
                                <div class="card-overlay p-4 p-lg-5 d-flex align-items-end text-white">
                                    <ul class="list-unstyled overlay-items">
                                        <li>
                                            <h5 class="mb-2 fs-4 splitting-up" data-splitting>Awesome title</h5>
                                        </li>
                                        <li><span class="splitting-up" data-splitting>Awesome Subtitle</span></li>
                                    </ul>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-6 col-lg-4 design grid-item">
                            <a href="{{ URL::asset('#!') }}" class="card-over card-split-hover d-block card-hover overflow-hidden">
                                <img src="{{ URL::asset('assets/img/projects/half3.jpg') }}" alt="" class="img-fluid img-zoom">
                                <div class="card-overlay p-4 p-lg-5 d-flex align-items-end text-white">
                                    <ul class="list-unstyled overlay-items">
                                        <li>
                                            <h5 class="mb-2 fs-4 splitting-up" data-splitting>Awesome title</h5>
                                        </li>
                                        <li><span class="splitting-up" data-splitting>Awesome Subtitle</span></li>
                                    </ul>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </section>
            <!--/section-->

            <section class="bg-primary text-white position-relative px-3 py-9 py-lg-11 jarallax" data-speed=".2">
                <img src="{{ URL::asset('assets/img/backgrounds/bg3.jpg') }}" alt="" class="jarallax-img opacity-25">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-8 col-xl-7">
                            <h2 class="display-4 mb-4">Build stunning website faster than ever</h2>
                            <p class="lead text-white-50 mb-0">Your business deserve a stunning website. </p>
                        </div>
                        <div class="col-lg-4 ms-lg-auto text-lg-end">
                            <a class="btn btn-outline-white rounded-pill btn-hover-arrow" href="{{ URL::asset('#') }}"><span>Purchase
                                    Now</span></a>
                        </div>
                    </div>
                </div>
                <!-- / .End container -->
            </section>
            <!--/.End section-->
</x-assan-layout>
