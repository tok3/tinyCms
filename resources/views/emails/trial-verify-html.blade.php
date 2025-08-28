@extends('layouts.mail-2')

@section('content')
    @php $logoUrl = rtrim(config('app.url'), '/') . '/assets/img/logo/logo.png'; @endphp

    <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0">
        <tr>
            <td align="left" style="padding-bottom:20px;">
                <img src="{{ $logoUrl }}" alt="Aktion Barrierefrei" width="200" style="display:block;border:0;outline:none;text-decoration:none;">
            </td>
        </tr>
    </table>

    <h2 style="margin:0 0 16px;font:20px Arial, sans-serif;color:#111;">Analyse freischalten</h2>

    <p style="margin:0 0 12px;font:15px/1.5 Arial, sans-serif;color:#333;">
        Sie haben die detaillierte Einsicht für
        <strong style="word-break:break-all;">{{ $scannedUrl }}</strong> angefordert.
    </p>

    <p style="margin:0 0 20px;font:15px/1.5 Arial, sans-serif;color:#333;">
        Bitte bestätigen Sie Ihre E-Mail-Adresse, um die Auswertung zu öffnen:
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

    <small>                    Sollte der Button nicht funktionieren, rufen Sie bitte folgende URL in Ihrem Browser auf: <a href="{{ $verifyUrl }}" style="word-break:break-all;">
                {{ $verifyUrl }}
            </a></small>

    <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0" style="margin:20px 0;border:1px solid #e5e7eb;border-radius:6px;background:#f8fafc;">
        <tr>
            <td style="padding:16px;font:15px/1.5 Arial, sans-serif;color:#111;">
                <strong>Zugangsdaten:</strong><br>
                E-Mail: <em style="color:#1f2937;">{{ $userEmail ?? 'diese Adresse' }}</em><br>
                Passwort: {{ $plainPassword }}
            </td>
        </tr>
    </table>


    <p style="margin:0 0 10px;font:15px/1.5 Arial, sans-serif;color:#333;">
        <strong>Hinweis:</strong> Das Passwort können Sie nach dem Login jederzeit im Backend ändern.
    </p>
    <p style="margin:0 0 20px;font:15px/1.5 Arial, sans-serif;color:#333;">
        Der Link ist 48&nbsp;Stunden gültig.
    </p>

    <p style="margin:0 0 4px;font:15px/1.5 Arial, sans-serif;color:#333;">Danke,</p>
    <p style="margin:0;font:15px/1.5 Arial, sans-serif;color:#333;">Ihr {{ config('app.name') }} Team</p>
@endsection
