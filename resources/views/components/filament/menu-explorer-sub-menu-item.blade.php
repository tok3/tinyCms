<li class="ml-4 px-2 hover:bg-secondary-100">
    <span class="flex items-center px-2 hover:bg-secondary-100 focus:text-primary active:text-primary" >
        @if($child->children->isNotEmpty())
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="h-4 w-4">
                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
            </svg>
        @endif
                @include('components.filament.menu-explorer-ctrl', ['menuItem' => $child, 'id'=>$id])


    </span>
    @if($child->children->isNotEmpty())
        <ul class="!visible visible" id="collapse{{ $child->id }}" data-twe-collapse-item>
            @foreach($child->children as $grandChild)
                @include('components.filament.menu-explorer-sub-menu-item', ['child' => $grandChild])
            @endforeach
        </ul>
    @endif
</li>
