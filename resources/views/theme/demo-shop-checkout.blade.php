<x-assan-layout layout-type="{{$layoutType}}">

                <!--Page header start-->
      <section class="position-relative overflow-hidden">
        
        <div class="container-fluid">
          <div class="py-8 py-lg-11 bg-dark text-white position-relative">
            <!--background image-->
            <img src="{{ URL::asset('assets/img/shop/banners/06.jpg') }}" class="bg-image bg-top-center opacity-75" alt="">
          
            <div class="row align-items-center position-relative">
              <div class="col-lg-10 mx-auto text-center">
                <nav class="d-flex justify-content-center" aria-label="breadcrumb">
                  <ol class="breadcrumb mb-3">
                    <li class="breadcrumb-item">
                      <a href="{{ URL::asset('#!') }}">Home</a>
                    </li>
                    <li class="breadcrumb-item active">
                      Shop
                    </li>
                    <li class="breadcrumb-item active">
                        Checkout
                    </li>
                  </ol>
                </nav>
                <h1 class="mb-0 display-3">Checkout
                </h1>
              </div>
            </div>
            <!--/.row-->
          </div>
        </div>
      </section>
            <section class="position-relative">
                <div class="container pb-9 pb-lg-12 pt-7 position-relative">

                    <div class="row mb-7 justify-content-between">
                        <div class="col-lg-7 offset-lg-1">
                            <div class="px-3 px-lg-4 py-4 py-lg-5 rounded border">
                                <h5 class="text-body-secondary mb-0">
                                    Already a customer ?
                                    <a class="fw-semibold d-inline-block ms-3 collapsed"
                                        data-bs-toggle="collapse" href="{{ URL::asset('#collapseSignIn') }}" role="button"
                                        aria-expanded="false" aria-controls="collapseSignIn">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            fill="currentColor" class="bx bx-log-in-circle me-1"
                                            viewBox="0 0 16 16">
                                            <path fill-rule="evenodd"
                                                d="M6 3.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 0-1 0v2A1.5 1.5 0 0 0 6.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-8A1.5 1.5 0 0 0 5 3.5v2a.5.5 0 0 0 1 0v-2z">
                                            </path>
                                            <path fill-rule="evenodd"
                                                d="M11.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H1.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z">
                                            </path>
                                        </svg> Sign In
                                    </a>
                                </h5>
                                <div class="collapse" id="collapseSignIn">
                                    <form>
                                        <div class="pt-4 mb-3">
                                            <input type="email" class="form-control" autofocus=""
                                                placeholder="Username">
                                        </div>
                                        <div class="mb-3">
                                            <input type="password" class="form-control" placeholder="Password">
                                        </div>
                                        <div class="mb-3 d-flex justify-content-between">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value=""
                                                    id="flexCheckDefault">
                                                <label class="form-check-label" for="flexCheckDefault">
                                                    Remember me
                                                </label>
                                            </div>
                                            <div>
                                                <label class="text-end d-block small mb-0"><a
                                                        href="{{ URL::asset('page-account-forget-password.html') }}"
                                                        class="text-body-secondary link-decoration">Forget Password?</a></label>
                                            </div>
                                        </div>

                                        <div class="d-grid">
                                            <button class="btn btn-primary" type="submit">
                                                Sign in
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--Form billing information-->
                    <div class="row">
                        <div class="col-lg-10 mx-auto">
                            <form class="needs-validation" novalidate="">
                                <h4 class="mb-4">Billing information</h4>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label" for="billing_fname">First Name</label>
                                        <input required type="text" id="billing_fname" class="form-control" name="">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label" for="billing_lname">Last Name</label>
                                        <input required type="text" id="billing_lname" class="form-control" name="">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label" for="billing_com_name">Company Name (optional)</label>
                                        <input required type="text" id="billing_com_name" class="form-control" name="">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label" for="billing_country_name">Country / region </label>
                                        <select name="billing_country_name" id="billing_country_name"
                                            class="form-control" data-choices='{"itemSelectText":""}'>
                                            <option value="Afghanistan">Afghanistan</option>
                                            <option value="Åland Islands">Åland Islands</option>
                                            <option value="Albania">Albania</option>
                                            <option value="Algeria">Algeria</option>
                                            <option value="American Samoa">American Samoa</option>
                                            <option value="Andorra">Andorra</option>
                                            <option value="Angola">Angola</option>
                                            <option value="Anguilla">Anguilla</option>
                                            <option value="Antarctica">Antarctica</option>
                                            <option value="Antigua and Barbuda">Antigua and Barbuda</option>
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
                                            <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                                            <option value="Botswana">Botswana</option>
                                            <option value="Bouvet Island">Bouvet Island</option>
                                            <option value="Brazil">Brazil</option>
                                            <option value="British Indian Ocean Territory">British Indian Ocean
                                                Territory</option>
                                            <option value="Brunei Darussalam">Brunei Darussalam</option>
                                            <option value="Bulgaria">Bulgaria</option>
                                            <option value="Burkina Faso">Burkina Faso</option>
                                            <option value="Burundi">Burundi</option>
                                            <option value="Cambodia">Cambodia</option>
                                            <option value="Cameroon">Cameroon</option>
                                            <option value="Canada">Canada</option>
                                            <option value="Cape Verde">Cape Verde</option>
                                            <option value="Cayman Islands">Cayman Islands</option>
                                            <option value="Central African Republic">Central African Republic</option>
                                            <option value="Chad">Chad</option>
                                            <option value="Chile">Chile</option>
                                            <option value="China">China</option>
                                            <option value="Christmas Island">Christmas Island</option>
                                            <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
                                            <option value="Colombia">Colombia</option>
                                            <option value="Comoros">Comoros</option>
                                            <option value="Congo">Congo</option>
                                            <option value="Congo, The Democratic Republic of The">Congo, The Democratic
                                                Republic of The</option>
                                            <option value="Cook Islands">Cook Islands</option>
                                            <option value="Costa Rica">Costa Rica</option>
                                            <option value="Cote D'ivoire">Cote D'ivoire</option>
                                            <option value="Croatia">Croatia</option>
                                            <option value="Cuba">Cuba</option>
                                            <option value="Cyprus">Cyprus</option>
                                            <option value="Czech Republic">Czech Republic</option>
                                            <option value="Denmark">Denmark</option>
                                            <option value="Djibouti">Djibouti</option>
                                            <option value="Dominica">Dominica</option>
                                            <option value="Dominican Republic">Dominican Republic</option>
                                            <option value="Ecuador">Ecuador</option>
                                            <option value="Egypt">Egypt</option>
                                            <option value="El Salvador">El Salvador</option>
                                            <option value="Equatorial Guinea">Equatorial Guinea</option>
                                            <option value="Eritrea">Eritrea</option>
                                            <option value="Estonia">Estonia</option>
                                            <option value="Ethiopia">Ethiopia</option>
                                            <option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)
                                            </option>
                                            <option value="Faroe Islands">Faroe Islands</option>
                                            <option value="Fiji">Fiji</option>
                                            <option value="Finland">Finland</option>
                                            <option value="France">France</option>
                                            <option value="French Guiana">French Guiana</option>
                                            <option value="French Polynesia">French Polynesia</option>
                                            <option value="French Southern Territories">French Southern Territories
                                            </option>
                                            <option value="Gabon">Gabon</option>
                                            <option value="Gambia">Gambia</option>
                                            <option value="Georgia">Georgia</option>
                                            <option value="Germany">Germany</option>
                                            <option value="Ghana">Ghana</option>
                                            <option value="Gibraltar">Gibraltar</option>
                                            <option value="Greece">Greece</option>
                                            <option value="Greenland">Greenland</option>
                                            <option value="Grenada">Grenada</option>
                                            <option value="Guadeloupe">Guadeloupe</option>
                                            <option value="Guam">Guam</option>
                                            <option value="Guatemala">Guatemala</option>
                                            <option value="Guernsey">Guernsey</option>
                                            <option value="Guinea">Guinea</option>
                                            <option value="Guinea-bissau">Guinea-bissau</option>
                                            <option value="Guyana">Guyana</option>
                                            <option value="Haiti">Haiti</option>
                                            <option value="Heard Island and Mcdonald Islands">Heard Island and Mcdonald
                                                Islands</option>
                                            <option value="Holy See (Vatican City State)">Holy See (Vatican City State)
                                            </option>
                                            <option value="Honduras">Honduras</option>
                                            <option value="Hong Kong">Hong Kong</option>
                                            <option value="Hungary">Hungary</option>
                                            <option value="Iceland">Iceland</option>
                                            <option value="India">India</option>
                                            <option value="Indonesia">Indonesia</option>
                                            <option value="Iran, Islamic Republic of">Iran, Islamic Republic of</option>
                                            <option value="Iraq">Iraq</option>
                                            <option value="Ireland">Ireland</option>
                                            <option value="Isle of Man">Isle of Man</option>
                                            <option value="Israel">Israel</option>
                                            <option value="Italy">Italy</option>
                                            <option value="Jamaica">Jamaica</option>
                                            <option value="Japan">Japan</option>
                                            <option value="Jersey">Jersey</option>
                                            <option value="Jordan">Jordan</option>
                                            <option value="Kazakhstan">Kazakhstan</option>
                                            <option value="Kenya">Kenya</option>
                                            <option value="Kiribati">Kiribati</option>
                                            <option value="Korea, Democratic People's Republic of">Korea, Democratic
                                                People's Republic of</option>
                                            <option value="Korea, Republic of">Korea, Republic of</option>
                                            <option value="Kuwait">Kuwait</option>
                                            <option value="Kyrgyzstan">Kyrgyzstan</option>
                                            <option value="Lao People's Democratic Republic">Lao People's Democratic
                                                Republic</option>
                                            <option value="Latvia">Latvia</option>
                                            <option value="Lebanon">Lebanon</option>
                                            <option value="Lesotho">Lesotho</option>
                                            <option value="Liberia">Liberia</option>
                                            <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
                                            <option value="Liechtenstein">Liechtenstein</option>
                                            <option value="Lithuania">Lithuania</option>
                                            <option value="Luxembourg">Luxembourg</option>
                                            <option value="Macao">Macao</option>
                                            <option value="Macedonia, The Former Yugoslav Republic of">Macedonia, The
                                                Former Yugoslav Republic of</option>
                                            <option value="Madagascar">Madagascar</option>
                                            <option value="Malawi">Malawi</option>
                                            <option value="Malaysia">Malaysia</option>
                                            <option value="Maldives">Maldives</option>
                                            <option value="Mali">Mali</option>
                                            <option value="Malta">Malta</option>
                                            <option value="Marshall Islands">Marshall Islands</option>
                                            <option value="Martinique">Martinique</option>
                                            <option value="Mauritania">Mauritania</option>
                                            <option value="Mauritius">Mauritius</option>
                                            <option value="Mayotte">Mayotte</option>
                                            <option value="Mexico">Mexico</option>
                                            <option value="Micronesia, Federated States of">Micronesia, Federated States
                                                of</option>
                                            <option value="Moldova, Republic of">Moldova, Republic of</option>
                                            <option value="Monaco">Monaco</option>
                                            <option value="Mongolia">Mongolia</option>
                                            <option value="Montenegro">Montenegro</option>
                                            <option value="Montserrat">Montserrat</option>
                                            <option value="Morocco">Morocco</option>
                                            <option value="Mozambique">Mozambique</option>
                                            <option value="Myanmar">Myanmar</option>
                                            <option value="Namibia">Namibia</option>
                                            <option value="Nauru">Nauru</option>
                                            <option value="Nepal">Nepal</option>
                                            <option value="Netherlands">Netherlands</option>
                                            <option value="Netherlands Antilles">Netherlands Antilles</option>
                                            <option value="New Caledonia">New Caledonia</option>
                                            <option value="New Zealand">New Zealand</option>
                                            <option value="Nicaragua">Nicaragua</option>
                                            <option value="Niger">Niger</option>
                                            <option value="Nigeria">Nigeria</option>
                                            <option value="Niue">Niue</option>
                                            <option value="Norfolk Island">Norfolk Island</option>
                                            <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                                            <option value="Norway">Norway</option>
                                            <option value="Oman">Oman</option>
                                            <option value="Pakistan">Pakistan</option>
                                            <option value="Palau">Palau</option>
                                            <option value="Palestinian Territory, Occupied">Palestinian Territory,
                                                Occupied</option>
                                            <option value="Panama">Panama</option>
                                            <option value="Papua New Guinea">Papua New Guinea</option>
                                            <option value="Paraguay">Paraguay</option>
                                            <option value="Peru">Peru</option>
                                            <option value="Philippines">Philippines</option>
                                            <option value="Pitcairn">Pitcairn</option>
                                            <option value="Poland">Poland</option>
                                            <option value="Portugal">Portugal</option>
                                            <option value="Puerto Rico">Puerto Rico</option>
                                            <option value="Qatar">Qatar</option>
                                            <option value="Reunion">Reunion</option>
                                            <option value="Romania">Romania</option>
                                            <option value="Russian Federation">Russian Federation</option>
                                            <option value="Rwanda">Rwanda</option>
                                            <option value="Saint Helena">Saint Helena</option>
                                            <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                                            <option value="Saint Lucia">Saint Lucia</option>
                                            <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
                                            <option value="Saint Vincent and The Grenadines">Saint Vincent and The
                                                Grenadines</option>
                                            <option value="Samoa">Samoa</option>
                                            <option value="San Marino">San Marino</option>
                                            <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                                            <option value="Saudi Arabia">Saudi Arabia</option>
                                            <option value="Senegal">Senegal</option>
                                            <option value="Serbia">Serbia</option>
                                            <option value="Seychelles">Seychelles</option>
                                            <option value="Sierra Leone">Sierra Leone</option>
                                            <option value="Singapore">Singapore</option>
                                            <option value="Slovakia">Slovakia</option>
                                            <option value="Slovenia">Slovenia</option>
                                            <option value="Solomon Islands">Solomon Islands</option>
                                            <option value="Somalia">Somalia</option>
                                            <option value="South Africa">South Africa</option>
                                            <option value="South Georgia and The South Sandwich Islands">South Georgia
                                                and The South Sandwich Islands</option>
                                            <option value="Spain">Spain</option>
                                            <option value="Sri Lanka">Sri Lanka</option>
                                            <option value="Sudan">Sudan</option>
                                            <option value="Suriname">Suriname</option>
                                            <option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
                                            <option value="Swaziland">Swaziland</option>
                                            <option value="Sweden">Sweden</option>
                                            <option value="Switzerland">Switzerland</option>
                                            <option value="Syrian Arab Republic">Syrian Arab Republic</option>
                                            <option value="Taiwan, Province of China">Taiwan, Province of China</option>
                                            <option value="Tajikistan">Tajikistan</option>
                                            <option value="Tanzania, United Republic of">Tanzania, United Republic of
                                            </option>
                                            <option value="Thailand">Thailand</option>
                                            <option value="Timor-leste">Timor-leste</option>
                                            <option value="Togo">Togo</option>
                                            <option value="Tokelau">Tokelau</option>
                                            <option value="Tonga">Tonga</option>
                                            <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                                            <option value="Tunisia">Tunisia</option>
                                            <option value="Turkey">Turkey</option>
                                            <option value="Turkmenistan">Turkmenistan</option>
                                            <option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
                                            <option value="Tuvalu">Tuvalu</option>
                                            <option value="Uganda">Uganda</option>
                                            <option value="Ukraine">Ukraine</option>
                                            <option value="United Arab Emirates">United Arab Emirates</option>
                                            <option value="United Kingdom(UK)">United Kingdom (UK)</option>
                                            <option selected="" value="United States(USA)">United States (USA)</option>
                                            <option value="United States Minor Outlying Islands">United States Minor
                                                Outlying Islands</option>
                                            <option value="Uruguay">Uruguay</option>
                                            <option value="Uzbekistan">Uzbekistan</option>
                                            <option value="Vanuatu">Vanuatu</option>
                                            <option value="Venezuela">Venezuela</option>
                                            <option value="Viet Nam">Viet Nam</option>
                                            <option value="Virgin Islands, British">Virgin Islands, British</option>
                                            <option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
                                            <option value="Wallis and Futuna">Wallis and Futuna</option>
                                            <option value="Western Sahara">Western Sahara</option>
                                            <option value="Yemen">Yemen</option>
                                            <option value="Zambia">Zambia</option>
                                            <option value="Zimbabwe">Zimbabwe</option>
                                        </select>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="form-label">Address </label>
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <input required type="text" id="billing_address1"
                                                    placeholder="Address 1" class="form-control" name="">
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <input required type="text" id="billing_address2"
                                                    placeholder="Address 2" class="form-control" name="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label" for="billing_city2">City *</label>
                                        <input type="text" id="billing_city2" class="form-control" required name="">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label" for="billing_postalCode">Postal code *</label>
                                        <input type="text" id="billing_postalCode" data-format="custom"
                                            data-delimiter="-" data-blocks="2 3" class="form-control" required name="">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label" for="billing_emailId">Email Id *</label>
                                        <input required type="text" id="billing_emailId" class="form-control" required
                                            name="">
                                    </div>
                                    <div class="col-md-6 mb-5">
                                        <label class="form-label" for="billing_phone">Phone Number</label>
                                        <input required type="text" id="billing_phone" data-format="phone"
                                            class="form-control" name="">
                                    </div>

                                    <!--Different address ollapse-->
                                    <div class="col-md-12">
                                        <div class="p-3 p-lg-4 border rounded">
                                            <a href="{{ URL::asset('#shipping_address_different') }}" class="h5 mb-0 d-block"
                                                data-bs-toggle="collapse" aria-expanded="false">Ship to a different
                                                address?</a>
                                            <div class="collapse" id="shipping_address_different">
                                                <div class="row pt-3">
                                                    <div class="col-md-6 mb-3">
                                                        <label class="form-label" for="billing_different_fname">First
                                                            Name</label>
                                                        <input required type="text" id="billing_different_fname"
                                                            class="form-control" name="">
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label class="form-label" for="billing_different_lname">Last
                                                            Name</label>
                                                        <input required type="text" id="billing_different_lname"
                                                            class="form-control" name="">
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label class="form-label"
                                                            for="billing_different_comname">Company Name
                                                            (optional)</label>
                                                        <input type="text" id="billing_different_comname"
                                                            class="form-control" name="">
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label class="form-label"
                                                            for="billing__different_country_name">Country / region
                                                        </label>
                                                        <select name="billing_different_country_name"
                                                            id="billing__different_country_name" class="form-control"
                                                            data-choices='{"itemSelectText":""}'>
                                                            <option value="Afghanistan">Afghanistan</option>
                                                            <option value="Åland Islands">Åland Islands</option>
                                                            <option value="Albania">Albania</option>
                                                            <option value="Algeria">Algeria</option>
                                                            <option value="American Samoa">American Samoa</option>
                                                            <option value="Andorra">Andorra</option>
                                                            <option value="Angola">Angola</option>
                                                            <option value="Anguilla">Anguilla</option>
                                                            <option value="Antarctica">Antarctica</option>
                                                            <option value="Antigua and Barbuda">Antigua and Barbuda
                                                            </option>
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
                                                            <option value="Bosnia and Herzegovina">Bosnia and
                                                                Herzegovina</option>
                                                            <option value="Botswana">Botswana</option>
                                                            <option value="Bouvet Island">Bouvet Island</option>
                                                            <option value="Brazil">Brazil</option>
                                                            <option value="British Indian Ocean Territory">British
                                                                Indian Ocean Territory</option>
                                                            <option value="Brunei Darussalam">Brunei Darussalam</option>
                                                            <option value="Bulgaria">Bulgaria</option>
                                                            <option value="Burkina Faso">Burkina Faso</option>
                                                            <option value="Burundi">Burundi</option>
                                                            <option value="Cambodia">Cambodia</option>
                                                            <option value="Cameroon">Cameroon</option>
                                                            <option value="Canada">Canada</option>
                                                            <option value="Cape Verde">Cape Verde</option>
                                                            <option value="Cayman Islands">Cayman Islands</option>
                                                            <option value="Central African Republic">Central African
                                                                Republic</option>
                                                            <option value="Chad">Chad</option>
                                                            <option value="Chile">Chile</option>
                                                            <option value="China">China</option>
                                                            <option value="Christmas Island">Christmas Island</option>
                                                            <option value="Cocos (Keeling) Islands">Cocos (Keeling)
                                                                Islands</option>
                                                            <option value="Colombia">Colombia</option>
                                                            <option value="Comoros">Comoros</option>
                                                            <option value="Congo">Congo</option>
                                                            <option value="Congo, The Democratic Republic of The">Congo,
                                                                The Democratic Republic of The</option>
                                                            <option value="Cook Islands">Cook Islands</option>
                                                            <option value="Costa Rica">Costa Rica</option>
                                                            <option value="Cote D'ivoire">Cote D'ivoire</option>
                                                            <option value="Croatia">Croatia</option>
                                                            <option value="Cuba">Cuba</option>
                                                            <option value="Cyprus">Cyprus</option>
                                                            <option value="Czech Republic">Czech Republic</option>
                                                            <option value="Denmark">Denmark</option>
                                                            <option value="Djibouti">Djibouti</option>
                                                            <option value="Dominica">Dominica</option>
                                                            <option value="Dominican Republic">Dominican Republic
                                                            </option>
                                                            <option value="Ecuador">Ecuador</option>
                                                            <option value="Egypt">Egypt</option>
                                                            <option value="El Salvador">El Salvador</option>
                                                            <option value="Equatorial Guinea">Equatorial Guinea</option>
                                                            <option value="Eritrea">Eritrea</option>
                                                            <option value="Estonia">Estonia</option>
                                                            <option value="Ethiopia">Ethiopia</option>
                                                            <option value="Falkland Islands (Malvinas)">Falkland Islands
                                                                (Malvinas)</option>
                                                            <option value="Faroe Islands">Faroe Islands</option>
                                                            <option value="Fiji">Fiji</option>
                                                            <option value="Finland">Finland</option>
                                                            <option value="France">France</option>
                                                            <option value="French Guiana">French Guiana</option>
                                                            <option value="French Polynesia">French Polynesia</option>
                                                            <option value="French Southern Territories">French Southern
                                                                Territories</option>
                                                            <option value="Gabon">Gabon</option>
                                                            <option value="Gambia">Gambia</option>
                                                            <option value="Georgia">Georgia</option>
                                                            <option value="Germany">Germany</option>
                                                            <option value="Ghana">Ghana</option>
                                                            <option value="Gibraltar">Gibraltar</option>
                                                            <option value="Greece">Greece</option>
                                                            <option value="Greenland">Greenland</option>
                                                            <option value="Grenada">Grenada</option>
                                                            <option value="Guadeloupe">Guadeloupe</option>
                                                            <option value="Guam">Guam</option>
                                                            <option value="Guatemala">Guatemala</option>
                                                            <option value="Guernsey">Guernsey</option>
                                                            <option value="Guinea">Guinea</option>
                                                            <option value="Guinea-bissau">Guinea-bissau</option>
                                                            <option value="Guyana">Guyana</option>
                                                            <option value="Haiti">Haiti</option>
                                                            <option value="Heard Island and Mcdonald Islands">Heard
                                                                Island and Mcdonald Islands</option>
                                                            <option value="Holy See (Vatican City State)">Holy See
                                                                (Vatican City State)</option>
                                                            <option value="Honduras">Honduras</option>
                                                            <option value="Hong Kong">Hong Kong</option>
                                                            <option value="Hungary">Hungary</option>
                                                            <option value="Iceland">Iceland</option>
                                                            <option value="India">India</option>
                                                            <option value="Indonesia">Indonesia</option>
                                                            <option value="Iran, Islamic Republic of">Iran, Islamic
                                                                Republic of</option>
                                                            <option value="Iraq">Iraq</option>
                                                            <option value="Ireland">Ireland</option>
                                                            <option value="Isle of Man">Isle of Man</option>
                                                            <option value="Israel">Israel</option>
                                                            <option value="Italy">Italy</option>
                                                            <option value="Jamaica">Jamaica</option>
                                                            <option value="Japan">Japan</option>
                                                            <option value="Jersey">Jersey</option>
                                                            <option value="Jordan">Jordan</option>
                                                            <option value="Kazakhstan">Kazakhstan</option>
                                                            <option value="Kenya">Kenya</option>
                                                            <option value="Kiribati">Kiribati</option>
                                                            <option value="Korea, Democratic People's Republic of">
                                                                Korea, Democratic People's Republic of</option>
                                                            <option value="Korea, Republic of">Korea, Republic of
                                                            </option>
                                                            <option value="Kuwait">Kuwait</option>
                                                            <option value="Kyrgyzstan">Kyrgyzstan</option>
                                                            <option value="Lao People's Democratic Republic">Lao
                                                                People's Democratic Republic</option>
                                                            <option value="Latvia">Latvia</option>
                                                            <option value="Lebanon">Lebanon</option>
                                                            <option value="Lesotho">Lesotho</option>
                                                            <option value="Liberia">Liberia</option>
                                                            <option value="Libyan Arab Jamahiriya">Libyan Arab
                                                                Jamahiriya</option>
                                                            <option value="Liechtenstein">Liechtenstein</option>
                                                            <option value="Lithuania">Lithuania</option>
                                                            <option value="Luxembourg">Luxembourg</option>
                                                            <option value="Macao">Macao</option>
                                                            <option value="Macedonia, The Former Yugoslav Republic of">
                                                                Macedonia, The Former Yugoslav Republic of</option>
                                                            <option value="Madagascar">Madagascar</option>
                                                            <option value="Malawi">Malawi</option>
                                                            <option value="Malaysia">Malaysia</option>
                                                            <option value="Maldives">Maldives</option>
                                                            <option value="Mali">Mali</option>
                                                            <option value="Malta">Malta</option>
                                                            <option value="Marshall Islands">Marshall Islands</option>
                                                            <option value="Martinique">Martinique</option>
                                                            <option value="Mauritania">Mauritania</option>
                                                            <option value="Mauritius">Mauritius</option>
                                                            <option value="Mayotte">Mayotte</option>
                                                            <option value="Mexico">Mexico</option>
                                                            <option value="Micronesia, Federated States of">Micronesia,
                                                                Federated States of</option>
                                                            <option value="Moldova, Republic of">Moldova, Republic of
                                                            </option>
                                                            <option value="Monaco">Monaco</option>
                                                            <option value="Mongolia">Mongolia</option>
                                                            <option value="Montenegro">Montenegro</option>
                                                            <option value="Montserrat">Montserrat</option>
                                                            <option value="Morocco">Morocco</option>
                                                            <option value="Mozambique">Mozambique</option>
                                                            <option value="Myanmar">Myanmar</option>
                                                            <option value="Namibia">Namibia</option>
                                                            <option value="Nauru">Nauru</option>
                                                            <option value="Nepal">Nepal</option>
                                                            <option value="Netherlands">Netherlands</option>
                                                            <option value="Netherlands Antilles">Netherlands Antilles
                                                            </option>
                                                            <option value="New Caledonia">New Caledonia</option>
                                                            <option value="New Zealand">New Zealand</option>
                                                            <option value="Nicaragua">Nicaragua</option>
                                                            <option value="Niger">Niger</option>
                                                            <option value="Nigeria">Nigeria</option>
                                                            <option value="Niue">Niue</option>
                                                            <option value="Norfolk Island">Norfolk Island</option>
                                                            <option value="Northern Mariana Islands">Northern Mariana
                                                                Islands</option>
                                                            <option value="Norway">Norway</option>
                                                            <option value="Oman">Oman</option>
                                                            <option value="Pakistan">Pakistan</option>
                                                            <option value="Palau">Palau</option>
                                                            <option value="Palestinian Territory, Occupied">Palestinian
                                                                Territory, Occupied</option>
                                                            <option value="Panama">Panama</option>
                                                            <option value="Papua New Guinea">Papua New Guinea</option>
                                                            <option value="Paraguay">Paraguay</option>
                                                            <option value="Peru">Peru</option>
                                                            <option value="Philippines">Philippines</option>
                                                            <option value="Pitcairn">Pitcairn</option>
                                                            <option selected="" value="Poland">Poland</option>
                                                            <option value="Portugal">Portugal</option>
                                                            <option value="Puerto Rico">Puerto Rico</option>
                                                            <option value="Qatar">Qatar</option>
                                                            <option value="Reunion">Reunion</option>
                                                            <option value="Romania">Romania</option>
                                                            <option value="Russian Federation">Russian Federation
                                                            </option>
                                                            <option value="Rwanda">Rwanda</option>
                                                            <option value="Saint Helena">Saint Helena</option>
                                                            <option value="Saint Kitts and Nevis">Saint Kitts and Nevis
                                                            </option>
                                                            <option value="Saint Lucia">Saint Lucia</option>
                                                            <option value="Saint Pierre and Miquelon">Saint Pierre and
                                                                Miquelon</option>
                                                            <option value="Saint Vincent and The Grenadines">Saint
                                                                Vincent and The Grenadines</option>
                                                            <option value="Samoa">Samoa</option>
                                                            <option value="San Marino">San Marino</option>
                                                            <option value="Sao Tome and Principe">Sao Tome and Principe
                                                            </option>
                                                            <option value="Saudi Arabia">Saudi Arabia</option>
                                                            <option value="Senegal">Senegal</option>
                                                            <option value="Serbia">Serbia</option>
                                                            <option value="Seychelles">Seychelles</option>
                                                            <option value="Sierra Leone">Sierra Leone</option>
                                                            <option value="Singapore">Singapore</option>
                                                            <option value="Slovakia">Slovakia</option>
                                                            <option value="Slovenia">Slovenia</option>
                                                            <option value="Solomon Islands">Solomon Islands</option>
                                                            <option value="Somalia">Somalia</option>
                                                            <option value="South Africa">South Africa</option>
                                                            <option
                                                                value="South Georgia and The South Sandwich Islands">
                                                                South Georgia and The South Sandwich Islands</option>
                                                            <option value="Spain">Spain</option>
                                                            <option value="Sri Lanka">Sri Lanka</option>
                                                            <option value="Sudan">Sudan</option>
                                                            <option value="Suriname">Suriname</option>
                                                            <option value="Svalbard and Jan Mayen">Svalbard and Jan
                                                                Mayen</option>
                                                            <option value="Swaziland">Swaziland</option>
                                                            <option value="Sweden">Sweden</option>
                                                            <option value="Switzerland">Switzerland</option>
                                                            <option value="Syrian Arab Republic">Syrian Arab Republic
                                                            </option>
                                                            <option value="Taiwan, Province of China">Taiwan, Province
                                                                of China</option>
                                                            <option value="Tajikistan">Tajikistan</option>
                                                            <option value="Tanzania, United Republic of">Tanzania,
                                                                United Republic of</option>
                                                            <option value="Thailand">Thailand</option>
                                                            <option value="Timor-leste">Timor-leste</option>
                                                            <option value="Togo">Togo</option>
                                                            <option value="Tokelau">Tokelau</option>
                                                            <option value="Tonga">Tonga</option>
                                                            <option value="Trinidad and Tobago">Trinidad and Tobago
                                                            </option>
                                                            <option value="Tunisia">Tunisia</option>
                                                            <option value="Turkey">Turkey</option>
                                                            <option value="Turkmenistan">Turkmenistan</option>
                                                            <option value="Turks and Caicos Islands">Turks and Caicos
                                                                Islands</option>
                                                            <option value="Tuvalu">Tuvalu</option>
                                                            <option value="Uganda">Uganda</option>
                                                            <option value="Ukraine">Ukraine</option>
                                                            <option value="United Arab Emirates">United Arab Emirates
                                                            </option>
                                                            <option value="United Kingdom(UK)">United Kingdom (UK)
                                                            </option>
                                                            <option value="United States(USA)">United States (USA)
                                                            </option>
                                                            <option value="United States Minor Outlying Islands">United
                                                                States Minor Outlying Islands</option>
                                                            <option value="Uruguay">Uruguay</option>
                                                            <option value="Uzbekistan">Uzbekistan</option>
                                                            <option value="Vanuatu">Vanuatu</option>
                                                            <option value="Venezuela">Venezuela</option>
                                                            <option value="Viet Nam">Viet Nam</option>
                                                            <option value="Virgin Islands, British">Virgin Islands,
                                                                British</option>
                                                            <option value="Virgin Islands, U.S.">Virgin Islands, U.S.
                                                            </option>
                                                            <option value="Wallis and Futuna">Wallis and Futuna</option>
                                                            <option value="Western Sahara">Western Sahara</option>
                                                            <option value="Yemen">Yemen</option>
                                                            <option value="Zambia">Zambia</option>
                                                            <option value="Zimbabwe">Zimbabwe</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <label class="form-label"
                                                            for="billing_different_address1">Address </label>
                                                        <div class="row">
                                                            <div class="col-md-6 mb-3">
                                                                <input required type="text"
                                                                    id="billing_different_address1"
                                                                    placeholder="Address 1" class="form-control"
                                                                    name="">
                                                            </div>
                                                            <div class="col-md-6 mb-3">
                                                                <input required type="text"
                                                                    id="billing_different_address2"
                                                                    placeholder="Address 2" class="form-control"
                                                                    name="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label class="form-label" for="billing_city">City *</label>
                                                        <input type="text" id="billing_city" class="form-control"
                                                            required="" name="">
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label class="form-label"
                                                            for="billing_different_postalCode">Postal code *</label>
                                                        <input type="text" data-format="custom" data-delimiter="-"
                                                            data-blocks="2 3" id="billing_different_postalCode"
                                                            class="form-control" required="" name="">
                                                    </div>
                                                    <div class="col-12 mb-3">
                                                        <label class="form-label" for="billing_different_note">Order
                                                            Note</label>
                                                        <textarea class="form-control" id="billing_different_note"
                                                            rows="5"
                                                            placeholder="Comments about your order, eg. : Delivery instructions"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                                <h5 class="mb-4 pt-5">Your order</h5>
                                <!--Checkout product info table-->
                               <div class="card card-table mb-7">
                                <table class="table rounded mb-0 overflow-hidden">
                                    <thead class="">
                                        <tr>
                                            <th class="product-name">Product</th>
                                            <th class="product-total">Subtotal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="product-name">
                                                <div class="d-flex align-items-center">
                                                    <h6 class="mb-0">Laptop backpack water proof</h6>
                                                    <strong class="product-qty ms-3 text-body-secondary">x 1</strong>
                                                </div>
                                            </td>
                                            <td>$36.00</td>
                                        </tr>
                                        <tr>
                                            <td class="product-name">
                                                <div class="d-flex align-items-center">
                                                    <h6 class="mb-0">Brown denim jacket for mens</h6>
                                                    <strong class="product-qty ms-3 text-body-secondary">x 2</strong>
                                                </div>
                                            </td>
                                            <td>$118.00</td>
                                        </tr>
                                    </tbody>
                                    <tfoot class="bg-body-tertiary">
                                        <tr>
                                            <th>Shipping</th>
                                            <td class="fw-semibold fs-5">Free Shipping</td>
                                        </tr>
                                        <tr>
                                            <th>Order Total</th>
                                            <td class="fw-semibold fs-5"><strong>$154.00</strong></td>
                                        </tr>
                                    </tfoot>
                                </table>
                               </div>
                                <h5 class="mb-3">Method of Payment</h5>
                                <div class="mb-3" id="payment_methods">
                                    <div class="position-relative rounded border overflow-hidden mb-2">
                                        <input type="radio" class="btn-check" name="payment_options"
                                            id="payment_option_card" autocomplete="off" checked>
                                        <label
                                            class="btn text-body border-0 shadow-none text-start d-flex w-100 align-items-center justify-content-between rounded-0"
                                            for="payment_option_card" data-bs-target="#mothod_payment_card"
                                            aria-expanded="true" data-bs-toggle="collapse">Debit Credit card
                                            <div>
                                                <img src="{{ URL::asset('assets/img/payment/visa.svg') }}" class="width-35 me-2">
                                                <img src="{{ URL::asset('assets/img/payment/american_express.svg') }}"
                                                    class="width-35 me-2">
                                                <img src="{{ URL::asset('assets/img/payment/rupay.svg') }}" class="width-35">
                                            </div>
                                        </label>
                                        <div class="collapse border-top show" id="mothod_payment_card"
                                            data-bs-parent="#payment_methods">
                                            <div class="px-3 py-4">
                                                <div class="row">
                                                    <div class="mb-3 col-md-8">
                                                        <label for="card_number" class="form-label">Card Number</label>
                                                        <input required type="text" id="card_number" data-format="card"
                                                            placeholder="XXXX XXXX XXXX XXXX" autocomplete="off"
                                                            class="form-control">
                                                    </div>
                                                    <div class="mb-3 col-md-4">
                                                        <label for="card_cvc" class="form-label">CVC Number</label>
                                                        <input required type="text" data-format="cvc" autocomplete="off"
                                                            id="card_cvc" placeholder="XXX" class="form-control">
                                                    </div>
                                                    <div class="mb-3 col-md-6">
                                                        <label for="card_ex_month" class="form-label">Expiry
                                                            Month</label>
                                                        <input required type="text" autocomplete="off"
                                                            data-format="custom" id="card_ex_month" data-blocks="2"
                                                            placeholder="" class="form-control">
                                                    </div>
                                                    <div class="mb-3 col-md-6">
                                                        <label for="card_ex_year" class="form-label">Expiry Year</label>
                                                        <input required type="text" data-format="custom"
                                                            id="card_ex_year" data-blocks="4" placeholder=""
                                                            class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="position-relative rounded border overflow-hidden">
                                        <input type="radio" class="btn-check" name="payment_options"
                                            id="payment_option_paypal">
                                        <label
                                            class="btn text-body border-0 text-start d-flex w-100 align-items-center justify-content-between rounded-0"
                                            for="payment_option_paypal" data-bs-target="#mothod_payment_paypal"
                                            aria-expanded="false" data-bs-toggle="collapse">Pay with Paypal
                                            <div>
                                                <img src="{{ URL::asset('assets/img/payment/paypal.svg') }}" class="width-35">
                                            </div>
                                        </label>
                                        <div class="collapse border-top" id="mothod_payment_paypal"
                                            data-bs-parent="#payment_methods">
                                            <div class="px-3 py-4">
                                                <p class="w-lg-75 mb-4">Lorem ipsum is placeholder text commonly used in
                                                    the graphic, print, and publishing industries for previewing layouts
                                                    and visual mockups.</p>
                                                <a href="{{ URL::asset('#') }}" class="btn btn-info">Pay with Paypal</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-4 form-check">
                                    <input required type="checkbox" class="form-check-input"
                                        id="conditions_before_order" name="">
                                    <label class="form-check-label" for="conditions_before_order">
                                        I accept the <a href="{{ URL::asset('#') }}" class="link-decoration">Terms</a> and
                                        <a href="{{ URL::asset('#') }}" class="link-decoration">conditions</a> and the
                                        <a href="{{ URL::asset('#') }}" class="link-decoration">data protection guidelines.</a>
                                    </label>
                                    <div class="invalid-feedback">
                                        You must agree before submitting.
                                    </div>
                                </div>
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-lg hover-lift btn-hover-text btn-primary">
                                        <span class="btn-hover-label label-default">Place your order</span>
                                        <span class="btn-hover-label label-hover">Place your order</span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
            <section class="position-relative bg-body-tertiary overflow-hidden">
                <div class="container py-7 position-relative">
                    <div class="row align-items-center">
                        <div class="col-md-4 border-end-md border-light text-center mb-7 mb-md-0">
                            <div class="mb-3">
                                <i class="bx bx-store fs-1"></i>
                            </div>
                            <h6 class="mb-0">30 Day Returns</h6>
                        </div>
                        <div class="col-md-4 border-end-md border-light text-center mb-7 mb-md-0">
                            <div class="mb-3">
                                <i class="bx bx-purchase-tag fs-1"></i>
                            </div>
                            <h6 class="mb-0">100% Handpicked</h6>
                        </div>
                        <div class="col-md-4 text-center">
                            <div class="mb-3">
                                <i class="bx bx-package fs-1"></i>
                            </div>
                            <h6 class="mb-0">Assured Quality</h6>
                        </div>
                    </div>
                </div>
            </section>
</x-assan-layout>
