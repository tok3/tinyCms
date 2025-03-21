<x-assan-layout layout-type="{{$layoutType}}">

            <!--Article slider-->
            <section class="position-relative">
                <!-- Swiper -->
                <div class="swiper-container swiper-classic position-relative overflow-hidden">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide" style="background-image:url('assets/img/backgrounds/bg7.jpg')">
                            <div class="bg-dark position-absolute start-0 top-0 w-100 h-100 opacity-50"></div>
                            <div
                                class="container w-lg-60 w-md-80 text-center text-white d-flex align-items-center h-100">
                                <ul class="carousel-layers list-unstyled mb-0 pt-lg-9">
                                    <li data-carousel-layer="fade-down" class="mb-3">
                                        <a href="{{ URL::asset('#') }}" class="small badge badge-pill bg-success">Tech</a>
                                    </li>
                                    <li data-carousel-layer="fade-start">
                                        <h1 class="display-4 mb-4">
                                            Smoothly rolling out pricing changes is hard.
                                        </h1>
                                    </li>
                                    <li class="d-none d-lg-block" data-carousel-layer="fade-end">
                                        <p class="small mb-4">
                                            April 21
                                        </p>
                                    </li>
                                    <li data-carousel-layer="fade-start">
                                        <a href="{{ URL::asset('#') }}" class="link-underline fs-6 fw-semibold">
                                            Read Article
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="swiper-slide" style="background-image:url('assets/img/backgrounds/bg3.jpg')">
                            <div class="bg-dark position-absolute start-0 top-0 w-100 h-100 opacity-50"></div>
                            <div
                                class="container w-lg-60 w-md-80 text-center text-white d-flex align-items-center h-100">
                                <ul class="carousel-layers list-unstyled mb-0 pt-lg-9">
                                    <li data-carousel-layer="fade-down" class="mb-3">
                                        <a href="{{ URL::asset('#') }}" class="small badge badge-pill bg-primary">Community</a>
                                    </li>
                                    <li data-carousel-layer="fade-start">
                                        <h1 class="display-4 mb-4">
                                            Smoothly rolling out pricing changes is hard.
                                        </h1>
                                    </li>
                                    <li class="d-none d-lg-block" data-carousel-layer="fade-end">
                                        <p class="small mb-4">
                                            April 21
                                        </p>
                                    </li>
                                    <li data-carousel-layer="fade-start">
                                        <a href="{{ URL::asset('#') }}" class="link-underline fs-6 fw-semibold">
                                            Read Article
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="swiper-slide" style="background-image:url('assets/img/backgrounds/bg2.jpg')">
                            <div class="bg-dark position-absolute start-0 top-0 w-100 h-100 opacity-50"></div>
                            <div
                                class="container w-lg-60 w-md-80 text-center text-white d-flex align-items-center h-100">
                                <ul class="carousel-layers list-unstyled mb-0 pt-lg-9">
                                    <li data-carousel-layer="fade-down" class="mb-3">
                                        <a href="{{ URL::asset('#') }}" class="small badge badge-pill bg-danger">Business</a>
                                    </li>
                                    <li data-carousel-layer="fade-start">
                                        <h1 class="display-4 mb-4">
                                            Smoothly rolling out pricing changes is hard.
                                        </h1>
                                    </li>
                                    <li class="d-none d-lg-block" data-carousel-layer="fade-end">
                                        <p class="small mb-4">
                                            April 21
                                        </p>
                                    </li>
                                    <li data-carousel-layer="fade-start">
                                        <a href="{{ URL::asset('#') }}" class="link-underline fs-6 fw-semibold">
                                            Read Article
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- Add pagination -->
                    <div class="swiper-pagination swiperClassic-pagination text-white z-2 pb-2 pb-lg-4"></div>
                    <!-- Add Arrow -->
                    <div class="swiper-button-prev swiperClassic-button-prev bg-transparent text-white">
                    </div>
                    <div class="swiper-button-next swiperClassic-button-next bg-transparent text-white">
                    </div>
                </div>
            </section>
            <section class="position-relative">
                <div class="container py-9 py-lg-11">
                    <h2 class="mb-4">Featured</h2>
                    <div class="row">
                        <div class="col-md-7 col-lg-8 mb-5 mb-md-0">
                            <div class="card border-0">
                                <a href="{{ URL::asset('#!') }}">
                                    <img src="{{ URL::asset('assets/img/1200x600/1.jpg') }}" alt="" class="img-fluid rounded-5">
                                </a>
                                <div class="card-body pt-4 px-0 pb-0">
                                    <div class="d-flex justify-content-between mb-4">
                                        <span class="d-inline-block small">
                                            <i class="bx bx-calendar-alt text-body-secondary me-1"></i>
                                            <span class="text-body-secondary">20 Sep. 2021</span>
                                        </span>
                                        <a href="{{ URL::asset('#!') }}" class="small">Business</a>
                                    </div>
                                    <h2 class="mb-4">
                                        <a href="{{ URL::asset('#!') }}" >
                                            What things needed for effective teamwork?
                                        </a>
                                    </h2>
                                    <p class="mb-4 flex-grow-1 d-none d-lg-block text-truncate">
                                        There are many variations of passages of Lorem Ipsum Lorem Ipsum Lorem Ipsum
                                        available...
                                    </p>
                                    <div class="d-flex small align-items-center">
                                        <img src="{{ URL::asset('assets/img/avatar/6.jpg') }}" alt="" class="avatar rounded-circle sm me-2">
                                        <span class="text-body-secondary d-inline-block">By <a href="{{ URL::asset('#!') }}"
                                                >Andrew</a></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5 col-lg-4">
                            <div class="d-flex align-items-center mb-4">
                                <h5 class="mb-0 flex-grow-0 me-3">Popular</h5>
                                <div class="flex-grow-1 border-top"></div>
                            </div>
                            <!--Small heading-->
                            <article class="d-flex card-hover mb-4 align-items-stretch">
                                <div class="me-3">
                                    <a href="{{ URL::asset('#!') }}" class="overflow-hidden rounded-3 shadow d-block">
                                        <img src="{{ URL::asset('assets/img/960x640/6.jpg') }}" alt="Image" class="width-9x img-zoom">
                                    </a>
                                </div>
                                <div class="flex-gropw-1 justify-content-between">
                                    <a href="{{ URL::asset('#!') }}" >
                                        <h6 class="mb-2 text-reset">
                                            But I must explain to you how all this mistaken idea
                                        </h6>
                                    </a>
                                    <div class="d-flex justify-content-between">
                                        <small class="mb-0">
                                            <a href="{{ URL::asset('#!') }}">Tech</a>
                                        </small>
                                        <small class="text-body-secondary">26 June </small>
                                    </div>
                                </div>
                            </article>
                            <article class="d-flex card-hover mb-4 align-items-stretch">
                                <div class="me-3">
                                    <a href="{{ URL::asset('#!') }}" class="overflow-hidden rounded-3 shadow d-block">
                                        <img src="{{ URL::asset('assets/img/960x640/5.jpg') }}" alt="Image" class="width-9x img-zoom">
                                    </a>
                                </div>
                                <div class="flex-gropw-1 justify-content-between">
                                    <a href="{{ URL::asset('#!') }}" >
                                        <h6 class="mb-2 text-reset">
                                            But I must explain to you how all this mistaken idea
                                        </h6>
                                    </a>
                                    <div class="d-flex justify-content-between">
                                        <small class="mb-0">
                                            <a href="{{ URL::asset('#!') }}">Business</a>
                                        </small>
                                        <small class="text-body-secondary">02 July </small>
                                    </div>
                                </div>
                            </article>
                            <article class="d-flex mb-4 card-hover align-items-stretch">
                                <div class="me-3">
                                    <a href="{{ URL::asset('#!') }}" class="overflow-hidden rounded-3 shadow d-block">
                                        <img src="{{ URL::asset('assets/img/960x640/1.jpg') }}" alt="Image" class="width-9x img-zoom">
                                    </a>
                                </div>
                                <div class="flex-gropw-1 justify-content-between">
                                    <a href="{{ URL::asset('#!') }}" >
                                        <h6 class="mb-2 text-reset">
                                            But I must explain to you how all this mistaken idea
                                        </h6>
                                    </a>
                                    <div class="d-flex justify-content-between">
                                        <small class="mb-0">
                                            <a href="{{ URL::asset('#!') }}">Design</a>
                                        </small>
                                        <small class="text-body-secondary">10 March </small>
                                    </div>
                                </div>
                            </article>

                            <div class="pt-5">
                                <a href="{{ URL::asset('#') }}"
                                    class="bg-gradient-light rounded p-4 d-flex align-items-center justify-content-center min-height-2x">
                                    <span class="smallall text-body-secondary">Advertisement</span>
                                </a>
                            </div>
                            <!--/.widget-->
                        </div>
                    </div>
                    <!--/col-->
                </div>
            </section>
            <!--/.End featured post section-->
            <section class="position-relative bg-body-tertiary">
                <div class="container py-9 py-lg-11 position-relative">
                    <div class="row align-items-center justify-content-center justify-content-sm-between mb-5">
                        <div class="col-sm-7 mb-4 mb-sm-0">
                            <h2 class="mb-2">Latest stories</h2>
                            <p class="mb-0">Neque porro quisquam est qui dolorem ipsum quia dolor adipisci velit.</p>
                        </div>
                        <div class="col-sm-5 small text-sm-end">
                            <a href="{{ URL::asset('#!') }}" class="btn btn-outline-primary hover-lift btn-hover-arrow"><span>View
                                    All</span></a>
                        </div>
                    </div>
                    <!--/.row-->
                    <div class="row justify-content-center">
                        <div class="col-md-4 col-sm-6 mb-4 mb-md-0">
                            <div class="card card-hover hover-lift hover-shadow-lg text-white border-0 overflow-hidden rounded-5">
                                <img src="{{ URL::asset('assets/img/960x1140/3.jpg') }}" class="img-fluid img-zoom" alt="...">
                                <!--Background-layer-->
                                <div class="position-absolute start-0 top-0 w-100 h-100 bg-gradient-dark"></div>
                                <div
                                    class="card-body d-flex flex-column position-absolute start-0 top-0 w-100 h-100 justify-content-end pb-lg-5 px-4">
                                    <p class="small"><span>Design</span></p>
                                    <h5 class="h3 mb-4"><span>How good designs helps to grow business</span>
                                    </h5>
                                    <div class="d-flex align-items-center">
                                        <span>
                                            <img src="{{ URL::asset('assets/img/avatar/4.jpg') }}" alt=""
                                                class="avatar sm rounded-circle me-2">
                                        </span>
                                        <div class="small">
                                            Asako Takakura
                                        </div>
                                    </div>
                                </div>
                                <a href="{{ URL::asset('#') }}" class="stretched-link"></a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6 mb-4 mb-md-0">
                            <div class="card card-hover hover-lift hover-shadow-lg text-white border-0 overflow-hidden rounded-5">
                                <img src="{{ URL::asset('assets/img/960x1140/2.jpg') }}" class="img-fluid img-zoom" alt="...">
                                <!--Background-layer-->
                                <div class="position-absolute start-0 top-0 w-100 h-100 bg-gradient-dark"></div>
                                <div
                                    class="card-body d-flex flex-column position-absolute start-0 top-0 w-100 h-100 justify-content-end pb-lg-5 px-4">
                                    <p class="small"><span>Tech</span></p>
                                    <h5 class="h4 mb-4"><span>Team Work is the Key of Business
                                            Success</span></h5>
                                    <div class="d-flex align-items-center">
                                        <span>
                                            <img src="{{ URL::asset('assets/img/avatar/5.jpg') }}" alt=""
                                                class="avatar sm rounded-circle me-2">
                                        </span>
                                        <div class="small">
                                            Emily Doe
                                        </div>
                                    </div>
                                </div>
                                <a href="{{ URL::asset('#') }}" class="stretched-link"></a>
                            </div>
                        </div>
                        <!--/.End-col-->
                        <div class="col-lg-4 col-sm-6">
                            <div class="card card-hover hover-lift hover-shadow-lg text-white border-0 overflow-hidden rounded-5">
                                <img src="{{ URL::asset('assets/img/960x1140/4.jpg') }}" class="img-fluid img-zoom " alt="...">
                                <!--Background-layer-->
                                <div class="position-absolute start-0 top-0 w-100 h-100 bg-gradient-dark"></div>
                                <div
                                    class="card-body d-flex flex-column position-absolute start-0 top-0 w-100 h-100 justify-content-end pb-lg-5 px-4">
                                    <p class="small"><span>Tech</span></p>
                                    <h5 class="h4 mb-4"><span>Why Designer and Developer Can`t be the Same
                                            Person?</span></h5>
                                    <div class="d-flex align-items-center">
                                        <span>
                                            <img src="{{ URL::asset('assets/img/avatar/8.jpg') }}" alt=""
                                                class="avatar sm rounded-circle me-2">
                                        </span>
                                        <div class="small">
                                            Asako Takakura
                                        </div>
                                    </div>
                                </div>
                                <a href="{{ URL::asset('#') }}" class="stretched-link"></a>
                            </div>
                        </div>
                        <!--/.End-col-->
                    </div>
                </div>

            </section>
            <section class="position-relative overflow-hidden">
                <div class="container py-9 py-lg-11">
                    <div class="row align-items-center justify-content-between mb-5">
                        <div class="col-sm-7 mb-4 mb-sm-0">
                            <h2 class="mb-2">Browse categories</h2>
                            <p class="mb-0">Neque porro quisquam est qui dolorem ipsum quia dolor adipisci velit.</p>
                        </div>
                        <div class="col-sm-5 small text-sm-end">
                            <a href="{{ URL::asset('#!') }}"
                                class="btn btn-hover-arrow hover-lift btn-outline-primary"><span>View
                                    All</span></a>
                        </div>
                    </div>
                    <!--/.row-->
                    <div class="row">
                        <div class="col-sm-6 col-lg-3 mb-2 mb-lg-0">
                            <a href="{{ URL::asset('#!') }}" class="h-100 bg-primary-subtle hover-lift rounded-4 p-4 hover-shadow-lg card border-0 text-center">
                              
                                <div class="mx-auto mb-4 width-8x height-8x flex-center bg-primary text-white fs-1 rounded-circle">
                                    <i class="icon-Leafs"></i>
                                </div>
                                <h4 class="mb-2 h5">Nature</h4>
                                <p class="mb-0 text-body-secondary">5 Articles</p>
                            </a>
                        </div>
                        <!--/.Category row-->
                        <div class="col-sm-6 col-lg-3 mb-2 mb-lg-0">
                            <a href="{{ URL::asset('#!') }}" class="h-100 bg-success bg-opacity-10 hover-lift rounded-4 p-4 hover-shadow-lg card border-0 text-center">
                               <div class="mx-auto mb-4 width-8x height-8x flex-center bg-success text-white fs-1 rounded-circle">
                                    <i class="icon-Robot"></i>
                                </div>
                                <h4 class="mb-2 h5">Gadgets</h4>
                                <p class="mb-0 text-body-secondary">6 Articles</p>
                            </a>
                        </div>
                        <!--/.Category row-->
                        <div class="col-sm-6 col-lg-3 mb-2 mb-lg-0">
                            <a href="{{ URL::asset('#!') }}" class="h-100 bg-danger bg-opacity-10 hover-lift rounded-4 p-4 hover-shadow-lg card border-0 text-center">
                               <div class="mx-auto mb-4 width-8x height-8x flex-center bg-danger text-white fs-1 rounded-circle">
                                    <i class="icon-Code-Window"></i>
                                </div>
                                <h4 class="mb-2 h5">Design &amp; Development</h4>
                                <p class="mb-0 text-body-secondary">9 Articles</p>
                            </a>
                        </div>
                        <!--/.Category row-->
                        <div class="col-sm-6 col-lg-3">
                            <a href="{{ URL::asset('#!') }}" class="h-100 bg-info bg-opacity-10 hover-lift rounded-4 p-4 hover-shadow-lg card border-0 text-center">
                               <div class="mx-auto mb-4 width-8x height-8x flex-center bg-info text-white fs-1 rounded-circle">
                                    <i class="icon-Suitcase"></i>
                                </div>
                                <h4 class="mb-2 h5">Business</h4>
                                <p class="mb-0 text-body-secondary">9 Articles</p>
                            </a>
                        </div>
                        <!--/.Category row-->
                    </div>
                </div>
            </section>


            <section class="position-relative">
                <div class="container position-relative">
                    <div
                        class="px-4 px-lg-7 py-7 py-lg-9 bg-gradient-primary rounded-5 text-white overflow-hidden position-relative">
                        <svg class="position-absolute end-0 bottom-0 text-warning w-75 h-auto w-lg-75" width="197"
                            height="99" viewBox="0 0 197 99" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M280 141C280 122.615 276.392 104.41 269.381 87.4243C262.371 70.4387 252.095 55.0052 239.141 42.005C226.188 29.0048 210.809 18.6925 193.884 11.6569C176.959 4.6212 158.819 0.999999 140.5 1C122.181 1 104.041 4.62121 87.1157 11.6569C70.1907 18.6925 54.8124 29.0049 41.8586 42.0051C28.9048 55.0053 18.6293 70.4387 11.6188 87.4243C4.60827 104.41 0.999998 122.615 1 141L280 141Z"
                                class="stroke-white" stroke-opacity=".2" stroke-width="1.5" />
                            <path
                                d="M384 151C384 132.615 380.392 114.41 373.381 97.4243C366.371 80.4387 356.095 65.0052 343.141 52.005C330.188 39.0048 314.809 28.6925 297.884 21.6569C280.959 14.6212 262.819 11 244.5 11C226.181 11 208.041 14.6212 191.116 21.6569C174.191 28.6925 158.812 39.0049 145.859 52.0051C132.905 65.0053 122.629 80.4387 115.619 97.4243C108.608 114.41 105 132.615 105 151L384 151Z"
                                class="stroke-white" stroke-opacity=".2" stroke-width="1.5" />
                        </svg>

                        <div class="position-relative">
                            <h3 class="display-6 mb-5" data-aos="fade-up">Get stories direct to your inbox</h3>
                            <form data-aos="fade-up" data-aos-delay="100">
                                <div
                                    class="d-sm-flex w-md-80 w-lg-75 flex-column flex-sm-row mb-4 justify-content-center">
                                    <input type="email" name="email"
                                        class="me-sm-1 mb-2 mb-sm-0 form-control bg-dark bg-opacity-25 text-white shadow-none form-control-lg border-0"
                                        placeholder="Email Address" required="">
                                    <button type="submit" class="ms-sm-1 btn btn-primary btn-lg">
                                        <span>Subscribe</span>
                                    </button>
                                </div>
                            </form>

                            <p class="small mb-0" data-aos="fade-up" data-aos-delay="150">
                                We’ll never share your details.
                                View our <a href="{{ URL::asset('#!') }}" class="link-hover-underline">Privacy Policy</a> for more info.
                            </p>
                        </div>
                    </div>
                </div>
            </section>

</x-assan-layout>
