<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <meta name="description" content="@yield('meta_description', 'Default')" >
  <meta name="keywords" content="@yield('meta_keywords', 'Default')">
  <meta name="author" content="Phạm Ngọc Khánh" >

  <title>@yield('meta_title', 'Default')</title>
  <link rel="icon" href="/images/favicon.ico">

  @section('style')
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link href="/css/app.css" rel="stylesheet">
    <link href="/css/manage.css" rel="stylesheet">
  @show
</head>
<body>
  <nav class="navbar navbar-default">
    <div class="container">
      @include('_nav')
    </div>
  </nav>

  <div class="container">
    <div class="row">
      <aside class="col-md-3 sidebar">
        @include('manage.messages._sidebar')
      </aside>
      <main class="col-md-9 main">
        @yield('content')
      </main>
    </div>
  </div>

  <footer class="footer">
    <div class="container">
      @include('_footer')
    </div>
  </footer>

  @section('javascript')
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script>
      // CSRF protection for your AJAX based applications
      $.ajaxSetup({
        headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' }
      });
    </script>
    <script src="/js/app.js"></script>
  @show
</body>
</html>