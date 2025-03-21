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
                                                <li class="breadcrumb-item active" aria-current="page">Map</li>
                                            </ol>
                                        </div>
                                    </nav>
                                    <h1 class="mb-0 display-4">
                                        Mapbox Map
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
                        <div class="col-lg-10 mx-auto">
                            <div class="d-flex align-items-center justify-content-center mb-4">
                                <h6 class="mb-0 me-2 me-lg-4">Demo</h6>
                                <span class="border-top d-block flex-grow-1"></span>
                            </div>

                            <!--Map start-->
                            <div id="map" class="w-100 mb-5 rounded-3" style="height: 350px"></div>
                            <!--/.Map End-->

                            <!--///////////CODE SNIPPET FOR LINK STYLES-->
                            <nav class="nav nav-tabs mb-3">
                                <a href="{{ URL::asset('#codeMapHtml') }}" data-bs-toggle="tab" class="nav-link active">HTML</a>
                                <a href="{{ URL::asset('#codeMapCss') }}" data-bs-toggle="tab" class="nav-link">Css</a>
                                <a href="{{ URL::asset('#codeMapJs') }}" data-bs-toggle="tab" class="nav-link">Js</a>
                            </nav>
                            <div class="tab-content">
                                <div class="tab-pane show fade active" id="codeMapHtml">
                                    <div class="position-relative">
                                        <!--Copy clipboard button-->
                                        <button
                                            class="btn btn-sm position-absolute end-0 top-0 z-1 mt-2 me-2 btn-primary copy-link"
                                            data-clipboard-target="#copyMapHtml1" data-clipboard-action="copy" id="copyMapHtml1-1">Copy code</button>
        <pre id="copyMapHtml1" class="language-markup bg-secondary text-white-50 mt-0" data-lang="html">
<code>
&lt;div id="map" class="w-100 mb-5 rounded-3" style="height: 350px">&lt;/div> 
</code></pre>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="codeMapCss">
                                    <div class="position-relative">
                                        <!--Copy clipboard button-->
                                        <button
                                            class="btn btn-sm position-absolute end-0 top-0 z-1 mt-2 me-2 btn-primary copy-link"
                                            data-clipboard-target="#copyMapCss2" data-clipboard-action="copy" id="copyMapCss2-2">Copy code</button>
<pre id="copyMapCss2" class="language-markup bg-secondary text-white-50 mt-0" data-lang="html">
<code>
&lt;!--Mapbox-->
&lt;link href='https://api.mapbox.com/mapbox-gl-js/v2.1.1/mapbox-gl.css' rel='stylesheet'/>
</code></pre>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="codeMapJs">
                                    <div class="position-relative vh-75" style="overflow-y: auto;">
                                        <!--Copy clipboard button-->
                                        <button
                                            class="btn btn-sm position-absolute end-0 top-0 z-1 mt-2 me-2 btn-primary copy-link"
                                            data-clipboard-target="#copyMapJs3" data-clipboard-action="copy" id="copyMapJs3-3">Copy code</button>
<pre id="copyMapJs3" class="language-markup bg-secondary text-white-50 mt-0" data-lang="html">
<code>
    &lt;!--maps js-->
    &lt;script src='https://api.mapbox.com/mapbox-gl-js/v2.1.1/mapbox-gl.js'>&lt;/script>
    &lt;script>
        mapboxgl.accessToken = 'pk.eyJ1IjoiZGVzaWdubXlsaWZlIiwiYSI6ImNqeHlkMzljejAwaHAzbXFtaXphYWI3NmYifQ.IRPz2gseBSE-DQMzurY4ZA';
        var officeLocation = [75.788350, 26.958520];
        var map = new mapboxgl.Map({
            container: 'map',
            style: 'mapbox://styles/mapbox/light-v10',
            center: officeLocation,
            zoom: 9
        });
        // create the popup
        var popup = new mapboxgl.Popup({ offset: 18 }).setHTML(
            '&lt;h6 class="text-primary mb-0 fw-normal">Our office&lt;/h6>&lt;small class="text-body-secondary">CreativeDM, SE-03, Vidhyadhar Nagar, Jaipur, 302012&lt;/small>'
        );
        // create DOM element for the marker
        var el = document.createElement('div');
        el.id = 'marker';
        // disable map zoom when using scroll
        map.scrollZoom.disable();
        // create the marker
        new mapboxgl.Marker(el)
            .setLngLat(officeLocation)
            .setPopup(popup) // sets a popup on this marker
            .addTo(map);
    &lt;/script>
</code></pre>
                                    </div>
                                </div>
                            </div>
                            <!--///////////CODE SNIPPET END-->

                            <div class="text-end border border-top-0 p-4">
                                <a target="_blank" href="{{ URL::asset('https://www.mapbox.com/') }}">Explore mapbox</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
</x-assan-layout>
