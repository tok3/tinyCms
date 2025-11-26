@php
    $paymentModality['daily'] = "pro Tag </br>bei Täglicher Abbuchung";
    $paymentModality['weekly'] = "pro Woche </br>bei Wöchentlicher Abbuchung";
    $paymentModality['annual'] = "pro Jahr </br>bei jährlicher Zahlung";
    $paymentModality['monthly'] = "pro Monat </br>bei Monatlicher Zahlung";
    $paymentModality['one_time'] = "Einmalzahlung";


    // === Mapping: slug → [file, style] ===
    $logoMap = [
        'image-alt-tags'     => ['file' => 'altstar',           'style' => ''],
        'widget-support'     => ['file' => '01-fixstern-logo',  'style' => ''],
        'leichte-sprache'    => ['file' => 'leichte-sprache-audio-ai',   'style' => ''],
        'eztext'             => ['file' => 'leichte-sprache',   'style' => ''],
        'ezspeak'            => ['file' => 'leichte-sprache',          'style' => ''],
        'screen-reader'      => ['file' => 'screen-reader',     'style' => ''],
        'scan-daily'         => ['file' => '02-firmament-logo', 'style' => ''],
        'scan-weekly'        => ['file' => '02-firmament-logo', 'style' => ''],
        'inclu-cert'        => ['file' => 'inclu-cert', 'style' => ''],
        'max-url-1'          => ['file' => 'url-limit-1',       'style' => 'height:17px;margin-top:3px;'],
        'max-url-10'         => ['file' => '03-site-scan-10',      'style' => 'height:17px;margin-top:3px;'],
        'max-url-100'        => ['file' => '03-site-scan-100',     'style' => 'height:17px;margin-top:3px;'],
        'max-url-500'        => ['file' => '03-site-scan-500',     'style' => 'height:17px;margin-top:3px;'],
        'max-url-1000'       => ['file' => '03-site-scan-1000',    'style' => 'height:17px;margin-top:3px;'],
        'max-url-1500'       => ['file' => '03-site-scan-1500',    'style' => 'height:17px;margin-top:3px;'],
        'max-url-10k'        => ['file' => '03-site-scan-10k',     'style' => 'height:17px;margin-top:3px;'],
        'max-url-15k'        => ['file' => '03-site-scan-15k',     'style' => 'height:17px;margin-top:3px;'],
        'max-url-100k'       => ['file' => '03-site-scan-100k',    'style' => 'height:17px;margin-top:3px;'],
    ];

    $logoPath = public_path('assets/img/features');
    $logoExists = [];
@endphp

<style>
    .no-hyphens { -webkit-hyphens: none; -ms-hyphens: none; hyphens: none; }

    .feature-logo-tags {
        display: flex;
        flex-wrap: wrap;
        gap: 5px;
        align-items: center;
        justify-content: left;
        margin: 8px 0 0;
        padding: 0;
    }

    .feature-logo-tag {
        display: inline-flex;
        align-items: center;
        border-radius: 3px;
        padding: 2px 5px;
        transition: all 0.2s ease;
        line-height: 1;
    }

    .feature-logo-tag:hover,
    .feature-logo-tag:focus-visible {
        transform: translateY(-1px);
    }

    .feature-logo-tag:focus-visible {
        outline: 2px solid #0d6efd;
        outline-offset: 2px;
    }

    .feature-logo-img {
        width: auto !important;
        max-width: 160px;
        object-fit: contain;
        display: block;
    }

    @media (max-width: 576px) {
        .feature-logo-tags { gap: 8px; }
        .feature-logo-tag { padding: 4px 7px; }
    }
</style>

<div class="container">
    <div class="row mb-4 mt-50 justify-content-center text-center">
        <div class="col-xl-9">
            <h2 class="mb-4">Bitte wählen Sie Ihren Plan und Ihre bevorzugte Zahlungsoption</h2>
        </div>
    </div>

    <div class="d-flex align-items-center justify-content-center mb-7 mb-lg-7">
        <div class="price-annually fs-5"><strong>Monatlich</strong></div>
        <div class="form-check form-pricing-switch form-switch mx-3">
            <input class="form-check-input me-0" type="checkbox" id="planSwitch">
            <label class="form-check-label" for="planSwitch"></label>
        </div>
        <div class="price-monthly fs-5"><strong>Jährlich</strong></div>
    </div>

    @foreach($products as $product)
        @foreach($product->prices as $price)
            @php
                $plan = $price->interval;
                $formattedPrice = number_format($price->price / 100, 2, ',', '.');
                $trialHint = $product->trial_period_days > 0 ? $product->trial_period_days . ' Tage kostenlos Testen' : '';
            @endphp

            <div class="container py-3 py-lg-3 plan" data-plan="{{ $plan }}">
                <div class="bg-body overflow-hidden shadow-lg px-4 py-2 px-lg-5">
                    <div class="row align-items-center">
                        <div class="col-lg-1 col-md-1 col-12 text-center text-md-start mb-3 mb-md-0">
                            {{--<i class="h1 bi bi-shield-shaded"></i>--}}

                            <img src="{{ asset('assets/img/produkte/kombi-paket.svg') }}"
                                 alt=""
                                 class="feature-logo-img"
                                 style=""
                                 loading="lazy"
                                 aria-hidden="true">
                        </div>

                        <div class="col-lg-3 col-md-4 col-12 text-center text-md-start">
                            <h6>Kombi-Paket</h6>
                            <h3 class="mt-2 display-5" data-aos="zoom-in-up" data-aos-delay="100">
                                {{ $product->name }}
                            </h3>

                            {{-- === LOGOS: Sortiert, unique, individueller Style === --}}
                            @php
                                $productLogos = [];
                                foreach ($product->features as $feature) {
                                    $slug = strtolower(trim($feature->slug));
                                    if (!isset($logoMap[$slug])) continue;

                                    $config = $logoMap[$slug];
                                    $logoFile = $config['file'];
                                    $logoStyle = $config['style'] ?? '';

                                    if (!isset($logoExists[$logoFile])) {
                                        $logoExists[$logoFile] = file_exists("{$logoPath}/{$logoFile}.svg");
                                    }

                                    if ($logoExists[$logoFile] && !isset($productLogos[$logoFile])) {
                                        $productLogos[$logoFile] = [
                                            'file'  => $logoFile,
                                            'name'  => $feature->name,
                                            'style' => $logoStyle
                                        ];
                                    }
                                }
                                ksort($productLogos);
                            @endphp

                            <div class="feature-logo-tags">
                                @foreach($productLogos as $logo)
                                    <div class="feature-logo-tag"
                                         role="img"
                                         aria-label="{{ $logo['name'] }}"
                                         data-bs-toggle="tooltip"
                                         data-bs-placement="top"
                                         title="{{ $logo['name'] }}"
                                         tabindex="0">
                                        <img src="{{ asset('assets/img/features/' . $logo['file'] . '.svg') }}"
                                             alt=""
                                             class="feature-logo-img"
                                             style="{{ $logo['style'] ?: 'height: 21px;' }}"
                                             loading="lazy"
                                             aria-hidden="true">
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-4 col-12 d-flex align-items-center justify-content-center justify-content-md-start text-center text-md-start">
                            <p class="h6 mt-2 d-inline-flex align-items-center no-hyphens" style="line-height: 1.5;">
                                {!! $product->description !!}
                            </p>
                        </div>

                        <div class="col-lg-1 col-md-1 col-12">
                            @if($product->info)
                                <button type="button" class="btn btn-link mt--20" style="float: right;"
                                        data-bs-toggle="modal" data-bs-target="#infoModal-{{ $product->id }}"
                                        aria-label="Weitere Informationen">
                                    <i class="bi bi-info-circle h2 text-secondary"></i>
                                </button>
                            @endif
                        </div>

                        <div class="col-lg-2 col-md-2 col-12 text-center text-md-end">
                            <p class="h4 mb-0" data-aos="fade-up" data-aos-delay="150">
                                {{ $formattedPrice }} €
                            </p>
                            <sub class="mb-0 pb-sm-3 small" style="position:relative;top:-5px;">inkl. MwSt.</sub>
                            <p class="text-success mb-0 small" style="position:relative;top:-5px;">{!! $paymentModality[$plan] !!}</p>
                            <sup class="mb-0 small" style="position:relative;top:-5px;">{!! $product->lz ?? 24 !!} Monate Laufzeit</sup>
                        </div>

                        <div class="col-lg-2 col-md-12 text-center text-md-end">
                            <div data-aos="fade-left" data-aos-delay="200" class="small">
                                {{ $trialHint }}
                            </div>
                            <input type="radio" class="btn-check"
                                   id="plan-{{ $product->id }}-{{ $price->interval }}"
                                   name="product_selection"
                                   value="{{ $product->id }}:{{ $price->interval }}"
                                   x-model="form.product_selection"
                                   @change="saveProductToSession($event.target.value)">
                            <label class="btn btn-outline-primary" for="plan-{{ $product->id }}-{{ $price->interval }}">
                                Wählen
                            </label>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Info Modal -->
            <div class="modal fade" id="infoModal-{{ $product->id }}" tabindex="-1" aria-labelledby="infoModalLabel-{{ $product->id }}" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="infoModalLabel-{{ $product->id }}">{{ $product->name }} – Details</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Schließen"></button>
                        </div>
                        <div class="modal-body">{!! $product->info !!}</div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Schließen</button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @endforeach
</div>

@push('scripts')
    <script>
        function switchPlans(isAnnual) {
            document.querySelectorAll('[data-plan="monthly"]').forEach(el => el.style.display = isAnnual ? 'none' : 'block');
            document.querySelectorAll('[data-plan="annual"]').forEach(el => el.style.display = isAnnual ? 'block' : 'none');
        }

        document.addEventListener('DOMContentLoaded', () => {
            const planSwitch = document.getElementById('planSwitch');
            planSwitch.checked = true;
            switchPlans(true);

            planSwitch.addEventListener('change', () => switchPlans(planSwitch.checked));

            new bootstrap.Tooltip(document.body, { selector: '[data-bs-toggle="tooltip"]' });
        });
    </script>
@endpush
