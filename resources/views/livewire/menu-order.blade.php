<div class="whitespace-nowrap">

    <div>
        {{-- "Nach oben verschieben" Button --}}
        @if($this->canMoveUp($menuItem->id))
            <a class="inline whitespace-nowrap cursor-pointer" wire:click="moveUp({{ $menuItem->id }})">
                @php
                    if($menuItem->parent_id == '')
                        {
                    $iconpath = "M14 8a.75.75 0 0 1-.75.75H4.56l3.22 3.22a.75.75 0 1 1-1.06 1.06l-4.5-4.5a.75.75 0 0 1 0-1.06l4.5-4.5a.75.75 0 0 1 1.06 1.06L4.56 7.25h8.69A.75.75 0 0 1 14 8Z";
                    }
                    else
                        {
                    $iconpath ="M8 14a.75.75 0 0 1-.75-.75V4.56L4.03 7.78a.75.75 0 0 1-1.06-1.06l4.5-4.5a.75.75 0 0 1 1.06 0l4.5 4.5a.75.75 0 0 1-1.06 1.06L8.75 4.56v8.69A.75.75 0 0 1 8 14Z";
                    }
                @endphp

                <svg xmlns="http://www.w3.org/2000/svg" ; viewBox="0 0 16 16" fill="currentColor" class="w-4 h-4 inline text-gray-400">
                    <path fill-rule="evenodd"
                          d="{{$iconpath}}"
                          clip-rule="evenodd"/>
                </svg>

            </a>
        @endif

        {{-- "Nach unten verschieben" Button --}}
        @if($this->canMoveDown($menuItem->id))
            <a class="inline whitespace-nowrap cursor-pointer" wire:click="moveDown({{ $menuItem->id }})">

                @php
                    if($menuItem->parent_id == '')
                        {
                    $iconpath = "M2 8a.75.75 0 0 1 .75-.75h8.69L8.22 4.03a.75.75 0 0 1 1.06-1.06l4.5 4.5a.75.75 0 0 1 0 1.06l-4.5 4.5a.75.75 0 0 1-1.06-1.06l3.22-3.22H2.75A.75.75 0 0 1 2 8Z";
                    }
                    else
                        {
                    $iconpath ="M8 2a.75.75 0 0 1 .75.75v8.69l3.22-3.22a.75.75 0 1 1 1.06 1.06l-4.5 4.5a.75.75 0 0 1-1.06 0l-4.5-4.5a.75.75 0 0 1 1.06-1.06l3.22 3.22V2.75A.75.75 0 0 1 8 2Z";
                    }
                @endphp

                <svg xmlns="http://www.w3.org/2000/svg" ; viewBox="0 0 16 16" fill="currentColor" class="w-4 h-4 inline  text-gray-400">
                    <path fill-rule="evenodd"
                          d="{{$iconpath}}"
                          clip-rule="evenodd"/>
                </svg>

            </a>
        @endif

    </div>


</div>
