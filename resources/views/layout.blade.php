<!DOCTYPE html>
<html>
<head>
  @include('_head')
  @section('style')
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link href="{{ asset('css/layout.css') }}" rel="stylesheet">
    <link href="{{ asset('partial') }}" rel="stylesheet">
  @show
  <script src="{{ asset('vendor/jquery-2.1.3.min.js') }}"></script>
</head>
<body>
  {{--Initialize the JavaScript SDK--}}
  <div id="fb-root"></div>
  <script>(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.4&appId=271720459674895";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));</script>

  <nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
      @include('_nav')
    </div>
  </nav>
  
  <div>
    <img style="width:100%;height:500px;border: 1px solid #ccc;" src="{{ UserHelper::avatar() }}">
  </div>

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

  @section('javascript')
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script>
      // CSRF protection for your AJAX based applications
      $.ajaxSetup({
        headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' }
      });
    </script>
    <!-- Custom -->
    <script src="{{ asset('js/function.js') }}"></script>
    <script src="{{ asset('js/layout.js') }}"></script>
    <script src="{{ asset('js/location.js') }}"></script>
  @show
</body>
</html>