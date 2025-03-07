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
                                                <li class="breadcrumb-item active" aria-current="page">Card Icon</li>
                                            </ol>
                                        </div>
                                    </nav>
                                    <h1 class="mb-0 display-4">
                                        Card icon
                                    </h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="border-bottom">
                <div class="container py-9 py-lg-11">
                    <h4 class="mb-5">Component #1</h4>
                    <div class="row">
                        <div class="col-12 col-md-6 col-xl-3 mb-7 mb-xl-0" data-aos="fade-up">
                            <!--Code snippet modal-->
                            <x-partials/snippets/components/card-icon/card-icon-1 />
                            <br><br>
                            <!--Card-->
                            <div class="position-relative">
                                <!--Icon-->
                                <div
                                    class="mb-5 position-relative width-6x height-6x bg-gradient-primary text-white rounded-circle flex-center overflow-hidden">
                                    <i class="icon-Repeat-2 fs-3 position-relative"></i>
                                </div>
                                <!--Title-->
                                <h5 class="mb-3">Feature heading</h5>
                                <!--Description-->
                                <p class="mb-4">
                                    Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing
                                    industries for layouts and visual mockups.
                                </p>
                                <!--Action link-->
                                <div>
                                    <a href="{{ URL::asset('#!') }}" class="link-hover-underline text-body-secondary fw-semibold">
                                        Learn More<i class="bx bx-right-arrow-alt align-middle ms-1 lh-1 fs-5"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="border-bottom">
                <div class="container py-9 py-lg-11">
                    <h4 class="mb-5">Component #2</h4>
                    <div class="row">
                        <div class="col-12 col-md-5 col-xl-4" data-aos="fade-up">
                            <!--Code snippet modal-->
                            <x-partials/snippets/components/card-icon/card-icon-2 />
                            <br><br>
                            <!--Card-->
                            <div class="d-flex">
                                <!--Icon-->
                                <div class="me-4 flex-shrink-0 position-relative">
                                    <i class="bx bx-code-alt fs-3 lh-1 text-primary position-relative"></i>
                                </div>
                                <div class="flex-grow-1">
                                    <!--Title-->
                                    <h5 class="mb-2">Feature heading</h5>
                                    <!--Description-->
                                    <p class="mb-0">
                                        Lorem ipsum is placeholder text commonly used in the graphic, print, and
                                        publishing
                                        industries for layouts and visual mockups.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="border-bottom">
                <div class="container py-9 py-lg-11">
                    <h4 class="mb-5">Component #3</h4>
                    <div class="row">
                        <div class="col-12 col-md-5 col-xl-4" data-aos="fade-up">
                            <!--Code snippet modal-->
                            <x-partials/snippets/components/card-icon/card-icon-3 />
                            <br><br>
                            <!--Card-->
                            <div class="overflow-hidden">
                                <div class="d-flex mb-3 align-items-center">
                                    <!--Title_Icon-->
                                    <i
                                        class="bx bx-code-alt fs-4 lh-1 flex-shrink-0 text-primary position-relative"></i>
                                    <h5 class="mb-0 ms-3 flex-grow-1">Feature heading</h5>
                                </div>
                                <!--Description-->
                                <p class="mb-0">
                                    Lorem ipsum is placeholder text commonly used in the graphic, print, and
                                    publishing
                                    industries for layouts and visual mockups.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="border-bottom">
                <div class="container py-9 py-lg-11">
                    <h4 class="mb-5">Component #4</h4>
                    <div class="row">
                        <div class="col-12 col-md-5 col-xl-4" data-aos="fade-up">
                            <!--Code snippet modal-->
                            <x-partials/snippets/components/card-icon/card-icon-4 />
                            <br><br>
                            <!--Card-->
                            <div class="overflow-hidden text-center">
                                <!--Icon-->
                                <div class="mb-4 width-7x height-7x flex-center position-relative">
                                    <!--Icon bg shape-->
                                    <svg class="position-absolute text-primary start-0 top-0 w-100 h-100"
                                        preserveAspectRatio="none" width="120" height="120" viewBox="0 0 120 120"
                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M55.4078 1.90215C58.3481 0.684225 61.6519 0.684225 64.5922 1.90215L97.8342 15.6714C100.775 16.8894 103.111 19.2255 104.329 22.1658L118.098 55.4078C119.316 58.3481 119.316 61.6519 118.098 64.5922L104.329 97.8342C103.111 100.775 100.775 103.111 97.8342 104.329L64.5922 118.098C61.6519 119.316 58.3481 119.316 55.4078 118.098L22.1658 104.329C19.2255 103.111 16.8894 100.775 15.6714 97.8342L1.90215 64.5922C0.684225 61.6519 0.684225 58.3481 1.90215 55.4078L15.6714 22.1658C16.8894 19.2255 19.2255 16.8894 22.1658 15.6714L55.4078 1.90215Z"
                                            fill="currentColor"></path>
                                    </svg>
                                    <!--Icon-->
                                    <i class="icon-Idea-3 fs-2 text-white position-relative"></i>
                                </div>
                                <!--Title-->
                                <h5 class="mb-3">Feature heading</h5>
                                <!--Description-->
                                <p class="mb-0">
                                    Lorem ipsum is placeholder text commonly used in the graphic, print, and
                                    publishing
                                    industries for layouts and visual mockups.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="position-relative border-bottom">
                <div class="container py-9 py-lg-11">
                    <h4 class="mb-5">Component #5</h4>
                    <div class="row">
                        <div class="col-12 col-md-6 col-xl-5" data-aos="fade-up">
                            <!--Code snippet modal-->
                            <x-partials/snippets/components/card-icon/card-icon-5 />
                            <br><br>
                            <!--Card-->
                            <div
                                class="overflow-hidden card card-body py-5 rounded-4 hover-lift hover-shadow-lg flex-row align-items-stretch">
                                <!--Icon-->
                                <div
                                    class="me-4 flex-shrink-0 width-6x height-6x text-success flex-center position-relative">
                                    <!--Icon bg shape-->
                                    <svg class="position-absolute start-0 top-0 w-100 h-100"
                                        preserveAspectRatio="xMidYMid meet" xmlns="http://www.w3.org/2000/svg"
                                        width="84" height="92" viewBox="0 0 84 92" fill="none">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M41.3828 0.0129826C55.5202 -0.410183 67.474
                                         9.57304 75.7126 20.9401C83.3878 31.531 85.5334 44.6132 82.9678 57.3932C80.293 70.7184 74.4344
                                          84.5754 61.8454 90.0204C49.6096 95.312 36.2153 89.0111 24.4948 82.6812C13.7354 76.8709 3.88915
                                           68.9009 0.94914 57.1331C-2.04982 45.1292 2.39369 33.0501 9.56447 22.9202C17.4794 11.7389 27.5859
                                            0.425968 41.3828 0.0129826Z" fill="currentColor" />
                                    </svg>
                                    <!--Icon-->
                                    <i class="icon-Idea-3 fs-3 text-white position-relative"></i>
                                </div>
                                <div class="flex-grow-1">
                                    <!--Title-->
                                    <h5 class="mb-3">Feature heading</h5>
                                    <!--Description-->
                                    <p class="mb-0">
                                        Lorem ipsum is placeholder text commonly used in the graphic, print, and
                                        publishing
                                        industries for layouts and visual mockups.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="position-relative border-bottom">
                <div class="container py-9 py-lg-11">
                    <h4 class="mb-5">Component #6</h4>
                    <!--Code snippet modal-->
                    <x-partials/snippets/components/card-icon/card-icon-6 />
                    <br><br>
                    <div class="row">
                        <div class="col-md-6 col-xl-3">

                            <!--Card-->
                            <div class="card card-body hover-shadow-lg hover-lift">
                                <div class="d-flex justify-content-between align-items-center mb-4">
                                    <!--Brand Icon-->
                                    <div
                                        class="position-relative overflow-hidden flex-center width-6x height-6x p-3 rounded-circle bg-primary-subtle">
                                        <img src="{{ URL::asset('assets/img/brands/GitHub.svg') }}" alt="" class="w-100 h-auto">
                                    </div>
                                    <div>
                                        <!--Dropdown-->
                                        <div class="dropdown">
                                            <a href="{{ URL::asset('#') }}" data-bs-toggle="dropdown"
                                                class="p-0 btn btn-light width-3x height-3x rounded-pill d-flex flex-center">
                                                <!--Brand Icon-->
                                                <i class="bx bx-dots-vertical-rounded"></i>
                                            </a>
                                            <!--Dropdown-menu-->
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a href="{{ URL::asset('#!') }}" class="dropdown-item">
                                                    <i class="bx bx-log-in-circle me-2"></i>
                                                    <small>SignUp now</small></a>
                                                <a href="{{ URL::asset('#!') }}" class="dropdown-item">
                                                    <i class="bx bx-heart me-2"></i>
                                                    <small>Save for later</small></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <span class="small d-block text-body-secondary mb-2">Business</span>
                                    <a href="{{ URL::asset('#!') }}" class="d-block text-dark h5 mb-3">Advanced Territory
                                        Management</a>
                                    <p class="mb-4">
                                        Lorem ipsum is placeholder text commonly used in the graphic, print, and
                                        publishing.
                                    </p>
                                    <ul class="list-inline text-body-secondary list-inline-divided">
                                        <li class="list-inline-item">
                                            <span class="fw-semibold small">
                                                24 Lessions
                                            </span>
                                        </li>
                                        <li class="list-inline-item">
                                            <span class="fw-semibold small">
                                                <i class="bx bx-star me-1 text-warning"></i>
                                                <span class="d-inline-block align-middle"> 4.8</span>
                                            </span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!--/.End card-->

                        </div>
                    </div>
                </div>
            </section>

            <section class="position-relative">
                <div class="container py-9 py-lg-11">
                    <h4 class="mb-5">Component #7</h4>
                    <!--Code snippet modal-->
                    <x-partials/snippets/components/card-icon/card-icon-7 />
                    <br><br>
                    <div class="row">
                        <div class="col-md-6 col-xl-5">

                            <!--Card-->
                            <div class="d-flex align-items-stretch position-relative">
                                <!--Icon / Badge-->
                                <div
                                    class="width-6x height-6x position-relative fs-4 flex-shrink-0 text-white flex-center bg-primary rounded-3 rounded-end-0">
                                    <i class="bx bx-code"></i>
                                </div>
                                <!--Card content-->
                                <div class="flex-grow-1 p-4 shadow-lg rounded-3 rounded-top-start-0 position-relative">
                                    <div class="position-relative">
                                        <!--:Title:-->
                                        <h5>Well coded</h5>
                                        <!--:Text:-->
                                        <p class="mb-0">
                                            Lorem ipsum is placeholder text commonly used in the graphic, print, and
                                            publishing industries for layouts and visual mockups.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <!--/.End card-->

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
