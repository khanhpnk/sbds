<!DOCTYPE html>
<html>
<head>
  @include('_head')
  @section('style')
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Datepicker -->
    <link href="{{ asset('vendor/pickadate/lib/compressed/themes/default.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/pickadate/lib/compressed/themes/default.date.css') }}" rel="stylesheet">
    <!-- Select2 -->
    <link href="{{ asset('vendor/select2-4.0.0/css/select2.min.css') }}" rel="stylesheet" />
    <!-- Custom -->
    <link href="{{ asset('css/layout.css') }}" rel="stylesheet">
    <link href="{{ asset('css/manage/layout.css') }}" rel="stylesheet">
    <link href="{{ asset('css/manage/form.css') }}" rel="stylesheet">
  @show
  <!-- Jquery -->
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script>
    // CSRF protection for your AJAX based applications
    $.ajaxSetup({
      headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' }
    });
  </script>
</head>
<body>
  @include('_facebook_sdk')

  <nav class="navbar navbar-default">
    <div class="container">
      @include('_nav')
    </div>
  </nav>

  <div class="container">
    <div class="row">
      <aside class="col-md-3 sidebar">
        @include('manage._sidebar')
      </aside>
      <main class="col-md-9 main">
        @include('manage._main')
      </main>
    </div>
  </div>

  <footer class="footer">
    <div class="container">
      @include('_footer')
    </div>
  </footer>

  @section('javascript')
    <!-- Bootstrap -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <!-- Datepicker -->
    <script type="text/javascript" src="{{ asset('vendor/pickadate/lib/compressed/picker.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendor/pickadate/lib/compressed/picker.date.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendor/pickadate/lib/compressed/translations/vi_VN.js') }}"></script>
    <!-- Select2 -->
    <script src="{{ asset('vendor/select2-4.0.0/js/select2.min.js') }}"></script>
    <script src="{{ asset('vendor/select2-4.0.0/js/i18n/vi.js') }}"></script>
    <!-- Custom -->
    <script src="{{ asset('js/layout.js') }}"></script>
  @show
</body>
</html>