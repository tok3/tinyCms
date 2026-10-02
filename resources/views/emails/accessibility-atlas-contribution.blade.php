@extends('layouts.mail-2')

@section('content')
    <h2 style="margin:0 0 20px;font:22px Arial,sans-serif;color:#091543;">
        Neuer Beitrag zum Barrierefreiheitsatlas
    </h2>

    <p style="margin:0 0 8px;font:14px/1.5 Arial,sans-serif;color:#555;">Gemeldete Webadresse</p>
    <p style="margin:0 0 22px;font:16px/1.5 Arial,sans-serif;word-break:break-all;">
        <a href="{{ $contribution['page_url'] }}">{{ $contribution['page_url'] }}</a>
    </p>

    <p style="margin:0 0 8px;font:14px/1.5 Arial,sans-serif;color:#555;">Was hat nicht funktioniert?</p>
    <p style="margin:0 0 22px;font:16px/1.6 Arial,sans-serif;color:#222;">
        {!! nl2br(e($contribution['body'])) !!}
    </p>

    @if(!empty($contribution['expected_help']))
        <p style="margin:0 0 8px;font:14px/1.5 Arial,sans-serif;color:#555;">Was hätte geholfen?</p>
        <p style="margin:0 0 22px;font:16px/1.6 Arial,sans-serif;color:#222;">
            {!! nl2br(e($contribution['expected_help'])) !!}
        </p>
    @endif

    <hr style="margin:24px 0;border:0;border-top:1px solid #ddd;">

    <p style="margin:0 0 8px;font:14px/1.5 Arial,sans-serif;color:#555;">
        E-Mail für Rückfragen:
        {{ !empty($contribution['email']) ? $contribution['email'] : 'nicht angegeben' }}
    </p>
    <p style="margin:0;font:14px/1.5 Arial,sans-serif;color:#555;">
        Eingegangen am {{ $contribution['submitted_at']->format('d.m.Y H:i') }} Uhr
    </p>
@endsection
