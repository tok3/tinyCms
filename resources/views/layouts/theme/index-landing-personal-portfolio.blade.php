<!doctype html>
<html lang="en" data-bs-theme="light">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="{{ URL::asset('assets/img/favicon.ico') }}" type="image/ico">
        <x-partials.head-includes />

        <!--Locomotive scroll-->
        <link rel="stylesheet" href="{{ URL::asset('assets/vendor/node_modules/css/locomotive-scroll.min.css') }}">
        <!-- Main CSS -->
        @vite(['resources/scss/theme.scss'])

        <title>Assan 4</title>
    </head>

    <body>
        <x-partials.preloader />


        <div data-scroll-container>
            <!--Header Start-->
            <header class="header-fixed-top header-transparent z-fixed">
                <nav class="navbar navbar-expand-lg navbar-light py-3">
                    <div class="container position-relative">
                        <a class="navbar-brand width-3x" href="{{ URL::asset('assan/index.html') }}">
                            <img src="{{ URL::asset('assets/img/logo/logo-a.svg') }}" alt="" class="img-fluid navbar-brand-light">
                            <img src="{{ URL::asset('assets/img/logo/logo-a-white.svg') }}" alt="" class="img-fluid navbar-brand-dark">
                        </a>

                        <div class="d-flex align-items-center navbar-no-collapse-items order-lg-last">
                            <div class="nav-item me-3">
                                <a href="{{ URL::asset('#') }}" class="btn btn-outline-primary">😊 Hire Me</a>
                            </div>
                               <!--:Dark Mode:-->
<div class="nav-item dropdown">
    <a class="nav-link py-2 px-2 d-flex align-items-center"
        id="assan-theme" href="{{ URL::asset('#') }}" aria-expanded="false" data-bs-toggle="dropdown"
        data-bs-display="static">
        <span class="theme-icon-active d-flex align-items-center">
            <i class="bx align-middle"></i>
        </span>
    </a>
    <!--:Dark Mode Options:-->
    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="assan-theme" style="--bs-dropdown-min-width: 9rem;">
        <li class="mb-1">
            <button type="button" class="dropdown-item d-flex align-items-center active"
                data-bs-theme-value="light">
                <span class="theme-icon d-flex align-items-center">
                    <i class="bx bx-sun align-middle me-2"> </i>
                </span>
                Light
            </button>
        </li>
        <li class="mb-1">
            <button type="button" class="dropdown-item d-flex align-items-center"
                data-bs-theme-value="dark">
                <span class="theme-icon d-flex align-items-center">
                    <i class="bx bx-moon align-middle me-2"></i>
                </span>
                Dark
            </button>
        </li>
        <li>
            <button type="button" class="dropdown-item d-flex align-items-center"
                data-bs-theme-value="auto">
                <span class="theme-icon d-flex align-items-center">
                    <i class="bx bx-color-fill align-middle me-2"></i>
                </span>
                Auto
            </button>
        </li>
    </ul>
</div>
                            <div class="nav-item me-3 me-lg-0">
                                <a data-bs-toggle="offcanvas" href="{{ URL::asset('#offcanvasEnd') }}" class="nav-link ms-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor"
                                        class="bx bx-list" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M2.5 11.5A.5.5 0 0 1 3 11h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4A.5.5 0 0 1 3 7h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4A.5.5 0 0 1 3 3h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z">
                                        </path>
                                    </svg>
                                </a>
                            </div>
                         
                        </div>
                    </div>
                </nav>
            </header>

            <!--Offcanvas dark-->
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasEnd" aria-labelledby="offcanvasEnd">
                <div class="border-bottom offcanvas-header">
                    <button type="button" class="btn btn-secondary p-0 m-0 width-4x height-4x flex-center ms-auto"
                        data-bs-dismiss="offcanvas" aria-label="Close">
                        <i class="bx bx-x fs-4"></i>
                    </button>
                </div>
                <div class="offcanvas-body p-4 px-xl-5">
                    <ul class="nav flex-column">
                        <li class="nav-item"><a href="{{ URL::asset('#') }}" class="nav-link fs-2 fw-normal">Index</a></li>
                        <li class="nav-item"><a href="{{ URL::asset('#') }}" class="nav-link fs-2 fw-normal">About</a></li>
                        <li class="nav-item"><a href="{{ URL::asset('#') }}" class="nav-link fs-2 fw-normal">Portfolio</a></li>
                        <li class="nav-item"><a href="{{ URL::asset('#') }}" class="nav-link fs-2 fw-normal">What i Do</a></li>
                        <li class="nav-item"><a href="{{ URL::asset('#') }}" class="nav-link fs-2 fw-normal">Get in touch</a></li>
                    </ul>
                </div>
                <div class="offcanvas-footer p-4 px-xl-5">
                    <ul class="list-unstyled mb-0">
                        <li class="pb-4">
                            <small class="text-body-secondary d-block">Email us:</small>
                            <a href="{{ URL::asset('mailto:mail@domain.com') }}" class="link-underline fs-5">mail@domain.com</a>
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
            
                <!--page-hero-->
                <section class="position-relative overflow-hidden bg-gradient-blur" data-scroll-section>

                    <div class="container position-relative z-1">
                        <div class="row vh-100 align-items-center">
                            <div class="col-xl-10 mx-auto">
                                <div class="d-inline-flex">
                                    <ul class="js-hover-img">
                                        <li class="js-hover-img-item">
                                            <h1 class="js-hover-img-link display-1 mb-0">
                                                <small class="fs-4 ls-1 fw-normal">👋Hi, I Am Aaron Nunez</small><br>
                                                Freelance Web Designer and Visual Developer.
                                            </h1>
                                            <img src="{{ URL::asset('assets/img/team/3.jpg') }}" alt="Image" class="img height-2x0 w-auto">
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="position-relative overflow-hidden" data-scroll-section>
                    <div class="width-20x height-20x position-absolute end-0 bottom-0 me-3 mb-n4 bg-info-subtle d-none d-md-block rounded-circle"
                        data-scroll data-scroll-direction="vertical" data-scroll-speed="6">
                    </div>
                    <div class="width-20x height-20x position-absolute start-0 top-0 me-3 mt-n4 bg-primary-subtle d-none d-md-block rounded-circle opacity-75"
                        data-scroll data-scroll-direction="vertical" data-scroll-speed="6">
                    </div>
                    <div class="container py-12 position-relative">
                        <div class="row mb-7 mb-lg-11 align-items-center justify-content-center">
                            <div class="col-xl-8 col-lg-10 text-center mb-5 mb-md-0">
                                <h2 class="mb-0 display-5 fw-light" data-scroll data-scroll-direction="vertical"
                                    data-scroll-speed="3">
                                    👋 I’m Aaron Nunez, 24, 100% UI UX web designer, I live web design and Development
                                    with no less passion.
                                </h2>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <!--Feature column-->
                            <div class="col-12 col-md-4 mb-5 mb-md-0">
                                <div
                                    class="flex-center width-6x height-6x rounded-circle border border-primary-subtle lh-1 fw-semiold small mb-4">
                                    01
                                </div>
                                <h5 class="mb-3">Planing</h5>

                                <p class="mb-0 w-lg-75">
                                    Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing
                                    industries for previewing layouts and visual mockups.
                                </p>
                            </div>

                            <!--Feature column-->
                            <div class="col-12 col-md-4 mb-5 mb-md-0">
                                <div
                                    class="flex-center width-6x height-6x rounded-circle border border-primary-subtle lh-1 fw-semiold small mb-4">
                                    02
                                </div>
                                <h5 class="mb-3">Design & Development</h5>
                                <p class="mb-0 w-lg-75">
                                    Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing
                                    industries for previewing layouts and visual mockups.
                                </p>
                            </div>

                            <!--Feature column-->
                            <div class="col-12 col-md-4">
                                <div
                                    class="flex-center width-6x height-6x rounded-circle border border-primary-subtle lh-1 fw-semiold small mb-4">
                                    03
                                </div>
                                <h5 class="mb-3">Testing & Launch</h5>
                                <p class="mb-0 w-lg-75">
                                    Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing
                                    industries for previewing layouts and visual mockups.
                                </p>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="position-relative overflow-hidden" data-scroll-section>
                    <div class="container py-9 py-lg-11 position-relative z-1">
                        <div class="row align-items-stretch">
                            <div class="col-md-10 col-xl-6 order-last">
                                <h3 class="mb-5 display-5 fw-light mt-n15 mt-lg-0 position-relative ms-lg-n14 z-1"
                                    data-scroll data-scroll-direction="vertical" data-scroll-speed="1">
                                    My creative journey started at Jaipur where I studied for the past years. I’ve been
                                    able to work with talented people, especially across the globe.
                                </h3>
                            </div>
                            <div class="col-md-6 order-1 position-relative">
                                <div class="overflow-hidden position-relative" data-scroll
                                    data-scroll-direction="vertical" data-scroll-speed="5">
                                    <img src="{{ URL::asset('assets/img/projects/lg3.jpg') }}" alt="" class="img-fluid flip-x d-block">
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="position-relative" id="projects" data-scroll-section>

                    <div class="width-20x height-20x position-absolute end-0 bottom-0 me-3 mt-n4 bg-warning-subtle d-none d-md-block rounded-circle"
                        data-scroll data-scroll-direction="vertical" data-scroll-speed="6">
                    </div>
                    <div class="py-9 py-lg-11 container position-relative z-1">
                        <div class="row mb-7">
                            <div class="col-lg-6">
                                <h2 class="display-3 mb-4">Featured Projects</h2>
                                <p class="lead">
                                    We’re a digital design studio connecting brands to people through craft and culture.
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 mb-5" data-scroll>
                                <!--Card-->
                                <a href="{{ URL::asset('#!') }}" class="d-block text-reset overflow-hidden position-relative card-hover">
                                    <div class="overflow-hidden bg-primary card-reveal-effect">
                                        <img src="{{ URL::asset('assets/img/projects/lg1.jpg') }}" alt="" class="img-fluid img-zoom">
                                    </div>
                                    <div class="card-body pt-4 pb-0">
                                        <ul class="list-unstyled mb-0">
                                            <li>
                                                <h5 class="fs-4 mb-1">Awesome title</h5>
                                            </li>
                                            <li><span class="text-body-secondary">Awesome Subtitle</span></li>
                                        </ul>
                                    </div>
                                </a>
                            </div>
                            <div class="col-sm-6 mb-5" data-scroll>
                                <!--Card-->
                                <!--Card-->
                                <a href="{{ URL::asset('#!') }}" class="d-block text-reset overflow-hidden position-relative card-hover">
                                    <div class="overflow-hidden bg-primary card-reveal-effect">
                                        <img src="{{ URL::asset('assets/img/projects/lg2.jpg') }}" alt="" class="img-fluid img-zoom">
                                    </div>
                                    <div class="card-body pt-4 pb-0">
                                        <ul class="list-unstyled mb-0">
                                            <li>
                                                <h5 class="fs-4 mb-1">Awesome title</h5>
                                            </li>
                                            <li><span class="text-body-secondary">Awesome Subtitle</span></li>
                                        </ul>
                                    </div>
                                </a>
                            </div>
                            <div class="col-sm-6 mb-5 mb-sm-0" data-scroll>
                                <!--Card-->
                                <a href="{{ URL::asset('#!') }}" class="d-block text-reset overflow-hidden position-relative card-hover">
                                    <div class="overflow-hidden bg-primary card-reveal-effect">
                                        <img src="{{ URL::asset('assets/img/projects/lg3.jpg') }}" alt="" class="img-fluid img-zoom">
                                    </div>
                                    <div class="card-body pt-4 pb-0">
                                        <ul class="list-unstyled mb-0">
                                            <li>
                                                <h5 class="fs-4 mb-1">Awesome title</h5>
                                            </li>
                                            <li><span class="text-body-secondary">Awesome Subtitle</span></li>
                                        </ul>
                                    </div>
                                </a>
                            </div>
                            <div class="col-sm-6" data-scroll>
                                <!--Card-->
                                <a href="{{ URL::asset('#!') }}" class="d-block text-reset overflow-hidden position-relative card-hover">
                                    <div class="overflow-hidden bg-primary card-reveal-effect">
                                        <img src="{{ URL::asset('assets/img/projects/lg4.jpg') }}" alt="" class="img-fluid img-zoom">
                                    </div>
                                    <div class="card-body pt-4 pb-0">
                                        <ul class="list-unstyled mb-0">
                                            <li>
                                                <h5 class="fs-4 mb-1">Awesome title</h5>
                                            </li>
                                            <li><span class="text-body-secondary">Awesome Subtitle</span></li>
                                        </ul>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="position-relative overflow-hidden" data-scroll-section>
                    <div class="width-20x height-20x position-absolute start-0 bottom-0 me-3 mt-n4 bg-info-subtle d-none d-md-block rounded-circle"
                        data-scroll data-scroll-direction="vertical" data-scroll-speed="6">
                    </div>
                    <div class="container py-9 py-lg-11 position-relative z-1">
                        <div class="row justify-content-around">
                            <div class="col-md-5 col-xl-4 mb-5 mb-md-0">
                                <h4 class="display-3 mb-0" data-scroll data-scroll-direction="vertical"
                                    data-scroll-speed="3">
                                    My Awards
                                </h4>
                            </div>
                            <div class="col-md-7 ">
                                <ul class="list-unstyled">
                                    <li
                                        class="d-flex align-items-center justify-content-between py-3 border-bottom border-secondary">
                                        <div class="d-flex align-items-center fw-semibold fs-6">
                                            <span class="d-block me-3">
                                                <svg class="text-body-secondary" fill="currentColor" width="42" height="42"
                                                    viewBox="0 0 512 512">
                                                    <path
                                                        d="m183 392l-10 2 10 53c-13-4-25-10-37-17l2-49-10 0-1 44c-10-6-20-14-28-22l14-46-9-3-13 42c-8-7-15-15-21-25l21-43-8-5-18 40c-7-11-14-24-20-37l31-29-7-7-29 26c-3-9-6-19-9-29l35-25-5-7-31 22c-2-10-3-21-3-31l38-15-4-9-34 14c0-12 1-25 4-38l34-2 0-10-30 1c3-11 7-22 13-34l29 6 2-10-28-5c5-12 12-21 19-31l24 15 6-8-24-17c6-7 11-14 17-20l25 17 6-8-23-16c7-5 14-11 21-15l20 11 4-8-14-9c9-5 18-10 28-14l-4-10c-8 4-15 7-22 13l5-13-10-3-9 26c-6 3-10 7-14 11l5-18-10-3-10 34c-5 4-9 9-15 15l0-21-10 0 0 32c-7 9-12 17-17 27l-1-24-10 2 3 39c-4 10-9 20-11 29l-9-24-10 3 14 37c-2 11-4 24-5 35l-17-23-8 6 23 34c0 10 0 19 2 29l-23-17-5 9 31 24c1 10 4 19 8 29l-35-10-3 10 42 13c6 12 12 24 19 35l-38-7-2 10 48 8c6 9 13 17 20 24l-41 3 1 10 48-4c10 8 20 16 30 23l-38 16 2 8 45-17c13 7 24 13 38 17l-35 19 4 8 43-23 4 2z m326-76l-3-9-35 9c3-9 6-19 8-29l31-24-5-8-23 16c2-9 2-19 3-29l24-34-9-5-16 22c0-13-3-24-6-35l14-37-10-2-8 24c-3-10-7-20-12-30l3-39-10-2-1 24c-6-10-11-18-17-27l0-32-10 0 0 21c-4-5-9-10-14-15l-11-34-10 3 6 18c-4-4-10-7-14-11l-10-25-8 2 4 13c-7-4-16-8-24-13l-4 10c10 4 19 9 28 14l-16 9 6 8 20-11c7 4 14 10 21 15l-23 16 6 8 25-18c6 6 13 13 17 20l-24 17 6 8 24-15c7 9 14 19 19 30l-28 6 2 10 29-6c4 11 8 23 11 34l-29-1 0 9 34 3c2 13 4 25 4 38l-34-14-4 9 38 15c0 10-2 21-3 31l-32-23-6 9 35 25c-1 10-4 20-8 30l-30-27-7 7 32 29c-5 13-11 26-19 37l-18-39-9 4 21 43c-7 9-14 17-21 26l-13-42-9 2 14 47c-9 8-19 15-28 21l-2-44-10 0 2 49c-11 7-24 13-37 17l10-52-10-1-12 69 4-2 42 23 4-9-35-18c13-4 25-10 38-17l45 17 3-8-38-14c11-7 21-16 31-24l49 4 1-10-40-3c7-7 14-15 19-24l48-8-1-10-38 7c7-11 12-22 18-35z">
                                                    </path>
                                                </svg>
                                            </span>
                                            Awwwards, Site of the Day
                                        </div>
                                        <p class="mb-0 h2">
                                            5 </p>
                                    </li>
                                    <li
                                        class="d-flex align-items-center justify-content-between py-3 border-bottom border-secondary">
                                        <div class="d-flex align-items-center fw-semibold fs-6">
                                            <span class="d-block me-3">
                                                <svg class="text-body-secondary" fill="currentColor" width="42" height="42"
                                                    viewBox="0 0 512 512">
                                                    <path
                                                        d="m183 392l-10 2 10 53c-13-4-25-10-37-17l2-49-10 0-1 44c-10-6-20-14-28-22l14-46-9-3-13 42c-8-7-15-15-21-25l21-43-8-5-18 40c-7-11-14-24-20-37l31-29-7-7-29 26c-3-9-6-19-9-29l35-25-5-7-31 22c-2-10-3-21-3-31l38-15-4-9-34 14c0-12 1-25 4-38l34-2 0-10-30 1c3-11 7-22 13-34l29 6 2-10-28-5c5-12 12-21 19-31l24 15 6-8-24-17c6-7 11-14 17-20l25 17 6-8-23-16c7-5 14-11 21-15l20 11 4-8-14-9c9-5 18-10 28-14l-4-10c-8 4-15 7-22 13l5-13-10-3-9 26c-6 3-10 7-14 11l5-18-10-3-10 34c-5 4-9 9-15 15l0-21-10 0 0 32c-7 9-12 17-17 27l-1-24-10 2 3 39c-4 10-9 20-11 29l-9-24-10 3 14 37c-2 11-4 24-5 35l-17-23-8 6 23 34c0 10 0 19 2 29l-23-17-5 9 31 24c1 10 4 19 8 29l-35-10-3 10 42 13c6 12 12 24 19 35l-38-7-2 10 48 8c6 9 13 17 20 24l-41 3 1 10 48-4c10 8 20 16 30 23l-38 16 2 8 45-17c13 7 24 13 38 17l-35 19 4 8 43-23 4 2z m326-76l-3-9-35 9c3-9 6-19 8-29l31-24-5-8-23 16c2-9 2-19 3-29l24-34-9-5-16 22c0-13-3-24-6-35l14-37-10-2-8 24c-3-10-7-20-12-30l3-39-10-2-1 24c-6-10-11-18-17-27l0-32-10 0 0 21c-4-5-9-10-14-15l-11-34-10 3 6 18c-4-4-10-7-14-11l-10-25-8 2 4 13c-7-4-16-8-24-13l-4 10c10 4 19 9 28 14l-16 9 6 8 20-11c7 4 14 10 21 15l-23 16 6 8 25-18c6 6 13 13 17 20l-24 17 6 8 24-15c7 9 14 19 19 30l-28 6 2 10 29-6c4 11 8 23 11 34l-29-1 0 9 34 3c2 13 4 25 4 38l-34-14-4 9 38 15c0 10-2 21-3 31l-32-23-6 9 35 25c-1 10-4 20-8 30l-30-27-7 7 32 29c-5 13-11 26-19 37l-18-39-9 4 21 43c-7 9-14 17-21 26l-13-42-9 2 14 47c-9 8-19 15-28 21l-2-44-10 0 2 49c-11 7-24 13-37 17l10-52-10-1-12 69 4-2 42 23 4-9-35-18c13-4 25-10 38-17l45 17 3-8-38-14c11-7 21-16 31-24l49 4 1-10-40-3c7-7 14-15 19-24l48-8-1-10-38 7c7-11 12-22 18-35z">
                                                    </path>
                                                </svg>
                                            </span>
                                            CSSDA, Site of the Day
                                        </div>
                                        <p class="mb-0 h2">
                                            7 </p>
                                    </li>
                                    <li
                                        class="d-flex align-items-center justify-content-between py-3 border-bottom border-secondary">
                                        <div class="d-flex align-items-center fw-semibold fs-6">
                                            <span class="d-block me-3">

                                                <svg class="text-body-secondary" fill="currentColor" width="42" height="42"
                                                    viewBox="0 0 512 512">
                                                    <path
                                                        d="m183 392l-10 2 10 53c-13-4-25-10-37-17l2-49-10 0-1 44c-10-6-20-14-28-22l14-46-9-3-13 42c-8-7-15-15-21-25l21-43-8-5-18 40c-7-11-14-24-20-37l31-29-7-7-29 26c-3-9-6-19-9-29l35-25-5-7-31 22c-2-10-3-21-3-31l38-15-4-9-34 14c0-12 1-25 4-38l34-2 0-10-30 1c3-11 7-22 13-34l29 6 2-10-28-5c5-12 12-21 19-31l24 15 6-8-24-17c6-7 11-14 17-20l25 17 6-8-23-16c7-5 14-11 21-15l20 11 4-8-14-9c9-5 18-10 28-14l-4-10c-8 4-15 7-22 13l5-13-10-3-9 26c-6 3-10 7-14 11l5-18-10-3-10 34c-5 4-9 9-15 15l0-21-10 0 0 32c-7 9-12 17-17 27l-1-24-10 2 3 39c-4 10-9 20-11 29l-9-24-10 3 14 37c-2 11-4 24-5 35l-17-23-8 6 23 34c0 10 0 19 2 29l-23-17-5 9 31 24c1 10 4 19 8 29l-35-10-3 10 42 13c6 12 12 24 19 35l-38-7-2 10 48 8c6 9 13 17 20 24l-41 3 1 10 48-4c10 8 20 16 30 23l-38 16 2 8 45-17c13 7 24 13 38 17l-35 19 4 8 43-23 4 2z m326-76l-3-9-35 9c3-9 6-19 8-29l31-24-5-8-23 16c2-9 2-19 3-29l24-34-9-5-16 22c0-13-3-24-6-35l14-37-10-2-8 24c-3-10-7-20-12-30l3-39-10-2-1 24c-6-10-11-18-17-27l0-32-10 0 0 21c-4-5-9-10-14-15l-11-34-10 3 6 18c-4-4-10-7-14-11l-10-25-8 2 4 13c-7-4-16-8-24-13l-4 10c10 4 19 9 28 14l-16 9 6 8 20-11c7 4 14 10 21 15l-23 16 6 8 25-18c6 6 13 13 17 20l-24 17 6 8 24-15c7 9 14 19 19 30l-28 6 2 10 29-6c4 11 8 23 11 34l-29-1 0 9 34 3c2 13 4 25 4 38l-34-14-4 9 38 15c0 10-2 21-3 31l-32-23-6 9 35 25c-1 10-4 20-8 30l-30-27-7 7 32 29c-5 13-11 26-19 37l-18-39-9 4 21 43c-7 9-14 17-21 26l-13-42-9 2 14 47c-9 8-19 15-28 21l-2-44-10 0 2 49c-11 7-24 13-37 17l10-52-10-1-12 69 4-2 42 23 4-9-35-18c13-4 25-10 38-17l45 17 3-8-38-14c11-7 21-16 31-24l49 4 1-10-40-3c7-7 14-15 19-24l48-8-1-10-38 7c7-11 12-22 18-35z">
                                                    </path>
                                                </svg>
                                            </span>
                                            FWA, Site of The Day
                                        </div>
                                        <p class="mb-0 h2">
                                            1 </p>
                                    </li>
                                    <li
                                        class="d-flex align-items-center justify-content-between py-3 border-bottom border-secondary">
                                        <div class="d-flex align-items-center fw-semibold fs-6">
                                            <span class="d-block me-3">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    fill="currentColor" class="bx bx-journal-medical text-body-secondary"
                                                    viewBox="0 0 16 16">
                                                    <path fill-rule="evenodd"
                                                        d="M8 4a.5.5 0 0 1 .5.5v.634l.549-.317a.5.5 0 1 1 .5.866L9 6l.549.317a.5.5 0 1 1-.5.866L8.5 6.866V7.5a.5.5 0 0 1-1 0v-.634l-.549.317a.5.5 0 1 1-.5-.866L7 6l-.549-.317a.5.5 0 0 1 .5-.866l.549.317V4.5A.5.5 0 0 1 8 4zM5 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z" />
                                                    <path
                                                        d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2z" />
                                                    <path
                                                        d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1z" />
                                                </svg>
                                            </span>
                                            Published in 365 best websites in the world
                                        </div>
                                        <p class="mb-0 h2">2
                                        </p>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>
                </section>
            <!--Footer Start-->
            <footer class="position-relative bg-body" data-scroll-section>
                <div class="container py-9 py-lg-11 position-relative">
                    <div class="row">
                        <div class="col-12 col-md-7 h-100 me-auto mb-7 mb-md-0">
                            <h2 class="display-3 mb-4 position-relative">
                                Have a project? Let's work togethor
                            </h2>
                            <p class="lead mb-5">
                                Write to me if you feel like a beer, want to place an order, want to offer me a job or
                                have a million to give away.
                            </p>
                            <div class="d-flex align-items-center">
                                <a class="fs-3 link-hover-underline" href="{{ URL::asset('mailto:mail@doamin.com') }}">mail@aaronnunez.com
                                    <i class="bx bx-right-arrow-alt"></i>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="d-flex flex-column h-100 justify-content-between">
                                <div class="text-lg-end">
                                    <div class="mb-3">
                                        <a href="{{ URL::asset('#!') }}" class="link-hover-underline">Facebook</a>
                                    </div>
                                    <div class="mb-3">
                                        <a href="{{ URL::asset('#!') }}" class="link-hover-underline">Twitter</a>
                                    </div>
                                    <div class="mb-3">
                                        <a href="{{ URL::asset('#!') }}" class="link-hover-underline">Linkedin</a>
                                    </div>
                                    <div class="mb-3">
                                        <a href="{{ URL::asset('#!') }}" class="link-hover-underline">Behance</a>
                                    </div>
                                    <div class="mb-3">
                                        <a href="{{ URL::asset('#!') }}" class="link-hover-underline">Instagram</a>
                                    </div>
                                    <div class="mb-3">
                                        <a href="{{ URL::asset('#!') }}" class="link-hover-underline">Dribbble</a>
                                    </div>
                                </div>
                                <div>
                                    <p class="small text-body-secondary text-md-end mb-0">
                                        <span class="d-block">&copy; Copyright
                                            <script>
                                                document.write(new Date().getFullYear())

                                            </script>. Assan
                                        </span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- / .container -->
            </footer>
        </div>
        <!-- scripts -->
        <script src="{{ URL::asset('assets/js/theme.bundle.min.js') }}"></script>


        <!--Smooth scroll locomotive-->
        <script src="{{ URL::asset('assets/vendor/node_modules/js/locomotive-scroll.min.js') }}"></script>
        <script src="{{ URL::asset('assets/vendor/node_modules/js/gsap.min.js') }}"></script>
        <script type="text/javascript">
            (function () {
                var scroll = new LocomotiveScroll({
                    el: document.querySelector('[data-scroll-container]'),
                    smooth: true,
                });
            })();

        </script>
        <script>
            let vw = window.innerWidth || document.documentElement.clientWidth,
                maxVw = 320;
            vw > maxVw && document.querySelectorAll(".js-hover-img-item").forEach(function (e) {
                let t = e,
                    r = (t.getBoundingClientRect(),
                        e.querySelector("img")),
                    a = r.offsetHeight,
                    l = r.offsetWidth;
                e.addEventListener("mouseenter",
                        s => {
                            e.classList.contains("is-hover") || e.classList.add("is-hover");
                            let o = s.clientX - t.offsetLeft - l / 2.7,
                                u = s.offsetY - a / 2.5;
                            gsap.set(r, {
                                x: o,
                                y: u,
                                rotate: -4
                            })
                        }),
                    e.addEventListener("mousemove",
                        e => {
                            let s = e.clientX - t.offsetLeft - l / 2,
                                o = e.offsetY - r.offsetTop - a * .5;
                            gsap.to(r, {
                                x: s,
                                y: o,
                                rotate: -4
                            })
                        }),
                    e.addEventListener("mouseleave", () => {
                        e.classList.contains("is-hover") && e.classList.remove("is-hover")
                    })
            });
        </script>
    </body>

</html>
