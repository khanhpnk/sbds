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
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
</head>
<body>
  @include('_facebook_sdk')

  <nav class="navbar navbar-default">
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
        <li><a href="#">Tin nổi bật</a></li>
        <li class="active">Cho thuê chung cư cao cấp</li>
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
    <script src="{{ asset('js/layout.js') }}"></script>
  @show
</body>
</html>