<x-assan-layout layout-type="{{$layoutType}}">
            <!--Hero-->
            <section class="position-relative bg-dark text-white" data-speed=".2">
                <!--Parallax image-->
                <img src="{{ URL::asset('assets/img/shop/banners/04.jpg') }}" alt="" class="bg-image opacity-75">
                <div class="container pt-15 pb-12 position-relative">
                    <div class="row py-lg-9 align-items-end">
                        <div class="col-xl-12">
                            <div class="text-center">
                                <h5 class="fs-4 mb-4">up to 60% off</h5>
                                <h2 class="display-1 font-serif fw-normal mb-4">Summer Sale</h2>
                                <div class="text-center">
                                    <a href="{{ URL::asset('#') }}" class="link-underline text-uppercase text-white fw-bold me-3 me-lg-5">
                                        Mens collection
                                    </a>
                                    <a href="{{ URL::asset('#') }}" class="link-underline text-uppercase text-white fw-bold">
                                        Womens collection
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!--Banners grid-->
            <section class="position-relative">
                <div class="container-fluid px-0 position-relative">
                    <div class="row mx-0 justify-content-between">
                        <div class="col-md-6 px-0">
                            <div class="card border-0 card-hover">
                                <div class="overflow-hidden position-relative">
                                    <img src="{{ URL::asset('assets/img/shop/banners/women.jpg') }}" class="img-fluid img-zoom" alt="">
                                </div>
                                <div
                                    class="position-absolute bg-dark bg-opacity-25 text-white start-0 top-0 p-4 justify-content-center text-center align-items-center d-flex w-100 h-100">
                                    <div class="position-relative">
                                        <h5 class="fs-4 mb-4">up to 30% off</h5>
                                        <h2 class="mb-4 display-2 font-serif fw-normal">Urban</h2>
                                        <a href="{{ URL::asset('#') }}" class="link-underline text-uppercase text-white fw-semibold mb-2 me-2">
                                            Shop Now
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 px-0">
                            <div class="card border-0 card-hover">
                                <div class="overflow-hidden position-relative">
                                    <img src="{{ URL::asset('assets/img/shop/banners/men.jpg') }}" class="img-fluid img-zoom" alt="">
                                </div>
                                <div
                                    class="position-absolute bg-dark bg-opacity-25 text-white start-0 top-0 p-4 justify-content-center text-center align-items-center d-flex w-100 h-100">
                                    <div class="position-relative">
                                        <h5 class="fs-4 mb-4">New Arrivals</h5>
                                        <h2 class="mb-4 display-2 font-serif fw-normal">Denim</h2>
                                        <a href="{{ URL::asset('#') }}" class="link-underline text-white  text-uppercase fw-semibold mb-2 me-2">
                                            Shop Now
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!--Featured slider-->
            <section class="overflow-hidden">
                <div class="container py-9 py-lg-11">
                    <div class="row mb-4 align-items-center">
                        <div class="col-md-7 text-center text-md-start mb-4">
                            <h2 class="mb-0 display-5 font-serif fw-normal">
                                Featured Products
                            </h2>
                        </div>
                        <div class="col-md-5 mb-4">
                            <div class="text-center text-md-end">
                                <a href="{{ URL::asset('#') }}" class="btn btn-outline-primary btn-lg btn-hover-text mb-2 me-2">
                                    <span class="btn-hover-label label-default">Explore</span>
                                    <span class="btn-hover-label label-hover">Explore</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-featured swiper-container position-relative overflow-visible">
                        <div class="swiper-wrapper">
                            <!--Slide product-->
                            <div class="swiper-slide">
                                <!--Card-product-->
                                <div class="card overflow-hidden hover-lift card-product">
                                    <div class="card-product-header p-3 d-block overflow-hidden">
                                        <!--Product image-->
                                        <a href="{{ URL::asset('#!') }}">
                                            <img src="{{ URL::asset('assets/img/shop/products/01.jpg') }}" class="img-fluid rounded-3"
                                                alt="Product">
                                        </a>
                                    </div>
                                    <div class="card-product-body p-3 pt-0 text-center">
                                        <a href="{{ URL::asset('#!') }}" class="h5 d-block position-relative mb-2">Product
                                            Title</a>
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

                            <!--Slide product-->
                            <div class="swiper-slide">
                                <!--Card-product-->
                                <div class="card overflow-hidden hover-lift card-product">
                                    <div class="card-product-header p-3 d-block overflow-hidden">
                                        <!--Product image-->
                                        <a href="{{ URL::asset('#!') }}">
                                            <img src="{{ URL::asset('assets/img/shop/products/02.jpg') }}" class="img-fluid rounded-3"
                                                alt="Product">
                                        </a>
                                    </div>
                                    <div class="card-product-body p-3 pt-0 text-center">
                                        <a href="{{ URL::asset('#!') }}" class="h5 d-block position-relative mb-2">Product
                                            Title</a>
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
                            <!--Slide product-->
                            <div class="swiper-slide">
                                <!--Card-product-->
                                <div class="card overflow-hidden hover-lift card-product">
                                    <div class="card-product-header p-3 d-block overflow-hidden">
                                        <!--Product image-->
                                        <a href="{{ URL::asset('#!') }}">
                                            <img src="{{ URL::asset('assets/img/shop/products/03.jpg') }}" class="img-fluid rounded-3"
                                                alt="Product">
                                        </a>
                                    </div>
                                    <div class="card-product-body p-3 pt-0 text-center">
                                        <a href="{{ URL::asset('#!') }}" class="h5 d-block position-relative mb-2">Product
                                            Title</a>
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
                            <!--Slide product-->
                            <div class="swiper-slide">
                                <!--Card-product-->
                                <div class="card overflow-hidden hover-lift card-product">
                                    <div class="card-product-header p-3 d-block overflow-hidden">
                                        <!--Product image-->
                                        <a href="{{ URL::asset('#!') }}">
                                            <img src="{{ URL::asset('assets/img/shop/products/04.jpg') }}" class="img-fluid rounded-3"
                                                alt="Product">
                                        </a>
                                    </div>
                                    <div class="card-product-body p-3 pt-0 text-center">
                                        <a href="{{ URL::asset('#!') }}" class="h5 d-block position-relative mb-2">Product
                                            Title</a>
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
                            <!--Slide product-->
                            <div class="swiper-slide">
                                <!--Card-product-->
                                <div class="card overflow-hidden hover-lift card-product">
                                    <div class="card-product-header p-3 d-block overflow-hidden">
                                        <!--Product image-->
                                        <a href="{{ URL::asset('#!') }}">
                                            <img src="{{ URL::asset('assets/img/shop/products/05.jpg') }}" class="img-fluid rounded-3"
                                                alt="Product">
                                        </a>
                                    </div>
                                    <div class="card-product-body p-3 pt-0 text-center">
                                        <a href="{{ URL::asset('#!') }}" class="h5 d-block position-relative mb-2">Product
                                            Title</a>
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
                            <!--Slide product-->
                            <div class="swiper-slide">
                                <!--Card-product-->
                                <div class="card overflow-hidden hover-lift card-product">
                                    <div class="card-product-header p-3 d-block overflow-hidden">
                                        <!--Product image-->
                                        <a href="{{ URL::asset('#!') }}">
                                            <img src="{{ URL::asset('assets/img/shop/products/06.jpg') }}" class="img-fluid rounded-3"
                                                alt="Product">
                                        </a>
                                    </div>
                                    <div class="card-product-body p-3 pt-0 text-center">
                                        <a href="{{ URL::asset('#!') }}" class="h5 d-block position-relative mb-2">Product
                                            Title</a>
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
                            <!--Slide product-->
                            <div class="swiper-slide">
                                <!--Card-product-->
                                <div class="card overflow-hidden hover-lift card-product">
                                    <div class="card-product-header p-3 d-block overflow-hidden">
                                        <!--Product image-->
                                        <a href="{{ URL::asset('#!') }}">
                                            <img src="{{ URL::asset('assets/img/shop/products/07.jpg') }}" class="img-fluid rounded-3"
                                                alt="Product">
                                        </a>
                                    </div>
                                    <div class="card-product-body p-3 pt-0 text-center">
                                        <a href="{{ URL::asset('#!') }}" class="h5 d-block position-relative mb-2">Product
                                            Title</a>
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
                            <!--Slide product-->
                            <div class="swiper-slide">
                                <!--Card-product-->
                                <div class="card overflow-hidden hover-lift card-product">
                                    <div class="card-product-header p-3 d-block overflow-hidden">
                                        <!--Product image-->
                                        <a href="{{ URL::asset('#!') }}">
                                            <img src="{{ URL::asset('assets/img/shop/products/08.jpg') }}" class="img-fluid rounded-3"
                                                alt="Product">
                                        </a>
                                    </div>
                                    <div class="card-product-body p-3 pt-0 text-center">
                                        <a href="{{ URL::asset('#!') }}" class="h5 d-block position-relative mb-2">Product
                                            Title</a>
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
                            <!--Slide product-->
                            <div class="swiper-slide">
                                <!--Card-product-->
                                <div class="card overflow-hidden hover-lift card-product">
                                    <div class="card-product-header p-3 d-block overflow-hidden">
                                        <!--Product image-->
                                        <a href="{{ URL::asset('#!') }}">
                                            <img src="{{ URL::asset('assets/img/shop/products/09.jpg') }}" class="img-fluid rounded-3"
                                                alt="Product">
                                        </a>
                                    </div>
                                    <div class="card-product-body p-3 pt-0 text-center">
                                        <a href="{{ URL::asset('#!') }}" class="h5 d-block position-relative mb-2">Product
                                            Title</a>
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
                        </div>
                        <!--Pagination-->
                        <div class="swiperFeatured-pagination swiper-pagination position-static pt-5"></div>
                    </div>
                </div>
            </section>

            <!--Offer Banner-->
            <section class="position-relative overflow-hidden jarallax" data-speed=".2">
                <img src="{{ URL::asset('assets/img/shop/banners/05.jpg') }}" class="jarallax-img" alt="">
                <div class="container w-lg-75 mx-auto text-center">
                    <div class="swiper-container position-relative overflow-hidden text-white swiper-testimonials">
                        <div class="swiper-wrapper py-12">
    
                            <!--Slide-->
                            <div class="swiper-slide">
                              <p class="fs-4 mb-5">
                                Curabitur non tristique tortor. Vestibulum aliquet suscipit ipsum in volutpat. Donec vel lacinia sem, vitae semper nulla. In hac habitasse platea dictumst. Mauris consectetur est et nibh sadip hendrerit bibendum.
                              </p>
                              <h5 class="mb-0">Heena Kohn, <small class="fw-normal">Customer</small></h5>
                            </div>
                            <!--Slide-->
                            <div class="swiper-slide">
                                <p class="fs-4 mb-5">
                                  Donec vel lacinia sem, vitae semper nulla. In hac habitasse platea dictumst. Mauris consectetur est et nibh sadip hendrerit bibendum.
                                  </p>
                                  <h5 class="mb-0">Heena Kohn, <small class="fw-normal">Customer</small></h5>
                              </div>
                              <!--Slide-->
                            <div class="swiper-slide">
                                <p class="fs-4 mb-5">
                                    Vestibulum aliquet suscipit ipsum in volutpat. Donec vel lacinia sem, vitae semper nulla. In hac habitasse platea dictumst. Mauris consectetur est et nibh sadip hendrerit bibendum.
                                  </p>
                                  <h5 class="mb-0">Heena Kohn, <small class="fw-normal">Customer</small></h5>
                              </div>
                        </div>
                        <!--Pagination-->
                        <div class="swiper-pagination swiperT-pagination"></div>
                    </div>
                </div>
            </section>


            <!--Shop features-->
            <section class="position-relative overflow-hidden">
                <div class="container py-9 position-relative">
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

            <!--Newsletter-->
            <section class="position-relative bg-body-tertiary">
                <div class="container py-9 py-lg-11">
                    <div class="row justify-content-between">

                        <!--Nesletter col-->
                        <div class="col-lg-8 mx-auto">
                            <h5 class="mb-5 display-5 font-serif fw-normal">Don't Miss Any News!</h5>
                            <form class="needs-validation" novalidate>
                                <div class="row g-md-1 mb-4">
                                    <div class="col-md col-lg-7 mb-2 mb-md-0">
                                        <input type="email" class="form-control bg-transparent form-control-lg" required
                                            placeholder="Your email address">
                                        <div class="invalid-feedback">
                                            Please enter a valid email address.
                                        </div>
                                    </div>
                                    <div class="col-md-auto col-lg-4 col-12">
                                        <button type="submit"
                                            class="btn btn-primary btn-lg btn-hover-text d-block w-100 mb-2 me-2">
                                            <span class="btn-hover-label label-default">Subscribe</span>
                                            <span class="btn-hover-label label-hover">Subscribe</span>
                                        </button>
                                    </div>
                                </div>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" required id="newsletterCheck">
                                    <label class="form-label small text-body-secondary" for="newsletterCheck">I accept the <a
                                            href="{{ URL::asset('#') }}" class="link-decoration">Terms</a> and <a href="{{ URL::asset('#') }}"
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

</x-assan-layout>
