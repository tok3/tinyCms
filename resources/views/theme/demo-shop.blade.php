<x-assan-layout layout-type="{{$layoutType}}">

            <!--begin:Hero section-->
            <section class="position-relative overflow-hidden">
                <!--:Swiper classic -->
                <div class="swiper-container swiper-classic overflow-hidden position-relative">
                    <div class="swiper-wrapper">
                        <!--:Slide-->
                        <div class="swiper-slide" style="background-image:url('assets/img/shop/banners/03.jpg')">
                            <div class="bg-dark position-absolute start-0 top-0 w-100 h-100 opacity-25"></div>
                            <!--:container-->
                            <div class="container h-100 text-white position-relative z-1">
                                <div class="row d-flex align-items-center h-100">
                                    <div class="col-xl-10 mx-auto text-center">
                                        <!--:slider layers-->
                                        <ul class="list-unstyled mb-0">
                                            <li>
                                                <h2 class="display-1 mb-3">
                                                    Mens Collection
                                                </h2>
                                            </li>
                                            <li>
                                                <p class="lead mb-4 mb-lg-5">
                                                    Show your prducts in modern way
                                                </p>
                                            </li>
                                            <li>
                                                <a href="{{ URL::asset('#') }}" class="btn btn-white btn-lg btn-hover-text mb-2 me-2">
                                                    <span class="btn-hover-label label-default">View Collection</span>
                                                    <span class="btn-hover-label label-hover">View Collection</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--:Slide-->
                        <div class="swiper-slide" style="background-image:url('assets/img/shop/banners/06.jpg')">
                            <div class="bg-dark position-absolute start-0 top-0 w-100 h-100 opacity-25"></div>
                            <!--:container-->
                            <div class="container h-100 text-white position-relative z-1">
                                <div class="row d-flex align-items-center h-100">
                                    <div class="col-xl-10 mx-auto text-center">
                                        <!--:slider layers-->
                                        <ul class="list-unstyled mb-0">
                                            <li>
                                                <h2 class="display-1 mb-3">
                                                    Womens Shop
                                                </h2>
                                            </li>
                                            <li>
                                                <p class="lead mb-4 mb-lg-5">
                                                    Show your prducts in modern way
                                                </p>
                                            </li>
                                            <li>
                                                <a href="{{ URL::asset('#') }}" class="btn btn-white btn-lg btn-hover-text mb-2 me-2">
                                                    <span class="btn-hover-label label-default">Shop now</span>
                                                    <span class="btn-hover-label label-hover">shop now</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--:Slide-->
                        <div class="swiper-slide h-100" style="background-image:url('assets/img/shop/banners/07.jpg')">
                            <div class="bg-dark position-absolute start-0 top-0 w-100 h-100 opacity-25"></div>
                            <!--:container-->
                            <div class="container h-100 text-white position-relative z-1">
                                <div class="row d-flex align-items-center h-100">
                                    <div class="col-xl-10 mx-auto text-center">
                                        <!--:slider layers-->
                                        <ul class="list-unstyled mb-0">
                                            <li>
                                                <h2 class="display-1 mb-3">
                                                    Urban Outfit
                                                </h2>
                                            </li>
                                            <li>
                                                <p class="lead mb-4 mb-lg-5">
                                                    Show your prducts in modern way
                                                </p>
                                            </li>
                                            <li>
                                                <a href="{{ URL::asset('#') }}" class="btn btn-white btn-lg btn-hover-text mb-2 me-2">
                                                    <span class="btn-hover-label label-default">Shop now</span>
                                                    <span class="btn-hover-label label-hover">shop now</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--:Add Pagination -->
                    <div class="swiper-pagination swiperClassic-pagination mb-2 mb-lg-7 z-1 text-white"></div>

                </div>
            </section>
            <!--/end:Hero section-->

            <!--begin:Features section-->
            <section class="position-relative overflow-hidden">
                <div class="container pt-7 pt-lg-12 position-relative">
                    <div class="row align-items-center">
                        <div class="col-md-4 border-end-md border-light text-center mb-7 mb-md-0">
                            <div class="mb-3">
                                <i class="bx bx-store fs-1"></i>
                            </div>
                            <h6 class="mb-0">30 Day Returns</h6>
                        </div>
                        <div class="col-md-4 border-end-md border-light text-center mb-7 mb-md-0">
                            <div class="mb-3">
                                <i class="bx bx-purchase-tag fs-1"></i>
                            </div>
                            <h6 class="mb-0">100% Handpicked</h6>
                        </div>
                        <div class="col-md-4 text-center">
                            <div class="mb-3">
                                <i class="bx bx-package fs-1"></i>
                            </div>
                            <h6 class="mb-0">Assured Quality</h6>
                        </div>
                    </div>
                </div>
            </section>
            <!--/end:Features section-->

            <!--begin:banners section-->
            <section class="position-relative">
                <div class="container position-relative pt-7 pt-lg-12">
                    <div class="row justify-content-between">
                        <div class="col-md-6 mb-3 mb-md-0">
                            <div class="card border-0 card-hover overflow-hidden">
                                <div class="overflow-hidden position-relative">
                                    <img src="{{ URL::asset('assets/img/shop/banners/women.jpg') }}" class="img-fluid img-zoom" alt="">
                                </div>
                                <div
                                    class="position-absolute text-white start-0 top-0 p-4 justify-content-center text-center align-items-center d-flex w-100 h-100">
                                    <div class="">
                                        <span>Summer Sale</span>
                                        <h5 class="mb-4 display-4">Womens shop</h5>
                                        <a href="{{ URL::asset('#') }}" class="btn btn-white btn-lg btn-hover-text mb-2 me-2">
                                            <span class="btn-hover-label label-default">Shop now</span>
                                            <span class="btn-hover-label label-hover">shop now</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card border-0 card-hover overflow-hidden">
                                <div class="overflow-hidden position-relative">
                                    <img src="{{ URL::asset('assets/img/shop/banners/men.jpg') }}" class="img-fluid img-zoom" alt="">
                                </div>
                                <div
                                    class="position-absolute text-white start-0 top-0 p-4 justify-content-center text-center align-items-center d-flex w-100 h-100">
                                    <div class="">
                                        <span>New Arrivals</span>
                                        <h5 class="mb-4 display-4">Mens collection</h5>
                                        <a href="{{ URL::asset('#') }}" class="btn btn-white btn-lg btn-hover-text mb-2 me-2">
                                            <span class="btn-hover-label label-default">Shop now</span>
                                            <span class="btn-hover-label label-hover">shop now</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--/end:banners section-->

            <!--begin:featured products-->
            <section class="overflow-hidden">
                <div class="container py-9 py-lg-11">
                    <div class="row mb-2 align-items-center">
                        <div class="col-md-7 mb-4">
                            <h2 class="mb-0 display-6">
                                Featured Products
                            </h2>
                        </div>
                        <div class="col-md-5 mb-4">
                            <div class="text-center text-md-end">
                                <a href="{{ URL::asset('#') }}" class="btn btn-primary btn-lg btn-hover-text mb-2 me-2">
                                    <span class="btn-hover-label label-default">Explore</span>
                                    <span class="btn-hover-label label-hover">Explore</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-lg-3 mb-4">
                            <!--Card-product-->
                            <div class="card overflow-hidden hover-lift card-product">
                                <div class="card-product-header p-3 d-block overflow-hidden">
                                    <!--Product image-->
                                    <a href="{{ URL::asset('#!') }}">
                                        <img src="{{ URL::asset('assets/img/shop/products/01.jpg') }}" class="img-fluid rounded"
                                            alt="Product">
                                    </a>
                                </div>
                                <div class="card-product-body p-3 pt-0 text-center">
                                    <a href="{{ URL::asset('#!') }}" class="h5 d-block position-relative mb-2">Product Title</a>
                                    <div class="card-product-body-overlay">
                                        <!--Price-->
                                        <span class="card-product-price">
                                            <span>$256</span> <del>$299</del>
                                        </span>
                                        <!--Action-->
                                        <span class="card-product-view-btn">
                                            <a href="{{ URL::asset('#!') }}" class="link-underline mb-1 fw-semibold">View
                                                Details</a>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <!--/Card product end-->
                        </div>
                        <div class="col-md-6 col-lg-3 mb-4">
                            <!--Card-product-->
                            <div class="card overflow-hidden hover-lift card-product">
                                <div class="card-product-header p-3 d-block overflow-hidden">
                                    <a href="{{ URL::asset('#!') }}">
                                        <img src="{{ URL::asset('assets/img/shop/products/02.jpg') }}" class="img-fluid rounded"
                                            alt="Product">
                                    </a>
                                </div>
                                <div class="card-product-body p-3 pt-0 text-center">
                                    <a href="{{ URL::asset('#!') }}" class="h5 d-block position-relative mb-2">Product Title</a>
                                    <div class="card-product-body-overlay">
                                        <span class="card-product-price">
                                            <span>$49</span> <del>$79</del>
                                        </span>
                                        <span class="card-product-view-btn">
                                            <a href="{{ URL::asset('#!') }}" class="link-underline mb-1 fw-semibold">View
                                                Details</a>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <!--/Card product end-->
                        </div>
                        <div class="col-md-6 col-lg-3 mb-4">
                            <!--Card-product-->
                            <div class="card overflow-hidden hover-lift card-product">
                                <div class="card-product-header p-3 d-block overflow-hidden  position-relative">
                                    <a href="{{ URL::asset('#!') }}">
                                        <img src="{{ URL::asset('assets/img/shop/products/03.jpg') }}" class="img-fluid rounded"
                                            alt="Product">
                                    </a>

                                    <!--Product Label-->
                                    <span
                                        class="badge rounded-pill bg-primary position-absolute start-0 top-0 mt-4 ms-4">Bestseller</span>
                                </div>
                                <div class="card-product-body p-3 pt-0 text-center">
                                    <a href="{{ URL::asset('#!') }}" class="h5 d-block position-relative mb-2">Product Title</a>
                                    <div class="card-product-body-overlay">
                                        <span class="card-product-price">
                                            <span>$149</span> <del>$199</del>
                                        </span>
                                        <span class="card-product-view-btn">
                                            <a href="{{ URL::asset('#!') }}" class="link-underline mb-1 fw-semibold">View
                                                Details</a>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <!--:/card product end-->
                        </div>
                        <div class="col-md-6 col-lg-3 mb-4">
                            <!--Card-product-->
                            <div class="card overflow-hidden hover-lift card-product">
                                <div class="card-product-header p-3 d-block overflow-hidden">
                                    <a href="{{ URL::asset('#!') }}">
                                        <img src="{{ URL::asset('assets/img/shop/products/04.jpg') }}" class="img-fluid rounded"
                                            alt="Product">
                                    </a>
                                </div>
                                <div class="card-product-body p-3 pt-0 text-center">
                                    <a href="{{ URL::asset('#!') }}" class="h5 d-block position-relative mb-2">Product Title</a>
                                    <div class="card-product-body-overlay">
                                        <span class="card-product-price">
                                            <span>$99</span>
                                        </span>
                                        <span class="card-product-view-btn">
                                            <a href="{{ URL::asset('#!') }}" class="link-underline mb-1 fw-semibold">View
                                                Details</a>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <!--/Card product end-->
                        </div>
                        <div class="col-md-6 col-lg-3 mb-4">
                            <!--Card-product-->
                            <div class="card overflow-hidden hover-lift card-product">
                                <div class="card-product-header p-3 d-block overflow-hidden">
                                    <a href="{{ URL::asset('#!') }}">
                                        <img src="{{ URL::asset('assets/img/shop/products/05.jpg') }}" class="img-fluid rounded"
                                            alt="Product">
                                    </a>
                                </div>
                                <div class="card-product-body p-3 pt-0 text-center">
                                    <a href="{{ URL::asset('#!') }}" class="h5 d-block position-relative mb-2">Product Title</a>
                                    <div class="card-product-body-overlay">
                                        <span class="card-product-price">
                                            <span>$256</span> <del>$299</del>
                                        </span>
                                        <span class="card-product-view-btn">
                                            <a href="{{ URL::asset('#!') }}" class="link-underline mb-1 fw-semibold">View
                                                Details</a>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <!--/Card product end-->
                        </div>
                        <div class="col-md-6 col-lg-3 mb-4">
                            <!--Card-product-->
                            <div class="card overflow-hidden hover-lift card-product">
                                <div class="card-product-header p-3 d-block overflow-hidden">
                                    <a href="{{ URL::asset('#!') }}">
                                        <img src="{{ URL::asset('assets/img/shop/products/06.jpg') }}" class="img-fluid rounded"
                                            alt="Product">
                                    </a>
                                    <!--Product Label-->
                                    <span
                                        class="badge rounded-pill bg-danger position-absolute start-0 top-0 mt-4 ms-4">-30%</span>
                                </div>
                                <div class="card-product-body p-3 pt-0 text-center">
                                    <a href="{{ URL::asset('#!') }}" class="h5 d-block position-relative mb-2">Product Title</a>
                                    <div class="card-product-body-overlay">
                                        <span class="card-product-price">
                                            <span>$49</span> <del>$79</del>
                                        </span>
                                        <span class="card-product-view-btn">
                                            <a href="{{ URL::asset('#!') }}" class="link-underline mb-1 fw-semibold">View
                                                Details</a>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <!--/Card product end-->
                        </div>
                        <div class="col-md-6 col-lg-3 mb-4">
                            <!--Card-product-->
                            <div class="card overflow-hidden hover-lift card-product">
                                <div class="card-product-header p-3 d-block overflow-hidden">
                                    <a href="{{ URL::asset('#!') }}">
                                        <img src="{{ URL::asset('assets/img/shop/products/07.jpg') }}" class="img-fluid rounded"
                                            alt="Product">
                                    </a>
                                </div>
                                <div class="card-product-body p-3 pt-0 text-center">
                                    <a href="{{ URL::asset('#!') }}" class="h5 d-block position-relative mb-2">Product Title</a>
                                    <div class="card-product-body-overlay">
                                        <span class="card-product-price">
                                            <span>$149</span> <del>$199</del>
                                        </span>
                                        <span class="card-product-view-btn">
                                            <a href="{{ URL::asset('#!') }}" class="link-underline mb-1 fw-semibold">View
                                                Details</a>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <!--/Card product end-->
                        </div>
                        <div class="col-md-6 col-lg-3 mb-4">
                            <!--Card-product-->
                            <div class="card overflow-hidden hover-lift card-product">
                                <div class="card-product-header p-3 d-block overflow-hidden">
                                    <a href="{{ URL::asset('#!') }}">
                                        <img src="{{ URL::asset('assets/img/shop/products/08.jpg') }}" class="img-fluid rounded"
                                            alt="Product">
                                    </a>
                                    <!--Product Label-->
                                    <span
                                        class="badge rounded-pill bg-success position-absolute start-0 top-0 mt-4 ms-4">New</span>
                                </div>
                                <div class="card-product-body p-3 pt-0 text-center">
                                    <a href="{{ URL::asset('#!') }}" class="h5 d-block position-relative mb-2">Product Title</a>
                                    <div class="card-product-body-overlay">
                                        <span class="card-product-price">
                                            <span>$99</span>
                                        </span>
                                        <span class="card-product-view-btn">
                                            <a href="{{ URL::asset('#!') }}" class="link-underline mb-1 fw-semibold">View
                                                Details</a>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <!--/Card product end-->
                        </div>
                    </div>

                </div>
            </section>
            <!--/end:featured products-->

            <!--begin:Offer+Testimonials-->
            <section class="position-relative overflow-hidden border-top border-bottom">
                <div class="container position-relative">
                    <div class="row">
                        <div class="col-md-6 h-100 col-xl-5 ms-md-auto order-last order-md-1 py-7 border-end-md">

                            <span class="d-block mb-2"><i class="bx bx-stopwatch fs-5 me-1"></i> Limited time
                                offer</span>
                            <div class="countdown-timer py-3 mb-3 d-flex flex-wrap align-items-center"></div>
                            <h2 class="display-2 me-lg-n9 position-relative mb-4">
                                40% OFF
                            </h2>
                            <h5 class="mb-5">On order above $200</h5>
                            <a href="{{ URL::asset('#') }}" class="btn btn-primary btn-lg btn-hover-text mb-2 me-2">
                                <span class="btn-hover-label label-default">Shop Now</span>
                                <span class="btn-hover-label label-hover">Shop Now</span>
                            </a>
                        </div>
                        <div class="col-md-6 h-100 ms-auto py-7 order-1 order-md-last">
                            <span class="d-block mb-4"><i class="bx bxs-quote-alt-left fs-5 me-1"></i>
                                Testimonials</span>
                            <div class="swiper-container position-relative overflow-hidden swiper-testimonials">
                                <div class="swiper-wrapper pb-8">

                                    <!--Slide-->
                                    <div class="swiper-slide">
                                        <p class="fs-4 mb-4">
                                            Curabitur non tristique tortor. Vestibulum aliquet suscipit ipsum in
                                            volutpat. Donec vel lacinia sem, vitae semper nulla. In hac habitasse platea
                                            dictumst. Mauris consectetur est et nibh sadip hendrerit bibendum.
                                        </p>
                                        <h5 class="mb-0">Heena Kohn, <small class="fw-normal">Customer</small></h5>
                                    </div>
                                    <!--Slide-->
                                    <div class="swiper-slide">
                                        <p class="fs-4 mb-4">
                                            In hac habitasse platea dictumst. Mauris consectetur est et nibh sadip
                                            hendrerit bibendum.
                                        </p>
                                        <h5 class="mb-0">Heena Kohn, <small class="fw-normal">Customer</small></h5>
                                    </div>
                                    <!--Slide-->
                                    <div class="swiper-slide">
                                        <p class="fs-4 mb-4">
                                            Donec vel lacinia sem, vitae semper nulla. In hac habitasse platea dictumst.
                                            Mauris consectetur est et nibh sadip hendrerit bibendum.
                                        </p>
                                        <h5 class="mb-0">Heena Kohn, <small class="fw-normal">Customer</small></h5>
                                    </div>
                                </div>
                                <!--Pagination-->
                                <div class="swiper-pagination swiperT-pagination"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--/end:Offer+Testimonials-->

            <!--begin:Newsletter-->
            <section class="position-relative">
                <div class="container py-9 py-lg-11">
                    <div class="row justify-content-between">

                        <!--Nesletter col-->
                        <div class="col-lg-10 col-xl-9 mx-auto">
                            <h2 class="mb-5 display-6 text-center">
                                Don't Miss Any News!
                            </h2>
                            <form class="needs-validation w-lg-75 mx-auto" novalidate>
                                <div class="row g-md-1 mb-4">
                                    <div class="col-md mb-2 mb-md-0">
                                        <input type="email" class="form-control form-control-lg" required
                                            placeholder="Your email address">
                                        <div class="invalid-feedback">
                                            Please enter a valid email address.
                                        </div>
                                    </div>
                                    <div class="col-md-auto col-12">
                                        <button type="submit" class="btn btn-lg btn-hover-text btn-primary w-100">
                                            <span class="btn-hover-label label-default"> Subscribe</span>
                                            <span class="btn-hover-label label-hover"> Subscribe</span>
                                        </button>
                                    </div>
                                </div>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" required id="newsletterCheck">
                                    <label class="form-label small text-body-secondary" for="newsletterCheck">I accept
                                        the <a href="{{ URL::asset('#') }}" class="link-decoration">Terms</a> and <a href="{{ URL::asset('#') }}"
                                            class="link-decoration">conditions</a> and the <a href="{{ URL::asset('#') }}"
                                            class="link-decoration">data protection guidelines.</a></label>

                                    <div class="invalid-feedback">
                                        You must agree before subscribe.
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!--End col-->
                    </div>
                </div>
            </section>
            <!--/end:Newsletter-->
</x-assan-layout>
