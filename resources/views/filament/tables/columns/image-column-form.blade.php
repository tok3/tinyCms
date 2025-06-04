<div class="flex flex-col items-left gap-2">
    @if($getState())
        <img src="{{ $getState() }}" alt="Image" class="max-w-xs h-auto rounded" />
    @else
        <span class="text-sm text-gray-600">No image available</span>
    @endif
</div>
