<div>
    <p>Du hast das maximale Limit von {{$this->getRecord()->max_urls}} URLs erreicht. Bitte upgrade deinen Plan, um weitere URLs hinzuzufügen.</p>

    <div class="mt-4 flex justify-end gap-4">
        <x-filament::button wire:click="$dispatch('close-modal', { id: 'create-url-limit-reached' })">
            Abbrechen
        </x-filament::button>

        <x-filament::button color="primary" tag="a" href="{{ route('upgrade-page') }}">
            Upgrade jetzt
        </x-filament::button>
    </div>
</div>
