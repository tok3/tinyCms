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
                                                <li class="breadcrumb-item active" aria-current="page">Bs carousel</li>
                                            </ol>
                                        </div>
                                    </nav>
                                    <h1 class="mb-0 display-4">
                                        Bootstrap carousel
                                    </h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>


            <section class="position-relative">
                <div class="container py-9 py-lg-11">
                    <div class="d-flex mb-5 align-items-center">
                        <h6 class="mb-0 pe-3">Slides Only</h6>
                        <div class="border-bottom flex-grow-1"></div>
                    </div>
                    <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="{{ URL::asset('assets/img/1200x600/1.jpg') }}" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="{{ URL::asset('assets/img/1200x600/2.jpg') }}" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="{{ URL::asset('assets/img/1200x600/3.jpg') }}" class="d-block w-100" alt="...">
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="position-relative">
                <div class="container py-9 py-lg-11">
                    <div class="d-flex mb-5 align-items-center">
                        <h6 class="mb-0 pe-3">Slides with constrols</h6>
                        <div class="border-bottom flex-grow-1"></div>
                    </div>
                    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="{{ URL::asset('assets/img/1200x600/1.jpg') }}" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="{{ URL::asset('assets/img/1200x600/2.jpg') }}" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="{{ URL::asset('assets/img/1200x600/3.jpg') }}" class="d-block w-100" alt="...">
                            </div>
                        </div>
                        <button
                            class="carousel-control-prev width-5x height-5x bg-secondary text-dark shadow hover-shadow-lg ms-2 rounded-pill top-50 translate-middle-y"
                            type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button
                            class="carousel-control-next width-5x height-5x bg-secondary text-dark shadow hover-shadow-lg me-2 rounded-pill top-50 translate-middle-y"
                            type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </section>

            <section class="position-relative">
                <div class="container py-9 py-lg-11">
                    <div class="d-flex mb-5 align-items-center">
                        <h6 class="mb-0 pe-3">Slides with caption</h6>
                        <div class="border-bottom flex-grow-1"></div>
                    </div>
                    <div id="carouselExampleCaption" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="{{ URL::asset('assets/img/960x640/1.jpg') }}" class="img-fluid w-75 w-lg-60" alt="...">

                                <!--Carousel with caption start-->
                                <div
                                    class="position-absolute start-0 top-0 w-100 h-100 w-lg-75 d-flex align-items-center justify-content-center justify-content-lg-end">
                                    <ul class="text-white list-unstyled carousel-layers mb-0">
                                        <li data-carousel-layer="fade-end">
                                            <h2 class="d-inline-block bg-primary px-2 py-3 lh-1 mb-0 fs-1">Feel the
                                                difference</h2>
                                        </li>
                                        <li data-carousel-layer="fade-start">
                                            <p class="mb-0 d-inline-block bg-warning text-dark px-2 py-2 lh-1">This is
                                                the best quality theme</p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img src="{{ URL::asset('assets/img/960x640/2.jpg') }}" class="img-fluid w-75 w-lg-60" alt="...">

                                <!--Carousel with caption start-->
                                <div
                                    class="position-absolute start-0 top-0 w-100 h-100 w-lg-75 d-flex align-items-center justify-content-center justify-content-lg-end">
                                    <ul class="text-white list-unstyled carousel-layers mb-0">
                                        <li data-carousel-layer="fade-end">
                                            <h2 class="d-inline-block bg-primary px-2 py-3 lh-1 mb-0 fs-1">Feel the
                                                difference</h2>
                                        </li>
                                        <li data-carousel-layer="fade-start">
                                            <p class="mb-0 d-inline-block bg-warning text-dark px-2 py-2 lh-1">This is
                                                the best quality theme</p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img src="{{ URL::asset('assets/img/960x640/3.jpg') }}" class="img-fluid w-75 w-lg-60" alt="...">
                                <!--Carousel with caption start-->
                                <div
                                    class="position-absolute start-0 top-0 w-100 h-100 w-lg-75 d-flex align-items-center justify-content-center justify-content-lg-end">
                                    <ul class="text-white list-unstyled carousel-layers mb-0">
                                        <li data-carousel-layer="fade-end">
                                            <h2 class="d-inline-block bg-primary px-2 py-3 lh-1 mb-0 fs-1">Feel the
                                                difference</h2>
                                        </li>
                                        <li data-carousel-layer="fade-start">
                                            <p class="mb-0 d-inline-block bg-warning text-dark px-2 py-2 lh-1">This is
                                                the best quality theme</p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <button
                            class="carousel-control-prev width-5x height-5x bg-secondary shadow hover-shadow-lg ms-2 rounded-pill top-50 translate-middle-y"
                            type="button" data-bs-target="#carouselExampleCaption" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button
                            class="carousel-control-next width-5x height-5x bg-secondary shadow hover-shadow-lg me-2 rounded-pill top-50 translate-middle-y"
                            type="button" data-bs-target="#carouselExampleCaption" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
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
