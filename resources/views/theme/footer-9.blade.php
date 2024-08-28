<x-assan-layout layout-type="{{$layoutType}}">
            <section class="position-relative text-center bg-primary-subtle">
                <div class="container position-relative py-11">
                    <div class="row pt-lg-9 pb-lg-7">
                        <div class="col-xl-9 mx-auto">
                            <h1 class="display-4">Footer style - <a href="{{ URL::asset('#footer') }}" class="text-body-secondary">#9</a></h1>

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
    &lt;footer id="footer" class="overflow-hidden footer position-relative bg-body text-body" data-bs-theme="dark">
        &lt;!--Divider-->
        &lt;svg class="position-absolute start-0 bottom-0 h-50" preserveAspectRatio="none" width="100%" height="250"
            viewBox="0 0 1200 250" fill="none" xmlns="http://www.w3.org/2000/svg">
            &lt;path opacity="0.075" fill-rule="evenodd" clip-rule="evenodd"
                d="M0 62.5L22 46.875C44 31.25 89 0 133 0C178 0 222 31.25 267 72.9167C311 114.583 356 166.667 400 187.5C444 208.333 489 197.917 533 182.292C578 166.667 622 145.833 667 114.583C711 83.3333 756 41.6667 800 26.0417C844 10.4167 889 20.8333 933 62.5C978 104.167 1022 177.083 1067 208.333C1111 239.583 1156 229.167 1178 223.958L1200 218.75V250H1178C1156 250 1111 250 1067 250C1022 250 978 250 933 250C889 250 844 250 800 250C756 250 711 250 667 250C622 250 578 250 533 250C489 250 444 250 400 250C356 250 311 250 267 250C222 250 178 250 133 250C89 250 44 250 22 250H0V62.5Z"
                fill="currentColor" />
            &lt;path opacity="0.05" fill-rule="evenodd" clip-rule="evenodd"
                d="M0 93.667L24.8889 87.4756C49.7778 82.8321 99.5556 71.9971 149.333 93.667C200.889 113.789 250.667 166.416 300.444 186.538C350.222 208.208 400 197.373 449.778 171.06C499.556 144.746 549.333 102.954 600.889 76.6407C650.667 50.3272 700.444 41.0401 750.222 61.1622C800 82.8321 849.778 135.459 899.556 129.268C949.333 124.624 1000.89 61.1622 1050.67 50.3272C1100.44 41.0401 1150.22 82.8321 1175.11 102.954L1200 124.624V250H1175.11C1150.22 250 1100.44 250 1050.67 250C1000.89 250 949.333 250 899.556 250C849.778 250 800 250 750.222 250C700.444 250 650.667 250 600.889 250C549.333 250 499.556 250 449.778 250C400 250 350.222 250 300.444 250C250.667 250 200.889 250 149.333 250C99.5556 250 49.7778 250 24.8889 250H0V93.667Z"
                fill="currentColor" />
        &lt;/svg>
        &lt;div class="container pt-9 pt-lg-11 pb-5 pb-lg-7 position-relative z-1">
            &lt;div class="row mb-5 mb-lg-7">
                &lt;div class="col-md-6 mb-3 mb-md-0">
                    &lt;!--:Brand:-->
                    &lt;a href="{{ URL::asset('index.html') }}">
                        &lt;img src="{{ URL::asset('assets/img/logo/logo-white.svg') }}" class="width-10x d-block h-auto" alt="">&lt;/a>
                    &lt;a href="{{ URL::asset('mailto:mail@domain.com') }}" class="fs-4 mt-4 mb-3 link-hover-underline">mail@domain.com&lt;/a>&lt;br>
                    &lt;a href="{{ URL::asset('mailto:mail@domain.com') }}" class="fs-4 link-hover-underline">+01 123-4567-890&lt;/a>
                    &lt;div class="position-relative">
                        &lt;div class="d-inline-flex align-items-center dropup mt-6">
                            &lt;button class="btn border text-body py-2 px-2 d-flex align-items-center" id="assan-theme"
                                type="button" aria-expanded="false" data-bs-toggle="dropdown" data-bs-display="static">
                                &lt;span class="theme-icon-active d-flex align-items-center">
                                    &lt;i class="bx align-middle">&lt;/i>
                                &lt;/span>
                            &lt;/button>
                            &lt;!--:Dark Mode Options:-->
                            &lt;ul class="dropdown-menu" aria-labelledby="assan-theme" style="--bs-dropdown-min-width: 9rem;">
                                &lt;li class="mb-1">
                                    &lt;button type="button" class="dropdown-item d-flex align-items-center"
                                        data-bs-theme-value="light">
                                        &lt;span class="theme-icon d-flex align-items-center">
                                            &lt;i class="bx bx-sun align-middle me-2">&lt;/i>
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
                &lt;/div>
                &lt;div class="col-md-6 text-md-end">
                    &lt;p class="mt-3">
                        &lt;strong class="small text-white">Company, Inc.&lt;/strong>
                    &lt;/p>
                    &lt;p class="mt-3 mb-0 text-white">
                        1355 Market St, Suite 900&lt;br> San Francisco&lt;br> CA 94103
                    &lt;/p>
                &lt;/div>
            &lt;/div>
            &lt;div class="row align-items-center">
                &lt;div class="col-md-8 order-md-last mb-3 mb-md-0">
                    &lt;div class="d-flex flex-wrap justify-content-md-end me-n4">
                        &lt;a href="{{ URL::asset('#!') }}" class="small me-4 link-hover-underline my-2 block">Properties&lt;/a>
                        &lt;a href="{{ URL::asset('#!') }}" class="small me-4 link-hover-underline my-2 block">Careers&lt;/a>
                        &lt;a href="{{ URL::asset('#!') }}" class="small me-4 link-hover-underline my-2 block">Company&lt;/a>
                        &lt;a href="{{ URL::asset('#!') }}" class="small me-4 link-hover-underline my-2 block">Privacy policy&lt;/a>
                    &lt;/div>
                &lt;/div>
                &lt;div class="col-md-4 order-md-1 small">
                    &lt;span class="d-block my-2 lh-sm">&copy; Copyright
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
