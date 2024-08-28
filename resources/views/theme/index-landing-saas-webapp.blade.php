<x-assan-layout layout-type="{{$layoutType}}">
      <section class="position-relative overflow-hidden">
        <svg class="position-absolute end-0 top-0 w-75 w-lg-50 h-auto text-success flip-x" width="579"
          height="470" viewBox="0 0 579 470" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd" clip-rule="evenodd"
            d="M226.38 -263.323C152.033 -261.951 103.192 -195.702 42.3606 -152.936C-41.934 -93.6747 -180.241 -71.8579 -191.636 30.5511C-203.004 132.721 -74.4321 185.509 -3.58568 259.998C70.4044 337.793 118.091 462.233 225.248 468.871C334.039 475.609 415.89 375.199 484.136 290.208C543.669 216.068 590.165 125.799 576.255 31.7386C563.644 -53.5409 483.478 -104.287 417.577 -159.864C359.99 -208.429 301.699 -264.714 226.38 -263.323Z"
            fill="currentColor" opacity=".5"/>
        </svg>

        <div class="container-fluid px-xl-9 position-relative pt-lg-14 pt-11 pb-12 z-1">
          <div class="row align-items-center">
            <div class="col-lg-5 me-xl-auto z-1">
              <h1 class="display-5 me-lg-n9 position-relative mb-4 mb-lg-5">
                Automate your business with
                <span class="position-relative d-inline-block">Assan
                  <svg class="position-absolute start-0 bottom-0 text-warning z-n1" preserveAspectRatio="none"
                    width="100%" height="6" viewBox="0 0 63 4" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M0.119995 2.79013C0.119995 2.79013 26.91 -0.589865 62.82 1.93013" stroke="currentColor"
                      stroke-width="2" />
                  </svg>
                </span>
              </h1>
              <p class="position-relative lead mb-5">
                Incididunt ut lorem ipsum dolor sit amet sed do eiusmod tempor
                labore et dolore.
              </p>
              <form class="mb-3 needs-validation" novalidate>
                <div
                  class="d-sm-flex align-items-sm-center justify-content-start shadow-lg px-2 py-3 py-sm-2 bg-white rounded-2" data-bs-theme="light">
                  <input type="email" placeholder="Your work email"
                    class="form-control rounded-2 flex-grow-1 border-0 shadow-none bg-white text-dark" required />
                  <span
                    class="invalid-feedback text-start text-sm-end me-sm-3 ms-3 ms-sm-0 flex-grow-0 w-auto text-nowrap">Invalid
                    Email</span>
                  <div class="d-grid d-sm-block pt-3 pt-sm-0 flex-shrink-0">
                    <button class="btn btn-primary rounded-2" type="submit">
                      <span>Get started</span>
                    </button>
                  </div>
                </div>
              </form>
              <small class="d-block text-body-tertiary mb-lg-0 mb-6">No CC required. Cancel anytime</small>
            </div>
            <div class="col-lg-7 col-xl-6">
              <div class="position-relative">
                <!--Hero image-->
                <img src="{{ URL::asset('assets/img/graphics/saas/hero.png') }}" alt=""
                  class="w-100 rounded-3 shadow-lg img-fluid position-relative" />
              </div>
            </div>
          </div>
          <!--/.row-->
        </div>
        <!--/.content-->


        <!--Divider shape-->
        <svg class="w-100 position-absolute start-0 bottom-0 z-1" height="48" fill="currentColor"
          preserveAspectRatio="none" viewBox="0 0 1200 120" xmlns="http://www.w3.org/2000/svg"
          style="transform: rotate(180deg) scaleX(-1);color: var(--bs-tertiary-bg);">
          <path d="M0 0v46.29c47.79 22.2 103.59 32.17 158 28 70.36-5.37 136.33-33.31 206.8-37.5 73.84-4.36 147.54
     16.88 218.2 35.26 69.27 18 138.3 24.88 209.4
     13.08 36.15-6 69.85-17.84 104.45-29.34C989.49 25 1113-14.29 1200 52.47V0z" opacity=".25" />
          <path d="M0 0v15.81c13 21.11 27.64 41.05 47.69 56.24C99.41 111.27 165 111 224.58 91.58c31.15-10.15
      60.09-26.07 89.67-39.8 40.92-19 84.73-46 130.83-49.67 36.26-2.85 70.9 9.42 98.6 31.56 31.77 25.39
      62.32 62 103.63 73 40.44 10.79 81.35-6.69 119.13-24.28s75.16-39 116.92-43.05c59.73-5.85 
      113.28 22.88 168.9 38.84 30.2 8.66 59 6.17 87.09-7.5 22.43-10.89 48-26.93 60.65-49.24V0z" opacity=".5" />
          <path d="M0 0v5.63C149.93 59 314.09 71.32 475.83 42.57c43-7.64 84.23-20.12 127.61-26.46 59-8.63
    112.48 12.24 165.56 35.4C827.93 77.22 886 95.24 951.2 90c86.53-7 172.46-45.71 248.8-84.81V0z" />
        </svg>
      </section>
      <!--/section-->

      <section class="overflow-hidden bg-body-tertiary">
        <div class="container-fluid px-xl-9 py-9">
          <p class="text-center text-body-secondary mb-7 d-block">
            Used by developers around the world
          </p>
          <div class="swiper-container overflow-hidden swiper-partners-5">
            <div class="swiper-wrapper">
              <div class="swiper-slide d-flex justify-content-center align-items-center">
                <img class="img-fluid img-invert" src="{{ URL::asset('assets/img/partners/grab.svg') }}" alt="" />
              </div>
              <div class="swiper-slide d-flex justify-content-center align-items-center">
                <img class="img-fluid img-invert" src="{{ URL::asset('assets/img/partners/expedia.svg') }}" alt="" />
              </div>
              <div class="swiper-slide d-flex justify-content-center align-items-center">
                <img class="img-fluid img-invert" src="{{ URL::asset('assets/img/partners/lyft.svg') }}" alt="" />
              </div>
              <div class="swiper-slide d-flex justify-content-center align-items-center">
                <img class="img-fluid img-invert" src="{{ URL::asset('assets/img/partners/microsoft.svg') }}" alt="" />
              </div>
              <div class="swiper-slide d-flex justify-content-center align-items-center">
                <img class="img-fluid img-invert" src="{{ URL::asset('assets/img/partners/nasdaq.svg') }}" alt="" />
              </div>
              <div class="swiper-slide d-flex justify-content-center align-items-center">
                <img class="img-fluid img-invert" src="{{ URL::asset('assets/img/partners/national-geographic.svg') }}" alt="" />
              </div>
              <div class="swiper-slide d-flex justify-content-center align-items-center">
                <img class="img-fluid img-invert" src="{{ URL::asset('assets/img/partners/postmates.svg') }}" alt="" />
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="position-relative overflow-hidden">

        <div class="container-fluid px-xl-9 position-relative py-9 py-lg-11 z-1">
         <div class="row">
          <div class="col-md-8 col-lg-6 mx-auto">
            <h2 class="text-center display-5 mb-7">Everything you need in one software</h2>
          </div>
         </div>
          <!--Tabs-->
          <div>
            <!--Tabs nav-->
            <div class="text-center w-lg-50 mx-auto">
              <nav class="nav nav-inline justify-content-center position-relative rounded-pill mb-7 mb-lg-9">
                <a href="{{ URL::asset('#feature_tab_1') }}" class="nav-link py-3 px-4 rounded-pill flex-shrink-0 active" data-bs-toggle="tab"
                  aria-expanded="true">
                  <h6 class="text-reset mb-0">Manage</h6>
                </a>
                <a href="{{ URL::asset('#feature_tab_2') }}" class="nav-link py-3 px-4 rounded-pill flex-shrink-0" data-bs-toggle="tab"
                  aria-expanded="false">
                  <h6 class="text-reset mb-0">Integrations</h6>
                </a>
                <a href="{{ URL::asset('#feature_tab_3') }}" class="nav-link py-3 px-4 rounded-pill flex-shrink-0" data-bs-toggle="tab"
                  aria-expanded="false">
                  <h6 class="text-reset mb-0">Support</h6>
                </a>
                <div class="indicator position-absolute bottom-0 h-100 rounded-3 z-n1 bg-body-secondary rounded-pill"></div>
              </nav>
            </div>

            <!--Tabs content-->
            <div class="tab-content">

              <!--Tab Pane(item)-->
              <div class="tab-pane show fade active" id="feature_tab_1">
                <div class="row align-items-center justify-content-between">
                  <div class="col-lg-6 mb-5 mb-lg-0 order-lg-last">
                    <div class="position-relative" data-aos="fade-right" data-aos-delay="100">
                      <!--Swiper-->
                      <div class="swiper-feature-img rounded-3 shadow-xl swiper-container overflow-hidden">
                        <div class="swiper-wrapper">

                          <!--Slide-->
                          <div class="swiper-slide">
                            <img class="img-fluid rounded-3" src="{{ URL::asset('assets/img/graphics/saas/hero.png') }}" alt="content" />
                          </div>
                          <!--Slide-->
                          <div class="swiper-slide">
                            <img class="img-fluid rounded-3" src="{{ URL::asset('assets/img/graphics/saas/hero.png') }}" alt="content" />
                          </div>
                          <!--Slide-->
                          <div class="swiper-slide">
                            <img class="img-fluid rounded-3" src="{{ URL::asset('assets/img/graphics/saas/hero.png') }}" alt="content" />
                          </div>
                          <!--Slide-->
                          <div class="swiper-slide">
                            <img class="img-fluid rounded-3" src="{{ URL::asset('assets/img/graphics/saas/hero.png') }}" alt="content" />
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-5 me-lg-auto" data-aos="fade-up" data-aos-delay="100">
                    <!--Subtitle-->
                    <p class="mb-4 badge bg-primary-subtle text-primary rounded-2 fs-6 px-3 py-2">Why Assan?</p>

                    <!--Title-->
                    <div class="mb-lg-4 display-6">
                      Easy to manage<br />
                      <div class="swiper-container swiper-text w-100 h-auto lh-base text-start overflow-hidden"
                        style="max-height:60px;min-height: 60px;">
                        <div class="swiper-wrapper">
                          <div class="swiper-slide text-primary">
                            Spreadsheets
                          </div>
                          <div class="swiper-slide text-primary">
                            Docs
                          </div>
                          <div class="swiper-slide text-primary">
                            Projects
                          </div>
                          <div class="swiper-slide text-primary">
                            Teams
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="d-flex align-items-center mb-4">
                      <div>
                        <p class="mb-0 lead">
                          Incididunt ut lorem ipsum dolor sit amet sed do
                          eiusmod tempor labore et dolore. Labore et dolore
                          magna aliqua lorem ipsum dolor sit amet.
                        </p>
                      </div>
                    </div>
                    <div class="position-relative">
                      <!--Action button-->
                      <a href="{{ URL::asset('#') }}" class="fw-bold link-underline text-dark pb-1">
                        <span>
                          Get started
                          <i class="bx bx-right-arrow-alt fs-5 align-middle ms-1"></i></span></a>
                    </div>
                  </div>
                </div>
              </div>

              <!--Tab Pane(item)-->
              <div class="tab-pane fade" id="feature_tab_2">
                <div class="row align-items-center">
                  <div class="col-lg-6 me-auto col-md-7 mb-5 mb-lg-0">
                    <!--Feature image-->
                    <div class="position-relative" data-aos="fade-right">
                      <img src="{{ URL::asset('assets/img/graphics/saas/integrations.svg') }}" class="img-fluid position-relative" alt="" />
                    </div>
                  </div>
                  <div class="col-lg-5 ms-auto">
                    <p class="mb-4 badge bg-primary-subtle text-primary rounded-2 fs-6 px-3 py-2">
                      <!--Countup text-->
                      <span data-countup='{"startVal": 0}' data-to="1000" data-aos=""
                        data-aos-id="countup:in"></span><span class=""> + Integrations</span>
                    </p>
                    <h2 class="mb-4 display-6">
                      Integrate with your favorite tools.
                    </h2>
                    <p class="mb-5 lead">
                      Lorem ipsum dolor sit amet sed tempor dolore magna aliqua nam
                      libero justo laoreet.
                    </p>

                    <!--Action button-->
                    <a href="{{ URL::asset('#') }}" class="fw-bold link-underline text-dark pb-1"><span>Explore all integrations
                        <i class="bx bx-right-arrow-alt fs-5 align-middle ms-1"></i></span></a>
                  </div>
                </div>
              </div>

              <!--Tab Pane(item)-->
              <div class="tab-pane fade" id="feature_tab_3">
                <div class="row align-items-center justify-content-between">
                  <div class="col-lg-6 ms-auto mb-5 mb-lg-0 order-lg-last">
                    <div class="position-relative rounded-3" data-aos="fade-right" data-aos-delay="100">
                      <img class="img-fluid rounded-3 shadow-xl" src="{{ URL::asset('assets/img/graphics/saas/hero.png') }}"
                        alt="content" />
                    </div>
                  </div>
                  <div class="col-lg-5 col-xl-4 me-auto" data-aos="fade-up" data-aos-delay="100">
                    <!--Subtitle-->
                    <p class="mb-4 badge bg-primary-subtle text-primary rounded-2 fs-6 px-3 py-2">Support</p>
                    <!--Title-->
                    <h2 class="mb-4 display-6 me-lg-n12">
                      Fast support for a seamless experience.
                    </h2>
                    <p class="mb-5 lead">
                      Ut enim ad minim veniam, quis nostrud ullamco
                      laboris nisi ut aliquip ex ea commodo consequat. Duis aute
                      irure dolor in reprehenderit.
                    </p>
                    <div class="position-relative">
                      <!--Action button-->
                      <a href="{{ URL::asset('#') }}" class="fw-bold link-underline text-dark pb-1">
                        <span>
                          Get started
                          <i class="bx bx-right-arrow-alt fs-5 align-middle ms-1"></i></span></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section class="position-relative overflow-hidden">
        <div class="container-fluid px-xl-9 position-relative py-9 py-lg-11">
          <div class="row align-items-center justify-content-between">
            <div class="col-md-5 col-xl-4 mb-7 mb-md-0" data-aos="fade-up" data-aos-delay="150">
              <div class="position-relative">
                <!--Pricing box-->
                <div
                  class="position-relative z-1 px-4 py-6 py-lg-7 shadow-lg rounded-5 mx-auto overflow-hidden">
                  <div class="position-relative">
                    <img src="{{ URL::asset('assets/img/graphics/illustration/05.svg') }}" class="width-18x h-auto d-block mb-4 mx-auto"
                      alt="">
                    <h2 class="mb-1 text-center">
                      <sub>$</sub>
                      <span class="display-4" data-countup='{"startVal": 0, "decimalPlaces": 2}' data-to="39.00"
                        data-aos="" data-aos-id="countup:in">0</span>
                    </h2>
                    <h6 class="mb-4 text-center text-body-secondary">Per Month</h6>
                    <div class="position-relative">
                      <!--Action button-->
                      <a href="{{ URL::asset('#') }}" class="w-100 btn btn-primary btn-lg btn-hover-arrow"><span>Sign up now</span></a>
                    </div>
                    <ul class="list-unstyled pt-5 mb-0">
                      <li class="mb-3">
                        <i class='bx bxs-check-circle fs-4 me-3 text-body-secondary'></i>Free domain
                      </li>
                      <li class="mb-3">
                        <i class='bx bxs-check-circle fs-4 me-3 text-body-secondary'></i>2 email
                        accounts
                      </li>
                      <li class="mb-3">
                        <i class='bx bxs-check-circle fs-4 me-3 text-body-secondary'></i>25 GB storage
                      </li>
                      <li class="mb-3">
                        <i class='bx bxs-check-circle fs-4 me-3 text-body-secondary'></i>25 GB storage
                      </li>
                      <li class="">
                        <i class='bx bxs-check-circle fs-4 me-3 text-body-secondary'></i>100K files
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>

            <!--Pricing features col-->
            <div class="col-md-7 ms-auto position-relative">
              <div class="row mb-7 mb-lg-9">
                <div class="col-12">
                  <p class="mb-4" data-aos="fade-up">
                    <span class="badge bg-primary-subtle text-primary rounded-2 fs-6 px-3 py-2"> Get started for
                      free, no CC
                      required.</span>
                  </p>
                  <h2 class="display-6 mb-2" data-aos="fade-up" data-aos-delay="100">
                    <span> Simple and fair </span> pricing
                  </h2>
                </div>
              </div>
              <div class="row mx-sm-0">
                <div class="col-sm-6 py-5 border-bottom border-end-sm pe-sm-4 pe-md-5" data-aos="fade-up" data-aos-delay="100">
                  <!--Feature icon-->
                  <div class="mb-3 width-6x height-6x rounded-circle flex-center bg-success-subtle text-success">
                    <i class="bx bx-book-content fs-3"></i>
                  </div>
                  <h5 class="mb-3">Countless features</h5>
                  <p class="mb-0">
                    Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                  </p>
                </div>
                <div class="col-sm-6 py-5 border-bottom ps-sm-4 ps-md-5" data-aos="fade-up" data-aos-delay="150">
                  <!--Feature icon-->
                  <div class="mb-3 width-6x height-6x rounded-circle flex-center bg-danger-subtle text-danger">
                    <i class="bx bx-devices fs-3"></i>
                  </div>
                  <h5 class="mb-3">Mobile first</h5>
                  <p class="mb-0">
                    Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                  </p>
                </div>
                <div class="col-sm-6 py-5 border-end-sm pe-sm-4 pe-md-5" data-aos="fade-up" data-aos-delay="200">
                  <!--Feature icon-->
                  <div class="mb-3 width-6x height-6x rounded-circle flex-center bg-primary-subtle text-primary">
                    <i class="bx bx-headphone fs-3"></i>
                  </div>
                  <h5 class="mb-3">Instant support</h5>
                  <p class="mb-0">
                    Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                  </p>
                </div>
                <div class="col-sm-6 pt-5 ps-sm-4 ps-md-5 border-top border-top-sm-0" data-aos="fade-up" data-aos-delay="250">
                  <!--Feature icon-->
                  <div class="mb-3 width-6x height-6x rounded-circle flex-center bg-warning-subtle text-warning">
                    <i class="bx bx-layer fs-3"></i>
                  </div>
                  <h5 class="mb-3">Multi layouts</h5>
                  <p class="mb-0">
                    Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section class="position-relative overflow-hidden bg-gradient-light">
        <!--Container-->
        <div class="container-fluid px-xl-9 position-relative py-9 py-lg-11">
          <div class="row">
            <div class="col-lg-8 mx-auto text-center col-xl-7">
              <p class="mb-4 badge bg-primary-subtle text-primary rounded-2 fs-6 px-3 py-2" data-aos="fade-down">
                Customizable
              </p>
              <h2 class="mb-6 mb-lg-9 display-6" data-aos="fade-down" data-aos-delay="100">
                <span>Discover</span> more
                features
              </h2>
            </div>
          </div>
          <div class="row justify-content-between">
            <!--Feature col-->
            <div class="col-md-6 col-lg-5 offset-lg-1 mb-4" data-aos="fade-down">
              <div
                class="d-flex flex-column flex-md-row p-4 bg-primary-subtle rounded-4 position-realtive hover-lift hover-shadow-lg">
                <!--feature Icon-->
                <div class="width-7x height-7x me-4 mb-4">
                  <img src="{{ URL::asset('assets/img/graphics/icons/database.svg') }}"
                  class="w-100 mb-4 h-100 fill-primary flex-shrink-0" data-inject-svg alt="" />
                </div>

                <!--Feature icon text-->
                <div>
                  <h5>Unlimited space</h5>
                  <p class="mb-0">
                    Lorem ipsum dolor sit sed do eiusmod tempor
                    incididunt ut labore et dolore.
                  </p>
                </div>
              </div>
            </div>
            <!--Feature col-->
            <div class="col-md-6 col-lg-5 me-auto mb-4" data-aos="fade-down" data-aos-delay="100">
              <div
                class="d-flex flex-column flex-md-row p-4 bg-danger-subtle rounded-4 position-realtive hover-lift hover-shadow-lg">
                 <!--feature Icon-->
                 <div class="width-7x height-7x me-4 mb-4">
                  <img src="{{ URL::asset('assets/img/graphics/icons/search.svg') }}"
                  class="w-100 mb-4 h-100 fill-danger flex-shrink-0" data-inject-svg alt="" />
                </div>
                <!--Feature icon text-->
                <div>
                  <h5>Filter search</h5>
                  <p class="mb-0">
                    Lorem ipsum dolor sit sed do eiusmod tempor
                    incididunt ut labore et dolore.
                  </p>
                </div>
              </div>
            </div>
            <!--Feature col-->
            <div class="col-md-6 col-lg-5 mb-4" data-aos="fade-down" data-aos-delay="150">
              <div
                class="d-flex flex-column flex-md-row p-4 bg-success-subtle rounded-4 position-realtive hover-lift hover-shadow-lg">
                 <!--feature Icon-->
                 <div class="width-7x height-7x me-4 mb-4">
                  <img src="{{ URL::asset('assets/img/graphics/icons/locked.svg') }}"
                  class="w-100 mb-4 h-100 fill-success flex-shrink-0" data-inject-svg alt="" />
                </div>
                <!--Feature icon text-->
                <div>
                  <h5>Security settings</h5>
                  <p class="mb-0">
                    Lorem ipsum dolor sit sed do eiusmod tempor
                    incididunt ut labore et dolore.
                  </p>
                </div>
              </div>
            </div>
            <!--Feature col-->
            <div class="col-md-6 col-lg-5 me-auto mb-4" data-aos="fade-down" data-aos-delay="200">
              <div
                class="d-flex flex-column flex-md-row p-4 bg-warning-subtle rounded-4 position-realtive hover-lift hover-shadow-lg">
                 <!--feature Icon-->
                 <div class="width-7x height-7x me-4 mb-4">
                  <img src="{{ URL::asset('assets/img/graphics/icons/collaboration.svg') }}"
                  class="w-100 mb-4 h-100 fill-warning flex-shrink-0" data-inject-svg alt="" />
                </div>
                <!--Feature icon text-->
                <div>
                  <h5>Shared server</h5>
                  <p class="mb-0">
                    Lorem ipsum dolor sit sed do eiusmod tempor
                    incididunt ut labore et dolore.
                  </p>
                </div>
              </div>
            </div>
            <!--Feature col-->
            <div class="col-md-6 offset-lg-2 col-lg-5 mb-4 mb-md-0" data-aos="fade-down" data-aos-delay="250">
              <div
                class="d-flex flex-column flex-md-row p-4 bg-info-subtle rounded-4 position-realtive hover-lift hover-shadow-lg">
                 <!--feature Icon-->
                 <div class="width-7x height-7x me-4 mb-4">
                  <img src="{{ URL::asset('assets/img/graphics/icons/help.svg') }}"
                  class="w-100 mb-4 h-100 fill-info flex-shrink-0" data-inject-svg alt="" />
                </div>

                <!--Feature icon text-->
                <div>
                  <h5>Instant support</h5>
                  <p class="mb-0">
                    Lorem ipsum dolor sit sed do eiusmod tempor
                    incididunt ut labore et dolore.
                  </p>
                </div>
              </div>
            </div>
            <!--Feature col-->
            <div class="col-md-6 col-lg-5" data-aos="fade-down" data-aos-delay="300">
              <div
                class="d-flex flex-column flex-md-row p-4 bg-secondary-subtle rounded-4 position-realtive hover-lift hover-shadow-lg">
                <!--feature Icon-->
                <div class="width-7x height-7x me-4 mb-4">
                  <img src="{{ URL::asset('assets/img/graphics/icons/project-management.svg') }}"
                  class="w-100 mb-4 h-100 fill-currentColor flex-shrink-0" data-inject-svg alt="" />
                </div>
                <!--Feature icon text-->
                <div>
                  <h5>Project management</h5>
                  <p class="mb-0">
                    Lorem ipsum dolor sit sed do eiusmod tempor
                    incididunt ut labore et dolore.
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="position-relative overflow-hidden">
        <!--Container-->
        <div class="container-fluid px-xl-9 py-9 py-lg-11 position-relative z-1">
          <div class="row justify-content-between align-items-center">
            <div class="col-lg-4 me-auto">

              <!--subheading-->
              <p class="mb-4 badge bg-primary-subtle text-primary rounded-2 fs-6 px-3 py-2" data-aos="fade-down">
                Process
              </p>
              <!--Heading-->
              <h2 class="mb-5 display-6" data-aos="fade-up">
                How it work?
              </h2>
              <!--Nav-tabs-->
              <ul class="nav nav-vertical flex-column position-relative mb-5 mb-lg-0" role="tablist" data-aos="fade-up">
                <li class="nav-item mb-1" role="presentation">
                  <a class="nav-link py-3 px-4 rounded-3 active" data-bs-toggle="tab" href="{{ URL::asset('#step1') }}" aria-selected="true"
                    role="tab">
                    <div class="d-flex align-items-center">
                      <div class="fs-3 lh-1 flex-shrink-0 me-4">
                        <i class="bx bx-user"></i>
                      </div>
                      <div class="flex-grow-1">
                        <div class="lh-sm h5 text-reset mb-1">
                          01. Create account
                        </div>
                        <p class="mb-0">Lorem ipsum dolor sit amet sed</p>
                      </div>
                    </div>
                  </a>
                </li>
                <li class="nav-item mb-1" role="presentation">
                  <a class="nav-link py-3 px-4 rounded-3" data-bs-toggle="tab" href="{{ URL::asset('#step2') }}" aria-selected="false"
                    role="tab">
                    <div class="d-flex align-items-center">
                      <div class="fs-3 lh-1 flex-shrink-0 me-4">
                        <i class="bx bx-dollar"></i>
                      </div>
                      <div class="flex-grow-1">
                        <div class="lh-sm h5 text-reset mb-1">
                          02. Choose a plan
                        </div>
                        <p class="mb-0">Lorem ipsum dolor sit amet</p>
                      </div>
                    </div>
                  </a>
                </li>
                <li class="nav-item" role="presentation">
                  <a class="nav-link py-3 px-4 rounded-3" data-bs-toggle="tab" href="{{ URL::asset('#step3') }}" aria-selected="false"
                    role="tab">
                    <div class="d-flex align-items-center">
                      <div class="fs-3 lh-1 flex-shrink-0 me-4">
                        <i class="bx bxs-check-circle"></i>
                      </div>
                      <div class="flex-grow-1">
                        <div class="lh-sm h5 text-reset mb-1">
                          03. Start managing
                        </div>
                        <p class="mb-0">Ipsum dolor sit amet sed do</p>
                      </div>
                    </div>
                  </a>
                </li>
                <li class="indicator-vertical w-100 position-absolute border-start border-3 bg-body-tertiary rounded-3 z-n1 border-primary start-0"></li>
              </ul>
            </div>
            <div class="col-lg-7">
              <!--Tabs content-->
              <div class="tab-content position-relative">
                <div class="tab-pane fade show active" id="step1" role="tabpanel">
                  <img src="{{ URL::asset('assets/img/graphics/saas/hero.png') }}" alt="" class="img-fluid rounded-3 shadow-lg">
                </div>
                <div class="tab-pane fade" id="step2" role="tabpanel">
                  <img src="{{ URL::asset('assets/img/graphics/saas/hero.png') }}" alt="" class="img-fluid rounded-3 shadow-lg">
                </div>
                <div class="tab-pane fade" id="step3" role="tabpanel">
                  <img src="{{ URL::asset('assets/img/graphics/saas/hero.png') }}" alt="" class="img-fluid rounded-3 shadow-lg">
                </div>
                <!--Video button-->
                <div
                  class="d-flex flex-column flex-sm-row justify-content-center align-items-center position-absolute start-0 top-0 w-100 h-100 z-1">
                  <!--Video button-->
                  <a href="{{ URL::asset('https://vimeo.com/353105087') }}" data-glightbox data-gallery="gallery-8" class="btn btn-primary shadow btn-circle-ripple p-0 hover-lift width-12x height-12x rounded-pill
                   flex-center me-sm-2">
                    <i class="bx bx-play display-4 lh-1"></i>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="position-relative overflow-hidden">
        <!--bg-->
        <div class="position-absolute start-0 top-0 w-100 h-50 bg-body-tertiary"></div>

        <div class="container position-relative py-9 py-lg-11">
          <div class="row mb-4 mb-lg-5  align-items-end justify-content-between">
            <div class="col-md-8 mb-4 mb-md-0 position-relative">

              <div class="position-relative">
                <p class="mb-4 badge bg-primary-subtle text-primary rounded-2 fs-6 px-3 py-2">Testimonials</p>
                <h2 class="mb-4 display-6">Clients who love
                  <span class="d-block">our
                    <span class="d-inline-block text-primary"
                      data-typed='{"strings": ["Ideas...", "Creativity...", "passion...", "innovation..."]}'></span>
                  </span>
                </h2>
              </div>
            </div>
            <div class="col-md-4 text-md-end">
              <div class="position-relative d-flex justify-content-md-end align-items-center">
                <!--Buttons navigation-->
                <div
                  class="swiper-testimonials-button-prev start-0 swiper-button-prev mt-0 rounded-end-0 rounded-4 position-relative width-5x height-5x me-1 rounded-circle btn btn-white p-0 border-0">
                </div>
                <div
                  class="swiper-testimonials-button-next swiper-button-next mt-0 position-relative rounded-start-0 rounded-4 end-0 width-5x height-5x rounded-circle btn btn-white p-0 border-0">
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12">

              <!--Swiper slider testimonials-->
              <div class="swiper-container swiper-testimonials">
                <div class="swiper-wrapper">
                  <!--Slide-->
                  <div class="swiper-slide">
                    <div class="position-relative bg-body">
                      <div class="mb-4 flex-grow-1 px-3 px-4 py-5 text-body rounded-3 shadow">
                        <div class="mb-3 text-warning">
                          <i class="bx bx-star small"></i>
                          <i class="bx bx-star small"></i>
                          <i class="bx bx-star small"></i>
                          <i class="bx bx-star small"></i>
                          <i class="bx bx-star small"></i>
                        </div>
                        <p class="mb-0">
                          “ Loved working with the beautiful theme. Everything clean and
                          professional,
                          also very helpful throughout the customisation. Looking forward to
                          buy more
                          license of Assan again in the future.”
                        </p>
                      </div>
                      <div class="d-flex align-items-center justify-content-start">

                        <div class="position-relative me-3">
                          <!--Avatar Image-->
                          <img class="position-relative avatar lg rounded-circle p-1" src="{{ URL::asset('assets/img/avatar/4.jpg') }}"
                            alt="">
                        </div>
                        <div>
                          <h5 class="mb-0 fs-6">Nala Goins</h5>
                          <small class="text-body-tertiary">UI UX Designer, Paris</small>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!--Slide-->
                  <div class="swiper-slide">
                    <div class="position-relative bg-body">
                      <div class="mb-4 flex-grow-1 px-3 px-4 py-5 rounded-3 shadow">
                        <div class="mb-3 text-warning">
                          <i class="bx bx-star small"></i>
                          <i class="bx bx-star small"></i>
                          <i class="bx bx-star small"></i>
                          <i class="bx bx-star small"></i>
                          <i class="bx bx-star small"></i>
                        </div>
                        <p class="mb-0">
                          “ Their design delivery framework is fantastic and it really helped
                          us all get
                          on the same page from day one. The team has delivered a strong brand
                          identity and a seamless UI
                          which we can’t wait to put live and begin testing. ”
                        </p>
                      </div>
                      <div class="d-flex align-items-center justify-content-start">

                        <div class="position-relative me-3">
                          <img class="position-relative avatar lg rounded-circle p-1" src="{{ URL::asset('assets/img/avatar/5.jpg') }}"
                            alt="">
                        </div>
                        <div>
                          <h5 class="mb-0 fs-6">Lilja Peltola</h5>
                          <small class="text-body-tertiary">Full stack developer, Toronto</small>
                        </div>
                      </div>
                    </div>
                  </div>

                  <!--Slide-->
                  <div class="swiper-slide">
                    <div class="position-relative bg-body">
                      <div class="mb-4 flex-grow-1 px-3 px-4 py-5 rounded-3 shadow">
                        <div class="mb-3 text-warning">
                          <i class="bx bx-star small"></i>
                          <i class="bx bx-star small"></i>
                          <i class="bx bx-star small"></i>
                          <i class="bx bx-star small"></i>
                          <i class="bx bx-star small"></i>
                        </div>
                        <p class="mb-0">
                          “ Their design delivery framework is fantastic and it really helped
                          us all get
                          on the same page from day one. The team has delivered a strong brand
                          identity and a seamless UI
                          which we can’t wait to put live and begin testing. ”
                        </p>
                      </div>
                      <div class="d-flex align-items-center justify-content-start">

                        <div class="position-relative me-3">
                          <!--Avatar Image-->
                          <img class="position-relative avatar lg rounded-circle p-1" src="{{ URL::asset('assets/img/avatar/6.jpg') }}"
                            alt="">
                        </div>
                        <div>
                          <h5 class="mb-0 fs-6">Adam Macofey</h5>
                          <small class="text-body-tertiary">CEO, Physics, Stockholm</small>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!--Slide-->
                  <div class="swiper-slide">
                    <div class="position-relative bg-body">
                      <div class="mb-4 flex-grow-1 px-3 px-4 py-5 rounded-3 shadow">
                        <div class="mb-3 text-warning">
                          <i class="bx bx-star small"></i>
                          <i class="bx bx-star small"></i>
                          <i class="bx bx-star small"></i>
                          <i class="bx bx-star small"></i>
                          <i class="bx bx-star small"></i>
                        </div>
                        <p class="mb-0">
                          “ Loved working with the beautiful theme. Everything clean and
                          professional,
                          also very helpful throughout the customisation. Looking forward to
                          buy more
                          license of Assan again in the future.”
                        </p>
                      </div>
                      <div class="d-flex align-items-center justify-content-start">

                        <div class="position-relative me-3">
                          <!--Avatar Image-->
                          <img class="position-relative avatar lg rounded-circle p-1" src="{{ URL::asset('assets/img/avatar/7.jpg') }}"
                            alt="">
                        </div>
                        <div>
                          <h5 class="mb-0 fs-6">Alex Lee</h5>
                          <small class="text-body-tertiary">Developer, Barcelona</small>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!--Slide-->
                  <div class="swiper-slide">
                    <div class="position-relative bg-body">
                      <div class="mb-4 flex-grow-1 px-3 px-4 py-5 rounded-3 shadow">
                        <div class="mb-3 text-warning">
                          <i class="bx bx-star small"></i>
                          <i class="bx bx-star small"></i>
                          <i class="bx bx-star small"></i>
                          <i class="bx bx-star small"></i>
                          <i class="bx bx-star small"></i>
                        </div>
                        <p class="mb-0">
                          “ Their design delivery framework is fantastic and it really helped
                          us all get
                          on the same page from day one. The team has delivered a strong brand
                          identity and a seamless UI
                          which we can’t wait to put live and begin testing. ”
                        </p>
                      </div>
                      <div class="d-flex align-items-center justify-content-start">

                        <div class="position-relative me-3">
                          <!--Avatar Image-->
                          <img class="position-relative avatar lg rounded-circle p-1" src="{{ URL::asset('assets/img/avatar/8.jpg') }}"
                            alt="">
                        </div>
                        <div>
                          <h5 class="mb-0 fs-6">Jayden Massey</h5>
                          <small class="text-body-tertiary">UI UX master, Warsaw</small>
                        </div>
                      </div>
                    </div>
                  </div>

                  <!--Slide-->
                  <div class="swiper-slide">
                    <div class="position-relative bg-body">
                      <div class="mb-4 flex-grow-1 px-3 px-4 py-5 rounded-3 shadow">
                        <div class="mb-3 text-warning">
                          <i class="bx bx-star small"></i>
                          <i class="bx bx-star small"></i>
                          <i class="bx bx-star small"></i>
                          <i class="bx bx-star small"></i>
                          <i class="bx bx-star small"></i>
                        </div>
                        <p class="mb-0">
                          “ Their design delivery framework is fantastic and it really helped
                          us all get
                          on the same page from day one. The team has delivered a strong brand
                          identity and a seamless UI
                          which we can’t wait to put live and begin testing. ”
                        </p>
                      </div>
                      <div class="d-flex align-items-center justify-content-start">

                        <div class="position-relative me-3">
                          <img class="position-relative avatar lg rounded-circle p-1" src="{{ URL::asset('assets/img/avatar/9.jpg') }}"
                            alt="">
                        </div>
                        <div>
                          <h5 class="mb-0 fs-6">Raymond Atkins</h5>
                          <small class="text-body-tertiary">Entrepreneur, Los Angeles</small>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

              </div>
            </div>
          </div>

        </div>
      </section>
      <section class="position-relative border-top overflow-hidden">
        <div class="container-fluid px-xl-9 position-relative py-9 py-lg-11">
          <div class="row">
            <div class="col-lg-10 text-center mx-auto mb-5 mb-lg-9">
              <!--Subtitle-->
              <p class="mb-4 badge bg-primary-subtle text-primary rounded-2 fs-6 px-3 py-2">
                FAQs
              </p>
              <!--Title-->
              <h2 class="mb-0 display-5">
                <span>Frequently</span> asked
                questions
              </h2>
            </div>
            <div class="col-12">

              <div class="row justify-content-center">
                <div class="col-12 col-md-6 col-lg-5 py-5 py-lg-7 pe-md-5 border-bottom border-end-md">
                  <!--FAQ item card-->
                  <div class="d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="50">
                    <div class="me-3 me-lg-4">
                      <span
                        class="text-success fs-5 d-flex width-2x height-2x rounded-2 flex-center bg-success bg-opacity-10">
                        <i class="bx bx-question-mark"></i>
                      </span>
                      <!--/.Icon-->
                    </div>

                    <div>
                      <h5 class="mb-3">What do I get with this kit?</h5>
                      <p class="mb-0">
                        Lorem ipsum dolor sit amet, adipiscing elit, sed do eiusmod tempor
                        incididunt ut
                        labore et dolore magna aliqua. Viverra nam libero justo laoreet.
                      </p>
                    </div>
                  </div>
                </div>
                <!--Q-col-->
                <div class="col-12 col-md-6 col-lg-5 py-5 py-lg-7 ps-md-5 border-bottom">
                  <!--FAQ item card-->
                  <div class="d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                    <div class="me-3 me-lg-4">
                      <span
                        class="text-success fs-5 d-flex width-2x height-2x rounded-2 flex-center bg-success bg-opacity-10">
                        <i class="bx bx-question-mark"></i>
                      </span>
                      <!--/.Icon-->
                    </div>

                    <div>
                      <h5 class="mb-3">How do i get the new updates?</h5>
                      <p class="mb-0">
                        Lorem ipsum dolor sit amet, adipiscing elit, sed do eiusmod tempor
                        incididunt ut
                        labore et dolore magna aliqua. Viverra nam libero justo laoreet.
                      </p>
                    </div>
                  </div>
                </div>
                <!--Q-col-->
                <div class="col-12 col-md-6 col-lg-5 py-5 py-lg-7 pe-md-5 border-bottom border-end-md">
                  <!--FAQ item card-->
                  <div class="d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="150">
                    <div class="me-3 me-lg-4">
                      <span
                        class="text-success fs-5 d-flex width-2x height-2x rounded-2 flex-center bg-success bg-opacity-10">
                        <i class="bx bx-question-mark"></i>
                      </span>
                      <!--/.Icon-->
                    </div>

                    <div>
                      <h5 class="mb-3">Lorem ipsum dolor sit amet?</h5>
                      <p class="mb-0">
                        Lorem ipsum dolor sit amet adipiscing elit, sed do eiusmod tempor
                        incididunt ut
                        labore et dolore magna aliqua. Viverra nam libero justo laoreet.
                      </p>
                    </div>
                  </div>
                </div>
                <!--Q-col-->
                <div class="col-12 col-md-6 col-lg-5 py-5 py-lg-7 ps-md-5 border-bottom">
                  <!--FAQ item card-->
                  <div class="d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
                    <div class="me-3 me-lg-4">
                      <span
                        class="text-success fs-5 d-flex width-2x height-2x rounded-2 flex-center bg-success bg-opacity-10">
                        <i class="bx bx-question-mark"></i>
                      </span>
                      <!--/.Icon-->
                    </div>

                    <div>
                      <h5 class="mb-3">What's the refund policy?</h5>
                      <p class="mb-0">
                        Lorem ipsum dolor sit amet, adipiscing elit, sed do eiusmod tempor
                        incididunt ut
                        labore et dolore magna aliqua. Viverra nam libero justo laoreet.
                      </p>
                    </div>
                  </div>
                </div>
                <!--Q-col-->
                <div class="col-12 col-md-6 col-lg-5 py-5 py-lg-7 pe-md-5 border-end-md border-bottom border-bottom-md-0">
                  <!--FAQ item card-->
                  <div class="d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="250">
                    <div class="me-3 me-lg-4">
                      <span
                        class="text-success fs-5 d-flex width-2x height-2x rounded-2 flex-center bg-success bg-opacity-10">
                        <i class="bx bx-question-mark"></i>
                      </span>
                      <!--/.Icon-->
                    </div>

                    <div>
                      <h5 class="mb-3">Does Assan4 use bootstrap5?</h5>
                      <p class="mb-0">
                        Lorem ipsum dolor sit amet, adipiscing elit, sed do eiusmod tempor
                        incididunt ut
                        labore et dolore magna aliqua. Viverra nam libero justo laoreet.
                      </p>
                    </div>
                  </div>
                </div>
                <!--Q-col-->
                <div class="col-12 col-md-6 col-lg-5 py-5 py-lg-7 ps-md-5">
                  <!--FAQ item card-->
                  <div class="d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="300">
                    <div class="me-3 me-lg-4">
                      <span
                        class="text-success fs-5 d-flex width-2x height-2x rounded-2 flex-center bg-success bg-opacity-10">
                        <i class="bx bx-question-mark"></i>
                      </span>
                      <!--/.Icon-->
                    </div>
                    <div>
                      <h5 class="mb-3">Why Assan 4.0?</h5>
                      <p class="mb-0">
                        Lorem ipsum dolor sit amet, adipiscing elit, sed do eiusmod tempor
                        incididunt ut
                        labore et dolore magna aliqua. Viverra nam libero justo laoreet.
                      </p>
                    </div>
                  </div>
                </div>
                <!--Q-col-->
              </div>
            </div>
            <div class="pt-7 pt-lg-9 text-center" data-aos="fade-up">
              <p class="mb-0">
                Didn't get your answer? Feel free to <a class="d-inline-block fw-bold ms-1 link-hover-underline"
                  href="{{ URL::asset('mailto:yourmail@domain.com') }}">Send us an Email</a>
              </p>
            </div>
          </div>
        </div>
      </section>
      <section class="position-relative pb-7 bg-body-tertiary overflow-hidden">
        <div class="container-fluid px-xl-9 position-relative py-9 py-lg-11 z-1">
          <div class="row align-items-center">
            <div class="col-md-5 mb-5 mb-lg-0">
              <span class="mb-4 badge bg-success-subtle text-success rounded-2 fs-6 px-3 py-2" data-aos="fade-up">
                Get started
              </span>
              <h2 class="display-5 mb-4" data-aos="fade-up" data-aos-delay="100">
                See it for yourself
              </h2>
              <p class="mb-5" data-aos="fade-up" data-aos-delay="150">
                Lorem ipsum dolor sit amet elit, sed do eiusmod tempor dolore
                magna aliqua. Viverra nam libero justo laoreet. Suscipit
                adipiscing bibendum est .
              </p>
              <div data-aos="fade-up" data-aos-delay="200">
                <!--Action button-->
                <a href="{{ URL::asset('#') }}" class="btn btn-lg btn-primary hover-lift btn-hover-arrow"><span>Request a demo</span></a>
              </div>
            </div>
            <div class="col-md-6 ms-auto">
              <div class="row">
                <div class="col-7">
                  <img src="{{ URL::asset('assets/img/960x1140/2.jpg') }}" class="img-fluid rounded-4 shadow-xl" alt="">
                </div>
                <div class="col-5">
                  <!--Facts box-->
                  <div
                    class="bg-primary rounded-4 shadow-xl text-white py-4 py-lg-7 text-center px-3 px-lg-5 hover-lift hover-shadow-lg mb-4">
                    <!--Countup-->
                    <h2 data-countup='{"startVal": 0,"suffix":"K","prefix":"+"}' data-to="126" data-aos
                      data-aos-id="countup:in" class="fw-normal display-6">0</h2>
                    <!--text-->
                    <div class="text-white">Customers</div>
                  </div>
                  <!--Facts box-->
                  <div
                    class="bg-danger rounded-4 shadow-xl text-white py-4 py-lg-7 text-center px-3 px-lg-5 hover-lift hover-shadow-lg">
                    <!--Countup-->
                    <h2 data-countup='{"startVal": 0,"suffix":"K","prefix":"+"}' data-to="6" data-aos
                      data-aos-id="countup:in" class="fw-normal display-6">0</h2>
                    <!--text-->
                    <div class="text-white">Issues solved</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!--Divider shape-->
        <svg class="w-100 position-absolute start-0 bottom-0 text-dark z-1" height="48" fill="currentColor"
          preserveAspectRatio="none" viewBox="0 0 1200 120" xmlns="http://www.w3.org/2000/svg"
          style="transform: rotate(180deg) scaleX(-1)">
          <path d="M0 0v46.29c47.79 22.2 103.59 32.17 158 28 70.36-5.37 136.33-33.31 206.8-37.5 73.84-4.36 147.54
     16.88 218.2 35.26 69.27 18 138.3 24.88 209.4
     13.08 36.15-6 69.85-17.84 104.45-29.34C989.49 25 1113-14.29 1200 52.47V0z" opacity=".25" />
          <path d="M0 0v15.81c13 21.11 27.64 41.05 47.69 56.24C99.41 111.27 165 111 224.58 91.58c31.15-10.15
      60.09-26.07 89.67-39.8 40.92-19 84.73-46 130.83-49.67 36.26-2.85 70.9 9.42 98.6 31.56 31.77 25.39
      62.32 62 103.63 73 40.44 10.79 81.35-6.69 119.13-24.28s75.16-39 116.92-43.05c59.73-5.85 
      113.28 22.88 168.9 38.84 30.2 8.66 59 6.17 87.09-7.5 22.43-10.89 48-26.93 60.65-49.24V0z" opacity=".5" />
          <path d="M0 0v5.63C149.93 59 314.09 71.32 475.83 42.57c43-7.64 84.23-20.12 127.61-26.46 59-8.63
    112.48 12.24 165.56 35.4C827.93 77.22 886 95.24 951.2 90c86.53-7 172.46-45.71 248.8-84.81V0z" />
        </svg>
      </section>
</x-assan-layout>
