<!doctype html>
<html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="{{ URL::asset('assets/img/favicon.ico') }}" type="image/ico">

        <!--swiper-->
        <link rel="stylesheet" href="{{ URL::asset('assets/vendor/node_modules/css/swiper-bundle.min.css') }}">
        <x-partials.shop.head-includes />

        <title>Assan 4</title>
    </head>

    <body>
        <!--Preloader Spinner-->
        <div class="spinner-loader bg-gradient bg-secondary text-white">
            <div class="spinner-border text-primary" role="status">
            </div>
            <span class="small d-block ms-2">Loading...</span>
        </div>


          <!--Message-->
    <div class="position-relative px-4 text-center py-2 bg-primary text-white">
        <small>Worldwide shipping available</small>
      </div>

        <!--Header Start-->
        <nav class="navbar navbar-expand-lg shadow-xl header-center-logo navbar-light bg-body position-lg-sticky z-3 top-0">
            <div class="container position-relative">
                <a class="navbar-brand" href="{{ URL::asset('assan/index.html') }}">
                    <img src="{{ URL::asset('assets/img/logo/logo-shop.svg') }}" alt="" class="img-fluid navbar-brand-light">
                    <img src="{{ URL::asset('assets/img/logo/logo-shop-white.svg') }}" alt="" class="img-fluid navbar-brand-dark">
                </a>
                <div class="d-flex align-items-center navbar-no-collapse-items navbar-nav flex-row order-lg-last">
                    <button class="navbar-toggler order-last" type="button" data-bs-toggle="collapse"
                        data-bs-target="#mainNavbarTheme" aria-controls="mainNavbarTheme" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon">
                            <i></i>
                        </span>
                    </button>
                    <div class="nav-item me-3 ms-0">
                        <a href="{{ URL::asset('demo-shop-wishlist.html') }}" class="nav-link lh-1 position-relative">
                            <i class="bx bx-heart fs-4"></i>
                        </a>
                    </div>
                    <div class="nav-item me-3 ms-0">
                        <a href="{{ URL::asset('#offcanvasCart') }}" data-bs-toggle="offcanvas" class="nav-link lh-1 position-relative">
                            <i class="bx bx-shopping-bag fs-4"></i>
                            <span
                                class="badge p-0 position-absolute end-0 top-0 me-n2 mt-n1 lh-1 fw-semibold width-1x height-1x shadow-sm bg-white text-dark rounded-circle flex-center">3</span>
                        </a>
                    </div>
                    <div class="nav-item me-3 ms-0">
                        <a href="{{ URL::asset('#') }}" data-bs-target="#modal-search-bar-2" data-bs-toggle="modal" class="nav-link lh-1">
                            <i class="bx bx-search fs-4"></i>
                        </a>
                    </div>
                    <div class="nav-item dropdown ms-0 me-3 me-lg-0">
                        <a href="{{ URL::asset('#') }}" class="nav-link p-0" data-bs-auto-close="outside" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <i class="bx bx-user fs-4"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end dropdown-menu-xs p-4">

                            <!--Login form-->
                            <form class="needs-validation" novalidate>
                                <div>
                                    <h3 class="mb-1"> Welcome back! </h3>
                                    <p class="mb-4 text-body-secondary">
                                        Please Sign In with details...
                                    </p>
                                </div>
                                <div class="input-icon-group mb-3">
                                    <span class="input-icon">
                                        <i class="bx bx-envelope"></i>
                                    </span>
                                    <input type="email" required class="form-control"
                                        placeholder="Username">
                                </div>
                                <div class="input-icon-group mb-3">
                                    <span class="input-icon">
                                        <i class="bx bx-key"></i>
                                    </span>
                                    <input type="password" required class="form-control" placeholder="Password">
                                </div>
                                <div class="mb-3 d-flex justify-content-between">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            Remember me
                                        </label>
                                    </div>
                                    <div>
                                        <label class="text-end d-block small mb-0">
                                            <a href="{{ URL::asset('#') }}" class="text-body-secondary link-decoration">Forget Password?
                                            </a>
                                        </label>
                                    </div>
                                </div>

                                <div class="d-grid">
                                    <button class="btn btn-primary btn-hover-arrow" type="submit">
                                        <span>Sign in</span>
                                    </button>
                                </div>
                                <p class="pt-4 mb-0 text-body-secondary">
                                    Don’t have an account yet? <a href="{{ URL::asset('page-account-signup.html') }}"
                                        class="ms-2 pb-0 fw-semibold link-underline">Sign Up</a>
                                </p>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="collapse navbar-collapse" id="mainNavbarTheme">
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle active" href="{{ URL::asset('#') }}" role="button" data-bs-toggle="dropdown"
                                aria-haspopup="false" aria-expanded="false">
                                Home
                            </a>
                            <div class="dropdown-menu">
                                <a href="{{ URL::asset('demo-shop.html') }}" class="dropdown-item">01 Default</a>
                                <a href="{{ URL::asset('demo-shop-home-02.html') }}" class="dropdown-item">02 Home Option</a>
                            </div>
                        </li>

                        <li class="nav-item nav-item dropdown position-lg-static">
                            <a class="nav-link dropdown-toggle" href="{{ URL::asset('#') }}" role="button" data-bs-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                Mens
                            </a>
                            <div class="dropdown-menu dropdown-menu-fw py-lg-0 px-lg-0">
                                <div class="overflow-hidden">
                                    <div class="row mx-0">

                                        <div class="col-lg-4 pe-lg-0 order-lg-4 pe-lg-0 ms-lg-auto d-none d-lg-flex">
                                            <div
                                                class="d-flex bg-dark rounded-end overflow-hidden flex-column h-100 w-100 py-4 py-md-5 position-relative">
                                                <img alt="" src="{{ URL::asset('assets/img/shop/banners/03.jpg') }}"
                                                    class="bg-image opacity-50">
                                                <div
                                                    class="position-absolute text-center d-flex flex-column justify-content-center align-items-center text-white left-0 top-0 w-100 h-100 p-4">
                                                    <div>
                                                        <div
                                                            class="d-md-flex mb-2 justify-content-center align-items-center">
                                                            <span style="height: 1px"
                                                                class="d-none d-md-block bg-body-tertiary width-7x"></span>
                                                            <h5 class="mb-0 mx-3 text-white">
                                                                Limited Discount
                                                            </h5>
                                                            <span style="height: 1px"
                                                                class="d-none d-md-block bg-body-tertiary width-7x"></span>
                                                        </div>
                                                        <h3 class="display-5">New Arrivals
                                                        </h3>
                                                        <p class="mb-4">Order over $100 and get 30% Off</p>
                                                        <a href="{{ URL::asset('#!') }}" class="btn btn-hover-text btn-outline-white">
                                                            <span class="btn-hover-label label-default">Shop
                                                                Now</span>
                                                            <span class="btn-hover-label label-hover">Shop
                                                                Now</span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/.col-->
                                        <div class="col-lg-3 py-lg-5 mb-lg-0 mb-4">
                                            <div class="d-flex flex-column mb-3">
                                                <h5 class="dropdown-header mb-2">Topwear</h5>
    
                                                <a class="dropdown-item" href="{{ URL::asset('#!') }}">
                                                    T-shirts
                                                    <span
                                                        class="badge badge-pill bg-success py-0 small d-inline-block ms-1">New</span>
                                                </a>
                                                <a class="dropdown-item" href="{{ URL::asset('#!') }}">
                                                    Casual Shirts
                                                </a>
                                                <a class="dropdown-item" href="{{ URL::asset('#!') }}">
                                                    Formal Shirts
                                                </a>
                                                <a class="dropdown-item" href="{{ URL::asset('#!') }}">
                                                    Sweatshirts
    
                                                </a>
                                                <a class="dropdown-item" href="{{ URL::asset('#!') }}">
                                                    Jackets
                                                </a>
                                                <a class="dropdown-item" href="{{ URL::asset('#!') }}">
                                                    Blazers & Coats
                                                </a>
                                                <a class="dropdown-item" href="{{ URL::asset('#!') }}">
                                                    Sweaters
                                                </a>
                                            </div>
                                        </div>
                                        <!--/.col-->
                                        <div class="col-lg-3 py-lg-5 mb-lg-0 mb-4">
                                            <div class="d-flex flex-column">
                                                <h5 class="dropdown-header mb-2">Bottomwear</h5>
    
                                                <a class="dropdown-item" href="{{ URL::asset('#!') }}">
                                                    Jeans
                                                </a>
                                                <a class="dropdown-item" href="{{ URL::asset('#!') }}">
                                                    Trousers & Pants
                                                    <span
                                                        class="badge badge-pill bg-primary py-0 small d-inline-block ms-1">-20%</span>
                                                </a>
                                                <a class="dropdown-item" href="{{ URL::asset('#!') }}">
                                                    Shorts & Track Pants
                                                </a>
                                            </div>
                                            <div class="dropdown-divider"></div>
                                            <div class="d-flex flex-column">
                                                <h5 class="dropdown-header mb-2">Footwear</h5>
    
                                                <a class="dropdown-item" href="{{ URL::asset('#!') }}">
                                                    Shoes
                                                </a>
                                                <a class="dropdown-item" href="{{ URL::asset('#!') }}">
                                                    Sandals & Floaters
                                                </a>
                                                <a class="dropdown-item" href="{{ URL::asset('#!') }}">
                                                    Flip Flops & Socks
                                                </a>
                                            </div>
                                        </div>
                                        <!--/.col-->
                                        <div class="col-lg-2 py-lg-5">
                                            <div class="d-flex flex-column">
                                                <h5 class="dropdown-header mb-2">Accessories</h5>
                                                <a class="dropdown-item" href="{{ URL::asset('#!') }}">
                                                    Face mask
                                                </a>
                                                <a class="dropdown-item" href="{{ URL::asset('#!') }}">
                                                    Wallets & Belts
                                                </a>
                                                <a class="dropdown-item" href="{{ URL::asset('#!') }}">
                                                    Backpacks
                                                </a>
                                                <a class="dropdown-item" href="{{ URL::asset('#!') }}">
                                                    Headphones
                                                </a>
                                                <a class="dropdown-item" href="{{ URL::asset('#!') }}">
                                                    Sunglasses
                                                </a>
                                                <a class="dropdown-item" href="{{ URL::asset('#!') }}">
                                                    Belts
                                                </a>
                                                <a class="dropdown-item" href="{{ URL::asset('#!') }}">
                                                    Socks
                                                </a>
                                                <a class="dropdown-item" href="{{ URL::asset('#!') }}">
                                                    Watches
                                                </a>
                                            </div>
                                        </div>
                                        <!--/.col-->
                                    </div>
                                    <!--/.row-->
                                </div>
                            </div>
                        </li>
                        <li class="nav-item nav-item dropdown position-static ">
                            <a class="nav-link dropdown-toggle" href="{{ URL::asset('#') }}" role="button" data-bs-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                Womens
                            </a>
                            <div class="dropdown-menu dropdown-menu-fw mx-0 ps-lg-0 py-lg-0">
                                <div class="overflow-hidden">
                                    <div class="row mx-0">
                                        <div class="col-lg-5 me-lg-auto d-none d-lg-flex ps-lg-0">
                                            <div
                                                class="d-flex bg-dark rounded-start overflow-hidden flex-column h-100 w-100 py-4 py-lg-5 position-relative">
                                                <img alt="" src="{{ URL::asset('assets/img/shop/banners/02.jpg') }}"
                                                    class="bg-image opacity-50">
                                                <div
                                                    class="position-absolute text-center d-flex flex-column justify-content-end align-items-center text-white left-0 top-0 w-100 h-100 px-4">
                                                    <div class="mb-4 py-4 px-4">
                                                        <div
                                                            class="d-md-flex mb-2 justify-content-center align-items-center">
                                                            <span style="height: 1px"
                                                                class="d-none d-lg-block width-7x"></span>
                                                            <h5 class="mb-0 fw-normal mx-2">
                                                                Limited Discount
                                                            </h5>
                                                            <span style="height: 1px"
                                                                class="d-none d-lg-block width-7x"></span>
                                                        </div>
                                                        <h3 class="display-5">New Arrivals
                                                        </h3>
                                                        <p class="mb-4">Order over $100 and get 30% Off</p>
                                                        <a href="{{ URL::asset('#!') }}" class="btn btn-hover-text btn-outline-white">
                                                            <span class="btn-hover-label label-default">Shop
                                                                Now</span>
                                                            <span class="btn-hover-label label-hover">Shop
                                                                Now</span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/.col-->
                                        <div class="col-lg-3 py-lg-5 mb-lg-0 ms-lg-auto mb-4">
                                            <div class="d-flex flex-column">
                                                <h5 class="dropdown-header mb-2">Clothes</h5>
                                                <a class="dropdown-item" href="{{ URL::asset('#!') }}">
                                                    T-Shirts & Tops
                                                    <span
                                                        class="badge badge-pill bg-success py-0 small d-inline-block ms-1">New</span>
                                                </a>
                                                <a class="dropdown-item" href="{{ URL::asset('#!') }}">
                                                    Shorts
                                                </a>
                                                <a class="dropdown-item" href="{{ URL::asset('#!') }}">
                                                    T-Shirts
                                                </a>
                                                <a class="dropdown-item" href="{{ URL::asset('#!') }}">
                                                    Jeans & Skirts
                                                </a>
                                                <a class="dropdown-item" href="{{ URL::asset('#!') }}">
                                                    Shoes & Sandals
                                                </a>
                                                <a class="dropdown-item" href="{{ URL::asset('#!') }}">
                                                    Jackets
                                                </a>
                                                <a class="dropdown-item" href="{{ URL::asset('#!') }}">
                                                    Sweatshirts & Hoodies
                                                </a>
                                            </div>
                                        </div>
                                        <!--/.col-->
                                        <div class="col-lg-3 py-lg-5 mb-lg-0 ms-lg-auto mb-4">
                                            <div class="d-flex flex-column">
                                                <h5 class="dropdown-header mb-2">Accessories</h5>
                                                <a class="dropdown-item" href="{{ URL::asset('#!') }}">
                                                    Face mask
                                                </a>
                                                <a class="dropdown-item" href="{{ URL::asset('#!') }}">
                                                    Handbags
                                                </a>
                                                <a class="dropdown-item" href="{{ URL::asset('#!') }}">
                                                    Backpacks
                                                </a>
                                                <a class="dropdown-item" href="{{ URL::asset('#!') }}">
                                                    Sunglasses
                                                </a>
                                                <a class="dropdown-item" href="{{ URL::asset('#!') }}">
                                                    Watches
                                                </a>
                                                <a class="dropdown-item" href="{{ URL::asset('#!') }}">
                                                    Wallets
                                                </a>
                                                <a class="dropdown-item" href="{{ URL::asset('#!') }}">
                                                    Caps & Hats
                                                </a>
                                            </div>
                                        </div>
                                        <!--/.col-->
                                    </div>
                                    <!--/.row-->
                                </div>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" data-bs-auto-close="outside" href="{{ URL::asset('#') }}" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Shop

                            </a>
                            <div class="dropdown-menu">
                                <div class="dropend">
                                    <a class="dropdown-item dropdown-toggle" data-bs-toggle="dropdown"
                                        aria-expanded="false" href="{{ URL::asset('#') }}">Products</a>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{ URL::asset('demo-shop-products.html') }}">Sidebar</a>
                                        <a class="dropdown-item" href="{{ URL::asset('demo-shop-products-full-width.html') }}">Full
                                            width</a>
                                        <a class="dropdown-item" href="{{ URL::asset('demo-shop-product-category.html') }}">Product
                                            category</a>
                                    </div>
                                </div>
                                <div class="dropend">
                                    <a class="dropdown-item dropdown-toggle" href="{{ URL::asset('#') }}" data-bs-toggle="dropdown"
                                        aria-expanded="false">Product</a>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{ URL::asset('demo-shop-product-default.html') }}">Product
                                            Default</a>
                                        <a class="dropdown-item" href="{{ URL::asset('demo-shop-single-product-option.html') }}">Product
                                            Option</a>
                                    </div>
                                </div>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ URL::asset('demo-shop-wishlist.html') }}">Wishlist</a>
                                <a class="dropdown-item" href="{{ URL::asset('demo-shop-cart.html') }}">Cart</a>
                                <a class="dropdown-item" href="{{ URL::asset('demo-shop-checkout.html') }}">Checkout</a>
                            </div>
                        </li>

                    </ul>
                    <ul class="navbar-nav ms-lg-auto me-lg-5">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ URL::asset('#!') }}">
                                Blog
                            </a>
                        </li>
                    </ul>

                </div>
            </div>
        </nav>

        <!--:Search bar modal-->
        <div id="modal-search-bar-2" class="modal fade" tabindex="-1" aria-labelledby="modal-search-bar-2"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-top modal-md">
                <div class="modal-content position-relative border-0">
                    <div class="position-relative px-4">
                        <div
                            class="position-absolute end-0 width-6x top-0 d-flex me-4 align-items-center h-100 justify-content-center">
                            <button type="button" class="btn-close w-auto small" data-bs-dismiss="modal"
                                aria-label="Close">Cancel</button>
                        </div>
                        <form class="mb-0">
                            <div class="d-flex align-items-center">
                                <div class="d-flex flex-grow-1 align-items-center">
                                    <i class="bx bx-search fs-4"></i>
                                    <input type="text" autofocus placeholder="Search...."
                                        class="form-control shadow-none border-0 flex-grow-1 form-control-lg">
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="p-4 border-top">
                        <div class="d-flex align-items-center mb-3">
                            <i class="bx bx-trending-up fs-4"></i>
                            <h6 class="mb-0 ms-2">
                                Top searches
                            </h6>
                        </div>
                        <div class="d-flex flex-wrap align-items-center">
                            <span><a href="{{ URL::asset('#!') }}"
                                    class="badge badge-pill border text-body-secondary me-1 mb-1 px-3 py-1">Jeans</a></span>
                            <span><a href="{{ URL::asset('#!') }}"
                                    class="badge badge-pill border text-body-secondary me-1 mb-1 px-3 py-1">Shoes</a></span>
                            <span><a href="{{ URL::asset('#!') }}"
                                    class="badge badge-pill border text-body-secondary me-1 mb-1 px-3 py-1">Watches</a></span>
                            <span><a href="{{ URL::asset('#!') }}"
                                    class="badge badge-pill border text-body-secondary me-1 mb-1 px-3 py-1">Men's</a></span>
                            <span><a href="{{ URL::asset('#!') }}"
                                    class="badge badge-pill border text-body-secondary me-1 mb-1 px-3 py-1">Sneakers</a></span>
                            <span><a href="{{ URL::asset('#!') }}"
                                    class="badge badge-pill border text-body-secondary me-1 mb-1 px-3 py-1">Casual</a></span>
                            <span><a href="{{ URL::asset('#!') }}"
                                    class="badge badge-pill border text-body-secondary me-1 mb-1 px-3 py-1">Shirts</a></span>
                            <span><a href="{{ URL::asset('#!') }}"
                                    class="badge badge-pill border text-body-secondary me-1 mb-1 px-3 py-1">T-shirts</a></span>
                            <span><a href="{{ URL::asset('#!') }}"
                                    class="badge badge-pill border text-body-secondary me-1 mb-1 px-3 py-1">Lowers</a></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Offcanvas-->
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasCart" aria-labelledby="offcanvasCart">
            <div class="border-bottom offcanvas-header align-items-center justify-content-between">
                <h5 class="mb-0">Your Cart (3)</h5>
                <button type="button"
                    class="btn btn-secondary shadow-none text-reset p-0 m-0 width-3x height-3x flex-center ms-auto"
                    data-bs-dismiss="offcanvas" aria-label="Close">
                    <i class="bx bx-x fs-4"></i>
                </button>
            </div>
            <div class="offcanvas-body p-4">
                <ul class="list-unstyled no-animation mb-0">
                    <li class="d-flex py-3 border-bottom">
                        <div class="me-1">
                            <a href="{{ URL::asset('#!') }}"><img src="assets/img/shop/backpack2.jpg"
                                    class="height-10x hover-lift hover-shadow w-auto" alt=""></a>
                        </div>
                        <div class="flex-grow-1 px-4 mb-3">
                            <a href="{{ URL::asset('#!') }}" class="d-block lh-sm fw-semibold mb-2">Laptop backpack water
                                proof</a>
                            <p class="mb-0 small"><strong>$29.00</strong> x
                                <strong>1</strong>
                            </p>
                        </div>
                        <div class="d-block text-end">
                            <a href="{{ URL::asset('#!') }}" class="link-danger small text-decoration-underline">
                                Remove
                            </a>
                        </div>
                    </li>
                    <li class="d-flex py-3">
                        <div class="me-1">
                            <a href="{{ URL::asset('#!') }}"><img src="assets/img/shop/jacket1.jpg"
                                    class="height-10x hover-lift hover-shadow w-auto" alt=""></a>
                        </div>
                        <div class="flex-grow-1 px-4 mb-3">
                            <a href="{{ URL::asset('#!') }}" class="d-block lh-sm fw-semibold mb-2">Brown denim jacket for
                                mens</a>
                            <p class="mb-0 small"><strong>$64.00</strong> x
                                <strong>2</strong>
                            </p>
                        </div>
                        <div class="d-block text-end">
                            <a href="{{ URL::asset('#!') }}" class="link-danger small text-decoration-underline">
                                Remove
                            </a>
                        </div>
                    </li>
                    <li class="d-flex p-3 mb-3 border-top justify-content-between align-items-center">
                        <span class="fw-normal small text-body-tertiary">Subtotal</span>
                        <span class="fw-bold">$154.00</span>
                    </li>
                </ul>
            </div>
            <div class="offcanvas-footer p-4 border-top">
                <ul class="list-unstyled mb-0">

                    <li class="pb-2 d-grid">
                        <a href="{{ URL::asset('#') }}" class="btn btn-secondary btn-hover-arrow"><span>View
                                shopping cart</span></a>
                    </li>
                    <li class="d-grid">
                        <a href="{{ URL::asset('#') }}" class="btn btn-primary btn-hover-arrow"><span>Checkout</span></a>
                    </li>
                </ul>
            </div>
        </div>
        <!--Main content-->
        <main>
{{$slot}}
        </main>


        <x-partials.shop.footer-scripts />
        <script src="{{ URL::asset('assets/vendor/node_modules/js/swiper-bundle.min.js') }}"></script>
        <script>
            //Swiper Featured Products
            var swiperClassic = new Swiper(".swiper-featured", {
                slidesPerView: 1,
                spaceBetween: 16,
                breakpoints: {
                    480: {
                        slidesPerView: 1,
                        spaceBetween: 16,
                    },
                    768: {
                        slidesPerView: 2,
                        spaceBetween: 16,
                    },
                    1024: {
                        slidesPerView: 4,
                        spaceBetween: 16,
                    },
                },
                pagination: {
                    el: ".swiperFeatured-pagination",
                    clickable: true
                }
            });

            //Swiper testimonials
            var swiper = new Swiper(".swiper-testimonials", {
                loop:true,
                autoHeight:true,
                slidesPerView:1,
                spaceBetween:16,
        pagination: {
          el: ".swiperT-pagination", clickable: true
        },
      });
        </script>
        
<!--Autofocus input on modal open-->
<script>
    //Modal shown input autoFocus
const myModalEl = document.querySelectorAll('.modal')
myModalEl.forEach(function(el) {
  el.addEventListener('shown.bs.modal', event =>{
    event.preventDefault();
    var input = document.querySelector("[autofocus]");
    input.focus();
  })  
})
</script>
    </body>

</html>
