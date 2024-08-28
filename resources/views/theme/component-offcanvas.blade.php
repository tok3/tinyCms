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
                                                <li class="breadcrumb-item active" aria-current="page">Offcanvas</li>
                                            </ol>
                                        </div>
                                    </nav>
                                    <h1 class="mb-0 display-4">
                                        Offcanvas
                                    </h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>


            <section class="position-relative" id="next">
                <div class="container py-9 py-11 position-relative z-1">
                    <div class="row">
                        <div class="col-lg-8 mx-auto">
                            <div class="d-flex align-items-center justify-content-center mb-4">
                                <h6 class="me-3">Offcanvas Start</h6>
                                <span class="border-top d-block flex-grow-1"></span>
                            </div>
                            <!--offcanvas-btn-trigger-->
                            <a class="btn btn-primary" data-bs-toggle="offcanvas" href="{{ URL::asset('#offcanvasStart') }}" role="button"
                                aria-controls="offcanvasStart"><i class="bx bx-chevron-left fs-5 lh-1 me-1"></i>Demo
                            </a>
                            <hr class="my-7">
                            <div class="d-flex align-items-center justify-content-center mb-4">
                                <h6 class="me-3">Offcanvas End</h6>
                                <span class="border-top d-block flex-grow-1"></span>
                            </div>
                            <!--offcanvas-btn-trigger-->
                            <a class="btn btn-primary" data-bs-toggle="offcanvas" href="{{ URL::asset('#offcanvasEnd') }}" role="button"
                                aria-controls="offcanvasEnd">
                                Demo<i class="bx bx-chevron-right fs-5 align-middle lh-1 ms-1"></i>
                            </a>
                            <hr class="my-7">
                            <div class="d-flex align-items-center justify-content-center mb-4">
                                <h6 class="me-3">Offcanvas Bottom</h6>
                                <span class="border-top d-block flex-grow-1"></span>
                            </div>
                            <!--offcanvas-btn-trigger-->
                            <a class="btn btn-primary" data-bs-toggle="offcanvas" href="{{ URL::asset('#offcanvasBottom') }}" role="button"
                                aria-controls="offcanvasBottom">
                                <i class="bx bx-chevron-down fs-5 align-middle lh-1 me-1"></i>Demo
                            </a>
                        </div>
                    </div>
                </div>
                <!--Offcanvas start-->
                <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasStart"
                    aria-labelledby="offcanvasStartLabel">
                    <div class="border-bottom offcanvas-header">
                        <button type="button" class="btn btn-secondary p-0 m-0 width-4x height-4x flex-center rounded-pill ms-auto"
                            data-bs-dismiss="offcanvas" aria-label="Close">
                            <i class="bx bx-x fs-4"></i>
                        </button>
                    </div>
                    <div class="offcanvas-body p-4 px-xl-5">
                        <ul class="nav flex-column">
                            <li class="nav-item"><a href="{{ URL::asset('#') }}" class="nav-link fs-3">index</a></li>
                            <li class="nav-item"><a href="{{ URL::asset('#') }}" class="nav-link fs-3">comapny</a></li>
                            <li class="nav-item"><a href="{{ URL::asset('#') }}" class="nav-link fs-3">portfolio</a></li>
                            <li class="nav-item"><a href="{{ URL::asset('#') }}" class="nav-link fs-3">capabilities</a></li>
                            <li class="nav-item"><a href="{{ URL::asset('#') }}" class="nav-link fs-3">get in touch</a></li>
                        </ul>
                    </div>
                    <div class="offcanvas-footer p-4 px-xl-5 border-top bg-body-secondary">
                        <ul class="list-unstyled mb-0">
                            <li class="pb-4">
                                <small class="text-body-tertiary d-block">Email us:</small>
                                <a href="{{ URL::asset('mailto:company@domain.com') }}"
                                    class="link-underline fs-5">company@domain.com</a>
                            </li>
                            <li>
                                <ul class="list-inline">
                                    <li class="list-inline-item me-3">
                                        <a href="{{ URL::asset('#') }}" class="fs-5"><i class="bx bxl-facebook"></i></a>
                                    </li>
                                    <li class="list-inline-item me-3">
                                        <a href="{{ URL::asset('#') }}" class="fs-5"><i class="bx bxl-twitter"></i></a>
                                    </li>
                                    <li class="list-inline-item me-3">
                                        <a href="{{ URL::asset('#') }}" class="fs-5"><i class="bx bxl-linkedin"></i></a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="{{ URL::asset('#') }}" class="fs-5"><i class="bx bxl-instagram"></i></a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
                <!--Offcanvas end-->
                <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasEnd"
                    aria-labelledby="offcanvasEndLabel">
                    <div class="border-bottom offcanvas-header">
                        <button type="button" class="btn btn-secondary p-0 m-0 width-4x height-4x flex-center rounded-pill ms-auto"
                        data-bs-dismiss="offcanvas" aria-label="Close">
                        <i class="bx bx-x fs-4"></i>
                    </button>
                    </div>
                    <div class="offcanvas-body p-4 px-xl-5">
                        <ul class="nav flex-column">
                            <li class="nav-item"><a href="{{ URL::asset('#') }}" class="nav-link fs-3">index</a></li>
                            <li class="nav-item"><a href="{{ URL::asset('#') }}" class="nav-link fs-3">comapny</a></li>
                            <li class="nav-item"><a href="{{ URL::asset('#') }}" class="nav-link fs-3">portfolio</a></li>
                            <li class="nav-item"><a href="{{ URL::asset('#') }}" class="nav-link fs-3">capabilities</a></li>
                            <li class="nav-item"><a href="{{ URL::asset('#') }}" class="nav-link fs-3">get in touch</a></li>
                        </ul>
                    </div>
                    <div class="offcanvas-footer p-4 px-xl-5 border-top bg-body-secondary">
                        <ul class="list-unstyled mb-0">
                            <li class="pb-4">
                                <small class="text-body-tertiary d-block">Email us:</small>
                                <a href="{{ URL::asset('mailto:company@domain.com') }}"
                                    class="link-underline fs-5">company@domain.com</a>
                            </li>
                            <li>
                                <ul class="list-inline">
                                    <li class="list-inline-item me-3">
                                        <a href="{{ URL::asset('#') }}" class="fs-5"><i class="bx bxl-facebook"></i></a>
                                    </li>
                                    <li class="list-inline-item me-3">
                                        <a href="{{ URL::asset('#') }}" class="fs-5"><i class="bx bxl-twitter"></i></a>
                                    </li>
                                    <li class="list-inline-item me-3">
                                        <a href="{{ URL::asset('#') }}" class="fs-5"><i class="bx bxl-linkedin"></i></a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="{{ URL::asset('#') }}" class="fs-5"><i class="bx bxl-instagram"></i></a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>

                <!--Offcanvas bottom-->
                <div class="offcanvas offcanvas-bottom" tabindex="-1" id="offcanvasBottom"
                    aria-labelledby="offcanvasBottomLabel">
                    <div class="offcanvas-header">
                        <button type="button" class="btn btn-secondary p-0 m-0 width-4x height-4x flex-center rounded-pill ms-auto"
                            data-bs-dismiss="offcanvas" aria-label="Close">
                            <i class="bx bx-x fs-4"></i>
                        </button>
                    </div>
                    <div class="offcanvas-body">
                        ...
                    </div>
                </div>
            </section>
            <section class="bg-success bg-opacity-10 position-relative">
                <div class="container py-9 py-lg-11">
                    <div class="row align-items-center justify-content-center">
                        <div class="col-md-10 col-lg-8 col-xl-7 text-center mx-auto">
                            <h2 class="mb-4 display-4" data-aos="fade-up">
                                Design anything
                            </h2>
                            <p class="mb-5 px-lg-5" data-aos="fade-up" data-aos-delay="100">
                                Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing
                                industries for previewing layouts and visual mockups.
                            </p>
                            <div data-aos="fade-up">
                                <a href="{{ URL::asset('#!') }}" class="btn btn-primary rounded-pill btn-lg">Purchase a
                                    license</a>
                            </div>
                        </div>
                        <!--End Col-->
                    </div> <!-- / .row -->
                </div> <!-- / .container -->
            </section>
</x-assan-layout>
