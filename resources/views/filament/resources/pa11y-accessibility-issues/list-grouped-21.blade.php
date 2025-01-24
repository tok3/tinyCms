<x-filament::page>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.7.0/styles/default.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.7.0/highlight.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            document.querySelectorAll('code').forEach((block) => {
                hljs.highlightElement(block);
            });

        });
    </script>
    <style>
        CODE {
            margin-right: 3px;
            margin-left: 3px;
        }

    </style>
    <div class="space-y-4">


        @include('filament.resources.pa11y-accessibility-issues.partials.head', ['slugGrouped' => $slugGrouped, 'slugIndex' => $slugIndex])



        <!-- -->

        <div class="space-y-8 ">


            @foreach ($this->getGroupedRecords() as $code => $issues)

                <!-- Hauptkarte für den Fehlertyp -->
                <div class="issue-group bg-white dark:bg-gray-800 border-l-4 shadow p-4 rounded mb-4
            @if ($issues->first()->type === 'error') border-red-500 dark:border-red-700
            @elseif ($issues->first()->type === 'warning') border-yellow-500 dark:border-yellow-600
            @else border-blue-500 dark:border-blue-600
            @endif">

                    <!-- Titel mit Icon -->
                    <div class="flex items-center mb-2">
                <span class="text-sm font-bold uppercase flex items-center
                    @if ($issues->first()->type === 'error') text-red-500 dark:text-red-300
                    @elseif ($issues->first()->type === 'warning') text-yellow-500 dark:text-yellow-300
                    @else text-blue-500 dark:text-blue-300
                    @endif">

                    <!-- Icon je nach Typ -->
                    @if ($issues->first()->type === 'notice')
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24">
                            <circle cx="12" cy="12" r="10" fill="currentColor"/>
                            <text x="12" y="16" text-anchor="middle" fill="white" font-size="12" font-weight="bold">i</text>
                        </svg>
                    @else
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2L22 20H2L12 2Z" stroke="currentColor" stroke-width="2" fill="none"/>
                            <text x="12" y="16" text-anchor="middle" fill="currentColor" font-size="12" font-weight="bold">!</text>
                        </svg>
                    @endif
                    {{ ucfirst($issues->first()->type) }}
                </span>


                    </div>


                    <!-- Beschreibung -->
                    <h2 class="font-bold text-xl mb-4">{{ $code }}</h2>

                    <p class="text-sm text-gray-600 dark:text-gray-300 mb-4">
                    <h3 class="mt-5 mb-3 text-xl font-medium text-gray-900 dark:text-white">{{ $issues->first()->translated_message }}</h2>
                        </p>

                        <!-- -->
                        <!-- Grid für Beschreibung und Sidebar -->
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                            <!-- Hauptinhalt: Beschreibung -->
                            <div class="col-span-2">
                                <!-- Überschrift und Beschreibung -->
                                <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-2">Beschreibung</h3>
                                <p class="mb-4 text-sm font-medium text-gray-800 dark:text-gray-300">
                                    {!!  $issues->first()->accessibilityRule->merged_html['description'] ?? 'Not specified'  !!}
                                </p>

                                <!-- Warum ist das Wichtig -->
                                <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-2">Warum ist das Wichtig</h3>
                                <p class="mb-4 text-sm font-medium text-gray-800 dark:text-gray-300">
                                    {!!  $issues->first()->accessibilityRule->merged_html['why_important'] ?? 'Not specified'  !!}
                                </p>
                            </div>

                            <!-- Seitenleiste -->
                            <div class="col-span-1 bg-gray-100 dark:bg-gray-900 p-4 rounded">
                                <h4 class="text-md font-bold text-gray-800 dark:text-gray-300 mb-3">Compliance-Daten und
                                    Auswirkungen
                                </h4>


                                <div class="w-full bg-gray-200 rounded-full h-2.5 mb-4 dark:bg-gray-700">
                                    @if($issues->first()->accessibilityRule->impact == "Minor")
                                        <div class="bg-blue-200 h-2.5 rounded-full dark:bg-gray-300" style="width: 25%"></div>
                                    @endif
                                    @if($issues->first()->accessibilityRule->impact == "Moderate")
                                        <div class="bg-orange-300 h-2.5 rounded-full dark:bg-gray-300" style="width: 45%"></div>
                                    @endif

                                    @if($issues->first()->accessibilityRule->impact == "Serious")
                                        <div class="bg-red-400 h-2.5 rounded-full dark:bg-gray-300" style="width: 65%"></div>
                                    @endif
                                    @if($issues->first()->accessibilityRule->impact == "Critical")
                                        <div class="bg-red-600 h-2.5 rounded-full dark:bg-gray-300" style="width: 95%"></div>
                                    @endif
                                </div>

                                <ul class="space-y-2 text-sm text-gray-600 dark:text-gray-400">
                                    <li><strong>Issue:</strong> {{$issues->first()->accessibilityRule->issue_type}}</li>
                                    <li><strong>Code:</strong> {{$issues->first()->accessibilityRule->description}}</li>
                                    <li><strong>Impact:</strong> {{$issues->first()->accessibilityRule->impact}}</li>
                                    <li><strong>Tags:<br></strong> {!! $issues->first()->accessibilityRule->wcag_tags !!}</li>
                                    <li><strong>WCAG Level:</strong>
                                        <nobr style="white-space: nowrap !important;">{{$issues->first()->accessibilityRule->issueType}}</nobr>
                                    </li>
                                </ul>
                                {!!  $issues->first()->accessibilityRule->standards_badges ?? 'Not specified'  !!}


                                <ul class="space-y-2 mt-4 mb-4">

                                    @foreach(json_decode($issues->first()->accessibilityRule->disabilities) as $disability)

                                        @if($disability == 'Blind')
                                            <!-- Sighted Keyboard Users -->
                                            <li class="flex items-center space-x-2">
                                                <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                                     viewBox="0 0 24 24">
                                                    <path stroke="#5f6368" stroke-linecap="square" stroke-width="2" d="M8 15h7.01v.01H15L8 15Z"/>
                                                    <path stroke="#5f6368" stroke-linecap="square" stroke-width="2" d="M20 6H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h16a1 1 0 0 0 1-1V7a1 1 0 0 0-1-1Z"/>
                                                    <path stroke="#5f6368" stroke-linecap="square" stroke-width="2"
                                                          d="M6 9h.01v.01H6V9Zm0 3h.01v.01H6V12Zm0 3h.01v.01H6V15Zm3-6h.01v.01H9V9Zm0 3h.01v.01H9V12Zm3-3h.01v.01H12V9Zm0 3h.01v.01H12V12Zm3 0h.01v.01H15V12Zm3 0h.01v.01H18V12Zm0 3h.01v.01H18V15Zm-3-6h.01v.01H15V9Zm3 0h.01v.01H18V9Z"/>
                                                </svg>
                                                <span class="text-sm">Sighted Keyboard Users</span>
                                            </li>
                                        @endif
                                        @if($disability == 'Blind')
                                            <!-- Blind -->
                                            <li class="flex items-center space-x-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#5f6368">
                                                    <path
                                                        d="m240-60-64-48 104-139v-213q0-31 5.5-68.5T300-596l-60 34v142h-80v-188l216-123q8-5 17-7t19-2q24 0 44 12t30 33l31 67q20 44 61 66t102 22v80h-39L860-78l-35 20-237-413q-40-13-72.5-37.5T460-568q-10 29-15.5 66.5T441-432l79 112v260h-80v-200l-71-102-9 142L240-60Zm220-700q-33 0-56.5-23.5T380-840q0-33 23.5-56.5T460-920q33 0 56.5 23.5T540-840q0 33-23.5 56.5T460-760Z"/>
                                                </svg>
                                                <span class="text-sm">Blind</span>
                                            </li>
                                        @endif
                                        @if($disability == 'Low Vision')
                                            <!-- Low Vision -->
                                            <li class="flex items-center space-x-2">
                                                <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#5f6368"
                                                     viewBox="0 0 24 24">
                                                    <path
                                                        d="m4 15.6 3.055-3.056A4.913 4.913 0 0 1 7 12.012a5.006 5.006 0 0 1 5-5c.178.009.356.027.532.054l1.744-1.744A8.973 8.973 0 0 0 12 5.012c-5.388 0-10 5.336-10 7A6.49 6.49 0 0 0 4 15.6Z"/>
                                                    <path
                                                        d="m14.7 10.726 4.995-5.007A.998.998 0 0 0 18.99 4a1 1 0 0 0-.71.305l-4.995 5.007a2.98 2.98 0 0 0-.588-.21l-.035-.01a2.981 2.981 0 0 0-3.584 3.583c0 .012.008.022.01.033.05.204.12.402.211.59l-4.995 4.983a1 1 0 1 0 1.414 1.414l4.995-4.983c.189.091.386.162.59.211.011 0 .021.007.033.01a2.982 2.982 0 0 0 3.584-3.584c0-.012-.008-.023-.011-.035a3.05 3.05 0 0 0-.21-.588Z"/>
                                                    <path
                                                        d="m19.821 8.605-2.857 2.857a4.952 4.952 0 0 1-5.514 5.514l-1.785 1.785c.767.166 1.55.25 2.335.251 6.453 0 10-5.258 10-7 0-1.166-1.637-2.874-2.179-3.407Z"/>
                                                </svg>
                                                <span class="text-sm">Low Vision</span>
                                            </li>
                                        @endif
                                        @if($disability == 'Deaf')

                                            <!-- Deaf -->
                                            <li class="flex items-center space-x-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#5f6368">
                                                    <path
                                                        d="M819-28 526-321q-20 16-32.5 28t-21 24q-8.5 12-15.5 27.5T442-202q-20 58-62.5 90T280-80q-66 0-113-47t-47-113h80q0 33 23.5 56.5T280-160q31 0 52.5-20t39.5-66q11-27 20-46t20-33.5q11-14.5 25-26.5t33-25L204-643q-2 11-3 21.5t-1 21.5h-80q0-29 5-55.5t15-51.5L27-820l57-57L876-85l-57 57Zm-73-301-57-57q35-47 53-101.5T760-600q0-73-27.5-139T654-856l58-56q62 63 95 143.5T840-600q0 73-24 142t-70 129ZM637-438l-58-58q11-23 16-49t5-55q0-85-57.5-142.5T400-800q-26 0-51 6.5T301-774l-59-59q35-23 75-35t83-12q119 0 199.5 80.5T680-600q0 45-10.5 85.5T637-438ZM497-578 377-698q5-2 11-2h12q42 0 71 29t29 71q0 6-.5 11.5T497-578Zm-97 78q-42 0-71-29.5T300-600q0-13 3-25t10-23l136 136q-11 6-23.5 9t-25.5 3Z"/>
                                                </svg>
                                                <span class="text-sm">Deaf</span>
                                            </li>
                                        @endif
                                        @if($disability == 'Deafblind')

                                            <!-- Deafblind -->
                                            <li class="flex items-center space-x-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#5f6368">
                                                    <path
                                                        d="M527-640 303-807q-14-10-16-26t8-30q10-14 26-16.5t30 7.5l224 168-48 64Zm-153-64-36 37q-5 5-9.5 10.5T320-645l-57-42q-14-10-16-26t8-30q10-14 26-16t30 8l63 47Zm284 123Zm85-48L439-856q-14-10-16.5-26t7.5-30q10-14 26-16t30 8l196 146 9-69q3-24 19-41t39-21l40-6 94 316q8 27 3 55t-22 51l-85 113q-2-24-10.5-46.5T746-465l54-72q6-8 7-17t-1-18l-48-163-15 106Zm-473 96-14-10q-14-10-16.5-26t7.5-30q10-14 26-16t30 8l1 1q-5 18-3.5 36.5T308-533h-38ZM80-280q-17 0-28.5-11.5T40-320q0-17 11.5-28.5T80-360h280v80H80Zm40 120q-17 0-28.5-11.5T80-200q0-17 11.5-28.5T120-240h240v80H120Zm80 120q-17 0-28.5-11.5T160-80q0-17 11.5-28.5T200-120h400q17 0 28.5-11.5T640-160v-200q0-10-4-18t-12-14L488-494l52 94H160q-17 0-28.5-11.5T120-440q0-17 11.5-28.5T160-480h244l-34-60q-12-21-9.5-44.5T380-625l28-28 264 197q23 17 35.5 42t12.5 54v200q0 50-35 85t-85 35H200Zm281-223Z"/>
                                                </svg>
                                                <span class="text-sm">Deafblind</span>
                                            </li>
                                        @endif
                                        @if($disability == 'Mobility')

                                            <!-- mobility -->
                                            <li class="flex items-center space-x-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#5f6368">
                                                    <path
                                                        d="m520-120 34-331q-57-15-86-39.5T410-544l-95 94 85 85v245h-80v-210l-31-28 7 54-147 189-63-49 126-162-57-112q-8-17-9-42.5t17-43.5l134-132q12-12 26.5-18t29.5-6q24 0 38 9t19 14l80 79q27 27 66 42.5t84 15.5h66q23 0 40 15.5t19 38.5l26 254q13 8 21 21.5t8 30.5q0 25-17.5 42.5T760-100q-25 0-43-17.5T699-160q0-17 8-30.5t22-21.5l-5-48H594l-14 140h-60Zm-20-540q-33 0-56.5-23.5T420-740q0-33 23.5-56.5T500-820q33 0 56.5 23.5T580-740q0 33-23.5 56.5T500-660Zm100 340h118l-14-140h-89l-15 140Z"/>
                                                </svg>
                                                <span class="text-sm">Mobility</span>
                                            </li>
                                        @endif
                                        @if($disability == 'Colorblindness')

                                            <!-- color blind -->
                                            <li class="flex items-center space-x-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" id="Color-Blind--Streamline-Ultimate" height="24" width="24">
                                                    <desc>Color Blind Streamline Icon: https://streamlinehq.com</desc>
                                                    <path stroke="#5f6368" stroke-linecap="round" stroke-linejoin="round"
                                                          d="M9.02997 14.9227c0.40075 0.4008 0.87653 0.7188 1.40013 0.9357 0.5237 0.217 1.0849 0.3286 1.6517 0.3287 0.5668 0 1.128 -0.1116 1.6517 -0.3284 0.5237 -0.2169 0.9995 -0.5348 1.4003 -0.9355 0.4008 -0.4008 0.7188 -0.8765 0.9357 -1.4002 0.217 -0.5236 0.3287 -1.0848 0.3287 -1.6516 0.0001 -0.5668 -0.1115 -1.1281 -0.3284 -1.6517 -0.2169 -0.52372 -0.5347 -0.99954 -0.9355 -1.40036"
                                                          stroke-width="1.5"></path>
                                                    <path stroke="#5f6368" stroke-linecap="round" stroke-linejoin="round" d="M22.6828 1.27051 1.22333 22.7291" stroke-width="1.5"></path>
                                                    <path stroke="#5f6368" d="M8.57626 8.73139c-0.20251 0 -0.36667 -0.16416 -0.36667 -0.36667 0 -0.2025 0.16416 -0.36667 0.36667 -0.36667"
                                                          stroke-width="1.5"></path>
                                                    <path stroke="#5f6368" d="M8.57629 8.73139c0.2025 0 0.36667 -0.16416 0.36667 -0.36667 0 -0.2025 -0.16417 -0.36667 -0.36667 -0.36667"
                                                          stroke-width="1.5"></path>
                                                    <path stroke="#5f6368" d="M11.9985 7.50922c-0.2025 0 -0.3666 -0.16417 -0.3666 -0.36667 0 -0.20251 0.1641 -0.36667 0.3666 -0.36667"
                                                          stroke-width="1.5"></path>
                                                    <path stroke="#5f6368" d="M11.9985 7.50922c0.2025 0 0.3667 -0.16417 0.3667 -0.36667 0 -0.20251 -0.1642 -0.36667 -0.3667 -0.36667"
                                                          stroke-width="1.5"></path>
                                                    <path stroke="#5f6368" d="M7.35404 12.1537c-0.20251 0 -0.36667 -0.1641 -0.36667 -0.3666 0 -0.2026 0.16416 -0.3667 0.36667 -0.3667"
                                                          stroke-width="1.5"></path>
                                                    <path stroke="#5f6368" d="M7.35406 12.1537c0.2025 0 0.36667 -0.1641 0.36667 -0.3666 0 -0.2026 -0.16417 -0.3667 -0.36667 -0.3667"
                                                          stroke-width="1.5"></path>
                                                    <path stroke="#5f6368" stroke-linecap="round" stroke-linejoin="round"
                                                          d="M6.27063 17.683c1.67225 1.2031 3.66842 1.8741 5.72787 1.9253 4.009 0.0792 8.0746 -3.2609 10.5836 -6.5336 0.2716 -0.3752 0.4179 -0.8265 0.4179 -1.2897 0 -0.4632 -0.1463 -0.9145 -0.4179 -1.2897 -1.3102 -1.72135 -2.8804 -3.22824 -4.6543 -4.46649"
                                                          stroke-width="1.5"></path>
                                                    <path stroke="#5f6368" stroke-linecap="round" stroke-linejoin="round"
                                                          d="M14.926 4.4709c-0.9376 -0.34262 -1.9293 -0.51353 -2.9275 -0.50454C8.05707 3.88423 3.98068 7.15395 1.4179 10.495 1.14625 10.8702 1 11.3215 1 11.7847c0 0.4632 0.14625 0.9145 0.4179 1.2897 0.78603 1.0242 1.66025 1.9776 2.61265 2.8493"
                                                          stroke-width="1.5"></path>
                                                </svg>
                                                <span class="text-sm">Colour Blind</span>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>

                                <x-standard-logos :standards="json_decode( $issues->first()->accessibilityRule->standards)" />
                            </div>
                        </div>

                        <!-- -->


                        <!-- Aufklappbare Details -->
                        <details class="mt-4">
                            <summary class="cursor-pointer text-md font-bold text-gray-700 dark:text-gray-400">
                                {{ $issues->count() }} {{ $issues->count() === 1 ? 'Vorkommnis' : 'Vorkommnisse' }} anzeigen
                            </summary>
                            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 gap-4 mt-4">


                                @foreach ($issues as $issue)

                                    @include('filament.resources.pa11y-accessibility-issues.issue-card-grouped', ['issue' => $issue])
                                @endforeach
                            </div>

                        </details>

                        @if (!empty($issues->first()->accessibilityRule->act_rule_link))
                            <p class="text-sm text-gray-600 dark:text-gray-300 mt-2"><strong>Info:</strong></p>

                            <a href="{{ $issues->first()->accessibilityRule->act_rule_link }}" class="text-blue-500 dark:text-blue-300 underline"
                               target="_blank">{{ $issues->first()->accessibilityRule->act_rule_link }}</a><br>

                    @endif


                </div>
            @endforeach
        </div>


        <!-- Pagination -->
        <div>
            {{ $this->getRecords()->appends(request()->query())->links() }}
        </div>

    </div>
</x-filament::page>
