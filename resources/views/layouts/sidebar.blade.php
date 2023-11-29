@if( (Auth::user()->role) == 'admin' )
    {{ Auth::user()->role }}
    @include('layouts.sidebar.admin')
@elseif( (Auth::user()->role) == 'employee' )
    {{ Auth::user()->role }}
    @include('layouts.sidebar.employee')
@endif
