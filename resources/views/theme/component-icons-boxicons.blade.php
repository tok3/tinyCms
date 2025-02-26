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
                                                <li class="breadcrumb-item active" aria-current="page">Boxicons</li>
                                            </ol>
                                        </div>
                                    </nav>
                                    <h1 class="mb-0 display-4">
                                        Boxicons
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
                        <div class="col-12">
                            <!--///////////Code snippets/////////////-->
                            <nav class="nav nav-tabs">
                                <a href="{{ URL::asset('#codeHtml1') }}" class="nav-link active" data-bs-toggle="tab">HTML</a>
                                <a href="{{ URL::asset('#codeCss2') }}" class="nav-link" data-bs-toggle="tab">Css</a>
                                <a href="{{ URL::asset('#codeResult3') }}" class="nav-link" data-bs-toggle="tab">Result</a>
                            </nav>
                            <div class="tab-content">
                                <div class="tab-pane fade active show" id="codeHtml1">
                                    <div class="position-relative" style="max-height: 80vh; overflow-y: auto;">
                                        <button
                                            class="btn btn-sm position-absolute end-0 top-0 me-3 mt-3 z-1 btn-primary copy-link"
                                            data-clipboard-target="#copyHTML1" data-clipboard-action="copy"
                                            id="copyHTML1-1">Copy code</button>
                                        <pre id="copyHTML1" class="language-markup bg-secondary text-white-50 mt-0" data-lang="html">
<code>
&lt;!--Uses-->
&lt;i class="bx bx-user">&lt;/i>
</code>
</pre>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="codeCss2">
                                    <div class="position-relative" style="max-height: 80vh; overflow-y: auto;">
                                        <button
                                            class="btn btn-sm position-absolute end-0 top-0 me-3 mt-3 z-1 btn-primary copy-link"
                                            data-clipboard-target="#copyCss2" data-clipboard-action="copy"
                                            id="copyCss2-2">Copy code</button>
                                        <pre id="copyCss2" class="language-markup bg-secondary text-white-50 mt-0" data-lang="html">
<code>
&lt;!--Box icons Css-->
&lt;link rel="stylesheet" href="{{ URL::asset('assets/fonts/boxicons/css/boxicons.min.css') }}">
</code>
</pre>
                                    </div>
                                </div>
                                <div class="tab-pane p-4 bg-body-tertiary fade fs-2" id="codeResult3">
                                    <i class="bx bx-user"></i>
                                </div>
                            </div>
                            <!--///////////Code snippets/////////////-->
                        </div>
                    </div>
                </div>
                <div class="container pb-9 pb-lg-11 position-relative z-1">
                    <div class="d-flex mb-5 align-items-center justify-content-between">
                        <h5 class="me-3">Icons</h5>
                        <a href="{{ URL::asset('https://boxicons.com/') }}" target="_blank" class="small fw-bold"><i
                                class='bx fs-5 me-1 bx-chevron-right-circle'></i> Visit BoxIcons</a>
                    </div>
                    <h6 class="mb-6 py-4 border-top border-bottom text-center">Regular icons</h6>

                    <div class="row row-cols-3 row-cols-sm-4 row-cols-lg-5 mb-7">
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-arrow-to-bottom fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">arrow-to-bottom</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-credit-card-front fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">credit-card-front</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-message-rounded-detail fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">message-rounded-detail</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-calendar-heart fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">calendar-heart</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-move-horizontal fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">move-horizontal</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-bookmark-alt-minus fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">bookmark-alt-minus</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-message-rounded-x fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">message-rounded-x</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-shape-polygon fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">shape-polygon</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-bus-school fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">bus-school</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-rotate-left fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">rotate-left</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-sort-down fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">sort-down</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-caret-up-circle fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">caret-up-circle</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-color-fill fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">color-fill</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-test-tube fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">test-tube</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-comment-add fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">comment-add</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-braille fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">braille</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-merge fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">merge</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-heart-circle fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">heart-circle</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-coffee-togo fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">coffee-togo</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-bible fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">bible</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-note fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">note</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-coin-stack fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">coin-stack</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-stats fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">stats</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-caret-right-square fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">caret-right-square</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-unlink fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">unlink</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-message-rounded-minus fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">message-rounded-minus</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-bomb fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">bomb</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-grid-small fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">grid-small</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-eraser fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">eraser</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-id-card fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">id-card</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-comment-x fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">comment-x</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-vial fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">vial</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-dice-3 fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">dice-3</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-message-x fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">message-x</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-bong fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">bong</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-mask fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">mask</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-show-alt fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">show-alt</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-sort-alt-2 fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">sort-alt-2</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-been-here fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">been-here</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-chevron-right-square fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">chevron-right-square</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-message-square-error fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">message-square-error</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-message-alt-error fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">message-alt-error</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-brain fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">brain</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-bracket fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">bracket</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-barcode-reader fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">barcode-reader</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-task-x fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">task-x</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-tachometer fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">tachometer</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-traffic-cone fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">traffic-cone</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-rewind-circle fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">rewind-circle</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-equalizer fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">equalizer</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-cookie fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">cookie</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-chevron-up-circle fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">chevron-up-circle</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-abacus fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">abacus</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-trip fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">trip</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-message-rounded-add fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">message-rounded-add</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-message-alt-x fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">message-alt-x</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-cctv fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">cctv</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-card fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">card</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-microchip fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">microchip</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-message-alt-check fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">message-alt-check</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-chevron-down-square fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">chevron-down-square</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-paint fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">paint</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-message-square-check fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">message-square-check</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-camera-movie fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">camera-movie</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-message-rounded-error fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">message-rounded-error</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-arrow-from-bottom fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">arrow-from-bottom</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-wifi-2 fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">wifi-2</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-home-smile fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">home-smile</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-low-vision fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">low-vision</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-donate-heart fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">donate-heart</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-dice-5 fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">dice-5</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-comment-check fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">comment-check</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-church fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">church</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-book-alt fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">book-alt</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-unite fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">unite</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-chevron-left-square fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">chevron-left-square</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-caret-down-square fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">caret-down-square</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-wifi-1 fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">wifi-1</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-arrow-from-top fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">arrow-from-top</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-cabinet fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">cabinet</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-badge-check fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">badge-check</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-chevron-left-circle fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">chevron-left-circle</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-camera-home fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">camera-home</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-dice-2 fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">dice-2</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-arrow-from-left fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">arrow-from-left</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-chevron-up-square fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">chevron-up-square</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-book-reader fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">book-reader</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-message-check fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">message-check</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-glasses fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">glasses</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-arrow-to-top fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">arrow-to-top</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-arch fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">arch</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-bookmark-alt fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">bookmark-alt</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-shield-x fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">shield-x</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-webcam fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">webcam</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-message-square-edit fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">message-square-edit</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-message-square-x fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">message-square-x</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-baseball fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">baseball</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-home-circle fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">home-circle</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-message-alt-detail fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">message-alt-detail</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-minus-back fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">minus-back</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-chevron-right-circle fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">chevron-right-circle</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-money fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">money</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-calendar-event fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">calendar-event</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-caret-left-circle fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">caret-left-circle</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-wine fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">wine</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-book-add fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">book-add</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-calendar-edit fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">calendar-edit</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-envelope-open fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">envelope-open</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-chevron-down-circle fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">chevron-down-circle</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-alarm-exclamation fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">alarm-exclamation</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-recycle fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">recycle</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-category fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">category</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-message-rounded-check fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">message-rounded-check</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-message-alt-edit fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">message-alt-edit</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-chair fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">chair</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-sticker fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">sticker</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-dice-4 fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">dice-4</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-border-none fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">border-none</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-info-square fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">info-square</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-heart-square fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">heart-square</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-expand-alt fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">expand-alt</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-refresh fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">refresh</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-badge fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">badge</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-door-open fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">door-open</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-message-square-minus fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">message-square-minus</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-intersect fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">intersect</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-calendar-star fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">calendar-star</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-blanket fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">blanket</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-game fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">game</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-comment-edit fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">comment-edit</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-dice-1 fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">dice-1</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-message-error fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">message-error</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-coin fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">coin</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-network-chart fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">network-chart</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-layer-minus fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">layer-minus</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-grid-horizontal fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">grid-horizontal</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-tag-alt fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">tag-alt</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-donate-blood fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">donate-blood</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-message-square-add fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">message-square-add</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-repeat fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">repeat</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-bookmark-heart fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">bookmark-heart</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-message-minus fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">message-minus</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-message-rounded-edit fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">message-rounded-edit</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-caret-right-circle fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">caret-right-circle</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-capsule fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">capsule</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-border-inner fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">border-inner</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-arrow-to-left fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">arrow-to-left</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-arrow-from-right fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">arrow-from-right</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-caret-down-circle fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">caret-down-circle</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-calendar-exclamation fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">calendar-exclamation</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-magnet fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">magnet</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-trim fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">trim</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-caret-up-square fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">caret-up-square</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-window-alt fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">window-alt</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-help-circle fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">help-circle</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-bone fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">bone</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-category-alt fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">category-alt</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-arrow-to-right fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">arrow-to-right</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-wifi-0 fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">wifi-0</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-atom fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">atom</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-location-plus fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">location-plus</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-alarm-snooze fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">alarm-snooze</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-sort-up fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">sort-up</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-comment-minus fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">comment-minus</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-outline fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">outline</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-walk fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">walk</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-caret-right fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">caret-right</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-message-add fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">message-add</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-bookmark-alt-plus fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">bookmark-alt-plus</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-comment-detail fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">comment-detail</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-comment-error fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">comment-error</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-message-alt-minus fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">message-alt-minus</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-meteor fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">meteor</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-brush fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">brush</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-caret-down fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">caret-down</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-library fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">library</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-message-alt-add fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">message-alt-add</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-caret-left-square fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">caret-left-square</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-grid-vertical fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">grid-vertical</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-message-detail fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">message-detail</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-layer-plus fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">layer-plus</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-joystick-button fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">joystick-button</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-message-square-detail fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">message-square-detail</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-minus-front fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">minus-front</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-vector fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">vector</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-font-family fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">font-family</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-dice-6 fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">dice-6</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-scan fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">scan</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-current-location fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">current-location</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-caret-up fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">caret-up</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-border-outer fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">border-outer</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-pointer fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">pointer</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-exclude fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">exclude</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-movie-play fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">movie-play</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-message-edit fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">message-edit</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-drink fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">drink</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-move-vertical fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">move-vertical</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-line-chart-down fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">line-chart-down</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-spray-can fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">spray-can</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-calendar-week fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">calendar-week</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-glasses-alt fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">glasses-alt</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-home-heart fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">home-heart</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-caret-left fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">caret-left</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-book-heart fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">book-heart</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-medal fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">medal</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-beer fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">beer</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-bus fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">bus</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-loader fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">loader</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-cloud-light-rain fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">cloud-light-rain</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-upload fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">upload</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-hotel fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">hotel</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-bot fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">bot</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-select-multiple fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">select-multiple</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-paste fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">paste</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-link-external fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">link-external</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-git-commit fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">git-commit</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-cog fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">cog</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-window-open fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">window-open</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-taxi fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">taxi</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-collection fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">collection</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-pen fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">pen</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-reply fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">reply</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-dislike fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">dislike</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-plus fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">plus</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-tennis-ball fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">tennis-ball</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-sidebar fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">sidebar</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-list-plus fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">list-plus</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-laptop fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">laptop</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-loader-circle fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">loader-circle</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-heading fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">heading</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-calculator fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">calculator</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-news fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">news</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-cloud-lightning fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">cloud-lightning</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-transfer fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">transfer</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-bed fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">bed</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-paper-plane fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">paper-plane</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-command fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">command</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-ruler fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">ruler</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-timer fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">timer</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-cube fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">cube</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-cart-alt fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">cart-alt</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-duplicate fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">duplicate</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-sitemap fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">sitemap</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-link fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">link</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-minus fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">minus</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-tab fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">tab</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-ball fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">ball</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-meh fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">meh</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-trash-alt fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">trash-alt</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-images fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">images</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-shield-alt fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">shield-alt</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-loader-alt fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">loader-alt</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-infinite fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">infinite</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-history fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">history</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-skip-previous-circle fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">skip-previous-circle</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-detail fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">detail</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-user-plus fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">user-plus</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-home fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">home</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-credit-card fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">credit-card</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-target-lock fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">target-lock</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-message-rounded fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">message-rounded</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-disc fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">disc</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-carousel fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">carousel</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-skip-next-circle fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">skip-next-circle</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-first-aid fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">first-aid</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-table fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">table</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-git-repo-forked fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">git-repo-forked</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-window fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">window</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-strikethrough fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">strikethrough</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-photo-album fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">photo-album</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-window-close fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">window-close</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-up-arrow fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">up-arrow</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-home-alt fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">home-alt</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-x fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">x</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-lock-open fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">lock-open</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-video-plus fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">video-plus</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-football fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">football</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-plug fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">plug</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-phone fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">phone</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-wrench fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">wrench</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-slider fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">slider</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-chalkboard fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">chalkboard</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-anchor fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">anchor</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-alarm fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">alarm</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-font-size fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">font-size</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-car fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">car</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-dialpad fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">dialpad</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-closet fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">closet</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-support fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">support</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-left-arrow fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">left-arrow</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-share-alt fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">share-alt</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-git-pull-request fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">git-pull-request</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-tag fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">tag</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-message fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">message</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-list-ul fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">list-ul</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-dock-bottom fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">dock-bottom</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-hdd fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">hdd</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-aperture fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">aperture</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-list-ol fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">list-ol</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-rename fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">rename</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-swim fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">swim</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-area fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">area</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-shopping-bag fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">shopping-bag</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-voicemail fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">voicemail</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-water fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">water</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-check-circle fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">check-circle</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-user fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">user</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-album fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">album</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-analyse fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">analyse</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-crop fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">crop</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-link-alt fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">link-alt</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-headphone fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">headphone</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-dock-top fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">dock-top</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-briefcase-alt fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">briefcase-alt</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-pulse fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">pulse</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-power-off fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">power-off</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-paragraph fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">paragraph</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-globe fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">globe</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-bath fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">bath</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-file-blank fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">file-blank</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-slider-alt fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">slider-alt</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-grid-alt fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">grid-alt</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-font fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">font</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-flag fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">flag</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-award fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">award</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-search-alt fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">search-alt</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-shield-quarter fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">shield-quarter</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-station fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">station</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-radar fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">radar</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-poll fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">poll</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-move fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">move</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-phone-outgoing fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">phone-outgoing</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-sort fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">sort</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-windows fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">windows</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-map fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">map</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-box fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">box</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-user-check fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">user-check</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-cart fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">cart</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-upvote fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">upvote</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-cast fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">cast</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-user-minus fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">user-minus</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-certification fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">certification</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-purchase-tag fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">purchase-tag</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-redo fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">redo</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-file fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">file</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-server fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">server</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-log-out fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">log-out</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-rotate-right fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">rotate-right</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-share fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">share</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-cloud-snow fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">cloud-snow</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-highlight fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">highlight</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-tv fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">tv</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-joystick fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">joystick</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-git-compare fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">git-compare</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-check fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">check</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-handicap fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">handicap</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-dock-left fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">dock-left</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-hourglass fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">hourglass</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-chip fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">chip</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-subdirectory-right fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">subdirectory-right</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-revision fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">revision</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-notification fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">notification</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-heart fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">heart</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-film fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">film</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-star fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">star</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-video-off fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">video-off</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-collapse fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">collapse</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-reply-all fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">reply-all</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-wifi fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">wifi</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-rocket fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">rocket</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-battery fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">battery</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-package fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">package</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-cut fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">cut</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-dollar-circle fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">dollar-circle</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-subdirectory-left fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">subdirectory-left</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-menu-alt-right fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">menu-alt-right</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-joystick-alt fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">joystick-alt</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-trophy fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">trophy</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-train fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">train</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-dumbbell fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">dumbbell</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-export fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">export</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-italic fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">italic</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-cloud-rain fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">cloud-rain</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-pie-chart fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">pie-chart</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-like fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">like</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-edit fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">edit</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-alarm-off fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">alarm-off</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-layout fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">layout</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-trash fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">trash</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-fingerprint fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">fingerprint</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-planet fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">planet</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-happy fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">happy</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-import fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">import</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-shield fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">shield</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-pin fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">pin</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-undo fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">undo</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-mouse fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">mouse</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-log-in fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">log-in</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-lock fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">lock</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-code-block fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">code-block</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-wind fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">wind</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-restaurant fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">restaurant</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-underline fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">underline</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-sun fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">sun</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-pencil fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">pencil</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-columns fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">columns</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-spreadsheet fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">spreadsheet</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-list-minus fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">list-minus</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-notification-off fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">notification-off</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-selection fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">selection</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-phone-incoming fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">phone-incoming</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-barcode fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">barcode</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-paperclip fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">paperclip</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-group fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">group</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-mobile fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">mobile</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-shuffle fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">shuffle</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-git-merge fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">git-merge</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-filter fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">filter</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-right-arrow fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">right-arrow</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-microphone-off fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">microphone-off</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-folder-open fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">folder-open</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-text fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">text</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-menu-alt-left fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">menu-alt-left</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-dock-right fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">dock-right</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-world fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">world</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-repost fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">repost</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-bold fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">bold</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-crown fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">crown</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-screenshot fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">screenshot</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-layer fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">layer</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-circle fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">circle</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-expand fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">expand</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-list-check fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">list-check</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-down-arrow fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">down-arrow</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-git-branch fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">git-branch</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-adjust fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">adjust</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-movie fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">movie</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-sad fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">sad</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-downvote fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">downvote</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-store fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">store</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-body fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">body</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-wallet fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">wallet</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-save fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">save</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-globe-alt fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">globe-alt</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-music fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">music</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-pie-chart-alt fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">pie-chart-alt</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-horizontal-center fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">horizontal-center</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-task fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">task</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-user-circle fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">user-circle</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-hash fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">hash</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-usb fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">usb</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-check-double fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">check-double</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-calendar-alt fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">calendar-alt</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-font-color fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">font-color</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-phone-call fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">phone-call</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-user-x fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">user-x</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-send fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">send</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-cloud-drizzle fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">cloud-drizzle</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-navigation fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">navigation</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-mobile-alt fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">mobile-alt</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-map-alt fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">map-alt</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-desktop fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">desktop</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-dizzy fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">dizzy</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-gas-pump fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">gas-pump</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-code-alt fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">code-alt</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-message-square fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">message-square</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-directions fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">directions</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-search fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">search</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-camera fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">camera</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-bolt-circle fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">bolt-circle</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-dots-vertical-rounded fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">dots-vertical-rounded</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-rewind fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">rewind</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-pause-circle fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">pause-circle</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-border-all fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">border-all</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-bell-minus fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">bell-minus</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-log-in-circle fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">log-in-circle</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-radio-circle fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">radio-circle</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-wink-tongue fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">wink-tongue</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-lira fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">lira</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-bowling-ball fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">bowling-ball</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-show fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">show</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-play fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">play</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-pound fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">pound</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-tone fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">tone</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-cuboid fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">cuboid</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-right-arrow-alt fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">right-arrow-alt</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-calendar-check fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">calendar-check</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-buoy fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">buoy</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-up-arrow-circle fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">up-arrow-circle</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-left-down-arrow-circle fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">left-down-arrow-circle</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-error fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">error</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-meh-blank fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">meh-blank</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-cake fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">cake</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-mobile-landscape fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">mobile-landscape</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-lock-alt fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">lock-alt</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-volume-mute fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">volume-mute</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-toggle-right fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">toggle-right</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-face fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">face</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-basket fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">basket</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-doughnut-chart fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">doughnut-chart</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-code-curly fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">code-curly</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-happy-beaming fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">happy-beaming</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-male-sign fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">male-sign</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-filter-alt fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">filter-alt</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-x-circle fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">x-circle</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-trending-down fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">trending-down</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-captions fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">captions</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-wink-smile fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">wink-smile</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-message-alt fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">message-alt</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-comment-dots fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">comment-dots</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-border-bottom fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">border-bottom</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-check-square fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">check-square</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-ghost fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">ghost</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-fast-forward fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">fast-forward</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-copyright fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">copyright</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-border-top fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">border-top</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-slideshow fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">slideshow</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-volume-full fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">volume-full</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-bell fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">bell</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-female-sign fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">female-sign</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-brush-alt fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">brush-alt</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-comment fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">comment</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-user-pin fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">user-pin</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-file-find fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">file-find</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-crosshair fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">crosshair</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-bookmark-minus fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">bookmark-minus</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-question-mark fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">question-mark</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-hide fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">hide</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-credit-card-alt fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">credit-card-alt</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-info-circle fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">info-circle</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-skip-previous fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">skip-previous</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-exit-fullscreen fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">exit-fullscreen</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-archive-in fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">archive-in</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-notepad fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">notepad</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-book-content fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">book-content</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-bullseye fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">bullseye</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-smile fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">smile</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-cycling fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">cycling</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-bar-chart-alt-2 fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">bar-chart-alt-2</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-bug fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">bug</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-basketball fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">basketball</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-align-middle fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">align-middle</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-accessibility fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">accessibility</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-cloud fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">cloud</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-female fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">female</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-rupee fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">rupee</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-label fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">label</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-border-left fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">border-left</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-border-right fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">border-right</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-hive fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">hive</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-run fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">run</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-at fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">at</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-chevrons-up fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">chevrons-up</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-bell-off fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">bell-off</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-tired fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">tired</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-message-alt-dots fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">message-alt-dots</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-landscape fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">landscape</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-calendar fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">calendar</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-calendar-minus fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">calendar-minus</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-down-arrow-circle fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">down-arrow-circle</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-shape-square fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">shape-square</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-volume-low fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">volume-low</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-video fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">video</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-moon fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">moon</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-happy-heart-eyes fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">happy-heart-eyes</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-cool fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">cool</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-health fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">health</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-check-shield fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">check-shield</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-map-pin fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">map-pin</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-upside-down fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">upside-down</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-palette fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">palette</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-exit fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">exit</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-band-aid fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">band-aid</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-envelope fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">envelope</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-food-tag fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">food-tag</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-user-voice fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">user-voice</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-shape-circle fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">shape-circle</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-zoom-out fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">zoom-out</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-first-page fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">first-page</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-space-bar fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">space-bar</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-euro fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">euro</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-street-view fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">street-view</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-rectangle fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">rectangle</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-key fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">key</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-folder-plus fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">folder-plus</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-mobile-vibration fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">mobile-vibration</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-up-arrow-alt fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">up-arrow-alt</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-chart fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">chart</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-stopwatch fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">stopwatch</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-border-radius fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">border-radius</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-qr fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">qr</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-search-alt-2 fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">search-alt-2</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-phone-off fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">phone-off</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-dots-vertical fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">dots-vertical</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-dollar fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">dollar</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-checkbox-square fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">checkbox-square</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-sort-z-a fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">sort-z-a</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-chevron-right fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">chevron-right</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-toggle-left fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">toggle-left</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-stop fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">stop</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-plus-circle fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">plus-circle</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-copy fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">copy</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-code fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">code</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-dialpad-alt fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">dialpad-alt</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-lock-open-alt fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">lock-open-alt</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-grid fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">grid</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-devices fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">devices</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-briefcase fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">briefcase</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-vertical-center fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">vertical-center</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-time fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">time</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-right-top-arrow-circle fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">right-top-arrow-circle</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-left-arrow-alt fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">left-arrow-alt</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-memory-card fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">memory-card</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-bar-chart-square fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">bar-chart-square</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-volume fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">volume</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-stop-circle fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">stop-circle</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-bell-plus fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">bell-plus</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-clinic fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">clinic</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-message-rounded-dots fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">message-rounded-dots</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-book fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">book</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-chevron-up fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">chevron-up</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-conversation fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">conversation</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-square-rounded fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">square-rounded</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-square fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">square</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-left-top-arrow-circle fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">left-top-arrow-circle</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-chevrons-left fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">chevrons-left</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-chevron-left fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">chevron-left</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-camera-off fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">camera-off</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-bookmark fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">bookmark</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-confused fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">confused</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-message-dots fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">message-dots</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-bookmark-plus fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">bookmark-plus</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-block fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">block</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-minus-circle fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">minus-circle</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-transfer-alt fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">transfer-alt</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-play-circle fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">play-circle</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-folder-minus fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">folder-minus</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-align-left fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">align-left</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-dish fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">dish</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-radio fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">radio</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-purchase-tag-alt fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">purchase-tag-alt</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-no-entry fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">no-entry</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-log-out-circle fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">log-out-circle</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-cloud-upload fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">cloud-upload</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-trending-up fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">trending-up</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-laugh fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">laugh</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-alarm-add fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">alarm-add</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-time-five fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">time-five</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-copy-alt fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">copy-alt</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-shape-triangle fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">shape-triangle</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-folder fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">folder</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-chevrons-right fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">chevrons-right</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-compass fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">compass</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-broadcast fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">broadcast</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-sync fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">sync</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-right-indent fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">right-indent</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-left-indent fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">left-indent</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-meh-alt fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">meh-alt</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-zoom-in fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">zoom-in</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-pause fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">pause</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-store-alt fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">store-alt</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-align-justify fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">align-justify</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-image fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">image</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-chevron-down fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">chevron-down</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-arrow-back fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">arrow-back</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-image-add fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">image-add</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-book-open fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">book-open</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-calendar-x fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">calendar-x</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-bar-chart fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">bar-chart</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-left-arrow-circle fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">left-arrow-circle</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-checkbox-checked fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">checkbox-checked</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-shocked fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">shocked</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-male fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">male</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-cloud-download fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">cloud-download</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-radio-circle-marked fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">radio-circle-marked</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-fast-forward-circle fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">fast-forward-circle</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-bug-alt fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">bug-alt</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-data fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">data</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-happy-alt fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">happy-alt</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-error-alt fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">error-alt</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-bluetooth fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">bluetooth</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-right-down-arrow-circle fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">right-down-arrow-circle</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-sleepy fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">sleepy</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-angry fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">angry</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-printer fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">printer</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-brightness-half fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">brightness-half</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-mail-send fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">mail-send</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-plus-medical fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">plus-medical</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-dna fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">dna</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-dots-horizontal fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">dots-horizontal</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-brightness fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">brightness</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-edit-alt fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">edit-alt</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-menu fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">menu</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-fullscreen fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">fullscreen</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-dots-horizontal-rounded fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">dots-horizontal-rounded</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-terminal fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">terminal</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-building fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">building</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-book-bookmark fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">book-bookmark</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-skip-next fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">skip-next</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-right-arrow-circle fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">right-arrow-circle</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-wifi-off fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">wifi-off</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-bitcoin fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">bitcoin</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-briefcase-alt-2 fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">briefcase-alt-2</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-cylinder fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">cylinder</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-message-square-dots fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">message-square-dots</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-clipboard fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">clipboard</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-yen fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">yen</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-fridge fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">fridge</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-add-to-queue fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">add-to-queue</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-speaker fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">speaker</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-line-chart fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">line-chart</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-polygon fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">polygon</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-pyramid fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">pyramid</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-calendar-plus fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">calendar-plus</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-food-menu fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">food-menu</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-image-alt fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">image-alt</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-customize fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">customize</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-down-arrow-alt fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">down-arrow-alt</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-buildings fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">buildings</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-cube-alt fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">cube-alt</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-paint-roll fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">paint-roll</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-mouse-alt fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">mouse-alt</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-rss fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">rss</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-error-circle fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">error-circle</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-align-right fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">align-right</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-extension fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">extension</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-shield-alt-2 fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">shield-alt-2</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-download fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">download</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-gift fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">gift</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-microphone fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">microphone</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-last-page fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">last-page</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-checkbox fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">checkbox</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-bookmarks fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">bookmarks</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-diamond fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">diamond</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-shekel fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">shekel</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-ruble fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">ruble</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-sort-a-z fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">sort-a-z</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-pie-chart-alt-2 fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">pie-chart-alt-2</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-receipt fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">receipt</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-building-house fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">building-house</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-wallet-alt fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">wallet-alt</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-archive fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">archive</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-reset fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">reset</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-coffee fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">coffee</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-won fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">won</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-spa fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">spa</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-archive-out fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">archive-out</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-droplet fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">droplet</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-bulb fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">bulb</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-bar-chart-alt fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">bar-chart-alt</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-chevrons-down fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">chevrons-down</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-video-recording fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">video-recording</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-chat fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">chat</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-podcast fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">podcast</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-checkbox-minus fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">checkbox-minus</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-registered fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">registered</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-qr-scan fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">qr-scan</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-collapse-horizontal fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">collapse-horizontal</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-injection fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">injection</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-collapse-alt fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">collapse-alt</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-collapse-vertical fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">collapse-vertical</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-expand-vertical fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">expand-vertical</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-leaf fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">leaf</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-math fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">math</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-party fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">party</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-expand-horizontal fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">expand-horizontal</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-candles fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">candles</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-popsicle fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">popsicle</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-scatter-chart fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">scatter-chart</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-money-withdraw fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">money-withdraw</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-bowl-hot fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">bowl-hot</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-circle-quarter fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">circle-quarter</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-circle-three-quarter fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">circle-three-quarter</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-circle-half fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">circle-half</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-baguette fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">baguette</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-cricket-ball fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">cricket-ball</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-cable-car fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">cable-car</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-cross fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">cross</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-knife fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">knife</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-fork fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">fork</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-bowl-rice fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">bowl-rice</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-male-female fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">male-female</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-lemon fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">lemon</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-home-alt-2 fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">home-alt-2</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-hard-hat fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">hard-hat</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-cheese fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">cheese</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-signal-1 fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">signal-1</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-signal-2 fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">signal-2</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-signal-3 fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">signal-3</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-signal-4 fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">signal-4</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-signal-5 fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">signal-5</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-no-signal fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">no-signal</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-cart-download fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">cart-download</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-cart-add fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">cart-add</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-reflect-vertical fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">reflect-vertical</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bx-reflect-horizontal fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">reflect-horizontal</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bx-color fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">color</span></div>
                        </div>
                    </div>

                    <h6 class="mb-6 py-4 border-top border-bottom text-center">Solid icons</h6>
                    <div class="row row-cols-3 row-cols-sm-4 row-cols-lg-5 mb-7">
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-message-square-x fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">message-square-x</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-message-alt-detail fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">message-alt-detail</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-dice-1 fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">dice-1</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-cloud-lightning fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">cloud-lightning</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-right-arrow-square fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">right-arrow-square</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-message-square-check fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">message-square-check</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-caret-up-square fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">caret-up-square</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-book-add fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">book-add</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-right-arrow-alt fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">right-arrow-alt</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-chevron-up fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">chevron-up</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-disc fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">disc</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-virus-block fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">virus-block</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-movie-play fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">movie-play</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-arrow-to-top fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">arrow-to-top</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-piano fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">piano</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-landmark fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">landmark</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-message-square-add fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">message-square-add</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-alarm-exclamation fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">alarm-exclamation</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-credit-card-front fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">credit-card-front</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-envelope-open fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">envelope-open</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-spray-can fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">spray-can</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-traffic-cone fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">traffic-cone</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-pointer fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">pointer</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-cart-add fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">cart-add</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-keyboard fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">keyboard</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-shapes fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">shapes</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-cabinet fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">cabinet</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-cookie fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">cookie</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-door-open fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">door-open</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-caret-right-square fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">caret-right-square</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-dice-6 fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">dice-6</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-layer-plus fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">layer-plus</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-direction-right fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">direction-right</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-message-rounded-minus fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">message-rounded-minus</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-tree fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">tree</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-user-account fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">user-account</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-bone fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">bone</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-arrow-to-right fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">arrow-to-right</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-arrow-from-left fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">arrow-from-left</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-message-rounded-check fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">message-rounded-check</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-camera-home fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">camera-home</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-donate-heart fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">donate-heart</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-home-smile fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">home-smile</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-vector fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">vector</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-medal fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">medal</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-message-detail fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">message-detail</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-message-alt-error fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">message-alt-error</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-backpack fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">backpack</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-arrow-from-right fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">arrow-from-right</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-bookmark-heart fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">bookmark-heart</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-copyright fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">copyright</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-dice-4 fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">dice-4</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-caret-down-square fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">caret-down-square</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-chevron-down fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">chevron-down</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-gas-pump fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">gas-pump</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-comment-edit fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">comment-edit</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-message-square-error fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">message-square-error</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-basketball fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">basketball</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-webcam fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">webcam</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-message-add fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">message-add</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-cart-download fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">cart-download</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-cctv fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">cctv</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-car-crash fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">car-crash</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-arch fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">arch</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-yin-yang fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">yin-yang</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-megaphone fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">megaphone</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-message-check fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">message-check</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-book-heart fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">book-heart</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-down-arrow-alt fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">down-arrow-alt</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-been-here fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">been-here</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-capsule fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">capsule</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-message-rounded-detail fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">message-rounded-detail</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-game fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">game</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-sticker fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">sticker</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-user-badge fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">user-badge</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-message-square-minus fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">message-square-minus</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-shopping-bags fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">shopping-bags</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-ev-station fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">ev-station</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-file-import fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">file-import</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-message-alt-edit fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">message-alt-edit</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-up-arrow-alt fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">up-arrow-alt</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-coffee-alt fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">coffee-alt</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-coin fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">coin</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-shield-x fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">shield-x</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-calendar-exclamation fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">calendar-exclamation</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-microchip fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">microchip</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-message-rounded-error fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">message-rounded-error</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-binoculars fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">binoculars</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-blanket fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">blanket</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-low-vision fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">low-vision</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-home-heart fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">home-heart</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-down-arrow-square fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">down-arrow-square</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-baseball fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">baseball</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-chevron-left fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">chevron-left</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-heart-square fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">heart-square</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-factory fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">factory</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-bookmark-alt fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">bookmark-alt</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-chevron-right fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">chevron-right</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-magic-wand fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">magic-wand</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-message-square-edit fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">message-square-edit</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-message-minus fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">message-minus</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-message-x fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">message-x</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-calendar-star fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">calendar-star</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-radiation fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">radiation</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-badge-check fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">badge-check</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-bookmark-alt-minus fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">bookmark-alt-minus</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-message-rounded-edit fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">message-rounded-edit</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-calendar-heart fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">calendar-heart</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-flag-checkered fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">flag-checkered</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-file-export fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">file-export</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-ship fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">ship</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-coin-stack fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">coin-stack</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-guitar-amp fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">guitar-amp</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-tachometer fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">tachometer</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-calendar-week fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">calendar-week</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-user-rectangle fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">user-rectangle</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-up-arrow-square fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">up-arrow-square</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-bookmark-alt-plus fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">bookmark-alt-plus</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-chevron-right-circle fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">chevron-right-circle</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-file-pdf fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">file-pdf</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-dice-3 fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">dice-3</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-joystick-button fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">joystick-button</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-info-square fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">info-square</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-chess fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">chess</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-comment-x fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">comment-x</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-message-rounded-add fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">message-rounded-add</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-message-rounded-x fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">message-rounded-x</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-chevron-up-circle fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">chevron-up-circle</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-network-chart fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">network-chart</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-meteor fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">meteor</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-chevrons-right fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">chevrons-right</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-tv fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">tv</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-florist fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">florist</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-book-reader fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">book-reader</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-coffee-togo fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">coffee-togo</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-magnet fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">magnet</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-mask fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">mask</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-flask fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">flask</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-card fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">card</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-message-square-detail fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">message-square-detail</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-bullseye fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">bullseye</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-comment-minus fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">comment-minus</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-calendar-edit fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">calendar-edit</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-chevron-left-square fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">chevron-left-square</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-dice-2 fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">dice-2</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-pizza fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">pizza</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-chevron-right-square fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">chevron-right-square</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-chevron-up-square fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">chevron-up-square</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-layer-minus fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">layer-minus</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-car-wash fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">car-wash</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-face-mask fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">face-mask</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-caret-left-square fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">caret-left-square</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-washer fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">washer</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-beer fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">beer</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-brush fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">brush</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-flame fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">flame</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-message-alt-check fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">message-alt-check</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-church fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">church</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-help-circle fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">help-circle</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-diamond fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">diamond</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-chevrons-left fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">chevrons-left</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-arrow-to-left fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">arrow-to-left</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-bible fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">bible</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-virus fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">virus</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-chevron-down-square fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">chevron-down-square</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-chevron-down-circle fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">chevron-down-circle</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-left-arrow-alt fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">left-arrow-alt</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-arrow-to-bottom fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">arrow-to-bottom</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-bus-school fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">bus-school</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-bong fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">bong</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-heart-circle fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">heart-circle</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-dryer fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">dryer</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-note fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">note</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-brain fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">brain</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-dice-5 fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">dice-5</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-donate-blood fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">donate-blood</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-book-alt fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">book-alt</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-file-archive fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">file-archive</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-edit-location fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">edit-location</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-car-mechanic fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">car-mechanic</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-car-garage fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">car-garage</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-eraser fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">eraser</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-message-error fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">message-error</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-message-alt-add fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">message-alt-add</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-category-alt fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">category-alt</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-chevrons-down fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">chevrons-down</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-badge fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">badge</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-location-plus fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">location-plus</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-ambulance fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">ambulance</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-tag-alt fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">tag-alt</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-chevrons-up fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">chevrons-up</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-home-circle fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">home-circle</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-plane fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">plane</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-car-battery fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">car-battery</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-camera-movie fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">camera-movie</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-crop fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">crop</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-message-alt-minus fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">message-alt-minus</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-chevron-left-circle fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">chevron-left-circle</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-arrow-from-top fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">arrow-from-top</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-badge-dollar fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">badge-dollar</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-left-arrow-square fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">left-arrow-square</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-message-edit fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">message-edit</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-message-alt-x fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">message-alt-x</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-color-fill fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">color-fill</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-category fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">category</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-arrow-from-bottom fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">arrow-from-bottom</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-eyedropper fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">eyedropper</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-comment-check fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">comment-check</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-window-alt fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">window-alt</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-cloud-rain fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">cloud-rain</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-hotel fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">hotel</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-alarm-snooze fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">alarm-snooze</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-bomb fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">bomb</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-thermometer fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">thermometer</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-directions fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">directions</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-microphone-alt fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">microphone-alt</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-edit fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">edit</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-checkbox-checked fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">checkbox-checked</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-error-circle fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">error-circle</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-copy fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">copy</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-barcode fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">barcode</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-bath fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">bath</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-rocket fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">rocket</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-t-shirt fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">t-shirt</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-quote-right fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">quote-right</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-sort-alt fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">sort-alt</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-error fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">error</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-user-plus fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">user-plus</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-playlist fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">playlist</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-hdd fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">hdd</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-filter-alt fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">filter-alt</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-car fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">car</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-zap fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">zap</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-volume-full fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">volume-full</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-server fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">server</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-plug fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">plug</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-microphone-off fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">microphone-off</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-cube fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">cube</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-bar-chart-square fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">bar-chart-square</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-dollar-circle fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">dollar-circle</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-pencil fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">pencil</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-pen fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">pen</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-paper-plane fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">paper-plane</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-drink fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">drink</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-captions fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">captions</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-camera-off fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">camera-off</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-skull fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">skull</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-dashboard fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">dashboard</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-toggle-left fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">toggle-left</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-news fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">news</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-plus-circle fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">plus-circle</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-downvote fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">downvote</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-download fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">download</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-checkbox fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">checkbox</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-trophy fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">trophy</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-phone fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">phone</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-store fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">store</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-like fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">like</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-dock-bottom fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">dock-bottom</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-folder-plus fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">folder-plus</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-archive fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">archive</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-alarm fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">alarm</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-left-arrow-circle fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">left-arrow-circle</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-eject fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">eject</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-folder fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">folder</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-ball fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">ball</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-pie-chart fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">pie-chart</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-map fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">map</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-droplet fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">droplet</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-wrench fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">wrench</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-videos fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">videos</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-shield fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">shield</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-key fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">key</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-rename fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">rename</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-pie-chart-alt fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">pie-chart-alt</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-joystick fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">joystick</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-battery fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">battery</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-show fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">show</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-package fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">package</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-x-circle fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">x-circle</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-ruler fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">ruler</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-flag-alt fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">flag-alt</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-envelope fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">envelope</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-contact fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">contact</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-volume-low fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">volume-low</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-shopping-bag fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">shopping-bag</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-award fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">award</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-image-alt fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">image-alt</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-planet fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">planet</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-user fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">user</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-shopping-bag-alt fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">shopping-bag-alt</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-moon fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">moon</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-collection fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">collection</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-tennis-ball fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">tennis-ball</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-share fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">share</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-gift fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">gift</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-duplicate fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">duplicate</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-map-alt fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">map-alt</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-layer fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">layer</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-heart fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">heart</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-up-arrow-circle fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">up-arrow-circle</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-report fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">report</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-music fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">music</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-truck fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">truck</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-video-off fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">video-off</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-tag-x fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">tag-x</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-inbox fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">inbox</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-down-arrow-circle fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">down-arrow-circle</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-chip fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">chip</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-bell-ring fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">bell-ring</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-share-alt fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">share-alt</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-coffee fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">coffee</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-building fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">building</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-battery-charging fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">battery-charging</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-battery-low fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">battery-low</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-user-circle fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">user-circle</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-navigation fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">navigation</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-watch fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">watch</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-home fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">home</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-discount fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">discount</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-to-top fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">to-top</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-movie fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">movie</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-widget fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">widget</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-file-plus fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">file-plus</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-video fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">video</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-save fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">save</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-microphone fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">microphone</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-dock-top fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">dock-top</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-dock-right fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">dock-right</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-chart fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">chart</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-film fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">film</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-wallet fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">wallet</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-check-circle fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">check-circle</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-tag fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">tag</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-cart-alt fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">cart-alt</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-adjust fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">adjust</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-radio fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">radio</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-mouse fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">mouse</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-bookmark-star fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">bookmark-star</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-taxi fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">taxi</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-printer fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">printer</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-coupon fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">coupon</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-cloud fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">cloud</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-bookmark-plus fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">bookmark-plus</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-photo-album fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">photo-album</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-minus-circle fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">minus-circle</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-cloud-upload fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">cloud-upload</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-camera fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">camera</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-certification fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">certification</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-conversation fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">conversation</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-briefcase-alt fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">briefcase-alt</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-video-plus fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">video-plus</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-trash-alt fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">trash-alt</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-flag fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">flag</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-phone-outgoing fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">phone-outgoing</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-user-minus fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">user-minus</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-trash fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">trash</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-sun fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">sun</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-image fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">image</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-grid-alt fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">grid-alt</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-album fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">album</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-alarm-off fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">alarm-off</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-train fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">train</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-terminal fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">terminal</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-message-rounded fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">message-rounded</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-battery-full fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">battery-full</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-book-open fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">book-open</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-volume fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">volume</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-upvote fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">upvote</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-joystick-alt fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">joystick-alt</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-dock-left fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">dock-left</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-phone-call fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">phone-call</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-lock-open fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">lock-open</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-bookmark fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">bookmark</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-file-blank fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">file-blank</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-x-square fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">x-square</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-select-multiple fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">select-multiple</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-bus fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">bus</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-hot fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">hot</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-first-aid fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">first-aid</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-lock fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">lock</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-cog fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">cog</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-file-image fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">file-image</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-plus-square fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">plus-square</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-buoy fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">buoy</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-purchase-tag fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">purchase-tag</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-detail fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">detail</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-minus-square fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">minus-square</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-toggle-right fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">toggle-right</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-hide fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">hide</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-group fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">group</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-star fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">star</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-right-arrow-circle fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">right-arrow-circle</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-paste fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">paste</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-calculator fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">calculator</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-bed fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">bed</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-pin fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">pin</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-phone-incoming fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">phone-incoming</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-crown fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">crown</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-cloud-download fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">cloud-download</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-box fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">box</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-spreadsheet fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">spreadsheet</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-send fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">send</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-quote-left fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">quote-left</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-info-circle fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">info-circle</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-briefcase fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">briefcase</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-bell fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">bell</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-volume-mute fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">volume-mute</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-user-detail fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">user-detail</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-cart fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">cart</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-bulb fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">bulb</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-hourglass fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">hourglass</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-bell-off fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">bell-off</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-star-half fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">star-half</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-dislike fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">dislike</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-bug fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">bug</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-book fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">book</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-area fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">area</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-watch-alt fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">watch-alt</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-file fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">file</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-bot fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">bot</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-folder-open fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">folder-open</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-torch fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">torch</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-message fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">message</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-book-bookmark fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">book-bookmark</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-bolt fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">bolt</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-polygon fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">polygon</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-cylinder fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">cylinder</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-plane-land fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">plane-land</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-check-shield fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">check-shield</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-mobile-vibration fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">mobile-vibration</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-bell-minus fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">bell-minus</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-palette fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">palette</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-log-out fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">log-out</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-log-in-circle fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">log-in-circle</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-customize fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">customize</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-bookmarks fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">bookmarks</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-calendar-check fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">calendar-check</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-paint fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">paint</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-log-in fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">log-in</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-calendar-event fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">calendar-event</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-cuboid fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">cuboid</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-file-json fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">file-json</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-mouse-alt fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">mouse-alt</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-food-menu fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">food-menu</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-comment fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">comment</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-file-jpg fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">file-jpg</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-confused fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">confused</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-briefcase-alt-2 fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">briefcase-alt-2</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-file-gif fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">file-gif</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-slideshow fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">slideshow</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-memory-card fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">memory-card</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-message-dots fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">message-dots</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-bookmark-minus fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">bookmark-minus</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-compass fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">compass</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-check-square fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">check-square</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-clinic fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">clinic</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-quote-alt-right fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">quote-alt-right</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-skip-next-circle fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">skip-next-circle</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-credit-card-alt fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">credit-card-alt</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-traffic-barrier fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">traffic-barrier</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-search-alt-2 fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">search-alt-2</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-analyse fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">analyse</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-happy-alt fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">happy-alt</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-happy-beaming fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">happy-beaming</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-right-top-arrow-circle fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">right-top-arrow-circle</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-vial fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">vial</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-hand-left fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">hand-left</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-dish fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">dish</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-shocked fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">shocked</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-sleepy fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">sleepy</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-alarm-add fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">alarm-add</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-left-down-arrow-circle fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">left-down-arrow-circle</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-file-md fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">file-md</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-no-entry fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">no-entry</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-wallet-alt fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">wallet-alt</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-angry fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">angry</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-user-check fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">user-check</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-building-house fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">building-house</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-fast-forward-circle fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">fast-forward-circle</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-mobile fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">mobile</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-institution fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">institution</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-left-arrow fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">left-arrow</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-hand-down fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">hand-down</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-bell-plus fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">bell-plus</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-video-recording fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">video-recording</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-graduation fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">graduation</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-exit fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">exit</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-skip-previous-circle fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">skip-previous-circle</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-plane-take-off fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">plane-take-off</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-hourglass-top fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">hourglass-top</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-happy-heart-eyes fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">happy-heart-eyes</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-add-to-queue fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">add-to-queue</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-rewind-circle fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">rewind-circle</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-search fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">search</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-user-voice fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">user-voice</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-paint-roll fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">paint-roll</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-camera-plus fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">camera-plus</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-label fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">label</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-comment-add fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">comment-add</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-receipt fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">receipt</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-file-doc fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">file-doc</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-comment-error fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">comment-error</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-happy fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">happy</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-sad fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">sad</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-component fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">component</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-copy-alt fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">copy-alt</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-upside-down fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">upside-down</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-meh-blank fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">meh-blank</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-cool fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">cool</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-brush-alt fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">brush-alt</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-school fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">school</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-store-alt fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">store-alt</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-baby-carriage fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">baby-carriage</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-wine fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">wine</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-tired fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">tired</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-band-aid fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">band-aid</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-quote-single-right fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">quote-single-right</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-chalkboard fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">chalkboard</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-landscape fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">landscape</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-notepad fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">notepad</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-devices fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">devices</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-time-five fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">time-five</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-brightness fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">brightness</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-message-square fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">message-square</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-image-add fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">image-add</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-zoom-out fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">zoom-out</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-bank fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">bank</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-zoom-in fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">zoom-in</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-phone-off fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">phone-off</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-checkbox-minus fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">checkbox-minus</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-message-alt fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">message-alt</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-caret-up-circle fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">caret-up-circle</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-file-find fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">file-find</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-calendar-alt fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">calendar-alt</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-calendar fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">calendar</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-folder-minus fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">folder-minus</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-notification-off fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">notification-off</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-notification fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">notification</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-user-x fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">user-x</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-right-arrow fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">right-arrow</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-bar-chart-alt-2 fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">bar-chart-alt-2</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-carousel fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">carousel</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-message-rounded-dots fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">message-rounded-dots</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-laugh fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">laugh</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-business fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">business</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-cake fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">cake</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-pie-chart-alt-2 fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">pie-chart-alt-2</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-wink-smile fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">wink-smile</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-bolt-circle fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">bolt-circle</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-extension fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">extension</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-quote-alt-left fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">quote-alt-left</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-data fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">data</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-book-content fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">book-content</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-hand-up fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">hand-up</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-caret-down-circle fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">caret-down-circle</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-calendar-x fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">calendar-x</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-lock-alt fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">lock-alt</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-buildings fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">buildings</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-grid fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">grid</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-right-down-arrow-circle fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">right-down-arrow-circle</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-square fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">square</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-chat fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">chat</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-droplet-half fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">droplet-half</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-comment-detail fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">comment-detail</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-meh-alt fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">meh-alt</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-hourglass-bottom fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">hourglass-bottom</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-error-alt fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">error-alt</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-comment-dots fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">comment-dots</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-parking fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">parking</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-down-arrow fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">down-arrow</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-square-rounded fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">square-rounded</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-caret-left-circle fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">caret-left-circle</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-timer fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">timer</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-archive-in fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">archive-in</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-stopwatch fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">stopwatch</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-file-js fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">file-js</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-map-pin fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">map-pin</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-purchase-tag-alt fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">purchase-tag-alt</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-pyramid fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">pyramid</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-tone fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">tone</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-shield-alt-2 fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">shield-alt-2</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-file-css fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">file-css</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-ghost fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">ghost</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-message-square-dots fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">message-square-dots</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-bowling-ball fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">bowling-ball</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-quote-single-left fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">quote-single-left</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-calendar-plus fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">calendar-plus</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-basket fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">basket</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-circle fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">circle</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-traffic fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">traffic</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-bug-alt fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">bug-alt</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-offer fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">offer</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-rectangle fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">rectangle</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-smile fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">smile</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-dizzy fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">dizzy</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-time fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">time</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-speaker fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">speaker</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-registered fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">registered</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-brightness-half fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">brightness-half</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-log-out-circle fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">log-out-circle</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-cube-alt fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">cube-alt</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-face fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">face</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-layout fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">layout</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-calendar-minus fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">calendar-minus</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-left-top-arrow-circle fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">left-top-arrow-circle</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-lock-open-alt fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">lock-open-alt</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-id-card fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">id-card</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-file-html fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">file-html</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-fridge fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">fridge</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-file-png fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">file-png</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-meh fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">meh</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-plane-alt fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">plane-alt</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-message-alt-dots fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">message-alt-dots</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-direction-left fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">direction-left</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-city fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">city</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-up-arrow fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">up-arrow</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-doughnut-chart fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">doughnut-chart</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-file-txt fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">file-txt</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-wink-tongue fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">wink-tongue</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-caret-right-circle fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">caret-right-circle</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-adjust-alt fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">adjust-alt</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-spa fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">spa</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-credit-card fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">credit-card</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-user-pin fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">user-pin</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-hand-right fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">hand-right</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-archive-out fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">archive-out</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-edit-alt fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">edit-alt</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-hand fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">hand</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-cat fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">cat</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-injection fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">injection</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-leaf fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">leaf</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-dog fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">dog</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-party fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">party</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-bowl-hot fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">bowl-hot</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-cricket-ball fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">cricket-ball</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-bowl-rice fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">bowl-rice</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-circle-quarter fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">circle-quarter</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-circle-half fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">circle-half</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-baguette fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">baguette</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-popsicle fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">popsicle</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-circle-three-quarter fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">circle-three-quarter</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-tree-alt fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">tree-alt</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-lemon fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">lemon</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-invader fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">invader</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-cable-car fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">cable-car</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxs-home-alt-2 fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">home-alt-2</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-hard-hat fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">hard-hat</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-cheese fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">cheese</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxs-color fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">color</span></div>
                        </div>
                    </div>

                    <h6 class="mb-6 py-4 border-top border-bottom text-center">Logo icons</h6>
                    <div class="row row-cols-3 row-cols-sm-4 row-cols-lg-5">
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxl-medium-old fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">medium-old</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxl-ok-ru fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">ok-ru</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxl-yahoo fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">yahoo</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxl-redux fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">redux</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxl-edge fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">edge</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxl-amazon fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">amazon</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxl-firebase fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">firebase</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxl-kubernetes fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">kubernetes</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxl-spotify fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">spotify</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxl-dropbox fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">dropbox</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxl-snapchat fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">snapchat</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxl-yelp fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">yelp</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxl-jsfiddle fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">jsfiddle</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxl-kickstarter fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">kickstarter</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxl-discourse fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">discourse</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxl-opera fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">opera</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxl-google-cloud fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">google-cloud</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxl-unsplash fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">unsplash</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxl-blender fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">blender</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxl-internet-explorer fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">internet-explorer</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxl-firefox fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">firefox</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxl-git fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">git</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxl-javascript fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">javascript</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxl-joomla fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">joomla</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxl-visa fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">visa</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxl-creative-commons fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">creative-commons</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxl-spring-boot fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">spring-boot</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxl-vuejs fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">vuejs</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxl-telegram fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">telegram</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxl-dev-to fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">dev-to</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxl-zoom fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">zoom</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxl-product-hunt fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">product-hunt</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxl-drupal fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">drupal</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxl-airbnb fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">airbnb</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxl-microsoft-teams fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">microsoft-teams</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxl-bootstrap fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">bootstrap</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxl-tux fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">tux</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxl-angular fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">angular</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxl-quora fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">quora</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxl-soundcloud fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">soundcloud</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxl-chrome fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">chrome</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxl-python fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">python</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxl-trello fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">trello</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxl-c-plus-plus fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">c-plus-plus</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxl-wix fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">wix</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxl-markdown fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">markdown</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxl-stack-overflow fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">stack-overflow</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxl-whatsapp-square fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">whatsapp-square</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxl-codepen fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">codepen</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxl-flickr-square fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">flickr-square</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxl-baidu fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">baidu</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxl-sass fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">sass</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxl-invision fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">invision</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxl-500px fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">500px</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxl-periscope fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">periscope</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxl-react fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">react</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxl-bing fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">bing</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxl-squarespace fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">squarespace</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxl-html5 fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">html5</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxl-deviantart fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">deviantart</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxl-ebay fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">ebay</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxl-flickr fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">flickr</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxl-stripe fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">stripe</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxl-nodejs fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">nodejs</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxl-wikipedia fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">wikipedia</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxl-shopify fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">shopify</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxl-foursquare fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">foursquare</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxl-digitalocean fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">digitalocean</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxl-magento fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">magento</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxl-django fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">django</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxl-less fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">less</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxl-css3 fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">css3</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxl-paypal fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">paypal</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxl-wordpress fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">wordpress</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxl-mastercard fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">mastercard</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxl-digg fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">digg</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxl-microsoft fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">microsoft</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxl-mailchimp fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">mailchimp</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxl-dailymotion fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">dailymotion</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxl-google-plus-circle fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">google-plus-circle</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxl-twitter fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">twitter</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxl-windows fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">windows</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxl-whatsapp fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">whatsapp</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxl-reddit fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">reddit</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxl-apple fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">apple</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxl-tumblr fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">tumblr</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxl-google-plus fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">google-plus</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxl-vimeo fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">vimeo</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxl-android fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">android</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxl-skype fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">skype</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxl-dribbble fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">dribbble</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxl-facebook fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">facebook</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxl-linkedin fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">linkedin</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxl-slack-old fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">slack-old</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxl-behance fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">behance</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxl-instagram fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">instagram</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxl-github fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">github</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxl-messenger fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">messenger</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxl-twitch fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">twitch</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxl-discord fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">discord</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxl-medium-square fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">medium-square</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxl-blogger fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">blogger</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxl-bitcoin fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">bitcoin</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxl-linkedin-square fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">linkedin-square</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxl-youtube fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">youtube</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxl-slack fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">slack</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxl-facebook-square fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">facebook-square</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxl-medium fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">medium</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxl-play-store fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">play-store</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxl-pinterest fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">pinterest</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxl-vk fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">vk</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxl-google fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">google</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxl-pocket fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">pocket</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxl-etsy fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">etsy</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxl-gitlab fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">gitlab</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxl-algolia fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">algolia</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxl-adobe fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">adobe</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxl-imdb fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">imdb</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxl-visual-studio fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">visual-studio</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxl-flutter fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">flutter</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxl-tailwind-css fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">tailwind-css</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxl-aws fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">aws</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxl-steam fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">steam</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxl-mastodon fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">mastodon</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxl-unity fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">unity</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxl-docker fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">docker</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxl-audible fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">audible</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxl-facebook-circle fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">facebook-circle</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxl-redbubble fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">redbubble</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxl-patreon fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">patreon</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxl-jquery fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">jquery</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxl-instagram-alt fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">instagram-alt</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxl-figma fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">figma</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxl-sketch fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">sketch</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxl-discord-alt fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">discord-alt</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxl-pinterest-alt fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">pinterest-alt</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxl-tiktok fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">tiktok</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxl-php fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">php</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxl-trip-advisor fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">trip-advisor</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxl-heroku fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">heroku</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxl-flask fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">flask</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxl-99designs fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">99designs</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxl-venmo fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">venmo</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxl-gmail fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">gmail</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxl-go-lang fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">go-lang</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxl-upwork fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">upwork</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxl-java fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">java</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxl-netlify fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">netlify</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxl-meta fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">meta</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxl-xing fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">xing</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxl-deezer fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">deezer</span></div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i class="bx bxl-mongodb fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">mongodb</span>
                            </div>
                        </div>
                        <div class="col mb-4">
                            <div class="d-flex flex-column justify-content-center align-items-center text-center px-3 py-4 mb-2 bg-body-secondary rounded text-body-emphasis"><i
                                    class="bx bxl-postgresql fs-3"></i><span class="d-block text-center small text-body-secondary pt-3">postgresql</span></div>
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
