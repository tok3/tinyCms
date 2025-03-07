<x-assan-layout layout-type="{{$layoutType}}">
            <!--Apply for job form modal-->
            <!-- Modal -->
            <div class="modal fade" id="applyJobForm" tabindex="-1" aria-labelledby="applyJobForm" aria-hidden="true">
                <div class="modal-dialog modal-md p-0 modal-lg">
                    <div class="modal-content p-0">
                        <button type="button"
                            class="position-absolute btn btn-secondary border-2 z-2 end-0 top-0 width-5x height-5x flex-center rounded-pill me-4 mt-4 p-0"
                            data-bs-dismiss="modal" aria-label="Close">
                        <i class="bx bx-x fs-4"></i>
                        </button>
                        <!--Job form-->
                        <div class="modal-body p-0">
                            <div class="border-bottom p-4">
                                <p class="small text-body-secondary">Please SignIn to apply for this job</p>
                                <a href="{{ URL::asset('#!') }}" class="btn btn-success">Sign In</a>
                            </div>
                            <div class="p-4">
                                <form class="needs-validation" novalidate>
                                    <div class="mb-3">
                                        <label for="applicantFirstName" class="form-label">First name <span
                                                class="form-helper text-primary">*</span></label>
                                        <div class="input-group-icon">
                                            <input type="text" required class="form-control" id="applicantFirstName">
                                            <span class="invalid-feedback">Enter your first name</span>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="applicantLastName" class="form-label">Last name <span
                                                class="form-helper text-primary">*</span></label>
                                        <div class="input-group-icon">
                                            <input type="text" required class="form-control" id="applicantLastName">
                                            <span class="invalid-feedback">Enter your last name</span>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="applicantEmailAddress" class="form-label">Email id <span
                                                class="form-helper text-primary">*</span></label>
                                        <div class="input-group-icon">
                                            <input type="email" required class="form-control" id="applicantEmailAddress">
                                            <span class="invalid-feedback">Please enter a valid email address</span>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="applicantPhoneNumber" class="form-label">Phone</label>
                                        <div class="input-group-icon">
                                            <input type="text" class="form-control" id="applicantPhoneNumber">
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="applicantResume" class="form-label">Upload resume <span
                                                class="form-helper text-primary">*</span></label>
                                        <input class="form-control" required type="file" id="applicantResume">
                                        <span class="invalid-feedback">Pls upload correct file formate, eg. - .zip, .rar, .pdf</span>
                                    </div>
                                    <div class="mb-3">
                                        <label for="applicantWebsite" class="form-label">Personal website / portfolio
                                            link</label>
                                        <div class="input-group-icon">
                                            <input type="text" class="form-control" id="applicantWebsite">
                                        </div>
                                    </div>
                                    <div class="mb-0">
                                        <label for="applicantNote" class="form-label">Personal note</label>
                                        <div class="input-group-icon">
                                            <textarea type="text" class="form-control" id="applicantNote"></textarea>
                                        </div>
                                    </div>
                                    <hr>
                                    <h5>Supporting Information</h5>
                                    <div class="mb-3">
                                        <label for="SourceOfJobInformation" class="form-label">How did you hear about
                                            this opening? (e.g., the Website) <span
                                                class="form-helper text-primary">*</span></label>
                                        <div class="input-group-icon">
                                            <input type="text" required class="form-control" id="SourceOfJobInformation">
                                            <span class="invalid-feedback">Enter the source</span>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="applicantLocation" required class="form-label">Where do you currently live?
                                            [City, Country] <span class="form-helper text-primary">*</span></label>
                                        <div class="input-group-icon">
                                            <input type="text" required class="form-control" id="applicantLocation">
                                            <span class="invalid-feedback">Enter your current city or country</span>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="applicantExperience" class="form-label">Are you authorized to work
                                            lawfully in the United States? <span
                                                class="form-helper text-primary">*</span></label>
                                        <div class="d-flex">
                                            <div class="form-check me-3">
                                                <input class="form-check-input" type="radio" name="applicantLangSkills"
                                                    id="flexRadioYes" checked>
                                                <label class="form-check-label small" for="flexRadioYes">
                                                    Yes
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="applicantLangSkills"
                                                    id="flexRadioNo">
                                                <label class="form-check-label small" for="flexRadioNo">
                                                    No
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="applicantLocation" class="form-label">Preferred Pronouns</label>
                                        <select class="form-control" required data-choices='{"position":"auto","searchEnabled":false,"itemSelectText":""}'>
                                            <option value="">Please select</option>
                                            <option>She/her</option>
                                            <option>He/him</option>
                                            <option>They/them</option>
                                            <option>Not represented here</option>
                                            <option>Prefer not to say</option>
                                        </select>
                                    </div>
                                    <div class="mb-4">
                                        <div class="form-check">
                                            <input class="form-check-input" required type="checkbox" value="" id="applicantTerms">
                                            <label class="form-check-label small" for="applicantTerms">
                                                I agree that you can keep my data for an extended time period so that it will be easier for you to contact me about job opportunities.
                                            </label>
                                            <span class="invalid-feedback">You must agree to terms and conditions</span>
                                          </div>
                                    </div>
                                    <div class="text-end">
                                        <button type="submit" class="btn btn-primary">Submit application</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <section class="position-relative">
                <div class="container pt-12 pb-9 pb-lg-11">
                    <div class="row pt-lg-7 justify-content-center">
                        <div class="col-lg-10 col-xl-8">
                            <div class="pb-2 mb-4 border-bottom border-2">
                                <a href="{{ URL::asset('page-careers.html') }}" class="fw-semibold fs-6">
                                  <i class="bx bx-left-arrow-alt fs-4 me-1"></i> Careers</a>
                            </div>
                            <div class="row align-items-center justify-content-between mb-6">
                                <div class="col-12 col-md-10 col-lg-9">
                                    <small class="d-block text-body-tertiary mb-3">
                                        <i class="bx bx-history me-1 fs-5"></i>  Updated Yesterday
                                    </small>
                                    <h1 class="display-5 mb-3">
                                        Front end Developer
                                    </h1>
                                    <p class="fs-6 mb-5 mb-md-0">
                                        <i class="bx bx-map-pin me-1 fs-5"></i>  California, CA · <small class="text-primary fw-semibold">Full time</small>
                                    </p>

                                </div>
                            </div>

                            <!--career details-->
                            <article>
                                <p class="mb-4 lead">
                                    We're Porttitor vitae urna iaculis, malesuada tincidunt lectus. Proin nec tellus sit
                                    amet massa auctor imperdiet id vitae diam. Aenean gravida est nec diam suscipit
                                    iaculis.
                                    Praesent urna velit, auctor nec turpis et, vehicula lobortis sem. Vivamus convallis
                                    mi
                                    sagittis eleifend laoreet. Praesent vitae venenatis enim. Nulla tincidunt felis et
                                    lectus rhoncus laoreet.
                                </p>
                                
                                <div class="mb-5 p-4 border rounded-4">
                                    <h5 class="mb-4">Job Description</h5>
                                    <ul class="list-unstyled mb-0">
                                        <li class="d-flex align-items-center mb-4">
                                            <div>Job category</div>
                                            <div class="flex-grow-1 border-bottom mx-3"></div>
                                            <div><strong>Development</strong></div>
                                        </li>
                                        <li class="d-flex align-items-center mb-4">
                                            <div>Location</div>
                                            <div class="flex-grow-1 border-bottom mx-3"></div>
                                            <div><strong>Ohio, USA</strong></div>
                                        </li>
                                        <li class="d-flex align-items-center mb-4">
                                            <div>Contract type</div>
                                            <div class="flex-grow-1 border-bottom mx-3"></div>
                                            <div><strong>Open-ended with 40 hours per week</strong></div>
                                        </li>
                                        <li class="d-flex align-items-center mb-4">
                                            <div>Working hours</div>
                                            <div class="flex-grow-1 border-bottom mx-3"></div>
                                            <div><strong>Flexible, with a great scheme to work from home</strong></div>
                                        </li>
                                        <li class="d-flex align-items-center">
                                            <div>Application deadline</div>
                                            <div class="flex-grow-1 border-bottom mx-3"></div>
                                            <div><strong>21 April, 2022</strong></div>
                                        </li>
                                    </ul>
                                </div>
                                <p class="mb-4">
                                    There are many variations of passages of Lorem Ipsum available, but the majority
                                    have
                                    suffered alteration in some form, by injected humour, or randomised words which
                                    don't
                                    look even slightly believable. If you are going to use a passage of Lorem Ipsum, you
                                    need to be sure there isn't anything embarrassing hidden in the middle of text. All
                                    the
                                    Lorem Ipsum generators on the Internet tend to repeat predefined chunks as
                                    necessary,
                                    making this the first true generator on the Internet. It uses a dictionary of over
                                    200
                                    Latin words, combined with a handful of model sentence structures, to generate Lorem
                                    Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free
                                    from
                                    repetition.
                                </p>
                                <p class="mb-4 mb-lg-5">
                                    Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur,
                                    adipisci
                                    velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam
                                    aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem
                                    ullam
                                    corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem
                                    vel
                                    eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae
                                    consequatur,
                                    vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?
                                </p>
                                <h3 class="mb-4">What you will be doing?</h3>
                                <ul class="list-unstyled mb-5">
                                    <li class="d-flex mb-3">
                                        <span>
                                            <i class="las la-check-circle mr-3 text-success"></i>
                                        </span>
                                        <span>
                                            Cras nulla lectus, porttitor vitae urna iaculis, malesuada tincidunt lectus.
                                            Proin nec tellus sit amet massa auctor imperdiet id vitae diam. Aenean
                                            gravida
                                            est nec diam suscipit iaculis.
                                        </span>
                                    </li>
                                    <li class="d-flex mb-3">
                                        <span>
                                            <i class="las la-check-circle mr-3 text-success"></i>
                                        </span>
                                        <span>
                                            There are many variations of passages of Lorem Ipsum available, but the
                                            majority
                                            have suffered alteration in some form, by injected humour, or randomised
                                            words
                                            which don't look.
                                        </span>
                                    </li>
                                    <li class="d-flex mb-3">
                                        <span>
                                            <i class="las la-check-circle mr-3 text-success"></i>
                                        </span>
                                        <span>
                                            Praesent urna velit, auctor nec turpis et, vehicula lobortis sem. Vivamus
                                            convallis mi sagittis eleifend laoreet. Praesent vitae venenatis enim. Nulla
                                            tincidunt felis et lectus rhoncus laoreet.
                                        </span>
                                    </li>
                                </ul>
                                <figure class="mb-7">
                                    <img src="{{ URL::asset('assets/img/1200x600/4.jpg') }}" alt=""
                                        class="img-fluid rounded-4 shadow mb-3">
                                    <figcaption class="text-center small text-body-secondary">A caption to describe the image
                                    </figcaption>
                                </figure>
                                <h3 class="mb-4">What you should have?</h3>
                                <ul class="list-unstyled mb-5">
                                    <li class="d-flex mb-3">
                                        <span>
                                            <i class="las la-check-circle mr-3 text-success"></i>
                                        </span>
                                        <span>
                                            Cras nulla lectus, porttitor vitae urna iaculis, malesuada tincidunt lectus.
                                            Proin nec tellus sit amet massa auctor imperdiet id vitae diam. Aenean
                                            gravida
                                            est nec diam suscipit iaculis.
                                        </span>
                                    </li>
                                    <li class="d-flex mb-3">
                                        <span>
                                            <i class="las la-check-circle mr-3 text-success"></i>
                                        </span>
                                        <span>
                                            There are many variations of passages of Lorem Ipsum available, but the
                                            majority
                                            have suffered alteration in some form, by injected humour, or randomised
                                            words
                                            which don't look.
                                        </span>
                                    </li>
                                    <li class="d-flex mb-3">
                                        <span>
                                            <i class="las la-check-circle mr-3 text-success"></i>
                                        </span>
                                        <span>
                                            Praesent urna velit, auctor nec turpis et, vehicula lobortis sem. Vivamus
                                            convallis mi sagittis eleifend laoreet. Praesent vitae venenatis enim. Nulla
                                            tincidunt felis et lectus rhoncus laoreet.
                                        </span>
                                    </li>
                                </ul>
                                <p class="lead mb-5">
                                    Qui dolorem ipsum quia dolor sit amet sed quia non numquam eius modi tempora
                                    incidunt ut
                                    labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis
                                    nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea
                                    commodi
                                    consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse
                                    quam
                                    nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla
                                    pariatur?
                                </p>
                            </article>
                        </div>

                    </div>
                </div>
                </div>
            </section>
            <section class="position-sticky bottom-0 shadow bg-body">
               <div class="container py-4">
                <div class="row align-items-center justify-content-center">
                    <div class="col-7 col-md-5"> <a href="{{ URL::asset('#') }}" data-bs-toggle="modal"
                            data-bs-target="#applyJobForm" class="btn btn-primary">Apply
                            Now</a>
                    </div>
                    <div class="col-5 col-md-auto">
                        <ul class="list-unstyled d-flex mb-0 align-items-center">

                            <li class="small text-body-secondary d-none d-lg-block me-3">
                                Share this
                            </li>
                            <li class="list-inline-item mr-0">
                                <a href="{{ URL::asset('#!') }}" class="text-body-secondary me-3">
                                   <i class="bx bxl-facebook fs-4"></i>
                                </a>
                                <!--/.brand-a-->
                                <a href="{{ URL::asset('#!') }}" class="text-body-secondary me-3">
                                    <i class="bx bxl-linkedin fs-4"></i>
                                 </a>
                                <!--/.brand-a-->
                                <a href="{{ URL::asset('#!') }}" class="text-body-secondary p-0">
                                    <i class="bx bxl-twitter fs-4"></i>
                                 </a>
                                <!--/.brand-a-->
                            </li>
                        </ul>
                    </div>
                </div>
               </div>
            </section>
</x-assan-layout>
