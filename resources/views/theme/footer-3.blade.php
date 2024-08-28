<x-assan-layout layout-type="{{$layoutType}}">
            <section class="position-relative text-center bg-primary-subtle">
                <div class="container position-relative py-11">
                    <div class="row pt-lg-9 pb-lg-7">
                        <div class="col-xl-9 mx-auto">
                            <h1 class="display-4">Footer style - <a href="{{ URL::asset('#footer') }}">#3</a></h1>

                            <!--Connect line-->
                            <div class="position-absolute bottom-0 start-0 d-flex justify-content-center w-100">
                                <div class="connect-line text-body-secondary"></div>
                            </div>
                        </div>
                    </div>
                    <!--/.row-->
                </div>
                <!--/.content-->
            </section>
            <!--/section-->
            <section class="position-relative">
                <div class="container py-9 py-lg-11">

                    <!--//////////////////SNIPPETS:BEGIN////////////////-->
                    <nav class="nav-tabs nav">
                        <a href="{{ URL::asset('#tabMain') }}" data-bs-toggle="tab" class="nav-link active">HTML</a>
                        <a href="{{ URL::asset('#tabCss') }}" data-bs-toggle="tab" class="nav-link">Css</a>
                    </nav>
                    <div class="tab-content">
                        <!--Element Main code-->
                        <div class="tab-pane fade show active" id="tabMain">
                            <div class="position-relative" style="max-height: 75vh; overflow-y: auto;">
                                <button
                                    class="btn btn-sm position-absolute end-0 top-0 me-3 mt-3 z-1 btn-primary copy-link"
                                    data-clipboard-target="#copyHTML1" data-clipboard-action="copy"
                                    id="copyHTML1-1">Copy code</button>
                                <pre id="copyHTML1" class="language-markup bg-secondary text-white-50 mt-0" data-lang="html">
<code>
    &lt;!--begin:Footer-->
    &lt;footer id="footer" class="bg-body footer position-relative" data-bs-theme="dark">
        &lt;div class="container position-relative z-1">
            &lt;div class="row grid-separator align-items-stretch">
                &lt;!--Footer col-->
                &lt;div class="col-md-7 col-lg-4 pe-md-6 py-lg-11 py-9">
                    &lt;div class="d-flex flex-column h-100">
                        &lt;h6 class="mb-4 text-white-50">
                            Join our mail list
                        &lt;/h6>
                        &lt;p class="mb-4 small text-white-50">Join us today and get 20% off on your first purchase&lt;/p>
                        &lt;form novalidate class="needs-validation">
                            &lt;div class="mb-3">
                                &lt;input type="text" required placeholder="Full name"
                                    class="form-control bg-transparent text-white border-secondary">
                                &lt;span class="invalid-feedback">This field is required&lt;/span>
                            &lt;/div>
                            &lt;div class="mb-3">
                                &lt;input type="email" required placeholder="Your work Email"
                                    class="form-control bg-transparent text-white border-secondary">
                                &lt;span class="invalid-feedback">This field is required&lt;/span>
                            &lt;/div>
                            &lt;div class="mb-3">
                                &lt;p class="small text-white-50 mb-0">
                                    By clicking on Sign me up, you agree to our &lt;a class="fw-semibold d-table link-light"
                                        href="{{ URL::asset('#!') }}">Terms and Conditions of Use.&lt;/a>
                                &lt;/p>
                            &lt;/div>
                            &lt;div class="d-grid">
                                &lt;button class="btn btn-primary" type="submit">
                                    Sign me up
                                &lt;/button>
                            &lt;/div>
                        &lt;/form>
                        &lt;!--:Dark Mode:-->
                        &lt;div class="d-inline-flex align-items-center dropup mt-6">
                            &lt;button class="btn border text-body py-1 px-3 dropdown-toggle d-flex align-items-center"
                                id="assan-theme" type="button" aria-expanded="false" data-bs-toggle="dropdown"
                                data-bs-display="static">
                                &lt;span class="theme-icon-active d-flex align-items-center">
                                    &lt;small>Current theme&lt;/small> &lt;i class="bx align-middle ms-2">&lt;/i>
                                &lt;/span>
                            &lt;/button>
                            &lt;!--:Dark Mode Options:-->
                            &lt;ul class="dropdown-menu" aria-labelledby="assan-theme" style="--bs-dropdown-min-width: 9rem;">
                                &lt;li class="mb-1">
                                    &lt;button type="button" class="dropdown-item d-flex align-items-center active"
                                        data-bs-theme-value="light">
                                        &lt;span class="theme-icon d-flex align-items-center">
                                            &lt;i class="bx bx-sun align-middle me-2"> &lt;/i>
                                        &lt;/span>
                                        Light
                                    &lt;/button>
                                &lt;/li>
                                &lt;li class="mb-1">
                                    &lt;button type="button" class="dropdown-item d-flex align-items-center"
                                        data-bs-theme-value="dark">
                                        &lt;span class="theme-icon d-flex align-items-center">
                                            &lt;i class="bx bx-moon align-middle me-2">&lt;/i>
                                        &lt;/span>
                                        Dark
                                    &lt;/button>
                                &lt;/li>
                                &lt;li>
                                    &lt;button type="button" class="dropdown-item d-flex align-items-center"
                                        data-bs-theme-value="auto">
                                        &lt;span class="theme-icon d-flex align-items-center">
                                            &lt;i class="bx bx-color-fill align-middle me-2">&lt;/i>
                                        &lt;/span>
                                        Auto
                                    &lt;/button>
                                &lt;/li>
                            &lt;/ul>
                        &lt;/div>
                    &lt;/div>
    
                &lt;/div>
                &lt;!--Footer col-->
                &lt;div class="col-md-5 col-lg-3 ps-md-6 py-lg-11 py-9">
                    &lt;h6 class="mb-4 text-white-50">Explore&lt;/h6>
                    &lt;ul class="nav flex-column">
                        &lt;li class="nav-item">
                            &lt;a href="{{ URL::asset('#') }}" class="nav-link">
                                Comapny
                            &lt;/a>
                        &lt;/li>
                        &lt;li class="nav-item">
                            &lt;a href="{{ URL::asset('#') }}" class="nav-link">
                                News & media
                            &lt;/a>
                        &lt;/li>
                        &lt;li class="nav-item">
                            &lt;a href="{{ URL::asset('#') }}" class="nav-link">
                                Customers
                            &lt;/a>
                        &lt;/li>
                        &lt;li class="nav-item">
                            &lt;a href="{{ URL::asset('#') }}" class="nav-link">
                                Products
                            &lt;/a>
                        &lt;/li>
                        &lt;li class="nav-item">
                            &lt;a href="{{ URL::asset('#') }}" class="nav-link">
                                Career
                            &lt;/a>
                        &lt;/li>
                        &lt;li class="nav-item">
                            &lt;a href="{{ URL::asset('#') }}" class="nav-link">
                                Help center
                            &lt;/a>
                        &lt;/li>
                        &lt;li class="nav-item">
                            &lt;a href="{{ URL::asset('#') }}" class="nav-link">
                                Privacy & policy
                            &lt;/a>
                        &lt;/li>
                        &lt;li class="nav-item">
                            &lt;a href="{{ URL::asset('#') }}" class="nav-link">
                                Terms & conditions
                            &lt;/a>
                        &lt;/li>
                    &lt;/ul>
                &lt;/div>
                &lt;!--Footer col-->
                &lt;div class="col-md-12 col-lg-5 ps-md-6 py-lg-11 py-9">
                    &lt;div class="d-flex flex-column flex-sm-row">
                        &lt;div class="mb-4 flex-grow-1 mb-sm-0 pe-sm-3">
                            &lt;div>
                                &lt;h6 class="mb-4 text-white-50">Registered office&lt;/h6>
                                &lt;p class="mb-2">
                                    &lt;strong class="small text-white">Company, Inc.&lt;/strong>
                                &lt;/p>
                                &lt;p class="mb-3 text-white">
                                    1355 Market St, Suite 900&lt;br> San Francisco&lt;br> CA 94103
                                &lt;/p>
                            &lt;/div>
                        &lt;/div>
                        &lt;div class="ps-sm-3 flex-grow-1">
                            &lt;h6 class="mb-4 text-white-50">Hours&lt;/h6>
                            &lt;p class="text-white">
                                Office opening hours are 10.00am to 6.00pm
                            &lt;/p>
                            &lt;hr>
                            &lt;strong class="d-block text-white-50 small mb-2">Phone:&lt;/strong>
                            &lt;a href="{{ URL::asset('#!') }}" class="fw-semibold link-underline link-light">+01 1234-56789&lt;/a>
                            &lt;br>&lt;br>
                            &lt;strong class="d-block text-white-50 small mb-2">Email:&lt;/strong>
                            &lt;a href="{{ URL::asset('mailto:mail@email.com') }}"
                                class="fw-semibold link-underline link-light">mail@domain.com&lt;/a>
                        &lt;/div>
                    &lt;/div>
                &lt;/div>
            &lt;/div>
    
            &lt;div class="border-top">
                &lt;div class="row py-5">
                    &lt;div class="col-sm-7 col-md-6 mb-3 mb-sm-0">
                        &lt;div class="dropup d-table">
                            &lt;a href="{{ URL::asset('#') }}" data-bs-toggle="dropdown" role="button" aria-expanded="false"
                                class="dropdown-toggle link-light">
                                United States (English)
                            &lt;/a>
    
                            &lt;!--Dropdown lang menu-->
                            &lt;div class="dropdown-menu mb-3 dropdown-menu-lg-start">
                                &lt;a href="{{ URL::asset('#!') }}" class="d-flex align-items-center dropdown-item active">
                                    &lt;img src="{{ URL::asset('assets/img/country/us.svg') }}" class="width-2x me-2" alt="">
                                    United States (English)
                                &lt;/a>
                                &lt;a href="{{ URL::asset('#!') }}" class="d-flex align-items-center dropdown-item">
                                    &lt;img src="{{ URL::asset('assets/img/country/es.svg') }}" class="width-2x me-2" alt="">
                                    América Latina (Español)
                                &lt;/a>
                                &lt;a href="{{ URL::asset('#!') }}" class="d-flex align-items-center dropdown-item">
                                    &lt;img src="{{ URL::asset('assets/img/country/gb.svg') }}" class="width-2x me-2" alt="">
                                    United Kingdom (English)
                                &lt;/a>
                                &lt;a href="{{ URL::asset('#!') }}" class="d-flex align-items-center dropdown-item">
                                    &lt;img src="{{ URL::asset('assets/img/country/fr.svg') }}" class="width-2x me-2" alt="">
                                    France (Français)
                                &lt;/a>
                                &lt;a href="{{ URL::asset('#!') }}" class="d-flex align-items-center dropdown-item">
                                    &lt;img src="{{ URL::asset('assets/img/country/pt.svg') }}" class="width-2x me-2" alt="">
                                    Italia (Italiano)
                                &lt;/a>
                            &lt;/div>
                        &lt;/div>
                    &lt;/div>
                    &lt;div class="col-sm-5 col-md-6 small text-sm-end">
                        &lt;span class="d-block lh-sm small text-white-50">&copy; Copyright
                            &lt;script>
                                document.write(new Date().getFullYear())
    
                            &lt;/script>. Assan
                        &lt;/span>
                    &lt;/div>
                &lt;/div>
            &lt;/div>
        &lt;/div>
        &lt;!--container-->
    &lt;/footer>
    &lt;!--end:Footer-->    
</code>
</pre>
                            </div>
                        </div>
                        <!--Element Css-->
                        <div class="tab-pane fade" id="tabCss">
                            <div class="position-relative">
                                <button
                                    class="btn btn-sm position-absolute end-0 top-0 me-3 mt-3 z-1 btn-primary copy-link"
                                    data-clipboard-target="#copyCss1" data-clipboard-action="copy" id="copyCss1-2">Copy
                                    code</button>
                                <pre id="copyCss1" class="language-markup bg-secondary mt-0 text-white-50" data-lang="html">
                <code>
  &lt;!-- Bootstrap + Vendor + Theme -->
  &lt;link href="{{ URL::asset('assets/css/theme.min.css') }}" rel="stylesheet">
</code>
</pre>
                            </div>
                        </div>
                    </div>
                    <!--//////////////////SNIPPETS:END////////////////-->
                </div>
            </section>
</x-assan-layout>
