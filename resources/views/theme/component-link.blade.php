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
                                                <li class="breadcrumb-item active" aria-current="page">Link</li>
                                            </ol>
                                        </div>
                                    </nav>
                                    <h1 class="mb-0 display-4">
                                        Link styles
                                    </h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>


            <section class="position-relative">
                <div class="container py-9 py-lg-11">
                    <div class="row align-items-center justify-content-center">
                        <div class="col-md-8 mx-auto">

                            <h5 class="mb-4">Link styles</h5>

                            <!--Link style-->
                            <div class="p-4 rounded-3 border mb-4">
                               <div class="mb-4">
                                <a href="{{ URL::asset('#!') }}" class="link-underline fw-semibold fs-6">Underline</a>
                               </div>

                                <!--///////////CODE SNIPPET FOR LINK STYLES-->
                                <div class="position-relative">
                                    <!--Copy clipboard button-->
                                    <button
                                        class="btn btn-sm position-absolute rounded-3 end-0 top-0 z-1 mt-n2 me-n1 btn-primary copy-link"
                                        data-clipboard-target="#copyCodeLink1" data-clipboard-action="copy" id="copyCodeLink1-1">Copy code</button>
<pre id="copyCodeLink1" class="language-markup rounded-3 bg-secondary text-white-50" data-lang="html">
<code>
 &lt;a href="{{ URL::asset('#!') }}" class="link-underline fw-semibold fs-6">
 Underline
 &lt;/a>               </code></pre>
                                </div>
                                <!--///////////CODE SNIPPET END-->
                            </div>

                            <!--Link style-->
                            <div class="p-4 rounded-3 border mb-3">
                               <div class="mb-4">
                                <a href="{{ URL::asset('#!') }}" class="link-hover-underline fw-semibold fs-6">Hover Underline</a>
                               </div>
                               <!--///////////CODE SNIPPET FOR LINK STYLES-->
                               <div class="position-relative">
                                <!--Copy clipboard button-->
                                <button
                                    class="btn btn-sm position-absolute rounded-3 end-0 top-0 z-1 mt-n2 me-n1 btn-primary copy-link"
                                    data-clipboard-target="#copyCodeLink2" data-clipboard-action="copy" id="copyCodeLink2-2">Copy code</button>
<pre id="copyCodeLink2" class="language-markup rounded-3 bg-secondary text-white-50" data-lang="html">
<code>
&lt;a href="{{ URL::asset('#!') }}" class="link-hover-underline fw-semibold fs-6">
Hover Underline
&lt;/a>               </code></pre>
                            </div>
                            <!--///////////CODE SNIPPET END-->
                            </div>


                            <!--Link style-->
                            <div class="p-4 border rounded-3 mb-4">
                               <div class="mb-4">
                                <a href="{{ URL::asset('#!') }}" class="link-both-underline fw-semibold fs-6">Hover Both Underline</a>
                               </div>
                               <!--///////////CODE SNIPPET FOR LINK STYLES-->
                               <div class="position-relative">
                                <!--Copy clipboard button-->
                                <button
                                    class="btn btn-sm position-absolute rounded-3 end-0 top-0 z-1 mt-n2 me-n1 btn-primary copy-link"
                                    data-clipboard-target="#copyCodeLink3" data-clipboard-action="copy" id="copyCodeLink3-3">Copy code</button>
<pre id="copyCodeLink3" class="language-markup rounded-3 bg-secondary text-white-50" data-lang="html">
<code>
&lt;a href="{{ URL::asset('#!') }}" class="link-both-underline fw-semibold fs-6">
Hover Both Underline
&lt;/a>               </code></pre>
                            </div>
                            <!--///////////CODE SNIPPET END-->
                            </div>

                            <!--Link style-->
                            <div class="p-4 border rounded-3 mb-4">
                               <div class="mb-4">
                                <a href="{{ URL::asset('#!') }}" class="link-hover-no-underline fw-semibold fs-6">Hover No
                                    Underline</a>
                               </div>
                                      <!--///////////CODE SNIPPET FOR LINK STYLES-->
                               <div class="position-relative">
                                <!--Copy clipboard button-->
                                <button
                                    class="btn btn-sm position-absolute rounded-3 end-0 top-0 z-1 mt-n2 me-n1 btn-primary copy-link"
                                    data-clipboard-target="#copyCodeLink4" data-clipboard-action="copy" id="copyCodeLink4-4">Copy code</button>
<pre id="copyCodeLink4" class="language-markup rounded-3 bg-secondary text-white-50" data-lang="html">
<code>
&lt;a href="{{ URL::asset('#!') }}" class="link-hover-no-underline fw-semibold fs-6">
Hover No Underline
&lt;/a>               </code></pre>
                            </div>
                            <!--///////////CODE SNIPPET END-->
                            </div>

                            <!--Link style-->
                            <div class="p-4 border rounded-3 mb-4">
                                <div class="mb-4">
                                 <a href="{{ URL::asset('#!') }}" class="link-underline fw-semibold fs-6">
                                     With Arrow <i class="bx bx-right-arrow-alt ms-1 fs-4"></i>
                                </a>
                                </div>
                                       <!--///////////CODE SNIPPET FOR LINK STYLES-->
                                <div class="position-relative">
                                 <!--Copy clipboard button-->
                                 <button
                                     class="btn btn-sm position-absolute rounded-3 end-0 top-0 z-1 mt-n2 me-n1 btn-primary copy-link"
                                     data-clipboard-target="#copyCodeLink5" data-clipboard-action="copy" id="copyCodeLink5-5">Copy code</button>
 <pre id="copyCodeLink5" class="language-markup rounded-3 bg-secondary text-white-50" data-lang="html">
 <code>
 &lt;a href="{{ URL::asset('#!') }}" class="link-underline fw-semibold fs-6">
    With Arrow &lt;i class="bx bx-right-arrow-alt ms-1 fs-4">&lt;/i>
 &lt;/a>              </code></pre>
                             </div>
                             <!--///////////CODE SNIPPET END-->
                             </div>

                        </div>
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
