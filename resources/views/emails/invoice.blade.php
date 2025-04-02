@extends('layouts.mail')

@section('content')
    <div class="container">
        <!-- Header mit Logo -->
        <div class="header">
            <img src="{{ url('assets/img/logo/logo.png') }}" alt="Logo Aktion Barrierefrei" style="width:200px;">
        </div>

        <!-- Inhalt der E-Mail -->
        <div class="content">
            <p>Guten Tag,</p>
            <p>Vielen Dank für Ihr Vertrauen.<br> Im Anhang finden Sie die aktuelle Rechnung für unseren Service. Sie können die Rechnungen auch jederzeit im Backend von <a href="{{ url('/') }}">{{ config('app.name') }}</a> laden. Sollten Sie Fragen haben, stehen wir Ihnen gerne zur Verfügung.</p>

            <p>Mit freundlichen Grüßen,<br>Ihr {{ config('app.name') }} Team</p>
        </div>

        <!-- Footer -->
        <div class="footer">
            <sub>© {{ date('Y') }} camindu GmbH. Alle Rechte vorbehalten.</sub>
        </div>
    </div>
@endsection
