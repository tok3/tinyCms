{{-- resources/views/filament/dashboard/widgets/agency-create-customer.blade.php --}}
<div class="rounded-xl border p-5 space-y-4">
    <div class="text-lg font-semibold">Neuen Kunden anlegen</div>
    <p class="text-sm text-gray-600">
        Kunde wird dieser Agentur zugeordnet. Abrechnung läuft (vorerst) über die Agentur.
    </p>

    <form wire:submit.prevent="createCustomer" class="space-y-3">
        <div>
            <label class="block text-sm font-medium mb-1">Firmenname / Domain</label>
            <input type="text" wire:model.defer="name" class="fi-input w-full" />
            @error('name') <p class="text-danger-600 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block text-sm font-medium mb-1">Kontakt-E-Mail (optional)</label>
            <input type="email" wire:model.defer="email" class="fi-input w-full" />
            @error('email') <p class="text-danger-600 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <div class="flex justify-end">
            <x-filament::button type="submit">Anlegen</x-filament::button>
        </div>
    </form>
</div>
