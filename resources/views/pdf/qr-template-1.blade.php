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
            src: url({{ storage_path("fonts/Pacifico/Pacifico-Regular.ttf") }}) format("truetype");
        }

        body {
            font-family: 'Merriweather';
            background: url("{{ public_path('assets/img/qr-bg/bg-blue1.png') }}");
            background-position: center; /* Zentriert das Bild */
            background-size: cover; /* Skaliert das Bild, sodass es den Container vollständig abdeckt */
            background-repeat: no-repeat; /* Verhindert das Wiederholen des Bildes */
            text-align: center;
            width: 100%;
            font-size: 1.5em;
        }

        .h1 {
            font-family: "Pacifico", Calibri, Candara, Segoe, Segoe UI, Optima, Arial, sans-serif;
            color: #1b74aa;
        }
        .h1 {
            font-family: "Pacifico", Calibri, Candara, Segoe, Segoe UI, Optima, Arial, sans-serif;
            color: #1b74aa;
        }

        .h2 {
            font-family: "Pacifico", Calibri, Candara, Segoe, Segoe UI, Optima, Arial, sans-serif;
            color: #1b74aa;
        }


        #mainHeading {
            position: relative;
            top: -100px;
            font-size: 4.0em;

        }
        #hint{
            position:relative;
            z-index:10;
            color:#ffffff;
            top:650px;
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
<div style="">
    <span id="mainHeading" class="h1">Scan Mich!</span>


    <img id="code" src="{{storage_path('app/' . $qrCode) }}" alt="qrcode">

    <span id="hint">Einfach Qr-Code Scannen und Instruktionen folgen!</span>
</div>


</body>
</html>
