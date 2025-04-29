<div
    @class([
        'rounded-md p-4 text-sm',
        match ($getType()) {
            'success' => 'bg-green-100 text-green-800',
            'warning' => 'bg-yellow-100 text-yellow-800',
            'error' => 'bg-red-100 text-red-800',
            default => 'bg-blue-100 text-blue-800',
        }
    ])
>

    {!! $getContent() !!}
</div>
