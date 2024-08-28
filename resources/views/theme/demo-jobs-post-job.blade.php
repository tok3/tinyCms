<x-assan-layout layout-type="{{$layoutType}}">
     
        <section class="position-relative bg-gradient-blur">
            <div class="container pb-7 pt-12 pt-lg-15">
                <div class="row">
                    <div class="col-12">
                        <h1 class="display-4 mb-0">New Job Listing</h1>
                    </div>
                </div>
            </div>
        </section>
        <section class="position-relative">
            <div class="container py-9 py-lg-12">
                <div class="row">
                    <div class="col-lg-12">
                        
                        <!--Job post form card-->
                        <div class="d-flex align-items-center justify-content-end mb-4">
                           <button type="button" id="save_draft_btn" class="btn btn-outline-info me-2"><i class="bx bx-save align-middle me-1"></i> Save as Draft</button>
                           <button class="btn btn-primary"><i class="bx bx-bullseye align-middle me-1"></i> Preview</button>
                        </div>
                        <div class="card border-0 shadow-lg">
                            <div class="card-header py-4 border-bottom-0 bg-body-secondary">
                                <h4 class="mb-0">Details</h4>
                                <p class="text-body-tertiary mb-0">This information will be displayed publicly so be careful what you post</p>
                            </div>
                            <!--Body-->
                            <div class="card-body py-4">
                                <form action="#">
                                    <div class="row">
                                        <div class="col-md-4 col-xl-3">
                                            <label for="job__title" class="h6 d-block mb-3 mt-md-2 mb-md-0">Job title *</label>
                                        </div>
                                        <div class="col-md-8">
                                            <input type="text" id="job__title" class="form-control" placeholder="Full Stack Developer">
                                        </div>
                                    </div><hr>
                                    <div class="row">
                                        <div class="col-md-4 col-xl-3">
                                            <label for="job__company__name" class="h6 d-block mb-3 mt-md-2 mb-md-0">Company name</label>
                                        </div>
                                       <div class="col-md-8">
                                        <input type="text" class="form-control" id="job__company__name" placeholder="Zenhun Co">
                                       </div>
                                    </div><hr>
                                    <div class="row">
                                        <div class="col-xl-3 col-md-4">
                                            <label for="job__type" class="h6 d-block mb-3 mt-md-2 mb-md-0">Job type</label>
                                        </div>
                                        <div class="col-md-8">
                                            <div class='d-flex flex-wrap'>
                                                <input type="radio" class="btn-check" name="btnradio" id="btnradio1" autocomplete="off" checked>
                                                <label class="btn btn-outline-info me-2 mb-2" for="btnradio1">Full Time</label>
                                              
                                                <input type="radio" class="btn-check" name="btnradio" id="btnradio2" autocomplete="off">
                                                <label class="btn btn-outline-info me-2 mb-2" for="btnradio2">Part Time</label>
                                              
                                                <input type="radio" class="btn-check" name="btnradio" id="btnradio3" autocomplete="off">
                                                <label class="btn btn-outline-info me-2 mb-2" for="btnradio3">Contract</label>
    
                                                <input type="radio" class="btn-check" name="btnradio" id="btnradio4" autocomplete="off">
                                                <label class="btn btn-outline-info me-2 mb-2" for="btnradio4">Freelancer</label>
    
                                                <input type="radio" class="btn-check" name="btnradio" id="btnradio5" autocomplete="off">
                                                <label class="btn btn-outline-info me-2 mb-2" for="btnradio5">Intern</label>
                                              </div>
                                        </div>
                                    </div><hr>
                                    <div class="row">
                                        <div class="col-md-4 col-xl-3">
                                            <label for="job__salary" class="h6 mt-md-2">Salary range</label>
                                        <small class="d-block text-body-secondary mb-3 mb-md-0">Please describe the estimated salary range for this role</small>
                                        </div>
                                       <div class="col-md-8">
                                        <div class="d-flex align-items-center">
                                            <div class="width-11x flex-shrink-0">
                                                <select class="form-control w-100" data-choices='{"searchEnabled":false,"allowHTML":true,"itemSelectText":""}' id="inputGroupSelect01">
                                                    <option value="USD">USD</option>
                                                    <option value="EURO">EURO</option>
                                                    <option value="GBP">GBP</option>
                                                  </select>
                                            </div>
                                            <div class="input-group flex-grow-1 mb-0 ms-2">
                                                
                                                <input type="text" class="form-control flex-grow-1" placeholder="10000">
                                                <input type="text" class="form-control flex-grow-1" placeholder="40000">
                                              </div>
                                        </div>
                                       </div>
                                    </div><hr>
                                    <div class="row">
                                       <div class="col-xl-3 col-md-4">
                                        <label for="job_location" class="h6 mt-md-2">Hiring location</label>
                                        <small class="text-body-secondary d-block mb-3 mb-md-0">Location is worldwide by default, You can specify the particular countries. You can select multiple locations </small>
                                       </div>
                                       <div class="col-md-8">
                                        <select autocomplete="false" multiple name="profile_country"
                                        id="profile_country" class="form-control"
                                        data-choices='{"searchEnabled":"false","allowHTML":true, "removeItems": "true","removeItemButton": "true","itemSelectText":""}'>
                                        <option value="Afganistan">Afghanistan</option>
                                        <option value="Albania">Albania</option>
                                        <option value="Algeria">Algeria</option>
                                        <option value="American Samoa">American Samoa</option>
                                        <option value="Andorra">Andorra</option>
                                        <option value="Angola">Angola</option>
                                        <option value="Anguilla">Anguilla</option>
                                        <option value="Antigua & Barbuda">Antigua & Barbuda</option>
                                        <option value="Argentina">Argentina</option>
                                        <option value="Armenia">Armenia</option>
                                        <option value="Aruba">Aruba</option>
                                        <option value="Australia">Australia</option>
                                        <option value="Austria">Austria</option>
                                        <option value="Azerbaijan">Azerbaijan</option>
                                        <option value="Bahamas">Bahamas</option>
                                        <option value="Bahrain">Bahrain</option>
                                        <option value="Bangladesh">Bangladesh</option>
                                        <option value="Barbados">Barbados</option>
                                        <option value="Belarus">Belarus</option>
                                        <option value="Belgium">Belgium</option>
                                        <option value="Belize">Belize</option>
                                        <option value="Benin">Benin</option>
                                        <option value="Bermuda">Bermuda</option>
                                        <option value="Bhutan">Bhutan</option>
                                        <option value="Bolivia">Bolivia</option>
                                        <option value="Bonaire">Bonaire</option>
                                        <option value="Bosnia & Herzegovina">Bosnia & Herzegovina</option>
                                        <option value="Botswana">Botswana</option>
                                        <option value="Brazil">Brazil</option>
                                        <option value="British Indian Ocean Ter">British Indian Ocean Ter</option>
                                        <option value="Brunei">Brunei</option>
                                        <option value="Bulgaria">Bulgaria</option>
                                        <option value="Burkina Faso">Burkina Faso</option>
                                        <option value="Burundi">Burundi</option>
                                        <option value="Cambodia">Cambodia</option>
                                        <option value="Cameroon">Cameroon</option>
                                        <option value="Canada">Canada</option>
                                        <option value="Canary Islands">Canary Islands</option>
                                        <option value="Cape Verde">Cape Verde</option>
                                        <option value="Cayman Islands">Cayman Islands</option>
                                        <option value="Central African Republic">Central African Republic</option>
                                        <option value="Chad">Chad</option>
                                        <option value="Channel Islands">Channel Islands</option>
                                        <option value="Chile">Chile</option>
                                        <option value="China">China</option>
                                        <option value="Christmas Island">Christmas Island</option>
                                        <option value="Cocos Island">Cocos Island</option>
                                        <option value="Colombia">Colombia</option>
                                        <option value="Comoros">Comoros</option>
                                        <option value="Congo">Congo</option>
                                        <option value="Cook Islands">Cook Islands</option>
                                        <option value="Costa Rica">Costa Rica</option>
                                        <option value="Cote DIvoire">Cote DIvoire</option>
                                        <option value="Croatia">Croatia</option>
                                        <option value="Cuba">Cuba</option>
                                        <option value="Curaco">Curacao</option>
                                        <option value="Cyprus">Cyprus</option>
                                        <option value="Czech Republic">Czech Republic</option>
                                        <option value="Denmark">Denmark</option>
                                        <option value="Djibouti">Djibouti</option>
                                        <option value="Dominica">Dominica</option>
                                        <option value="Dominican Republic">Dominican Republic</option>
                                        <option value="East Timor">East Timor</option>
                                        <option value="Ecuador">Ecuador</option>
                                        <option value="Egypt">Egypt</option>
                                        <option value="El Salvador">El Salvador</option>
                                        <option value="Equatorial Guinea">Equatorial Guinea</option>
                                        <option value="Eritrea">Eritrea</option>
                                        <option value="Estonia">Estonia</option>
                                        <option value="Ethiopia">Ethiopia</option>
                                        <option value="Falkland Islands">Falkland Islands</option>
                                        <option value="Faroe Islands">Faroe Islands</option>
                                        <option value="Fiji">Fiji</option>
                                        <option value="Finland">Finland</option>
                                        <option value="France">France</option>
                                        <option value="French Guiana">French Guiana</option>
                                        <option value="French Polynesia">French Polynesia</option>
                                        <option value="French Southern Ter">French Southern Ter</option>
                                        <option value="Gabon">Gabon</option>
                                        <option value="Gambia">Gambia</option>
                                        <option value="Georgia">Georgia</option>
                                        <option value="Germany">Germany</option>
                                        <option value="Ghana">Ghana</option>
                                        <option value="Gibraltar">Gibraltar</option>
                                        <option value="Great Britain">Great Britain</option>
                                        <option value="Greece">Greece</option>
                                        <option value="Greenland">Greenland</option>
                                        <option value="Grenada">Grenada</option>
                                        <option value="Guadeloupe">Guadeloupe</option>
                                        <option value="Guam">Guam</option>
                                        <option value="Guatemala">Guatemala</option>
                                        <option value="Guinea">Guinea</option>
                                        <option value="Guyana">Guyana</option>
                                        <option value="Haiti">Haiti</option>
                                        <option value="Hawaii">Hawaii</option>
                                        <option value="Honduras">Honduras</option>
                                        <option value="Hong Kong">Hong Kong</option>
                                        <option value="Hungary">Hungary</option>
                                        <option value="Iceland">Iceland</option>
                                        <option value="Indonesia">Indonesia</option>
                                        <option value="India">India</option>
                                        <option value="Iran">Iran</option>
                                        <option value="Iraq">Iraq</option>
                                        <option value="Ireland">Ireland</option>
                                        <option value="Isle of Man">Isle of Man</option>
                                        <option value="Israel">Israel</option>
                                        <option value="Italy">Italy</option>
                                        <option value="Jamaica">Jamaica</option>
                                        <option value="Japan">Japan</option>
                                        <option value="Jordan">Jordan</option>
                                        <option value="Kazakhstan">Kazakhstan</option>
                                        <option value="Kenya">Kenya</option>
                                        <option value="Kiribati">Kiribati</option>
                                        <option value="Korea North">Korea North</option>
                                        <option value="Korea Sout">Korea South</option>
                                        <option value="Kuwait">Kuwait</option>
                                        <option value="Kyrgyzstan">Kyrgyzstan</option>
                                        <option value="Laos">Laos</option>
                                        <option value="Latvia">Latvia</option>
                                        <option value="Lebanon">Lebanon</option>
                                        <option value="Lesotho">Lesotho</option>
                                        <option value="Liberia">Liberia</option>
                                        <option value="Libya">Libya</option>
                                        <option value="Liechtenstein">Liechtenstein</option>
                                        <option value="Lithuania">Lithuania</option>
                                        <option value="Luxembourg">Luxembourg</option>
                                        <option value="Macau">Macau</option>
                                        <option value="Macedonia">Macedonia</option>
                                        <option value="Madagascar">Madagascar</option>
                                        <option value="Malaysia">Malaysia</option>
                                        <option value="Malawi">Malawi</option>
                                        <option value="Maldives">Maldives</option>
                                        <option value="Mali">Mali</option>
                                        <option value="Malta">Malta</option>
                                        <option value="Marshall Islands">Marshall Islands</option>
                                        <option value="Martinique">Martinique</option>
                                        <option value="Mauritania">Mauritania</option>
                                        <option value="Mauritius">Mauritius</option>
                                        <option value="Mayotte">Mayotte</option>
                                        <option value="Mexico">Mexico</option>
                                        <option value="Midway Islands">Midway Islands</option>
                                        <option value="Moldova">Moldova</option>
                                        <option value="Monaco">Monaco</option>
                                        <option value="Mongolia">Mongolia</option>
                                        <option value="Montserrat">Montserrat</option>
                                        <option value="Morocco">Morocco</option>
                                        <option value="Mozambique">Mozambique</option>
                                        <option value="Myanmar">Myanmar</option>
                                        <option value="Nambia">Nambia</option>
                                        <option value="Nauru">Nauru</option>
                                        <option value="Nepal">Nepal</option>
                                        <option value="Netherland Antilles">Netherland Antilles</option>
                                        <option value="Netherlands">Netherlands (Holland, Europe)</option>
                                        <option value="Nevis">Nevis</option>
                                        <option value="New Caledonia">New Caledonia</option>
                                        <option value="New Zealand">New Zealand</option>
                                        <option value="Nicaragua">Nicaragua</option>
                                        <option value="Niger">Niger</option>
                                        <option value="Nigeria">Nigeria</option>
                                        <option value="Niue">Niue</option>
                                        <option value="Norfolk Island">Norfolk Island</option>
                                        <option value="Norway">Norway</option>
                                        <option value="Oman">Oman</option>
                                        <option value="Pakistan">Pakistan</option>
                                        <option value="Palau Island">Palau Island</option>
                                        <option value="Palestine">Palestine</option>
                                        <option value="Panama">Panama</option>
                                        <option value="Papua New Guinea">Papua New Guinea</option>
                                        <option value="Paraguay">Paraguay</option>
                                        <option value="Peru">Peru</option>
                                        <option value="Phillipines">Philippines</option>
                                        <option value="Pitcairn Island">Pitcairn Island</option>
                                        <option value="Poland">Poland</option>
                                        <option value="Portugal">Portugal</option>
                                        <option value="Puerto Rico">Puerto Rico</option>
                                        <option value="Qatar">Qatar</option>
                                        <option value="Republic of Montenegro">Republic of Montenegro</option>
                                        <option value="Republic of Serbia">Republic of Serbia</option>
                                        <option value="Reunion">Reunion</option>
                                        <option value="Romania">Romania</option>
                                        <option value="Russia">Russia</option>
                                        <option value="Rwanda">Rwanda</option>
                                        <option value="St Barthelemy">St Barthelemy</option>
                                        <option value="St Eustatius">St Eustatius</option>
                                        <option value="St Helena">St Helena</option>
                                        <option value="St Kitts-Nevis">St Kitts-Nevis</option>
                                        <option value="St Lucia">St Lucia</option>
                                        <option value="St Maarten">St Maarten</option>
                                        <option value="St Pierre & Miquelon">St Pierre & Miquelon</option>
                                        <option value="St Vincent & Grenadines">St Vincent & Grenadines</option>
                                        <option value="Saipan">Saipan</option>
                                        <option value="Samoa">Samoa</option>
                                        <option value="Samoa American">Samoa American</option>
                                        <option value="San Marino">San Marino</option>
                                        <option value="Sao Tome & Principe">Sao Tome & Principe</option>
                                        <option value="Saudi Arabia">Saudi Arabia</option>
                                        <option value="Senegal">Senegal</option>
                                        <option value="Seychelles">Seychelles</option>
                                        <option value="Sierra Leone">Sierra Leone</option>
                                        <option value="Singapore">Singapore</option>
                                        <option value="Slovakia">Slovakia</option>
                                        <option value="Slovenia">Slovenia</option>
                                        <option value="Solomon Islands">Solomon Islands</option>
                                        <option value="Somalia">Somalia</option>
                                        <option value="South Africa">South Africa</option>
                                        <option value="Spain">Spain</option>
                                        <option value="Sri Lanka">Sri Lanka</option>
                                        <option value="Sudan">Sudan</option>
                                        <option value="Suriname">Suriname</option>
                                        <option value="Swaziland">Swaziland</option>
                                        <option value="Sweden">Sweden</option>
                                        <option value="Switzerland">Switzerland</option>
                                        <option value="Syria">Syria</option>
                                        <option value="Tahiti">Tahiti</option>
                                        <option value="Taiwan">Taiwan</option>
                                        <option value="Tajikistan">Tajikistan</option>
                                        <option value="Tanzania">Tanzania</option>
                                        <option value="Thailand">Thailand</option>
                                        <option value="Togo">Togo</option>
                                        <option value="Tokelau">Tokelau</option>
                                        <option value="Tonga">Tonga</option>
                                        <option value="Trinidad & Tobago">Trinidad & Tobago</option>
                                        <option value="Tunisia">Tunisia</option>
                                        <option value="Turkey">Turkey</option>
                                        <option value="Turkmenistan">Turkmenistan</option>
                                        <option value="Turks & Caicos Is">Turks & Caicos Is</option>
                                        <option value="Tuvalu">Tuvalu</option>
                                        <option value="Uganda">Uganda</option>
                                        <option value="United Kingdom">United Kingdom</option>
                                        <option value="Ukraine">Ukraine</option>
                                        <option value="United Arab Erimates">United Arab Emirates</option>
                                        <option value="United States of America">United States of America</option>
                                        <option value="Uraguay">Uruguay</option>
                                        <option value="Uzbekistan">Uzbekistan</option>
                                        <option value="Vanuatu">Vanuatu</option>
                                        <option value="Vatican City State">Vatican City State</option>
                                        <option value="Venezuela">Venezuela</option>
                                        <option value="Vietnam">Vietnam</option>
                                        <option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
                                        <option value="Virgin Islands (USA)">Virgin Islands (USA)</option>
                                        <option value="Wake Island">Wake Island</option>
                                        <option value="Wallis & Futana Is">Wallis & Futana Is</option>
                                        <option value="Yemen">Yemen</option>
                                        <option value="Zaire">Zaire</option>
                                        <option value="Zambia">Zambia</option>
                                        <option value="Zimbabwe">Zimbabwe</option>
                            </select>
                                       </div>
                                    </div><hr>
                                    <div class="mb-2">
                                        <label for="job_description" class="h6">Description</label>
                                    </div>
                                     <!--Quill editor-->
                            <div class="mb-4" data-quill='{"placeholder": "Quill WYSIWYG"}'>
                                <p class="fs-1">Lorem ipsum is placeholder text commonly used in the graphic, print, and
                                    publishing industries for previewing layouts and visual mockups.</p>
                            </div>
                            <div class="mb-4">
                                <label for="job__categories" class="h6 d-block mb-3">Categories</label>
                                <select id="job__categories" multiple class="form-control"
                                data-choices='{"silent": true,"removeItems": "true","removeItemButton": "true","allowHTML":true,"itemSelectText":""}'>
                                <option value="UI Designer">UI Designer</option>
                                <option value="Developer">Developer</option>
                                <option value="Marketing">Marketing</option>
                                <option value="Project Manager">Project Manager</option>
                                <option value="Content Creator">Content Creator</option>
                                <option value="Legal Adviser">Legal Adviser</option>
                            </select>
                            </div>
                            <div class="mb-4">
                                <label for="job__skills" class="h6 d-block mb-0">Skills required</label>
                                <small class="text-body-secondary mb-3 d-block">Type skill name and hit enter to add</small>
                                <input id="job__skills" multiple class="form-control"
                                data-choices='{"silent": true,"removeItems": "true","removeItemButton": "true","allowHTML":true}'>
                            </div>
                            <div class="mb-4">
                                <label for="job__resume" class="h6 d-block mb-3">Do you want applicants to submit a resume?</label>
                                <div class="d-flex align-items-center">
                                    <div class="form-check me-4">
                                        <input type="radio" name="job__resume" class="form-check-input" id="resume_yes" checked>
                                        <label for="resume_yes" class="form-check-label">Yes</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="radio" name="job__resume" class="form-check-input" id="resume_no">
                                        <label for="resume_no" class="form-check-label">No</label>
                                    </div>
                                </div>
                            </div>
                            <div class="text-end">
                                <button type="submit" class="btn btn-primary btn-lg mb-3">Submit job application</button>
                                <span class="text-body-tertiary d-block small">By clicking on <strong>submit job</strong>, You agreed to our <a href="{{ URL::asset('#!') }}">terms & conditions</a></span>
                            </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
              <section class="position-relative border-top">
                  <!--Sparkles-->
                  <div class="position-absolute w-100 start-0 mt-7 top-0 d-flex justify-content-center">
                    <img src="{{ URL::asset('assets/img/vectors/sparkles.svg') }}" class="fill-primary w-100 w-lg-50 h-auto" data-inject-svg alt="">
                  </div>
                  <div class="container py-9 py-lg-11 position-relative">
                    <div class="row">
                        <div class="col-xl-8 col-lg-10 mx-auto position-relative">
                          <h2 class="display-6 mb-3 position-relative text-center">Get jobs direct to your Inbox </h2>
                          <p class="mb-5 text-center text-body-secondary">Subscribe to our newsletter</p>
                          <form novalidate class="needs-validation w-lg-75 mx-lg-auto">
                              <div class=" d-flex flex-md-row flex-column">
                                <input type="email" placeholder="Enter Email Address" required class="form-control form-control-lg mb-2 mb-md-0 me-md-2 flex-grow-1">
                                <button type="submit" class="btn btn-info btn-lg">Subscribe</button> 
                              </div>
                          </form>
                        </div>
                    </div>
                  </div>
              </section>

              <!--:Form submit Message Toast:-->
              <div class="toast-container position-fixed end-0 top-0 p-3">
                <div id="save_draft" class="toast bg-primary-subtle border-primary-subtle" role="alert" aria-live="assertive" aria-atomic="true">
                  <div class="toast-body d-flex">
                    <span class="flex-shrink-0 me-2">
                        <i class="bx bx-check-circle fs-3 text-primary"></i>
                    </span>
                   <div class="flex-grow-1">
                    <h6 class="text-primary">Your application details successfully saved in draft</h6>
                    <span role="button" class="small text-body-tertiary" data-bs-dismiss="toast" aria-label="Close">Dismiss</span>
                   </div>
                  </div>
                </div>
              </div>
              
</x-assan-layout>
