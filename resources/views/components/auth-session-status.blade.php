@props(['status'])

@if ($status)
    <div {{ $attributes->merge(['class' => 'alert alert-success']) }}>
        <h5>Vielen Dank,</h5>
        <p>
        {{ $status }}
        </p>
    </div>
@endif
