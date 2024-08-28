@props(['messages'])

@if ($messages)
    <dl {{ $attributes->merge(['class' => 'text-danger']) }}>
        @foreach ((array) $messages as $message)
            <dd>{{ $message }}</dd>
        @endforeach
    </dl>
@endif
