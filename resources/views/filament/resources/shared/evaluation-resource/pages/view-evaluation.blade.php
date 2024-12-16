<x-filament-panels::page>
    <h3>URL: <i>{{ $url }}</i></h3>
    <div class="columns-2">
        <div>
            <h5 class="font-bold pb-6">Overall Result {{ date('d.m.Y H: i', strtotime($created_at)) }}h</h5>
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
                @foreach($evaluation->{$url}->modules as $modulekey => $module)
                    <li><a class="font-sm text-blue-600 dark:text-blue-500 hover:underline" href="#{{ $modulekey }}">{{ strtoupper($modulekey) }}</a></li>
                @endforeach
            </ul>
        </div>
    </div>

    <div class="columns-1">
@foreach($evaluation->{$url}->modules as $modulekey => $module)
    <h2 id="{{ $modulekey }}" class="text-gray-900 font-bold text-xl pb-5 pt-10">{{ strtoupper($modulekey) }}</h2>

    @foreach($module->assertions as $assertionkey => $assertion)


        <div class=" pt-4 mt-6 border-4 border-t-black-500 border-b-transparent border-l-transparent border-r-transparent">
            <div style="width: 100%;">
                <div style="width: 80%; float: left;">

                    @if($assertion->metadata->failed != '0')
                        <h3 class="text-gray-500">{{ $assertion->name }} {{ strtoupper($assertion->code) }}</h3>
                    @elseif($assertion->metadata->warning != '0')
                        <h3 class="text-yellow-500">{{ $assertion->name }} {{ strtoupper($assertion->code) }}</h3>
                    @elseif($assertion->metadata->passed != '0')
                        <h3 class="text-green-500">{{ $assertion->name }} {{ strtoupper($assertion->code) }}</h3>
                    @else
                        <h3 class="text-gray-500">{{ $assertion->name }} {{ strtoupper($assertion->code) }}</h3>
                    @endif
                    <p class="text-sm pt-1"><span class="font-bold">DESCRIPTION: </span>{{ $assertion->description }}</p>

                    <p class="text-sm pt-1"><span class="font-bold">TARGET:</span>
                        @php
                            if(property_exists($assertion->metadata->target, 'element')){
                                if(is_string($assertion->metadata->target->element)){
                                    echo $assertion->metadata->target->element;
                                }
                                if(is_array($assertion->metadata->target->element)){
                                    echo implode(', ', $assertion->metadata->target->element);
                                }
                            } else {
                                echo "";
                            }
                        @endphp
                    </p>
                    <p class="text-sm pt-1"><span class="font-bold">URL:</span>
                        @php
                            if(property_exists($assertion->metadata, 'url')){
                                if(is_string($assertion->metadata->url)){
                                    //echo $assertion->metadata->url;
                                    echo "<a class=\"font-sm text-blue-600 dark:text-blue-500 hover:underline\" href='" . $assertion->metadata->url . "' target='_blank'>" . $assertion->metadata->url . "</a><br>";
                                }
                                if(is_array($assertion->metadata->url)){
                                    //echo implode(', ', $assertion->metadata->url);
                                    foreach($assertion->metadata->url as $url){
                                        echo "<a href='" . $url . "' target='_blank'>" . $url . "</a><br>";
                                    }
                                }
                            } else {
                                echo "";
                            }
                        @endphp
                    </p>
                        <p class="text-sm pt-1"><span class="font-bold">TYPE:</span>
                            @php
                            if(property_exists($assertion->metadata, 'type')){
                                if(is_string($assertion->metadata->type)){
                                    echo $assertion->metadata->type;
                                }
                                if(is_array($assertion->metadata->type)){
                                    echo implode(', ', $assertion->metadata->type);
                                }
                            } else {
                                echo "";
                            }
                            @endphp
                        </span>
                    </p>
                </div>
                <div style="width: 15%; height: 100%;  float: right;">
                        <span class="text-sm text-green-500">{{ $assertion->metadata->passed }} Passed</span><br/>
                        <span class="text-sm text-yellow-500">{{ $assertion->metadata->warning }} Warnings</span><br/>
                        <span class="text-sm text-red-500">{{ $assertion->metadata->failed }} Errors</span><br/>
                        <span class="text-sm text-gray-500">{{ $assertion->metadata->inapplicable }} Inapplicable</span>
                </div>
            </div>
            <div style="width:100%; clear:both;"></div>

            <p class="text-sm pt-1"><span class="font-bold">SUCCESS CRITERIA:</span></p>
            <p class="text-sm pt-1">
                <ul>
                    @php
                    $succ = "success-criteria";
                    //var_dump($assertion->metadata->{$succ});
                    if(property_exists($assertion->metadata, 'success-criteria')){

                        foreach($assertion->metadata->{$succ} as $succCriteria){
                            echo "<li>";

                                if(property_exists($succCriteria, 'name')){
                                    if(is_string($succCriteria->name)){
                                        echo $succCriteria->name;
                                    }
                                    if(is_array($succCriteria->name)){
                                        echo implode(', ', $succCriteria->name);
                                    }
                                } else {
                                    echo "";
                                }
                                if(property_exists($succCriteria, 'url_tr')){
                                    if(is_string($succCriteria->url_tr)){
                                        echo " ".explode('#', $succCriteria->url_tr)[1];
                                    }
                                    if(is_array($succCriteria->url_tr)){
                                        echo " ".implode(', ', explode('#', $succCriteria->url_tr)[1]);
                                    }
                                } else {
                                    echo "";
                                }
                                if(property_exists($succCriteria, 'level')){
                                    if(is_string($succCriteria->level)){
                                        echo " (Level ".$succCriteria->level.")";
                                    }
                                    if(is_array($succCriteria->level)){
                                        echo " (Level".implode(', ', $succCriteria->level).")";
                                    }
                                } else {
                                    echo "";
                                }
                            echo "</li>";
                        }
                    }

                    @endphp
                </ul>
            </p>
            <div style="width: 100%; clear:both;"></div>

            @if(property_exists($assertion, 'results'))

                 @foreach($assertion->results as $result)
                    @php
                        $color = "";
                        $verdict = "";
                        $description = "";
                        if(property_exists($result, 'verdict')){
                            switch($result->verdict){
                                case 'passed':
                                    $color = "green";
                                    $verdict = "passed";
                                    break;
                                case 'failed':
                                    $color = "red";
                                    $verdict = "failed";
                                    break;
                                case 'inapplicable':
                                    $color = "gray";
                                    $verdict = "inapplicable";
                                    break;
                                case 'warning':
                                    $color = "yellow";
                                    $verdict = "warning";
                                    break;
                                default:
                                    $color = "gray";
                                    $verdict = "inapplicable";
                                    break;
                            }
                        }
                        if(property_exists($result, 'description')){
                            $description = $result->description;
                        }
/*
                        $elems = new stdClass();
                        if(property_exists($result, 'elements')){
                            $elems = $result->elements;
                        }
                            */
                    @endphp

                    <div style="width: 100%; clear:both; mt-3 "></div>

                    <h6 class="mt-4">{{ $description }} <span class="text-{{$color}}-500">({{$verdict}})</span></h6>
                    @foreach($result->elements as $elem)
                    <div style="padding: 1em; background-color: #292D3E; border-radius: 0.5rem; color: white;">
                        <code>{{ substr($elem->htmlCode, 0, 150) }}</code>
                    </div>
                    <span class="text-sm text-gray-500">Pointer: {{ $elem->pointer }}</span>
                    @endforeach
                @endforeach
            @endif


        </div>

    @endforeach


@endforeach
    </div>
</x-filament-panels::page>
