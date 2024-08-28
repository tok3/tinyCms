<x-assan-layout layout-type="{{$layoutType}}">
            <section id="page-header" class="position-relative bg-gradient-primary text-white overflow-hidden">
                <div class="container pt-11 pb-9 pb-lg-11 pt-lg-14">
                    <div class="row pt-lg-7">
                        <div class="col-lg-7">
                            <ol class="breadcrumb mb-3">
                                <li class="breadcrumb-item"><a href="{{ URL::asset('#') }}">Home</a></li>
                                <li class="breadcrumb-item active">Portfolio</li>
                                <li class="breadcrumb-item active" aria-current="page">Classic 2 columns</li>
                            </ol>
                            <h1 class="mb-0 display-4">Selected works</h1>
                        </div>
                    </div>
                </div>
            </section>
            <!--/.Page-header-->

            <section class="position-relative">
                <div class="container py-9 py-lg-11 position-relative z-1">
                 <!-- Nav -->
                 <ul class="mb-5 nav nav-filter align-items-center justify-content-end mb-0">
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

                      <div id="projects" data-isotope='{"layoutMode": "masonry"}' class="row">

                        <div class="col-md-6 mb-4 bootstrap grid-item">
                            <a href="{{ URL::asset('#!') }}" class="card-hover">
                               <div class="overflow-hidden position-relative mb-4">
                                <img src="{{ URL::asset('assets/img/projects/1.jpg') }}" alt="" class="img-zoom img-fluid">
                               </div>
                                <h5 class="mb-1">Sed quia non numquam</h5>
                                <span class="text-body-secondary">UI / UX</span>
                            </a>
                        </div>
                        <div class="col-md-6 mb-4 figma grid-item">
                            <a href="{{ URL::asset('#!') }}" class="card-hover">
                                <div class="overflow-hidden position-relative mb-4">
                                 <img src="{{ URL::asset('assets/img/projects/2.jpg') }}" alt="" class="img-zoom img-fluid">
                                </div>
                                 <h5 class="mb-1">Ogólnie znana teza</h5>
                                 <span class="text-body-secondary">Javascript</span>
                             </a>
                        </div>
                        <div class="col-md-6 mb-4 bootstrap grid-item">
                            <a href="{{ URL::asset('#!') }}" class="card-hover">
                                <div class="overflow-hidden position-relative mb-4">
                                 <img src="{{ URL::asset('assets/img/projects/3.jpg') }}" alt="" class="img-zoom img-fluid">
                                </div>
                                 <h5 class="mb-1">El punto de</h5>
                                <span class="text-body-secondary">Business, Marketing</span>
                             </a>
                        </div>
                        <div class="col-md-6 mb-4 figma grid-item">
                            <a href="{{ URL::asset('#!') }}" class="card-hover">
                                <div class="overflow-hidden position-relative mb-4">
                                 <img src="{{ URL::asset('assets/img/projects/4.jpg') }}" alt="" class="img-zoom img-fluid">
                                </div>
                                 <h5 class="mb-1">Sed quia non numquam</h5>
                                 <span class="text-body-secondary">UI / UX</span>
                             </a>
                        </div>
                        <div class="col-md-6 mb-4 mb-md-0 bootstrap grid-item">
                            <a href="{{ URL::asset('#!') }}" class="card-hover">
                                <div class="overflow-hidden position-relative mb-4">
                                 <img src="{{ URL::asset('assets/img/projects/5.jpg') }}" alt="" class="img-zoom img-fluid">
                                </div>
                                 <h5 class="mb-1">Excepteur sint occaecat</h5>
                                 <span class="text-body-secondary">Product Design</span>
                             </a>
                        </div>
                        <div class="col-md-6 javascript grid-item">
                            <a href="{{ URL::asset('#!') }}" class="card-hover">
                                <div class="overflow-hidden position-relative mb-4">
                                 <img src="{{ URL::asset('assets/img/projects/6.jpg') }}" alt="" class="img-zoom img-fluid">
                                </div>
                                 <h5 class="mb-1">Sed quia non numquam</h5>
                                 <span class="text-body-secondary">UI / UX</span>
                             </a>
                        </div>
                      </div>
            </div>
            </section>
            <!--/section-->

            <section class="bg-gradient-primary text-white position-relative px-3 py-6 py-lg-11 overflow-hidden">
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
