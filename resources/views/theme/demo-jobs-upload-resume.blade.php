<x-assan-layout layout-type="{{$layoutType}}">

            <section class="position-relative overflow-hidden bg-gradient-blur">
                <div class="container position-relative pb-7 pt-12 pt-lg-15">
                    <div class="row">
                        <div class="col-12">
                            <h1 class="display-4 mb-0">Upload your resume</h1>
                        </div>
                    </div>
                </div>
            </section>
            <section class="position-relative">
                <div class="container pb-9 pb-lg-12 pt-7 pt-lg-12">
                    <div class="bs-stepper" id="stepperDemo">

                        <!--Stepper header start-->
                        <div class="bs-stepper-header px-0 pb-3 d-flex flex-column flex-md-row align-items-md-center align-items-start"
                            role="tablist">
                             <div class="step active" data-target="#stepper-step-1">
                                    <button type="button" class="step-trigger ps-0 py-2 flex-nowrap" role="tab"
                                        id="stepperDemotrigger1" aria-controls="stepper-step-1" aria-selected="true">
                                        <span class="bs-stepper-circle rounded-2">
                                            <i class="bx bx-user-circle"></i>
                                        </span>
                                        <span
                                            class="flex-grow-1 flex-wrap d-flex flex-column jusitfy-content-start text-start">
                                            <span class="bs-stepper-label h6 m-0">Bio</span>
                                            <small class="opacity-75 small">Your personal information</small>
                                        </span>
                                    </button>
                                </div>
                                <div class="step-line px-xl-3 d-none d-lg-block">
                                    <i class="bx bx-chevrons-right"></i>
                                </div>
                                <div class="step" data-target="#stepper-step-2">
                                    <button type="button" class="step-trigger ps-0 ps-md-2 py-2 flex-nowrap" role="tab"
                                        id="stepperDemotrigger2" aria-controls="stepper-step-2" aria-selected="false">
                                        <span class="bs-stepper-circle rounded-2">
                                            <i class="bx bx-code-alt"></i>
                                        </span>
                                        <span
                                            class="flex-grow-1 flex-wrap d-flex flex-column jusitfy-content-start text-start">
                                            <span class="bs-stepper-label h6 m-0">Expertise</span>
                                            <small class="opacity-75 small">Your expertise</small>
                                        </span>
                                    </button>
                                </div>
                                <div class="step-line px-xl-3 d-none d-lg-block">
                                    <i class="bx bx-chevrons-right"></i>
                                </div>
                                <div class="step" data-target="#stepper-step-3">
                                    <button type="button" class="step-trigger ps-0 ps-md-2 py-2 flex-nowrap" role="tab"
                                        id="stepperDemotrigger3" aria-controls="stepper-step-3" aria-selected="false">
                                        <span class="bs-stepper-circle rounded-2">
                                            <i class="bx bx-bullseye"></i>
                                        </span>
                                        <span
                                            class="flex-grow-1 flex-wrap d-flex flex-column jusitfy-content-start text-start">
                                            <span class="bs-stepper-label h6 m-0">Experience & resume</span>
                                            <small class="opacity-75 small">Add experience & resume</small>
                                        </span>
                                    </button>
                                </div>
                        </div>
                        <!--Stepper header end-->

                        <!--Stepper content start-->
                        <div class="bs-stepper-content p-0">
                            <div class="card card-body p-0 h-100">
                                <form class="h-100 d-flex flex-column" action="#">
                                    <!--Step-1-->
                                    <div id="stepper-step-1" class="content h-100" aria-labelledby="stepper-step-1">
                                        <div class="d-flex flex-column h-100">
                                            <!--Step Title-->
                                            <div class="flex-shrink-0 p-4 border-bottom">
                                                <h6 class="mb-1">Bio</h6>
                                                <p class="text-body-secondary small mb-0">Your personal information</p>
                                            </div>

                                            <!--Step main content-->
                                            <div class="flex-grow-1 p-4">
                                                <div class="row">
                                                    <!--Form group-->
                                                    <div class="col-md-6 mb-4">
                                                        <label class="form-label" for="resume_f_name">First Name</label>
                                                        <input type="text" id="resume_f_name" class="form-control"
                                                            placeholder="eg. Henry">
                                                    </div>
                                                    <!--Form group-->
                                                    <div class="col-md-6 mb-4">
                                                        <label class="form-label" for="resume_l_name">Last Name</label>
                                                        <input type="text" id="resume_l_name" class="form-control"
                                                            placeholder="eg. Elanga">
                                                    </div>
                                                    <!--Form group-->
                                                    <div class="col-md-12 mb-4">
                                                        <label class="form-label" for="resume_email">Email ID</label>
                                                        <input type="email" id="resume_email" class="form-control"
                                                            placeholder="eg. henry@domain.com">
                                                    </div>
                                                    <!--Form group-->
                                                    <div class="col-md-12 mb-4">
                                                        <label class="form-label" for="resume_country">Country</label>
                                                        <select id="resume_country" class="form-control choices__countries">
                                                            <option value="" selected disabled>Choose country</option>
                                                          </select>
                                                    </div>
                                                    <!--Form group-->
                                                    <div class="col-md-12 mb-2">
                                                        <label class="form-label" for="resume_phone">Phone</label>
                                                        <input type="text" id="resume_phone" class="form-control"
                                                            placeholder="">
                                                    </div>
                                                     <!--Form group-->
                                                     <div class="col-md-12 mb-4">
                                                        <div class="form-check">
                                                            <input type="checkbox" id="resume_phone_check" class="form-check-input">
                                                        <label class="form-check-label" for="resume_phone_check"><small class="lh-sm">Call and send me text messages at this number</small></label>
                                                        </div>
                                                    </div>
                                                    <!--Form group-->
                                                    <div class="col-12 mb-0">
                                                        <label class="form-label" for="resume_bio">Your Bio</label>
                                                        <textarea name="resume_bio" id="resume_bio" rows="5"
                                                            class="form-control"
                                                            placeholder="Enter your bio here"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--Step footer-->
                                            <div class="d-flex p-4 border-top justify-content-end">
                                                <button type="button" class="btn btn-primary" onclick="stepDemo.next()">
                                                    Save & Next <i class="bx bxs-right-arrow-alt"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                    <!--Step-2-->
                                    <div id="stepper-step-2" class="content h-100" aria-labelledby="stepper-step-2">
                                        <div class="d-flex flex-column h-100">
                                            <!--Step Title-->
                                            <div class="flex-shrink-0 p-4 border-bottom">
                                                <h6 class="mb-1">Expertise</h6>
                                                <p class="text-body-secondary small mb-0">Your skills and expertise</p>
                                            </div>
                                            <!--Step main content-->
                                            <div class="flex-grow-1 p-4">
                                                <div class="mb-4">
                                                    <label for="experience" class="form-label">Years of
                                                        experience</label> <select id="experience" class="form-control"
                                                        data-choices='{"searchEnabled":false, "allowHTML":true,"itemSelectText":""}'>
                                                        <option selected value="Less than 1 Year">Less than 1 Year</option>
                                                        <option value="2+ Years">2+ Years</option>
                                                        <option value="3+ Years">3+ Years</option>
                                                        <option value="4+ Years">4+ Years</option>
                                                        <option value="5+ Years">5+ Years</option>
                                                        <option value="10+ Years">10+ Years</option>
                                                    </select>

                                                </div>
                                                <label for="" class="form-label">Expertise</label>
                                                <!--Expertise option-->
                                                <div class="form-control mb-2 p-2">
                                                    <div class="form-check mb-0">
                                                        <input id="web_design" type="radio" name="expertise"
                                                            class="form-check-input">
                                                        <label for="web_design" class="form-check-label">Web
                                                            Design</label>
                                                    </div>
                                                </div>
                                                <!--Expertise option-->
                                                <div class="form-control p-2 mb-2">
                                                    <div class="form-check mb-0">
                                                        <input id="web_development" type="radio" name="expertise"
                                                            class="form-check-input">
                                                        <label for="web_development" class="form-check-label">Web
                                                            Development</label>
                                                    </div>
                                                </div>
                                                <!--Expertise option-->
                                                <div class="form-control mb-2 p-2">
                                                    <div class="form-check mb-0">
                                                        <input id="graphic_design" type="radio" name="expertise"
                                                            class="form-check-input">
                                                        <label for="graphic_design" class="form-check-label">Graphic
                                                            Design</label>
                                                    </div>
                                                </div>
                                                <!--Expertise option-->
                                                <div class="form-control mb-2 p-2">
                                                    <div class="form-check mb-0">
                                                        <input id="content_management" type="radio" name="expertise"
                                                            class="form-check-input">
                                                        <label for="content_management" class="form-check-label">Content
                                                            Management</label>
                                                    </div>
                                                </div>
                                                <!--Expertise option-->
                                                <div class="form-control mb-4 p-2">
                                                    <div class="form-check mb-0">
                                                        <input id="expertise_others" type="radio" name="expertise"
                                                            class="form-check-input">
                                                        <label for="expertise_others"
                                                            class="form-check-label">Others</label>
                                                    </div>
                                                </div>
                                                <div class="mb-0">
                                                    <label for="skills" class="form-label">Skills</label>


                                                    <!--Multiple select-->
                                                    <input type="text" id="skills" class="form-control"
                                                        data-choices='{"silent": true,"removeItems": "true","removeItemButton": "true", "allowHTML":true}'>
                                                    <small class="text-body-secondary d-block pt-2">*Type skill name and hit
                                                        enter</small>
                                                </div>
                                            </div>
                                            <!--Step footer-->
                                            <div class="d-flex p-4 border-top justify-content-between">
                                                <button type="button" class="btn btn-secondary"
                                                    onclick="stepDemo.previous()">
                                                    <i class="bx bxs-left-arrow-alt"></i> Back
                                                </button>
                                                <button type="button" class="btn btn-primary" onclick="stepDemo.next()">
                                                    Save & Next <i class="bx bxs-right-arrow-alt"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <!--Step-3-->
                                    <div id="stepper-step-3" class="content h-100" aria-labelledby="stepper-step-3">
                                        <div class="d-flex h-100 flex-column">

                                            <!--Step Title-->
                                            <div class="flex-shrink-0 p-4 border-bottom">
                                                <h6 class="mb-0">Experience & resume</h6>
                                                <p class="text-body-secondary small mb-0">Add experience and resume</p>
                                            </div>
                                            <!--Step main content-->
                                            <div class="flex-grow-1 p-4">
                                                
                                                <div class="mb-4">
                                                    <label class="form-label" for="applicantExperienceJob">Job Title</label>
                                                    <input type="text" id="applicantExperienceJob" class="form-control" placeholder="eg. Angular Developer">
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-6 mb-4">
                                                        <label for="applicantExperienceJobStartDate" class="form-label">Job start date</label>
                                                        <input type="text" class="form-control bg-transparent" id="applicantExperienceJobStartDate" data-flatpickr='{"maxDate": "today"}'>
                                                    </div>
                                                    <div class="col-sm-6 mb-4">
                                                        <label for="applicantExperienceJobEndDate" class="form-label">Job end date</label>
                                                        <input type="text" class="form-control bg-transparent" id="applicantExperienceJobEndDate" data-flatpickr='{"maxDate": "today"}'>
                                                         <small class="text-body-secondary">Leave end date empty if you're currently working there</small>
                                                    </div>
                                                </div>
                                                <div class="mb-4">
                                                    <label class="form-label" for="applicantExperienceJobCompany">Company Name</label>
                                                    <input type="text" id="applicantExperienceJobCompany" class="form-control" placeholder="eg. Airbnb">
                                                </div>
                                                <div class="mb-0">
                                                   <label class="form-label" for="applicantResume">Upload Resume</label>
                                                   <div class="mb-0">
                                                    <label for="applicantResume" class="btn btn-gray-200">Upload resume</label>
                                                    <input class="form-control d-none" required="" type="file" id="applicantResume">
                                                    <span class="invalid-feedback">Pls upload correct file formate, eg. - .zip, .rar, .pdf</span>
                                                   </div>
                                                </div>
                                            </div>

                                            <!--Step footer-->
                                            <div class="d-flex p-4 border-top justify-content-between">
                                                <button type="button" class="btn btn-secondary"
                                                    onclick="stepDemo.previous()">
                                                    <i class="bx bxs-left-arrow-alt"></i> Back
                                                </button>
                                                <button type="submit" class="btn btn-primary">
                                                    Submit <i class="fe-1x" data-feather="send"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
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
                        <div class="col-xl-8 col-lg-10 mx-auto position-relative">
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
