<x-filament::widget>
    <x-filament::card>
        <h2 class="text-lg font-semibold mb-4">PDF Hash Checker</h2>
        <form wire:submit.prevent="submit" class="space-y-4" enctype="multipart/form-data">
            {{ $this->form }}
            <x-filament::button type="submit" color="primary" wire:loading.attr="disabled">
                <span wire:loading>Processing...</span>
                <span wire:loading.remove>Submit</span>
            </x-filament::button>
        </form>
    </x-filament::card>
</x-filament::widget>
