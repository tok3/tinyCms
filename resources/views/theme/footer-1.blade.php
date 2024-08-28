<x-assan-layout layout-type="{{$layoutType}}">
            <section class="position-relative text-center bg-primary-subtle">
                <div class="container position-relative py-11">
                    <div class="row pt-lg-9 pb-lg-7">
                        <div class="col-xl-9 mx-auto">
                            <h1 class="display-4">Footer style - <a href="{{ URL::asset('#footer') }}" class="text-body-secondary">#1</a>
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
    &lt;footer id="footer" class="bg-dark footer position-relative" data-bs-theme="dark">
        &lt;div class="container pt-9 pt-lg-11">
            &lt;div class="row">
                &lt;div class="col-md-12 col-lg-4 mb-5 h-100 me-auto">
                    &lt;!--Title-->
                    &lt;h2 class="display-6 text-white mb-0 position-relative">
                        Work with us
                    &lt;/h2>
                    &lt;div class="pt-3 mb-6">
                        &lt;a class="link-underline link-light fs-5" href="{{ URL::asset('mailto:mail@doamin.com') }}">mail@domain.com&lt;/a>
                    &lt;/div>
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
                &lt;div class="col-sm-4 col-lg-2 mb-5 mb-md-0 ms-auto h-100">
                    &lt;!--Title-->
                    &lt;h6 class="small mb-3 mb-lg-4 text-white-50">Learn&lt;/h6>
                    &lt;!--Nav-->
                    &lt;ul class="nav flex-column mb-0">
                        &lt;li class="nav-item">&lt;a class="nav-link" href="{{ URL::asset('#!') }}">Design&lt;/a>&lt;/li>
                        &lt;li class="nav-item">&lt;a class="nav-link" href="{{ URL::asset('#!') }}">Digital&lt;/a>&lt;/li>
                        &lt;li class="nav-item">&lt;a class="nav-link" href="{{ URL::asset('#!') }}">Development&lt;/a>&lt;/li>
                        &lt;li class="nav-item">&lt;a class="nav-link" href="{{ URL::asset('#!') }}">Branding&lt;/a>&lt;/li>
                        &lt;li class="nav-item">&lt;a class="nav-link" href="{{ URL::asset('#!') }}">Graphics&lt;/a>&lt;/li>
                        &lt;li class="nav-item">&lt;a class="nav-link" href="{{ URL::asset('#!') }}">Process&lt;/a>&lt;/li>
                    &lt;/ul>
                &lt;/div>
                &lt;!--/.Col-->
                &lt;div class="col-sm-4 col-lg-2 mb-5 h-100">
                    &lt;!--Title-->
                    &lt;h6 class="small mb-3 mb-lg-4 text-white-50">Resources&lt;/h6>
                    &lt;!--Nav-->
                    &lt;ul class="nav flex-column mb-0">
                        &lt;li class="nav-item">&lt;a class="nav-link" href="{{ URL::asset('#!') }}">Elements&lt;/a>&lt;/li>
                        &lt;li class="nav-item">&lt;a class="nav-link" href="{{ URL::asset('#!') }}">Pricing&lt;/a>&lt;/li>
                        &lt;li class="nav-item">&lt;a class="nav-link" href="{{ URL::asset('#!') }}">Features&lt;/a>&lt;/li>
                        &lt;li class="nav-item">&lt;a class="nav-link" href="{{ URL::asset('#!') }}">Blog&lt;/a>&lt;/li>
                        &lt;li class="nav-item">&lt;a class="nav-link" href="{{ URL::asset('#!') }}">Credits&lt;/a>&lt;/li>
                        &lt;li class="nav-item">&lt;a class="nav-link" href="{{ URL::asset('#!') }}">Updates&lt;/a>&lt;/li>
                        &lt;li class="nav-item">&lt;a class="nav-link" href="{{ URL::asset('#!') }}">Help center&lt;/a>&lt;/li>
                        &lt;li class="nav-item">&lt;a class="nav-link" href="{{ URL::asset('#!') }}">Events&lt;/a>&lt;/li>
                    &lt;/ul>
                &lt;/div>
                &lt;!--/.Col-->
                &lt;div class="col-sm-4 col-lg-3 col-xl-2 mb-5 mb-sm-0 h-100">
                    &lt;!--Title-->
                    &lt;h6 class="small mb-3 mb-lg-4 text-white-50">Company&lt;/h6>
                    &lt;!--Nav-->
                    &lt;ul class="nav flex-column mb-0">
                        &lt;li class="nav-item">&lt;a class="nav-link" href="{{ URL::asset('#!') }}">About&lt;/a>&lt;/li>
                        &lt;li class="nav-item">&lt;a class="nav-link" href="{{ URL::asset('#!') }}">Awwards&lt;/a>&lt;/li>
                        &lt;li class="nav-item">
                            &lt;a class="nav-link" href="{{ URL::asset('#!') }}">Careers
                                &lt;span class="badge badge-pill ms-1 bg-primary">Hiring&lt;/span>
                            &lt;/a>
                        &lt;/li>
                        &lt;li class="nav-item">&lt;a class="nav-link" href="{{ URL::asset('#!') }}">Customers&lt;/a>&lt;/li>
                        &lt;li class="nav-item">&lt;a class="nav-link" href="{{ URL::asset('#!') }}">Affiliate&lt;/a>&lt;/li>
                        &lt;li class="nav-item">&lt;a class="nav-link" href="{{ URL::asset('#!') }}">Contact us&lt;/a>&lt;/li>
                        &lt;li class="nav-item">&lt;a class="nav-link" href="{{ URL::asset('#!') }}">Terms of use&lt;/a>&lt;/li>
                        &lt;li class="nav-item">&lt;a class="nav-link" href="{{ URL::asset('#!') }}">Privacy policy&lt;/a>&lt;/li>
                    &lt;/ul>
                &lt;/div>
                &lt;!--/.Col-->
            &lt;/div>
            &lt;hr class="mb-5 mt-0 text-white">
        &lt;/div> &lt;!-- / .container -->
        &lt;div class="pb-5">
            &lt;div class="container">
                &lt;div class="row justify-content-md-between align-items-center">
                    &lt;div class="d-flex mb-3 mb-md-0 col-sm-6 col-md-4">
                        &lt;!-- Social button -->
                        &lt;a href="{{ URL::asset('#!') }}" class="d-inline-block text-white mb-1 me-2 si rounded-pill si-hover-facebook">
                            &lt;i class="bx bxl-facebook fs-5">&lt;/i>
                            &lt;i class="bx bxl-facebook fs-5">&lt;/i>
                        &lt;/a>
                        &lt;!-- Social button -->
                        &lt;a href="{{ URL::asset('#!') }}" class="d-inline-block text-white mb-1 me-2 si rounded-pill si-hover-twitter">
                            &lt;i class="bx bxl-twitter fs-5">&lt;/i>
                            &lt;i class="bx bxl-twitter fs-5">&lt;/i>
                        &lt;/a>
                        &lt;!-- Social button -->
                        &lt;a href="{{ URL::asset('#!') }}" class="d-inline-block text-white mb-1 me-2 si rounded-pill si-hover-linkedin">
                            &lt;i class="bx bxl-linkedin fs-5">&lt;/i>
                            &lt;i class="bx bxl-linkedin fs-5">&lt;/i>
                        &lt;/a>
                        &lt;!-- Social button -->
                        &lt;a href="{{ URL::asset('#!') }}" class="d-inline-block text-white mb-1 si rounded-pill si-hover-instagram">
                            &lt;i class="bx bxl-instagram fs-5">&lt;/i>
                            &lt;i class="bx bxl-instagram fs-5">&lt;/i>
                        &lt;/a>
                    &lt;/div>
                    &lt;div class="col-sm-6 col-md-4 text-sm-end">
                        &lt;span class="d-block lh-sm small text-white-50">© Copyright
                            &lt;script>
                                document.write(new Date().getFullYear())
    
                            &lt;/script>. Assan
                        &lt;/span>
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
