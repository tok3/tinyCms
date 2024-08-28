<x-filament-widgets::widget>
    <x-filament::section>


        <style>

            #qrTable {
                /*width: 100%;*/
            }

            #qrTable td {

                   padding:0.5em;
                     }
            /*
            #qrTable tr td:nth-child(2) {

                   display: flex;
                   justify-content: flex-end;
                   padding-right: 5em;
                   border:1px dashed red;
            }
            */

            blockquote {
                border: 1px solid black !important;
            }
        </style>

        {{-- <h2 class="grid flex-1 text-base font-semibold leading-6 text-gray-950 dark:text-white">
             Ihr Code Registrierungscode
         </h2>--}}


        <table id="qrTable">
            @foreach($promos as $key => $promo)

                <tr>
                    <td>
                        <a href="{{App\Filament\Resources\User\PromoContentResource::getUrl('edit',['record' => $promo->id])}}">


                        <img src="{{asset(@$promo->data['image_path'])}}" alt="Preview" style="width: 200px;">
                        </a>
                    </td>
                    <td style="width:300px">

                        <small>
                            @include('filament.dashboard.widgets._embed-img-code', ['promoType'=>$promo->type])
                        </small>
                        </div>
                    </td>
                </tr>

            @endforeach

        </table>


  <table >
      <tr>
          <td>
              <div class="relative px-3 py-3 mb-4 border rounded bg-blue-200 border-blue-300 text-fucka-100 text-danger" role="alert">
                  A simple primary alert—check it out!
              </div>
              <div class="relative px-3 py-3 mb-4 border rounded bg-gray-300 border-gray-400 text-gray-800" role="alert">
                  A simple secondary alert—check it out!
              </div>
              <div class="relative px-3 py-3 mb-4 border rounded bg-green-200 border-green-300 text-green-800" role="alert">
                  A simple success alert—check it out!
              </div>
              <div class="relative px-3 py-3 mb-4 border rounded bg-red-200 border-red-300 text-red-800" role="alert">
                  A simple danger alert—check it out!
              </div>
              <div class="relative px-3 py-3 mb-4 border rounded bg-orange-200 border-orange-300 text-orange-800" role="alert">
                  A simple warning alert—check it out!
              </div>
              <div class="relative px-3 py-3 mb-4 border rounded bg-teal-200 border-teal-300 text-teal-800" role="alert">
                  A simple info alert—check it out!
              </div>
              <div class="relative px-3 py-3 mb-4 border rounded bg-white text-gray-600" role="alert">
                  A simple light alert—check it out!
              </div>
              <div class="relative px-3 py-3 mb-4 border rounded bg-gray-400 border-gray-500 text-gray-900" role="alert">
                  A simple dark alert—check it out!
              </div>


              <div class="alert alert-primary text-2xl text-pink-400" role="alert">
                  A simple primary alert—check it out!
              </div>
              <div class="alert alert-secondary" role="alert">
                  A simple secondary alert—check it out!
              </div>
              <div class="alert alert-success" role="alert">
                  A simple success alert—check it out!
              </div>
              <div class="alert alert-danger" role="alert">
                  A simple danger alert—check it out!
              </div>
              <div class="alert alert-warning" role="alert">
                  A simple warning alert—check it out!
              </div>
              <div class="alert alert-info" role="alert">
                  A simple info alert—check it out!
              </div>
              <div class="alert alert-light" role="alert">
                  A simple light alert—check it out!
              </div>
              <div class="alert alert-dark" role="alert">
                  A simple dark alert—check it out!
              </div>

              <code class="block whitespace-pre overflow-x-scroll">
                  {!! $embedCode !!}


              </code>
              <div>
                  <a href="/download-pdf" target="_blank">PDF herunterladen</a>
              </div>
          </td>
          <td>
          </td>
      </tr>
  </table>


        {{--
                  <table id="qrTable">
                      <tr>
                          <td>
                              <a href="{{url('')}}">Bearbeiten</a>
                              <img src="{!! $portrait !!}" width="200px">
                          </td>
                          <td>
                              @include('filament.dashboard.widgets._embed-img-code', ['promoType'=>'nl.subscribe.portrait_bw'])

                 <div style="background: #ffffff; width:100%;border:solid gray;border-width:.1em .1em .1em .8em;padding:.2em .6em;"><pre style="overflow-inline; margin: 0; line-height: 125%"><span
                                            style="color: #000080">&lt;a</span> <span style="color: #008080">href=</span><span style="color: #bb8844">&quot;http://localhost:8003/subscribe/94&quot;</span><span
                                            style="color: #000080">&gt;</span>
                <span style="color: #000080">&lt;img</span> <span style="color: #008080">src=</span><span style="color: #bb8844">&quot;http://localhost:8003/01HYFY4EVZA3Y43XHJC9PB6CPD&quot;</span> <span
                                            style="color: #008080">alt=</span><span style="color: #bb8844">&quot;newsletter abonnieren&quot;</span><span style="color: #000080">&gt;</span>
            <span style="color: #000080">&lt;/a&gt;</span>--}}{{--
                              </pre>
                              </div>
                          </td>
                      </tr>
                      <tr>
                          <td>

                              <img src="{!! $postcard !!}" width="200px">

                          </td>
                          <td>
                              @include('filament.dashboard.widgets._embed-img-code', ['promoType'=>'nl.subscribe.pc_landscape'])

                          </td>
                      </tr>

                      <tr>
                          <td>
                              <img src="{!! $code !!}" width="200px">
                          </td>
                          <td>
                              @include('filament.dashboard.widgets._embed-img-code', ['promoType'=>'nl.subscribe.code'])
                          </td>
                      </tr>
                      <tr>
                          <td>
                              <img src="{!! $pdf !!}" width="200px">
                          </td>
                          <td>
                             @include('filament.dashboard.widgets._embed-img-code', ['promoType'=>'nl.subscribe.pdf'])
                          </td>
                      </tr>

                  </table>
          --}}


    </x-filament::section>
</x-filament-widgets::widget>
