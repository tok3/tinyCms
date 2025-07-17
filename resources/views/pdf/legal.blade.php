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
        *,:before,:after{box-sizing:border-box;border-width:0;border-style:solid;border-color:#e5e7eb}/* ... (all Tailwind styles remain unchanged) ... */

        /* Custom styles for PDF */
        @page {
            margin: 80px 25px 80px 25px;
            size: landscape; /* Explicitly set landscape mode */
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
            --danger-50:255, 241, 242; /* ... (color variables unchanged) ... */
        }

        @media print {
            aside, .fi-sidebar {
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
            .issue-table tr {
                page-break-after: always;
                break-after: page;
                -webkit-break-after: page;
            }
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
                size: landscape; /* Reinforce landscape mode */
            }
            body {
                margin: 1cm;
            }
        }
    </style>
</head>
<body>
    <header>
        WCAG Issues Report für {{ e($url->url) }}
    </header>

    <footer>
        Seite <span class="pagenum"></span>
    </footer>

    <div class="container">
        <h1>WCAG Issues Report für {{ e($url->url) }}</h1>
        <h5>Dokument-ID: {{ e($encodedId)}}</h5>
        <div class="meta">
            <p>Firma: {{ iconv('UTF-8', 'UTF-8//IGNORE', e($company->name)) }}</p>
            <p>Exportdatum: {{ iconv('UTF-8', 'UTF-8//IGNORE', $exportDate) }}</p>
        </div>
        <div class="space-y-4">
            <!-- One-column table with one issue per page -->
            <table class="issue-table">
                @foreach($records as $issue)
                    <tr>
                        <td>
                            <div class="issue-card bg-white dark:bg-gray-800 border-l-4 shadow p-4 rounded
                                @if ($issue->type === 'error') border-red-500 dark:border-red-700 error
                                @elseif ($issue->type === 'warning') border-yellow-500 dark:border-yellow-600 warning
                                @else border-blue-500 dark:border-blue-600 notice
                                @endif">
                                <div class="flex items-center mb-2">
                                    <span class="text-sm font-bold uppercase flex items-center
                                        @if ($issue->type === 'error') text-red-500 dark:text-red-300
                                        @elseif ($issue->type === 'warning') text-yellow-500 dark:text-yellow-300
                                        @else text-blue-500 dark:text-blue-300
                                        @endif">
                                        @if ($issue->type === 'notice')
                                            <img style="margin-top: 3px;" src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('assets/img/notice.png'))) }}" alt="notice" class="w-6 h-6 text-gray-800 dark:text-white"/>
                                        @else
                                            <img style="margin-top: 3px;" src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('assets/img/warning.png'))) }}" alt="warning" class="w-6 h-6 text-gray-800 dark:text-white"/>
                                        @endif
                                        {{ ucfirst($issue->type) }}
                                    </span>
                                    <span class="ml-auto text-gray-500 dark:text-gray-400 text-xs">{{ $issue->accessibilityRule->issue_type }}</span>
                                </div>
                                <x-impact-bar :impact="$issue->accessibilityRule->impact" />
                                <h3 class="font-bold text-lg">{{ $issue->translated_message }}</h3>
                                <p class="text-sm text-gray-600 dark:text-gray-300 mt-2"><strong>Selector:</strong></p>
                                <pre><code class="language-html">{{ $issue->selector }}</code></pre>

                                @if ($issue->context)
                                    <p class="text-sm text-gray-600 dark:text-gray-300 mt-2"><strong>Context:</strong></p>
                                    <pre><code class="language-html">{{ $issue->context }}</code></pre>
                                @endif

                                <p class="text-sm text-gray-600 dark:text-gray-300 mt-2">
                                    <strong>Code:</strong> {{ $issue->code }}</p>

                                <table style="width:100%">
                                    <tr>
                                        <td style="width:50%">

                                            <x-disabilities-list-pdf :disabilities="json_decode($issue->accessibilityRule->disabilities)"/>

                                        </td>
                                        <td style="text-align: right;">
                                            {!! $issue->accessibilityRule->wcag_tags !!}
                                        </td>
                                    </tr>
                                </table>

                                @if (!empty($issue->accessibilityRule->actRuleLinks))
                                    <p class="text-sm text-gray-600 dark:text-gray-300 mt-2"><strong>Info:</strong></p>
                                    @foreach($issue->accessibilityRule->actRuleLinks as $link)
                                        <a href="{{ $link }}" class="text-blue-500 dark:text-blue-300 underline" target="_blank">{{ $link }}</a><br>
                                    @endforeach
                                @endif
                            </div>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
</body>
</html>
