<p>Hallo {{ $user->name ?? 'Interessent' }},</p>

<p>
    Sie haben Ihre Website kürzlich auf Barrierefreiheit geprüft.
</p>

<p>
    Dabei wurden bereits erste Verbesserungspotenziale sichtbar.
</p>

<p>
    Wenn Sie möchten, können Sie diese jetzt direkt angehen.
</p>

<p>
    <a href="https://aktion-barrierefrei.org/produkte/fixstern">
        Jetzt Barrieren reduzieren
    </a>
</p>
<p>
    <a href="{{ $magicLoginUrl }}" style="display:inline-block;padding:12px 20px;background:#6c5ce7;color:#fff;text-decoration:none;border-radius:6px;">
        Zum Dashboard
    </a>
</p>
<p>
    Bei Fragen antworten Sie einfach auf diese E-Mail.
</p>
