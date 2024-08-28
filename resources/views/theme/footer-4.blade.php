<x-assan-layout layout-type="{{$layoutType}}">
            <section class="position-relative text-center bg-primary-subtle">
                <div class="container position-relative py-11">
                    <div class="row pt-lg-9 pb-lg-7">
                        <div class="col-xl-9 mx-auto">
                            <h1 class="display-4">Footer style - <a href="{{ URL::asset('#footer') }}" class="text-body-secondary">#4</a>
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
            <section class="position-relative border-bottom">
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
    &lt;footer id="footer" class="bg-body footer">
        &lt;div class="container pt-9 pt-lg-11 pb-5">
            &lt;div class="row">
                &lt;div class="col-sm-7 mb-4 mb-sm-0">
                    &lt;h5 class="mb-0 text-body-secondary">1355 Market St, &lt;br> Suite 900,
                        San Francisco&lt;br>
                        CA, 94103&lt;/h5>
                        &lt;!--:Dark Mode:-->
                        &lt;div class="d-inline-flex align-items-center dropup mt-6">
                            &lt;button class="btn border text-body py-1 px-3 dropdown-toggle d-flex align-items-center" id="assan-theme" type="button" aria-expanded="false" data-bs-toggle="dropdown" data-bs-display="static">
                                &lt;span class="theme-icon-active d-flex align-items-center">
                                    &lt;small>Current theme&lt;/small> &lt;i class="bx align-middle ms-2" href="{{ URL::asset('null') }}">&lt;/i>
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
                &lt;div class="col-sm-5 text-sm-end">
                    &lt;a href="{{ URL::asset('#!') }}" class="fs-6 link-hover-underline">+011(1234) 56789&lt;/a>&lt;br>&lt;br>
                    &lt;a href="{{ URL::asset('mailto:mail@domain.agency') }}" class="fs-6 link-hover-underline">mail@domain.agency&lt;/a>
                &lt;/div>
            &lt;/div>
            &lt;hr class="my-4">
            &lt;div class="row text-secondary">
                &lt;div class="col-sm-7 mb-3 mb-sm-0">
                    &lt;nav class="nav mb-0 gap-3">
                        &lt;a class="link-hover-underline nav-link px-0 pt-0" href="{{ URL::asset('#') }}">Facebook&lt;/a>
                        &lt;a class="link-hover-underline nav-link px-0 pt-0" href="{{ URL::asset('#') }}">Twitter&lt;/a>
                        &lt;a class="link-hover-underline nav-link px-0 pt-0" href="{{ URL::asset('#') }}">Linkedin&lt;/a>
                        &lt;a class="link-hover-underline nav-link px-0 pt-0" href="{{ URL::asset('#') }}">Behance&lt;/a>
                    &lt;/nav>
                &lt;/div>
                &lt;div class="col-sm-5 text-sm-end">
                    &lt;span class="d-block lh-sm small text-body-tertiary">&copy; Copyright
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
