<x-assan-layout layout-type="{{$layoutType}}">
            <section class="position-relative text-center bg-primary-subtle">
                <div class="container position-relative py-11">
                    <div class="row pt-lg-9 pb-lg-7">
                        <div class="col-xl-9 mx-auto">
                            <h1 class="display-4">Footer style - <a href="{{ URL::asset('#footer') }}" class="text-body-secondary">#8</a></h1>

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
            <section class="border-bottom">
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
    &lt;footer id="footer" class="bg-body text-body footer position-relative">
        &lt;div class="container pt-9 pt-lg-11 pb-5 position-relative z-1">
            &lt;div class="row">
                &lt;!--Footer col-->
                &lt;div class="col-md-7 col-lg-3 mb-7">
                    &lt;a class="navbar-brand width-10x" href="{{ URL::asset('index.html') }}">
                        &lt;img src="{{ URL::asset('assets/img/logo/logo.svg') }}" alt="" class="img-fluid navbar-brand-light">
                        &lt;img src="{{ URL::asset('assets/img/logo/logo-white.svg') }}" alt="" class="img-fluid navbar-brand-dark">
                    &lt;/a>
                    &lt;hr>
                    &lt;small class="text-body-secondary d-block">
                        Enquiries
                    &lt;/small>
                    &lt;a href="{{ URL::asset('#!mailto:yourmail.domain.com') }}">info@domian.com&lt;/a>
                    &lt;hr>
                    &lt;small class="text-body-secondary mb-3 d-block">
                        Join Us Today
                    &lt;/small>
                    &lt;a href="{{ URL::asset('#!') }}" class="btn btn-secondary d-table">Upgrade to Pro&lt;/a>
                    &lt;!--:Dark Mode:-->
                    &lt;div class="d-inline-flex align-items-center dropup mt-6">
                        &lt;button class="btn border text-body py-2 px-2 d-flex align-items-center" id="assan-theme" type="button" aria-expanded="false" data-bs-toggle="dropdown" data-bs-display="static">
                            &lt;span class="theme-icon-active d-flex align-items-center">
                                &lt;i class="bx align-middle" href="{{ URL::asset('null') }}">&lt;/i>
                            &lt;/span>
                        &lt;/button>
                        &lt;!--:Dark Mode Options:-->
                        &lt;ul class="dropdown-menu" aria-labelledby="assan-theme" style="--bs-dropdown-min-width: 9rem;">
                            &lt;li class="mb-1">
                                &lt;button type="button" class="dropdown-item d-flex align-items-center active" data-bs-theme-value="light">
                                    &lt;span class="theme-icon d-flex align-items-center">
                                        &lt;i class="bx bx-sun align-middle me-2"> &lt;/i>
                                    &lt;/span>
                                    Light
                                &lt;/button>
                            &lt;/li>
                            &lt;li class="mb-1">
                                &lt;button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="dark">
                                    &lt;span class="theme-icon d-flex align-items-center">
                                        &lt;i class="bx bx-moon align-middle me-2">&lt;/i>
                                    &lt;/span>
                                    Dark
                                &lt;/button>
                            &lt;/li>
                            &lt;li>
                                &lt;button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="auto">
                                    &lt;span class="theme-icon d-flex align-items-center">
                                        &lt;i class="bx bx-color-fill align-middle me-2">&lt;/i>
                                    &lt;/span>
                                    Auto
                                &lt;/button>
                            &lt;/li>
                        &lt;/ul>
                    &lt;/div>
                &lt;/div>
                &lt;!--Footer col-->
                &lt;div class="col-md-4 col-lg-2 ms-md-auto mb-7 col-7">
                    &lt;h6 class="mb-2">Links&lt;/h6>
                    &lt;ul class="nav flex-column">
                        &lt;li class="nav-item">
                            &lt;a href="{{ URL::asset('#') }}" class="nav-link">
                                About us
                            &lt;/a>
                        &lt;/li>
                        &lt;li class="nav-item">
                            &lt;a href="{{ URL::asset('#') }}" class="nav-link">
                                Newsletter
                            &lt;/a>
                        &lt;/li>
                        &lt;li class="nav-item">
                            &lt;a href="{{ URL::asset('#') }}" class="nav-link">
                                Contact
                            &lt;/a>
                        &lt;/li>
                        &lt;li class="nav-item">
                            &lt;a href="{{ URL::asset('#') }}" class="nav-link">
                                Career &lt;span class="badge bg-success rounded-pill ms-1">Hiring&lt;/span>
                            &lt;/a>
                        &lt;/li>
                        &lt;li class="nav-item">
                            &lt;a href="{{ URL::asset('#') }}" class="nav-link">
                                Privacy policy
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
                &lt;div class="col-md-4 col-lg-2 ms-lg-auto mb-7 col-5">
                    &lt;h6 class="mb-2">Categories&lt;/h6>
                    &lt;ul class="nav flex-column">
                        &lt;li class="nav-item">
                            &lt;a href="{{ URL::asset('#') }}" class="nav-link">
                                Design
                            &lt;/a>
                        &lt;/li>
                        &lt;li class="nav-item">
                            &lt;a href="{{ URL::asset('#') }}" class="nav-link">
                                Development
                            &lt;/a>
                        &lt;/li>
                        &lt;li class="nav-item">
                            &lt;a href="{{ URL::asset('#') }}" class="nav-link">
                                Fashion
                            &lt;/a>
                        &lt;/li>
                        &lt;li class="nav-item">
                            &lt;a href="{{ URL::asset('#') }}" class="nav-link">
                                Business
                            &lt;/a>
                        &lt;/li>
                        &lt;li class="nav-item">
                            &lt;a href="{{ URL::asset('#') }}" class="nav-link">
                                Nature
                            &lt;/a>
                        &lt;/li>
                        &lt;li class="nav-item">
                            &lt;a href="{{ URL::asset('#') }}" class="nav-link">
                                Travel
                            &lt;/a>
                        &lt;/li>
                    &lt;/ul>
                &lt;/div>
                &lt;!--Footer col-->
                &lt;div class="col-md-8 col-lg-4 mb-7">
                    &lt;h6 class="mb-4">Popular articles&lt;/h6>
                    &lt;ul class="list-unstyled">
                        &lt;li class="d-flex card-hover mb-4 align-items-center">
                            &lt;div class="me-3">
                                &lt;a href="{{ URL::asset('#!') }}" class="d-block width-7x height-7x rounded-3 overflow-hidden">
                                    &lt;img src="{{ URL::asset('assets/img/960x1140/1.jpg') }}" alt="" class="img-fluid img-zoom">
                                &lt;/a>
                            &lt;/div>
                            &lt;div>
                                &lt;a href="{{ URL::asset('#!') }}" class="lh-sm d-block mb-1">Tips for creating a long-lasting
                                    partnership with your startup&lt;/a>
                                &lt;span class="d-block small text-body-secondary">02 Sep 2021&lt;/span>
                            &lt;/div>
                        &lt;/li>
                        &lt;li class="d-flex card-hover mb-4 align-items-center">
                            &lt;div class="me-3">
                                &lt;a href="{{ URL::asset('#!') }}" class="d-block width-7x height-7x rounded-3 overflow-hidden">
                                    &lt;img src="{{ URL::asset('assets/img/960x1140/2.jpg') }}" alt="" class="img-fluid img-zoom">
                                &lt;/a>
                            &lt;/div>
                            &lt;div>
                                &lt;a href="{{ URL::asset('#!') }}" class="lh-sm d-block mb-1">Functional programming in python for
                                    beginners&lt;/a>
                                &lt;span class="d-block small text-body-secondary">18 Sep 2021&lt;/span>
                            &lt;/div>
                        &lt;/li>
                        &lt;li class="d-flex card-hover align-items-center">
                            &lt;div class="me-3">
                                &lt;a href="{{ URL::asset('#!') }}" class="d-block width-7x height-7x rounded-3 overflow-hidden">
                                    &lt;img src="{{ URL::asset('assets/img/960x1140/3.jpg') }}" alt="" class="img-fluid img-zoom">
                                &lt;/a>
                            &lt;/div>
                            &lt;div>
                                &lt;a href="{{ URL::asset('#!') }}" class="lh-sm d-block mb-1">Modern and well coded bootstrap themes you should
                                    buy&lt;/a>
                                &lt;span class="d-block small text-body-secondary">19 Aug 2021&lt;/span>
                            &lt;/div>
                        &lt;/li>
                    &lt;/ul>
                &lt;/div>
            &lt;/div>
            &lt;hr class="mb-5 mt-0">
            &lt;div class="row">
                &lt;div class="col-sm-7 mb-3 mb-sm-0">
                    &lt;div class="dropup d-table">
                        &lt;a href="{{ URL::asset('#') }}" data-bs-toggle="dropdown" role="button" aria-expanded="false"
                            class="dropdown-toggle text-body">
                            United States (English)
                        &lt;/a>
    
                        &lt;!--Dropdown lang menu-->
                        &lt;div class="dropdown-menu mb-3 dropdown-menu-lg-start" style="margin: 0px;">
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
                &lt;div class="col-sm-5 small text-sm-end">
                    &lt;span class="d-block lh-sm text-body-secondary">&copy; Copyright
                        &lt;script>
                            document.write(new Date().getFullYear())
    
                        &lt;/script>. Assan
                    &lt;/span>
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
                            <pre id="copyCss1" class="language-markup bg-secondary text-white-50 mt-0" data-lang="html">
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
