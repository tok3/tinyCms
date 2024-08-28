<x-assan-layout layout-type="{{$layoutType}}">
           <section class="position-relative bg-gradient-blur">
               <div class="container py-9 py-lg-11">
                   <div class="row pt-5 pt-lg-9">
                    <div class="col-md-5 col-lg-4 mb-5 mb-lg-0">
                       <div class="sticky-top pt-lg-3">
                        <h1 class="mb-3 display-4">Funky bakers</h1>
                        <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi.</p>
                        <hr class="my-4">
                        <h6 class="mb-3 text-body-tertiary">Client</h6>
                        <ul class="list-unstyled mb-0">
                          <li class="mb-2">Name:<span class="fw-semibold text-nav ms-2">Funky bakers</span></li>
                          <li class="mb-2">Services:<span class="fw-semibold text-nav ms-2">Website design & development</span></li>
                          <li>Website:<a class="nav-link-style ms-2 fw-semibold" href="{{ URL::asset('#') }}">https://example.com</a></li>
                        </ul>
                        <hr class="my-4">
                        <h6 class="mb-3 text-body-tertiary">Tools &amp; Technologies</h6>
                        <p class="mb-5 d-flex flex-wrap align-items-center gap-2">
                            <a href="{{ URL::asset('#') }}" class="btn btn-sm btn-primary">Bootstrap</a>
                            <a href="{{ URL::asset('#') }}" class="btn btn-sm btn-primary">Javascript</a>
                            <a href="{{ URL::asset('#') }}" class="btn btn-sm btn-primary">CSS3</a>
                            <a href="{{ URL::asset('#') }}" class="btn btn-sm btn-primary">HTML5</a>
                            <a href="{{ URL::asset('#') }}" class="btn btn-sm btn-primary">Figma</a>
                            <a href="{{ URL::asset('#') }}" class="btn btn-sm btn-primary">Illustration</a>
                        </p>
                        <h6 class="mb-3 text-body-tertiary">Share</h6>
                        <div class="d-flex flex-wrap gap-2">
                            <a class="btn btn-secondary hover-lift p-0 width-4x height-4x flex-center" href="{{ URL::asset('#') }}"><i class="bx bxl-facebook fs-4"></i></a>
                        <a class="btn btn-secondary hover-lift p-0 width-4x height-4x flex-center" href="{{ URL::asset('#') }}"><i class="bx bxl-twitter fs-4"></i></a>
                        <a class="btn btn-secondary hover-lift p-0 width-4x height-4x flex-center" href="{{ URL::asset('#') }}"><i class="bx bxl-instagram fs-4"></i></a>
                        <a class="btn btn-secondary hover-lift p-0 width-4x height-4x flex-center" href="{{ URL::asset('#') }}"><i class="bx bxl-twitch fs-4"></i></a>
                        </div>
                    </div>
                    
                      </div>
                       <div class="col-md-7 ms-auto">
                        <img src="{{ URL::asset('assets/img/projects/case6.jpg') }}" class="img-fluid mb-3" alt="" data-aos="fade-up" data-aos-once="false">
                        <img src="{{ URL::asset('assets/img/projects/case2.jpg') }}" class="img-fluid mb-3" alt="" data-aos="fade-up" data-aos-delay="100" data-aos-once="false">
                        <img src="{{ URL::asset('assets/img/projects/case3.jpg') }}" class="img-fluid mb-3" alt="" data-aos="fade-up" data-aos-delay="100" data-aos-once="false">
                        <img src="{{ URL::asset('assets/img/projects/case4.jpg') }}" class="img-fluid mb-3" alt="" data-aos="fade-up" data-aos-delay="100" data-aos-once="false">
                        <img src="{{ URL::asset('assets/img/projects/case5.jpg') }}" class="img-fluid mb-3" alt="" data-aos="fade-up" data-aos-delay="100" data-aos-once="false">
                        <img src="{{ URL::asset('assets/img/projects/case1.jpg') }}" class="img-fluid" alt="" data-aos="fade-up" data-aos-delay="100" data-aos-once="false">
                    </div>
                   </div>
               </div>
           </section>
           <section class="position-relative border-top border-bottom overflow-hidden position-relative">
            <div class="container py-9 py-lg-11 position-relative">
                <div class="row mb-7 justify-content-center text-center">
                    <div class="col-xl-9 col-lg-10">
                        <h3 class="display-6 mb-0">Related projects</h3>
                        
                    </div>
                </div>
               <div class="row justify-content-center">
                <div class="col-md-6 mb-4 mb-md-0">
                    <a href="{{ URL::asset('#!') }}" class="card-over card-split-hover d-block card-hover overflow-hidden">
                        <img src="{{ URL::asset('assets/img/projects/lg5.jpg') }}" alt="" class="img-fluid img-zoom">
                        <div class="card-overlay p-4 p-lg-5 d-flex align-items-end text-white">
                            <ul class="list-unstyled overlay-items">
                                <li>
                                    <h5 class="mb-2 fs-4">Awesome title</h5>
                                </li>
                                <li><span>Awesome Subtitle</span></li>
                            </ul>
                        </div>
                    </a>
                </div>
                <div class="col-md-6">
                    <a href="{{ URL::asset('#!') }}" class="card-over card-split-hover d-block card-hover overflow-hidden">
                        <img src="{{ URL::asset('assets/img/projects/lg4.jpg') }}" alt="" class="img-fluid img-zoom">
                        <div class="card-overlay p-4 p-lg-5 d-flex align-items-end text-white">
                            <ul class="list-unstyled overlay-items">
                                <li>
                                    <h5 class="mb-2 fs-4">Awesome title</h5>
                                </li>
                                <li><span>Awesome Subtitle</span></li>
                            </ul>
                        </div>
                    </a>
                </div>
               </div>
            </div>
        </section>
</x-assan-layout>
