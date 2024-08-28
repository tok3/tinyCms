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
                                                <li class="breadcrumb-item active" aria-current="page">Swiper Slider
                                                </li>
                                            </ol>
                                        </div>
                                    </nav>
                                    <h1 class="mb-0 display-4">
                                        Swiper slider
                                    </h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>


            <section class="position-relative overflow-hidden">
                <div class="container py-9 py-lg-11">
                    <div class="alert alert-success mb-7">
                        plugin documentation - <a href="{{ URL::asset('https://swiperjs.com/') }}" target="_blank" class="alert-link">SwiperJs</a>
                    </div>
                    <h5 class="mb-5">Single Item</h5>
                    <!-- Swiper -->
                    <div class="swiper swiper-1 position-relative">
                        <div class="swiper-wrapper">

                            <!--Slide item-->
                            <div class="swiper-slide">
                                <div
                                    class="vh-75 d-flex w-100 bg-success text-white align-items-center justify-content-center">
                                    Slide 1
                                </div>
                            </div>

                            <!--Slide item-->
                            <div class="swiper-slide">
                                <div
                                    class="vh-75 d-flex w-100 bg-danger text-white align-items-center justify-content-center">
                                    Slide 2
                                </div>
                            </div>

                            <!--Slide item-->
                            <div class="swiper-slide">
                                <div
                                    class="vh-75 d-flex w-100 bg-primary text-white align-items-center justify-content-center">
                                    Slide 3
                                </div>
                            </div>

                            <!--Slide item-->
                            <div class="swiper-slide">
                                <div
                                    class="vh-75 d-flex w-100 bg-info text-white align-items-center justify-content-center">
                                    Slide 4
                                </div>
                            </div>

                        </div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    </div>
                </div>
            </section>
            <section class="position-relative overflow-hidden">
                <div class="container py-9 py-lg-11">
                    <h5 class="mb-5">2 Items per view + (overflow-visible)</h5>
                    <!-- Swiper -->
                    <div class="swiper swiper-2 position-relative overflow-visible">
                        <div class="swiper-wrapper">

                            <!--Slide item-->
                            <div class="swiper-slide">
                                <div
                                    class="vh-75 d-flex w-100 bg-success text-white align-items-center justify-content-center">
                                    Slide 1
                                </div>
                            </div>

                            <!--Slide item-->
                            <div class="swiper-slide">
                                <div
                                    class="vh-75 d-flex w-100 bg-danger text-white align-items-center justify-content-center">
                                    Slide 2
                                </div>
                            </div>

                            <!--Slide item-->
                            <div class="swiper-slide">
                                <div
                                    class="vh-75 d-flex w-100 bg-primary text-white align-items-center justify-content-center">
                                    Slide 3
                                </div>
                            </div>

                            <!--Slide item-->
                            <div class="swiper-slide">
                                <div
                                    class="vh-75 d-flex w-100 bg-info text-white align-items-center justify-content-center">
                                    Slide 4
                                </div>
                            </div>

                        </div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    </div>
                </div>
            </section>
            <section class="position-relative overflow-hidden">
                <div class="container py-9 py-lg-11">
                    <h5 class="mb-5">3 Items per view + (Responsive breakpoints)</h5>
                    <!-- Swiper -->
                    <div class="swiper swiper-3 overflow-visible position-relative">
                        <div class="swiper-wrapper">

                            <!--Slide item-->
                            <div class="swiper-slide">
                                <div
                                    class="vh-75 d-flex w-100 bg-success text-white align-items-center justify-content-center">
                                    Slide 1
                                </div>
                            </div>

                            <!--Slide item-->
                            <div class="swiper-slide">
                                <div
                                    class="vh-75 d-flex w-100 bg-danger text-white align-items-center justify-content-center">
                                    Slide 2
                                </div>
                            </div>

                            <!--Slide item-->
                            <div class="swiper-slide">
                                <div
                                    class="vh-75 d-flex w-100 bg-primary text-white align-items-center justify-content-center">
                                    Slide 3
                                </div>
                            </div>

                            <!--Slide item-->
                            <div class="swiper-slide">
                                <div
                                    class="vh-75 d-flex w-100 bg-info text-white align-items-center justify-content-center">
                                    Slide 4
                                </div>
                            </div>

                            <!--Slide item-->
                            <div class="swiper-slide">
                                <div
                                    class="vh-75 d-flex w-100 bg-warning text-white align-items-center justify-content-center">
                                    Slide 5
                                </div>
                            </div>

                            <!--Slide item-->
                            <div class="swiper-slide">
                                <div
                                    class="vh-75 d-flex w-100 bg-secondary text-white align-items-center justify-content-center">
                                    Slide 6
                                </div>
                            </div>

                        </div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    </div>
                </div>
            </section>


            <section class="position-relative overflow-hidden">
                <div class="container py-9 py-lg-11">
                    <h5 class="mb-5">Coverflow</h5>
                    <!-- Swiper -->
                    <div class="swiper swiper-flow position-relative overflow-visible">
                        <div class="swiper-wrapper">

                            <!--Slide item-->
                            <div class="swiper-slide">
                                <div
                                    class="vh-75 d-flex w-100 bg-success text-white align-items-center justify-content-center">
                                    Slide 1
                                </div>
                            </div>

                            <!--Slide item-->
                            <div class="swiper-slide">
                                <div
                                    class="vh-75 d-flex w-100 bg-danger text-white align-items-center justify-content-center">
                                    Slide 2
                                </div>
                            </div>

                            <!--Slide item-->
                            <div class="swiper-slide">
                                <div
                                    class="vh-75 d-flex w-100 bg-primary text-white align-items-center justify-content-center">
                                    Slide 3
                                </div>
                            </div>

                            <!--Slide item-->
                            <div class="swiper-slide">
                                <div
                                    class="vh-75 d-flex w-100 bg-info text-white align-items-center justify-content-center">
                                    Slide 4
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </section>
            <section class="position-relative overflow-hidden">
                <div class="container py-9 py-lg-11">
                    <h5 class="mb-5">Fade effect</h5>
                    <!-- Swiper -->
                    <div class="swiper swiper-fade position-relative overflow-visible">
                        <div class="swiper-wrapper">

                            <!--Slide item-->
                            <div class="swiper-slide">
                                <div
                                    class="vh-75 d-flex w-100 bg-success text-white align-items-center justify-content-center">
                                    Slide 1
                                </div>
                            </div>

                            <!--Slide item-->
                            <div class="swiper-slide">
                                <div
                                    class="vh-75 d-flex w-100 bg-danger text-white align-items-center justify-content-center">
                                    Slide 2
                                </div>
                            </div>

                            <!--Slide item-->
                            <div class="swiper-slide">
                                <div
                                    class="vh-75 d-flex w-100 bg-primary text-white align-items-center justify-content-center">
                                    Slide 3
                                </div>
                            </div>

                            <!--Slide item-->
                            <div class="swiper-slide">
                                <div
                                    class="vh-75 d-flex w-100 bg-info text-white align-items-center justify-content-center">
                                    Slide 4
                                </div>
                            </div>

                        </div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    </div>
                </div>
            </section>
            <section class="position-relative overflow-hidden">
                <div class="container w-lg-50 py-9 py-lg-11">
                    <h5 class="mb-5">Cards effect</h5>
                    <!-- Swiper -->
                    <div class="swiper swiper-cards position-relative overflow-visible">
                        <div class="swiper-wrapper">

                            <!--Slide item-->
                            <div class="swiper-slide border border-dark bg-body-tertiary shadow-lg rounded-4">
                                <div class="vh-75 d-flex w-100 align-items-center justify-content-center">
                                    Slide 1
                                </div>
                            </div>

                            <!--Slide item-->
                            <div class="swiper-slide border border-dark bg-body-tertiary shadow-lg rounded-4">
                                <div class="vh-75 d-flex w-100 align-items-center justify-content-center">
                                    Slide 2
                                </div>
                            </div>

                            <!--Slide item-->
                            <div class="swiper-slide border border-dark bg-body-tertiary shadow-lg rounded-4">
                                <div class="vh-75 d-flex w-100 align-items-center justify-content-center">
                                    Slide 3
                                </div>
                            </div>

                            <!--Slide item-->
                            <div class="swiper-slide border border-dark bg-body-tertiary shadow-lg rounded-4">
                                <div class="vh-75 d-flex w-100 align-items-center justify-content-center">
                                    Slide 4
                                </div>
                            </div>

                        </div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    </div>
                </div>
            </section>

            <section class="position-relative overflow-hidden">
                <div class="container w-lg-60 py-9 py-lg-11">
                    <h5 class="mb-5">Thumbs</h5>
                    <div class="swiper overflow-visible swiper-thumbs-main">
                        <div class="swiper-wrapper text-center mb-7">
                            <div class="swiper-slide py-7 py-lg-9 px-4 px-xl-9 bg-body-tertiary rounded-4 shadow-xl">
                                <p class="fs-2 fw-normal">
                                    Viverra suspendisse potenti nullam ac tortor vitae purus. Ut
                                    tellus elementum sagittis vitae et. Elementum nibh tellus molestie nunc non blandit
                                    massa.
                                </p>

                                <h5 class="mb-0">Username</h5>
                                <small class="text-body-secondary">Position</small>
                            </div>
                            <div class="swiper-slide py-7 py-lg-9 px-4 px-xl-9 bg-body-tertiary rounded-4 shadow-xl">
                                <p class="fs-2 fw-normal">
                                    Viverra suspendisse potenti nullam ac tortor vitae purus. Ut
                                    tellus elementum sagittis vitae et. Elementum nibh tellus molestie nunc non blandit
                                    massa.
                                </p>
                                <h5 class="mb-0">Username</h5>
                                <small class="text-body-secondary">Position</small>
                            </div>
                            <div class="swiper-slide py-7 py-lg-9 px-4 px-xl-9 bg-body-tertiary rounded-4 shadow-xl">
                                <p class="fs-2 fw-normal">
                                    Viverra suspendisse potenti nullam ac tortor vitae purus. Ut
                                    tellus elementum sagittis vitae et. Elementum nibh tellus molestie nunc non blandit
                                    massa.
                                </p>
                                <h5 class="mb-0">Username</h5>
                                <small class="text-body-secondary">Position</small>
                            </div>
                            <div class="swiper-slide py-7 py-lg-9 px-4 px-xl-9 bg-body-tertiary rounded-4 shadow-xl">
                                <p class="fs-2 fw-normal">
                                    Viverra suspendisse potenti nullam ac tortor vitae purus. Ut
                                    tellus elementum sagittis vitae et. Elementum nibh tellus molestie nunc non blandit
                                    massa.
                                </p>
                                <h5 class="mb-0">Username</h5>
                                <small class="text-body-secondary">Position</small>
                            </div>
                            <div class="swiper-slide py-7 py-lg-9 px-4 px-xl-9 bg-body-tertiary rounded-4 shadow-xl">
                                <p class="fs-2 fw-normal">
                                    Viverra suspendisse potenti nullam ac tortor vitae purus. Ut
                                    tellus elementum sagittis vitae et. Elementum nibh tellus molestie nunc non blandit
                                    massa.
                                </p>
                                <h5 class="mb-0">Username</h5>
                                <small class="text-body-secondary">Position</small>
                            </div>
                            <div class="swiper-slide py-7 py-lg-9 px-4 px-xl-9 bg-body-tertiary rounded-4 shadow-xl">
                                <p class="fs-2 fw-normal">
                                    Viverra suspendisse potenti nullam ac tortor vitae purus. Ut
                                    tellus elementum sagittis vitae et. Elementum nibh tellus molestie nunc non blandit
                                    massa.
                                </p>
                                <h5 class="mb-0">Username</h5>
                                <small class="text-body-secondary">Position</small>
                            </div>
                            <div class="swiper-slide py-7 py-lg-9 px-4 px-xl-9 bg-body-tertiary rounded-4 shadow-xl">
                                <p class="fs-2 fw-normal">
                                    Viverra suspendisse potenti nullam ac tortor vitae purus. Ut
                                    tellus elementum sagittis vitae et. Elementum nibh tellus molestie nunc non blandit
                                    massa.
                                </p>
                                <h5 class="mb-0">Username</h5>
                                <small class="text-body-secondary">Position</small>
                            </div>
                            <div class="swiper-slide py-7 py-lg-9 px-4 px-xl-9 bg-body-tertiary rounded-4 shadow-xl">
                                <p class="fs-2 fw-normal">
                                    Viverra suspendisse potenti nullam ac tortor vitae purus. Ut
                                    tellus elementum sagittis vitae et. Elementum nibh tellus molestie nunc non blandit
                                    massa.
                                </p>
                                <h5 class="mb-0">Username</h5>
                                <small class="text-body-secondary">Position</small>
                            </div>
                            <div class="swiper-slide py-7 py-lg-9 px-4 px-xl-9 bg-body-tertiary rounded-4 shadow-xl">
                                <p class="fs-2 fw-normal">
                                     Viverra suspendisse potenti nullam ac tortor vitae purus. Ut
                                    tellus elementum sagittis vitae et. Elementum nibh tellus molestie nunc non blandit
                                    massa.
                                </p>
                                <h5 class="mb-0">Username</h5>
                                <small class="text-body-secondary">Position</small>
                            </div>
                            <div class="swiper-slide py-7 py-lg-9 px-4 px-xl-9 bg-body-tertiary rounded-4 shadow-xl">
                                <p class="fs-2 fw-normal">
                                    Viverra suspendisse potenti nullam ac tortor vitae purus. Ut
                                    tellus elementum sagittis vitae et. Elementum nibh tellus molestie nunc non blandit
                                    massa.
                                </p>
                                <h5 class="mb-0">Username</h5>
                                <small class="text-body-secondary">Position</small>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-container overflow-hidden swiper-thumbs-thumbnails">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <img class="img-fluid rounded-circle" src="{{ URL::asset('assets/img/avatar/1.jpg') }}">
                            </div>
                            <div class="swiper-slide">
                                <img class="img-fluid rounded-circle" src="{{ URL::asset('assets/img/avatar/2.jpg') }}">
                            </div>
                            <div class="swiper-slide">
                                <img class="img-fluid rounded-circle" src="{{ URL::asset('assets/img/avatar/3.jpg') }}">
                            </div>
                            <div class="swiper-slide">
                                <img class="img-fluid rounded-circle" src="{{ URL::asset('assets/img/avatar/4.jpg') }}">
                            </div>
                            <div class="swiper-slide">
                                <img class="img-fluid rounded-circle" src="{{ URL::asset('assets/img/avatar/5.jpg') }}">
                            </div>
                            <div class="swiper-slide">
                                <img class="img-fluid rounded-circle" src="{{ URL::asset('assets/img/avatar/6.jpg') }}">
                            </div>
                            <div class="swiper-slide">
                                <img class="img-fluid rounded-circle" src="{{ URL::asset('assets/img/avatar/7.jpg') }}">
                            </div>
                            <div class="swiper-slide">
                                <img class="img-fluid rounded-circle" src="{{ URL::asset('assets/img/avatar/8.jpg') }}">
                            </div>
                            <div class="swiper-slide">
                                <img class="img-fluid rounded-circle" src="{{ URL::asset('assets/img/avatar/9.jpg') }}">
                            </div>
                            <div class="swiper-slide">
                                <img class="img-fluid rounded-circle" src="{{ URL::asset('assets/img/avatar/10.jpg') }}">
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="position-relative overflow-hidden">
                <div class="container-fluid py-9 py-lg-11">
                    <h5 class="mb-5">Time line progress bar</h5>
                    <!-- Swiper Main Slider -->
                    <div class="swiper-progress-main overflow-hidden swiper-container">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <!-- Devices -->
                                <div>
                                    <img class="img-fluid"
                                        src="{{ URL::asset('assets/img/backgrounds/bg3.jpg') }}"
                                        alt="Image Description">
                                </div>
                                <!-- End Devices -->
                            </div>

                            <div class="swiper-slide">
                                <!-- Devices -->
                                <div>
                                    <img class="img-fluid"
                                        src="{{ URL::asset('assets/img/backgrounds/bg6.jpg') }}"
                                        alt="Image Description">
                                </div>
                                <!-- End Devices -->
                            </div>

                            <div class="swiper-slide">
                                <!-- Devices -->
                                <div>
                                    <img class="img-fluid"
                                        src="{{ URL::asset('assets/img/backgrounds/bg7.jpg') }}"
                                        alt="Image Description">
                                </div>
                                <!-- End Devices -->
                            </div>
                        </div>
                        <div class="swiper-button-next bg-white rounded-0"></div>
                        <div class="swiper-button-prev bg-white rounded-0"></div>
                    </div>
                    <!-- End Swiper Main Slider -->

                    <!-- Swiper Thumbs Slider -->
                    <div class="progress-swiper-thumbs pt-3 swiper-container">
                        <div class="swiper-wrapper">
                            <!-- Slide -->
                            <div class="swiper-slide swiper-pagination-progress">
                                <div class="swiper-pagination-progress-bar mb-2">
                                    <div class="swiper-pagination-progress-inner swiper-pagination-progress-bar-inner">
                                    </div>
                                </div>
                                <span class="small">Discover the new way of website building</span>
                            </div>
                            <!-- End Slide -->

                            <!-- Slide -->
                            <div class="swiper-slide swiper-pagination-progress">
                                <div class="swiper-pagination-progress-bar mb-2">
                                    <div class="swiper-pagination-progress-inner swiper-pagination-progress-bar-inner">
                                    </div>
                                </div>
                                <span class="small">One of the best bootstrap theme on planet</span>
                            </div>
                            <!-- End Slide -->

                            <!-- Slide -->
                            <div class="swiper-slide swiper-pagination-progress">
                                <div class="swiper-pagination-progress-bar mb-2">
                                    <div class="swiper-pagination-progress-inner swiper-pagination-progress-bar-inner">
                                    </div>
                                </div>
                                <span class="small">Countless features give you a freedom</span>
                            </div>
                            <!-- End Slide -->
                        </div>
                    </div>
                    <!-- End Swiper Thumbs Slider -->
                </div>
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
