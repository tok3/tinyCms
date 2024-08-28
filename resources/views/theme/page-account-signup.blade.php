<x-assan-layout layout-type="{{$layoutType}}">
            <!--page-hero-->
            <section class="position-relative">
                <div class="bg-pattern text-primary text-opacity-50 opacity-25 w-100 h-100 start-0 top-0 position-absolute"></div>
                <div class="bg-gradientwhite flip-y w-50 h-100 start-50 top-0 translate-middle-x position-absolute"></div>
                <div class="container pt-11 pt-lg-14 pb-9 pb-lg-11 position-relative z-1">
                    <div class="row align-items-center justify-content-center">
                        <div class=" col-xl-4 col-lg-5 col-md-6 col-sm-8 z-2">

                            <h2 class="mb-1 display-6">
                                Hello!
                            </h2>
                            <p class="mb-4 text-body-secondary">
                                To get started, Please signup with details...
                            </p>
                            <div class="position-relative">
                                <div>
                                    <form class="needs-validation" novalidate>

                                        <!--input-with-icon-->
                                        <div class="input-icon-group mb-3">
                                            <span class="input-icon">
                                              <i class="bx bx-user"></i>
                                            </span>
                                            <input type="text" class="form-control" required id="signUpName" autofocus
                                                placeholder="Your full name">
                                        </div>

                                        <!--input-with-icon-->
                                        <div class="input-icon-group mb-3">
                                            <span class="input-icon">
                                                <i class="bx bx-envelope"></i>
                                            </span>
                                            </span>
                                            <input type="email" class="form-control" required id="signUpMail"
                                                placeholder="Your email address">
                                        </div>
                                        <!--input-with-icon-->
                                        <div class="input-icon-group mb-3">
                                            <span class="input-icon">
                                                <i class="bx bx-lock-open"></i>
                                            </span>
                                            </span>
                                            <input type="password" class="form-control" required id="signUpPassword"
                                                placeholder="Enter password">
                                        </div>
                                        <!--input-with-icon-->
                                        <div class="input-icon-group mb-3">
                                            <span class="input-icon">
                                                <i class="bx bx-lock-open"></i>
                                            </span>
                                            </span>
                                            <input type="password" class="form-control" required id="signUpConfirmPassword"
                                                placeholder="Confirm password">
                                        </div>
                                        <!--Checkbox-->
                                        <div class="mb-3 d-flex justify-content-between">
                                            <div class="form-check">
                                                <input class="form-check-input" required type="checkbox" value=""
                                                    id="flexCheckDefault">
                                                <label class="form-check-label small text-body-secondary" for="flexCheckDefault">
                                                    Agree to <a href="{{ URL::asset('#!') }}" class="fw-semibold link-decoration">Terms & conditions</a>
                                                </label>
                                            </div>
                                        </div>

                                        <div class="d-grid">
                                            <button class="btn btn-primary" type="submit">
                                                Sign Up
                                            </button>
                                        </div>
                                    </form>

                                    <!---->
                                    <p class="pt-3 small text-body-tertiary">
                                        Already have an account? <a href="{{ URL::asset('page-account-signin.html') }}"
                                            class="ms-2 fw-semibold link-underline">Sign in</a>
                                    </p>
                                    <!--Divider-->
                                    <div class="d-flex align-items-center py-3">
                                        <span class="flex-grow-1 border-bottom pt-1"></span>
                                        <span
                                            class="d-inline-flex flex-center mx-1 lh-1 width-2x height-2x rounded-circle bg-body text-mono">or</span>
                                        <span class="flex-grow-1 border-bottom pt-1"></span>
                                    </div>
                                    <div class="d-grid">
                                        <a href="{{ URL::asset('#!') }}"
                                            class="d-flex hover-lift btn-secondary mb-2 btn position-relative flex-center">
                                            <!--Main Icon-->
                                            <div class="position-relative d-flex align-items-center">
                                                <img src="{{ URL::asset('assets/img/brands/google.svg') }}" alt="" class="width-2x me-2">
                                                <span>sign up with google</span>
                                            </div>
                                        </a>
                                        <a href="{{ URL::asset('#!') }}"
                                            class="d-flex hover-lift btn-secondary btn position-relative flex-center">
                                            <!--Main Icon-->
                                            <div class="position-relative d-flex align-items-center">
                                                <img src="{{ URL::asset('assets/img/brands/Facebook.svg') }}" alt="" class="width-2x me-2">
                                                <span>sign up with facebook</span>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
</x-assan-layout>
