<x-assan-layout layout-type="{{$layoutType}}">
            <section class="position-relative text-center bg-primary-subtle">
                <div class="container position-relative py-11">
                    <div class="row pt-lg-9 pb-lg-7">
                        <div class="col-xl-9 mx-auto">
                            <h1 class="display-4">Footer style - <a href="{{ URL::asset('#footer') }}" class="text-body-secondary">#6</a>
                            </h1>

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
    &lt;footer id="footer" class="footer position-relative" data-bs-theme="dark"&gt;
    &lt;!--:Svg Wave:--&gt;
    &lt;svg class="text-dark w-100" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg" width="1920" height="120"
        viewBox="0 0 1920 200"&gt;
        &lt;path d="M1920 186 1066.66 71.45C1415 81 1650 58 1920 0" fill="var(--bs-primary)" /&gt;
        &lt;path d="M1920 200H0V11.31c873-5.64 873 73 1918.65 73h1.35Z" fill="currentColor" /&gt;
    &lt;/svg&gt;
    &lt;div class="bg-dark text-body">
    &lt;div class="container pt-5 pt-lg-7 pb-5 pb-lg-7">
            &lt;div class="row">
                &lt;div class="col-lg-3 col-md-6 mb-7">
                    &lt;a class="d-table mb-4" href="{{ URL::asset('#') }}">
                        &lt;img src="{{ URL::asset('assets/img/logo/logo-white.svg') }}" alt="" class="width-9x h-auto">
                    &lt;/a>
                    &lt;p>&lt;strong>Company Pty Ltd&lt;/strong>&lt;/p>
                    &lt;p>124, Lorem street,&lt;br>Park avenue Rd,&lt;br>302012, LA,&lt;br> USA&lt;/p>
                    &lt;p>
                        &lt;span class="text-body-secondary">Phone:&lt;/span>
                        &lt;a href="{{ URL::asset('tel:0123456789') }}">+01 1234 56789&lt;/a>
                    &lt;/p>
                    &lt;p class="text-body-secondary mb-0">
                        &lt;span class="text-body-secondary">Email:&lt;/span> &lt;a
                            href="{{ URL::asset('mailto:mailus@domain.com') }}">mailus@domain.com&lt;/a>
                    &lt;/p>
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
                &lt;div class="col-lg-2 col-md-3 col-sm-4 ms-md-auto mb-7">
                    &lt;h5 class="mb-3">About&lt;/h5>
                    &lt;nav class="nav flex-column">
                        &lt;a class="nav-link" href="{{ URL::asset('#') }}">About company&lt;/a>
                        &lt;a class="nav-link" href="{{ URL::asset('#') }}">Meet the Team&lt;/a>
                        &lt;a class="nav-link" href="{{ URL::asset('#') }}">Contact Us&lt;/a>
                    &lt;/nav>
                &lt;/div>
                &lt;div class="col-lg-2 col-md-3 col-sm-4 mb-7">
                    &lt;h5 class="mb-3">Learn More&lt;/h5>
                    &lt;nav class="nav flex-column">
                        &lt;a class="nav-link" href="{{ URL::asset('#') }}">Crowdfunds&lt;/a>
                        &lt;a class="nav-link" href="{{ URL::asset('#') }}">IPO&lt;/a>
                        &lt;a class="nav-link" href="{{ URL::asset('#') }}">Wholesale&lt;/a>
                        &lt;a class="nav-link" href="{{ URL::asset('#') }}">Resource&lt;/a>
                        &lt;a class="nav-link" href="{{ URL::asset('#') }}">FAQs&lt;/a>
                        &lt;a class="nav-link" href="{{ URL::asset('#') }}">News & media&lt;/a>
                        &lt;a class="nav-link" href="{{ URL::asset('#') }}">Raise Capital&lt;/a>
                    &lt;/nav>
                &lt;/div>
                &lt;div class="col-lg-2 col-sm-4 mb-7">
                    &lt;h5 class="mb-3">Legal&lt;/h5>
                    &lt;nav class="nav flex-column">
                        &lt;a class="nav-link" href="{{ URL::asset('#') }}">Investor&lt;/a>
                        &lt;a class="nav-link" href="{{ URL::asset('#') }}">Disclosure&lt;/a>
                        &lt;a class="nav-link" href="{{ URL::asset('#') }}">Statements&lt;/a>
                        &lt;a class="nav-link" href="{{ URL::asset('#') }}">Debit&lt;/a>
                        &lt;a class="nav-link" href="{{ URL::asset('#') }}">Fair Policy&lt;/a>
                        &lt;a class="nav-link" href="{{ URL::asset('#') }}">Services Guide&lt;/a>
                    &lt;/nav>
                &lt;/div>
                &lt;div class="col-lg-3 col-md-8 mb-7">
                    &lt;h5 class="mb-3">Subscribe&lt;/h5>
                    &lt;span class="d-block text-body-secondary mb-4">Subscribe to our newsletter and stay up to date with
                        latest news
                        and
                        offers.&lt;/span>
                    &lt;div class="newsletter-signup">
                        &lt;form novalidate class="needs-validation">
                            &lt;div class="d-flex flex-column mb-2">
                                &lt;input type="email" placeholder="Enter email address"
                                    class="form-control bg-transparent mb-2" required="">
                                &lt;button class="btn btn-primary" type="submit">Subscribe&lt;/button>
                            &lt;/div>
                        &lt;/form>
                        &lt;span class="small text-body-secondary d-block text-end">We do not share your email&lt;/span>
                    &lt;/div>
                &lt;/div>
            &lt;/div>
            &lt;hr class="mb-7">
            &lt;div class="row">
                &lt;div class="col-sm-5 mb-3 mb-sm-0">
                    &lt;span class="d-block lh-sm small text-body-secondary">&copy; Copyright
                        &lt;script>
                            document.write(new Date().getFullYear())
    
                        &lt;/script>. Assan
                    &lt;/span>
                &lt;/div>
                &lt;div class="col-sm-7">
                    &lt;nav class="nav justify-content-sm-end">
                        &lt;a class="nav-link small px-0 me-3" href="{{ URL::asset('#!') }}">&lt;small>Privacy Policy&lt;/small>&lt;/a>
                        &lt;a class="nav-link small px-0" href="{{ URL::asset('#!') }}">&lt;small>Terms of Service&lt;/small>&lt;/a>
                    &lt;/nav>
                &lt;/div>
            &lt;/div>
        &lt;/div>
     &lt;/div>
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
