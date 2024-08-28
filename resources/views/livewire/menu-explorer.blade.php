<table class="table-auto relative mb-4  rounded text-gray-800" style="margin-left:-20px !important; ">
    <tr>
        @foreach($menuItems as $menuItem)
            <td class="align-text-top align-text-top align-top pr-1 width-auto">

                <ul>
                    <li class="px-2 hover:bg-secondary-100">
                        <span class="flex items-center px-2 hover:bg-secondary-100 focus:text-success active:text-primary ">
                            @if($menuItem->children->isNotEmpty())
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="h-4 w-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5"/>
                                </svg>
                            @endif
                            <a @if($menuItem->id == $id)style="color: rgb(16 185 129);" @endif href="{{\App\Filament\Resources\Admin\MenuItemResource::getUrl('edit', ['record' => $menuItem->id])}}"
                               class="whitespace-nowrap"> {{ $menuItem->name }}</a>&nbsp;

                                @include('livewire.menu-order', ['menuItem' => $menuItem, 'id'=>$id])


                            @if($menuItem->page_id !="")

                                <a href="{{\App\Filament\Resources\Admin\PageResource::getUrl('edit', ['record' => $menuItem->page_id])}}" class="whitespace-nowrap ml-1.5">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16"
                                         fill="currentColor" class="w-4 h-4">
                                <path
                                        d="M13.488 2.513a1.75 1.75 0 0 0-2.475 0L6.75 6.774a2.75 2.75 0 0 0-.596.892l-.848 2.047a.75.75 0 0 0 .98.98l2.047-.848a2.75 2.75 0 0 0 .892-.596l4.261-4.262a1.75 1.75 0 0 0 0-2.474Z"/>
                                 <path
                                         d="M4.75 3.5c-.69 0-1.25.56-1.25 1.25v6.5c0 .69.56 1.25 1.25 1.25h6.5c.69 0 1.25-.56 1.25-1.25V9A.75.75 0 0 1 14 9v2.25A2.75 2.75 0 0 1 11.25 14h-6.5A2.75 2.75 0 0 1 2 11.25v-6.5A2.75 2.75 0 0 1 4.75 2H7a.75.75 0 0 1 0 1.5H4.75Z"/>
</svg></a>

                                <a href="{{url($menuItem->full_path)}}" target="top" class="whitespace-nowrap  pl-1.5">  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor"
                                                                                                                              class="w-4 h-4">

                                        <path fill-rule="evenodd"
                                              d="M3.757 4.5c.18.217.376.42.586.608.153-.61.354-1.175.596-1.678A5.53 5.53 0 0 0 3.757 4.5ZM8 1a6.994 6.994 0 0 0-7 7 7 7 0 1 0 7-7Zm0 1.5c-.476 0-1.091.386-1.633 1.427-.293.564-.531 1.267-.683 2.063A5.48 5.48 0 0 0 8 6.5a5.48 5.48 0 0 0 2.316-.51c-.152-.796-.39-1.499-.683-2.063C9.09 2.886 8.476 2.5 8 2.5Zm3.657 2.608a8.823 8.823 0 0 0-.596-1.678c.444.298.842.659 1.182 1.07-.18.217-.376.42-.586.608Zm-1.166 2.436A6.983 6.983 0 0 1 8 8a6.983 6.983 0 0 1-2.49-.456 10.703 10.703 0 0 0 .202 2.6c.72.231 1.49.356 2.288.356.798 0 1.568-.125 2.29-.356a10.705 10.705 0 0 0 .2-2.6Zm1.433 1.85a12.652 12.652 0 0 0 .018-2.609c.405-.276.78-.594 1.117-.947a5.48 5.48 0 0 1 .44 2.262 7.536 7.536 0 0 1-1.575 1.293Zm-2.172 2.435a9.046 9.046 0 0 1-3.504 0c.039.084.078.166.12.244C6.907 13.114 7.523 13.5 8 13.5s1.091-.386 1.633-1.427c.04-.078.08-.16.12-.244Zm1.31.74a8.5 8.5 0 0 0 .492-1.298c.457-.197.893-.43 1.307-.696a5.526 5.526 0 0 1-1.8 1.995Zm-6.123 0a8.507 8.507 0 0 1-.493-1.298 8.985 8.985 0 0 1-1.307-.696 5.526 5.526 0 0 0 1.8 1.995ZM2.5 8.1c.463.5.993.935 1.575 1.293a12.652 12.652 0 0 1-.018-2.608 7.037 7.037 0 0 1-1.117-.947 5.48 5.48 0 0 0-.44 2.262Z"
                                              clip-rule="evenodd"/>
                                        </svg></a>

                            @endif
                            @if($menuItem->children->isNotEmpty() && ($menuItem->page_id != ""))

                                <svg style="color: rgb(233 0 0);" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-4 h-4 ml-1.5">
  <path fill-rule="evenodd"
        d="M6.701 2.25c.577-1 2.02-1 2.598 0l5.196 9a1.5 1.5 0 0 1-1.299 2.25H2.804a1.5 1.5 0 0 1-1.3-2.25l5.197-9ZM8 4a.75.75 0 0 1 .75.75v3a.75.75 0 1 1-1.5 0v-3A.75.75 0 0 1 8 4Zm0 8a1 1 0 1 0 0-2 1 1 0 0 0 0 2Z"
        clip-rule="evenodd"/>
</svg>
                            @endif
                        </span>
                        @if($menuItem->children->isNotEmpty())
                            <ul class="!visible visible" id="collapse{{ $menuItem->id }}" data-twe-collapse-item>
                                @foreach($menuItem->children as $child)

                                    @include('components.filament.menu-explorer-sub-menu-item', ['child' => $child, 'id'=>$id])
                                @endforeach

                            </ul>
                        @endif
                    </li>
                </ul>


            </td>
        @endforeach
    </tr>
</table>

