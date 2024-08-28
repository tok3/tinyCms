@auth
    @php
        $path = auth()->user()->is_admin ? 'admin' : 'dashboard';
    @endphp
    <a href="{{ URL::asset('/'.$path) }}" class="btn btn-gray-200 btn-sm">Dashboard</a>
@else
    <a href="{{ URL::asset('/login') }}" class="btn btn-success btn-sm">Login</a>
@endauth
