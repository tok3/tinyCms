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
                                                <li class="breadcrumb-item active">Forms</li>
                                                <li class="breadcrumb-item active" aria-current="page">Autosize</li>
                                            </ol>
                                        </div>
                                    </nav>
                                    <h1 class="mb-0 display-4">
                                        AutoSize Input
                                    </h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="border-bottom">
                <div class="container py-9 py-lg-11">
                    <div class="d-flex align-items-center mb-5">
                        <h6 class="mb-0 flex-grow-0 pe-3">Example</h6>
                        <div class="flex-grow-1 pb-1 border-bottom"></div>
                    </div>
                    <!--Auto Size input textarea-->
                    <textarea class="form-control mb-9" rows="1"
                        placeholder="Enter big paragraph here to check this out"></textarea>

                    <!--//////////Code Snippets start///////////////-->
                    <h6 class="mt-5">HTML</h6>
                    <small class="text-body-secondary d-block mb-3">Copy and paste into HTML</small>
                    <div class="position-relative mb-3">
                        <!--Copy clipboard button-->
                        <button
                            class="btn btn-sm position-absolute rounded-0 end-0 top-0 z-1 mt-2 me-2 btn-primary copy-link"
                            data-clipboard-target="#copyAutoSize" data-clipboard-action="copy" id="copyAutoSize1">Copy
                            Code</button>
                        <pre id="copyAutoSize" class="language-markup bg-secondary text-white-50 mt-0" data-lang="html">
<code>
&lt;!--Auto Size input textarea-->
&lt;textarea class="form-control" rows="1" placeholder="Enter big paragraph here to check this out">&lt;/textarea>
</code>
</pre>
                    </div>
                    <!--//////////Code Snippets end///////////////-->


                    <!--//////////Code Snippets start///////////////-->
                    <h6 class="mt-7">Javascript</h6>
                    <small class="text-body-secondary d-block mb-3">Copy and paste just before end of body tag</small>
                    <div class="position-relative mb-3">
                        <!--Copy clipboard button-->
                        <button
                            class="btn btn-sm position-absolute rounded-0 end-0 top-0 z-1 mt-2 me-2 btn-primary copy-link"
                            data-clipboard-target="#copyAutoSizeJS" data-clipboard-action="copy" id="copyAutoSize2">Copy
                            Code</button>
                        <pre id="copyAutoSizeJS" class="language-markup bg-secondary text-white-50 mt-0" data-lang="html">
                <code>
&lt;!--Autosize textarea-->
&lt;script src="{{ URL::asset('assets/vendor/node_modules/js/autosize.min.js') }}">&lt;/script>
&lt;script>
 var ta = document.querySelector('textarea');
 ta.style.display = 'none';
   autosize(ta);
  // Change layout
  ta.style.display = 'block';
   autosize.update(ta);
&lt;/script>
</code>
</pre>
                    </div>
                    <!--//////////Code Snippets end///////////////-->
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
                        <div class="col-lg-10 col-xl-9 text-center mx-auto">
                            <h2 class="mb-4 display-4" data-aos="fade-up">
                                Accelerate your business online
                            </h2>
                            <p class="lead mb-5 opacity-75" data-aos="fade-up">Build any type of landing page ease.</p>
                             <div data-aos="fade-up">
                                <a href="{{ URL::asset('#!') }}" class="btn btn-primary btn-lg">Purchase a license</a>
                            </div>
                        </div>
                        <!--End Col-->
                    </div> <!-- / .row -->
                </div> <!-- / .container -->
            </section>
</x-assan-layout>
