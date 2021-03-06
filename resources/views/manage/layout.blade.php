<!DOCTYPE html>
<html>
<head>
  @include('manage._head')
  <!-- Datepicker -->
  <link href="{{ asset('vendor/pickadate/lib/compressed/themes/default.css') }}" rel="stylesheet">
  <link href="{{ asset('vendor/pickadate/lib/compressed/themes/default.date.css') }}" rel="stylesheet">
  <!-- Image upload -->
  <link href="{{ asset('vendor/jquery.filer-master/css/jquery.filer.css') }}" rel="stylesheet" />
  <!-- Custom -->
  <link href="{{ asset('css/manage/layout.css') }}" rel="stylesheet">
  <link href="{{ asset('css/manage/form.css') }}" rel="stylesheet">
  @section('style')
  @show
  @section('jshead')
  @show
</head>
<body>
  <nav class="navbar navbar-default navbar-fixed-top">
    @include('_nav')
  </nav>

  <div class="container">
    <div class="row">
      <main class="col-md-9 main">
        @include('manage._main')
      </main>

      <aside class="col-md-3 sidebar">
        @include('manage._sidebar')
      </aside>
    </div>
  </div>

  <footer class="footer">
    <div class="container">
      @include('_footer')
    </div>
  </footer>

  <!-- Datepicker -->
  <script type="text/javascript" src="{{ asset('vendor/pickadate/lib/compressed/picker.js') }}"></script>
  <script type="text/javascript" src="{{ asset('vendor/pickadate/lib/compressed/picker.date.js') }}"></script>
  <script type="text/javascript" src="{{ asset('vendor/pickadate/lib/compressed/translations/vi_VN.js') }}"></script>
  <!-- JQuery Validation -->
  <script src="{{ asset('vendor/jquery-validation-1.14.0/jquery.validate.min.js') }}"></script>
  <script src="{{ asset('vendor/jquery-validation-1.14.0/localization/messages_vi.min.js') }}"></script>
  <!-- Image upload -->
  <script src="{{ asset('vendor/jquery.filer-master/js/jquery.filer.js') }}"></script>
  @include('_jsfooter')
  <!-- Custom -->
  <script src="{{ asset('js/manage/module/map.js') }}"></script>
  <script src="{{ asset('js/manage/module/location.js') }}"></script>
  <script src="{{ asset('js/manage/module/images.js') }}"></script>
  <script src="{{ asset('js/manage/module/image.js') }}"></script>
  @section('javascript')
  @show
</body>
</html>