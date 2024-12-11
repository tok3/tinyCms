<x-dynamic-component
    :component="$getFieldWrapperView()"
    :field="$field"
>
    <div x-data="{ state: $wire.$entangle('{{ $getStatePath() }}') }">
        <!-- Interact with the `state` property in Alpine.js -->
    </div>

    @php
        $all = json_decode($getRecord()->evaluation, ASSOCIATIVE, 2147483647);

        $domainurl = \App\Models\Domainurl::find($getRecord()->domainurl_id);
        $url = $domainurl->url;
        $passed = $all->{$url}->metadata->passed;
        $warning = $all->{$url}->metadata->warning;
        $failed = $all->{$url}->metadata->failed;
        $inapplicable = $all->{$url}->metadata->inapplicable;

        $modules = $all->{$url}->modules;


    @endphp


    <div>
        <h1>Evaluations-Report</h1>
        @foreach($modules as $modulekey => $module)
             <h2>{{ strtoupper($modulekey) }}</h2>
             <div>
                <span class="text-green-700">Passed: {{ $module->metadata->passed }}</span>
                <span class="text-orange-700">Warnings: {{ $module->metadata->warning }}</span>
                <span class="text-red-700">Failed: {{ $module->metadata->failed }}</span>
                <span class="text-gray-700">Inapplicable: {{ $module->metadata->inapplicable }}</span>
            </div>
            <h3>Assertions</h3>
            @foreach($module->assertions as $assertionkey => $assertion)
                <h4>{{ $assertion->name }}</h4>
                <p><strong>Beschreibung:</strong>{{ $assertion->description }}<p>
            @endforeach
        @endforeach
    </div>
</x-dynamic-component>
