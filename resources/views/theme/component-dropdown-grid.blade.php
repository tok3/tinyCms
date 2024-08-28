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
                                                <li class="breadcrumb-item active" aria-current="page">Dropdown grid
                                                </li>
                                            </ol>
                                        </div>
                                    </nav>
                                    <h1 class="mb-0 display-4">
                                        Dropdown Grid
                                    </h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!--Full Width-->
            <section class="bg-body-tertiary position-relative">
                <div class="container py-6 py-lg-11">
                    <div class="d-flex align-items-center mb-5">
                        <h6 class="mb-0 flex-grow-0 pe-3">Dropdown Grid - Full width</h6>
                        <div class="flex-grow-1 pb-1 border-bottom"></div>
                    </div>
                    <!--begin:dropdown-Full-Width-->
                    <div class="dropdown position-lg-static">
                        <!--Dropdown trigger-->
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Dropdown Full width
                        </button>
                        <!--Dropdown-menu-->
                        <div class="dropdown-menu rounded-top-0 w-100 py-4" aria-labelledby="dropdownMenuButton1">
                            <div class="row g-0">
                                <!--Dropdown-grid-Col-->
                                <div class="col-lg-4 mb-4 mb-lg-0">
                                    <h6 class="dropdown-header">Grid column</h6>
                                    <a class="dropdown-item" href="{{ URL::asset('#') }}">Action</a>
                                    <a class="dropdown-item" href="{{ URL::asset('#') }}">Another action</a>
                                    <a class="dropdown-item" href="{{ URL::asset('#') }}">Something else here</a>
                                </div>
                                <!--Dropdown-grid-Col-->
                                <div class="col-lg-4 mb-4 mb-lg-0">
                                    <h6 class="dropdown-header">Grid column</h6>
                                    <a class="dropdown-item" href="{{ URL::asset('#') }}">Action</a>
                                    <a class="dropdown-item" href="{{ URL::asset('#') }}">Another action</a>
                                    <a class="dropdown-item" href="{{ URL::asset('#') }}">Something else here</a>
                                </div>
                                <!--Dropdown-grid-Col-->
                                <div class="col-lg-4">
                                    <h6 class="dropdown-header">Grid column</h6>
                                    <a class="dropdown-item" href="{{ URL::asset('#') }}">Action</a>
                                    <a class="dropdown-item" href="{{ URL::asset('#') }}">Another action</a>
                                    <a class="dropdown-item" href="{{ URL::asset('#') }}">Something else here</a>
                                </div>
                            </div>
                        </div>
                        <!--/ Dropdown-menu-->
                    </div>
                    <!--/end:dropdown-Full-Width-->

                    <!--BEGIN//////////COPY-CLIPBAORD-->
                    <div class="position-relative mt-4" style="max-height:75vh;overflow-y:auto">
                        <button class="btn btn-sm position-absolute end-0 top-0 me-3 mt-3 z-1 btn-primary copy-link"
                            data-clipboard-target="#copyGridFW" data-clipboard-action="copy" id="copyGridFW-1">Copy
                            code</button>
                        <pre id="copyGridFW" class="language-markup bg-secondary text-white-50 mt-0" data-lang="html">
<code>
    &lt;!--begin:dropdown-Full-Width-->
    &lt;div class="dropdown position-lg-static">
        &lt;!--Dropdown trigger-->
        &lt;button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1"
            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Dropdown Full width
        &lt;/button>
        &lt;!--Dropdown-menu-->
        &lt;div class="dropdown-menu rounded-top-0 w-100 py-4" aria-labelledby="dropdownMenuButton1">
            &lt;div class="row g-0">
                &lt;!--Dropdown-grid-Col-->
                &lt;div class="col-lg-4 mb-4 mb-lg-0">
                   &lt;!--Dropdown Header-->
                    &lt;h6 class="dropdown-header">Grid column&lt;/h6>
                    &lt;a class="dropdown-item" href="{{ URL::asset('#') }}">Action&lt;/a>
                    &lt;a class="dropdown-item" href="{{ URL::asset('#') }}">Another action&lt;/a>
                    &lt;a class="dropdown-item" href="{{ URL::asset('#') }}">Something else here&lt;/a>
                &lt;/div>
                &lt;!--Dropdown-grid-Col-->
                &lt;div class="col-lg-4 mb-4 mb-lg-0">
                    &lt;!--Dropdown Header-->
                    &lt;h6 class="dropdown-header">Grid column&lt;/h6>
                    &lt;a class="dropdown-item" href="{{ URL::asset('#') }}">Action&lt;/a>
                    &lt;a class="dropdown-item" href="{{ URL::asset('#') }}">Another action&lt;/a>
                    &lt;a class="dropdown-item" href="{{ URL::asset('#') }}">Something else here&lt;/a>
                &lt;/div>
                &lt;!--Dropdown-grid-Col-->
                &lt;div class="col-lg-4">
                 &lt;!--Dropdown Header-->
                    &lt;h6 class="dropdown-header">Grid column&lt;/h6>
                    &lt;a class="dropdown-item" href="{{ URL::asset('#') }}">Action&lt;/a>
                    &lt;a class="dropdown-item" href="{{ URL::asset('#') }}">Another action&lt;/a>
                    &lt;a class="dropdown-item" href="{{ URL::asset('#') }}">Something else here&lt;/a>
                &lt;/div>
            &lt;/div>
        &lt;/div>
         &lt;!--/ Dropdown-menu-->
    &lt;/div>
    &lt;!--/end:dropdown-Full-Width-->
</code>
</pre>
                    </div>
                    <!--END//////////COPY-CLIPBAORD-->
                </div>
            </section>

            <!--Fluid-->
            <section class="position-relative">
                <div class="container-fluid py-9 py-lg-11">
                    <div class="d-flex align-items-center mb-5">
                        <h6 class="mb-0 flex-grow-0 pe-3">Dropdown Grid - Container fluid</h6>
                        <div class="flex-grow-1 pb-1 border-bottom"></div>
                    </div>
                    <!--begin:dropdown-Fluid-->
                    <div class="dropdown">
                        <!--Dropdown-trigger-->
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton2"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Dropdown container wide
                        </button>

                        <!--Dropdown-menu-->
                        <div class="dropdown-menu w-100 py-4" aria-labelledby="dropdownMenuButton2">
                            <div class="row g-0">
                                <!--Dropdown-grid-col-->
                                <div class="col-lg-3 mb-4 mb-lg-0">
                                    <h6 class="dropdown-header">Grid column</h6>
                                    <a class="dropdown-item" href="{{ URL::asset('#') }}">Action</a>
                                    <a class="dropdown-item" href="{{ URL::asset('#') }}">Another action</a>
                                    <a class="dropdown-item" href="{{ URL::asset('#') }}">Something else here</a>
                                </div>
                                <!--Dropdown-grid-col-->
                                <div class="col-lg-3 mb-4 mb-lg-0">
                                    <h6 class="dropdown-header">Grid column</h6>
                                    <a class="dropdown-item" href="{{ URL::asset('#') }}">Action</a>
                                    <a class="dropdown-item" href="{{ URL::asset('#') }}">Another action</a>
                                    <a class="dropdown-item" href="{{ URL::asset('#') }}">Something else here</a>
                                </div>
                                <!--Dropdown-grid-col-->
                                <div class="col-lg-3 mb-4 mb-lg-0">
                                    <h6 class="dropdown-header">Grid column</h6>
                                    <a class="dropdown-item" href="{{ URL::asset('#') }}">Action</a>
                                    <a class="dropdown-item" href="{{ URL::asset('#') }}">Another action</a>
                                    <a class="dropdown-item" href="{{ URL::asset('#') }}">Something else here</a>
                                </div>
                                <!--Dropdown-grid-col-->
                                <div class="col-lg-3">
                                    <h6 class="dropdown-header">Grid column</h6>
                                    <a class="dropdown-item" href="{{ URL::asset('#') }}">Action</a>
                                    <a class="dropdown-item" href="{{ URL::asset('#') }}">Another action</a>
                                    <a class="dropdown-item" href="{{ URL::asset('#') }}">Something else here</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/end:dropdown-Fluid-->
                    <!--BEGIN//////////COPY-CLIPBAORD-->
                    <div class="position-relative mt-4" style="max-height:75vh;overflow-y:auto">
                        <button class="btn btn-sm position-absolute end-0 top-0 me-3 mt-3 z-1 btn-primary copy-link"
                            data-clipboard-target="#copyGridFluid" data-clipboard-action="copy"
                            id="copyGridFluid-1">Copy code</button>
                        <pre id="copyGridFluid" class="language-markup bg-secondary text-white-50 mt-0"
                            data-lang="html">
<code>
    &lt;!--begin:dropdown-Fluid-->
    &lt;div class="dropdown">
       &lt;!--Dropdown-trigger-->
       &lt;button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton2"
           data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
           Dropdown container wide
       &lt;/button>
   
       &lt;!--Dropdown-menu-->
       &lt;div class="dropdown-menu w-100 py-4" aria-labelledby="dropdownMenuButton2">
           &lt;div class="row g-0">
               &lt;!--Dropdown-grid-col-->
               &lt;div class="col-lg-3 mb-4 mb-lg-0">
                   &lt;!--Dropdown Header-->
                   &lt;h6 class="dropdown-header">Grid column&lt;/h6>
                   &lt;a class="dropdown-item" href="{{ URL::asset('#') }}">Action&lt;/a>
                   &lt;a class="dropdown-item" href="{{ URL::asset('#') }}">Another action&lt;/a>
                   &lt;a class="dropdown-item" href="{{ URL::asset('#') }}">Something else here&lt;/a>
               &lt;/div>
               &lt;!--Dropdown-grid-col-->
               &lt;div class="col-lg-3 mb-4 mb-lg-0">
                   &lt;!--Dropdown Header-->
                   &lt;h6 class="dropdown-header">Grid column&lt;/h6>
                   &lt;a class="dropdown-item" href="{{ URL::asset('#') }}">Action&lt;/a>
                   &lt;a class="dropdown-item" href="{{ URL::asset('#') }}">Another action&lt;/a>
                   &lt;a class="dropdown-item" href="{{ URL::asset('#') }}">Something else here&lt;/a>
               &lt;/div>
               &lt;!--Dropdown-grid-col-->
               &lt;div class="col-lg-3 mb-4 mb-lg-0">
                   &lt;!--Dropdown Header-->
                   &lt;h6 class="dropdown-header">Grid column&lt;/h6>
                   &lt;a class="dropdown-item" href="{{ URL::asset('#') }}">Action&lt;/a>
                   &lt;a class="dropdown-item" href="{{ URL::asset('#') }}">Another action&lt;/a>
                   &lt;a class="dropdown-item" href="{{ URL::asset('#') }}">Something else here&lt;/a>
               &lt;/div>
               &lt;!--Dropdown-grid-col-->
               &lt;div class="col-lg-3">
                   &lt;!--Dropdown Header-->
                   &lt;h6 class="dropdown-header">Grid column&lt;/h6>
                   &lt;a class="dropdown-item" href="{{ URL::asset('#') }}">Action&lt;/a>
                   &lt;a class="dropdown-item" href="{{ URL::asset('#') }}">Another action&lt;/a>
                   &lt;a class="dropdown-item" href="{{ URL::asset('#') }}">Something else here&lt;/a>
               &lt;/div>
           &lt;/div>
       &lt;/div>
   &lt;/div>
   &lt;!--/end:dropdown-Fluid-->
</code>
</pre>
                    </div>
                    <!--END//////////COPY-CLIPBAORD-->
                </div>
            </section>

            <!--LG-->
            <section class="bg-body-tertiary position-relative">
                <div class="container py-6 py-lg-11">
                    <div class="d-flex align-items-center mb-5">
                        <h6 class="mb-0 flex-grow-0 pe-3">Dropdown Grid - LG</h6>
                        <div class="flex-grow-1 pb-1 border-bottom"></div>
                    </div>
                    <!--begin:dropdown-LG-->
                    <div class="dropdown">
                        <!--dropdown-trigger-->
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton3"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Dropdown LG
                        </button>
                        <!--dropdown-menu-->
                        <div class="dropdown-menu w-100 py-4" aria-labelledby="dropdownMenuButton3">
                            <div class="row g-0">
                                <!--dropdown-grid-col-->
                                <div class="col-lg-4 mb-4 mb-lg-0">
                                    <h6 class="dropdown-header">Grid column</h6>
                                    <a class="dropdown-item" href="{{ URL::asset('#') }}">Action</a>
                                    <a class="dropdown-item" href="{{ URL::asset('#') }}">Another action</a>
                                    <a class="dropdown-item" href="{{ URL::asset('#') }}">Something else here</a>
                                </div>
                                <!--dropdown-grid-col-->
                                <div class="col-lg-4 mb-4 mb-lg-0">
                                    <h6 class="dropdown-header">Grid column</h6>
                                    <a class="dropdown-item" href="{{ URL::asset('#') }}">Action</a>
                                    <a class="dropdown-item" href="{{ URL::asset('#') }}">Another action</a>
                                    <a class="dropdown-item" href="{{ URL::asset('#') }}">Something else here</a>
                                </div>
                                <!--dropdown-grid-col-->
                                <div class="col-lg-4">
                                    <h6 class="dropdown-header">Grid column</h6>
                                    <a class="dropdown-item" href="{{ URL::asset('#') }}">Action</a>
                                    <a class="dropdown-item" href="{{ URL::asset('#') }}">Another action</a>
                                    <a class="dropdown-item" href="{{ URL::asset('#') }}">Something else here</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end:dropdown-LG-->
                    <!--BEGIN//////////COPY-CLIPBAORD-->
                    <div class="position-relative mt-4" style="max-height:75vh;overflow-y:auto">
                        <button class="btn btn-sm position-absolute end-0 top-0 me-3 mt-3 z-1 btn-primary copy-link"
                            data-clipboard-target="#copyGridLG" data-clipboard-action="copy" id="copyGridLG-1">Copy
                            code</button>
                        <pre id="copyGridLG" class="language-markup bg-secondary text-white-50 mt-0" data-lang="html">
<code>
    &lt;!--begin:dropdown-LG-->
    &lt;div class="dropdown">
       &lt;!--dropdown-trigger-->
       &lt;button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton3"
           data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
           Dropdown LG
       &lt;/button>
       &lt;!--dropdown-menu-->
       &lt;div class="dropdown-menu w-100 py-4" aria-labelledby="dropdownMenuButton3">
           &lt;div class="row g-0">
               &lt;!--dropdown-grid-col-->
               &lt;div class="col-lg-4 mb-4 mb-lg-0">
                   &lt;!--Dropdown Header-->
                   &lt;h6 class="dropdown-header">Grid column&lt;/h6>
                   &lt;a class="dropdown-item" href="{{ URL::asset('#') }}">Action&lt;/a>
                   &lt;a class="dropdown-item" href="{{ URL::asset('#') }}">Another action&lt;/a>
                   &lt;a class="dropdown-item" href="{{ URL::asset('#') }}">Something else here&lt;/a>
               &lt;/div>
               &lt;!--dropdown-grid-col-->
               &lt;div class="col-lg-4 mb-4 mb-lg-0">
                   &lt;!--Dropdown Header-->
                   &lt;h6 class="dropdown-header">Grid column&lt;/h6>
                   &lt;a class="dropdown-item" href="{{ URL::asset('#') }}">Action&lt;/a>
                   &lt;a class="dropdown-item" href="{{ URL::asset('#') }}">Another action&lt;/a>
                   &lt;a class="dropdown-item" href="{{ URL::asset('#') }}">Something else here&lt;/a>
               &lt;/div>
               &lt;!--dropdown-grid-col-->
               &lt;div class="col-lg-4">
                   &lt;!--Dropdown Header-->
                   &lt;h6 class="dropdown-header">Grid column&lt;/h6>
                   &lt;a class="dropdown-item" href="{{ URL::asset('#') }}">Action&lt;/a>
                   &lt;a class="dropdown-item" href="{{ URL::asset('#') }}">Another action&lt;/a>
                   &lt;a class="dropdown-item" href="{{ URL::asset('#') }}">Something else here&lt;/a>
               &lt;/div>
           &lt;/div>
       &lt;/div>
   &lt;/div>
   &lt;!--end:dropdown-LG-->
</code>
</pre>
                    </div>
                    <!--END//////////COPY-CLIPBAORD-->
                </div>
            </section>

            <!--MD-->
            <section class="position-relative">
                <div class="container py-6 py-lg-11">
                    <div class="d-flex align-items-center mb-5">
                        <h6 class="mb-0 flex-grow-0 pe-3">Dropdown Grid - MD</h6>
                        <div class="flex-grow-1 pb-1 border-bottom"></div>
                    </div>
                    <!--begin:dropdown-MD-->
                    <div class="dropdown">
                        <!--dropdown-trigger-->
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton4"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Dropdown MD
                        </button>

                        <!--dropdown-menu-->
                        <div class="dropdown-menu dropdown-menu-md py-4" aria-labelledby="dropdownMenuButton4">
                            <div class="row g-0">
                                <!--dropdown-grid-col-->
                                <div class="col-lg-4 mb-4 mb-lg-0">
                                    <h6 class="dropdown-header">Grid column</h6>
                                    <a class="dropdown-item" href="{{ URL::asset('#') }}">Action</a>
                                    <a class="dropdown-item" href="{{ URL::asset('#') }}">Another action</a>
                                    <a class="dropdown-item" href="{{ URL::asset('#') }}">Something else here</a>
                                </div>
                                <!--dropdown-grid-col-->
                                <div class="col-lg-4 mb-4 mb-lg-0">
                                    <h6 class="dropdown-header">Grid column</h6>
                                    <a class="dropdown-item" href="{{ URL::asset('#') }}">Action</a>
                                    <a class="dropdown-item" href="{{ URL::asset('#') }}">Another action</a>
                                    <a class="dropdown-item" href="{{ URL::asset('#') }}">Something else here</a>
                                </div>
                                <!--dropdown-grid-col-->
                                <div class="col-lg-4">
                                    <h6 class="dropdown-header">Grid column</h6>
                                    <a class="dropdown-item" href="{{ URL::asset('#') }}">Action</a>
                                    <a class="dropdown-item" href="{{ URL::asset('#') }}">Another action</a>
                                    <a class="dropdown-item" href="{{ URL::asset('#') }}">Something else here</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/end:dropdown-MD-->
                    <!--BEGIN//////////COPY-CLIPBAORD-->
                    <div class="position-relative mt-4" style="max-height:75vh;overflow-y:auto">
                        <button class="btn btn-sm position-absolute end-0 top-0 me-3 mt-3 z-1 btn-primary copy-link"
                            data-clipboard-target="#copyGridMD" data-clipboard-action="copy" id="copyGridMD-1">Copy
                            code</button>
                        <pre id="copyGridMD" class="language-markup bg-secondary text-white-50 mt-0" data-lang="html">
<code>
    &lt;!--begin:dropdown-MD-->
    &lt;div class="dropdown">
       &lt;!--dropdown-trigger-->
       &lt;button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton4"
           data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
           Dropdown MD
       &lt;/button>
   
       &lt;!--dropdown-menu-->
       &lt;div class="dropdown-menu dropdown-menu-md py-4" aria-labelledby="dropdownMenuButton4">
           &lt;div class="row g-0">
               &lt;!--dropdown-grid-col-->
               &lt;div class="col-lg-4 mb-4 mb-lg-0">
                   &lt;!--Dropdown Header-->
                   &lt;h6 class="dropdown-header">Grid column&lt;/h6>
                   &lt;a class="dropdown-item" href="{{ URL::asset('#') }}">Action&lt;/a>
                   &lt;a class="dropdown-item" href="{{ URL::asset('#') }}">Another action&lt;/a>
                   &lt;a class="dropdown-item" href="{{ URL::asset('#') }}">Something else here&lt;/a>
               &lt;/div>
               &lt;!--dropdown-grid-col-->
               &lt;div class="col-lg-4 mb-4 mb-lg-0">
                   &lt;!--Dropdown Header-->
                   &lt;h6 class="dropdown-header">Grid column&lt;/h6>
                   &lt;a class="dropdown-item" href="{{ URL::asset('#') }}">Action&lt;/a>
                   &lt;a class="dropdown-item" href="{{ URL::asset('#') }}">Another action&lt;/a>
                   &lt;a class="dropdown-item" href="{{ URL::asset('#') }}">Something else here&lt;/a>
               &lt;/div>
               &lt;!--dropdown-grid-col-->
               &lt;div class="col-lg-4">
                   &lt;!--Dropdown Header-->
                   &lt;h6 class="dropdown-header">Grid column&lt;/h6>
                   &lt;a class="dropdown-item" href="{{ URL::asset('#') }}">Action&lt;/a>
                   &lt;a class="dropdown-item" href="{{ URL::asset('#') }}">Another action&lt;/a>
                   &lt;a class="dropdown-item" href="{{ URL::asset('#') }}">Something else here&lt;/a>
               &lt;/div>
           &lt;/div>
       &lt;/div>
   &lt;/div>
   &lt;!--/end:dropdown-MD-->
</code>
</pre>
                    </div>
                    <!--END//////////COPY-CLIPBAORD-->
                </div>
            </section>

            <!--SM-->
            <section class="bg-body-tertiary position-relative">
                <div class="container py-6 py-lg-11">
                    <div class="d-flex align-items-center mb-5">
                        <h6 class="mb-0 flex-grow-0 pe-3">Dropdown Grid - SM</h6>
                        <div class="flex-grow-1 pb-1 border-bottom"></div>
                    </div>

                    <!--begin:dropdown-SM-->
                    <div class="dropdown">
                        <!--dropdown-trigger-->
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton5"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Dropdown SM
                        </button>
                        <!--dropdown-menu-->
                        <div class="dropdown-menu dropdown-menu-sm py-4" aria-labelledby="dropdownMenuButton">
                            <div class="row g-0">
                                <!--dropdown-grid-col-->
                                <div class="col-lg-6 mb-4 mb-lg-0">
                                    <h6 class="dropdown-header">Grid column</h6>
                                    <a class="dropdown-item" href="{{ URL::asset('#') }}">Action</a>
                                    <a class="dropdown-item" href="{{ URL::asset('#') }}">Another action</a>
                                    <a class="dropdown-item" href="{{ URL::asset('#') }}">Something else here</a>
                                </div>
                                <!--dropdown-grid-col-->
                                <div class="col-lg-6">
                                    <h6 class="dropdown-header">Grid column</h6>
                                    <a class="dropdown-item" href="{{ URL::asset('#') }}">Action</a>
                                    <a class="dropdown-item" href="{{ URL::asset('#') }}">Another action</a>
                                    <a class="dropdown-item" href="{{ URL::asset('#') }}">Something else here</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/end:dropdown-SM-->

                    <!--BEGIN//////////COPY-CLIPBAORD-->
                    <div class="position-relative mt-4" style="max-height:75vh;overflow-y:auto">
                        <button class="btn btn-sm position-absolute end-0 top-0 me-3 mt-3 z-1 btn-primary copy-link"
                            data-clipboard-target="#copyGridSM" data-clipboard-action="copy" id="copyGridSM-1">Copy
                            code</button>
                        <pre id="copyGridSM" class="language-markup bg-secondary text-white-50 mt-0" data-lang="html">
<code>
    &lt;!--begin:dropdown-SM-->
    &lt;div class="dropdown">
        &lt;!--dropdown-trigger-->
        &lt;button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton5"
            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Dropdown SM
        &lt;/button>
        &lt;!--dropdown-menu-->
        &lt;div class="dropdown-menu dropdown-menu-sm py-4" aria-labelledby="dropdownMenuButton">
            &lt;div class="row g-0">
                &lt;!--dropdown-grid-col-->
                &lt;div class="col-lg-6 mb-4 mb-lg-0">
                    &lt;!--Dropdown Header-->
                    &lt;h6 class="dropdown-header">Grid column&lt;/h6>
                    &lt;a class="dropdown-item" href="{{ URL::asset('#') }}">Action&lt;/a>
                    &lt;a class="dropdown-item" href="{{ URL::asset('#') }}">Another action&lt;/a>
                    &lt;a class="dropdown-item" href="{{ URL::asset('#') }}">Something else here&lt;/a>
                &lt;/div>
                &lt;!--dropdown-grid-col-->
                &lt;div class="col-lg-6">
                    &lt;!--Dropdown Header-->
                    &lt;h6 class="dropdown-header">Grid column&lt;/h6>
                    &lt;a class="dropdown-item" href="{{ URL::asset('#') }}">Action&lt;/a>
                    &lt;a class="dropdown-item" href="{{ URL::asset('#') }}">Another action&lt;/a>
                    &lt;a class="dropdown-item" href="{{ URL::asset('#') }}">Something else here&lt;/a>
                &lt;/div>
            &lt;/div>
        &lt;/div>
    &lt;/div>
    &lt;!--/end:dropdown-SM-->
</code>
</pre>
                    </div>
                    <!--END//////////COPY-CLIPBAORD-->
                </div>
            </section>

            <!--XS-->
            <section>
                <div class="container py-6 py-lg-11">
                    <div class="d-flex align-items-center mb-5">
                        <h6 class="mb-0 flex-grow-0 pe-3">Dropdown Grid - XS</h6>
                        <div class="flex-grow-1 pb-1 border-bottom"></div>
                    </div>
                    <!--begin:dropdown-XS-->
                    <div class="dropdown">
                        <!--dropdown-trigger-->
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton5"
                            data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-haspopup="true"
                            aria-expanded="false">
                            Dropdown XS
                        </button>
                        <!--dropdown-menu-->
                        <div class="dropdown-menu dropdown-menu-xs overflow-hidden"
                            aria-labelledby="dropdownMenuButton">
                            <div class="dropdown-header d-flex align-items-center justify-content-between pb-3">
                                <span>Notifications</span>
                                <div class="text-end">
                                    <a href="{{ URL::asset('#!') }}" class="small link-underline">View All</a>
                                </div>
                            </div>
                            <!--Notification-item-->
                            <a href="{{ URL::asset('#') }}" class="dropdown-item py-3">
                                <div class="d-flex align-items-center">
                                    <div class="me-3">
                                        <span
                                            class="avatar rounded-circle bg-warning text-white small fw-bold lh-1 d-flex align-items-center justify-content-center">
                                            RT
                                        </span>
                                    </div>
                                    <div class="overflow-hidden">
                                        <span class="mb-0 d-block small lh-sm text-truncate">Rylan tolbert created a new
                                            ticket</span>
                                        <small class="text-body-tertiary">Just now</small>
                                    </div>
                                </div>
                            </a>
                            <!--Notification-item-->
                            <a href="{{ URL::asset('#') }}" class="dropdown-item py-3">
                                <div class="d-flex align-items-center">
                                    <div class="me-3">
                                        <img src="{{ URL::asset('assets/img/avatar/1.jpg') }}" class="avatar rounded-circle" alt="">
                                    </div>
                                    <div class="overflow-hidden">
                                        <span class="mb-0 lh-sm d-block small text-truncate">Tianna Fuller sent you
                                            <span class="text-primary">$67.00</span> on paypal</span>
                                        <small class="text-body-tertiary">1 hour ago</small>
                                    </div>
                                </div>
                            </a>
                            <!--Notification-item-->
                            <a href="{{ URL::asset('#') }}" class="dropdown-item py-3">
                                <div class="d-flex align-items-center">
                                    <div class="me-3">
                                        <span
                                            class="avatar rounded-circle bg-danger text-white lh-1 d-flex align-items-center justify-content-center">
                                            <i class="bx bx-server"></i>
                                        </span>
                                    </div>
                                    <div class="overflow-hidden">
                                        <span class="mb-0 lh-sm d-block small text-truncate">Server on low space</span>
                                        <small class="text-body-tertiary">Just now</small>
                                    </div>
                                </div>
                            </a>

                        </div>
                    </div>
                    <!--/end:dropdown-XS-->

                    <!--BEGIN//////////COPY-CLIPBAORD-->
                    <div class="position-relative mt-4" style="max-height:75vh;overflow-y:auto">
                        <button class="btn btn-sm position-absolute end-0 top-0 me-3 mt-3 z-1 btn-primary copy-link"
                            data-clipboard-target="#copyGridXS" data-clipboard-action="copy" id="copyGridXS-1">Copy
                            code</button>
                        <pre id="copyGridXS" class="language-markup bg-secondary text-white-50 mt-0" data-lang="html">
<code>
    &lt;!--begin:dropdown-XS-->
    &lt;div class="dropdown">
       &lt;!--dropdown-trigger-->
       &lt;button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton5"
           data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-haspopup="true"
           aria-expanded="false">
           Dropdown XS
       &lt;/button>
       &lt;!--dropdown-menu-->
       &lt;div class="dropdown-menu dropdown-menu-xs overflow-hidden"
           aria-labelledby="dropdownMenuButton">
           &lt;div class="dropdown-header d-flex align-items-center justify-content-between pb-3">
               &lt;span>Notifications&lt;/span>
               &lt;div class="text-end">
                   &lt;a href="{{ URL::asset('#!') }}" class="small link-underline">View All&lt;/a>
               &lt;/div>
           &lt;/div>
           &lt;!--Notification-item-->
           &lt;a href="{{ URL::asset('#') }}" class="dropdown-item py-3">
               &lt;div class="d-flex align-items-center">
                   &lt;div class="me-3">
                       &lt;span
                           class="avatar rounded-circle bg-warning text-white small fw-bold lh-1 d-flex align-items-center justify-content-center">
                           RT
                       &lt;/span>
                   &lt;/div>
                   &lt;div class="overflow-hidden">
                       &lt;span class="mb-0 d-block small lh-sm text-truncate">Rylan tolbert created a new
                           ticket&lt;/span>
                       &lt;small class="text-body-tertiary">Just now&lt;/small>
                   &lt;/div>
               &lt;/div>
           &lt;/a>
           &lt;!--Notification-item-->
           &lt;a href="{{ URL::asset('#') }}" class="dropdown-item py-3">
               &lt;div class="d-flex align-items-center">
                   &lt;div class="me-3">
                       &lt;img src="{{ URL::asset('assets/img/avatar/1.jpg') }}" class="avatar rounded-circle" alt="">
                   &lt;/div>
                   &lt;div class="overflow-hidden">
                       &lt;span class="mb-0 lh-sm d-block small text-truncate">Tianna Fuller sent you
                           &lt;span class="text-primary">$67.00&lt;/span> on paypal&lt;/span>
                       &lt;small class="text-body-tertiary">1 hour ago&lt;/small>
                   &lt;/div>
               &lt;/div>
           &lt;/a>
           &lt;!--Notification-item-->
           &lt;a href="{{ URL::asset('#') }}" class="dropdown-item py-3">
               &lt;div class="d-flex align-items-center">
                   &lt;div class="me-3">
                       &lt;span
                           class="avatar rounded-circle bg-danger text-white lh-1 d-flex align-items-center justify-content-center">
                           &lt;i class="bx bx-server">&lt;/i>
                       &lt;/span>
                   &lt;/div>
                   &lt;div class="overflow-hidden">
                       &lt;span class="mb-0 lh-sm d-block small text-truncate">Server on low space&lt;/span>
                       &lt;small class="text-body-tertiary">Just now&lt;/small>
                   &lt;/div>
               &lt;/div>
           &lt;/a>
   
       &lt;/div>
   &lt;/div>
   &lt;!--/end:dropdown-XS-->
</code>
</pre>
                    </div>
                    <!--END//////////COPY-CLIPBAORD-->
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
