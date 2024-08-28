<x-assan-layout layout-type="{{$layoutType}}">
        
      <section class="position-relative">
        <div class="container pt-12 pt-lg-15 pb-7 pb-lg-12 position-relative">
           <div class="row align-items-center">
               <div class="col-lg-10 mx-auto">
                   <div class="alert alert-info mb-5">
                       <div class="d-flex align-items-center">
                           <i class="bx bx-info-circle fs-5 me-2"></i>
                           <span>You can submit upto 2 applications every 15 days</span>
                       </div>
                   </div>
                <div class="d-flex align-items-center mb-5">
                    <img src="{{ URL::asset('assets/img/companies/prosperops.svg') }}" class="width-5x h-auto flex-shrink-0" alt="">
                <div class="flex-grow-1 ms-3">
                    <div class="d-flex justify-content-md-end flex-column flex-md-row">
                        <div class="flex-grow-1">
                            <h2 class="mb-2">Front End Developer</h2>
                            <p>Prosperops</p>
                        </div>
                        <div class="flex-shrink-0">
                            <a href="{{ URL::asset('#!') }}" class="d-inline-flex align-items-center"><i class="bx bx-star me-2"></i> Save this job</a>
                        </div>
                    </div>
                </div>
                </div>
                
                <form class="needs-validation" novalidate>
                    <div class="card card-body p-4 p-lg-5 mb-4">
                        <div>
                            <h5 class="mb-2">Resume</h5>
                        <p class="mb-3">
                            To apply for this job, upload your resume in English as DOCX or PDF with a maximum size of 3 MB.
                        </p>
                        <div class="mb-0">
                            <label for="applicantResume" class="btn btn-primary">Upload resume</label>
                            <input class="form-control d-none" required="" type="file" id="applicantResume">
                            <span class="invalid-feedback">Pls upload correct file formate, eg. - .zip, .rar, .pdf</span>
                        </div>
                        </div>
                    </div>
                    <div class="card card-body p-4 p-lg-5 mb-4">
                        <h5 class="mb-5">Personal Information</h5>
                    <div class="row justify-content-center">
                        <div class="mb-4 col-sm-6 col-md-5">
                            <label for="applicantFirstName" class="form-label">First name <span class="form-helper text-primary">*</span></label>
                            <div class="input-group-icon">
                                <input type="text" required="" class="form-control" id="applicantFirstName">
                                <span class="invalid-feedback">Enter your first name</span>
                            </div>
                        </div>
                        <div class="mb-4 col-sm-6 col-md-5">
                            <label for="applicantLastName" class="form-label">Last name <span class="form-helper text-primary">*</span></label>
                            <div class="input-group-icon">
                                <input type="text" required="" class="form-control" id="applicantLastName">
                                <span class="invalid-feedback">Enter your last name</span>
                            </div>
                        </div>
                        
                    <div class="mb-4 col-sm-6 col-md-5">
                        <label for="applicantEmailAddress" class="form-label">Email id <span class="form-helper text-primary">*</span></label>
                        <div class="input-group-icon">
                            <input type="email" required="" class="form-control" id="applicantEmailAddress">
                            <span class="invalid-feedback">Please enter a valid email address</span>
                        </div>
                    </div>
                    <div class="mb-4 col-sm-6 col-md-5">
                        <label for="applicantPhoneNumber" class="form-label">Phone</label>
                        <div class="input-group-icon">
                            <input required type="text" class="form-control" data-format="custom" id="cphone" data-delimiter="-"
                            data-blocks="3 3 4" placeholder="012-345-7890" id="applicantPhoneNumber">
                        </div>
                    </div>
                    <div class="mb-4 col-12 col-md-10">
                        <label for="applicantWebsite" class="form-label">Personal website / portfolio
                            link</label>
                        <div class="input-group-icon">
                            <input type="text" class="form-control" id="applicantWebsite">
                        </div>
                    </div>
                    <div class="mb-0 col-12 col-md-10">
                        <label for="applicantCoverLetter" class="form-label">Cover letter</label>
                        <textarea class="form-control" rows="2" id="applicantCoverLetter"></textarea>
                    </div>
                    </div>
                    
                   
                    </div>
                    <div class="card card-body p-lg-5 p-4 mb-4">
                        <h5 class="mb-4 pb-3">Supporting Information</h5>
                        <div class="row justify-content-center">
                            <div class="mb-4 col-md-10">
                                <label for="SourceOfJobInformation" class="form-label">How did you hear about
                                    this opening? (e.g., the Website) <span class="form-helper text-primary">*</span></label>
                                <div class="input-group-icon">
                                    <input type="text" required="" class="form-control" id="SourceOfJobInformation">
                                    <span class="invalid-feedback">Enter the source</span>
                                </div>
                            </div>
                            <div class="mb-4 col-md-10">
                                <label for="applicantLocation" required="" class="form-label">Where do you currently live?
                                    [City, Country] <span class="form-helper text-primary">*</span></label>
                                <div class="input-group-icon">
                                    <input type="text" required="" class="form-control" id="applicantLocation">
                                    <span class="invalid-feedback">Enter your current city or country</span>
                                </div>
                            </div>
                            <div class="mb-4 col-md-10">
                                <label for="applicantExperience" class="form-label">Are you authorized to work
                                    lawfully in the United States? <span class="form-helper text-primary">*</span></label>
                                <div class="d-flex">
                                    <div class="form-check me-3">
                                        <input class="form-check-input" type="radio" name="applicantLangSkills" id="flexRadioYes" checked="">
                                        <label class="form-check-label small" for="flexRadioYes">
                                            Yes
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="applicantLangSkills" id="flexRadioNo">
                                        <label class="form-check-label small" for="flexRadioNo">
                                            No
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-4 col-md-10">
                                <label for="applicantLocation" class="form-label">Preferred Pronouns</label>
                                <select class="form-control" required data-choices='{"position":"auto","searchEnabled":false,"allowHTML":true,"itemSelectText":""}'>
                                    <option value="">Please select</option>
                                    <option>She/her</option>
                                    <option>He/him</option>
                                    <option>They/them</option>
                                    <option>Not represented here</option>
                                    <option>Prefer not to say</option>
                                </select>  
                            </div>
                            <div class="col-md-10">
                                <div class="form-check mb-0">
                                    <input class="form-check-input" required="" type="checkbox" value="" id="applicantTerms">
                                    <label class="form-check-label text-body-tertiary small" for="applicantTerms">
                                        I agree that you can keep my data for an extended time period so that it will be easier for you to contact me about job opportunities.
                                    </label>
                                    <span class="invalid-feedback">You must agree to terms and conditions</span>
                                  </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-end">
                        <button type="button" class="me-2 btn btn-gray-200">Save</button>
                        <button type="submit" class="btn btn-primary">Submit application</button>
                    </div>
                </form>
               </div>
           </div>
        </div>
      </section>      
      
</x-assan-layout>
