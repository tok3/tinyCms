<x-assan-layout layout-type="{{$layoutType}}">
            <section class="position-relative text-center bg-primary-subtle">
                <div class="container position-relative py-11">
                    <div class="row pt-lg-9 pb-lg-7">
                        <div class="col-xl-9 mx-auto">
                            <h1 class="display-4">Footer style - <a href="{{ URL::asset('#footer') }}" class="text-body-secondary">#5</a>
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
    &lt;footer id="footer" class="position-relative bg-dark footer" data-bs-theme="dark">
        &lt;div class="container pt-9 pt-lg-11 pb-5">
            &lt;div class="row mb-5">
                &lt;div class="col-lg-7 col-md-12 mb-5 mb-lg-0">
                    &lt;div class="mb-7 mb-lg-9 d-flex flex-column flex-sm-row justify-content-between align-items-end">
                        &lt;img src="{{ URL::asset('assets/img/logo/logo-white.svg') }}" alt="Assan Logo" class="width-8x mb-6 mb-sm-0">
                        &lt;!--:Dark Mode:-->
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
                    &lt;div class="row">
                        &lt;div class="col-md-4 mb-5 mb-md-0">
                            &lt;h5 class="mb-4 text-white">Products&lt;/h5>
                            &lt;nav class="nav flex-column">
                                &lt;a href="{{ URL::asset('#') }}" class="nav-link p-0 mb-3">Assan&lt;/a>
                                &lt;a href="{{ URL::asset('#') }}" class="nav-link p-0 mb-3">Airbnb&lt;/a>
                                &lt;a href="{{ URL::asset('#') }}" class="nav-link p-0 mb-3">Codepen&lt;/a>
                                &lt;a href="{{ URL::asset('#') }}" class="nav-link p-0 mb-3">Chrome&lt;/a>
                                &lt;a href="{{ URL::asset('#') }}" class="nav-link p-0 mb-3">Dropbox&lt;/a>
                                &lt;a href="{{ URL::asset('#') }}" class="nav-link p-0 mb-3">Jira&lt;/a>
                                &lt;a href="{{ URL::asset('#') }}" class="nav-link p-0 mb-3">Slack&lt;/a>
                                &lt;a href="{{ URL::asset('#') }}" class="nav-link p-0">Zendesk&lt;/a>
                            &lt;/nav>
                        &lt;/div>
                        &lt;div class="col-md-4 mb-5 mb-md-0">
                            &lt;h5 class="mb-4 text-white">Resources&lt;/h5>
                            &lt;nav class="nav flex-column">
                                &lt;a href="{{ URL::asset('#') }}" class="nav-link p-0 mb-3">Bootstrap&lt;/a>
                                &lt;a href="{{ URL::asset('#') }}" class="nav-link p-0 mb-3">Wrapbootstrap&lt;/a>
                                &lt;a href="{{ URL::asset('#') }}" class="nav-link p-0 mb-3">Babel&lt;/a>
                                &lt;a href="{{ URL::asset('#') }}" class="nav-link p-0 mb-3">Browserify&lt;/a>
                                &lt;a href="{{ URL::asset('#') }}" class="nav-link p-0 mb-3">Greensock&lt;/a>
                                &lt;a href="{{ URL::asset('#') }}" class="nav-link p-0 mb-3">Javascript&lt;/a>
                                &lt;a href="{{ URL::asset('#') }}" class="nav-link p-0 mb-3">Gulp&lt;/a>
                                &lt;a href="{{ URL::asset('#') }}" class="nav-link p-0">Sass&lt;/a>
                            &lt;/nav>
                        &lt;/div>
                        &lt;div class="col-md-4">
                            &lt;h5 class="mb-4 text-white">Company&lt;/h5>
                            &lt;nav class="nav flex-column">
                                &lt;a href="{{ URL::asset('#') }}" class="nav-link p-0 mb-3">About us&lt;/a>
                                &lt;a href="{{ URL::asset('#') }}" class="nav-link p-0 mb-3">Career&lt;/a>
                                &lt;a href="{{ URL::asset('#') }}" class="nav-link p-0 mb-3">Team&lt;/a>
                                &lt;a href="{{ URL::asset('#') }}" class="nav-link p-0">Blog&lt;/a>
                            &lt;/nav>
                        &lt;/div>
                    &lt;/div>
    
                &lt;/div>
                &lt;div class="col-lg-5 ms-auto">
                    &lt;div class="py-5 bg-white-25 bg-gradient px-4 rounded-4">
                        &lt;h5 class="mb-4 text-white">Contact&lt;/h5>
                        &lt;div class="mb-2">&lt;a href="{{ URL::asset('tel:+1123456789') }}" class="fs-5 link-hover-underline">+1 1234 56789&lt;/a>
                        &lt;/div>
                        &lt;div>&lt;a href="{{ URL::asset('mailto:hello@domain.com?subject=Hello!') }}"
                                class="fs-5 link-hover-underline">support@domain.com&lt;/a>
                        &lt;/div>
                        &lt;hr class="my-4 text-white my-sm-5">
                        &lt;h5 class="mb-4 text-white">Have a project?&lt;/h5>
                        &lt;a href="{{ URL::asset('#') }}" class="btn btn-primary rounded-pill hover-lift btn-hover-arrow">&lt;span>Let's talk with
                                us&lt;/span>&lt;/a>
    
                        &lt;hr class="my-4 text-white my-sm-5">
                        &lt;h5 class="mb-4 text-white">Follow us&lt;/h5>
                        &lt;div class="mb-4 mb-md-0 d-flex">
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
                    &lt;/div>
                &lt;/div>
            &lt;/div>
            &lt;hr class="mt-0 mb-5">
            &lt;div class="row justify-content-between">
                &lt;div class="col-md-7 mb-4 mb-md-0">
                    &lt;div class="nav small">
                        &lt;a href="{{ URL::asset('#') }}" class="nav-link ps-0">Privacy Policy&lt;/a>
                        &lt;a href="{{ URL::asset('#') }}" class="nav-link ps-0">Terms and Conditions&lt;/a>
                        &lt;a href="{{ URL::asset('#') }}" class="nav-link ps-0">Press kit&lt;/a>
                    &lt;/div>
                &lt;/div>
    
                &lt;div class="col-md-5 text-md-end">
                    &lt;span class="d-block lh-sm small text-white-50">&copy; Copyright
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
