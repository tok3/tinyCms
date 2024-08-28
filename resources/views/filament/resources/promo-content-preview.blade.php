<!-- resources/views/filament/resources/promo-content-preview.blade.php -->
@if ($type === 'nl.subscribe.pc_landscape' || $type === 'nl.subscribe.pc_portrait' || $type === 'nl.subscribe.portrait_bw')
    <img src="{{ asset($image_path).'?'. time() }}" alt="Preview" style="max-width: 100%;">

    <x-download-btn path="{{ url($image_path) }}" btnText="Download Image"/>


@elseif ($type === 'nl.subscribe.pdf')
    <img src="{{ asset($image_path).'?'. time() }}" alt="Preview" style="width: 200px;">

    <x-download-btn path="{{ url($image_path) }}" btnText="Download Image"/>
    @php
        $imagePath = $image_path ?? null;
        if ($imagePath) {
            $fileInfo = pathinfo($imagePath);
            $pdfPath = $fileInfo['dirname'] . '/' . $fileInfo['filename'] . '.pdf';
        }
    @endphp
    @if($image_path)


        <x-download-btn path="{{ url($pdfPath) }}" btnText="&nbsp;Download&nbsp;PDF"/>


    @endif
@else
    <p>No preview available for this type.</p>
@endif


@include('filament.dashboard.widgets._embed-img-code', ['promoType'=>$type,'company'=>$company])


