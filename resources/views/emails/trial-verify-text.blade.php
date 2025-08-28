{{-- resources/views/emails/trial-verify-text.blade.php --}}
Analyse freischalten

Sie haben die detaillierte Einsicht für {{ $scannedUrl }} angefordert.

Bitte bestätigen Sie Ihre E-Mail-Adresse, um die Auswertung zu öffnen:
{{ $verifyUrl }}

Zugangsdaten:
E-Mail: {{ $userEmail ?? 'diese Adresse' }}
Passwort: {{ $plainPassword }}

Hinweis: Das Passwort können Sie nach dem Login jederzeit im Backend ändern.
Der Link ist 48 Stunden gültig.

Danke,
Ihr {{ config('app.name') }} Team
