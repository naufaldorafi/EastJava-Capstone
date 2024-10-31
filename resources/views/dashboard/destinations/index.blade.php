@if (Auth::user()->role == 'admin')
  @include('dashboard.destinations.admin')
  @else
  @include('dashboard.destinations.user')
@endif