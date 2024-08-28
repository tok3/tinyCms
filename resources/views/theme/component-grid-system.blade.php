<x-assan-layout layout-type="{{$layoutType}}">
           <!--page-hero-->
           <section class="bg-gradient-primary text-white position-relative">
            <div class="container pt-14 pb-9 pb-lg-12 position-relative z-1">
                <div class="row pt-lg-5 align-items-center justify-content-center text-center">
                        <div class="col-lg-10 col-xl-7 z-2">
                            <div class="position-relative">
                                <div>
                                    <nav class="d-flex justify-content-center" aria-label="breadcrumb">
                                        <div class="mb-4">
                                            <ol class="breadcrumb mb-0">
                                                <li class="breadcrumb-item"><a href="{{ URL::asset('#') }}">Home</a></li>
                                                <li class="breadcrumb-item active">Components</li>
                                                <li class="breadcrumb-item active" aria-current="page">Grid system</li>
                                            </ol>
                                        </div>
                                    </nav>
                                    <h1 class="mb-0 display-4">
                                        Bootstrap grids
                                    </h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>


            <section>
                <div class="container py-6 py-lg-11">
                    <div class="d-flex align-items-center mb-5">
                        <h6 class="mb-0 pe-3 flex-grow-0">Basic Grids</h6>
                        <div class="border-bottom flex-grow-1"></div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-12">
                            <div class="card card-body border-0 bg-body-tertiary">
                                1/1
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-6">
                            <div class="card card-body border-0 bg-body-tertiary">
                                1/2
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="card card-body border-0 bg-body-tertiary">
                                1/2
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm">
                            <div class="card card-body border-0 bg-body-tertiary">
                                1/3
                            </div>
                        </div>
                        <div class="col-sm">
                            <div class="card card-body border-0 bg-body-tertiary">
                                1/3
                            </div>
                        </div>
                        <div class="col-sm">
                            <div class="card card-body border-0 bg-body-tertiary">
                                1/3
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-3">
                            <div class="card border-0 bg-body-tertiary card-body">
                                1/4
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card border-0 bg-body-tertiary card-body">
                                1/4
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card border-0 bg-body-tertiary card-body">
                                1/4
                            </div>

                        </div>
                        <div class="col-md-3">
                            <div class="card border-0 bg-body-tertiary card-body">
                                1/4
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="position-relative border-top">
                <div class="container py-6 py-lg-11">
                    <div class="d-flex align-items-center mb-5">
                        <h6 class="mb-0 pe-3 flex-grow-0">Flexbox Grids</h6>
                        <div class="border-bottom flex-grow-1"></div>
                    </div>
                    <div class="row g-2">
                        <div class="col-4">
                            <div class="card card-body border-0 bg-body-tertiary h-100">
                                1/3
                            </div>
                        </div>
                        <div class="col-8">
                            <div class="form-row mb-2">
                                <div class="col-12">
                                    <div class="card py-5 card-body border-0 bg-body-tertiary h-100">
                                        1/1
                                    </div>
                                </div>
                            </div>
                            <div class="row g-2">
                                <div class="col-6">
                                    <div class="card py-5 card-body border-0 bg-body-tertiary h-100">
                                        1/2
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="card py-5 card-body border-0 bg-body-tertiary h-100">
                                        1/2
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="bg-gradient bg-secondary text-white position-relative">
                <div class="container py-9 py-lg-11">
                    <div class="row align-items-center justify-content-center">
                        <div class="col-lg-10 col-xl-9 text-center mx-auto">
                            <h2 class="mb-4 display-4" data-aos="fade-up">
                                Accelerate your business online
                            </h2>
                            <p class="lead mb-5 opacity-75" data-aos="fade-up">Build any type of landing page ease.</p>
                             <div data-aos="fade-up">
                                <a href="{{ URL::asset('#!') }}" class="btn btn-primary btn-lg">Purchase a license</a>
                            </div>
                        </div>
                        <!--End Col-->
                    </div> <!-- / .row -->
                </div> <!-- / .container -->
            </section>
</x-assan-layout>
