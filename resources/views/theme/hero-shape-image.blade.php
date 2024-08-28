<x-assan-layout layout-type="{{$layoutType}}">
            <!--::Start Shape Image Hero::-->
            <section class="position-relative bg-gradient-primary">
                <div class="container z-1 pt-11 pb-9 pt-lg-14 position-relative">
                    <div class="row align-items-center justify-content-around">
                        <div class="col-md-5 text-white mb-7 mb-lg-0">
                            <!--:Heading:-->
                            <h1 class="display-2 me-md-n10 me-lg-n15 position-relative z-1 mb-4">Build stunning
                                website ease</h1>
                            <!--:Subheading:-->
                            <p class="mb-5">
                                Excepteur sint non proident, sunt in culpa qui officia deserunt
                                mollit anim id est laborum.
                            </p>
                            <!--:Button:-->
                            <a href="{{ URL::asset('#') }}" class="btn btn-hover-arrow btn-lg btn-white hover-lift px-4 px-lg-5"><span>Get
                                    started</span></a>
                        </div>
                        <div class="col-md-7 col-lg-6 ms-lg-auto">
                           <!--:Shape Image with mask:-->
                           <div class="bg-mask">
                            <img src="{{ URL::asset('assets/img/960x900/2.jpg') }}" class="mask-squircle mask-image" alt="">
                        </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--::/End Shape Image Hero::-->


            <section class="border-bottom">
                <div class="container pt-9 pt-lg-11">
                    <!--//////////////////SNIPPETS:BEGIN////////////////-->
                    <nav class="nav-tabs nav">
                        <a href="{{ URL::asset('#tabMain') }}" data-bs-toggle="tab" class="nav-link active">HTML</a>
                        <a href="{{ URL::asset('#tabCss') }}" data-bs-toggle="tab" class="nav-link">Css</a>
                        <a href="{{ URL::asset('#tabJs') }}" data-bs-toggle="tab" class="nav-link">Js</a>
                    </nav>
                    <div class="tab-content">
                        <!--Element Main code-->
                        <div class="tab-pane fade show active" id="tabMain">
                            <div class="position-relative" style="max-height:75vh; overflow-y:auto">
                                <button
                                    class="btn btn-sm position-absolute end-0 top-0 me-3 mt-3 z-1 btn-primary copy-link"
                                    data-clipboard-target="#copyHTML1" data-clipboard-action="copy"
                                    id="copyHTML1-1">Copy code</button>
                                <pre id="copyHTML1" class="language-markup bg-secondary text-white-50 mt-0" data-lang="html">
<code>
    &lt;!--::Start Shape Image Hero::-->
    &lt;section class="position-relative bg-gradient-primary">
        &lt;div class="container z-1 pt-11 pb-9 pt-lg-14 position-relative">
            &lt;div class="row align-items-center justify-content-around">
                &lt;div class="col-md-5 text-white mb-7 mb-lg-0">
                    &lt;!--:Heading:-->
                    &lt;h1 class="display-2 me-md-n10 me-lg-n15 position-relative z-1 mb-4">Build stunning
                        website ease&lt;/h1>
                    &lt;!--:Subheading:-->
                    &lt;p class="mb-5">
                        Excepteur sint non proident, sunt in culpa qui officia deserunt
                        mollit anim id est laborum.
                    &lt;/p>
                    &lt;!--:Button:-->
                    &lt;a href="{{ URL::asset('#') }}" class="btn btn-hover-arrow btn-lg btn-white hover-lift px-4 px-lg-5">&lt;span>Get
                            started&lt;/span>&lt;/a>
                &lt;/div>
                &lt;div class="col-md-7 col-lg-6 ms-lg-auto">
                   &lt;!--:Shape Image with mask:-->
                   &lt;div class="bg-mask">
                    &lt;img src="{{ URL::asset('assets/img/960x900/2.jpg') }}" class="mask-squircle mask-image" alt="">
                &lt;/div>
                &lt;/div>
            &lt;/div>
        &lt;/div>
    &lt;/section>
    &lt;!--::/End Shape Image Hero::-->
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

                        <!--Element JS-->
                        <div class="tab-pane fade" id="tabJs">
                            <div class="position-relative">
                                <button
                                    class="btn btn-sm position-absolute end-0 top-0 me-3 mt-3 z-1 btn-primary copy-link"
                                    data-clipboard-target="#copyJs1" data-clipboard-action="copy" id="copyJs1-3">Copy
                                    code</button>
                                <pre id="copyJs1" class="language-markup bg-secondary text-white-50 mt-0" data-lang="html">
                <code>
  &lt;!-- Bootstrap + Vendor + Theme -->
  &lt;script src="{{ URL::asset('assets/css/theme.bundle.js') }}">&lt;/script>
</code>
</pre>
                            </div>
                        </div>
                    </div>
                    <!--//////////////////SNIPPETS:END////////////////-->
                </div>
                <div class="container py-9 py-lg-11">
                    <div class="px-4 rounded-3 shadow-lg py-6 px-lg-5 py-lg-7 bg-gradient bg-secondary text-white position-relative overflow-hidden"
                        data-aos="fade-up" data-aos-duration="400">
                        <svg class="position-absolute end-0 bottom-0 mb-4 text-success" width="200" height="400"
                            preserveAspectRatio="none" viewBox="0 0 150 300" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M150 300C130.302 300 110.796 296.12 92.5975 288.582C74.3986 281.044 57.8628 269.995 43.934 256.066C30.0052 242.137 18.9563 225.601 11.4181 207.403C3.87986 189.204 -6.2614e-07 169.698 0 150C6.2614e-07 130.302 3.87987 110.796 11.4181 92.5975C18.9563 74.3987 30.0052 57.8628 43.934 43.934C57.8628 30.0052 74.3987 18.9563 92.5975 11.4181C110.796 3.87986 130.302 3.51961e-06 150 5.00679e-06L150 37.5C135.226 37.5 120.597 40.4099 106.948 46.0636C93.299 51.7172 80.8971 60.0039 70.4505 70.4505C60.0039 80.8971 51.7172 93.299 46.0636 106.948C40.4099 120.597 37.5 135.226 37.5 150C37.5 164.774 40.4099 179.403 46.0636 193.052C51.7172 206.701 60.0039 219.103 70.4505 229.55C80.8971 239.996 93.299 248.283 106.948 253.936C120.597 259.59 135.226 262.5 150 262.5V300Z"
                                fill="currentColor"></path>
                        </svg>

                        <div class="row align-items-end position-relative">
                            <div class="col-lg-6 col-xl-7">
                                <h5 class="text-white-50 mb-4">Let's start building</h5>
                                <h2 class="mb-5 mb-md-0 display-5">Stunning websites ease</h2>
                            </div>
                            <div class="col-lg-6 col-xl-5 text-lg-end">
                                <a href="{{ URL::asset('#!') }}" class="btn btn-primary btn-lg me-2 mb-2 mb-lg-0">Contact sales</a>
                                <a href="{{ URL::asset('#!') }}" class="btn btn-gray-200 btn-lg">Purchase Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
</x-assan-layout>
