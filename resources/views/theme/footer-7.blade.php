<x-assan-layout layout-type="{{$layoutType}}">
            <section class="position-relative text-center bg-primary-subtle">
                <div class="container position-relative py-11">
                    <div class="row pt-lg-9 pb-lg-7">
                        <div class="col-xl-9 mx-auto">
                            <h1 class="display-4">Footer style - <a href="{{ URL::asset('#footer') }}" class="text-body-secondary">#7</a></h1>

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
    &lt;footer id="footer" class="position-relative footer overflow-hidden bg-body text-body" data-bs-theme="dark">
        &lt;div class="container pt-9 pt-lg-11 pb-5">
            &lt;div class="row">
                &lt;div class="col-md-3 col-sm-6 mb-5">
                    &lt;h5 class="mb-4">We're here&lt;/h5>
                    &lt;p>124 Monali Street,&lt;/p>
                    &lt;p>Rosemary,&nbsp; California&lt;/p>
                    &lt;p>302012, USA&lt;/p>
                    &lt;p class="mb-5">
                        &lt;a href="{{ URL::asset('#!') }}" class="link-underline">View on Map&lt;/a>
                    &lt;/p>
                    &lt;p class="mb-0">
                        &lt;h2 data-countup='{"startVal":0}' data-to="20000" data-aos-id="countup:in" data-aos
                            class="fs-2 fw-bold d-block">&lt;/h2> &lt;span class="text-body-secondary small">+ Users&lt;/span>
                    &lt;/p>
                &lt;/div>
                &lt;div class="col-md-4 col-sm-6 mb-5">
                    &lt;h5 class="mb-4">Say g’day&lt;/h5>
                    &lt;div class="footer-info-details">
                        &lt;p>
                            &lt;a href="{{ URL::asset('mailus@domain.com') }}" class="link-hover-underline">mailus@domain.com&lt;/a>
                        &lt;/p>
                        &lt;p class="mb-0">&lt;a class="link-hover-underline" href="{{ URL::asset('tel:+1123456789') }}">(01) 1123 56789&lt;/a>
                        &lt;/p>
                    &lt;/div>
    
                    &lt;hr class="my-4">
                    &lt;h6 class="mb-4">Follow us&lt;/h6>
                    &lt;div class="d-flex align-items-center">
                        &lt;!-- Social button -->
                        &lt;a href="{{ URL::asset('#!') }}" class="d-inline-block link-white mb-1 me-2 si rounded-pill si-hover-facebook">
                            &lt;i class="bx bxl-facebook fs-5">&lt;/i>
                            &lt;i class="bx bxl-facebook fs-5">&lt;/i>
                        &lt;/a>
                        &lt;!-- Social button -->
                        &lt;a href="{{ URL::asset('#!') }}" class="d-inline-block link-white mb-1 me-2 si rounded-pill si-hover-twitter">
                            &lt;i class="bx bxl-twitter fs-5">&lt;/i>
                            &lt;i class="bx bxl-twitter fs-5">&lt;/i>
                        &lt;/a>
                        &lt;!-- Social button -->
                        &lt;a href="{{ URL::asset('#!') }}" class="d-inline-block link-white mb-1 me-2 si rounded-pill si-hover-linkedin">
                            &lt;i class="bx bxl-linkedin fs-5">&lt;/i>
                            &lt;i class="bx bxl-linkedin fs-5">&lt;/i>
                        &lt;/a>
                        &lt;!-- Social button -->
                        &lt;a href="{{ URL::asset('#!') }}" class="d-inline-block link-white mb-1 si rounded-pill si-hover-instagram">
                            &lt;i class="bx bxl-instagram fs-5">&lt;/i>
                            &lt;i class="bx bxl-instagram fs-5">&lt;/i>
                        &lt;/a>
                    &lt;/div>
                    &lt;div class="d-inline-flex align-items-center dropup mt-6">
                        &lt;button class="btn border text-body py-2 px-2 d-flex align-items-center" id="assan-theme"
                            type="button" aria-expanded="false" data-bs-toggle="dropdown" data-bs-display="static">
                            &lt;span class="theme-icon-active d-flex align-items-center">
                                &lt;i class="bx align-middle" href="{{ URL::asset('null') }}">&lt;/i>
                            &lt;/span>
                        &lt;/button>
                        &lt;!--:Dark Mode Options:-->
                        &lt;ul class="dropdown-menu" aria-labelledby="assan-theme" style="--bs-dropdown-min-width: 9rem;">
                            &lt;li class="mb-1">
                                &lt;button type="button" class="dropdown-item d-flex align-items-center"
                                    data-bs-theme-value="light">
                                    &lt;span class="theme-icon d-flex align-items-center">
                                        &lt;i class="bx bx-sun align-middle me-2"> &lt;/i>
                                    &lt;/span>
                                    Light
                                &lt;/button>
                            &lt;/li>
                            &lt;li class="mb-1">
                                &lt;button type="button" class="dropdown-item d-flex align-items-center active"
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
                &lt;div class="col-md-5 mb-5">
                    &lt;div class="p-4 p-lg-5 rounded-5 bg-primary text-white rounded-top-start-4 rounded-bottom-end-4 shadow">
                        &lt;h3 class="mb-3">Request a free Quote&lt;/h3>
                        &lt;p class="mb-4 opacity-75">Drop us a line below and we’ll find a way to help you and your team out.
                        &lt;/p>
                        &lt;a class="btn btn-rise py-lg-3 px-lg-5 btn-outline-white rounded-pill" href="{{ URL::asset('#!') }}">
                            &lt;div class="btn-rise-bg bg-white">&lt;/div>
                            &lt;div class="btn-rise-text">
                                &lt;i class="bx bx-chat me-2">&lt;/i>
                                Chat with us
                            &lt;/div>
                        &lt;/a>
                    &lt;/div>
                &lt;/div>
            &lt;/div>
    
            &lt;hr class="mb-5 mt-0">
            &lt;div class="row align-items-center">
                &lt;div class="col-sm-7 mb-4 mb-sm-0">
                    &lt;div class="d-flex small align-items-center">
                        &lt;a class="d-block" href="{{ URL::asset('#') }}">About&lt;/a>
                        &lt;a class="d-block ms-3" href="{{ URL::asset('#') }}">Services&lt;/a>
                        &lt;a class="d-block ms-3" href="{{ URL::asset('#') }}">Work&lt;/a>
                        &lt;a class="d-block ms-3" href="{{ URL::asset('#') }}">Contact&lt;/a>
                    &lt;/div>
                &lt;/div>
                &lt;div class="col-sm-5 text-sm-end">
                    &lt;span class="d-block lh-sm small text-body-secondary">&copy; Copyright
                        &lt;script>
                            document.write(new Date().getFullYear())
    
                        &lt;/script>. Assan
                    &lt;/span>
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
