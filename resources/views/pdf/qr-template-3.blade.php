<?php

use App\Helpers\FontHelper;

$mainHeadingTop = "30px";
$smallTop = "135px";
$hintTop = "930px";
$imprintTop = "1050px";
$h1FontSize = "4.0em";
if (isset($settings['h1']))
{

    if ($settings['h1'] == 'Pacifico-Regular')
    {
        // default


    }

    if ($settings['h1'] == 'Unbounded-Medium')
    {


    }
    if ($settings['h1'] == 'Poppins-Medium')
    {
       /* $mainHeadingTop = "-80px";
        $hintTop = "640px";
        $smallTop = "-100px";
        $imprintTop = "750px";*/
    }

if ($settings['h1'] == 'Baloo2-Regular')
    {
        $mainHeadingTop = "-100px";
        $smallTop = "-120px";
        $hintTop = "620px";
        $imprintTop = "720px";
    }

    $h1Font = FontHelper::getFontPath(storage_path('userfonts'), $settings['h1']);
}


?>
    <!DOCTYPE html>
<html>
<head>
    <title>Newsletter Registrieren</title>

    <link rel="stylesheet" href="{{ public_path('assets/css/pdf.css') }}" type="text/css">
    <style type="text/css">
        * {
            margin: 0;
            padding: 0;

            background-repeat: no-repeat;
            background-size: auto;
        }

        @font-face {
            font-family: 'Merriweather';
            src: url({{ storage_path("fonts/Merriweather/Merriweather-Regular.ttf") }}) format("truetype");
        }

        @font-face {
            font-family: 'Pacifico';
            @if(isset($h1Font))
                src: url({{ storage_path($h1Font) }}) format("truetype");
            @else
                src: url({{ storage_path("fonts/Pacifico/Pacifico-Regular.ttf") }}) format("truetype");
        @endif



        }

        @font-face {
            font-family: 'Lato';
            src: url({{ storage_path("fonts/Lato/Lato-Regular.ttf") }}) format("truetype");
        }

        body {
            font-family: 'Merriweather';
            background: url("{{storage_path('app/public/'.$bgGradientImg) }}");
            background-position: center; /* Zentriert das Bild */
            background-size: 700px;
            background-repeat: no-repeat; /* Verhindert das Wiederholen des Bildes */
            text-align: center;
            width: 100%;
            height: 100%;
            font-size: 1.5em;
            background-position: 50px 150px;
            margin:0;
            padding:0;
        }

        .h1 {
            font-family: "Pacifico", Calibri, Candara, Segoe, Segoe UI, Optima, Arial, sans-serif;
            color: #1b74aa;
        }

        .h1 {
            font-family: "Pacifico", Calibri, Candara, Segoe, Segoe UI, Optima, Arial, sans-serif;
            color: {{$h1Col}};

        }

        .h2 {
            font-family: "Pacifico", Calibri, Candara, Segoe, Segoe UI, Optima, Arial, sans-serif;
            color: {{$h2Col}};
        }


        #mainHeading {
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
            top: {{$mainHeadingTop}};
            font-size: {{$h1FontSize}};
            text-align: center;
            white-space:nowrap;


        }

        #smallTop {
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
line-height:2.3em;
            z-index: 10;
            top: {{$smallTop}};
        }

        #hint {
            position: relative;
            z-index: 10;
            color: {{$hintCol}};
            top: {{$hintTop}};
        }

        #imprint {
            position: relative;
            z-index: 10;
            color: {{$imprintCol}};
            top: {{$imprintTop}};
            font-size: 0.5em;
            font-family: "Lato";
        }

        #code {
            position: fixed;
            left: 50%; /* Setzt den linken Rand des Elements in die Mitte des Viewports */
            transform: translateX(-50%); /* Verschiebt das Element horizontal um 50% seiner eigenen Breite zurück nach links */
            width: 75%;
            top: 300px;
        }
    </style>
</head>
<body>

    <div id="mainHeading" class="h1">{{$text['heading']}}</div>
    <div id="smallTop">{!!nl2br($text['small_top']) !!}</div>
    <img id="code" src="{{storage_path('app/' . $qrCode) }}" alt="qrcode">

    <span id="hint">{{$text['hintBottom']}}</span>


<div id="imprint">Impressum: {{$company->name}} {{$company->name_2}}, {{$company->str}}, {{$company->plz}} {{$company->ort}}</div>

</body>
</html>
