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
                    <li class="breadcrumb-item active">
                      Cart
                    </li>
                  </ol>
                </nav>
                <h1 class="mb-0 display-3">Cart
                </h1>
              </div>
            </div>
            <!--/.row-->
          </div>
        </div>
      </section>
            <section class="position-relative">
                <div class="container pb-9 pb-lg-11 pt-9 position-relative">
                    <div class="row justify-content-between">
                        <div class="col-lg-10 mx-auto">

                            <!--Cart table start-->
                            <div class="table-responsive">
                                <table class="table table-striped table-hover align-middle">
                                    <thead class="text-uppercase small text-body-tertiary">
                                        <tr>
                                            <th></th>
                                            <th>
                                                <div style="min-width:180px">Product</div>
                                            </th>
                                            <th>Price</th>
                                            <th class="width-10x">Quantity</th>
                                            <th>Subtotal</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <img src="{{ URL::asset('assets/img/shop/backpack2.jpg') }}" class="width-5x rounded-3">
                                            </td>
                                            <td>
                                                <a href="{{ URL::asset('#') }}" class="fs-6 fw-semibold">
                                                    Laptop backpack water proof
                                                </a>
                                            </td>
                                            <td>$36.00</td>
                                            <td>
                                                <input type="number" min="1" value="1" max="5" name=""
                                                    class="form-control form-control-sm shadow-none bg-transparent">
                                            </td>
                                            <td>$36.00</td>
                                            <td><button class="btn-close text-center">
                                                    <svg xmlns="http://www.w3.org/2000/svg" height="16"
                                                        viewBox="0 0 24 24" width="20" fill="currentColor">
                                                        <path
                                                            d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12 19 6.41z" />
                                                    </svg>
                                                </button></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <img src="{{ URL::asset('assets/img/shop/jacket1.jpg') }}" class="width-5x rounded-3">
                                            </td>
                                            <td>
                                                <a href="{{ URL::asset('#') }}" class="fs-6 fw-semibold">
                                                    Brown denim jacket for
                                                    mens
                                                </a>
                                            </td>
                                            <td>$59.00</td>
                                            <td>
                                                <input type="number" min="1" value="2" max="5" name=""
                                                    class="form-control form-control-sm shadow-none bg-transparent">
                                            </td>
                                            <td>$118.00</td>
                                            <td><button class="btn-close text-center">
                                                    <svg xmlns="http://www.w3.org/2000/svg" height="16"
                                                        viewBox="0 0 24 24" width="20" fill="currentColor">
                                                        <path
                                                            d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12 19 6.41z" />
                                                    </svg>
                                                </button></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <!--Update cart button-->
                            <div class="text-center d-md-flex align-items-center border-bottom pb-4 mb-4">
                                <div class="col-md-7 mb-4 mb-md-0">
                                   <form novalidate class="needs-validation">
                                    <div class="d-grid d-sm-flex flex-grow-1 align-items-center">
                                        <input type="text" class="form-control mb-2 mb-sm-0 me-sm-2"
                                            placeholder="Coupon code" name="" required>
                                        <button type="submit" class="btn btn-outline-info flex-shrink-0">
                                            <i class="bx bx-tag align-middle"></i> Apply Coupon </button>
                                    </div>
                                   </form>
                                </div>
                                <div class="col-md-5 text-end">
                                    <div class="d-flex flex-column h-100 justify-content-end">
                                        <span class="text-body-secondary d-block mb-2 fs-6">Cart total</span>
                                        <h5 class="mb-0 ms-3 h2">$154.00</h5>
                                    </div>
                                </div>
                            </div>
                            <!--Cart checkout-->
                            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-center">
                                <div class="mb-3 mb-sm-0">
                                    <a href="{{ URL::asset('demo-shop-products.html') }}" class="link-hover-underline text-body"><i
                                            class="bx bx-left-arrow-alt fs-6 align-middle me-1"></i>Continue shopping
                                    </a>
                                </div>
                                <div>
                                    <a href="{{ URL::asset('demo-shop-checkout.html') }}" class="btn btn-primary">proceed to Checkout
                                    </a>
                                </div>
                            </div>
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

</x-assan-layout>
