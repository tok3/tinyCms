@extends('layouts.mail-2')

@section('content')
    @php $logoUrl = rtrim(config('app.url'), '/') . '/assets/img/logo/logo.png'; @endphp

    <p><strong>Neue Rückmeldung zur Barrierefreiheit</strong></p>

    <p>Es ist eine neue Rückmeldung eingegangen.</p>

    <p>
        <strong>Von:</strong> {{ $feedback->first_name }} {{ $feedback->last_name }}<br>
        <strong>E-Mail:</strong> {{ $feedback->email }}<br>
        <strong>Seite:</strong> {{ $feedback->page_url ?? '—' }}
    </p>

    <p><strong>Nachricht:</strong></p>
    <p>{{ $feedback->body }}</p>

    <hr>

    <p>
        Sie können diese Rückmeldung im Dashboard einsehen:<br>
        <a href="{{ url('/dashboard') }}">{{ url('/dashboard') }}</a>
    </p>

    <p>
        Mit freundlichen Grüßen<br>
        Ihr Aktion-Barrierefrei Team
    </p>

@endsection
