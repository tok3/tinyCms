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
                                                <li class="breadcrumb-item active" aria-current="page">Lists</li>
                                            </ol>
                                        </div>
                                    </nav>
                                    <h1 class="mb-0 display-4">
                                        List styles
                                    </h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>


            <section class="position-relative" id="next">
                <div class="container py-9 py-lg-11 position-relative z-1">
                    <div class="row">
                        <div class="col-lg-8 mx-auto">
                            <div class="d-flex align-items-center justify-content-center mb-4">
                                <h6 class="mb-0 me-2 me-lg-4">List unstyled</h6>
                                <span class="border-top d-block flex-grow-1"></span>
                            </div>
                            <div class="row">
                                <div class="col-md-4 mb-4 mb-md-0">
                                    <ul class="list-unstyled">
                                        <li class="mb-2">Free delivery</li>
                                        <li class="mb-2">Free returns</li>
                                        <li class="mb-2">Secure payments</li>
                                        <li class="">100% original</li>
                                    </ul>
                                </div>
                                <div class="col-md-4 mb-4 mb-md-0">
                                    <ul class="list-unstyled">
                                        <li class="mb-2"><i class="me-2 bx bx-check"></i>Free delivery</li>
                                        <li class="mb-2"><i class="me-2 bx bx-check"></i>Free returns</li>
                                        <li class="mb-2"><i class="me-2 bx bx-check"></i>Secure payments</li>
                                        <li class=""><i class="me-2 bx bx-check"></i>100% original</li>
                                    </ul>
                                </div>
                                <div class="col-md-4">
                                    <ul class="list-unstyled">
                                        <li class="mb-2">
                                            <a href="{{ URL::asset('#') }}" class="link-hover-move-arrow">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 13 9"
                                                    style=" transform: rotate(-90deg);">
                                                    <path fill="currentColor"
                                                        d="M12.25 2.30062L10.8988 0.949371L6.5 5.33854L2.10125 0.949371L0.75 2.30062L6.5 8.05062L12.25 2.30062Z">
                                                    </path>
                                                </svg>
                                                About us
                                            </a>
                                        </li>
                                        <li class="mb-2">
                                            <a href="{{ URL::asset('#') }}" class="link-hover-move-arrow">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 13 9"
                                                    style=" transform: rotate(-90deg);">
                                                    <path fill="currentColor"
                                                        d="M12.25 2.30062L10.8988 0.949371L6.5 5.33854L2.10125 0.949371L0.75 2.30062L6.5 8.05062L12.25 2.30062Z">
                                                    </path>
                                                </svg>
                                                Customers
                                            </a>
                                        </li>
                                        <li class="mb-2">
                                            <a href="{{ URL::asset('#') }}" class="link-hover-move-arrow">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 13 9"
                                                    style=" transform: rotate(-90deg);">
                                                    <path fill="currentColor"
                                                        d="M12.25 2.30062L10.8988 0.949371L6.5 5.33854L2.10125 0.949371L0.75 2.30062L6.5 8.05062L12.25 2.30062Z">
                                                    </path>
                                                </svg>
                                                Products
                                            </a>
                                        </li>
                                        <li class="">
                                            <a href="" class="link-hover-move-arrow">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 13 9"
                                                    style=" transform: rotate(-90deg);">
                                                    <path fill="currentColor"
                                                        d="M12.25 2.30062L10.8988 0.949371L6.5 5.33854L2.10125 0.949371L0.75 2.30062L6.5 8.05062L12.25 2.30062Z">
                                                    </path>
                                                </svg>
                                                Resources
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <hr class="my-7 my-lg-11">
                            <div class="d-flex align-items-center justify-content-center mb-4">
                                <h6 class="mb-0 me-2 me-lg-4">List style types</h6>
                                <span class="border-top d-block flex-grow-1"></span>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <ul class="list-disc">
                                        <li class="mb-2">Free delivery</li>
                                        <li class="mb-2">Free returns</li>
                                        <li class="mb-2">Secure payments</li>
                                        <li class="">100% original</li>
                                    </ul>
                                </div>
                                <div class="col-sm-4">
                                    <ul class="list-circle">
                                        <li class="mb-2">Free delivery</li>
                                        <li class="mb-2">Free returns</li>
                                        <li class="mb-2">Secure payments</li>
                                        <li class="">100% original</li>
                                    </ul>
                                </div>
                            </div>

                            <hr class="my-7 my-lg-11">
                            <div class="d-flex align-items-center justify-content-center mb-4">
                                <h6 class="mb-0 me-2 me-lg-4">List group with active and disabled items</h6>
                                <span class="border-top d-block flex-grow-1"></span>
                            </div>
                            <ul class="list-group">
                                <li class="list-group-item">An item</li>
                                <li class="list-group-item">A second item</li>
                                <li class="list-group-item active">An active item</li>
                                <li class="list-group-item">A fourth item</li>
                                <li class="list-group-item disabled">A disabled one</li>
                            </ul>
                            <hr class="my-7 my-lg-11">
                            <div class="d-flex align-items-center justify-content-center mb-4">
                                <h6 class="mb-0 me-2 me-lg-4">Users list</h6>
                                <span class="border-top d-block flex-grow-1"></span>
                            </div>
                            <ul class="list-group">
                                <li class="list-group-item py-3">
                                    <div class="d-flex align-items-start">
                                        <div class="me-3 me-lg-4">
                                            <img src="{{ URL::asset('assets/img/avatar/7.jpg') }}" alt=""
                                                class="avatar rounded-circle shadow">
                                        </div>
                                        <div class="flex-grow-1">
                                            <div class="d-sm-flex align-items-center">
                                                <div class="mb-3 mb-sm-0 flex-grow-1">
                                                    <a class="fw-medium fs-6" href="{{ URL::asset('#!') }}">Konsta Peura</a>
                                                    <p class="mb-0 small">Full stack Developer</p>
                                                </div>
                                                <div class="">
                                                    <div class="d-flex align-items-center">
                                                        <a href="{{ URL::asset('#!') }}"
                                                            class="btn btn-sm btn-secondary shadow-sm"><i
                                                                class="me-1 bx bx-check fs-6 lh-1"></i>Follow</a>
                                                        <a class="link-danger ms-2 ms-lg-3 small" href="{{ URL::asset('#!') }}"><i
                                                                class="me-1 bx bx-x fs-6 lh-1 align-middle"></i>Remove</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item py-3">
                                    <div class="d-flex align-items-start">
                                        <div class="me-3 me-lg-4">
                                            <img src="{{ URL::asset('assets/img/avatar/8.jpg') }}" alt=""
                                                class="avatar rounded-circle shadow">
                                        </div>
                                        <div class="flex-grow-1">
                                            <div class="d-sm-flex align-items-center">
                                                <div class="mb-3 mb-sm-0 flex-grow-1">
                                                    <a class="fw-medium fs-6" href="{{ URL::asset('#!') }}">Azul Baldwin</a>
                                                    <p class="mb-0 small">Business entrepreneur</p>
                                                </div>
                                                <div class="">
                                                    <div class="d-flex align-items-center">
                                                        <a href="{{ URL::asset('#!') }}"
                                                            class="btn btn-sm btn-secondary shadow-sm"><i
                                                                class="me-1 bx bx-check fs-6 lh-1"></i>Follow</a>
                                                        <a class="link-danger ms-2 ms-lg-3 small" href="{{ URL::asset('#!') }}"><i
                                                                class="me-1 bx bx-x fs-6 lh-1 align-middle"></i>Remove</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item py-3">
                                    <div class="d-flex align-items-start">
                                        <div class="me-3 me-lg-4">
                                            <img src="{{ URL::asset('assets/img/avatar/9.jpg') }}" alt=""
                                                class="avatar rounded-circle shadow">
                                        </div>
                                        <div class="flex-grow-1">
                                            <div class="d-sm-flex align-items-center">
                                                <div class="mb-3 mb-sm-0 flex-grow-1">
                                                    <a class="fw-medium fs-6" href="{{ URL::asset('#!') }}">Spencer Horton</a>
                                                    <p class="mb-0 small">Interactive designer</p>
                                                </div>
                                                <div class="">
                                                    <div class="d-flex align-items-center">
                                                        <a href="{{ URL::asset('#!') }}"
                                                            class="btn btn-sm btn-secondary shadow-sm"><i
                                                                class="me-1 bx bx-check fs-6 lh-1"></i>Follow</a>
                                                        <a class="link-danger ms-2 ms-lg-3 small" href="{{ URL::asset('#!') }}"><i
                                                                class="me-1 bx bx-x fs-6 lh-1 align-middle"></i>Remove</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            <hr class="my-7 my-lg-11">
                            <div class="d-flex align-items-center justify-content-center mb-4">
                                <h6 class="mb-0 me-2 me-lg-4">List Group Flush</h6>
                                <span class="border-top d-block flex-grow-1"></span>
                            </div>
                            <div class="list-group list-group-flush">
                                <div class="list-group-item px-0">
                                    <p class="mb-0">
                                        Lorem ipsum is placeholder text commonly used in the graphic, print, and
                                        publishing industries for previewing layouts and visual mockups.
                                    </p>
                                </div>
                                <div class="list-group-item px-0">
                                    <p class="mb-0">
                                        Lorem ipsum is placeholder text commonly used in the graphic, print, and
                                        publishing industries for previewing layouts and visual mockups.
                                    </p>
                                </div>
                                <div class="list-group-item px-0">
                                    <p class="mb-0">
                                        Lorem ipsum is placeholder text commonly used in the graphic, print, and
                                        publishing industries for previewing layouts and visual mockups.
                                    </p>
                                </div>
                                <div class="list-group-item px-0">
                                    <p class="mb-0">
                                        Lorem ipsum is placeholder text commonly used in the graphic, print, and
                                        publishing industries for previewing layouts and visual mockups.
                                    </p>
                                </div>
                            </div>
                            <hr class="my-7 my-lg-11">
                            <div class="d-flex align-items-center justify-content-center mb-4">
                                <h6 class="mb-0 me-2 me-lg-4">List Group Action</h6>
                                <span class="border-top d-block flex-grow-1"></span>
                            </div>
                            <div class="list-group">
                                <!--List group item-->
                                <a href="{{ URL::asset('#!') }}" class="list-group-item active list-group-item-action py-3">
                                    <h6 class="mb-0 text-reset">General Info</h6>
                                    <p class="mb-0">
                                        Lorem ipsum is placeholder text commonly used in the graphic, print, and
                                        publishing industries for previewing layouts and visual mockups.
                                    </p>
                                </a>
                                <!--List group item-->
                                <a href="{{ URL::asset('#!') }}" class="list-group-item list-group-item-action py-3">
                                    <h6 class="mb-0">Account details</h6>
                                    <p class="mb-0 text-reset">
                                        Lorem ipsum is placeholder text commonly used in the graphic, print, and
                                        publishing industries for previewing layouts and visual mockups.
                                    </p>
                                </a>
                                <!--List group item-->
                                <a href="{{ URL::asset('#!') }}" class="list-group-item list-group-item-action py-3">
                                    <h6 class="mb-0 text-reset">Full Address</h6>
                                    <p class="mb-0">
                                        Lorem ipsum is placeholder text commonly used in the graphic, print, and
                                        publishing industries for previewing layouts and visual mockups.
                                    </p>
                                </a>
                            </div>
                            <hr class="my-7 my-lg-11">
                            <div class="d-flex align-items-center justify-content-center mb-4">
                                <h6 class="mb-0 me-2 me-lg-4">Comments list</h6>
                                <span class="border-top d-block flex-grow-1"></span>
                            </div>
                            <div class="bg-white list-group">
                                <div class="d-flex p-4 list-group-item">
                                    <div class="me-3">
                                        <img src="{{ URL::asset('assets/img/avatar/6.jpg') }}" alt="" class="avatar rounded-circle">
                                    </div>
                                    <div class="flex-grow-1">
                                        <div class="d-flex mb-2 justify-content-between">
                                            <div class="d-flex align-items-center">
                                                <h6 class="mb-0 me-3">John Doe</h6>
                                                <small class="text-body-tertiary">13
                                                    March</small>
                                            </div>
                                            <div>
                                                <a href="{{ URL::asset('#!') }}"
                                                    class="text-decoration-underline mb-0 small">Reply</a>
                                            </div>
                                        </div>
                                        <p class="mb-0">
                                            It is a long established fact that a reader will the
                                            readable content of a page when looking at its layout of a page when looking
                                            at its layout.
                                        </p>
                                        <ol class="list-unstyled mb-0 mt-5">
                                            <li class="d-flex mb-5">
                                                <div class="me-3">
                                                    <img src="{{ URL::asset('assets/img/avatar/4.jpg') }}" alt=""
                                                        class="avatar sm rounded-circle">
                                                </div>
                                                <div class="flex-grow-1">
                                                    <div class="d-flex mb-1 justify-content-between">
                                                        <div class="d-flex align-items-center">
                                                            <h6 class="mb-0 me-3">Emily Doe</h6>
                                                            <small class="text-body-tertiary">16 March</small>
                                                        </div>
                                                        <div>
                                                            <a href="{{ URL::asset('#!') }}"
                                                                class="text-decoration-underline mb-0 small">Reply</a>
                                                        </div>
                                                    </div>
                                                    <p class="mb-0">
                                                        It is a long fact that a reader will be distracted by the
                                                        readable content of a page when looking at its layout of a page
                                                        when looking at its layout.
                                                    </p>
                                                </div>
                                            </li>
                                            <li class="d-flex">
                                                <div class="me-3">
                                                    <img src="{{ URL::asset('assets/img/avatar/8.jpg') }}" alt=""
                                                        class="avatar sm rounded-circle">
                                                </div>
                                                <div class="flex-grow-1">
                                                    <div class="d-flex mb-1 justify-content-between">
                                                        <div class="d-flex align-items-center">
                                                            <h6 class="mb-0 me-3">Mark Smith</h6>
                                                            <small class="text-body-tertiary">21
                                                                March</small>
                                                        </div>
                                                        <div>
                                                            <a href="{{ URL::asset('#!') }}"
                                                                class="text-decoration-underline mb-0 small">Reply</a>
                                                        </div>
                                                    </div>
                                                    <p class="mb-0">
                                                        It is a long fact that a reader will be distracted by the
                                                        readable content of a page when looking at its layout of a page
                                                        when looking at its layout.
                                                    </p>
                                                </div>
                                            </li>
                                        </ol>
                                    </div>
                                </div>
                                <div class="d-flex p-4 list-group-item">
                                    <div class="me-3">
                                        <img src="{{ URL::asset('assets/img/avatar/2.jpg') }}" alt="" class="avatar rounded-circle">
                                    </div>
                                    <div class="flex-grow-1">
                                        <div class="d-flex mb-2 justify-content-between">
                                            <div class="d-flex align-items-center">
                                                <h6 class="mb-0 me-3">Nikita Miller</h6>
                                                <small class="text-body-tertiary">04
                                                    July</small>
                                            </div>
                                            <div>
                                                <a href="{{ URL::asset('#!') }}"
                                                    class="text-decoration-underline mb-0 small">Reply</a>
                                            </div>
                                        </div>
                                        <p class="mb-0">
                                            It is a long established fact that a reader will be distracted by the
                                            readable content of a page when looking at its layout of a page when looking
                                            at its layout.
                                        </p>
                                    </div>
                                </div>
                                <div class="d-flex p-4 list-group-item">
                                    <div class="me-3">
                                        <img src="{{ URL::asset('assets/img/avatar/7.jpg') }}" alt="" class="avatar rounded-circle">
                                    </div>
                                    <div class="flex-grow-1">
                                        <div class="d-flex mb-2 justify-content-between">
                                            <div class="d-flex align-items-center">
                                                <h6 class="mb-0 me-3">Andrew Tye</h6>
                                                <small class="text-body-tertiary">29
                                                    June</small>
                                            </div>
                                            <div>
                                                <a href="{{ URL::asset('#!') }}"
                                                    class="text-decoration-underline mb-0 small">Reply</a>
                                            </div>
                                        </div>
                                        <p class="mb-0">
                                            It is a long established fact that a reader will be distracted by the
                                            readable content of a page when looking at its layout of a page when looking
                                            at its layout.
                                        </p>
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
