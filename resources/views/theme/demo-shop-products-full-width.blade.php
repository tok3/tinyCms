<x-assan-layout layout-type="{{$layoutType}}">

       <!--Page header start-->
       <section class="position-relative overflow-hidden">
        
        <div class="container-fluid">
          <div class="py-8 py-lg-11 bg-dark text-white position-relative">
            <!--background image-->
            <img src="{{ URL::asset('assets/img/shop/banners/06.jpg') }}" class="bg-image bg-top-center opacity-75" alt="">
          
            <div class="row align-items-center position-relative">
              <div class="col-lg-10 mx-auto text-center">
                <nav class="d-flex justify-content-center" aria-label="breadcrumb">
                  <ol class="breadcrumb mb-3">
                    <li class="breadcrumb-item">
                      <a href="{{ URL::asset('#!') }}">Home</a>
                    </li>
                    <li class="breadcrumb-item active">
                      Shop
                    </li>
                  </ol>
                </nav>
                <h1 class="mb-0 display-3">Full width
                </h1>
              </div>
            </div>
            <!--/.row-->
          </div>
        </div>
      </section>
      <section class="position-relative">
        <div class="container py-9 py-lg-11 position-relative">
          <div class="row justify-content-between">
            <!--Products column-->
            <div class="col-md-12">
              <!--Products top bar-->
              <div class="row mb-3 align-items-center">
                <div class="col-5 col-md-3 mb-4 mb-md-0">
                  <a href="{{ URL::asset('#offcanvas_shop_filters') }}" data-bs-toggle="offcanvas" aria-expanded="false"
                    class="btn btn-secondary btn-sm">
                    <i class="bx bx-filter fs-5"></i> Filter
                  </a>
                </div>
                <div class="col-7 text-end col-md-5 mb-4 mb-md-0">
                  <span>Showing 1-8 of 190 items</span>
                </div>
                <div class="col-sm-5 col-md-4 ms-auto">
                  <div class="d-flex align-items-center">
                    <span class="small text-body-secondary">Short by</span>
                    <div class="flex-grow-1 ps-2">
                      <select name="shortBy" class="form-control form-control-sm"
                        data-choices='{"searchEnabled":false,"itemSelectText":""}' id="product-shortby">
                        <option value="Best selling" selected> Best selling</option>
                        <option value="Best rated"> Best rated</option>
                        <option value="Most recent"> Most recent</option>
                        <option value="Price - Low to High"> Price - Low to High</option>
                        <option value="Price - High to Low">Price - High to Low</option>
                      </select>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row mb-5">
            <div class="col-md-6 col-xl-4 mb-4">
              <!--:card-hover-expand-->
              <div class="card overflow-hidden hover-lift card-product">
                <div class="card-product-header p-3 d-block overflow-hidden position-relative">
                  <a href="{{ URL::asset('#!') }}">
                    <img src="{{ URL::asset('assets/img/shop/products/03.jpg') }}" class="img-fluid rounded" alt="Product">
                  </a>
                </div>
                <div class="card-product-body p-3 pt-0 text-center">
                  <a href="{{ URL::asset('#!') }}" class="fs-5 fw-semibold d-block position-relative mb-2">Product Title</a>
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
            <div class="col-md-6 col-xl-4 mb-4">
              <!--:card-hover-expand-->
              <div class="card overflow-hidden hover-lift card-product">
                <div class="card-product-header p-3 d-block overflow-hidden position-relative">
                  <a href="{{ URL::asset('#!') }}">
                    <img src="{{ URL::asset('assets/img/shop/products/09.jpg') }}" class="img-fluid rounded" alt="Product">
                  </a>

                  <!--Product Label-->
                  <span
                    class="badge rounded-pill bg-primary position-absolute start-0 top-0 mt-4 ms-4">Bestseller</span>
                </div>
                <div class="card-product-body p-3 pt-0 text-center">
                  <a href="{{ URL::asset('#!') }}" class="fs-5 fw-semibold d-block position-relative mb-2">Product Title</a>
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
            <div class="col-md-6 col-xl-4 mb-4">
              <!--:card-hover-expand-->
              <div class="card overflow-hidden hover-lift card-product">
                <div class="card-product-header p-3 d-block overflow-hidden position-relative">
                  <a href="{{ URL::asset('#!') }}">
                    <img src="{{ URL::asset('assets/img/shop/products/04.jpg') }}" class="img-fluid rounded" alt="Product">
                  </a>
                </div>
                <div class="card-product-body p-3 pt-0 text-center">
                  <a href="{{ URL::asset('#!') }}" class="fs-5 fw-semibold d-block position-relative mb-2">Product Title</a>
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
            <div class="col-md-6 col-xl-4 mb-4">
              <!--:card-hover-expand-->
              <div class="card overflow-hidden hover-lift card-product">
                <div class="card-product-header p-3 d-block overflow-hidden position-relative">
                  <a href="{{ URL::asset('#!') }}">
                    <img src="{{ URL::asset('assets/img/shop/products/05.jpg') }}" class="img-fluid rounded" alt="Product">
                  </a>

                  <!--Product Label-->
                  <span class="badge rounded-pill bg-success position-absolute start-0 top-0 mt-4 ms-4">New</span>
                </div>
                <div class="card-product-body p-3 pt-0 text-center">
                  <a href="{{ URL::asset('#!') }}" class="fs-5 fw-semibold d-block position-relative mb-2">Product Title</a>
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
            <div class="col-md-6 col-xl-4 mb-4">
              <!--:card-hover-expand-->
              <div class="card overflow-hidden hover-lift card-product">
                <div class="card-product-header p-3 d-block overflow-hidden position-relative">
                  <a href="{{ URL::asset('#!') }}">
                    <img src="{{ URL::asset('assets/img/shop/products/06.jpg') }}" class="img-fluid rounded" alt="Product">
                  </a>
                </div>
                <div class="card-product-body p-3 pt-0 text-center">
                  <a href="{{ URL::asset('#!') }}" class="fs-5 fw-semibold d-block position-relative mb-2">Product Title</a>
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
            <div class="col-md-6 col-xl-4 mb-4">
              <!--:card-hover-expand-->
              <div class="card overflow-hidden hover-lift card-product">
                <div class="card-product-header p-3 d-block overflow-hidden position-relative">
                  <a href="{{ URL::asset('#!') }}">
                    <img src="{{ URL::asset('assets/img/shop/products/07.jpg') }}" class="img-fluid rounded" alt="Product">
                  </a>

                  <!--Product Label-->
                  <span class="badge rounded-pill bg-warning position-absolute start-0 top-0 mt-4 ms-4">Hot</span>
                </div>
                <div class="card-product-body p-3 pt-0 text-center">
                  <a href="{{ URL::asset('#!') }}" class="fs-5 fw-semibold d-block position-relative mb-2">Product Title</a>
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
            <div class="col-md-12 mb-4">
              <div class="position-relative vh-50 overflow-hidden rounded">
                <img src="{{ URL::asset('assets/img/shop/banners/01.jpg') }}" class="bg-image" alt="">
                <div
                  class="position-relative z-1 w-md-95 px-4 ms-auto d-flex h-100 align-items-center justify-content-start">
                  <div>
                    <h2 class="mb-1 text-dark display-5">Girls Sneakers</h2>
                    <p class="mb-4 text-secondary lead">New arrivals sneakers collection </p>
                    <a href="{{ URL::asset('#!') }}" class="btn btn-primary btn-lg hover-lift">shop now</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-xl-4 mb-4">
              <!--:card-hover-expand-->
              <div class="card overflow-hidden hover-lift card-product">
                <div class="card-product-header p-3 d-block overflow-hidden position-relative">
                  <a href="{{ URL::asset('#!') }}">
                    <img src="{{ URL::asset('assets/img/shop/products/08.jpg') }}" class="img-fluid rounded" alt="Product">
                  </a>
                </div>
                <div class="card-product-body p-3 pt-0 text-center">
                  <a href="{{ URL::asset('#!') }}" class="fs-5 fw-semibold d-block position-relative mb-2">Product Title</a>
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
            <div class="col-md-6 col-xl-4 mb-4">
              <!--:card-hover-expand-->
              <div class="card overflow-hidden hover-lift card-product">
                <div class="card-product-header p-3 d-block overflow-hidden position-relative">
                  <a href="{{ URL::asset('#!') }}">
                    <img src="{{ URL::asset('assets/img/shop/products/09.jpg') }}" class="img-fluid rounded" alt="Product">
                  </a>

                  <!--Product Label-->
                  <span class="badge rounded-pill bg-danger position-absolute start-0 top-0 mt-4 ms-4">-20%</span>
                </div>
                <div class="card-product-body p-3 pt-0 text-center">
                  <a href="{{ URL::asset('#!') }}" class="fs-5 fw-semibold d-block position-relative mb-2">Product Title</a>
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
            <div class="col-md-6 col-xl-4 mb-4">
              <!--:card-hover-expand-->
              <div class="card overflow-hidden hover-lift card-product">
                <div class="card-product-header p-3 d-block overflow-hidden position-relative">
                  <a href="{{ URL::asset('#!') }}">
                    <img src="{{ URL::asset('assets/img/shop/products/10.jpg') }}" class="img-fluid rounded" alt="Product">
                  </a>
                </div>
                <div class="card-product-body p-3 pt-0 text-center">
                  <a href="{{ URL::asset('#!') }}" class="fs-5 fw-semibold d-block position-relative mb-2">Product Title</a>
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
          </div>
          <div class="d-grid d-sm-flex justify-content-sm-center">
            <a href="{{ URL::asset('#') }}" class="btn btn-outline-primary rounded-pill btn-lg btn-hover-text">
              <span class="btn-hover-label label-default">Load more</span>
              <span class="btn-hover-label label-hover">Load more</span>
            </a>
          </div>
        </div>
        </div>
      </section>
      <section class="position-relative bg-body-tertiary overflow-hidden">
        <div class="container py-7 position-relative">
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

      <!--Filter offcanvas-->
      <div class="offcanvas offcanvas-end" id="offcanvas_shop_filters">
        <!--:Offcanvas-header-->
        <div class="offcanvas-header border-bottom">
          <h5 class="mb-0">Filter by</h5>
          <button data-bs-dismiss="offcanvas"
            class="btn btn-secondary p-0 width-3x height-3x rounded-circle flex-center">
            <i class="bx bx-x"></i>
          </button>
        </div>
        <div class="offcanvas-body pt-5">
          <!--:Sidebar widget card-->
          <div class="mb-4">
            <!--:Title-->
            <h6 class="mb-2 text-body-secondary small text-uppercase">Categories:</h6>
            <!--:Collapse categories-->
            <div class="collapse-group collapse d-flex flex-column">
              <div class="collapse d-block">
                <div class="nav flex-column">
                  <a href="{{ URL::asset('#mens') }}" class="nav-link" data-bs-toggle="collapse" aria-expanded="false">Mens</a>
                  <div class="collapse" id="mens">
                    <div class="nav nav-level-2 flex-column">
                      <a href="{{ URL::asset('#') }}" class="nav-link small">Shirts</a>
                      <a href="{{ URL::asset('#') }}" class="nav-link small">Jeans</a>
                      <a href="{{ URL::asset('#') }}" class="nav-link small">Shoes</a>
                      <a href="{{ URL::asset('#') }}" class="nav-link small">Trousers</a>
                      <a href="{{ URL::asset('#acc_list') }}" data-bs-toggle="collapse" aria-expanded="false"
                        class="nav-link small">Accessories</a>
                      <div class="collapse" id="acc_list">
                        <div class="nav flex-column nav-level-3">
                          <a href="{{ URL::asset('#') }}" class="nav-link small">Belts</a>
                          <a href="{{ URL::asset('#') }}" class="nav-link small">Watches</a>
                          <a href="{{ URL::asset('#') }}" class="nav-link small">Sunglasses</a>
                          <a href="{{ URL::asset('#') }}" class="nav-link small">Wallets</a>
                        </div>
                      </div>
                    </div>
                  </div>
                  <a href="{{ URL::asset('#womens') }}" class="nav-link" data-bs-toggle="collapse" aria-expanded="false">Womens</a>
                  <div class="collapse" id="womens">
                    <div class="nav nav-level-2 flex-column">
                      <a href="{{ URL::asset('#') }}" class="nav-link small">T-shirts & tops</a>
                      <a href="{{ URL::asset('#') }}" class="nav-link small">Shorts</a>
                      <a href="{{ URL::asset('#') }}" class="nav-link small">Shoes</a>
                      <a href="{{ URL::asset('#') }}" class="nav-link small">Trousers</a>
                      <a href="{{ URL::asset('#acc_list_womens') }}" data-bs-toggle="collapse" aria-expanded="false"
                        class="nav-link small">Accessories</a>
                      <div class="collapse" id="acc_list_womens">
                        <div class="nav flex-column nav-level-3">
                          <a href="{{ URL::asset('#') }}" class="nav-link small">Face mask</a>
                          <a href="{{ URL::asset('#') }}" class="nav-link small">Socks</a>
                          <a href="{{ URL::asset('#') }}" class="nav-link small">Sunglasses</a>
                          <a href="{{ URL::asset('#') }}" class="nav-link small">Wallets</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!--:Sidebar widget card-->
          <div class="mb-5">
            <!--:Title-->
            <h6 class="mb-4 text-body-secondary small text-uppercase">Colors:</h6>
            <!--:list-->
            <ul class="list-unstyled mb-0">
              <li class="btn-group mb-3">
                <div class="d-flex flex-wrap gap-2" role="group" aria-label="Basic radio toggle button group">
                  <input type="checkbox" class="btn-check" name="btnradio" id="color_black">
                  <label
                    class="shop-product-color border-0 btn p-0 me-1 width-3x height-3x flex-center rounded-circle text-white product-black"
                    for="color_black"></label>
                  <input type="checkbox" class="btn-check" name="btnradio" id="color_blue">
                  <label
                    class="shop-product-color border-0 btn p-0 me-1 width-3x height-3x flex-center rounded-circle text-white product-blue"
                    for="color_blue"></label>
                  <input type="checkbox" class="btn-check" name="btnradio" id="color_brown">
                  <label
                    class="shop-product-color border-0 btn p-0 me-1 width-3x height-3x flex-center rounded-circle text-white product-brown"
                    for="color_brown"></label>
                  <input type="checkbox" class="btn-check" name="btnradio" id="color_red">
                  <label
                    class="shop-product-color border-0 btn p-0 me-1 width-3x height-3x flex-center rounded-circle text-white product-red"
                    for="color_red"></label>
                  <input type="checkbox" class="btn-check" name="btnradio" id="color_yellow">
                  <label
                    class="shop-product-color border-0 btn p-0 me-1 width-3x height-3x flex-center rounded-circle text-dark product-yellow"
                    for="color_yellow"></label>
                  <input type="checkbox" class="btn-check" name="btnradio" id="color_pink">
                  <label
                    class="shop-product-color border-0 btn p-0 me-1 width-3x height-3x flex-center rounded-circle text-dark product-pink"
                    for="color_pink"></label>
                  <input type="checkbox" class="btn-check" name="btnradio" id="color_purple">
                  <label
                    class="shop-product-color border-0 btn p-0 me-1 width-3x height-3x flex-center rounded-circle text-white product-purple"
                    for="color_purple"></label>

                  <input type="checkbox" class="btn-check" name="btnradio" id="color_white">
                  <label
                    class="shop-product-color border-0 btn p-0 me-1 width-3x height-3x flex-center rounded-circle text-dark border product-white"
                    for="color_white"></label>
                </div>
              </li>
            </ul>
          </div>
          <!--:Sidebar widget card-->
          <div class="mb-5">
            <!--:Title-->
            <h6 class="mb-4 text-body-secondary small text-uppercase">Brands:</h6>
            <!--:list-->
            <ul class="list-unstyled pe-2 ps-1 py-1 mb-0" data-simplebar style="max-height:9.65rem;">
              <li class="widget-filter-item d-flex justify-content-between align-items-center mb-1">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="adidas">
                  <label class="form-check-label widget-filter-item-text" for="adidas">Adidas</label>
                </div><span class="fs-xs text-body-secondary">122</span>
              </li>
              <li class="widget-filter-item d-flex justify-content-between align-items-center mb-1">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="ataylor">
                  <label class="form-check-label widget-filter-item-text" for="ataylor">Flying Machine</label>
                </div><span class="fs-xs text-body-secondary">15</span>
              </li>
              <li class="widget-filter-item d-flex justify-content-between align-items-center mb-1">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="armani">
                  <label class="form-check-label widget-filter-item-text" for="armani">Puma</label>
                </div><span class="fs-xs text-body-secondary">18</span>
              </li>
              <li class="widget-filter-item d-flex justify-content-between align-items-center mb-1">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="banana">
                  <label class="form-check-label widget-filter-item-text" for="banana">US Polo</label>
                </div><span class="fs-xs text-body-secondary">48</span>
              </li>
              <li class="widget-filter-item d-flex justify-content-between align-items-center mb-1">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="bilabong">
                  <label class="form-check-label widget-filter-item-text" for="bilabong">Arrow</label>
                </div><span class="fs-xs text-body-secondary">48</span>
              </li>
              <li class="widget-filter-item d-flex justify-content-between align-items-center mb-1">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="birkenstock">
                  <label class="form-check-label widget-filter-item-text" for="birkenstock">Allen Solly</label>
                </div><span class="fs-xs text-body-secondary">17</span>
              </li>
              <li class="widget-filter-item d-flex justify-content-between align-items-center mb-1">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="klein">
                  <label class="form-check-label widget-filter-item-text" for="klein">Calvin Klein</label>
                </div><span class="fs-xs text-body-secondary">75</span>
              </li>
              <li class="widget-filter-item d-flex justify-content-between align-items-center mb-1">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="columbia">
                  <label class="form-check-label widget-filter-item-text" for="columbia">New Balance</label>
                </div><span class="fs-xs text-body-secondary">93</span>
              </li>
              <li class="widget-filter-item d-flex justify-content-between align-items-center mb-1">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="converse">
                  <label class="form-check-label widget-filter-item-text" for="converse">Converse</label>
                </div><span class="fs-xs text-body-secondary">56</span>
              </li>
              <li class="widget-filter-item d-flex justify-content-between align-items-center mb-1">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="dockers">
                  <label class="form-check-label widget-filter-item-text" for="dockers">Dockers</label>
                </div><span class="fs-xs text-body-secondary">38</span>
              </li>
              <li class="widget-filter-item d-flex justify-content-between align-items-center mb-1">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="hanes">
                  <label class="form-check-label widget-filter-item-text" for="hanes">Lee cooper</label>
                </div><span class="fs-xs text-body-secondary">92</span>
              </li>
              <li class="widget-filter-item d-flex justify-content-between align-items-center mb-1">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="levis">
                  <label class="form-check-label widget-filter-item-text" for="levis">Levi's</label>
                </div><span class="fs-xs text-body-secondary">234</span>
              </li>
              <li class="widget-filter-item d-flex justify-content-between align-items-center mb-1">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="lee">
                  <label class="form-check-label widget-filter-item-text" for="lee">Lee</label>
                </div><span class="fs-xs text-body-secondary">143</span>
              </li>
              <li class="widget-filter-item d-flex justify-content-between align-items-center mb-1">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="newbalance">
                  <label class="form-check-label widget-filter-item-text" for="newbalance">New Balance</label>
                </div><span class="fs-xs text-body-secondary">189</span>
              </li>
              <li class="widget-filter-item d-flex justify-content-between align-items-center mb-1">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="nike">
                  <label class="form-check-label widget-filter-item-text" for="nike">Nike</label>
                </div><span class="fs-xs text-body-secondary">138</span>
              </li>
              <li class="widget-filter-item d-flex justify-content-between align-items-center mb-1">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="navy">
                  <label class="form-check-label widget-filter-item-text" for="navy">Old Navy</label>
                </div><span class="fs-xs text-body-secondary">37</span>
              </li>
              <li class="widget-filter-item d-flex justify-content-between align-items-center mb-1">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="polo">
                  <label class="form-check-label widget-filter-item-text" for="polo">Polo Ralph Lauren</label>
                </div><span class="fs-xs text-body-secondary">83</span>
              </li>
              <li class="widget-filter-item d-flex justify-content-between align-items-center mb-1">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="puma">
                  <label class="form-check-label widget-filter-item-text" for="puma">Puma</label>
                </div><span class="fs-xs text-body-secondary">73</span>
              </li>
              <li class="widget-filter-item d-flex justify-content-between align-items-center mb-1">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="reebok">
                  <label class="form-check-label widget-filter-item-text" for="reebok">Reebok</label>
                </div><span class="fs-xs text-body-secondary">59</span>
              </li>
              <li class="widget-filter-item d-flex justify-content-between align-items-center mb-1">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="hilfiger">
                  <label class="form-check-label widget-filter-item-text" for="hilfiger">Tommy Hilfiger</label>
                </div><span class="fs-xs text-body-secondary">74</span>
              </li>
              <li class="widget-filter-item d-flex justify-content-between align-items-center mb-1">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="urban">
                  <label class="form-check-label widget-filter-item-text" for="urban">Urban Outfitters</label>
                </div><span class="fs-xs text-body-secondary">34</span>
              </li>
              <li class="widget-filter-item d-flex justify-content-between align-items-center mb-1">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="wolverine">
                  <label class="form-check-label widget-filter-item-text" for="wolverine">Wolverine</label>
                </div><span class="fs-xs text-body-secondary">67</span>
              </li>
              <li class="widget-filter-item mb-1 d-flex justify-content-between align-items-center">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="wrangler">
                  <label class="form-check-label widget-filter-item-text" for="wrangler">Wrangler</label>
                </div><span class="fs-xs text-body-secondary">39</span>
              </li>
            </ul>
          </div>
          <!--:Sidebar widget card-->
          <div class="mb-5">
            <!--:Title-->
            <h6 class="mb-4 text-body-secondary small text-uppercase">Size:</h6>
            <!--:list-->
            <ul class="list-unstyled pe-2 ps-1 py-1 mb-0" data-simplebar style="max-height: 9.65rem;">
              <li class="widget-filter-item d-flex justify-content-between align-items-center mb-1">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="size-xs">
                  <label class="form-check-label widget-filter-item-text" for="size-xs">XS</label>
                </div><span class="small text-body-secondary">21</span>
              </li>
              <li class="widget-filter-item d-flex justify-content-between align-items-center mb-1">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="size-s">
                  <label class="form-check-label widget-filter-item-text" for="size-s">S</label>
                </div><span class="small text-body-secondary">22</span>
              </li>
              <li class="widget-filter-item d-flex justify-content-between align-items-center mb-1">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="size-m">
                  <label class="form-check-label widget-filter-item-text" for="size-m">M</label>
                </div><span class="small text-body-secondary">54</span>
              </li>
              <li class="widget-filter-item d-flex justify-content-between align-items-center mb-1">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="size-l">
                  <label class="form-check-label widget-filter-item-text" for="size-l">L</label>
                </div><span class="small text-body-secondary">32</span>
              </li>
              <li class="widget-filter-item d-flex justify-content-between align-items-center mb-1">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="size-xl">
                  <label class="form-check-label widget-filter-item-text" for="size-xl">XL</label>
                </div><span class="small text-body-secondary">74</span>
              </li>
              <li class="widget-filter-item d-flex justify-content-between align-items-center mb-1">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="size-39">
                  <label class="form-check-label widget-filter-item-text" for="size-39">39</label>
                </div><span class="small text-body-secondary">48</span>
              </li>
              <li class="widget-filter-item d-flex justify-content-between align-items-center mb-1">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="width-3x height-3x">
                  <label class="form-check-label widget-filter-item-text" for="width-3x height-3x">40</label>
                </div><span class="small text-body-secondary">24</span>
              </li>
              <li class="widget-filter-item d-flex justify-content-between align-items-center mb-1">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="size-41">
                  <label class="form-check-label widget-filter-item-text" for="size-41">41</label>
                </div><span class="small text-body-secondary">86</span>
              </li>
              <li class="widget-filter-item d-flex justify-content-between align-items-center mb-1">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="size-42">
                  <label class="form-check-label widget-filter-item-text" for="size-42">42</label>
                </div><span class="small text-body-secondary">98</span>
              </li>
              <li class="widget-filter-item d-flex justify-content-between align-items-center mb-1">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="size-43">
                  <label class="form-check-label widget-filter-item-text" for="size-43">43</label>
                </div><span class="small text-body-secondary">31</span>
              </li>
              <li class="widget-filter-item d-flex justify-content-between align-items-center mb-1">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="size-44">
                  <label class="form-check-label widget-filter-item-text" for="size-44">44</label>
                </div><span class="small text-body-secondary">42</span>
              </li>
              <li class="widget-filter-item d-flex justify-content-between align-items-center mb-1">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="s50">
                  <label class="form-check-label widget-filter-item-text" for="s50">45</label>
                </div><span class="small text-body-secondary">62</span>
              </li>
              <li class="widget-filter-item d-flex justify-content-between align-items-center mb-1">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="size-46">
                  <label class="form-check-label widget-filter-item-text" for="size-46">46</label>
                </div><span class="small text-body-secondary">19</span>
              </li>
              <li class="widget-filter-item d-flex justify-content-between align-items-center mb-1">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="size-47">
                  <label class="form-check-label widget-filter-item-text" for="size-47">47</label>
                </div><span class="small text-body-secondary">97</span>
              </li>
              <li class="widget-filter-item d-flex justify-content-between align-items-center mb-1">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="size-48">
                  <label class="form-check-label widget-filter-item-text" for="size-48">48</label>
                </div><span class="small text-body-secondary">8</span>
              </li>
              <li class="widget-filter-item d-flex justify-content-between align-items-center mb-1">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="size-49">
                  <label class="form-check-label widget-filter-item-text" for="size-49">49</label>
                </div><span class="small text-body-secondary">16</span>
              </li>
              <li class="widget-filter-item d-flex justify-content-between mb-1 align-items-center">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="size-50">
                  <label class="form-check-label widget-filter-item-text" for="size-50">50</label>
                </div><span class="small text-body-secondary">9</span>
              </li>
            </ul>
          </div>
          <!--:Sidebar widget card-->
          <div>
            <!--:Title-->
            <h6 class="mb-4 text-body-secondary small text-uppercase">Price Range:</h6>
            <div class="pt-2">
              <div class="range-slider mx-2"
                data-range='{"decimals": 0,"step": 1,"connect": true, "start" : [10,100], "range" : {"min": 0, "max" :1000}}'>
              </div>
              <div class="range-slider-selection">
                <span>$ <span class="range-slider-value" id="range-min"></span></span>
                &mdash; <span>$ <span class="range-slider-value" id="range-max"></span></span>
              </div>
            </div>
          </div>
        </div>

        <!--Offcanvas footer-->
        <div class="offcanvas-footer p-4 border-top d-flex align-items-center justify-content-between">
          <button data-bs-dismiss="offcanvas" type="button" class="btn btn-primary">Apply</button>
          <button data-bs-dismiss="offcanvas" type="button" class="btn btn-warning"><i class="bx bx-x me-2"></i> Clear All</button>
        </div>
      </div>
</x-assan-layout>
