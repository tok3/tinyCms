<x-assan-layout layout-type="{{$layoutType}}">

        <!--Hero-->
        <section class="position-relative overflow-hidden">
            <!--Contianer-->
            <div class="container position-relative z-1">
                <div class="row py-9 py-lg-12">
                    <div class="col-lg-10 mx-auto text-center">
                        <span class="badge bg-success mb-4">Based on bootstrap v5.3.2</span>
                        <h2 class="mb-4 display-3 position-relative">You deserve a <br><span class="text-gradient"
                                data-typed='{"strings": ["Stunning", "Creative", "Modern", "Elegant", "Responsive","Clean"]}'></span>
                            website.
                        </h2>
                        <p class="px-xl-14 fw-semibold mx-auto lead mb-6">
                            The Best Selling Multi-Purpose & Powerful Bootstrap 5.3.x based Template with 250+ Valid
                            Multi-Page & One-Page Layouts, Clean Admin Dashboard template, 300+ Re-usable UI
                            components and many more amazing features.
                        </p>
                        <div class="d-flex mb-5 align-items-center justify-content-center">
                            <a href="{{ URL::asset('#demos') }}" class="btn btn-primary hover-lift me-2 me-lg-4 px-lg-5 py-lg-3">Explore
                                Demos</a>
                            <a href="{{ URL::asset('https://wrapbootstrap.com/theme/assan-multipurpose-template-ui-kit-WB05F069P/?ref=wb_rakesh') }}"
                                target="_blank"
                                class="btn btn-secondary hover-lift position-relative px-lg-5 py-lg-3">Purchase
                                Now
                                <span
                                    class="badge position-absolute start-100 top-0 translate-middle text-primary bg-primary-subtle hadow-sm small">5.2</span>
                            </a>
                        </div>
                        <p class="text-body-secondary mb-0 mx-auto w-md-75 w-lg-60">Purchase a license today and get
                            lifetime
                            updates for free!</p>
                    </div>
                </div>
            </div>

            <!--:Dark Mode:-->
            <div class="position-absolute start-0 top-0 ms-4 mt-4 z-fixed">
                <div class="d-inline-flex width-13x align-items-center dropdown">
                    <button class="btn border text-body py-2 px-2 d-flex align-items-center" id="assan-theme"
                        type="button" aria-expanded="false" data-bs-toggle="dropdown" data-bs-display="static">
                        <span class="theme-icon-active d-flex align-items-center">
                            <i class="bx align-middle" href="{{ URL::asset('null') }}"></i>
                        </span>
                    </button>
                    <!--:Dark Mode Options:-->
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="assan-theme"
                        style="--bs-dropdown-min-width: 9rem;">
                        <li class="mb-1">
                            <button type="button" class="dropdown-item d-flex align-items-center active"
                                data-bs-theme-value="light">
                                <span class="theme-icon d-flex align-items-center">
                                    <i class="bx bx-sun align-middle me-2"> </i>
                                </span>
                                Light
                            </button>
                        </li>
                        <li class="mb-1">
                            <button type="button" class="dropdown-item d-flex align-items-center"
                                data-bs-theme-value="dark">
                                <span class="theme-icon d-flex align-items-center">
                                    <i class="bx bx-moon align-middle me-2"></i>
                                </span>
                                Dark
                            </button>
                        </li>
                        <li>
                            <button type="button" class="dropdown-item d-flex align-items-center"
                                data-bs-theme-value="auto">
                                <span class="theme-icon d-flex align-items-center">
                                    <i class="bx bx-color-fill align-middle me-2"></i>
                                </span>
                                Auto
                            </button>
                        </li>
                    </ul>
                </div>
            </div>

        </section>

        <section class="position-relative bg-gradient-primary text-white">
            <div class="container-fluid px-xl-6 py-7 py-lg-9">
                <div class="row">
                    <!--Col-->
                    <div class="col-lg-3 col-sm-6 text-center mb-5 mb-lg-0">
                        <h2 class="fs-1" data-aos data-countup='{"startVal":0,"suffix":"+","duration":"5"}'
                            data-to="7050" data-aos-id="countup:in">0</h2>
                        <h6 class="mb-0 opacity-75">Purchases</h6>
                    </div>
                    <!--Col-->
                    <div class="col-lg-3 col-sm-6 text-center mb-5 mb-lg-0">
                        <h2 class="fs-1" data-aos data-countup='{"startVal":0,"suffix":"+","duration":"5"}'
                            data-to="300" data-aos-id="countup:in">0</h2>
                        <h6 class="mb-0 opacity-75">Re-usable UI components</h6>
                    </div>
                    <!--Col-->
                    <div class="col-lg-3 col-sm-6 text-center mb-5 mb-sm-0">
                        <h2 class="fs-1" data-aos data-countup='{"startVal":0,"suffix":"+","duration":"5"}' data-to="50"
                            data-aos-id="countup:in">0</h2>
                        <h6 class="mb-0 opacity-75">Header and Footer styles</h6>
                    </div>
                    <!--Col-->
                    <div class="col-lg-3 col-sm-6 text-center">
                        <h2 class="fs-1" data-aos data-countup='{"startVal":0,"suffix":"+","duration":"5"}' data-to="15"
                            data-aos-id="countup:in">0</h2>
                        <h6 class="mb-0 opacity-75">Bootstrap5 based demos</h6>
                    </div>
                </div>
            </div>
        </section>

        <section id="demos" class="position-relative">
            <div class="container py-9 py-lg-12">
                <h2 class="display-5 text-center mb-3" data-aos="fade-up">Premade demos</h2>
                <p class="lead mb-5 text-center w-lg-50 mx-auto" data-aos="fade-up" data-aos-delay="100">
                    Bring your idea to life ease. The front end solution for all your needs. Build for everyone.
                </p>

                <!--Demo-->
                <div class="mb-7 card card-body">
                    <div class="row align-items-center">
                        <div class="col-md-6 col-xl-5 ms-xl-auto mb-5 mb-md-0" data-aos="fade-up">
                            <a href="{{ URL::asset('index.html') }}" target="_blank" class="position-relative d-block text-dark">
                                <img src="{{ URL::asset('assets/img/demos/demo-classic.jpg') }}" class="img-fluid rounded-3 shadow-lg"
                                    alt="">

                            </a>
                        </div>
                        <div class="col-md-6 mx-md-auto" data-aos="fade-up" data-aos-delay="100">
                            <h6 class="mb-3">Classic Main + RTL Starter</h6>
                            <h2 class="mb-3 fs-4">Classic Multipurpose Template</h2>
                            <p class="lead">RTL Style Included</p>
                            <p class="mb-5">Packed with 250+ Well coded layouts, Unlimited reusable ui components with
                                copy code snippets, 12+ landing pages like multipurpose, consultancy, personal
                                    portfolio, agency, saas app, mobile app, startup and so many more awesome
                                features...</p>
                            <div class="d-flex flex-column flex-sm-row">
                                <a href="{{ URL::asset('index.html') }}" class="btn btn-primary hover-lift me-sm-3 mb-2 mb-sm-0"><i
                                        class="bx bx-link-external me-2"></i>Preview classic demo</a>
                                <a href="{{ URL::asset('demo-rtl.html') }}" target="_blank" class="btn btn-success hover-lift"><i
                                        class="bx bx-link-external me-2"></i>Preview RTL Starter</a>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!--Demo-->
                <div class="mb-7">
                  <div class="text-center w-lg-50 mx-auto">
                    <h6 class="mb-3">HTML + Angular 16</h6>
                    <h2 class="mb-3 fs-4">Admin Dashboard Template</h2>
                    <p class="mb-5 text-body-tertiary">Included Multi layouts, Inbox, chat, calendar apps, 60+ reusable
                            widgets and much more...</p>
                  </div>
                    <div class="row justify-content-center align-items-center">
                        <div class="col-md-6 col-lg-5 mb-3 mb-md-0" data-aos="fade-up">
                            <a href="{{ URL::asset('https://assan-ng-dashboard.vercel.app/') }}" target="_blank"
                            class="position-relative d-block border rounded-3">
                            <div class="p-3 d-flex align-items-center">
                              <div class="flex-grow-1">
                                <h5 class="mb-1 fs-6">Angular16 Admin Dashboard</h5>
                                <p class="mb-0 small text-body-tertiary">Light & Dark, Minimal</p>
                              </div>
                              <div class="flex-shrink-0">
                                <span class="badge text-bg-success">New</span>
                              </div>
                            </div>
                            
                            <img src="{{ URL::asset('assets/img/demos/demo-angular-admin.jpg') }}" class="img-fluid rounded-3 shadow-lg" alt="">
                        </a>
                        </div>
                        <div class="col-md-6 col-lg-5 order-md-1" data-aos="fade-up" data-aos-delay="100">
                            <a href="{{ URL::asset('http://uigator.com/assan/5.2/admin-dashboard') }}" target="_blank"
                            class="position-relative d-blockposition-relative d-block border rounded-3">
                            <div class="p-3">
                                <h5 class="mb-1 fs-6">HTML5 Admin Dashboard</h5>
                            <p class="mb-0 small text-body-tertiary">Light & Dark</p>
                            </div>
                            <img src="{{ URL::asset('assets/img/demos/demo-admin.jpg') }}" class="img-fluid rounded-3 shadow-lg" alt="">
                           
                        </a>
                        </div>
                    </div>
                </div>
                <!--Demo-->
                <div class="mb-7 card card-body">
                    <div class="row align-items-center">
                        <div class="col-md-6 col-xl-5 ms-xl-auto mb-5 mb-md-0" data-aos="fade-up">

                            <a href="{{ URL::asset('https://uigator.com/assan/5.2/nft-marketplace/') }}" target="_blank"
                                class="position-relative d-block text-dark">
                                <img src="{{ URL::asset('assets/img/demos/demo-nft.jpg') }}" class="img-fluid rounded-3 shadow-lg" alt="">
                            </a>
                        </div>
                        <div class="col-md-6 mx-md-auto" data-aos="fade-up" data-aos-delay="100">
                            <h6 class="mb-3">Light & Dark Modes</h6>
                            <h2 class="mb-3 fs-4">NFT Marketplace Template</h2>
                            <p class="mb-5 text-body-tertiary">Included Light & Dark modes, Modern home page, explore NFTs,
                                    collections, create and more... </p>
                            <a target="_blank" href="{{ URL::asset('https://uigator.com/assan/5.2/nft-marketplace/') }}"
                                class="btn btn-primary hover-lift"><i class="bx bx-link-external me-2"></i>Preview this
                                demo</a>
                        </div>
                    </div>
                </div>
                <!--Demo-->
                <div class="mb-7">
                    <div class="row align-items-center">
                        <div class="col-md-6 col-xl-5 order-md-last me-xl-auto mb-5 mb-md-0" data-aos="fade-up">

                            <a href="{{ URL::asset('https://uigator.com/assan/5.2/blog-magazine/index.html') }}" target="_blank"
                                class="position-relative d-block text-dark">
                                <img src="{{ URL::asset('assets/img/demos/demo-blog-magazine.jpg') }}" class="img-fluid rounded-3 shadow-lg"
                                    alt="">
                            </a>
                        </div>

                        <div class="col-md-6 mx-md-auto order-1" data-aos="fade-up" data-aos-delay="100">

                            <h6 class="mb-3">10+ Pages</h6>
                            <h2 class="mb-3 fs-4">Blog / Articles / Stories purpose template</h2>
                            <p class="mb-5 text-body-tertiary">Included Light & Dark modes, Writers & writer page, Bookmarks, Write
                                    story, Pricing pages</p>
                            <a target="_blank" href="{{ URL::asset('https://uigator.com/assan/5.2/blog-magazine/index.html') }}"
                                class="btn btn-primary hover-lift"><i class="bx bx-link-external me-2"></i>Preview this
                                demo</a>
                        </div>
                    </div>
                </div>
                <!--Demo-->
                <div class="mb-7 card card-body">
                    <div class="row align-items-center">
                        <div class="col-md-6 col-xl-5 me-xl-auto mb-5 mb-md-0" data-aos="fade-up">
                            <a href="{{ URL::asset('demo-shop.html') }}" target="_blank" class="position-relative d-block text-dark">
                                <img src="{{ URL::asset('assets/img/demos/demo-shop.jpg') }}" class="img-fluid rounded-3 shadow-lg" alt="">
                            </a>
                        </div>
                        <div class="col-md-6 mx-md-auto" data-aos="fade-up" data-aos-delay="100">
                            <h6 class="mb-3">10+ pages</h6>
                            <h2 class="mb-3 fs-4">E-commerce Template</h2>
                            <p class="mb-5 text-body-tertiary">Included  2 home variants, 10+ pages and more...</p>
                            <a target="_blank" href="{{ URL::asset('demo-shop.html') }}" class="btn btn-primary hover-lift"><i
                                    class="bx bx-link-external me-2"></i>Preview this demo</a>
                        </div>
                    </div>
                </div>

                <!--Demo-->
                <div class="mb-7">
                    <div class="row align-items-center">
                        <div class="col-md-6 col-xl-5 order-md-last me-xl-auto mb-5 mb-md-0" data-aos="fade-up">
                            <a href="{{ URL::asset('demo-jobs.html') }}" target="_blank" class="position-relative d-block text-dark">
                                <img src="{{ URL::asset('assets/img/demos/demo-jobs.jpg') }}" class="img-fluid rounded-3 shadow-lg" alt="">
                            </a>
                        </div>
                        <div class="col-md-6 mx-md-auto order-md-1" data-aos="fade-up" data-aos-delay="100">
                            <h6 class="mb-3">7+ pages</h6>
                            <h2 class="mb-3 fs-4">Jobs demo</h2>
                            <p class="mb-5 text-body-tertiary">Included Multi listing layouts, job post and more...</p>
                            <a target="_blank" href="{{ URL::asset('demo-jobs.html') }}" class="btn btn-primary hover-lift"><i
                                    class="bx bx-link-external me-2"></i>Preview this demo</a>
                        </div>
                    </div>
                </div>

                <!--Demo-->
                <div class="mb-7 card card-body">
                    <div class="row align-items-center">
                        <div class="col-md-6 col-xl-5 ms-xl-auto mb-5 mb-md-0" data-aos="fade-up">
                            <a href="{{ URL::asset('demo-real-estate.html') }}" target="_blank" class="position-relative d-block text-dark">
                                <img src="{{ URL::asset('assets/img/demos/demo-real-estate.jpg') }}" class="img-fluid rounded-3 shadow-lg"
                                    alt="">
                            </a>
                        </div>
                        <div class="col-md-6 mx-md-auto" data-aos="fade-up" data-aos-delay="100">
                            <h6 class="mb-3">7+ pages</h6>
                            <h2 class="mb-3 fs-4">Real Estate</h2>
                            <p class="mb-5 text-body-tertiary">Included Multi listing layouts, 2 home styles and more... 
                            </p>
                            <a target="_blank" href="{{ URL::asset('demo-real-estate.html') }}" class="btn btn-primary hover-lift"><i
                                    class="bx bx-link-external me-2"></i>Preview this demo</a>
                        </div>
                    </div>
                </div>

                <h2 class="text-center pt-5 mb-5 mb-lg-7" data-aos="fade-up">One Page Demos</h2>
                <div class="row mb-4 justify-content-center">

                    <!--Column-->
                    <div class="col-lg-4 col-sm-6 mb-6" data-aos="fade-up">
                        <a href="{{ URL::asset('demo-one-page.html') }}" target="_blank" class="position-relative d-block text-dark">
                            <img src="{{ URL::asset('assets/img/demos/demo-onepage.jpg') }}" class="img-fluid mb-3 rounded-3 shadow-lg"
                                alt="">
                            <h6 class="mb-0 text-center">One Page</h6>
                        </a>
                    </div>
                    <!--Column-->
                    <div class="col-lg-4 col-sm-6 mb-6" data-aos="fade-up" data-aos-delay="100">
                        <a href="{{ URL::asset('demo-event-landing.html') }}" target="_blank" class="position-relative d-block text-dark">
                            <img src="{{ URL::asset('assets/img/demos/demo-event.jpg') }}" class="img-fluid mb-3 rounded-3 shadow-lg"
                                alt="">
                            <h6 class="mb-0 text-center">Event Conference</h6>
                        </a>
                    </div>
                </div>

                <p class="lead text-body-secondary text-center mb-0" data-aos="fade-up">Many more demos coming soon...
                </p>
            </div>
        </section>


        <section class="position-relative bg-body-tertiary">
            <svg class="position-absolute start-0 bottom-0" style="color:var(--bs-body-bg)" width="100%" height="32px"
                preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1920 100.1">
                <path fill="currentColor" d="M0,0c0,0,934.4,93.4,1920,0v100.1H0L0,0z"></path>
            </svg>
            <div class="container py-9 py-lg-12 position-relative z-1">
                <p class="text-body-secondary text-center mb-4" data-aos="fade-up">Technologies used</p>
                <div class="row">
                    <div class="col-md-12">
                        <ul class="list-unstyled justify-content-center d-flex flex-wrap mb-0">
                            <li class="mx-5 mt-7" data-aos="fade-up">
                                <svg class="height-5x w-auto" xmlns="http://www.w3.org/2000/svg" height="1992"
                                    viewBox="0 0 512 407.864" width="2500">
                                    <path
                                        d="m106.344 0c-29.214 0-50.831 25.57-49.863 53.3.929 26.641-.278 61.145-8.964 89.283-8.717 28.217-23.449 46.098-47.517 48.393v25.912c24.068 2.3 38.8 20.172 47.516 48.393 8.687 28.138 9.893 62.642 8.964 89.283-.968 27.726 20.649 53.3 49.868 53.3h299.347c29.214 0 50.827-25.57 49.859-53.3-.929-26.641.278-61.145 8.964-89.283 8.717-28.221 23.413-46.1 47.482-48.393v-25.912c-24.068-2.3-38.764-20.172-47.482-48.393-8.687-28.134-9.893-62.642-8.964-89.283.968-27.726-20.645-53.3-49.859-53.3h-299.355zm240.775 251.067c0 38.183-28.481 61.34-75.746 61.34h-80.458a8.678 8.678 0 0 1 -8.678-8.678v-199.593a8.678 8.678 0 0 1 8.678-8.678h80c39.411 0 65.276 21.348 65.276 54.124 0 23.005-17.4 43.6-39.567 47.208v1.2c30.176 3.31 50.495 24.21 50.495 53.077zm-84.519-128.1h-45.876v64.8h38.639c29.87 0 46.34-12.028 46.34-33.527-.003-20.148-14.163-31.273-39.103-31.273zm-45.876 90.511v71.411h47.564c31.1 0 47.573-12.479 47.573-35.931s-16.935-35.484-49.573-35.484h-45.564z"
                                        fill="#7952b3" fill-rule="evenodd" />
                                </svg>
                            </li>
                            <li class="mx-5 mt-7" data-aos="fade-up" data-aos-delay="100">
                                <svg class="height-5x w-auto" xmlns="http://www.w3.org/2000/svg" width="1131"
                                    height="2500" viewBox="0 0 256 566" preserveAspectRatio="xMinYMin meet">
                                    <path
                                        d="M197.28 548.749l5.427-90.43 14.985-25.58s-34.106 13.952-91.205 13.952c-57.1 0-90.689-13.694-90.689-13.694l16.794 27.904 5.941 87.848c0 9.418 31.059 17.052 69.374 17.052 38.313 0 69.373-7.634 69.373-17.052M180.161 126.454l11.391-45.025 63.081-66.376L238.007.892l-66.784 70.707-13.226 53.793a886.14 886.14 0 0 0-29.873-.497c-70.336 0-127.355 8.016-127.355 17.902 0 9.887 57.019 17.902 127.355 17.902 70.335 0 127.353-8.015 127.353-17.902 0-7.28-30.924-13.546-75.316-16.343"
                                        fill="#D34A47" />
                                    <path
                                        d="M173.535 151.669s-2.467.553-9.724.584c-7.259.03-12.413-.047-14.466-1.917-.552-.502-.854-1.499-.851-2.174.006-1.285.918-2.042 2.08-2.516l1.099 1.724c-.478.165-.751.36-.752.568-.004.976 7.422 1.644 13.102 1.572 5.681-.07 12.545-.538 12.551-1.5 0-.291-.519-.565-1.422-.781l1.094-1.712c1.472.457 2.757 1.34 2.754 2.868-.014 2.598-3.32 2.993-5.465 3.284"
                                        fill="#FFF" />
                                    <path
                                        d="M254.509 15.184c1.586-1.832-.821-6.518-5.376-10.465C244.576.774 239.596-.94 238.007.892c-1.587 1.832.821 6.518 5.378 10.463 4.555 3.946 9.537 5.662 11.124 3.829M194.246 327.865c-1.495-14.384 31.462-35.216 23.004-35.883-18.208 1.041-27.27 21.338-36.431 42.596-3.357 7.791-14.844 41.013-22.378 36.923-7.532-4.088 9.765-31.407 14.613-47.631-5.594 4.102-26.109 20.041-31.396 5.114-8.5 7.219-26.663 11.13-24.614-7.833-4.522 8.01-14.671 19.193-26.853 14.546-15.998-6.101 9.27-57.062 15.553-54.491 6.284 2.57-1.268 14.179-3.246 18.687-4.35 9.921-9.375 22.393-6.018 24.946 5.751 4.374 21.401-16.547 21.749-17.007 2.927-3.867 11.266-29.166 17.987-26.261 6.721 2.905-16.764 36.308-7.983 42.937 1.771 1.338 9.017-.825 13.425-5.594 2.852-3.085 1.871-9.918 11.378-32.59 9.507-22.671 17.98-50.905 24.5-48.754 6.52 2.15 1.146 16.641-1.193 22.043-10.976 25.354-29.956 67.241-21.005 64.07 8.951-3.17 13.612-3.356 22.377-13.613 8.765-10.257 8.361-27.152 14.203-26.793 5.844.36 4.863 5.777 3.446 9.902 5.75-6.58 27.256-20.438 32.448-6.713 6.15 16.249-30.769 39.72-21.564 38.523 8.975-1.167 23.515-10.376 29.723-18.749l17.088-153.626s-17.195 14.23-126.589 14.23c-109.395 0-124.811-13.934-124.811-13.934l14.548 140.224c7.722-21.947 26.059-66.339 54.963-64.849 13.148.678 30.7 25.995 15.665 26.853-6.364.362-7.01-12.637-14.546-14.546-5.438-1.378-13.009 3.043-17.902 7.833-9.758 9.55-30.745 47.229-27.972 66.014 3.533 23.949 33.048-8.322 38.042-17.903 3.517-6.749 5.893-26.745 13.585-24.647 7.693 2.098-.671 22.734-6.247 40.979-6.264 20.487-9.557 42.098-17.408 39.612-7.852-2.484 4.938-28.932 4.475-33.566-7.38 6.809-20.976 24.047-38.37 15.515l9.035 87.078s24.013 18.973 96.35 18.973c72.337 0 97.239-18.677 97.239-18.677l11.219-100.857c-9.179 8.938-38.229 24.81-40.089 6.919"
                                        fill="#D34A47" />
                                </svg>
                            </li>
                            <li class="mx-5 mt-7" data-aos="fade-up" data-aos-delay="150">
                                <svg class="height-5x w-auto" xmlns="http://www.w3.org/2000/svg" width="2500"
                                    height="1875" viewBox="0 0 512 384">
                                    <path fill="#CF649A"
                                        d="M440.6 220.6c-17.9.101-33.4 4.4-46.4 10.801-4.8-9.5-9.6-17.801-10.399-24-.9-7.2-2-11.601-.9-20.2C384 178.6 389 166.4 389 165.4c-.101-.9-1.101-5.3-11.4-5.4s-19.2 2-20.2 4.7-3 8.9-4.3 15.3c-1.8 9.4-20.6 42.7-31.3 60.2-3.5-6.8-6.5-12.8-7.101-17.601-.899-7.199-2-11.6-.899-20.199 1.1-8.601 6.1-20.8 6.1-21.8-.1-.9-1.1-5.3-11.399-5.4-10.301-.1-19.2 2-20.2 4.7s-2.1 9.1-4.3 15.3C281.9 201.4 256.9 257 250.4 271.5c-3.3 7.4-6.199 13.3-8.3 17.3-2.1 4-.1.3-.3.7-1.8 3.4-2.8 5.3-2.8 5.3v.101c-1.4 2.5-2.9 4.899-3.601 4.899-.5 0-1.5-6.7.2-15.899 3.7-19.301 12.7-49.4 12.601-50.5 0-.5 1.699-5.801-5.801-8.5-7.3-2.7-9.899 1.8-10.5 1.8-.6 0-1.1 1.6-1.1 1.6s8.1-33.899-15.5-33.899c-14.8 0-35.2 16.1-45.3 30.8-6.4 3.5-20 10.899-34.4 18.8-5.5 3-11.2 6.2-16.6 9.1L117.9 251.9c-28.6-30.5-81.5-52.1-79.3-93.1.8-14.9 6-54.2 101.601-101.8 78.3-39 141-28.3 151.899-4.5 15.5 34-33.5 97.2-114.899 106.3-31 3.5-47.301-8.5-51.4-13-4.3-4.7-4.9-4.9-6.5-4-2.6 1.4-1 5.6 0 8.1 2.4 6.3 12.4 17.5 29.4 23.1 14.899 4.9 51.3 7.6 95.3-9.4 49.3-19.1 87.8-72.1 76.5-116.4-11.5-45.1-86.3-59.9-157-34.8C121.4 27.4 75.8 50.8 43 81.5 4 117.9-2.2 149.7.4 162.9c9.101 47.1 74 77.8 100 100.5-1.3.699-2.5 1.399-3.6 2-13 6.399-62.5 32.3-74.9 59.699-14 31 2.2 53.301 13 56.301 33.4 9.3 67.6-7.4 86.1-34.9 18.399-27.5 16.2-63.2 7.7-79.5l-.301-.6 10.2-6c6.601-3.9 13.101-7.5 18.8-10.601-3.199 8.7-5.5 19-6.699 34-1.4 17.601 5.8 40.4 15.3 49.4 4.2 3.899 9.2 4 12.3 4 11 0 16-9.101 21.5-20 6.8-13.3 12.8-28.7 12.8-28.7s-7.5 41.7 13 41.7c7.5 0 15-9.7 18.4-14.7v.1s.2-.3.6-1a36.13 36.13 0 0 0 1.2-1.899v-.2c3-5.2 9.7-17.1 19.7-36.8 12.899-25.4 25.3-57.2 25.3-57.2s1.2 7.8 4.9 20.6c2.199 7.601 6.999 15.9 10.699 24-3 4.2-4.8 6.601-4.8 6.601l.1.1c-2.399 3.2-5.1 6.601-7.899 10-10.2 12.2-22.4 26.101-24 30.101-1.9 4.699-1.5 8.199 2.2 11 2.7 2 7.5 2.399 12.6 2 9.2-.601 15.6-2.9 18.8-4.301 5-1.8 10.7-4.5 16.2-8.5 10-7.399 16.1-17.899 15.5-31.899-.3-7.7-2.8-15.3-5.9-22.5.9-1.3 1.801-2.601 2.7-4 15.8-23.101 28-48.5 28-48.5s1.2 7.8 4.9 20.6c1.899 6.5 5.7 13.601 9.1 20.601-14.8 12.1-24.1 26.1-27.3 35.3-5.9 17-1.3 24.7 7.4 26.5 3.899.8 9.5-1 13.699-2.8 5.2-1.7 11.5-4.601 17.301-8.9 10-7.4 19.6-17.7 19.1-31.6-.3-6.4-2-12.7-4.3-18.7 12.6-5.2 28.899-8.2 49.6-5.7 44.5 5.2 53.3 33 51.601 44.6-1.7 11.601-11 18-14.101 20-3.1 1.9-4.1 2.601-3.8 4 .4 2.101 1.8 2 4.5 1.601 3.7-.601 23.4-9.5 24.2-30.899 1.2-27.504-24.9-57.504-71.2-57.205zM97.4 336.3c-14.7 16.1-35.4 22.2-44.2 17-9.5-5.5-5.801-29.2 12.3-46.3 11-10.4 25.3-20 34.7-25.9 2.1-1.3 5.3-3.199 9.1-5.5.6-.399 1-.6 1-.6.7-.4 1.5-.9 2.3-1.4 6.7 24.4.3 45.8-15.2 62.7zm107.5-73.1c-5.1 12.5-15.9 44.6-22.4 42.8-5.601-1.5-9-25.8-1.101-49.8 4-12.101 12.5-26.5 17.5-32.101 8.101-9 16.9-12 19.101-8.3 2.6 4.801-9.9 39.601-13.1 47.401zm88.7 42.4c-2.2 1.101-4.2 1.9-5.1 1.301-.7-.4.899-1.9.899-1.9s11.1-11.9 15.5-17.4c2.5-3.199 5.5-6.899 8.7-11.1v1.2C313.6 292.1 299.8 301.7 293.6 305.6zm68.399-15.6c-1.6-1.2-1.399-4.9 4-16.5 2.101-4.6 6.9-12.3 15.2-19.6 1 3 1.601 5.899 1.5 8.6-.099 18-12.899 24.7-20.7 27.5z" />
                                </svg>
                            </li>
                            <li class="mx-5 mt-7" data-aos="fade-up" data-aos-delay="200">
                                <svg class="height-5x w-auto" xmlns="http://www.w3.org/2000/svg" width="2500"
                                    height="2500" viewBox="0 0 1052 1052">
                                    <path fill="#f0db4f" d="M0 0h1052v1052H0z" />
                                    <path
                                        d="M965.9 801.1c-7.7-48-39-88.3-131.7-125.9-32.2-14.8-68.1-25.399-78.8-49.8-3.8-14.2-4.3-22.2-1.9-30.8 6.9-27.9 40.2-36.6 66.6-28.6 17 5.7 33.1 18.801 42.8 39.7 45.4-29.399 45.3-29.2 77-49.399-11.6-18-17.8-26.301-25.4-34-27.3-30.5-64.5-46.2-124-45-10.3 1.3-20.699 2.699-31 4-29.699 7.5-58 23.1-74.6 44-49.8 56.5-35.6 155.399 25 196.1 59.7 44.8 147.4 55 158.6 96.9 10.9 51.3-37.699 67.899-86 62-35.6-7.4-55.399-25.5-76.8-58.4-39.399 22.8-39.399 22.8-79.899 46.1 9.6 21 19.699 30.5 35.8 48.7 76.2 77.3 266.899 73.5 301.1-43.5 1.399-4.001 10.6-30.801 3.199-72.101zm-394-317.6h-98.4c0 85-.399 169.4-.399 254.4 0 54.1 2.8 103.7-6 118.9-14.4 29.899-51.7 26.2-68.7 20.399-17.3-8.5-26.1-20.6-36.3-37.699-2.8-4.9-4.9-8.7-5.601-9-26.699 16.3-53.3 32.699-80 49 13.301 27.3 32.9 51 58 66.399 37.5 22.5 87.9 29.4 140.601 17.3 34.3-10 63.899-30.699 79.399-62.199 22.4-41.3 17.6-91.3 17.4-146.6.5-90.2 0-180.4 0-270.9z"
                                        fill="#323330" />
                                </svg>
                            </li>
                            <li class="mx-5 mt-7" data-aos="fade-up" data-aos-delay="250">
                                <svg class="height-5x w-auto" xmlns="http://www.w3.org/2000/svg" width="2500"
                                    height="977" viewBox="0 0 512 200" preserveAspectRatio="xMinYMin meet">
                                    <path
                                        d="M351.14 17.697l-.114-1.097-1.777.152.113 1.096 1.778-.151zm11.949 28.738l.038.605 1.248-.113c-.038-.378.113-.983.378-1.739l-.114-1.097c-.529.038-1.059.832-1.55 2.344zm-46.625 36.188c-.075-1.021-3.252-4.991-9.529-11.987-.113-1.285 2.042-3.214 6.466-5.747l12.63-11.004c2.836-3.593 4.5-9.416 4.992-17.508l-.152-1.853c-.491-5.596-4.537-10.096-12.213-13.537-4.538-3.063-12.706-4.765-24.504-5.067-9.756.832-22.499 4.31-38.192 10.474-4.311 3.101-9.226 6.202-14.747 9.302l.075.946c.341-.038.87-.227 1.475-.643.643-.076 1.021.227 1.059.832l.945-.492.454-.038.038.416c.038.492-3.366 3.177-10.248 7.979l.53.983-.454.038-1.135-.416c.038.34-.453.567-1.399.643l.038.416 1.097 1.361c-.34.038-.87-.113-1.588-.378-1.589.151-3.139.983-4.689 2.571l.643-2.798c2.306-9.945 3.894-18.756 4.726-26.394l-.113-.492c-1.588-1.021-3.139-2.458-4.576-4.273.038-1.172.038-1.852 0-2.004l-.113-.416-.454.114c-4.991 7.487-14.596 20.268-28.852 38.343-10.852 12.857-16.449 20.004-16.789 21.441-4.424 4.575-6.542 7.336-6.315 8.281-1.172.756-1.664 1.512-1.475 2.344-.34.076-.567-.037-.643-.378-1.89 3.063-4.689 5.029-8.432 5.899l-3.933.908c-.529.113-.794.491-.756 1.134l.113.492 1.475-.341.114.416-3.328 1.286-5.899 1.361-3.101.189c-.454.454 2.458-.037 1.324.227l-3.857.908c-2.345.529-3.63.34-3.857-.605l-.454.113c.076.416.113.719.038.983l-.227-.945-3.101.718c-.227-1.436-4.424-6.655-12.554-15.654-.151-1.74 2.722-4.274 8.584-7.563l16.562-14.559c3.706-4.764 5.899-12.403 6.618-22.915l-.227-2.458c-.643-7.411-6.013-13.386-16.109-17.999-5.975-4.046-16.714-6.202-32.217-6.542-12.857 1.097-29.647 5.672-50.293 13.651-5.672 4.121-12.138 8.205-19.398 12.251l.113 1.286c.492-.038 1.134-.302 1.928-.756.832-.076 1.286.302 1.362 1.059l1.285-.719.643-.038.038.605c.038.605-4.462 4.122-13.575 10.55l.718 1.135-.642.038-1.4-.492c.038.378-.605.643-1.928.756l.075.681 1.513 1.664c-.491.038-1.172-.114-2.042-.416-2.949.265-5.823 2.382-8.659 6.391l.718 1.134c2.458-2.269 3.895-3.403 4.311-3.441l.151 1.853c-.416.038-1.059.302-1.928.756l1.55 2.345a51.198 51.198 0 0 1 9.87-8.282c1.777.454 2.722 1.021 2.76 1.626l1.361-.113c9.756-7.223 19.399-12.441 28.966-15.655l.113 1.285c-1.777 2.647-2.987 4.009-3.63 4.084.076.908.378 1.702.945 2.383.152 1.626-4.197 12.592-13.008 32.86-20.003 47.116-36.793 81.98-50.443 104.518.037.453.302 1.058.794 1.815 3.365-.794 5.483-1.626 6.39-2.421l.719-.075.113 1.286 1.248-.114 1.286-.718c.038.378.454.567 1.323.491l.114 1.286c.113 1.248-.605 3.138-2.118 5.748-1.361 1.55-2.836 4.802-4.386 9.756l.037.605 1.248-.114c5.446-6.088 9.567-12.063 12.403-17.886 15.882-4.651 27.983-9.226 36.377-13.726 8.433-.719 14.861-2.95 19.248-6.618l-.076-.68-3.176.945-.719.076-.076-.681c6.202-.945 10.475-2.307 12.857-4.197 12.063-9.303 21.176-15.882 27.34-19.777 12.667-9.302 20.911-18.378 24.654-27.188a79.463 79.463 0 0 0 2.118-.492c1.777-.075 2.76-.113 3.025-.189-.076-.34.076-.529.416-.605 2.836-.302 1.475.189 3.29-.227l4.764-1.096c-.302.075-.416.227-.34.529l.718-.454c-.151 0-.264-.037-.378-.075l.794-.189-.378.227c.53.075 1.097.037 1.74-.114l.34 1.399-21.667 34.449-4.803 6.012-2.344 7.865.454-.113 2.344-.983-.756 3.063.227.907.642.794c-.302.076-.415.265-.34.605l.114.492.983-.227c1.437-1.248 2.042-2.382 1.815-3.403 1.55.264 2.571.378 3.101.227l.113.491c-.945.227-1.437.983-1.513 2.269l.114.492.529-.114c7.866-8.584 27.151-37.965 42.617-57.893-.492-2.155 7.562-5.143 24.2-9l.53-.113c.605 2.609-.681 8.924-3.857 18.945-2.042 6.05-3.025 9.378-2.874 9.907-2.647 8.054-3.895 12.403-3.744 13.084l-5.899 19.322c-3.819 9.908-6.73 20.307-8.772 31.273.34-.076.869-.038 1.626.151l.831-.719c.076.341.303.454.643.378l-.34-1.399 2.571-.075c.756-.189 1.399-1.135 1.929-2.874-.114-2.609.416-4.008 1.588-4.311 1.588-6.201 2.571-9.302 2.912-9.416 1.474-6.163 2.571-9.68 3.289-10.55 2.232-8.016 3.857-12.138 4.916-12.403l.227.984-1.626 4.197c-2.836 12.592-5.71 22.537-8.621 29.835l.832 3.63.529-.113c7.033-15.126 17.167-45.074 30.364-89.846.379-3.933 2.269-6.996 5.635-9.151l-.757-.794-.113-.416c1.513-.34 2.571-.945 3.176-1.777-.075-.341-1.399-.832-3.97-1.513l6.58-28.209c1.436-1.286 2.268-1.966 2.533-1.966l.114 1.437c-.341.037-.87.226-1.475.642l1.248 1.778c2.268-2.458 4.726-4.576 7.411-6.353 1.361.378 2.042.832 2.118 1.286l.983-.076c7.487-5.483 14.823-9.416 22.045-11.798l.076.945c-1.323 2.004-2.231 3.025-2.723 3.063.076.681.265 1.286.605 1.815.114 1.248-3.138 9.567-9.793 24.995-15.202 35.734-27.945 62.166-38.306 79.334.038.34.265.794.681 1.399 2.533-.605 4.159-1.248 4.802-1.853l.454-.038.076.946 1.058-.076.946-.492c.037.265.378.379 1.021.341l.075 1.021c.076.907-.453 2.344-1.626 4.31-1.096 1.173-2.231 3.631-3.441 7.374l.038.492.983-.076c4.122-4.613 7.26-9.151 9.416-13.613 12.062-3.554 21.251-6.995 27.604-10.399 6.466-.567 11.344-2.231 14.672-5.029l-.038-.491-2.458.718-.529.038-.038-.492c4.689-.68 7.979-1.739 9.756-3.138 9.151-7.034 16.071-12.063 20.76-15.012 14.596-10.626 21.402-20.836 20.57-30.63zm-2.495.643l.34 3.819c-.454.946-.945 1.437-1.399 1.475l-.567-6.504c1.058.378 1.588.756 1.626 1.21zM27.642 52.486l-.643.037-.113-1.172 2.609-.227.038.605c-.416.038-1.059.265-1.891.757zm-12.743 127.47c-1.513-.68-2.874-.945-4.046-.832l-.152-1.853c-.075-.718.341-1.21 1.248-1.399.832-.075 1.324.53 1.399 1.74 2.194-2.685 3.404-4.046 3.631-4.084l1.399.567c-.454 3.782-1.626 5.71-3.479 5.861zM151.067 37.511c-.643.076-1.929-1.928-3.782-5.899l-.113-1.172c1.21-.113 2.458 1.853 3.781 5.899l.114 1.172zm-1.816-14.104l-.529 1.248-18.491-7.714c12.327.416 18.68 2.571 19.02 6.466zM71.166 90.451l-2.609.227-.114-1.173 2.609-.226.114 1.172zm-2.118-40.272l.643-.038.151 1.853c-.605.038-1.399.945-2.382 2.685l-.114-1.286c1.173-1.399 1.778-2.458 1.702-3.214zm-5.483 12.932l.227 2.458-.643.038-.227-2.458.643-.038zm-2.874 4.614l1.248-.114c-.113 2.042-.68 3.139-1.701 3.214l-.643.038c.794-1.361 1.172-2.42 1.096-3.138zm-2.155 6.428l.718-.076.038.605-1.172 1.967-1.248.113-.038-.605c1.248-.113 1.815-.756 1.702-2.004zm-2.118 5.786l-.378 3.1-.643.038-.264-3.063 1.285-.075zm-21.213 60.313c-.832 4.235-1.74 6.39-2.685 6.466l-.038-.605c-.227-2.08.681-4.046 2.723-5.861zm-3.895 8.432l.038.605c.075.832-.303 1.324-1.135 1.361l-.037-.605c-.076-.718.302-1.172 1.134-1.361zm-1.134 17.508l1.966-.189.075.681c-.491.037-1.134.302-1.928.756l-1.248.113c-.076-.642.34-1.134 1.134-1.361h.001zm55.964-17.281c-11.042 5.445-17.546 9.151-19.474 11.079-11.949 4.16-17.886 6.731-17.773 7.752-10.625 4.198-17.621 7.299-20.986 9.227-.794.076-1.929-.227-3.441-.908-.189-2.155.794-3.894 2.873-5.293 1.853-.152 3.63.113 5.332.831 1.967-1.021 5.408-2.155 10.286-3.365l-.114-1.286-3.932.341c.491-.681 4.272-2.458 11.381-5.332l1.967-.189.038.605c-3.366.302-5.219 1.286-5.635 3.063.076.794.53 1.134 1.362 1.059 2.533-1.589 3.781-2.534 3.743-2.799 4.803-.907 18.075-7.865 39.818-20.835l.114 1.172c.038.567-1.815 2.155-5.559 4.878zm-33.352 10.966c3.177-.265 5.899-1.55 8.168-3.781.907-.076 1.399.264 1.437 1.058-1.551.152-4.538 1.437-8.886 3.933l-.643.038-.076-1.248zm53.809-41.331l-16.676 13.198c-12.403 8.13-19.058 12.213-20.003 12.289-19.739 10.853-32.028 16.487-36.793 16.903l-.718.075c.605-2.23 9.377-20.192 26.394-53.998 7.487-.643 19.285-4.121 35.356-10.474l3.932-.341c8.13-.718 14.218.87 18.227 4.652l.226 2.457c-3.025 8.698-6.352 13.765-9.945 15.239zm-32.595-18.339l2.685-.227.037.605-2.684.227-.038-.605zm37.7-6.391l1.967-.189c1.815.87 2.76 1.626 2.836 2.307l.037.605c-1.739.151-3.365-.756-4.84-2.723zm5.332-30.364c-1.739 2.079-6.504 5.634-14.294 10.625-2.571.227-12.138 3.933-28.7 11.193a5.24 5.24 0 0 0-2.647-.453l-.114-1.173c-.189-2.382.87-5.369 3.214-8.999 1.286-6.807 2.685-10.702 4.236-11.647l13.802-31.045c-.152-1.929 2.798-3.404 8.848-4.425l1.966-.189.152 1.778c5.936-.908 9.642-1.437 11.079-1.551 10.966-.945 16.676 1.286 17.13 6.618l1.248-.114-.265-3.138 1.361-.114c3.214 1.778 4.954 3.933 5.181 6.466.151 1.74-.794 3.895-2.799 6.467-.831.075-1.323-.53-1.399-1.74l-1.361.114-.302 3.781c-5.559 8.319-9.605 12.592-12.101 12.819-2.269 3.139-3.668 4.689-4.235 4.727zm8.47 21.743c-1.134-.757-2.042-1.097-2.722-1.059l-.152-1.853 1.248-.113 2.761 1.626c.113.869-.265 1.323-1.135 1.399zm8.773 10.398c1.21.492 1.929 1.021 2.08 1.513l-.605.151.038.038c-.114 0-.265.038-.379.076l-.907.718-.227-2.496zm.832 5.219l-.113-.492 1.588-.378.113.492-1.588.378zm3.819 4.273c1.626-.265 2.42-.378 5.445-1.059l.114.492-5.748 1.323c.076-.265.151-.529.189-.756zm5.597 2.382c-2.42.227-1.891-.076-5.748.794l-.114-.491 4.803-1.551 2.307-.529.226.907c-1.021.227-.264.227-1.474.87zm5.105-1.21c-.568.151-1.021-.113-1.286-.756l1.475-.341c.642-.151 1.058.114 1.21.757l-1.399.34zm13.839-14.899l-.113-.491 2.382-.567.227.907-2.496.151zm14.786 90.678c.151-.681.189-1.172.113-1.513l.53-.113c.642-.151 1.02.076 1.172.681l.113.491-1.928.454zm10.361-86.783l-1.059-.189c-1.702.681-3.139 1.172-4.311 1.437l-.983.227c-.567.151-1.021-.076-1.248-.681l6.92-1.588 2.269-1.059.756.87c-1.097.227-1.891.567-2.344.983zm5.331-1.702l-.113-.491c.34-.076.794-.34 1.286-.832l4.915-1.134.114.491c-2.609.643-4.689 1.286-6.202 1.966zm.757-9.945c-.341.076-.794.379-1.362.832-.075-.34-.756-.34-2.042-.037-.226-.946 3.404-2.269 10.929-4.009l1.058-.227.227.908c-5.294 1.55-8.243 2.42-8.81 2.533zm13.235-14.293c-.53 6.012-2.647 9.416-6.391 10.285l-.113-.491-3.328 1.285-1.475.341c-.756.189-1.437.151-2.042-.038l-.302-1.324c-.114-.491 4.689-7.147 14.445-19.928l1.134.19c.416 1.739-.227 4.953-1.928 9.68zm23.406-20.042l-.453.038-.076-.945 1.966-.189.038.491c-.34.076-.832.265-1.475.605zm-9.642 96.842c-1.135-.53-2.156-.756-3.025-.681l-.114-1.437c-.038-.491.265-.832.908-1.021.643-.075 1.021.378 1.096 1.362 1.626-2.08 2.534-3.139 2.723-3.139l1.021.416c-.378 2.874-1.248 4.386-2.609 4.5zM325.086 37.965c-.492.038-1.437-1.475-2.912-4.538l-.075-.945c.945-.076 1.928 1.399 2.911 4.424l.076 1.059zm-1.361-10.815l-.454.983-13.991-5.861c9.34.303 14.18 1.929 14.445 4.878zm-59.33 50.936l-1.967.189-.075-.946 1.966-.151.076.908zm-1.626-30.592l.529-.038.113 1.437c-.491.038-1.096.719-1.815 2.042l-.075-.945c.87-1.097 1.285-1.929 1.248-2.496zm-4.122 9.832l.151
                                         1.853-.529.038-.152-1.853.53-.038zm-2.231 3.517l.983-.076c-.113 1.588-.529 2.42-1.248 2.496l-.529.037c.567-1.058.832-1.89.794-2.457zm-1.588 4.84l.454-.038.037.491-.869 1.513-.984.076-.037-.492c1.021-.076 1.474-.605 1.399-1.55zm-1.588 4.386l-.341 2.42-.454.038-.189-2.382.984-.076zm-16.147 45.868c-.643 3.177-1.323 4.803-2.042 4.878l-.038-.416c-.113-1.588.567-3.1 2.08-4.462zm-2.987 6.391l.037.416c.076.68-.226 1.059-.907 1.096l-.038-.491c-.038-.492.265-.832.908-1.021zm-.832 13.31l1.512-.113.038.491c-.34.038-.87.227-1.475.568l-.983.075c-.038-.529.265-.869.908-1.021zm42.465-13.121c-8.319 4.122-13.273 6.92-14.823 8.357-9.076 3.176-13.575 5.143-13.5 5.937-8.054 3.214-13.348 5.52-15.844 6.995-.605.038-1.475-.189-2.609-.718-.151-1.626.605-2.95 2.193-3.933 1.437-.113 2.798.076 4.046.605 1.513-.756 4.122-1.588 7.828-2.533l-.076-.946-3.101.227c.379-.529 3.29-1.891 8.698-4.084l1.512-.113.038.416c-2.571.227-4.008.983-4.311 2.344.038.605.416.908 1.059.832 1.891-1.248 2.798-1.966 2.798-2.193 3.63-.643 13.689-5.937 30.214-15.844l.075.945c.038.416-1.361 1.626-4.197 3.706zm-25.335 8.319c2.457-.227 4.537-1.172 6.277-2.836.642-.076 1.021.227 1.058.832-1.134.113-3.365 1.059-6.731 2.874l-.529.038-.075-.908zm40.914-31.423l-12.592 10.134c-9.416 6.163-14.52 9.264-15.315 9.34-14.974 8.243-24.276 12.516-27.944 12.819l-.529.038c.453-1.702 7.147-15.353 20.079-40.991 5.634-.491 14.558-3.176 26.81-8.016l3.063-.265c6.163-.529 10.777.681 13.802 3.592l.151 1.853c-2.307 6.504-4.802 10.323-7.525 11.496zm-24.73-13.916l1.966-.189.038.492-1.966.189-.038-.492zm28.625-4.878l1.513-.113c1.399.68 2.117 1.286 2.155 1.777l.038.416c-1.324.113-2.572-.567-3.706-2.08zm3.97-23.028c-1.323 1.588-4.915 4.31-10.776 8.092-1.967.189-9.227 2.987-21.781 8.432-.605-.227-1.286-.302-2.005-.264l-.075-.946c-.151-1.815.643-4.084 2.382-6.844.983-5.218 2.08-8.13 3.214-8.811l10.55-23.596c-.113-1.399 2.118-2.533 6.656-3.403l1.512-.113.114 1.437c4.462-.719 7.26-1.135 8.394-1.248 8.319-.719 12.668.945 13.008 5.029l.983-.076-.189-2.269.984-.075c2.42 1.323 3.705 2.912 3.857 4.802.113 1.362-.568 3.025-2.005 4.954-.642.075-1.02-.378-1.096-1.361l-.983.075-.303 2.836c-4.197 6.391-7.26 9.681-9.189 9.832-1.701 2.307-2.76 3.479-3.252 3.517zm4.425 15.73l-.114-1.437.983-.075 2.118 1.285c.038.605-.265.946-.908 1.021-.907-.567-1.588-.832-2.079-.794zm-176.024 91.85l-.983.227-.832.718c.151.605.529.832 1.172.681.643-.151.908-.529.757-1.134l-.114-.492zm-3.743-7.449l.113.491c.643-.151.907-.529.756-1.134l-.113-.492c-.605.152-.87.53-.756 1.135zm26.62-63.339l1.135-.264-.227-.983-1.134.264.226.983zm343.124 28.815c-11.496 2.571-12.933 2.117-15.353 2.306l.076.946 1.059-.076.567-.038-.151-.113 1.247-.492c11.382-1.248 12.706-.794 12.592-2.08l-.037-.453zm-61.902 8.205l.076.946h.151l-.075-.946h-.152zm-7.109-24.919l-1.021-.34c-.832 2.231-1.248 3.554-1.21 3.932l.038.416c.794-.038 1.513-1.399 2.193-4.008zm71.355 16.525l.076.945 1.663.302-.075-.945-1.664-.302zm-78.237 9.566l-2.571-.302-.454.983.038.492 15.314-1.286-.075-.945-12.252 1.058zm-6.958-33.54l-.037-.492-.53.038-.945.605.529.907c.719-.075 1.059-.416.983-1.058zm92.455 17.016l.719-.076c.416-.038.605-.378.567-.983l-.416-.908c-2.609.227-3.819.341-5.937 1.513l-.038-.491-3.138.302c-.076-.945-.34-1.437-.756-1.399l-1.626.151c-1.891.151-2.799.076-3.744.794-.038-.34-.151-.491-.34-.491l-1.815.151-1.059.605c-.038-.34-.151-.492-.341-.492l-.642.568-.038-.492-2.534-.189-.605.038.076.945 1.286.34 1.21-.075c.416.265.869.34 1.399.302l1.059-.529.037.416c-5.936 1.475-5.899 1.21-9.983 1.891-.453-.303-.794-.454-1.021-.416l-.075.075c-.454-.038-.719-.34-.756-.832l2.117-.264c.151 0 .265.151 1.437.378 1.702-.832 1.777-1.173 2.685-1.248l-.076-.946c-5.823 1.135-3.479.379-10.777 1.021l-.34.038-.076-.945c9.378-1.134 6.24-.492 9.454-1.399.038.34.151.491.34.491a2.198 2.198 0 0 1 1.286-.642l.643-.038c3.289-.265 4.386.378 10.89-1.437l.038.416 1.059-.53.983-.075c-.076-.946 1.361-1.097 1.853-1.135l-.076-1.021c-11.42 2.307-14.407 1.664-17.583 2.572l-.038-.416c-2.987.529-3.101.302-3.857.34-.227.038-.567.227-.946.605-.037-.34-.151-.492-.378-.492-.113 0-.151.038-.189.038l-9.68 1.588c-.038-.264-.151-.415-.378-.378-5.029 1.059-3.668 1.248-10.399 1.853-.303.038-.718.189-1.248.53-.038-.265-.189-.416-.529-.379l-4.122.341-2.76.68c-.038-.264-.189-.415-.53-.378-1.55.416-2.911.681-4.008.757h-.076c-.68.075.341-.189-.189-.416l-.832.491c-1.21.114-.567-.075-4.726-.038-7.298.908-6.504 1.021-7.298 1.059l-2.723-.189c.038.265-.113.454-.416.454-3.101-.416-4.689-.908-4.727-1.475.416-2.949 1.135-4.462 2.156-4.538l.529-.037-.454.983.53-.038c.983-.529 1.437-1.021 1.399-1.475l-.076-1.021-.983.076-.076-.945c-.075-.719.038-1.362.303-1.891l2.231-3.592.076.945 1.058-.076-.075-.945-.605-.87c.794-.68 1.399-1.059 1.89-1.096l-.037-.492-1.437.114-.114-1.437c2.874-5.975 4.235-9.454 4.16-10.437l1.021.416c.643-.038.945-.416.907-1.097l-.983.076-.038-.416a3.613 3.613 0 0 1 .378-2.004c1.551-1.626 2.269-3.252 2.118-4.954.303-.038.454.114.492.454 1.323-.756 2.344-2.76 3.1-6.088 2.345-4.235 5.672-12.705 10.021-25.373 8.319-22.386 7.979-24.768 9.151-30.062l-.983.075c.075.681-.076 1.324-.378 1.929-.681-.265-1.21-.416-1.588-.378l-.038-.416c-.152-1.929.643-4.235 2.458-6.958l.453-.038.832 3.252.983-.075c-.037-.227.227-1.513.757-3.895-.038-.492-.416-.794-1.173-.832l-.945.605c-.075-.681-.038-2.458.076-5.294l-.492.038c-.832-.832-1.248-1.513-1.286-2.08l-5.407.529c-.038-.378-.227-.945-.605-1.663-.038-.492 1.172-.984 3.668-1.475l1.097.416 1.021-.605c.037.34.226.491.604.454l1.021-.605c.038.34.227.491.606.453l.491-.037-.076-1.097c-.756.076-2.76.076-5.936-.038l-1.021.681-.038-.605c-25.373 2.079-39.78 3.252-43.221 3.592-.454.038-2.231 0-5.37-.076.038.416-.34.643-1.096.719l-1.097-.492-3.706.946c-.87.075-2.344.037-4.386-.189-.567.453-1.248.718-2.08.794-.454.037 5.407-.303 10.852-.681-.567.454-1.436.718-2.646.832-.832.076-1.551-.038-2.156-.378-.832.378-3.516.983-8.016 1.89l-1.097-.415-17.697 2.722c-.681-.34-1.475-.454-2.382-.378-.946.076-2.534.416-4.727 1.021l-8.546 3.554.643 1.059c.416-.038 1.021-.264 1.739-.68l3.026.264-.379 2.836c-2.798 1.248-4.424 3.101-4.878 5.446-4.197 1.852-6.277 3.176-6.277 3.97l.038.492.643-.038 1.134-.605 1.324 1.588.189 2.193c.075.681-6.996 15.542-21.138 44.583-12.252 27.982-18.68 43.297-19.285 46.057-4.197 1.172-6.618 2.874-7.336 5.143.076.718 1.323 1.21 3.743 1.399l.114 1.096-1.097 1.815.189 2.194c.114 1.134 3.177 2.004 9.189 2.609-.038-.378.152-.605.567-.643.114 1.361-.264 4.008-1.134 7.941l.643-.038c2.495-3.403 3.668-5.748 3.554-7.033l.53-.038c.605-.038 1.248.643 2.004 2.117-.756.303-3.403 6.315-7.941 18.076l.643 1.058.643-.037c5.558-14.067 9.037-21.857 10.474-23.332 7.298-.643 19.928-1.928 37.852-3.857l1.134-.68c.038.378.265.567.681.529l1.172-.113 1.135-.681c.037.378.264.567.68.529l13.575-1.172c3.593-.302 5.294-1.399 5.143-3.252-.038-.491 2.08-1.059 6.353-1.664.416-.038 1.021.076 1.853.341-.038-.341 2.117-.681 6.428-1.059.114-2.269.832-3.479 2.118-3.592l-.114-1.097c-1.21.113-2.571.416-4.159.945-2.836-.151-4.651-.378-5.408-.643-.756.416-1.323.643-1.739.681l-9.454.303-1.134.605c-.038-.341-.265-.492-.681-.454l-.529.038-1.21.605c-.038-.341-1.021-.605-2.988-.87l-1.209.718-2.345.189-.038-.605c12.176-1.323 18.189-2.987 18.037-4.953.795-.076 1.211.302 1.286 1.097l3.555-.908-.114-1.097-29.154.794c.037.379-.152.605-.567.643l-3.555-.302c-.908.075-1.664.34-2.269.794l-1.323-.492c-3.668.303-6.391.757-8.206 1.324-2.496-.189-5.256-.152-8.319.113l-6.542.567-3.025-.34c-.151-1.928 3.592-11.42 11.306-28.436 2.232-5.748 4.273-9.34 6.24-10.701.416-.038 1.021.113 1.853.453l4.651-1.588 2.382.378c4.008-.34 8.659-1.474 13.991-3.441 1.324-.113 2.307-.037 3.025.265l3.555-.832 10.588-.907c4.499-.378 9.377-1.362 14.671-2.988l-.113-1.096c-1.966.189-2.987-.151-3.063-.946-.113-1.474-1.55-2.079-4.311-1.853l-.113-1.096 2.912-.832 7.638-.643-.114-1.096c-.302.037-1.852 0-4.726-.114l-.114-1.172 2.95-.265c.794-.075 1.134-.454 1.059-1.21-3.971.114-5.975-.075-6.013-.605-27.68 1.361-41.557 1.626-41.633.756-.416.038-.983.303-1.739.757l-.719-1.135c7.336-15.579 11.647-23.444 12.895-23.558.037.605-.265 1.588-.946 2.912l.038.491 1.172-.113c2.912-6.958 5.37-10.55 7.412-10.701 8.697-.757-1.21-1.324 17.394-4.235.757.34 1.286.491 1.664.453 7.298-1.474 17.47-3.025 30.516-4.613l-.076-1.097-6.958.643-.075-1.096c.832-.076 1.512-.341 2.08-.794l.037.605c.379-.038.908-.303 1.589-.757 1.21-.113 2.117 0 2.76.341 2.42-.643 4.386-1.021 5.823-1.173l4.349-.416c1.059-.68 1.55-1.285 1.513-1.852l-.038-.492c-1.097.113-2.345.038-3.819-.227-.038-.605.264-1.021.983-1.21l8.092-.756 3.706-.946c.037.416.227.568.529.568.378-.038.908-.303 1.588-.757.189.038.416.038.605.076-.491 1.021-1.059 2.496-1.626 4.424l-1.059.076c-.075-.719-.264-1.361-.605-1.929l-.529.038c-9.832 27.377-14.218 40.121-23.293 61.145-1.664 5.37-3.063 8.357-4.273 9 .038.605.416.907 1.059.832.226 2.647-.379 5.256-1.853 7.827-4.198 12.101-6.996 18.718-8.433 19.928l.945 5.71c.038.605-.264.945-.907 1.021l-.983.076c-.152-1.589-.719-2.345-1.74-2.231l-.529.038c-1.286 2.004-2.269 4.31-2.912 6.995l.983-.076c1.324-.869 1.929-1.89 1.815-3.063l1.967-.189 1.134.416c-.907 1.437-1.323 2.572-1.248 3.441l.53.908-1.286 3.025.038.492c1.134-.114 2.382.264 3.706 1.058.907-.075 1.89-.491 2.987-1.21 1.134-.113 5.369-.151 12.668-.151l3.667-1.248c4.463-.038 5.181.076 9.038-.264l1.588-.152.832-.567.038.492c4.046-.341 4.311-.076 7.487.302l.038.492-2.231.189.075.945c.681-.075 1.286-.265 1.778-.68.567-.038.907.264.945.945-.907.076-1.928.302-3.063.681l-.983-.341c-1.55.416-1.21.53-2.269.605l-1.55-.302c.038.264-.114.453-.378.453.037.606.378.908.945.87l1.588-.151 8.281-.719 3.139-.68c.038.265.151.416.416.378l1.512-.567 2.837-.227c2.193-.189 2.155-.34 6.919-1.097-.037-.302.076-.416.303-.453l.038.415c7.752-1.323 8.243-1.399 9.491-1.815l.113.227c1.929-.453.832-.34 1.362-.718.038.34.151.491.34.491l1.361-.113-.075-1.021-2.761-.038-.037-.075c-.114.037-.19.037-.303.075h-.378v.076c-1.853.378-1.891.113-3.101.227l-6.92.378-.038-.492 3.857-.529 1.399-.114.795-.567.037.492c5.446-.454 7.374.907 32.558-4.462 1.361-.114 1.248-1.248
                                          2.118-3.593a2.354 2.354 0 0 1-1.324-.302c-2.079.794-3.176.416-7.184 1.059-.341.038-.605-.265-.719-.87l-.038-.416 3.857.113c.719-.075 2.118-.189 4.198-1.361 0 .341-.757.53-.303.492zm-186.195 2.987l-1.778.151c-.075-.718.87-3.441 2.836-8.092l1.173-.113c.038 1.096-.681 3.781-2.231 8.054zm2.155-8.621l-.038-.492c-.038-.605.341-1.021 1.173-1.21l.037.491c.038.719-.34 1.135-1.172 1.211zm23.634 18.264l.038.491-2.95.265-.038-.492 2.95-.264zm-3.555-.303c.038.605-.869 1.286-2.836 1.966l-3.63-.264-1.172.113-.113-1.096 7.751-.719zm23.899-110l-1.778.151-.037-.605c-.038-.605.302-1.021 1.058-1.21l.643-.038 1.21.491c.038.719-.302 1.135-1.096 1.211zm27.037-5.294l.567-.038.075 1.096-1.626.152c-.037-.605.265-1.021.984-1.21zm-6.807 2.382l-2.685-.303-.038-.491c3.517-.303 4.689-.681 6.845-1.286.038.416.416.567 1.096.492l.076 1.096-1.059.114c-.832.075-1.55-.038-2.155-.378-.643.416-1.324.68-2.08.756zm3.366 9.794l-.038-.492 4.348-.416.038.492-4.348.416zm4.651-3.782l-.038-.605 2.117-.189.038.605-2.117.189zm.491-7.411l-.567.038.492-1.173 4.84-.453.038.605c-1.248.113-2.874.453-4.803.983zm2.458 10.436l-.076-1.096 2.118-.189c.719-.076 1.097.264 1.135 1.021l-3.177.264zm12.819-17.47l-2.723.757-.491.037c-1.286.114-2.95.076-4.916-.113 3.517-.227 6.882-.492 8.13-.681zm-2.912 12.101l.038.491-3.743.341-.038-.492 3.743-.34zm6.126 2.911c-.038-.453-.756-.756-2.231-.907l-3.743 1.059-2.874.113c-.643-.454-.983-.756-1.021-.983l3.328.189 7.487-1.21 3.819.151.038.605c-1.891.189-3.479.53-4.803.983zm38.533-9.945c.453.038.756.038.869.038 1.324-1.285 2.799-2.306 4.5-3.025-1.361 5.975-3.479 10.399-6.39 13.273L445.75 21.1c1.777-4.5 2.836-7.487 3.139-9zm-6.504 11.156l.529-.038c-.719 1.361-1.361 2.079-1.891 2.117l-.113-1.437c.34 0 .832-.227 1.475-.642zm-4.198 10.02c1.021-4.084 2.004-6.39 2.912-6.995l.038.491c-.53 3.782-1.362 5.786-2.458 5.937l.189 2.382c-.908 1.286-1.324 2.269-1.286 3.025l-.529.038-.303-3.29c.605-.075 1.097-.605 1.437-1.588zm-1.626 5.445c.038.568-.34 1.891-1.096 3.933l-.53.038-.113-1.437c.718-1.664 1.323-2.496 1.739-2.534zm-30.515 88.56l-.038-.415.983-.076.113 1.437c-.529.038-.907-.265-1.058-.946zm43.599 1.135c-.038-.34-.189-.492-.529-.454l-2.458.227-.038-.492h.227l5.823-.491.038.491c-1.702.076-2.723.341-3.063.719zm-2.912-1.21c.227.113.114.227 0 .302-.113-.037-.264-.151 0-.302zm.303-6.807l-3.252.265-.038-.492 2.949-.264 2.572-.643c.038.302.189.416.529.378 3.063-.529 2.761-.68 4.235-.794.492-.038.795.265.832.87l-7.827.68zm11.382-.983c-1.815-.189-1.929-.34-3.214-.227l-.038-.416 2.911-.264.038.416c-.302.038.794.113.303.491zm.227-.529l-.038-.416 1.588-.151.038.416-1.588.151zm3.516-.303l-.037-.416c.264-.037.642-.226 1.134-.605.794-.075 1.21.454 1.286 1.059l-2.383-.038zm4.5-.567l-.038-.491 1.929-.152.038.492-1.929.151zm2.685-.227c-.038-.567.189-.907.681-.983l.642.832c-.037-.265.076-.416.303-.454l.492.908-2.118-.303zm-28.549 12.328l-.076-.946-.303.038.076.945.303-.037zm66.439-17.206c.302-.189.453-.378-.265-.491-.341.378.378.491-.378.529l.037.34c.076-.075.265-.189.416-.302l-.416.34v.038l-.794 1.021 1.588-.567h.19l-.076-.946-.302.038zm2.76 2.156l-.303.038.076.945 2.231-.189c-.038-.605-1.513-.794-2.004-.794zm-3.441-1.664l.038-.038v-.038s-.038.038-.038.076z" />
                                    <path
                                        d="M361.387 43.41l.038.605 1.248-.113c-.038-.378.113-.983.378-1.74l-.113-1.096c-.53.038-1.059.832-1.551 2.344zm-11.949-28.738l-.113-1.097-1.778.151.114 1.097 1.777-.151zm-34.675 64.926c-.076-1.021-3.252-4.991-9.529-11.987-.114-1.285 2.042-3.214
                                             6.466-5.747l12.63-11.004c2.836-3.593 4.499-9.416 4.991-17.508l-.151-1.853c-.492-5.597-4.538-10.096-12.214-13.537-4.538-3.063-12.706-4.765-24.503-5.068-9.756.832-22.5 4.311-38.192 10.475-4.311 3.101-9.227 
                                             6.201-14.748 9.302l.076.946c.34-.038.869-.227 1.475-.643.642-.076 1.021.227 1.058.832l.946-.492.453-.038.038.416c.038.492-3.365 3.176-10.247 7.979l.529.983-.454.038-1.134-.416c.038.34-.454.567-1.399.643l.038.416 1.096 1.361c-.34.038-.869-.113-1.588-.378-1.588.151-3.139.983-4.689 2.571l.643-2.798c2.307-9.945
                                              3.895-18.756 4.727-26.394l-.114-.492c-1.588-1.021-3.138-2.458-4.575-4.273.038-1.172.038-1.853 0-2.004l-.114-.416-.453.114c-4.992 7.487-14.597 20.268-28.852 38.343-10.853 12.857-16.45 20.003-16.79 21.44-4.424 4.576-6.542 7.336-6.315 8.282-1.172.756-1.664
                                               1.512-1.474 2.344-.341.076-.568-.038-.643-.378-1.891 3.063-4.689 5.029-8.433 5.899l-3.933.907c-.529.114-.794.492-.756 1.135l.114.491 1.474-.34.114.416-3.328 1.286-5.899 
                                               1.361-3.1.189c-.454.454 2.457-.038 1.323.227l-3.857.908c-2.344.529-3.63.34-3.857-.605l-.454.113c.076.416.114.718.038.983l-.227-.945-3.101.718c-.226-1.437-4.424-6.655-12.554-15.655-.151-1.739 2.723-4.273 8.584-7.562l16.562-14.559c3.706-4.764 5.899-12.403 
                                               6.618-22.915l-.227-2.458c-.643-7.411-6.012-13.386-16.109-17.999-5.974-4.046-16.713-6.202-32.217-6.542-12.857 1.096-29.646 5.672-50.293 13.651-5.672 4.121-12.138 8.205-19.398 12.251l.113 1.286c.492-.038 1.135-.302 1.929-.756.832-.076 1.286.302 1.361 1.059l1.286-.719.643-.038.037.605c.038.605-4.462 4.122-13.575 10.55l.719 1.135-.643.038-1.399-.492c.038.378-.605.643-1.929.756l.076.681 1.512 1.664c-.491.038-1.172-.114-2.041-.416-2.95.264-5.824 2.382-8.66 6.39l.719 1.135c2.458-2.269 3.894-3.403
                                                4.31-3.441l.152 1.853c-.416.037-1.059.302-1.929.756l1.551 2.344a51.252 51.252 0 0 1 9.869-8.281c1.777.454 2.723 1.021 2.76 1.626l1.362-.113c9.756-7.223 19.398-12.441 28.965-15.655l.114 1.285c-1.778 2.647-2.988 4.009-3.631 4.084.076.908.379 1.702.946 2.383.151 1.626-4.198 12.592-13.008 32.86C30.44 121.307 13.651 156.171
                                                 0 178.708c.038.454.303 1.059.794 1.815 3.366-.794 5.483-1.625 6.391-2.42l.718-.075.114 
                                                 1.285 1.247-.113 1.286-.718c.038.378.454.567 1.324.491l.113 1.286c.113 1.248-.605 
                                                 3.138-2.118 5.747-1.361 1.551-2.836 4.803-4.386 9.757l.038.604 1.248-.113c5.445-6.088 9.567-12.063 12.403-17.886 15.882-4.651 27.982-9.227 36.377-13.726 8.432-.719 14.86-2.95 19.247-6.618l-.076-.68-3.176.945-.719.076-.075-.681c6.201-.945 10.474-2.307 12.857-4.197 12.062-9.303 21.175-15.882 27.339-19.777 12.668-9.302 
                                                 20.911-18.378 24.655-27.188.68-.152 1.361-.303 2.117-.492 1.777-.075 2.761-.113 3.025-.189-.075-.34.076-.529.416-.605 2.836-.302 1.475.189 3.29-.227l4.765-1.096.794-.19-.378.227c.529.076 1.096.038 1.739-.113l.34 1.399-21.667 34.448-4.802 6.013-2.345 7.865.454-.113 2.344-.983-.756 3.063.227.907.643.794c-.303.076-.416.265-.341.605l.114.492.983-.227c1.437-1.248 2.042-2.382
                                                  1.815-3.403 1.55.264 2.571.378 3.101.227l.113.491c-.945.227-1.437.983-1.512 2.269l.113.491.53-.113c7.865-8.584 27.15-37.965 42.616-57.893-.492-2.155 7.563-5.143 24.201-9l.529-.113c.605 2.609-.68 8.924-3.857 18.945-2.042 6.05-3.025 9.377-2.874 9.907-2.647 8.054-3.895 12.403-3.743 13.083l-5.899 19.323c-3.82 9.908-6.731 20.306-8.773 31.272.34-.075.87-.037 1.626.152l.832-.719c.075.341.302.454.643.378l-.341-1.399 2.572-.075c.756-.189 1.399-1.135 1.928-2.874-.113-2.609.416-4.008 1.588-4.311 1.588-6.201 2.572-9.302 2.912-9.416 1.475-6.163 2.571-9.68 3.29-10.55 2.231-8.016 3.857-12.138 4.916-12.403l.227.983-1.626 4.198c-2.837 12.592-5.71 22.537-8.622 29.835l.832 3.63.529-.113c7.034-15.126 17.168-45.075 30.365-89.846.378-3.933 2.269-6.996 5.634-9.151l-.756-.794-.114-.416c1.513-.341 2.572-.945 3.177-1.777-.076-.341-1.399-.832-3.971-1.513l6.58-28.209c1.437-1.286 2.269-1.966 2.533-1.966l.114 1.436c-.34.038-.87.227-1.475.643l1.248 1.778c2.269-2.458 4.727-4.576 7.411-6.353 1.362.378 2.042.832 2.118 1.285l.983-.075c7.487-5.483 14.823-9.416 22.046-11.798l.075.945c-1.323 2.004-2.231 3.025-2.722 3.063.075.681.264 1.286.605 1.815.113 1.248-3.139 9.567-9.794 24.995-15.201 35.734-27.945 62.166-38.306 79.334.038.34.265.794.681 1.399 2.534-.605 4.16-1.248 4.803-1.853l.453-.038.076.945 1.059-.075.945-.492c.038.265.378.378 1.021.341l.076 1.021c.075.907-.454 2.344-1.626 4.31-1.097 1.173-2.231 3.631-3.441 7.374l.037.492.984-.076c4.121-4.613 7.26-9.151 9.415-13.613 12.063-3.554 21.252-6.996 27.604-10.399 6.467-.567 11.344-2.231 14.672-5.029l-.038-.492-2.458.719-.529.038-.038-.492c4.689-.681 7.979-1.739 9.756-3.138 9.151-7.034 16.071-12.063 20.76-15.013 14.596-10.625 21.403-20.835 20.571-30.629zm-2.496.643l.34 3.819c-.453.946-.945 1.437-1.399 1.475l-.567-6.504c1.059.378 1.588.756 1.626 1.21zM25.94 49.461l-.642.037-.114-1.172 2.609-.227.038.605c-.416.038-1.059.265-1.891.757zm-12.743 127.47c-1.512-.681-2.874-.945-4.046-.832L9 174.246c-.076-.718.34-1.21 1.248-1.399.831-.075 1.323.53 1.399 1.74 2.193-2.685 3.403-4.046 3.63-4.084l1.399.567c-.454 3.781-1.626 5.71-3.479 5.861zM149.365 34.486c-.643.076-1.929-1.928-3.781-5.899l-.114-1.172c1.21-.113 2.458 1.853 3.781 5.899l.114 1.172zm-1.815-14.104l-.53 1.248-18.491-7.715c12.328.416 18.681 2.572 19.021 6.467zM69.464 87.426l-2.609.227-.113-1.173 2.609-.227.113 1.173zm-2.118-40.272l.643-.038.152 1.853c-.605.038-1.399.945-2.383 2.685l-.113-1.286c1.172-1.399 1.777-2.458 1.701-3.214zm-5.483 12.932l.227 2.458-.642.038-.227-2.458.642-.038zM58.99 64.7l1.248-.114c-.114 2.042-.681 3.139-1.702 3.214l-.643.038c.794-1.361 1.172-2.42 1.097-3.138zm-2.156 6.428l.719-.076.037.605-1.172 1.967-1.248.113-.037-.605c1.248-.113 1.815-.756 1.701-2.004zm-2.117 5.786l-.378 3.1-.643.038-.265-3.063 1.286-.075zm-21.214 60.313c-.832 4.235-1.739 6.39-2.685 6.466l-.037-.605c-.227-2.08.68-4.046 2.722-5.861zm-3.895 8.432l.038.605c.076.832-.302 1.324-1.134 1.361l-.038-.605c-.076-.718.302-1.172 1.134-1.361zm-1.134 17.508l1.966-.189.076.681c-.492.037-1.135.302-1.929.756l-1.248.113c-.075-.643.341-1.134 1.135-1.361zm55.964-17.281c-11.041 5.445-17.545 9.151-19.474 11.079-11.949 4.16-17.886 6.731-17.772 7.752-10.626 4.198-17.622 7.298-20.987 9.227-.794.075-1.928-.227-3.441-.908-.189-2.155.794-3.895 2.874-5.294 1.853-.151 3.63.114 5.332.832 1.966-1.021 5.407-2.155 10.285-3.365l-.113-1.286-3.933.34c.491-.68 4.273-2.457 11.382-5.331l1.966-.189.038.605c-3.365.302-5.218 1.285-5.634 3.063.075.794.529 1.134 1.361 1.058 2.534-1.588 3.781-2.533 3.744-2.798 4.802-.907 18.075-7.865 39.818-20.835l.113 1.172c.038.567-1.815 2.155-5.559 4.878zm-33.351 10.966c3.176-.265 5.899-1.55 8.167-3.781.908-.076 1.4.264 1.437 1.058-1.55.152-4.537 1.437-8.886 3.933l-.643.038-.075-1.248zm53.809-41.331L88.22 128.756c-12.403 8.13-19.058 12.214-20.042 12.29-19.738 10.852-32.028 16.487-36.792 16.903l-.719.075c.605-2.231 9.378-20.192 26.394-53.998 7.487-.643 19.285-4.122 35.356-10.474l3.933-.341c8.13-.718 14.218.87 18.226 4.651l.227 2.458c-2.987 8.66-6.315 13.727-9.907 15.201zM72.3 97.182l2.685-.227.038.605-2.685.227-.038-.605zm37.701-6.391l1.966-.189c1.815.87 2.76 1.626 2.836 2.307l.038.605c-1.74.151-3.366-.757-4.84-2.723zm5.331-30.364c-1.739 2.079-6.504 5.634-14.293 10.625-2.572.227-12.139 3.933-28.701 11.193a5.25 5.25 0 0 0-2.647-.454l-.113-1.172c-.189-2.382.869-5.369 3.214-8.999 1.285-6.807 2.685-10.702 4.235-11.647l13.802-31.045c-.151-1.929 2.798-3.404 8.848-4.425l1.967-.189.151 1.778c5.937-.908 9.642-1.437 11.079-1.551 10.967-.945 16.676 1.286 17.13 6.618l1.248-.114-.265-3.138 1.362-.114c3.214 1.777 4.953 3.933 5.18 6.466.151 1.74-.794 3.895-2.798 6.467-.832.075-1.324-.53-1.399-1.74l-1.362.114-.302 3.781c-5.559 8.319-9.605 12.592-12.1 12.819-2.269 3.138-3.668 4.689-4.236 4.727zm8.471 21.743c-1.135-.757-2.042-1.097-2.723-1.059l-.151-1.853 1.248-.114 2.76 1.627c.114.869-.265 1.323-1.134 1.399zm8.773 10.398c1.21.492 1.928 1.021 2.079 1.513l-.605.151.038.038c-.113 0-.265.038-.378.076l-.908.718-.226-2.496zm.831 5.219l-.113-.492 1.588-.378.114.492-1.589.378zm3.82 4.273c1.626-.265 2.42-.378 5.445-1.059l.113.491-5.747 1.324c.075-.265.151-.529.189-.756zm5.596 2.382c-2.42.227-1.891-.076-5.748.794l-.113-.492 4.84-1.55 2.307-.529.227.907c-1.059.227-.303.227-1.513.87zm5.105-1.21c-.567.151-1.021-.113-1.286-.756l1.475-.341c.643-.151 1.059.114 1.21.757l-1.399.34zm13.84-14.899l-.114-.491 2.383-.568.227.908-2.496.151zm14.785 90.678c.151-.681.189-1.172.113-1.513l.53-.113c.643-.151 1.021.076 1.172.681l.114.491-1.929.454zm10.361-86.783l-1.059-.189c-1.701.681-3.138 1.172-4.311 1.437l-.983.227c-.567.151-1.021-.076-1.248-.681l6.92-1.588 2.269-1.059.757.87c-1.097.227-1.891.567-2.345.983zm5.332-1.702l-.114-.491c.341-.076.794-.34 1.286-.832l4.916-1.135.113.492c-2.609.643-4.689 1.286-6.201 1.966zm.756-9.945c-.34.076-.794.378-1.361.832-.076-.34-.756-.34-2.042-.038-.227-.945 3.403-2.268 10.928-4.008l1.059-.227.227.908c-5.294 1.55-8.244 2.42-8.811 2.533zm13.235-14.293c-.529 6.012-2.647 9.415-6.391 10.285l-.113-.491-3.328 1.285-1.474.341c-.757.189-1.437.151-2.042-.038l-.303-1.324c-.113-.491 4.689-7.147 14.445-19.928l1.134.189c.416 1.74-.226 4.954-1.928 9.681zm23.407-20.042l-.454.038-.076-.945 1.967-.189.037.491c-.34.076-.831.265-1.474.605zm-9.643 96.842c-1.134-.53-2.155-.757-3.025-.681l-.113-1.437c-.038-.491.264-.832.907-1.021.643-.075 1.021.378 1.097 1.361 1.626-2.079 2.533-3.138 2.722-3.138l1.021.416c-.378 2.874-1.247 4.386-2.609 4.5zM323.384 34.94c-.491.038-1.437-1.475-2.911-4.538l-.076-.945c.945-.076 1.929 1.399 2.912 4.424l.075 1.059zm-1.361-10.815l-.454.983-13.991-5.861c9.34.303 14.18 1.929 14.445 4.878zm-59.33 50.936l-1.966.189-.076-.946 1.966-.189.076.946zm-1.626-30.592l.529-.038.114 1.437c-.492.038-1.097.719-1.815 2.042l-.076-.945c.87-1.097 1.286-1.929 1.248-2.496zm-4.122 9.832l.152 1.853-.53.038-.151-1.853.529-.038zm-2.231 3.516l.983-.075c-.113 1.588-.529 2.42-1.247 2.495l-.53.038c.567-1.058.832-1.89.794-2.458zm-1.588 4.841l.454-.038.038.491-.87 1.513-.983.076-.038-.492c1.021-.076 1.475-.605 1.399-1.55zm-1.588 4.386l-.34 2.42-.454.038-.189-2.382.983-.076zm-16.147 45.868c-.642 3.177-1.323 4.803-2.042 4.878l-.037-.416c-.114-1.588.567-3.101 2.079-4.462zm-2.987 6.391l.038.416c.076.68-.227 1.058-.908 1.096l-.037-.491c-.038-.492.264-.832.907-1.021zm-.832 13.31l1.513-.113.037.491c-.34.038-.869.227-1.474.568l-.983.075c-.038-.529.264-.869.907-1.021zm42.465-13.121c-8.319 4.122-13.273 6.92-14.823 8.357-9.075 3.176-13.575 5.142-13.499 5.936-8.055 3.215-13.349 5.521-15.844 6.996-.605.038-1.475-.189-2.61-.718-.151-1.626.605-2.95 2.194-3.933 1.437-.113 2.798.076 4.046.605 1.512-.756 4.121-1.588 7.827-2.534l-.075-.945-3.063.265c.378-.53 3.289-1.891 8.697-4.084l1.512-.114.038.416c-2.571.227-4.008.984-4.311 2.345.038.605.416.907 1.059.832 1.891-1.248 2.798-1.967 2.798-2.193 3.631-.643 13.689-5.937 30.214-15.844l.075.945c0 .378-1.399 1.588-4.235 3.668zm-25.335 8.319c2.458-.227 4.538-1.172 6.277-2.836.643-.038 1.021.227 1.059.832-1.135.113-3.366 1.059-6.731 2.874l-.529.037-.076-.907zm40.915-31.423l-12.592 10.134c-9.416 6.163-14.521 9.264-15.315 9.34-14.974 8.243-24.277 12.516-27.945 12.819l-.529.037c.454-1.701 7.147-15.352 20.079-40.99 5.634-.491 14.559-3.176 26.81-8.016l3.063-.265c6.164-.529 10.777.681 13.802 3.592l.152 1.853c-2.307 6.504-4.803 10.323-7.525 11.496zm-24.731-13.916l1.967-.189.037.492-1.966.189-.038-.492zm28.625-4.878l1.513-.113c1.399.68 2.118 1.285 2.155 1.777l.038.416c-1.323.113-2.571-.567-3.706-2.08zm3.971-23.029c-1.324 1.589-4.916 4.311-10.777 8.093-1.966.189-9.227 2.987-21.781 8.432-.605-.227-1.286-.302-2.004-.265l-.076-.945c-.151-1.815.643-4.084 2.383-6.844.983-5.219 2.079-8.13 3.214-8.811l10.55-23.596c-.114-1.399 2.117-2.533 6.655-3.403l1.513-.113.113 1.436c4.462-.718 7.26-1.134 8.395-1.247 8.319-.719 12.667.945 13.008 5.029l.983-.076-.189-2.269.983-.075c2.42 1.323 3.706 2.911 3.857 4.802.113 1.361-.567 3.025-2.004 4.954-.643.075-1.021-.378-1.097-1.362l-.983.076-.302 2.836c-4.198 6.391-7.261 9.68-9.189 9.832-1.702 2.306-2.761 3.479-3.252 3.516zm4.424 15.731l-.113-1.437.983-.075 2.117 1.285c.038.605-.264.946-.907 1.021-.908-.567-1.588-.832-2.08-.794zm-176.024 91.85l-.983.227-.832.718c.152.605.53.832 1.173.681.642-.151.907-.529.756-1.134l-.114-.492zm-3.743-7.449l.113.491c.643-.151.908-.529.757-1.134l-.114-.492c-.605.151-.87.53-.756 1.135zm26.772-50.293l.719-.454c-.152 0-.265-.038-.379-.075-.264.075-.378.264-.34.529zm-.151-13.046l1.134-.264-.227-.984-1.134.265.227.983zm267.231 38.192l-2.572-.302-.454.983.038.492 15.315-1.286-.076-.945-12.251 1.058zm13.991-1.172l.075.945h.151l-.075-.945h-.151zm64.245-8.395l.076.946 1.664.302-.076-.945-1.664-.303zm-2.344.189c-11.495 2.572-12.932 2.118-15.352 2.307l.075.945 1.059-.075.567-.038-.151-.113 1.248-.492c11.382-1.248 12.705-.794 12.592-2.08l-.038-.454zm-69.01-16.713l-1.021-.34c-.832 2.23-1.248 3.554-1.21 3.932l.037.416c.795-.038 1.513-1.399 2.194-4.008zm-13.84-7.449l-.038-.492-.529.038-.946.605.53.907c.718-.075 1.058-.416.983-1.058zm30.062 31.082l-.076-.945-.302.038.075.945.303-.038zm62.393-14.066l.718-.076c.416-.038.605-.378.567-.983l-.416-.908c-2.609.227-3.819.341-5.936 1.513l-.038-.492-3.139.303c-.075-.946-.34-1.437-.756-1.399l-1.626.151c-1.891.151-2.798.076-3.744.794-.037-.34-.151-.492-.34-.492l-1.815.152-1.059.605c-.038-.341-.151-.492-.34-.492l-.643.567-.038-.491-2.533-.189-.605.038.075.945 1.286.34 1.21-.075c.416.264.87.34 1.399.302l1.059-.529.038.416c-5.937 1.474-5.899 1.21-9.983 1.89-.454-.302-.794-.453-1.021-.416l-.076.076c-.453-.038-.718-.34-.756-.832l2.118-.265c.151 0 .264.152 1.436.379 1.702-.832 1.778-1.173 2.685-1.248l-.075-.946c-5.824 1.135-3.479.378-10.777 1.021l-.341.038-.075-.945c9.378-1.135 6.239-.492 9.453-1.399.038.34.152.491.341.491a2.206 2.206 0 0 1 1.285-.643l.643-.037c3.29-.265 4.387.378 10.891-1.437l.037.416 1.059-.53.983-.075c-.075-.946 1.362-1.097 1.853-1.135l-.075-1.021c-11.42 2.307-14.408 1.664-17.584 2.572l-.038-.416c-2.987.529-3.1.302-3.857.34-.227.038-.567.227-.945.605-.038-.34-.151-.492-.378-.492-.114 0-.151.038-.189.038l-9.681 1.588c-.037-.264-.151-.416-.378-.378-5.029 1.059-3.668 1.248-10.399 1.853-.302.038-.718.189-1.247.529-.038-.264-.19-.415-.53-.378l-4.122.341-2.76.68c-.038-.264-.189-.416-.529-.378-1.551.416-2.912.681-4.009.756h-.075c-.681.076.34-.189-.189-.415l-.832.491c-1.21.114-.567-.076-4.727-.038-7.298.908-6.504 1.021-7.298 1.059l-2.723-.189c.038.265-.113.454-.416.454-3.1-.416-4.688-.908-4.726-1.475.416-2.949 1.134-4.462 2.155-4.538l.53-.037-.454.983.529-.038c.983-.53 1.437-1.021 1.399-1.475l-.075-1.021-.984.076-.075-.946c-.076-.718.038-1.361.302-1.89l2.231-3.593.076.946 1.059-.076-.076-.945-.605-.87c.794-.681 1.399-1.059 1.891-1.097l-.038-.491-1.437.113-.113-1.437c2.874-5.974 4.235-9.453 4.159-10.436l1.021.416c.643-.038.945-.416.908-1.097l-.984.076-.037-.416a3.595 3.595 0 0 1 .378-2.004c1.55-1.626 2.269-3.252 2.117-4.954.303-.038.454.114.492.454 1.324-.756 2.345-2.761 3.101-6.088 2.344-4.235 5.672-12.706 10.02-25.373 8.32-22.386 7.979-24.768 9.151-30.062l-.983.075c.076.681-.075 1.324-.378 1.929-.681-.265-1.21-.416-1.588-.378l-.038-.416c-.151-1.929.643-4.235 2.458-6.958l.454-.038.832 3.252.983-.075c-.038-.227.227-1.513.756-3.895-.038-.492-.416-.794-1.172-.832l-.945.605c-.076-.681-.038-2.458.075-5.294l-.492.038c-.831-.832-1.247-1.513-1.285-2.08l-5.408.529c-.037-.378-.226-.945-.605-1.664-.037-.491 1.173-.983 3.668-1.474l1.097.416 1.021-.605c.038.34.227.491.605.453l1.021-.605c.038.341.227.492.605.454l.492-.038-.076-1.096c-.756.075-2.76.075-5.937-.038l-1.021.681-.038-.605c-25.373 2.079-39.78 3.252-43.221 3.592-.454.038-2.231 0-5.369-.076.037.416-.341.643-1.097.719l-1.097-.492-3.705.946c-.87.075-2.345.037-4.387-.19-.567.454-1.248.719-2.08.795-.453.037 5.408-.303 10.853-.681-.567.454-1.437.718-2.647.832-.832.075-1.55-.038-2.155-.378-.832.378-3.517.983-8.017 1.89l-1.096-.416-17.697 2.723c-.681-.34-1.475-.454-2.383-.378-.945.075-2.533.416-4.726 1.021l-8.546 3.554.642 1.059c.416-.038 1.021-.265 1.74-.681l3.025.265-.378 2.836c-2.798 1.248-4.424 3.101-4.878 5.445-4.197 1.853-6.277 3.177-6.277 3.971l.038.491.642-.037 1.135-.605 1.323 1.588.189 2.193c.076.681-6.995 15.541-21.138 44.583-12.251 27.982-18.68 43.297-19.285 46.057-4.197 1.172-6.617 2.874-7.336 5.143.076.718 1.324 1.21 3.744 1.399l.113 1.096-1.096 1.815.189 2.194c.113 1.134 3.176 2.004 9.189 2.609-.038-.378.151-.605.567-.643.113 1.361-.265 4.008-1.135 7.941l.643-.038c2.496-3.403 3.668-5.748 3.555-7.033l.529-.038c.605-.038 1.248.643 2.004 2.117-.756.303-3.403 6.315-7.941 18.075l.643 1.059.643-.038c5.559-14.066 9.038-21.856 10.474-23.331 7.299-.643 19.928-1.928 37.852-3.857l1.135-.681c.037.379.264.568.68.53l1.173-.114 1.134-.68c.038.378.265.567.681.529l13.575-1.172c3.592-.303 5.294-1.399 5.142-3.252-.037-.492 2.08-1.059 6.353-1.664.416-.038 1.021.076 1.853.34-.038-.34 2.118-.68 6.429-1.058.113-2.269.831-3.479 2.117-3.593l-.113-1.096c-1.21.113-2.572.416-4.16.945-2.836-.151-4.651-.378-5.407-.643-.757.416-1.324.643-1.74.681l-9.453.302-1.135.605c-.038-.34-.264-.491-.68-.453l-.53.037-1.21.606c-.038-.341-1.021-.606-2.987-.87l-1.21.718-2.344.189-.038-.605c12.176-1.323 18.188-2.987 18.037-4.953.794-.076 1.21.302 1.285 1.096l3.555-.907-.113-1.097-29.155.794c.038.378-.151.605-.567.643l-3.555-.302c-.907.075-1.663.34-2.268.794l-1.324-.492c-3.668.303-6.391.756-8.206 1.324-2.495-.189-5.256-.152-8.319.113l-6.541.567-3.025-.34c-.152-1.929 3.592-11.42 11.306-28.436 2.231-5.748 4.273-9.34 6.239-10.701.416-.038 1.021.113 1.853.453l4.651-1.588 2.382.378c4.009-.34 8.66-1.474 13.992-3.441 1.323-.113 2.306-.037 3.025.265l3.554-.832 10.588-.908c4.5-.378 9.378-1.361 14.672-2.987l-.114-1.096c-1.966.189-2.987-.152-3.062-.946-.114-1.474-1.551-2.08-4.311-1.853l-.114-1.096 2.912-.832 7.638-.643-.113-1.096c-.303.037-1.853 0-4.727-.114l-.113-1.172 2.949-.265c.794-.075 1.135-.454 1.059-1.21-3.97.113-5.975-.076-6.012-.605-27.68 1.361-41.558 1.626-41.633.756-.416.038-.984.303-1.74.757l-.718-1.135c7.335-15.579 11.646-23.445 12.894-23.558.038.605-.265 1.588-.908 2.912l.038.491 1.173-.113c2.911-6.958 5.369-10.55 7.411-10.701 8.697-.757-1.21-1.324 17.395-4.236.756.341 1.285.492 1.663.454 7.298-1.475 17.47-3.025 30.516-4.613l-.076-1.097-6.957.643-.076-1.097c.832-.075 1.513-.34 2.08-.794l.038.605c.378-.037.907-.302 1.588-.756 1.21-.113 2.117 0 2.76.34 2.42-.642 4.387-1.021 5.824-1.172l4.348-.416c1.059-.68 1.551-1.285 1.513-1.853l-.038-.491c-1.097.113-2.344.038-3.819-.227-.038-.605.264-1.021.983-1.21l8.092-.756 3.706-.946c.038.416.227.567.529.567.378-.037.908-.302 1.588-.756.19.038.416.038.605.076-.491 1.021-1.058 2.496-1.626 4.424l-1.058.076c-.076-.719-.265-1.362-.605-1.929l-.53.038c-9.831 27.377-14.218 40.121-23.293 61.145-1.664 5.37-3.063 8.357-4.273 9 .038.605.416.907 1.059.832.227 2.647-.378 5.256-1.853 7.827-4.198 12.101-6.996 18.718-8.433 19.928l.946 5.71c.037.605-.265.945-.908 1.021l-.983.076c-.151-1.589-.719-2.345-1.739-2.231l-.53.037c-1.286 2.004-2.269 4.311-2.911 6.996l.983-.076c1.323-.869 1.928-1.89 1.815-3.063l1.966-.189 1.134.416c-.907 1.437-1.323 2.572-1.247 3.441l.529.908-1.286 3.025.038.492c1.135-.114 2.382.264 3.706 1.058.907-.075 1.891-.491 2.987-1.21 1.135-.113 5.37-.151 12.668-.151l3.668-1.248c4.462-.038 5.18.076 9.037-.265l1.588-.151.832-.567.038.492c4.046-.341 4.311-.076 7.487.302l.038.492-2.231.189.076.945c.68-.076 1.285-.265 1.777-.681.567-.037.907.265.945.946-.907.075-1.928.302-3.063.68l-.983-.34c-1.55.416-1.21.529-2.269.605l-1.55-.302c.038.264-.113.453-.378.453.038.605.378.908.945.87l1.588-.151 8.282-.719 3.138-.68c.038.264.151.416.416.378l1.513-.567 2.836-.227c2.193-.189 2.155-.341 6.92-1.097-.038-.302.075-.416.302-.454l.038.416c7.752-1.323 8.243-1.399 9.491-1.815l.114.227c1.928-.454.832-.34 1.361-.718.038.34.151.491.34.491l1.362-.113-.076-1.021-2.76-.038-.038-.076c-.114.038-.189.038-.303.076h-.378v.076c-1.853.378-1.891.113-3.101.227l-6.92.378-.037-.492 3.857-.529 1.399-.114.794-.567.038.492c5.445-.454 7.373.907 32.557-4.462 1.362-.114 1.248-1.248 2.118-3.593a2.349 2.349 0 0 1-1.323-.302c-2.08.794-3.177.416-7.185 1.059-.34.038-.605-.265-.719-.87l-.038-.416 3.857.113c.719-.075 2.118-.189 4.198-1.361 0 .34-.794.529-.341.492h.001zm-186.196 2.987l-1.777.151c-.076-.718.87-3.441 2.836-8.092l1.172-.113c.038 1.096-.681 3.781-2.231 8.054zm2.156-8.622l-.038-.491c-.038-.605.34-1.021 1.172-1.21l.038.491c.038.719-.341 1.135-1.172 1.21zm23.633 18.264l.038.492-2.949.265-.038-.492 2.949-.265zm-3.554-.302c.038.605-.87 1.286-2.836 1.966l-3.631-.264-1.172.113-.113-1.097 7.752-.718zm23.898-110.001l-1.777.152-.038-.605c-.038-.605.303-1.021 1.059-1.21l.643-.038 1.21.491c.037.719-.303 1.135-1.097 1.21zm27.037-5.294l.567-.037.076 1.096-1.626.151c-.038-.605.264-1.02.983-1.21zm-6.807 2.383l-2.684-.303-.038-.491c3.517-.303 4.689-.681 6.844-1.286.038.416.416.567 1.097.492l.075 1.096-1.058.114c-.832.075-1.551-.038-2.156-.379-.643.416-1.323.681-2.08.757zm3.366 9.794l-.038-.492 4.349-.416.038.492-4.349.416zm4.651-3.782l-.038-.605 2.118-.189.038.605-2.118.189zm.492-7.411l-.568.037.492-1.172 4.84-.454.038.605c-1.248.114-2.874.454-4.802.984zm2.458 10.436l-.076-1.096 2.118-.189c.718-.076 1.096.264 1.134 1.021l-3.176.264zm12.818-17.47l-2.722.757-.492.037c-1.285.114-2.949.076-4.916-.113 3.517-.227 6.883-.492 8.13-.681zm-2.911 12.101l.038.491-3.744.341-.038-.492 3.744-.34zm6.126 2.911c-.038-.453-.757-.756-2.231-.907l-3.744 1.059-2.874.113c-.643-.454-.983-.756-1.021-.983l3.328.189 7.487-1.21 3.819.151.038.605c-1.891.189-3.479.53-4.802.983zm38.532-9.945c.454.038.756.038.87.038 1.323-1.286 2.798-2.307 4.5-3.025-1.362 5.975-3.479 10.399-6.391 13.273l-2.118-1.286c1.778-4.5 2.837-7.487 3.139-9zm-6.504 11.155l.529-.037c-.718 1.361-1.361 2.079-1.89 2.117l-.114-1.437c.341 0 .832-.227 1.475-.643zm-4.197 10.021c1.021-4.084 2.004-6.39 2.911-6.995l.038.491c-.529 3.781-1.361 5.786-2.458 5.937l.189 2.382c-.907 1.286-1.323 2.269-1.286 3.025l-.529.038-.302-3.29c.605-.075 1.096-.605 1.437-1.588zm-1.626 5.445c.037.567-.341 1.891-1.097 3.933l-.529.038-.114-1.437c.719-1.664 1.324-2.496 1.739-2.534h.001zm-30.516 88.56l-.038-.416.983-.075.114 1.437c-.53.038-.908-.265-1.059-.946zm43.599 1.135c-.038-.341-.189-.492-.529-.454l-2.458.227-.038-.492h.227l5.823-.491.038.491c-1.701.076-2.722.341-3.063.719zm-2.911-1.21c.227.113.113.227 0 .302-.114-.038-.265-.151 0-.302zm.302-6.807l-3.252.265-.038-.492 2.95-.264 2.571-.643c.038.302.189.416.53.378 3.063-.529 2.76-.681 4.235-.794.491-.038.794.265.832.87l-7.828.68zm11.382-.983c-1.815-.189-1.928-.34-3.214-.227l-.038-.416 2.912-.264.038.416c-.303.037.794.113.302.491zm.227-.529l-.038-.416 1.588-.152.038.416-1.588.152zm3.517-.303l-.038-.416c.265-.037.643-.227 1.134-.605.794-.075 1.21.454 1.286 1.059l-2.382-.038zm4.5-.567l-.038-.492 1.928-.151.038.492-1.928.151zm2.684-.227c-.037-.567.189-.907.681-.983l.643.832c-.038-.265.075-.416.302-.454l.492.908-2.118-.303zm37.209-4.386l.038-.038v-.038s-.038.038-.038.076zm.681-.492c.302-.189.454-.378-.265-.491-.34.378.378.491-.378.529l.038.34c.075-.075.265-.189.416-.302l-.416.34v.038l-.794 1.021 1.588-.567h.189l-.076-.946-.302.038zm2.76 2.156l-.302.037.075.946 2.231-.189c-.037-.605-1.512-.794-2.004-.794z"
                                        fill="#F9DC3E" />
                                </svg>
                            </li>
                            <li class="mx-5 mt-7" data-aos="fade-up" data-aos-delay="300">
                                <svg class="height-5x w-auto" xmlns="http://www.w3.org/2000/svg" width="2500"
                                    height="2109" viewBox="0 0 256 216" preserveAspectRatio="xMinYMin meet">
                                    <path
                                        d="M110.582.009c-4.427.082-9.967 2.843-13.93 1.89-1.581-.382-3.514-.546-5.406-.443-.034.002-.068-.002-.101 0-1.924.114-3.802.52-5.186 1.367-.057.035-.123.067-.18.1a1.53 1.53 0 0 1-.182.221c-1.839 1.84-5.906 2.007-7.799 3.9-1.545 1.546-2.978 4.505-4.683 7.156-.016.025-.024.055-.04.08-6.068 7.075-10.91 15.78-12.623 22.895-1.408 5.845-1.388 13.74-3.699 19.557-.646 1.627-3.325 10.631-1.246 12.382 1.416 1.193 7.453 2.106 9.226 0 .954-1.133 9.705-3.966 12.442-7.216 3.223-3.827 4.886-10.438 7.096-16 .351-.885.804-1.824 1.326-2.754 1.254 2.428 2.249 4.41 2.774 5.629 1.094 2.535 2.297 6.041 3.297 9.788-2.166 3.318-1.263 7.856.301 9.93-6.331 1.971-3.315 8.783-3.558 9.025-.417.417-1.737.974-2.271 1.508-.66.66-.764 2.038-.764 3.035 0 .962.122 1.817.302 2.573-5.761 14.492-11.199 32.632-18.07 42.412-1.979.902-4.002 1.677-6.373 2.15-4.619 1.156-16.294 3.444-26.13 6.754a16.077 16.077 0 0 1-1.488 1.689c-.974.974-2.924.975-3.9 1.95-.757.758-3.12-.095-3.878.663-2.25 2.25-5.57 3.418-9.106 5.186-.392.196-1.65-.3-1.95 0-1.606 1.606-4.482 2.533-5.849 3.9-2.674 2.673-4.915 5.578-7.799 8.462-2.866 2.866 2.98 10.758 3.9 11.678 2.708 2.708 7.683 3.14 10.391 5.85 1.14 1.139 4.96-.385 6.332.522.354.05.671.114.885.221 3.99 1.995 11.818 3.47 16.542 5.045 6.511 2.17 11.676 7.97 18.392 9.648 5.113 1.279 10.92 1.959 16.08 3.679 2.158.719 4.778.226 6.875.924 3.921 1.308 7.462 2.93 11.035 4.121 1.238.413 2.873-.317 4.14 0 2.854.713 5.938.92 8.724 1.85 4.962 1.653 11.581-1.655 16.543 0 3.27 1.09 23.63-.655 25.267-2.292 1.203-1.204 5.78.325 7.356-.462 1.368-.684 5.52-.013 6.432-.925 2.355-2.355 7.189-2.458 10.553-4.14 1.416-.708 3.597.271 5.066-.463.844-.422 2.56.097 4.422.904 3.542-.074 6.268-.442 9.809-.442 4.21 0 10.022-1.999 16.18-5.025 6.817-1.535 15.148-3.308 15.538-3.698 2.962-2.962 10.833-2.11 13.77-5.046 2.08-2.08 4.752-2.924 6.894-5.065 1.907-1.908 4.528-4.092 7.276-6.392.479-1.334 1.703-2.588 2.834-3.718.474-.475 3.821-10.268 3.216-11.478-1.107-2.215-2.937-4.047-5.045-5.749-.654-.224-1.155-.452-1.387-.683-2.252-2.252-7.647-2.602-9.648-4.603-3.223-3.223-8.069-6.12-13.85-8.06-1.21-.6-2.343-1.239-3.155-2.05-1.03-1.03-6.98-2.345-8.724-3.217-.938-.469-2.978.258-3.678-.442-1.698-1.697-8.811-2.907-13.95-4.543-.75.048-1.952-.524-2.17-.743-.155-.155-4.139-.741-5.448-2.05-.149-.15-.683-5.486-.683-6.151 0-.246-.596-1.234-.242-1.588.055-.055.11-.12.161-.181-2.378-14.656-4.197-30.84-5.91-32.282-2.543-2.141-3.956-13.965-6.753-16.321-2.925-2.463-4.756-5.156-7.015-7.256-.002-.007.001-.014 0-.02-.85-4.673-2.465-9.923-2.975-10.352-.83-.698.427-3.865-.402-4.563-2.58-2.173-5.942-14.947-8.362-16.985-3.17-2.67-4.729-6.812-7.739-9.347-7.437-6.262-19.79-15.582-33.447-14.874a17.501 17.501 0 0 1-1.708-.583c-.869-.345-1.853-.461-2.875-.442z"
                                        fill="#3C6991" />
                                    <path
                                        d="M107.634 81.112c-1.147-.206-2.269-.218-3.149.074-1.465.486-3.827-.666-5.357-.39-5.785 1.045-10.32 2.612-11.1 4.556 8.585-2.461 18.116 3.033 22.02 8.253 1.624 2.17-.88 5.459.004 8.12.2.604.36 4.463-.335 4.983-1.453 1.086-1.309 4.878-2.51 6.609-2.827 4.072-5.293 7.048-7.695 10.508-2.476 3.568-9.099 4.282-12.795 5.51-.816.27-1.845-.293-2.705-.008-.204.068-.441.08-.678.046.083.094.18.184.248.276.312.416 1.832.02 2.276.328 2.872 1.994 14.237 1.229 17.388.183 1.96-.65 3.78-1.612 5.74-2.263 2.514-.834 4.989-4.744 6.795-6.757 6.21-6.924 9.049-18.916 5.977-28.17-1.544-4.652-5.586-7.44-9.027-9.83-1.176-.816-3.185-1.683-5.097-2.028zM121.486 72.175c-.37-.012-.421 3.609-.45 5.335-.174.01-.166.227-.12.474-1.866.829-5.93 2.489-5.618 2.821.015.008.016.018.023.024-.147.007-.301.057-.308.26-.014.269.538.015.806.024.433.015 4.212 1.408 5.714 2.04.186 1.427.735 2.28.735 3.911 0 1.017.2 2.418.26 2.418.023 0 .064-.03.095-.047.044.176.094.28.166.213.295-.276.83-1.017 1.375-1.849.024-.036.049-.059.07-.095.959-1.186 2.053-2.705 2.988-4.078 1.813.264 3.473.475 3.888.475.2 0 7.087 1.183 5.098-.807-.121-.121-.262-.224-.403-.332.044-.035.069-.07.07-.118.015-.384-3.83-2.152-4.457-2.821-.303-.324-.74-.53-1.043-.854-.08-.085.07-.322.308-.664v-.023c.535-.59 1.105-1.2 1.517-1.613.198-.197 1.31-2.28.255-2.142-.712.092-3.039.24-6.086 1.132 0 0-.822-1.076-.828-1.073-.662-.27-2.536-2.56-4.057-2.611h.002z"
                                        stroke-opacity="0" stroke="#FFF" stroke-width="1.18" fill="#E6B35A" />
                                    <path
                                        d="M104.28 71.638c-.219.106-.552.537-.658.317-.106-.219.878-.423.659-.317-.655.316-3.187 2.597-2.254 3.318.767.593 3.614-.516 4.822-.094.18.063 2.187 3.141 2.501 2.242.513-1.467-.122-3.96-.106-4.006.237-.676 2.09-.399 2.542-.617.374-.18 1.133-.5 1.237-.8.028-.08.049-.32.086-.243.03.063-.495-.447-1.135-.67-.956-.334-1.924-.125-2.61-.365-.315-.11.066-1.969-.05-2.207-.376-.78-.615-1.697-.549-1.56.187.388-.81.38-1.072.72-.328.424-1.188 1.862-1.743 1.855-.666-.01-3.333-.645-3.512-.133-.015.03 1.662 1.689 1.843 2.56zM130.06 97.512c-.178-.166-.7-.319-.535-.497.166-.179.714.663.536.497-.533-.494-3.58-2.02-3.911-.89-.273.932 1.798 3.178 1.845 4.457.015.191-2.128 3.182-1.176 3.146 1.553-.057 3.644-1.557 3.691-1.558.717-.027 1.133 1.8 1.502 2.142.304.282.878.872 1.195.86.087-.003.317-.072.258-.01-.047.051.236-.623.21-1.3-.037-1.013-.584-1.838-.611-2.563-.015-.335 1.857-.658 2.037-.852.59-.635 1.355-1.191 1.252-1.08-.293.315-.648-.616-1.061-.737-.515-.15-2.167-.426-2.362-.946-.234-.624-.615-3.339-1.157-3.319-.031.001-.967 2.164-1.712 2.65z"
                                        stroke-opacity="0" stroke="#FFF" stroke-width=".803" fill="#E6B35A" />
                                    <path
                                        d="M188.693 121.556c-.52 1.787-3.775 7.514-5.146 8.885-1.763 1.763-3.279 3.6-4.824 5.146-1.095 1.095-4.221 3.899-5.146 4.824-2.01 2.01-3.189 1.259-5.467 3.537-1.13 1.13-3.403 1.152-4.503 2.252-.994.994-8.975 1.593-10.934 2.573-.475.237-1.891-.361-2.252 0-1.408 1.407-12.533 1.92-12.864 2.25-1.703 1.704-6.238-.257-8.683.966-2.169 1.084-6.473.321-9.005.321-1.403 0-5.128-.026-8.965-.12-.906-.129-1.62-.23-1.648-.201-.02.019-.107.108-.161.16-.72-.022-1.415-.052-2.11-.08-.434-.165-.894-.267-1.267-.08-.017.008-.042.011-.06.02-2.994-.145-5.438-.357-6.05-.664-2.517-1.258-5.22-1.608-8.362-1.608-4.919 0-15.81-5.814-19.619-7.718-.583-.292-2.2-1.988-3.075-2.453-.007-.336-.019-.642-.14-.763-.897-.897-1.29-2.9-1.93-4.181-.267-.534 0-2.49 0-2.252 0 .011.646-2.572.643-2.572-.551 0-3.433 3.755-4.503 4.824-.01.01.02.068.04.12-.602.83-1.024 2.07-1.024 3.94 0 6.374 3.515 6.712 6.814 10.01.81.81 2.543.272 3.175.905.646.645 1.594 1.219 2.714 1.728-1.4.822-4.1 1.025-4.985 1.91-.865.865-4.877 3.353-6.372 4.1-.28.14-1.64.294-1.809.463-8.496 8.496-18.084 13.983-25.93 21.829-.66.66-.904 9.287-.904 10.914 0 2.842-.965 5.85.905 7.719.788.789 3.404.228 4.1.925.151.15 2.053 1.565 2.271 1.346.83-.83-.462-5.169-.462-6.351 0-6.211.67-12.49 4.563-16.382 7.506-7.506 18.208-10.932 25.005-17.729 1.998-1.998 5.659-3.062 8.322-5.246-.094.64.015 1.244.482 1.748.31.336 1.416-.328 1.809-.12 2.67 1.416 10.81 4.452 13.206 1.528.435.826.779 1.663 1.206 2.09 1.596 1.595.348 9.294-.462 10.915-3.057 6.113-4.669 23.764-7.277 26.371-.45.45.54 4.739.905 5.468.947 1.895-.694 6.12 0 6.814.682.682.242 2.493.925 3.176.62.62 3.459-.16 4.08.462.246.246 3.482 2.448 4.1 1.83.513-.514-1.403-6.426-1.829-7.277-.366-.734.988-14.194 1.367-14.573.53-.53-.53-2.645 0-3.176 1.033-1.033 2.271-22.443 2.271-25.467 0-.51 1.305-3.7.463-4.543-.005-.005-.754-1.725-1.769-3.397 1.5.111 2.764.292 3.136.663.667.668 14.124 0 16.361 0 8.886 0 22.865-.688 28.201-1.829 2.128-.455 7.173-.852 10.01-2.271 1.648-.824 7.449-1.387 8.463-1.648 2.166-.559 9.128-2.234 11.075-4.181 1.444-1.445 6.383-6.448 8.201-7.357 2.05-1.025 3.08-4.666 4.282-6.352.154-1.248 3.513-4.51 2.854-5.829-.749-3.046-1.216-6.194-2.412-6.312z"
                                        stroke-opacity="0" stroke="#FFF" fill="#E6B35A" />
                                </svg>
                            </li>
                            <li class="mx-5 mt-7">
                                <svg class="height-5x w-auto" xmlns="http://www.w3.org/2000/svg" width="800px" height="800px" viewBox="-7 0 270 270" preserveAspectRatio="xMinYMin meet"><path d="M127.606.341L.849 44.95 20.88 211.022l106.86 58.732 107.412-59.528L255.175 44.16 127.606.341z" fill="#B3B3B3"/><path d="M242.532 53.758L127.31 14.466v241.256l96.561-53.441 18.66-148.523z" fill="#A6120D"/><path d="M15.073 54.466l17.165 148.525 95.07 52.731V14.462L15.074 54.465z" fill="#DD1B16"/><path d="M159.027 142.898L127.31 157.73H93.881l-15.714 39.305-29.228.54L127.31 23.227l31.717 119.672zm-3.066-7.467l-28.44-56.303-23.329 55.334h23.117l28.652.97z" fill="#F2F2F2"/><path d="M127.309 23.226l.21 55.902 26.47 55.377h-26.62l-.06 23.189 36.81.035 17.204 39.852 27.967.518-81.981-174.873z" fill="#B3B3B3"/>
                                </svg>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>


        <section class="position-relative" id="reviews">
            <div class="container py-9 py-lg-12">
                <p class="text-center mb-4" data-aos="fade-up" data-aos-delay="100">
                    Testimonials</p>
                <h2 class="text-center display-5 mb-7 mb-lg-9" data-aos="fade-up" data-aos-delay="150">
                    Don’t just take our word for it.<br>
                    Hear it from our customers.
                </h2>

                <div class="row">
                    <div class="col-12 col-lg-9 col-md-10 mx-md-auto mb-4">
                        <div class="card h-100 card-body p-4 shadow-lg border-0" data-aos="fade-up"
                            data-aos-delay="100">
                            <p class="lead mb-5">
                                "I want to say thank you for such a great theme! And a
                                huge thank to you for <strong>the way it is documented</strong> (Components and
                                Features).
                                I've bought other themes and they are horrible in that there are only
                                sample pages and that's it. And you have <strong>demonstrated everything
                                    perfectly</strong>, in case I need to add my own elements, I don't have to dig
                                around in CSS and <strong>have example code</strong> .!"
                            </p>
                            <div class="mt-auto">
                                <h6>Yuri Alexandrov</h6>
                                <span class="small text-body-secondary">Wrapootstrap User</span>
                            </div>
                        </div>
                    </div>
                    <div></div>
                    <div class="col-lg-4" data-aos="fade-up">
                        <div class="card card-body border-0 p-4 shadow-lg mb-4" data-aos="fade-up" data-aos-delay="100">
                            <p class="lead">
                                " I am using this template for my new project. I had a special problem regarding the
                                tabs and I contacted the seller. I had a reply immediately and my problem was solved
                                in no time. I can really recommend this template which is very good programmed,
                                clean and includes uncounted features. And the support is just unbelievable!!! "
                            </p>
                            <h6>zorbas2</h6>
                            <span class="small text-body-secondary">Wrapbootstrap User</span>
                        </div>
                        <div class="card card-body border-0 p-4 shadow-lg mb-4" data-aos="fade-up" data-aos-delay="200">
                            <p class="lead">
                                " This theme is awesome. So much variety and it allowed me to create a website for a
                                client in a couple of days.

                                Also, I had an issue getting the gallery element to work on a different theme
                                however the seller responded very quickly to my enquiry and helped me fix the issue.
                                "
                            </p>
                            <h6>lewisia</h6>
                            <span class="small text-body-secondary">Wrapbootstrap User</span>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card card-body border-0 p-4 shadow-lg mb-4" data-aos="fade-up" data-aos-delay="150">
                            <p class="lead">
                                " This is a great theme! I love it and recommend it to anyone wanting to purchase
                                it. " </p>
                            <h6>bmika</h6>
                            <span class="small text-body-secondary">Wrapbootstrap User</span>
                        </div>
                        <div class="card card-body border-0 p-4 shadow-lg mb-4" data-aos="fade-up" data-aos-delay="200">
                            <p class="lead">
                                " Hello,<br>

                                your theme gets better and better on every version. Gratulation to this wonderful
                                theme and please keep on working this way (good once)!! "
                            </p>
                            <h6>webmasterfcn1</h6>
                            <span class="small text-body-secondary">Wrapbootstrap User</span>
                        </div>
                        <div class="card card-body border-0 p-4 shadow-lg mb-4" data-aos="fade-up" data-aos-delay="250">
                            <p class="lead">
                                " Excellent place to start! Loved how easy it was to move right in with my
                                content... "</p>
                            <h6>sjl18gb</h6>
                            <span class="small text-body-secondary">Wrapbootstrap User</span>
                        </div>
                        <div class="card card-body border-0 p-4 shadow-lg mb-4" data-aos="fade-up" data-aos-delay="300">
                            <p class="lead">" Hi,

                                thanks for that beautiful and feature rich template ! "</p>
                            <h6>todo42</h6>
                            <span class="small text-body-secondary">Wrapbootstrap User</span>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card card-body border-0 p-4 shadow-lg mb-4" data-aos="fade-up" data-aos-delay="150">
                            <p class="lead">
                                " Hi mate,

                                thank you for your wonderful template!

                                As a backend web developer, this makes it super easy for me to build a new web
                                application. "
                            </p>
                            <h6>michilehr</h6>
                            <span class="small text-body-secondary">Wrapbootstrap User</span>
                        </div>
                        <div class="card card-body border-0 p-4 shadow-lg mb-4" data-aos="fade-up" data-aos-delay="200">
                            <p class="lead">
                                " Compared to others this was a very easy to use and adapt template. It didn't break
                                as easy with minor changes. Thanks "
                            </p>
                            <h6>chaostheory</h6>
                            <span class="small text-body-secondary">Wrapbootstrap User</span>
                        </div>
                        <div class="card card-body border-0 p-4 shadow-lg mb-4" data-aos="fade-up" data-aos-delay="250">
                            <p class="lead">
                                " Hi, <br>
                                Thanks for the support ! The revolution slider is working fine now. I love it and
                                highly recommend.<br>
                                Best,
                                Celso
                                "
                            </p>
                            <h6>celso</h6>
                            <span class="small text-body-secondary">Wrapbootstrap User</span>
                        </div>
                        <div class="card card-body border-0 p-4 shadow-lg" data-aos="fade-up" data-aos-delay="100">
                            <p class="lead">
                                " The latest update of Assan looks FANTASTIC! Your work is BEAUTIFUL! I am using
                                your great code to learn SCSS and Gulp now! Thanks!"
                            </p>
                            <div class="mt-auto">
                                <h6>Dagny Kight</h6>
                                <span class="small text-body-secondary">Wrapootstrap User</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="bg-gradient-primary text-white position-relative">
            <div class="container py-9 py-lg-11 position-relative">
                <div class="row py-4 align-items-center justify-content-between">
                    <div class="col-md mb-4 mb-md-0">
                        <h2 class="display-5 mb-0" data-aos="fade-up" data-aos-delay="100">18+ Bootstrap4 Responsive
                            templates also included</h2>
                    </div>
                    <div class="col-md-auto" data-aos="fade-up" data-aos-delay="200">
                        <a class="btn btn-white btn-lg" href="{{ URL::asset('http://uigator.com/assan-kit-3.8/') }}" target="_blank">View
                            bootstrap4 demos</a>
                    </div>
                </div>
            </div>
        </section>
</x-assan-layout>
