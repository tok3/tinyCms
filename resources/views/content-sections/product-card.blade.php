@php
    $idSuffix = isset($blockIndex) ? $blockIndex : uniqid();
    $modalId1 = 'productModal1_'.$idSuffix;
    $modalId2 = 'productModal2_'.$idSuffix;
@endphp
@if($data['visible'] ?? true)
    {{-- Produktkarte anzeigen --}}

<section class="position-relative {{ $data['background_class'] ?: '' }} " >
    <div class="container position-relative" >
        <div class=" justify-content-between align-items-end">
            <div class="{{ $data['width_class'] ?: '' }}  col-md-12 mx-auto">


                {{--ab heir card--}}

                <div class="gb-card-variant2">
                    <div class="gb-card-variant2__left {{ $data['gradient_style'] ?: '' }}">
                        <img src="  {{ asset('storage/' . ($data['product_image'] ?: '' )) }}"  alt="{{$data['product_image_alt']}}" class="gb-card-variant2__icon"/>
                    </div>
                    <div class="gb-card-variant2__right">

                        <!-- Neuer Header-Bereich -->
                        <div class="gb-card-variant2__header">
                            <div class="gb-card-variant2__header-icons">
                                @foreach($data['header_icons'] ?? [] as $icon)
                                    @if(!empty($icon['icon']))
                                        <img src="{{ asset('storage/' . $icon['icon']) }}"
                                             alt="{{ $icon['alt'] ?? 'Icon' }}"
                                             style="height: {{ $icon['height'] ?? 27 }}px;"
                                             class="gb-card-variant2__icon-small">
                                    @endif
                                @endforeach
                            </div>
                            <h2 class="gb-card-variant2__title">{{$data['heading']}}</h2>

                        </div>
                        @if(isset($data['heading_sub']))

                            <h3 class="gb-card-variant2__subtitle">{{$data['heading_sub']}}</h3>
                        @endif
                        <p class="gb-card-variant2__text">
                            {!! $data['text'] !!}
                        </p>
                        @if(isset($data['text_box']) && ($data['infobox_enabled'] ?? true))

                            <div class="gb-card gb-card--legal mt--10">
                                @if(isset($data['heading_box']))
                                    <h2 class="gb-card__title">{{$data['heading_box']}}</h2>
                                @endif
                                <div class="gb-card__body">
                                    <span class="gb-card-variant2__text">

                                        {!! $data['text_box'] !!}
                                    </span>
                                </div>
                                <div class="gb-card__sidebar">
                                    <span class="gb-card__block gb-card__block--top"></span>
                                    <span class="gb-card__block gb-card__block--bottom"></span>
                                </div>
                            </div>
                        @endif
                        @if(!empty($data['btn_1_txt']) || !empty($data['btn_2_txt']))
                            <div class="gb-card-variant2__footer">

                                {{-- Button 1 --}}
                                @if(!empty($data['btn_1_txt']))
                                    <div class="gradient-button-wrapper">
                                        @if(($data['btn_1_action'] ?? 'link') === 'email_modal')
                                            <button type="button" class="btn btn-white w-100"
                                                    data-bs-toggle="modal" data-bs-target="#{{ $modalId1 }}">
                                                {{ $data['btn_1_txt'] }}
                                            </button>
                                        @else
                                            <a class="btn btn-white w-100" href="{{ @$data['btn_1_target'] ?: '#' }}">
                                                {{ $data['btn_1_txt'] }}
                                            </a>
                                        @endif
                                    </div>
                                @endif

                                {{-- Button 2 --}}
                                @if(!empty($data['btn_2_txt']))
                                    <div class="gradient-button-wrapper">
                                        @if(($data['btn_2_action'] ?? 'link') === 'email_modal')
                                            <button type="button" class="btn btn-white w-100"
                                                    data-bs-toggle="modal" data-bs-target="#{{ $modalId2 }}">
                                                {{ $data['btn_2_txt'] }}
                                            </button>
                                        @else
                                            <a class="btn btn-white w-100" href="{{ @$data['btn_2_target'] ?: '#' }}">
                                                {{ $data['btn_2_txt'] }}
                                            </a>
                                        @endif
                                    </div>
                                @endif

                            </div>
                        @endif
                    </div>
                </div>


                {{--card end --}}
            </div>
        </div>
    </div>


    {{-- Modal für Button 1 --}}
    @if(($data['btn_1_action'] ?? 'link') === 'email_modal')
        <div class="modal fade" id="{{ $modalId1 }}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <form class="modal-content" method="post" action="{{ route('productcard.contact') }}">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title">{{ $data['btn_1_subject'] ?? 'Kontaktanfrage' }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Schließen"></button>
                    </div>
                    <div class="modal-body">
                        @if(!empty($data['btn_1_formtext']))
                            <p class="small text mb-3">{!! nl2br(e($data['btn_1_formtext'])) !!}</p>
                        @endif

                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input name="name" type="text" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Firma</label>
                            <input name="company" type="text" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">E-Mail oder Telefon</label>
                            <input name="contact" type="text" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Nachricht (optional)</label>
                            <textarea name="message" class="form-control" rows="3"></textarea>
                        </div>

                        {{-- Kontext / Hidden --}}
                        <input type="hidden" name="mail_to" value="{{ $data['btn_1_mail_to'] ?? '' }}">
                        <input type="hidden" name="subject" value="{{ $data['btn_1_subject'] ?? 'Kontaktanfrage' }}">
                        <input type="hidden" name="page_slug" value="{{ $page->slug ?? ($pageSlug ?? '') }}">
                        <input type="hidden" name="block_index" value="{{ $blockIndex ?? '' }}">
                        <input type="text" name="website" class="d-none" tabindex="-1" autocomplete="off"> {{-- Honeypot --}}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Abbrechen</button>
                        <button type="submit" class="btn btn-primary">Anfrage senden</button>
                    </div>
                </form>
            </div>
        </div>
    @endif

    {{-- Modal für Button 2 --}}
    @if(($data['btn_2_action'] ?? 'link') === 'email_modal')
        <div class="modal fade" id="{{ $modalId2 }}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <form class="modal-content" method="post" action="{{ route('productcard.contact') }}">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title">{{ $data['btn_2_subject'] ?? 'Kontaktanfrage' }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Schließen"></button>
                    </div>
                    <div class="modal-body">
                        @if(!empty($data['btn_2_formtext']))
                            <p class="small text-muted mb-3">{!! nl2br(e($data['btn_2_formtext'])) !!}</p>
                        @endif

                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input name="name" type="text" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Firma</label>
                            <input name="company" type="text" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">E-Mail oder Telefon</label>
                            <input name="contact" type="text" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Nachricht (optional)</label>
                            <textarea name="message" class="form-control" rows="3"></textarea>
                        </div>

                        {{-- Kontext / Hidden --}}
                        <input type="hidden" name="mail_to" value="{{ $data['btn_2_mail_to'] ?? '' }}">
                        <input type="hidden" name="subject" value="{{ $data['btn_2_subject'] ?? 'Kontaktanfrage' }}">
                        <input type="hidden" name="page_slug" value="{{ $page->slug ?? ($pageSlug ?? '') }}">
                        <input type="hidden" name="block_index" value="{{ $blockIndex ?? '' }}">
                        <input type="text" name="website" class="d-none" tabindex="-1" autocomplete="off"> {{-- Honeypot --}}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Abbrechen</button>
                        <button type="submit" class="btn btn-primary">Anfrage senden</button>
                    </div>
                </form>
            </div>
        </div>
    @endif
</section>
@endif
