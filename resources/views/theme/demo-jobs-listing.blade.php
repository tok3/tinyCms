<x-assan-layout layout-type="{{$layoutType}}">
            <section class="d-flex bg-gradient-blur w-100 position-relative">
                <div class="container pt-12 pt-lg-15 pb-9 position-relative">
                    <h1 class="display-4 mb-4">Find your job ease</h1>
                    <div class="row">
                        <div class="col-lg-10">
                            <form class="mb-4">
                                <div class="row mx-n2 align-items-center">
                                    <div class="col-12 px-2 col-sm-12 mb-md-0 col-md mb-3">
                                        <div class="position-relative">
                                            <!--Input icon-->
                                            <span
                                                class="position-absolute z-1 start-0 top-50 translate-middle-y d-flex width-3x justify-content-end align-items-center">
                                                <i class="bx bx-search opacity-50"></i>
                                            </span>
                                            <input type="text" class="form-control py-2 ps-6" placeholder="Enter keywords...">
                                        </div>
                                    </div>
                                    <div class="col-12 px-2 col-sm-12 mb-md-0 col-md mb-3">
                                        <div class="position-relative">
                                            <!--Input icon-->
                                            <span
                                                class="position-absolute z-1 start-0 top-50 translate-middle-y d-flex width-3x justify-content-end align-items-center">
                                                <i class="bx bx-map opacity-50"></i>
                                            </span>
                                            <select class="form-control ps-6 py-2 choices-country">
                                                <option value="" selected disabled>Choose location</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-auto px-2">
                                        <button type="submit" class="btn py-2 btn-primary w-100">
                                            <i class="bx bx-search"></i> <span class="ms-2">Find Job</span>
                                        </button>
                                    </div>
                                </div>
                            </form>
                            <div class="row align-items-center">
                                <div class="col-lg-auto mb-3 mb-lg-0">
                                    <small class="mb-1 text-body-tertiary">Popular keywords</small>
                                </div>
                                <!-- End Col -->

                                <div class="col-lg mb-3 mb-lg-0">
                                    <div class="d-flex flex-wrap">
                                        <a href="{{ URL::asset('#!') }}"
                                            class="btn btn-sm rounded-pill btn-secondary me-2 mb-2">Marketing</a>
                                        <a href="{{ URL::asset('#!') }}"
                                            class="btn btn-sm rounded-pill btn-secondary me-2 mb-2">UI
                                            Designer</a>
                                        <a href="{{ URL::asset('#!') }}"
                                            class="btn btn-sm rounded-pill btn-secondary me-2 mb-2">Manager</a>
                                        <a href="{{ URL::asset('#!') }}"
                                            class="btn btn-sm rounded-pill btn-secondary me-2 mb-2">Data
                                            Science</a>
                                    </div>
                                </div>

                                <div class="col-lg-auto">
                                    <!-- Switch -->
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="remoteSwitch">
                                        <label class="form-check-label" for="remoteSwitch">Remote only</label>
                                    </div>
                                    <!-- End Switch -->
                                </div>
                                <!-- End Col -->
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="overflow-hidden position-relative">
                <div class="container py-9 py-lg-12 position-relative">

                    <div class="row">
                        <div class="col-lg-8 mb-5 mb-lg-0 mx-auto">
                            <div class="row mb-4 align-items-center">
                                <div class="col-md">
                                    <h3 class="mb-4 mb-sm-0">2730 Jobs</h3>
                                </div>
                                <div class="col-md-auto">
                                    <div class="d-flex">

                                        <div class="btn-group btn-group-sm flex-shrink-0">
                                            <a href="{{ URL::asset('demo-jobs-listing.html') }}"
                                                class="btn btn-outline-info active">
                                                <i class="bx bx-list-ul fs-5"></i>
                                            </a>
                                            <a href="{{ URL::asset('demo-jobs-listing-grid.html') }}"
                                                class="btn btn-outline-info">
                                                <i class="bx bx-grid-small fs-5"></i>
                                            </a>
                                        </div>
                                        <div class="ms-2 flex-grow-1">
                                            <select name="filter_jobs" id="filter_jobs"
                                                class="form-control form-control-sm w-100"
                                                data-choices='{"position":"auto","searchEnabled":false,"allowHTML":true,"itemSelectText":""}'>
                                                <option value="Most Relevant" selected>Most Relevant</option>
                                                <option value="Most Recent">Most Recent</option>
                                                <option value="Salary (high-low)">Salary (high-low)</option>
                                                <option value="Salary (low-high)">Salary (low-high)</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
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
                                                            class="badge bg-gray-200 text-secondary py-1 lh-base position-relative z-2">
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
                                        <img src="{{ URL::asset('assets/img/companies/slack.svg') }}"
                                            class="width-6x rounded-3 h-auto me-4 flex-shrink-0" alt="">
                                        <!--Job details-->
                                        <div class="flex-grow-1">
                                            <div class="d-flex flex-column flex-md-row">
                                                <div class="flex-grow-1">
                                                    <h4 class="mb-3">Senior Content Designer</h4>
                                                    <ul class="d-flex small flex-wrap list-unstyled mb-2">
                                                        <li class="me-3 mb-2">
                                                            <h6 class="mb-0">Slack</h6>
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
                                                            class="badge bg-gray-200 text-secondary py-1 lh-base position-relative z-2">
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
                                        <img src="{{ URL::asset('assets/img/companies/mailchimp.svg') }}"
                                            class="width-6x rounded-3 h-auto me-4 flex-shrink-0" alt="">
                                        <!--Job details-->
                                        <div class="flex-grow-1">
                                            <div class="d-flex flex-column flex-md-row">
                                                <div class="flex-grow-1">
                                                    <h4 class="mb-3">Social Media Manager</h4>
                                                    <ul class="d-flex small flex-wrap list-unstyled mb-2">
                                                        <li class="me-3 mb-2">
                                                            <h6 class="mb-0">Mailchimp</h6>
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
                                                            class="badge bg-gray-200 text-secondary py-1 lh-base position-relative z-2">
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
                            <!--Job card-->
                            <div class="mb-4 card hover-shadow-xl">
                                <!--Card-body-->
                                <div class="card-body p-4">
                                    <div class="d-flex align-items-start">
                                        <!--company-->
                                        <img src="{{ URL::asset('assets/img/companies/behance.svg') }}"
                                            class="width-6x rounded-3 h-auto me-4 flex-shrink-0 img-invert" alt="">
                                        <!--Job details-->
                                        <div class="flex-grow-1">
                                            <div class="d-flex flex-column flex-md-row">
                                                <div class="flex-grow-1">
                                                    <h4 class="mb-3">Marketing Designer Associate </h4>
                                                    <ul class="d-flex small flex-wrap list-unstyled mb-2">
                                                        <li class="me-3 mb-2">
                                                            <h6 class="mb-0">Behance</h6>
                                                        </li>
                                                        <li class="me-3 mb-2 text-body-secondary d-flex align-items-center"><i
                                                                class="bx bx-dollar me-1"></i>60K-80K</li>
                                                        <li class="me-3 mb-2 text-body-secondary d-flex align-items-center"><i
                                                                class="bx bx-map me-1"></i>Remote</li>
                                                    </ul>
                                                    <div class="d-flex align-items-center">
                                                        <span
                                                            class="badge py-1 lh-base position-relative z-2 bg-primary-subtle text-primary me-2 px-3">Full
                                                            Time</span>
                                                        <!--Category-->
                                                        <a href="{{ URL::asset('#!') }}"
                                                            class="badge bg-gray-200 text-secondary py-1 lh-base position-relative z-2">
                                                            <i class="bx bx-palette me-1"></i> Visual Designer
                                                        </a>
                                                    </div>
                                                </div>
                                                <!--Date-->
                                                <div class="flex-shrink-0 d-md-block d-none">
                                                    <small class="text-body-secondary">2d ago</small>
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
                                        <img src="{{ URL::asset('assets/img/companies/prosperops.svg') }}"
                                            class="width-6x rounded-3 h-auto me-4 flex-shrink-0" alt="">
                                        <!--Job details-->
                                        <div class="flex-grow-1">
                                            <div class="d-flex flex-column flex-md-row">
                                                <div class="flex-grow-1">
                                                    <h4 class="mb-3">Senior User Researcher</h4>
                                                    <ul class="d-flex small flex-wrap list-unstyled mb-2">
                                                        <li class="me-3 mb-2">
                                                            <h6 class="mb-0">Prosperops</h6>
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
                                                            class="badge bg-gray-200 text-secondary py-1 lh-base position-relative z-2">
                                                            <i class="bx bx-code-curly me-1"></i> UX Designer
                                                        </a>
                                                    </div>
                                                </div>
                                                <!--Date-->
                                                <div class="flex-shrink-0 d-md-block d-none">
                                                    <small class="text-body-secondary">3d ago</small>
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
                                        <img src="{{ URL::asset('assets/img/companies/dropbox.svg') }}"
                                            class="width-6x rounded-3 h-auto me-4 flex-shrink-0" alt="">
                                        <!--Job details-->
                                        <div class="flex-grow-1">
                                            <div class="d-flex flex-column flex-md-row">
                                                <div class="flex-grow-1">
                                                    <h4 class="mb-3">Product Marketing Manager</h4>
                                                    <ul class="d-flex small flex-wrap list-unstyled mb-2">
                                                        <li class="me-3 mb-2">
                                                            <h6 class="mb-0">Dropbox</h6>
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
                                                            class="badge bg-gray-200 text-secondary py-1 lh-base position-relative z-2">
                                                            <i class="bx bx-paper-plane me-1"></i> Marketing
                                                        </a>
                                                    </div>
                                                </div>
                                                <!--Date-->
                                                <div class="flex-shrink-0 d-md-block d-none">
                                                    <small class="text-body-secondary">5d ago</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!--Link-->
                                <a href="{{ URL::asset('demo-jobs-job-detail.html') }}" class="stretched-link"></a>
                            </div>
                             <!--:Loader:-->
                             <div class="pt-2 text-center" data-aos="fade-up" data-aos-delay="350">
                                <span class="btn d-inline-flex pe-none align-items-center btn-info rounded-pill">
                                    <div class="spinner-border spinner-border-sm" role="status"></div> 
                                    <span class="ms-2">Loading...</span></span>
                            </div>
                        </div>
                        <div class="col-lg-4 position-relative">
                            <!--Filter-->
                            <div data-aos="fade-up" class="card card-body shadow-sm p-4 mb-4">
                                <h5 class="mb-4">Filter by Categories</h5>
                                <div class="form-check mb-3">
                                    <input type="checkbox" class="form-check-input" id="category_uxdesigner">
                                    <label for="category_uxdesigner">UX Designer</label>
                                </div>
                                <div class="form-check mb-3">
                                    <input type="checkbox" class="form-check-input" id="category_marketing">
                                    <label for="category_marketing">Marketing</label>
                                </div>
                                <div class="form-check mb-3">
                                    <input type="checkbox" class="form-check-input" id="category_visual_designer">
                                    <label for="category_visual_designer">Visual Designer</label>
                                </div>
                                <div class="form-check mb-3">
                                    <input type="checkbox" class="form-check-input" id="category_brand_designer">
                                    <label for="category_brand_designer">Brand Designer</label>
                                </div>
                                <div class="form-check mb-3">
                                    <input type="checkbox" class="form-check-input" id="category_web_design">
                                    <label for="category_web_design">Website Design</label>
                                </div>
                                <div class="form-check mb-3">
                                    <input type="checkbox" class="form-check-input" id="category_design">
                                    <label for="category_design">Design</label>
                                </div>
                                <div class="form-check mb-3">
                                    <input type="checkbox" class="form-check-input" id="category_developer">
                                    <label for="category_developer">Developer</label>
                                </div>
                                <hr>
                                <a href="{{ URL::asset('#!') }}">Clear All</a>
                            </div>
                            <!--Apply now-->
                            <div data-aos="fade-up" class="card card-body shadow-sm p-4">
                                <h5 class="mb-3">Get Updates</h5>
                                <p class="mb-4">Subscribe to our newsletter to get updates about new jobs</p>
                                <form class="needs-validation" novalidate>
                                    <input type="email" class="form-control mb-2" required
                                        placeholder="Enter your email">
                                    <button type="submit" class="btn btn-info w-100">Subscribe</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

</x-assan-layout>
