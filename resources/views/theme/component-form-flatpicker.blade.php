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
                                                <li class="breadcrumb-item active" aria-current="page">Form Flatpickr
                                                </li>
                                            </ol>
                                        </div>
                                    </nav>
                                    <h1 class="mb-0 display-4">
                                        Form Flatpickr
                                    </h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>


            <section class="position-relative">
                <div class="container py-9 py-lg-11">
                    <div class="row mb-7">
                        <div class="col-md-6 mb-5 mb-md-0">
                            <h5 class="mb-4">Basic</h5>
                            <input type="text" value="2022-01-14" data-flatpickr class="form-control">
                        </div>
                        <div class="col-md-6 mb-5 mb-md-0">
                            <h5 class="mb-4">Range</h5>
                            <input type="text" value="2022-01-08 to 2022-01-23" data-flatpickr='{"mode":"range"}'
                                class="form-control">
                        </div>
                    </div>
                    <div class="d-table mx-auto px-4 py-2">
                        <a href="{{ URL::asset('https://flatpickr.js.org/getting-started/') }}" target="_blank"
                            class="h6 link-underline text-dark">Plugin documentation</a>
                    </div>
                </div>
            </section>
            <!--Call to action-->
            <section class="bg-gradient bg-secondary text-white position-relative border-top">
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
