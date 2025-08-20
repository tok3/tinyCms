<x-page-layout :pageinclucert="$pageinclucert">
    <!--
    @section('add-head')
        <link rel="stylesheet" href="{{url('js/repeating-countdown-timer/css/style.css')}}">

    @endsection
    -->



    <section class="position-relative d-flex justify-content-center h-100">
        <div class="bg-gradient-primary _bg-dark-subtle d-none d-md-flex position-fixed end-0 top-0 w-md-50 w-lg-60 h-100">
            <!--Divider shape-->
            <svg class="position-absolute start-0 top-0 h-100 z-1" style="color: var(--bs-body-bg);" width="80" height="1096" preserveAspectRatio="none" viewBox="0 0 58 1096" fill="none"
                 xmlns="http://www.w3.org/2000/svg">
                <path opacity="0.24" fill-rule="evenodd" clip-rule="evenodd"
                      d="M58 1096L53.2727 1034.97C48.3636 973.947 38.7273 852.719 39.8182 730.667C41.0909 608.614 53.2727 487.386 52 365.333C50.7273 243.281 36.3636 122.053 29.0909 61.0263L21.8182 2.02656e-06H-1.72853e-06L-1.72853e-06 61.0263C-1.72853e-06 122.053 -1.72853e-06 243.281 -1.72853e-06 365.333C-1.72853e-06 487.386 -1.72853e-06 608.614 -1.72853e-06 730.667C-1.72853e-06 852.719 -1.72853e-06 973.947 -1.72853e-06 1034.97L-1.72853e-06 1096H58Z"
                      fill="currentColor"></path>

                <path clip-rule="evenodd"
                      d="M37 1096L33.9843 1034.97C30.8527 973.947 24.7053 852.719 25.4013 730.667C26.2132 608.614 33.9843 487.386 33.1724 365.333C32.3605 243.281 23.1975 122.053 18.558 61.0263L13.9185 2.02656e-06H1.11014e-06L1.11014e-06 61.0263C1.11014e-06 122.053 1.11014e-06 243.281 1.11014e-06 365.333C1.11014e-06 487.386 1.11014e-06 608.614 1.11014e-06 730.667C1.11014e-06 852.719 1.11014e-06 973.947 1.11014e-06 1034.97L1.11014e-06 1096H37Z"
                      fill="currentColor"></path>
            </svg>

            <!--Image-->

            <img src="{{url('assets/img/backgrounds/inclusion-7304412_1280.png')}}" alt="" class="bg-image">

        </div>
        <div class="container z-2 position-relative">
            <div class="row align-items-center vh-100">
                <div class="col-lg-4 pt-3 pb-4 pb-lg-5 pt-lg-5 me-auto col-md-6 z-2">
                    <div>
                        <!--:Logo: TODO Link auf incluCert-->
                        <a class="navbar-brand" style="float: right;" href="{{url('/')}}">
                            <img src="{{url('assets/img/incluCertPdfBadge.png')}}" alt="logo incluCert hell" class="width-10x navbar-brand-light mb-5">
                            <img src="{{url('assets/img/incluCertPdfBadge-white.png')}}" alt="logo incluCert dark mode" class="width-10x navbar-brand-dark mb-5">
                        </a>
                        <h1>PDF Pr&uuml;fung</h1>




    <form action="{{ route('inklucert.check') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <fieldset>
            <legend>Dokument verifizieren</legend>
                                    <p>
                            <!--<label for="docupload">Ihr Dokument verifizieren:</label>-->
                                <ul id="docupload">
                                    <!--<li>Unten auf <i>PDF hochladen</i> klicken</li>-->
                                    <li>Auf <i>Datei ausw&auml;hlen</i> klicken</li>
                                    <li>Dokument ausw&auml;hlen und <i>Abschicken</i> klicken</li>
                                </ul>
                         <!--   <label for="docid">Dokument-ID:</label>
                                <ul id="docid">
                                    <li>SHA256 - Hash Ihres Dokuments erstellen</li>
                                    <li>Unten auf <i>Dokument-ID</i> klicken</li>
                                    <li><i>Dokument-ID</i> Ihres PDFs eingeben</li>
                                    <li>Auf <i>Abschicken</i> klicken</li>
                                    <li>Den angezeigten Hash mit dem selbst erstellten vergleichen</li>
                                    <li>Bei &Uuml;bereinstimmung ist das Dokument seit Erstellung unver&auml;ndert und g&uuml;ltig</li>
                                </ul>
                            -->
                        </p>



                    <!--PDF hochladen-->


            <div id="file_input" style="display: block;">
                <input type="hidden" checked=checked name="input_type" value="file" checked onclick="toggleInput('file')">
                <label for="file_input_field" style="visibility: hidden;">Upload</label>
                <input type="file" id="file_input_field" name="file" class="btn btn-primary">
            </div>
            <!--<div class="mt-3">
                <label>
                    <input type="radio"  name="input_type" value="text" onclick="toggleInput('text')">
                    Dokument-ID&nbsp;
                </label>
            </div>
            <div id="text_input" style="display: none;" class="mt-2">
                <label for="text_input_field">ID</label>
                <input type="text" id="text_input_field" name="text_input"></input>
            </div>
        -->
        <button class="mt-4 btn btn-primary" type="submit">Abschicken</button>


                @if (session('success'))

                    <div id="result" class="alert alert-success mt-3" role="alert">
                        <h5>Erfolgreich:</h5>
                        <div>{!! session('success') !!}</div>
                    </div>
                @endif
                @if ($errors->any())

                    <div id="result" class="alert alert-danger mt-3" role="alert">
                        <h5>Fehler:</h5>
                        @foreach ($errors->all() as $error)
                            <div>{!! $error !!}</div>
                        @endforeach
                        <br>
                        <!--<strong>Bei Fragen und Problemen können Sie sich einfach mit uns in Verbindung setzen!</strong>-->
                    </div>
                @endif
        </fieldset>
    </form>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            //document.title = "IncluCert PDF";
        });
        function toggleInput(type) {
            document.getElementById('text_input').style.display = type === 'text' ? 'block' : 'none';
            document.getElementById('file_input').style.display = type === 'file' ? 'block' : 'none';
        }
    </script>

                    </div>

                </div>
            </div>
        </div>
    </section>


    @push('scripts')

        <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js?v1.1.9"></script>
        <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js?v1.1.9"></script>
        <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/localization/messages_de.js"></script>
        <script src="{{ URL::asset('js/jquery-smartwizard/dist/js/jquery.smartWizard.min.js') }}"></script>


    @endpush
</x-page-layout>
