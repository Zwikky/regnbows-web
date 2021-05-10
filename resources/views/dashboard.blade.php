<!-- @if(Auth::user()->rights === 'admin') -->
@include('admin-dashboard')
<!-- @endif
@if(Auth::user()->rights === 'user')
@include('user-dashboard')
@endif -->