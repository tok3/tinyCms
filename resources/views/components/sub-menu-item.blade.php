@if(count($hasChildren) == 0)

<a class="dropdown-item @if( $lastSegment == last(explode('/', $url))  )active @endif" href="{{ $url }}">{!!  $name !!}</a>
@else

    <div class="dropend">

        <a class="dropdown-item dropdown-toggle  @if(\Request::segment(2)== $slug)active @endif" data-bs-toggle="dropdown" href="#">{!!  $name  !!}  </a>
        <div class="dropdown-menu">
            @foreach ($hasChildren as $child)
                <x-sub-menu-item :name="$child->name" :lastSegment="$lastSegment" :slug="$slug" :url="url($child->fullPath)" :hasChildren="[]"></x-sub-menu-item>
            @endforeach

        </div>
    </div>

@endif
