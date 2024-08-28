<x-assan-layout layout-type="{{$layoutType}}">
            <!--page-hero-->
            <section class="position-relative">
                <!--:Pattern:-->
                <div class="bg-pattern text-primary text-opacity-50 opacity-25 w-100 h-100 start-0 top-0 position-absolute"></div>
                <div class="container pt-11 pt-lg-14 pb-9 pb-lg-11 position-relative z-1">
                    <div class="row align-items-center justify-content-center">
                        <div class="col-xl-4 col-lg-5 col-md-6 col-sm-8 z-2">
                            
                            <h2 class="mb-1 display-6">
                                Welcome back!
                               </h2>
                               <p class="mb-4 text-body-secondary">
                                  Please Sign In with details...
                               </p>
                            <div class="position-relative">
                                <div>
                                    <form class="needs-validation" novalidate>
                                        <div class="input-icon-group mb-3">
                                            <span class="input-icon">
                                          <i class="bx bx-envelope"></i>
                                        </span>
                                      <input type="email" class="form-control" required autofocus placeholder="Username">
                                    </div>
                                      <div class="input-icon-group mb-3">
                                        <span class="input-icon">
                                            <i class="bx bx-lock-open"></i>
                                        </span>
                                      <input type="password" class="form-control" required placeholder="Password">
                                    </div>
                                        <div class="mb-3 d-flex justify-content-between">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                                <label class="form-check-label" for="flexCheckDefault">
                                                 Remember me
                                                </label>
                                              </div>
                                              <div>
                                                <label class="text-end d-block small mb-0"><a href="{{ URL::asset('page-account-forget-password.html') }}" class="link-decoration">Forget Password?</a></label>
                                              </div>
                                        </div>
                                        
                                        <div class="d-grid">
                                            <button class="btn btn-primary" type="submit">
                                                Sign in
                                            </button>
                                        </div>
                                    </form>

                                    <!---->
                                    <p class="pt-4 small text-body-secondary">
                                        Don’t have an account yet? <a href="{{ URL::asset('page-account-signup.html') }}" class="ms-2 fw-semibold link-underline">Sign Up</a>
                                    </p>
                                    <!--Divider-->
                                    <div class="d-flex align-items-center py-3">
                                        <span class="flex-grow-1 border-bottom pt-1"></span>
                                        <span class="d-inline-flex flex-center lh-1 mx-2 width-2x height-2x rounded-circle text-mono">or</span>
                                        <span class="flex-grow-1 border-bottom pt-1"></span>
                                    </div>
                                    <div class="d-grid">
                                        <a href="{{ URL::asset('#!') }}" class="d-flex hover-lift btn-secondary mb-2 btn position-relative flex-center">
                                            <!--Main Icon-->
                                            <div class="position-relative d-flex align-items-center">
                                                <img src="{{ URL::asset('assets/img/brands/google.svg') }}" alt="" class="width-2x me-2">
                                                <span>sign in with google</span>
                                            </div>
                                        </a> 
                                        <a href="{{ URL::asset('#!') }}" class="d-flex hover-lift btn-secondary btn position-relative flex-center">
                                            <!--Main Icon-->
                                            <div class="position-relative d-flex align-items-center">
                                                <img src="{{ URL::asset('assets/img/brands/Facebook.svg') }}" alt="" class="width-2x me-2">
                                                <span>sign in with facebook</span>
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
