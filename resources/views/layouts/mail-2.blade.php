{{-- resources/views/layouts/mail.blade.php --}}
    <!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="utf-8">
    <meta name="x-apple-disable-message-reformatting">
    <meta name="format-detection" content="telephone=no,date=no,address=no,email=no,url=no">
    <meta name="color-scheme" content="light">
    <meta name="supported-color-schemes" content="light">
    <title>@yield('title','')</title>
</head>
<body style="margin:0;padding:0;background:#f5f7fb;">
<table role="presentation" cellpadding="0" cellspacing="0" border="0" width="100%">
    <tr>
        <td align="center" style="padding:24px;">
            <table role="presentation" cellpadding="0" cellspacing="0" border="0" width="600" style="width:600px;max-width:100%;background:#ffffff;border-radius:8px;">
                <tr>
                    <td style="padding:24px;">
                        @yield('content')
                    </td>
                </tr>
            </table>
            <table role="presentation" cellpadding="0" cellspacing="0" border="0" width="600" style="width:600px;max-width:100%;margin-top:16px;">
                <tr>
                    <td align="center" style="font:12px/1.4 Arial, sans-serif;color:#6b7280;padding:8px;">
                        © {{ date('Y') }} Aktion Barrierefrei. Alle Rechte vorbehalten.
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
</body>
</html>
