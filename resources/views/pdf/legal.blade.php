<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Issues Export - {{ iconv('UTF-8', 'UTF-8//IGNORE', e($url->url)) }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 10px;
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
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 4px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>WCAG Issues Report für  {{ e($url->url) }}</h1>
        <h5>Dokument-ID:  {{ e($encodedId)}}</h5>
        <div class="meta">
            <p>Firma: {{ iconv('UTF-8', 'UTF-8//IGNORE', e($company->name)) }}</p>
            <p>Exportdatum: {{ iconv('UTF-8', 'UTF-8//IGNORE', $exportDate) }}</p>
        </div>
        <table>
            <thead>
                <tr>
                    <th>Fehler</th>
                    <th>Selector</th>
                    <th>Code</th>
                    <th>Type</th>
                    <th>Type Code</th>
                    <th>Context</th>
                    <th>Standard</th>
                    <th>WCAG Level</th>
                </tr>
            </thead>
            <tbody>
                @foreach($records as $record)
                    <tr>
                        <td>{{ iconv('UTF-8', 'UTF-8//IGNORE', e($record->issue)) }}</td>
                        <td>{{ iconv('UTF-8', 'UTF-8//IGNORE', e($record->selector)) }}</td>
                        <td>{{ iconv('UTF-8', 'UTF-8//IGNORE', e($record->code)) }}</td>
                        <td>{{ iconv('UTF-8', 'UTF-8//IGNORE', e($record->type)) }}</td>
                        <td>{{ iconv('UTF-8', 'UTF-8//IGNORE', e($record->typeCode)) }}</td>
                        <td>{{ iconv('UTF-8', 'UTF-8//IGNORE', e($record->context)) }}</td>
                        <td>{{ iconv('UTF-8', 'UTF-8//IGNORE', e($record->standard)) }}</td>
                        <td>{{ iconv('UTF-8', 'UTF-8//IGNORE', e($record->wcag_level)) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
