<x-assan-layout layout-type="{{$layoutType}}">
            <!--page-hero-->
            <section class="position-relative">
                <div class="container pt-12 pb-7 pb-lg-9 position-relative">
                    <div class="row align-items-center">
                        <div class="col-md-8 mx-auto mx-lg-0 col-lg-6 mb-7 mb-lg-0 position-relative z-1">
                            <p class="mb-4 small d-table px-3 py-1 bg-info bg-opacity-10 text-info rounded">Explore more
                                than 70K
                                Jobs</p>
                            <h2 class="display-4 mb-5 position-relative me-md-n4">Get Job with your Interests and
                                Abilities</h2>
                            <div class="position-relative z-1 mb-6">
                                <form>
                                    <div class="row mx-n2 align-items-center">
                                        <div class="col-12 px-2 col-sm-6 mb-3">
                                            <div class="position-relative">
                                                <!--Input icon-->
                                                <span
                                                    class="position-absolute start-0 top-50 translate-middle-y d-flex width-3x justify-content-end align-items-center">
                                                    <i class="bx bx-search opacity-50"></i>
                                                </span>
                                                <input type="text" class="form-control ps-6 py-2"
                                                    placeholder="Enter Job Title or Keywords">
                                            </div>
                                        </div>
                                        <div class="col-12 px-2 col-sm-6 mb-3">
                                            <div class="position-relative">
                                                <!--Input icon-->
                                                <span
                                                    class="position-absolute z-1 start-0 top-50 translate-middle-y d-flex width-3x justify-content-end align-items-center">
                                                    <i class="bx bx-map opacity-50"></i>
                                                </span>
                                                <select class="form-control py-2 ps-6 choices-country">
                                                    <option value="" selected disabled>Choose location</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12 px-2">
                                            <button type="submit" class="btn btn-primary py-2 w-100">
                                                <i class="bx bx-search"></i> <span class="ms-2">Find Job</span>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <small class="text-body-secondary">Trusted by companies like</small>
                            <!--Partners-->
                            <ul class="d-flex flex-wrap list-unstyled mb-0 me-lg-n9 position-relative">
                                <li class="me-5 mt-5">
                                    <img src="{{ URL::asset('assets/img/partners/dark/slack.svg') }}" class="w-auto img-invert" height="24" alt="">
                                </li>
                                <li class="me-5 mt-5">
                                    <img src="{{ URL::asset('assets/img/partners/dark/zillow.svg') }}" class="w-auto img-invert" height="24" alt="">
                                </li>
                                <li class="me-5 mt-5">
                                    <img src="{{ URL::asset('assets/img/partners/dark/uber.svg') }}" class="w-auto img-invert" height="24" alt="">
                                </li>
                                <li class="me-5 mt-5">
                                    <img src="{{ URL::asset('assets/img/partners/dark/booking.com.svg') }}" class="w-auto img-invert" height="24"
                                        alt="">
                                </li>
                            </ul>
                        </div>
                        <div class="col-11 ms-auto me-auto me-lg-0 col-md-10 col-lg-5 ms-lg-auto position-relative">
                            <div class="position-relative">
                                <!--imask image-->
                                <div class="bg-mask">
                                    <img src="{{ URL::asset('assets/img/960x1140/4.jpg') }}" class="mask-blob-2 mask-image" alt="">
                                </div>
                                <!--hero image card-->
                                <div
                                    class="card bg-body-tertiary shadow-lg border-0 width-20x position-absolute end-0 me-6 me-lg-9 mb-n6 mb-lg-n9 bottom-0">
                                    <div class="card-header fw-bold bg-info text-white text-center border-0">Applicants
                                        List
                                    </div>
                                    <div class="card-body p-0">
                                        <div class="d-flex align-items-center border-bottom py-3 px-4">
                                            <div class="me-3 flex-shrink-0">
                                                <img src="{{ URL::asset('assets/img/avatar/5.jpg') }}" class="avatar rounded-pill" alt="">
                                            </div>
                                            <div class="flex-grow-1">
                                                <h6 class="mb-0">John Doe</h6>
                                                <p class="mb-0 small text-body-secondary">Product Designer</p>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center border-bottom py-3 px-4">
                                            <div class="me-3 flex-shrink-0">
                                                <img src="{{ URL::asset('assets/img/avatar/1.jpg') }}" class="avatar rounded-pill" alt="">
                                            </div>
                                            <div class="flex-grow-1">
                                                <h6 class="mb-0">Emily Doe</h6>
                                                <p class="mb-0 small text-body-secondary">Web Developer</p>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center py-3 px-4">
                                            <div class="me-3 mt-1 flex-shrink-0">
                                                <img src="{{ URL::asset('assets/img/avatar/7.jpg') }}" class="avatar rounded-pill" alt="">
                                            </div>
                                            <div class="flex-grow-1">
                                                <h6 class="mb-0 font-size-4 text-black-2">Mark Otto</h6>
                                                <p class="mb-0 small text-body-secondary">UI Designer</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Hero image-->

            </section>

            <section class="position-relative">
                <div class="container py-9 py-lg-11">
                    <div class="row justify-content-center">
                        <!--Facts col-->
                        <div class="col-lg-3 col-md-4 mb-5 mb-md-0 text-center">
                            <!--Facts card-->
                            <div class="card border-0">
                                <!--fact-card-body-->
                                <div class="card-body p-4 position-relative">
                                    <!--Facts digit-->
                                    <h2 class="mb-4" data-countup='{"startVal": "0","suffix":"+"}' data-to="2730"
                                        data-aos data-aos-id="countup:in">0</h2>
                                    <!--Facts title-->
                                    <p class="mb-0">Jobs opportunities</p>
                                </div>
                            </div>
                        </div>
                        <!--Facts col-->
                        <div class="col-lg-3 col-md-4 mb-5 mb-md-0 text-center">
                            <!--Facts card-->
                            <div class="card border-0">
                                <!--fact-card-body-->
                                <div class="card-body p-4 position-relative">
                                    <!--Facts digit-->
                                    <h2 class="mb-4" data-countup='{"startVal": "0","suffix":"+"}' data-to="440"
                                        data-aos data-aos-id="countup:in">0</h2>
                                    <!--Facts title-->
                                    <p class="mb-0">Top companies</p>
                                </div>
                            </div>
                        </div>
                        <!--Facts col-->
                        <div class="col-lg-3 col-md-4 text-center">
                            <!--Facts card-->
                            <div class="card border-0">
                                <!--fact-card-body-->
                                <div class="card-body p-4 position-relative">
                                    <!--Facts digit-->
                                    <h2 class="mb-4" data-countup='{"startVal": "0","suffix":"K"}' data-to="150"
                                        data-aos data-aos-id="countup:in">0</h2>
                                    <!--Facts title-->
                                    <p class="mb-0">Active users</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="position-relative overflow-hidden">
                <div class="container pb-9 pb-lg-11 position-relative">
                    <div class="row mb-5 mb-lg-9 justify-content-between align-items-end">
                        <div class="col-lg-9 mx-auto text-center">
                            <h2 class="display-6 mb-0" data-aos="fade-up">How does it works?</h2>
                        </div>
                    </div>
                    <div class="row">
                        <!--Feature column-->
                        <div class="col-12 col-lg mb-7 mb-lg-0" data-aos="fade-up" data-aos-delay="100">
                            <div class="text-center position-relative">
                                <div class="position-relative">
                                    <div
                                        class="mb-4 position-relative width-9x height-9x text-white flex-center overflow-hidden">
                                        <!--Icon bg shape-->
                                        <svg class="w-100 h-100 position-absolute text-primary start-0 top-0 bottom-0 end-0"
                                        preserveAspectRatio="xMidYMid meet" width="101" height="101" viewBox="0 0 101 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M49.8646 100.836C29.3177 100.628 11.4444 87.7261 4.54642 68.3967C-3.05192 47.1047 -1.4418 21.6257 16.8429 8.30273C35.2155 -5.08436 60.0472 1.06004 78.2224 14.7133C95.3636 27.5898 104.8 48.9948 98.0999 69.3432C91.4658 89.491 71.1012 101.051 49.8646 100.836Z" fill="currentColor"/>
                                            </svg>
                                        <i class="bx bx-user-circle fs-3 position-relative"></i>
                                    </div>
                                    <h5 class="mb-3">Create free account</h5>
                                    <p class="mb-4 px-lg-5">
                                        Lorem ipsum is placeholder text commonly used in the graphic, print, and
                                        publishing
                                        industries for layouts and visual mockups.
                                    </p>
                                    <a href="{{ URL::asset('#!') }}" class="link-hover-underline fw-semibold">
                                        Learn More<i class="bx bx-right-arrow-alt align-middle ms-1 lh-1 fs-5"></i>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <!--Feature column-->
                        <div class="col-12 col-lg mb-7 mb-lg-0" data-aos="fade-up" data-aos-delay="150">
                            <div class="text-center position-relative">
                                <div class="position-relative">
                                    <div
                                        class="mb-4 position-relative width-9x height-9x text-white flex-center overflow-hidden">
                                        <!--Icon bg shape-->
                                        <svg class="w-100 h-100 position-absolute text-primary start-0 top-0 bottom-0 end-0"
                                        preserveAspectRatio="xMidYMid meet" width="101" height="101" viewBox="0 0 101 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M49.8646 100.836C29.3177 100.628 11.4444 87.7261 4.54642 68.3967C-3.05192 47.1047 -1.4418 21.6257 16.8429 8.30273C35.2155 -5.08436 60.0472 1.06004 78.2224 14.7133C95.3636 27.5898 104.8 48.9948 98.0999 69.3432C91.4658 89.491 71.1012 101.051 49.8646 100.836Z" fill="currentColor"/>
                                            </svg>
                                        <i class="bx bx-search fs-3 position-relative"></i>
                                    </div>
                                    <h5 class="mb-3">Find your job</h5>
                                    <p class="mb-4 px-lg-5">
                                        Lorem ipsum is placeholder text commonly used in the graphic, print, and
                                        publishing
                                        industries for layouts and visual mockups.
                                    </p>
                                    <a href="{{ URL::asset('#!') }}" class="link-hover-underline fw-semibold">
                                        Learn More<i class="bx bx-right-arrow-alt align-middle ms-1 lh-1 fs-5"></i>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <!--Feature column-->
                        <div class="col-12 col-lg-4" data-aos="fade-up" data-aos-delay="200">
                            <div class="text-center position-relative">
                                <div class="position-relative">
                                    <div
                                        class="mb-4 position-relative width-9x height-9x text-white rounded-3 flex-center overflow-hidden">
                                        <!--Icon bg shape-->
                                        <svg class="w-100 h-100 position-absolute text-primary start-0 top-0 bottom-0 end-0"
                                        preserveAspectRatio="xMidYMid meet" width="101" height="101" viewBox="0 0 101 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M49.8646 100.836C29.3177 100.628 11.4444 87.7261 4.54642 68.3967C-3.05192 47.1047 -1.4418 21.6257 16.8429 8.30273C35.2155 -5.08436 60.0472 1.06004 78.2224 14.7133C95.3636 27.5898 104.8 48.9948 98.0999 69.3432C91.4658 89.491 71.1012 101.051 49.8646 100.836Z" fill="currentColor"/>
                                            </svg>
                                        <i class="bx bx-send fs-3 position-relative"></i>
                                    </div>
                                    <h5 class="mb-3">Apply for job</h5>
                                    <p class="mb-4 px-lg-5">
                                        Lorem ipsum is placeholder text commonly used in the graphic, print, and
                                        publishing
                                        industries for layouts and visual mockups.
                                    </p>
                                    <a href="{{ URL::asset('#!') }}" class="link-hover-underline fw-semibold">
                                        Learn More<i class="bx bx-right-arrow-alt align-middle ms-1 lh-1 fs-5"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="position-relative bg-gradient-light">
                <div class="container py-9 py-lg-11 position-relative">
                    <div class="row mb-5 mb-lg-9 justify-content-between align-items-end">
                        <div class="col-lg-7 col-md-10 mx-auto text-center">
                            <span class="d-block text-primary mb-4" data-aos="zoom-in">Current Openings</span>
                            <h2 class="display-6 mb-0">Explore <span class="text-decoration-underline" data-aos
                                    data-countup='{"startVal": 0,"suffix":"+"}' data-to="2730"
                                    data-aos-id="countup:in">0</span><br> job opportunities</h2>
                        </div>
                    </div>
                    <!--Jobs row-->
                    <div class="row">
                        <div class="col-md-6" data-aos="fade-up">
                            <!--Job card-->
                            <div class="mb-4 card hover-lift hover-shadow-xl bg-transparent">
                                <!--Card-body-->
                                <div class="card-body p-4">
                                    <div>
                                        <!--company-->
                                        <div class="mb-4 d-flex align-items-center">
                                            <img src="{{ URL::asset('assets/img/companies/zenhub.svg') }}"
                                                class="width-6x rounded-2 h-auto me-3 flex-shrink-0" alt="">
                                            <h6 class="mb-0 flex-grow-1">Zenhub</h6>
                                            <!--Date-->
                                            <small class="text-body-secondary d-block ps-3 flex-shrink-0">6 hours ago</small>
                                        </div>
                                        <!--Job details-->
                                        <div class="flex-grow-1">
                                            <div>
                                                <div class="flex-grow-1">
                                                    <h4 class="mb-3">Frontend Engineer</h4>
                                                    <ul class="d-flex small flex-wrap list-unstyled mb-4">
                                                        <li class="me-3 mb-2 d-flex align-items-center"><i
                                                                class="bx bx-dollar me-1"></i>40K-80K</li>
                                                        <li class="me-3 mb-2 d-flex align-items-center"><i
                                                                class="bx bx-map me-1"></i>Remote</li>
                                                    </ul>
                                                    <div class="d-flex align-items-center">
                                                        <span
                                                            class="badge py-1 lh-base position-relative z-2 bg-primary-subtle text-primary me-2 px-3">Full
                                                            Time</span>
                                                        <!--Category-->
                                                        <a href="{{ URL::asset('#!') }}"
                                                            class="badge bg-body-tertiary text-body py-1 lh-base position-relative z-2">
                                                            <i class="bx bx-code me-1"></i> Developer
                                                        </a>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!--Link-->
                                <a href="{{ URL::asset('demo-jobs-job-detail.html') }}" class="stretched-link"></a>
                            </div>
                        </div>
                        <div class="col-md-6" data-aos="fade-up" data-aos-delay="100">
                            <!--Job card-->
                            <div class="mb-4 card hover-lift hover-shadow-xl bg-transparent">
                                <!--Card-body-->
                                <div class="card-body p-4">
                                    <div>
                                        <!--company-->
                                        <div class="d-flex align-items-center mb-4">
                                            <img src="{{ URL::asset('assets/img/companies/slack.svg') }}"
                                                class="width-6x rounded-2 h-auto me-3 flex-shrink-0" alt="">
                                            <h6 class="mb-0 flex-grow-1">Slack</h6>
                                            <!--Date-->
                                            <small class="text-body-secondary d-block ps-3 flex-shrink-0">13 hours ago</small>
                                        </div>
                                        <!--Job details-->
                                        <div class="flex-grow-1">
                                            <div>
                                                <div class="flex-grow-1">
                                                    <h4 class="mb-3">Senior Content Designer</h4>
                                                    <ul class="d-flex small flex-wrap list-unstyled mb-4">
                                                        <li class="me-3 mb-2 d-flex align-items-center"><i
                                                                class="bx bx-dollar me-1"></i>40K-80K</li>
                                                        <li class="me-3 mb-2 d-flex align-items-center"><i
                                                                class="bx bx-map me-1"></i>California, USA</li>
                                                    </ul>
                                                    <div class="d-flex align-items-center">
                                                        <span class="badge py-1 lh-base position-relative z-2 bg-primary-subtle text-primary me-2 px-3">Full
                                                            Time</span>
                                                        <!--Category-->
                                                        <a href="{{ URL::asset('#!') }}"
                                                            class="badge bg-body-tertiary text-body py-1 lh-base position-relative z-2">
                                                            <i class="bx bx-color me-1"></i> Brand Designer
                                                        </a>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!--Link-->
                                <a href="{{ URL::asset('demo-jobs-job-detail.html') }}" class="stretched-link"></a>
                            </div>
                        </div>
                        <div class="col-md-6" data-aos="fade-up" data-aos-delay="150">
                            <!--Job card-->
                            <div class="mb-4 card hover-lift hover-shadow-xl bg-transparent">
                                <!--Card-body-->
                                <div class="card-body p-4">
                                    <div>
                                        <!--company-->
                                        <div class="mb-4 d-flex align-items-center">
                                            <img src="{{ URL::asset('assets/img/companies/mailchimp.svg') }}"
                                                class="width-6x rounded-2 h-auto me-3 flex-shrink-0" alt="">
                                            <h6 class="mb-0 flex-grow-1">Mailchimp</h6>
                                            <!--Date-->
                                            <small class="text-body-secondary d-block ps-3 flex-shrink-0">20 hours ago</small>
                                        </div>
                                        <!--Job details-->
                                        <div class="flex-grow-1">
                                            <div>
                                                <div class="flex-grow-1">
                                                    <h4 class="mb-3">Social Media Manager</h4>
                                                    <ul class="d-flex small flex-wrap list-unstyled mb-4">
                                                        <li class="me-3 mb-2 d-flex align-items-center"><i
                                                                class="bx bx-dollar me-1"></i>80K-120K</li>
                                                        <li class="me-3 mb-2 d-flex align-items-center"><i
                                                                class="bx bx-map me-1"></i>Paris</li>
                                                    </ul>
                                                    <div class="d-flex align-items-center">
                                                        <span
                                                        class="badge py-1 lh-base position-relative z-2 bg-primary-subtle text-primary me-2 px-3">Full
                                                        Time</span>
                                                        <!--Category-->
                                                        <a href="{{ URL::asset('#!') }}"
                                                            class="badge bg-body-tertiary text-body py-1 lh-base position-relative z-2">
                                                            <i class="bx bx-paper-plane me-1"></i> Marketing
                                                        </a>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!--Link-->
                                <a href="{{ URL::asset('demo-jobs-job-detail.html') }}" class="stretched-link"></a>
                            </div>
                        </div>
                        <div class="col-md-6" data-aos="fade-up" data-aos-delay="200">
                            <!--Job card-->
                            <div class="mb-4 card hover-lift hover-shadow-xl bg-transparent">
                                <!--Card-body-->
                                <div class="card-body p-4">
                                    <div>
                                        <!--company-->
                                        <div class="mb-4 d-flex align-items-center">
                                            <img src="{{ URL::asset('assets/img/companies/behance.svg') }}"
                                                class="width-6x rounded-2 h-auto me-3 flex-shrink-0 img-invert" alt="">
                                            <h6 class="mb-0 flex-grow-1">Behance</h6>
                                            <!--Date-->
                                            <small class="text-body-secondary d-block ps-3 flex-shrink-0">2d ago</small>
                                        </div>
                                        <!--Job details-->
                                        <div class="flex-grow-1">
                                            <div>
                                                <div class="flex-grow-1">
                                                    <h4 class="mb-3">Marketing Designer Associate </h4>
                                                    <ul class="d-flex small flex-wrap list-unstyled mb-4">
                                                        <li class="me-3 mb-2 d-flex align-items-center"><i
                                                                class="bx bx-dollar me-1"></i>60K-80K</li>
                                                        <li class="me-3 mb-2 d-flex align-items-center"><i
                                                                class="bx bx-map me-1"></i>Remote</li>
                                                    </ul>
                                                    <div class="d-flex align-items-center">
                                                        <span
                                                            class="badge py-1 lh-base position-relative z-2 bg-primary-subtle text-primary me-2 px-3">Full
                                                            Time</span>
                                                        <!--Category-->
                                                        <a href="{{ URL::asset('#!') }}"
                                                            class="badge bg-body-tertiary text-body py-1 lh-base position-relative z-2">
                                                            <i class="bx bx-palette me-1"></i> Visual designer
                                                        </a>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!--Link-->
                                <a href="{{ URL::asset('demo-jobs-job-detail.html') }}" class="stretched-link"></a>
                            </div>
                        </div>
                        <div class="col-md-6" data-aos="fade-up" data-aos-delay="250">
                            <!--Job card-->
                            <div class="mb-4 card hover-lift hover-shadow-xl bg-transparent">
                                <!--Card-body-->
                                <div class="card-body p-4">
                                    <div>
                                        <!--company-->
                                        <div class="mb-4 d-flex align-items-center">
                                            <img src="{{ URL::asset('assets/img/companies/prosperops.svg') }}"
                                                class="width-6x rounded-2 h-auto me-3 flex-shrink-0" alt="">
                                            <h6 class="mb-0 flex-grow-1">Prosperops</h6>
                                            <!--Date-->
                                            <small class="text-body-secondary d-block ps-3 flex-shrink-0">3d ago</small>
                                        </div>
                                        <!--Job details-->
                                        <div class="flex-grow-1">
                                            <div>
                                                <div class="flex-grow-1">
                                                    <h4 class="mb-3">Senior User Researcher</h4>
                                                    <ul class="d-flex small flex-wrap list-unstyled mb-4">
                                                        <li class="me-3 mb-2 d-flex align-items-center"><i
                                                                class="bx bx-dollar me-1"></i>40K-80K</li>
                                                        <li class="me-3 mb-2 d-flex align-items-center"><i
                                                                class="bx bx-map me-1"></i>Remote</li>
                                                    </ul>
                                                    <div class="d-flex align-items-center">
                                                        <span
                                                        class="badge py-1 lh-base position-relative z-2 bg-primary-subtle text-primary me-2 px-3">Full
                                                        Time</span>
                                                        <!--Category-->
                                                        <a href="{{ URL::asset('#!') }}"
                                                            class="badge bg-body-tertiary text-body py-1 lh-base position-relative z-2">
                                                            <i class="bx bx-code-curly me-1"></i> UX Designer
                                                        </a>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!--Link-->
                                <a href="{{ URL::asset('demo-jobs-job-detail.html') }}" class="stretched-link"></a>
                            </div>
                        </div>
                        <div class="col-md-6" data-aos="fade-up" data-aos-delay="300">
                            <!--Job card-->
                            <div class="mb-4 card hover-lift hover-shadow-xl bg-transparent">
                                <!--Card-body-->
                                <div class="card-body p-4">
                                    <div>
                                        <div class="d-flex align-items-center mb-4">
                                            <!--company-->
                                            <img src="{{ URL::asset('assets/img/companies/dropbox.svg') }}"
                                                class="width-6x rounded-2 h-auto me-3 flex-shrink-0" alt="">
                                            <h6 class="mb-0 flex-grow-1">Dropbox</h6>
                                            <!--Date-->
                                            <small class="text-body-secondary flex-shrink-0 d-block ps-3">5d ago</small>
                                        </div>
                                        <!--Job details-->
                                        <div class="flex-grow-1">
                                            <div>
                                                <div class="flex-grow-1">
                                                    <h4 class="mb-3">Product Marketing Manager</h4>
                                                    <ul class="d-flex small flex-wrap list-unstyled mb-4">
                                                        <li class="me-3 mb-2 d-flex align-items-center"><i
                                                                class="bx bx-dollar me-1"></i>40K-80K</li>
                                                        <li class="me-3 mb-2 d-flex align-items-center"><i
                                                                class="bx bx-map me-1"></i>Remote</li>
                                                    </ul>
                                                    <div class="d-flex align-items-center">
                                                        <span
                                                            class="badge py-1 lh-base position-relative z-2 bg-primary-subtle text-primary me-2 px-3">Full
                                                            Time</span>
                                                        <!--Category-->
                                                        <a href="{{ URL::asset('#!') }}"
                                                            class="badge bg-body-tertiary text-body py-1 lh-base position-relative z-2">
                                                            <i class="bx bx-paper-plane me-1"></i> Marketing
                                                        </a>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!--Link-->
                                <a href="{{ URL::asset('demo-jobs-job-detail.html') }}" class="stretched-link"></a>
                            </div>
                        </div>
                    </div>
                    <div class="text-center pt-4">
                        <a href="{{ URL::asset('#!') }}" class="link-underline fw-bold">Explore All Jobs <i
                                class="bx bx-right-arrow-alt fs-5"></i></a>
                    </div>
                </div>
            </section>

            <section class="position-relative">
                <div class="container py-9 py-lg-11 position-relative">
                    <div class="row align-items-center">
                        <div class="col-md-6 col-lg-5">
                            <h2 data-aos="fade-up" class="display-6 mb-4 position-relative">
                                Get matched the most valuable jobs</h2>
                            <p data-aos="fade-up" data-aos-delay="100" class="mb-5 lead">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                incididunt labore dolore magna aliqua.
                            </p>
                            <div class="mb-4" data-aos-delay="150" data-aos="fade-up">
                                <a href="{{ URL::asset('#!') }}" class="btn btn-lg btn-primary">Get started</a>
                            </div>
                            <p class="text-body-secondary mb-0" data-aos="fade-up" data-aos-delay="200">
                                No credit card required
                            </p>
                        </div>
                        <div class="col-md-6 col-lg-5 ms-lg-auto">
                            <!--imask image-->
                            <div class="bg-mask">
                                <img src="{{ URL::asset('assets/img/960x1140/1.jpg') }}" class="mask-blob mask-image" alt="">
                            </div>
                            <!--hero image card-->
                        </div>
                    </div>
                </div>
            </section>

            <!--Testimonials-->
            <section>
                <div class="container">
                    <div class="bg-body-tertiary rounded-4 px-4 py-7">
                        <div class="col-lg-11 col-xl-10 mx-auto" data-aos="fade-up">
                            <!--Testimonials slider-->
                            <div class="swiper swiper-testimonials">
                                <div class="swiper-wrapper mb-9">
                                    <!--testimonial-->
                                    <div class="swiper-slide">
                                        <i class="bx bxs-quote-alt-left fs-1 mb-3 text-opacity-50 text-primary"></i>
                                        <p class="lead mb-4">
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                            consequat.
                                        </p>
                                        <div class="d-flex align-items-center">
                                            <img src="{{ URL::asset('assets/img/avatar/1.jpg') }}"
                                                class="width-6x h-auto rounded-circle me-4 flex-shrink-0" alt="">
                                            <div class="flex-grow-1">
                                                <h6 class="mb-0 text-primary">Natalia Smith</h6>
                                                <p class="text-body-secondary mb-0 small">Paris, France</p>
                                            </div>
                                        </div>
                                    </div>
                                    <!--testimonial-->
                                    <div class="swiper-slide">
                                        <i class="bx bxs-quote-alt-left fs-1 mb-3 text-opacity-50 text-primary"></i>
                                        <p class="lead mb-4">
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                            consequat.
                                        </p>
                                        <div class="d-flex align-items-center">
                                            <img src="{{ URL::asset('assets/img/avatar/5.jpg') }}"
                                                class="width-6x h-auto rounded-circle me-4 flex-shrink-0" alt="">
                                            <div class="flex-grow-1">
                                                <h6 class="mb-0 text-primary">Maria Zielinski</h6>
                                                <p class="text-body-secondary mb-0 small">Kyiv, Ukraine</p>
                                            </div>
                                        </div>
                                    </div>
                                    <!--testimonial-->
                                    <div class="swiper-slide">
                                        <i class="bx bxs-quote-alt-left fs-1 mb-3 text-opacity-50 text-primary"></i>
                                        <p class="lead mb-4">
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                            consequat.
                                        </p>
                                        <div class="d-flex align-items-center">
                                            <img src="{{ URL::asset('assets/img/avatar/6.jpg') }}"
                                                class="width-6x h-auto rounded-circle me-4 flex-shrink-0" alt="">
                                            <div class="flex-grow-1">
                                                <h6 class="mb-0 text-primary">John Doe</h6>
                                                <p class="text-body-secondary mb-0 small">Munich, Germany</p>
                                            </div>
                                        </div>
                                    </div>
                                    <!--testimonial-->
                                    <div class="swiper-slide">
                                        <i class="bx bxs-quote-alt-left fs-1 mb-3 text-opacity-50 text-primary"></i>
                                        <p class="lead mb-4">
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                            consequat.
                                        </p>
                                        <div class="d-flex align-items-center">
                                            <img src="{{ URL::asset('assets/img/avatar/1.jpg') }}"
                                                class="width-6x h-auto rounded-circle me-4 flex-shrink-0" alt="">
                                            <div class="flex-grow-1">
                                                <h6 class="mb-0 text-primary">Natalia Smith</h6>
                                                <p class="text-body-secondary mb-0 small">Paris, France</p>
                                            </div>
                                        </div>
                                    </div>
                                    <!--testimonial-->
                                    <div class="swiper-slide">
                                        <i class="bx bxs-quote-alt-left fs-1 mb-3 text-opacity-50 text-primary"></i>
                                        <p class="lead mb-4">
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                            consequat.
                                        </p>
                                        <div class="d-flex align-items-center">
                                            <img src="{{ URL::asset('assets/img/avatar/2.jpg') }}"
                                                class="width-6x h-auto rounded-circle me-4 flex-shrink-0" alt="">
                                            <div class="flex-grow-1">
                                                <h6 class="mb-0 text-primary">Emily doe</h6>
                                                <p class="text-body-secondary mb-0 small">Brooklyn, USA</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-center align-items-center">
                                    <!--Navigation-->
                                    <div
                                        class="swiper-button-prev bg-transparent border text-body flex-shrink-0 mt-0 swiperT-button-prev position-relative end-0">
                                    </div>
                                    <!--Pagination-->
                                    <div
                                        class="swiper-pagination w-auto ms-4 me-3 bottom-0 position-relative swiperT-pagination">
                                    </div>
                                    <!--Navigation-->
                                    <div
                                        class="swiper-button-next bg-transparent border text-body flex-shrink-0 mt-0 swiperT-button-next position-relative start-0">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="position-relative">
                <div class="container py-9 py-lg-11">
                    <div class="row mb-5 mb-lg-9 justify-content-between align-items-end">
                        <div class="col-lg-8 mx-auto text-center">
                            <span class="d-block mb-4 text-primary" data-aos="fade-up">Job Categories</span>
                            <h2 class="display-6 mb-0" data-aos="fade-up">Explore <span
                                    class="text-decoration-underline" data-aos
                                    data-countup='{"startVal": 0,"suffix":"+"}' data-to="80"
                                    data-aos-id="countup:in">0</span> job categories</h2>
                        </div>
                    </div>

                    <!--Categories row-->
                    <div class="row mb-4">
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="card hover-lift hover-shadow-xl">
                                <!--card-body-->
                                <div class="card-body p-4">
                                    <div class="d-flex mb-4 align-items-center">

                                        <!--Companies group-->
                                        <div class="flex-grow-1 d-flex align-items-center">
                                            <!--Campany-->
                                            <div
                                                class="width-5x height-5x p-2 bg-white shadow-sm position-relative flex-center rounded-circle border">
                                                <img src="{{ URL::asset('assets/img/companies/netflix.svg') }}" class="img-fluid" alt="">
                                            </div>
                                            <!--Campany-->
                                            <div
                                                class="width-5x height-5x p-2 ms-n3 bg-white shadow-sm position-relative flex-center rounded-circle border">
                                                <img src="{{ URL::asset('assets/img/companies/slack.svg') }}" class="img-fluid" alt="">
                                            </div>
                                            <!--Campany-->
                                            <div
                                                class="width-5x height-5x p-2 ms-n3 bg-white shadow-sm position-relative flex-center rounded-circle border">
                                                <img src="{{ URL::asset('assets/img/companies/github.svg') }}" class="img-fluid" alt="">
                                            </div>
                                        </div>
                                    </div>
                                    <h5>Business Management</h5>
                                    <p class="mb-0 text-body-secondary">124 Jobs opportunities</p>
                                </div>
                                <!--link-->
                                <a href="{{ URL::asset('#!') }}" class="stretched-link"></a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="card hover-lift hover-shadow-xl">
                                <!--card-body-->
                                <div class="card-body p-4">
                                    <div class="d-flex mb-4 align-items-center">

                                        <!--Companies group-->
                                        <div class="flex-grow-1 d-flex align-items-center">
                                            <!--Campany-->
                                            <div
                                                class="width-5x height-5x p-2 bg-white shadow-sm position-relative flex-center rounded-circle border">
                                                <img src="{{ URL::asset('assets/img/companies/mailchimp.svg') }}"
                                                    class="img-fluid rounded-circle" alt="">
                                            </div>
                                            <!--Campany-->
                                            <div
                                                class="width-5x height-5x p-2 ms-n3 bg-white shadow-sm position-relative flex-center rounded-circle border">
                                                <img src="{{ URL::asset('assets/img/companies/tiktok.svg') }}" class="img-fluid" alt="">
                                            </div>
                                            <!--Campany-->
                                            <div
                                                class="width-5x height-5x p-2 ms-n3 bg-white shadow-sm position-relative flex-center rounded-circle border">
                                                <img src="{{ URL::asset('assets/img/companies/github.svg') }}" class="img-fluid" alt="">
                                            </div>
                                        </div>
                                    </div>
                                    <h5>UI Designer</h5>
                                    <p class="mb-0 text-body-secondary">76 Jobs opportunities</p>
                                </div>
                                <!--link-->
                                <a href="{{ URL::asset('#!') }}" class="stretched-link"></a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="card hover-lift hover-shadow-xl">
                                <!--card-body-->
                                <div class="card-body p-4">
                                    <div class="d-flex mb-4 align-items-center">

                                        <!--Companies group-->
                                        <div class="flex-grow-1 d-flex align-items-center">
                                            <!--Campany-->
                                            <div
                                                class="width-5x height-5x p-2 bg-white shadow-sm position-relative flex-center rounded-circle border">
                                                <img src="{{ URL::asset('assets/img/companies/dropbox.svg') }}" class="img-fluid" alt="">
                                            </div>
                                            <!--Campany-->
                                            <div
                                                class="width-5x height-5x p-2 ms-n3 bg-white shadow-sm position-relative flex-center rounded-circle border">
                                                <img src="{{ URL::asset('assets/img/companies/dribbble.svg') }}" class="img-fluid" alt="">
                                            </div>
                                            <!--Campany-->
                                            <div
                                                class="width-5x height-5x p-2 ms-n3 bg-white shadow-sm position-relative flex-center rounded-circle border">
                                                <img src="{{ URL::asset('assets/img/companies/airbnb.svg') }}" class="img-fluid" alt="">
                                            </div>
                                        </div>
                                    </div>
                                    <h5>Software Engineer</h5>
                                    <p class="mb-0 text-body-secondary">54 Jobs opportunities</p>
                                </div>
                                <!--link-->
                                <a href="{{ URL::asset('#!') }}" class="stretched-link"></a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="card hover-lift hover-shadow-xl">
                                <!--card-body-->
                                <div class="card-body p-4">
                                    <div class="d-flex mb-4 align-items-center">

                                        <!--Companies group-->
                                        <div class="flex-grow-1 d-flex align-items-center">
                                            <!--Campany-->
                                            <div
                                                class="width-5x height-5x p-2 bg-white shadow-sm position-relative flex-center rounded-circle border">
                                                <img src="{{ URL::asset('assets/img/companies/zenhub.svg') }}"
                                                    class="img-fluid rounded-circle" alt="">
                                            </div>
                                            <!--Campany-->
                                            <div
                                                class="width-5x height-5x p-2 ms-n3 bg-white shadow-sm position-relative flex-center rounded-circle border">
                                                <img src="{{ URL::asset('assets/img/companies/prosperops.svg') }}" class="img-fluid" alt="">
                                            </div>
                                            <!--Campany-->
                                            <div
                                                class="width-5x height-5x p-2 ms-n3 bg-white shadow-sm position-relative flex-center rounded-circle border">
                                                <img src="{{ URL::asset('assets/img/companies/behance.svg') }}" class="img-fluid" alt="">
                                            </div>
                                        </div>
                                    </div>
                                    <h5>Sales & Marketing</h5>
                                    <p class="mb-0 text-body-secondary">28 Jobs opportunities</p>
                                </div>
                                <!--link-->
                                <a href="{{ URL::asset('#!') }}" class="stretched-link"></a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="card hover-lift hover-shadow-xl">
                                <!--card-body-->
                                <div class="card-body p-4">
                                    <div class="d-flex mb-4 align-items-center">

                                        <!--Companies group-->
                                        <div class="flex-grow-1 d-flex align-items-center">
                                            <!--Campany-->
                                            <div
                                                class="width-5x height-5x p-2 bg-white shadow-sm position-relative flex-center rounded-circle border">
                                                <img src="{{ URL::asset('assets/img/companies/airbnb.svg') }}" class="img-fluid" alt="">
                                            </div>
                                            <!--Campany-->
                                            <div
                                                class="width-5x height-5x p-2 ms-n3 bg-white shadow-sm position-relative flex-center rounded-circle border">
                                                <img src="{{ URL::asset('assets/img/companies/zenhub.svg') }}"
                                                    class="img-fluid rounded-circle" alt="">
                                            </div>
                                        </div>
                                    </div>
                                    <h5>Data Science</h5>
                                    <p class="mb-0 text-body-secondary">14 Jobs opportunities</p>
                                </div>
                                <!--link-->
                                <a href="{{ URL::asset('#!') }}" class="stretched-link"></a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="card hover-lift hover-shadow-xl">
                                <!--card-body-->
                                <div class="card-body p-4">
                                    <div class="d-flex mb-4 align-items-center">

                                        <!--Companies group-->
                                        <div class="flex-grow-1 d-flex align-items-center">
                                            <!--Campany-->
                                            <div
                                                class="width-5x height-5x p-2 bg-white shadow-sm position-relative flex-center rounded-circle border">
                                                <img src="{{ URL::asset('assets/img/companies/tiktok.svg') }}" class="img-fluid" alt="">
                                            </div>
                                            <!--Campany-->
                                            <div
                                                class="width-5x height-5x p-2 ms-n3 bg-white shadow-sm position-relative flex-center rounded-circle border">
                                                <img src="{{ URL::asset('assets/img/companies/zenhub.svg') }}"
                                                    class="img-fluid rounded-circle" alt="">
                                            </div>
                                            <!--Campany-->
                                            <div
                                                class="width-5x height-5x p-2 ms-n3 bg-white shadow-sm position-relative flex-center rounded-circle border">
                                                <img src="{{ URL::asset('assets/img/companies/github.svg') }}" class="img-fluid" alt="">
                                            </div>
                                        </div>
                                    </div>
                                    <h5>Content Creator</h5>
                                    <p class="mb-0 text-body-secondary">7 Jobs opportunities</p>
                                </div>
                                <!--link-->
                                <a href="{{ URL::asset('#!') }}" class="stretched-link"></a>
                            </div>
                        </div>
                    </div>

                    <div class="text-center">
                        <a href="{{ URL::asset('#!') }}" class="link-underline fw-bold">Explore All Categories <i
                                class="bx bx-right-arrow-alt ms-1 fs-5"></i> </a>
                    </div>
                </div>
            </section>

            <section class="position-relative border-top">
                <!--Sparkles-->

                <div class="position-absolute w-100 start-0 mt-7 top-0 d-flex justify-content-center">
                    <img src="{{ URL::asset('assets/img/vectors/sparkles.svg') }}" class="fill-primary w-100 w-lg-50 h-auto" data-inject-svg
                        alt="">
                </div>
                <div class="container py-9 py-lg-11 position-relative">
                    <div class="row">
                        <div class="col-xl-9 col-lg-10 mx-auto position-relative">
                            <h2 class="display-6 mb-3 position-relative text-center">Get jobs direct to your Inbox </h2>
                            <p class="mb-5 text-center text-body-secondary">Subscribe to our newsletter</p>
                            <form novalidate class="needs-validation w-lg-75 mx-lg-auto">
                                <div class=" d-flex flex-md-row flex-column">
                                    <input type="email" placeholder="Enter Email Address" required
                                        class="form-control form-control-lg mb-2 mb-md-0 me-md-2 flex-grow-1">
                                    <button type="submit" class="btn btn-info btn-lg">Subscribe</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
</x-assan-layout>
