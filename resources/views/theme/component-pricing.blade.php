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
                                                <li class="breadcrumb-item active" aria-current="page">Pricing tables
                                                </li>
                                            </ol>
                                        </div>
                                    </nav>
                                    <h1 class="mb-0 display-4">
                                        Pricing tables
                                    </h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="position-relative">
                <div class="container pt-9 pt-lg-11">

                    <!--Code snippet modal-->
                    <x-partials/snippets/components/pricing-tables/pricing-tables-1 />
                </div>
                <!--Pricing container-->
                <div class="container pt-5 pb-9 pb-lg-11">
                    <!--Pricing row-->
                    <div class="no-gutters row">

                        <!--Pricing col-->
                        <div class="col-lg-4">
                            <!--Pricing Card-->
                            <div class="card py-5 border-0 card-body">
                                <div class="rounded-top mb-4 position-relative overflow-hidden text-center">
                                    <h5 class="title mb-4">Basic</h5>
                                    <div>
                                        <h2 class="display-4 mb-4 lh-1"><sub class="small">$</sub>0</h2>
                                        <h6 class="mb-0 small text-body-secondary">Monthly</h6>
                                    </div>
                                    <!--/.price-->
                                </div>
                                <!--/.price-card-header-->
                                <ul class="text-center list-unstyled mb-4">
                                    <li class="mb-3">Free domain</li>
                                    <li class="mb-3">2 Sub domains</li>
                                    <li class="mb-3">2 GB storage</li>
                                    <li class="mb-3">Unmetered bandwith</li>
                                    <li class="mb-3">Website builder</li>
                                    <li class="mb-2 text-strikethrough text-body-secondary">On-site support</li>
                                    <li class="mb-2 text-strikethrough text-body-secondary">Premium support</li>
                                </ul>
                                <div class="text-center">
                                    <a href="{{ URL::asset('#!') }}" class="btn btn-outline-primary hover-lift btn-material">Get Basic</a>
                                </div>
                            </div>
                        </div>

                        <!--Pricing col-->
                        <div class="col-lg-4">
                            <!--Pricing Card-->
                            <div
                                class="card pt-6 pb-5 border-0 shadow-lg bg-primary-subtle card-body position-relative z-1">
                                <span
                                    class="badge z-1 mt-n2 bg-warning position-absolute start-50 translate-middle-x top-0">Best
                                    value</span>
                                <div class="rounded-top mb-4 position-relative overflow-hidden text-center">
                                    <h5 class="title mb-4">Pro</h5>
                                    <div>
                                        <h2 class="display-4 mb-4 lh-1"><sub class="small">$</sub>29</h2>
                                        <h6 class="mb-0 small text-body-secondary">Monthly</h6>
                                    </div>
                                    <!--/.price-->
                                </div>
                                <!--/.price-card-header-->
                                <ul class="text-center list-unstyled mb-4">
                                    <li class="mb-3">Free domain</li>
                                    <li class="mb-3">2 Sub domains</li>
                                    <li class="mb-3">2 GB storage</li>
                                    <li class="mb-3">Unmetered bandwith</li>
                                    <li class="mb-3">Website builder</li>
                                    <li class="mb-3">On-site support</li>
                                    <li class="mb-2 text-strikethrough text-body-secondary">Premium support</li>
                                </ul>
                                <div class="text-center">
                                    <a href="{{ URL::asset('#!') }}" class="btn btn-primary hover-lift btn-material">Get Pro</a>
                                </div>
                            </div>
                        </div>

                        <!--Pricing col-->
                        <div class="col-lg-4">
                            <!--Pricing Card-->
                            <div class="card py-5 border-0 card-body">
                                <div class="rounded-top mb-4 position-relative overflow-hidden text-center">
                                    <h5 class="title mb-4">High</h5>
                                    <div>
                                        <h2 class="display-4 mb-4 lh-1"><sub class="small">$</sub>69</h2>
                                        <h6 class="mb-0 small text-body-secondary">Monthly</h6>
                                    </div>
                                    <!--/.price-->
                                </div>
                                <!--/.price-card-header-->
                                <ul class="text-center list-unstyled mb-4">
                                    <li class="mb-3">Free domain</li>
                                    <li class="mb-3">2 Sub domains</li>
                                    <li class="mb-3">2 GB storage</li>
                                    <li class="mb-3">Unmetered bandwith</li>
                                    <li class="mb-3">Website builder</li>
                                    <li class="mb-2 ">On-site support</li>
                                    <li class="mb-3">Premium support</li>
                                </ul>
                                <div class="text-center">
                                    <a href="{{ URL::asset('#!') }}" class="btn btn-outline-primary hover-lift btn-material">Get High</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/.container-->
            </section>

            <section class="position-relative border-top">
                <div class="container pt-9 pt-lg-11">

                    <!--Code snippet modal-->
                    <x-partials/snippets/components/pricing-tables/pricing-tables-2 />
                </div>
                <!--Price Container-->
                <div class="container">
                    <!--Price Row-->
                    <div class="row grid-separator">

                        <!--Price col-->
                        <div class="col-lg-4 py-9 py-lg-11 px-4 px-xl-5">
                            <!--Price card-->
                            <div class="card bg-transparent border-0 h-100">
                                <!--Title-->
                                <h5 class="mb-4">Personal plan</h5>
                                <div class="mb-4">
                                    <h2 class="display-3 mb-0"><sup
                                            class="fs-6 align-top text-body-secondary lh-1 fw-normal">$</sup><span
                                            class="price">0</span><sub
                                            class="fs-6 text-body-secondary lh-1 fw-normal align-bottom"> / Monthly</sub></h2>
                                </div>
                                <!--Description-->
                                <p class="mb-4">
                                    Lorem ipsum dolor sit amet, dolore magna aliqua. Duis aute irure dolor in voluptate
                                    velit esse cillum dolore eu fugiat nulla pariatur.
                                </p>

                                <!--Features-->
                                <h6 class="mb-3">Included</h6>
                                <ul class="list-unstyled mb-0 flex-grow-1">
                                    <li class="d-flex align-items-center mb-1">
                                        <i class="me-2 fs-4 bx bx-check lh-sm text-body-secondary"></i>
                                        <span>20GB Space</span>
                                    </li>
                                    <li class="d-flex align-items-center mb-1">
                                        <i class="me-2 fs-4 bx bx-check lh-sm text-body-secondary"></i>
                                        <span>1 user</span>
                                    </li>
                                    <li class="d-flex align-items-center mb-1">
                                        <i class="me-2 fs-4 bx bx-check lh-sm text-body-secondary"></i>
                                        <span>25K files upload</span>
                                    </li>
                                    <li class="d-flex align-items-center mb-1">
                                        <i class="me-2 fs-4 bx bx-check lh-sm text-body-secondary"></i>
                                        <span>3 Months support</span>
                                    </li>
                                    <li class="d-flex align-items-center">
                                        <i class="me-2 fs-4 bx bx-check lh-sm text-body-secondary"></i>
                                        <span>Basic tools</span>
                                    </li>
                                </ul>
                                <!--Action-->
                                <div class="pt-4 d-grid">
                                    <a href="{{ URL::asset('#!') }}" class="btn btn-outline-primary btn-lg">
                                        Sign up now
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!--Price col-->
                        <div class="col-lg-4 py-9 py-lg-11 px-4 px-xl-5">
                            <!--Price card-->
                            <div class="card bg-transparent border-0 h-100">
                                <!--Badge-->
                                <div class="mb-3">
                                    <span class="badge badge-pill bg-success px-3">Best value</span>
                                </div>

                                <!--Title-->
                                <h5 class="mb-4">Team plan</h5>
                                <div class="mb-4">
                                    <h2 class="display-3 mb-0"><sup
                                            class="fs-6 align-top text-body-secondary lh-1 fw-normal">$</sup><span
                                            class="price">29</span><sub
                                            class="fs-6 text-body-secondary lh-1 fw-normal align-bottom"> / Monthly</sub></h2>
                                </div>

                                <!--Description-->
                                <p class="mb-4">
                                    Lorem ipsum dolor sit amet, dolore magna aliqua. Duis aute irure dolor in voluptate
                                    velit esse cillum dolore eu fugiat nulla pariatur.
                                </p>

                                <!--Features-->
                                <h6 class="mb-3">Included</h6>
                                <ul class="list-unstyled mb-0 flex-grow-1">
                                    <li class="d-flex align-items-center mb-1">
                                        <i class="me-2 fs-4 bx bx-check lh-sm text-body-secondary"></i>
                                        <span>100GB Space</span>
                                    </li>
                                    <li class="d-flex align-items-center mb-1">
                                        <i class="me-2 fs-4 bx bx-check lh-sm text-body-secondary"></i>
                                        <span>Up to 5 users</span>
                                    </li>
                                    <li class="d-flex align-items-center mb-1">
                                        <i class="me-2 fs-4 bx bx-check lh-sm text-body-secondary"></i>
                                        <span>100K files upload</span>
                                    </li>
                                    <li class="d-flex align-items-center mb-1">
                                        <i class="me-2 fs-4 bx bx-check lh-sm text-body-secondary"></i>
                                        <span>12 Months support</span>
                                    </li>
                                    <li class="d-flex align-items-center">
                                        <i class="me-2 fs-4 bx bx-check lh-sm text-body-secondary"></i>
                                        <span>Basic tools</span>
                                    </li>
                                </ul>

                                <!--Action-->
                                <div class="pt-4 d-grid">
                                    <a href="{{ URL::asset('#!') }}" class="btn btn-lg btn-primary">
                                        Sign up now
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!--Price col-->
                        <div class="col-lg-4 py-9 py-lg-11 px-4 px-xl-5">

                            <!--Price card-->
                            <div class="card bg-transparent border-0 h-100">

                                <!--Title-->
                                <h5 class="mb-4">Business plan</h5>
                                <div class="mb-4">
                                    <h2 class="display-3 mb-0"><sup
                                            class="fs-6 align-top text-body-secondary lh-1 fw-normal">$</sup><span
                                            class="price">49</span><sub
                                            class="fs-6 text-body-secondary lh-1 fw-normal align-bottom"> / Monthly</sub></h2>
                                </div>

                                <!--Description-->
                                <p class="mb-4">
                                    Lorem ipsum dolor sit amet, dolore magna aliqua. Duis aute irure dolor in voluptate
                                    velit esse cillum dolore eu fugiat nulla pariatur.
                                </p>

                                <!--Features-->
                                <h6 class="mb-3">Included</h6>
                                <ul class="list-unstyled mb-0 flex-grow-1">
                                    <li class="d-flex align-items-center mb-1">
                                        <i class="me-2 fs-4 bx bx-check lh-sm text-body-secondary"></i>
                                        <span>20GB Space</span>
                                    </li>
                                    <li class="d-flex align-items-center mb-1">
                                        <i class="me-2 fs-4 bx bx-check lh-sm text-body-secondary"></i>
                                        <span>1 user at a time</span>
                                    </li>
                                    <li class="d-flex align-items-center mb-1">
                                        <i class="me-2 fs-4 bx bx-check lh-sm text-body-secondary"></i>
                                        <span>25K files upload</span>
                                    </li>
                                    <li class="d-flex align-items-center mb-1">
                                        <i class="me-2 fs-4 bx bx-check lh-sm text-body-secondary"></i>
                                        <span>3 Months support</span>
                                    </li>
                                    <li class="d-flex align-items-center">
                                        <i class="me-2 fs-4 bx bx-check lh-sm text-body-secondary"></i>
                                        <span>Basic tools</span>
                                    </li>
                                </ul>

                                <!--Action-->
                                <div class="pt-4 d-grid">
                                    <a href="{{ URL::asset('#!') }}" class="btn btn-lg btn-outline-primary">
                                        Sign up now
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--End price container-->
            </section>
            <section class="position-relative border-top">
                <div class="container pt-9 pt-lg-11 position-relative">
                    <div class="row mb-4 justify-content-center text-center">
                        <div class="col-xl-9">
                            <h2 class="mb-4">Plan switcher</h2>
                                 <!--Code snippet modal-->
<x-partials/snippets/components/pricing-tables/pricing-tables-3 />
                        </div>
                    </div>
                </div>
                <!--Pricing tables container-->
                <div class="container position-relative pb-9 pb-lg-11">
                    <!-- Plans--Switch -->
                    <div class="d-flex align-items-center justify-content-center mb-7 mb-lg-7">
                        <div class="price-monthly fs-5 position-relative">
                            <strong>Annually</strong>
                        </div>
                        <!-- Switch -->
                        <div class="form-check form-pricing-switch form-switch mx-3">
                            <input class="form-check-input me-0" type="checkbox" id="planSwitch" data-as-toggle="price"
                                data-as-target=".price">
                            <label class="form-check-label" for="planSwitch"></label>
                        </div>
                        <div class="price-monthly fs-5">
                            <strong> Monthly </strong>
                        </div>
                    </div>

                    <!-- Plans--row -->
                    <div class="position-relative">
                        <div class="row g-md-2 justify-content-center position-relative z-1">
                            <div class="col-md-4 mb-5 mb-md-0" data-aos="fade-up">
                                <div
                                    class="card shadow card-body py-5 px-4 z-1 rounded-3 rounded-3 d-flex flex-column overflow-hidden h-100">
                                    <div class="position-relative overflow-hidden">
                                        <!--Title-->
                                        <h4>Basic</h4>
                                        <!--Price-->
                                        <div class="d-flex align-items-end mb-4">
                                            <sup class="d-inline-block">$</sup>
                                            <h2 class="price display-4" data-as-annual="6"
                                                data-as-monthly="9">6
                                            </h2>
                                        </div>
                                        <span class="badge bg-body-tertiary text-body-secondary rounded-pill">Monthly</span>
                                    </div>
                                    <!--Features list-->
                                    <ul class="list-unstyled py-4 flex-grow-1">
                                        <li class="py-3 border-bottom"><i
                                                class="bx bx-check-circle fs-5 lh-1 me-2 text-success align-middle"></i>Free
                                            domain</li>
                                        <li class="py-3 border-bottom"><i
                                                class="bx bx-check-circle fs-5 lh-1 me-2 text-success align-middle"></i>1
                                            Email account</li>
                                        <li class="py-3 border-bottom"><i
                                                class="bx bx-check-circle fs-5 lh-1 me-2 text-success align-middle"></i>15
                                            GB storage</li>
                                        <li class="py-3 pb-0"><i
                                                class="bx bx-check-circle fs-5 lh-1 me-2 text-success align-middle"></i>50K
                                            files</li>
                                    </ul>
                                    <!--Plan action-->
                                    <div class="d-grid">
                                        <a href="{{ URL::asset('#!') }}"
                                            class="btn btn-secondary btn-hover-arrow rounded-pill hover-lift">
                                            <span>Get started</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <!--/.End-col-->
                            <div class="col-md-4 mb-5 mb-md-0" data-aos="fade-up" data-aos-delay="100">
                                <div
                                    class="card shadow-lg z-1 card-body py-5 px-4 rounded-3 border-primary d-flex flex-column overflow-hidden h-100">
                                    <div>
                                        <span class="badge rounded-pill bg-primary mb-3">
                                            Most popular</span>
                                    </div>
                                    <div class="position-relative overflow-hidden">
                                        <!--Title-->
                                        <h4>Freelancer</h4>
                                        <!--Price-->
                                        <div class="d-flex align-items-end mb-4">
                                            <sup class="d-inline-block">$</sup>
                                            <h2 class="price display-4" data-as-annual="16" data-as-monthly="29">16
                                            </h2>
                                        </div>
                                        <span class="badge bg-body-tertiary text-body-secondary rounded-pill">Monthly</span>
                                    </div>
                                    <!--Features list-->
                                    <ul class="list-unstyled py-4 flex-grow-1">
                                        <li class="py-3 border-bottom"><i
                                                class="bx bx-check-circle fs-5 lh-1 me-2 text-success align-middle"></i>Free
                                            domain</li>
                                        <li class="py-3 border-bottom"><i
                                                class="bx bx-check-circle fs-5 lh-1 me-2 text-success align-middle"></i>2
                                            email accounts</li>
                                        <li class="py-3 border-bottom"><i
                                                class="bx bx-check-circle fs-5 lh-1 me-2 text-success align-middle"></i>25
                                            GB storage</li>
                                        <li class="py-3 pb-0"><i
                                                class="bx bx-check-circle fs-5 lh-1 me-2 text-success align-middle"></i>100K
                                            files</li>
                                    </ul>
                                    <!--Plan action-->
                                    <div class="d-grid">
                                        <a href="{{ URL::asset('#!') }}" class="btn btn-primary btn-hover-arrow rounded-pill hover-lift">
                                            <span>Get started</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <!--/.End-col-->
                            <div class="col-md-4" data-aos="fade-up" data-aos-delay="150">
                                <div class="card shadow card-body py-5 px-4 rounded-3 overflow-hidden h-100">
                                    <div class="position-relative overflow-hidden">
                                        <!--Title-->
                                        <h4>Team</h4>
                                        <!--Price-->
                                        <div class="d-flex align-items-end mb-4">
                                            <sup class="d-inline-block">$</sup>
                                            <h2 class="price display-4" data-as-annual="49"
                                                data-as-monthly="79">49
                                            </h2>
                                        </div>
                                        <span class="badge text-body-secondary rounded-pill bg-body-tertiary">Monthly</span>
                                    </div>
                                    <!--Features list-->
                                    <ul class="w-100 list-unstyled py-4 flex-grow-1">
                                        <li class="py-3 border-bottom"><i
                                                class="bx bx-check-circle fs-5 lh-1 me-2 text-success align-middle"></i>Free
                                            domain</li>
                                        <li class="py-3 border-bottom"><i
                                                class="bx bx-check-circle fs-5 lh-1 me-2 text-success align-middle"></i>5
                                            Sub domains</li>
                                        <li class="py-3 border-bottom"><i
                                                class="bx bx-check-circle fs-5 lh-1 me-2 text-success align-middle"></i>Unlimited
                                            storage</li>
                                        <li class="py-3 border-bottom"><i
                                                class="bx bx-check-circle fs-5 lh-1 me-2 text-success align-middle"></i>Unlimited
                                            files</li>
                                        <li class="py-3 pb-0"><i
                                                class="bx bx-check-circle fs-5 lh-1 me-2 text-success align-middle"></i>Premium
                                            support</li>
                                    </ul>
                                    <!--Plan action-->
                                    <div class="d-grid">
                                        <a href="{{ URL::asset('#!') }}"
                                            class="btn btn-secondary btn-hover-arrow rounded-pill hover-lift">
                                            <span>Get started</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <!--/.End-col-->
                        </div>
                        <!--/.End row-->
                    </div>
                </div>
                <!--/.End container-->
            </section>
            <section class="position-relative border-top">
                <div class="container pt-9 pt-lg-11">

                    <!--Code snippet modal-->
<x-partials/snippets/components/pricing-tables/pricing-tables-4 />
                </div>
                <!--Plans container-->
                <div class="container pt-5 pb-9 pb-lg-11">
                    <!--Plan row-->
                    <div class="row g-lg-2">

                        <!--Plan col-->
                        <div class="col-lg-4 mb-4 mb-lg-0">
                            <!--Plan Card-->
                            <div class="card border-0 shadow">
                                <div class="card-body px-4 py-5">
                                    <h3 class="plan-title mb-4">Basic</h3>
                                    <p class="plan-info">
                                        Lorem ipsum is placeholder text commonly used in the graphic, print, and
                                        publishing industries
                                    </p>
                                    <div class="plan-price mb-4">
                                        <span class="small">$</span>
                                        <h2 class="display-2 mb-0">5</h2>
                                        <span class="small text-body-secondary">Monthly</span>
                                    </div>
                                    <div class="plan-details text-body-secondary small mb-4">
                                        <span>Billed</span>
                                        <span class="plan-type">Annually</span>
                                        <a tabindex="0" role="button" data-bs-trigger="focus" data-bs-toggle="popover"
                                            data-bs-content="And here's some amazing content. It's very engaging. Right?">
                                            <i class="bx bx-info-circle"></i>
                                        </a>
                                    </div>
                                    <!--Plan action-->
                                    <div class="d-grid mb-4 small">
                                        <a href="{{ URL::asset('#') }}" class="btn btn-secondary mb-2">Sign Up Now</a>
                                        <span>
                                            Or
                                            <a href="{{ URL::asset('#!') }}" class="fw-medium link-decoration">Contact
                                                Sales for custom plan</a>
                                        </span>
                                    </div>
                                    <!--Plan features list-->
                                    <div>
                                        <p class="text-body-secondary mb-3">Top features:</p>
                                        <ul class="list-unstyled mb-0">
                                            <li class="mb-3">
                                                <i
                                                    class="bx bx-check-circle lh-1 fs-5 align-middle me-2 text-body-secondary"></i>
                                                Dashboards
                                                & Reporting
                                            </li>
                                            <li class="mb-3">
                                                <i
                                                    class="bx bx-check-circle lh-1 fs-5 align-middle me-2 text-body-secondary"></i>
                                                Integrations & API
                                            </li>
                                            <li class="mb-3">
                                                <i
                                                    class="bx bx-check-circle lh-1 fs-5 align-middle me-2 text-body-secondary"></i>
                                                Inspections & Issues
                                            </li>
                                            <li class="mb-3"><i
                                                    class="bx bx-check-circle lh-1 fs-5 align-middle me-2 text-body-secondary"></i>
                                                Publishing industries
                                            </li>
                                            <li class="mb-3"><i
                                                    class="bx bx-check-circle lh-1 fs-5 align-middle me-2 text-body-secondary"></i>
                                                Single user access
                                            </li>
                                            <li class="mb-3">
                                                <i
                                                    class="bx bx-check-circle lh-1 fs-5 align-middle me-2 text-body-secondary"></i>
                                                6 Months premium support
                                            </li>
                                            <li class="mb-0">
                                                <i
                                                    class="bx bx-check-circle lh-1 fs-5 align-middle me-2 text-body-secondary"></i>
                                                Text commonly used
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--Plan col-->
                        <div class="col-lg-4 mb-4 mb-lg-0">
                            <!--Plan Card-->
                            <div class="card border-0 shadow-lg z-1">
                                <div class="card-body px-4 py-5">
                                    <div class="d-flex mb-4 align-items-center">
                                        <h3 class="plan-title mb-0 me-3">Pro</h3>
                                        <span class="badge bg-success">Popular</span>
                                    </div>
                                    <p class="plan-info">
                                        Lorem ipsum is placeholder text commonly used in the graphic, print, and
                                        publishing industries
                                    </p>
                                    <div class="plan-price mb-4">
                                        <span class="small">$</span>
                                        <h2 class="display-2 mb-0">19</h2>
                                        <span class="small text-body-secondary">Monthly</span>
                                    </div>
                                    <div class="plan-details text-body-secondary small mb-4">
                                        <span>Billed</span>
                                        <span class="plan-type">Annually</span>
                                        <a tabindex="0" role="button" data-bs-trigger="focus" data-bs-toggle="popover"
                                            data-bs-content="And here's some amazing content. It's very engaging. Right?">
                                           <i class="bx bx-info-circle"></i>
                                        </a>
                                    </div>
                                    <!--Plan action-->
                                    <div class="d-grid mb-4 small">
                                        <a href="{{ URL::asset('#') }}" class="btn btn-primary mb-2">Sign Up Now</a>
                                        <span>
                                            Or
                                            <a href="{{ URL::asset('#!') }}" class="fw-medium link-decoration">
                                                Contact Sales for custom plan</a></span>
                                    </div>
                                    <!--Plan features list-->
                                    <div>
                                        <p class="text-body-secondary mb-3">Top features:</p>
                                        <ul class="list-unstyled mb-0">
                                            <li class="mb-3">
                                                <i
                                                    class="bx bx-check-circle lh-1 fs-5 align-middle me-2 text-body-secondary"></i>
                                                Dashboards & reporting
                                            </li>
                                            <li class="mb-3">
                                                <i
                                                    class="bx bx-check-circle lh-1 fs-5 align-middle me-2 text-body-secondary"></i>
                                                Integrations & API
                                            </li>
                                            <li class="mb-3">
                                                <i
                                                    class="bx bx-check-circle lh-1 fs-5 align-middle me-2 text-body-secondary"></i>
                                                Inspections & Issues
                                            </li>
                                            <li class="mb-3">
                                                <i
                                                    class="bx bx-check-circle lh-1 fs-5 align-middle me-2 text-body-secondary"></i>
                                                publishing industries
                                            </li>
                                            <li class="mb-3">
                                                <i
                                                    class="bx bx-check-circle lh-1 fs-5 align-middle me-2 text-body-secondary"></i>
                                                Single user access
                                            </li>
                                            <li class="mb-3">
                                                <i
                                                    class="bx bx-check-circle lh-1 fs-5 align-middle me-2 text-body-secondary"></i>
                                                6 Months premium support
                                            </li>
                                            <li class="mb-0">
                                                <i
                                                    class="bx bx-check-circle lh-1 fs-5 align-middle me-2 text-body-secondary"></i>
                                                Text commonly used
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--Plan col-->
                        <div class="col-lg-4">
                            <!--Plan Card-->
                            <div class="card border-0 shadow">
                                <div class="card-body px-4 py-5">
                                    <h3 class="plan-title mb-4">Team</h3>
                                    <p class="plan-info">
                                        Lorem ipsum is placeholder text commonly used in the graphic, print, and
                                        publishing industries
                                    </p>
                                    <div class="plan-price mb-4">
                                        <span class="small">$</span>
                                        <h2 class="display-2 mb-0">49</h2>
                                        <span class="small text-body-secondary">Monthly</span>
                                    </div>
                                    <div class="plan-details text-body-secondary small mb-4">
                                        <span>Billed</span>
                                        <span class="plan-type">Annually</span>
                                        <a tabindex="0" role="button" data-bs-trigger="focus" data-bs-toggle="popover"
                                            data-bs-content="And here's some amazing content. It's very engaging. Right?">
                                            <i class="bx bx-info-circle"></i>
                                        </a>
                                    </div>
                                    <!--Plan action-->
                                    <div class="d-grid mb-4 small">
                                        <a href="{{ URL::asset('#') }}" class="btn btn-secondary mb-2">Sign Up Now</a>
                                        <span>
                                            Or
                                            <a href="{{ URL::asset('#!') }}" class="fw-medium link-decoration">
                                                Contact Sales for custom plan</a>
                                        </span>
                                    </div>
                                    <!--Plan features list-->
                                    <div>
                                        <p class="text-body-secondary mb-3">Top features:</p>
                                        <ul class="list-unstyled mb-0">
                                            <li class="mb-3">
                                                <i
                                                    class="bx bx-check-circle lh-1 fs-5 align-middle me-2 text-body-secondary"></i>
                                                Dashboards & Reporting
                                            </li>
                                            <li class="mb-3">
                                                <i
                                                    class="bx bx-check-circle lh-1 fs-5 align-middle me-2 text-body-secondary"></i>
                                                Integrations & API</li>
                                            <li class="mb-3">
                                                <i
                                                    class="bx bx-check-circle lh-1 fs-5 align-middle me-2 text-body-secondary"></i>
                                                Inspections & Issues</li>
                                            <li class="mb-3">
                                                <i
                                                    class="bx bx-check-circle lh-1 fs-5 align-middle me-2 text-body-secondary"></i>
                                                publishing industries</li>
                                            <li class="mb-3">
                                                <i
                                                    class="bx bx-check-circle lh-1 fs-5 align-middle me-2 text-body-secondary"></i>
                                                Single user access</li>
                                            <li class="mb-3">
                                                <i
                                                    class="bx bx-check-circle lh-1 fs-5 align-middle me-2 text-body-secondary"></i>
                                                6 Months premium support</li>
                                            <li class="mb-0">
                                                <i
                                                    class="bx bx-check-circle lh-1 fs-5 align-middle me-2 text-body-secondary"></i>
                                                Text commonly used</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/.End Plans row-->
                </div>
                <!--/.End Plans container-->
            </section>
            <section class="position-relative">

                <div class="container py-9 py-lg-11">
                    <div class="row mb-4 justify-content-center text-center">
                        <div class="col-xl-9">
                            <h2 class="mb-4">Plans comparison</h2>
                            <!--Code snippet modal-->
<x-partials/snippets/components/pricing-tables/pricing-tables-5 />
                        </div>
                    </div>
                    <!--/.row-->

                    <!--Start Price tables comparision-->
                    <div class="table-responsive">
                        <!--Price tables comparision-->
                        <table class="table table-bordered">
                            <!--Table header-->
                            <thead>
                                <tr>
                                    <th scope="col" style="min-width: 290px;">
                                        <h6 class="mb-0">Features:</h6>
                                    </th>
                                    <th scope="col" class="bg-body-secondary">
                                        <h5 class="title">Basic</h5>
                                        <div class="d-flex pt-md-2">
                                            <span class="h6">$</span>
                                            <h2 class="display-5 mb-2" data-aos data-aos-id="countup:in" data-to="6">
                                                6.00</h2>
                                        </div>
                                        <span class="small d-block h6 mb-2 text-body-secondary">Monthly</span>
                                    </th>
                                    <th scope="col" class="bg-body-secondary">
                                        <div class="mb-3">
                                            <span class="badge badge-pill bg-warning">Best value</span>
                                        </div>
                                        <h5 class="mb-2">Pro</h5>
                                        <div class="d-flex pt-md-2">
                                            <span class="h6 text-primary">$</span>
                                            <h2 class="display-5 mb-2 text-primary" data-aos data-aos-id="countup:in"
                                                data-to="29">29</h2>
                                        </div>
                                        <span class="small d-block h6 mb-2 text-body-secondary">Monthly</span>
                                    </th>
                                    <th scope="col" class="bg-body-secondary">
                                        <h5 class="title">High</h5>
                                        <div class="d-flex pt-md-2">
                                            <span class="h6">$</span>
                                            <h2 class="display-5 mb-2" data-aos data-aos-id="countup:in" data-to="49">49
                                            </h2>
                                        </div>
                                        <span class="small d-block h6 mb-2 text-body-secondary">Monthly</span>
                                    </th>
                                </tr>
                            </thead>
                            <!--Table body-->
                            <tbody>
                                <tr>
                                    <th scope="row">
                                        <div class="d-flex justify-content-between flex-nowrap">
                                            <small class="mb-0 d-block text-body-secondary">Storage</small>
                                            <span class="h6 mb-0">Per domain</span>
                                        </div>
                                    </th>
                                    <td>
                                        <span>5GB</span>
                                    </td>
                                    <td>
                                        <span>25GB</span>
                                    </td>
                                    <td>
                                        <span>Unlimited</span>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        <div class="d-flex justify-content-between flex-nowrap">
                                            <small class="mb-0 d-block text-body-secondary">Downloads</small>
                                            <span class="h6 mb-0">Per day</span>
                                        </div>
                                    </th>
                                    <td>
                                        <span>100</span>
                                    </td>
                                    <td>
                                        <span>1000</span>
                                    </td>
                                    <td>
                                        <span>Unlimited</span>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        <div class="d-flex justify-content-between flex-nowrap">
                                            <small class="mb-0 d-block text-body-secondary">Email Accounts</small>
                                            <span class="h6 mb-0">Per user</span>
                                        </div>
                                    </th>
                                    <td>
                                        <span>5</span>
                                    </td>
                                    <td>
                                        <span>100</span>
                                    </td>
                                    <td>
                                        <span>Unlimited</span>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        <div class="d-flex justify-content-between flex-nowrap">
                                            <small class="mb-0 d-block text-body-secondary">Support</small>
                                            <span class="h6 mb-0">6 months</span>
                                        </div>
                                    </th>
                                    <td>
                                        <div class="text-success">
                                            <i class="bx bx-check lh-1 fs-4"></i>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-success">
                                            <i class="bi-check lh-1 fs-4"></i>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-success">
                                            <i class="bx bx-check lh-1 fs-4"></i>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        <div class="d-flex justify-content-between flex-nowrap">
                                            <small class="mb-0 d-block text-body-secondary">Item Updates</small>
                                            <span class="h6 mb-0">Lifetime free</span>
                                        </div>
                                    </th>
                                    <td>
                                        <div class="text-danger">
                                            <i class="bx bx-x lh-1 fs-4"></i>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-success">
                                            <i class="bx bx-check lh-1 fs-4"></i>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-success">
                                            <i class="bx bx-check lh-1 fs-4"></i>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        <div class="d-flex align-items-lg-center justify-content-between flex-nowrap">
                                            <small class="mb-0 d-block text-body-secondary">Customization</small>
                                            <span class="h6 mb-0">Extra Charges
                                                <a href="{{ URL::asset('#!') }}" class="ms-1 fs-6 d-inline-block" data-bs-toggle="popover"
                                                    data-bs-content="Customisation charges apply">
                                                    <i class="bx bx-exclamation-circle align-middle"></i></a></span>
                                        </div>
                                    </th>
                                    <td>
                                        <div class="text-danger">
                                            <i class="bx bx-x lh-1 fs-4"></i>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-danger">
                                            <i class="bx bx-x lh-1 fs-4"></i>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-success">
                                            <i class="bx bx-check lh-1 fs-4"></i>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="bg-body-tertiary">
                                    <th scope="row" class="py-4"></th>
                                    <td class="py-4">
                                        <a href="{{ URL::asset('#!') }}"
                                            class="btn btn-secondary btn-block btn-material hover-translate-3d">Purchase
                                            Basic</a>
                                    </td>
                                    <td class="py-4">
                                        <a href="{{ URL::asset('#!') }}"
                                            class="btn btn-primary btn-block btn-material hover-translate-3d">Purchase
                                            Pro</a>
                                    </td>
                                    <td class="py-4">
                                        <a href="{{ URL::asset('#!') }}"
                                            class="btn btn-secondary btn-block btn-material hover-translate-3d">Purchase
                                            High</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!--End price tables comparision-->
                </div>
                <!--/.container-->
            </section>
            <section class="bg-success-subtle position-relative">
                <svg class="position-absolute top-0 start-0 text-success w-50 h-auto w-lg-75" width="136" height="76"
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
