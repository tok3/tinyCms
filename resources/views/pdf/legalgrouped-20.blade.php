<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Issues Export - {{ iconv('UTF-8', 'UTF-8//IGNORE', e($url->url)) }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 11px;
            color: #222;
            margin: 24px;
        }

        h1 {
            font-size: 18px;
            margin: 0 0 12px 0;
        }

        .meta {
            font-size: 10px;
            color: #666;
            margin-bottom: 16px;
        }

        .group {
            page-break-inside: avoid;
            border: 1px solid #ddd;
            border-left: 4px solid #4b5563;
            border-radius: 6px;
            padding: 12px;
            margin-bottom: 14px;
        }

        .group h2 {
            font-size: 14px;
            margin: 0 0 6px 0;
        }

        .issue {
            border-top: 1px solid #eee;
            padding-top: 8px;
            margin-top: 8px;
        }

        .label {
            font-weight: bold;
        }

        pre {
            white-space: pre-wrap;
            word-wrap: break-word;
            margin: 4px 0 0 0;
            font-family: monospace;
        }

        .muted {
            color: #666;
        }
    </style>
</head>
<body>
    <h1>{{ iconv('UTF-8', 'UTF-8//IGNORE', e($company->name)) }} WCAG 2.0 Issues Report</h1>
    <div class="meta">
        URL: {{ e($url->url) }}<br>
        Dokument-ID: {{ e($encodedId) }}<br>
        Exportdatum: {{ iconv('UTF-8', 'UTF-8//IGNORE', $exportDate) }}<br>
        Datenstand: {{ $statrecord->scanned_at }}<br>
        Errors: {{ $statrecord->error_count }}, Warnings: {{ $statrecord->warning_count }}, Notices: {{ $statrecord->notice_count }}
    </div>

    @foreach ($records as $code => $issues)
        @php
            $firstIssue = $issues->first();
        @endphp
        <div class="group">
            <h2>{{ $code }}</h2>
            <div class="muted">
                Typ: {{ ucfirst($firstIssue->type ?? 'unknown') }} |
                Standard: {{ $firstIssue->standard ?? '2.0' }} |
                WCAG Level: {{ $firstIssue->wcag_level ?? 'n/a' }}
            </div>
            <div style="margin-top:8px;">
                <span class="label">Fehlertext:</span>
                <div>{{ $firstIssue->translated_message ?? $firstIssue->issue ?? 'Not specified' }}</div>
            </div>

            @foreach ($issues as $issue)
                <div class="issue">
                    <div><span class="label">Selector:</span></div>
                    <pre>{{ $issue->selector ?? 'n/a' }}</pre>

                    @if (!empty($issue->context))
                        <div style="margin-top:6px;"><span class="label">Context:</span></div>
                        <pre>{{ $issue->context }}</pre>
                    @endif

                    <div style="margin-top:6px;" class="muted">
                        Code: {{ $issue->code ?? 'n/a' }}
                    </div>
                </div>
            @endforeach
        </div>
    @endforeach
</body>
</html>
