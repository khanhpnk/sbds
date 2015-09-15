<div class="main-head">
  <h3>@yield('title')</h3>
  {{--<form action="#" class="pull-right">--}}
  {{--<input type="text" class="main-head-input" placeholder="Tìm kiếm tin nhắn">--}}
  {{--<button class="btn main-head-btn" type="button"><i class="fa fa-search-plus"></i></button>--}}
  {{--</form>--}}
</div>

<div class="main-body">
  @include('partial._flash')
  @include('errors._list')
  @yield('content')
</div>