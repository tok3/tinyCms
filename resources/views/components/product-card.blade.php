@props(['product', 'paymentInterval'])

@php
    $logoMapFeature = [
        'image-alt-tags' => ['file' => 'altstar'],
        'widget-support' => ['file' => '01-fixstern-logo'],
        'leichte-sprache' => ['file' => 'leichte-sprache-audio-ai'],
        'eztext' => ['file' => 'leichte-sprache'],
        'ezspeak' => ['file' => 'leichte-sprache'],
        'screen-reader' => ['file' => 'screen-reader'],
        'scan-daily' => ['file' => '02-firmament-logo'],
        'scan-weekly' => ['file' => '02-firmament-logo'],
        'inclu-cert' => ['file' => 'inclu-cert'],
        'max-url-1' => ['file' => 'url-limit-1'],
        'max-url-10' => ['file' => '03-site-scan-10'],
        'max-url-100' => ['file' => '03-site-scan-100'],
        'max-url-500' => ['file' => '03-site-scan-500'],
        'max-url-1000' => ['file' => '03-site-scan-1000'],
        'max-url-1500' => ['file' => '03-site-scan-1500'],
        'max-url-10k' => ['file' => '03-site-scan-10k'],
        'max-url-15k' => ['file' => '03-site-scan-15k'],
        'max-url-100k' => ['file' => '03-site-scan-100k'],
        'barrierefreiheitserklaerung' => ['file' => 'be'],
    ];

    // 👉 WICHTIG: jetzt nach FEATURE slug gemappt
    $productLogoMap = [
        'widget-support' => [
            'logo' => 'fixstern-logo',
            'style' => ['height:50px !important','margin-bottom:15px','margin-left:-10px','margin-top:-5px'],
            'exclude' => ['widget-support'],
        ],
        'image-alt-tags' => [
            'logo' => 'altstar-solo',
            'style' => ['height:100px !important','margin-bottom:-25px'],
            'exclude' => ['image-alt-tags'],
        ],
        'barrierefreiheitserklaerung' => [
            'logo' => 'be',
            'style' => ['height:50px !important','margin-bottom:5px'],
            'exclude' => ['barrierefreiheitserklaerung'],
        ],
    ];

    $logoPath = public_path('assets/img/features');

    $productFeatureSlugs = collect($product->features ?? [])
        ->map(fn($f) => strtolower(trim($f->slug)))
        ->unique()
        ->toArray();

    $mainLogo = null;
    $logoStyle = null;
    $excludeFeatures = [];

    if ($product->is_package ?? false) {
        $mainLogo = 'kombi-paket';
    } else {
        foreach ($productLogoMap as $featureSlug => $config) {

            if (in_array($featureSlug, $productFeatureSlugs)) {

                $mainLogo = $config['logo'];
                $logoStyle = $config['style'] ?? null;
                $excludeFeatures = $config['exclude'] ?? [];

                break;
            }
        }
    }

    $orderedLogos = [];

    foreach ($logoMapFeature as $slug => $config) {

        if (!in_array($slug, $productFeatureSlugs)) continue;

        if (in_array($slug, $excludeFeatures)) continue;

        $file = $config['file'];
        $fullPath = $logoPath . '/' . $file . '.svg';

        if (!file_exists($fullPath)) continue;
        if ($file === $mainLogo) continue;

        $orderedLogos[] = $file;
    }

    $company = \App\Helpers\CompanyHelper::currentCompany();

    $trialHint = $product->trial_period_days > 0
        ? $product->trial_period_days . ' Tage kostenlos testen'
        : null;
@endphp
<div class="p-5 border border-gray-200 rounded-xl bg-white shadow-sm hover:shadow-lg transition" >

    {{-- HEADER --}}
    @if ($product->is_package ?? false)
        <div class="flex items-center gap-4 mb-3">

            <img src="{{ asset('assets/img/produkte/kombi-paket.svg') }}" class="h-12">

            <div>
                <div class="text-xs font-semibold text-gray-500 uppercase">
                    Kombi-Paket
                </div>
                <div class="text-2xl font-bold">
                    {{ $product->name }}
                </div>
            </div>
        </div>
    @else
        @if($mainLogo)

            @php
                $styleAttr = !empty($logoStyle)
                    ? 'style="'.implode(';', $logoStyle).'"'
                    : '';
            @endphp

            <img src="{{ asset('assets/img/produkte/' . $mainLogo . '.svg') }}"
                 {!! $styleAttr !!}
                 class="mb-2">

        @endif

        <h3 class="text-xl font-bold">{{ $product->name }}</h3>
    @endif

    {{-- FEATURE LOGOS --}}
    @if(count($orderedLogos))
        <div class="flex flex-wrap gap-2 mt-5 mb-5">
            @foreach($orderedLogos as $file)
                <img src="{{ asset('assets/img/features/' . $file . '.svg') }}"
                     style="height:20px;"
                     class="opacity-90">
            @endforeach
        </div>
    @endif

    {{-- DESCRIPTION --}}
    <div class="product-description-text mt-3">
        {!! $product->description !!}
    </div>



    {{-- DETAILS LINK + MODAL --}}
    @if(!empty($product->info))
        <div class="mt-3">
            <x-filament::modal width="xl">
                <x-slot name="heading">
                    {{ $product->name }} – Details
                </x-slot>

                <x-slot name="description">
                    {!! $product->info !!}
                </x-slot>

                <x-slot name="trigger">
                    <span class="text-blue-600 text-sm cursor-pointer hover:underline">
                        Details anzeigen
                    </span>
                </x-slot>
            </x-filament::modal>
        </div>
    @endif

    {{-- STATUS --}}
    @if ($company && $company->contracts()->forProduct($product->id)->active()->exists())
        <span class="inline-block mt-4 py-2 px-4 bg-green-600 text-white rounded">
            Bereits aktiv
        </span>
    @else

        <form action="{{ url('upgrade/' . $product->id) }}" method="GET" class="mt-4">

            {{-- PRICES --}}
            @foreach ($product->prices as $price)
                <label class="flex justify-between border rounded-lg px-3 py-2 mb-2 cursor-pointer">
                    <div class="flex items-center">
                        <input type="radio"
                               name="interval"
                               value="{{ $price->interval }}"
                               {{ $loop->first ? 'checked' : '' }}
                               class="mr-2">

                        {{ $paymentInterval[$price->interval] }}
                    </div>
                    <div>

                    <strong>
                        {{ number_format($price->price / 100, 2, ',', '.') }} €
                    </strong>
                        <muted style="font-size:0.6em;">(inkl. MwSt.)
                        </muted>
                    </div>
                </label>
            @endforeach

            {{-- TRIAL --}}
            @if(!empty($trialHint))
                <div class="mt-2 text-xs text-green-600 font-medium">
                    {{ $trialHint }}
                </div>
            @endif

            {{-- CTA --}}
            <button class="w-full mt-3 py-2 bg-blue-600 text-white rounded-lg">
                Jetzt starten
            </button>

        </form>

    @endif

</div>
