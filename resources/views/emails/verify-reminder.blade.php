@extends('layouts.mail-2')

@section('content')
    @php $logoUrl = rtrim(config('app.url'), '/') . '/assets/img/logo/logo.png'; @endphp

    <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0">
        <tr>
            <td align="left" style="padding-bottom:20px;">
                <img src="{{ $logoUrl }}" alt="Aktion Barrierefrei" width="200" style="display:block;border:0;">
            </td>
        </tr>
    </table>

    <h2 style="margin:0 0 16px;font:20px Arial, sans-serif;color:#111;">
        Analyse noch nicht aktiviert
    </h2>

    <p style="margin:0 0 12px;font:15px/1.5 Arial, sans-serif;color:#333;">
        Ihre Auswertung für
        <strong style="word-break:break-all;">
            {{ $scannedUrl ?? 'Ihre Website' }}
        </strong>
        ist bereits fertig.
    </p>

    <p style="margin:0 0 20px;font:15px/1.5 Arial, sans-serif;color:#333;">
        👉 Sie müssen nur noch Ihre E-Mail bestätigen, um die Ergebnisse zu sehen:
    </p>

    <table role="presentation" align="center" cellpadding="0" cellspacing="0" border="0" style="margin:24px auto;">
        <tr>
            <td bgcolor="#2d6cdf" style="border-radius:4px;">
                <a href="{{ $verifyUrl }}" style="font:16px Arial, sans-serif;color:#fff;text-decoration:none;padding:12px 24px;display:inline-block;border-radius:4px;">
                    Analyse freischalten
                </a>
            </td>
        </tr>
    </table>

    <small>
        Sollte der Button nicht funktionieren, rufen Sie bitte folgende URL in Ihrem Browser auf:<br>
        <a href="{{ $verifyUrl }}" style="word-break:break-all;">
            {{ $verifyUrl }}
        </a>
    </small>

    <p style="margin:20px 0 0;font:15px/1.5 Arial, sans-serif;color:#333;">
        Ihre Analyse wartet bereits – es fehlt nur noch ein Klick.
    </p>

    <p style="margin:20px 0 4px;font:15px Arial, sans-serif;color:#333;">Danke,</p>
    <p style="margin:0;font:15px Arial, sans-serif;color:#333;">
        Ihr {{ config('app.name') }} Team
    </p>
@endsection
