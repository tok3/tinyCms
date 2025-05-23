<x-assan-layout layout-type="{{$layoutType}}">
            <section class="position-relative bg-primary-subtle">
                <div class="container position-relative py-9">
                    <div class="row">
                        <div class="col-md-6 mx-auto">
                            <nav class="d-md-flex justify-content-center" aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0">
                                    <li class="breadcrumb-item">
                                        <a href="{{ URL::asset('#!') }}">Home</a>
                                    </li>
                                    <li class="breadcrumb-item active">
                                        Profile
                                    </li>
                                    <li class="breadcrumb-item active">
                                        Settings
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <!--/.row-->

                </div>
            </section>
            <section class="position-relative">
                <div class="container position-relative">
                    <div class="overflow-hidden">
                        <!--Profile info header-->
                        <div class="position-relative pt-5 pb-9 pb-lg-11">
                            <div class="row">
                                <div class="col-lg-9 mx-auto">
                                    <div class="pt-5 d-flex flex-column h-100">
                                        <nav class="nav justify-content-center mb-5 nav-pills">
                                            <a href="{{ URL::asset('page-profile.html') }}" class="nav-link"> <i
                                                    class="bx bx-user-circle me-2"></i>My profile</a>
                                            
                                            <a href="{{ URL::asset('page-profile-settings.html') }}" class="nav-link active"><i
                                                    class="bx bx-cog me-2"></i>Settings</a>
                                            <a href="{{ URL::asset('#') }}" class="nav-link disabled"><i
                                                    class="bx bx-layer me-2"></i>Orders</a>
                                            <a href="{{ URL::asset('#') }}" class="nav-link disabled"><i
                                                    class="bx bx-credit-card me-2"></i>Billing</a>
                                            <a href="{{ URL::asset('#') }}" class="nav-link disabled"><i
                                                    class="bx bx-group me-2"></i>Followers</a>
                                        </nav>

                                        <div class="card shadow p-3 mb-3">
                                            <h5 class="mb-4">Edit profile</h5>

                                            <form autocomplete="false">
                                                <div class="row align-items-center">
                                                    <div class="col-md-12">
                                                        <div class="row">
                                                            <div class="col-md-6 mb-4">
                                                                <input type="file" class="width-15x height-15x" id="update_profile"
                                                                    accept="image/png, image/jpeg, image/gif">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label class="form-label" for="profile_name">Name</label>
                                                        <input class="form-control" id="profile_name" type="text"
                                                            value="Emily doe">
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label class="form-label" for="profile_email">Email
                                                            address</label>
                                                        <input class="form-control" type="email" id="profile_email"
                                                            value="info@emilydoe.com">

                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label class="form-label" for="profile_phon">Phone</label>
                                                        <input type="text" id="profile_phon" value="+34 1234 567 890"
                                                            class="form-control">
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label class="form-label" for="profile_com">Company</label>
                                                        <input type="text" class="form-control" id="profile_com" value="Assan inc.">
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label class="form-label" for="profile_country">Country</label>
                                                        <select autocomplete="false" name="profile_country"
                                                            id="profile_country" class="form-control"
                                                            data-choices='{"searchEnabled":true,"itemSelectText":""}'>
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
                                                    <div class="col-md-6 mb-3">
                                                        <label class="form-label" for="profile_gender">Gender</label>
                                                        <select autocomplete="false" id="profile_gender" class="form-control" data-choices='{"searchEnabled":false, "itemSelectText":""}'>
                                                            <Option>Male</Option>
                                                            <Option selected>Female</Option>
                                                            <Option>Preffer not to say</Option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label class="form-label" for="profile_dob">Date of
                                                            birth</label>
                                                        <input type="text" id="profile_dob" class="form-control" data-flatpickr
                                                            value="1993-08-19">
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <label class="form-label">Communication</label>
                                                        <div class="d-flex">
                                                            <div>
                                                                <div class="form-check">
                                                                    <input type="checkbox" id="comm_phone" checked
                                                                        class="form-check-input">
                                                                    <label for="comm_phone">Phone</label>
                                                                </div>
                                                            </div>
                                                            <div class="ms-3">
                                                                <div class="form-check">
                                                                    <input type="checkbox" id="comm_email" checked
                                                                        class="form-check-input">
                                                                    <label for="comm_email">Email</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 mb-4">
                                                        <label for="profile_address" class="form-label">Address</label>
                                                        <input type="text" id="profile_address" class="form-control"
                                                            value="1355 Market St, Suite 900 San Francisco CA 94103">
                                                    </div>
                                                </div>
                                                <div class="text-end">
                                                    <button type="button" class="btn btn-primary" id="profileSaveBtn">Save changes</button>
                                                </div>
                                            </form>
                                        </div>

                                        <!--Password card-->
                                        <div class="card shadow p-3">
                                            <h5 class="mb-4">Update password</h5>

                                            <form>
                                                <div class="row">
                                                    <div class="col-md-4 mb-3">
                                                        <label for="update_pass_current" class="form-label">Current
                                                            password</label>
                                                        <input id="update_pass_current" type="password" class="form-control">
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <label for="update_pass_new" class="form-label">New
                                                            password</label>
                                                        <input type="password" class="form-control"
                                                            id="update_pass_new">
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <label for="update_pass_new_confirm" class="form-label">Confirm
                                                            new password</label>
                                                        <input type="password" class="form-control"
                                                            id="update_pass_new_confirm">
                                                    </div>
                                                </div>
                                                <small class="help-text text-body-secondary">Password must be at least 8 character and
                                                    contain symbols</small>
                                                <div class="text-end">
                                                    <button id="passwordUpdateBtn" type="button" class="btn btn-primary">Save updated
                                                        password</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </section>
</x-assan-layout>
