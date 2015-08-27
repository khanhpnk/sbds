<!DOCTYPE html>
<html>
<head>
  @include('_head')
  @section('style')
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link href="/css/layout.css" rel="stylesheet">
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

  @include('_javascript')
</body>
</html>