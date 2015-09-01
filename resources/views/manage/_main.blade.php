<div class="main-head">
  <h3>@yield('title')</h3>
</div>

<div class="main-body">
  @include('partial._flash')
  @include('errors._list')
  @yield('content')
</div>