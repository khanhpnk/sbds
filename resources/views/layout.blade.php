<!DOCTYPE html>
<html>
<head>
  @include('_head')
  <meta property="og:url"           content="http://house360.vn/nha-dat/nha-pho-spring-house-pham-van-dong-duc-3-tam" />
  <meta property="og:type"          content="website" />
  <meta property="og:title"         content="Your Website Title" />
  <meta property="og:description"   content="Your description" />
  <meta property="og:image"         content="https://s3-ap-southeast-1.amazonaws.com/house360/house/28/large161650.14112015.0.jpg" />
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
    @include('_nav')
  </nav>

  @if(!Request::is('thiet-ke*'))
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
      <main class="col-md-9 main">
        @yield('content')
      </main>
      <aside class="col-md-3 sidebar">
        @include('_sidebar')
      </aside>
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