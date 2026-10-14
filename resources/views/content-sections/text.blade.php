<div @if(isset($data['container_id']))id="{{$data['container_id']}}" @endif @if($prevElem == "")style="margin-top:120px !important;" @endif

class="container mb-50">
    <div class="row"
         style="@if(isset($data['margin_bottom']) && $data['margin_bottom'] != 0)margin-bottom:{{$data['margin_bottom']}}!important;@endif @if(isset($data['margin_top']) && $data['margin_top'] != "")margin-top:{{$data['margin_top']}} !important;@endif">
        <div class="col-xl-9 mx-auto">
            @php
                $allowedHeadingTags = ['h1', 'h2', 'h3', 'h4', 'h5', 'h6'];
                $levelHeadingTag = in_array($data['levelHeading'] ?? null, $allowedHeadingTags, true)
                    ? $data['levelHeading']
                    : 'h1';
                $levelHeading2Tag = in_array($data['levelHeading2'] ?? null, $allowedHeadingTags, true)
                    ? $data['levelHeading2']
                    : 'h2';
            @endphp
            <{{ $levelHeadingTag }} class="mb-4">{!! $data['heading'] !!}</{{ $levelHeadingTag }}>

            @if(!empty($data['heading2']))
                <{{ $levelHeading2Tag }} class="mb-4">{!! $data['heading2'] !!}</{{ $levelHeading2Tag }}>
            @endif

            <p class="lead mb-4 dropcap">
                {!! $data['teaser'] !!}
            </p>

            <p class="mb-5">
                {!! $data['text'] !!}
            </p>

        </div>
    </div>
</div>
