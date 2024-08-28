<x-assan-layout layout-type="{{$layoutType}}">
            <!--hero-->
            <section class="position-relative overflow-hidden border-bottom">
                <svg class="position-absolute start-50 bottom-0 w-auto text-primary" width="301" height="104%"
                    viewBox="0 0 301 301" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M0.999879 301C0.999881 261.603 8.7596 222.593 23.836 186.195C38.9124 149.797 61.0103 116.726 88.8678 88.8679C116.725 61.0104 149.797 38.9125 186.195 23.8361C222.593 8.75972 261.603 0.999997 301 1"
                        stroke="currentColor" />
                </svg>

                <div class="container pt-12 pb-7 position-relative z-1">
                    <div class="row pt-5 pt-lg-7 justify-content-between align-items-center">
                        <div class="col-md-10">
                            <h1 class="display-4 mb-3">
                               Add listing
                            </h1>
                            <p class="lead mb-0">Check your property details carefully before submitting</p>
                        </div>
                    </div>
                </div>
            </section>

            <section class="position-relative">
                <div class="container py-9 py-lg-11">
                    <form>
                        <div class="row">
                            <div class="col-sm-6 col-xl-3 mb-3">
                                <label for="p_for" class="form-label">Property for</label>
                                <select data-choices='{"searchEnabled":false,"itemSelectText":""}'
                                    class="form-control bg-body-tertiary form-control-lg" id="p_for">
                                    <option value="Sale">For Sale</option>
                                    <option value="Rent">For Rent</option>
                                </select>
                            </div>
                            <div class="col-sm-6 col-xl-3 mb-3">
                                <label for="p_type" class="form-label">Property Type</label>
                                <select data-choices='{"searchEnabled":false,"itemSelectText":""}'
                                    class="form-control bg-body-tertiary form-control-lg" id="p_type">
                                    <option value="House">House</option>
                                    <option value="Apartment">Apartment</option>
                                    <option value="Office">Office</option>
                                    <option value="Parking">Parking</option>
                                    <option value="Villa">Villa</option>
                                </select>
                            </div>
                            <div class="col-12"></div>
                            <div class="col-sm-8 mb-3">
                                <label for="p_title" class="form-label">Property Title</label>
                                <div class="position-relative">
                                    <input type="text" placeholder="" class="form-control form-control-lg ps-6" name=""
                                        id="p_title">
                                    <span
                                        class="position-absolute pe-none opacity-75 text-body-secondary flex-center width-3x height-3x left-0 ms-2 top-50 translate-middle-y">
                                       <i class="bx bx-home fs-5"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="col-sm-4 mb-3">
                                <label for="p_price" class="form-label">Property Price</label>
                                <div class="position-relative">
                                    <input type="text" placeholder="" class="form-control form-control-lg ps-6" name=""
                                        id="p_price">
                                    <span
                                        class="position-absolute pe-none opacity-75 text-body-secondary flex-center width-3x height-3x left-0 ms-2 top-50 translate-middle-y">
                                        <i class="bx bx-dollar fs-5"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="col-sm-12 mb-3">
                                <label for="p_address" class="form-label">Full Address</label>
                                <div class="position-relative">
                                    <input type="text" placeholder="" class="form-control form-control-lg ps-6" name=""
                                        id="p_address">
                                    <span
                                        class="position-absolute pe-none opacity-75 text-body-secondary flex-center width-3x height-3x left-0 ms-2 top-50 translate-middle-y">
                                        <i class="bx bx-map fs-5"></i>
                                    </span>
                                </div>
                            </div>

                            <div class="col-sm-4 mb-3">
                                <label for="p_year" class="form-label">Built in Year</label>
                                <div class="position-relative">

                                    <select id="p_year" class="form-control form-control-lg ps-6"
                                        data-choices='{"searchEnabled":false,"itemSelectText":""}'>
                                        <option value="2021">2021</option>
                                        <option value="2020">2020</option>
                                        <option value="2019">2019</option>
                                        <option value="2018">2018</option>
                                        <option value="2017">2017</option>
                                        <option value="2016">2016</option>
                                        <option value="2015">2015</option>
                                        <option value="2014">2014</option>
                                        <option value="2013">2013</option>
                                        <option value="2012">2012</option>
                                        <option value="2011">2011</option>
                                        <option value="2010">2010</option>
                                        <option value="2009">2009</option>
                                        <option value="2008">2008</option>
                                        <option value="2007">2007</option>
                                        <option value="2006">2006</option>
                                        <option value="2005">2005</option>
                                        <option value="2004">2004</option>
                                        <option value="2003">2003</option>
                                        <option value="2002">2002</option>
                                        <option value="2001">2001</option>
                                        <option value="2000">2000</option>
                                        <option value="1999">1999</option>
                                        <option value="1998">1998</option>
                                        <option value="1997">1997</option>
                                        <option value="1996">1996</option>
                                        <option value="1995">1995</option>
                                        <option value="older_1994">Older</option>
                                    </select>
                                    <span
                                        class="position-absolute pe-none opacity-75 text-body-secondary flex-center width-3x height-3x left-0 ms-2 top-50 translate-middle-y">
                                        <i class="bx bx-calendar-alt fs-5"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="col-sm-4 mb-3">
                                <label for="p_p_code" class="form-label">Postal Code</label>
                                <div class="position-relative">
                                    <input type="text" class="form-control form-control-lg ps-6" id="p_p_code"
                                        placeholder="Postal code">
                                    <span
                                        class="position-absolute pe-none opacity-75 text-body-secondary flex-center width-3x height-3x left-0 ms-2 top-50 translate-middle-y">
                                        <i class="bx bx-paper-plane fs-5"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="col-sm-4 mb-3">
                                <label for="p_city_province" class="form-label">City/Province</label>
                                <div class="position-relative">
                                    <input type="text" class="form-control form-control-lg ps-6" id="p_city_province"
                                        placeholder="City/Province">
                                    <span
                                        class="position-absolute pe-none opacity-75 text-body-secondary flex-center width-3x height-3x left-0 ms-2 top-50 translate-middle-y">
                                        <i class='bx bx-buildings fs-5'></i>
                                    </span>
                                </div>
                            </div>
                            <div class="col-sm-5 mb-3">
                                <label for="p_agent" class="form-label">Agent Name</label>
                                <div class="position-relative">
                                    <input type="text" class="form-control form-control-lg ps-6" id="p_agent"
                                        placeholder="John doe">
                                    <span
                                        class="position-absolute pe-none opacity-75 text-body-secondary flex-center width-3x height-3x left-0 ms-2 top-50 translate-middle-y">
                                        <i class='bx bx-user fs-5'></i>
                                    </span>
                                </div>
                            </div>
                            <div class="col-sm-7 mb-3">
                                <label for="p_phoneN" class="form-label">Phone number</label>
                                <div class="position-relative">
                                    <input type="text" class="form-control form-control-lg ps-6" id="p_phoneN"
                                        placeholder="+01-123-4567-890">
                                    <span
                                        class="position-absolute pe-none opacity-75 text-body-secondary flex-center width-3x height-3x left-0 ms-2 top-50 translate-middle-y">
                                        <i class='bx bx-phone fs-5'></i>
                                    </span>
                                </div>
                            </div>
                            <div class="col-sm-6 mb-3">
                                <label for="p_area" class="form-label">Area</label>
                                <div class="position-relative">
                                    <input type="text" class="form-control form-control-lg ps-6" id="p_area"
                                        placeholder="3200 sq ft">
                                    <span
                                        class="position-absolute pe-none opacity-75 text-body-secondary flex-center width-3x height-3x left-0 ms-2 top-50 translate-middle-y">
                                        <i class='bx bx-area fs-5'></i>
                                    </span>
                                </div>
                            </div>
                            <div class="col-6 col-sm-3 mb-3">
                                <label for="p_bedrooms" class="form-label">Bedrooms</label>
                                <div class="position-relative">
                                    <select class="form-control form-control-lg ps-6"
                                        data-choices='{"searchEnabled":false,"itemSelectText":""}' id="p_bedrooms">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="4+">4+</option>
                                    </select>
                                    <span
                                        class="position-absolute pe-none opacity-75 text-body-secondary flex-center width-3x height-3x left-0 ms-2 top-50 translate-middle-y">
                                        <i class='bx bx-bed fs-5'></i>
                                    </span>
                                </div>
                            </div>
                            <div class="col-6 col-sm-3 mb-3">
                                <label for="p_bathrooms" class="form-label">Bathrooms</label>
                                <div class="position-relative">
                                    <select class="form-control form-control-lg ps-6"
                                        data-choices='{"searchEnabled":false,"itemSelectText":""}' id="p_bathrooms">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="4+">4+</option>
                                    </select>
                                    <span
                                        class="position-absolute pe-none opacity-75 text-body-secondary flex-center width-3x height-3x left-0 ms-2 top-50 translate-middle-y">
                                        <i class='bx bx-bath fs-5'></i>
                                    </span>
                                </div>
                            </div>
                            <div class="col-12 mb-4">
                                <label for="p_description" class="form-label">Description</label>
                                <!--Quill editor-->
                                <div class="height-15x" data-quill='{"placeholder": "Add Description"}'>

                                </div>
                            </div>

                            <div class="col-12 mb-3">
                                <label for="p_description" class="form-label">Upload images</label>
                                <!--Listing Images-->
                                <div class="p-4 border rounded-3" data-dropzone-area="">
                                    <div class="dz-preview" id="dz-preview-row" data-horizontal-scroll="">
                                    </div>
                                    <div class="chat-form rounded-pill" data-emoji-form="">
                                        <button type="button"
                                        class="btn btn-secondary dz-clickable"
                                        id="dz-btn">
                                        <i class="bx bx-cloud-upload fs-4 me-1"></i> Upload
                                    </button>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between flex-md-row flex-column align-items-md-center">
                                <div class="mb-3 mb-md-0">
                                    <div class="form-check form-switch d-flex align-items-center">
                                        <input id="agree_listing_policy" type="checkbox" class="form-check-input">
                                        <label for="agree_listing_policy" class="form-check-label ms-2">I agree to <a href="{{ URL::asset('#!') }}">terms & conditions</a></label>
                                    </div>
                                </div>
                                <div class="d-grid d-md-block">
                                    <button type="submit" class="btn btn-lg btn-primary">Submit listing</button>
                                </div>
                            </div>
                        </div>
                </div>
                </form>
                </div>
            </section>
</x-assan-layout>
