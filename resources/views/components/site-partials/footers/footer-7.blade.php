<!--begin:Footer-->
<footer id="footer" class="position-relative footer overflow-hidden bg-body text-body" data-bs-theme="dark">
    <div class="container pt-9 pt-lg-11 pb-5">
        <div class="row">
            <div class="col-md-3 col-sm-6 mb-5">
                <h5 class="mb-4">We're here</h5>
                <p>124 Monali Street,</p>
                <p>Rosemary,&nbsp; California</p>
                <p>302012, USA</p>
                <p class="mb-5">
                    <a href="{{ URL::asset('#!') }}" class="link-underline">View on Map</a>
                </p>
                <p class="mb-0">
                    <h2 data-countup='{"startVal":0}' data-to="20000" data-aos-id="countup:in" data-aos
                        class="fs-2 fw-bold d-block"></h2> <span class="text-body-secondary small">+ Users</span>
                </p>
            </div>
            <div class="col-md-4 col-sm-6 mb-5">
                <h5 class="mb-4">Say g’day</h5>
                <div class="footer-info-details">
                    <p>
                        <a href="{{ URL::asset('mailus@domain.com') }}" class="link-hover-underline">mailus@domain.com</a>
                    </p>
                    <p class="mb-0"><a class="link-hover-underline" href="{{ URL::asset('tel:+1123456789') }}">(01) 1123 56789</a>
                    </p>
                </div>

                <hr class="my-4">
                <h6 class="mb-4">Follow us</h6>
                <div class="d-flex align-items-center">
                    <!-- Social button -->
                    <a href="{{ URL::asset('#!') }}" class="d-inline-block link-white mb-1 me-2 si rounded-pill si-hover-facebook">
                        <i class="bx bxl-facebook fs-5"></i>
                        <i class="bx bxl-facebook fs-5"></i>
                    </a>
                    <!-- Social button -->
                    <a href="{{ URL::asset('#!') }}" class="d-inline-block link-white mb-1 me-2 si rounded-pill si-hover-twitter">
                        <i class="bx bxl-twitter fs-5"></i>
                        <i class="bx bxl-twitter fs-5"></i>
                    </a>
                    <!-- Social button -->
                    <a href="{{ URL::asset('#!') }}" class="d-inline-block link-white mb-1 me-2 si rounded-pill si-hover-linkedin">
                        <i class="bx bxl-linkedin fs-5"></i>
                        <i class="bx bxl-linkedin fs-5"></i>
                    </a>
                    <!-- Social button -->
                    <a href="{{ URL::asset('#!') }}" class="d-inline-block link-white mb-1 si rounded-pill si-hover-instagram">
                        <i class="bx bxl-instagram fs-5"></i>
                        <i class="bx bxl-instagram fs-5"></i>
                    </a>
                </div>
                <x-partials.color-mode />
            </div>
            <div class="col-md-5 mb-5">
                <div class="p-4 p-lg-5 rounded-5 bg-primary text-white rounded-top-start-4 rounded-bottom-end-4 shadow">
                    <h3 class="mb-3">Request a free Quote</h3>
                    <p class="mb-4 opacity-75">Drop us a line below and we’ll find a way to help you and your team out.
                    </p>
                    <a class="btn btn-rise py-lg-3 px-lg-5 btn-outline-white rounded-pill" href="{{ URL::asset('#!') }}">
                        <div class="btn-rise-bg bg-white"></div>
                        <div class="btn-rise-text">
                            <i class="bx bx-chat me-2"></i>
                            Chat with us
                        </div>
                    </a>
                </div>
            </div>
        </div>

        <hr class="mb-5 mt-0">
        <div class="row align-items-center">
            <div class="col-sm-7 mb-4 mb-sm-0">
                <div class="d-flex small align-items-center">
                    <a class="d-block" href="{{ URL::asset('#') }}">About</a>
                    <a class="d-block ms-3" href="{{ URL::asset('#') }}">Services</a>
                    <a class="d-block ms-3" href="{{ URL::asset('#') }}">Work</a>
                    <a class="d-block ms-3" href="{{ URL::asset('#') }}">Contact</a>
                </div>
            </div>
            <div class="col-sm-5 text-sm-end">
                <span class="d-block lh-sm small text-body-secondary">&copy; Copyright
                    <script>
                        document.write(new Date().getFullYear())

                    </script>. Assan
                </span>
            </div>
        </div>
    </div>
</footer>
<!--end:Footer-->
