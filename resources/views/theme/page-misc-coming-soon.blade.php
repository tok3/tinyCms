<x-assan-layout layout-type="{{$layoutType}}">
            <section class="position-relative">
                <div class="container pt-3 pb-9">
                    <div class="row">
                        <div class="col-lg-8 mx-auto text-center position-relative">
                            <img src="{{ URL::asset('assets/img/graphics/illustration/under-construction.svg') }}"
                                class="img-fluid d-block mx-auto w-lg-50 w-md-75" alt="">
                            <h5 class="mb-4 text-uppercase">
                                We are
                            </h5>
                            <h1 class="mb-5 display-1 lh-1">Coming
                                soon</h1>
                            <div class="mb-5 position-relative z-1">
                                <div class="d-flex flex-wrap justify-content-center align-items-center countdown-timer">
                                </div>
                            </div>
                            <form class="w-lg-75 mx-auto needs-validation" novalidate>
                                <div class="d-md-flex w-100 align-items-stretch rounded-3">
                                    <div class="flex-shrink-0 flex-grow-1">
                                        <input type="email" placeholder="Enter your email" id="soon-newsletter-email"
                                            required
                                            class="form-control border-0 bg-dark bg-opacity-25 form-control-lg shadow-none mb-3 mb-md-0">
                                        <div id="soon-newsletter-email"
                                            class="invalid-feedback ps-3 mb-3 text-start mb-md-0">
                                            Invalid email
                                        </div>
                                    </div>
                                    <div class="d-grid d-md-block ms-md-1 flex-shrink-0">
                                        <button class="btn btn-white btn-lg" type="submit">
                                            Notify me
                                        </button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
            </section>
</x-assan-layout>
