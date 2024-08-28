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
                                                <li class="breadcrumb-item active" aria-current="page">Navbar</li>
                                            </ol>
                                        </div>
                                    </nav>
                                    <h1 class="mb-0 display-4">
                                        Navbar
                                    </h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>


            <section class="position-relative shadow pb-9 pb-lg-11">
                <!--Navbar demo heading-->
                <div class="container pt-9 pt-lg-11">
                    <div class="d-flex align-items-center mb-4">
                        <h6 class="mb-0 me-4">Navbar Basic</h6>
                        <hr class="my-0 bg-primary flex-grow-1">
                    </div>
                </div>

                <!--Navbar demo start-->
                <nav class="navbar navbar-expand-lg navbar-light bg-body-tertiary">
                    <div class="container position-relative">
                        <a class="navbar-brand" href="{{ URL::asset('index.html') }}">
                            <img src="{{ URL::asset('assets/img/logo/logo.svg') }}" alt="" class="img-fluid">
                        </a>

                        <div class="d-flex align-items-center navbar-no-collapse-items order-lg-last">
                            <button class="navbar-toggler order-last" type="button" data-bs-toggle="collapse"
                                data-bs-target="#navbar-demo-1" aria-controls="navbar-demo-1" aria-expanded="false"
                                aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon">
                                    <i></i>
                                </span>
                            </button>
                        </div>
                        <div class="collapse navbar-collapse" id="navbar-demo-1">
                            <ul class="navbar-nav ms-auto">
                                <li class="nav-item me-3">
                                    <a href="{{ URL::asset('#') }}" class="nav-link">Home</a>
                                </li>
                                <li class="nav-item me-3">
                                    <a href="{{ URL::asset('#') }}" class="nav-link">About us</a>
                                </li>
                                <li class="nav-item me-3">
                                    <a href="{{ URL::asset('#') }}" class="nav-link">Projects</a>
                                </li>
                                <li class="nav-item me-3">
                                    <a href="{{ URL::asset('#') }}" class="nav-link">Services</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ URL::asset('#') }}" class="nav-link">Contact</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </section>
            <section class="position-relative shadow pb-9 pb-lg-11">
                <!--Navbar demo heading-->
                <div class="container pt-9 pt-lg-11">
                    <div class="d-flex align-items-center mb-4">
                        <h6 class="mb-0 me-4">Navbar + Action button</h6>
                        <hr class="my-0 bg-primary flex-grow-1">
                    </div>
                </div>

                <!--Navbar demo start-->
                <nav class="navbar navbar-expand-lg navbar-light bg-body-tertiary">
                    <div class="container position-relative">
                        <a class="navbar-brand" href="{{ URL::asset('index.html') }}">
                            <img src="{{ URL::asset('assets/img/logo/logo.svg') }}" alt="" class="img-fluid">
                        </a>

                        <div class="d-flex align-items-center navbar-no-collapse-items order-lg-last">
                            <button class="navbar-toggler order-last" type="button" data-bs-toggle="collapse"
                                data-bs-target="#navbar-demo-2" aria-controls="navbar-demo-2" aria-expanded="false"
                                aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon">
                                    <i></i>
                                </span>
                            </button>
                            <div class="nav-item me-3 me-lg-0">
                                <a href="{{ URL::asset('#!') }}" class="btn btn-primary btn-sm">Get started</a>
                            </div>
                        </div>
                        <div class="collapse navbar-collapse" id="navbar-demo-2">
                            <ul class="navbar-nav mx-auto">
                                <li class="nav-item me-lg-3">
                                    <a href="{{ URL::asset('#!') }}" class="nav-link">Home</a>
                                </li>
                                <li class="nav-item me-lg-3">
                                    <a href="{{ URL::asset('#!') }}" class="nav-link">About us</a>
                                </li>
                                <li class="nav-item me-3">
                                    <a href="{{ URL::asset('#') }}" class="nav-link">Projects</a>
                                </li>
                                <li class="nav-item me-lg-3">
                                    <a href="{{ URL::asset('#!') }}" class="nav-link">Services</a>
                                </li>
                                <li class="nav-item me-lg-3">
                                    <a href="{{ URL::asset('#!') }}" class="nav-link">Contact</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </section>
            <section class="position-relative shadow pb-9 pb-lg-11">
                <!--Navbar demo heading-->
                <div class="container pt-9 pt-lg-11">
                    <div class="d-flex align-items-center mb-4">
                        <h6 class="mb-0 me-4">Navbar + Dropdown menu + Action button</h6>
                        <hr class="my-0 bg-primary flex-grow-1">
                    </div>
                </div>

                <!--Navbar demo start-->
                <nav class="navbar navbar-expand-lg navbar-light bg-body-tertiary">
                    <div class="container position-relative">
                        <a class="navbar-brand" href="{{ URL::asset('index.html') }}">
                            <img src="{{ URL::asset('assets/img/logo/logo.svg') }}" alt="" class="img-fluid">
                        </a>

                        <div class="d-flex align-items-center navbar-no-collapse-items order-lg-last">
                            <button class="navbar-toggler order-last" type="button" data-bs-toggle="collapse"
                                data-bs-target="#navbar-demo-3" aria-controls="navbar-demo-3" aria-expanded="false"
                                aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon">
                                    <i></i>
                                </span>
                            </button>
                            <div class="nav-item me-3 me-lg-0">
                                <a href="{{ URL::asset('#!') }}" class="btn btn-primary btn-sm">Get started</a>
                            </div>
                        </div>
                        <div class="collapse navbar-collapse" id="navbar-demo-3">
                            <ul class="navbar-nav mx-auto">
                                <li class="nav-item me-lg-3">
                                    <a href="{{ URL::asset('#!') }}" class="nav-link">Home</a>
                                </li>
                                <li class="nav-item me-lg-3">
                                    <a href="{{ URL::asset('#!') }}" class="nav-link">About us</a>
                                </li>
                                <li class="nav-item me-3">
                                    <a href="{{ URL::asset('#') }}" class="nav-link">Projects</a>
                                </li>
                                <li class="nav-item dropdown me-lg-3">
                                    <a href="{{ URL::asset('#') }}" data-bs-toggle="dropdown" aria-expanded="false" class="nav-link dropdown-toggle">
                                        Services
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a href="{{ URL::asset('#!') }}" class="dropdown-item">UI UX design</a>
                                        <a href="{{ URL::asset('#!') }}" class="dropdown-item">Motion & print design</a>
                                        <a href="{{ URL::asset('#!') }}" class="dropdown-item">Web development</a>
                                        <a href="{{ URL::asset('#!') }}" class="dropdown-item">Business Consultant</a>
                                        <a href="{{ URL::asset('#!') }}" class="dropdown-item">Ios / Android Development</a>
                                    </div>
                                </li>
                                <li class="nav-item me-lg-3">
                                    <a href="{{ URL::asset('#!') }}" class="nav-link">Contact</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
                <div class="pt-5">
                    <div class="container mb-3">
                        <p>Multi level dropdown navbar</p>
                    </div>
                    <!--Navbar demo start-->
                    <nav class="navbar navbar-expand-lg navbar-light bg-body-tertiary">
                        <div class="container position-relative">
                            <a class="navbar-brand" href="{{ URL::asset('index.html') }}">
                                <img src="{{ URL::asset('assets/img/logo/logo.svg') }}" alt="" class="img-fluid">
                            </a>

                            <div class="d-flex align-items-center navbar-no-collapse-items order-lg-last">
                                <button class="navbar-toggler order-last" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#navbar-demo-3b" aria-controls="navbar-demo-3b"
                                    aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon">
                                        <i></i>
                                    </span>
                                </button>
                                <div class="nav-item me-3 me-lg-0">
                                    <a href="{{ URL::asset('#!') }}" class="btn btn-primary btn-sm">Get started</a>
                                </div>
                            </div>
                            <div class="collapse navbar-collapse" id="navbar-demo-3b">
                                <ul class="navbar-nav mx-auto">
                                    <li class="nav-item me-lg-3">
                                        <a href="{{ URL::asset('#!') }}" class="nav-link">Home</a>
                                    </li>
                                    <li class="nav-item me-lg-3">
                                        <a href="{{ URL::asset('#!') }}" class="nav-link">About us</a>
                                    </li>
                                    <li class="nav-item me-3">
                                        <a href="{{ URL::asset('#') }}" class="nav-link">Projects</a>
                                    </li>
                                    <li class="nav-item dropdown me-lg-3">
                                        <a href="{{ URL::asset('#') }}" data-bs-toggle="dropdown" data-bs-auto-close="outside"
                                            aria-expanded="false" class="nav-link dropdown-toggle">
                                            Services
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a href="{{ URL::asset('#!') }}" class="dropdown-item">UI UX design</a>
                                            <a href="{{ URL::asset('#!') }}" class="dropdown-item">Motion & print design</a>
                                            <div class="dropstart">
                                                <a href="{{ URL::asset('#') }}" class="dropdown-item dropdown-toggle"
                                                    data-bs-toggle="dropdown">Development</a>
                                                <div class="dropdown-menu">
                                                    <a href="{{ URL::asset('#!') }}" class="dropdown-item">Web development</a>
                                                    <a href="{{ URL::asset('#!') }}" class="dropdown-item">IOS App development</a>
                                                    <a href="{{ URL::asset('#!') }}" class="dropdown-item">Android App development</a>
                                                    <a href="{{ URL::asset('#!') }}" class="dropdown-item">E-commerce development</a>
                                                </div>
                                            </div>
                                            <a href="{{ URL::asset('#!') }}" class="dropdown-item">Business Consultant</a>
                                        </div>
                                    </li>
                                    <li class="nav-item me-lg-3">
                                        <a href="{{ URL::asset('#!') }}" class="nav-link">Contact</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                </div>
            </section>
            <section class="position-relative shadow pb-9 pb-lg-11">
                <!--Navbar demo heading-->
                <div class="container pt-9 pt-lg-11">
                    <div class="d-flex align-items-center mb-4">
                        <h6 class="mb-0 me-4">Navbar + Action button + Social icons</h6>
                        <hr class="my-0 bg-primary flex-grow-1">
                    </div>
                </div>

                <!--Navbar demo start-->
                <nav class="navbar navbar-expand-lg navbar-light bg-body-tertiary">
                    <div class="container position-relative">
                        <a class="navbar-brand" href="{{ URL::asset('index.html') }}">
                            <img src="{{ URL::asset('assets/img/logo/logo.svg') }}" alt="" class="img-fluid navbar-brand-light">
                            <img src="{{ URL::asset('assets/img/logo/logo-white.svg') }}" alt="" class="img-fluid navbar-brand-dark">
                        </a>

                        <div class="d-flex align-items-center navbar-no-collapse-items order-lg-last">
                            <button class="navbar-toggler order-last" type="button" data-bs-toggle="collapse"
                                data-bs-target="#navbar-demo-4" aria-controls="navbar-demo-4" aria-expanded="false"
                                aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon">
                                    <i></i>
                                </span>
                            </button>
                            <div class="nav-item me-3 me-lg-4">
                                <a href="{{ URL::asset('#!') }}" class="btn btn-gray-200 p-0 width-4x height-4x flex-center rounded-circle">
                                    <i class="bx bxl-facebook"></i>
                                </a>
                                <a href="{{ URL::asset('#!') }}"
                                    class="btn btn-gray-200 p-0 mx-1 mx-lg-2 width-4x height-4x flex-center rounded-circle">
                                    <i class="bx bxl-twitter"></i>
                                </a>
                                <a href="{{ URL::asset('#!') }}" class="btn btn-gray-200 p-0 width-4x height-4x flex-center rounded-circle">
                                    <i class="bx bxl-instagram"></i>
                                </a>
                            </div>

                            <div class="nav-item me-3 me-lg-0">
                                <a href="{{ URL::asset('#!') }}" class="btn btn-primary btn-sm">Get started</a>
                            </div>
                        </div>
                        <div class="collapse navbar-collapse" id="navbar-demo-4">
                            <ul class="navbar-nav mx-auto">
                                <li class="nav-item me-lg-3">
                                    <a href="{{ URL::asset('#!') }}" class="nav-link">Home</a>
                                </li>
                                <li class="nav-item me-lg-3">
                                    <a href="{{ URL::asset('#!') }}" class="nav-link">About us</a>
                                </li>
                                <li class="nav-item me-3">
                                    <a href="{{ URL::asset('#') }}" class="nav-link">Projects</a>
                                </li>
                                <li class="nav-item me-lg-3">
                                    <a href="{{ URL::asset('#!') }}" class="nav-link">Services</a>
                                </li>
                                <li class="nav-item me-lg-3">
                                    <a href="{{ URL::asset('#!') }}" class="nav-link">Contact</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </section>
            <section class="position-relative shadow pb-9 pb-lg-11">
                <!--Navbar demo heading-->
                <div class="container pt-9 pt-lg-11">
                    <div class="d-flex align-items-center mb-4">
                        <h6 class="mb-0 me-4">Navbar Center logo</h6>
                        <hr class="my-0 bg-primary flex-grow-1">
                    </div>
                </div>

                <!--Navbar demo start-->
                <header class="header-center-logo">
                    <nav class="navbar navbar-expand-lg navbar-light bg-body-tertiary">
                        <div class="container position-relative">
                            <a class="navbar-brand" href="{{ URL::asset('index.html') }}">
                                <img src="{{ URL::asset('assets/img/logo/logo.svg') }}" alt="" class="img-fluid navbar-brand-light">
                                <img src="{{ URL::asset('assets/img/logo/logo-white.svg') }}" alt="" class="img-fluid navbar-brand-dark">
                            </a>

                            <div class="d-flex align-items-center navbar-no-collapse-items order-lg-last">
                                <button class="navbar-toggler order-last" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#navbar-demo-5" aria-controls="navbar-demo-5" aria-expanded="false"
                                    aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon">
                                        <i></i>
                                    </span>
                                </button>
                            </div>
                            <div class="collapse navbar-collapse" id="navbar-demo-5">
                                <ul class="navbar-nav me-auto">
                                    <li class="nav-item me-3">
                                        <a href="{{ URL::asset('#') }}" class="nav-link">Home</a>
                                    </li>
                                    <li class="nav-item me-3">
                                        <a href="{{ URL::asset('#') }}" class="nav-link">About us</a>
                                    </li>
                                    <li class="nav-item me-3">
                                        <a href="{{ URL::asset('#') }}" class="nav-link">Projects</a>
                                    </li>
                                </ul>
                                <ul class="navbar-nav ms-auto">
                                    <li class="nav-item me-3">
                                        <a href="{{ URL::asset('#') }}" class="nav-link">Services</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ URL::asset('#') }}" class="nav-link">Contact</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                </header>

            </section>
            <section class="position-relative bg-dark pb-9 pb-lg-11">
                <!--Navbar demo heading-->
                <div class="container text-white pt-9 pt-lg-11">
                    <div class="d-flex align-items-center mb-4">
                        <h6 class="mb-0 me-4">Navbar Dark</h6>
                        <hr class="my-0 bg-primary flex-grow-1">
                    </div>
                </div>

                <!--Navbar demo start-->
                <nav class="navbar navbar-expand-lg navbar-dark bg-gradient bg-secondary">
                    <div class="container position-relative">
                        <a class="navbar-brand" href="{{ URL::asset('index.html') }}">
                            <img src="{{ URL::asset('assets/img/logo/logo-white.svg') }}" alt="" class="img-fluid">
                        </a>

                        <div class="d-flex align-items-center navbar-no-collapse-items order-lg-last">
                            <button class="navbar-toggler order-last" type="button" data-bs-toggle="collapse"
                                data-bs-target="#navbar-demo-dark" aria-controls="navbar-demo-dark"
                                aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon">
                                    <i></i>
                                </span>
                            </button>
                        </div>
                        <div class="collapse navbar-collapse" id="navbar-demo-dark">
                            <ul class="navbar-nav ms-auto">
                                <li class="nav-item me-3">
                                    <a href="{{ URL::asset('#') }}" class="nav-link">Home</a>
                                </li>
                                <li class="nav-item me-3">
                                    <a href="{{ URL::asset('#') }}" class="nav-link">About us</a>
                                </li>
                                <li class="nav-item me-3">
                                    <a href="{{ URL::asset('#') }}" class="nav-link">Projects</a>
                                </li>
                                <li class="nav-item me-3">
                                    <a href="{{ URL::asset('#') }}" class="nav-link">Services</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ URL::asset('#') }}" class="nav-link">Contact</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>

            </section>
            <section class="bg-gradient-light position-relative">
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
