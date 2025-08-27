<x-mail::message>
    # Analyse freischalten

    Sie haben die detaillierte Einsicht für **{{ $scannedUrl }}** angefordert.

    Bitte bestätigen Sie Ihre E-Mail-Adresse, um die Auswertung zu öffnen:

    <x-mail::button :url="$verifyUrl">
        Analyse freischalten
    </x-mail::button>

    ---

    **Zugangsdaten:**
    E-Mail: *diese Adresse*
    Passwort: **{{ $plainPassword }}**

    > Hinweis: Das Passwort können Sie nach dem Login jederzeit im Backend ändern.

    Der Link ist 48 Stunden gültig.

    Danke,
    {{ config('app.name') }}
</x-mail::message>
