<x-filament::widget>
    <x-filament::card>
        <h2>Test File Upload</h2>
        <form wire:submit.prevent="submit" enctype="multipart/form-data">
            {{ $this->form }}
            <x-filament::button type="submit">Submit</x-filament::button>
        </form>
    </x-filament::card>
</x-filament::widget>
