<div id="upsell-templates" style="display:none;">


    {{-- IMAGE ALT TAGS --}}
    <div data-feature="image-alt-tags">
        @include('filament.promos.altstar-upgrade', ['tenant' => $tenant])
    </div>




    {{-- FIXSTERN --}}
    <div data-feature="widget-support">

        @include('filament.promos.fixstern-upgrade', ['tenant' => $tenant])

    </div>

    {{-- be. --}}
    <div data-feature="barrierefreiheitserklaerung">

        @include('filament.promos.a11y-declaration-upgrade',  ['tenant' => $tenant])

    </div>
{{-- incluCert --}}
    <div data-feature="inclucert">

        @include('filament.promos.inclucert-upgrade',  ['tenant' => $tenant])

    </div>

</div>
