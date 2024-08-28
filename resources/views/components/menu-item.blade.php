<li class="{{ $hasChildren ? 'nav-item dropdown' : 'nav-item' }}" >
    <a href="{{ $url }}" class="{{ $hasChildren ? 'dropdown-toggle' : 'nav-item' }} nav-link   @if(\Request::segment(1) == $slug || \Request::segment(1) == '' && $slug == '/' || $lastSegment == last(explode('/', $url))  )active @endif" {{ $hasChildren ? 'dropdown-toggle' : '' }}" {{ $hasChildren ? 'data-bs-toggle=dropdown' : '' }}>{{ $name}}</a>
    @if($hasChildren)
        <div class="dropdown-menu">{!!  $slot !!}</div>
    @endif
</li>
