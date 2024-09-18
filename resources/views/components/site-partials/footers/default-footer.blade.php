<footer id="footer" class="bg-body footer position-relative" data-bs-theme="dark">
    <div class="container position-relative z-1">
        <!-- top row -->
        <div class="border-bottom">
            <div class="row py-5">
                <div class="col-sm-5 col-md-4 mb-sm-0 text-sm-end">
                    <div class="dropup d-table">


                        <img src="{{ URL::asset('assets/img/IHK-AB-1.png') }}"  alt="ihk-aschaffenburg" >



                    </div>

                </div>
                <div class="col-sm-7 col-md-8 small ">
                    <span class="d-block lh-sm text-white" style="text-align: left;">
                        <div class="h6">Die Dun&Bradstreet D-U-N-S® Nummer des Unternehmens lautet: 341995818</div>
D-U-N-S ist die Abkürzung für Data Universal Numbering System, ein Zahlensystem zur eindeutigen Identifikation von Unternehmen, Unternehmensbereichen und öffentlichen Einrichtungen. Der neunstellige D-U-N-S-Zahlencode wird seit 1962 von Dun & Bradstreet herausgegeben und dient als Identifikationsnummer für jedes in der Datenbank von D&B gespeicherte Unternehmen.<br>
Die D-U-N-S Nummer wird von der Europäischen Kommission, den Vereinten Nationen und der US-amerikanischen Regierung verwendet.
                    </span>
                </div>
            </div>
        </div>

        <!-- ende top row -->

        <div class="row grid-separator align-items-stretch">
            <!--Footer col-->
            <div class="col-md-6 col-lg-3 pe-md-6 py-lg-7 py-5">
                <div class="d-flex flex-column h-100">
                    <div class="h6 mb-4 text-white-50">
                        Mehr Infos per Email erhalten ?
                    </div>
                    <p class="mb-4 small text-white-50">Tragen Sie sich einfach in unsere Infomail-Liste ein.
                    </p>

                    <div class="d-grid">
                        <a href="{{url('subscribe/camindu-gmbh')}}" class="btn btn-primary" type="submit">
                            Infomail erhalten ...
                        </a>
                    </div>

                    <x-site-partials.social-media-buttons/>
                    {{--<x-partials.color-mode/>--}}

                </div>

            </div>
            <!--Footer col-->
            <div class="col-md-4 col-lg-3 ps-md-6 py-lg-7 py-5">
                <div class="h6 mb-4 text-white-50">Mehr</div>
                <ul class="nav flex-column">
                    {!! $footerNavigationItems !!}
                </ul>
            </div>
            <!--Footer col-->
            <div class="col-md-12 col-lg-6 ps-md-6 py-lg-7 py-5">
                <div class="d-flex flex-column flex-sm-row">
                    <div class="mb-4 flex-grow-1 mb-sm-0 pe-sm-3">
                        <div>
                            <div class="h6 mb-4 text-white-50">Geschäftsstelle</div>
                            <p class="mb-2">
                                <strong class="small text-white">camindu GmbH
                                </strong>
                            </p>
                            <p class="mb-3 text-white">
                                Behringstr. 13
                                <br> 63814 Mainaschaff

                            </p>
                        </div>
                    </div>
                    <div class="ps-sm-3 flex-grow-1">
                        <div class="h6 mb-4 text-white-50">Erreichbarkeit</div>
                        <strong class="d-block text-white-50 small mb-2">Fon:</strong>
                        <a href="tel:+4960211307128" class="fw-semibold link-underline link-light">06021-130 712-8</a>
                        <br><br>
                        <strong class="d-block text-white-50 small mb-2">Email:</strong>
                        <a href="{{ URL::asset('mailto:info@aktion-barrierefrei.de') }}"
                           class="fw-semibold link-underline link-light">info@aktion-barrierefrei.de</a>


                    </div>
                </div>
            </div>
        </div>

        {{--  <div class="border-top">
              <div class="row py-5">
                  <div class="col-sm-7 col-md-6 mb-3 mb-sm-0">
                      <div class="dropup d-table">
                          <a href="{{ URL::asset('#') }}" data-bs-toggle="dropdown" role="button" aria-expanded="false"
                              class="dropdown-toggle link-light">
                              United States (English)
                          </a>

                          <!--Dropdown lang menu-->
                          <div class="dropdown-menu mb-3 dropdown-menu-lg-start">
                              <a href="{{ URL::asset('#!') }}" class="d-flex align-items-center dropdown-item active">
                                  <img src="{{ URL::asset('assets/img/country/us.svg') }}" class="width-2x me-2" alt="">
                                  United States (English)
                              </a>
                              <a href="{{ URL::asset('#!') }}" class="d-flex align-items-center dropdown-item">
                                  <img src="{{ URL::asset('assets/img/country/es.svg') }}" class="width-2x me-2" alt="">
                                  América Latina (Español)
                              </a>
                              <a href="{{ URL::asset('#!') }}" class="d-flex align-items-center dropdown-item">
                                  <img src="{{ URL::asset('assets/img/country/gb.svg') }}" class="width-2x me-2" alt="">
                                  United Kingdom (English)
                              </a>
                              <a href="{{ URL::asset('#!') }}" class="d-flex align-items-center dropdown-item">
                                  <img src="{{ URL::asset('assets/img/country/fr.svg') }}" class="width-2x me-2" alt="">
                                  France (Français)
                              </a>
                              <a href="{{ URL::asset('#!') }}" class="d-flex align-items-center dropdown-item">
                                  <img src="{{ URL::asset('assets/img/country/pt.svg') }}" class="width-2x me-2" alt="">
                                  Italia (Italiano)
                              </a>
                          </div>
                      </div>
                  </div>
                  <div class="col-sm-5 col-md-6 small text-sm-end">
                      <span class="d-block lh-sm small text-white-50">&copy; Copyright
                          <script>
                              document.write(new Date().getFullYear())

                          </script>. Assan
                      </span>
                  </div>
              </div>
          </div>--}}
    </div>
    <!--container-->
</footer>
<!--end:Footer-->
