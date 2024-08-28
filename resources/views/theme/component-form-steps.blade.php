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
                                                <li class="breadcrumb-item active" aria-current="page">Form Steps</li>
                                            </ol>
                                        </div>
                                    </nav>
                                    <h1 class="mb-0 display-4">
                                        Form Steps
                                    </h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="position-relative overflow-hidden">
                <div class="container py-9 py-lg-11">
                    <h5 class="mb-7">Steps Default</h5>
                    <!--Steps default start-->
                    <div class="bs-stepper" id="stepperDemo">
                        <!--Stepper header start-->
                        <div class="bs-stepper-header pb-3 align-items-start align-items-md-center flex-md-row flex-column p-0"
                            role="tablist">
                            <!--Step-Header-item-->
                            <div class="step active" data-target="#stepper-step-1">
                                <button type="button" class="step-trigger ps-0 py-2 flex-nowrap" role="tab"
                                    id="stepperDemotrigger1" aria-controls="stepper-step-1" aria-selected="true">
                                    <span class="bs-stepper-circle rounded-2">
                                        <i class="bx bx-user-circle"></i>
                                    </span>
                                    <span
                                        class="flex-grow-1 flex-wrap d-flex flex-column jusitfy-content-start text-start">
                                        <span class="bs-stepper-label h6 m-0">Account Details</span>
                                        <small class="opacity-75">Setup account details</small>
                                    </span>
                                </button>
                            </div>
                            <!--Divider line-->
                            <div class="step-line d-none d-md-block">
                                <i class='bx bx-chevrons-right'></i>
                            </div>
                            <!--Step-Header-item-->
                            <div class="step" data-target="#stepper-step-2">
                                <button type="button" class="step-trigger py-2 ps-0 ps-md-2 flex-nowrap" role="tab"
                                    id="stepperDemotrigger2" aria-controls="stepper-step-2" aria-selected="false">
                                    <span class="bs-stepper-circle rounded-2">
                                        <i class="bx bx-map-alt"></i>
                                    </span>
                                    <span
                                        class="flex-grow-1 flex-wrap d-flex flex-column jusitfy-content-start text-start">
                                        <span class="bs-stepper-label h6 m-0">Address & Payments</span>
                                        <small class="opacity-75">Add address & payment methods</small>
                                    </span>
                                </button>
                            </div>
                            <!--Divider line-->
                            <div class="step-line d-none d-md-block">
                                <i class='bx bx-chevrons-right'></i>
                            </div>
                            <!--Step-Header-item-->
                            <div class="step" data-target="#stepper-step-3">
                                <button type="button" class="step-trigger py-2 ps-0 ps-md-2 flex-nowrap" role="tab"
                                    id="stepperDemotrigger3" aria-controls="stepper-step-3" aria-selected="false">
                                    <span class="bs-stepper-circle rounded-2">
                                        <i class="bx bx-link"></i>
                                    </span>
                                    <span
                                        class="flex-grow-1 flex-wrap d-flex flex-column jusitfy-content-start text-start">
                                        <span class="bs-stepper-label h6 m-0">Social Links</span>
                                        <small class="opacity-75">Add social links</small>
                                    </span>
                                </button>
                            </div>
                        </div>
                        <!--Stepper header end-->

                        <!--Stepper content start-->
                        <div class="bs-stepper-content p-0">
                            <div class="card card-body h-100">
                                <form class="h-100 d-flex flex-column" action="#">

                                    <!--Step-1-->
                                    <div id="stepper-step-1" class="content h-100" aria-labelledby="stepper-step-1">
                                        <div class="d-flex flex-column h-100">
                                            <!--Step Title-->
                                            <div class="flex-shrink-0 pb-3 border-bottom">
                                                <h6 class="mb-1">Account Details</h6>
                                                <p class="text-body-secondary small mb-0">Add Account Details</p>
                                            </div>

                                            <!--Step main content-->
                                            <div class="flex-grow-1 py-4">
                                                Add Account Details
                                            </div>
                                            <!--Step footer-->
                                            <div class="d-flex border-top pt-3 justify-content-end">
                                                <button type="button" class="btn btn-primary" onclick="stepDemo.next()">
                                                    Save & Next <i class="bx bxs-right-arrow-alt"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                    <!--Step-2-->
                                    <div id="stepper-step-2" class="content h-100" aria-labelledby="stepper-step-2">
                                        <div class="d-flex flex-column h-100">
                                            <!--Step Title-->
                                            <div class="flex-shrink-0 pb-3 border-bottom">
                                                <h6 class="mb-1">Address & Paymnets</h6>
                                                <p class="text-body-secondary small mb-0">Add address & paymnet method</p>
                                            </div>
                                            <!--Step main content-->
                                            <div class="flex-grow-1 py-4">
                                                Add address & paymnet method
                                            </div>
                                            <!--Step footer-->
                                            <div class="d-flex border-top pt-3 justify-content-between">
                                                <button type="button" class="btn btn-secondary"
                                                    onclick="stepDemo.previous()">
                                                    <i class="bx bxs-left-arrow-alt"></i> Back
                                                </button>
                                                <button type="button" class="btn btn-primary" onclick="stepDemo.next()">
                                                    Save & Next <i class="bx bxs-right-arrow-alt"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <!--Step-3-->
                                    <div id="stepper-step-3" class="content h-100" aria-labelledby="stepper-step-3">
                                        <div class="d-flex h-100 flex-column">

                                            <!--Step Title-->
                                            <div class="flex-shrink-0 pb-3 border-bottom">
                                                <h6 class="mb-1">Social Links
                                                </h6>
                                                <p class="text-body-secondary small mb-0"> Add social links
                                                </p>
                                            </div>
                                            <!--Step main content-->
                                            <div class="flex-grow-1 py-4">
                                                Add social links
                                            </div>

                                            <!--Step footer-->
                                            <div class="d-flex pt-3 border-top justify-content-between">
                                                <button type="button" class="btn btn-secondary"
                                                    onclick="stepDemo.previous()">
                                                    <i class="bx bxs-left-arrow-alt"></i> Back
                                                </button>
                                                <button type="submit" class="btn btn-primary">
                                                    Submit <i class="bx bx-send"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!--Stepper content end-->
                    </div>
                    <!--Steps default End-->
                    <div class="py-5"><hr></div>

                     <!--//////////Code Snippets start///////////////-->
                     <h6 class="mt-0">HTML</h6>
                     <small class="text-body-secondary d-block mb-3">Copy and paste into HTML</small>
                     <div class="position-relative mb-3" style="max-height:75vh;overflow-y:auto">
                         <!--Copy clipboard button-->
                         <button
                             class="btn btn-sm position-absolute rounded-0 end-0 top-0 z-1 mt-2 me-2 btn-primary copy-link"
                             data-clipboard-target="#copyStepsBasic" data-clipboard-action="copy"
                             id="copyStepsBasic1">Copy
                             Code</button>
                         <pre id="copyStepsBasic" class="language-markup bg-secondary text-white-50 mt-0" data-lang="html">
<code>
    &lt;!--Steps default start-->
    &lt;div class="bs-stepper" id="stepperDemo">
        &lt;!--Stepper header start-->
        &lt;div class="bs-stepper-header pb-3 align-items-start align-items-md-center flex-md-row flex-column p-0"
            role="tablist">
            &lt;!--Step-Header-item-->
            &lt;div class="step active" data-target="#stepper-step-1">
                &lt;button type="button" class="step-trigger ps-0 py-2 flex-nowrap" role="tab" id="stepperDemotrigger1"
                    aria-controls="stepper-step-1" aria-selected="true">
                    &lt;span class="bs-stepper-circle rounded-2">
                        &lt;i class="bx bx-user-circle">&lt;/i>
                    &lt;/span>
                    &lt;span class="flex-grow-1 flex-wrap d-flex flex-column jusitfy-content-start text-start">
                        &lt;span class="bs-stepper-label h6 m-0">Account Details&lt;/span>
                        &lt;small class="opacity-75">Setup account details&lt;/small>
                    &lt;/span>
                &lt;/button>
            &lt;/div>
            &lt;!--Divider line-->
            &lt;div class="step-line d-none d-md-block">
                &lt;i class='bx bx-chevrons-right'>&lt;/i>
            &lt;/div>
            &lt;!--Step-Header-item-->
            &lt;div class="step" data-target="#stepper-step-2">
                &lt;button type="button" class="step-trigger py-2 ps-0 ps-md-2 flex-nowrap" role="tab" id="stepperDemotrigger2"
                    aria-controls="stepper-step-2" aria-selected="false">
                    &lt;span class="bs-stepper-circle rounded-2">
                        &lt;i class="bx bx-map-alt">&lt;/i>
                    &lt;/span>
                    &lt;span class="flex-grow-1 flex-wrap d-flex flex-column jusitfy-content-start text-start">
                        &lt;span class="bs-stepper-label h6 m-0">Address & Payments&lt;/span>
                        &lt;small class="opacity-75">Add address & payment methods&lt;/small>
                    &lt;/span>
                &lt;/button>
            &lt;/div>
            &lt;!--Divider line-->
            &lt;div class="step-line d-none d-md-block">
                &lt;i class='bx bx-chevrons-right'>&lt;/i>
            &lt;/div>
            &lt;!--Step-Header-item-->
            &lt;div class="step" data-target="#stepper-step-3">
                &lt;button type="button" class="step-trigger py-2 ps-0 ps-md-2 flex-nowrap" role="tab" id="stepperDemotrigger3"
                    aria-controls="stepper-step-3" aria-selected="false">
                    &lt;span class="bs-stepper-circle rounded-2">
                        &lt;i class="bx bx-link">&lt;/i>
                    &lt;/span>
                    &lt;span class="flex-grow-1 flex-wrap d-flex flex-column jusitfy-content-start text-start">
                        &lt;span class="bs-stepper-label h6 m-0">Social Links&lt;/span>
                        &lt;small class="opacity-75">Add social links&lt;/small>
                    &lt;/span>
                &lt;/button>
            &lt;/div>
        &lt;/div>
        &lt;!--Stepper header end-->
        &lt;!--Stepper content start-->
        &lt;div class="bs-stepper-content p-0">
            &lt;div class="card card-body h-100">
                &lt;form class="h-100 d-flex flex-column" action="#">
                    &lt;!--Step-1-->
                    &lt;div id="stepper-step-1" class="content h-100" aria-labelledby="stepper-step-1">
                        &lt;div class="d-flex flex-column h-100">
                            &lt;!--Step Title-->
                            &lt;div class="flex-shrink-0 pb-3 border-bottom">
                                &lt;h6 class="mb-1">Account Details&lt;/h6>
                                &lt;p class="text-body-secondary small mb-0">Add Account Details&lt;/p>
                            &lt;/div>
                            &lt;!--Step main content-->
                            &lt;div class="flex-grow-1 py-4">
                                Add Account Details
                            &lt;/div>
                            &lt;!--Step footer-->
                            &lt;div class="d-flex border-top pt-3 justify-content-end">
                                &lt;button type="button" class="btn btn-primary" onclick="stepDemo.next()">
                                    Save & Next &lt;i class="bx bxs-right-arrow-alt">&lt;/i>
                                &lt;/button>
                            &lt;/div>
                        &lt;/div>
                    &lt;/div>
                    &lt;!--Step-2-->
                    &lt;div id="stepper-step-2" class="content h-100" aria-labelledby="stepper-step-2">
                        &lt;div class="d-flex flex-column h-100">
                            &lt;!--Step Title-->
                            &lt;div class="flex-shrink-0 pb-3 border-bottom">
                                &lt;h6 class="mb-1">Address & Paymnets&lt;/h6>
                                &lt;p class="text-body-secondary small mb-0">Add address & paymnet method&lt;/p>
                            &lt;/div>
                            &lt;!--Step main content-->
                            &lt;div class="flex-grow-1 py-4">
                                Add address & paymnet method
                            &lt;/div>
                            &lt;!--Step footer-->
                            &lt;div class="d-flex border-top pt-3 justify-content-between">
                                &lt;button type="button" class="btn btn-secondary" onclick="stepDemo.previous()">
                                    &lt;i class="bx bxs-left-arrow-alt">&lt;/i> Back
                                &lt;/button>
                                &lt;button type="button" class="btn btn-primary" onclick="stepDemo.next()">
                                    Save & Next &lt;i class="bx bxs-right-arrow-alt">&lt;/i>
                                &lt;/button>
                            &lt;/div>
                        &lt;/div>
                    &lt;/div>
                    &lt;!--Step-3-->
                    &lt;div id="stepper-step-3" class="content h-100" aria-labelledby="stepper-step-3">
                        &lt;div class="d-flex h-100 flex-column">
                            &lt;!--Step Title-->
                            &lt;div class="flex-shrink-0 pb-3 border-bottom">
                                &lt;h6 class="mb-1">Social Links
                                &lt;/h6>
                                &lt;p class="text-body-secondary small mb-0"> Add social links
                                &lt;/p>
                            &lt;/div>
                            &lt;!--Step main content-->
                            &lt;div class="flex-grow-1 py-4">
                                Add social links
                            &lt;/div>
                            &lt;!--Step footer-->
                            &lt;div class="d-flex pt-3 border-top justify-content-between">
                                &lt;button type="button" class="btn btn-secondary" onclick="stepDemo.previous()">
                                    &lt;i class="bx bxs-left-arrow-alt">&lt;/i> Back
                                &lt;/button>
                                &lt;button type="submit" class="btn btn-primary">
                                    Submit &lt;i class="bx bx-send">&lt;/i>
                                &lt;/button>
                            &lt;/div>
                        &lt;/div>
                    &lt;/div>
                &lt;/form>
            &lt;/div>
        &lt;/div>
        &lt;!--Stepper content end-->
    &lt;/div>
    &lt;!--Steps default End-->    
</code>
</pre>
                     </div>
                     <!--//////////Code Snippets end///////////////-->
                </div>
            </section>


            <section class="position-relative bg-body-tertiary">
                <div class="container py-9 py-lg-11">
                    <h5 class="mb-7">Steps Vertical</h5>
                    <!--Steps vertical start-->
                    <div class="bs-stepper bs-stepper-vertical row" id="stepperDemoVertical">
                        <!--Stepper header start-->
                        <div class="bs-stepper-header d-flex flex-column justify-content-start align-items-start col-md-4"
                            role="tablist">
                            <div class="card card-body bg-transparent p-0 border-0 w-100 h-100">
                                <div class="step active" data-target="#stepper-step-v1">
                                    <button type="button" class="step-trigger flex-nowrap" role="tab"
                                        id="stepperDemotriggerv1" aria-controls="stepper-step-v1" aria-selected="true">
                                        <span class="bs-stepper-circle">
                                            <i class="bx bx-user-circle"></i>
                                        </span>
                                        <span
                                            class="flex-grow-1 flex-wrap d-flex flex-column jusitfy-content-start text-start">
                                            <span class="bs-stepper-label h6 m-0">Account Details</span>
                                            <small class="opacity-75">Setup account details</small>
                                        </span>
                                    </button>
                                </div>
                                <div class="step" data-target="#stepper-step-v2">
                                    <button type="button" class="step-trigger flex-nowrap" role="tab"
                                        id="stepperDemotriggerv2" aria-controls="stepper-step-v2" aria-selected="false">
                                        <span class="bs-stepper-circle">
                                            <i class="bx bx-map-alt"></i>
                                        </span>
                                        <span
                                            class="flex-grow-1 flex-wrap d-flex flex-column jusitfy-content-start text-start">
                                            <span class="bs-stepper-label h6 m-0">Address & Payments</span>
                                            <small class="opacity-75">Add address & payment methods</small>
                                        </span>
                                    </button>
                                </div>
                                <div class="step" data-target="#stepper-step-v3">
                                    <button type="button" class="step-trigger flex-nowrap" role="tab"
                                        id="stepperDemotriggerv3" aria-controls="stepper-step-v3" aria-selected="false">
                                        <span class="bs-stepper-circle">
                                            <i class="bx bx-link"></i>
                                        </span>
                                        <span
                                            class="flex-grow-1 flex-wrap d-flex flex-column jusitfy-content-start text-start">
                                            <span class="bs-stepper-label h6 m-0">Social Links</span>
                                            <small class="opacity-75">Add social links</small>
                                        </span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <!--Stepper header end-->
                        <!--Stepper content start-->
                        <div class="bs-stepper-content col-md-8">
                            <div class="card card-body h-100">
                                <form class="h-100 d-flex flex-column" action="#">

                                    <!--Step-1-->
                                    <div id="stepper-step-v1" class="content h-100" aria-labelledby="stepper-step-v1">
                                        <div class="d-flex flex-column h-100">
                                            <!--Step Title-->
                                            <div class="flex-shrink-0 pb-3 border-bottom">
                                                <h6 class="mb-1">Account Details</h6>
                                                <p class="text-body-secondary small mb-0">Add Account Details</p>
                                            </div>

                                            <!--Step main content-->
                                            <div class="flex-grow-1 py-4">
                                                Add Account Details
                                            </div>
                                            <!--Step footer-->
                                            <div class="d-flex pt-3 border-top justify-content-end">
                                                <button type="button" class="btn btn-primary"
                                                    onclick="stepDemoVertical.next()">
                                                    Save & Next <i class="bx bxs-right-arrow-alt"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                    <!--Step-2-->
                                    <div id="stepper-step-v2" class="content h-100" aria-labelledby="stepper-step-v2">
                                        <div class="d-flex flex-column h-100">
                                            <!--Step Title-->
                                            <div class="flex-shrink-0 pb-3 border-bottom">
                                                <h6 class="mb-1">Address & Paymnets</h6>
                                                <p class="text-body-secondary small mb-0">Add address & payment methods</p>
                                            </div>
                                            <!--Step main content-->
                                            <div class="flex-grow-1 py-4">
                                                Add address & payment methods
                                            </div>
                                            <!--Step footer-->
                                            <div class="d-flex pt-3 border-top justify-content-between">
                                                <button type="button" class="btn btn-secondary"
                                                    onclick="stepDemoVertical.previous()">
                                                    <i class="bx bxs-left-arrow-alt"></i> Back
                                                </button>
                                                <button type="button" class="btn btn-primary"
                                                    onclick="stepDemoVertical.next()">
                                                    Save & Next <i class="bx bxs-right-arrow-alt"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <!--Step-3-->
                                    <div id="stepper-step-v3" class="content h-100" aria-labelledby="stepper-step-v3">
                                        <div class="d-flex h-100 flex-column">

                                            <!--Step Title-->
                                            <div class="flex-shrink-0 pb-3 border-bottom">
                                                <h6 class="mb-1">Social Links</h6>
                                                <p class="text-body-secondary small mb-0">Add social links</p>
                                            </div>
                                            <!--Step main content-->
                                            <div class="flex-grow-1 py-4">
                                                Add social links
                                            </div>

                                            <!--Step footer-->
                                            <div class="d-flex pt-3 border-top justify-content-between">
                                                <button type="button" class="btn btn-secondary"
                                                    onclick="stepDemoVertical.previous()">
                                                    <i class="bx bxs-left-arrow-alt"></i> Back
                                                </button>
                                                <button type="submit" class="btn btn-primary">
                                                    Submit <i class="bx bx-send"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!--Steps vertical end-->

                    <div class="py-5"><hr class="mb-0"></div>
                    <!--//////////Code Snippets start///////////////-->
                    <h6 class="mt-0">HTML</h6>
                    <small class="text-body-secondary d-block mb-3">Copy and paste into HTML</small>
                    <div class="position-relative mb-3" style="max-height:75vh;overflow-y:auto">
                        <!--Copy clipboard button-->
                        <button
                            class="btn btn-sm position-absolute rounded-0 end-0 top-0 z-1 mt-2 me-2 btn-primary copy-link"
                            data-clipboard-target="#copyStepsV" data-clipboard-action="copy"
                            id="copyStepsV1">Copy
                            Code</button>
                        <pre id="copyStepsV" class="language-markup bg-secondary text-white-50 mt-0" data-lang="html">
<code>
    &lt;!--Steps vertical start-->
    &lt;div class="bs-stepper bs-stepper-vertical row" id="stepperDemoVertical">
        &lt;!--Stepper header start-->
        &lt;div class="bs-stepper-header d-flex flex-column justify-content-start align-items-start col-md-4" role="tablist">
            &lt;div class="card card-body bg-transparent p-0 border-0 w-100 h-100">
   
                &lt;!--Step 1-->
                &lt;div class="step active" data-target="#stepper-step-v1">
                    &lt;button type="button" class="step-trigger flex-nowrap" role="tab" id="stepperDemotriggerv1"
                        aria-controls="stepper-step-v1" aria-selected="true">
                        &lt;span class="bs-stepper-circle">
                            &lt;i class="bx bx-user-circle">&lt;/i>
                        &lt;/span>
                        &lt;span class="flex-grow-1 flex-wrap d-flex flex-column jusitfy-content-start text-start">
                            &lt;span class="bs-stepper-label h6 m-0">Account Details&lt;/span>
                            &lt;small class="opacity-75">Setup account details&lt;/small>
                        &lt;/span>
                    &lt;/button>
                &lt;/div>
   
                &lt;!--Step 2-->
                &lt;div class="step" data-target="#stepper-step-v2">
                    &lt;button type="button" class="step-trigger flex-nowrap" role="tab" id="stepperDemotriggerv2"
                        aria-controls="stepper-step-v2" aria-selected="false">
                        &lt;span class="bs-stepper-circle">
                            &lt;i class="bx bx-map-alt">&lt;/i>
                        &lt;/span>
                        &lt;span class="flex-grow-1 flex-wrap d-flex flex-column jusitfy-content-start text-start">
                            &lt;span class="bs-stepper-label h6 m-0">Address & Payments&lt;/span>
                            &lt;small class="opacity-75">Add address & payment methods&lt;/small>
                        &lt;/span>
                    &lt;/button>
                &lt;/div>
                &lt;!--Step 3-->
                &lt;div class="step" data-target="#stepper-step-v3">
                    &lt;button type="button" class="step-trigger flex-nowrap" role="tab" id="stepperDemotriggerv3"
                        aria-controls="stepper-step-v3" aria-selected="false">
                        &lt;span class="bs-stepper-circle">
                            &lt;i class="bx bx-link">&lt;/i>
                        &lt;/span>
                        &lt;span class="flex-grow-1 flex-wrap d-flex flex-column jusitfy-content-start text-start">
                            &lt;span class="bs-stepper-label h6 m-0">Social Links&lt;/span>
                            &lt;small class="opacity-75">Add social links&lt;/small>
                        &lt;/span>
                    &lt;/button>
                &lt;/div>
            &lt;/div>
        &lt;/div>
        &lt;!--Stepper header end-->
   
        &lt;!--Stepper content start-->
        &lt;div class="bs-stepper-content col-md-8">
            &lt;div class="card card-body h-100">
                &lt;form class="h-100 d-flex flex-column" action="#">
   
                    &lt;!--Step-1-->
                    &lt;div id="stepper-step-v1" class="content h-100" aria-labelledby="stepper-step-v1">
                        &lt;div class="d-flex flex-column h-100">
                            &lt;!--Step Title-->
                            &lt;div class="flex-shrink-0 pb-3 border-bottom">
                                &lt;h6 class="mb-1">Account Details&lt;/h6>
                                &lt;p class="text-body-secondary small mb-0">Add Account Details&lt;/p>
                            &lt;/div>
   
                            &lt;!--Step main content-->
                            &lt;div class="flex-grow-1 py-4">
                                Add Account Details
                            &lt;/div>
                            &lt;!--Step footer-->
                            &lt;div class="d-flex pt-3 border-top justify-content-end">
                                &lt;button type="button" class="btn btn-primary" onclick="stepDemoVertical.next()">
                                    Save & Next &lt;i class="bx bxs-right-arrow-alt">&lt;/i>
                                &lt;/button>
                            &lt;/div>
                        &lt;/div>
                    &lt;/div>
   
                    &lt;!--Step-2-->
                    &lt;div id="stepper-step-v2" class="content h-100" aria-labelledby="stepper-step-v2">
                        &lt;div class="d-flex flex-column h-100">
                            &lt;!--Step Title-->
                            &lt;div class="flex-shrink-0 pb-3 border-bottom">
                                &lt;h6 class="mb-1">Address & Paymnets&lt;/h6>
                                &lt;p class="text-body-secondary small mb-0">Add address & payment methods&lt;/p>
                            &lt;/div>
                            &lt;!--Step main content-->
                            &lt;div class="flex-grow-1 py-4">
                                Add address & payment methods
                            &lt;/div>
                            &lt;!--Step footer-->
                            &lt;div class="d-flex pt-3 border-top justify-content-between">
                                &lt;button type="button" class="btn btn-secondary" onclick="stepDemoVertical.previous()">
                                    &lt;i class="bx bxs-left-arrow-alt">&lt;/i> Back
                                &lt;/button>
                                &lt;button type="button" class="btn btn-primary" onclick="stepDemoVertical.next()">
                                    Save & Next &lt;i class="bx bxs-right-arrow-alt">&lt;/i>
                                &lt;/button>
                            &lt;/div>
                        &lt;/div>
                    &lt;/div>
                    &lt;!--Step-3-->
                    &lt;div id="stepper-step-v3" class="content h-100" aria-labelledby="stepper-step-v3">
                        &lt;div class="d-flex h-100 flex-column">
   
                            &lt;!--Step Title-->
                            &lt;div class="flex-shrink-0 pb-3 border-bottom">
                                &lt;h6 class="mb-1">Social Links&lt;/h6>
                                &lt;p class="text-body-secondary small mb-0">Add social links&lt;/p>
                            &lt;/div>
                            &lt;!--Step main content-->
                            &lt;div class="flex-grow-1 py-4">
                                Add social links
                            &lt;/div>
   
                            &lt;!--Step footer-->
                            &lt;div class="d-flex pt-3 border-top justify-content-between">
                                &lt;button type="button" class="btn btn-secondary" onclick="stepDemoVertical.previous()">
                                    &lt;i class="bx bxs-left-arrow-alt">&lt;/i> Back
                                &lt;/button>
                                &lt;button type="submit" class="btn btn-primary">
                                    Submit &lt;i class="bx bx-send">&lt;/i>
                                &lt;/button>
                            &lt;/div>
                        &lt;/div>
                    &lt;/div>
                &lt;/form>
            &lt;/div>
        &lt;/div>
    &lt;/div>
    &lt;!--Steps vertical end-->     
</code>
</pre>
                    </div>
                    <!--//////////Code Snippets end///////////////-->
                </div>
            </section>

            <!--Call to action-->
            <section class="bg-gradient bg-secondary text-white position-relative border-top">
                <div class="container py-9 py-lg-11">
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
