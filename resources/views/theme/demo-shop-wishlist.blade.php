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
                      Wishlist
                    </li>
                  </ol>
                </nav>
                <h1 class="mb-0 display-3">Wishlist
                </h1>
              </div>
            </div>
            <!--/.row-->
          </div>
        </div>
      </section>
      <section class="position-relative">
        <div class="container py-8 py-lg-9">
          <div class="row">
            <div class="col-lg-10 offset-lg-1">
              <div class="table-responsive">
                <!--:Wishlist table-->
              <table class="table text-nowrap table-striped">
                <thead>
                   <tr>
                      <th>
                        <!-- form check -->
                        <div class="form-check">
                          <!-- input --><input class="form-check-input" type="checkbox" value="" id="chechboxAll">
                          <!-- label --><label class="form-check-label" for="chechboxAll">
  
                          </label>
                        </div>
                      </th>
                      <th></th>
                      <th>Product</th>
                      <th>Amount</th>
                      <th>Status</th>
                      <th>Actions</th>
                      <th>Remove</th>
                    </tr>
                </thead>
                <tbody>
                  <tr>

                    <td class="align-middle">
                      <!-- form check -->
                      <div class="form-check">
                        <!-- input --><input class="form-check-input" type="checkbox" value="" id="chechbox2">
                        <!-- label --><label class="form-check-label" for="chechbox2">

                        </label>
                      </div>

                    </td>
                    <td class="align-middle">
                      <a href="{{ URL::asset('#') }}"><img src="assets/img/shop/products/01.jpg" class="img-fluid rounded width-5x h-auto" alt=""></a>

                    </td>
                    <td class="align-middle">
                      <div>
                        <h5 class="fs-6 mb-0"><a href="{{ URL::asset('#') }}" class="text-inherit">Leather women's jacket</a></h5>
                        <small>$299.00 x 1</small>
                      </div>
                    </td>
                    <td class="align-middle">$299.00</td>
                    <td class="align-middle"><span class="badge bg-success-subtle text-success">In Stock</span></td>
                    <td class="align-middle">
                      <div class="btn btn-primary btn-sm">Move to Cart</div>
                    </td>
                    <td class="align-middle text-center"><a href="{{ URL::asset('#!') }}" class="text-body-secondary" title="Remove from wishlist" data-bs-toggle="tooltip" data-bs-placement="top">
                        <i class="bx bx-trash"></i>
                      </a></td>
                  </tr>
                  <tr>

                    <td class="align-middle">
                      <!-- form check -->
                      <div class="form-check">
                        <!-- input --><input class="form-check-input" type="checkbox" value="" id="chechbox3">
                        <!-- label --><label class="form-check-label" for="chechbox3">

                        </label>
                      </div>

                    </td>
                    <td class="align-middle">
                      <a href="{{ URL::asset('#') }}"><img src="assets/img/shop/products/02.jpg" class="img-fluid rounded width-5x h-auto" alt=""></a>

                    </td>
                    <td class="align-middle">
                      <div>
                        <h5 class="fs-6 mb-0"><a href="{{ URL::asset('#') }}" class="text-inherit">Men's white shirt</a></h5>
                        <small>$199.00 x 1</small>
                      </div>
                    </td>
                    <td class="align-middle">$199.00</td>
                    <td class="align-middle"><span class="badge bg-success-subtle text-success">In Stock</span></td>
                    <td class="align-middle">
                      <div class="btn btn-primary btn-sm">Move to Cart</div>
                    </td>
                    <td class="align-middle text-center"><a href="{{ URL::asset('#!') }}" class="text-body-secondary" title="Remove from wishlist" data-bs-toggle="tooltip" data-bs-placement="top">
                        <i class="bx bx-trash"></i>
                      </a></td>
                  </tr>
                </tbody>
              </table>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="position-relative bg-body-tertiary overflow-hidden">
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
