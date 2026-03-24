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
        Ihre Analyse wartet auf Sie
    </h2>

    <p style="margin:0 0 12px;font:15px/1.5 Arial, sans-serif;color:#333;">
        Ihre Website wurde bereits geprüft – dabei wurden Barrieren festgestellt.
    </p>

    <p style="margin:0 0 20px;font:15px/1.5 Arial, sans-serif;color:#333;">
        👉 Sie können die Ergebnisse jederzeit wieder aufrufen:
    </p>

    <table role="presentation" align="center" cellpadding="0" cellspacing="0" border="0" style="margin:24px auto;">
        <tr>
            <td bgcolor="#2d6cdf" style="border-radius:4px;">
                <a href="{{ $magicLoginUrl }}" style="font:16px Arial, sans-serif;color:#fff;text-decoration:none;padding:12px 24px;display:inline-block;border-radius:4px;">
                    Ergebnisse ansehen
                </a>
            </td>
        </tr>
    </table>

    <small style="display:block;margin-top:10px;text-align:center;font:13px Arial, sans-serif;color:#666;">
        Sollte der Button nicht funktionieren, öffnen Sie bitte folgenden Link:<br>
        <a href="{{ $magicLoginUrl }}" style="word-break:break-all;color:#2d6cdf;">
            {{ $magicLoginUrl }}
        </a>
    </small>

    <p style="margin:20px 0 12px;font:15px/1.5 Arial, sans-serif;color:#333;">
        Ihre Website verändert sich ständig – neue Inhalte und Seiten können jederzeit neue Barrieren verursachen.
    </p>

    <p style="margin:0 0 20px;font:15px/1.5 Arial, sans-serif;color:#333;">
        Lassen Sie mit unseren Tools alle URLs Ihrer Domain automatisch erfassen und regelmäßig auf Barrieren überprüfen. So behalten Sie den Überblick und dokumentieren Ihren Fortschritt nachvollziehbar.
    </p>

    <p style="margin:20px 0 4px;font:15px Arial, sans-serif;color:#333;">Danke,</p>
    <p style="margin:0;font:15px Arial, sans-serif;color:#333;">
        Ihr {{ config('app.name') }} Team
    </p>
@endsection
