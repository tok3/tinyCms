@extends('layouts.mail-2')

@section('content')
    @php $logoUrl = rtrim(config('app.url'), '/') . '/assets/img/logo/logo.png'; @endphp

    <p><strong>Neue Rückmeldung zur Barrierefreiheit</strong></p>

    <p>Es ist eine neue Rückmeldung zur Barrierefreiheit Ihrer Website eingegangen.</p>

    <p>
        Die Nachricht können Sie nach dem Login im Dashboard einsehen.
    </p>

    <hr>

    <p>
        <a href="{{ url('/dashboard') }}">Zum Dashboard</a>
    </p>

    <p>
        Mit freundlichen Grüßen<br>
        Ihr Aktion-Barrierefrei Team
    </p>

@endsection
