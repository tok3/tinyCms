   <!--begin:message-->
   <div class="position-relative px-4 text-center py-2 text-bg-primary">
    <small>Worldwide shipping available</small>
  </div>
  <!--/end:message-->
 <!--begin:Header shop-->
 <nav class="navbar navbar-search-w-icons position-sticky shadow top-0 z-fixed navbar-expand-lg navbar-light bg-body">
    <div class="container-fluid position-relative">
        <a class="navbar-brand" href="index.html">
            <img src="assets/img/logo/logo-shop.svg" alt="" class="img-fluid navbar-brand-light">
            <img src="assets/img/logo/logo-shop-white.svg" alt="" class="img-fluid navbar-brand-dark">
        </a>
        <div class="d-flex align-items-center navbar-no-collapse-items navbar-nav flex-row order-lg-last">
            <button class="navbar-toggler order-last" type="button" data-bs-toggle="collapse"
                data-bs-target="#mainNavbarTheme" aria-controls="mainNavbarTheme" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon">
                    <i></i>
                </span>
            </button>
            <div class="nav-item ms-0 me-3 me-lg-2">
                <a href="demo-shop-wishlist.html" class="nav-link lh-1 position-relative">
                    <i class="bx bx-heart fs-4"></i>
                </a>
            </div>
            <div class="nav-item me-3 me-lg-2 ms-0">
                <a href="#offcanvasCart" data-bs-toggle="offcanvas" class="nav-link lh-1 position-relative">
                    <i class="bx bx-shopping-bag fs-4"></i>
                    <!--card badge-->
                    <span
                        class="badge d-none d-lg-flex p-0 position-absolute end-0 top-0 me-n1 mt-n1 lh-1 fw-semibold width-1x height-1x bg-white text-dark shadow-sm rounded-circle flex-center">3</span>
                </a>
            </div>
            <!--Search collapse trigger(hidden in desktop laptop)-->
            <div class="nav-item ms-0 me-2 d-lg-none">
                <a href="#searchCollapse" data-bs-target="#" data-bs-toggle="collapse" class="nav-link search-link lh-1">
                    <i class="bx bx-search-alt-2 fs-4"></i>
                </a>
            </div>
            <div class="nav-item dropdown me-3 me-lg-0">
                <a href="#" class="nav-link p-0" data-bs-auto-close="outside" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    <i class="bx bx-user fs-4"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-xs position-absolute p-4">

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
                            <input type="email" required class="form-control" autofocus=""
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
                                    <a href="#" class="text-body-secondary link-decoration">Forget Password?
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
                            Don’t have an account yet? <a href="page-account-signup.html"
                                class="ms-2 pb-0 fw-semibold link-underline">Sign Up</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
        <div class="collapse navbar-collapse" id="mainNavbarTheme">
            <ul class="navbar-nav me-lg-auto ms-xl-5 ms-lg-2">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle  @@if (context.page === 'home') {active}" href="#" role="button" data-bs-toggle="dropdown"
                        aria-haspopup="false" aria-expanded="false">
                        Home
                    </a>
                    <div class="dropdown-menu">
                        <a href="demo-shop.html" class="dropdown-item">01 Default</a>
                        <a href="demo-shop-home-02.html" class="dropdown-item">02 Home Option</a>
                    </div>
                </li>

                <li class="nav-item nav-item dropdown position-lg-static">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        Mens
                    </a>
                    <div class="dropdown-menu dropdown-menu-fw py-lg-0 px-lg-0">
                      <div class="overflow-hidden">
                        <div class="row mx-0">

                            <div class="col-lg-4 pe-lg-0 order-lg-4 pe-lg-0 ms-lg-auto d-none d-lg-flex">
                                <div
                                    class="d-flex bg-dark rounded-end overflow-hidden flex-column h-100 w-100 py-4 py-md-5 position-relative">
                                    <img alt="" src="assets/img/shop/banners/03.jpg"
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
                                            <a href="#!" class="btn btn-hover-text btn-outline-white">
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

                                    <a class="dropdown-item" href="#!">
                                        T-shirts
                                        <span
                                            class="badge badge-pill bg-success py-0 small d-inline-block ms-1">New</span>
                                    </a>
                                    <a class="dropdown-item" href="#!">
                                        Casual Shirts
                                    </a>
                                    <a class="dropdown-item" href="#!">
                                        Formal Shirts
                                    </a>
                                    <a class="dropdown-item" href="#!">
                                        Sweatshirts

                                    </a>
                                    <a class="dropdown-item" href="#!">
                                        Jackets
                                    </a>
                                    <a class="dropdown-item" href="#!">
                                        Blazers & Coats
                                    </a>
                                    <a class="dropdown-item" href="#!">
                                        Sweaters
                                    </a>
                                </div>
                            </div>
                            <!--/.col-->
                            <div class="col-lg-3 py-lg-5 mb-lg-0 mb-4">
                                <div class="d-flex flex-column">
                                    <h5 class="dropdown-header mb-2">Bottomwear</h5>

                                    <a class="dropdown-item" href="#!">
                                        Jeans
                                    </a>
                                    <a class="dropdown-item" href="#!">
                                        Trousers & Pants
                                        <span
                                            class="badge badge-pill bg-primary py-0 small d-inline-block ms-1">-20%</span>
                                    </a>
                                    <a class="dropdown-item" href="#!">
                                        Shorts & Track Pants
                                    </a>
                                </div>
                                <div class="dropdown-divider"></div>
                                <div class="d-flex flex-column">
                                    <h5 class="dropdown-header mb-2">Footwear</h5>

                                    <a class="dropdown-item" href="#!">
                                        Shoes
                                    </a>
                                    <a class="dropdown-item" href="#!">
                                        Sandals & Floaters
                                    </a>
                                    <a class="dropdown-item" href="#!">
                                        Flip Flops & Socks
                                    </a>
                                </div>
                            </div>
                            <!--/.col-->
                            <div class="col-lg-2 py-lg-5">
                                <div class="d-flex flex-column">
                                    <h5 class="dropdown-header mb-2">Accessories</h5>
                                    <a class="dropdown-item" href="#!">
                                        Face mask
                                    </a>
                                    <a class="dropdown-item" href="#!">
                                        Wallets & Belts
                                    </a>
                                    <a class="dropdown-item" href="#!">
                                        Backpacks
                                    </a>
                                    <a class="dropdown-item" href="#!">
                                        Headphones
                                    </a>
                                    <a class="dropdown-item" href="#!">
                                        Sunglasses
                                    </a>
                                    <a class="dropdown-item" href="#!">
                                        Belts
                                    </a>
                                    <a class="dropdown-item" href="#!">
                                        Socks
                                    </a>
                                    <a class="dropdown-item" href="#!">
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
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        Womens
                    </a>
                    <div class="dropdown-menu dropdown-menu-fw px-lg-0 py-lg-0">
                        <div class="overflow-hidden">
                            <div class="row mx-0">
                                <div class="col-lg-5 me-lg-auto d-none d-lg-flex ps-lg-0">
                                    <div
                                        class="d-flex bg-dark rounded-start overflow-hidden flex-column h-100 w-100 py-4 py-lg-5 position-relative">
                                        <img alt="" src="assets/img/shop/banners/02.jpg"
                                            class="bg-image opacity-50">
                                        <div
                                            class="position-absolute text-center d-flex flex-column justify-content-end align-items-center text-white left-0 top-0 w-100 h-100 px-4">
                                            <div class="mb-4 py-4 px-4">
                                                <div
                                                    class="d-md-flex mb-2 justify-content-center align-items-center">
                                                    <span style="height: 1px"
                                                        class="d-none d-lg-block bg-white width-7x"></span>
                                                    <h5 class="mb-0 fw-normal mx-2">
                                                        Limited Discount
                                                    </h5>
                                                    <span style="height: 1px"
                                                        class="d-none d-lg-block bg-white width-7x"></span>
                                                </div>
                                                <h3 class="display-5">New Arrivals
                                                </h3>
                                                <p class="mb-4">Order over $100 and get 30% Off</p>
                                                <a href="#!" class="btn btn-hover-text btn-outline-white">
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
                                        <a class="dropdown-item" href="#!">
                                            T-Shirts & Tops
                                            <span
                                                class="badge badge-pill bg-success py-0 small d-inline-block ms-1">New</span>
                                        </a>
                                        <a class="dropdown-item" href="#!">
                                            Shorts
                                        </a>
                                        <a class="dropdown-item" href="#!">
                                            T-Shirts
                                        </a>
                                        <a class="dropdown-item" href="#!">
                                            Jeans & Skirts
                                        </a>
                                        <a class="dropdown-item" href="#!">
                                            Shoes & Sandals
                                        </a>
                                        <a class="dropdown-item" href="#!">
                                            Jackets
                                        </a>
                                        <a class="dropdown-item" href="#!">
                                            Sweatshirts & Hoodies
                                        </a>
                                    </div>
                                </div>
                                <!--/.col-->
                                <div class="col-lg-3 py-lg-5 mb-lg-0 ms-lg-auto mb-4">
                                    <div class="d-flex flex-column">
                                        <h5 class="dropdown-header mb-2">Accessories</h5>
                                        <a class="dropdown-item" href="#!">
                                            Face mask
                                        </a>
                                        <a class="dropdown-item" href="#!">
                                            Handbags
                                        </a>
                                        <a class="dropdown-item" href="#!">
                                            Backpacks
                                        </a>
                                        <a class="dropdown-item" href="#!">
                                            Sunglasses
                                        </a>
                                        <a class="dropdown-item" href="#!">
                                            Watches
                                        </a>
                                        <a class="dropdown-item" href="#!">
                                            Wallets
                                        </a>
                                        <a class="dropdown-item" href="#!">
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
                    <a class="nav-link dropdown-toggle @@if (context.page === 'shop') {active}" data-bs-auto-close="outside" href="#" role="button"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Shop
                    </a>
                    <div class="dropdown-menu">
                        <div class="dropend">
                            <a class="dropdown-item dropdown-toggle" data-bs-toggle="dropdown"
                                aria-expanded="false" href="#">Products</a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="demo-shop-products.html">Sidebar</a>
                                <a class="dropdown-item" href="demo-shop-products-full-width.html">Full
                                    width</a>
                                <a class="dropdown-item" href="demo-shop-product-category.html">Product
                                    category</a>
                            </div>
                        </div>
                        <div class="dropend">
                            <a class="dropdown-item dropdown-toggle" href="#" data-bs-toggle="dropdown"
                                aria-expanded="false">Product</a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="demo-shop-product-default.html">Product
                                    Default</a>
                                <a class="dropdown-item" href="demo-shop-single-product-option.html">Product
                                    Option</a>
                            </div>
                        </div>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="demo-shop-wishlist.html">Wishlist</a>
                        <a class="dropdown-item" href="demo-shop-cart.html">Cart</a>
                        <a class="dropdown-item" href="demo-shop-checkout.html">Checkout</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#!">
                        Blog
                    </a>
                </li>
            </ul>
        </div>
        
        <div class="collapse collapse-search ms-xl-auto me-lg-3 d-lg-block" style="--navbar-search-width:280px;" id="searchCollapse">
            <form action="#">
                <div class="position-relative mt-3 mt-lg-0">
                    <span class="position-absolute start-0 top-50 translate-middle-y ms-3 opacity-50">
                        <i class="bx bx-search-alt-2"></i>
                    </span>
                    <input type="text" placeholder="Search Products..." class="form-control ps-6 rounded-pill">
                    <!--With Submit button-->
                    <!-- <button class="btn position-absolute end-0 top-0 flex-center p-0 width-4x h-100 rounded-pill btn-white">
                        <i class="bx bx-search-alt-2"></i>
                    </button> 
                    <input type="text" placeholder="Search here..." class="form-control border-0 shadow-none ps-4 pe-6 rounded-pill">
               -->
                </div>
            </form>
        </div>
    </div>
</nav>
<!--/end:Header shop-->

<!--begin:Search bar modal-->
<div id="modal-search-bar-2" class="modal fade" tabindex="-1" aria-labelledby="modal-search-bar-2"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-top modal-md">
        <div class="modal-content position-relative border-0">
            <div class="position-relative px-4">
                <div
                    class="position-absolute end-0 width-7x top-0 d-flex me-4 align-items-center h-100 justify-content-center">
                    <button type="button" class="btn-close w-auto small" data-bs-dismiss="modal"
                        aria-label="Close">Cancel</button>
                </div>
                <form class="mb-0">
                    <div class="d-flex align-items-center">
                        <div class="d-flex flex-grow-1 align-items-center">
                            <i class="bx bx-search fs-4"></i>
                            <input type="text" placeholder="Search...."
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
                    <span><a href="#!"
                            class="badge badge-pill border text-body-secondary me-1 mb-1 px-3 py-1">Jeans</a></span>
                    <span><a href="#!"
                            class="badge badge-pill border text-body-secondary me-1 mb-1 px-3 py-1">Shoes</a></span>
                    <span><a href="#!"
                            class="badge badge-pill border text-body-secondary me-1 mb-1 px-3 py-1">Watches</a></span>
                    <span><a href="#!"
                            class="badge badge-pill border text-body-secondary me-1 mb-1 px-3 py-1">Men's</a></span>
                    <span><a href="#!"
                            class="badge badge-pill border text-body-secondary me-1 mb-1 px-3 py-1">Sneakers</a></span>
                    <span><a href="#!"
                            class="badge badge-pill border text-body-secondary me-1 mb-1 px-3 py-1">Casual</a></span>
                    <span><a href="#!"
                            class="badge badge-pill border text-body-secondary me-1 mb-1 px-3 py-1">Shirts</a></span>
                    <span><a href="#!"
                            class="badge badge-pill border text-body-secondary me-1 mb-1 px-3 py-1">T-shirts</a></span>
                    <span><a href="#!"
                            class="badge badge-pill border text-body-secondary me-1 mb-1 px-3 py-1">Lowers</a></span>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/end:Search bar modal-->

<!--begin:Cart offcanvas-->
<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasCart" aria-labelledby="offcanvasCart">
    <div class="border-bottom offcanvas-header align-items-center justify-content-between">
        <h5 class="mb-0">Your Cart (3)</h5>
        <button type="button"
        class="btn btn-secondary p-0 m-0 width-3x height-3x flex-center ms-auto"
        data-bs-dismiss="offcanvas" aria-label="Close">
        <i class="bx bx-x fs-4"></i>
    </button>
    </div>
    <div class="offcanvas-body p-4">
        <ul class="list-unstyled no-animation mb-0">
            <li class="d-flex py-3 border-bottom">
                <div class="me-1">
                    <a href="#!"><img src="assets/img/shop/backpack2.jpg"
                            class="height-10x hover-lift rounded hover-shadow w-auto" alt=""></a>
                </div>
                <div class="flex-grow-1 px-4 mb-3">
                    <a href="#!" class="d-block lh-sm fw-semibold mb-2">Laptop backpack water
                        proof</a>
                    <p class="mb-0 small"><strong>$36.00</strong> x
                        <strong>1</strong>
                    </p>
                </div>
                <div class="d-block text-end">
                    <a href="#!" class="link-danger small text-decoration-underline">
                        Remove
                    </a>
                </div>
            </li>
            <li class="d-flex py-3">
                <div class="me-1">
                    <a href="#!"><img src="assets/img/shop/jacket1.jpg"
                            class="height-10x hover-lift hover-shadow rounded w-auto" alt=""></a>
                </div>
                <div class="flex-grow-1 px-4 mb-3">
                    <a href="#!" class="d-block lh-sm fw-semibold mb-2">Brown denim jacket for
                        mens</a>
                    <p class="mb-0 small"><strong>$59.00</strong> x
                        <strong>2</strong>
                    </p>
                </div>
                <div class="d-block text-end">
                    <a href="#!" class="link-danger small text-decoration-underline">
                        Remove
                    </a>
                </div>
            </li>
            <li class="d-flex py-3 border-top justify-content-between align-items-center">
                <span class="fw-normal">Subtotal</span>
                <h5 class="mb-0">$154.00</h5>
            </li>
        </ul>
    </div>
    <div class="offcanvas-footer p-4 border-top">
        <ul class="list-unstyled mb-0">

            <li class="pb-2 d-grid">
                <a href="#" class="btn btn-secondary btn-hover-arrow"><span>View
                        shopping cart</span></a>
            </li>
            <li class="d-grid">
                <a href="#" class="btn btn-primary btn-hover-arrow"><span>Checkout</span></a>
            </li>
        </ul>
    </div>
</div>
<!--/end:Cart offcanvas-->