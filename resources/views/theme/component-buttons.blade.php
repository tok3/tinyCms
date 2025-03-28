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
                                                <li class="breadcrumb-item active" aria-current="page">Buttons</li>
                                            </ol>
                                        </div>
                                    </nav>
                                    <h1 class="mb-0 display-4">
                                        Buttons
                                    </h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>


            <section class="position-relative" id="next">
                <div class="container py-9 py-lg-11 position-relative z-1">
                    <div class="row">
                        <div class="col-md-8 mx-auto">
                            <div class="d-flex align-items-center justify-content-center mb-4">
                                <h4 class="mb-0 me-2 me-lg-4">Default</h4>
                                <span class="border-top d-block flex-grow-1"></span>
                            </div>
                            <div class="mb-5">
                                <button type="button" class="btn btn-primary mb-2 me-1">Primary</button>
                                <button type="button" class="btn btn-success mb-2 me-1">Success</button>
                                <button type="button" class="btn btn-danger mb-2 me-1">Danger</button>
                                <button type="button" class="btn btn-warning mb-2 me-1">Warning</button>
                                <button type="button" class="btn btn-info mb-2 me-1">Info</button>
                                <button type="button" class="btn btn-light mb-2 me-1">Light</button>
                                <button type="button" class="btn btn-gray-200 mb-2 me-1">gray-200</button>
                                <button type="button" class="btn btn-dark mb-2 me-1">Dark</button>
                                <button type="button" class="btn btn-secondary mb-2 me-1">Secondary</button>
                                <button type="button" class="btn btn-link mb-2 me-1">Link</button>
                            </div>
                            <span class="d-inline-block rounded-2 bg-secondary p-3"><button type="button"
                                    class="btn btn-white">White</button></span>


                            <hr class="my-7">

                            <div class="d-flex align-items-center justify-content-center mb-4">
                                <h4 class="mb-0 me-2 me-lg-4">Outline</h4>
                                <span class="border-top d-block flex-grow-1"></span>
                            </div>
                            <div class="mb-2 d-flex flex-wrap align-items-start gap-2">
                                <button type="button" class="btn btn-outline-primary">Primary</button>
                                <button type="button" class="btn btn-outline-success">Success</button>
                                <button type="button" class="btn btn-outline-danger">Danger</button>
                                <button type="button" class="btn btn-outline-warning">Warning</button>
                                <button type="button" class="btn btn-outline-info">Info</button>
                            </div>
                            
                            <div class="d-flex align-items-center bg-white p-1 gap-2 mb-5">
                                <button type="button" class="btn btn-outline-dark">Dark</button>
                            <button type="button" class="btn btn-outline-secondary">Secondary</button>
                            </div>
                            <span class="d-table mb-5 rounded-2 bg-dark p-3">
                                <button type="button" class="btn btn-outline-light me-1">Light</button>
                                <button type="button" class="btn btn-outline-gray-200 me-1">Gray-200</button>
                                <button
                                    type="button" class="btn btn-outline-white">White</button></span>


                            <h6 class="mb-4">Custom outline size</h6>
                            <button type="button" class="btn btn-outline-primary border-2 mb-2 me-1">I'm 2x
                                Outline</button>
                            <button type="button" class="btn btn-outline-primary border-3 mb-2 me-1">I'm 3x
                                Outline</button>


                            <hr class="my-7">

                            <div class="d-flex align-items-center justify-content-center mb-4">
                                <h4 class="mb-0 me-2 me-lg-4">Sizing</h4>
                                <span class="border-top d-block flex-grow-1"></span>
                            </div>
                            <button type="button" class="btn btn-secondary btn-sm mb-2 me-1">I am Small</button>
                            <button type="button" class="btn btn-secondary mb-2 me-1">I am normal</button>
                            <button type="button" class="btn btn-secondary btn-lg mb-2 me-1">I am large</button>
                            <div class="py-7 d-grid">
                                <button type="button" class="btn btn-secondary btn-sm mb-2 me-1">I am block</button>
                                <button type="button" class="btn btn-secondary btn mb-2 me-1">I am block</button>
                                <button type="button" class="btn btn-secondary btn-lg mb-2 me-1">I am block</button>
                            </div>
                            <h6 class="mb-4">Custom buttons - With the help of utility classes, Create any type of button, Checkout a few examples below</h6>
                            <button type="button"
                                class="btn btn-secondary rounded-3 rounded-top-start-0 rounded-bottom-end-0 mb-2 me-2">Custom
                                radius</button>
                            <button type="button"
                                class="btn btn-outline-primary btn-rise pt-4 px-3 rounded-0 py-1 mb-2 me-2">
                                <span class="btn-rise-bg bg-primary"></span>
                                <span class="btn-rise-text">Custom padding</span>
                            </button>
                            <a href="{{ URL::asset('#!') }}" class="btn btn-primary rounded-pill hover-lift text-start ps-4 pe-5 pb-3 pt-3 mb-2">
                                <div class="d-flex align-items-center">
                                    <span class="me-3  fs-2 lh-1 flex-shrink-0 align-items-center h-100">
                                        <i class="icon-Download-fromCloud"></i>
                                    </span>
                                    <span class="flex-grow-1">
                                        <span class="text-reset h5 mb-2">Purchase Now</span>
                                        <small class="lh-1 d-block fw-light opacity-75">Only for <strong>$32</strong></small>
                                    </span>
                                </div>
                            </a>
                            <br>
                            <a href="{{ URL::asset('#!') }}" class="btn btn-primary rounded-pill position-relative overflow-hidden hover-lift text-start ps-11 pb-3 pt-3 mb-2">
                                <div class="d-flex align-items-center">
                                    <!--Icon-->
                                    <span class="position-absolute start-0 top-0 h-100 width-7x fs-3 d-flex align-items-center bg-dark bg-opacity-25 justify-content-center">
                                        <i class="icon-Download-fromCloud"></i>
                                    </span>
                                   <span>Purchase Now</span>
                                </div>
                                
                            </a>


                            <hr class="my-7">

                            <div class="d-flex align-items-center justify-content-center mb-4">
                                <h4 class="mb-0 me-2 me-lg-4">Hover Rise buttons</h4>
                                <span class="border-top d-block flex-grow-1"></span>
                            </div>
                            <small class="d-block text-body-secondary">This will work only with <code>.btn-outline-[color]</code>
                                component</small>
                            <br><br>
                            <a href="{{ URL::asset('#') }}" class="rounded-pill btn btn-rise btn-outline-primary m-2">
                                <span class="btn-rise-bg bg-primary"></span>
                                <span class="btn-rise-text">Rise button</span>
                            </a>
                            <a href="{{ URL::asset('#') }}" class="rounded-pill btn btn-rise btn-outline-success m-2">
                                <span class="btn-rise-bg bg-success"></span>
                                <span class="btn-rise-text">Rise button</span>
                            </a>
                            <a href="{{ URL::asset('#') }}" class="rounded-pill btn btn-rise btn-outline-info m-2">
                                <span class="btn-rise-bg bg-info"></span>
                                <span class="btn-rise-text">Rise button</span>
                            </a>
                            <a href="{{ URL::asset('#') }}" class="rounded-pill btn btn-rise btn-outline-danger m-2">
                                <span class="btn-rise-bg bg-danger"></span>
                                <span class="btn-rise-text">Rise button</span>
                            </a>
                            <a href="{{ URL::asset('#') }}" class="rounded-pill btn btn-rise btn-outline-secondary m-2">
                                <span class="btn-rise-bg bg-secondary"></span>
                                <span class="btn-rise-text">Rise button</span>
                            </a>
                            <a href="{{ URL::asset('#') }}" class="rounded-pill btn btn-rise btn-outline-dark m-2">
                                <span class="btn-rise-bg bg-dark"></span>
                                <span class="btn-rise-text">Rise button</span>
                            </a>
                            <a href="{{ URL::asset('#') }}" class="rounded-pill btn btn-rise btn-outline-primary m-2">
                                <span class="btn-rise-bg bg-primary"></span>
                                <span class="btn-rise-text">
                                    <i class="bx bx-bootstrap fs-5 align-middle lh-1 me-1"></i>
                                    Rise icon button
                                </span>
                            </a>
                            <span class="d-table my-5 px-3 py-4 bg-secondary">
                                <a href="{{ URL::asset('#') }}" class="rounded-pill btn btn-rise btn-outline-white m-2">
                                    <span class="btn-rise-bg bg-white"></span>
                                    <span class="btn-rise-text">Rise button</span>
                                </a>
                                <a href="{{ URL::asset('#') }}" class="rounded-pill btn btn-rise btn-outline-light m-2">
                                    <span class="btn-rise-bg bg-light"></span>
                                    <span class="btn-rise-text text-reset">Rise button</span>
                                </a>
                            </span>

                            <a href="{{ URL::asset('#') }}" class="btn btn-rise btn-outline-dark m-2 p-0 width-6x height-6x d-flex rounded-circle">
                                <span class="btn-rise-bg bg-dark"></span>
                                <span class="btn-rise-text"><i class="bx bx-paperclip fs-5"></i></span>
                            </a>
                            
                            <br><br>
                            <!--///////////CODE SNIPPET-->
                            <div class="position-relative mb-5">
                                <!--Copy clipboard button-->
                                <button
                                    class="btn btn-sm position-absolute rounded-0 end-0 top-0 z-1 mt-2 me-2 btn-primary copy-link"
                                    data-clipboard-target="#copyButtonHoverRise" data-clipboard-action="copy"
                                    id="copyButtonHoverRise-1">Copy code</button>
                                <pre id="copyButtonHoverRise" class="language-markup bg-secondary text-white-50 mt-0" data-lang="html">
<code> 
  &lt;a href="{{ URL::asset('#') }}" class="btn btn-rise btn-outline-primary">
    &lt;span class="btn-rise-bg bg-primary">&lt;/span>
    &lt;span class="btn-rise-text">
    &lt;i class="bx bx-paperclip fs-5">&lt;/i>
     Upload Resume
    &lt;/span>
  &lt;/a>
</code>
</pre>
                            </div>
                            <!--///////////CODE SNIPPET END-->
                            <hr class="my-7">
                            <!--Buttons hover arrow-->
                            <div class="d-flex align-items-center justify-content-center mb-4">
                                <h4 class="mb-0 me-2 me-lg-4">Button - Hover Arrow</h4>
                                <span class="border-top d-block flex-grow-1"></span>
                            </div>
                            <button class="btn btn-secondary btn-hover-arrow btn-sm mb-1">
                                <span>Hover Me</span>
                            </button>
                            <button class="btn btn-primary btn-hover-arrow mb-1">
                                <span>Hover Me</span>
                            </button>
                            <button class="btn btn-danger btn-hover-arrow btn-lg mb-1">
                                <span>Hover Me</span>
                            </button>
                            <br><br>
                            <!--///////////CODE SNIPPET-->
                            <div class="position-relative mb-5">
                                <!--Copy clipboard button-->
                                <button
                                    class="btn btn-sm position-absolute rounded-0 end-0 top-0 z-1 mt-2 me-2 btn-primary copy-link"
                                    data-clipboard-target="#copyButtonHoverArrow" data-clipboard-action="copy"
                                    id="copyButtonHoverArrow-1">Copy code</button>
                                <pre id="copyButtonHoverArrow" class="language-markup bg-secondary text-white-50 mt-0" data-lang="html">
<code> 
&lt;button class="btn btn-danger btn-hover-arrow btn-lg">
 &lt;span>Hover Me&lt;/span>
&lt;/button>
</code>
</pre>
                            </div>
                            <!--///////////CODE SNIPPET END-->
                            <hr class="my-7">
                            <div class="d-flex align-items-center justify-content-center mb-4">
                                <h4 class="mb-0 me-2 me-lg-4">Button - circle ripple</h4>
                                <span class="border-top d-block flex-grow-1"></span>
                            </div>
                            <div></div>
                            <a href="{{ URL::asset('#!') }}"
                                class="btn btn-outline-success btn-circle-ripple p-0 width-5x height-5x rounded-pill fs-3 lh-1 flex-center me-4 mb-3">
                                <i class="bx bx-play fs-5 lh-1 align-middle"></i>
                            </a>
                            <a href="{{ URL::asset('#!') }}"
                                class="btn btn-outline-primary btn-circle-ripple p-0 width-6x height-6x rounded-pill fs-3 lh-1 flex-center me-4 mb-3">
                                <i class="bx bx-play fs-4 lh-1 align-middle"></i>
                            </a>
                            <a href="{{ URL::asset('#!') }}"
                                class="btn btn-danger btn-circle-ripple p-0 width-7x height-7x rounded-pill fs-3 lh-1 flex-center me-4 mb-3">
                                <i class="bx bx-play fs-3 lh-1 align-middle"></i>
                            </a>
                            <a href="{{ URL::asset('#!') }}" class="btn btn-secondary btn-circle-ripple p-0 width-8x height-8x rounded-pill fs-3 lh-1 flex-center me-4 mb-3">
                                <i class="bx bx-play fs-3 lh-1 align-middle"></i>
                            </a>
                            <br><br>
                            <!--///////////CODE SNIPPET-->
                            <div class="position-relative mb-5">
                                <!--Copy clipboard button-->
                                <button
                                    class="btn btn-sm position-absolute rounded-0 end-0 top-0 z-1 mt-2 me-2 btn-primary copy-link"
                                    data-clipboard-target="#copyButtonRipple" data-clipboard-action="copy"
                                    id="copyButtonRipple-1">Copy code</button>
                                <pre id="copyButtonRipple" class="language-markup bg-secondary text-white-50 mt-0" data-lang="html">
<code>

&lt;a href="{{ URL::asset('#!') }}" class="btn btn-secondary btn-circle-ripple p-0 width-8x height-8x
 rounded-pill fs-3 lh-1 flex-center me-4 mb-3">
 &lt;i class="bx bx-play fs-3 lh-1 align-middle">&lt;/i>
&lt;/a>
</code>
</pre>
                            </div>
                            <!--///////////CODE SNIPPET END-->
                            <hr class="my-7">
                            <div class="d-flex align-items-center justify-content-center mb-5">
                                <h4 class="mb-0 me-2 me-lg-4">Button - Hover Text</h4>
                                <span class="border-top d-block flex-grow-1"></span>
                            </div>

                            <a href="{{ URL::asset('#!') }}"
                                class="btn btn-secondary btn-hover-text mb-2 me-2">
                                <span class="btn-hover-label label-default">Learn More</span>
                                <span class="btn-hover-label label-hover">Learn More</span>
                            </a>
                            <a href="{{ URL::asset('#!') }}"
                                class="btn btn-gray-200 btn-hover-text mb-2 me-2">
                                <span class="btn-hover-label label-default">Learn More</span>
                                <span class="btn-hover-label label-hover">
                                    <i class="bx bx-right-arrow-alt fs-5"></i>
                                </span>
                            </a>
                            <a href="{{ URL::asset('#!') }}" class="btn btn-outline-dark btn-hover-text mb-2 me-2">
                                <span class="btn-hover-label label-default">Learn More</span>
                                <span class="btn-hover-label label-hover">
                                    Learn More
                                </span>
                            </a>
                            <br><br>
                            <!--///////////CODE SNIPPET-->
                            <div class="position-relative mb-5">
                                <!--Copy clipboard button-->
                                <button
                                    class="btn btn-sm position-absolute rounded-0 end-0 top-0 z-1 mt-2 me-2 btn-primary copy-link"
                                    data-clipboard-target="#copyButtonHovertext" data-clipboard-action="copy"
                                    id="copyButtonHovertext-1">Copy code</button>
                                <pre id="copyButtonHovertext" class="language-markup bg-secondary text-white-50 mt-0" data-lang="html">
<code>

&lt;a href="{{ URL::asset('#!') }}" class="btn btn-outline-dark btn-hover-text">
 &lt;span class="btn-hover-label label-default">Learn More&lt;/span>
 &lt;span class="btn-hover-label label-hover">
   Learn More
 &lt;/span>
&lt;/a>
</code>
</pre>
                            </div>
                            <!--///////////CODE SNIPPET END-->

                            <hr class="my-7">
                            <div class="d-flex align-items-center justify-content-center mb-5">
                                <h4 class="mb-0 me-2 me-lg-4">Button - Gradient <span class="badge bg-success ms-2">New</span></h4>
                                <span class="border-top d-block flex-grow-1"></span>
                            </div>
                            <a href="{{ URL::asset('#!') }}" class="d-inline-block hover-lift me-2 mb-2 hover-shadow rounded-2">
                                <div class="p-1 bg-gradient-primary d-inline-block rounded-2">
                                    <div class="btn pe-auto btn-white border-0 btn-hover-arrow">
                                        <span>Explore demos</span>
                                    </div>
                                </div>
                            </a>
                            <a href="{{ URL::asset('#!') }}" class="d-inline-block hover-lift me-2 mb-2 hover-shadow rounded-2">
                                <div class="p-1 bg-gradient-primary d-inline-block rounded-2">
                                    <div class="btn pe-auto btn-outline-white border-0 btn-hover-arrow">
                                        <span>Explore demos</span>
                                    </div>
                                </div>
                            </a>
                            <br><br>
                            <!--///////////CODE SNIPPET-->
                            <div class="position-relative mb-5">
                                <!--Copy clipboard button-->
                                <button
                                    class="btn btn-sm position-absolute rounded-0 end-0 top-0 z-1 mt-2 me-2 btn-primary copy-link"
                                    data-clipboard-target="#copyButtonGradient" data-clipboard-action="copy"
                                    id="copyButtonGradient-1">Copy code</button>
                                <pre id="copyButtonGradient" class="language-markup bg-secondary text-white-50 mt-0" data-lang="html">
<code>
&lt;a href="{{ URL::asset('#!') }}" class="d-inline-block hover-lift hover-shadow rounded-2">
  &lt;div class="p-1 bg-gradient-primary d-inline-block rounded-2">
   &lt;div class="btn pe-auto btn-outline-white border-0 btn-hover-arrow">
      &lt;span>Explore demos</span>
   &lt;/div>
  &lt;/div>
&lt;/a>
</code>
</pre>
                            </div>
                            <!--///////////CODE SNIPPET END-->

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
