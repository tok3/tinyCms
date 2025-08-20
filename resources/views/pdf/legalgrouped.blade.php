<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <title>Issues Export - {{ iconv('UTF-8', 'UTF-8//IGNORE', e($url->url)) }}</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.7.0/styles/default.min.css">
    <link href="/css/filament/forms/forms.css?v=3.3.8.0" rel="stylesheet" data-navigate-track />
    <link href="/css/filament/support/support.css?v=3.3.8.0" rel="stylesheet" data-navigate-track />
    <link href="/css/app/filament.css?v=3.3.8.0" rel="stylesheet" data-navigate-track />

    <style>
        /* Existing Tailwind CSS styles (unchanged) */
        *,
        :before,
        :after {
            box-sizing: border-box;
            border-width: 0;
            border-style: solid;
            border-color: #e5e7eb
        }

        /* ... (all Tailwind styles remain unchanged) ... */


        CODE {
            margin-right: 3px;
            margin-left: 3px;
        }

        .float-box {
            float: right;
            /* Position the box on the right */
            width: 20%;
            /* Set the box width to 20% */
            background-color: #f0f0f0;
            border: 1px solid #dadada;
            padding: 10px;
            margin-left: 15px;
            /* Add space between the box and the text */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            font-family: Arial, sans-serif;
            text-align: center;
        }
        tr.selectors {
            page-break-after: always;
            break-after: page;
            -webkit-break-after: page;
            page-break-inside: auto;
        }
        .content {
            overflow: hidden;
            /* Clears the float and ensures text flows correctly */
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
        }

        /* Custom styles for PDF */
        @page {
            margin: 80px 25px 80px 25px;
            size: landscape;
            /* Explicitly set landscape mode */
        }

        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 10px;
            font-size: 11px;
        }

        .container {
            max-width: 100%;
            margin: 0 auto;
        }

        h1 {
            font-size: 14px;
            color: #333;
            margin-bottom: 6px;
        }

        .meta {
            margin-bottom: 10px;
            font-size: 10px;
            color: #666;
            page-break-after: always;
        }

        table.issue-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        .issue-table td {
            border: none;
            padding: 0;
            vertical-align: top;
        }

        header {
            position: fixed;
            top: -60px;
            left: 0;
            right: 0;
            text-align: center;
            font-size: 10px;
            color: #888;
        }

        footer {
            position: fixed;
            bottom: -50px;
            left: 0;
            right: 0;
            height: 20px;
            font-size: 10px;
            color: #888;
            text-align: center;
        }

        footer .pagenum:after {
            content: counter(page);
        }

        :root {
            --danger-50: 255, 241, 242;
            /* ... (color variables unchanged) ... */
        }

        .border-yellow-500 {
            --tw-border-opacity: 1;
            border-color: rgb(234 179 8 / var(--tw-border-opacity));
        }

        .border-red-500 {
            --tw-border-opacity: 1;
            border-color: rgb(239 68 68 / var(--tw-border-opacity));
        }

        .text-yellow-500 {
            --tw-text-opacity: 1;
            color: rgb(234 179 8 / var(--tw-text-opacity));
        }

        .text-red-500 {
            --tw-text-opacity: 1;
            color: rgb(239 68 68 / var(--tw-text-opacity));
        }
/*
        .issue-group {
            page-break-after: always;
        }
*/
        @media print {

            aside,
            .fi-sidebar {
                display: none;
            }

            .issue-group {
                width: 100%;
                page-break-inside: avoid;
                display: block;
            }

            .issue-table {
                width: 100%;
                page-break-inside: avoid;
            }

            .meta {
                page-break-after: always;
            }
/*
            .issue-table tr,
            {
            page-break-after: always;
            break-after: page;
            -webkit-break-after: page;

        }
*/
        .issue-card {
            margin-top: 3rem;
            page-break-inside: avoid;
            break-inside: avoid;
            display: block;
            margin-bottom: 20px;
        }

        .space-y-4 {
            page-break-after: avoid;
        }

        @page {
            margin: 1cm;
            size: landscape;
            /* Reinforce landscape mode */
        }

        body {
            margin: 1cm;
        }
        }
    </style>
</head>

<body>
    <header>
        {{ iconv('UTF-8', 'UTF-8//IGNORE', e($company->name)) }}: WCAG Issues Report für <span style="font-style: italic;">{{ e($url->url) }} </span> <br />
        IncluCert Dokument-ID: {{ e($encodedId) }} -- Exportdatum: {{ iconv('UTF-8', 'UTF-8//IGNORE', $exportDate) }}
        <div style="right: 0; top: 0; /*clear: right; width: 100%; text-align: right;*/ position: absolute;">
            <img alt="aktion-barrierefrei logo"
                src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('assets/img/logo/fixstern-logo.png'))) }}"
                style="height:30px;" />
        </div>
    </header>

    <footer>
        Seite <span class="pagenum"></span>
    </footer>

    <div class="container">
        <!--<h5 style="right: 0; font-style: normal; width: 95%; padding-right: 2%; text-align: right;">Dokument-ID: {{ e($encodedId) }}</h5>-->
        <h1 style="width: 98%; text-align: center;">{{ iconv('UTF-8', 'UTF-8//IGNORE', e($company->name)) }} WCAG Issues Report für <br/><br/><span style="font-style: italic;"> {{ e($url->url) }}</span></h1>
        <div style="width: 98%; text-align: center; margin-top: 2rem;">
                        <img style="margin-top: 3px; height: 4rem;"
                                                    src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('assets/img/incluCertPdfBadge.png'))) }}"
                                                    alt="notice" class="w-6 h-6 text-gray-800 dark:text-white" />
        </div>
        <p>&nbsp;<br />&nbsp;</p>

        <div class="meta" style="padding-left: 6rem;">
            <!--<h2 class="font-bold text-xl mb-4"> IncluCert: </h2>-->

            <p>&nbsp;<br/>&nbsp;</p>
            <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-2">Dokument-ID: <span style="font-style: italic;">{{ e($encodedId) }}</span> </h4>
            <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-2">Verifikation: <a style="font-style: italic;"href="https://aktion-barrierefrei.org/incluCert/">https://aktion-barrierefrei.org/incluCert</a></h3>

                    <br/><br/><br/><br/>

            <p  class="space-y-2 mb-2 text-sm text-gray-600 dark:text-gray-400"><strong>Exportdatum:</strong><span style="font-family: 'OCR A', monospace;"> {{ iconv('UTF-8', 'UTF-8//IGNORE', $exportDate) }}</span></p>
            <p  class="space-y-2 mb-2 text-sm text-gray-600 dark:text-gray-400"><strong>Datenstand:</strong><span style="font-family: 'OCR A', monospace;"> {{ $statrecord->scanned_at }}</span></p>
            <p  class="space-y-2 mb-2 text-sm text-gray-600 dark:text-gray-400"><strong>Errors:</strong><span style="font-family: 'OCR A', monospace;"> {{ $statrecord->error_count }}</span> </p>
            <p  class="space-y-2 mb-2 text-sm text-gray-600 dark:text-gray-400"><strong>Warnings:</strong><span style="font-family: 'OCR A', monospace;"> {{ $statrecord->warning_count }}</span></p>
            <p  class="space-y-2 mb-2 text-sm text-gray-600 dark:text-gray-400"><strong>Notices:</strong><span style="font-family: 'OCR A', monospace;"> {{ $statrecord->notice_count }}</span></p>


            <p></p>


        </div>
            <div class="space-y-4">
                <!-- One-column table with one issue per page -->
                <table class="issue-table">
                    @foreach ($records as $code => $issues)
                        <tr>
                            <td colspan="2">
                                <div class="issue-group bg-white dark:bg-gray-800 border-l-4 shadow p-4 rounded mb-4
                                    @if ($issues->first()->type === 'error') border-red-500 dark:border-red-700
                                    @elseif ($issues->first()->type === 'warning') border-yellow-500 dark:border-yellow-600
                                    @else border-blue-500 dark:border-blue-600 @endif">
                                    <div class="flex items-center mb-2">
                                        <span
                                            class="text-sm font-bold uppercase flex items-center
                                            @if ($issues->first()->type === 'error') text-red-500 dark:text-red-300
                                            @elseif ($issues->first()->type === 'warning') text-yellow-500 dark:text-yellow-300
                                            @else text-blue-500 dark:text-blue-300 @endif">

                                            @if ($issues->first()->type === 'notice')
                                                <img style="margin-top: 3px;"
                                                    src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('assets/img/notice.png'))) }}"
                                                    alt="notice" class="w-6 h-6 text-gray-800 dark:text-white" />
                                            @else
                                                <img style="margin-top: 3px;"
                                                    src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('assets/img/warning.png'))) }}"
                                                    alt="warning" class="w-6 h-6 text-gray-800 dark:text-white" />
                                            @endif
                                            {{ ucfirst($issues->first()->type) }}
                                        </span>

                                    </div>
                                    <!-- Beschreibung -->
                                    <h2 class="font-bold text-xl mb-4">{{ $code }}</h2>

                                    <p class="text-sm text-gray-600 dark:text-gray-300 mb-4">
                                    <h2 class="mt-5 mb-3 text-xl font-medium text-gray-900 dark:text-white">
                                        {{ $issues->first()->translated_message }}</h2>
                                    </p>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 40%; padding-right: 5%;">

                                    <!-- Grid für Beschreibung und Sidebar -->
                                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                                        <!-- Hauptinhalt: Beschreibung -->
                                        <div class="col-span-2">
                                            <!-- Überschrift und Beschreibung -->
                                            <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-2">
                                                Beschreibung</h3>

                                                {!! $issues->first()->accessibilityRule->merged_html['description'] ?? 'Not specified' !!}


                                            <!-- Warum ist das Wichtig -->
                                            <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-2">Warum ist
                                                das Wichtig</h3>

                                                {!! $issues->first()->accessibilityRule->merged_html['why_important'] ?? 'Not specified' !!}

                                        </div>
                                    </div>
                                </td>
                                <td style="width: 40%; padding-right: 5%;">
                                        <div class="bg-gray-100 dark:bg-gray-900 p-4 rounded">
                                            <h4 class="text-md font-bold text-gray-800 dark:text-gray-300 mb-3">
                                                Compliance-Daten und Auswirkungen</h4>

                                            <div class="space-y-2 mb-2 text-sm text-gray-600 dark:text-gray-400" style="margin-bottom: 15px;">
                                                <strong>Impact:</strong>
                                                <span
                                                    style="font-family: 'OCR A', monospace;">{{ $issues->first()->accessibilityRule->impact }}</span>
                                            </div>
                                            <div class="w-full bg-gray-200 rounded-full h-2.5 mb-2 dark:bg-gray-700">
                                                @if ($issues->first()->accessibilityRule->impact == 'Minor')
                                                    <div class="bg-blue-200 h-2.5 rounded-full dark:bg-gray-300"
                                                        style="width: 25%"></div>
                                                @elseif($issues->first()->accessibilityRule->impact == 'Moderate')
                                                    <div class="bg-orange-300 h-2.5 rounded-full dark:bg-gray-300"
                                                        style="width: 45%"></div>
                                                @elseif($issues->first()->accessibilityRule->impact == 'Serious')
                                                    <div class="bg-orange-600 h-2.5 rounded-full dark:bg-gray-300"
                                                        style="width: 65%"></div>
                                                @elseif($issues->first()->accessibilityRule->impact == 'Critical')
                                                    <div class="bg-red-600 h-2.5 rounded-full dark:bg-gray-300"
                                                        style="width: 95%"></div>
                                                @endif
                                            </div>

                                            <div class="space-y-2 mb-2 text-sm text-gray-600 dark:text-gray-400" style="margin-bottom: 15px;">
                                                <strong>Issue:</strong>
                                                <span
                                                    style="font-family: 'OCR A', monospace;">{{ $issues->first()->accessibilityRule->issue_type }}</span>
                                            </div>

                                            <div class="space-y-2 mb-2 text-sm text-gray-600 dark:text-gray-400" style="margin-bottom: 15px;">
                                                <strong>Code:</strong>
                                                <span
                                                style="font-family: 'OCR A', monospace;">{{ $issues->first()->accessibilityRule->description }}</span>
                                            </div>

                                            <div class="space-y-2 mb-2 text-sm text-gray-600 dark:text-gray-400" style="margin-bottom: 15px;">
                                                    <strong>Tags:</strong>
                                                    <span
                                                style="font-family: 'OCR A', monospace;">{!! $issues->first()->accessibilityRule->tags !!}</span>
                                            </div>

                                            <hr class="mb-4 mt-4">


                                            <div class="space-y-2 mb-2 text-sm text-gray-600 dark:text-gray-400">
                                                <strong>Disabilities</strong>
                                            </div>
                                            <ul style="list-style-type: none">
                                                @foreach (json_decode($issues->first()->accessibilityRule->disabilities) as $disability)
                                                    @if ($disability == 'Blind')
                                                        <!-- Sighted Keyboard Users -->
                                                        <li class="flex items-center space-x-2">
                                                            <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('assets/img/sightedKeyboard.png'))) }}"
                                                                alt="sightedKeyboard"
                                                                class="w-6 h-6 text-gray-800 dark:text-white" />
                                                            <span style="padding-bottom: 3px;" class="text-sm">Sighted
                                                                Keyboard Users</span>
                                                        </li>
                                                    @endif
                                                    @if ($disability == 'Blind')
                                                        <!-- Blind -->
                                                        <li class="flex items-center space-x-2">
                                                            <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('assets/img/blind.png'))) }}"
                                                                alt="blind"
                                                                class="w-6 h-6 text-gray-800 dark:text-white" />
                                                            <span style="padding-bottom: 3px;"
                                                                class="text-sm">Blind</span>
                                                        </li>
                                                    @endif
                                                    @if ($disability == 'Low Vision')
                                                        <!-- Low Vision -->
                                                        <li class="flex items-center space-x-2">
                                                            <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('assets/img/lowVision.png'))) }}"
                                                                alt="lowVision"
                                                                class="w-6 h-6 text-gray-800 dark:text-white" />
                                                            <span style="padding-bottom: 3px;" class="text-sm">Low
                                                                Vision</span>
                                                        </li>
                                                    @endif
                                                    @if ($disability == 'Deaf')
                                                        <!-- Deaf -->
                                                        <li class="flex items-center space-x-2">
                                                            <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('assets/img/deaf.png'))) }}"
                                                                alt="deaf"
                                                                class="w-6 h-6 text-gray-800 dark:text-white" />
                                                            <span style="padding-bottom: 3px;"
                                                                class="text-sm">Deaf</span>
                                                        </li>
                                                    @endif
                                                    @if ($disability == 'Deafblind')
                                                        <!-- Deafblind -->
                                                        <li class="flex items-center space-x-2">
                                                            <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('assets/img/deafblind.png'))) }}"
                                                                alt="deafblind"
                                                                class="w-6 h-6 text-gray-800 dark:text-white" />
                                                            <span style="padding-bottom: 3px;"
                                                                class="text-sm">Deafblind</span>
                                                        </li>
                                                    @endif
                                                    @if ($disability == 'Mobility')
                                                        <!-- mobility -->
                                                        <li class="flex items-center space-x-2">
                                                            <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('assets/img/mobility.png'))) }}"
                                                                alt="mobility"
                                                                class="w-6 h-6 text-gray-800 dark:text-white" />
                                                            <span style="padding-bottom: 3px;"
                                                                class="text-sm">Mobility</span>
                                                        </li>
                                                    @endif
                                                    @if ($disability == 'Colorblindness')
                                                        <!-- color blind -->
                                                        <li class="flex items-center space-x-2">
                                                            <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('assets/img/colorblind.png'))) }}"
                                                                alt="colorblind"
                                                                class="w-6 h-6 text-gray-800 dark:text-white" />
                                                            <span style="padding-bottom: 3px;" class="text-sm">Colour
                                                                Blind</span>
                                                        </li>
                                                    @endif
                                                @endforeach
                                            </ul>
                                            <hr class="mb-4 mt-4">
                                        </div>
                            </td>
                        </tr>

                        <tr class="selectors">
                            <td colspan="2">

                                    <div class="issue-card bg-dark dark:bg-gray-900 border-l-4 shadow p-4 rounded">
                                        @foreach ($issues as $issue)
                                            <p class="text-sm text-gray-600 dark:text-gray-300 mt-2"><strong>Selector:</strong></p>
                                            @if ($issues->first()->selector)
                                            <pre><code class="issueHint language-html">{{ $issue->selector }}</code></pre>
                                            @endif
                                            @if ($issue->context)
                                                <p class="text-sm text-gray-600 dark:text-gray-300 mt-2"><strong>Context:</strong></p>
                                                <pre><code class="language-html">{{ $issue->context }}</code></pre>
                                            @endif
                                        @endforeach
                                </div>
                            </td>
                        </tr>
    @endforeach
                </table>
            </div>
        </div>
</body>

</html>
