Neuer Beitrag zum Barrierefreiheitsatlas

Gemeldete Webadresse:
{!! $contribution['page_url'] !!}

Was hat nicht funktioniert?
{!! $contribution['body'] !!}

@if(!empty($contribution['expected_help']))
Was hätte geholfen?
{!! $contribution['expected_help'] !!}

@endif
E-Mail für Rückfragen: {!! !empty($contribution['email']) ? $contribution['email'] : 'nicht angegeben' !!}
Eingegangen am {{ $contribution['submitted_at']->format('d.m.Y H:i') }} Uhr
