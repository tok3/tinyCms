<x-assan-layout layout-type="{{$layoutType}}">
            <section class="position-relative">
                <div class="container py-9 position-relative">
                    <div class="row justify-content-between">
                        <div class="col-lg-6 col-sm-7 mx-auto mx-lg-0 mb-5 mb-lg-0">
                            <img src="{{ URL::asset('assets/img/shop/single1.jpg') }}" alt="" class="img-fluid mb-3">
                            <img src="{{ URL::asset('assets/img/shop/single2.jpg') }}" alt="" class="img-fluid mb-3">
                            <img src="{{ URL::asset('assets/img/shop/single3.jpg') }}" alt="" class="img-fluid">
                        </div>
                        <!--/.col-->
                        <div class="col-md-8 mx-auto col-lg-5">

                            <div class="sticky-top top-0">
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
                                          Womens
                                        </li>
                                    </ol>
                                </nav>
                                <!-- Product Description -->
                                <div class="mb-4 pb-4 border-bottom">
                                    <div class="mb-3">
                                        <h2 class="mb-4 display-6">FOSFO LONG – Women’s down puffer jacket</h2>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div>
                                                <p class="fs-4 mb-0">$279.00 <del
                                                        class="text-body-secondary">$499.00</del></p>
                                            </div>
                                            <div>
                                                <small class="text-success">In Stock</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-4 pb-4 border-bottom">
                                    <div class="mb-0">
                                        <div class="d-flex align-items-center mb-3 justify-content-between">
                                            <h6 class="mb-0">Size</h6>
                                            <a href="{{ URL::asset('#!') }}" class="fw-normal small">Size Guide</a>
                                        </div>
                                        <div class="d-md-flex align-items-center justify-content-between">
                                            <div class="d-flex" role="group"
                                                aria-label="Basic checkbox toggle button group">
                                                <input type="radio" name="sizeRadio" class="btn-check" id="radioSizeSM">
                                                <label
                                                    class="btn btn-outline-primary flex-center me-2 px-2 btn-sm"
                                                    for="radioSizeSM">S</label>

                                                <input type="radio" name="sizeRadio" class="btn-check" id="radioSizeM"
                                                    checked>
                                                <label
                                                    class="btn btn-outline-primary flex-center me-2 px-2 btn-sm"
                                                    for="radioSizeM">M</label>

                                                <input type="radio" name="sizeRadio" class="btn-check" id="radioSizeL">
                                                <label
                                                    class="btn btn-outline-primary flex-center me-2 px-2 btn-sm"
                                                    for="radioSizeL">L</label>
                                                <input type="radio" name="sizeRadio" class="btn-check" id="radioSizeXL">
                                                <label
                                                    class="btn btn-outline-primary flex-center me-2 px-2 btn-sm"
                                                    for="radioSizeXL">XL</label>
                                                <input type="radio" name="sizeRadio" class="btn-check"
                                                    id="radioSizeXXL">
                                                <label
                                                    class="btn btn-outline-primary flex-center me-2 px-2 btn-sm"
                                                    for="radioSizeXXL">XXL</label>
                                            </div>


                                        </div>
                                    </div>
                                    <!--/.size-->
                                </div>
                                <!--/.size-->


                                <div class="mb-4 pb-4 border-bottom">
                                    <div class="d-flex justify-content-between align-content-stretch">

                                        <!--colors-->
                                        <div class="">
                                            <h6 class="mb-3">Color</h6>
                                            <div class="d-flex" role="group"
                                                aria-label="Basic radio toggle button group">
                                                <input type="radio" class="btn-check" name="btnradio" id="btnradiobrown"
                                                    autocomplete="off" checked>
                                                <label
                                                    class="shop-product-color btn px-2 me-2 flex-center border-0 text-white product-brown"
                                                    for="btnradiobrown"></label>

                                                <input type="radio" class="btn-check" name="btnradio" id="btnradiogray">
                                                <label
                                                    class="shop-product-color btn px-2 me-2 flex-center border-0 text-white product-gray"
                                                    for="btnradiogray"></label>

                                                <input type="radio" class="btn-check" name="btnradio" id="btnradioblue">
                                                <label
                                                    class="shop-product-color btn px-2 me-2 flex-center border-0 text-white product-blue"
                                                    for="btnradioblue"></label>
                                            </div>
                                            <!--Radio buttons for product colors-->
                                        </div>
                                        <!--/.colors-->

                                        <!--Right-->
                                        <div>
                                            <h6 class="mb-3">Quantity</h6>
                                            <select class="form-control form-control-sm width-7x"
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
                                </div>
                                <!--/.colors-->
                                <div class="d-grid">
                                    <a href="{{ URL::asset('#') }}" class="btn btn-primary hover-lift">
                                        <i class="bx bx-cart-alt fs-4 me-2"></i> Add to Cart
                                    </a>
                                </div>
                                <!--/.cart-action-->

                            </div>
                        </div>
                        <!--/.col-->
                    </div>
                </div>
            </section>
            <section class="bg-body-tertiary">
                <div class="container py-9 py-lg-11">
                    <div class="row">
                        <div class="col-lg-8 col-md-10 mx-auto">
                            <div class="border-bottom mb-5 pb-4">
                                <h5 class="mb-4">Description</h5>
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
                                    <a href="{{ URL::asset('#!') }}" class="btn btn-secondary rounded-pill">Visit
                                        Store</a>
                                </div>
                            </div>
                            <!--Tab-pane-->
                            <div class="">
                                <h5 class="mb-4">Information</h5>
                                <ul class="list-group list-group-flush mb-0">
                                    <li class="list-group-item bg-transparent px-0 py-3">Material: 100% Polyester
                                    </li>
                                    <li class="list-group-item bg-transparent px-0 py-3">Durable water repellent to
                                        protect against light drizzles</li>
                                    <li class="list-group-item bg-transparent px-0 py-3">Insulated quilted vest to
                                        protect in light winters
                                    </li>
                                    <li class="list-group-item bg-transparent px-0 py-3">Made in Germany</li>
                                </ul>
                            </div>
                        </div>
                        <!--Tab-pane-->
                    </div>
                </div>
            </section>
            <section class="position-relative overflow-hidden">
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
</x-assan-layout>
