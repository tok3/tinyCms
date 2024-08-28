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
                                                <li class="breadcrumb-item active" aria-current="page">Tooltip</li>
                                            </ol>
                                        </div>
                                    </nav>
                                    <h1 class="mb-0 display-4">
                                        Tooltip
                                    </h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="position-relative">
                <div class="container py-9 py-lg-11">
                    <div class="row">
                        <div class="col-lg-8 mx-auto">
                            <div class="d-flex align-items-center justify-content-center mb-4">
                                <h6 class="mb-0 me-2 me-lg-4">Default</h6>
                                <span class="border-top d-block flex-grow-1"></span>
                            </div>
                            <button type="button" class="btn btn-secondary" data-bs-toggle="tooltip" data-bs-placement="top"
                                title="Tooltip on top">
                                Tooltip on top
                            </button>
                            <button type="button" class="btn btn-secondary" data-bs-toggle="tooltip"
                                data-bs-placement="right" title="Tooltip on right">
                                Tooltip on right
                            </button>
                            <button type="button" class="btn btn-secondary" data-bs-toggle="tooltip"
                                data-bs-placement="bottom" title="Tooltip on bottom">
                                Tooltip on bottom
                            </button>
                            <button type="button" class="btn btn-secondary" data-bs-toggle="tooltip"
                                data-bs-placement="left" title="Tooltip on left">
                                Tooltip on left
                            </button>
                            
                            <p class="lead mb-0 mt-7">
                                Lorem ipsum is <strong class="text-decoration-underline" data-bs-toggle="tooltip"
                                    data-bs-placement="bottom" title="Tooltip on text">placeholder</strong> text
                                commonly used in the graphic, print, and publishing industries for previewing layouts
                                and visual mockups.
                            </p>
                        </div>
                    </div>
                </div>
            </section>
            <section class="position-relative overflow-hidden bg-success-subtle">
            <div class="container py-9 py-lg-11">
                <div class="row align-items-end justify-content-around text-center text-md-start">
                    <div class="col-lg-8 col-md-7">
                        <p data-aos="zoom-in" class="mb-4 opacity-75">Are you interested?</p>
                        <h2 class="mb-4 mb-md-0 display-5 fw-lighter" data-aos="zoom-in-up" data-aos-delay="100">
                            Build <span class="text-success font-serif"
                                data-typed='{"strings": ["Stunning", "Amazing", "Responsive", "Working"]}'></span>
                            Website
                        </h2>
                    </div>
                    <!--End Col-->
                    <div class="col-lg-4 col-md-5 text-md-end">

                        <div data-aos="fade-left" data-aos-delay="200">
                            <a href="{{ URL::asset('#!') }}" class="btn btn-primary rounded-pill">
                                Get started
                              
                            </a>
                        </div>
                    </div>
                </div> <!-- / .row -->
            </div> <!-- / .container -->
        </section>
</x-assan-layout>
