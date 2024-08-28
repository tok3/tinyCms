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
                                                <li class="breadcrumb-item active" aria-current="page">Dropdown</li>
                                            </ol>
                                        </div>
                                    </nav>
                                    <h1 class="mb-0 display-4">
                                        Dropdown Menu
                                    </h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="position-relative">
                <div class="container py-9 py-lg-11">
                    <div class="d-flex align-items-center mb-5">
                        <h6 class="mb-0 flex-grow-0 pe-3">Basic example</h6>
                        <div class="flex-grow-1 pb-1 border-bottom"></div>
                    </div>
                    <!--section-heading-->
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Dropdown button
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="{{ URL::asset('#') }}">Action</a>
                            <a class="dropdown-item" href="{{ URL::asset('#') }}">Another action</a>
                            <a class="dropdown-item" href="{{ URL::asset('#') }}">Something else here</a>
                        </div>
                    </div>
                </div>
            </section>
            <section class="bg-body-tertiary position-relative">
                <div class="container py-6 py-lg-11">
                    <div class="d-flex align-items-center mb-5">
                        <h6 class="mb-0 flex-grow-0 pe-3">Split button</h6>
                        <div class="flex-grow-1 pb-1 border-bottom"></div>
                    </div>
                    <!--section-heading-->
                    <!-- Example split danger button -->
                    <div class="btn-group">
                        <button type="button" class="btn btn-danger">Action</button>
                        <button type="button" class="btn btn-danger dropdown-toggle dropdown-toggle-split"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="{{ URL::asset('#') }}">Action</a>
                            <a class="dropdown-item" href="{{ URL::asset('#') }}">Another action</a>
                            <a class="dropdown-item" href="{{ URL::asset('#') }}">Something else here</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ URL::asset('#') }}">Separated link</a>
                        </div>
                    </div>
                </div>
            </section>
            <section class="position-relative">
                <div class="container py-6 py-lg-11">
                    <div class="d-flex align-items-center mb-5">
                        <h6 class="mb-0 flex-grow-0 pe-3">Dropup</h6>
                        <div class="flex-grow-1 pb-1 border-bottom"></div>
                    </div>
                    <!--section-heading-->
                    <!-- Default dropup button -->
                    <div class="btn-group dropup">
                        <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            Dropup
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="{{ URL::asset('#') }}">Action</a>
                            <a class="dropdown-item" href="{{ URL::asset('#') }}">Another action</a>
                            <a class="dropdown-item" href="{{ URL::asset('#') }}">Something else here</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ URL::asset('#') }}">Separated link</a>
                        </div>
                    </div>

                    <!-- Split dropup button -->
                    <div class="btn-group dropup">
                        <button type="button" class="btn btn-secondary">
                            Split dropup
                        </button>
                        <button type="button" class="btn btn-secondary dropdown-toggle dropdown-toggle-split"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="{{ URL::asset('#') }}">Action</a>
                            <a class="dropdown-item" href="{{ URL::asset('#') }}">Another action</a>
                            <a class="dropdown-item" href="{{ URL::asset('#') }}">Something else here</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ URL::asset('#') }}">Separated link</a>
                        </div>
                    </div>
                </div>
            </section>
            <section class="bg-body-tertiary position-relative">
                <div class="container py-6 py-lg-11">
                    <div class="d-flex align-items-center mb-5">
                        <h6 class="mb-0 flex-grow-0 pe-3">Dropend</h6>
                        <div class="flex-grow-1 pb-1 border-bottom"></div>
                    </div>
                    <!--section-heading-->
                    <!-- Default dropup button -->
                    <div class="btn-group dropend">
                        <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            Dropend
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="{{ URL::asset('#') }}">Action</a>
                            <a class="dropdown-item" href="{{ URL::asset('#') }}">Another action</a>
                            <a class="dropdown-item" href="{{ URL::asset('#') }}">Something else here</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ URL::asset('#') }}">Separated link</a>
                        </div>
                    </div>

                    <!-- Split dropup button -->
                    <div class="btn-group dropend">
                        <button type="button" class="btn btn-secondary">
                            Split dropend
                        </button>
                        <button type="button" class="btn btn-secondary dropdown-toggle dropdown-toggle-split"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="{{ URL::asset('#') }}">Action</a>
                            <a class="dropdown-item" href="{{ URL::asset('#') }}">Another action</a>
                            <a class="dropdown-item" href="{{ URL::asset('#') }}">Something else here</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ URL::asset('#') }}">Separated link</a>
                        </div>
                    </div>
                </div>
            </section>
            <section class="position-relative">
                <div class="container py-6 py-lg-11">
                    <div class="d-flex align-items-center mb-5">
                        <h6 class="mb-0 flex-grow-0 pe-3">Dropstart</h6>
                        <div class="flex-grow-1 pb-1 border-bottom"></div>
                    </div>
                    <!--section-heading-->
                    <!-- Default dropup button -->
                    <div class="text-end">
                        <div class="btn-group dropstart">
                            <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                Dropstart
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{ URL::asset('#') }}">Action</a>
                                <a class="dropdown-item" href="{{ URL::asset('#') }}">Another action</a>
                                <a class="dropdown-item" href="{{ URL::asset('#') }}">Something else here</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ URL::asset('#') }}">Separated link</a>
                            </div>
                        </div>

                        <!-- Split dropup button -->
                        <div class="btn-group dropstart">
                            <button type="button" class="btn btn-secondary">
                                Split dropstart
                            </button>
                            <button type="button" class="btn btn-secondary dropdown-toggle dropdown-toggle-split"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{ URL::asset('#') }}">Action</a>
                                <a class="dropdown-item" href="{{ URL::asset('#') }}">Another action</a>
                                <a class="dropdown-item" href="{{ URL::asset('#') }}">Something else here</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ URL::asset('#') }}">Separated link</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="bg-body-tertiary position-relative">
                <div class="container py-6 py-lg-11">
                    <div class="d-flex align-items-center mb-5">
                        <h6 class="mb-0 flex-grow-0 pe-3">Dropdown auto close false</h6>
                        <div class="flex-grow-1 pb-1 border-bottom"></div>
                    </div>
                    <!--section-heading-->
                    <!-- Default dropup button -->
                    <div class="text-start">
                        <div class="btn-group dropdown">
                            <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown"
                                data-bs-auto-close="false" aria-expanded="false">
                                Dropdown auto close false
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{ URL::asset('#') }}">Action</a>
                                <a class="dropdown-item" href="{{ URL::asset('#') }}">Another action</a>
                                <a class="dropdown-item" href="{{ URL::asset('#') }}">Something else here</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ URL::asset('#') }}">Separated link</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="position-relative">
                <div class="container py-6 py-lg-11">
                    <div class="d-flex align-items-center mb-5">
                        <h6 class="mb-0 flex-grow-0 pe-3">Dropdown Close on outside click</h6>
                        <div class="flex-grow-1 pb-1 border-bottom"></div>
                    </div>
                    <!--section-heading-->
                    <!-- Default dropup button -->
                    <div class="text-start">
                        <div class="btn-group dropdown">
                            <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown"
                                data-bs-auto-close="outside" aria-expanded="false">
                                Dropdown Close on outside click
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{ URL::asset('#') }}">Action</a>
                                <a class="dropdown-item" href="{{ URL::asset('#') }}">Another action</a>
                                <a class="dropdown-item" href="{{ URL::asset('#') }}">Something else here</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ URL::asset('#') }}">Separated link</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="bg-body-tertiary position-relative">
                <div class="container py-6 py-lg-11">
                    <div class="d-flex align-items-center mb-5">
                        <h6 class="mb-0 flex-grow-0 pe-3">Dropdown Multilevel</h6>
                        <div class="flex-grow-1 pb-1 border-bottom"></div>
                    </div>
                    <!--section-heading-->
                    <!-- Default dropup button -->
                    <div class="text-start">
                        <div class="btn-group dropdown">
                            <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown"
                                data-bs-auto-close="outside" aria-expanded="false">
                                Dropdown Multilevel
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{ URL::asset('#') }}">Another action</a>
                                <div class="dropend">
                                    <a class="dropdown-item dropdown-toggle" href="{{ URL::asset('#') }}" data-bs-toggle="dropdown"
                                        aria-expanded="false" data-bs-auto-close="outside">Multilevel 2</a>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{ URL::asset('#') }}">Another item</a>
                                        <div class="dropend">
                                            <a class="dropdown-item dropdown-toggle" href="{{ URL::asset('#') }}" data-bs-toggle="dropdown"
                                                aria-expanded="false" data-bs-auto-close="outside">Multilevel 3</a>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="{{ URL::asset('#') }}">Something else here</a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item" href="{{ URL::asset('#') }}">Separated link</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <a class="dropdown-item" href="{{ URL::asset('#') }}">Something else here</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ URL::asset('#') }}">Separated link</a>
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
