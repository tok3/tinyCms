<x-assan-layout layout-type="{{$layoutType}}">
            <section class="position-relative text-center bg-primary-subtle">
                <div class="container position-relative py-11">
                    <div class="row pt-lg-9 pb-lg-7">
                        <div class="col-xl-9 mx-auto">
                            <h1 class="display-4">Footer style - <a href="{{ URL::asset('#footer') }}">#2</a></h1>

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
    &lt;footer id="footer" class="bg-body footer position-relative">
        &lt;div class="container pt-9 pt-lg-11 pb-5 position-relative z-1">
            &lt;div class="row">
                &lt;!--Footer col-->
                &lt;div class="col-lg-5 col-md-7 col-xl-4 mb-7">
                    &lt;div class="d-flex flex-column h-100">
                        &lt;h6 class="mb-4">
                            Stay in the know
                        &lt;/h6>
                        &lt;p class="mb-4 text-body">Subscribe to our newsletter and updates direct to your inbox.&lt;/p>
                        &lt;form novalidate class="needs-validation">
                            &lt;div class="mb-3">
                                &lt;input type="email" required placeholder="Enter your email" class="form-control">
                                &lt;span class="invalid-feedback">Please enter your email address&lt;/span>
                            &lt;/div>
                            &lt;div class="d-grid">
                                &lt;button class="btn btn-secondary" type="submit">
                                    Subscribe
                                &lt;/button>
                            &lt;/div>
                        &lt;/form>
                    &lt;/div>
                &lt;/div>
                &lt;!--Footer col-->
                &lt;div class="col-md-3 ms-md-auto mb-7 col-sm-4">
                    &lt;h6 class="mb-4">Services&lt;/h6>
                    &lt;ul class="nav flex-column">
                        &lt;li class="nav-item">
                            &lt;a href="{{ URL::asset('#') }}" class="nav-link">
                                Design
                            &lt;/a>
                        &lt;/li>
                        &lt;li class="nav-item">
                            &lt;a href="{{ URL::asset('#') }}" class="nav-link">
                                Development
                            &lt;/a>
                        &lt;/li>
                        &lt;li class="nav-item">
                            &lt;a href="{{ URL::asset('#') }}" class="nav-link">
                                E-commerce
                            &lt;/a>
                        &lt;/li>
                        &lt;li class="nav-item">
                            &lt;a href="{{ URL::asset('#') }}" class="nav-link">
                                Android Apps
                            &lt;/a>
                        &lt;/li>
                        &lt;li class="nav-item">
                            &lt;a href="{{ URL::asset('#') }}" class="nav-link">
                                Ios Apps
                            &lt;/a>
                        &lt;/li>
                    &lt;/ul>
                &lt;/div>
                &lt;!--Footer col-->
                &lt;div class="col-lg-4 col-sm-8 mb-7">
                    &lt;h6 class="mb-4">Latest news&lt;/h6>
                    &lt;ul class="list-unstyled">
                        &lt;li class="d-flex card-hover mb-5 align-items-center">
                            &lt;div class="me-3">
                                &lt;a href="{{ URL::asset('#!') }}" class="d-block width-8x height-8x rounded-3 overflow-hidden">
                                    &lt;img src="{{ URL::asset('assets/img/960x1140/1.jpg') }}" alt="" class="img-fluid img-zoom">
                                &lt;/a>
                            &lt;/div>
                            &lt;div>
                                &lt;a href="{{ URL::asset('#!') }}" class="lh-sm d-block mb-1">
                                    &lt;h6>Tips for creating a long-lasting
                                        partnership with your startup&lt;/h6>
                                &lt;/a>
                                &lt;span class="d-block small text-body-secondary">02 Sep 2022&lt;/span>
                            &lt;/div>
                        &lt;/li>
                        &lt;li class="d-flex card-hover align-items-center">
                            &lt;div class="me-3">
                                &lt;a href="{{ URL::asset('#!') }}" class="d-block width-8x height-8x rounded-3 overflow-hidden">
                                    &lt;img src="{{ URL::asset('assets/img/960x1140/2.jpg') }}" alt="" class="img-fluid img-zoom">
                                &lt;/a>
                            &lt;/div>
                            &lt;div>
                                &lt;a href="{{ URL::asset('#!') }}" class="lh-sm d-block mb-1">
                                    &lt;h6>Functional programming in python for
                                        beginners&lt;/h6>
                                &lt;/a>
                                &lt;span class="d-block small text-body-secondary">24 Aug 2022&lt;/span>
                            &lt;/div>
                        &lt;/li>
                    &lt;/ul>
                &lt;/div>
            &lt;/div>
            &lt;hr class="mb-5 mt-0">
            &lt;div class="row">
                &lt;div class="col-sm-7 mb-3 mb-sm-0">
                    &lt;div class="dropup d-table">
                        &lt;a href="{{ URL::asset('#') }}" data-bs-toggle="dropdown" role="button" aria-expanded="false"
                            class="dropdown-toggle text-body">
                            United States (English)
                        &lt;/a>
    
                        &lt;!--Dropdown lang menu-->
                        &lt;div class="dropdown-menu mb-3 dropdown-menu-lg-start" style="margin: 0px;">
                            &lt;a href="{{ URL::asset('#!') }}" class="d-flex align-items-center dropdown-item active">
                                &lt;img src="{{ URL::asset('assets/img/country/us.svg') }}" class="width-2x me-2" alt="">
                                United States (English)
                            &lt;/a>
                            &lt;a href="{{ URL::asset('#!') }}" class="d-flex align-items-center dropdown-item">
                                &lt;img src="{{ URL::asset('assets/img/country/es.svg') }}" class="width-2x me-2" alt="">
                                América Latina (Español)
                            &lt;/a>
                            &lt;a href="{{ URL::asset('#!') }}" class="d-flex align-items-center dropdown-item">
                                &lt;img src="{{ URL::asset('assets/img/country/gb.svg') }}" class="width-2x me-2" alt="">
                                United Kingdom (English)
                            &lt;/a>
                            &lt;a href="{{ URL::asset('#!') }}" class="d-flex align-items-center dropdown-item">
                                &lt;img src="{{ URL::asset('assets/img/country/fr.svg') }}" class="width-2x me-2" alt="">
                                France (Français)
                            &lt;/a>
                            &lt;a href="{{ URL::asset('#!') }}" class="d-flex align-items-center dropdown-item">
                                &lt;img src="{{ URL::asset('assets/img/country/pt.svg') }}" class="width-2x me-2" alt="">
                                Portuguese
                            &lt;/a>
                        &lt;/div>
                    &lt;/div>
                &lt;/div>
                &lt;div class="col-sm-5 small text-md-end">
                    &lt;span class="d-block lh-sm text-body-secondary">&copy; Copyright
                        &lt;script>
                            document.write(new Date().getFullYear())
    
                        &lt;/script>. Assan
                    &lt;/span>
                &lt;/div>
            &lt;/div>
        &lt;/div>
        &lt;!--container-->
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
