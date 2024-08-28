<x-assan-layout layout-type="{{$layoutType}}">
             <!--page-hero-->
  <section class="bg-gradient-primary text-white position-relative">
    <div class="container pt-14 pb-9 pb-lg-12 position-relative z-1">
        <div class="row pt-lg-5 align-items-center justify-content-center text-center">
                        <div class="col-lg-10 col-xl-7 z-2">
                            <div class="position-relative">
                                <div>
                                    <nav class="d-flex justify-content-center" aria-label="breadcrumb">
                                        <div class="mb-4">
                                            <ol class="breadcrumb mb-0">
                                                <li class="breadcrumb-item"><a href="{{ URL::asset('#') }}">Home</a></li>
                                                <li class="breadcrumb-item active">Components</li>
                                                <li class="breadcrumb-item active" aria-current="page">Cookies</li>
                                            </ol>
                                        </div>
                                    </nav>
                                    <h1 class="mb-0 display-4">
                                        Cookies cards
                                    </h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>


            <section class="position-relative" id="next">
                <div class="container py-9 py-lg-11">
                    <h5 class="mb-4">Component #1</h5>

                    <!--Cookies card-->
                    <div class="alert alert-primary py-5 px-4 px-lg-5 py-lg-7 shadow-lg">
                        <div class="d-flex align-items-lg-center flex-column flex-md flex-md-row">
                            <div class="flex-grow-1">
                                <h4 class="mb-4">Cookies</h4>
                                <p class="mb-lg-0 mb-5 w-lg-75">
                                    We use cookies to offer a better browsing experience. Cookies enhance site
                                    navigation, analyze site usage,
                                    and assist in our marketing efforts. By clicking <strong>Accept.</strong> you agree
                                    to the storing of
                                    cookies on your device. To refuse all non-required cookies, click on Decline.
                                </p>
                            </div>
                            <div class="flex-shrink-0 text-lg-center">
                                <button type="button" class="btn me-2 me-lg-0 mb-lg-3 btn-secondary rounded-pill" data-bs-dismiss="alert">Decline</button>
                                <br class="d-none d-lg-block">
                                <a href="{{ URL::asset('#!') }}" class="btn btn-primary rounded-pill">Accept</a>
                            </div>
                        </div>
                    </div>
                    <!--//////////////////SNIPPETS:BEGIN////////////////-->
                    <div class="position-relative">
                        <button
                            class="btn btn-sm position-absolute end-0 top-0 me-3 mt-3 z-1 btn-primary copy-link"
                            data-clipboard-target="#copyCookiesHtml1" data-clipboard-action="copy"
                            id="copyCookiesHtml1-1">Copy code</button>
                        <pre id="copyCookiesHtml1" class="language-markup bg-secondary text-white-50 mt-0" data-lang="html">
        <code>
&lt;!--Cookies card-->
&lt;div class="alert alert-primary py-5 px-4 px-lg-5 py-lg-7 shadow-lg">
   &lt;div class="d-flex align-items-lg-center flex-column flex-md flex-md-row">
     &lt;div class="flex-grow-1">
       &lt;h4 class="mb-4">Cookies&lt;/h4>
       &lt;p class="mb-5 mb-lg-0 w-lg-75">
         We use cookies to offer a better browsing experience. Cookies enhance site navigation, analyze site usage,
         and assist in our marketing efforts. By clicking &lt;strong>Accept.&lt;/strong> you agree to the storing of 
         cookies on your device. To refuse all non-required cookies, click on Decline.
        &lt;/p>
      &lt;/div>
      &lt;div class="flex-shrink-0 text-lg-center">
            &lt;button type="button" class="btn me-2 me-lg-0 mb-lg-3 btn-secondary rounded-pill" data-bs-dismiss="alert">Decline&lt;/button>
            &lt;br class="d-none d-lg-block">
            &lt;a href="{{ URL::asset('#!') }}" class="btn btn-primary rounded-pill">Accept&lt;/a>
      &lt;/div>
  &lt;/div>
&lt;/div>
</code>
</pre>
                    </div>
                    <!--//////////////////SNIPPETS:END////////////////-->
                </div>
                </div>
            </section>
            <section class="position-relative" id="next">
                <div class="container py-9 py-lg-11">
                    <h5 class="mb-4">Component #2</h5>

                    <!--Cookies card-->
                    <div class="alert bg-primary text-white border-0 rounded-0 shadow-lg px-lg-5 px-4 py-5">
                        <div class="d-flex flex-column">
                            <div class="flex-grow-1">
                                <h4 class="mb-3">Cookies</h4>
                                <p class="mb-5 w-lg-75">
                                    We use cookies to offer a better browsing experience. Cookies enhance site
                                    navigation, analyze site usage,
                                    and assist in our marketing efforts. By clicking <strong>Accept.</strong> you agree
                                    to the storing of
                                    cookies on your device. To refuse all non-required cookies, click on Decline.
                                </p>
                                <button type="button" class="btn me-2 btn-outline-gray-200 rounded-pill" data-bs-dismiss="alert">Decline</button>
                                <a href="{{ URL::asset('#!') }}" class="btn btn-outline-white rounded-pill">Accept</a>
                            </div>

                        </div>
                    </div>
                    <!--//////////////////SNIPPETS:BEGIN////////////////-->
                    <div class="position-relative">
                        <button
                            class="btn btn-sm position-absolute end-0 top-0 me-3 mt-3 z-1 btn-primary copy-link"
                            data-clipboard-target="#copyCookiesHtml2" data-clipboard-action="copy"
                            id="copyCookiesHtml2-2">Copy code</button>
                        <pre id="copyCookiesHtml2" class="language-markup bg-secondary text-white-50 mt-0" data-lang="html">
        <code>
&lt;!--Cookies card-->
&lt;div class="alert bg-primary text-white border-0 shadow-lg px-lg-5 px-4 py-5">
   &lt;div class="d-flex flex-column">
      &lt;div class="flex-grow-1">
       &lt;h4 class="mb-3">Cookies&lt;/h4>
        &lt;p class="mb-5 w-lg-75">
          We use cookies to offer a better browsing experience. Cookies enhance site navigation, analyze site usage,
          and assist in our marketing efforts. By clicking &lt;strong>Accept.&lt;/strong> you agree to the storing of 
          cookies on your device. To refuse all non-required cookies, click on Decline.
        &lt;/p>
        &lt;button type="button" class="btn me-2 btn-outline-gray-200 rounded-pill" data-bs-dismiss="alert">Decline&lt;/button>
        &lt;a href="{{ URL::asset('#!') }}" class="btn btn-outline-white rounded-pill">Accept&lt;/a>
      &lt;/div>
  &lt;/div>
&lt;/div>
</code>
</pre>
                    </div>
                    <!--//////////////////SNIPPETS:END////////////////-->
                </div>
                </div>
            </section>
            <section class="bg-gradient bg-secondary text-white position-relative">
                <svg class="position-absolute top-0 start-0 text-white w-50 h-auto w-lg-75" width="136" height="76"
                    viewBox="0 0 136 76" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-opacity=".1"
                        d="M136 -28C136 -14.3425 133.31 -0.818782 128.083 11.7991C122.857 24.4169 115.196 35.8818 105.539 45.5391C95.8818 55.1964 84.4169 62.857 71.7991 68.0835C59.1812 73.31 45.6575 76 32 76C18.3425 76 4.81878 73.31 -7.79908 68.0835C-20.4169 62.857 -31.8818 55.1964 -41.5391 45.5391C-51.1964 35.8818 -58.857 24.4169 -64.0835 11.7991C-69.31 -0.818789 -72 -14.3425 -72 -28L136 -28Z"
                        fill="currentColor" />
                </svg>
                <div class="container py-9 py-lg-11 position-relative z-1">
                    <div class="row align-items-center justify-content-center">
                        <div class="col-md-10 col-lg-8 col-xl-7 text-center mx-auto">
                            <h2 class="mb-4 display-4" data-aos="fade-up">
                                Let's start building stunning websites
                            </h2>
                            <p class="mb-5 px-lg-5" data-aos="fade-up" data-aos-delay="100">
                                Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing
                                industries for previewing layouts and visual mockups.
                            </p>
                            <div data-aos="fade-up">
                                <a href="{{ URL::asset('#!') }}" class="btn btn-primary btn-lg">Purchase a
                                    license</a>
                            </div>
                        </div>
                        <!--End Col-->
                    </div> <!-- / .row -->
                </div> <!-- / .container -->
            </section>
</x-assan-layout>
