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
                                                <li class="breadcrumb-item active" aria-current="page">Modal</li>
                                            </ol>
                                        </div>
                                    </nav>
                                    <h1 class="mb-0 display-4">
                                        Modal
                                    </h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>


            <section class="position-relative" id="next">
                <div class="container py-9 py-lg-11">
                    <div class="row">
                        <div class="col-lg-10 mx-auto">
                            <div class="d-flex align-items-center mb-4">
                                <h6 class="me-3 mb-0">Modal demos</h6>
                                <div class="border-bottom flex-grow-1"></div>
                            </div>

                            <!--Modal button trigger-->
                            <a href="{{ URL::asset('#modalBasic') }}" data-bs-toggle="modal" aria-expanded="false"
                                class="btn btn-gray-200">Demo basic</a>
                            <br><br>
                            <!--Modal button trigger-->
                            <a href="{{ URL::asset('#modalForm') }}" data-bs-toggle="modal" aria-expanded="false"
                                class="btn btn-gray-200">Demo Form</a>
                            <br><br>
                            <!--Modal button trigger-->
                            <a href="{{ URL::asset('#modalNewsletter') }}" data-bs-toggle="modal" aria-expanded="false"
                                class="btn btn-gray-200">Demo Newsletter</a>
                            <br>
                            <hr class="my-7">
                            <a href="{{ URL::asset('https://getbootstrap.com/docs/5.3/components/modal/#how-it-works') }}" target="_blank"
                                class="link-underline">Explore modals</a>
                        </div>
                    </div>
                </div>



                <!--Modals start-->


                <!--Modal basic-->
                <div class="modal fade" id="modalBasic" tabindex="-1" aria-labelledby="modalBasicLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content border-0">
                            <div class="modal-header border-0 bg-body-tertiary">
                                <h5 class="modal-title">Modal title</h5>
                                <!--Close button-->
                                <button type="button"
                                    class="btn btn-gray-200 p-0 border-2 width-3x height-3x rounded-circle flex-center z-1"
                                    data-bs-dismiss="modal" aria-label="Close">
                                    <i class="bx bx-x fs-5"></i>
                                </button>
                            </div>
                            <div class="modal-body py-5 border-0">
                                <p>
                                    Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing
                                    industries for previewing layouts and visual mockups.
                                </p>
                                <p class="mb-0">
                                    Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing
                                    industries for previewing layouts and visual mockups.
                                </p>
                            </div>
                            <div class="modal-footer bg-body-tertiary border-0">
                                <button type="button" class="btn btn-gray-200 btn-sm"
                                    data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary btn-sm">Save changes</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!--Modal Form-->
                <div class="modal fade" id="modalForm" tabindex="-1" aria-labelledby="modalFormLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content border-0">
                            <div class="position-relative border-0 pe-4">
                                <button type="button"
                                    class="btn btn-gray-200 p-0 border-2 width-3x height-3x rounded-circle flex-center position-absolute end-0 top-0 mt-3 me-3 z-1"
                                    data-bs-dismiss="modal" aria-label="Close">
                                    <i class="bx bx-x fs-5"></i>
                                </button>
                            </div>
                            <div class="modal-body py-5 border-0">
                                <div class="px-3">

                                    <h2 class="mb-1 display-6">
                                        Welcome back!
                                    </h2>
                                    <p class="mb-4 text-body-secondary">
                                        Please Sign In with details...
                                    </p>
                                    <div class="position-relative">
                                        <div>
                                            <form>
                                                <div class="input-icon-group mb-3">
                                                    <span class="input-icon">
                                                        <i class="bx bx-envelope"></i>
                                                    </span>
                                                    <input type="email" class="form-control" autofocus=""
                                                        placeholder="Username">
                                                </div>
                                                <div class="input-icon-group mb-3">
                                                    <span class="input-icon">
                                                        <i class="bx bx-key"></i>
                                                    </span>
                                                    <input type="password" class="form-control" placeholder="Password">
                                                </div>
                                                <div class="mb-3 d-flex justify-content-between">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value=""
                                                            id="flexCheckDefault">
                                                        <label class="form-check-label" for="flexCheckDefault">
                                                            Remember me
                                                        </label>
                                                    </div>
                                                    <div>
                                                        <label class="text-end d-block small mb-0"><a href="{{ URL::asset('#') }}"
                                                                class="text-body-secondary link-decoration">Forget
                                                                Password?</a></label>
                                                    </div>
                                                </div>

                                                <div class="d-grid">
                                                    <button class="btn btn-primary" type="submit">
                                                        Sign in
                                                    </button>
                                                </div>
                                            </form>

                                            <!---->
                                            <p class="pt-4 text-body-secondary">
                                                Don’t have an account yet? <a href="{{ URL::asset('#') }}"
                                                    class="ms-2 text-dark fw-semibold link-underline">Sign Up</a>
                                            </p>
                                            <!--Divider-->
                                            <div class="d-flex align-items-center py-3">
                                                <span class="flex-grow-1 border-bottom pt-1"></span>
                                                <span
                                                    class="d-inline-flex flex-center lh-1 width-2x height-2x rounded-circle mx-2 text-mono">or</span>
                                                <span class="flex-grow-1 border-bottom pt-1"></span>
                                            </div>
                                            <div class="d-grid">
                                                <a href="{{ URL::asset('#!') }}"
                                                    class="d-flex hover-lift btn-gray-200 mb-2 btn position-relative flex-center">
                                                    <!--Main Icon-->
                                                    <div class="position-relative d-flex align-items-center">
                                                        <img src="{{ URL::asset('assets/img/brands/google.svg') }}" alt=""
                                                            class="width-2x me-2">
                                                        <span>sign in with google</span>
                                                    </div>
                                                </a>
                                                <a href="{{ URL::asset('#!') }}"
                                                    class="d-flex hover-lift btn-gray-200 btn position-relative flex-center">
                                                    <!--Main Icon-->
                                                    <div class="position-relative d-flex align-items-center">
                                                        <img src="{{ URL::asset('assets/img/brands/Facebook.svg') }}" alt=""
                                                            class="width-2x me-2">
                                                        <span>sign in with facebook</span>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!--Modal newsletter-->
                <div class="modal fade" id="modalNewsletter" tabindex="-1" aria-labelledby="modalNewsletterLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered">
                        <div class="modal-content border-0">
                            <div class="modal-body p-0 border-0">
                                <button type="button"
                                    class="btn btn-gray-200 p-0 border-2 width-3x height-3x rounded-circle flex-center position-absolute end-0 top-0 mt-3 me-3 z-1"
                                    data-bs-dismiss="modal" aria-label="Close">
                                    <i class="bx bx-x fs-5"></i>
                                </button>
                                <div class="d-md-flex row">
                                    <div class="col-md-6">
                                        <img src="{{ URL::asset('assets/img/960x900/1.jpg') }}" alt=""
                                            class="d-block rounded-top d-md-none img-fluid">
                                        <div
                                            class="d-none d-md-flex overflow-hidden bg-gradient-primary rounded-3 rounded-end-0 h-md-100 position-relative">
                                            <img src="{{ URL::asset('assets/img/960x900/1.jpg') }}" alt="" class="bg-image">
                                        </div>
                                    </div>
                                    <div class="col-md-6 h-100">
                                        <div class="h-100 py-7 py-lg-9 px-lg-5 px-4 position-relative">
                                            <h2 class="display-6 mb-2">
                                                Signup to Newsletter
                                            </h2>
                                            <p>Sign up now and get 25% of first order</p>
                                            <div class="position-relative">
                                                <div>
                                                    <form>
                                                        <div class="input-icon-group mb-3">
                                                            <span class="input-icon">
                                                              <i class="bx bx-user-circle"></i>
                                                            </span>
                                                            <input type="text" class="form-control" autofocus=""
                                                                placeholder="Your name">
                                                        </div>
                                                        <div class="input-icon-group mb-3">
                                                            <span class="input-icon">
                                                                <i class="bx bx-envelope"></i>
                                                            </span>
                                                            </span>
                                                            <input type="email" class="form-control"
                                                                placeholder="Your email id">
                                                        </div>

                                                        <div class="d-grid">
                                                            <button class="btn btn-primary" type="submit">
                                                                SignUp
                                                            </button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </section>
            <section class="bg-gradient bg-secondary text-white position-relative">
                <div class="container py-9 py-lg-11">
                    <div class="row align-items-center justify-content-center">
                        <div class="col-md-10 col-lg-8 col-xl-7 text-center mx-auto">
                            <h2 class="mb-3 display-4" data-aos="fade-up">
                                Build stunning websites
                            </h2>
                            <p class="mb-5 text-body-secondary px-lg-5" data-aos="fade-up" data-aos-delay="100">
                                Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing
                                industries for previewing layouts and visual mockups.
                            </p>
                            <div data-aos="fade-up">
                                <a href="{{ URL::asset('#!') }}" class="btn btn-primary rounded-pill btn-lg">Purchase a license</a>
                            </div>
                        </div>
                        <!--End Col-->
                    </div> <!-- / .row -->
                </div> <!-- / .container -->
            </section>
</x-assan-layout>
