@php
    use SimpleSoftwareIO\QrCode\Facades\QrCode;

    $incluCertUrl = url('/inclucert/' . $company->ulid);

    // QR als base64 SVG erzeugen
    $qrSvg = base64_encode(
        QrCode::format('svg')
            ->size(130)
            ->margin(0)
            ->generate($incluCertUrl)
    );
@endphp
        <!DOCTYPE html>
<html lang="de">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Zertifikat</title>
    <style>
        @font-face {
            font-family: 'Solari';
            src: url('{{ storage_path('fonts/solari.ttf') }}') format('truetype');
            font-weight: normal;
            font-style: normal;
        }

        @font-face {
            font-family: 'f25';
            src: url('{{ storage_path('fonts/f25_bank_printer/F25_Bank_Printer.ttf') }}') format('truetype');
            font-weight: normal;
            font-style: normal;
        }

        @font-face {
            font-family: 'departure';
            src: url('{{ storage_path('fonts/DepartureMono-1.500/DepartureMono-Regular.otf') }}') format('truetype');
            font-weight: normal;
            font-style: normal;
        }

        @page {
            margin: 0px;

        }
        .page {
            padding: 30px 40px;
            position: relative;

        }
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12pt;
            color: #222;
        }



        .header {
            width: 100%;
            margin-bottom: 0px;
        }

        .header-table {
            width: 100%;
        }

        .header-table td {
            vertical-align: middle;
        }

        .logo-left {
            width: 50%;
        }

        .logo-right {
            width: 50%;
            text-align: right;
            font-size: 9pt;
            color: #555;
        }

        .title {
            text-align: center;
            margin-bottom: 15px;
        }

        .title h1 {
            font-size: 28pt;
            letter-spacing: 3px;
            margin: 0;
        }

        .subtitle {
            text-align: center;
            font-size: 11pt;
            color: #666;
            margin-bottom: 40px;
        }

        .company-block {
            text-align: center;
            margin-bottom: 30px;
        }

        .company-name {
            font-size: 20pt;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .company-meta {
            font-family: 'f25';
            font-size: 10pt;
            color: #666;
        }

        .metrics-table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0 30px 0;
        }

        .metrics-table th,
        .metrics-table td {
            border: 1px solid #ccc;
            padding: 6px 8px;
            font-size: 10pt;
        }

        .metrics-table th {
            background: #f5f5f5;
            text-align: left;
        }

        .metrics-table td {
            font-family: 'departure', sans-serif;
            font-size: 10pt;
        }


        .score-box {

            border: 1px dashed #999;
            padding: 12px;
            margin: 15px 0 30px 0;
        }

        .score-label {
            font-family: 'f25', sans-serif;
            font-size: 11pt;
            margin-bottom: 5px;
        }

        .score-value {
            font-family: 'f25', sans-serif !important;
            font-size: 22pt;

        }

        .score-bar-container {
            margin-top: 8px;
            border: 1px solid #bbb;
            height: 10px;
            width: 100%;
        }

        .score-bar-fill {
            height: 100%;
            background: #178bff;
        }

        .footer {
            position: absolute;
            bottom: 30px;
            left: 40px;
            right: 40px;
            font-size: 9pt;
            color: #777;
        }

        .footer-table {
            width: 100%;
        }

        .footer-table td {
            vertical-align: top;
        }

        .signature {
            margin-top: 40px;
            text-align: left;
        }

        .signature-line {
            border-top: 1px solid #333;
            width: 200px;
            margin-bottom: 4px;
        }

        .signature-label {
            font-size: 9pt;
            color: #666;
        }

        .chart-box {
            margin-top: 0px;
            text-align: center;
            border: 1px dashed #ccc;

        }

        .chart-placeholder {
            border: 1px dashed #ccc;
            padding: 10px;
            font-size: 9pt;
            color: #888;
        }

        .splitflap {
            font-family: 'Solari', sans-serif;
            font-size: 24pt;
            letter-spacing: 0.05em;
        }

        .f25 {
            font-family: 'f25', sans-serif;
            font-size: 24pt;
            letter-spacing: 0.05em;
        }

        .departure {
            font-family: 'departure', sans-serif;
            font-size: 24pt;
            letter-spacing: 0.05em;
        }

        .footer-table
        {
            font-family: 'departure', sans-serif;
            font-size: 6pt;
            line-height: 1.05em;
        }
    </style>
</head>
<body>
<div class="page">

    <div class="header">
        <table class="header-table">
            <tr>
                <td class="logo-left">
                    <img src="{{ public_path('assets/img/incluCertPdfBadge.png') }}" alt="Logo" style="height:60px;">
                </td>
                <td class="logo-right">
                    <div style="display:block; margin-top:5px;">
                        <img src="data:image/svg+xml;base64,{{ $qrSvg }}"
                             alt="QR-Code"
                             style="height:80px; width:80px;">
                    </div>
                </td>
            </tr>
        </table>
    </div>
    {{-- QR-Code --}}

    <div class="title">
        <h1>PoP Certificate</h1>
        <sup>- Proof of Progress in Digital Accessibility -</sup>
    </div>

    <div class="subtitle">
        Nachweis über den aktuellen Stand der digitalen Barrierefreiheit
    </div>

    <div class="company-block">
        <div>Ausgestellt für</div>
        <div class="company-name">{{ $company->name }}</div>

        @if($company->website_url ?? false)
            <div class="company-meta">{{ $company->website_url }}</div>
        @endif

        <div class="subtitle">
            Nachweis über den aktuellen Stand der digitalen Barrierefreiheit<br>
            (Prüfstandard: {{ $standard ?? 'WCAG 2.1' }})
        </div>

        <div class="company-meta">
            Beobachtungszeitraum (WCAG 2.1):
            {{ $observationStart->format('d.m.Y') }} - {{ $observationEnd->format('d.m.Y') }}
        </div>
    </div>

    <div class="score-box">
        <div class="score-label">Aktueller Barrierefreiheits-Score</div>
        <div class="score-value">{{ $score }}/100</div>
        <div class="score-bar-container">
            <div class="score-bar-fill" style="width: {{ max(0, min(100, $score)) }}%;"></div>
        </div>
        <div style="margin-top:8px; font-size:10pt;" class="departure">
            Tendenz seit Beginn: {{ $trendLabel }}
            ({{ $trendDiff >= 0 ? '+' : '' }}{{ $trendDiff }} Punkte)
        </div>
    </div>

    <table class="metrics-table">
        <tr>
            <th>Kennzahl</th>
            <th>Wert</th>
        </tr>
        <tr>
            <td>Aktuell offene Fehler</td>
            <td>{!! str_replace(' ', '&nbsp;', str_pad($currentErrors, 5, ' ', STR_PAD_LEFT)) !!}</td>
        </tr>
        <tr>
            <td>Netto behobene Fehler seit Beginn</td>

            <td>{!! str_replace(' ', '&nbsp;', str_pad($resolvedTotal, 5, ' ', STR_PAD_LEFT)) !!}</td>
        </tr>
        <tr>
            <td>Aktiv behobene Fehler im Beobachtungszeitraum</td>

            <td>{!! str_replace(' ', '&nbsp;', str_pad($activityFixedTotal, 5, ' ', STR_PAD_LEFT)) !!}</td>
        </tr>
        <tr>
            <td>Neu eingeführte Fehler im Beobachtungszeitraum</td>

            <td>{!! str_replace(' ', '&nbsp;', str_pad($activityIntroducedTotal, 5, ' ', STR_PAD_LEFT)) !!}</td>
        </tr>
    </table>

    <div class="chart-box">
        @if(!empty($chartImage))
            <img src="{{ $chartImage }}" alt="Barrierefreiheits-Chart" style="max-width:100%; height:auto;">
        @else
            <div class="chart-placeholder">
                Hier kann später ein Chart eingebettet werden (z. B. Fehler nach WCAG-Kategorie, Entwicklung über die Zeit).
            </div>
        @endif
    </div>



        <div class="footer">
            <table class="footer-table">
                <tr>
                    <td>
                        <img src="{{ public_path('assets/img/logo/logo.svg') }}" alt="Logo" style="width:12px !important;">

                    </td>
                    <td style="text-align:right;">
                        Erstellt durch Aktion-Barrierefrei (https://aktion-barrierefrei.com)<br>
                        Dieser Nachweis beschreibt den zum Ausstellungszeitpunkt vorliegenden Stand.<br>
                        Aktuellen Stand über QR-Code abfragen.
                    </td>
                </tr>
            </table>
        </div>

</div>
</body>
</html>
