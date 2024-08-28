<x-assan-layout layout-type="{{$layoutType}}">
            <!--page-hero-->
            <section class="bg-gradient-primary text-white position-relative">
                <div class="container pt-14 pb-9 pb-lg-12 position-relative z-1">
                    <div class="row pt-lg-5 align-items-center justify-content-center text-center">
                        <div class="col-lg-10 col-xl-7 z-2">
                            <div class="position-relative">
                                <div>
                                    <nav class="d-flex justify-content-center" aria-label="breadcrumb">
                                        <div class="mb-4">
                                            <ol class="breadcrumb mb-0">
                                                <li class="breadcrumb-item"><a href="{{ URL::asset('#') }}">Home</a></li>
                                                <li class="breadcrumb-item active">Components</li>
                                                <li class="breadcrumb-item active" aria-current="page">Form Validations
                                                </li>
                                            </ol>
                                        </div>
                                    </nav>
                                    <h1 class="mb-0 display-4">
                                        Form Validations
                                    </h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>


            <section class="position-relative">
                <div class="container py-9 py-lg-11">
                    <div class="row justify-content-center">
                        <div class="col-lg-8 mb-5 mb-lg-0">
                            <div class="d-flex align-items-center mb-5">
                                <h6 class="mb-0 me-3 me-md-4">Bootstrap validations</h6>
                                <div class="border-bottom flex-grow-1"></div>
                            </div>
                            <form class="row g-3 needs-validation" novalidate>
                                <div class="col-md-4">
                                    <label for="validationCustom01" class="form-label">First name</label>
                                    <input type="text" class="form-control" id="validationCustom01" value="Mark"
                                        required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label for="validationCustom02" class="form-label">Last name</label>
                                    <input type="text" class="form-control" id="validationCustom02" value="Otto"
                                        required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label for="validationCustomUsername" class="form-label">Username</label>
                                    <div class="input-group has-validation">
                                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                                        <input type="text" class="form-control" id="validationCustomUsername"
                                            aria-describedby="inputGroupPrepend" required>
                                        <div class="invalid-feedback">
                                            Please choose a username.
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="validationCustom03" class="form-label">City</label>
                                    <input type="text" class="form-control" id="validationCustom03" required>
                                    <div class="invalid-feedback">
                                        Please provide a valid city.
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label for="validationCustom04" class="form-label">State</label>
                                    <select class="form-select" id="validationCustom04" required>
                                        <option selected disabled value="">Choose...</option>
                                        <option>...</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        Please select a valid state.
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label for="validationCustom05" class="form-label">Zip</label>
                                    <input type="text" class="form-control" id="validationCustom05" required>
                                    <div class="invalid-feedback">
                                        Please provide a valid zip.
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="invalidCheck"
                                            required>
                                        <label class="form-check-label" for="invalidCheck">
                                            Agree to terms and conditions
                                        </label>
                                        <div class="invalid-feedback">
                                            You must agree before submitting.
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary" type="submit">Submit form</button>
                                </div>
                            </form>
                            <hr class="my-7">
                            <div class="d-flex align-items-center mb-5">
                                <h6 class="mb-0 me-3 me-md-4">Cleave Formats</h6>
                                <div class="border-bottom flex-grow-1"></div>
                            </div>
                            <div class="mb-3">
                                <label for="cphone" class="form-label">Phone</label>
                                <input type="text" data-format="custom" id="cphone" data-delimiter="-"
                                    data-blocks="3 3 4" placeholder="012-345-7890" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="debitcard" class="form-label">Debit / Credit card number</label>
                                <input type="text" data-format="card" id="debitcard" placeholder="xxxx xxxx xxxx xxxx"
                                    class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="cvc" class="form-label">CVC</label>
                                <input type="text" data-format="cvc" id="cvc" placeholder="xxx" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="date" class="form-label">Date</label>
                                <input type="text" data-format="date" id="date" placeholder="Month / Year"
                                    class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="datelong" class="form-label">Date long</label>
                                <input type="text" data-format="date-long" id="datelong"
                                    placeholder="Year / Month / Day" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="time" class="form-label">Time</label>
                                <input type="text" data-format="time" id="time" placeholder="Hour:Minutes"
                                    class="form-control">
                            </div>
                            <div class="mb-7">
                                <label for="timelong" class="form-label">Time long</label>
                                <input type="text" data-format="time-long" id="timelong"
                                    placeholder="Hour:Minutes:Seconds" class="form-control">
                            </div>
                            <div class="text-center">
                                Cleave Plugin <a href="{{ URL::asset('https://nosir.github.io/cleave.js/') }}" target="_blank"
                                    class="fw-semibold link-underline"> documentation</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="bg-gradient bg-secondary text-white position-relative">
                <svg class="position-absolute top-0 start-0 text-white w-50 h-auto w-lg-75" width="136" height="76"
                    viewBox="0 0 136 76" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-opacity=".1"
                        d="M136 -28C136 -14.3425 133.31 -0.818782 128.083 11.7991C122.857 24.4169 115.196 35.8818 105.539 45.5391C95.8818 55.1964 84.4169 62.857 71.7991 68.0835C59.1812 73.31 45.6575 76 32 76C18.3425 76 4.81878 73.31 -7.79908 68.0835C-20.4169 62.857 -31.8818 55.1964 -41.5391 45.5391C-51.1964 35.8818 -58.857 24.4169 -64.0835 11.7991C-69.31 -0.818789 -72 -14.3425 -72 -28L136 -28Z"
                        fill="currentColor" />
                </svg>
                <div class="container py-9 py-lg-11 position-relative z-1">
                    <div class="row align-items-center justify-content-center">
                        <div class="col-md-10 col-lg-8 col-xl-7 text-center mx-auto">
                            <h2 class="mb-4 display-4" data-aos="fade-up">
                                Let's start building stunning websites
                            </h2>
                            <p class="mb-5 px-lg-5" data-aos="fade-up" data-aos-delay="100">
                                Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing
                                industries for previewing layouts and visual mockups.
                            </p>
                            <div data-aos="fade-up">
                                <a href="{{ URL::asset('#!') }}" class="btn btn-primary btn-lg">Purchase a
                                    license</a>
                            </div>
                        </div>
                        <!--End Col-->
                    </div> <!-- / .row -->
                </div> <!-- / .container -->
            </section>
</x-assan-layout>
