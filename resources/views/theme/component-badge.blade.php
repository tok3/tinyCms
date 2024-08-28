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
                                                <li class="breadcrumb-item active" aria-current="page">Badge</li>
                                            </ol>
                                        </div>
                                    </nav>
                                    <h1 class="mb-0 display-4">
                                        Badge
                                    </h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>


            <section class="position-relative" id="next">
                <div class="container py-9 py-lg-11 position-relative z-1">
                    <div class="row">
                        <div class="col-md-8 mx-auto">
                            <div class="d-flex align-items-center justify-content-center mb-4">
                                <h6 class="mb-0 me-2 me-lg-4">Badges</h6>
                                <span class="border-top d-block flex-grow-1"></span>
                            </div>
                            <h1>Example heading <span class="badge bg-secondary">New</span></h1>
                            <h2>Example heading <span class="badge bg-secondary">New</span></h2>
                            <h3>Example heading <span class="badge bg-secondary">New</span></h3>
                            <h4>Example heading <span class="badge bg-secondary">New</span></h4>
                            <h5>Example heading <span class="badge bg-secondary">New</span></h5>
                            <h6>Example heading <span class="badge bg-secondary">New</span></h6>
                            <hr class="my-5">
                            <div class="d-flex align-items-center justify-content-center mb-4">
                                <h6 class="mb-0 me-2 me-lg-4">Links or buttons</h6>
                                <span class="border-top d-block flex-grow-1"></span>
                            </div>
                            <button type="button" class="btn btn-primary">
                                Notifications <span class="badge bg-warning text-dark ms-1">4</span>
                            </button>
                            <button type="button" class="btn btn-primary">
                                Profile <span class="badge bg-warning text-dark">9</span>
                                <span class="visually-hidden">unread messages</span>
                            </button>

                            <hr class="my-5">
                            <div class="d-flex align-items-center justify-content-center mb-4">
                                <h6 class="mb-0 me-2 me-lg-4">Background colors</h6>
                                <span class="border-top d-block flex-grow-1"></span>
                            </div>
                            <span class="badge bg-primary">Primary</span>
                            <span class="badge bg-secondary">Secondary</span>
                            <span class="badge bg-success">Success</span>
                            <span class="badge bg-danger">Danger</span>
                            <span class="badge bg-warning text-dark">Warning</span>
                            <span class="badge bg-info">Info</span>
                            <span class="badge bg-body-tertiary text-body">Light</span>
                            <span class="badge bg-dark">Dark</span>

                            <hr class="my-5">
                            <div class="d-flex align-items-center justify-content-center mb-4">
                                <h6 class="mb-0 me-2 me-lg-4">Badges pill</h6>
                                <span class="border-top d-block flex-grow-1"></span>
                            </div>
                            <span class="badge bg-primary rounded-pill">Primary</span>
                            <span class="badge bg-secondary rounded-pill">Secondary</span>
                            <span class="badge bg-success rounded-pill">Success</span>
                            <span class="badge bg-danger rounded-pill">Danger</span>
                            <span class="badge bg-warning text-dark rounded-pill">Warning</span>
                            <span class="badge bg-info rounded-pill">Info</span>
                            <span class="badge bg-body-tertiary text-body rounded-pill">Light</span>
                            <span class="badge bg-dark rounded-pill">Dark</span>
                            <hr class="my-5">
                            <div class="d-flex align-items-center justify-content-center mb-4">
                                <h6 class="mb-0 me-2 me-lg-4">Custom size badge</h6>
                                <span class="border-top d-block flex-grow-1"></span>
                            </div>
                            <!--badge custom size-->
                            <span class="badge bg-success rounded-circle width-2x height-2x me-2 mb-2 flex-center">2</span>
                            <!--badge custom size-->
                            <span class="badge bg-success rounded-circle width-3x height-3x flex-center">3</span>
                            <hr class="my-5">
                            <div class="d-flex align-items-center justify-content-center mb-4">
                                <h6 class="mb-0 me-2 me-lg-4">Custom placement badge</h6>
                                <span class="border-top d-block flex-grow-1"></span>
                            </div>
                            <a href="{{ URL::asset('#!') }}"
                                class="width-3x height-3x position-relative d-flex align-items-center justify-content-center">
                                <i class="bx bx-cart fs-4"></i>
                                <span class="d-block width-2x height-2x position-absolute start-100 top-0 translate-middle">
                                    <span
                                        class="badge bg-dark rounded-circle d-flex width-2x height-2x p-0 small align-items-center justify-content-center">2</span>
                                </span>
                            </a>
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
