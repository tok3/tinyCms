<div>
    <x-filament::modal id="move-block-modal">
        <x-slot name="title">
            Block verschieben
        </x-slot>

        <div class="space-y-4">
            <label for="newPage">Zielseite wählen:</label>
            <select wire:model="newPageId" id="newPage" class="block w-full border-gray-300 rounded-md shadow-sm">
                <option value="">-- Seite auswählen --</option>
                @foreach($pages as $id => $title)
                    <option value="{{ $id }}">{{ $title }}</option>
                @endforeach
            </select>
        </div>

        <x-slot name="footer">
            <x-filament::button wire:click="moveBlock" wire:loading.attr="disabled">
                Verschieben
            </x-filament::button>
        </x-slot>
    </x-filament::modal>
</div>
