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
                                                <li class="breadcrumb-item active" aria-current="page">Gsap reveal</li>
                                            </ol>
                                        </div>
                                    </nav>
                                    <h1 class="mb-0 display-4">
                                        Gsap image reveals
                                    </h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>


            <section class="overflow-hidden">
                <div class="container py-9 py-lg-11">
                    <div class="row">
                        <div class="col-lg-5 mb-5 mb-lg-0 col-xl-4">
                            <h3>Our Projects</h3>
                        </div>
                        <div class="col-lg-7 col-xl-8">
                            <ul class="js-hover-img">
                                <li class="js-hover-img-item border-bottom border-secondary">
                                    <div class="js-hover-img-link display-2 fw-normal">
                                        <a href="{{ URL::asset('#') }}" class="d-block py-4">Serie mobile app</a>
                                    </div>
                                    <img src="{{ URL::asset('assets/img/960x1140/2.jpg') }}" alt="Image" class="img">
                                </li>
                                <li class="js-hover-img-item border-bottom border-secondary">
                                    <div class="js-hover-img-link display-2 fw-normal">
                                        <a href="{{ URL::asset('#') }}" class="d-block py-4">Benjo bookstore</a>
                                    </div>
                                    <img src="{{ URL::asset('assets/img/960x1140/3.jpg') }}" alt="Image" class="img">
                                </li>
                                <li class="js-hover-img-item border-bottom border-secondary">
                                    <div class="js-hover-img-link display-2 fw-normal">
                                        <a href="{{ URL::asset('#') }}" class="d-block py-4">Fiji print design</a>
                                    </div>
                                    <img src="{{ URL::asset('assets/img/960x1140/4.jpg') }}" alt="Image" class="img">
                                </li>
                                <li class="js-hover-img-item">
                                    <div class="js-hover-img-link display-2 fw-normal">
                                        <a href="{{ URL::asset('#') }}" class="d-block py-4">WFP product design</a>
                                    </div>
                                    <img src="{{ URL::asset('assets/img/960x1140/5.jpg') }}" alt="Image" class="img">
                                </li>
                            </ul>
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
