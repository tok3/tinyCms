<x-assan-layout layout-type="{{$layoutType}}">
            <section class="position-relative bg-secondary-subtle">
                <div class="container position-relative py-9 py-lg-15">
                    <div class="row pt-9">
                        <div class="col-xl-9">
                            <h1 class="display-4 mb-3">Header Search with icons</h1>
                            <p class="lead mb-0">Build stunning website faster than ever</p>
                        </div>
                    </div>
                    <!--/.row-->
                </div>
                <!--/.content-->
            </section>
            <!--/section-->
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
                                <pre id="copyHTML1" class="language-markup bg-secondary text-white-50 mt-0"
                                    data-lang="html">
<code>
    &lt;!--::Begin Header-->
    &lt;header class="z-fixed header-transparent header-absolute-top header-sticky pt-lg-3">
        &lt;nav class="navbar navbar-expand-lg navbar-light navbar-search-w-icons">
            &lt;div class="container position-relative">
                &lt;!--begin:logo-->
                &lt;a class="navbar-brand" href="{{ URL::asset('index.html') }}">
                    &lt;img src="{{ URL::asset('assets/img/logo/logo.svg') }}" alt="" class="img-fluid navbar-brand-light">
                    &lt;img src="{{ URL::asset('assets/img/logo/logo-white.svg') }}" alt="" class="img-fluid navbar-brand-dark">
                &lt;/a>
                &lt;!--end:logo-->

                &lt;div class="d-flex align-items-center navbar-no-collapse-items order-lg-last">
                    &lt;button class="navbar-toggler order-last" type="button" data-bs-toggle="collapse"
                        data-bs-target="#mainNavbarTheme" aria-controls="mainNavbarTheme" aria-expanded="false"
                        aria-label="Toggle navigation">
                        &lt;span class="navbar-toggler-icon">
                            &lt;i>&lt;/i>
                        &lt;/span>
                    &lt;/button>
                    &lt;div class="nav-item d-lg-none me-3 me-lg-0">
                        &lt;a href="{{ URL::asset('#searchCollapse') }}" data-bs-target="#searchCollapse" data-bs-toggle="collapse"
                            class="nav-link search-link lh-1">
                            &lt;i class="bx bx-search-alt-2 fs-4 lh-1">&lt;/i>
                        &lt;/a>
                        &lt;!--Search-bar-2-collapse-->
                    &lt;/div>
                &lt;/div>
                &lt;!--Search collapse (visible on desktop laptop)-->
                &lt;div class="collapse collapse-search ms-lg-auto me-lg-5 d-lg-block" id="searchCollapse">
                    &lt;form>
                        &lt;div class="position-relative mt-3 mt-lg-0">
                            &lt;span
                                class="position-absolute start-0 top-50 translate-middle-y ms-3 opacity-50 pe-none">
                                &lt;i class="bx bx-search-alt-2">&lt;/i>
                            &lt;/span>
                            &lt;input type="text" placeholder="Type & hit enter..."
                                class="form-control bg-body-subtle border shadow-sm ps-6 rounded-4"
                                data-bs-display="static" data-bs-toggle="dropdown">
                            &lt;!--With Submit button-->
                            &lt;!-- &lt;button class="btn position-absolute end-0 top-0 flex-center p-0 width-4x h-100 rounded-pill btn-white">
                                &lt;i class="bx bx-search-alt-2">&lt;/i>
                            &lt;/button> 
                            &lt;input type="text" placeholder="Search here..." class="form-control border-0 shadow-none ps-4 pe-6 rounded-pill">
                       -->
                            &lt;!--:Search Dropdown:-->
                            &lt;div class="dropdown-menu dropdown-menu-input border-top-0 border rounded-top-0 p-3">
                                &lt;h6 class="dropdown-header ps-0 mb-2">Popular searches&lt;/h6>
                                &lt;div class="d-flex flex-wrap gap-2 pb-2 align-items-center">
                                    &lt;span>&lt;a href="{{ URL::asset('#!') }}"
                                            class="d-block bg-body-secondary px-3 py-1 rounded small">Jeans&lt;/a>&lt;/span>
                                    &lt;span>&lt;a href="{{ URL::asset('#!') }}"
                                            class="d-block bg-body-secondary px-3 py-1 rounded small">Shoes&lt;/a>&lt;/span>
                                    &lt;span>&lt;a href="{{ URL::asset('#!') }}"
                                            class="d-block bg-body-secondary px-3 py-1 rounded small">Watches&lt;/a>&lt;/span>
                                    &lt;span>&lt;a href="{{ URL::asset('#!') }}"
                                            class="d-block bg-body-secondary px-3 py-1 rounded small">Men's&lt;/a>&lt;/span>
                                    &lt;span>&lt;a href="{{ URL::asset('#!') }}"
                                            class="d-block bg-body-secondary px-3 py-1 rounded small">Sneakers&lt;/a>&lt;/span>
                                    &lt;span>&lt;a href="{{ URL::asset('#!') }}"
                                            class="d-block bg-body-secondary px-3 py-1 rounded small">Casual&lt;/a>&lt;/span>
                                    &lt;span>&lt;a href="{{ URL::asset('#!') }}"
                                            class="d-block bg-body-secondary px-3 py-1 rounded small">Shirts&lt;/a>&lt;/span>
                                    &lt;span>&lt;a href="{{ URL::asset('#!') }}"
                                            class="d-block bg-body-secondary px-3 py-1 rounded small">T-shirts&lt;/a>&lt;/span>
                                    &lt;span>&lt;a href="{{ URL::asset('#!') }}"
                                            class="d-block bg-body-secondary px-3 py-1 rounded small">Lowers&lt;/a>&lt;/span>
                                &lt;/div>
                            &lt;/div>
                        &lt;/div>
                    &lt;/form>
                &lt;/div>
                &lt;div class="collapse navbar-collapse" id="mainNavbarTheme">
                    &lt;ul class="navbar-nav ms-auto">
                        &lt;li class="nav-item">
                            &lt;a href="{{ URL::asset('#') }}" class="nav-link">
                                &lt;i class="bx bx-home fs-5">&lt;/i>
                            &lt;/a>
                        &lt;/li>
                        &lt;li class="nav-item dropdown">
                            &lt;a href="{{ URL::asset('#') }}" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                                &lt;i class="bx bx-globe fs-5">&lt;/i>
                            &lt;/a>
                            &lt;!--Lang dropdown-->
                            &lt;div class="dropdown-menu dropdown-menu-end">
                                &lt;a href="{{ URL::asset('#!') }}" class="active dropdown-item">
                                    &lt;img src="{{ URL::asset('assets/img/country/us.svg') }}" class="me-2" width="20" alt="">
                                    &lt;small>English&lt;/small>
                                &lt;/a>
                                &lt;a href="{{ URL::asset('#!') }}" class="dropdown-item">
                                    &lt;img src="{{ URL::asset('assets/img/country/pt.svg') }}" class="me-2" width="20" alt="">
                                    &lt;small>Portuguese&lt;/small>
                                &lt;/a>
                                &lt;a href="{{ URL::asset('#!') }}" class="dropdown-item">
                                    &lt;img src="{{ URL::asset('assets/img/country/de.svg') }}" class="me-2" width="20" alt="">
                                    &lt;small>German&lt;/small>
                                &lt;/a>
                                &lt;a href="{{ URL::asset('#!') }}" class="dropdown-item">
                                    &lt;img src="{{ URL::asset('assets/img/country/fr.svg') }}" class="me-2" width="20" alt="">
                                    &lt;small>French&lt;/small>
                                &lt;/a>
                                &lt;a href="{{ URL::asset('#!') }}" class="dropdown-item">
                                    &lt;img src="{{ URL::asset('assets/img/country/dk.svg') }}" class="me-2" width="20" alt="">
                                    &lt;small>Danish&lt;/small>
                                &lt;/a>
                                &lt;a href="{{ URL::asset('#!') }}" class="dropdown-item">
                                    &lt;img src="{{ URL::asset('assets/img/country/es.svg') }}" class="me-2" width="20" alt="">
                                    &lt;small>Española&lt;/small>
                                &lt;/a>
                                &lt;a href="{{ URL::asset('#!') }}" class="dropdown-item">
                                    &lt;img src="{{ URL::asset('assets/img/country/nl.svg') }}" class="me-2" width="20" alt="">
                                    &lt;small>Dutch&lt;/small>
                                &lt;/a>
                                &lt;a href="{{ URL::asset('#!') }}" class="dropdown-item">
                                    &lt;img src="{{ URL::asset('assets/img/country/jp.svg') }}" class="me-2" width="20" alt="">
                                    &lt;small>japanese&lt;/small>
                                &lt;/a>
                            &lt;/div>
                        &lt;/li>
                        &lt;li class="nav-item dropdown">
                            &lt;a href="{{ URL::asset('#') }}" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                                &lt;i class="bx bx-user fs-5">&lt;/i>
                            &lt;/a>
                            &lt;!--Account dropdown-->
                            &lt;div class="dropdown-menu dropdown-menu-end">
                                &lt;div class="dropdown-header">Account&lt;/div>
                                &lt;a href="{{ URL::asset('#!') }}" class="dropdown-item">Login&lt;/a>
                                &lt;a href="{{ URL::asset('#!') }}" class="dropdown-item">Create Account&lt;/a>
                            &lt;/div>
                        &lt;/li>
                    &lt;/ul>
                &lt;/div>
            &lt;/div>
        &lt;/nav>
    &lt;/header>
    &lt;!--::/end Header-->
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
                                <pre id="copyCss1" class="language-markup bg-secondary text-white-50 mt-0"
                                    data-lang="html">
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
                                <pre id="copyJs1" class="language-markup bg-secondary text-white-50 mt-0"
                                    data-lang="html">
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
