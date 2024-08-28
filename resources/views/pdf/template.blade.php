<!DOCTYPE html>
<html>
<head>
    <title>Newsletter Registrieren</title>

    <link rel="stylesheet" href="{{ public_path('assets/css/pdf.css') }}" type="text/css">
    <style type="text/css">

        @font-face {
            font-family: 'Merriweather';
            src: url({{ storage_path("fonts/Merriweather/Merriweather-Regular.ttf") }}) format("truetype");
        }

        @font-face {
            font-family: 'Pacifico';
            src: url({{ storage_path("fonts/Pacifico/Pacifico-Regular.ttf") }}) format("truetype");
        }
            body {
                font-family: 'Merriweather';

            }

            .h1 {
                font-family: "Pacifico", Calibri, Candara, Segoe, Segoe UI, Optima, Arial, sans-serif;
            }
    </style>
</head>
<body>
<div style="text-align:center; width:100%; font-size:1.5em">
<span class="h1">Scan mich !</span>
</div>
    <div style="width: 100%;">
    <div style="width: 75%; float: left;box-sizing: border-box;">
        <div style="text-align:center; width:100%;border: none; padding: 8px;">
            <img width="100%" src="{{storage_path('app/' . $qrCode) }}" alt="qrcode">
        </div>
    </div>
    <div style="width: 25%; float: left; box-sizing: border-box;">
        <div style="border: none; padding: 8px; text-align: right;">
            Impressum<br>
            {{$company->name}}@if($company->name_2 !="")
                <br>{{$company->name_2}}
            @endif
            {{$company->str}}<br>
            {{$company->plz}} {{$company->ort}}
        </div>
    </div>
    <div style="clear: both;"></div>
</div>
<p class="h2">
    Erfahren Sie sofort von neuen Immobilien!
    <br>
    Exclusive Vorabinformationen?<br>

</p>
<p class="h2 strong">
    Jetzt Qr-Code scanen
</p>
</body>
</html>
