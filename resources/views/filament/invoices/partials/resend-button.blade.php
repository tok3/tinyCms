@php
    $invoice = $record;
@endphp

<x-filament::section>
    <x-slot name="heading">Rechnung erneut senden</x-slot>

    <x-filament::button
        color="primary"
        wire:click="$dispatch('open-modal', { id: 'resend-invoice-{{ $invoice->id }}' })"
        icon="heroicon-o-paper-airplane"
    >
        Erneut senden
    </x-filament::button>

    <x-filament::modal id="resend-invoice-{{ $invoice->id }}">
        <x-slot name="header">Rechnung erneut senden</x-slot>

        <form method="POST" action="{{ route('invoices.resend', $invoice) }}">
            @csrf

            <x-filament::input
                name="receiver"
                label="Empfängeradresse"
                type="email"
                value="{{ old('receiver', $invoice->company->email) }}"
                required
            />

            <x-filament::button type="submit" color="primary" class="mt-4">
                Senden
            </x-filament::button>
        </form>
    </x-filament::modal>
</x-filament::section>
