@extends('layouts.mail')

@section('content')


    <!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rechnung</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            color: #333;
        }
        .container {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            overflow: hidden;
        }
        .header {
            padding: 10px;
            background-color: #f8f9fa;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }
       .logo{
           width:200px;
       }
        .content {
            padding: 10px;
        }
        .footer {
            padding: 10px;
            background-color: #f8f9fa;
            border-top: 1px solid #ddd;
            text-align: center;
            font-size: 12px;
            color: #777;
        }

    </style>
</head>
<body>

<div class="container">
    <!-- Header mit Logo -->

    {{ url('assets/img/logo/logo.png') }}
    <div class="header">
        <img src="{!!url('assets/img/logo/logo.png') !!}" alt="Logo Aktion Barrierefrei" style="width:200px;">
    </div>

    <!-- Inhalt der E-Mail -->
    <div class="content">
        <p>Guten Tag,</p>
        <p>Vielen Dank für Ihr Vertrauen.<br> Im Anhang finden Sie die aktuelle Rechnung für unseren Service. Sie können die Rechnungen auch jederzeit im Backend von <a href="{{ url('/') }}">{{ config('app.name') }}</a> laden. Sollten Sie Fragen haben, stehen wir Ihnen gerne zur Verfügung.</p>

        <p>Mit freundlichen Grüßen,<br>Ihr {{ config('app.name') }} Team</p>
    </div>

    <!-- Footer -->
    <div>
       <sub> &copy; {{ date('Y') }} camindu GmbH. Alle Rechte vorbehalten.</sub>
    </div>
</div>

</body>
</html>


@endsection
