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
                                                <li class="breadcrumb-item active" aria-current="page">Typography</li>
                                            </ol>
                                        </div>
                                    </nav>
                                    <h1 class="mb-0 display-4">
                                        Typography
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
                        <div class="col-md-10 col-lg-8 mx-auto">
                            <div class="d-flex align-items-center mb-4">
                                <h6 class="me-3 text-body-secondary mb-0">
                                    Headings
                                </h6>
                                <span class="border-top d-block flex-grow-1"></span>
                            </div>

                            <h1>h1. Bootstrap heading</h1>
                            <h2>h2. Bootstrap heading</h2>
                            <h3>h3. Bootstrap heading</h3>
                            <h4>h4. Bootstrap heading</h4>
                            <h5>h5. Bootstrap heading</h5>
                            <h6>h6. Bootstrap heading</h6>
                            <hr class="my-5">
                            <div class="d-flex align-items-center mb-4">
                                <h6 class="me-3 text-body-secondary mb-0">
                                    Display headings
                                </h6>
                                <span class="border-top d-block flex-grow-1"></span>
                            </div>
                            <h1 class="display-1">Display 1</h1>
                            <h1 class="display-2">Display 2</h1>
                            <h1 class="display-3">Display 3</h1>
                            <h1 class="display-4">Display 4</h1>
                            <h1 class="display-5">Display 5</h1>
                            <h1 class="display-6">Display 6</h1>

                            <hr class="my-5">
                            <div class="d-flex align-items-center mb-4">
                                <h6 class="me-3 text-body-secondary mb-0">
                                    Lead text
                                </h6>
                                <span class="border-top d-block flex-grow-1"></span>
                            </div>
                            <p class="lead">
                                Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Duis mollis, est
                                non commodo luctus.
                            </p>

                            <hr class="my-5">
                            <div class="d-flex align-items-center mb-4">
                                <h6 class="me-3 text-body-secondary mb-0">
                                    Text colors
                                </h6>
                                <span class="border-top d-block flex-grow-1"></span>
                            </div>
                            <p class="text-reset">
                                <strong>Default color paragraph</strong> Vivamus sagittis lacus vel augue laoreet rutrum
                                faucibus dolor auctor. Duis mollis, est
                                non commodo luctus.
                            </p>
                            <p class="text-body-secondary">
                                <strong>Muted color paragraph</strong> Vivamus sagittis lacus vel augue laoreet rutrum
                                faucibus dolor auctor. Duis mollis, est
                                non commodo luctus.
                            </p>
                            <p class="text-primary">
                                <strong>Primary color paragraph</strong> Vivamus sagittis lacus vel augue laoreet rutrum
                                faucibus dolor auctor. Duis mollis, est
                                non commodo luctus.
                            </p>
                            <p class="text-info">
                                <strong>Info color paragraph</strong> Vivamus sagittis lacus vel augue laoreet rutrum
                                faucibus dolor auctor. Duis mollis, est
                                non commodo luctus.
                            </p>
                            <p class="text-danger">
                                <strong>Danger color paragraph</strong> Vivamus sagittis lacus vel augue laoreet rutrum
                                faucibus dolor auctor. Duis mollis, est
                                non commodo luctus.
                            </p>
                            <p class="text-success">
                                <strong>Success color paragraph</strong> Vivamus sagittis lacus vel augue laoreet rutrum
                                faucibus dolor auctor. Duis mollis, est
                                non commodo luctus.
                            </p>
                            <p class="text-warning">
                                <strong>Warning color paragraph</strong> Vivamus sagittis lacus vel augue laoreet rutrum
                                faucibus dolor auctor. Duis mollis, est
                                non commodo luctus.
                            </p>
                            <p class="text-secondary">
                              <span class="rounded p-3 bg-white d-block">
                                <strong>Secondary color paragraph</strong> Vivamus sagittis lacus vel augue laoreet
                                rutrum faucibus dolor auctor. Duis mollis, est
                                non commodo luctus.
                              </span>
                            </p>
                            <p class="text-dark">
                               <span class="bg-white d-block p-3 rounded">
                                <strong>Dark color paragraph</strong> Vivamus sagittis lacus vel augue laoreet rutrum
                                faucibus dolor auctor. Duis mollis, est
                                non commodo luctus.
                               </span>
                            </p>
                            <p class="text-white bg-primary p-4">
                                <strong>White color paragraph</strong> Vivamus sagittis lacus vel augue laoreet rutrum
                                faucibus dolor auctor. Duis mollis, est
                                non commodo luctus.
                            </p>
                            <p class="text-light bg-dark p-4">
                                <strong>Light color paragraph</strong> Vivamus sagittis lacus vel augue laoreet rutrum
                                faucibus dolor auctor. Duis mollis, est
                                non commodo luctus.
                            </p>
                            <hr class="my-5">
                            <div class="d-flex align-items-center mb-4">
                                <h6 class="me-3 text-body-secondary mb-0">
                                    Paragraph text sizing
                                </h6>
                                <span class="border-top d-block flex-grow-1"></span>
                            </div>
                            <p class="small">
                                <strong>Small size paragraph</strong> Vivamus sagittis lacus vel augue laoreet rutrum
                                faucibus dolor auctor. Duis mollis, est
                                non commodo luctus.
                            </p>
                            <p>
                                <strong>Default size paragraph</strong> Vivamus sagittis lacus vel augue laoreet rutrum
                                faucibus dolor auctor. Duis mollis, est
                                non commodo luctus.
                            </p>
                            <p class="lead">
                                <strong>Lead size paragraph</strong> Vivamus sagittis lacus vel augue laoreet rutrum
                                faucibus dolor auctor. Duis mollis, est
                                non commodo luctus.
                            </p>
                            <hr class="my-5">
                            <div class="d-flex align-items-center mb-4">
                                <h6 class="me-3 text-body-secondary mb-0">
                                    Inline text elements
                                </h6>
                                <span class="border-top d-block flex-grow-1"></span>
                            </div>
                            <p>You can use the mark tag to <mark>highlight</mark> text.</p>
                            <p><del>This line of text is meant to be treated as deleted text.</del></p>
                            <p><s>This line of text is meant to be treated as no longer accurate.</s></p>
                            <p><ins>This line of text is meant to be treated as an addition to the document.</ins></p>
                            <p><u>This line of text will render as underlined.</u></p>
                            <p><small>This line of text is meant to be treated as fine print.</small></p>
                            <p><strong>This line rendered as bold text.</strong></p>
                            <p><em>This line rendered as italicized text.</em></p>


                            <hr class="my-5">
                            <div class="d-flex align-items-center mb-4">
                                <h6 class="me-3 text-body-secondary mb-0">
                                    List unstyled
                                </h6>
                                <span class="border-top d-block flex-grow-1"></span>
                            </div>
                            <ul class="list-unstyled">
                                <li>Lorem ipsum dolor sit amet</li>
                                <li>Consectetur adipiscing elit</li>
                                <li>Integer molestie lorem at massa</li>
                                <li>Facilisis in pretium nisl aliquet</li>
                                <li>Nulla volutpat aliquam velit
                                    <ul>
                                        <li>Phasellus iaculis neque</li>
                                        <li>Purus sodales ultricies</li>
                                        <li>Vestibulum laoreet porttitor sem</li>
                                        <li>Ac tristique libero volutpat at</li>
                                    </ul>
                                </li>
                                <li>Faucibus porta lacus fringilla vel</li>
                                <li>Aenean sit amet erat nunc</li>
                                <li>Eget porttitor lorem</li>
                            </ul>


                            <hr class="my-5">
                            <div class="d-flex align-items-center mb-4">
                                <h6 class="me-3 text-body-secondary mb-0">
                                    List Inline
                                </h6>
                                <span class="border-top d-block flex-grow-1"></span>
                            </div>
                            <ul class="list-inline">
                                <li class="list-inline-item">Lorem ipsum</li>
                                <li class="list-inline-item">Phasellus iaculis</li>
                                <li class="list-inline-item">Nulla volutpat</li>
                            </ul>

                            <hr class="my-5">
                            <div class="d-flex align-items-center mb-4">
                                <h6 class="me-3 text-body-secondary mb-0">
                                    Description list alignment
                                </h6>
                                <span class="border-top d-block flex-grow-1"></span>
                            </div>

                            <dl class="row">
                                <dt class="col-sm-3">Description lists</dt>
                                <dd class="col-sm-9">A description list is perfect for defining terms.</dd>

                                <dt class="col-sm-3">Euismod</dt>
                                <dd class="col-sm-9">
                                    <p>Vestibulum id ligula porta felis euismod semper eget lacinia odio sem nec elit.
                                    </p>
                                    <p>Donec id elit non mi porta gravida at eget metus.</p>
                                </dd>

                                <dt class="col-sm-3">Malesuada porta</dt>
                                <dd class="col-sm-9">Etiam porta sem malesuada magna mollis euismod.</dd>

                                <dt class="col-sm-3 text-truncate">Truncated term is truncated</dt>
                                <dd class="col-sm-9">Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum
                                    nibh, ut fermentum massa justo sit amet risus.</dd>

                                <dt class="col-sm-3">Nesting</dt>
                                <dd class="col-sm-9">
                                    <dl class="row">
                                        <dt class="col-sm-4">Nested definition list</dt>
                                        <dd class="col-sm-8">Aenean posuere, tortor sed cursus feugiat, nunc augue
                                            blandit nunc.</dd>
                                    </dl>
                                </dd>
                            </dl>

                            <hr class="my-5">
                            <div class="d-flex align-items-center mb-4">
                                <h6 class="me-3 text-body-secondary mb-0">
                                    Dropcap
                                </h6>
                                <span class="border-top d-block flex-grow-1"></span>
                            </div>
                            <code class="d-block mb-3">.dropcap</code>
                            <p class="dropcap"><span>Discover</span> are many variations of passages of Lorem Ipsum
                                available, but the majority have
                                suffered alteration in some form, by injected humour, or randomised words which don't
                                look even slightly believable.
                            </p>

                            <hr class="my-5">
                            <div class="d-flex align-items-center mb-4">
                                <h6 class="me-3 text-body-secondary mb-0">
                                    Text Gradient
                                </h6>
                                <span class="border-top d-block flex-grow-1"></span>
                            </div>
                            <code class="d-block mb-3">.text-gradient</code>
                            <h2 class="text-gradient display-4 lh-lg">This is a gradient heading</h2>
                            <hr class="my-5">
                            <div class="d-flex align-items-center mb-4">
                                <h6 class="me-3 text-body-secondary mb-0">
                                    Text Outline
                                </h6>
                                <span class="border-top d-block flex-grow-1"></span>
                            </div>
                            <code class="d-block mb-3">.text-outline-[text color name]</code>
                            <h2 class="text-outline-warning display-4">Outline text heading</h2>
                            <h2 class="text-outline-primary display-4">Outline text heading</h2>
                            <hr class="my-5">
                            <div class="d-flex align-items-center mb-4">
                                <h6 class="me-3 text-body-secondary mb-0">
                                    Letter Spacing
                                </h6>
                                <span class="border-top d-block flex-grow-1"></span>
                            </div>
                            <code class="d-block mb-3">.letter-spacing-5[1-5]</code>
                            <h2 class="ls-5">Heading with spacing 5</h2>
                            <hr class="my-5">
                            <div class="d-flex align-items-center mb-2">
                                <h6 class="me-3 text-body-secondary mb-0">
                                    Text on Dark Background
                                </h6>
                                <span class="border-top d-block flex-grow-1"></span>
                            </div>
                            <span class="d-block mb-4">Just add<code class="">.text-white</code> to next of background
                                color class like -&gt; <code>bg-dark text-white</code></span>
                            <div class="px-4 py-5 bg-dark text-white rounded-3">
                                <h3 class="mb-4 display-6">Disaplay Headings</h3>
                                <h3 class="mb-4">Headings</h3>
                                <p>Paragraph text - <small>default</small></p>
                                <p class="text-body-secondary">Paragraph text - <small>with <code>.text-body-secondary</code>
                                        class</small></p>
                                <h3 class="mb-3 display-5 text-outline text-white">Outline Heading</h3>
                                <h3 class="mb-3 display-5 text-gradient">Gradient Heading</h3>
                                <h3 class="mb-3 display-5 text-gradient-light">Gradient Light Heading</h3>
                                <a href="{{ URL::asset('#!') }}" class="link-underline">Link underline</a>
                                <br><br>
                                <nav class="nav"><a href="{{ URL::asset('#!') }}" class="nav-link p-0">Nav link</a></nav>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="bg-success-subtle position-relative">
                <svg class="position-absolute top-0 start-0 text-success w-50 h-auto w-lg-75" width="136" height="76"
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
