<!DOCTYPE html>
<html>
<head>
  @include('_head')
  @section('style')
  @show
  @section('jshead')
  @show
</head>
<body>
  {{--Initialize the JavaScript SDK--}}
  <div id="fb-root"></div>
  <script>(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.4&appId=674952055924751";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));</script>

  <nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
      @include('_nav')
    </div>
  </nav>

  @if(Request::is('thiet-ke-thi-cong'))
    <img style="width:100%;" src=" {{ ImageHelper::link('banner/' . $banner->image) }}">
  @else
    <section class="map-container">
      @include('_map')
    </section>
  @endif

  <section class="breadcrumb-container">
    <div class="container">
      <ol class="breadcrumb">
        <li><a href="/">Trang chủ</a></li>
        @yield('breadcrumb')
      </ol>
    </div>
  </section>

  <div class="container">
    <div class="row">
      <main class="col-md-12 main">
        @yield('content')
      </main>
    </div>
  </div>

  <footer class="footer">
    <div class="container">
      @include('_footer')
    </div>
  </footer>

  @include('_jsfooter')
  @section('javascript')
  @show
</body>
</html>