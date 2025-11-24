<!DOCTYPE html>
<html lang="de">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Zertifikat</title>
    <style>
        @page {
            margin: 40px;
        }

        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12pt;
            color: #222;
        }

        .page {
            border: 2px solid #222;
            padding: 30px 40px;
            position: relative;
            height: 100%;
        }

        .header {
            width: 100%;
            margin-bottom: 40px;
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
            padding: 8px 10px;
            font-size: 10pt;
        }

        .metrics-table th {
            background: #f5f5f5;
            text-align: left;
        }

        .score-box {
            border: 1px solid #999;
            padding: 12px;
            margin: 15px 0 30px 0;
        }

        .score-label {
            font-size: 11pt;
            margin-bottom: 5px;
        }

        .score-value {
            font-size: 24pt;
            font-weight: bold;
        }

        .score-bar-container {
            margin-top: 8px;
            border: 1px solid #bbb;
            height: 14px;
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
            margin-top: 20px;
            text-align: center;
        }

        .chart-placeholder {
            border: 1px dashed #ccc;
            padding: 10px;
            font-size: 9pt;
            color: #888;
        }

    </style>
</head>
<body>
<div class="page">

    <div class="header">
        <table class="header-table">
            <tr>
                <td class="logo-left">
                    <img src="{{ public_path('assets/img/logo/font-logo-camindu.png') }}" alt="Logo" style="height:40px;">
                </td>
                <td class="logo-right">
                    camindu GmbH · Behringstr. 13 · 63814 Mainaschaff<br>
                    www.aktion-barrierefrei.org
                </td>
            </tr>
        </table>
    </div>

    <div class="title">
        <h1>ZERTIFIKAT</h1>
    </div>

    <div class="subtitle">
        Nachweis über den aktuellen Stand der digitalen Barrierefreiheit
    </div>

    <div class="company-block">
        <div>Dieses Zertifikat wird ausgestellt für</div>
        <div class="company-name">{{ $company->name }}</div>
        @if($company->website_url ?? false)
            <div class="company-meta">{{ $company->website_url }}</div>
        @endif
        <div class="company-meta">
            Stand der Auswertung: {{ now()->format('d.m.Y') }}
        </div>
    </div>

    <div class="score-box">
        <div class="score-label">Aktueller Barrierefreiheits-Score</div>
        <div class="score-value">{{ $score }} / 100</div>
        <div class="score-bar-container">
            <div class="score-bar-fill" style="width: {{ max(0, min(100, $score)) }}%;"></div>
        </div>
    </div>

    <table class="metrics-table">
        <tr>
            <th>Kennzahl</th>
            <th>Wert</th>
        </tr>
        <tr>
            <td>Gesamtzahl der geprüften Seiten/Scans</td>
            <td>{{ $totalScans }}</td>
        </tr>
        <tr>
            <td>Behobene Barrierefreiheitsprobleme</td>
            <td>{{ $issuesResolved }}</td>
        </tr>
        <tr>
            <td>Verbleibende offene Probleme</td>
            <td>{{ $issuesOpen }}</td>
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

    <div class="signature">
        <div class="signature-line"></div>
        <div class="signature-label">
            Unterschrift / digitale Freigabe · {{ now()->format('d.m.Y') }}
        </div>
    </div>

    <div class="footer">
        <table class="footer-table">
            <tr>
                <td>
                    Erstellt durch Aktion-Barrierefrei (Fixstern/Firmament)<br>
                    Dieses Zertifikat beschreibt den zum Ausstellungszeitpunkt vorliegenden technischen Stand.
                </td>
                <td style="text-align:right;">
                    Seite 1 / 1
                </td>
            </tr>
        </table>
    </div>

</div>
</body>
</html>
