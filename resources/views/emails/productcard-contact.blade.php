<h2>{{ $data['subject'] ?? 'Kontaktanfrage' }}</h2>

<p><strong>Name:</strong> {{ $data['name'] }}</p>
<p><strong>Firma:</strong> {{ $data['company'] ?? '–' }}</p>
<p><strong>Kontakt (E-Mail/Telefon):</strong> {{ $data['contact'] }}</p>
<p><strong>Seite:</strong> {{ $data['page_slug'] ?? '–' }}</p>
<p><strong>Block-Index:</strong> {{ $data['block_index'] ?? '–' }}</p>

<hr>

@if(!empty($data['message']))
    <p>{!! nl2br(e($data['message'])) !!}</p>
@else
    <p>(Keine Nachricht angegeben)</p>
@endif
