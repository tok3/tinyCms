<x-assan-layout layout-type="{{$layoutType}}">
      <section class="position-relative">
        <div class="container pt-7 pt-lg-9 pb-9 pb-lg-11 position-relative">
          <div class="row justify-content-between">
            <div class="col-xl-6 col-lg-7 col-md-8 mx-auto mx-lg-0 mb-5 mb-lg-0">
              <div class="row g-1 justify-content-center">
                <div class="col-2">

                  <!--Thumbnails for main slider(just above)-->
                  <div class="swiper-container swiper-thumbnails overflow-hidden">
                    <!-- Additional required wrapper -->
                    <div class="swiper-wrapper d-flex flex-column">
                      <!-- Slides -->
                      <div class="swiper-slide w-100">
                        <img src="{{ URL::asset('assets/img/shop/single1.jpg') }}" alt="" class="w-100 rounded-0 h-auto">
                      </div>
                      <!-- Slides -->
                      <div class="swiper-slide w-100">
                        <img src="{{ URL::asset('assets/img/shop/single2.jpg') }}" alt="" class="w-100 rounded-0 h-auto">
                      </div>
                      <!-- Slides -->
                      <div class="swiper-slide w-100">
                        <img src="{{ URL::asset('assets/img/shop/single3.jpg') }}" alt="" class="w-100 rounded-0 h-auto">
                      </div>
                      <!-- Slides -->
                      <div class="swiper-slide w-100">
                        <img src="{{ URL::asset('assets/img/shop/single4.jpg') }}" alt="" class="w-100 rounded-0 h-auto">
                      </div>

                    </div>
                  </div>
                </div>
                <div class="col-10">
                  <!--Thumbnails main slider-->
                  <div class="swiper-container overflow-hidden position-relative swiper-thumbnails-main">
                    <!-- Additional required wrapper -->
                    <div class="swiper-wrapper">
                      <!-- Slides -->
                      <div class="swiper-slide">
                        <img src="{{ URL::asset('assets/img/shop/single1.jpg') }}" alt="" class="img-fluid">
                      </div>
                      <!-- Slides -->
                      <div class="swiper-slide">
                        <img src="{{ URL::asset('assets/img/shop/single2.jpg') }}" alt="" class="img-fluid">
                      </div>
                      <!-- Slides -->
                      <div class="swiper-slide">
                        <img src="{{ URL::asset('assets/img/shop/single3.jpg') }}" alt="" class="img-fluid">
                      </div>
                      <!-- Slides -->
                      <div class="swiper-slide">
                        <img src="{{ URL::asset('assets/img/shop/single4.jpg') }}" alt="" class="img-fluid">
                      </div>
                    </div>
                    <!-- Swiper Navigation buttons (Remove it if you have to) -->
                    <div class="swiper-button-prev swiperThumb-prev text-white bg-dark">
                    </div>
                    <div class="swiper-button-next  swiperThumb-next text-white bg-dark">
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!--/.col-->
            <div class="col-md-8 mx-auto col-lg-5 ms-xl-auto">
              <!--Breadcrumbs-->
              <nav class="d-md-flex" aria-label="breadcrumb">
                <ol class="breadcrumb mb-3">
                  <li class="breadcrumb-item">
                    <a href="{{ URL::asset('#!') }}">Home</a>
                  </li>
                  <li class="breadcrumb-item active">
                    Shop
                  </li>
                  <li class="breadcrumb-item active">
                    Products
                  </li>
                  <li class="breadcrumb-item active">
                    Women's Husky Vest
                  </li>
                </ol>
              </nav>
              <!-- Product Description -->
              <div class="mb-3 pb-3 border-bottom">
                <div class="mb-3">
                  <h2 class="mb-4 display-4">FOSFO LONG – Women’s down puffer jacket</h2>
                  <div class="d-flex justify-content-between align-items-center">
                    <div>
                      <p class="fs-5 mb-0">$320.00 <del class="text-body-secondary">$399.00</del></p>
                    </div>
                    <div>
                      <a href="{{ URL::asset('#') }}" class="link-info fw-semibold small"><i class="bx bx-heart align-middle me-2"></i>Add to Wishlist</a>
                    </div>
                  </div>
                </div>
                <p class="mb-4">Lorem ipsum dolor sit amet adipiscing euismod tincidunt
                  laoreet dolore magna aliquam erat volutpat.</p>
                <span class="text-danger">Only 3 Left in Stock, Hurry Up!</span>
              </div>
              <div class="mb-3 pb-3 border-bottom">
                <h6 class="mb-3">Quantity</h6>
                <div class="width-5x position-relative">
                  <select class="form-control form-control-sm"
                    data-choices='{"searchEnabled":false,"itemSelectText":""}'>
                    <option value="1" selected>1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                  </select>
                </div>
              </div>
              <div class="mb-3 pb-3 border-bottom">
                <div class="mb-0">
                  <div class="d-flex align-items-center mb-3 justify-content-between">
                    <h6 class="mb-0">Size</h6>
                    <a href="{{ URL::asset('#!') }}" class="fw-normal small">Size Guide</a>
                  </div>
                  <div class="d-md-flex align-items-center justify-content-between">
                    <div class="d-flex" role="group" aria-label="Basic checkbox toggle button group">
                      <input type="radio" name="sizeRadio" class="btn-check" id="radioSizeSM">
                      <label class="btn btn-sm lh-1 btn-outline-primary py-1 flex-center me-2 px-2"
                        for="radioSizeSM">S</label>

                      <input type="radio" name="sizeRadio" class="btn-check" id="radioSizeM" checked>
                      <label class="btn btn-sm lh-1 btn-outline-primary py-1 flex-center me-2 px-2"
                        for="radioSizeM">M</label>

                      <input type="radio" name="sizeRadio" class="btn-check" id="radioSizeL">
                      <label class="btn btn-sm lh-1 btn-outline-primary py-1 flex-center me-2 px-2"
                        for="radioSizeL">L</label>
                      <input type="radio" name="sizeRadio" class="btn-check" id="radioSizeXL">
                      <label class="btn btn-sm btn-outline-primary flex-center me-2 px-2" for="radioSizeXL">XL</label>
                      <input type="radio" name="sizeRadio" class="btn-check" id="radioSizeXXL">
                      <label class="btn btn-sm lh-1 btn-outline-primary py-1 flex-center me-2 px-2"
                        for="radioSizeXXL">XXL</label>
                    </div>


                  </div>
                </div>
                <!--/.size-->
              </div>
              <!--/.size-->

              <div class="mb-3 pb-3 border-bottom">
                <strong class="text-success d-flex align-items-center small">
                  <svg class="me-1" fill="currentColor" xmlns="http://www.w3.org/2000/svg" width="12" height="12"
                    viewBox="0 0 8 8">
                    <path
                      d="M2 0v1h1v.03c-1.7.24-3 1.71-3 3.47 0 1.93 1.57 3.5 3.5 3.5s3.5-1.57 3.5-3.5c0-.45-.1-.87-.25-1.25l-.91.38c.11.29.16.57.16.88 0 1.39-1.11 2.5-2.5 2.5s-2.5-1.11-2.5-2.5 1.11-2.5 2.5-2.5c.3 0 .59.05.88.16l.34-.94c-.23-.08-.47-.12-.72-.16v-.06h1v-1h-3zm5 1.16s-3.65 2.81-3.84 3c-.19.2-.19.49 0 .69.19.2.49.2.69 0 .2-.2 3.16-3.69 3.16-3.69z">
                    </path>
                  </svg>
                  In Stock &amp; ready to ship</strong>
              </div>
              <div class="mb-3 pb-3 border-bottom">
                <h6 class="mb-3">Color</h6>
                <div class="d-flex" role="group" aria-label="Basic radio toggle button group">
                  <input type="radio" class="btn-check" name="btnradio" id="btnradiocyan" checked>
                  <label
                    class="shop-product-color btn border-0 p-0 me-2 width-2x height-2x flex-center text-white product-cyan"
                    for="btnradiocyan"></label>

                  <input type="radio" class="btn-check" name="btnradio" id="btnradiogray">
                  <label
                    class="shop-product-color btn p-0 border-0 me-2 width-2x height-2x flex-center text-white product-gray"
                    for="btnradiogray"></label>

                  <input type="radio" class="btn-check" name="btnradio" id="btnradioblue">
                  <label
                    class="shop-product-color btn p-0 border-0 me-2 width-2x height-2x flex-center text-white product-blue"
                    for="btnradioblue"></label>
                </div>
                <!--Radio buttons for product colors-->
              </div>
              <!--/.colors-->

              <div class="mb-3 pb-3 border-bottom d-flex align-items-center">
                <i class="bx bxs-truck fs-5 me-1"></i>
                <h6 class="mb-0 ms-3">This item ships free *</h6>
              </div>

              <div class="d-grid">
                <a href="{{ URL::asset('#') }}" class="btn btn-primary hover-lift">
                  <i class="bx bx-shopping-bag fs-5 me-2"></i>
                  Add to Bag
                </a>
              </div>
              <!--/.cart-action-->

            </div>
            <!--/.col-->
          </div>
        </div>
      </section>
      <section class="bg-body-tertiary">
        <div class="container py-9 py-lg-11">
          <div class="row justify-content-center">
            <div class="col-lg-9 mb-5">
              <nav class="nav nav-tabs">
                <a href="{{ URL::asset('#description') }}" class="nav-link active" data-bs-toggle="tab" aria-haspopup="false"
                  aria-expanded="true">
                  Description
                </a>
                <a href="{{ URL::asset('#information') }}" class="nav-link" data-bs-toggle="tab" aria-haspopup="false"
                  aria-expanded="false">
                  Information
                </a>
                <a href="{{ URL::asset('#reviews') }}" class="nav-link" data-bs-toggle="tab" aria-haspopup="false" aria-expanded="false">
                  Reviews
                </a>
                <a href="{{ URL::asset('#product-qa') }}" class="nav-link" data-bs-toggle="tab" aria-haspopup="false" aria-expanded="false">
                  Q&amp;A
                </a>
              </nav>
            </div>
            <!--/.col-->
            <div class="col-lg-9 col-md-8">
              <div class="tab-content">
                <div class="tab-pane fade active show" id="description">
                  <h5>Lorem Ipsum is simply</h5>
                  <p class="mb-5">
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                    Lorem
                    Ipsum has been the industry's standard dummy text ever since the 1500s, when
                    an
                    unknown printer took a galley of type and scrambled it to make a type
                    specimen
                    book. It has survived not only five centuries, remaining essentially
                    unchanged,
                    but also the leap into electronic typesetting, remaining essentially
                    unchanged.
                  </p>
                  <div class="text-end">
                    <a href="{{ URL::asset('#!') }}" class="btn  btn-secondary rounded-pill">Visit
                      Store</a>
                  </div>
                </div>
                <!--Tab-pane-->
                <div class="tab-pane fade" id="information">
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item bg-transparent px-0 py-3">MATERIAL: 100% POLYESTER
                    </li>
                    <li class="list-group-item bg-transparent px-0 py-3">Durable water repellent to
                      protect against light drizzles</li>
                    <li class="list-group-item bg-transparent px-0 py-3">Insulated quilted vest to
                      protect in light winters
                    </li>
                    <li class="list-group-item bg-transparent px-0 py-3">Made in Germany</li>
                  </ul>
                </div>
                <!--Tab-pane-->
                <div class="tab-pane fade" id="reviews">
                  <div
                    class="bg-body d-flex justify-content-between align-items-center p-3 mb-5">
                    <div>
                      <span class="text-warning small d-block mb-2">
                        <i class="bx bx-star"></i>
                        <i class="bx bx-star"></i>
                        <i class="bx bx-star"></i>
                        <i class="bx bx-star"></i>
                        <i class="bx bx-star"></i>
                      </span>
                      <p class="mb-0"><span class="reviews small fw-normal">4.69 / 5</span>
                        <small class="text-body-secondary">( 4.5 K - Reviews)</small>
                      </p>

                    </div>
                    <div>
                      <a href="{{ URL::asset('#!') }}" class="link-underline fw-semibold pb-0">View all
                        Reviews</a>
                    </div>
                  </div>
                  <h5 class="mb-4 mb-lg-5">Latest Reviews</h5>
                  <div class="d-flex mb-4">
                    <div>
                      <img src="{{ URL::asset('assets/img/avatar/3.jpg') }}" alt="" class="avatar sm me-3 rounded-circle shadow">
                    </div>
                    <div class="media-body">
                      <span class="text-warning small d-block mb-2">
                        <i class="bx bx-star"></i><i class="bx bx-star"></i><i class="bx bx-star"></i><i
                          class="bx bx-star"></i><i class="bx bx-star"></i>
                      </span>
                      <p class="mb-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                        sed
                        do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                      <div class="d-flex border-bottom pb-4 justify-content-between align-items-center">
                        <h6 class="mb-0">Emma Patrik</h6>
                        <small class="text-body-secondary">5 July 2021</small>
                      </div>
                    </div>
                  </div>
                  <!--Review-item-->
                  <div class="d-flex mb-4">
                    <div>
                      <img src="{{ URL::asset('assets/img/avatar/6.jpg') }}" alt="" class="avatar sm me-3 rounded-circle shadow">
                    </div>
                    <div class="media-body">
                      <span class="text-warning small d-block mb-2">
                        <i class="bx bx-star"></i><i class="bx bx-star"></i><i class="bx bx-star"></i><i
                          class="bx bx-star"></i><i class="bx bx-star"></i>
                      </span>
                      <p class="mb-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                        sed
                        do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                      <div class="d-flex border-bottom pb-4 justify-content-between align-items-center">
                        <h6 class="mb-0">Juan Doe</h6>
                        <small class="text-body-secondary">23 May 2021</small>
                      </div>
                    </div>
                  </div>
                  <!--Review-item-->
                  <div class="d-flex mb-4">
                    <div>
                      <img src="{{ URL::asset('assets/img/avatar/9.jpg') }}" alt="" class="avatar sm me-3 rounded-circle shadow">
                    </div>
                    <div class="media-body">
                      <span class="text-warning small d-block mb-2">
                        <i class="bx bx-star"></i><i class="bx bx-star"></i><i class="bx bx-star"></i><i
                          class="bx bx-star"></i><i class="bx bx-star"></i>
                      </span>
                      <p class="mb-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                        sed
                        do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                      <div class="d-flex border-bottom pb-4 justify-content-between align-items-center">
                        <h6 class="mb-0">Adam Voges</h6>
                        <small class="text-body-secondary">12 June 2021</small>
                      </div>
                    </div>
                  </div>
                  <!--Review-item-->
                  <div class="pt-3">
                    <div class="d-flex justify-content-end mb-3">
                      <a href="{{ URL::asset('#') }}" data-bs-target="#review-collapse" data-bs-toggle="collapse" aria-expanded="false"
                        aria-haspopup="false" class="h6 collapse-link mb-0 link-underline">
                        <i class="bx bx-plus-fill align-middle me-1"></i>Add Review</a>
                    </div>
                    <div class="collapse" id="review-collapse">
                      <div class="card card-body p-4">
                        <form class="needs-validation" novalidate>
                          <div class="row">
                            <div class="col-12 col-sm-6">
                              <div class="mb-3">
                                <label class="form-label" for="rating-name">Name</label>
                                <input type="text" required id="rating-name" class="form-control">
                              </div>
                            </div>
                            <div class="col-12 col-sm-6">
                              <div class="mb-3">
                                <label class="form-label" for="rating-mail">Email
                                  Address</label>
                                <input type="email" required class="form-control" id="rating-mail">
                              </div>
                            </div>
                            <div class="w-100"></div>
                            <div class="col-12">
                              <div class="mb-3">
                                <label class="form-label">Select your Rating</label>
                                <div>
                                  <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                    <input type="radio" class="btn-check" name="btnradio" id="btnrating1">
                                    <label class="btn btn-outline-warning btn-sm" for="btnrating1"><i
                                        class="bx bx-star"></i></label>

                                    <input type="radio" class="btn-check" name="btnradio" id="btnrating2">
                                    <label class="btn btn-outline-warning btn-sm" for="btnrating2"><i
                                        class="bx bx-star"></i><i class="bx bx-star"></i></label>

                                    <input type="radio" class="btn-check" name="btnradio" id="btnrating3">
                                    <label class="btn btn-outline-warning btn-sm" for="btnrating3"><i
                                        class="bx bx-star"></i><i class="bx bx-star"></i><i
                                        class="bx bx-star"></i></label>
                                    <input type="radio" class="btn-check" name="btnradio" id="btnrating4">
                                    <label class="btn btn-outline-warning btn-sm" for="btnrating4"><i
                                        class="bx bx-star"></i><i class="bx bx-star"></i><i class="bx bx-star"></i><i
                                        class="bx bx-star"></i></label>
                                    <input type="radio" class="btn-check" name="btnradio" id="btnrating5" checked>
                                    <label class="btn btn-outline-warning btn-sm" for="btnrating5"><i
                                        class="bx bx-star"></i><i class="bx bx-star"></i><i class="bx bx-star"></i><i
                                        class="bx bx-star"></i><i class="bx bx-star"></i></label>

                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="w-100"></div>
                            <div class="col-12">
                              <div class="mb-3">
                                <label class="form-label" for="rating-message">Review
                                  Message <small>(Optional)</small></label>
                                <textarea class="form-control" id="rating-message"></textarea>
                              </div>
                            </div>
                          </div>
                          <div class="text-end">
                            <button type="submit" class="btn btn-primary hover-translate-3d">
                              Submit review
                            </button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
                <!--Tab-pane-->
                <div class="tab-pane fade" id="product-qa">
                  <div class="card border card-body mb-2 bg-transparent">
                    <h5><i class="bx bx-question-mark me-2"></i>Is the item
                      durable?</h5>
                    <p class="mb-0 d-flex align-items-stretch">
                      <strong class="small d-inline-block me-2 text-body-secondary">Ans.</strong>
                      <span class="mb-0">
                        Durability of shoes minimum 1 year if u used on daily basis. I think
                        this is best at this price range as compare to all other popular
                        brands.
                      </span>
                    </p>
                  </div>
                  <div class="card border card-body mb-2 bg-transparent">
                    <h5><i class="bx bx-question-mark me-2"></i>Is the item
                      durable?</h5>
                    <p class="mb-0 d-flex align-items-stretch">
                      <strong class="small d-inline-block me-2 text-body-secondary">Ans.</strong>
                      <span class="mb-0">
                        Durability of shoes minimum 1 year if u used on daily basis. I think
                        this is best at this price range as compare to all other popular
                        brands.
                      </span>
                    </p>
                  </div>
                  <div class="card border card-body mb-5 bg-transparent">
                    <h5><i class="bx bx-question-mark me-2"></i>Is the item
                      durable?</h5>
                    <p class="mb-0 d-flex align-items-stretch">
                      <strong class="small d-inline-block me-2 text-body-secondary">Ans.</strong>
                      <span class="mb-0">
                        Durability of shoes minimum 1 year if u used on daily basis. I think
                        this is best at this price range as compare to all other popular
                        brands.
                      </span>
                    </p>
                  </div>
                  <h5 class="mb-4">Feel free to Ask questions</h5>
                  <form class="needs-validation" novalidate>
                    <div class="row">
                      <div class="col-12 col-sm-6">
                        <div class="mb-3">
                          <input type="text" required class="form-control" placeholder="Enter your Name">
                        </div>
                      </div>
                      <div class="col-12 col-sm-6">
                        <div class="mb-3">
                          <input type="email" required class="form-control" placeholder="Enter your Email">
                        </div>
                      </div>
                      <div class="w-100"></div>
                      <div class="col-12">
                        <div class="mb-3">
                          <textarea required class="form-control" placeholder="Type your question here"></textarea>
                        </div>
                      </div>
                    </div>
                    <div class="text-end">
                      <button type="submit" class="btn btn-primary hover-translate-3d">
                        Send question <i class="bx bx-right-top-arrow-circle ms-1"></i>
                      </button>
                    </div>
                  </form>
                </div>
              </div>
              <!--Tab-pane-->
            </div>
          </div>
        </div>
      </section>
      <section class="position-relative overflow-hidden">
        <div class="container py-7 position-relative">
          <div class="row align-items-center">
            <div class="col-md-4 border-end-md text-center mb-7 mb-md-0">
              <div class="mb-3">
                <i class="bx bx-store fs-1"></i>
              </div>
              <h6 class="mb-0">30 Day Returns</h6>
            </div>
            <div class="col-md-4 border-end-md text-center mb-7 mb-md-0">
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
</x-assan-layout>
