@auth
    <a href="{{ url(auth()->user()->getPanelUri()) }}" class="btn btn-gray-200 btn-sm">Dashboard</a>
@else
    <a href="{{ URL::asset('/login') }}" class="btn btn-success btn-sm">Login</a>
@endauth
