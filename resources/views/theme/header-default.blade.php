<x-assan-layout layout-type="{{$layoutType}}">
            <section class="position-relative bg-primary-subtle">
                <div class="container position-relative py-9 py-lg-15">
                    <div class="row">
                        <div class="col-xl-9">
                            <h1 class="display-4 mb-3">Header Default</h1>
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
                                    data-clipboard-target="#copyHTML1" data-clipboard-action="copy" id="copyHTML1-1">Copy code</button>
<pre id="copyHTML1" class="language-markup bg-secondary text-white-50 mt-0" data-lang="html">
<code>
&lt;!--Header Start-->
&lt;header class="z-fixed">
 &lt;nav class="navbar navbar-expand-lg navbar-light shadow-lg">
   &lt;div class="container position-relative">
     &lt;a class="navbar-brand" href="{{ URL::asset('/') }}">
      &lt;img src="{{ URL::asset('assets/img/logo/logo.svg') }}" alt="" class="img-fluid navbar-brand-light">
      &lt;img src="{{ URL::asset('assets/img/logo/logo-white.svg') }}" alt="" class="img-fluid navbar-brand-dark">
   &lt;/a>
 &lt;div class="d-flex align-items-center navbar-no-collapse-items order-lg-last">
    &lt;button class="navbar-toggler order-last" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbarTheme"
     aria-controls="mainNavbarTheme" aria-expanded="false" aria-label="Toggle navigation">
     &lt;span class="navbar-toggler-icon">
      &lt;i>&lt;/i>
    &lt;/span>
    &lt;/button>
      &lt;div class="nav-item me-3 me-lg-0">
      &lt;a href="{{ URL::asset('#') }}" class="btn btn-sm btn-primary rounded-pill">Get Started&lt;/a>
     &lt;/div>
    &lt;/div>
    &lt;div class="collapse navbar-collapse" id="mainNavbarTheme">
     &lt;!--Navbar items-->
      &lt;ul class="navbar-nav ms-auto">
       &lt;li class="nav-item">
        &lt;a class="nav-link" href="{{ URL::asset('#') }}">Home&lt;/a>
       &lt;/li>
       &lt;li class="nav-item">
        &lt;a class="nav-link" href="{{ URL::asset('#') }}">About&lt;/a>
       &lt;/li>
       &lt;li class="nav-item dropdown">
        &lt;a class="nav-link dropdown-toggle" href="{{ URL::asset('#') }}" data-bs-toggle="dropdown">Dropdown Nav&lt;/a>
         &lt;div class="dropdown-menu dropdown-menu-end">
            &lt;a href="{{ URL::asset('#') }}" class="dropdown-item">Dropdown item&lt;/a>
            &lt;a href="{{ URL::asset('#') }}" class="dropdown-item">Dropdown item&lt;/a>
            &lt;a href="{{ URL::asset('#') }}" class="dropdown-item">Dropdown item&lt;/a>
            &lt;a href="{{ URL::asset('#') }}" class="dropdown-item">Dropdown item&lt;/a>
         &lt;/div>
       &lt;/li>
       &lt;li class="nav-item">
        &lt;a class="nav-link" href="{{ URL::asset('#') }}">Projects&lt;/a>
       &lt;/li>
       &lt;li class="nav-item">
        &lt;a class="nav-link" href="{{ URL::asset('#') }}">Contact&lt;/a>
       &lt;/li>
     &lt;/ul>
    &lt;/div>
  &lt;/div>
 &lt;/nav>
&lt;/header>
</code>
</pre>
                            </div>
                        </div>
                        <!--Element Css-->
                        <div class="tab-pane fade" id="tabCss">
                            <div class="position-relative">
                                <button
                                    class="btn btn-sm position-absolute end-0 top-0 me-3 mt-3 z-1 btn-primary copy-link"
                                    data-clipboard-target="#copyCss1" data-clipboard-action="copy" id="copyCss1-2">Copy code</button>
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
                                    data-clipboard-target="#copyJs1" data-clipboard-action="copy" id="copyJs1-3">Copy code</button>
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
