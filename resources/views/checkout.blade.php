<x-page-layout>

    <section class="position-relative border-top">
        <div class="container pt-9 pt-lg-11">


            <!--Price Container-->
            <div class="container">

                <div class="row grid-separator">


                    @foreach($products as $product)
                        <div class="col-lg-4 py-9 py-lg-11 px-4 px-xl-5">
                            <!--Price card-->
                            <div class="card bg-transparent border-0 h-100">
                                <form action="{{ route('checkout.plan') }}" method="POST">
                                @csrf  <!-- CSRF Protection -->
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">


                                    <!--Badge-->
                                    <div class="mb-3">
                                        <span class="badge badge-pill bg-success px-3">{{$product->name}}</span>
                                    </div>

                                    <!--Title-->
                                    <h5 class="mb-4">{{$product->name}}</h5>
                                    <div class="mb-4">
                                        <h2 class="display-3 mb-0"><sup class="fs-6 align-top text-body-secondary lh-1 fw-normal">$</sup><span class="price">{{$product->price}}</span><sub
                                                class="fs-6 text-body-secondary lh-1 fw-normal align-bottom"> / Monthly</sub></h2>
                                    </div>

                                    <!--Description-->
                                    <p class="mb-4">
                                        {{$product->description}}
                                    </p>

                                    <!--Features-->
                                    <h6 class="mb-3">Included</h6>
                                    <ul class="list-unstyled mb-0 flex-grow-1">
                                        <li class="d-flex align-items-center mb-1">
                                            <i class="me-2 fs-4 bx bx-check lh-sm text-body-secondary"></i>
                                            <span>100GB Space</span>
                                        </li>
                                        <li class="d-flex align-items-center mb-1">
                                            <i class="me-2 fs-4 bx bx-check lh-sm text-body-secondary"></i>
                                            <span>Up to 5 users</span>
                                        </li>
                                        <li class="d-flex align-items-center mb-1">
                                            <i class="me-2 fs-4 bx bx-check lh-sm text-body-secondary"></i>
                                            <span>100K files upload</span>
                                        </li>
                                        <li class="d-flex align-items-center mb-1">
                                            <i class="me-2 fs-4 bx bx-check lh-sm text-body-secondary"></i>
                                            <span>12 Months support</span>
                                        </li>
                                        <li class="d-flex align-items-center">
                                            <i class="me-2 fs-4 bx bx-check lh-sm text-body-secondary"></i>
                                            <span>Basic tools</span>
                                        </li>
                                    </ul>

                                    <!--Action-->
                                    <div class="pt-4 d-grid">
                                        <button type="submit" class="btn btn-lg btn-primary">
                                            Sign up now
                                        </button>
                                    </div>

                                </form>
                            </div>
                        </div>


                @endforeach
                <!--Price col-->
                    <div class="col-lg-4 py-9 py-lg-11 px-4 px-xl-5">
                        <!--Price card-->
                        <div class="card bg-transparent border-0 h-100">
                            <form action="{{ route('checkout.plan-mollie') }}" method="POST">
                            @csrf  <!-- CSRF Protection -->
                                <input type="hidden" name="plan" value="premium">
                            <div class="mb-3">
                                <span class="badge badge-pill bg-success px-3">Best value</span>
                            </div>

                            <!--Title-->
                            <h5 class="mb-4">Team plan</h5>
                            <div class="mb-4">
                                <h2 class="display-3 mb-0"><sup class="fs-6 align-top text-body-secondary lh-1 fw-normal">$</sup><span class="price">29</span><sub
                                        class="fs-6 text-body-secondary lh-1 fw-normal align-bottom"> / Monthly</sub></h2>
                            </div>

                            <!--Description-->
                            <p class="mb-4">
                                Lorem ipsum dolor sit amet, dolore magna aliqua. Duis aute irure dolor in voluptate
                                velit esse cillum dolore eu fugiat nulla pariatur.
                            </p>

                            <!--Features-->
                            <h6 class="mb-3">Included</h6>
                            <ul class="list-unstyled mb-0 flex-grow-1">
                                <li class="d-flex align-items-center mb-1">
                                    <i class="me-2 fs-4 bx bx-check lh-sm text-body-secondary"></i>
                                    <span>100GB Space</span>
                                </li>
                                <li class="d-flex align-items-center mb-1">
                                    <i class="me-2 fs-4 bx bx-check lh-sm text-body-secondary"></i>
                                    <span>Up to 5 users</span>
                                </li>
                                <li class="d-flex align-items-center mb-1">
                                    <i class="me-2 fs-4 bx bx-check lh-sm text-body-secondary"></i>
                                    <span>100K files upload</span>
                                </li>
                                <li class="d-flex align-items-center mb-1">
                                    <i class="me-2 fs-4 bx bx-check lh-sm text-body-secondary"></i>
                                    <span>12 Months support</span>
                                </li>
                                <li class="d-flex align-items-center">
                                    <i class="me-2 fs-4 bx bx-check lh-sm text-body-secondary"></i>
                                    <span>Basic tools</span>
                                </li>
                            </ul>

                            <!--Action-->
                                <!--Action-->
                                <div class="pt-4 d-grid">
                                    <button type="submit" class="btn btn-lg btn-primary">
                                        Sign up now
                                    </button>
                                </div>

                            </form>
                        </div>
                    </div>
                    <!--Price col-->
                    <div class="col-lg-4 py-9 py-lg-11 px-4 px-xl-5">

                        <!--Price card-->
                        <div class="card bg-transparent border-0 h-100">

                            <!--Title-->
                            <h5 class="mb-4">Business plan</h5>
                            <div class="mb-4">
                                <h2 class="display-3 mb-0"><sup class="fs-6 align-top text-body-secondary lh-1 fw-normal">$</sup><span class="price">49</span><sub
                                        class="fs-6 text-body-secondary lh-1 fw-normal align-bottom"> / Monthly</sub></h2>
                            </div>

                            <!--Description-->
                            <p class="mb-4">
                                Lorem ipsum dolor sit amet, dolore magna aliqua. Duis aute irure dolor in voluptate
                                velit esse cillum dolore eu fugiat nulla pariatur.
                            </p>

                            <!--Features-->
                            <h6 class="mb-3">Included</h6>
                            <ul class="list-unstyled mb-0 flex-grow-1">
                                <li class="d-flex align-items-center mb-1">
                                    <i class="me-2 fs-4 bx bx-check lh-sm text-body-secondary"></i>
                                    <span>20GB Space</span>
                                </li>
                                <li class="d-flex align-items-center mb-1">
                                    <i class="me-2 fs-4 bx bx-check lh-sm text-body-secondary"></i>
                                    <span>1 user at a time</span>
                                </li>
                                <li class="d-flex align-items-center mb-1">
                                    <i class="me-2 fs-4 bx bx-check lh-sm text-body-secondary"></i>
                                    <span>25K files upload</span>
                                </li>
                                <li class="d-flex align-items-center mb-1">
                                    <i class="me-2 fs-4 bx bx-check lh-sm text-body-secondary"></i>
                                    <span>3 Months support</span>
                                </li>
                                <li class="d-flex align-items-center">
                                    <i class="me-2 fs-4 bx bx-check lh-sm text-body-secondary"></i>
                                    <span>Basic tools</span>
                                </li>
                            </ul>

                            <!--Action-->
                            <div class="pt-4 d-grid">
                                <a href="#!" class="btn btn-lg btn-outline-primary">
                                    Sign up now
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!--End price container-->
        </div>
    </section>
</x-page-layout>
