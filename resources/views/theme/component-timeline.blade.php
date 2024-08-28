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
                                                <li class="breadcrumb-item active" aria-current="page">Timeline
                                                </li>
                                            </ol>
                                        </div>
                                    </nav>
                                    <h1 class="mb-0 display-4">
                                        Timeline
                                    </h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="position-relative" id="next">
                <div class="container py-6 py-lg-11">
                    <div class="row">
                        <div class="col col-lg-10 col-xl-8 mx-lg-auto">

                            <div class="d-flex align-items-center mb-7 mb-lg-9">
                                <h5 class="mb-0 flex-grow-0 pe-3">Timeline - 1</h5>
                                <div class="flex-grow-1 border-bottom"></div>
                            </div>
                            <ol class="list-timeline-v list-unstyled">
                                 <!--timeline-item-->
                                <li data-aos="fade-left">
                                    <div class="timeline-icon shadow bg-primary text-white rounded-4">
                                        <!--ICON-->
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </div>
                                    <!--/.timeline-icon-->
                                    <div class="d-block flex-column">
                                        <small class="text-body-secondary">Aug 19, 1994</small>
                                        <h6 class="mt-2">Lorem Ipsum is simply dummy text</h6>
                                        <p class="mb-0">
                                            The standard chunk of Lorem Ipsum used since the 1500s is reproduced below
                                            for
                                            those interested.
                                        </p>
                                    </div>
                                </li>
                                <!--timeline-item-->
                                <li data-aos="fade-left">
                                    <div class="timeline-icon shadow bg-info text-white rounded-4">
                                        <!--ICON-->
                                        <i class="bx bx-shopping-bag"></i>
                                    </div>
                                    <!--/.timeline-icon-->
                                    <div class="d-block flex-column">
                                        <small class="text-body-secondary">July 01, 2000</small>
                                        <h6 class="mt-2">Lorem Ipsum is simply dummy text</h6>
                                        <p class="mb-0">
                                            The standard chunk of Lorem Ipsum used since the 1500s is reproduced below
                                            for
                                            those interested.
                                        </p>
                                    </div>
                                </li>
                                 <!--timeline-item-->
                                <li data-aos="fade-left">
                                    <div class="timeline-icon shadow bg-success text-white rounded-4">
                                        <!--ICON-->
                                        <i class="bx bx-edit"></i>
                                    </div>
                                    <!--/.timeline-icon-->
                                    <div class="d-block flex-column">
                                        <small class="text-body-secondary">Feb, 2012</small>
                                        <h6 class="mt-2">Lorem Ipsum is simply dummy text</h6>
                                        <p class="mb-0">
                                            The standard chunk of Lorem Ipsum used since the 1500s is reproduced below
                                            for
                                            those interested.
                                        </p>
                                    </div>
                                </li>
                                 <!--timeline-item-->
                                <li data-aos="fade-left">
                                    <div class="timeline-icon shadow bg-danger text-white rounded-4">
                                        <!--ICON-->
                                        <i class="bx bx-envelope"></i>
                                    </div>
                                    <!--/.timeline-icon-->
                                    <div class="d-block flex-column">
                                        <small class="text-body-secondary">Feb 14, 2013</small>
                                        <h6 class="mt-2">Lorem Ipsum is simply dummy text</h6>
                                        <p class="mb-0">
                                            The standard chunk of Lorem Ipsum used since the 1500s is reproduced below
                                            for
                                            those interested.
                                        </p>
                                    </div>
                                </li>
                                
                            </ol>
                            <!--/.END-timeline-list-->

                             <!--Code snippet modal-->
                             <div class="pt-5"></div>
                    <x-partials/snippets/components/timeline/timeline-v-1 />
                        </div>
                    </div>

                </div>
                <!--/.container-full-width-->
            </section>
            <section class="position-relative border-top">
                <div class="container py-6 py-lg-11">
                   
                    <div class="row">
                        <div class="col-lg-10 mx-auto">
                             <div class="d-flex align-items-center mb-7 mb-lg-9">
                            <h5 class="mb-0 flex-grow-0 pe-3">Timeline - Steps</h5>
                            <div class="flex-grow-1 border-bottom"></div>
                        </div>
                        <!--Steps list-->
                            <ul class="step mx-3 mx-sm-0 list-unstyled mb-0">

                                <!--step-item-->
                                <li class="step-item">
                                    <div class="step-row">
                                        <span class="step-icon bg-danger text-white">
                                            <!--ICON-DOT-->
                                            <i class="bx bx-cog align-middle lh-1"></i>
                                        </span>

                                        <div class="step-content">
                                            <div class="alert alert-danger d-flex mb-0" role="alert">
                                                <i class="bx bx-exclamation mt-1 me-4 fs-4"></i>
                                                <div class="">
                                                    <h6 class="alert-heading">Scheduled Maintenance!</h6>
                                                    <hr class="my-2">
                                                    <p class="text-body mb-0">We're currently updating an issue that's
                                                        preventing Forms, Meetings and Ads from being modified. All
                                                        existing forms on websites continue working and accepting
                                                        submissions.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </li>
                                <!--step-item-->
                                <li class="step-item">
                                    <div class="step-row">
                                        <span class="step-icon bg-success text-white">
                                            <!--ICON-DOT-->
                                            <i class="bx bxl-dribbble align-middle lh-1"></i>
                                        </span>

                                        <div class="step-content">
                                            <h6 class="mb-1">Updated to bootstrap 5</h6>
                                            <small class="d-block mb-2 text-body-secondary">June 14, 12:24PM EST</small>
                                            <p class="mb-0">
                                                Lorem Ipsum is simply dummy text of the printing and typesetting
                                                industry.
                                                Lorem Ipsum has been the industry's standard dummy text ever since the
                                                1500s, when an unknown printer took a galley of type and scrambled it to
                                                make a type specimen book.
                                            </p>
                                        </div>
                                    </div>

                                </li>
                                <!--step-item-->
                                <li class="step-item">
                                    <div class="step-row">
                                        <span class="step-icon bg-primary text-white">
                                            <!--ICON-DOT-->
                                            <i class="bx bx-bug align-middle lh-1 fs-6"></i>
                                        </span>

                                        <div class="step-content">
                                            <h6 class="mb-1">Minor bug fixes</h6>
                                            <small class="d-block mb-2 text-body-secondary">June 02, 11:24 AM EST</small>
                                            <p class="mb-0">
                                                Lorem Ipsum is simply dummy text of the printing and typesetting
                                                industry.
                                                Lorem Ipsum has been the industry's standard dummy text ever since the
                                                1500s, when an unknown printer took a galley of type and scrambled it to
                                                make a type specimen book.
                                            </p>
                                        </div>
                                    </div>

                                </li>
                                
                            </ul>
                            <!--End Steps list-->
                        </div>
                    </div>

                     <!--Code snippet modal-->
                     <div class="pt-5"></div>
                     <x-partials/snippets/components/timeline/timeline-steps />
                </div>
                <!--/.container-end-->
            </section>
           

            <section class="position-relative border-top overflow-hidden">
                <div class="container py-9 py-lg-12 position-relative">
                    <h1 class="display-5 mb-7 mb-lg-9">Timeline History</h1>
                     <!--History swiper slider-->
                     <div class="swiper-history swiper-container overflow-visible">
                        <!--Slider wrapper-->
                        <div class="swiper-wrapper">
                            <!--Slide-->
                            <div class="swiper-slide">
                                <div>
                                    <div class="pe-5 pb-3 pe-lg-7">
                                        <!--Time-->
                                        <p class="text-body-secondary">At Present</p>
                                        <!--Year-->
                                        <h2 class="text-primary display-5">2022</h2>
                                    </div>
                                    <!--Divider line-->
                                    <div class="swiper-divider-line bg-primary position-relative w-100 my-4"></div>
                                    <!--Text-->
                                    <div class="pe-7 pt-3 pe-lg-7">
                                        <h5>Whole new look with bootstrap5</h5>
                                        <p>Lorem ipsum is text commonly used in the graphic, print, and publishing
                                            industries for previewing layouts and visual mockups.</p>
                                    </div>
                                </div>
                            </div>
                             <!--Slide-->
                             <div class="swiper-slide">
                                <div>
                                    <div class="pe-5 pb-3 pe-lg-7">
                                        <!--Time-->
                                        <p class="text-body-secondary">May</p>
                                        <!--Year-->
                                        <h2 class="text-primary text-opacity-75 display-5">2020</h2>
                                    </div>
                                    <!--Divider line-->
                                    <div class="swiper-divider-line bg-primary bg-opacity-75 position-relative w-100 my-4"></div>
                                    <!--Text-->
                                    <div class="pe-7 pt-3 pe-lg-7">
                                        <h5>Finished 5000 Sales</h5>
                                        <p>Lorem ipsum is text commonly used in the graphic, print, and publishing
                                            industries for previewing layouts and visual mockups.</p>
                                    </div>
                                </div>
                            </div>
                            <!--Slide-->
                            <div class="swiper-slide">
                                <div>
                                    <div class="pe-5 pb-3 pe-lg-7">
                                        <!--Time-->
                                        <p class="text-body-secondary">June</p>
                                        <!--Year-->
                                        <h2 class="text-primary text-opacity-75 display-5">2018</h2>
                                    </div>
                                    <!--Divider line-->
                                    <div class="swiper-divider-line bg-primary bg-opacity-50 position-relative w-100 my-4"></div>
                                    <!--Text-->
                                    <div class="pe-7 pt-3 pe-lg-7">
                                        <h5>Convert into Bootstrap 4</h5>
                                        <p>Lorem ipsum is text commonly used in the graphic, print, and publishing
                                            industries for previewing layouts and visual mockups.</p>
                                    </div>
                                </div>
                            </div>
                            <!--Slide-->
                            <div class="swiper-slide">
                                <div>
                                    <div class="pe-5 pb-3 pe-lg-7">
                                        <!--Time-->
                                        <p class="text-body-secondary">July</p>
                                        <!--Year-->
                                        <h2 class="text-primary text-opacity-50 display-5">2016</h2>
                                    </div>
                                    <!--Divider line-->
                                    <div class="swiper-divider-line bg-primary bg-opacity-25 position-relative w-100 my-4"></div>
                                    <!--Text-->
                                    <div class="pe-7 pt-3 pe-lg-7">
                                        <h5>Finished 2000 Sales</h5>
                                        <p>Lorem ipsum is text commonly used in the graphic, print, and publishing
                                            industries for previewing layouts and visual mockups.</p>
                                    </div>
                                </div>
                            </div>
                            <!--Slide-->
                            <div class="swiper-slide">
                                <div>
                                    <div class="pe-5 pb-3 pe-lg-7">
                                        <!--Time-->
                                        <p class="text-body-secondary">August</p>
                                        <!--Year-->
                                        <h2 class="text-primary text-opacity-25 display-5">2014</h2>
                                    </div>
                                    <!--Divider line-->
                                    <div class="swiper-divider-line position-relative w-100 my-4"></div>
                                    <!--Text-->
                                    <div class="pe-7 pt-3 pe-lg-7">
                                        <h5>Launched Assan Theme</h5>
                                        <p>Lorem ipsum is text commonly used in the graphic, print, and publishing
                                            industries for previewing layouts and visual mockups.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                
                    <!--Code snippet modal-->
                    <div class="pt-5"></div>
                    <x-partials/snippets/components/timeline/timeline-history-swiper />
                </div>
            </section>
            
            <section class="bg-success-subtle position-relative">
                <svg class="position-absolute top-0 start-0 text-success w-50 h-auto w-lg-75" width="136" height="76"
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
