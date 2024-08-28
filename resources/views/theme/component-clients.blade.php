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
                                                <li class="breadcrumb-item active" aria-current="page">Clients</li>
                                            </ol>
                                        </div>
                                    </nav>
                                    <h1 class="mb-0 display-4">
                                        Clients
                                    </h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="position-relative">
                <div class="container py-9 py-lg-11">
                    <h5 class="text-center mb-7">You are in good company</h5>
                    <div class="d-flex px-lg-7 flex-wrap align-items-center justify-content-center">
                        <!--Col-->
                        <div class="px-3 py-4 px-lg-4 d-flex align-items-center">
                            <img src="{{ URL::asset('assets/img/partners/amazon.svg') }}" class="img-fluid img-invert" alt="">
                        </div>
                        <div class="px-3 py-4 px-lg-4 d-flex align-items-center">
                            <img src="{{ URL::asset('assets/img/partners/booking.com.svg') }}" class="img-fluid img-invert" alt="">
                        </div>
                        <div class="px-3 py-4 px-lg-4 d-flex align-items-center">
                            <img src="{{ URL::asset('assets/img/partners/deliveroo.svg') }}" class="img-fluid img-invert" alt="">
                        </div>
                        <div class="px-3 py-4 px-lg-4 d-flex align-items-center">
                            <img src="{{ URL::asset('assets/img/partners/expedia.svg') }}" class="img-fluid img-invert" alt="">
                        </div>
                        <div class="px-3 py-4 px-lg-4 d-flex align-items-center">
                            <img src="{{ URL::asset('assets/img/partners/didi.svg') }}" class="img-fluid img-invert" alt="">
                        </div>
                        <div class="px-3 py-4 px-lg-4 d-flex align-items-center">
                            <img src="{{ URL::asset('assets/img/partners/google.svg') }}" class="img-fluid img-invert" alt="">
                        </div>
                        <div class="px-3 py-4 px-lg-4 d-flex align-items-center">
                            <img src="{{ URL::asset('assets/img/partners/grab.svg') }}" class="img-fluid img-invert" alt="">
                        </div>
                        <div class="px-3 py-4 px-lg-4 d-flex align-items-center">
                            <img src="{{ URL::asset('assets/img/partners/lyft.svg') }}" class="img-fluid img-invert" alt="">
                        </div>
                        <div class="px-3 py-4 px-lg-4 d-flex align-items-center">
                            <img src="{{ URL::asset('assets/img/partners/microsoft.svg') }}" class="img-fluid img-invert" alt="">
                        </div>
                        <div class="px-3 py-4 px-lg-4 d-flex align-items-center">
                            <img src="{{ URL::asset('assets/img/partners/postmates.svg') }}" class="img-fluid img-invert" alt="">
                        </div>
                    </div>
                </div>
            </section>
            <section class="bg-body-tertiary">
                <div class="container py-9 py-lg-11">
                    <div class="swiper-container overflow-hidden position-relative swiper-partners-4 pb-9">
                        <div class="swiper-wrapper d-flex align-items-center">
                            <div class="swiper-slide">
                                <img class="d-block img-fluid mx-auto px-2 img-invert"
                                    src="{{ URL::asset('assets/img/partners/dark/amazon.svg') }}" alt="">
                            </div>
                            <div class="swiper-slide">
                                <img class="d-block img-fluid mx-auto px-2 img-invert"
                                    src="{{ URL::asset('assets/img/partners/dark/didi.svg') }}" alt="">
                            </div>
                            <div class="swiper-slide">
                                <img class="d-block img-fluid mx-auto px-2 img-invert"
                                    src="{{ URL::asset('assets/img/partners/dark/deliveroo.svg') }}" alt="">
                            </div>
                            <div class="swiper-slide">
                                <img class="d-block img-fluid mx-auto px-2 img-invert"
                                    src="{{ URL::asset('assets/img/partners/dark/nasdaq.svg') }}" alt="">
                            </div>
                            <div class="swiper-slide">
                                <img class="d-block img-fluid mx-auto px-2 img-invert"
                                    src="{{ URL::asset('assets/img/partners/dark/national-geographic.svg') }}" alt="">
                            </div>
                            <div class="swiper-slide">
                                <img class="d-block img-fluid mx-auto px-2 img-invert"
                                    src="{{ URL::asset('assets/img/partners/dark/postmates.svg') }}" alt="">
                            </div>
                            <div class="swiper-slide">
                                <img class="d-block img-fluid mx-auto px-2 img-invert"
                                    src="{{ URL::asset('assets/img/partners/dark/salesforce.svg') }}" alt="">
                            </div>
                            <div class="swiper-slide">
                                <img class="d-block img-fluid mx-auto px-2 img-invert"
                                    src="{{ URL::asset('assets/img/partners/dark/slack.svg') }}" alt="">
                            </div>
                            <div class="swiper-slide">
                                <img class="d-block img-fluid mx-auto px-2 img-invert"
                                    src="{{ URL::asset('assets/img/partners/dark/spotify.svg') }}" alt="">
                            </div>
                            <div class="swiper-slide">
                                <img class="d-block img-fluid mx-auto px-2 img-invert"
                                    src="{{ URL::asset('assets/img/partners/dark/uber.svg') }}" alt="">
                            </div>
                            <div class="swiper-slide">
                                <img class="d-block img-fluid mx-auto px-2 img-invert"
                                    src="{{ URL::asset('assets/img/partners/dark/zillow.svg') }}" alt="">
                            </div>
                        </div>
                        <div class="swiper-pagination swiper-partners-pagination"></div>
                    </div>
                </div>
            </section>
            <section class="position-relative">
                <div class="container py-9 py-lg-11">
                    <h5 class="text-center mb-7">You are in good company</h5>
                    <div class="row grid-separator">
                        <!--Col-->
                        <div class="col-6 col-sm-4 col-lg-3 py-9 px-lg-5 d-flex align-items-center">
                            <img src="{{ URL::asset('assets/img/partners/amazon.svg') }}" class="img-fluid d-block mx-auto img-invert"
                                alt="">
                        </div>
                        <div class="col-6 col-sm-4 col-lg-3 py-9 px-lg-5 d-flex align-items-center">
                            <img src="{{ URL::asset('assets/img/partners/booking.com.svg') }}" class="img-fluid d-block mx-auto img-invert"
                                alt="">
                        </div>
                        <div class="col-6 col-sm-4 col-lg-3 py-9 px-lg-5 d-flex align-items-center">
                            <img src="{{ URL::asset('assets/img/partners/deliveroo.svg') }}" class="img-fluid d-block mx-auto img-invert"
                                alt="">
                        </div>
                        <div class="col-6 col-sm-4 col-lg-3 py-9 px-lg-5 d-flex align-items-center">
                            <img src="{{ URL::asset('assets/img/partners/expedia.svg') }}" class="img-fluid d-block mx-auto img-invert"
                                alt="">
                        </div>
                        <div class="col-6 col-sm-4 col-lg-3 py-9 px-lg-5 d-flex align-items-center">
                            <img src="{{ URL::asset('assets/img/partners/didi.svg') }}" class="img-fluid d-block mx-auto img-invert" alt="">
                        </div>
                        <div class="col-6 col-sm-4 col-lg-3 py-9 px-lg-5 d-flex align-items-center">
                            <img src="{{ URL::asset('assets/img/partners/google.svg') }}" class="img-fluid d-block mx-auto img-invert"
                                alt="">
                        </div>
                        <div class="col-6 col-sm-4 col-lg-3 py-9 px-lg-5 d-flex align-items-center">
                            <img src="{{ URL::asset('assets/img/partners/grab.svg') }}" class="img-fluid d-block mx-auto img-invert" alt="">
                        </div>
                        <div class="col-6 col-sm-4 col-lg-3 py-9 px-lg-5 d-flex align-items-center">
                            <img src="{{ URL::asset('assets/img/partners/lyft.svg') }}" class="img-fluid d-block mx-auto img-invert" alt="">
                        </div>
                        <div class="col-6 col-sm-4 col-lg-3 py-9 px-lg-5 d-flex align-items-center">
                            <img src="{{ URL::asset('assets/img/partners/microsoft.svg') }}" class="img-fluid d-block mx-auto img-invert"
                                alt="">
                        </div>
                        <div class="col-6 col-sm-4 col-lg-3 py-9 px-lg-5 d-flex align-items-center">
                            <img src="{{ URL::asset('assets/img/partners/postmates.svg') }}" class="img-fluid d-block mx-auto img-invert"
                                alt="">
                        </div>
                        <div class="col-6 col-sm-4 col-lg-3 py-9 px-lg-5 d-flex align-items-center">
                            <img src="{{ URL::asset('assets/img/partners/national-geographic.svg') }}"
                                class="img-fluid d-block mx-auto img-invert" alt="">
                        </div>
                        <div class="col-6 col-sm-4 col-lg-3 py-9 px-lg-5 d-flex align-items-center">
                            <img src="{{ URL::asset('assets/img/partners/spotify.svg') }}" class="img-fluid d-block mx-auto img-invert"
                                alt="">
                        </div>
                    </div>
                </div>
            </section>
            <section class="position-relative bg-gradient bg-dark text-white" data-bs-theme="dark">
                <div class="container py-9 py-lg-11">
                    <h5 class="text-center mb-7">You are in good company</h5>
                    <div class="row grid-separator">
                        <!--Col-->
                        <div class="col-6 col-sm-4 col-lg-3 py-9 px-lg-5 d-flex align-items-center">
                            <img src="{{ URL::asset('assets/img/partners/dark/amazon.svg') }}" class="img-fluid d-block mx-auto img-invert"
                                alt="">
                        </div>
                        <div class="col-6 col-sm-4 col-lg-3 py-9 px-lg-5 d-flex align-items-center">
                            <img src="{{ URL::asset('assets/img/partners/dark/booking.com.svg') }}"
                                class="img-fluid d-block mx-auto img-invert" alt="">
                        </div>
                        <div class="col-6 col-sm-4 col-lg-3 py-9 px-lg-5 d-flex align-items-center">
                            <img src="{{ URL::asset('assets/img/partners/dark/deliveroo.svg') }}"
                                class="img-fluid d-block mx-auto img-invert" alt="">
                        </div>
                        <div class="col-6 col-sm-4 col-lg-3 py-9 px-lg-5 d-flex align-items-center">
                            <img src="{{ URL::asset('assets/img/partners/dark/expedia.svg') }}" class="img-fluid d-block mx-auto img-invert"
                                alt="">
                        </div>
                        <div class="col-6 col-sm-4 col-lg-3 py-9 px-lg-5 d-flex align-items-center">
                            <img src="{{ URL::asset('assets/img/partners/dark/didi.svg') }}" class="img-fluid d-block mx-auto img-invert"
                                alt="">
                        </div>
                        <div class="col-6 col-sm-4 col-lg-3 py-9 px-lg-5 d-flex align-items-center">
                            <img src="{{ URL::asset('assets/img/partners/dark/google.svg') }}" class="img-fluid d-block mx-auto img-invert"
                                alt="">
                        </div>
                        <div class="col-6 col-sm-4 col-lg-3 py-9 px-lg-5 d-flex align-items-center">
                            <img src="{{ URL::asset('assets/img/partners/dark/grab.svg') }}" class="img-fluid d-block mx-auto img-invert"
                                alt="">
                        </div>
                        <div class="col-6 col-sm-4 col-lg-3 py-9 px-lg-5 d-flex align-items-center">
                            <img src="{{ URL::asset('assets/img/partners/dark/lyft.svg') }}" class="img-fluid d-block mx-auto img-invert"
                                alt="">
                        </div>
                        <div class="col-6 col-sm-4 col-lg-3 py-9 px-lg-5 d-flex align-items-center">
                            <img src="{{ URL::asset('assets/img/partners/dark/microsoft.svg') }}"
                                class="img-fluid d-block mx-auto img-invert" alt="">
                        </div>
                        <div class="col-6 col-sm-4 col-lg-3 py-9 px-lg-5 d-flex align-items-center">
                            <img src="{{ URL::asset('assets/img/partners/dark/postmates.svg') }}"
                                class="img-fluid d-block mx-auto img-invert" alt="">
                        </div>
                        <div class="col-6 col-sm-4 col-lg-3 py-9 px-lg-5 d-flex align-items-center">
                            <img src="{{ URL::asset('assets/img/partners/dark/national-geographic.svg') }}"
                                class="img-fluid d-block mx-auto img-invert" alt="">
                        </div>
                        <div class="col-6 col-sm-4 col-lg-3 py-9 px-lg-5 d-flex align-items-center">
                            <img src="{{ URL::asset('assets/img/partners/dark/spotify.svg') }}" class="img-fluid d-block mx-auto img-invert"
                                alt="">
                        </div>
                    </div>
                </div>
            </section>
            <section class="position-relative">
                <div class="position-relative container py-9 py-lg-11">
                    <div class="row">
                        <div class="col-12">
                            <div class="px-4 py-9 px-lg-7 bg-body-secondary">
                                <h6 class="text-center mb-5 text-primary">Our partners</h6>
                                <div class="d-flex flex-wrap align-items-center justify-content-center">
                                    <!--Col-->
                                    <div class="px-3 py-4 px-lg-4 d-flex align-items-center">
                                        <img src="{{ URL::asset('assets/img/partners/dark/amazon.svg') }}" class="img-fluid img-invert"
                                            alt="">
                                    </div>
                                    <div class="px-3 py-4 px-lg-4 d-flex align-items-center">
                                        <img src="{{ URL::asset('assets/img/partners/dark/booking.com.svg') }}" class="img-fluid img-invert"
                                            alt="">
                                    </div>
                                    <div class="px-3 py-4 px-lg-4 d-flex align-items-center">
                                        <img src="{{ URL::asset('assets/img/partners/dark/deliveroo.svg') }}" class="img-fluid img-invert"
                                            alt="">
                                    </div>
                                    <div class="px-3 py-4 px-lg-4 d-flex align-items-center">
                                        <img src="{{ URL::asset('assets/img/partners/dark/expedia.svg') }}" class="img-fluid img-invert"
                                            alt="">
                                    </div>
                                    <div class="px-3 py-4 px-lg-4 d-flex align-items-center">
                                        <img src="{{ URL::asset('assets/img/partners/dark/didi.svg') }}" class="img-fluid img-invert"
                                            alt="">
                                    </div>
                                    <div class="px-3 py-4 px-lg-4 d-flex align-items-center">
                                        <img src="{{ URL::asset('assets/img/partners/dark/google.svg') }}" class="img-fluid img-invert"
                                            alt="">
                                    </div>
                                    <div class="px-3 py-4 px-lg-4 d-flex align-items-center">
                                        <img src="{{ URL::asset('assets/img/partners/dark/grab.svg') }}" class="img-fluid img-invert"
                                            alt="">
                                    </div>
                                    <div class="px-3 py-4 px-lg-4 d-flex align-items-center">
                                        <img src="{{ URL::asset('assets/img/partners/dark/lyft.svg') }}" class="img-fluid img-invert"
                                            alt="">
                                    </div>
                                    <div class="px-3 py-4 px-lg-4 d-flex align-items-center">
                                        <img src="{{ URL::asset('assets/img/partners/dark/microsoft.svg') }}" class="img-fluid img-invert"
                                            alt="">
                                    </div>
                                    <div class="px-3 py-4 px-lg-4 d-flex align-items-center">
                                        <img src="{{ URL::asset('assets/img/partners/dark/postmates.svg') }}" class="img-fluid img-invert"
                                            alt="">
                                    </div>
                                </div>
                            </div>
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
