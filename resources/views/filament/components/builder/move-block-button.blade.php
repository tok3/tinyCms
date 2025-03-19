@props(['blockId'])

<button
    type="button"
    class="filament-button flex items-center space-x-2 text-gray-500 hover:text-primary-500"
    wire:click="$emit('openMoveBlockModal', '{{ $blockId }}')"
    title="Block verschieben"
>
    <x-heroicon-o-arrow-right class="h-5 w-5" />
</button>
