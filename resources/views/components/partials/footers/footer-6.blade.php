<!--begin:Footer-->
<footer id="footer" class="footer position-relative" data-bs-theme="dark">
    <!--:Svg Wave:-->
    <svg class="text-dark w-100" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg" width="1920" height="120"
        viewBox="0 0 1920 200">
        <path d="M1920 186 1066.66 71.45C1415 81 1650 58 1920 0" fill="var(--bs-primary)" />
        <path d="M1920 200H0V11.31c873-5.64 873 73 1918.65 73h1.35Z" fill="currentColor" />
    </svg>
    <div class="bg-dark text-body">
        <div class="container pt-5 pt-lg-7 pb-5 pb-lg-7">
            <div class="row">
                <div class="col-lg-3 col-md-6 mb-7">
                    <a class="d-table mb-4" href="{{ URL::asset('#') }}">
                        <img src="{{ URL::asset('assets/img/logo/logo-white.svg') }}" alt="" class="width-9x h-auto">
                    </a>
                    <p><strong>Company Pty Ltd</strong></p>
                    <p>124, Lorem street,<br>Park avenue Rd,<br>302012, LA,<br> USA</p>
                    <p>
                        <span class="text-body-secondary">Phone:</span>
                        <a href="{{ URL::asset('tel:0123456789') }}">+01 1234 56789</a>
                    </p>
                    <p class="text-body-secondary mb-0">
                        <span class="text-body-secondary">Email:</span> <a
                            href="{{ URL::asset('mailto:mailus@domain.com') }}">mailus@domain.com</a>
                    </p>
                    <!--:Dark Mode:-->
                    <div class="d-inline-flex align-items-center dropup mt-6">
                        <button class="btn border text-body py-2 px-2 d-flex align-items-center" id="assan-theme"
                            type="button" aria-expanded="false" data-bs-toggle="dropdown" data-bs-display="static">
                            <span class="theme-icon-active d-flex align-items-center">
                                <i class="bx align-middle" href="{{ URL::asset('null') }}"></i>
                            </span>
                        </button>
                        <!--:Dark Mode Options:-->
                        <ul class="dropdown-menu" aria-labelledby="assan-theme" style="--bs-dropdown-min-width: 9rem;">
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
                </div>
                <div class="col-lg-2 col-md-3 col-sm-4 ms-md-auto mb-7">
                    <h5 class="mb-3">About</h5>
                    <nav class="nav flex-column">
                        <a class="nav-link" href="{{ URL::asset('#') }}">About company</a>
                        <a class="nav-link" href="{{ URL::asset('#') }}">Meet the Team</a>
                        <a class="nav-link" href="{{ URL::asset('#') }}">Contact Us</a>
                    </nav>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-4 mb-7">
                    <h5 class="mb-3">Learn More</h5>
                    <nav class="nav flex-column">
                        <a class="nav-link" href="{{ URL::asset('#') }}">Crowdfunds</a>
                        <a class="nav-link" href="{{ URL::asset('#') }}">IPO</a>
                        <a class="nav-link" href="{{ URL::asset('#') }}">Wholesale</a>
                        <a class="nav-link" href="{{ URL::asset('#') }}">Resource</a>
                        <a class="nav-link" href="{{ URL::asset('#') }}">FAQs</a>
                        <a class="nav-link" href="{{ URL::asset('#') }}">News & media</a>
                        <a class="nav-link" href="{{ URL::asset('#') }}">Raise Capital</a>
                    </nav>
                </div>
                <div class="col-lg-2 col-sm-4 mb-7">
                    <h5 class="mb-3">Legal</h5>
                    <nav class="nav flex-column">
                        <a class="nav-link" href="{{ URL::asset('#') }}">Investor</a>
                        <a class="nav-link" href="{{ URL::asset('#') }}">Disclosure</a>
                        <a class="nav-link" href="{{ URL::asset('#') }}">Statements</a>
                        <a class="nav-link" href="{{ URL::asset('#') }}">Debit</a>
                        <a class="nav-link" href="{{ URL::asset('#') }}">Fair Policy</a>
                        <a class="nav-link" href="{{ URL::asset('#') }}">Services Guide</a>
                    </nav>
                </div>
                <div class="col-lg-3 col-md-8 mb-7">
                    <h5 class="mb-3">Subscribe</h5>
                    <span class="d-block text-body-secondary mb-4">Subscribe to our newsletter and stay up to date with
                        latest news
                        and
                        offers.</span>
                    <div class="newsletter-signup">
                        <form novalidate class="needs-validation">
                            <div class="d-flex flex-column mb-2">
                                <input type="email" placeholder="Enter email address"
                                    class="form-control bg-transparent mb-2" required="">
                                <button class="btn btn-primary" type="submit">Subscribe</button>
                            </div>
                        </form>
                        <span class="small text-body-secondary d-block text-end">We do not share your email</span>
                    </div>
                </div>
            </div>
            <hr class="mb-7">
            <div class="row">
                <div class="col-sm-5 mb-3 mb-sm-0">
                    <span class="d-block lh-sm small text-body-secondary">© Copyright
                        <script>
                            document.write(new Date().getFullYear())

                        </script>. Assan
                    </span>
                </div>
                <div class="col-sm-7">
                    <nav class="nav justify-content-sm-end">
                        <a class="nav-link small px-0 me-3" href="{{ URL::asset('#!') }}"><small>Privacy Policy</small></a>
                        <a class="nav-link small px-0" href="{{ URL::asset('#!') }}"><small>Terms of Service</small></a>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</footer>
<!--end:Footer-->