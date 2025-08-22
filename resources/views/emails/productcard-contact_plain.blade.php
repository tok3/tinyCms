{{ $data['subject'] ?? 'Kontaktanfrage' }}

Name: {{ $data['name'] }}
Firma: {{ $data['company'] ?? '–' }}
Kontakt: {{ $data['contact'] }}
Seite: {{ $data['page_slug'] ?? '–' }}
Block-Index: {{ $data['block_index'] ?? '–' }}

Nachricht:
{{ $data['message'] ?? '(Keine Nachricht angegeben)' }}
