<x-assan-layout layout-type="{{$layoutType}}">
          <section class="position-relative bg-gradient-blur">
              <div class="container pt-12 pt-lg-14 pb-9">
                <div class="row mb-7 align-items-center">
                    <div class="col-md-8 mb-4 mb-md-0">
                        <div class="d-flex align-items-center">
                            <img src="{{ URL::asset('assets/img/companies/zenhub.svg') }}" class="width-7x h-auto position-relative me-4 flex-shrink-0 rounded-circle" alt="">
                        <div class="flex-grow-1">
                            <h2 class="display-5">Zenhub</h2>
                            <p class="mb-0">The Only Agile Project Management Solution Built Directly Into GitHub.</p>
                        </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="dropdown text-md-end">
                            <a href="{{ URL::asset('#') }}" data-bs-toggle="dropdown" class="btn btn-light" aria-expanded="false">
                                <i class="bx bx-share-alt fs-4 me-2"></i> Share company
                            </a>
                            <div class="dropdown-menu dropdown-menu-end mt-2">
                                <a href="{{ URL::asset('#!') }}" class="dropdown-item">
                                    <div class="d-flex align-items-center">
                                        <i class="bx bx-link fs-5 me-2"></i>
                                        <span>Copy link</span>
                                    </div>
                                  </a>
                                   <a href="{{ URL::asset('#!') }}" class="dropdown-item">
                                      <div class="d-flex align-items-center">
                                          <i class="bx bxl-facebook fs-5 me-2"></i>
                                          <span>Share via facebook</span>
                                      </div>
                                    </a>
                                    <a href="{{ URL::asset('#!') }}" class="dropdown-item">
                                        <div class="d-flex align-items-center">
                                            <i class="bx bxl-twitter fs-5 me-2"></i>
                                            <span>Share via Twitter</span>
                                        </div>
                                      </a>
                                      <a href="{{ URL::asset('#!') }}" class="dropdown-item">
                                        <div class="d-flex align-items-center">
                                            <i class="bx bxl-linkedin fs-5 me-2"></i>
                                            <span>Share via linkedin</span>
                                        </div>
                                      </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="sticky-top bg-body-tertiary p-2 z-3 top-0" id="navbar-company">
                    <nav class="nav nav-pills px-3">
                        <a href="{{ URL::asset('#company-about') }}" class="nav-link rounded-pill px-4 active">About</a>
                        <a href="{{ URL::asset('#company-jobs') }}" class="nav-link rounded-pill px-4">Jobs <span class="badge rounded-pill py-0 px-1 bg-body-tertiary ms-1 text-primary">9+</span></a>
                        <a href="{{ URL::asset('#company-reviews') }}" class="nav-link rounded-pill px-4">Reviews</a>
                        <a href="{{ URL::asset('#company-benefits') }}" class="nav-link rounded-pill px-4">Benefits</a>
                    </nav>
                </div>
                <div class="row">
                    <div class="col-lg-8 order-last order-lg-1">
                        <!--about company-->
                       <div class="pb-7 pt-9 pt-lg-11" id="company-about">
                        <h4 class="mb-4">About Zenhub</h4>
                        <p class="lead">
                            From individual developers to interplanetary organizations, teams using ZenHub are changing the world as we know it.
                        </p>
                        <p class="lead">
                            In 2014, ZenHub was built by a team of developers in Vancouver, Canada, to manage projects while preserving their focus in GitHub. Our tight-knit team hails from multiple countries and industries. A few of us have worked at Barclays, Microsoft and Baidu. More than a couple of us are published authors. 
                        </p>
                        <div class="collapse" id="showmore">
                          
                        <p class="lead">
                            ZenHub is the leading productivity management and collaboration platform for empowering agile teams and organizations to scale and get more done. Providing clarity, predictability, and efficiency, Zenhub helps teams from around the world ship better code.
                        </p>
                        </div>
                        <a class="small fw-semibold text-capitalize showMore-link collapsed" data-bs-toggle="collapse" href="{{ URL::asset('#showmore') }}" role="button" aria-expanded="false" aria-controls="showmore">
                        </a>
                       </div>
                        <!--Jobs-->
                        <div id="company-jobs" class="pb-7 pt-9 pt-lg-11">
                            <h4 class="mb-4" data-aos="fade-up">Jobs at Zenhub</h4>
                            <!--Job card-->
                            <div class="mb-4 card hover-shadow-xl">
                                <!--Card-body-->
                                <div class="card-body p-4">
                                    <div class="d-flex align-items-start">
                                        <!--company-->
                                        <img src="{{ URL::asset('assets/img/companies/zenhub.svg') }}"
                                            class="width-6x rounded-3 h-auto me-4 flex-shrink-0" alt="">
                                        <!--Job details-->
                                        <div class="flex-grow-1">
                                            <div class="d-flex flex-column flex-md-row">
                                                <div class="flex-grow-1">
                                                    <h4 class="mb-3">Frontend Engineer</h4>
                                                    <ul class="d-flex small flex-wrap list-unstyled mb-2">
                                                        <li class="me-3 mb-2">
                                                            <h6 class="mb-0">Zenhub</h6>
                                                        </li>
                                                        <li class="me-3 mb-2 text-body-secondary d-flex align-items-center"><i
                                                                class="bx bx-dollar me-1"></i>40K-80K</li>
                                                        <li class="me-3 mb-2 text-body-secondary d-flex align-items-center"><i
                                                                class="bx bx-map me-1"></i>Remote</li>
                                                    </ul>
                                                    <div class="d-flex align-items-center">
                                                        <span
                                                            class="badge py-1 lh-base position-relative z-2 bg-primary-subtle text-primary me-2 px-3">Full
                                                            Time</span>
                                                        <!--Category-->
                                                        <a href="{{ URL::asset('#!') }}"
                                                            class="badge bg-body-secondary text-body py-1 lh-base position-relative z-2">
                                                            <i class="bx bx-code me-1"></i> Developer
                                                        </a>
                                                    </div>
                                                </div>
                                                <!--Date-->
                                                <div class="flex-shrink-0 d-md-block d-none">
                                                    <small class="text-body-secondary">6 hours ago</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!--Link-->
                                <a href="{{ URL::asset('demo-jobs-job-detail.html') }}" class="stretched-link"></a>
                            </div>
                            <!--Job card-->
                            <div class="mb-4 card hover-shadow-xl">
                                <!--Card-body-->
                                <div class="card-body p-4">
                                    <div class="d-flex align-items-start">
                                        <!--company-->
                                        <img src="{{ URL::asset('assets/img/companies/zenhub.svg') }}"
                                            class="width-6x rounded-3 h-auto me-4 flex-shrink-0" alt="">
                                        <!--Job details-->
                                        <div class="flex-grow-1">
                                            <div class="d-flex flex-column flex-md-row">
                                                <div class="flex-grow-1">
                                                    <h4 class="mb-3">Senior Content Designer</h4>
                                                    <ul class="d-flex small flex-wrap list-unstyled mb-2">
                                                        <li class="me-3 mb-2">
                                                            <h6 class="mb-0">Zenhub</h6>
                                                        </li>
                                                        <li class="me-3 mb-2 text-body-secondary d-flex align-items-center"><i
                                                                class="bx bx-dollar me-1"></i>40K-80K</li>
                                                        <li class="me-3 mb-2 text-body-secondary d-flex align-items-center"><i
                                                                class="bx bx-map me-1"></i>California, USA</li>
                                                    </ul>
                                                    <div class="d-flex align-items-center">
                                                        <span
                                                            class="badge py-1 lh-base position-relative z-2 bg-primary-subtle text-primary me-2 px-3">Full
                                                            Time</span>
                                                        <!--Category-->
                                                        <a href="{{ URL::asset('#!') }}"
                                                            class="badge bg-body-secondary text-body py-1 lh-base position-relative z-2">
                                                            <i class="bx bx-color me-1"></i> Brand Designer
                                                        </a>
                                                    </div>
                                                </div>
                                                <!--Date-->
                                                <div class="flex-shrink-0 d-md-block d-none">
                                                    <small class="text-body-secondary">13 hours ago</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!--Link-->
                                <a href="{{ URL::asset('demo-jobs-job-detail.html') }}" class="stretched-link"></a>
                            </div>
                            <!--Job card-->
                            <div class="mb-4 card hover-shadow-xl">
                                <!--Card-body-->
                                <div class="card-body p-4">
                                    <div class="d-flex align-items-start">
                                        <!--company-->
                                        <img src="{{ URL::asset('assets/img/companies/zenhub.svg') }}"
                                            class="width-6x rounded-3 h-auto me-4 flex-shrink-0" alt="">
                                        <!--Job details-->
                                        <div class="flex-grow-1">
                                            <div class="d-flex flex-column flex-md-row">
                                                <div class="flex-grow-1">
                                                    <h4 class="mb-3">Social Media Manager</h4>
                                                    <ul class="d-flex small flex-wrap list-unstyled mb-2">
                                                        <li class="me-3 mb-2">
                                                            <h6 class="mb-0">Zenhub</h6>
                                                        </li>
                                                        <li class="me-3 mb-2 text-body-secondary d-flex align-items-center"><i
                                                                class="bx bx-dollar me-1"></i>80K-120K</li>
                                                        <li class="me-3 mb-2 text-body-secondary d-flex align-items-center"><i
                                                                class="bx bx-map me-1"></i>Paris</li>
                                                    </ul>
                                                    <div class="d-flex align-items-center">
                                                        <span
                                                            class="badge py-1 lh-base position-relative z-2 bg-primary-subtle text-primary me-2 px-3">Full
                                                            Time</span>
                                                        <!--Category-->
                                                        <a href="{{ URL::asset('#!') }}"
                                                            class="badge bg-body-secondary text-body py-1 lh-base position-relative z-2">
                                                            <i class="bx bx-paper-plane me-1"></i> Marketing
                                                        </a>
                                                    </div>
                                                </div>
                                                <!--Date-->
                                                <div class="flex-shrink-0 d-md-block d-none">
                                                    <small class="text-body-secondary">20 hours ago</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!--Link-->
                                <a href="{{ URL::asset('demo-jobs-job-detail.html') }}" class="stretched-link"></a>
                            </div>
                        </div>
                        <!--Reviews-->
                        <div id="company-reviews" class="pt-9 pt-lg-11">
                            <div class="d-flex mb-4 align-items-center justify-content-between" data-aos="fade-up">
                                <h4 class="mb-0 me-4">Reviews</h4>
                                <a href="{{ URL::asset('#!') }}" class="btn btn-sm btn-outline-info">View all reviews</a>
                            </div>

                            <!--Reviews list-->
                            <ul class="list-group" data-aos="fade-up" data-aos-delay="100">
                                <li class="list-group-item p-3 p-lg-4">
                                    <div class="d-flex align-items-start">
                                        <!--User avatar-->
                                    <img src="{{ URL::asset('assets/img/avatar/1.jpg') }}" class="width-5x h-auto rounded-circle flex-shrink-0 me-3" alt="">
                                    <div class="flex-grow-1">
                                           <!--User details-->
                                       <div class="d-flex justify-content-between align-items-center mb-2">
                                        <!--name-->
                                     <h6 class="me-3 mb-0 flex-grow-1 text-truncate">Emily</h6>
                                     <div class="flex-shrink-0 d-flex align-items-center">
                                         <!--reply-->
                                         <a href="{{ URL::asset('#!') }}" class="small me-3">Reply</a>
                                         <!--flag-->
                                         <a href="{{ URL::asset('#!') }}" class="text-body-tertiary me-2"><i class="bx bx-flag"></i></a>
                                     </div>
                                    </div>
                                        <div class="d-flex align-items-center small mb-3 text-warning">
                                            <i class="bx bxs-star"></i>
                                            <i class="bx bxs-star"></i>
                                            <i class="bx bxs-star"></i>
                                            <i class="bx bxs-star"></i>
                                            <i class="bx bxs-star-half"></i>
                                            <span class="ms-2 text-body-secondary lh-1">4.5</span>
                                            <span class="text-body-secondary ms-3 lh-1 ps-3 border-start">3 days ago</span>
                                        </div>
                                        <h5>Efficient Customer Support</h5>
                                        <p class="mb-0">Very helpful answer when I phoned to discuss my Recruitment Advert questions. Appreciated receiving a professional follow-up call offering further info and advice. Good customer liaison and support. Thank you.</p>
                                    </div>
                                    </div>
                                </li>
                                <li class="list-group-item p-3 p-lg-4">
                                   <div class="d-flex align-items-start">
                                        <!--User avatar-->
                                    <img src="{{ URL::asset('assets/img/avatar/2.jpg') }}" class="width-5x h-auto rounded-circle flex-shrink-0 me-3" alt="">
                                    <div class="flex-grow-1">
                                           <!--User details-->
                                       <div class="d-flex justify-content-between align-items-center mb-2">
                                        <!--name-->
                                     <h6 class="me-3 mb-0 flex-grow-1 text-truncate">Helen</h6>
                                     <div class="flex-shrink-0 d-flex align-items-center">
                                         <!--reply-->
                                         <a href="{{ URL::asset('#!') }}" class="small me-3">Reply</a>
                                         <!--flag-->
                                         <a href="{{ URL::asset('#!') }}" class="text-body-tertiary me-2"><i class="bx bx-flag"></i></a>
                                     </div>
                                    </div>
                                        <div class="d-flex align-items-center small mb-3 text-warning">
                                            <i class="bx bxs-star"></i>
                                            <i class="bx bxs-star"></i>
                                            <i class="bx bxs-star"></i>
                                            <i class="bx bxs-star"></i>
                                            <i class="bx bxs-star"></i>
                                            <span class="ms-2 text-body-secondary lh-1">5</span>
                                            <span class="text-body-secondary ms-3 lh-1 ps-3 border-start">1 month ago</span>
                                        </div>
                                        <!--Review title-->
                                        <h5>Really helpful</h5>
                                        <!--text-->
                                        <p class="mb-0">Really helpful. Solved my query quickly and smoothly.</p>
                                    </div>
                                   </div>
                                </li>
                                <li class="list-group-item p-3 p-lg-4">
                                   <div class="d-flex align-items-start">
                                        <!--User avatar-->
                                    <img src="{{ URL::asset('assets/img/avatar/3.jpg') }}" class="width-5x h-auto rounded-circle flex-shrink-0 me-3" alt="">
                                    <div class="flex-grow-1">
                                        <!--User details-->
                                       <div class="d-flex justify-content-between align-items-center mb-2">
                                           <!--name-->
                                        <h6 class="me-3 mb-0 flex-grow-1 text-truncate">Nikita</h6>
                                        <div class="flex-shrink-0 d-flex align-items-center">
                                            <!--reply-->
                                            <a href="{{ URL::asset('#!') }}" class="small me-3">Reply</a>
                                            <!--flag-->
                                            <a href="{{ URL::asset('#!') }}" class="text-body-tertiary me-2"><i class="bx bx-flag"></i></a>
                                        </div>
                                       </div>
                                        <div class="d-flex align-items-center small mb-3 text-warning">
                                            <i class="bx bxs-star"></i>
                                            <i class="bx bxs-star"></i>
                                            <i class="bx bxs-star"></i>
                                            <i class="bx bxs-star"></i>
                                            <i class="bx bxs-star"></i>
                                            <span class="ms-2 text-body-secondary lh-1">5</span>
                                            <span class="text-body-secondary ms-3 lh-1 ps-3 border-start">2 months ago</span>
                                        </div>
                                        <!--Review Title-->
                                        <h5>Amazing help</h5>
                                        <!--Text-->
                                        <p class="mb-3">The amazing customer service team helped me very quick through my job posting issue, was resolved within 2 minutes.</p>
                                    
                                   </div>
                                </div>
                                
                                    <!--Reply-->
                                    <div class="bg-body-tertiary rounded-3 p-3 ps-4 border-start border-info border-4">
                                        <div class="d-flex mb-3 align-items-center justify-content-between">
                                            <span class="flex-grow-1 d-flex align-items-center">
                                                <i class="bx bx-reply me-2"></i> <h6 class="mb-0">Reply from Zenhub</h6>
                                            </span>
                                            <span class="flex-shrink-0 small text-body-secondary">2 months ago</span>
                                        </div>
                                        <strong>Hi Nikita</strong>
                                        <p class="mb-0">Thanks for your positive review, Feel free to ask any questions<br><br>Best Regards<br>Adam</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        
                    </div>
                    <div class="col-lg-4 order-lg-last mt-7 mt-lg-11">
                        <div class="mb-4 shadow-sm card overflow-hidden">
                            <a href="{{ URL::asset('#!') }}" class="btn btn-info w-100 rounded-bottom-0">Claim this profile</a>
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-3">
                                    <img src="{{ URL::asset('assets/img/companies/zenhub.svg') }}" class="width-4x rounded-circle me-3 flex-shrink-0" alt="">
                                    <h5 class="flex-grow-1 mb-0">Zenhub</h5>
                                </div>

                                <small class="d-block text-body-secondary mb-2">Founded in</small>
                                <p class="lead lh-sm">2014</p>
                                <small class="d-block mb-2 text-body-secondary">Primary Industry</small>
                                <p>
                                    <a href="{{ URL::asset('#!') }}" class="badge bg-info bg-opacity-10 text-info rounded-pill hover-shadow-sm">Web Design</a>
                                </p>
                                <small class="d-block text-body-secondary">Company Size</small>
                                <p class="lead">50-100</p>
                                <small class="d-block mb-1 text-body-secondary mb-2">Markets</small>
                                <p class="d-flex flex-wrap">
                                    <a href="{{ URL::asset('#!') }}" class="badge bg-body-secondary text-body me-2 mb-2 rounded-pill hover-shadow-sm"><i class="bx bxs-circle small"></i> UI UX Design</a>
                                    <a href="{{ URL::asset('#!') }}" class="badge bg-body-secondary text-body me-2 mb-2 rounded-pill hover-shadow-sm"><i class="bx bxs-circle small"></i> Developer</a>
                                    <a href="{{ URL::asset('#!') }}" class="badge bg-body-secondary text-body me-2 mb-2 rounded-pill hover-shadow-sm"><i class="bx bxs-circle small"></i> Content Writer</a>
                                </p>
                                <small class="d-block text-body-secondary mb-2">Social Media</small>
                                <p class="d-flex flex-wrap mb-3">
                                    <a href="{{ URL::asset('#!') }}" class="badge bg-body-secondary text-body me-2 mb-2 rounded-pill hover-shadow p-0 width-4x height-4x flex-center"><i class="bx bxl-facebook fs-5"></i></a>
                                    <a href="{{ URL::asset('#!') }}" class="badge bg-body-secondary text-body me-2 mb-2 rounded-pill hover-shadow p-0 width-4x height-4x flex-center"><i class="bx bxl-twitter fs-5"></i></a>
                                    <a href="{{ URL::asset('#!') }}" class="badge bg-body-secondary text-body me-2 mb-2 rounded-pill hover-shadow p-0 width-4x height-4x flex-center"><i class="bx bxl-linkedin fs-5"></i></a>
                                </p>
                                <a href="{{ URL::asset('https://www.zenhub.com/') }}" class="w-100 d-block btn btn-primary" target="_blank">Visit Zenhub <i class="bx bx-link-external"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
              </div>
          </section>
          <section id="company-benefits">
              <!--Benefits-->
              <div class="py-9 py-lg-12 container">
                <h4 class="mb-5 mb-lg-7" data-aos="fade-up">Benefits</h4>
                <div class="row justify-content-around">
                    <!--col-->
                    <div class="col-md-6 col-xl-5 mb-7" data-aos="fade-up">
                        <div class="d-flex align-items-start">
                            <div class="me-4 flex-shrink-0">
                                <!--icon-->
                                <div class="width-6x height-6x flex-center bg-info text-white rounded-circle shadow-sm">
                                    <i class='bx bxs-plane-take-off fs-4 lh-1'></i>
                                </div>
                            </div>
                            <div class="flex-grow-1">
                                <!--heading-->
                                <h5>Generous vacation</h5>
                                <!--description text-->
                        <p class="mb-0">
                            Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                        </p>
                            </div>
                        </div>
                    </div>
                      <!--col-->
                      <div class="col-md-6 col-xl-5 mb-7" data-aos="fade-up" data-aos-delay="100">
                        <div class="d-flex align-items-start">
                            <div class="me-4 flex-shrink-0">
                                <!--icon-->
                                <div class="width-6x height-6x flex-center bg-info text-white rounded-circle shadow-sm">
                                    <i class='bx bxs-coffee-togo fs-4 lh-1'></i>
                                </div>
                            </div>
                            <div class="flex-grow-1">
                                <!--heading-->
                                <h5>Company meals</h5>
                                <!--description text-->
                        <p class="mb-0">
                            Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                        </p>
                            </div>
                        </div>
                    </div>
                      <!--col-->
                      <div class="col-md-6 col-xl-5 mb-7 mb-md-0" data-aos="fade-up" data-aos-delay="150">
                        <div class="d-flex align-items-start">
                            <div class="me-4 flex-shrink-0">
                                <!--icon-->
                                <div class="width-6x height-6x flex-center bg-info text-white rounded-circle shadow-sm">
                                    <i class='bx bxs-calendar fs-4 lh-1'></i>
                                </div>
                            </div>
                            <div class="flex-grow-1">
                                <!--heading-->
                                <h5>Annual retreat and offsites</h5>
                                <!--description text-->
                        <p class="mb-0">
                            Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                        </p>
                            </div>
                        </div>
                    </div>
                      <!--col-->
                      <div class="col-md-6 col-xl-5" data-aos="fade-up" data-aos-delay="200">
                        <div class="d-flex align-items-start">
                            <div class="me-4 flex-shrink-0">
                                <!--icon-->
                                <div class="width-6x height-6x flex-center bg-info text-white rounded-circle shadow-sm">
                                    <i class='bx bxs-bank fs-4 lh-1'></i>
                                </div>
                            </div>
                            <div class="flex-grow-1">
                                <!--heading-->
                                <h5>Financial planning</h5>
                                <!--description text-->
                        <p class="mb-0">
                            Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                        </p>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
          </section>
</x-assan-layout>
