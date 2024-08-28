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
                                                <li class="breadcrumb-item active" aria-current="page">Accordion</li>
                                            </ol>
                                        </div>
                                    </nav>
                                    <h1 class="mb-0 display-4">
                                        Accordion
                                    </h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>


            <section class="position-relative">
                <div class="container py-9 py-lg-11">
                    <div class="row">
                        <div class="col-md-8 mx-auto">
                            <div class="d-flex align-items-center justify-content-center mb-4">
                                <h4 class="mb-0 me-2 me-lg-4">Default</h4>
                                <span class="border-top d-block flex-grow-1"></span>
                            </div>
                            <div class="accordion" id="accordionFlushExample">
                                <div class="accordion-item">
                                  <h2 class="accordion-header" id="flush-headingOne">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                      Accordion Item #1
                                    </button>
                                  </h2>
                                  <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the first item's accordion body.</div>
                                  </div>
                                </div>
                                <div class="accordion-item">
                                  <h2 class="accordion-header" id="flush-headingTwo">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                                      Accordion Item #2
                                    </button>
                                  </h2>
                                  <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the second item's accordion body. Let's imagine this being filled with some actual content.</div>
                                  </div>
                                </div>
                                <div class="accordion-item">
                                  <h2 class="accordion-header" id="flush-headingThree">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                                      Accordion Item #3
                                    </button>
                                  </h2>
                                  <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the third item's accordion body. Nothing more exciting happening here in terms of content, but just filling up the space to make it look, at least at first glance, a bit more representative of how this would look in a real-world application.</div>
                                  </div>
                                </div>
                              </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="position-relative border-top">
                <div class="container py-9 py-lg-11">
                    <div class="row">
                        <div class="col-md-8 mx-auto">

                            <div class="d-flex align-items-center justify-content-center mb-4">
                                <h4 class="mb-0 me-2 me-lg-4">Custom Accordions</h4>
                                <span class="border-top d-block flex-grow-1"></span>
                            </div>
                             <!--Custom accordion-->
                            <div class="accordion accordion-custom" id="accordionCustomExample">
                                <!--accordion item-->
                                <div class="accordion-item mb-3">
                                     <!--accordion header-->
                                    <h2 class="accordion-header" id="headingCustomOne">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#collapseCustomOne" aria-expanded="true"
                                            aria-controls="collapseCustomOne">
                                            Custom Accordion Item #1
                                        </button>
                                    </h2>
                                     <!--accordion detail-->
                                    <div id="collapseCustomOne" class="accordion-collapse collapse show"
                                        aria-labelledby="headingCustomOne" data-bs-parent="#accordionCustomExample">
                                        <div class="accordion-body">
                                            <strong>This is the first item's accordion body.</strong> It is hidden by
                                            default, until the collapse plugin adds the appropriate classes that we use
                                            to style each element. These classes control the overall appearance, as well
                                            as the showing and hiding via CSS transitions. You can modify any of this
                                            with custom CSS or overriding our default variables. It's also worth noting
                                            that just about any HTML can go within the <code>.accordion-body</code>,
                                            though the transition does limit overflow.
                                        </div>
                                    </div>
                                </div>
                                <!--accordion item-->
                                <div class="accordion-item mb-3">
                                     <!--accordion header-->
                                    <h2 class="accordion-header" id="headingCustomTwo">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapseCustomTwo"
                                            aria-expanded="false" aria-controls="collapseCustomTwo">
                                            Custom Accordion Item #2
                                        </button>
                                    </h2>
                                     <!--accordion details-->
                                    <div id="collapseCustomTwo" class="accordion-collapse collapse"
                                        aria-labelledby="headingCustomTwo" data-bs-parent="#accordionCustomExample">
                                        <div class="accordion-body">
                                            <strong>This is the second item's accordion body.</strong> It is hidden by
                                            default, until the collapse plugin adds the appropriate classes that we use
                                            to style each element. These classes control the overall appearance, as well
                                            as the showing and hiding via CSS transitions. You can modify any of this
                                            with custom CSS or overriding our default variables. It's also worth noting
                                            that just about any HTML can go within the <code>.accordion-body</code>,
                                            though the transition does limit overflow.
                                        </div>
                                    </div>
                                </div>
                                <!--accordion item-->
                                <div class="accordion-item">
                                     <!--accordion header-->
                                    <h2 class="accordion-header" id="headingCustomThree">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapseCustomThree"
                                            aria-expanded="false" aria-controls="collapseCustomThree">
                                            Custom Accordion Item #3
                                        </button>
                                    </h2>
                                     <!--accordion details-->
                                    <div id="collapseCustomThree" class="accordion-collapse collapse"
                                        aria-labelledby="headingCustomThree" data-bs-parent="#accordionCustomExample">
                                        <div class="accordion-body">
                                            <strong>This is the third item's accordion body.</strong> It is hidden by
                                            default, until the collapse plugin adds the appropriate classes that we use
                                            to style each element. These classes control the overall appearance, as well
                                            as the showing and hiding via CSS transitions. You can modify any of this
                                            with custom CSS or overriding our default variables. It's also worth noting
                                            that just about any HTML can go within the <code>.accordion-body</code>,
                                            though the transition does limit overflow.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container pt-5 pb-9 pb-lg-11">
                    
                            <!--///////////CODE SNIPPET FOR CUSTOM ACCORIONS-->
                            <div class="position-relative" style="max-height: 75vh; overflow-y: auto;">
                                <!--Copy clipboard button-->
                                <button
                                    class="btn btn-sm position-absolute rounded-3 end-0 top-0 z-1 mt-2 me-2 btn-primary copy-link"
                                    data-clipboard-target="#copyCodeCustomAccordion1" data-clipboard-action="copy" id="copyCodeCustomAccordion1-1">Copy code</button>
<pre id="copyCodeCustomAccordion1" class="language-markup bg-secondary text-white-50 mt-0" data-lang="html">
<code>
    &lt;!--Custom accordion-->
    &lt;div class="accordion accordion-custom" id="accordionCustomExample">
      &lt;!--accordion item-->
      &lt;div class="accordion-item mb-3">
           &lt;!--accordion header-->
          &lt;h2 class="accordion-header" id="headingCustomOne">
              &lt;button class="accordion-button" type="button" data-bs-toggle="collapse"
                  data-bs-target="#collapseCustomOne" aria-expanded="true"
                  aria-controls="collapseCustomOne">
                  Custom Accordion Item #1
              &lt;/button>
          &lt;/h2>
           &lt;!--accordion detail-->
          &lt;div id="collapseCustomOne" class="accordion-collapse collapse show"
              aria-labelledby="headingCustomOne" data-bs-parent="#accordionCustomExample">
              &lt;div class="accordion-body">
                  &lt;strong>This is the first item's accordion body.&lt;/strong> It is hidden by
                  default, until the collapse plugin adds the appropriate classes that we use
                  to style each element. These classes control the overall appearance, as well
                  as the showing and hiding via CSS transitions. You can modify any of this
                  with custom CSS or overriding our default variables. It's also worth noting
                  that just about any HTML can go within the &lt;code>.accordion-body&lt;/code>,
                  though the transition does limit overflow.
              &lt;/div>
          &lt;/div>
      &lt;/div>
      &lt;!--accordion item-->
      &lt;div class="accordion-item mb-3">
           &lt;!--accordion header-->
          &lt;h2 class="accordion-header" id="headingCustomTwo">
              &lt;button class="accordion-button collapsed" type="button"
                  data-bs-toggle="collapse" data-bs-target="#collapseCustomTwo"
                  aria-expanded="false" aria-controls="collapseCustomTwo">
                  Custom Accordion Item #2
              &lt;/button>
          &lt;/h2>
           &lt;!--accordion details-->
          &lt;div id="collapseCustomTwo" class="accordion-collapse collapse"
              aria-labelledby="headingCustomTwo" data-bs-parent="#accordionCustomExample">
              &lt;div class="accordion-body">
                  &lt;strong>This is the second item's accordion body.&lt;/strong> It is hidden by
                  default, until the collapse plugin adds the appropriate classes that we use
                  to style each element. These classes control the overall appearance, as well
                  as the showing and hiding via CSS transitions. You can modify any of this
                  with custom CSS or overriding our default variables. It's also worth noting
                  that just about any HTML can go within the &lt;code>.accordion-body&lt;/code>,
                  though the transition does limit overflow.
              &lt;/div>
          &lt;/div>
      &lt;/div>
      &lt;!--accordion item-->
      &lt;div class="accordion-item">
           &lt;!--accordion header-->
          &lt;h2 class="accordion-header" id="headingCustomThree">
              &lt;button class="accordion-button collapsed" type="button"
                  data-bs-toggle="collapse" data-bs-target="#collapseCustomThree"
                  aria-expanded="false" aria-controls="collapseCustomThree">
                  Custom Accordion Item #3
              &lt;/button>
          &lt;/h2>
           &lt;!--accordion details-->
          &lt;div id="collapseCustomThree" class="accordion-collapse collapse"
              aria-labelledby="headingCustomThree" data-bs-parent="#accordionCustomExample">
              &lt;div class="accordion-body">
                  &lt;strong>This is the third item's accordion body.&lt;/strong> It is hidden by
                  default, until the collapse plugin adds the appropriate classes that we use
                  to style each element. These classes control the overall appearance, as well
                  as the showing and hiding via CSS transitions. You can modify any of this
                  with custom CSS or overriding our default variables. It's also worth noting
                  that just about any HTML can go within the &lt;code>.accordion-body&lt;/code>,
                  though the transition does limit overflow.
              &lt;/div>
          &lt;/div>
      &lt;/div>
  &lt;/div>
</code></pre>
                            </div>
                            <!--///////////CODE SNIPPET END-->
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
