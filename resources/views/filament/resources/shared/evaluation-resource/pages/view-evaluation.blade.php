<x-filament-panels::page>
    <h3>URL: <i>{{ $url }}</i></h3>
    <div class="columns-2">
        <div>
            <h5 class="font-bold pb-6">Overall Result</h5>
            <ul>
                <li class="text-green-500">Passed: {{ $passed }}</li>
                <li class="text-orange-500">Warning: {{ $warning }}</li>
                <li class="text-red-500">Failed: {{ $failed }}</li>
                <li class="text-gray-500">Inapplicable: {{ $inapplicable }}</li>
            </ul>
        </div>
        <div>
            <h5 class="font-bold pb-6">Modules</h5>
            <ul>
                @foreach($evaluation[$url]['modules'] as $modulekey => $module)
                    <li><a href="#{{ $modulekey }}">{{ strtoupper($modulekey) }}</a></li>
                @endforeach
            </ul>
        </div>
    </div>

    <div class="columns-1">
@foreach($evaluation[$url]['modules'] as $modulekey => $module)
    <h2 id="{{ $modulekey }}" class="text-gray-900 font-bold text-xl pb-5">{{ strtoupper($modulekey) }}</h2>

    @foreach($module['assertions'] as $assertionkey => $assertion)

        <div class="p-2 pt-4 border-4 border-t-black-500 border-b-transparent border-l-transparent border-r-transparent">
            @if($assertion['metadata']['outcome'] == 'failed')
                <div class="columns-2">
                    <div>
                        <h3 class="text-red-500">{{ $assertion['name'] }} {{ strtoupper($assertion['code']) }}</h3>
                    </div>
                    <div>
                        <h4 class="text-sm text-red-500">{{ $assertion['metadata']['failed'] }} Errors</h4>
                    </div>
                </div>
            @endif
            @if ($assertion['metadata']['outcome'] == 'warning')
            <div class="columns-2">
                <div>
                    <h3 class="text-orange-500">{{ $assertion['name'] }} {{ strtoupper($assertion['code']) }}</h3>
                </div>
                <div>
                    <h4 class="text-sm text-orange-500">{{ $assertion['metadata']['warning'] }} Warnings</h4>
                </div>
            </div>
            @endif
            @if ($assertion['metadata']['outcome'] == 'passed')
            <div class="columns-2">
                <div>
                    <h3 class="text-green-500">{{ $assertion['name'] }} {{ strtoupper($assertion['code']) }}</h3>
                </div>
                <div>
                    <h4 class="text-sm text-green-500">{{ $assertion['metadata']['passed'] }} Passed</h4>
                </div>
            </div>
            @endif
            @if ($assertion['metadata']['outcome'] == 'inapplicable')
            <div class="columns-2">
                <div>
                    <h3 class="text-gray-500">{{ $assertion['name'] }} {{ strtoupper($assertion['code']) }}</h3>
                </div>
                <div>
                    <h4 class="text-sm text-gray-500">{{ $assertion['metadata']['inapplicable'] }} Inapplicable</h4>
                </div>
            </div>
            @endif
            <p class="text-sm pt-1"><span class="font-bold">DESCRIPTION:</span>{{ $assertion['description'] }}<p>
            <p class="text-sm pt-1"><span class="font-bold">TARGET:</span>

                @php
                    $tmp = (array)$assertion['metadata']['target'];
                    //echo $tmp['element'];
                @endphp
            <p>
                <p class="text-sm pt-1"><span class="font-bold">URL:</span>

                <p>
            <p class="text-sm pt-1"><a></a><p>

        </div>
    @endforeach


@endforeach
</div>
</x-filament-panels::page>
