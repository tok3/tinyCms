<x-assan-layout layout-type="{{$layoutType}}">
            <section class="bg-primary text-white">
                <div class="container pt-14 pb-9 pb-lg-12">
                    <div class="row pt-lg-7">
                        <div class="col-xl-9">
                            <ol class="breadcrumb mb-3">
                                <li class="breadcrumb-item"><a href="{{ URL::asset('#') }}">Home</a></li>
                                <li class="breadcrumb-item active">Blog</li>
                                <li class="breadcrumb-item active" aria-current="page">Sidebar</li>
                            </ol>
                            <h1 class="mb-0 display-4">Insights, thoughts & announcements from us</h1>
                        </div>
                    </div>
                </div>
            </section>
            <section class="position-relative">
                <div class="container py-9 py-lg-11">
                    <div class="row">
                        <div class="col-lg-3 col-md-4 mb-5 mb-md-0">
                            <div class="pb-5">
                                <h5 class="title mb-3">Newsletter</h5>
                                <form>
                                    <div class="mb-3">
                                        <input type="email" name="email" class="mb-2 form-control"
                                            placeholder="Email Address" required="">
                                        <button type="submit" class="btn btn-primary btn-block">
                                            Subscribe
                                        </button>
                                    </div>
                                    <p class="small text-body-secondary mb-0">
                                        We’ll never share your details.
                                        View our <a href="{{ URL::asset('#!') }}">Privacy Policy</a> for more info.
                                    </p>
                                </form>
                            </div>
                            <!--/.widget-->
                            <div class="pb-5">
                                <h5 class="title mb-3">Recent Posts</h5>
                                <article class="d-flex mb-4 align-items-stretch">
                                    <div class="me-3">
                                        <a href="{{ URL::asset('#!') }}" class="d-block">
                                            <img src="{{ URL::asset('assets/img/960x900/1.jpg') }}" alt="Image"
                                                class="width-7x h-auto rounded-3 hover-shadow-lg hover-lift">
                                        </a>
                                    </div>
                                    <div class="d-flex flex-column justify-content-between">
                                        <a href="{{ URL::asset('#!') }}">
                                            <h6 class="mb-0 text-reset">
                                                Explain how all this mistaken idea
                                            </h6>
                                        </a>
                                        <div class="d-flex pt-2 justify-content-between">
                                            <small class="mb-0">
                                                <a href="{{ URL::asset('#!') }}">Tech</a>
                                            </small>
                                            <small class="text-body-secondary">24 Sep. 2021 </small>
                                        </div>
                                    </div>
                                </article>
                                <article class="d-flex mb-4 align-items-stretch">
                                    <div class="me-3">
                                        <a href="{{ URL::asset('#!') }}" class="d-block">
                                            <img src="{{ URL::asset('assets/img/960x900/2.jpg') }}" alt="Image"
                                                class="width-7x h-auto rounded-3 hover-shadow-lg hover-lift">
                                        </a>
                                    </div>
                                    <div class="d-flex flex-column justify-content-between">
                                        <a href="{{ URL::asset('#!') }}">
                                            <h6 class="mb-0 text-reset">
                                                Lorem Ipsum is free injected humour
                                            </h6>
                                        </a>
                                        <div class="d-flex pt-2 justify-content-between">
                                            <small class="mb-0">
                                                <a href="{{ URL::asset('#!') }}">Business</a>
                                            </small>
                                            <small class="text-body-secondary">21 Sep. 2021 </small>
                                        </div>
                                    </div>
                                </article>
                                <article class="d-flex align-items-stretch">
                                    <div class="me-3">
                                        <a href="{{ URL::asset('#!') }}" class="d-block">
                                            <img src="{{ URL::asset('assets/img/960x900/3.jpg') }}" alt="Image"
                                                class="width-7x h-auto rounded-3 hover-shadow-lg hover-lift">
                                        </a>
                                    </div>
                                    <div class="d-flex flex-column justify-content-between">
                                        <a href="{{ URL::asset('#!') }}">
                                            <h6 class="mb-0 text-reset">
                                                It uses a dictionary of over 200 Latin words
                                            </h6>
                                        </a>
                                        <div class="d-flex pt-2 justify-content-between">
                                            <small class="mb-0">
                                                <a href="{{ URL::asset('#!') }}">Design</a>
                                            </small>
                                            <small class="text-body-secondary ms-auto">19 Aug. 2021 </small>
                                        </div>
                                    </div>
                                </article>
                            </div>
                            <!--/.widget-->
                            <div class="pb-5">
                                <h5 class="title mb-3">Tags</h5>
                                <a href="{{ URL::asset('#!') }}" class="badge text-body border badge-pill mb-1">
                                    Bootstrap
                                </a>
                                <a href="{{ URL::asset('#!') }}" class="badge text-body border badge-pill mb-1">
                                    Jquery
                                </a>
                                <a href="{{ URL::asset('#!') }}" class="badge text-body border badge-pill mb-1">
                                    Sass
                                </a>
                                <a href="{{ URL::asset('#!') }}" class="badge text-body border badge-pill mb-1">
                                    Gulp
                                </a>
                                <a href="{{ URL::asset('#!') }}" class="badge text-body border badge-pill mb-1">
                                    Elements
                                </a>
                                <a href="{{ URL::asset('#!') }}" class="badge text-body border badge-pill mb-1">
                                    Price
                                </a>
                                <a href="{{ URL::asset('#!') }}" class="badge text-body border badge-pill mb-1">
                                    Updates
                                </a>
                            </div>
                            <!--/.widget-->
                            <div class="sticky-top">
                                <a href="{{ URL::asset('#') }}"
                                    class="bg-body-tertiary rounded p-4 d-flex align-items-center justify-content-center min-height-2x">
                                    <span class="text-small text-body-secondary">Advertisement</span>
                                </a>
                            </div>
                            <!--/.widget-->
                        </div>
                        <div class="col-md-8 col-lg-9">
                            <div class="pe-lg-4 pe-md-2">
                                <article class="card align-items-stretch flex-md-row mb-4 mb-md-7 border-0 no-gutters"
                                    data-aos="fade-up">
                                    <div class="col-lg-5">
                                        <a href="{{ URL::asset('#!') }}"
                                            class="d-block rounded-5 overflow-hidden hover-shadow-lg hover-lift">
                                            <img src="{{ URL::asset('assets/img/960x900/4.jpg') }}" alt="" class="img-fluid rounded-3">
                                        </a>
                                    </div>
                                    <div class="card-body d-flex flex-column col-auto p-md-0 ps-md-4">
                                        <div class="d-flex mb-0 justify-content-between">
                                            <span class="d-inline-flex align-items-center small">
                                                <svg class="bx bx-clock me-2 text-body-secondary" width="1em"
                                                    height="1em" viewBox="0 0 16 16" fill="currentColor"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                        d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm8-7A8 8 0 1 1 0 8a8 8 0 0 1 16 0z">
                                                    </path>
                                                    <path fill-rule="evenodd"
                                                        d="M7.5 3a.5.5 0 0 1 .5.5v5.21l3.248 1.856a.5.5 0 0 1-.496.868l-3.5-2A.5.5 0 0 1 7 9V3.5a.5.5 0 0 1 .5-.5z">
                                                    </path>
                                                </svg>
                                                <span class="text-body-secondary">16 November</span>
                                            </span>
                                            <a href="{{ URL::asset('#!') }}" class="small">Business</a>
                                        </div>
                                        <h3 class="mb-3 h2 mt-3">
                                            <a href="{{ URL::asset('#!') }}" class="flex-grow-1 d-block">
                                                What are the 3 most important things needed for effective teamwork?
                                            </a>
                                        </h3>
                                        <p class="mb-4 flex-grow-1 d-none d-lg-block">
                                            It uses a dictionary of over 200 Latin words, combined with a handful of
                                            model
                                            sentence structures, to generate Lorem Ipsum which looks reasonable.
                                        </p>
                                        <div class="d-flex mb-0 small align-items-center">
                                            <img src="{{ URL::asset('assets/img/avatar/3.jpg') }}" alt=""
                                                class="avatar sm me-2 rounded-circle">
                                            <span class="text-body-secondary d-inline-block">By <a
                                                    href="{{ URL::asset('#!') }}">Andrew</a></span>
                                        </div>
                                    </div>
                                    <!--/.card-body-->
                                </article>
                                <!--/.article-->
                                <article class="card align-items-stretch flex-md-row mb-4 mb-md-7 border-0 no-gutters"
                                    data-aos="fade-up">
                                    <div class="col-lg-5">
                                        <a href="{{ URL::asset('#!') }}"
                                            class="d-block rounded-5 overflow-hidden hover-shadow-lg hover-lift">
                                            <img src="{{ URL::asset('assets/img/960x900/1.jpg') }}" alt="" class="img-fluid rounded-3">
                                        </a>
                                    </div>
                                    <div class="card-body d-flex flex-column col-auto p-md-0 ps-md-4">
                                        <div class="d-flex mb-0 justify-content-between">
                                            <span class="d-inline-flex align-items-center small">
                                                <svg class="bx bx-clock me-2 text-body-secondary" width="1em"
                                                    height="1em" viewBox="0 0 16 16" fill="currentColor"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                        d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm8-7A8 8 0 1 1 0 8a8 8 0 0 1 16 0z">
                                                    </path>
                                                    <path fill-rule="evenodd"
                                                        d="M7.5 3a.5.5 0 0 1 .5.5v5.21l3.248 1.856a.5.5 0 0 1-.496.868l-3.5-2A.5.5 0 0 1 7 9V3.5a.5.5 0 0 1 .5-.5z">
                                                    </path>
                                                </svg>
                                                <span class="text-body-secondary">3rd January</span>
                                            </span>
                                            <a href="{{ URL::asset('#!') }}" class="small">Design</a>
                                        </div>
                                        <h3 class="mb-3 h2 mt-3">
                                            <a href="{{ URL::asset('#!') }}" class="flex-grow-1 d-block">
                                                5 most popular google fonts you should use into your next project
                                            </a>
                                        </h3>
                                        <p class="mb-4 flex-grow-1 d-none d-lg-block">
                                            All the Lorem Ipsum generators on the Internet tend to repeat predefined
                                            chunks
                                            as necessary...
                                        </p>
                                        <div class="d-flex mb-0 small align-items-center">
                                            <img src="{{ URL::asset('assets/img/avatar/7.jpg') }}" alt=""
                                                class="avatar sm me-2 rounded-circle">
                                            <span class="text-body-secondary d-inline-block">By <a href="{{ URL::asset('#!') }}">Anjum
                                                    Al Habib</a></span>
                                        </div>
                                    </div>
                                    <!--/.card-body-->
                                </article>
                                <!--/.article-->

                                <article
                                    class="card px-4 px-md-5 px-lg-8 py-lg-5 card-body rounded-5 overflow-hidden bg-dark text-white flex-md-row mb-7 border-0"
                                    data-aos="fade-up">
                                    <img src="{{ URL::asset('assets/img/1200x600/1.jpg') }}" alt="" class="bg-image opacity-25 rounded-3">
                                    <div class="d-flex flex-column">
                                        <div class="d-flex mb-0 justify-content-between small mb-4">
                                            <span class="d-inline-flex align-items-center">
                                                <svg class="bx bx-clock me-2 text-body-secondary" width="1em"
                                                    height="1em" viewBox="0 0 16 16" fill="currentColor"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                        d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm8-7A8 8 0 1 1 0 8a8 8 0 0 1 16 0z">
                                                    </path>
                                                    <path fill-rule="evenodd"
                                                        d="M7.5 3a.5.5 0 0 1 .5.5v5.21l3.248 1.856a.5.5 0 0 1-.496.868l-3.5-2A.5.5 0 0 1 7 9V3.5a.5.5 0 0 1 .5-.5z">
                                                    </path>
                                                </svg>
                                                <span>25 Days ago</span>
                                            </span>
                                            <a href="{{ URL::asset('#!') }}">
                                                Quotes
                                            </a>
                                        </div>
                                        <div class="d-flex flex-column justify-content-between">
                                            <h3 class="h2 mb-4 flex-grow-1">
                                                <a href="{{ URL::asset('#!') }}" class="text-white line-height-base d-block">
                                                    I Really enjoy their company just as people. You
                                                    couldn't ask for a better work environment.
                                                </a>
                                            </h3>
                                            <div class="d-flex mb-0 small align-items-center">
                                                <img src="{{ URL::asset('assets/img/avatar/10.jpg') }}" alt=""
                                                    class="avatar sm rounded-circle me-2">
                                                <span class="text-body-secondary d-inline-block">By <a href="{{ URL::asset('#!') }}">Drew
                                                        Carey</a></span>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/.card-body-->
                                </article>
                                <!--/.article-->
                                <article class="card align-items-stretch flex-md-row mb-4 mb-md-7 border-0 no-gutters"
                                    data-aos="fade-up">
                                    <div class="col-lg-5">
                                        <a href="{{ URL::asset('#!') }}"
                                            class="d-block rounded-5 overflow-hidden hover-shadow-lg hover-lift">
                                            <img src="{{ URL::asset('assets/img/960x900/3.jpg') }}" alt="" class="img-fluid rounded-3">
                                        </a>
                                    </div>
                                    <div class="card-body d-flex flex-column col-auto p-md-0 ps-md-4">
                                        <div class="d-flex mb-0 justify-content-between">
                                            <span class="d-inline-flex align-items-center small">
                                                <svg class="bx bx-clock me-2 text-body-secondary" width="1em"
                                                    height="1em" viewBox="0 0 16 16" fill="currentColor"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                        d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm8-7A8 8 0 1 1 0 8a8 8 0 0 1 16 0z">
                                                    </path>
                                                    <path fill-rule="evenodd"
                                                        d="M7.5 3a.5.5 0 0 1 .5.5v5.21l3.248 1.856a.5.5 0 0 1-.496.868l-3.5-2A.5.5 0 0 1 7 9V3.5a.5.5 0 0 1 .5-.5z">
                                                    </path>
                                                </svg>
                                                <span class="text-body-secondary">25 Minutes ago</span>
                                            </span>
                                            <span>
                                                <a href="{{ URL::asset('#!') }}" class="small">Food</a>,
                                                <a href="{{ URL::asset('#!') }}" class="small">City</a>
                                            </span>
                                        </div>
                                        <h3 class="mb-3 h2 mt-3">
                                            <a href="{{ URL::asset('#!') }}" class="flex-grow-1 d-block">
                                                How to order outside your culinary comfort zone in Sydney?
                                            </a>
                                        </h3>
                                        <p class="mb-4 flex-grow-1 d-none d-lg-block">
                                            It uses a dictionary of over 200 Latin words, combined with a handful of
                                            model
                                            sentence structures, to generate Lorem Ipsum which looks reasonable.
                                        </p>
                                        <div class="d-flex mb-0 small align-items-center">
                                            <img src="{{ URL::asset('assets/img/avatar/4.jpg') }}" alt=""
                                                class="avatar sm me-2 rounded-circle">
                                            <span class="text-body-secondary d-inline-block">By <a href="{{ URL::asset('#!') }}">Kim
                                                    Jong</a></span>
                                        </div>
                                    </div>
                                    <!--/.card-body-->
                                </article>
                                <!--/.article-->
                                <article class="card align-items-stretch flex-md-row mb-4 mb-md-7 border-0 no-gutters"
                                    data-aos="fade-up">
                                    <div class="col-lg-5">
                                        <a href="{{ URL::asset('#!') }}"
                                            class="d-block rounded-5 overflow-hidden hover-shadow-lg hover-lift">
                                            <img src="{{ URL::asset('assets/img/960x900/5.jpg') }}" alt="" class="img-fluid rounded-3">
                                        </a>
                                    </div>
                                    <div class="card-body d-flex flex-column col-auto p-md-0 ps-md-4">
                                        <div class="d-flex mb-0 justify-content-between">
                                            <span class="d-inline-flex align-items-center small">
                                                <svg class="bx bx-clock me-2 text-body-secondary" width="1em"
                                                    height="1em" viewBox="0 0 16 16" fill="currentColor"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                        d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm8-7A8 8 0 1 1 0 8a8 8 0 0 1 16 0z">
                                                    </path>
                                                    <path fill-rule="evenodd"
                                                        d="M7.5 3a.5.5 0 0 1 .5.5v5.21l3.248 1.856a.5.5 0 0 1-.496.868l-3.5-2A.5.5 0 0 1 7 9V3.5a.5.5 0 0 1 .5-.5z">
                                                    </path>
                                                </svg>
                                                <span class="text-body-secondary">11 May</span>
                                            </span>
                                            <a href="{{ URL::asset('#!') }}" class="small">Design</a>
                                        </div>
                                        <h3 class="mb-3 mt-3">
                                            <a href="{{ URL::asset('#!') }}" class="flex-grow-1 d-block">
                                                How to make a responsive portfolio website using bootstrap5?
                                            </a>
                                        </h3>
                                        <p class="mb-4 flex-grow-1 d-none d-lg-block">
                                            It uses a dictionary of over 200 Latin words, combined with a handful of
                                            model
                                            sentence structures, to generate Lorem Ipsum which looks reasonable.
                                        </p>
                                        <div class="d-flex mb-0 small align-items-center">
                                            <img src="{{ URL::asset('assets/img/avatar/2.jpg') }}" alt=""
                                                class="avatar sm me-2 rounded-circle">
                                            <span class="text-body-secondary d-inline-block">By <a
                                                    href="{{ URL::asset('#!') }}">Almada</a></span>
                                        </div>
                                    </div>
                                    <!--/.card-body-->
                                </article>
                                <!--/.article-->
                                <article class="card align-items-stretch flex-md-row mb-4 mb-md-7 border-0 no-gutters"
                                    data-aos="fade-up">
                                    <div class="col-lg-5">
                                        <a href="{{ URL::asset('#!') }}"
                                            class="d-block rounded-5 overflow-hidden hover-shadow-lg hover-lift">
                                            <img src="{{ URL::asset('assets/img/960x900/2.jpg') }}" alt="" class="img-fluid rounded-3">
                                        </a>
                                    </div>
                                    <div class="card-body d-flex flex-column col-auto p-md-0 ps-md-4">
                                        <div class="d-flex mb-0 justify-content-between">
                                            <span class="d-inline-flex align-items-center small">
                                                <svg class="bx bx-clock me-2 text-body-secondary" width="1em"
                                                    height="1em" viewBox="0 0 16 16" fill="currentColor"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                        d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm8-7A8 8 0 1 1 0 8a8 8 0 0 1 16 0z">
                                                    </path>
                                                    <path fill-rule="evenodd"
                                                        d="M7.5 3a.5.5 0 0 1 .5.5v5.21l3.248 1.856a.5.5 0 0 1-.496.868l-3.5-2A.5.5 0 0 1 7 9V3.5a.5.5 0 0 1 .5-.5z">
                                                    </path>
                                                </svg>
                                                <span class="text-body-secondary">28 April</span>
                                            </span>
                                            <a href="{{ URL::asset('#!') }}" class="small">Magazine</a>
                                        </div>
                                        <h3 class="mb-3 mt-3">
                                            <a href="{{ URL::asset('#!') }}" class="flex-grow-1 d-block">
                                                What is the most widely read magazine?
                                            </a>
                                        </h3>
                                        <p class="mb-4 flex-grow-1 d-none d-lg-block">
                                            It uses a dictionary of over 200 Latin words, combined with a handful of
                                            model
                                            sentence structures, to generate Lorem Ipsum which looks reasonable.
                                        </p>
                                        <div class="d-flex mb-0 small align-items-center">
                                            <img src="{{ URL::asset('assets/img/avatar/8.jpg') }}" alt=""
                                                class="avatar sm me-2 rounded-circle">
                                            <span class="text-body-secondary d-inline-block">By <a
                                                    href="{{ URL::asset('#!') }}">Timothy</a></span>
                                        </div>
                                    </div>
                                    <!--/.card-body-->
                                </article>
                                <!--/.article-->
                            </div>

                            <div class="row pt-5 justify-content-end">
                                <div class="col-auto">
                                    <nav class="mb-0" aria-label="Page navigation example">
                                        <ul class="pagination mb-0">
                                            <li class="page-item disabled">
                                                <a class="page-link" href="{{ URL::asset('#') }}" aria-label="Previous">
                                                    <svg class="bx bx-chevron-left" width="1em" height="1em"
                                                        viewBox="0 0 16 16" fill="currentColor"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd"
                                                            d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z">
                                                        </path>
                                                    </svg>
                                                </a>
                                            </li>
                                            <li class="page-item active"><a class="page-link" href="{{ URL::asset('#') }}">1</a></li>
                                            <li class="page-item"><a class="page-link" href="{{ URL::asset('#') }}">2</a></li>
                                            <li class="page-item"><a class="page-link" href="{{ URL::asset('#') }}">3</a></li>
                                            <li class="page-item">
                                                <a class="page-link" href="{{ URL::asset('#') }}" aria-label="Next">
                                                    <svg class="bx bx-chevron-right" width="1em" height="1em"
                                                        viewBox="0 0 16 16" fill="currentColor"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd"
                                                            d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z">
                                                        </path>
                                                    </svg>
                                                </a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                            <!--/.Pagination-row-->
                        </div>
                        <!--/.col-->

                    </div>
                    <!--/.blog-row-->
                </div>
            </section>
            <!--/.content section/-->
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
